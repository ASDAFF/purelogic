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
$templateLibrary = array('popup');
$currencyList = '';
if (!empty($arResult['CURRENCIES']))
{
	$templateLibrary[] = 'currency';
	$currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}
$templateData = array(
	'TEMPLATE_THEME' => $this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/style.css',
	'TEMPLATE_CLASS' => 'bx_'.$arParams['TEMPLATE_THEME'],
	'TEMPLATE_LIBRARY' => $templateLibrary,
	'CURRENCIES' => $currencyList
);
unset($currencyList, $templateLibrary);


?>
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
//внутри цикла построения меню
 //пользовательское поле UF_PAGE_LINK

//подключаем модуль инфоблок для работы с классом CIBlockSection
   $uf_arresult = CIBlockSection::GetList(Array("SORT"=>"­­ASC"), Array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "ID" => $arResult["IBLOCK_SECTION_ID"]), false);
   if($uf_value = $uf_arresult->GetNext()):
     
   endif;
?> 
<?php $videoID = getYoutubeVideoID($arResult["PROPERTIES"]["VIDEO"]["VALUE"]);?>
<h3 class="name_section"><i class="fa fa-rss video_name_icon" aria-hidden="true"></i><?=$uf_value["NAME"];?></h3>
<div class="col-md-12 padding_0">
						<div class="vid_wr">
							<iframe  src="http://www.youtube.com/embed/<?=$videoID?>?autoplay=0" frameborder="0"></iframe>
</div>
					</div>
<div class="col-md-6 padding_0">
					<a href="<?=$uf_value["SECTION_PAGE_URL"];?>"><i class="fa fa-file-video-o" aria-hidden="true"></i> Смотреть другие видео раздела</a>
				</div>
				
				<div class="col-md-3 padding_0">
						<?
								if($arResult["PROPERTIES"]["TOVAR"]["VALUE"]!=""){
$arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL");
$arFilter = Array("IBLOCK_ID"=>5,  "ACTIVE"=>"Y", "ID"=>$arResult["PROPERTIES"]["TOVAR"]["VALUE"]);
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
while($ob = $res->GetNextElement())
{
 $arFields = $ob->GetFields();
 

?> 
									<a href="<?=$arFields["DETAIL_PAGE_URL"];?>">Страница товара</a>
									<?}}?>
				</div>
				<div class="col-md-3 padding_0">
					<ul class="icon_soc">
						<li><a href="#"><i class="fa fa-bold" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					</ul>
				</div>