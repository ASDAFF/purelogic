<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

<?
$first = count($arResult);
foreach($arResult as $key => $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
	<?if($arItem["SELECTED"]):?>
		<li><a href="<?=$arItem["LINK"]?>" class="selected <?if ($key == $first-1){?>last_a<?}?>"><?=$arItem["TEXT"]?></a></li>
	<?else:?>
		<li><a href="<?=$arItem["LINK"]?>" <?if ($key == $first-1){?>class="last_a"<?}?>"><?=$arItem["TEXT"]?></a></li>
	<?endif?>
	
<?endforeach?>


<?endif?>