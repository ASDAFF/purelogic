<?php

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->IncludeComponent(
    "bitrix:catalog.section",
    "empty",
    array(
        "IBLOCK_ID" => 18,
        "PRODUCT_QUANTITY_VARIABLE" => 'quantity',
        "USE_PRODUCT_QUANTITY" => 'Y'
    )
);

$APPLICATION->IncludeComponent(
    "bitrix:sale.basket.basket.line",
    "new",
    array(
        "PATH_TO_BASKET" => "/user/cart/",
        "PATH_TO_PERSONAL" => "/user/",
        "SHOW_PERSONAL_LINK" => "N",
    ),
    false
);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");

?>