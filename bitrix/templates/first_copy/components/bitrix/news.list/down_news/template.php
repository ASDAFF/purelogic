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
<section class="new_slider">
	<div class="container">
		<div class="row">
			<div class="new_slider_wr">
			<?foreach($arResult["ITEMS"] as $arItem){?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
				<div class="item">
					
						<div class="col-md-3">
							<div class="new_slider_img" style=" background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>);"></div>
						</div>	
						<div class="col-md-9">
							<div class="new_slider_text">
								<p class="date_novosti"><?=$arItem["DATE_ACTIVE_FROM"];?></p>
								<a href="<?=$arItem["DETAIL_PAGE_URL"];?>"><?=$arItem["NAME"];?></a>
								<div style="margin-top:10px"><?=$arItem["PREVIEW_TEXT"];?></div></div>
						</div>	
					
					
				</div>
				
				<?}?>
			</div>
		</div>	
	</div>
</section>

