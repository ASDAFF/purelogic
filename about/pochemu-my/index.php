<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("О магазине");
?>
    <script src="/js/jQuery-viewport-checker-master/dist/jquery.viewportchecker.min.js"></script>
<?
$arContent = array(
    array(
        'img' => '/img_about/1.jpg',
        'title' => 'Знаем потребности',
        'text' => 'текст текст текст текст текст текст текст текст текст текст текст',
        'number' => 1
    ),
    array(
        'img' => '/img_about/2.jpg',
        'title' => 'Лидер рынка станков ЧПУ',
        'text' => 'текст текст текст текст текст текст текст текст текст текст текст',
        'number' => 2
    ),
    array(
        'img' => '/img_about/3.jpg',
        'title' => 'Опытный коллектив',
        'text' => 'текст текст текст текст текст текст текст текст текст текст текст',
        'number' => 3
    ),
    array(
        'img' => '/img_about/4.jpg',
        'title' => 'Довольный клиент',
        'text' => 'текст текст текст текст текст текст текст текст текст текст текст',
        'number' => 4
    ),
    array(
        'img' => '/img_about/5.jpg',
        'title' => 'Собств. произв-во',
        'text' => 'текст текст текст текст текст текст текст текст текст текст текст',
        'number' => 5
    ),
    array(
        'img' => '/img_about/6.jpg',
        'title' => 'Широк ассорт.',
        'text' => 'текст текст текст текст текст текст текст текст текст текст текст',
        'number' => 6
    ),
    array(
        'img' => '/img_about/7.jpg',
        'title' => 'Наличие наборов электроника',
        'text' => 'текст текст текст текст текст текст текст текст текст текст текст',
        'number' => 7
    ),
    array(
        'img' => '/img_about/8.jpg',
        'title' => 'Поставка штучного товара',
        'text' => 'текст текст текст текст текст текст текст текст текст текст текст',
        'number' => 8
    ),
    array(
        'img' => '/img_about/9.jpg',
        'title' => 'Скидки и привилегии',
        'text' => 'текст текст текст текст текст текст текст текст текст текст текст',
        'number' => 9
    ),
    array(
        'img' => '/img_about/10.jpg',
        'title' => 'Беспл. доставка',
        'text' => 'текст текст текст текст текст текст текст текст текст текст текст',
        'number' => 10
    )
);
?>

<h1 class="dbl_lines">О компании</h1>

<h1 class="h1-images-list"><span class="green">10 причин работать с</span> Purelogic R&D</h1>

<div class="all-image-list">

<? foreach($arContent as $c){ ?>

    <div class="image-list">

        <div class="background-image" style="background-image:url(<?=$c['img']?>)"></div>
        <div class="blur" style="background-image:url(<?=$c['img']?>)" ></div>

        <!-- <div class="dot"></div> -->
        <div class="content">
            <div class="number-img"><?=$c['number']?></div>
            <div class="title-img"><?=$c['title']?></div>
            <div class="text-img"><?=$c['text']?></div>
        </div>
    </div>


<? } ?>

</div>



<style>
/* СТИЛИ ДЛЯ ФОНОВОЙ КАРТИНКИ */
.all-image-list > .image-list > .background-image{
    position: absolute;
  /*  background-size: cover; */
    background-repeat: no-repeat;
    width: 100%;
    height: 100%;
  /*  filter: blur(2px); */
}


.all-image-list > .image-list > .blur{
    background-repeat: no-repeat;
    background-position: -321px -96px;
    margin: 0px 0px;
    position: absolute;
    left: calc(50% - 205px);
    top: 96px;
    width: 410px;
    z-index: 0;
    min-height: 410px;
    border-radius: 50%;
    filter: blur(2px);
}

/* СТИЛИ ДЛЯ ФОНОВОЙ КАРТИНКИ */


.h1-images-list{
    padding-bottom: 10px;
     text-align: center;
    border-bottom: 3px solid #CFCFC7;
    margin: 0 auto;
    width: 600px;
}

.all-image-list{
   /* border: 2px solid #c5c5c5; */
    margin-top: 50px;
}
.all-image-list > .image-list {
    position: relative;
}

.all-image-list > .image-list > .content{
    padding: 20px;
    background-color: rgba(0,0,0,0.3);
    text-align: center;
    position: relative;
    border-radius: 50%;
    width: 400px;
    height: 400px;
    margin: 0 auto;
    top: 100px;
}

.all-image-list > .image-list{
    height: 600px;
    background-repeat: round;
}

.all-image-list > .image-list > .content > .number-img{
    font-size: 100px;
    font-weight: 500;
    color: #fff;
}

.all-image-list > .image-list > .content > .title-img{
    font-size: 30px;
    font-weight: 500;
    color: #acce11;
}

.all-image-list > .image-list > .content > .text-img{
    color: #fff;
    margin-top: 12px;
}
.dot.active{
    position: absolute;
    z-index: 0;
    background-image: url(/img_about/123.png);
    width: 100%;
    height: 100%;
}

</style>

<script>
    $(function(){

        /*
        jQuery('.dot').viewportChecker({
            classToAdd: 'active',
            offset: 200,
            repeat: true
        });
        */

    });
</script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>