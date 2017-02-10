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
<section class="slider_main hidden-sm hidden-xs">
	<div class="main_slider">
	    
	   
	    
	   
 


<?foreach($arResult["ITEMS"] as $arItem):?>
	<?if($arItem["PROPERTIES"]["TEMPLATE"]["VALUE"]=="Шаблон изображение с текстом"){?>
	<div class="item dostavka_sl" style=" background-image: url('<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>');">
		    <div class="container">
		    	<div class="row">
		    		<div class="col-md-4 col-md-offset-1">
		    			<h1><?=$arItem["NAME"];?></h1>
		    			<h2><?=$arItem["PROPERTIES"]["TITLE_DOP"]["VALUE"];?></h2>
		    			<?=$arItem["PREVIEW_TEXT"];?>
		    			<?if($arItem["PROPERTIES"]["BUTTON_URL"]["VALUE"]!="" && $arItem["PROPERTIES"]["BUTTON_TEXT"]["VALUE"]!=""){?><a href="<?=$arItem["PROPERTIES"]["BUTTON_URL"]["VALUE"];?>"><?=$arItem["PROPERTIES"]["BUTTON_TEXT"]["VALUE"];?></a><?}?>
		    		</div>
		    	</div>
		    </div>
		</div>
		<?}elseif($arItem["PROPERTIES"]["TEMPLATE"]["VALUE"]=="Шаблон с покупкой товара"){?>
		 <div class="item main_sl_1"  style="background-image: url('/img/sl_1_bg.jpg');">
	    	<div class="container">
	    		<div class="row">
	    			<div class="col-md-7">
	    				<div class="img_sl_1_wrap">
	    					<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>" alt="">
	    				</div>
	    			</div>
	    			<div class="col-md-5">
	    					<div class="sl_1_content">
	    						<h4><?=$arItem["NAME"];?></h4>
	    						<?=$arItem["PREVIEW_TEXT"];?>
	    						<?if($arItem["PROPERTIES"]["EL_ID"]["VALUE"]!=""){?><a href="?action=ADD2BASKET&id=<?=$arItem["PROPERTIES"]["EL_ID"]["VALUE"];?>" class="btn_lt_green">купить</a><?}?>
	    						
								<?if($arItem["PROPERTIES"]["BUTTON_URL"]["VALUE"]!="" && $arItem["PROPERTIES"]["BUTTON_TEXT"]["VALUE"]!=""){?><a href="<?=$arItem["PROPERTIES"]["BUTTON_URL"]["VALUE"];?>" class="tr_btn"><?=$arItem["PROPERTIES"]["BUTTON_TEXT"]["VALUE"];?></a><?}?>
	    					</div>
	    				
	    			</div>
	    		</div>
	    	</div>
	    </div>
		<?}else{?>
		 <div class="item" style=" background-image: url('<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>');">
	    	
	    </div>
		<?}?>
<?endforeach;?>

	</div>
</section>
