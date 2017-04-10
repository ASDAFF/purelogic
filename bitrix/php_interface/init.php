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


// регистрируем обработчик
AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", Array("ElementUpdate", "OnBeforeIBlockElementUpdateHandler"));

class ElementUpdate
{
    // создаем обработчик события "OnBeforeIBlockElementUpdate"
    function OnBeforeIBlockElementUpdateHandler(&$arFields)
    {
        if(CModule::IncludeModule('iblock')) {

            $db_props = CIBlockElement::GetProperty($arFields['IBLOCK_ID'], $arFields['ID'], array("sort" => "asc"), Array("CODE"=>"SAYT_SORTIROVKA"));
            if($ar_props = $db_props->Fetch()){
                    $el = new CIBlockElement;
                    $arLoadProductArray = Array(
                        "SORT" => $ar_props['VALUE']
                    );

                    $PRODUCT_ID = $arFields["ID"];  // изменяем элемент с кодом (ID) 2
                 //   $el->Update($PRODUCT_ID, $arLoadProductArray);

            }
        }
    }
}

?>