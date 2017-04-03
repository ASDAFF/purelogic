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
        $bs = new CIBlockSection;
        $arPICTURE["MODULE_ID"] = "iblock";
        $arFields = Array("SORT" => $arFields['UF_SORTIROVKA']);

        if($arFields['ID'] > 0)
        {
            $bs->Update($arFields['ID'], $arFields);
        }

    }
}

?>