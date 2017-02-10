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
<? if(!empty($arResult["ITEMS"])): ?>
<div class="news-list">
	<div class="news-list-hidden-box">
		<div class="news-list-hidden-box-close">x</div>
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?=$arItem['PREVIEW_TEXT']; ?>
		<?endforeach;?>
	</div>
</div>
<? endif; ?>
<script>
	$(function(){
		$('.news-list-hidden-box-close').click(function(){
			$('.news-list-hidden-box').parent().remove();
			$.get( "/ajax/ajax-hidden-block-news-home.php", { news: "N" } )
				.done(function( data ) {
					console.log(data);
				});
		});
	});
</script>
