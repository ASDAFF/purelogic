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
<?if(!empty($arResult['UF_SAYT_PAPKA_INFO_Z'])):?>
	<div class="col-md-12">
		<div class="title-optim" onclick="window.location.hash='#text-optim'">
			<img src="/img/q.png">
			<h1><?=$arResult['UF_SAYT_PAPKA_INFO_Z'];?></h1>
		</div>
	</div>
<?endif;?>

<?
if($arResult['GROUP_BLOCK'] == 'Y'){
	foreach($arResult['ITEMS_SECTION'] as $arSection){
		$arImgSection = explode(';',$arSection['UF_KARTINKI']);
		foreach($arImgSection as $key => $img){
			if(preg_match('/min.jpg/',$img)){
				$oneImgSrction = '/kartinki_dlya_razdelov/' . $img;
				unset($arImgSection[$key]);
			}
			if(empty($img)){unset($arImgSection[$key]);}
		}
	?>
	<div class="tovar_wr" id="bx_3966226736_37864">
		<div class="col-md-2  col-sm-6 col-xs-12  padding-left_0 padding-right-null">
			<div class="free-shiping">БЕСПЛАТНАЯ ДОСТАВКА</div>
			<div class="icons-product-box">
				<!--
				<?// if($arSection['UF_NOVINKA'] == 1): ?>
				<img src="<?//=SITE_TEMPLATE_PATH?>/img/icon1.png">
				<?// endif; ?>

				<?// if($arSection['UF_BESP_DOSTAVKA'] == 1): ?>
				<img src="<?//=SITE_TEMPLATE_PATH?>/img/icon2.png">
				<?// endif; ?>

				<?// if($arSection['UF_REKOMENDUEM'] == 1): ?>
				<img src="<?//=SITE_TEMPLATE_PATH?>/img/icon3.png">
				<?// endif; ?>

				<?// if($arSection['UF_AKCIONTOVAR'] == 1): ?>
				<img src="<?//=SITE_TEMPLATE_PATH?>/img/icon4.png">
				<?// endif; ?>
				-->
			</div>
			<a href="<?=$oneImgSrction?>" class="image fancybox-one" data-fancybox-group="thumb<?=$arSection['ID']?>">
			<img src="<?=$oneImgSrction;?>" alt="<?=$arSection['UF_PAPKA_ZAGOLOVOK']?>">
			</a>
			<? foreach($arImgSection as $img):?>
			<a href="/kartinki_dlya_razdelov/<?=$img?>" data-alt="<?=$arSection['UF_PAPKA_ZAGOLOVOK'] ?>" class="image fancybox-thumbs" data-fancybox-group="thumb<?=$arSection['ID']?>" style="display: none">
				<img src="/kartinki_dlya_razdelov/<?=$img;?>">
			</a>
			<?endforeach;?>
		</div>
		<div class="col-md-10 col-sm-6 col-xs-12 back-fon-yelow" style="padding-right: 0px;padding-bottom: 20px;">
			<div class="col-md-6 padding_0">
				<div class="head-product-box">
					<h4><a href="javascript:void(0);"><?=$arSection['UF_PAPKA_ZAGOLOVOK']?></a></h4>
				</div>
			</div>

			<div class="col-md-6 padding_0">
				<div class="btn-product-docs default">
					<?
					$arPropBtn = array();
					$arPropBtn[] = array($arSection['UF_SAYT_CHERTEG'],'Чертёж');
					$arPropBtn[] = array($arSection['UF_SAYT_VIDEO'],'Видео');
					$arPropBtn[] = array($arSection['UF_SAYT_INSTR'],'Инструкция');
					$arPropBtn[] = array($arSection['UF_DRAIVER'],'Драйвер');
					$arPropBtn[] = array($arSection['UF_DLINREZA'],'Длины реза');
					$arPropBtn[] = array($arSection['UF_SAYT_PO'],'ПО');
					$arPropBtn[] = array($arSection['UF_3DMODEL'],'3D-модель');
					$arPropBtn[] = array($arSection['UF_ARHIVPO'],'Архив ПО');
					$arPropBtn[] = array($arSection['UF_DEMOVERSIA'],'Демо-версия');
					$arPropBtn[] = array($arSection['UF_RUK_PO_USTANOVKE'],'Установка');
					$arPropBtn[] = array($arSection['UF_RUK_PO_NASTROIKE'],'Настройка');
					$arPropBtn[] = array($arSection['UF_RUK_PO_EKSPUATACI'],'Эксплуатация');
					$arPropBtn[] = array($arSection['UF_SAYT_POLEZNAYINF'],'Информация');
					$arPropBtn[] = array($arSection['UF_USERMANUAL'],'User Manual');
					$arPropBtn[] = array($arSection['UF_INSTALLATIONGUIDE'],'Installation Guide');
					$arPropBtn[] = array($arSection['UF_RUK_PO_PODKL'],'Подключение');
					$arPropBtn[] = array($arSection['UF_RUK_PO_SBORKE'],'Сборка');
					$arPropBtnEnd = array();
					foreach($arPropBtn as $v){
						if(strlen($v[0]) >= 1){
							$arPropBtnEnd[] = array($v[0],$v[1]);
						}
					}
					$oneProp = array_shift($arPropBtnEnd);
					?>

					<? if(isset($oneProp[0])):?>
						<div class="prod-btn-docs">
							<a href="<?=$oneProp[0]?>" style="<?if(empty($arPropBtnEnd)){?>border-right: 1px solid #c7c7c7;<?}?>"><?=$oneProp[1]?></a>
						</div>
					<? endif; ?>


					<? if(isset($arPropBtnEnd[0])):?>
						<div class="prod-btn-docs hover">
							<a href="#" class="toggle">ЗАГРУЗКИ <span class="">▼</span></a>
							<ul>
								<? foreach($arPropBtnEnd as $p){ ?>
									<li><a href="<?=$p[0]?>"><?=$p[1]?></a></li>
								<?}?>
							</ul>
						</div>
					<? endif; ?>

				<div class="clear"></div>
				</div>
			</div>
			<div class="preview-text"><?=preg_replace("/(\r\n)/", "<br/>", $arSection['~UF_SAYT_PAPKA_OPIS'])?></div>

		</div>

		<div class="col-md-12 col-sm-6 col-xs-12 product-block-all" style="padding: 0px;">
			<div class="box-products-group">
				<? foreach($arSection['ELEMENT'] as $element){
					$db_res_p = CPrice::GetList(array(), array("PRODUCT_ID" => $element['ID']));
					$price = $db_res_p->Fetch();
				?>
					<div class="box-product-gr">
						<h5><a href="javascript:void(0);"><?=$element['NAME']?></a></h5>
						<p><?=$element['DETAIL_TEXT']?></p>
						<div class="box-product-price"><?=number_format($price['PRICE'],0,'',' ')?> <?if($price['CURRENCY'] == 'RUB'){?><span class="green">₽</span><?}else{ print $price['CURRENCY'];}?></div>
						<form action="" method="get" class="add_in_card">
							<input type="text" name="quantity" value="1">
							<input type="submit" value="">
							<input name="action" type="hidden" value="ADD2BASKET">
							<input type="hidden" name="id" value="<?= $element["ID"]; ?>">
						</form>

					</div>
				<? } ?>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<?
	}
	?>

	<? if(!empty($arResult['UF_SAYT_PAPKA_INFO'])): ?>

	<div class="col-md-12" id="text-optim" style="margin-bottom: 20px">
		<h1 style="font-family: 'DINPro light';"><?=$arResult['UF_SAYT_PAPKA_INFO_Z']?></h1>
		<div class="text-optim">
		<span><?=$arResult['UF_SAYT_PAPKA_INFO']?></span>
		</div>
	</div>

	<?endif;?>


	<? if(!empty($arResult['UF_BUY_WITH_ORDER'])): ?>
	<div class="section-buy">
		<h1>С этим товаром покупают</h1>
		<?
		$arSectionId = explode(';',$arResult['UF_BUY_WITH_ORDER']);
		foreach($arSectionId as $id){
			$arFilter = array('IBLOCK_ID' => $arResult['IBLOCK_ID'],'XML_ID' => $id,'GLOBAL_ACTIVE'=>'Y');
			$rsSect = CIBlockSection::GetList(array("UF_SORTIROVKA"=>"ASC","SORT"=>"ASC"),$arFilter,false,array("UF_KARTINKI"));
			if($arSect = $rsSect->GetNext()){
				$arImgSection = explode(';',$arSect['UF_KARTINKI']);
				foreach($arImgSection as $key => $img){
					if(preg_match('/min.jpg/',$img)){
						$oneImgSrction = '/kartinki_dlya_razdelov/' . $img;
						unset($arImgSection[$key]);
					}
					if(empty($img)){unset($arImgSection[$key]);}
				}
		?>
		<div class="item-section">
			<div class="col-md-3">
				<a href="<?=$arSect['SECTION_PAGE_URL'];?>">
					<img src="<?=$oneImgSrction?>">
					<p><?=$arSect['NAME']?></p>
				</a>
			</div>
		</div>
			<?}?>
		<?}?>

	</div>
	<? endif; ?>

	<script>
		$(function(){

			$('.prod-btn-docs.hover').mouseenter(function(){
				$('.toggle',this).addClass('open');
				$('span',this).text('▲');
				$('ul',this).css('display','block');
			});
			$('.prod-btn-docs.hover').mouseleave(function(){
				$('.toggle',this).removeClass('open');
				$('span',this).text('▼');
				$('ul',this).css('display','none');
			});

			/*

			$('.btn-product-docs .toggle').click(function(){
				var link = $(this);
				var rod = $(this).parent();
				$('ul',rod).slideToggle(function(){
					if($(this).css('display') == 'block'){
						link.addClass('open');
						$('span',link).text('▲');
					}else{
						link.removeClass('open');
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
			$('.text-optim > span').readmore({
				speed: 75,
				maxHeight: 60,
				moreLink: '<a href="#" style="color:#7BB3E8">[Показать полностью]</a>',
				lessLink: '<a href="#" style="color:#7BB3E8">[Скрыть текст]</a>'
			});

			$(".fancybox-one").on("click", function () {
				$(".fancybox-thumbs",$(this).parent()).eq(0).trigger("click");
				return false;
			});
			//	$("a.image").fancybox();

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
}else {

	if (!empty($arResult['ITEMS'])) {

		foreach ($arResult['ITEMS'] as $arItem) {
			$db_res_p = CPrice::GetList(array(), array("PRODUCT_ID" => $arItem['ID']));
			$price = $db_res_p->Fetch();
			?>

			<div class="tovar_wr" id="bx_3966226736_37864" style="margin-bottom: 50px;">
				<div class="col-md-2  col-sm-6 col-xs-12  padding-left_0 element" style="position: relative;">
					<div class="icons-product-box">
						<!--
						<?// if($arItem["PROPERTIES"]["NOVINKA"]["VALUE"] == 'Y'): ?>
						<img src="<?//=SITE_TEMPLATE_PATH?>/img/icon1.png">
						<?// endif; ?>
						<?// if($arItem["PROPERTIES"]["DOSTAVKA"]["VALUE"] == 'Y'): ?>
						<img src="<?//=SITE_TEMPLATE_PATH?>/img/icon2.png">
						<?// endif; ?>
						<?// if($arItem["PROPERTIES"]["KACHESTVO"]["VALUE"] == 'Y'): ?>
						<img src="<?//=SITE_TEMPLATE_PATH?>/img/icon3.png">
						<?// endif; ?>
						<?// if($arItem["PROPERTIES"]["AKCYIA"]["VALUE"] == 'Y'): ?>
						<img src="<?//=SITE_TEMPLATE_PATH?>/img/icon4.png">
						<?// endif; ?>
						-->
					</div>

					<a href="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" class="image fancybox-one" data-fancybox-group="thumb<?=$arItem['ID']?>">
						<img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arItem['NAME'] ?>">
					</a>

					<?
					foreach($arItem["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $img) {
						?>
						<a href="<?=CFile::GetPath($img)?>" data-alt="<?=$arItem['NAME'] ?>" class="image fancybox-thumbs" data-fancybox-group="thumb<?=$arItem['ID']?>" style="display: none">
							<img src="<?=CFile::GetPath($img);?>">
						</a>
					<?}?>

				</div>
				<div class="col-md-10 col-sm-6 col-xs-12 back-fon-yelow" style="padding-right: 0px;">
					<div class="col-md-6">
						<div class="head-product-box">
							<h4><a href="javascript:void(0);"><?=$arItem['PROPERTIES']['SAYT_NAIMENOVANIEDLYASAYTA']['VALUE']  ?></a></h4>
						</div>
						<div class="col-md-6 padding_0">
							<div class="price-element-product"><?=number_format($price['PRICE'],0,'',' ')?> <?if($price['CURRENCY'] == 'RUB'){?><span class="green">₽</span><?}else{ print $price['CURRENCY'];}?></div>
						</div>
						<div class="col-md-6 padding_0">
							<form action="" method="get" class="add_in_card">
								<input type="text" name="quantity" value="1">
								<input type="submit" value="">
								<input name="action" type="hidden" value="ADD2BASKET">
								<input type="hidden" name="id" value="<?= $arItem["ID"]; ?>">
							</form>
						</div>


					</div>
					<div class="col-md-6 padding_0">
						<div class="btn-product-docs">
							<?
							$arPropBtn = array();
							$arPropBtn[] = array($arItem["PROPERTIES"]["SAYT_CHERTEZH"]["VALUE"],'Чертёж');
							$arPropBtn[] = array($arItem["PROPERTIES"]["SAYT_VIDEO"]["VALUE"],'Видео');
							$arPropBtn[] = array($arItem["PROPERTIES"]["SAYT_INSTRUKTSIYA"]["VALUE"],'Инструкция');
							$arPropBtn[] = array($arItem["PROPERTIES"]["SAYT_DRAYVER"]["VALUE"],'Драйвер');
							$arPropBtn[] = array($arItem["PROPERTIES"]["SAYT_DLINYREZA"]["VALUE"],'Длины реза');
							$arPropBtn[] = array($arItem["PROPERTIES"]["SAYT_PO"]["VALUE"],'ПО');
							$arPropBtn[] = array($arItem["PROPERTIES"]["SAYT_3DMODEL"]["VALUE"],'3D-модель');
							$arPropBtn[] = array($arItem["PROPERTIES"]["SAYT_ARKHIVPO"]["VALUE"],'Архив ПО',2);
							$arPropBtn[] = array($arItem["PROPERTIES"]["SAYT_DEMOVERSIYA"]["VALUE"],'Демо-версия',2);
							$arPropBtn[] = array($arItem["PROPERTIES"]["SAYT_RUKOVODSTVOPOUSTANOVKE"]["VALUE"],'Установка',2);
							$arPropBtn[] = array($arItem["PROPERTIES"]["SAYT_RUKOVODSTVOPONASTROYKE"]["VALUE"],'Настройка',2);
							$arPropBtn[] = array($arItem["PROPERTIES"]["SAYT_RUKOVODSTVOPOEKSPL"]["VALUE"],'Эксплуатация',2);
							$arPropBtn[] = array($arItem["PROPERTIES"]["SAYT_POLEZAYAINFORMATSIYA"]["VALUE"],'Информация',2);
							$arPropBtn[] = array($arItem["PROPERTIES"]["SAYT_USERMANUAL"]["VALUE"],'User Manual',2);
							$arPropBtn[] = array($arItem["PROPERTIES"]["SAYT_INSTALLATIONGUIDE"]["VALUE"],'Installation Guide',2);
							$arPropBtn[] = array($arItem["PROPERTIES"]["SAYT_RUKOVODSTVOPOPODKLYUCHENIYU"]["VALUE"],'Подключение',2);
							$arPropBtn[] = array($arItem["PROPERTIES"]["SAYT_RUKOVODSTVOPOSBORKE"]["VALUE"],'Сборка',2);
							$arPropBtnEnd = array();
							foreach($arPropBtn as $v){
								if(strlen($v[0]) >= 1){
									$arPropBtnEnd[] = array($v[0],$v[1],$v[2]);
								}
							}
							$oneProp = array_shift($arPropBtnEnd);
							?>

							<? if(isset($oneProp[0])):?>
							<div class="prod-btn-docs">
							<a href="<?=$oneProp[0]?>"><?=$oneProp[1]?></a>
							</div>
							<? endif; ?>

							<? if(isset($arPropBtnEnd[0])):?>
							<div class="prod-btn-docs hover">
							<a href="#" class="toggle">ЗАГРУЗКИ <span class="">▼</span></a>
								<ul>
									<? foreach($arPropBtnEnd as $p){ ?>
										<li><a href="<?=$p[0]?>"><?=$p[1]?></a></li>
									<?}?>
								</ul>
							</div>
							<? endif; ?>

							<div class="clear"></div>
						</div>
					</div>

					<div class="col-md-12">
						<div class="preview-text"><?= $arItem['DETAIL_TEXT'] ?></div>
					</div>

				</div>
				<div class="clear"></div>
			</div>

			<?
		}
		?>

		<? if(!empty($arResult['UF_SAYT_PAPKA_INFO'])): ?>

			<div class="col-md-12" id="text-optim" style="margin-bottom: 20px">
				<h1 style="font-family: 'DINPro light';"><?=$arResult['UF_SAYT_PAPKA_INFO_Z']?></h1>
				<div class="text-optim">
					<span><?=$arResult['UF_SAYT_PAPKA_INFO']?></span>
				</div>
			</div>

		<?endif;?>

		<? if(!empty($arResult['UF_BUY_WITH_ORDER'])): ?>
			<div class="section-buy">
				<h1>С этим товаром покупают</h1>
				<?
				$arSectionId = explode(';',$arResult['UF_BUY_WITH_ORDER']);
				foreach($arSectionId as $id){
					$arFilter = array('IBLOCK_ID' => $arResult['IBLOCK_ID'],'XML_ID' => $id,'GLOBAL_ACTIVE'=>'Y');
					$rsSect = CIBlockSection::GetList(array("UF_SORTIROVKA"=>"ASC","SORT"=>"ASC"),$arFilter,false,array("UF_KARTINKI"));
					if($arSect = $rsSect->GetNext()){
						$arImgSection = explode(';',$arSect['UF_KARTINKI']);
						foreach($arImgSection as $key => $img){
							if(preg_match('/min.jpg/',$img)){
								$oneImgSrction = '/kartinki_dlya_razdelov/' . $img;
								unset($arImgSection[$key]);
							}
							if(empty($img)){unset($arImgSection[$key]);}
						}
						?>
						<div class="item-section">
							<div class="col-md-3">
								<a href="<?=$arSect['SECTION_PAGE_URL'];?>">
									<img src="<?=$oneImgSrction?>">
									<p><?=$arSect['NAME']?></p>
								</a>
							</div>
						</div>
					<?}?>
				<?}?>

			</div>
		<? endif; ?>

		<script>
			$(function(){

				$('.prod-btn-docs.hover').mouseenter(function(){
					$('.toggle',this).addClass('open');
					$('span',this).text('▲');
					$('ul',this).css('display','block');
				});
				$('.prod-btn-docs.hover').mouseleave(function(){
					$('.toggle',this).removeClass('open');
					$('span',this).text('▼');
					$('ul',this).css('display','none');
				});
				/*
				$('.btn-product-docs .toggle').click(function(){
					var link = $(this);
					var rod = $(this).parent();
					$('ul',rod).slideToggle(function(){
						if($(this).css('display') == 'block'){
							link.addClass('open');
							$('span',link).text('▲');
						}else{
							link.removeClass('open');
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

				$('.text-optim > span').readmore({
					speed: 75,
					maxHeight: 60,
					moreLink: '<a href="#" style="color:#7BB3E8">[Показать полностью]</a>',
					lessLink: '<a href="#" style="color:#7BB3E8">[Скрыть текст]</a>'
				});

				$(".fancybox-one").on("click", function () {
					$(".fancybox-thumbs",$(this).parent()).eq(0).trigger("click");
					return false;
				});
				//	$("a.image").fancybox();

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




		 $arResult["NAV_STRING"] ?>

	<?
}
	?>


