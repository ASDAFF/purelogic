<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
 * @var array $arParams
 * @var array $arResult
 * @var $APPLICATION CMain
 */

if ($arParams["SET_TITLE"] == "Y")
{
    $APPLICATION->SetTitle(Loc::getMessage("SOA_ORDER_COMPLETE"));
}
?>

<? if (!empty($arResult["ORDER"])): ?>
<?$date=explode(' ', $arResult["ORDER"]["DATE_INSERT"])?>
	<p style="margin-bottom:20px;">
        Ваш заказ №<?=$arResult["ORDER"]["ACCOUNT_NUMBER"]?> от <?=$date[0]?> г. сформирован и принят в обработку!
    </p>
	<p style="margin-bottom:20px;">
        После проверки заказа менеджером на указанную электронную почту будет выставлен банковский счёт для оплаты.
    <br>
        Если у Вас есть вопросы, свяжитесь с нами по бесплатному телефону: 8 (800) 555-63-74 или напишите письмо на order@purelogic.ru
    </p>
	<p style="margin-bottom:20px;">
        Вы можете просмотреть историю заказов в <a href="/personal/order/">Персональном разделе сайта</a>. Обратите внимание, что для входа в этот раздел Вам необходимо ввести логин и пароль пользователя сайта.<br>
    </p>




    <?
    if ($arResult["ORDER"]["IS_ALLOW_PAY"] === 'Y')
    {
        if (!empty($arResult["PAYMENT"]))
        {
            foreach ($arResult["PAYMENT"] as $payment)
            {
                if ($payment["PAID"] != 'Y')
                {
                    if (!empty($arResult['PAY_SYSTEM_LIST'])
                        && array_key_exists($payment["PAY_SYSTEM_ID"], $arResult['PAY_SYSTEM_LIST'])
                    )
                    {
                        $arPaySystem = $arResult['PAY_SYSTEM_LIST'][$payment["PAY_SYSTEM_ID"]];

                        if (empty($arPaySystem["ERROR"]))
                        {
                            ?>
                           

                                                                                    

<style type="text/css">
    table { border-collapse: collapse; }
    table.acc td { border: 1pt solid #000000; padding: 0pt 3pt; line-height: 21pt; }
    table.it td { border: 1pt solid #000000; padding: 0pt 3pt; }
    table.sign td { font-weight: bold; vertical-align: bottom; }
    table.header td { padding: 0pt; vertical-align: top; }
</style>



    

        


<?

                            CModule::IncludeModule("sale");

// Выведем актуальную корзину для текущего пользователя

$arBasketItems = array();

$dbBasketItems = CSaleBasket::GetList(
        array(
                "NAME" => "ASC",
                "ID" => "ASC"
            ),
        array(
                "FUSER_ID" => CSaleBasket::GetBasketUserID(),
                "LID" => 's1',
                "ORDER_ID" => $arResult["ORDER"]["ACCOUNT_NUMBER"]
            ),
        false,
        false,
        array("ID", "CALLBACK_FUNC", "MODULE", 
              "PRODUCT_ID", "QUANTITY", "DELAY", 
              "CAN_BUY", "PRICE", "WEIGHT")
    );
while ($arItems = $dbBasketItems->Fetch())
{
    if (strlen($arItems["CALLBACK_FUNC"]) > 0)
    {
        CSaleBasket::UpdatePrice($arItems["ID"], 
                                 $arItems["CALLBACK_FUNC"], 
                                 $arItems["MODULE"], 
                                 $arItems["PRODUCT_ID"], 
                                 $arItems["QUANTITY"]);
        $arItems = CSaleBasket::GetByID($arItems["ID"]);
    }

    $arBasketItems[] = $arItems;
}


CModule::IncludeModule("iblock");
?>




<table class="it" width="100%">
    <tbody>
        <tr>
            <td>№</td>
            <td>Наименование товара</td>
            <td>Кол-во</td>
            <td>Ед.</td>
            <td>Цена,  RUB</td>
            <td>Ставка НДС</td>
            <td>Сумма,  RUB</td>
        </tr>
    

        <?foreach($arBasketItems as $kay=> $arItem){
            $itog=$itog+($arItem["QUANTITY"]*$arItem["PRICE"])?>
    <tr valign="top">
            <td align="center"><?=($kay+1)?></td>
            <td align="left" style="word-break: break-word; word-wrap: break-word; ">
                <?$res = CIBlockElement::GetByID($arItem["PRODUCT_ID"]);
                if($ar_res = $res->GetNext())
                  echo $ar_res['NAME'];?>
            </td>
            <td align="right">
                <?=$arItem["QUANTITY"]?>
            </td>
            <td align="right">
                шт
            </td>
            <td align="right">
                <nobr><?=number_format($arItem["PRICE"], 2, '.', ' ')?></nobr>
            </td>
            <td align="right">
                18%
            </td>
            <td align="right">
                <nobr><?=number_format($arItem["QUANTITY"]*$arItem["PRICE"], 2, '.', ' ')?></nobr>
            </td>
    </tr>
        <?}?>
    

        <tr valign="top">
            <td align="right" style="border-width: 0pt 1pt 0pt 0pt" colspan="6">
                В том числе НДС:
            </td>
            <td align="right">
                <nobr><?=number_format(($itog/118)*18, 2, '.', ' ')?></nobr>
            </td>
        </tr>

        <tr valign="top">
            <td align="right" style="border-width: 0pt 1pt 0pt 0pt" colspan="6">
                Итого:
            </td>
            <td align="right">
                <nobr><?=number_format($itog, 2, '.', ' ')?></nobr>
            </td>
        </tr>

</tbody></table>






                            <?
                        }
                        else
                        {
                            ?>
                            <span style="color:red;"><?=Loc::getMessage("SOA_ORDER_PS_ERROR")?></span>
                            <?
                        }
                    }
                    else
                    {
                        ?>
                        <span style="color:red;"><?=Loc::getMessage("SOA_ORDER_PS_ERROR")?></span>
                        <?
                    }
                }
            }
        }
    }
    else
    {
        ?>
        <br /><strong><?=$arParams['MESS_PAY_SYSTEM_PAYABLE_ERROR']?></strong>
        <?
    }
    ?>

<? else: ?>

    <b><?=Loc::getMessage("SOA_ERROR_ORDER")?></b>
    <br /><br />

    <table class="sale_order_full_table">
        <tr>
            <td>
                <?=Loc::getMessage("SOA_ERROR_ORDER_LOST", array("#ORDER_ID#" => $arResult["ACCOUNT_NUMBER"]))?>
                <?=Loc::getMessage("SOA_ERROR_ORDER_LOST1")?>
            </td>
        </tr>
    </table>

<? endif ?>