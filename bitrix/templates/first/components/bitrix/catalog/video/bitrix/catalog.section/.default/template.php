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
<h3 class="name_section"><i class="fa fa-rss video_name_icon" aria-hidden="true"></i><?=$arResult['NAME'];?></h3>	
	<?php 

function getYoutubeVideoID($url){
 
    // допустимые доменые имена в ссылке
    $names = array('www.youtube.com','youtube.com');
 
    // разбор адреса
    $up = parse_url($url);
 
    // проверка параметров
    if (isset($up['host']) && in_array($up['host'],$names) &&
        isset($up['query']) && strpos($up['query'],'v=') !== false){
 
        // достаем параметр ID
        $lp = explode('v=',$url);
 
        // отсекаем лишние параметры
        $rp = explode('&',$lp[1]);
 
        // возвращаем строку, либо false
        return (!empty ($rp[0]) ? $rp[0] : false);
    }
    return false;
}

?>			
<?
if (!empty($arResult['ITEMS']))
{
foreach($arResult["ITEMS"] as $arItem){
$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
	$strMainID = $this->GetEditAreaId($arItem['ID']);
?>
<?php $videoID = getYoutubeVideoID($arItem["PROPERTIES"]["VIDEO"]["VALUE"]);?>
<div class="col-md-6 col-sm-6">
					<div class="video_section">
						<div class="video_section_wr">
							<iframe  src="http://www.youtube.com/embed/<?=$videoID?>?autoplay=0" frameborder="0"></iframe>

						</div>
						<p class="video_sl_name"><?=$arItem["PREVIEW_TEXT"];?></p>
					</div>
				</div>

<?}
}?>