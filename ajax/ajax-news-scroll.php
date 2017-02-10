<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>

<?php

if(CModule::IncludeModule("iblock")):

    $arSelect = Array("ID", "IBLOCK_ID","NAME","CODE","PREVIEW_PICTURE", "DATE_ACTIVE_FROM");
    $arFilter = Array("IBLOCK_ID" => 14, "ACTIVE" => "Y");

    $resul = CIBlockElement::GetList(Array("ACTIVE_FROM" => "DESC","ID" => "ASC"), $arFilter, false,false, $arSelect);
    while($ob = $resul->GetNextElement()) {
        $navCount = $ob->GetFields();
    }

    $arResult = array();
    $res = CIBlockElement::GetList(Array("ACTIVE_FROM" => "DESC","ID" => "ASC"), $arFilter, false,  Array ("nPageSize" =>6,"iNumPage" => $_POST['startFrom'],"bShowAll"=> false), $arSelect);
    while($ob = $res->GetNextElement())
    {
        $arFields = $ob->GetFields();

        if($_POST['startFrom'] <= ceil(count($navCount)/6)) {

            $arResult[] = array(
                'url' => '/support/news/'.$arFields['CODE'].'/',
                'text' => $arFields['NAME'],
                'data' => $arFields['DATE_ACTIVE_FROM'],
                'img' => CFile::GetPath($arFields['PREVIEW_PICTURE'])
            );
        }

    }

    echo json_encode($arResult);

endif;