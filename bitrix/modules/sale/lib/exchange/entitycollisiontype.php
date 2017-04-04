<?php
namespace Bitrix\Sale\Exchange;


use Bitrix\Main;
use Bitrix\Sale\Exchange;

class EntityCollisionType
{
    const Undefined = 0;
    const OrderIsPayed = 1;
    const OrderIsShipped = 2;
    const OrderFinalStatus = 3;
    const ShipmentIsShipped = 4;
    const ShipmentBasketItemNotFound = 5;
    const ShipmentBasketItemQuantityError = 6;
    const ShipmentBasketItemsModify = 7;
    const OrderShipmentItemsModify = 8;
    const ShipmentBasketItemsModifyError = 9;
    const OrderShipmentItemsModifyError = 10;
    const PaymentIsPayed = 11;
    const OrderShipmentDeleted = 12;
    const OrderShipmentDeletedError = 13;
    const OrderPaymentDeleted = 14;
    const OrderPaymentDeletedError = 15;
    const OrderBasketItemTaxValueError = 16;
    const OrderSynchronizeBasketItemsModify = 17;
    const OrderPayedByStatusError = 18;
    const OrderBasketItemTypeError = 19;
    const PaymentCashBoxCheckNotFound = 20;

    const First = 1;
    const Last = 20;

    const OrderIsPayedName = 'ORDER_IS_PAYED';
    const OrderIsShippedName = 'ORDER_IS_SHIPPED';
    const OrderFinalStatusName = 'ORDER_FINAL_STATUS';
    const ShipmentIsShippedName = 'SHIPMENT_IS_SHIPPED';
    const ShipmentBasketItemNotFoundName = 'SHIPMENT_BASKET_ITEM_NOT_FOUND';
    const ShipmentBasketItemQuantityErrorName = 'SHIPMENT_BASKET_ITEM_QUANTITY_ERROR';
    const ShipmentBasketItemsModifyName = 'SHIPMENT_BASKET_ITEMS_MODIFY';
    const OrderShipmentItemsModifyName = 'ORDER_SHIPMENT_ITEMS_MODIFY';
    const ShipmentBasketItemsModifyErrorName = 'SHIPMENT_BASKET_ITEMS_MODIFY_ERROR';
    const OrderShipmentItemsModifyErrorName = 'ORDER_SHIPMENT_ITEMS_MODIFY_ERROR';
    const PaymentIsPayedName = 'PAYMENT_IS_PAYED';
    const OrderShipmentDeletedName = 'ORDER_SHIPMENT_DELETED';
    const OrderShipmentDeletedErrorName = 'ORDER_SHIPMENT_DELETED_ERROR';
    const OrderPaymentDeletedName = 'ORDER_PAYMENT_DELETED';
    const OrderPaymentDeletedErrorName = 'ORDER_PAYMENT_DELETED_ERROR';
    const OrderBasketItemTaxValueErrorName = 'ORDER_BASKET_ITEM_TAX_VALUE_ERROR';
    const OrderSynchronizeBasketItemsModifyName = 'ORDER_SYNCHRONIZE_BASKET_ITEMS_MODIFY';
    const OrderPayedByStatusErrorName = 'ORDER_PAYED_BY_STATUS_ERROR';
    const OrderBasketItemTypeErrorName = 'ORDER_BASKET_ITEM_TYPE_ERROR';
    const PaymentCashBoxCheckNotFoundName = 'PAYMENT_CASH_BOX_CHECK_NOT_FOUND';

    private static $ALL_DESCRIPTIONS = array();

    public static function isDefined($typeId)
    {
        if(!is_int($typeId))
        {
            $typeId = (int)$typeId;
        }
        return $typeId >= self::First && $typeId <= self::Last;
    }

    public static function resolveID($name)
    {
        $name = strtoupper(trim(strval($name)));
        if($name == '')
        {
            return self::Undefined;
        }

        switch($name)
        {
            case self::OrderIsPayedName:
                return self::OrderIsPayed;
            case self::OrderIsShippedName:
                return self::OrderIsShipped;
            case self::OrderFinalStatusName:
                return self::OrderFinalStatus;
            case self::ShipmentIsShippedName:
                return self::ShipmentIsShipped;
            case self::ShipmentBasketItemNotFoundName:
                return self::ShipmentBasketItemNotFound;
            case self::ShipmentBasketItemQuantityErrorName:
                return self::ShipmentBasketItemQuantityError;
            case self::ShipmentBasketItemsModifyName:
                return self::ShipmentBasketItemsModify;
            case self::OrderShipmentItemsModifyName:
                return self::OrderShipmentItemsModify;
            case self::ShipmentBasketItemsModifyErrorName:
                return self::ShipmentBasketItemsModifyError;
            case self::OrderShipmentItemsModifyErrorName:
                return self::OrderShipmentItemsModifyError;
            case self::PaymentIsPayedName:
                return self::PaymentIsPayed;
            case self::OrderShipmentDeletedName:
                return self::OrderShipmentDeleted;
            case self::OrderShipmentDeletedErrorName:
                return self::OrderShipmentDeletedError;
            case self::OrderPaymentDeletedName:
                return self::OrderPaymentDeleted;
            case self::OrderPaymentDeletedErrorName:
                return self::OrderPaymentDeletedError;
            case self::OrderBasketItemTaxValueErrorName:
                return self::OrderBasketItemTaxValueError;
            case self::OrderSynchronizeBasketItemsModifyName:
                return self::OrderSynchronizeBasketItemsModify;
            case self::OrderPayedByStatusErrorName:
                return self::OrderPayedByStatusError;
            case self::OrderBasketItemTypeErrorName:
				return self::OrderBasketItemTypeError;
			case self::PaymentCashBoxCheckNotFoundName:
				return self::PaymentCashBoxCheckNotFound;

            default:
                return self::Undefined;
        }
    }

    public static function resolveName($typeId)
    {
        if(!is_numeric($typeId))
        {
            return '';
        }

        $typeId = intval($typeId);
        if($typeId <= 0)
        {
            return '';
        }

        switch($typeId)
        {
            case self::OrderIsPayed:
                return self::OrderIsPayedName;
            case self::OrderIsShipped:
                return self::OrderIsShippedName;
            case self::OrderFinalStatus:
                return self::OrderFinalStatusName;
            case self::ShipmentIsShipped:
                return self::ShipmentIsShippedName;
            case self::ShipmentBasketItemNotFound:
                return self::ShipmentBasketItemNotFoundName;
            case self::ShipmentBasketItemQuantityError:
                return self::ShipmentBasketItemQuantityErrorName;
            case self::ShipmentBasketItemsModify:
                return self::ShipmentBasketItemsModifyName;
            case self::OrderShipmentItemsModify:
                return self::OrderShipmentItemsModifyName;
            case self::ShipmentBasketItemsModifyError:
                return self::ShipmentBasketItemsModifyErrorName;
            case self::OrderShipmentItemsModifyError:
                return self::OrderShipmentItemsModifyErrorName;
            case self::PaymentIsPayed:
                return self::PaymentIsPayedName;
            case self::OrderShipmentDeleted:
                return self::OrderShipmentDeletedName;
            case self::OrderShipmentDeletedError:
                return self::OrderShipmentDeletedErrorName;
            case self::OrderPaymentDeleted:
                return self::OrderPaymentDeletedName;
            case self::OrderPaymentDeletedError:
                return self::OrderPaymentDeletedErrorName;
            case self::OrderBasketItemTaxValueError:
                return self::OrderBasketItemTaxValueErrorName;
            case self::OrderSynchronizeBasketItemsModify:
                return self::OrderSynchronizeBasketItemsModifyName;
            case self::OrderPayedByStatusError:
                return self::OrderPayedByStatusErrorName;
			case self::OrderBasketItemTypeError:
				return self::OrderBasketItemTypeErrorName;
			case self::PaymentCashBoxCheckNotFound:
				return self::PaymentCashBoxCheckNotFoundName;

            case self::Undefined:
            default:
                return '';
        }
    }

    public static function getAllDescriptions()
    {
        if(!self::$ALL_DESCRIPTIONS[LANGUAGE_ID])
        {
            IncludeModuleLangFile(__FILE__);
            self::$ALL_DESCRIPTIONS[LANGUAGE_ID] = array(
                self::OrderIsPayed => GetMessage('SALE_COLLISION_TYPE_ORDER_IS_PAYED'),
                self::OrderIsShipped => GetMessage('SALE_COLLISION_TYPE_ORDER_IS_SHIPPED'),
                self::OrderFinalStatus => GetMessage('SALE_COLLISION_TYPE_ORDER_FINAL_STATUS'),
                self::ShipmentIsShipped => GetMessage('SALE_COLLISION_TYPE_SHIPMENT_IS_SHIPPED'),
                self::ShipmentBasketItemNotFound => GetMessage('SALE_COLLISION_TYPE_SHIPMENT_BASKET_ITEM_NOT_FOUND'),
                self::ShipmentBasketItemQuantityError => GetMessage('SALE_COLLISION_TYPE_SHIPMENT_BASKET_ITEM_QUANTITY_ERROR'),
                self::ShipmentBasketItemsModify => GetMessage('SALE_COLLISION_TYPE_SHIPMENT_BASKET_ITEMS_MODIFY'),
                self::OrderShipmentItemsModify => GetMessage('SALE_COLLISION_TYPE_ORDER_SHIPMENT_ITEMS_MODIFY'),
                self::ShipmentBasketItemsModifyError => GetMessage('SALE_COLLISION_TYPE_SHIPMENT_BASKET_ITEMS_MODIFY_ERROR'),
                self::OrderShipmentItemsModifyError => GetMessage('SALE_COLLISION_TYPE_ORDER_SHIPMENT_ITEMS_MODIFY_ERROR'),
                self::PaymentIsPayed => GetMessage('SALE_COLLISION_TYPE_PAYMENT_IS_PAYED'),
                self::OrderShipmentDeleted => GetMessage('SALE_COLLISION_TYPE_ORDER_SHIPMENT_DELETED'),
                self::OrderShipmentDeletedError => GetMessage('SALE_COLLISION_TYPE_ORDER_SHIPMENT_DELETED_ERROR'),
                self::OrderPaymentDeleted => GetMessage('SALE_COLLISION_TYPE_ORDER_PAYMENT_DELETED'),
                self::OrderPaymentDeletedError => GetMessage('SALE_COLLISION_TYPE_ORDER_PAYMENT_DELETED_ERROR'),
                self::OrderBasketItemTaxValueError => GetMessage('SALE_COLLISION_TYPE_ORDER_BASKET_ITEM_TAX_VALUE_ERROR'),
                self::OrderSynchronizeBasketItemsModify => GetMessage('SALE_COLLISION_TYPE_ORDER_SYNCHRONIZE_BASKET_ITEMS_MODIFY'),
                self::OrderPayedByStatusError => GetMessage('SALE_COLLISION_TYPE_ORDER_PAYED_BY_STATUS_ERROR'),
                self::OrderBasketItemTypeError => GetMessage('SALE_COLLISION_TYPE_ORDER_BASKET_ITEM_TYPE_ERROR'),
                self::PaymentCashBoxCheckNotFound => GetMessage('SALE_COLLISION_TYPE_PAYMENT_CASH_BOX_CHECK_NOT_FOUND'),
            );
        }
        return self::$ALL_DESCRIPTIONS[LANGUAGE_ID];
    }

    public static function getDescription($typeId)
    {
        $typeId = intval($typeId);
        $all = self::getAllDescriptions();
        return isset($all[$typeId]) ? $all[$typeId] : '';
    }

    public static function getDescriptions($types)
    {
        $result = array();
        if(is_array($types))
        {
            foreach($types as $typeId)
            {
                $typeId = intval($typeId);
                $descr = self::getDescription($typeId);
                if($descr !== '')
                {
                    $result[$typeId] = $descr;
                }
            }
        }
        return $result;
    }
}