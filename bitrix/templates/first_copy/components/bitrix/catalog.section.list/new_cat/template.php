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

    <div class="row">
        <div class="col-md-12">
            <div class="onoffswitch">
                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" <?if($_SESSION['allToggle_status'] == 'true'):?>checked<?endif?>>
                <label class="onoffswitch-label" for="myonoffswitch">
                    <span class="onoffswitch-inner"></span>
                    <span class="onoffswitch-switch"></span>
                </label>
            </div>
        </div>
    </div>

    <?
    foreach($arResult['SECTIONS'] as $section) {


        if ($section['DEPTH_LEVEL'] == 1) {
            ?>
            <div class="row">
                <div class="col-md-12 padding_0">
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
                                    <div class="section-name"><span></span><a href="<?=$sect['SECTION_PAGE_URL']?>"><?=$sect["NAME"]?></a></div>
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
                                    <div class="section-name"><span></span><a href="<?=$one['SECTION_PAGE_URL']?>"><?= $one["NAME"] ?></a></div>
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
                                    <div class="section-name"><span></span><a href="<?=$two['SECTION_PAGE_URL']?>"><?= $two["NAME"] ?></a></div>
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
                                    <div class="section-name"><span></span><a href="<?=$three['SECTION_PAGE_URL']?>"><?= $three["NAME"] ?></a></div>
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
    if(empty($_SESSION['allToggle_status'])){$_SESSION['allToggle_status'] = 'false';}
    ?>
    <script type="text/javascript" src="/js/all-toggle.js"></script>
    <link type="text/css" rel="stylesheet" href="/css/swith.css"/>
    <script>
        $(function(){


           $('#myonoffswitch').click(function(){
               var check = $(this).is(':checked');

               $.ajax({
                   url: '/ajax/swith-catalog.php?check='+check,
                   success: function(data){
                       //console.log(data);
                   }
               });

               $('.section-block').find('ul').toggle(check);
               if (check) {
                   $('.section-block').find('.section-name span').html('- ');
               } else {
                   $('.section-block').find('.section-name span').html('+ ');
               }
           });
            $('.section-block').allToggle({open:<?=$_SESSION['allToggle_status']?>});

        });
    </script>


</div>
