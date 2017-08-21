<?
//тест
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetTitle("Purelogic R&amp;D: комплектующие для станков ЧПУ и систем автоматизации");
?><section class="double_block">
<div class="container">
	<div class="left_index">
		 <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"menu_left",
	Array(
		"ADD_SECTIONS_CHAIN" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => "menu_left",
		"COUNT_ELEMENTS" => "Y",
		"IBLOCK_ID" => "18",
		"IBLOCK_TYPE" => "1c_catalog",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array(0=>"NAME",1=>"",),
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(0=>"UF_SAYT_PAPKA_TIP",1=>"UF_KARTINKI",2=>"UF_SORTIROVKA",3=>"",),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "4",
		"VIEW_MODE" => "LIST"
	)
);?> <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"index_left",
	Array(
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
		"COMPONENT_TEMPLATE" => "index_left",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"NAME",1=>"PREVIEW_PICTURE",2=>"DATE_ACTIVE_FROM",3=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "14",
		"IBLOCK_TYPE" => "data",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "5",
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
		"PROPERTY_CODE" => array(0=>"",1=>"",),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "ID",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC"
	)
);?> <!-- При адаптиве меню --> <?
		/*
		$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"new_mob",
	Array(
		"ALLOW_MULTI_SELECT" => "N",
		"CACHE_SELECTED_ITEMS" => "N",
		"CHILD_MENU_TYPE" => "left1",
		"DELAY" => "N",
		"MAX_LEVEL" => "3",
		"MENU_CACHE_GET_VARS" => array(),
		"MENU_CACHE_TIME" => "36000000",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_THEME" => "site",
		"ROOT_MENU_TYPE" => "left1",
		"USE_EXT" => "Y"
	)
);
		*/
		?> <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"home_baner_page",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
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
		"COMPONENT_TEMPLATE" => "home_baner_page",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "30",
		"IBLOCK_TYPE" => "data",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
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
		"PROPERTY_CODE" => array(0=>"",1=>"",),
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
	)
);?>
	</div>
	<div class="right_index">
		 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"new",
	Array(
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
		"CACHE_TYPE" => "N",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "new",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "11",
		"IBLOCK_TYPE" => "data",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
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
		"PROPERTY_CODE" => array(0=>"",1=>"TEMPLATE",2=>"BUTTON_TEXT",3=>"ALT",4=>"BUTTON_URL",5=>"TITLE_DOP",6=>"",),
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
	)
);?> <?
			if($_SESSION['news_hidden_home'] != 'N') {
				$APPLICATION->IncludeComponent("bitrix:news.list", "news_home_right", Array(
					"ACTIVE_DATE_FORMAT" => "d.m.Y",    // Формат показа даты
					"ADD_SECTIONS_CHAIN" => "Y",    // Включать раздел в цепочку навигации
					"AJAX_MODE" => "N",    // Включить режим AJAX
					"AJAX_OPTION_ADDITIONAL" => "",    // Дополнительный идентификатор
					"AJAX_OPTION_HISTORY" => "N",    // Включить эмуляцию навигации браузера
					"AJAX_OPTION_JUMP" => "N",    // Включить прокрутку к началу компонента
					"AJAX_OPTION_STYLE" => "Y",    // Включить подгрузку стилей
					"CACHE_FILTER" => "N",    // Кешировать при установленном фильтре
					"CACHE_GROUPS" => "Y",    // Учитывать права доступа
					"CACHE_TIME" => "36000000",    // Время кеширования (сек.)
					"CACHE_TYPE" => "A",    // Тип кеширования
					"CHECK_DATES" => "Y",    // Показывать только активные на данный момент элементы
					"DETAIL_URL" => "",    // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
					"DISPLAY_BOTTOM_PAGER" => "Y",    // Выводить под списком
					"DISPLAY_DATE" => "Y",    // Выводить дату элемента
					"DISPLAY_NAME" => "Y",    // Выводить название элемента
					"DISPLAY_PICTURE" => "N",    // Выводить изображение для анонса
					"DISPLAY_PREVIEW_TEXT" => "Y",    // Выводить текст анонса
					"DISPLAY_TOP_PAGER" => "N",    // Выводить над списком
					"FIELD_CODE" => array(    // Поля
						0 => "",
						1 => "",
					),
					"FILTER_NAME" => "",    // Фильтр
					"HIDE_LINK_WHEN_NO_DETAIL" => "N",    // Скрывать ссылку, если нет детального описания
					"IBLOCK_ID" => "29",    // Код информационного блока
					"IBLOCK_TYPE" => "data",    // Тип информационного блока (используется только для проверки)
					"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",    // Включать инфоблок в цепочку навигации
					"INCLUDE_SUBSECTIONS" => "Y",    // Показывать элементы подразделов раздела
					"MESSAGE_404" => "",    // Сообщение для показа (по умолчанию из компонента)
					"NEWS_COUNT" => "1",    // Количество новостей на странице
					"PAGER_BASE_LINK_ENABLE" => "N",    // Включить обработку ссылок
					"PAGER_DESC_NUMBERING" => "N",    // Использовать обратную навигацию
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",    // Время кеширования страниц для обратной навигации
					"PAGER_SHOW_ALL" => "N",    // Показывать ссылку "Все"
					"PAGER_SHOW_ALWAYS" => "N",    // Выводить всегда
					"PAGER_TEMPLATE" => ".default",    // Шаблон постраничной навигации
					"PAGER_TITLE" => "Новости",    // Название категорий
					"PARENT_SECTION" => "",    // ID раздела
					"PARENT_SECTION_CODE" => "",    // Код раздела
					"PREVIEW_TRUNCATE_LEN" => "",    // Максимальная длина анонса для вывода (только для типа текст)
					"PROPERTY_CODE" => array(    // Свойства
						0 => "",
						1 => "",
					),
					"SET_BROWSER_TITLE" => "N",    // Устанавливать заголовок окна браузера
					"SET_LAST_MODIFIED" => "N",    // Устанавливать в заголовках ответа время модификации страницы
					"SET_META_DESCRIPTION" => "N",    // Устанавливать описание страницы
					"SET_META_KEYWORDS" => "N",    // Устанавливать ключевые слова страницы
					"SET_STATUS_404" => "N",    // Устанавливать статус 404
					"SET_TITLE" => "N",    // Устанавливать заголовок страницы
					"SHOW_404" => "N",    // Показ специальной страницы
					"SORT_BY1" => "ACTIVE_FROM",    // Поле для первой сортировки новостей
					"SORT_BY2" => "SORT",    // Поле для второй сортировки новостей
					"SORT_ORDER1" => "DESC",    // Направление для первой сортировки новостей
					"SORT_ORDER2" => "ASC",    // Направление для второй сортировки новостей
				),
					false
				);
			}
			?> <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"home_product",
	Array(
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COUNT_ELEMENTS" => "Y",
		"IBLOCK_ID" => "28",
		"IBLOCK_TYPE" => "data",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array(0=>"",1=>"",),
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(0=>"",1=>"",),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "2",
		"VIEW_MODE" => "LINE"
	)
);?> <section class="about_main">
		<div class="h2-about-home">
			 PureLogic R&amp;D
		</div>
		<div class="green-bg">
			 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/include/about.php"
	)
);?>
		</div>
 </section>
	</div>
	<div class="clear">
	</div>
</div>
 </section> <!-- Почему мы? --> <!-- <section class="about_we">
<div class="section_name">
 <br>
	<h3>Почему мы?</h3>
</div>
<div class="container">
	<div class="row"> -->
		<? /*$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"whywe",
	Array(
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
		"COMPONENT_TEMPLATE" => "whywe",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"PREVIEW_TEXT",1=>"PREVIEW_PICTURE",2=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "12",
		"IBLOCK_TYPE" => "data",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "4",
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
		"PROPERTY_CODE" => array(0=>"",1=>"",),
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
		"SORT_ORDER2" => "ASC"
	)
);*/?>
	<!--</div>
</div>
 </section> -->
<!-- станок Чпу -->
<? /* <section class="novosti_slider">
              <div class="container">
              <h2>Новое видео</h2>
              <?$APPLICATION->IncludeComponent(
              "bitrix:news.list",
              "video_news",
              Array(
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
              "COMPONENT_TEMPLATE" => "video_news",
              "DETAIL_URL" => "",
              "DISPLAY_BOTTOM_PAGER" => "N",
              "DISPLAY_DATE" => "N",
              "DISPLAY_NAME" => "N",
              "DISPLAY_PICTURE" => "Y",
              "DISPLAY_PREVIEW_TEXT" => "Y",
              "DISPLAY_TOP_PAGER" => "N",
              "FIELD_CODE" => array(0=>"PREVIEW_TEXT",1=>"PREVIEW_PICTURE",2=>"DATE_ACTIVE_FROM",3=>"",),
              "FILTER_NAME" => "",
              "HIDE_LINK_WHEN_NO_DETAIL" => "N",
              "IBLOCK_ID" => "15",
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
              "PROPERTY_CODE" => array(0=>"",1=>"",),
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
              "SORT_ORDER2" => "ASC"
              )
              );?>
              </div>
              </section> */ ?><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
