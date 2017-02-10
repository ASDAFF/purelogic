<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
use Bitrix\Sale\DiscountCouponsManager;

if (!empty($arResult["ERROR_MESSAGE"]))
	ShowError($arResult["ERROR_MESSAGE"]);

$bDelayColumn  = false;
$bDeleteColumn = false;
$bWeightColumn = false;
$bPropsColumn  = false;
$bPriceType    = false;

if ($normalCount > 0):
?>
<div class="card" style="margin-top:0px">

										
													
													
													
													
													
													<h3 class="name_section">Корзина</h3>
				 <div class="table_wr">
                    <div class="table_hd_wr">
                        <div class="col-md-5 padding-left_0">Наименование</div>
                        <div class="col-md-2 padding-left_0">Количество</div>
                        <div class="col-md-2 padding-left_0">Стоимость</div>
                        <div class="col-md-2 padding-left_0">Сумма</div>
                        <div class="col-md-1 padding-left_0">Х</div>
                        
                    </div>
					<?foreach ($arResult["GRID"]["ROWS"] as $k => $arItem){?>
                    <div class="table_td_wr">
                        <div class="col-md-5 padding-left_0"  data-label="Название"><a href="<?=$arItem["DETAIL_PAGE_URL"];?>"><?=$arItem["NAME"];?></a></div>
                        <div class="col-md-2 padding-left_0" data-label="Кол">
                        		<div class="add_in_card">
									<?
													$ratio = isset($arItem["MEASURE_RATIO"]) ? $arItem["MEASURE_RATIO"] : 0;
													$max = isset($arItem["AVAILABLE_QUANTITY"]) ? "max=\"".$arItem["AVAILABLE_QUANTITY"]."\"" : "";
													$useFloatQuantity = ($arParams["QUANTITY_FLOAT"] == "Y") ? true : false;
													$useFloatQuantityJS = ($useFloatQuantity ? "true" : "false");
													?>
													<input
														type="text"
														size="3"
														id="QUANTITY_INPUT_<?=$arItem["ID"]?>"
														name="QUANTITY_INPUT_<?=$arItem["ID"]?>"
														size="2"
														maxlength="18"
														min="0"
														<?=$max?>
														step="<?=$ratio?>"
														style="max-width: 50px"
														value="<?=$arItem["QUANTITY"]?>"
														onchange="updateQuantity('QUANTITY_INPUT_<?=$arItem["ID"]?>', '<?=$arItem["ID"]?>', <?=$ratio?>, <?=$useFloatQuantityJS?>)"
													>
													<input type="hidden" id="QUANTITY_<?=$arItem['ID']?>" name="QUANTITY_<?=$arItem['ID']?>" value="<?=$arItem["QUANTITY"]?>" />

									<input type="submit" value="">
								</div></div>
								
                        <div class="col-md-2 padding-left_0" data-label="Стоимость" > <?=$arItem["FULL_PRICE_FORMATED"];?></div>
                        <div class="col-md-2 padding-left_0" data-label="Сумма" id="sum_<?=$arItem["ID"]?>"><?=$arItem["SUM"];?></div>
                        <div class="col-md-1 itog padding-left_0" data-label="Удалить"><a href="?basketAction=delete&id=<?=$arItem["ID"]?>" class="card_reset">x</a></div>

                     
                   	</div>
                  <?}?>
                   	<div class="table_td_wr itog">
                   		<div class="col-md-3  col-md-offset-9 padding-left_0" >Итог: <span id="allSum_FORMATED"><?=str_replace(" ", "&nbsp;", $arResult["allSum_FORMATED"])?></span></div>
                	</div>	
                	<div class="table_td_wr itog">
                   		<div class="col-md-4  col-md-offset-8 padding-left_0" ><a href="/personal/order/make/" class="oformit_card">Оформить заказ</a></div>
                	</div>	
                </div> 
			</div>										
<?
else:
?>
<div id="basket_items_list">
	<table>
		<tbody>
			<tr>
				<td style="text-align:center">
					<div class=""><?=GetMessage("SALE_NO_ITEMS");?></div>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<?
endif;
?>