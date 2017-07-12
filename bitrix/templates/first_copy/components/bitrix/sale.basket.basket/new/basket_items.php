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

				 <div class="table_wr">

					 <table>
						 <tr>
							 <td>Наименование</td>
							 <td>Количество</td>
							 <td>Цена</td>
							 <td>Стоимость</td>
						 </tr>


				<?foreach ($arResult["GRID"]["ROWS"] as $k => $arItem){?>
					<?$arSelect = Array("ID", "IBLOCK_ID", "NAME", "PREVIEW_TEXT","PROPERTY_SAYT_NAIMENOVANIEDLYASAYTA");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
					$arFilter = Array("IBLOCK_ID"=>18,"ID"=>$arItem["PRODUCT_ID"],  "ACTIVE"=>"Y");
					$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
					if($elem = $res->Fetch()){
						$name = $elem['PROPERTY_SAYT_NAIMENOVANIEDLYASAYTA_VALUE'];
					}else{
						$name = $arItem["NAME"];
					}
					?>
						 <tr>
							 <th style="width: 585px;text-align: left">
								 <?=$name;?>
							 </th>
							 <th style="width: 105px;">
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
									 maxlength="3"
									 pattern="[0-9]{3}"
									 id="QUANTITY_INPUT_<?=$arItem["ID"]?>"
									 id_n="<?=$arItem["ID"]?>"
									 name="QUANTITY_INPUT_<?=$arItem["ID"]?>"
									 size="2"
									 class="chenge"
									 min="0"
									 <?=$max?>
									 step="<?=$ratio?>"
									 style="max-width: 50px"
									 value="<?=$arItem["QUANTITY"]?>"
									 onchange="updateQuantity('QUANTITY_INPUT_<?=$arItem["ID"]?>', '<?=$arItem["ID"]?>', <?=$ratio?>, <?=$useFloatQuantityJS?>)"
									 >
								 <input type="hidden" id="QUANTITY_<?=$arItem['ID']?>" name="QUANTITY_<?=$arItem['ID']?>" value="<?=$arItem["QUANTITY"]?>" />
								</div>
							 </th>
							 <th style="width: 155px;"><?=str_replace('RUB','₽',$arItem["FULL_PRICE_FORMATED"]);?></th>
							 <th style="width: 155px;" class="del"><?=str_replace('RUB','₽',$arItem["SUM"]);?> <a href="?basketAction=delete&id=<?=$arItem["ID"]?>" class="card_reset">x</a></th>

						 </tr>
				<?}?>

					 </table>


                   	<div class="table_td_wr itog">
                   		<div >Итог: <span id="allSum_FORMATED"><?=str_replace(array(" ","RUB"),array("&nbsp;","₽") , $arResult["allSum_FORMATED"])?></span></div>
                	</div>	


                	<div class="table_td_wr itog">
					
                   		<div  ><a href="/personal/order/make/" class="btn_grey btn_of">оформить заказ</a></div>
						<div class="back_butt_buy"><a href="/catalog/" class="btn_grey btn_back">вернуться к покупкам</a></div>
                	</div>	
                </div> 
			</div>

	<script>
		$('.chenge').focusout(function(){
			var data = $(this).val();
			var id = $(this).attr('id_n');
			$.ajax({
				type: "GET",
				url: "/ajax/change_count.php?count="+data+'&id='+id,
				success: function(msg){
					console.log(msg);
					if(msg!="error")
					{
						UpdateBigBasket();
					}
					else
					{
						//alertify.error("");
					}
				}
			});
		});
		function UpdateBigBasket(){
			$.ajax({
				type: "GET",
				url: "/ajax/big_basket.php",
				data:"",
				success: function(msg){
					if(msg!="error")
					{
						$("#basket_form_container").html(msg);
					}
					else
					{
						//alertify.error("Произошла ошибка. Попробуйте повторить запрос позже");
					}
				}
			});
		}
	</script>
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