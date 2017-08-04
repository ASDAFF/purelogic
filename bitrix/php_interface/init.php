<?
AddEventHandler("main", "OnBeforeUserRegister", "OnBeforeUserUpdateHandler");
AddEventHandler("main", "OnBeforeUserUpdate", "OnBeforeUserUpdateHandler");
AddEventHandler("main", "OnBeforeUserAdd", "OnBeforeUserUpdateHandler");


function OnBeforeUserUpdateHandler(&$arFields)
{
        $arFields["LOGIN"] = $arFields["EMAIL"];
        return $arFields;
}


AddEventHandler('main', 'OnEpilog', '_Check404Error', 1);

function _Check404Error(){
    if (defined('ERROR_404') && ERROR_404 == 'Y') {
        global $APPLICATION;
        $APPLICATION->RestartBuffer();
        include $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/header.php';
        include $_SERVER['DOCUMENT_ROOT'] . '/404.php';
        include $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/footer.php';
    }
}



////////////////////////

AddEventHandler("iblock", "OnBeforeIBlockSectionAdd", Array("SectionAdd", "OnBeforeIBlockSectionAddHandler"));

class SectionAdd
{
    function OnBeforeIBlockSectionAddHandler(&$arFields)
    {
        if($arFields['IBLOCK_ID'] == 18){

            $arFields['SORT'] = $arFields['UF_SORTIROVKA'];

            foreach($arFields as $key => $item){
                if($item == "~"){
                    $arFields[$key] = "";
                }
            }
        }
    }
}

// регистрируем обработчик
AddEventHandler("iblock", "OnBeforeIBlockElementAdd", Array("ElementAdd", "OnBeforeIBlockElementAddHandler"));

class ElementAdd
{
    // создаем обработчик события "OnBeforeIBlockElementUpdate"
    function OnBeforeIBlockElementAddHandler(&$arFields)
    {
        if($arFields['IBLOCK_ID'] == 18) {


            foreach($arFields['PROPERTY_VALUES'] as $key_one => $prop){
                foreach($prop as $key_two => $val){
                    if($val['VALUE'] == "~"){
                        $arFields['PROPERTY_VALUES'][$key_one][$key_two]['VALUE'] = "";
                    }
                }
            }


            foreach ($arFields['PROPERTY_VALUES'][656] as $sort) {
                $arFields['SORT'] = $sort['VALUE'];
            }
        }
    }
}

AddEventHandler("iblock", "OnBeforeIBlockSectionUpdate", Array("SectionUpdate", "OnBeforeIBlockSectionUpdateHandler"));

class SectionUpdate
{
    function OnBeforeIBlockSectionUpdateHandler(&$arFields)
    {
        if($arFields['IBLOCK_ID'] == 18){

            $arFields['SORT'] = $arFields['UF_SORTIROVKA'];

            foreach($arFields as $key => $item){
                if($item == "~"){
                    $arFields[$key] = "";
                }
            }
        }
    }
}


// регистрируем обработчик
AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", Array("ElementUpdate", "OnBeforeIBlockElementUpdateHandler"));

class ElementUpdate
{
    // создаем обработчик события "OnBeforeIBlockElementUpdate"
    function OnBeforeIBlockElementUpdateHandler(&$arFields)
    {
        if($arFields['IBLOCK_ID'] == 18) {


            foreach($arFields['PROPERTY_VALUES'] as $key_one => $prop){
                foreach($prop as $key_two => $val){
                    if($val['VALUE'] == "~"){
                        $arFields['PROPERTY_VALUES'][$key_one][$key_two]['VALUE'] = "";
                    }
                }
            }


            foreach ($arFields['PROPERTY_VALUES'][656] as $sort) {
                $arFields['SORT'] = $sort['VALUE'];
            }
        }
    }
}



AddEventHandler("sale", "OnOrderNewSendEmail", "bxModifySaleMails");

function bxModifySaleMails($orderID, &$eventName, &$arFields)
{
    $arOrder = CSaleOrder::GetByID($orderID);
    //-- получаем телефоны и адрес
    $order_props = CSaleOrderPropsValue::GetOrderProps($orderID);
    while ($arProps = $order_props->Fetch())
    {
        if($arProps["TYPE"] == "FILE"){
            $arFile = array();
            foreach(unserialize($arProps['VALUE']) as $file){
                $arFile[] = SITE_SERVER_NAME.CFile::GetPath($file);
            }
            $arFields[$arProps['CODE']] = implode("<br>", $arFile);
        }else{
            $arFields[$arProps['CODE']] = $arProps['VALUE'];
        }
    }
    //-- получаем название службы доставки
    $arDeliv = CSaleDelivery::GetByID($arOrder["DELIVERY_ID"]);
    $delivery_name = "";
    if ($arDeliv)
    {
        $delivery_name = $arDeliv["NAME"];
    }

    //-- получаем название платежной системы
    $arPaySystem = CSalePaySystem::GetByID($arOrder["PAY_SYSTEM_ID"]);
    $pay_system_name = "";
    if ($arPaySystem)
    {
        $pay_system_name = $arPaySystem["NAME"];
    }
    if ($arPersType = CSalePersonType::GetByID($arOrder['PERSON_TYPE_ID']))
    {
        $arFields["PERSON_TYPE"] = $arPersType['NAME'];
    }

    $arFields["ORDER_DESCRIPTION"] = $arOrder["USER_DESCRIPTION"];
    $arFields["DELIVERY_NAME"] =  $delivery_name;
    $arFields["PAY_SYSTEM_NAME"] =  $pay_system_name;

}

?>