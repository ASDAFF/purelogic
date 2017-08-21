<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты - Purelogic R&D");
?>
<div class="contacts">
<div class="left_contact"><h3 class="name_section">Контакты</h3>
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
	);?>
	
<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/contacts_1.php"), false);?>
</div>
<div class="right_contact">
<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/contacts_2.php"), false);?>
	<h3 class="name_section">Мы в соцсетях</h3>
					<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/contacts_3.php"), false);?>
	</div>			
				<h3 class="name_section">Быстрая связь</h3>
				<div id="user_form" class="card_company">
				<?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new", 
	".default", 
	array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"COMPONENT_TEMPLATE" => ".default",
		"EDIT_URL" => "result_edit.php",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LIST_URL" => "result_list.php",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"WEB_FORM_ID" => "2",
		"AJAX_MODE" => "Y",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?>
					<style>
						form[name="bystraya_svyaz"] .col-md-9.padding_0{
							width: 100% !important;

						}
						form[name="bystraya_svyaz"] .col-md-9.padding_0 img{
							width: 140px !important;
						}
					</style>
				</div>
			</div>
<p>Схема проезда, г.Воронеж / Location in Voronezh</p>
<p><iframe frameborder="0" src="//maps.google.ru/maps/ms?msa=0&amp;msid=203083242483772114921.0004bf09b1e8a9a2fa57d&amp;hl=ru&amp;ie=UTF8&amp;t=m&amp;ll=51.689159,39.270415&amp;spn=0.009312,0.011158&amp;z=15&amp;output=embed" width="980" height="650"></iframe><br /><small>Просмотреть <a style="color: #0000ff; text-align: left;" href="//maps.google.ru/maps/ms?msa=0&amp;msid=203083242483772114921.0004bf09b1e8a9a2fa57d&amp;hl=ru&amp;ie=UTF8&amp;t=m&amp;ll=51.689159,39.270415&amp;spn=0.009312,0.011158&amp;z=15&amp;source=embed">Purelogic R&amp;D, г.Воронеж</a> на карте большего размера</small></p>
<p>&nbsp;</p>
<p>Схема проезда, г.Москва / Location in Moscow</p>
<p><iframe frameborder="0" src="//maps.google.ru/maps/ms?msa=0&amp;msid=212863317379938281315.0004ec4f56addb49211f2&amp;hl=ru&amp;ie=UTF8&amp;ll=55.725436,37.620218&amp;spn=0.009312,0.011158&amp;z=15&amp;output=embed" width="980" height="650"></iframe><br /><small>Просмотреть <a style="color: #0000ff; text-align: left;" href="//maps.google.ru/maps/ms?msa=0&amp;msid=212863317379938281315.0004ec4f56addb49211f2&amp;hl=ru&amp;ie=UTF8&amp;ll=55.725436,37.620218&amp;spn=0.009312,0.011158&amp;z=15&amp;source=embed">Purelogic R&amp;D, г.Москва</a> на карте большего размера</small></p>
<p>&nbsp;</p>
<p>Схема проезда, г.Санкт-Петербург / Location in Saint Petersburg</p>
<p><iframe frameborder="0" src="//maps.google.ru/maps/ms?msa=0&amp;msid=1e_hyHSw75YlmyeAM6cqqLSQNaGY&amp;hl=ru&amp;ie=UTF8&amp;ll=59.98618, 30.32042&amp;spn=0.009312,0.011158&amp;z=15&amp;output=embed" width="980" height="650"></iframe><br /><small>Просмотреть <a style="color: #0000ff; text-align: left;" href="//maps.google.ru/maps/ms?msa=0&amp;msid=1e_hyHSw75YlmyeAM6cqqLSQNaGY&amp;hl=ru&amp;ie=UTF8&amp;ll=59.98618, 30.32042&amp;spn=0.009312,0.011158&amp;z=15&amp;output=embed">Purelogic R&amp;D, г.Санкт-Петербург</a> на карте большего размера</small></p>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php")?>