<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

$strTitle = "";
?>
<div class="container">

    <?
    foreach($arResult['SECTIONS'] as $section) {


        if ($section['DEPTH_LEVEL'] == 1) {
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="catalog-title">
                        <div class="lines">
                            <span></span>
                            <span></span>
                        </div>
                        <h1><a href="<?=$section['SECTION_PAGE_URL'];?>"><?=$section['NAME']?></a></h1>
                        <div class="lines">
                            <span></span>
                            <span></span>
                        </div>
                    </div>

                    <?

                    if($section['UF_VERTICAL_POS'] == 1){
                        ?>
                        <? foreach($section['SECTION_1'] as $sect){?>
                        <div class="col-md-4">
                                <div class="section-block">
                                    <div class="section-name"><a href="<?=$sect['SECTION_PAGE_URL']?>"><?=$sect["NAME"]?></a></div>
                                    <ul>
                                        <?
                                        foreach($sect['SECTION_2'] as $section_two) {
                                            ?>
                                            <li><a href="<?=$section_two['SECTION_PAGE_URL']?>"><?=$section_two['NAME']?></a></li>
                                            <?
                                        }
                                        ?>
                                    </ul>
                                </div>
                        </div>
                        <?}?>
                        <?
                    }else {
                        $section_drop = array_chunk($section['SECTION_1'], ceil(count($section['SECTION_1'])/3));
                        ?>
                        <div class="col-md-4">

                            <? foreach ($section_drop[0] as $one) { ?>
                                <div class="section-block">
                                    <div class="section-name"><a href="<?=$one['SECTION_PAGE_URL']?>"><?= $one["NAME"] ?></a></div>
                                    <ul>
                                        <?
                                        foreach ($one['SECTION_2'] as $section_two) {
                                            ?>
                                            <li><a href="<?=$section_two['SECTION_PAGE_URL']?>"><?= $section_two['NAME'] ?></a></li>
                                            <?
                                        }
                                        ?>
                                    </ul>
                                </div>
                            <?
                            } ?>
                        </div>

                        <div class="col-md-4">

                            <? foreach ($section_drop[1] as $two) { ?>
                                <div class="section-block">
                                    <div class="section-name"><a href="<?=$two['SECTION_PAGE_URL']?>"><?= $two["NAME"] ?></a></div>
                                    <ul>
                                        <?
                                        foreach ($two['SECTION_2'] as $section_two) {
                                            ?>
                                            <li><a href="<?=$section_two['SECTION_PAGE_URL']?>"><?= $section_two['NAME'] ?></a></li>
                                            <?
                                        }
                                        ?>
                                    </ul>
                                </div>
                            <?
                            } ?>
                        </div>

                        <div class="col-md-4">

                            <? foreach ($section_drop[2] as $three) { ?>
                                <div class="section-block">
                                    <div class="section-name"><a href="<?=$three['SECTION_PAGE_URL']?>"><?= $three["NAME"] ?></a></div>
                                    <ul>
                                        <?
                                        foreach ($three['SECTION_2'] as $section_two) {
                                            ?>
                                            <li><a href="<?=$section_two['SECTION_PAGE_URL']?>"><?= $section_two['NAME'] ?></a></li>
                                            <?
                                        }
                                        ?>
                                    </ul>
                                </div>
                            <?
                            } ?>
                        </div>

                    <?
                    }
                    ?>

                </div>
            </div>

            <?
        }
    }
    ?>


</div>
