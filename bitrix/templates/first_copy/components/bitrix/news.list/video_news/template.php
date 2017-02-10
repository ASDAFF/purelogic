<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="slider_novosti video_sl"> 
			
			
	   			
	   			
	   		
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	
		<div class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<a href="<?=$arItem["DETAIL_PAGE_URL"];?>">
						<div class="novosti_sl_img" style=" background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>);"></div>
					<div class="novosti_sl_text">
						<p class="date_novosti"><?=$arItem["DATE_ACTIVE_FROM"];?></p>
						<div class="news_vid"><?=$arItem["PREVIEW_TEXT"];?></div>
					</div>
				</a>
				
			</div>
<?endforeach;?>

</div>	