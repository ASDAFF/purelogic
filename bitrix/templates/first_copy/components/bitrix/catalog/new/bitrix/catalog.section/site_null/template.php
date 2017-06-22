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
<div class="section-win">
<?
	foreach($arResult['ITEMS_SECTION'] as $arSection){
		$arImgSection = explode(';',$arSection['UF_KARTINKI']);
		$oneImgSrction = '';
		foreach($arImgSection as $key => $img){
			if(preg_match('/min.jpg/',$img)){
				$oneImgSrction = '/kartinki_dlya_razdelov/' . $img;
				unset($arImgSection[$key]);
			}
			if(empty($img)){unset($arImgSection[$key]);}
		}

?>

	<div class="section-item">
		<a href="<?=$arSection['SECTION_PAGE_URL'];?>">
			<? if(empty($oneImgSrction)): ?>
				<img src="/img/nophoto.png">
			<?else:?>
				<img src="<?=$oneImgSrction?>">
			<?endif?>
			<p><?=$arSection['NAME'];?></p>
		</a>
	</div>

	<?

	}
	?>

</div>

<? if(!empty($arResult['UF_SAYT_PAPKA_INFO_Z'])): ?>
<div class="col-md-12">
	<div class="title-optim">
		<img src="/img/q.png">
		<h1><?=$arResult['UF_SAYT_PAPKA_INFO_Z']?></h1>
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