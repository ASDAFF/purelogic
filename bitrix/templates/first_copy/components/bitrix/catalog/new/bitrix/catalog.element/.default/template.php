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
$templateLibrary = array('popup');
$currencyList = '';
if (!empty($arResult['CURRENCIES']))
{
	$templateLibrary[] = 'currency';
	$currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}
$templateData = array(
	'TEMPLATE_THEME' => $this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/style.css',
	'TEMPLATE_CLASS' => 'bx_'.$arParams['TEMPLATE_THEME'],
	'TEMPLATE_LIBRARY' => $templateLibrary,
	'CURRENCIES' => $currencyList
);
unset($currencyList, $templateLibrary);


?>

<section class="product" style="margin-top:0px; clear:both;">
	
			<!-- SITEBAR -->
			

			
				
			
				<h3 class="name_section"><?=$arResult["NAME"];?></h3>
<div class="col-md-4 col-sm-4 padding-left_0">
						<?if(count($arResult["OFFERS"])>0){?>
							<?if($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"][0]!=""){?>
							<div class="product_slider">
								<div class="item">
									<?$arFile = CFile::GetFileArray($arResult["PREVIEW_PICTURE"]["ID"]);?>
									<p><?=$arFile["DESCRIPTION"];?></p>
									<div class="product_slider_img" style=" background-image: url(<?=$arResult["PREVIEW_PICTURE"]["SRC"];?>);"></div>
									<div class="product_slider_cart">
										
									</div>
								</div>
								<?foreach($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $k=> $im){?>
								
								<div class="item">
									<p><?=$arResult["PROPERTIES"]["MORE_PHOTO"]["DESCRIPTION"][$k];?></p>
									<div class="product_slider_img" style=" background-image: url(<?=CFile::GetPath($im);?>)"></div>
									<div class="product_slider_cart">
										
									</div>
								</div>	
								<?}?>
							</div>
							<?}else{?>
							
							<div class="product_slider">
								<div class="item">
								<?$arFile = CFile::GetFileArray($arResult["PREVIEW_PICTURE"]["ID"]);?>
									<p><?=$arFile["DESCRIPTION"];?></p>
									<div class="product_slider_img" style=" background-image: url(<?=$arResult["PREVIEW_PICTURE"]["SRC"];?>);"></div>
									<div class="product_slider_cart">
										
									</div>
								</div>
								<div class="item">
								
									<p><?=$arFile["DESCRIPTION"];?></p>
									<div class="product_slider_img" style=" background-image: url(<?=$arResult["PREVIEW_PICTURE"]["SRC"];?>);"></div>
									<div class="product_slider_cart">
										
									</div>
								</div>
								
							</div>
							<?}?>
							
						
							<?}else{?>
							<?if($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"][0]!=""){?>
							<div class="product_slider">
								<div class="item">
									<?$arFile = CFile::GetFileArray($arResult["PREVIEW_PICTURE"]["ID"]);?>
									<p><?=$arFile["DESCRIPTION"];?></p>
									<div class="product_slider_img" style=" background-image: url(<?=$arResult["PREVIEW_PICTURE"]["SRC"];?>);"></div>
									<? $mm = current($arResult["PRICES"]);?>
									
									<div class="product_slider_cart">
									<?if($mm["PRINT_DISCOUNT_VALUE_VAT"]!=""){?>
										<form action="" method="get"  class="add_in_card">
											<input type="text" name="quantity" value="1">
										<input type="submit" value="">
										<input name="action" type="hidden" value="ADD2BASKET">
										<input type="hidden" name="id" value="<?=$arResult["ID"];?>">
										</form>
										<p><? $mm = current($arResult["PRICES"]);?>
									<?=$mm["PRINT_DISCOUNT_VALUE_VAT"];?></p>
									<?}?>
									</div>
									
								</div>
								<?foreach($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $k=> $im){?>
								
								<div class="item">
									<p><?=$arResult["PROPERTIES"]["MORE_PHOTO"]["DESCRIPTION"][$k];?></p>
									<div class="product_slider_img" style=" background-image: url(<?=CFile::GetPath($im);?>)"></div>
									<? $mm = current($arResult["PRICES"]);?>
									<div class="product_slider_cart">
									<?if($mm["PRINT_DISCOUNT_VALUE_VAT"]!=""){?>
										<form action="" method="get"  class="add_in_card">
											<input type="text" name="quantity" value="1">
										<input type="submit" value="">
										<input name="action" type="hidden" value="ADD2BASKET">
										<input type="hidden" name="id" value="<?=$arResult["ID"];?>">
										</form>
										<p><? $mm = current($arResult["PRICES"]);?>
									<?=$mm["PRINT_DISCOUNT_VALUE_VAT"];?></p>
									<?}?>
									</div>
								</div>	
								<?}?>
							</div>
							<?}else{?>
							
							<div class="product_slider">
								<div class="item">
								<?$arFile = CFile::GetFileArray($arResult["PREVIEW_PICTURE"]["ID"]);?>
									<p><?=$arFile["DESCRIPTION"];?></p>
									<div class="product_slider_img" style=" background-image: url(<?=$arResult["PREVIEW_PICTURE"]["SRC"];?>);"></div>
									<? $mm = current($arResult["PRICES"]);?>
									<div class="product_slider_cart">
									<?if($mm["PRINT_DISCOUNT_VALUE_VAT"]!=""){?>
										<form action="" method="get"  class="add_in_card">
											<input type="text" name="quantity" value="1">
										<input type="submit" value="">
										<input name="action" type="hidden" value="ADD2BASKET">
										<input type="hidden" name="id" value="<?=$arResult["ID"];?>">
										</form>
										<p><? $mm = current($arResult["PRICES"]);?>
									<?=$mm["PRINT_DISCOUNT_VALUE_VAT"];?></p>
									<?}?>
									</div>
								</div>
								<div class="item">
								
									<p><?=$arFile["DESCRIPTION"];?></p>
									<div class="product_slider_img" style=" background-image: url(<?=$arResult["PREVIEW_PICTURE"]["SRC"];?>);"></div>
									<? $mm = current($arResult["PRICES"]);?>
									<div class="product_slider_cart">
									<?if($mm["PRINT_DISCOUNT_VALUE_VAT"]!=""){?>
										<form action="" method="get"  class="add_in_card">
											<input type="text" name="quantity" value="1">
										<input type="submit" value="">
										<input name="action" type="hidden" value="ADD2BASKET">
										<input type="hidden" name="id" value="<?=$arResult["ID"];?>">
										</form>
										<p><? $mm = current($arResult["PRICES"]);?>
									<?=$mm["PRINT_DISCOUNT_VALUE_VAT"];?></p>
									<?}?>
									</div>
								</div>
								
							</div>
							<?}?>
							<?}?>
							<?if(count($arResult["OFFERS"])>0){?>	<span class="togle_clas_tovar"><p>Развернуть +</p></span>
						<div class="clas_tovar_wr">
						<?foreach($arResult["OFFERS"] as $off){?>
						
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
							

					
						</div><?}else{?>
							<a href="<?=$arResult["ADD_URL"];?>" class="btn">Добавить в корзину</a><?}?> 
					<div class="product_a">
						<?foreach($arResult["PROPERTIES"]["FILES"]["VALUE"] as $k=> $im){?>
						
							
								<a href="<?=CFile::GetPath($im);?>" target="_blank" download>	<?if($arResult["PROPERTIES"]["FILES"]["DESCRIPTION"][$k]!=""){?><?=$arResult["PROPERTIES"]["FILES"]["DESCRIPTION"][$k];?><?}else{?>Документ<?}?></a>
							
							<?}?>
					</div>
					<div class="button_share">
					<script type="text/javascript">(function() {
  if (window.pluso)if (typeof window.pluso.start == "function") return;
  if (window.ifpluso==undefined) { window.ifpluso = 1;
    var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
    s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
    s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
    var h=d[g]('body')[0];
    h.appendChild(s);
  }})();</script>
<div class="pluso" data-background="transparent" data-options="medium,square,line,horizontal,nocounter,theme=04" data-services="vkontakte,odnoklassniki,facebook,twitter,google"></div>
						</div>
						</div>
				


				<div class="col-md-8 col-sm-8">
					<h5><?=$arResult["NAME"];?></h5>
					<ul>
						<?foreach($arResult["DISPLAY_PROPERTIES"] as $ka){?>
									<?foreach($ka["VALUE"] as $ch=>$vv){?>
									
									<li>- <?=$ka["DESCRIPTION"][$ch];?> <?=$vv;?></li>
									<?}?>
									
									<?}?>
						
						
					</ul>
					<div style="margin-top:15px">
<?=$arResult["DETAIL_TEXT"];?>
</div>
</div>
			
		
</section>
 
