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
<?
if (!empty($arResult['ITEMS']))
{
foreach($arResult["ITEMS"] as $arItem){
$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
	$strMainID = $this->GetEditAreaId($arItem['ID']);
?>
<div class="prod_donwload">
					
					<h4><?=$arItem["NAME"];?></h4>
				</div>	
				<div class="clear"></div>
<div class="col-md-4 padding-left_0">
						<?if($arItem["PROPERTIES"]["MORE_PHOTO"]["VALUE"][0]!=""){?>
							<div class="product_slider">
								<div class="item">
									<?$arFile = CFile::GetFileArray($arItem["PREVIEW_PICTURE"]["ID"]);?>
									<p><?=$arFile["DESCRIPTION"];?></p>
									<div class="product_slider_img" style=" background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>);"></div>
									<div class="product_slider_cart">
										
									</div>
								</div>
								<?foreach($arItem["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $k=> $im){?>
								
								<div class="item">
									<p><?=$arItem["PROPERTIES"]["MORE_PHOTO"]["DESCRIPTION"][$k];?></p>
									<div class="product_slider_img" style=" background-image: url(<?=CFile::GetPath($im);?>)"></div>
									<div class="product_slider_cart">
										
									</div>
								</div>	
								<?}?>
							</div>
							<?}else{?>
							
							<div class="product_slider">
								<div class="item">
								<?$arFile = CFile::GetFileArray($arItem["PREVIEW_PICTURE"]["ID"]);?>
									<p><?=$arFile["DESCRIPTION"];?></p>
									<div class="product_slider_img" style=" background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>);"></div>
									<div class="product_slider_cart">
										
									</div>
								</div>
								<div class="item">
								
									<p><?=$arFile["DESCRIPTION"];?></p>
									<div class="product_slider_img" style=" background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>);"></div>
									<div class="product_slider_cart">
										
									</div>
								</div>
								
							</div>
							<?}?>
					</div>
					<div class="col-md-8 ">
						<ul class="donwload_harakt">
						<?foreach($arItem["DISPLAY_PROPERTIES"] as $ka){?>
									<?foreach($ka["VALUE"] as $ch=>$vv){?>
									<li>- <?=$ka["DESCRIPTION"][$ch];?> <?=$vv;?></li>
									
									<?}?>
									
									<?}?>
							
							
						</ul>
					</div>
					
					

					<div class="col-md-12 padding-left_0">
						<div class="product_a">
						<?foreach($arItem["PROPERTIES"]["FILES"]["VALUE"] as $k=> $im){?>
						<div class="col-md-4 padding-left_0"><a href="<?=CFile::GetPath($im);?>"><?if($arItem["PROPERTIES"]["FILES"]["DESCRIPTION"][$k]!=""){?><?=$arItem["PROPERTIES"]["FILES"]["DESCRIPTION"][$k];?><?}else{?>Документ<?}?></a></div>
							
							<?}?>
							
							
						</div>
					</div>	
					<div class="clear"></div>
<?}
}?>