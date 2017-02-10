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

<?
foreach($arResult['SECTIONS'] as $section) {

    if ($section['DEPTH_LEVEL'] == 1){
        ?>
        <div class="new_sections_bl">
            <div class="title_sect_bl"><a href="<?=$section['SECTION_PAGE_URL'];?>"><?=$section['NAME']?></a></div>
        </div>

<div class="container">

            <div class="row">

                <div class="col-lg-6">
                    <ul class="list-type-level-one">
                    <?
                    $arFilter = array('IBLOCK_ID' => $section['IBLOCK_ID'],'>LEFT_MARGIN' => $section['LEFT_MARGIN'],'<RIGHT_MARGIN' => $section['RIGHT_MARGIN'],'>DEPTH_LEVEL' => $section['DEPTH_LEVEL'], 'ACTIVE'=>'Y');
                    $rsSect = CIBlockSection::GetList(array('left_margin' => 'asc'),$arFilter);
                    while ($arSect = $rsSect->GetNext())
                    {
                        if($arSect['DEPTH_LEVEL'] == 2) {

                            ?>

                                <li data-id="<?=$arSect['ID'];?>"><a href="#"> > <?=$arSect['NAME']; ?></a></li>

                            <?

                        }
                    }

            ?>

                    </ul>
                </div>

                <div class="col-lg-6">
                    <ul class="list-type-zebra">
                <?
                $arFilter = array('IBLOCK_ID' => $section['IBLOCK_ID'],'>LEFT_MARGIN' => $section['LEFT_MARGIN'],'<RIGHT_MARGIN' => $section['RIGHT_MARGIN'],'>DEPTH_LEVEL' => $section['DEPTH_LEVEL'], 'ACTIVE'=>'Y');
                $rsSect = CIBlockSection::GetList(array('left_margin' => 'asc'),$arFilter);
                while ($arSect = $rsSect->GetNext()){
                        if($arSect['DEPTH_LEVEL'] == 3) {
                        ?>
                                <li data-id="<?=$arSect['IBLOCK_SECTION_ID']?>" style="display: none">
                                    <a href="#"> > <?=$arSect['NAME']?></a>
                                    <ul class="list-type-sub-section">
                            <?
                            $arFilter = array('IBLOCK_ID' => $arSect['IBLOCK_ID'],'>LEFT_MARGIN' => $arSect['LEFT_MARGIN'],'<RIGHT_MARGIN' => $arSect['RIGHT_MARGIN'],'>DEPTH_LEVEL' => $arSect['DEPTH_LEVEL'], 'ACTIVE'=>'Y');
                            $rsSubSect = CIBlockSection::GetList(array('left_margin' => 'asc'),$arFilter);
                            while ($arSubSect = $rsSubSect->GetNext()){
                            ?>
                                <li data-sub-id="<?=$arSect['ID'];?>"><a href="<?=$arSubSect['SECTION_PAGE_URL'];?>"><?=$arSubSect['NAME'];?></a></li>
                                <?}?>
                                    </ul>
                                </li>
                        <?
                        }
                }
                ?>
                    </ul>
                </div>

            </div>


</div>

        <?

    }
}
?>
<style>
    .list-type-zebra a {
        color: inherit;
        display: block;
        line-height: 1.3;
        padding: 0.35em 0.84em;
    }
    .list-type-zebra > li:nth-child(2n) {
        background: #F2F2F2;/* фон нечетных пунктов меню */
    }
    .list-type-zebra > li > a:hover {
        background: #B0D074;/* фон нечетных пунктов меню */
    }
    .list-type-zebra > li > ul li a:hover {
        background: #B0D074;/* фон нечетных пунктов меню */
    }

    .list-type-sub-section{
        background: #fff;
        display: none;
    }
    .list-type-level-one{
        font-size: 20px;
        font-weight: 400;
        margin: 50px auto;
    }
    .list-type-level-one li a{
        line-height: 1.5;
        color: black;
    }

    .list-type-zebra{
        font-size: 20px;
        font-weight: 400;
        margin: 50px auto;
    }


</style>

<script>
    $(function(){
        $('.list-type-level-one > li').mouseenter(function(){
            $('.list-type-level-one > li').removeAttr('style');
            $('.list-type-level-one > li > a').removeAttr('style');
            $(this).css({
                'border-top':'1px solid #000000',
                'border-bottom':'1px solid #000000',
            });
            $('a',this).css('color','#B0D074');

            var id = $(this).attr('data-id');

            $('.list-type-zebra > li').each(function(){
                if($(this).attr('data-id') == id){
                    $(this).fadeIn('fast');
                }else{
                    $(this).fadeOut('fast');
                }
            })
            return false;
        });

        $('.list-type-zebra > li > a').click(function(){
            $('.list-type-sub-section',$(this).parent()).toggle('slow');

            return false;
        });
    });
</script>
