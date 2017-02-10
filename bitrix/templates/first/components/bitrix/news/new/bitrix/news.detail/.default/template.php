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
<div class="new_detail" style="margin-top:0px">
<h3 class="name_section"><?=$arResult["NAME"];?></h3>	
					<div class="news_wr">
						<div class="news_img_wr">
							<div class="col-md-4 col-sm-5 padding-left_0">
								<img src="<?=$arResult["PREVIEW_PICTURE"]["SRC"];?>" alt="">
							</div>
							<div class="col-md-8 col-sm-7">
								<span><?=$arResult["DATE_ACTIVE_FROM"];?></span>
								<a href="#" class="name_news"><?=$arResult["NAME"];?></a>
							</div>
							<div class="col-md-8 col-sm-7">	
								<div class="icon_text_news">
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
									<?}}
?>
									<ul class="icon_soc">
										<li><a href="#"><i class="fa fa-bold" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									</ul>
								</div>

							</div>
						</div>
						<div class="col-md-12 padding_0">
							<?=$arResult["DETAIL_TEXT"];?>
						</div>
						
					</div>
				</div>