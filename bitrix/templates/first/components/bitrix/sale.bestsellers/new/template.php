<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var CBitrixComponentTemplate $this */
/** @var array $arParams */
/** @var array $arResult */
/** @global CDatabase $DB */

$this->setFrameMode(true);

$templateData = array(
	'TEMPLATE_THEME' => $this->GetFolder() . '/themes/' . $arParams['TEMPLATE_THEME'] . '/style.css',
	'TEMPLATE_CLASS' => 'bx_' . $arParams['TEMPLATE_THEME']
);
?>
<section class="popular_slider">
	<h2>Популярные товары</h2>
	<div class="container">
		<div class="slider_popular">
<?
	foreach ($arResult['ITEMS'] as $key => $arItem)
	{
		$strMainID = $this->GetEditAreaId($arItem['ID'] . $key);

		$arItemIDs = array(
			'ID' => $strMainID,
			'PICT' => $strMainID . '_pict',
			'SECOND_PICT' => $strMainID . '_secondpict',
			'MAIN_PROPS' => $strMainID . '_main_props',

			'QUANTITY' => $strMainID . '_quantity',
			'QUANTITY_DOWN' => $strMainID . '_quant_down',
			'QUANTITY_UP' => $strMainID . '_quant_up',
			'QUANTITY_MEASURE' => $strMainID . '_quant_measure',
			'BUY_LINK' => $strMainID . '_buy_link',
			'SUBSCRIBE_LINK' => $strMainID . '_subscribe',

			'PRICE' => $strMainID . '_price',
			'DSC_PERC' => $strMainID . '_dsc_perc',
			'SECOND_DSC_PERC' => $strMainID . '_second_dsc_perc',

			'PROP_DIV' => $strMainID . '_sku_tree',
			'PROP' => $strMainID . '_prop_',
			'DISPLAY_PROP_DIV' => $strMainID . '_sku_prop',
			'BASKET_PROP_DIV' => $strMainID . '_basket_prop'
		);

		$strObName = 'ob' . preg_replace("/[^a-zA-Z0-9_]/", "x", $strMainID);

		$strTitle = (
			isset($arItem["IPROPERTY_VALUES"]["ELEMENT_PREVIEW_PICTURE_FILE_TITLE"]) && '' != isset($arItem["IPROPERTY_VALUES"]["ELEMENT_PREVIEW_PICTURE_FILE_TITLE"])
			? $arItem["IPROPERTY_VALUES"]["ELEMENT_PREVIEW_PICTURE_FILE_TITLE"]
			: $arItem['NAME']
		);
		$stat="";
		$showImgClass = $arParams['SHOW_IMAGE'] != "Y" ? "no-imgs" : "";
if($arItem["PROPERTIES"]["NOVINKA"]["VALUE"]=="Y")
$stat="novinka";
if($arItem["PROPERTIES"]["HIT"]["VALUE"]=="Y")
$stat="hit";
		?>
	<div class="item" id="<? echo $strMainID; ?>">
				<a href="<?=$arItem["DETAIL_PAGE_URL"];?>">
					<span class="name"><?=$arItem["NAME"];?></span>
					<div class="popular_sl_img" style=" background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>);"></div>
					<div class="popular_price">
						<p class="<?=$stat;?>"><?if($arItem["MIN_PRICE"]["PRINT_DISCOUNT_VALUE"]!=""){?><?=$arItem["MIN_PRICE"]["PRINT_DISCOUNT_VALUE"];?><?}else{?><?=$arItem["MIN_PRICE"]["PRINT_DISCOUNT_VALUE"];?><?}?></p>
					</div>
				</a>
			</div>
		<?}?>
		
		</div>	
	</div>
</section>