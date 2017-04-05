<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
?>


<?
if(CModule::IncludeModule('iblock')) {
	$el = new CIBlockElement;
	$arLoadProductArray = Array(
		"NAME" => "Элемент"
	);

	$PRODUCT_ID = 108255;  // изменяем элемент с кодом (ID) 2
	$res = $el->Update($PRODUCT_ID, $arLoadProductArray);
}
?>