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
        $arFields['SORT'] = $arFields['UF_SORTIROVKA'];
    }
}


// ������������ ����������
AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", Array("ElementUpdate", "OnBeforeIBlockElementUpdateHandler"));

class ElementUpdate
{
    // ������� ���������� ������� "OnBeforeIBlockElementUpdate"
    function OnBeforeIBlockElementUpdateHandler(&$arFields)
    {
        $sort = array_shift($arFields['PROPERTY_VALUES'][656]);
        $arFields['SORT'] = $sort['VALUE'];
    }
}

?>