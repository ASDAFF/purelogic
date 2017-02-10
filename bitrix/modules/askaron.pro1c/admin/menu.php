<?
IncludeModuleLangFile(__FILE__);

if($APPLICATION->GetGroupRight("askaron.pro1c")!="D")
{
    CModule::IncludeModule('askaron.pro1c');
	$aMenu = array(
		"parent_menu" => "global_menu_store",
		"section" => "askaron.pro1c",
		"sort" => 50,
        "module_id" => "askaron.pro1c",
		"text" => GetMessage("ASKARON_PRO1C_MENU_MAIN"),
		"title" => GetMessage("ASKARON_PRO1C_MENU_MAIN_TITLE"),
		"url" => "askaron_pro1c_live_log.php?lang=".LANGUAGE_ID,
		"icon" => "askaron_pro1c_menu_icon",
		//"page_icon" => "askaron_pro1c_page_icon",
		"items_id" => "menu_askaron_pro1c",
		"items" => array(
			array(
				"text" => GetMessage("ASKARON_PRO1C_MENU_LIVE_LOG"),
				"url" => "askaron_pro1c_live_log.php?lang=".LANGUAGE_ID,
				"more_url" => Array(
					//"askaron_pro1c_event_admin.php",
					//"askaron_pro1c_event_edit.php",

				),
				"title" => GetMessage("ASKARON_PRO1C_MENU_LAST_TITLE"),
			),
			array(
				"text" => GetMessage("ASKARON_PRO1C_MENU_LAST"),
				"url" => "askaron_pro1c_last.php?lang=".LANGUAGE_ID,
				"more_url" => Array(
					//"askaron_pro1c_event_admin.php",
					//"askaron_pro1c_event_edit.php",

				),
				"title" => GetMessage("ASKARON_PRO1C_MENU_LAST_TITLE"),
			),			
		),
	);
	return $aMenu;
}
return false;
?>
