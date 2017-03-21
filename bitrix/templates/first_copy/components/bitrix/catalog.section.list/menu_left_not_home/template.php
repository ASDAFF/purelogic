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

$arViewModeList = $arResult['VIEW_MODE_LIST'];

$arViewStyles = array(
	'LIST' => array(
		'CONT' => 'bx_sitemap',
		'TITLE' => 'bx_sitemap_title',
		'LIST' => 'bx_sitemap_ul',
	),
	'LINE' => array(
		'CONT' => 'bx_catalog_line',
		'TITLE' => 'bx_catalog_line_category_title',
		'LIST' => 'bx_catalog_line_ul',
		'EMPTY_IMG' => $this->GetFolder().'/images/line-empty.png'
	),
	'TEXT' => array(
		'CONT' => 'bx_catalog_text',
		'TITLE' => 'bx_catalog_text_category_title',
		'LIST' => 'bx_catalog_text_ul'
	),
	'TILE' => array(
		'CONT' => 'bx_catalog_tile',
		'TITLE' => 'bx_catalog_tile_category_title',
		'LIST' => 'bx_catalog_tile_ul',
		'EMPTY_IMG' => $this->GetFolder().'/images/tile-empty.png'
	)
);
$arCurView = $arViewStyles[$arParams['VIEW_MODE']];

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

?><div class="<? echo $arCurView['CONT']; ?>"><?

if (0 < $arResult["SECTIONS_COUNT"])
{
?>
<ul class="new_left_menu">
<?	foreach ($arResult['SECTIONS'] as &$arSection)
			{
				if(!empty($arSection['UF_KARTINKI']) and $arSection['DEPTH_LEVEL'] == 1) {
					$arImgSection = explode(';', $arSection['UF_KARTINKI']);
					foreach ($arImgSection as $key => $img) {
						if (preg_match('/ico.png/', $img)) {
							$oneImgSrctionIco = '/kartinki_dlya_razdelov/' . $img;
						}
					}
				}

				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
				if($arSection["DEPTH_LEVEL"]==1){?>
				
				<li data-id="uli_<?=$arSection["ID"];?>">

					<span style="background-image: url(<?=$oneImgSrctionIco?>)"></span>
					<div class="text-name-section" <? if(strlen($arSection['NAME']) > 30){?>style="padding:0px"<?}?>><?=$arSection['NAME']?> </div>
				</li>
				<?}}?>
</ul><?}?>
</div>
<div class="its_r_mns">
<div class="">
<div class=" ">
	<?
	$TOP_DEPTH = $arResult["SECTION"]["DEPTH_LEVEL"];
	$CURRENT_DEPTH = $TOP_DEPTH;

	foreach($arResult["SECTIONS"] as $k => $arSection){if($arSection['UF_SAYT_PAPKA_TIP'] == 2){ unset($arResult["SECTIONS"][$k]); }}
	foreach($arResult["SECTIONS"] as $arSection)
	{
	
	if($arSection["DEPTH_LEVEL"]>1){
	$stra="";
	$selected="";
	if($arSection["DEPTH_LEVEL"]>3)
	$stra='style="display:none"';
	if($arSection["DEPTH_LEVEL"]<3)
	$selected='class="selected"';
		$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
		$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
		if($CURRENT_DEPTH < $arSection["DEPTH_LEVEL"])
		{
			echo "\n",str_repeat("\t", $arSection["DEPTH_LEVEL"]-$TOP_DEPTH),"<ul  ".$stra.">";
		}
		elseif($CURRENT_DEPTH == $arSection["DEPTH_LEVEL"])
		{
			echo "</li>";
		}
		else
		{
			while($CURRENT_DEPTH > $arSection["DEPTH_LEVEL"])
			{
				echo "</li>";
				echo "\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH),"</ul>","\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH-1);
				$CURRENT_DEPTH--;
			}
			echo "\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH),"</li>";
		}

		$count = $arParams["COUNT_ELEMENTS"] && $arSection["ELEMENT_CNT"] ? "&nbsp;(".$arSection["ELEMENT_CNT"].")" : "";

		if ($_REQUEST['SECTION_ID']==$arSection['ID'])
		{
			$link = '<b>'.$arSection["NAME"].$count.'</b>';
			$strTitle = $arSection["NAME"];
		}
		else
		{
			$link = '<a href="'.$arSection["SECTION_PAGE_URL"].'">'.$arSection["NAME"].$count.'</a>';
		}

		echo "\n",str_repeat("\t", $arSection["DEPTH_LEVEL"]-$TOP_DEPTH);
		?><li <?=$selected;?> id="<?=$this->GetEditAreaId($arSection['ID']);?>"><?=$link?><?

		$CURRENT_DEPTH = $arSection["DEPTH_LEVEL"];
	}
	else
	{
	
	while($CURRENT_DEPTH > $TOP_DEPTH)
	{
		echo "</li>";
		echo "\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH),"</ul>","\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH-1);
		$CURRENT_DEPTH--;
	}
	?>
	</div></div>

	<div id="uli_<?=$arSection["ID"];?>" class="go_menu_left"><div class="lftnnv section_leftnav">

	<?}
	}

	while($CURRENT_DEPTH > $TOP_DEPTH)
	{
		echo "</li>";
		echo "\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH),"</ul>","\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH-1);
		$CURRENT_DEPTH--;
	}
	?>
</div>
</div>

<script>

jQuery(".lftnnv.section_leftnav").prepend('<ul class="its_first_l"></ul>');
jQuery(".lftnnv.section_leftnav").each(function(){
jQuery(this).children().children().sort(function (a, b) {
    return $(a).height() < $(b).height() ? 1 : -1;  
}).appendTo(jQuery(this).find('.its_first_l'));
});
jQuery('.lftnnv.section_leftnav').each(function(){
var all_height=0;
var yo_height=0;
var elem=jQuery(this);
elem.find('.its_first_l>li').each(function(){
all_height=all_height+jQuery(this).height();
});

elem.find('.its_first_l>li').each(function(){

yo_height=yo_height+jQuery(this).height();
if(yo_height>(all_height+100)/2)
elem.find(".its_second_l").append(jQuery(this));
});

});

jQuery(".lftnnv.section_leftnav > ul > li").append('<ul class="its_first_perents_l"></ul><ul class="its_second_perents_l"></ul>');
jQuery(".lftnnv.section_leftnav > ul > li").each(function(){
	jQuery(this).children().children().sort(function (a, b) {
		return $(a).height() < $(b).height() ? 1 : -1;
	}).appendTo(jQuery(this).find('.its_first_perents_l'));
});
jQuery('.lftnnv.section_leftnav > ul > li').each(function(){
	var all_height=0;
	var yo_height=0;
	var elem=jQuery(this);
	elem.find('.its_first_perents_l>li').each(function(){
		all_height=all_height+jQuery(this).height();
	});

	elem.find('.its_first_perents_l>li').each(function(){

		yo_height=yo_height+jQuery(this).height();
		if(yo_height>(all_height+20)/2)
			elem.find(".its_second_perents_l").append(jQuery(this));
	});

});

	$(".lftnnv.section_leftnav > ul > li > ul").each(function(){
		if($(this).attr('class') == undefined){
			$(this).remove();
		}
	});
</script>
	<style>
		.for_left_b .new_left_menu>li {
			width: 100%;
			height: 40px;
		}
		.new_left_menu>li>span {
			margin: 0px;
		}
		.for_left_b .new_left_menu:hover > li{
			background: transparent;
		}
		.go_menu_left {
			margin-left: 187px;
		}
	</style>
</div>