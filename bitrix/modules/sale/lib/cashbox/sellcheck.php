<?php

namespace Bitrix\Sale\Cashbox;

use Bitrix\Main;
use Bitrix\Sale\Payment;
use Bitrix\Sale\PaySystem;
use Bitrix\Sale\Shipment;
use Bitrix\Sale\ShipmentItem;

Main\Localization\Loc::loadMessages(__FILE__);

/**
 * Class SellCheck
 * @package Bitrix\Sale\Cashbox
 */
class SellCheck extends Check
{
	/**
	 * @return string
	 */
	public static function getType()
	{
		return 'sell';
	}

	/**
	 * @return string
	 */
	public static function getName()
	{
		return Main\Localization\Loc::getMessage('SALE_CASHBOX_SELL_NAME');
	}
	
	/**
	 * @return array
	 */
	public function getDataForCheck()
	{
		static $psList = array();

		$result = array(
			'type' => static::getType(),
			'unique_id' => $this->getField('ID'),
			'items' => array(),
			'date_create' => new Main\Type\DateTime()
		);

		$order = null;
		$entities = $this->getEntities();

		if ($entities)
		{
			foreach ($entities as $entity)
			{
				if ($order === null)
					$order = CheckManager::getOrder($entity);

				if ($entity instanceof Payment)
				{
					if (!isset($psList[$entity->getPaymentSystemId()]))
						$psList[$entity->getPaymentSystemId()] = PaySystem\Manager::getById($entity->getPaymentSystemId());

					$paySystem = $psList[$entity->getPaymentSystemId()];

					$result['payments'][] = array(
						'is_cash' => $paySystem['IS_CASH'],
						'sum' => $entity->getSum()
					);
				}
				elseif ($entity instanceof Shipment)
				{
					$itemCollection = $entity->getShipmentItemCollection();

					/** @var ShipmentItem $item */
					foreach ($itemCollection as $item)
					{
						$basketItem = $item->getBasketItem();
						if ($basketItem->isBundleChild())
							continue;

						$vatInfo = array();
						if (Main\Loader::includeModule('catalog'))
						{
							$dbRes = \CCatalogProduct::GetVATInfo($basketItem->getProductId());
							$vatInfo = $dbRes->Fetch();
						}

						$item = array(
							'name' => $basketItem->getField('NAME'),
							'price' => $basketItem->getBasePrice(),
							'quantity' => (float)$item->getQuantity(),
							'vat' => $vatInfo ? $vatInfo['ID'] : 0
						);

						if ($basketItem->getDiscountPrice() > 0)
						{
							$item['discount'] = array(
								'discount' => $basketItem->getDiscountPrice(),
								'discount_type' => 'C',
							);
						}

						$result['items'][] = $item;
					}

					$item = array(
						'name' => Main\Localization\Loc::getMessage('SALE_CASHBOX_SELL_DELIVERY'),
						'price' => (float)$entity->getField('BASE_PRICE_DELIVERY'),
						'quantity' => 1,
						'vat' => 0
					);

					if ($entity->getField('DISCOUNT_PRICE') > 0)
					{
						$item['discount'] = array(
							'discount' => $entity->getField('DISCOUNT_PRICE'),
							'discount_type' => 'C',
						);
					}

					$result['items'][] = $item;
				}
			}

			if ($order !== null)
			{
				$properties = $order->getPropertyCollection();
				$email = $properties->getUserEmail();
				$result['client_email'] = $email->getValue();
			}
		}

		return $result;
	}

}