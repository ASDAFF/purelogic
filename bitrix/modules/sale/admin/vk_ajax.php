<?
/** Bitrix Framework
 * @global CUser $USER
 * @global CMain $APPLICATION
 * @global CDatabase $DB
 */

define("NO_KEEP_STATISTIC", true);
define("NO_AGENT_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_before.php");

$arResult = array();

use Bitrix\Sale\TradingPlatform\Vk;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if (!\Bitrix\Main\Loader::includeModule('sale'))
	$arResult["ERROR"] = "Module sale is not installed!";

$result = false;

if (isset($arResult["ERROR"]) <= 0 && $APPLICATION->GetGroupRight("sale") >= "W" && check_bitrix_sessid())
{
	$action = isset($_REQUEST['action']) ? trim($_REQUEST['action']) : '';
	$exportId = isset($_REQUEST['exportId']) ? trim($_REQUEST['exportId']) : '';
	
	switch ($action)
	{
		case "startFeed":
			$type = isset($_REQUEST['type']) ? trim($_REQUEST['type']) : '';
			$firstRun = isset($_REQUEST['firstRun']) ? trim($_REQUEST['firstRun']) : '';
			$firstRun = $firstRun === 'true' ? true : false;
			$logger = new Vk\Logger($exportId);
			
			if ($firstRun)
			{
//				remove flag STOP if first run
				Vk\Journal::clearStopProcessParams($exportId);
//				clear error log to preserve dvusmyslennost
				$logger->clearLog();
			}

//			run only if not STOP flag
			if (!Vk\Journal::checkStopProcessFlag($exportId))
			{
				$arResult = Vk\Feed\Manager::runProcess($exportId, $type);
				
				if ($arResult['CONTINUE'])
				{
					$arResult['PROGRESS'] = Vk\Journal::getProgressMessage($exportId, $type);
					if ($arResult['TOO_MUCH_TIMES'])
						$arResult['PROGRESS'] .= $arResult['TOO_MUCH_TIMES'];
				}
				else
				{
					$arResult['PROGRESS'] .= Vk\Journal::getProgressFinishMessage();
				}
				
			}
			else
			{
				$arResult['PROGRESS'] .= Vk\Journal::getProgressFinishMessage(false);
				$arResult['ABORT'] = true;
				$arResult['CONTINUE'] = false;
			}

//			check not critical errors
			$errorsNormal = $logger->getErrorsList(false);
			if (strlen($errorsNormal) > 0)
				$arResult['ERRORS_NORMAL'] = $errorsNormal;

			$arResult['STATS_ALBUMS'] = Vk\Journal::getStatisticText('ALBUMS', $exportId);
			$arResult['STATS_PRODUCTS'] = Vk\Journal::getStatisticText('PRODUCTS', $exportId);
			
//			critical errors - STOP export and show message
			if (isset($arResult['ERRORS_CRITICAL']) && $arResult['ERRORS_CRITICAL'])
			{
				Vk\Journal::stopProcessParams($exportId);
				$errorsCritical = $logger->getErrorsList(true);
				if (strlen($errorsCritical) > 0)
					$arResult['ERRORS_CRITICAL'] = Vk\Journal::getCriticalErrorsMessage($exportId, $errorsCritical);
				else
					$arResult['ERRORS_CRITICAL'] = false;
			}
			
			break;
		
		
		case "clearErrorLog":
			$logger = new Vk\Logger($exportId);
			if ($logger->clearLog())
			{
				$arResult["COMPLETED"] = true;
			}
			else
			{
				$arResult["COMPLETED"] = false;
				$arResult["MESSAGE"] = Loc::getMessage("SALE_VK_CLEAR_ERROR_LOG_ERROR");
			}
			break;
		
		
		case "stopProcess":
			if (Vk\Journal::stopProcessParams($exportId))
				$arResult['COMPLETED'] = true;
			else
				$arResult["ERROR"] = 'Error during process stopped';
			
			break;
	}
}
else
{
	if (strlen($arResult["ERROR"]) <= 0)
		$arResult["ERROR"] = "Access denied";
}

if (isset($arResult["ERROR"]))
	$arResult["RESULT"] = "ERROR";
else
	$arResult["RESULT"] = "OK";

if (strtolower(SITE_CHARSET) != 'utf-8')
	$arResult = $APPLICATION->ConvertCharsetArray($arResult, SITE_CHARSET, 'utf-8');

header('Content-Type: application/json');
die(json_encode($arResult));