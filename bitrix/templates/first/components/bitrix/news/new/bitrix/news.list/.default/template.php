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
<div class="news" style="margin-top:0px">
	<h3 class="name_section">Новости</h3>	
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<?print_r();?>
	
					<div class="news_wr" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
						<div class="news_img_wr">
							<div class="col-md-4 col-sm-5 padding-left_0">
								<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>" alt="">
							</div>
							<div class="col-md-8 col-sm-7">
								<span><?=$arItem["DATE_ACTIVE_FROM"];?></span>
								<a href="<?=$arItem["DETAIL_PAGE_URL"];?>" class="name_news"><?=$arItem["NAME"];?></a>
							</div>
							<div class="col-md-8 col-sm-7">	
								<div class="icon_text_news">
								<?
								if($arItem["PROPERTIES"]["TOVAR"]["VALUE"]!=""){
$arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL");
$arFilter = Array("IBLOCK_ID"=>5,  "ACTIVE"=>"Y", "ID"=>$arItem["PROPERTIES"]["TOVAR"]["VALUE"]);
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
							<?=$arItem["PREVIEW_TEXT"];?>
							<div class="col-md-3 col-md-offset-9">
								<a href="<?=$arItem["DETAIL_PAGE_URL"];?>" class="btn_grey right">Читать далее</a>
							</div>
							
						</div>
						
					</div>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
