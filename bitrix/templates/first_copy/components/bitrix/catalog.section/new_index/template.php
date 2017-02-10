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
$t=0;
$i==0;

foreach($arResult["ITEMS"] as $arItem){
$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
	$strMainID = $this->GetEditAreaId($arItem['ID']);
if($i==0){?><div class="img <?if($t==0){?>current<?}?>"><?}?>

<?if(count($arItem["OFFERS"])>0){?>
<div class="col-md-4 col-sm-6 col-xs-12 padding-left_0 padding0 new_tovar_index" id="<? echo $strMainID; ?>">
<div class="name_new_t">
<a href="<?=$arItem["DETAIL_PAGE_URL"];?>"><?=$arItem["NAME"];?></a>
</div>
						<div class="">
						<?
						
						$prc=0;
						foreach($arItem["OFFERS"] as $off){
						
						if($off["MIN_PRICE"]["VALUE_NOVAT"]>$prc)
						{
						$prc=$off["MIN_PRICE"]["VALUE_NOVAT"];
						$price_off=$off["MIN_PRICE"]["PRINT_VALUE_NOVAT"];
						}
						}
						?> 
							<?if($arItem["PROPERTIES"]["MORE_PHOTO"]["VALUE"][0]!=""){?>
							<div class="product_slider">
								<div class="item">
									<?$arFile = CFile::GetFileArray($arItem["PREVIEW_PICTURE"]["ID"]);?>
									<p><?=$arFile["DESCRIPTION"];?></p>
									<div class="product_slider_img" onclick="window.location='<?=$arItem["DETAIL_PAGE_URL"];?>'" style=" background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>);"></div>

									<div class="product_slider_cart">
										<p><?=$price_off;?></p>
									</div>
								</div>
								<?foreach($arItem["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $k=> $im){?>
								
								<div class="item">
									<p><?=$arItem["PROPERTIES"]["MORE_PHOTO"]["DESCRIPTION"][$k];?></p>
									<div class="product_slider_img" onclick="window.location='<?=$arItem["DETAIL_PAGE_URL"];?>'" style=" background-image: url(<?=CFile::GetPath($im);?>)"></div>
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
										<p>
									<?=$price_off;?></p>
									</div>
								</div>	
								<?}?>
							</div>
							<?}else{?>
							
							<div class="product_slider">
								<div class="item">
								<?$arFile = CFile::GetFileArray($arItem["PREVIEW_PICTURE"]["ID"]);?>
									<p><?=$arFile["DESCRIPTION"];?></p>
									<div class="product_slider_img" onclick="window.location='<?=$arItem["DETAIL_PAGE_URL"];?>'" style=" background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>);"></div>
									<div class="product_slider_cart">
										<p>
									<?=$price_off;?></p>
									</div>
								</div>
								<div class="item">
								
									<p><?=$arFile["DESCRIPTION"];?></p>
									<div class="product_slider_img" onclick="window.location='<?=$arItem["DETAIL_PAGE_URL"];?>'" style=" background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>);"></div>
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
										<p>
									<?=$price_off;?></p>
									</div>
								</div>
								
							</div>
							<?}?>
						</div>
						
					
						

					</div>	
<?}else{?>
<div class="col-md-4 padding0 padding-left_0 col-sm-6 col-xs-12  new_tovar_index" id="<? echo $strMainID; ?>">

						<div >
							<?if($arItem["PROPERTIES"]["MORE_PHOTO"]["VALUE"][0]!=""){?>
							<div class="product_slider">
								<div class="item">
									<?$arFile = CFile::GetFileArray($arItem["PREVIEW_PICTURE"]["ID"]);?>
									<p><?=$arFile["DESCRIPTION"];?></p>
									<div class="product_slider_img" onclick="window.location='<?=$arItem["DETAIL_PAGE_URL"];?>'" style=" background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>);"></div>
									<? $mm = current($arItem["PRICES"]);?>

									<div class="product_slider_cart">
									<div class="name_new_t">
									<a href="<?=$arItem["DETAIL_PAGE_URL"];?>"><?=$arItem["NAME"];?></a>
									</div>
									<?if($mm["PRINT_DISCOUNT_VALUE_VAT"]!=""){?>
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
										<p><? $mm = current($arItem["PRICES"]);?>
									<?=$mm["PRINT_DISCOUNT_VALUE_VAT"];?></p>
									<?}?>
									</div>
									
								</div>
								<?foreach($arItem["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $k=> $im){?>
								
								<div class="item">
									<p><?=$arItem["PROPERTIES"]["MORE_PHOTO"]["DESCRIPTION"][$k];?></p>
									<div class="product_slider_img" onclick="window.location='<?=$arItem["DETAIL_PAGE_URL"];?>'" style=" background-image: url(<?=CFile::GetPath($im);?>)"></div>
									<? $mm = current($arItem["PRICES"]);?>
									<div class="name_new_t">
									<a href="<?=$arItem["DETAIL_PAGE_URL"];?>"><?=$arItem["NAME"];?></a>
									</div>
									<div class="product_slider_cart">
									<?if($mm["PRINT_DISCOUNT_VALUE_VAT"]!=""){?>
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
									<div class="product_slider_img" onclick="window.location='<?=$arItem["DETAIL_PAGE_URL"];?>'" style=" background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>);"></div>
									<? $mm = current($arItem["PRICES"]);?>
									<div class="product_slider_cart">
									<?if($mm["PRINT_DISCOUNT_VALUE_VAT"]!=""){?>
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
<span>при заказе от 9 900 рублей</span> 										</div>
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
										<p><? $mm = current($arItem["PRICES"]);?>
									<?=$mm["PRINT_DISCOUNT_VALUE_VAT"];?></p>
									<?}?>
									</div>
								</div>
								<div class="item">
								
									<p><?=$arFile["DESCRIPTION"];?></p>
									<div class="product_slider_img" onclick="window.location='<?=$arItem["DETAIL_PAGE_URL"];?>'" style=" background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>);"></div>
									<? $mm = current($arItem["PRICES"]);?>
									<div class="product_slider_cart">
									<?if($mm["PRINT_DISCOUNT_VALUE_VAT"]!=""){?>
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
										<p><? $mm = current($arItem["PRICES"]);?>
									<?=$mm["PRINT_DISCOUNT_VALUE_VAT"];?></p>
									<?}?>
									</div>
								</div>
								
							</div>
							<?}?>
							
							
							
						</div>
						
					</div>	

<?}?>
<?
	$i++;
	$t++;
	if($i==9){?></div><?$i=0;}?>
<?}?>
<?if($i!=0){?></div><?}?>
<?
}?>
