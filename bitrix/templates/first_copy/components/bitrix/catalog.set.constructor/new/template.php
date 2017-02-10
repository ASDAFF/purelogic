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
$this->addExternalCss("/bitrix/css/main/bootstrap.css");

$templateData = array(
	'TEMPLATE_THEME' => $this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/style.css',
	'TEMPLATE_CLASS' => 'bx-'.$arParams['TEMPLATE_THEME'],
	'CURRENCIES' => CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true)
);
$curJsId = $this->randString();
?>
<section class="pocupay_vmeste">
	<div class="container">
		<h2>Покупай вместе</h2>
		<?$ia=0;?>
		<?
$len = count($arResult["SET_ITEMS"]["DEFAULT"]);?>
		<?foreach($arResult["SET_ITEMS"]["DEFAULT"] as $arItem){?>
		
		<div class="vmeste_wr <?if($ia==0){?>hidden-sm hidden-xs hidden-md<?}?>">
			<div class="vmeste_item <?if ($ia == $len - 1) {?>last<?}?>">
				<p><?=$arItem["NAME"];?></p>
				<div class="vmeste_img" style=" background-image: url(<?=$arItem["DETAIL_PICTURE"]["src"];?>);"></div>
				<div class="vmeste_cart">
					<form action="" method="get" class="add_in_card">
										<input type="text" name="quantity" value="1">
										<input type="submit" value="">
										<input name="action" type="hidden" value="ADD2BASKET">
										<input type="hidden" name="id" value="<?=$arItem["ID"];?>">
									</form>
					<p><?=$arItem["PRICE_PRINT_DISCOUNT_VALUE"];?></p>
				</div>
				    
			</div>
			
		</div>
       <?
	   $ia++;
	   }?>
        
		<div class="vmeste_v_korzinu">
		<form action="" method="get" style="display:none" class="group_add">
										<input type="text" name="quantity" value="1">
										<input type="submit" value="">
										<input name="action" type="hidden" value="ADD2BASKET">
										<input type="hidden" name="id" value="<?=$arResult["ELEMENT"]["ID"];?>">
									</form>
			<a href="javascript:" class="add_to_group">
				<span><?=$arResult["ELEMENT"]["PRICE_PRINT_DISCOUNT_VALUE"];?></span>
				<p>добавить в корзину</p>
			</a>
			
		</div>
		<div class="col-sm-4 hidden-xs col-sm-offset-4 hidden-md hidden-lg">
			<a href="#" class="btn">
				Смотреть весь комлект
			</a>
			
		</div>
		
		
	</div>
</section>
