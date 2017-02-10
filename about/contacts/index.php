<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Задайте вопрос");
?>
<div class="contacts">
<div class="left_contact"><h3 class="name_section">Контакты</h3>
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
	Array(
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
		"VARIABLE_ALIASES" => array("WEB_FORM_ID"=>"WEB_FORM_ID","RESULT_ID"=>"RESULT_ID",),
		"WEB_FORM_ID" => "2",
"AJAX_MODE"=>"Y"
	)
);?>
				</div>

			
				
			</div>
		</div>
		</div>
	</div>
</section>

<section class="contacts_map">
	<div class="map_name">
		<h3>Схема проезда:</h3>
		<span class="active_map voroneg">г.Воронеж</span>
		<span class="moskva">г.Москва</span>
	</div>
	<div class="voroneg_map">
	 	<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/contacts_map1.php"), false);?>
	
		</div> 	

	<div class="moskov_map map_none">	
	 	<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/contacts_map2.php"), false);?>
	
		
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php")?>