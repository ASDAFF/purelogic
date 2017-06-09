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
<div class="products-home">
    <?
    foreach($arResult['SECTIONS'] as $key => $section){
        ?>
    <div class="product-home">
        <h1><?=$section['NAME']?></h1>
        <table>
        <?
       $arSect = array_chunk($section['ITEM_SECTION'], 4);
        for($i = 0; $i < count($arSect); $i++ ){
            ?>
            <tr>
            <?
            foreach($arSect[$i] as $elem){
                ?>
                <td>
                    <div class="box-home-product">
                        <a href="<?=$elem['SECTION_PAGE_URL'];?>">
                            <img src="/kartinki_dlya_razdelov/<?=$elem['IMG'];?>">
                            <div class="name-home-product"><?=$elem['NAME'];?></div>
                        </a>
                    </div>
                </td>
                <?
            }
            ?>
            </tr>
            <?
        }
        ?>
        </table>
    </div>
        <?
    }
    ?>
</div>
