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


AddEventHandler("iblock", "OnBeforeIBlockSectionUpdate", Array("SectionUpdate", "OnBeforeIBlockSectionUpdateHandler"));

class SectionUpdate
{
    function OnBeforeIBlockSectionUpdateHandler(&$arFields)
    {
        if($arFields['IBLOCK_ID'] == 18)
        $arFields['SORT'] = $arFields['UF_SORTIROVKA'];
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
            foreach ($arFields['PROPERTY_VALUES'][656] as $sort) {
                $arFields['SORT'] = $sort['VALUE'];
            }
        }
    }
}

?>