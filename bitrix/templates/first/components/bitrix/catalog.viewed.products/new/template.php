<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var CBitrixComponentTemplate $this */
/** @var array $arParams */
/** @var array $arResult */
/** @global CDatabase $DB */

$frame = $this->createFrame()->begin();?>
<section class="ranee_smotreli_slider_wr">
	<h2>Ранее вы смотрели</h2>
	<div class="container">
		<div class="ranee_smotreli_slider">
		<?
foreach ($arResult['ITEMS'] as $key => $arItem)
	{?>
	
			<div class="item">
				<a href="<?=$arItem["DETAIL_PAGE_URL"];?>" class="overlay_wr" >
					
					<div class="ranee_smotreli_img" style=" background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>);">
						<div class="ranee_smotreli_hover">
							<img src="/img/hover_img.png" alt="">
						</div>
					</div>
					
				</a>
				<div class="ranee_smotreli_name">
					<p > Шпиндели коллекторные
KRESS и аналоги</p>
				</div>
			</div>
			
				
	<?
	
	}
	
	?></div>
	</div>
</section>	