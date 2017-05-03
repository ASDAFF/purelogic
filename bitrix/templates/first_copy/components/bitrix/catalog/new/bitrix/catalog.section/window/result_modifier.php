<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//Make all properties present in order
//to prevent html table corruption
foreach($arResult["ITEMS"] as $key => $arElement)
{
	$arRes = array();
	foreach($arParams["PROPERTY_CODE"] as $pid)
	{
		$arRes[$pid] = CIBlockFormatProperties::GetDisplayValue($arElement, $arElement["PROPERTIES"][$pid], "catalog_out");
	}
	$arResult["ITEMS"][$key]["DISPLAY_PROPERTIES"] = $arRes;
}

$arFilter = array('IBLOCK_ID' => $arResult['IBLOCK_ID'],'ID' => $arResult['ID'],'GLOBAL_ACTIVE'=>'Y');
$rsSect = CIBlockSection::GetList(array("UF_SORTIROVKA"=>"ASC","SORT"=>"ASC"),$arFilter,false,array("UF_BUY_WITH_ORDER"));
if($arSect = $rsSect->GetNext())
{
	$arResult['UF_BUY_WITH_ORDER'] = $arSect['UF_BUY_WITH_ORDER'];
}
?>