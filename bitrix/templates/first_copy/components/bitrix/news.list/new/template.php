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

<div id="P_MS5877436886f57" class="master-slider-parent ms-parent-id-62">


	<!-- MasterSlider Main -->
	<div id="MS5877436886f57" class="master-slider ms-skin-light-3" >

		<?foreach($arResult["ITEMS"] as $arItem):?>
		<div  class="ms-slide" data-delay="10" data-fill-mode="fill"   >

			<? if(preg_match('/iframe/',$arItem["PREVIEW_TEXT"],$preg)){?>
			<?=$arItem["PREVIEW_TEXT"];?>
			<?}else{?>
			<? if(!empty($arItem["PREVIEW_TEXT"])){?>
			<div class="ms-slider-text-box"><?=$arItem["PREVIEW_TEXT"];?></div>
			<?}?>
			<img src="http://www.masterslider.com/wp-content/plugins/masterslider/public/assets/css/blank.gif" alt="" title="" data-src="<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>" />
			<?}?>
		</div>
		<?endforeach;?>

	</div>
	<!-- END MasterSlider Main -->



</div>


<script>

	"use strict";
	var masterslider_6f57 = new MasterSlider();

	// slider controls
	masterslider_6f57.control('arrows'     ,{ autohide:false, overVideo:true  });
	masterslider_6f57.control('bullets'    ,{ autohide:false, overVideo:true, dir:'h', align:'bottom', space:5 , margin:10  });
	masterslider_6f57.control('timebar'    ,{ autohide:false, overVideo:true, align:'bottom', color:'#8FBB3F'  , width:4 });


	// slider setup
	masterslider_6f57.setup("MS5877436886f57", {
		width           : 860,
		height          : 405,
		minHeight       : 0,
		space           : 0,
		start           : 1,
		grabCursor      : true,
		swipe           : true,
		mouse           : true,
		keyboard        : false,
		layout          : "boxed",
		wheel           : false,
		autoplay        : true,
		instantStartLayers:false,
		loop            : true,
		shuffle         : false,
		preload         : 0,
		heightLimit     : true,
		autoHeight      : false,
		smoothHeight    : true,
		endPause        : false,
		overPause       : true,
		fillMode        : "fill",
		centerControls  : true,
		startOnAppear   : false,
		layersMode      : "center",
		autofillTarget  : "",
		hideLayers      : false,
		fullscreenMargin: 0,
		speed           : 50,
		dir             : "h",
		parallaxMode    : 'swipe',
		view            : "basic"
	});


	window.masterslider_instances = window.masterslider_instances || [];
	window.masterslider_instances.push( masterslider_6f57 );


</script>