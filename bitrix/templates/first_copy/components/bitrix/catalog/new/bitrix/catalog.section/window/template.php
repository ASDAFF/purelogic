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

if (!empty($arResult['ITEMS'])) {
?>
<div class="row">
	<?
foreach ($arResult['ITEMS'] as $arItem) {
	$db_res_p = CPrice::GetList(array(), array("PRODUCT_ID" => $arItem['ID']));
	$price = $db_res_p->Fetch();
	?>
	<div class="tovar_wr list_tov col-md-6" id="bx_328740560_37864" style="padding-left: 10px;padding-right: 10px">
		<div class="col-md-4  col-sm-6 col-xs-12 element padding-left_0" style="padding-right: 0px;text-align: center;">
			<div class="icons-product-box">
				<? if($arItem["PROPERTIES"]["NOVINKA"]["VALUE"] == 'Y'): ?>
					<img src="<?=SITE_TEMPLATE_PATH?>/img/icon1.png">
				<? endif; ?>
				<? if($arItem["PROPERTIES"]["DOSTAVKA"]["VALUE"] == 'Y'): ?>
					<img src="<?=SITE_TEMPLATE_PATH?>/img/icon2.png">
				<? endif; ?>
				<? if($arItem["PROPERTIES"]["KACHESTVO"]["VALUE"] == 'Y'): ?>
					<img src="<?=SITE_TEMPLATE_PATH?>/img/icon3.png">
				<? endif; ?>
				<? if($arItem["PROPERTIES"]["AKCYIA"]["VALUE"] == 'Y'): ?>
					<img src="<?=SITE_TEMPLATE_PATH?>/img/icon4.png">
				<? endif; ?>
			</div>

			<?
			if(empty($arItem['PREVIEW_PICTURE']['SRC'])){$arItem['PREVIEW_PICTURE']['SRC'] = SITE_TEMPLATE_PATH.'/img/no_photo.png';} ?>
			<a href="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" class="image fancybox-one" data-fancybox-group="thumb<?=$arItem['ID']?>">
				<img style="max-width: 165px;margin-top:10px;" src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arItem['NAME'] ?>">
			</a>

			<?
			foreach($arItem["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $img) {
				?>
				<a href="<?=CFile::GetPath($img)?>" data-alt="<?=$arItem['NAME'] ?>" class="image fancybox-thumbs" data-fancybox-group="thumb<?=$arItem['ID']?>" style="display: none">
					<img src="<?=CFile::GetPath($img);?>">
				</a>
			<?}?>
		</div>
		<div class="col-md-8 col-sm-12" style="padding-right: 0px;">

			<div class="head-product-box">
				<h4><a href="javascript:void(0);"><?=$arItem['NAME'] ?> </a></h4>
			</div>

			<table>
				<tr>
					<td>
						<div class="price-element-product">
							<?=number_format($price['PRICE'],0,'',' ')?> <?if($price['CURRENCY'] == 'RUB'){?>
								<span class="green">₽</span>
							<?}else{ print $price['CURRENCY'];}?>
						</div>
					</td>
					<td>
						<form action="" method="get" class="add_in_card">
							<input type="text" name="quantity" value="1">
							<input type="submit" value="">
							<input name="action" type="hidden" value="ADD2BASKET">
							<input type="hidden" name="id" value="<?= $arItem["ID"]; ?>">
						</form>
					</td>
				</tr>
			</table>





			<div class="btn-product-docs-element">
				<?
				$arPropBtn = array();
				$arPropBtn[] = array($arItem["PROPERTIES"]["SAYT_CHERTEZH"]["VALUE"],'Чертёж');
				$arPropBtn[] = array($arItem["PROPERTIES"]["SAYT_VIDEO"]["VALUE"],'Видео');
				$arPropBtn[] = array($arItem["PROPERTIES"]["SAYT_INSTRUKTSIYA"]["VALUE"],'Инструкция');
				$arPropBtn[] = array($arItem["PROPERTIES"]["SAYT_DRAYVER"]["VALUE"],'Драйвер');
				$arPropBtn[] = array($arItem["PROPERTIES"]["SAYT_DLINYREZA"]["VALUE"],'Длины реза');
				$arPropBtn[] = array($arItem["PROPERTIES"]["SAYT_PO"]["VALUE"],'ПО',1);
				$arPropBtn[] = array($arItem["PROPERTIES"]["SAYT_3DMODEL"]["VALUE"],'3D-модель');
				$arPropBtn[] = array($arItem["PROPERTIES"]["SAYT_ARKHIVPO"]["VALUE"],'Архив ПО');
				$arPropBtn[] = array($arItem["PROPERTIES"]["SAYT_DEMOVERSIYA"]["VALUE"],'Демо-версия');
				$arPropBtn[] = array($arItem["PROPERTIES"]["SAYT_RUKOVODSTVOPOUSTANOVKE"]["VALUE"],'Руководство по установке');
				$arPropBtn[] = array($arItem["PROPERTIES"]["SAYT_RUKOVODSTVOPONASTROYKE"]["VALUE"],'Руководство по настройке');
				$arPropBtn[] = array($arItem["PROPERTIES"]["SAYT_RUKOVODSTVOPOEKSPL"]["VALUE"],'Руководство по эксплуатации');
				$arPropBtn[] = array($arItem["PROPERTIES"]["SAYT_POLEZAYAINFORMATSIYA"]["VALUE"],'Полезная информация');
				$arPropBtn[] = array($arItem["PROPERTIES"]["SAYT_USERMANUAL"]["VALUE"],'User Manual');
				$arPropBtn[] = array($arItem["PROPERTIES"]["SAYT_INSTALLATIONGUIDE"]["VALUE"],'Installation Guide');
				$arPropBtn[] = array($arItem["PROPERTIES"]["SAYT_RUKOVODSTVOPOPODKLYUCHENIYU"]["VALUE"],'Руководство по подключению');
				$arPropBtn[] = array($arItem["PROPERTIES"]["SAYT_RUKOVODSTVOPOSBORKE"]["VALUE"],'Руководство по сборке');
				$arPropBtnEnd = array();
				foreach($arPropBtn as $v){
					if(strlen($v[0]) >= 1){
						$arPropBtnEnd[] = array($v[0],$v[1]);
					}
				}
				$oneProp = array_shift($arPropBtnEnd);
				?>

					<table>
						<tr>
							<td>
								<? if(isset($oneProp[0])):?>
									<div class="button-user-prop">
										<a href="<?=$oneProp[0] ?>"><?=$oneProp[1]?></a>
									</div>
								<? endif; ?>
							</td>
							<td class="hover-tab">
								<? if(isset($arPropBtnEnd[0])):?>
									<div class="button-user-prop toggle">
										<a href="#">Ещё <span class="">▼</span></a>
									</div>
									<ul>
										<? foreach($arPropBtnEnd as $p){ ?>
											<li><a href="<?=$p[0]?>"><?=$p[1]?></a></li>
										<?}?>
									</ul>
								<? endif; ?>
							</td>
						</tr>
					</table>

			</div>

			<div class="clear"></div>

		</div>
		<div class="col-md-12 col-sm-6 col-xs-12 back-fon-yelow" style="padding-left: 0px">

			<div class="preview-text"><?= $arItem['DETAIL_TEXT'] ?></div>
		</div>

		<div class="clear"></div>
	</div>

	<?
	}
	?>
</div>
	<script>
		$(function(){
			$('.hover-tab').mouseenter(function(){
				$('.toggle',this).addClass('open');
				$('span',this).text('▲');
				$('ul',this).css('display','block');
			});
			$('.hover-tab').mouseleave(function(){
				$('.toggle',this).removeClass('open');
				$('span',this).text('▼');
				$('ul',this).css('display','none');
			});
			/*
			$('.btn-product-docs-element .toggle').mouseenter(function(){
				var link = $('a',this);
				var div = $(this);
				var rod = $(this).parent().parent().parent().parent().parent();
				$('ul',rod).slideToggle(function(){
					if($(this).css('display') == 'block'){
						div.addClass('open');
						$('span',link).text('▲');
					}else{
						div.removeClass('open');
						$('span',link).text('▼');
					}
				});
				return false;
			});
			*/

			$('.preview-text').readmore({
				speed: 75,
				maxHeight: 70,
				moreLink: '<a href="#" style="color:#7BB3E8">[Показать полностью]</a>',
				lessLink: '<a href="#" style="color:#7BB3E8">[Скрыть текст]</a>'
			});

			$(".fancybox-one").on("click", function () {
				$(".fancybox-thumbs",$(this).parent()).eq(0).trigger("click");
				return false;
			});

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : true,
				arrows    : true,
				nextClick : true,
				beforeShow: function () {
					var imgAlt = $(this.element).find("img").attr("alt");
					var dataAlt = $(this.element).data("alt");
					if (imgAlt) {
						$(".fancybox-image").attr("alt", imgAlt);
					} else if (dataAlt) {
						$(".fancybox-image").attr("alt", dataAlt);
					}
				},
				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});
		});
	</script>
	<?
}




if (empty($arResult['ITEMS']))
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
