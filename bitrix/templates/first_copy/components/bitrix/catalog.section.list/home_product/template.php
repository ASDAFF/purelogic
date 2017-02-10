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
<div id="tabs">
    <ul>
<?
$idElement = array();
foreach($arResult['SECTIONS'] as $s){
    $arFilterSectProp = Array('IBLOCK_ID' => $arParams['IBLOCK_ID'],'ID' => $s['ID'], 'GLOBAL_ACTIVE'=>'Y');
    $db_listSectProp = CIBlockSection::GetList(Array(), $arFilterSectProp, false, Array("UF_COLOR"));
    if($uf_valueSectProp = $db_listSectProp->GetNext())
       $title_color_tabs = $uf_valueSectProp['UF_COLOR'];
    ?>
    <li><a <? if(!empty($title_color_tabs)): ?>style="color:<?=$title_color_tabs;?>" <? endif; ?> href="#tabs-<?=$s['ID']?>"><?=$s['NAME']?></a></li>
    <?
    $arSelect = Array("ID","IBLOCK_ID", "NAME","PROPERTY_*");
    $arFilter = Array("IBLOCK_ID" => $arParams['IBLOCK_ID'],"SECTION_ID" => $s['ID'], "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

    while($ob = $res->GetNextElement())
    {
        $arProps = $ob->GetProperties();
        $idElement[$s['ID']] = $arProps['ADD_ORDER']['VALUE'];
    }
}
?>
    </ul>
    <?
    foreach($idElement as $k => $e){
        ?>
        <div id="tabs-<?=$k;?>">
            <?
            $arResults = array();
            foreach($e as $i => $id){
                $ar_price = CPrice::GetBasePrice($id, false, false);
                $res = CIBlockElement::GetByID($id);
                if($ar_res = $res->GetNext())
                $propVal = array();
                $res = CIBlockElement::GetProperty(18, $id, "sort", "asc", array());
                while ($ob = $res->GetNext())
                {
                    if(
                        $ob['CODE'] == 'AKCYIA' OR
                        $ob['CODE'] == 'DOSTAVKA' OR
                        $ob['CODE'] == 'KACHESTVO' OR
                        $ob['CODE'] == 'NOVINKA'
                    ){
                        $propVal[$ob['CODE']] = $ob['VALUE_ENUM'];
                    }elseif($ob['CODE'] == 'MORE_PHOTO'){
                        $propVal[$ob['CODE']][] = $ob['VALUE'];
                    }
                }
                $arResult = $propVal;
                $arResult["ID"] = $ar_res['ID'];
                $arResult["NAME"] = $ar_res['NAME'];
                $arResult['DETAIL_PAGE_URL'] = $ar_res['DETAIL_PAGE_URL'];
                $arResult["PRICE"] = $ar_price['PRICE'];
                $arResult["CURRENCY"] = $ar_price['CURRENCY'];

            ?>



              <? if (!($i % 4) and $i != 0){print '</div><div class="line"></div>';}?>
              <? if (!($i % 4)){print '<div class="row">';}?>

                    <div class="col-md-3">

                        <ul id="pics-<?=$arResult["ID"]?>-<?=$k;?>">
                            <? foreach($arResult['MORE_PHOTO'] as $img){?>
                            <li><img style="height: 150px;width: 150px" src="<?=CFile::GetPath($img)?>"></li>
                            <? } ?>
                        </ul>
                                <script>
                                    $(function(){
                                        $('#pics-<?=$arResult["ID"]?>-<?=$k;?>').dbpasCarousel({
                                            itemsVisible: 1,
                                            autoSlide: 0
                                        });
                                    });
                                </script>

                        <div class="product-text">

                            <p class="name"><a href="<?=$arResult['DETAIL_PAGE_URL']?>"><?=$arResult["NAME"]?></a></p>


                            <? if($arResult['NOVINKA'] == 'Y'):?>
                            <div class="novinka block_nov">
                                    <img src="/img/novinka.png" alt=""/>
                                    <div class="descr_nov">
                                        Новинка!
                                    </div>
                                </div>
                            <? endif; ?>
                            <? if($arResult['AKCYIA'] == 'Y'):?>
                            <div class="akcyia block_nov">
                                    <img src="/img/akcyia.png" alt=""/>
                                    <div class="descr_nov">
                                        <span>На товар действует</span>
                                        <p>акция</p>
                                    </div>
                                </div>
                            <? endif; ?>
                            <? if($arResult['DOSTAVKA'] == 'Y'):?>
                            <div class="dostavka block_nov">
                                    <img src="/img/dostavka.png" alt=""/>
                                    <div class="descr_nov">
                                        <p>Бесплатная </p>
                                        <span class="first_dst">доставка по России</span>
                                        <span>при заказе от 9 900 рублей</span>
                                    </div>
                                </div>
                            <? endif; ?>
                            <? if($arResult['KACHESTVO'] == 'Y'):?>
                            <div class="kachestvo block_nov">
                                    <img src="/img/kachestvo.png" alt=""/>
                                    <div class="descr_nov">
                                        <span>Лучшее соотношение</span>
                                        <p>цена - качество</p>
                                    </div>
                                </div>
                            <? endif; ?>
                            <p class="price"><?=$arResult["PRICE"]?></p>

                        </div>

                    </div>

                <? if ($i == count($e)-1){print '</div>';}?>

            <? } ?>
        </div>
        <?
    }
    ?>

</div>


<script>
    $( function() {
        $( "#tabs" ).tabs();

        $(".ui-tabs-panel").mCustomScrollbar({
            theme:"3d",
            scrollInertia: 250,
            scrollbarPosition:"outside"
        });

    });
</script>

<style>

    .ui-tabs-panel .mCS-3d.mCSB_scrollTools .mCSB_draggerRail, .mCS-3d-dark.mCSB_scrollTools .mCSB_draggerRail {
        width: 8px;
        background-color: transparent;
        background-color: transparent;
        box-shadow: none;
    }

    .ui-tabs-panel .mCSB_scrollTools{
        margin: 10px 0px;
    }

    .ui-tabs-panel .mCSB_outside + .mCSB_scrollTools{
        right: 2px;
    }

    .ui-tabs-panel {
        max-height: 730px;
    }

    .ui-tabs{
        margin: 7px auto;
    }
    .ui-tabs .row{

        margin-left: 27px;
        margin-right: 27px;
    }

    .ui-tabs .row .col-md-3{
        margin: 20px 0px;
    }

    .ui-tabs .row:last-child{
        border: none;
    }

    .product-text{
        width: 165px;
    }

    .product-text > .name{
        text-align: center;
        font-size: 12px;
        margin: 5px 0;
    }

    .product-text > .name > a {
        font-family: inherit;
    }

    .product-text > .price{
        text-align: right;
        font-size: 10px;
    }

    [data-carousel-control="left"]{
        left: 12px;
    }


    [data-carousel-control="right"]{
        right: 12px;
    }

    .ui-tabs .line{
        border-bottom: 1px solid #c5c5c5;
        margin: 0px 14px 0px 0px;
    }

</style>
