<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
$compositeStub = (isset($arResult['COMPOSITE_STUB']) && $arResult['COMPOSITE_STUB'] == 'Y');
?>

<a href="<?= $arParams['PATH_TO_BASKET'] ?>" class="korzina_btn">
							<span  class="icon_korzina"></span>
							<p class="hidden-xs hidden-sm cnea"> <?echo ($arResult['NUM_PRODUCTS']).' '.$arResult['PRODUCT(S)'];?> </p>
							<p class="korzina_price hidden-xs hidden-sm"> &mdash; <?= str_replace('RUB','₽',$arResult['TOTAL_PRICE']) ?> </p>
						</a>
		<? if ($APPLICATION->GetCurPage(false) !== '/'){?>				
	<?$tta=str_replace(array("RUB"," "),array("",""),$arResult['TOTAL_PRICE']);?>
<!--
индикатор бесплатной доставки
<div class="fixed_dlv <?//if((10000-$tta)<=0){?>enought<?//}?>">
	<div class="img_fx_dl">
	
		<?//if(10000-$tta>0){?><img src="/images/dst_da.png" alt=""/> <span><?//=CurrencyFormat((10000-$tta), "RUB"); ?></span><div class="descr_nov">До оформления бесплатной доставки осталось приобрести на сумму:</div><?//}else{?><img src="/images/dst_da_w.png" alt=""/> <span class="galka"><img src="/images/galka.png" alt=""/></span><div class="descr_nov">Для вас доступна услуга бесплатной доставки</div><?//}?>
	
	
	</div>
	<div class="shkala">
	<div class="zapolnenie" style="height:<?//=$tta/100;?>%">
	</div>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
	</div>
</div>
-->
<?}?>