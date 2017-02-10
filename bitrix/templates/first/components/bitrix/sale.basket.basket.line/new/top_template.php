<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
$compositeStub = (isset($arResult['COMPOSITE_STUB']) && $arResult['COMPOSITE_STUB'] == 'Y');
?>

<a href="<?= $arParams['PATH_TO_BASKET'] ?>" class="korzina_btn">
							<span  class="icon_korzina"></span>
							<p class="hidden-xs hidden-sm"><?echo ($arResult['NUM_PRODUCTS']).' '.$arResult['PRODUCT(S)'];?> –</p>
							<p class="korzina_price hidden-xs hidden-sm"><?= $arResult['TOTAL_PRICE'] ?></p>
						</a>
