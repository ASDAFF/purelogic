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
<div class="products-home">
	<div class="product-home">

		<table>
			<?
			$arSect = array_chunk($arResult['ITEMS_SECTION'], 5);
			for($i = 0; $i < count($arSect); $i++ ){
				?>
				<tr>
					<?
					foreach($arSect[$i] as $elem){
						$arImgSection = explode(';',$elem['UF_KARTINKI']);
						$oneImgSrction = '';
						foreach($arImgSection as $key => $img){
							if(preg_match('/min.jpg/',$img)){
								$oneImgSrction = '/kartinki_dlya_razdelov/' . $img;
								unset($arImgSection[$key]);
							}
							if(empty($img)){unset($arImgSection[$key]);}
						}
						?>
						<td>
							<div class="box-home-product">
								<a href="<?=$elem['SECTION_PAGE_URL'];?>">
									<? if(empty($oneImgSrction)): ?>
										<img src="/img/nophoto.png">
									<?else:?>
										<img src="<?=$oneImgSrction?>">
									<?endif?>
									<div class="name-home-product"><?=$elem['NAME'];?></div>
								</a>
							</div>
						</td>
						<?
					}
					?>
				</tr>
				<?
			}
			?>
		</table>

	</div>

</div>


<? if(!empty($arResult['UF_SAYT_PAPKA_INFO_Z'])): ?>
<div class="col-md-12">
	<div class="title-optim">
		<img src="/img/q.png">
		<span><?=$arResult['UF_SAYT_PAPKA_INFO_Z']?></span>
	</div>
</div>
<? endif; ?>
<? if(!empty($arResult['UF_SAYT_PAPKA_INFO'])): ?>
<div class="col-md-12">
	<div class="text-optim">
		<span><?=$arResult['UF_SAYT_PAPKA_INFO']?></span>
	</div>
</div>
<? endif; ?>
<script>
	$(function(){

		$('.text-optim > span').readmore({
			speed: 75,
			maxHeight: 60,
			moreLink: '<a href="#" style="color:#7BB3E8">[Показать полностью]</a>',
			lessLink: '<a href="#" style="color:#7BB3E8">[Скрыть текст]</a>'
		});

	});
</script>