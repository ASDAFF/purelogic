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
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
<link href="https://fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,700,500,500italic,400italic,700italic" rel="stylesheet" type="text/css">

</head>

<body>
<!-- ПРЕЛОАД
		<div class="loader">
			<div class="loader_inner"></div>
		</div>
-->
<div id="panel">
			<?$APPLICATION->ShowPanel();?>
		</div>
		<div class="big-back-formenu"></div>
<header>
	<div class="opticly-background-header"></div>
	<div class="container">
		<div class="row">
		<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
				<div class="logo">
					
					<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/logo.php"), false);?>
					
				</div>
				<a class="menu-toggle_cat hidden-lg hidden-md hidden-sm " href="#"><span>Menu</span></a>
			</div>
			<?/*<div class="col-md-5 col-lg-6 col-sm-8 col-xs-6">
				<div class="header_phone">
					<span class="icon_phone_header"><i class="fa fa-phone" aria-hidden="true"></i></span>
				<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/phone-top.php"), false);?>	
				</div>
				<div class="obrat_zvonok hidden-md hidden-xs">
					<span><img src="/img/icon/obr_zvon.png" alt=""></span>
					<a href="#" class="obr_zvon_a">Обратный звонок</a>
					<div class="zvon_form">
		<?$APPLICATION->IncludeComponent(
	"altasib:feedback.form", 
	"new", 
	array(
		"ACTIVE_ELEMENT" => "Y",
		"ADD_LEAD" => "N",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"ALX_CHECK_NAME_LINK" => "N",
		"BACKCOLOR_ERROR" => "#ffffff",
		"BBC_MAIL" => "",
		"BORDER_RADIUS" => "3px",
		"CATEGORY_SELECT_NAME" => "Выберите категорию",
		"CHECK_ERROR" => "Y",
		"COLOR_ERROR" => "#8E8E8E",
		"COLOR_ERROR_TITLE" => "#A90000",
		"COLOR_HINT" => "#000000",
		"COLOR_INPUT" => "#727272",
		"COLOR_MESS_OK" => "#963258",
		"COLOR_NAME" => "#000000",
		"EVENT_TYPE" => "ALX_FEEDBACK_FORM",
		"FB_TEXT_NAME" => "",
		"FB_TEXT_SOURCE" => "PREVIEW_TEXT",
		"FORM_ID" => "1",
		"HIDE_FORM" => "N",
		"IBLOCK_ID" => "10",
		"IBLOCK_TYPE" => "altasib_feedback",
		"IMG_ERROR" => "/upload/altasib.feedback.gif",
		"IMG_OK" => "/upload/altasib.feedback.ok.gif",
		"JQUERY_EN" => "N",
		"LOCAL_REDIRECT_ENABLE" => "N",
		"MASKED_INPUT_PHONE" => array(
		),
		"MESSAGE_OK" => "Сообщение отправлено!",
		"NAME_ELEMENT" => "ALX_DATE",
		"PROPERTY_FIELDS" => array(
			0 => "PHONE",
			1 => "FIO",
		),
		"PROPERTY_FIELDS_REQUIRED" => array(
			0 => "PHONE",
			1 => "FIO",
		),
		"PROPS_AUTOCOMPLETE_EMAIL" => array(
		),
		"PROPS_AUTOCOMPLETE_NAME" => array(
		),
		"PROPS_AUTOCOMPLETE_PERSONAL_PHONE" => array(
		),
		"PROPS_AUTOCOMPLETE_VETO" => "N",
		"REWIND_FORM" => "N",
		"SECTION_MAIL_ALL" => "sale@pl.iswin.ru",
		"SEND_MAIL" => "N",
		"SHOW_MESSAGE_LINK" => "Y",
		"SIZE_HINT" => "10px",
		"SIZE_INPUT" => "12px",
		"SIZE_NAME" => "12px",
		"USERMAIL_FROM" => "N",
		"USE_CAPTCHA" => "N",
		"WIDTH_FORM" => "50%",
		"COMPONENT_TEMPLATE" => "new"
	),
	false
);?>
				</div>
				</div>
					
				
			</div>*/?>
			<div class="col-md-9 col-lg-9 col-sm-9 hidden-xs col-xs-12 padding_left_xs_0">
				<div class="icon_wr_sm">
					<div class="col-md-4 col-lg-3 hidden-xs hidden-sm">
					<div class="header_phone">
					<span class="icon_phone_header"><i class="fa fa-phone" aria-hidden="true"></i></span>
				
				<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/phone-top.php"), false);?>

				</div>
				</div>

				<div class="col-md-4 col-lg-3 hidden-xs hidden-sm">
					<div class="call_back_header">
					<!--	<span>Обратный звонок</span> -->
					</div>
				</div>
					<?/*<div class="col-md-4 col-lg-5 hidden-xs hidden-sm">
					<?$APPLICATION->IncludeComponent(
	"bitrix:search.title", 
	"new", 
	array(
		"NUM_CATEGORIES" => "1",
		"TOP_COUNT" => "5",
		"CHECK_DATES" => "N",
		"SHOW_OTHERS" => "N",
		"PAGE" => SITE_DIR."catalog/",
		"CATEGORY_0_TITLE" => GetMessage("SEARCH_GOODS"),
		"CATEGORY_0" => array(
			0 => "iblock_1c_catalog",
		),
		"CATEGORY_0_iblock_catalog" => array(
			0 => "all",
		),
		"CATEGORY_OTHERS_TITLE" => GetMessage("SEARCH_OTHER"),
		"SHOW_INPUT" => "Y",
		"INPUT_ID" => "title-search-input",
		"CONTAINER_ID" => "search",
		"PRICE_CODE" => array(
			0 => "Продажа на сайте",
		),
		"SHOW_PREVIEW" => "Y",
		"PREVIEW_WIDTH" => "75",
		"PREVIEW_HEIGHT" => "75",
		"CONVERT_CURRENCY" => "Y",
		"COMPONENT_TEMPLATE" => "new",
		"ORDER" => "date",
		"USE_LANGUAGE_GUESS" => "Y",
		"PRICE_VAT_INCLUDE" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"CURRENCY_ID" => "RUB",
		"CATEGORY_0_iblock_1c_catalog" => array(
			0 => "5",
			1 => "18",
		)
	),
	false
);?>
					
						
					</div>*/?>
					<div class="hidden-md hidden-lg col-sm-2 col-xs-2">
						<a href="#reg-01" class="search_sm"><i class="fa fa-search" aria-hidden="true"></i></a>
					</div>
					<!-- popup -->

							<div id="reg-01" class="popup-modal reg_popup slider mfp-hide">
	                            <div id="login-form">
		                            
	                            	
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


					<div class="col-md-5 col-lg-5 col-sm-2 col-xs-3">
						<div class="korzina">
						<div id="cucuca">
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
							</div>
						
							<div class="korzina_podskazka">
								<p>Товар добавлен</p>
								<a class="btn_grey" href="/cart/">Перейти в козину</a>
							</div>		
						</div>
					</div>
					<div class="col-md-1 col-lg-1 col-sm-8 col-xs-6" style="text-align: right;padding: 20px 5px">
						<?global $USER;
						global $APPLICATION;
						$dir = $APPLICATION->GetCurDir();
						//$languages=array("/en/","/ua/");
						?>
						<?if(in_array(substr($dir, 0, 4),$languages)){
						$not_rus=true;?>
						<?}?>

						<a href="<?/*if ($USER->IsAuthorized()) {?>/personal/<?}else{?>#<?}*/?>#" class="hidden-xs user_head">
							<img src="/img/icon/person.png" alt="">
						</a>
					</div>
				</div>	
				
			</div>

		</div>
		
	</div>
</header>

<!-- Форма входа при клике  -->
<section class="main_logo_vhod">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-lg-3  col-sm-6 col-xs-5 ">
				<div class="logo">
				<?//$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/logo.php"), false);?>
				</div>
			</div>
			<div class="col-md-9 col-lg-8 col-sm-6 col-xs-7 ">
				<div class="main_vhod">
					<a href="/vhod/registration.php">регистрация</a>
					<?
					$APPLICATION->IncludeComponent(
	"bitrix:system.auth.form",
	"new",
	Array(
"SHOW_ERRORS" => "Y",

	)
);
?> 
					
                    <a href="#reg-03" class="btn hidden-md hidden-lg user_header" >войти</a> 

                    <div id="reg-03" class="popup-modal reg_popup slider mfp-hide">
                            <div id="login-form">
	                            <div class="logo_popup">
	                            	<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/logo.php"), false);?>
	                            </div>
                            	
                                <?
					$APPLICATION->IncludeComponent(
	"bitrix:system.auth.form",
	"new_for_sm",
	Array(
"SHOW_ERRORS" => "Y",


	)
);
?> 
                            </div>
                        </div>
					<a href="/vhod/?forgot_password=yes" class="vspomnit_parol">вспомнить пароль</a>
				</div>
			</div>
		</div>
	</div>
</section>




<section class="main_logo">
	<span class="menu_opticaly"></span>
	<div class="container">
		<div class="row">


			<div class="col-md-8 col-lg-9 col-sm-12  padding-xs-0 col-xs-12">

				<div class="main_logo_menu ">
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
						<li class="hidden-lg hidden-sm hidden-md black_bg "><a href="#reg-05" class="obr_zvon_popop" >Обратный звонок</a></li>
						<li class="hidden-lg hidden-sm hidden-md black_bg"><a href="#reg-03" class="vhod_pop" >Личный кабинет</a></li>
						<!-- Popup kabinet -->
						<div id="reg-03" class="popup-modal reg_popup slider mfp-hide">
							<div id="login-form">
								<div class="logo_popup">
									<img src="/img/main_logo.png" alt="">
								</div>

								<?
								$APPLICATION->IncludeComponent(
									"bitrix:system.auth.form",
									"new_sm",
									Array(
										"SHOW_ERRORS" => "Y",


									)
								);
								?>
							</div>
						</div>
						<!-- Popup obrat_zvonok -->
						<div id="reg-05" class="popup-modal reg_popup slider mfp-hide">
							<div id="login-form">
								<h2>Обратный звонок</h2>
								<form action="#" id="user_form" >
									<input type="text" name="" placeholder="Имя" />
									<input type="text" name="" placeholder="Телефон" />
									<input type="submit" name="" value="Перезвоните мне" class="submit btn" />
								</form>
							</div>
						</div>


					</ul>
				</div>
			</div>
			<div class="col-md-4 col-lg-3 col-sm-5 hidden-sm сol-xs-12">
				<?$APPLICATION->IncludeComponent(
					"bitrix:search.title",
					"new",
					array(
						"NUM_CATEGORIES" => "1",
						"TOP_COUNT" => "5",
						"CHECK_DATES" => "N",
						"SHOW_OTHERS" => "N",
						"PAGE" => SITE_DIR."catalog/",
						"CATEGORY_0_TITLE" => GetMessage("SEARCH_GOODS"),
						"CATEGORY_0" => array(
							0 => "iblock_1c_catalog",
						),
						"CATEGORY_0_iblock_catalog" => array(
							0 => "all",
						),
						"CATEGORY_OTHERS_TITLE" => GetMessage("SEARCH_OTHER"),
						"SHOW_INPUT" => "Y",
						"INPUT_ID" => "title-search-input",
						"CONTAINER_ID" => "search",
						"PRICE_CODE" => array(
							0 => "Продажа на сайте",
						),
						"SHOW_PREVIEW" => "Y",
						"PREVIEW_WIDTH" => "75",
						"PREVIEW_HEIGHT" => "75",
						"CONVERT_CURRENCY" => "Y",
						"COMPONENT_TEMPLATE" => "new",
						"ORDER" => "date",
						"USE_LANGUAGE_GUESS" => "Y",
						"PRICE_VAT_INCLUDE" => "Y",
						"PREVIEW_TRUNCATE_LEN" => "",
						"CURRENCY_ID" => "RUB",
						"CATEGORY_0_iblock_1c_catalog" => array(
							0 => "all",
						)
					),
					false
				);?>

			</div>
		</div>
	</div>
</section>

<script>
	$(function(){
		$('#bx-panel-hider').click(function(){
		var h =	$('.opticly-background-header').css('height');
		});
		$('#bx-panel-expander').click(function(){
		});
	});
</script>

<section class="slider_main hidden-sm hidden-xs"></section>

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


<div class="col-md-12 ">

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