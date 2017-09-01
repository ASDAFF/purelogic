<?php
if (IntVal($arResult["NUM_PRODUCTS"])>0) {

    if (CModule::IncludeModule("sale")) {

        $quantity = array();
        $dbBasketItems = CSaleBasket::GetList(
            array(
                "NAME" => "ASC",
                "ID" => "ASC"
            ),
            array(
                "FUSER_ID" => CSaleBasket::GetBasketUserID(),
                "LID" => SITE_ID,
                "ORDER_ID" => "NULL"
            ),
            false,
            false,
            array()
        );

        foreach($dbBasketItems->arResult as $value){
            $quantity[] = (int)number_format($value['QUANTITY'], 0, '.', '');
        }
        $arResult['NUM_PRODUCTS'] = array_sum($quantity);
    }

}


