<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();

?>

  
		
		
		<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="ru"> <!--<![endif]-->

<head>

	<meta charset="utf-8">

	<title><?$APPLICATION->ShowTitle();?></title>
	
	 <?$APPLICATION->ShowHead()?>
	
<?
$APPLICATION->SetAdditionalCSS("/css/jquery-ui.css");
$APPLICATION->SetAdditionalCSS("/css/dbpasCarousel-master/jquery.dbpas.carousel.css");

$APPLICATION->SetAdditionalCSS("/libs/font-awesome-4.2.0/css/font-awesome.min.css");
$APPLICATION->SetAdditionalCSS("/libs/bootstrap/css/bootstrap-grid.min.css");
$APPLICATION->SetAdditionalCSS("/libs/popup/magnific-popup.css");
$APPLICATION->SetAdditionalCSS("/libs/owl-carousel/owl.carousel.css");
$APPLICATION->SetAdditionalCSS("/css/masterslider.css");
$APPLICATION->SetAdditionalCSS("/css/fonts.css");
$APPLICATION->SetAdditionalCSS("/css/main.css");
$APPLICATION->SetAdditionalCSS("/css/media.css");
$APPLICATION->SetAdditionalCSS("/css/jquery.mCustomScrollbar.css");
$APPLICATION->AddHeadScript("/libs/modernizr/modernizr.js");

$APPLICATION->SetAdditionalCSS("/css/fancybox/jquery.fancybox.css");
$APPLICATION->SetAdditionalCSS("/css/fancybox/jquery.fancybox-buttons.css");
$APPLICATION->SetAdditionalCSS("/css/fancybox/jquery.fancybox-thumbs.css");
?>
<script src="/libs/jquery/jquery-1.11.3.min.js"></script>




		<script src="/libs/waypoints/waypoints.min.js"></script>

	<script src="/js/jquery-ui.js"></script>
	<script src="/js/dbpasCarousel-master/jquery.dbpas.carousel.js"></script>

	<script src="/libs/plugins-scroll/plugins-scroll.js"></script>
	<script src="/libs/owl-carousel/owl.carousel.min.js"></script>
	<script src="/libs/popup/magnific-popup.js"></script>
	<script src="/js/common.js"></script>
	<script src="/js/accordion.js"></script>
	<script src="/js/wSelect.min.js"></script>

	<script src="/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="/js/masterslider.js"></script>


	<script src="/js/fancybox/jquery.fancybox.pack.js"></script>
	<script src="/js/fancybox/jquery.fancybox-buttons.js"></script>
	<script src="/js/fancybox/jquery.fancybox-thumbs.js"></script>
	<script src="/js/readmore.js"></script>
	<script src="/js/StickyBlock/jquery.airStickyBlock.js"></script>



	<script language="javascript">
	$(document).ready(function() {
	$( ".new_left_menu>li" ).each(function(){
$(this).append($("#"+$(this).attr("data-id")));
});
    $(".topnav, .lftnnv").accordion({
        accordion:false,
        speed: 10,
        closedSign: '+',
        openedSign: '-'
    });
});
</script>

	<?if(preg_match('/catalog/',$APPLICATION->GetCurPage(),$preg)):?>
	<link rel="stylesheet" type="text/css" href="/js/YouTube_PopUp-master/YouTubePopUp.css">
	<script type="text/javascript" src="/js/YouTube_PopUp-master/YouTubePopUp.jquery.js"></script>
	<script type="text/javascript">
		jQuery(function(){
			jQuery("a[href^='https://www.youtube.com']").YouTubePopUp();
			jQuery("a[href^='https://youtu.be']").YouTubePopUp();
		});
	</script>
	<?endif;?>


	<link rel="shortcut icon" href="/img/favicon/favicon.png" type="image/x-icon">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=1200">
<!--	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">-->
	
<link href="https://fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,700,500,500italic,400italic,700italic" rel="stylesheet" type="text/css">

</head>

<body>
<!-- ПРЕЛОАД
		<div class="loader">
			<div class="loader_inner"></div>
		</div>
-->
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<div class="big-back-formenu"></div>




	<div class="header-new">

		<div class="container">

			<div class="row">
				<div class="col-md-4 padding_0">
					<div class="logo-new">
						<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/logo.php"), false);?>
					</div>
				</div>
				<div class="col-md-4">
					<div class="number-block-new">
						<div class="phone-logo">
							<i class="fa fa-phone"></i>
						</div>
						<div class="phone-text">
							<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/phone-top.php"), false);?><br/>
							<span>Бесплатные звонки по РФ</span>
						</div>
					</div>
				</div>
				<div class="col-md-4 padding_0">

					<div class="personal-new">

						<ul class="personal-one">

								<?$APPLICATION->IncludeComponent(
									"bitrix:sale.basket.basket.line",
									"new",
									array(
										"PATH_TO_BASKET" => SITE_DIR."cart/",
										"PATH_TO_PERSONAL" => SITE_DIR."personal/",
										"SHOW_PERSONAL_LINK" => "N",
										"SHOW_NUM_PRODUCTS" => "Y",
										"SHOW_TOTAL_PRICE" => "Y",
										"SHOW_PRODUCTS" => "N",
										"POSITION_FIXED" => "N",
										"SHOW_AUTHOR" => "N",
										"PATH_TO_REGISTER" => SITE_DIR."login/",
										"PATH_TO_PROFILE" => SITE_DIR."personal/",
										"COMPONENT_TEMPLATE" => "new",
										"PATH_TO_ORDER" => SITE_DIR."personal/order/make/",
										"SHOW_EMPTY_VALUES" => "Y",
										"HIDE_ON_BASKET_PAGES" => "N"
									),
									false
								);?>
						</ul>

						<div class="personal-line"></div>

						<ul class="personal-two">

							<?
							$APPLICATION->IncludeComponent(
								"bitrix:system.auth.form",
								"new",
								Array(
									"SHOW_ERRORS" => "Y",

								)
							);
							?>
						</ul>

					</div>

				</div>
			</div>
			<div class="row">
				<div class="col-md-9 padding_0">
					<div class="menu-new">
						<ul>

							<?$APPLICATION->IncludeComponent("bitrix:menu", "new_top", Array(
									"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
									"MENU_CACHE_TYPE" => "N",	// Тип кеширования
									"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
									"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
									"MENU_THEME" => "site",
									"MAX_LEVEL" => "1",	// Уровень вложенности меню
									"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
									"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
									"DELAY" => "N",	// Откладывать выполнение шаблона меню
									"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
									"COMPONENT_TEMPLATE" => "new_top",

								)
							);?>
						</ul>
					</div>
				</div>
				<div class="col-md-3">
					<div class="search-new">
						<?$APPLICATION->IncludeComponent("bitrix:search.title", "new", Array(
							"NUM_CATEGORIES" => "1",	// Количество категорий поиска
							"TOP_COUNT" => "5",	// Количество результатов в каждой категории
							"CHECK_DATES" => "N",	// Искать только в активных по дате документах
							"SHOW_OTHERS" => "N",	// Показывать категорию "прочее"
							"PAGE" => SITE_DIR."catalog/",	// Страница выдачи результатов поиска (доступен макрос #SITE_DIR#)
							"CATEGORY_0_TITLE" => GetMessage("SEARCH_GOODS"),	// Название категории
							"CATEGORY_0" => array(	// Ограничение области поиска
								0 => "iblock_1c_catalog",
							),
							"CATEGORY_0_iblock_catalog" => array(
								0 => "all",
							),
							"CATEGORY_OTHERS_TITLE" => GetMessage("SEARCH_OTHER"),
							"SHOW_INPUT" => "Y",	// Показывать форму ввода поискового запроса
							"INPUT_ID" => "title-search-input",	// ID строки ввода поискового запроса
							"CONTAINER_ID" => "search",	// ID контейнера, по ширине которого будут выводиться результаты
							"PRICE_CODE" => array(	// Тип цены
								0 => "БИТРИКС ТИПОВОЕ",
							),
							"SHOW_PREVIEW" => "Y",	// Показать картинку
							"PREVIEW_WIDTH" => "75",	// Ширина картинки
							"PREVIEW_HEIGHT" => "75",	// Высота картинки
							"CONVERT_CURRENCY" => "Y",	// Показывать цены в одной валюте
							"COMPONENT_TEMPLATE" => "visual",
							"ORDER" => "date",	// Сортировка результатов
							"USE_LANGUAGE_GUESS" => "Y",	// Включить автоопределение раскладки клавиатуры
							"PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
							"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода
							"CURRENCY_ID" => "RUB",	// Валюта, в которую будут сконвертированы цены
							"CATEGORY_0_iblock_1c_catalog" => array(	// Искать в информационных блоках типа "iblock_1c_catalog"
								0 => "5",
							)
						),
							false
						);?>
					</div>
				</div>
			</div>

		</div>


	</div>






						<?global $USER;
						global $APPLICATION;
						$dir = $APPLICATION->GetCurDir();
						//$languages=array("/en/","/ua/");
						?>
						<?if(in_array(substr($dir, 0, 4),$languages)){
						$not_rus=true;?>
						<?}?>













<?if($USER->IsAuthorized()): ?>
<div id="auth_yes"></div>
<?endif;?>



<? if ($APPLICATION->GetCurPage(false) !== '/catalog/'&&$APPLICATION->GetCurPage(false) !== '/services/'&&$APPLICATION->GetCurPage(false) !== '/'&&$APPLICATION->GetCurPage()!=="/vhod/registration.php"&&!CSite::InDir('/personal/')): ?> 
<?if (!defined('ERROR_404') || ERROR_404 != 'Y') {?>
<section class="main_katalog catalog_categories_wr">
<div class="container" style="position: relative">
<?if(!$_GET["q"]){?>
<div class="row">


			<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list", 
	"menu_left_not_home", 
	array(
		"ADD_SECTIONS_CHAIN" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COUNT_ELEMENTS" => "Y",
		"IBLOCK_ID" => "18",
		"IBLOCK_TYPE" => "1c_catalog",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array(
			0 => "NAME",
			1 => "",
		),
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(
			0 => "UF_SAYT_PAPKA_TIP",
			1 => "UF_KARTINKI",
			2 => "",
		),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "5",
		"VIEW_MODE" => "LIST",
		"COMPONENT_TEMPLATE" => "menu_left_not_home"
	),
	false
);?>
					<?
					/*
					 * УБИТОЕ КЕМ ТО ПЛОХО СДЕЛАННОЕ МОБИЛЬНОЕ МЕНЮ.
					$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"new_mob", 
	array(
		"ROOT_MENU_TYPE" => "left",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "36000000",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_THEME" => "site",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "3",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"COMPONENT_TEMPLATE" => "new_mob"
	),
	false
); */
					?>


<div class="col-md-12 padding_0">

		<div class="col-md-12 padding_0 breadcrumb-height">
				<?$APPLICATION->IncludeComponent(
					"bitrix:breadcrumb",
					"new",
					Array(
						"PATH" => "",
						"SITE_ID" => "s1",
						"START_FROM" => "0"
						)
				);?>
		</div>
<?}?>
<?}?>
<? endif; ?> 