<? if ($APPLICATION->GetCurPage(false) !== '/catalog/'&&$APPLICATION->GetCurPage(false) !== '/services/'&&$APPLICATION->GetCurPage(false) !== '/'&&$APPLICATION->GetCurPage()!=="/vhod/registration.php"&&!CSite::InDir('/personal/')): ?> 
<?if (!defined('ERROR_404') || ERROR_404 != 'Y') {?>
<?if(!$_GET["q"]){?></div><?}?></div></section> 
<?}?>
<? endif; ?> 
<? if ($APPLICATION->GetCurPage(false) != '/support/news/'&&CSite::InDir('/support/news/')||$APPLICATION->GetCurPage() == '/vhod/registration.php'){?>
<section class="novosti_slider">
	<div class="container">
		<h2>Новости</h2>
		<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"news_new", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "PREVIEW_TEXT",
			1 => "PREVIEW_PICTURE",
			2 => "DATE_ACTIVE_FROM",
			3 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "14",
		"IBLOCK_TYPE" => "data",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "10",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"COMPONENT_TEMPLATE" => "news_new"
	),
	false
);?>
	</div>
</section>
<?}?>
<?if(CSite::InDir('/catalog/')&&!$_GET["q"]){?>
<?if (!defined('ERROR_404') || ERROR_404 != 'Y') {?>
<?
		/*
		$APPLICATION->IncludeComponent(
	"bitrix:catalog.viewed.products", 
	"new", 
	array(
		"ACTION_VARIABLE" => "action_cvp",
		"ADDITIONAL_PICT_PROP_5" => "MORE_PHOTO",
		"ADDITIONAL_PICT_PROP_6" => "MORE_PHOTO",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"BASKET_URL" => "/personal/basket.php",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CART_PROPERTIES_5" => array(
			0 => "",
			1 => "",
		),
		"CART_PROPERTIES_6" => array(
			0 => "",
			1 => "",
		),
		"CONVERT_CURRENCY" => "N",
		"DEPTH" => "",
		"DETAIL_URL" => "",
		"HIDE_NOT_AVAILABLE" => "N",
		"IBLOCK_ID" => "18",
		"IBLOCK_TYPE" => "1c_catalog",
		"LABEL_PROP_5" => "-",
		"LINE_ELEMENT_COUNT" => "10",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"OFFER_TREE_PROPS_6" => array(
		),
		"PAGE_ELEMENT_COUNT" => "10",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array(
			0 => "Продажа на сайте",
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "",
		"PRODUCT_SUBSCRIPTION" => "N",
		"PROPERTY_CODE_5" => array(
			0 => "",
			1 => "",
		),
		"PROPERTY_CODE_6" => array(
			0 => "",
			1 => "",
		),
		"SECTION_CODE" => "",
		"SECTION_ELEMENT_CODE" => "",
		"SECTION_ELEMENT_ID" => "",
		"SECTION_ID" => "",
		"SHOW_DISCOUNT_PERCENT" => "Y",
		"SHOW_FROM_SECTION" => "N",
		"SHOW_IMAGE" => "Y",
		"SHOW_NAME" => "Y",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_PRODUCTS_5" => "Y",
		"TEMPLATE_THEME" => "site",
		"USE_PRODUCT_QUANTITY" => "N",
		"COMPONENT_TEMPLATE" => "new",
		"SHOW_PRODUCTS_18" => "Y",
		"PROPERTY_CODE_18" => array(
			0 => "",
			1 => "",
		),
		"CART_PROPERTIES_18" => array(
			0 => "",
			1 => "",
		),
		"ADDITIONAL_PICT_PROP_18" => "MORE_PHOTO",
		"LABEL_PROP_18" => "-"
	),
	false
);
		*/
		?>
<?}?>
<?}?>

<? if ($APPLICATION->GetCurPage(false) == '/catalog/'&&!$_GET["q"]||defined('ERROR_404') || ERROR_404 == 'Y'||$APPLICATION->GetCurPage(false) == '/support/'||$APPLICATION->GetCurPage(false) == '/support/help/'||$APPLICATION->GetCurPage() == '/vhod/registration.php'){?>
	<?$APPLICATION->IncludeComponent("bitrix:sale.bestsellers", "new", array(
	"ACTION_VARIABLE" => "action",
		"ADDITIONAL_PICT_PROP_18" => "MORE_PHOTO",
		"ADDITIONAL_PICT_PROP_5" => "MORE_PHOTO",
		"ADDITIONAL_PICT_PROP_6" => "MORE_PHOTO",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"BASKET_URL" => "/personal/basket.php",
		"BY" => "AMOUNT",
		"CACHE_TIME" => "86400",
		"CACHE_TYPE" => "A",
		"CART_PROPERTIES_18" => array(
			0 => "",
			1 => ",",
			2 => "",
		),
		"CART_PROPERTIES_5" => array(
			0 => "",
			1 => "",
		),
		"CART_PROPERTIES_6" => array(
			0 => "",
			1 => "",
		),
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"CONVERT_CURRENCY" => "N",
		"DETAIL_URL" => "",
		"DISPLAY_COMPARE" => "N",
		"FILTER" => array(
			0 => "CANCELED",
			1 => "ALLOW_DELIVERY",
			2 => "PAYED",
			3 => "DEDUCTED",
			4 => "N",
			5 => "F",
		),
		"HIDE_NOT_AVAILABLE" => "N",
		"LABEL_PROP_18" => "-",
		"LABEL_PROP_5" => "NOVINKA",
		"LINE_ELEMENT_COUNT" => "3",
		"MESS_BTN_BUY" => "купить",
		"MESS_BTN_DETAIL" => "подробнее ",
		"MESS_BTN_SUBSCRIBE" => "уведомить",
		"MESS_NOT_AVAILABLE" => "услуга",
		"OFFER_TREE_PROPS_6" => array(
			0 => "CML2_MANUFACTURER",
		),
		"PAGE_ELEMENT_COUNT" => "30",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PERIOD" => "30",
		"PRICE_CODE" => "",
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_SUBSCRIPTION" => "N",
		"PROPERTY_CODE_18" => array(
			0 => "",
			1 => ",",
			2 => "",
		),
		"PROPERTY_CODE_5" => array(
			0 => "NOVINKA",
			1 => "HIT",
			2 => "",
		),
		"PROPERTY_CODE_6" => array(
			0 => "",
			1 => "",
		),
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_IMAGE" => "Y",
		"SHOW_NAME" => "Y",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_PRODUCTS_18" => "Y",
		"SHOW_PRODUCTS_5" => "Y",
		"TEMPLATE_THEME" => "blue",
		"USE_PRODUCT_QUANTITY" => "N",
		"COMPONENT_TEMPLATE" => "new"
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "N"
	)
);?>
<?}?>
	<? if (CSite::InDir('/catalog/')&&!$_GET["q"]){?>
	<?if(!defined('ERROR_404') || ERROR_404 != 'Y'){?>
<section class="nugniy_tovar">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
			<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/nenashli.php"), false);?>
				
			</div>
			<div class="col-md-6 f-catch">
					<?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new",
	"",
	Array(
		"AJAX_MODE" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"EDIT_URL" => "",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LIST_URL" => "",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"VARIABLE_ALIASES" => Array("RESULT_ID"=>"RESULT_ID","WEB_FORM_ID"=>"WEB_FORM_ID"),
		"WEB_FORM_ID" => "1"
	)
);?>
				
			</div>
		</div>
	</div>
</section>
<style>
.f-catch img {
    height: 31px;
    margin-bottom: 10px;
}
</style>
<?}}?>
<? if ($APPLICATION->GetCurPage(false) == '/personal/'||$APPLICATION->GetCurPage(false) == '/personal/order/make/'||$APPLICATION->GetCurPage(false) == '/about/contacts/'||$APPLICATION->GetCurPage(false) == '/about/'||$APPLICATION->GetCurPage(false) == '/company/'||$APPLICATION->GetCurPage(false) == '/services/'||CSite::InDir('/support/')&&$APPLICATION->GetCurPage(false) != '/support/'&&$APPLICATION->GetCurPage(false) != '/support/help/'&&$APPLICATION->GetCurPage(false) != '/support/video/'||$_GET["q"]||defined('ERROR_404') || ERROR_404 == 'Y'){?>
<?$APPLICATION->IncludeComponent("bitrix:news.list", "down_news", array(
	"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "14",
		"IBLOCK_TYPE" => "data",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "6",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC"
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "N"
	)
);?>
<?}?>

<div class="stop-left-menu"></div>
<footer class="footer-end">
	<div class="container">
		<div class="row">

				<div class="footer_adres">
					
					<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/footer.php"), false);?>
					

				</div>

		</div>
		<div class="row">

			<div class="col-md-8 hidden-sm hidden-xs">
			<p style="color: #fff;margin-top: 5px;">Все цены на товары и услуги указаны с учетом НДС.</p>
			<p></p>
			<p></p>
			<p style="color: #fff">Обращаем ваше внимание, что цены на товары и услуги не являются публичной офертой. Информация о товаре, услугах и ценах носит исключительно информационный характер. Актуальную стоимость и наличие товара и услуг просьба уточнять дополнительно в офисах продаж.</p>
			</div>

			<div class="col-md-4 col-lg-4 col-sm-7">
				<div class="footer_social" style="margin-top: 0px;">


					<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/soccop.php"), false);?>
					

				</div>

			</div>
		</div>
	</div>
</footer>
<div id="tooltip"></div>





<!--[if lt IE 9]>
	<script src="libs/html5shiv/es5-shim.min.js"></script>
	<script src="libs/html5shiv/html5shiv.min.js"></script>
	<script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
	<script src="libs/respond/respond.min.js"></script>
	<![endif]-->
<!-- Фиксированный блок -->
<script>
	$(function(){

		new Clipboard('.btn-clipboard'); // Не забываем инициализировать библиотеку на нашей кнопке

		$("[data-tooltip]").mousemove(function (eventObject) {

			$data_tooltip = $(this).attr("data-tooltip");

			$("#tooltip").text($data_tooltip)
				.css({
					"top" : eventObject.pageY - 35,
					"left" : eventObject.pageX + 10
				})
				.show();

		}).mouseout(function () {

			$("#tooltip").hide()
				.text("")
				.css({
					"top" : 0,
					"left" : 0
				});
		});

		$('#breadcrumbs-two').airStickyBlock({
			offsetTop: 0,
			stopBlock: '.stop-left-menu'
		});

		$('.for_left_b > .bx_sitemap > .new_left_menu').airStickyBlock({
			offsetTop: 3,
			stopBlock: '.stop-left-menu'
		});


	});

</script>






<div class="hidden"></div>




	<?
	$ttl=$APPLICATION->GetTitle();

	if($ttl!=""){
	if (!in_array(array("URL"=> $_SERVER['REQUEST_URI'],"TITLE"=>$ttl), $_SESSION['history'])) {
	if(count($_SESSION['history'])<8){
	$_SESSION['history'][] =array("URL"=> $_SERVER['REQUEST_URI'],"TITLE"=>$ttl);
	}else
	{
	array_shift($_SESSION['history']);
	$_SESSION['history'][] =array("URL"=> $_SERVER['REQUEST_URI'],"TITLE"=>$ttl);
	}
	}}?>

</body>
</html>