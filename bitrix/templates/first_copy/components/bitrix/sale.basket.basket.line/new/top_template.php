<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
$compositeStub = (isset($arResult['COMPOSITE_STUB']) && $arResult['COMPOSITE_STUB'] == 'Y');
?>

	<li>
		<a href="<?= $arParams['PATH_TO_BASKET'] ?>" class="cart-name">Корзина</a>
	</li>

	<li class="korzina_price"><?echo ($arResult['NUM_PRODUCTS']).' '.$arResult['PRODUCT(S)'];?></li>
	<li class="cnea"><?= str_replace('RUB','₽',$arResult['TOTAL_PRICE']) ?></li>



	<!--		--><?// if ($APPLICATION->GetCurPage(false) !== '/'){?><!--				-->
	<!--			--><?//$tta=str_replace(array("RUB"," "),array("",""),$arResult['TOTAL_PRICE']);?>
	<!--		--><?//}?>