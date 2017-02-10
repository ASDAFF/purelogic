<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("wiki");
?><?$APPLICATION->IncludeComponent(
	"bitrix:wiki", 
	".default", 
	array(
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"ELEMENT_NAME" => $_REQUEST["title"],
		"IBLOCK_ID" => "25",
		"IBLOCK_TYPE" => "wikipedia",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"NAV_ITEM" => "",
		"PATH_TO_USER" => "",
		"RATING_TYPE" => "",
		"SEF_MODE" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_RATING" => "",
		"USE_REVIEW" => "N",
		"COMPONENT_TEMPLATE" => ".default",
		"SEF_FOLDER" => "/wiki/",
		"SEF_URL_TEMPLATES" => array(
			"index" => "index.php",
			"post" => "#wiki_name#/",
			"post_edit" => "#wiki_name#/edit/",
			"categories" => "categories/",
			"discussion" => "#wiki_name#/discussion/",
			"history" => "#wiki_name#/history/",
			"history_diff" => "#wiki_name#/history/diff/",
			"search" => "search/",
		)
	),
	false
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>