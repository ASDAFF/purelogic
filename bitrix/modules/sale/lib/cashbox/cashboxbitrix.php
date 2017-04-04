<?php

namespace Bitrix\Sale\Cashbox;

use Bitrix\Sale\Cashbox\Internals\CashboxZReportTable;
use Bitrix\Main;
use Bitrix\Main\Localization;

Localization\Loc::loadMessages(__FILE__);

class CashboxBitrix extends Cashbox
{
	const TYPE_Z_REPORT = 1;
	const UUID_TYPE_CHECK = 'check';
	const UUID_TYPE_REPORT = 'report';
	const UUID_DELIMITER = '|';

	/**
	 * @param Check $check
	 * @return array
	 */
	public function buildCheckQuery(Check $check)
	{
		$result = array();

		$data = $check->getDataForCheck();
		foreach ($data['payments'] as $payment)
		{
			$result['payments'][] = array(
				'type' => $payment['is_cash'] === 'Y' ? 0 : 1,
				'value' => $payment['sum']
			);
		}

		$typeMap = $this->getCheckTypeMap();
		if (isset($typeMap[$data['type']]))
			$result['type'] = $typeMap[$data['type']];
		else
			return array();

		$result['uuid'] = static::buildUuid(static::UUID_TYPE_CHECK, $data['unique_id']);
		$result['zn'] = $this->getField('NUMBER_KKM');
		$result['items'] = array();
		foreach ($data['items'] as $item)
		{
			$vat = $this->getValueFromMapSettings('VAT', $item['vat']);

			$value = array(
				'name' => $item['name'],
				'price' => $item['price'],
				'quantity' => $item['quantity'],
				'VAT' => ($vat !== null) ? (int)$vat : 4
			);

			if (isset($item['discount']) && is_array($item['discount']))
			{
				$value['discount'] = $item['discount']['discount']*$item['quantity'];

				$discountType = $item['discount']['discount_type'] === 'P' ? 1 : 0;
				$value['discount_type'] = $discountType;
			}

			$result['items'][] = $value;
		}
		$result['client'] = $data['client_email'];

		/** @var Main\Type\DateTime $dateTime */
		$dateTime = $data['date_create'];
		$result['timestamp'] = (string)$dateTime->getTimestamp();

		return $result;
	}

	/**
	 * @param $id
	 * @return array
	 */
	public function buildZReportQuery($id)
	{
		$dateTime = new Main\Type\DateTime();

		return array(
			'type' => static::TYPE_Z_REPORT,
			'uuid' => static::buildUuid(static::UUID_TYPE_REPORT, $id),
			'timestamp' => (string)$dateTime->getTimestamp(),
			'zn' => $this->getField('NUMBER_KKM')
		);
	}

	/**
	 * @param $type
	 * @param $id
	 * @return string
	 */
	private static function buildUuid($type, $id)
	{
		$context = Main\Application::getInstance()->getContext();
		$server = $context->getServer();
		$domain = $server->getServerName();

		return $type.static::UUID_DELIMITER.$domain.static::UUID_DELIMITER.$id;
	}

	/**
	 * @param $uuid
	 * @return array
	 */
	private static function parseUuid($uuid)
	{
		$info = explode(static::UUID_DELIMITER, $uuid);

		return array('type' => $info[0], 'id' => $info[2]);
	}

	/**
	 * @return string
	 */
	public static function getName()
	{
		return Localization\Loc::getMessage('SALE_CASHBOX_BITRIX_TITLE');
	}

	/**
	 * @param array $data
	 * @return array
	 */
	public static function getCashboxList(array $data)
	{
		$result = array();

		if (isset($data['kkm']) && is_array($data['kkm']))
		{
			$factoryNum = array();
			foreach ($data['kkm'] as $kkm)
				$factoryNum[] = $kkm['zn'];

			$cashboxList = Manager::getListFromCache();
			foreach ($cashboxList as $item)
			{
				if (in_array($item['NUMBER_KKM'], $factoryNum))
					$result[$item['NUMBER_KKM']] = $item;
			}

			foreach ($data['kkm'] as $kkm)
			{
				if (!isset($result[$kkm['zn']]))
				{
					$result[$kkm['zn']] = array(
						'NUMBER_KKM' => $kkm['zn'],
						'NUMBER_FN' => $kkm['fn'],
						'HANDLER' => '\\'.get_called_class(),
						'CACHE' => $kkm['cache'],
						'INCOME' => $kkm['reg_income'],
						'NZ_SUM' => $kkm['nz_sum']
					);
				}

				$result[$kkm['zn']]['PRESENTLY_ENABLED'] = ($kkm['status'] === 'ok') ? 'Y' : 'N';
			}
		}

		return $result;
	}

	/**
	 * @param array $data
	 * @return array
	 */
	public static function applyPrintResult(array $data)
	{
		$processedIds = array();

		foreach ($data['kkm'] as $kkm)
		{
			if (isset($kkm['printed']) && is_array($kkm['printed']))
			{
				foreach ($kkm['printed'] as $printed)
				{
					$uuid = static::parseUuid($printed['uuid']);

					if ($uuid['type'] === static::UUID_TYPE_CHECK)
					{
						$result = static::applyCheckResult($printed);
						if ($result->isSuccess())
							$processedIds[] = $printed['uuid'];
					}
					elseif ($uuid['type'] === static::UUID_TYPE_REPORT)
					{
						$result = static::applyZReportResult($printed);
						if ($result->isSuccess())
							$processedIds[] = $printed['uuid'];
					}
				}
			}
		}

		return $processedIds;
	}

	/**
	 * @param array $data
	 * @return array
	 */
	protected static function extractCheckData(array $data)
	{
		$uuid = self::parseUuid($data['uuid']);
		$result = array(
			'ID' => $uuid['id'],
			'TYPE' => $uuid['type'],
		);

		if ($data['code'] !== 0 && isset($data['message']))
		{
			$errorMsg = Localization\Loc::getMessage('SALE_CASHBOX_BITRIX_ERR'.$data['code']);
			if (!$errorMsg)
				$errorMsg = $data['message'];

			$result['ERROR'] = array('MESSAGE' => $errorMsg);

			$errorGroup = static::getGroupError($data['code']);
			$result['NEED_MARKED'] = ($errorGroup === static::GROUP_E_ERROR);
		}

		$result['LINK_PARAMS'] = array('qr' => $data['qr']);

		return $result;
	}

	/**
	 * @param array $data
	 * @return array
	 */
	protected static function extractZReportData(array $data)
	{
		$uuid = self::parseUuid($data['uuid']);
		$result = array(
			'ID' => $uuid['id'],
			'TYPE' => $uuid['type'],
		);

		if ($data['code'] !== 0 && isset($data['message']))
		{
			$errorMsg = Localization\Loc::getMessage('SALE_CASHBOX_BITRIX_ERR'.$data['code']);
			if (!$errorMsg)
				$errorMsg = $data['message'];

			$result['ERROR'] = array('MESSAGE' => $errorMsg, 'CODE' => $data['code']);
		}

		$result['CASH_SUM'] = $data['payments_cache'];
		$result['CASHLESS_SUM'] = $data['reg_income'] - $data['payments_cache'];
		$result['CUMULATIVE_SUM'] = $data['nz_sum'];
		$result['RETURNED_SUM'] = $data['reg_return'];

		$result['LINK_PARAMS'] = array('qr' => $data['qr']);

		return $result;
	}

	/**
	 * @return array
	 */
	private function getCheckTypeMap()
	{
		return array(
			SellOrderCheck::getType() => 1,
			SellCheck::getType() => 1,
			SellReturnCashCheck::getType() => 2,
			SellReturnCheck::getType() => 2
		);
	}

	/**
	 * @param array $linkParams
	 * @return string
	 */
	public function getCheckLink(array $linkParams)
	{
		if (isset($linkParams['qr']) && !empty($linkParams['qr']))
		{
			/** @var Ofd $ofd */
			$ofd = $this->getOfd();
			if ($ofd !== null)
				return $ofd->generateCheckLink($linkParams['qr']);
		}

		return '';
	}

	/**
	 * @param $errorCode
	 * @throws Main\NotImplementedException
	 * @return int
	 */
	protected static function getGroupError($errorCode)
	{
		$errors = array(
			-3800 => static::GROUP_E_ERROR,
			-3803 => static::GROUP_E_ERROR,
			-3804 => static::GROUP_E_ERROR,
			-3805 => static::GROUP_E_ERROR,
			-3816 => static::GROUP_E_ERROR,
			-3807 => static::GROUP_E_ERROR,
			-3896 => static::GROUP_E_ERROR,
			-3897 => static::GROUP_E_ERROR,
		);

		return isset($errors[$errorCode]) ? $errors[$errorCode] : null;
	}

}
