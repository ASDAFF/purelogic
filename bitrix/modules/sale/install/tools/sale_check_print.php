<?php

use Bitrix\Main;
use Bitrix\Sale\Cashbox;
use Bitrix\Sale\Cashbox\ReportManager;

define('NOT_CHECK_PERMISSIONS', true);
define("STOP_STATISTICS", true);
define('NO_AGENT_CHECK', true);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if (!CModule::IncludeModule("sale"))
	return;

global $CACHE_MANAGER, $APPLICATION;
$startExecTime = time();
$timeLimit = 60;
$maxExecTime = intval(intval(ini_get("max_execution_time")) * 0.75);
$maxExecTime = ($maxExecTime === 0 || $maxExecTime > $timeLimit) ? $timeLimit : $maxExecTime;

$request = Main\Application::getInstance()->getContext()->getRequest();
$accessDenied = true;
$hash = $request->get('hash');
if ($hash)
{
	$hash = trim($hash);
	$dbRes = Cashbox\Internals\CashboxConnectTable::getById($hash);
	if ($data = $dbRes->fetch())
		$accessDenied = ($data['ACTIVE'] !== 'Y');
}

if ($accessDenied)
{
	CHTTP::SetStatus("403 Forbidden");
	$APPLICATION->FinalActions();
	die();
}

$result = new stdClass();
$data = array();
$error = false;
$json = file_get_contents('php://input');

if ($json)
{
	if (Cashbox\Manager::DEBUG_MODE === true)
		Cashbox\Manager::writeToLog(array('MESSAGE' => $json));

	$data = Main\Web\Json::decode($json);
}

if (isset($data['kkm']) && count($data['kkm']) > 0)
{
	$processedCheckIds = Cashbox\CashboxBitrix::applyPrintResult($data);
	if ($processedCheckIds)
	{
		$result->ack = $processedCheckIds;
	}
	else
	{
		$cashboxList = Cashbox\CashboxBitrix::getCashboxList($data);
		foreach ($cashboxList as $item)
			Cashbox\Manager::saveCashbox($item);

		$enabledCashbox = array();
		foreach ($cashboxList as $item)
		{
			if ($item['ENABLED'] === 'Y'  && $item['ACTIVE'] === 'Y')
				$enabledCashbox[$item['ID']] = $item;
		}

		if ($enabledCashbox)
		{
			$cashboxIds = array_keys($enabledCashbox);

			$reports = array();
			foreach ($cashboxIds as $id)
			{
				$reportId = Cashbox\ReportManager::getPrintableZReport($id);
				if ($reportId > 0)
					$reports[] = Cashbox\Manager::buildZReportQuery($id, $reportId);
			}

			if ($reports)
				$result->reports = $reports;

			$buildResult = Cashbox\Manager::buildChecksQuery($cashboxIds);
			$printed = !empty($buildResult);

			while (!$printed)
			{
				$ready = false;
				foreach ($cashboxIds as $id)
				{
					if ($CACHE_MANAGER->GetImmediate(CACHED_b_sale_order, "sale_checks_".$id))
					{
						$ready = true;
						break;
					}
				}

				if ($ready)
				{
					foreach ($cashboxIds as $id)
						$CACHE_MANAGER->Clean("sale_checks_".$id);

					$buildResult = Cashbox\Manager::buildChecksQuery($cashboxIds);
					$printed = !empty($buildResult);
				}

				usleep(500000);
				if (time() - $startExecTime > $maxExecTime)
					break;
			}

			if ($buildResult)
			{
				$buildResult = Main\Text\Encoding::convertEncoding($buildResult, LANG_CHARSET, 'UTF-8');
				$result->print = $buildResult;
			}
		}
		else
		{
			Cashbox\Manager::writeToLog(array('MESSAGE' => 'CHECK PRINT: enable cashbox does not find'));
			$error = true;
		}
	}
}
else
{
	Cashbox\Manager::writeToLog(array('MESSAGE' => 'CHECK PRINT: empty kkm list'));
	$error = true;
}

if ($error)
{
	while (true)
	{
		sleep(5);
		if (time() - $startExecTime > $maxExecTime)
			break;
	}
}

$APPLICATION->RestartBuffer();
header('Content-Type: application/json');

echo Main\Web\Json::encode($result);

$APPLICATION->FinalActions();
