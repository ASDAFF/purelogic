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
{?>
<div class="row">
<!--
<?
foreach($arResult["ITEMS"] as $arItem){
$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
	$strMainID = $this->GetEditAreaId($arItem['ID']);
?>

<?if(count($arItem["OFFERS"])>0){?>
--><div class="templete_2_wr list_tov col-md-6" id="<? echo $strMainID; ?>">
						<div class="col-md-6 padding-left_0">
						
							<?if($arItem["PROPERTIES"]["MORE_PHOTO"]["VALUE"][0]!=""){?>
							<div class="product_slider">
								<div class="item">
									<?$arFile = CFile::GetFileArray($arItem["PREVIEW_PICTURE"]["ID"]);?>
									<p><?=$arFile["DESCRIPTION"];?></p>
									<div class="product_slider_img" style=" background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>);"></div>
									<div class="product_slider_cart">
										<?if($arItem["PROPERTIES"]["NOVINKA"]["VALUE"]=="Y"){?>
										<div class="novinka block_nov">
										<img src="/img/novinka.png" alt=""/>
										<div class="descr_nov">
										Новинка!
										</div>
										</div>
										<?}?>
										<?if($arItem["PROPERTIES"]["AKCYIA"]["VALUE"]=="Y"){?>
										<div class="akcyia block_nov">
										<img src="/img/akcyia.png" alt=""/>
										<div class="descr_nov">
										<span>На товар действует</span>
<p>акция</p>
										</div>
										</div>
										<?}?>
										<?if($arItem["PROPERTIES"]["DOSTAVKA"]["VALUE"]=="Y"){?>
										<div class="dostavka block_nov">
										<img src="/img/dostavka.png" alt=""/>
										<div class="descr_nov">
										<p>Бесплатная </p>
<span class="first_dst">доставка по России</span> 
<span>при заказе от 9 900 рублей</span> 
										</div>
										</div>
										<?}?>
										<?if($arItem["PROPERTIES"]["KACHESTVO"]["VALUE"]=="Y"){?>
										<div class="kachestvo block_nov">
										<img src="/img/kachestvo.png" alt=""/>
										<div class="descr_nov">
										<span>Лучшее соотношение</span>
<p>цена - качество</p>
										</div>
										</div>
										<?}?>
									</div>
								</div>
								<?foreach($arItem["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $k=> $im){?>
								
								<div class="item">
									<p><?=$arItem["PROPERTIES"]["MORE_PHOTO"]["DESCRIPTION"][$k];?></p>
									<div class="product_slider_img" style=" background-image: url(<?=CFile::GetPath($im);?>)"></div>
									<div class="product_slider_cart">
										<?if($arItem["PROPERTIES"]["NOVINKA"]["VALUE"]=="Y"){?>
										<div class="novinka block_nov">
										<img src="/img/novinka.png" alt=""/>
										<div class="descr_nov">
										Новинка!
										</div>
										</div>
										<?}?>
										<?if($arItem["PROPERTIES"]["AKCYIA"]["VALUE"]=="Y"){?>
										<div class="akcyia block_nov">
										<img src="/img/akcyia.png" alt=""/>
										<div class="descr_nov">
										<span>На товар действует</span>
<p>акция</p>
										</div>
										</div>
										<?}?>
										<?if($arItem["PROPERTIES"]["DOSTAVKA"]["VALUE"]=="Y"){?>
										<div class="dostavka block_nov">
										<img src="/img/dostavka.png" alt=""/>
										<div class="descr_nov">
										<p>Бесплатная </p>
<span class="first_dst">доставка по России</span> 
<span>при заказе от 9 900 рублей</span> 
										</div>
										</div>
										<?}?>
										<?if($arItem["PROPERTIES"]["KACHESTVO"]["VALUE"]=="Y"){?>
										<div class="kachestvo block_nov">
										<img src="/img/kachestvo.png" alt=""/>
										<div class="descr_nov">
										<span>Лучшее соотношение</span>
<p>цена - качество</p>
										</div>
										</div>
										<?}?>
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
										<?if($arItem["PROPERTIES"]["NOVINKA"]["VALUE"]=="Y"){?>
										<div class="novinka block_nov">
										<img src="/img/novinka.png" alt=""/>
										<div class="descr_nov">
										Новинка!
										</div>
										</div>
										<?}?>
										<?if($arItem["PROPERTIES"]["AKCYIA"]["VALUE"]=="Y"){?>
										<div class="akcyia block_nov">
										<img src="/img/akcyia.png" alt=""/>
										<div class="descr_nov">
										<span>На товар действует</span>
<p>акция</p>
										</div>
										</div>
										<?}?>
										<?if($arItem["PROPERTIES"]["DOSTAVKA"]["VALUE"]=="Y"){?>
										<div class="dostavka block_nov">
										<img src="/img/dostavka.png" alt=""/>
										<div class="descr_nov">
										<p>Бесплатная </p>
<span class="first_dst">доставка по России</span> 
<span>при заказе от 9 900 рублей</span> 
										</div>
										</div>
										<?}?>
										<?if($arItem["PROPERTIES"]["KACHESTVO"]["VALUE"]=="Y"){?>
										<div class="kachestvo block_nov">
										<img src="/img/kachestvo.png" alt=""/>
										<div class="descr_nov">
										<span>Лучшее соотношение</span>
<p>цена - качество</p>
										</div>
										</div>
										<?}?>
									</div>
								</div>
								<div class="item">
								
									<p><?=$arFile["DESCRIPTION"];?></p>
									<div class="product_slider_img" style=" background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>);"></div>
									<div class="product_slider_cart">
										<?if($arItem["PROPERTIES"]["NOVINKA"]["VALUE"]=="Y"){?>
										<div class="novinka block_nov">
										<img src="/img/novinka.png" alt=""/>
										<div class="descr_nov">
										Новинка!
										</div>
										</div>
										<?}?>
										<?if($arItem["PROPERTIES"]["AKCYIA"]["VALUE"]=="Y"){?>
										<div class="akcyia block_nov">
										<img src="/img/akcyia.png" alt=""/>
										<div class="descr_nov">
										<span>На товар действует</span>
<p>акция</p>
										</div>
										</div>
										<?}?>
										<?if($arItem["PROPERTIES"]["DOSTAVKA"]["VALUE"]=="Y"){?>
										<div class="dostavka block_nov">
										<img src="/img/dostavka.png" alt=""/>
										<div class="descr_nov">
										<p>Бесплатная </p>
<span class="first_dst">доставка по России</span> 
<span>при заказе от 9 900 рублей</span> 
										</div>
										</div>
										<?}?>
										<?if($arItem["PROPERTIES"]["KACHESTVO"]["VALUE"]=="Y"){?>
										<div class="kachestvo block_nov">
										<img src="/img/kachestvo.png" alt=""/>
										<div class="descr_nov">
										<span>Лучшее соотношение</span>
<p>цена - качество</p>
										</div>
										</div>
										<?}?>
									</div>
								</div>
								
							</div>
							<?}?>
						</div>
						<div class="col-md-6">
							
							<div class="to_grey">
							<div class="ttl"><h4 class="title_prod"><?=$arItem["NAME"];?></h4><?if($arItem["DETAIL_TEXT"]!=""){?><div class="open_descr">описание </div><?}?></div>
							
							<div class="preview_text"><?=$arItem["PREVIEW_TEXT"];?></div>
							<div class="detail_text no"><?=$arItem["DETAIL_TEXT"];?></div><div class="clear"></div>
							
							<?foreach($arItem["PROPERTIES"]["FILES"]["VALUE"] as $k=> $im){?>
						
							<div class="col-md-4 col-sm-6 padding-left_0">
								<a href="<?=CFile::GetPath($im);?>" target="_blank" download>	<?if($arItem["PROPERTIES"]["FILES"]["DESCRIPTION"][$k]!=""){?><?=$arItem["PROPERTIES"]["FILES"]["DESCRIPTION"][$k];?><?}else{?>Документ<?}?></a>
							</div>
							<?}?>
							</div>
							

							<div class="col-md-8 padding-left_0 reiting ">
								
							</div>
							
								
								
							
						</div>
						<span class="togle_clas_tovar"><p>Развернуть +</p></span>
						<div class="clas_tovar_wr">
						<?foreach($arItem["OFFERS"] as $off){?>
						
						<div class="clas_tovar">

								<div class="name_clas">
									<p><?=$off["NAME"];?></p>
									<span><? $mm = current($off["PRICES"]);?>
									<?=$mm["PRINT_DISCOUNT_VALUE_VAT"];?>
									</span>
								</div>
								<div class="abot_clas">
									<p>
									<?foreach($off["DISPLAY_PROPERTIES"] as $ka){?>
									<?foreach($ka["VALUE"] as $vv){?>
									<?=$vv;?>
									<?}?>
									
									<?}?>
									
									</p>
									<form action="" method="get" class="add_in_card">
										<input type="text" name="quantity" value="1">
										<input type="submit" value="">
										<input name="action" type="hidden" value="ADD2BASKET">
										<input type="hidden" name="id" value="<?=$off["ID"];?>">
									</form>
								</div>
							</div>
						<?}?>
							

					
						</div>
						

					</div><!--
<?}else{?>
--><div class="tovar_wr list_tov col-md-6" id="<? echo $strMainID; ?>">
						<div class="col-md-6  col-sm-6 col-xs-12  padding-left_0">
							<?if($arItem["PROPERTIES"]["MORE_PHOTO"]["VALUE"][0]!=""){?>
							<div class="product_slider">
								<div class="item">
									<?$arFile = CFile::GetFileArray($arItem["PREVIEW_PICTURE"]["ID"]);?>
									<p><?=$arFile["DESCRIPTION"];?></p>
									<div class="product_slider_img" style=" background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>);"></div>
									<? $mm = current($arItem["PRICES"]);?>
									
									<div class="product_slider_cart">
									<?if($arItem["PROPERTIES"]["NOVINKA"]["VALUE"]=="Y"){?>
										<div class="novinka block_nov">
										<img src="/img/novinka.png" alt=""/>
										<div class="descr_nov">
										Новинка!
										</div>
										</div>
										<?}?>
										<?if($arItem["PROPERTIES"]["AKCYIA"]["VALUE"]=="Y"){?>
										<div class="akcyia block_nov">
										<img src="/img/akcyia.png" alt=""/>
										<div class="descr_nov">
										<span>На товар действует</span>
<p>акция</p>
										</div>
										</div>
										<?}?>
										<?if($arItem["PROPERTIES"]["DOSTAVKA"]["VALUE"]=="Y"){?>
										<div class="dostavka block_nov">
										<img src="/img/dostavka.png" alt=""/>
										<div class="descr_nov">
										<p>Бесплатная </p>
<span class="first_dst">доставка по России</span> 
<span>при заказе от 9 900 рублей</span> 
										</div>
										</div>
										<?}?>
										<?if($arItem["PROPERTIES"]["KACHESTVO"]["VALUE"]=="Y"){?>
										<div class="kachestvo block_nov">
										<img src="/img/kachestvo.png" alt=""/>
										<div class="descr_nov">
										<span>Лучшее соотношение</span>
<p>цена - качество</p>
										</div>
										</div>
										<?}?>
									
									<?if($mm["PRINT_DISCOUNT_VALUE_VAT"]!=""){?>
										<form action="" method="get"  class="add_in_card">
											<input type="text" name="quantity" value="1">
										<input type="submit" value="">
										<input name="action" type="hidden" value="ADD2BASKET">
										<input type="hidden" name="id" value="<?=$arItem["ID"];?>">
										</form>
										<p><? $mm = current($arItem["PRICES"]);?>
									<?=$mm["PRINT_DISCOUNT_VALUE_VAT"];?></p>
									<?}?>
									</div>
									
								</div>
								<?foreach($arItem["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $k=> $im){?>
								
								<div class="item">
									<p><?=$arItem["PROPERTIES"]["MORE_PHOTO"]["DESCRIPTION"][$k];?></p>
									<div class="product_slider_img" style=" background-image: url(<?=CFile::GetPath($im);?>)"></div>
									<? $mm = current($arItem["PRICES"]);?>
									<div class="product_slider_cart">
									<?if($arItem["PROPERTIES"]["NOVINKA"]["VALUE"]=="Y"){?>
										<div class="novinka block_nov">
										<img src="/img/novinka.png" alt=""/>
										<div class="descr_nov">
										Новинка!
										</div>
										</div>
										<?}?>
										<?if($arItem["PROPERTIES"]["AKCYIA"]["VALUE"]=="Y"){?>
										<div class="akcyia block_nov">
										<img src="/img/akcyia.png" alt=""/>
										<div class="descr_nov">
										<span>На товар действует</span>
<p>акция</p>
										</div>
										</div>
										<?}?>
										<?if($arItem["PROPERTIES"]["DOSTAVKA"]["VALUE"]=="Y"){?>
										<div class="dostavka block_nov">
										<img src="/img/dostavka.png" alt=""/>
										<div class="descr_nov">
										<p>Бесплатная </p>
<span class="first_dst">доставка по России</span> 
<span>при заказе от 9 900 рублей</span> 
										</div>
										</div>
										<?}?>
										<?if($arItem["PROPERTIES"]["KACHESTVO"]["VALUE"]=="Y"){?>
										<div class="kachestvo block_nov">
										<img src="/img/kachestvo.png" alt=""/>
										<div class="descr_nov">
										<span>Лучшее соотношение</span>
<p>цена - качество</p>
										</div>
										</div>
										<?}?>
									<?if($mm["PRINT_DISCOUNT_VALUE_VAT"]!=""){?>
										<form action="" method="get"  class="add_in_card">
											<input type="text" name="quantity" value="1">
										<input type="submit" value="">
										<input name="action" type="hidden" value="ADD2BASKET">
										<input type="hidden" name="id" value="<?=$arItem["ID"];?>">
										</form>
										<p><? $mm = current($arItem["PRICES"]);?>
									<?=$mm["PRINT_DISCOUNT_VALUE_VAT"];?></p>
									<?}?>
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
									<? $mm = current($arItem["PRICES"]);?>
									<div class="product_slider_cart">
									<?if($arItem["PROPERTIES"]["NOVINKA"]["VALUE"]=="Y"){?>
										<div class="novinka block_nov">
										<img src="/img/novinka.png" alt=""/>
										<div class="descr_nov">
										Новинка!
										</div>
										</div>
										<?}?>
										<?if($arItem["PROPERTIES"]["AKCYIA"]["VALUE"]=="Y"){?>
										<div class="akcyia block_nov">
										<img src="/img/akcyia.png" alt=""/>
										<div class="descr_nov">
										<span>На товар действует</span>
<p>акция</p>
										</div>
										</div>
										<?}?>
										<?if($arItem["PROPERTIES"]["DOSTAVKA"]["VALUE"]=="Y"){?>
										<div class="dostavka block_nov">
										<img src="/img/dostavka.png" alt=""/>
										<div class="descr_nov">
										<p>Бесплатная </p>
<span class="first_dst">доставка по России</span> 
<span>при заказе от 9 900 рублей</span> 
										</div>
										</div>
										<?}?>
										<?if($arItem["PROPERTIES"]["KACHESTVO"]["VALUE"]=="Y"){?>
										<div class="kachestvo block_nov">
										<img src="/img/kachestvo.png" alt=""/>
										<div class="descr_nov">
										<span>Лучшее соотношение</span>
<p>цена - качество</p>
										</div>
										</div>
										<?}?>
									<?if($mm["PRINT_DISCOUNT_VALUE_VAT"]!=""){?>
										<form action="" method="get"  class="add_in_card">
											<input type="text" name="quantity" value="1">
										<input type="submit" value="">
										<input name="action" type="hidden" value="ADD2BASKET">
										<input type="hidden" name="id" value="<?=$arItem["ID"];?>">
										</form>
										<p><? $mm = current($arItem["PRICES"]);?>
									<?=$mm["PRINT_DISCOUNT_VALUE_VAT"];?></p>
									<?}?>
									</div>
								</div>
								<div class="item">
								
									<p><?=$arFile["DESCRIPTION"];?></p>
									<div class="product_slider_img" style=" background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>);"></div>
									<? $mm = current($arItem["PRICES"]);?>
									<div class="product_slider_cart">
									<?if($arItem["PROPERTIES"]["NOVINKA"]["VALUE"]=="Y"){?>
										<div class="novinka block_nov">
										<img src="/img/novinka.png" alt=""/>
										<div class="descr_nov">
										Новинка!
										</div>
										</div>
										<?}?>
										<?if($arItem["PROPERTIES"]["AKCYIA"]["VALUE"]=="Y"){?>
										<div class="akcyia block_nov">
										<img src="/img/akcyia.png" alt=""/>
										<div class="descr_nov">
										<span>На товар действует</span>
<p>акция</p>
										</div>
										</div>
										<?}?>
										<?if($arItem["PROPERTIES"]["DOSTAVKA"]["VALUE"]=="Y"){?>
										<div class="dostavka block_nov">
										<img src="/img/dostavka.png" alt=""/>
										<div class="descr_nov">
										<p>Бесплатная </p>
<span class="first_dst">доставка по России</span> 
<span>при заказе от 9 900 рублей</span> 
										</div>
										</div>
										<?}?>
										<?if($arItem["PROPERTIES"]["KACHESTVO"]["VALUE"]=="Y"){?>
										<div class="kachestvo block_nov">
										<img src="/img/kachestvo.png" alt=""/>
										<div class="descr_nov">
										<span>Лучшее соотношение</span>
<p>цена - качество</p>
										</div>
										</div>
										<?}?>
									<?if($mm["PRINT_DISCOUNT_VALUE_VAT"]!=""){?>
										<form action="" method="get"  class="add_in_card">
											<input type="text" name="quantity" value="1">
										<input type="submit" value="">
										<input name="action" type="hidden" value="ADD2BASKET">
										<input type="hidden" name="id" value="<?=$arItem["ID"];?>">
										</form>
										<p><? $mm = current($arItem["PRICES"]);?>
									<?=$mm["PRINT_DISCOUNT_VALUE_VAT"];?></p>
									<?}?>
									</div>
								</div>
								
							</div>
							<?}?>
							
							
							
						</div>
						<div class="col-md-6 col-sm-12" >
							
							<?foreach($arItem["PROPERTIES"]["FILES"]["VALUE"] as $k=> $im){?>
						
							<div class="col-md-12  col-xs-12  padding-left_0">
								<a href="<?=CFile::GetPath($im);?>" target="_blank" class="it_pr" download>	<?if($arItem["PROPERTIES"]["FILES"]["DESCRIPTION"][$k]!=""){?><?=$arItem["PROPERTIES"]["FILES"]["DESCRIPTION"][$k];?><?}else{?>Документ<?}?></a>
							</div>
							<?}?><div class="clear"></div>
							
						</div>
						<div class="col-md-12 col-sm-6 col-xs-12">
							<div class="to_grey">
							<div class="ttl"><h4 class="title_prod"><?=$arItem["NAME"];?></h4><?if($arItem["DETAIL_TEXT"]!=""){?><div class="open_descr">описание </div><?}?></div>
							<?foreach($arItem["DISPLAY_PROPERTIES"] as $ka){?>
									<?foreach($ka["VALUE"] as $ch=>$vv){?>
									
									<p class="prop_t"><span><?=$ka["DESCRIPTION"][$ch];?>: </span> <?=$vv;?></p>
									<?}?>
									
									<?}?>
							<div class="preview_text"><?=$arItem["PREVIEW_TEXT"];?></div>
							<div class="detail_text no"><?=$arItem["DETAIL_TEXT"];?></div><div class="clear"></div>
							</div>
						</div>	
						
						<div class="clear"></div>
					</div><!--

<?}?>
<?}?>-->
</div>
<?=$arResult["NAV_STRING"]?><?
}?>
