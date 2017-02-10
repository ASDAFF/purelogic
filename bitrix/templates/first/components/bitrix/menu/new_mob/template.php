<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

<ul class="topnav hidden-lg hidden-md topnav_adapt ">
<?
$previousLevel = 0;
foreach($arResult as $arItem):
?>
<?if($arItem["DEPTH_LEVEL"]>1){?>
	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>
			<li<?if($arItem["CHILD_SELECTED"] !== true):?> class="close"<?endif?>>
				
				<a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
				<ul>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>
				<li>
					
					<a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
				</li>
		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>
<?}else{?>
<?if($arItem["DEPTH_LEVEL"] < $previousLevel){?></ul></li><?}?>
<a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
<?$previousLevel = $arItem["DEPTH_LEVEL"];?>
<?}?>
<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

</ul>

<?endif?>