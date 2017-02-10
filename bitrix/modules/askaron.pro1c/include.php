<?
###################################################
# askaron.pro1c module                            #
# Copyright (c) 2011-2013 Askaron Systems ltd.    #
# http://askaron.ru                               #
# mailto:mail@askaron.ru                          #
###################################################

IncludeModuleLangFile(__FILE__);

if (!function_exists('htmlspecialcharsbx'))
{
	function htmlspecialcharsbx($string, $flags=ENT_COMPAT)
	{
		//shitty function for php 5.4 where default encoding is UTF-8
		return htmlspecialchars($string, $flags, (defined("BX_UTF")? "UTF-8" : "ISO-8859-1"));
	}
}


class CAskaronPro1C
{
	static protected $arPropertiesIDCache = array();
	
	static protected $microtime_page_start = "";
	
	// http://dev.1c-bitrix.ru/community/blogs/hazz/8568.php
	public static function OnGetDependentModuleHandler()
	{
		return Array(
			"MODULE_ID" => "askaron.pro1c",
			//"USE" => Array("PUBLIC_SECTION", "ADMIN_SECTION")
			"USE" => Array("ADMIN_SECTION")
		);
	}
	
	public static function OnPageStartHandler()
	{
		self::$microtime_page_start = getmicrotime();
		
		if (self::IsExchange())
		{
			//global $APPLICATION;
			
			if ( !defined("ADMIN_SECTION") || ADMIN_SECTION !== true )
			{
				// do not use default template
				define('SITE_TEMPLATE_ID', 'askaron_pro1c_empty');
				define("SITE_TEMPLATE_PATH", "/bitrix/templates/askaron_pro1c_empty");				
			}
			
			
			// strange code for future connections
			// display mysql errors. Before 14.0.0
			global $DBDebug;
			$DBDebug = true;			
			
			// display errors. Since 14.0.0
			if ( CheckVersion( SM_VERSION, '14.0.0' ) )
			{
				$exception_handling = \Bitrix\Main\Config\Configuration::getValue("exception_handling");
				
				if ( !is_array( $exception_handling ) )
				{
					$exception_handling = array();
				}
				
				$exception_handling["debug"] = true;
				
				$obConfig = \Bitrix\Main\Config\Configuration::getInstance();
				$obConfig->delete("exception_handling");
				$obConfig->add("exception_handling", $exception_handling);
			}
			// end strange code
			
			
			// display mysql errors
			global $DB;
			if ( is_object( $DB ) )
			{
				$DB->debug = true;
			}

			
			$time_limit = COption::GetOptionString("askaron.pro1c", "time_limit");
			if ( strlen( $time_limit ) > 0 )
			{
				@set_time_limit( $time_limit );
			}

			$memory_limit = COption::GetOptionString("askaron.pro1c", "memory_limit");
			if ( strlen( $memory_limit ) > 0 )
			{
				$memory_limit_value = intval( $memory_limit );
				if ( $memory_limit_value > 0 )
				{
					@ini_set( "memory_limit", $memory_limit."M" );
				}
				elseif ( $memory_limit_value == -1 )
				{
					@ini_set( "memory_limit", -1 );
				}
			}
			
			
			
			//:TODO
			//ini_get("session.gc_maxlifetime");
		}
	}
	
//	public static function OnBeforePrologHandler()
//	{
//
//	}
	
	public static function OnPrologHandler()
	{
		if (self::IsExchange())
		{
			//self::log($_SESSION, '$_SESSION');
			
			global $APPLICATION;
			
			self::log( $_SERVER["REQUEST_URI"], 'Step start' );

			if ( COption::GetOptionString("askaron.pro1c", "forbidden") == "Y" )
			{
				$APPLICATION->RestartBuffer();
				$contents = "failure\n".GetMessage(	"askaron_pro1c_forbidden_page", array(
					"#THIS_PAGE#" => $APPLICATION->GetCurPage( true ),
					"#SERVER_NAME#" => $_SERVER["SERVER_NAME"],
					"#LANG#" => LANG
				));

				if(toUpper(LANG_CHARSET) != "WINDOWS-1251")
				{
					$contents = $APPLICATION->ConvertCharset($contents, LANG_CHARSET, "windows-1251");
				}

				header("Pragma: no-cache");
				header("Content-Type: text/html; charset=windows-1251");

				echo $contents;
				die();			
			}				
			
			if( $_GET['type'] == 'catalog' && $_GET['mode'] == 'import' )
			{
				$LAST_STEP = "";
				$NEW_STEP = "";
				
				if ( isset( $_SESSION["ASKARON_PRO1C_STEP"] ) )
				{
					$LAST_STEP = $_SESSION["ASKARON_PRO1C_LAST_STEP"];
				}
				
				if ( isset( $_SESSION["BX_CML2_IMPORT"]["NS"]["STEP"] ) )
				{
					$NEW_STEP = $_SESSION["BX_CML2_IMPORT"]["NS"]["STEP"];
				}
				
				if ( $NEW_STEP > 0 &&  $NEW_STEP != $LAST_STEP )
				{
					self::log( $_SESSION["BX_CML2_IMPORT"]["NS"], GetMessage( "askaron_pro1c_new_step", array("#STEP#" => $NEW_STEP ) )  );
					$_SESSION["ASKARON_PRO1C_LAST_STEP"] = $NEW_STEP;
				}				
				
				
				$import_pause = intval( COption::GetOptionString( "askaron.pro1c", "import_pause") );
				if ( $import_pause > 0 )
				{
					//self::log($import_pause );
					sleep( $import_pause );
				}

				if( strstr($_GET['filename'], 'import') )
				{
					$arExchangeSettings = self::GetExchangeSettings();
					if ( isset( $arExchangeSettings["SKIP_PRODUCTS"] ) && $arExchangeSettings["SKIP_PRODUCTS"] == "Y" )
					{
						$APPLICATION->RestartBuffer();
						$contents = "success\n".GetMessage(	"askaron_pro1c_skip_products", array(
							"#THIS_PAGE#" => $APPLICATION->GetCurPage( true ),
							"#SERVER_NAME#" => $_SERVER["SERVER_NAME"],
							"#LANG#" => LANG
						));

						if(toUpper(LANG_CHARSET) != "WINDOWS-1251")
						{
							$contents = $APPLICATION->ConvertCharset($contents, LANG_CHARSET, "windows-1251");
						}
						
						header("Pragma: no-cache");
						header("Content-Type: text/html; charset=windows-1251");
						
						echo $contents;
						die();							
					}
				}
			}	
		}
	}	
		
	//////////////// Element
	// sort = 500000	
	public static function OnBeforeIBlockElementAddHandler(&$arFields)
	{
		self::OnBeforeWriteElement($arFields, "add");
	}

	// sort = 500000
	public static function OnBeforeIBlockElementUpdateHandler(&$arFields)
	{
		self::OnBeforeWriteElement($arFields, "update");
	}

	private static function OnBeforeWriteElement(&$arFields, $action )
	{
		if (self::IsExchange())
		{
			$label = "";
			
			if ( $action === "add" )
			{
				$label = "OnBeforeIBlockElementAdd";
			}
			
			if ( $action == "update" )
			{
				$label = "OnBeforeIBlockElementUpdate";
			}			
			
			
			self::log($arFields, $label);
			//self::log($_SESSION, "\$_SESSION");

			$arFields["ASKARON_PRO1C_ELEMENT_WRITE_START"] = getmicrotime();

			if (  COption::GetOptionString("askaron.pro1c", "fast_write") == "Y" )
			{
				if( $_GET['type'] == 'catalog' && $_GET['mode'] == 'import' && strstr($_GET['filename'], 'import') )
				{
					$arCatalogInfo = self::GetCatalogInfo( $_SESSION["BX_CML2_IMPORT"]["NS"]["IBLOCK_ID"] );

					// check if element
					if ( $arFields["IBLOCK_ID"] > 0 && $arFields["IBLOCK_ID"] == $arCatalogInfo["ADDITIONAL"]["PRODUCT_IBLOCK_ID"]  )
					{
						if ( isset($arFields["PROPERTY_VALUES"]) )				
						{
							$arFields["ASKARON_PRO1C_TMP_PROPERTY_VALUES"] = $arFields["PROPERTY_VALUES"];
							unset( $arFields["PROPERTY_VALUES"] );
						}
					}
				}			
			}
		}		
	}
	
	public static function OnBeforeIBlockElementDeleteHandler($ID)
	{
		if (self::IsExchange())
		{		
			self::log( "ID=".$ID, "OnBeforeIBlockElementDelete");
		}
	}
	
	
	// sort = 20
	public static function OnAfterIBlockElementAddHandler(&$arFields)
	{
		self::OnAfterWriteElement($arFields, "add" );
	}

	// sort = 20
	public static function OnAfterIBlockElementUpdateHandler(&$arFields)
	{
		self::OnAfterWriteElement($arFields, "update" );
	}	
	
	private static function OnAfterWriteElement(&$arFields, $action )
	{
		if (self::IsExchange())
		{
			$message = "";
			
			$bWriteOk = false;
			
			if ( $action == "add" )
			{
				if( $arFields["ID"]>0 )
				{
					$message = GetMessage( "askaron_pro1c_element_add_success", array("#ID#" => $arFields["ID"] ) );
					$bWriteOk = true;
				}
				else
				{
					$message = GetMessage( "askaron_pro1c_element_add_error", array("#RESULT_MESSAGE#" => $arFields["RESULT_MESSAGE"] ) );
				}
			}
			
			if ( $action == "update" )
			{
				if( $arFields["RESULT"] )
				{
					$message = GetMessage( "askaron_pro1c_element_update_success", array("#ID#" => $arFields["ID"] ) );
					$bWriteOk = true;
				}
				else
				{
					$message = GetMessage( "askaron_pro1c_element_update_error", array( "#ID#" => $arFields["ID"],  "#RESULT_MESSAGE#" => $arFields["RESULT_MESSAGE"] ) );				
				}
			}
			
			if ( $bWriteOk && isset( $arFields["ASKARON_PRO1C_TMP_PROPERTY_VALUES"] ) )
			{
				$ELEMENT_ID = $arFields["ID"];
				$IBLOCK_ID = $arFields["IBLOCK_ID"];
				$arValues = $arFields["ASKARON_PRO1C_TMP_PROPERTY_VALUES"];
				
				if ( $ELEMENT_ID > 0 && $IBLOCK_ID > 0 && is_array( $arValues ) && count( $arValues ) > 0 )
				{
					//strange code from cml2.php makes many empty arrays.					
					//					$arElement["PROPERTY_VALUES"][$arProperty["ID"]][$arProperty['PROPERTY_VALUE_ID']] = array(
					//						"VALUE"=>$arProperty['VALUE'],
					//						"DESCRIPTION"=>$arProperty["DESCRIPTION"]
					//					);					
					//very strange result if $arProperty['PROPERTY_VALUE_ID'] === "":					
					//					$arElement["PROPERTY_VALUES"][$arProperty["ID"]][""] = array(
					//						"VALUE"=>"",
					//						"DESCRIPTION"=>""
					//					);										
					
					// optimization. Remove strange empty arrays
					foreach ($arValues as $key=>$arValue)
					{
						if ( 								
								is_set( $arValue[""], "VALUE" ) && $arValue[""]["VALUE"] === null
							&& 
								is_set( $arValue[""], "DESCRIPTION" ) && $arValue[""]["DESCRIPTION"] === null
							&&
								count( $arValue ) == 1
						)		
						{
							unset( $arValues[$key] );
						}
					}
					
// 
//					foreach ($arValues as $key=>$arValue)
//					{
//						if ( !isset( $arValue["n0"] ) )
//						{
//							unset( $arValues[$key] );
//						}
//					}					
					

					//self::log( $arValues, "PROPERTY_VALUES" );
					CIBlockElement::SetPropertyValuesEx( $ELEMENT_ID, $IBLOCK_ID, $arValues );
					
					//CIBlockElement::SetPropertyValues( $ELEMENT_ID, $IBLOCK_ID, $arValues );
				}
			}
			
			if ( isset($arFields["ASKARON_PRO1C_ELEMENT_WRITE_START"]) )
			{
				$message .= "\n".GetMessage( 
						"askaron_pro1c_element_write_time",
						array("#TIME#" => round(getmicrotime() - $arFields["ASKARON_PRO1C_ELEMENT_WRITE_START"], 6 ) ) );
				
				unset( $arFields["ASKARON_PRO1C_ELEMENT_WRITE_START"] );
			}
			
			self::log($message);
		}
	}
	
	////////////// Price
	
	public static function OnBeforePriceAddHandler(&$arFields)
	{
		if (self::IsExchange())
		{
			self::log($arFields, "OnBeforePriceAdd");
		}
	}

	
	public static function OnBeforePriceUpdateHandler($ID, &$arFields)
	{
		if (self::IsExchange())
		{		
			$arParams = array(
				'$ID' => $ID,
				'&$arFields' => $arFields,
			);
			
			self::log($arParams, "OnBeforePriceUpdate");
		}
	}

	public static function OnBeforePriceDeleteHandler($ID)
	{
		if (self::IsExchange())
		{		
			self::log( "ID=".$ID, "OnBeforePriceDelete");
		}
	}	

	//////////////// Product

	public static function OnBeforeProductAddHandler(&$arFields)
	{
		if (self::IsExchange())
		{
			self::EmptyProduct( 0, $arFields );
		}
	}

	
	public static function OnBeforeProductUpdateHandler($ID, &$arFields)
	{
		if (self::IsExchange())
		{				
			self::EmptyProduct( $ID, $arFields );
		}
	}	

	private static function EmptyProduct($ID, &$arFields)
	{
		if ( COption::GetOptionString( "askaron.pro1c", "quantity_set_to_zero") == "Y" )
		{
			if ( !isset( $arFields["QUANTITY"] ) )
			{
				$ELEMENT_ID = intval($ID);
				if ($ELEMENT_ID == 0)
				{
					$ELEMENT_ID = intval($arFields["ID"]);
				}

				if ( $ELEMENT_ID > 0 && CModule::IncludeModule( "iblock" ) )
				{
					$arFilter = array(
						"ID" => $ELEMENT_ID,
					);

					$arSelect = array(
						"ID",
						"IBLOCK_ID",
						//"ACTIVE",
					);

					$res = CIBlockElement::GetList( array(), $arFilter, false, array("nTopCount" => 1), $arSelect );
					if ( $arElementFileds = $res->Fetch() )
					{
						$arCatalogInfo = self::GetCatalogInfo( $_SESSION["BX_CML2_IMPORT"]["NS"]["IBLOCK_ID"] );

						// check if element or offer
						if ( isset( $arCatalogInfo["ADDITIONAL"]["LIST"][   $arElementFileds["IBLOCK_ID"]   ] ) )
						{
							self::log($arFields, GetMessage( "askaron_pro1c_empty_quantity" ) );
							$arFields["QUANTITY"] = 0;						
						}
					}
				}

				//self::log($_SESSION, "\$_SESSION");
			}
		}
	}	
	
	public static function OnBeforeProductAddHandlerLog(&$arFields)
	{
		if (self::IsExchange())
		{
			self::log($arFields, "OnBeforeProductAdd");
		}
	}

	
	public static function OnBeforeProductUpdateHandlerLog($ID, &$arFields)
	{
		if (self::IsExchange())
		{		
			$arParams = array(
				'$ID' => $ID,
				'&$arFields' => $arFields,
			);
			
			self::log($arParams, "OnBeforeProductUpdate");
		}
	}	
	
	////////////////  StoreProduct

	public static function OnStoreProductAddHandler($ID, $arFields)
	{
		if (self::IsExchange())
		{
			$arParams = array(
				'$ID' => $ID,
				'$arFields' => $arFields,
			);
			
			self::log($arParams, "OnStoreProductAdd");
		}
	}

	
	public static function OnStoreProductUpdateHandler($ID, $arFields)
	{
		if (self::IsExchange())
		{		
			$arParams = array(
				'$ID' => $ID,
				'$arFields' => $arFields,
			);
			
			self::log($arParams, "OnStoreProductUpdate");
		}
	}

	public static function OnStoreProductDeleteHandler($ID)
	{
		if (self::IsExchange())
		{		
			self::log( "ID=".$ID, "OnStoreProductDelete");
		}
	}	
	
	//////////////// 
	
	public static function OnEndBufferContentHandler( &$content )
	{
		if (self::IsExchange())
		{
			//self::log( $_SESSION , '$_SESSION'); // not works here 
			
			$content_converted = $content;
			if (defined("BX_UTF") && BX_UTF === true )
			{
				if ( preg_match("/[\xe0\xe1\xe3-\xff]/", $content_converted ) )
				{
					$content_converted = $GLOBALS['APPLICATION']->ConvertCharset( $content_converted, 'cp1251', 'utf8' );
				}
			}
			
			$step_time = round(getmicrotime() - self::$microtime_page_start, 4);
			
			self::log($step_time, GetMessage("askaron_pro1c_step_time") );
			self::log($content_converted, GetMessage("askaron_pro1c_step_result") );
			
			if ( COption::GetOptionString( "askaron.pro1c", "live_log") == "Y" )
			{
				if ( CModule::IncludeModule('pull') )
				{
					CPullWatch::AddToStack('ASKARON_PRO1C_LIVE_LOG',
						Array(
							'module_id' => 'askaron.pro1c',
							'command' => 'live_log',
							'params' => Array(
								"TIME" => ConvertTimeStamp(false, FULL),
								"URL" => $_SERVER["REQUEST_URI"],
								"DATA" => $content_converted,
							)
						)
					);			
				}
			}
		}
	}
	
	public static function TestLiveLog()
	{
		if ( CModule::IncludeModule('pull') )
		{
			CPullWatch::AddToStack('ASKARON_PRO1C_LIVE_LOG',
				Array(
					'module_id' => 'askaron.pro1c',
					'command' => 'live_log',
					'params' => Array(
						"URL" => "test",
						"TIME" => ConvertTimeStamp(false, FULL),
						"DATA" => GetMessage("askaron_pro1c_live_log_works")
					)
				)
			);	
		}
	}
	
	private static function log($value, $label = "")
	{
		if ( COption::GetOptionString("askaron.pro1c", "log") == "Y" )
		{
			if ( is_array( $value ) || is_object( $value ) )
			{
				$text = print_r($value, true);
			}
			else
			{
				$text = $value;
			}

			if ( strlen( $label ) > 0 )
			{
				$text = $label.":\n".$text;
			}

			if ( !defined("LOG_FILENAME") )
			{
				define( "LOG_FILENAME", $_SERVER["DOCUMENT_ROOT"]."/log_askaron_pro1c__".COption::GetOptionString( "askaron.pro1c", "random_value" ).".txt" );
			}
			
			$max_size = COption::GetOptionString( "askaron.pro1c", "log_max_size") * 1024 * 1024;
			
			if ( $max_size > 0 )
			{
				if ( file_exists ( LOG_FILENAME ) )
				{
					$text_len = defined("BX_UTF")? mb_strlen($text, 'latin1'): strlen( $text );
					$file_size = filesize( LOG_FILENAME );
					
					if ( $max_size < $text_len + $file_size )
					{
						@file_put_contents( LOG_FILENAME, '');
					}
				}
			}			
			
			if ( CheckVersion( SM_VERSION, '11.0.14' ) )
			{
				// main module new version 11.0.14
				AddMessage2Log( $text, "askaron.pro1c", 0, false );
			}
			else
			{
				// main module old version before 11.0.14
				AddMessage2Log( $text, "askaron.pro1c" );
			}
		}
	}
	
	private static function IsExchange()
	{
		$result = false;
		
		$arExchangeSettings = self::GetExchangeSettings();

		// not empty
		if ( $arExchangeSettings )
		{
			$result = true;
		}
		
		return $result;
	}
	
	private static function GetExchangeSettings()
	{
		$result = array();
		
		global $APPLICATION;
		static $result_cache = null;
		
		if ( is_array( $result_cache ) )
		{
			$result = $result_cache;
		}
		else
		{
			$arSettings = self::GetSettings();
			
			foreach( $arSettings as $arItem )
			{
				//if ( $_SERVER["SCRIPT_NAME"] === $arItem["NAME"] ) // PHP 5.5 FPM BUG

				if ( 
						$_SERVER["SCRIPT_NAME"] === $arItem["NAME"]
					||	
						$APPLICATION->GetCurPage(true) === $arItem["NAME"]
				)						
				{
					if ( isset( $arItem["ACTIVE"] ) && $arItem["ACTIVE"] == "Y" )
					{
						$result = $arItem;
						break;
					}					
				}
			}
			
			$result_cache = $result;
		}
		
		return $result;
	}
	
	public static function GetSettings()
	{
		$result = array();
		
		$str = COption::GetOptionString("askaron.pro1c", "settings");
		
		if ( strlen($str) > 0 )
		{
			$arSettings = unserialize($str);
			if (is_array($arSettings) )
			{
				$result = $arSettings;
			}
		}
		
		return $result;
	}

	public static function SetSettings( $arSettings )
	{
		$result = false;
		
		if ( is_array($arSettings) )
		{
			$str = serialize($arSettings);
			
			// bug over 2000
			if ( strlen( $str ) <= 2000 )
			{
				$result = COption::SetOptionString( "askaron.pro1c", "settings", $str );
			}
		}
		
		return $result;
	}
	
	public static function GetDateOptionFromTimestamp( $module, $option_name, $default_value = "" )
	{
		$result = "";
		
		$timestamp = COption::GetOptionString( $module, $option_name );
		if ( strlen( $timestamp ) > 0 )
		{
			$result = ConvertTimeStamp( $timestamp, FULL);				
		}
		
		if ( strlen( $result ) <= $default_value )
		{
			$result = $default_value;
		}
		
		return $result;		
	}	
	
	private static function GetCatalogExportDate( $option_name, $default_value = "" )
	{
		$result = "";
		
		$datetime = COption::GetOptionString( "askaron.pro1c", $option_name );
		if ( strlen( $datetime ) > 0 )
		{
			$format = "YYYY-MM-DD HH:MI:SS";
			if ($stmp = MakeTimeStamp($datetime, $format) )
			{
				$result = ConvertTimeStamp( $stmp, FULL);				
			}
		}
		else
		{
			$result = $default_value;
		}
		
		return $result;		
	}
	
	public static function GetLastSuccessImportDate( $default_value = "" )
	{
		return self::GetCatalogExportDate( "last_success_import_date", $default_value );
	}

	public static function GetLastSuccessOffersDate( $default_value = "" )
	{
		return self::GetCatalogExportDate( "last_success_offers_date", $default_value );	
	}
	
	public static function GetLastSuccessPricesDate( $default_value = "" )
	{
		return self::GetCatalogExportDate( "last_success_prices_date", $default_value );
	}

	public static function GetLastSuccessRestsDate( $default_value = "" )
	{
		return self::GetCatalogExportDate( "last_success_rests_date", $default_value );	
	}
	
	
	public static function OnSuccessCatalogImport1CHandler()
	{
		$time_string = FormatDate( "Y-m-d H:i:s" , time() );

		if( $_GET['type'] == 'catalog' && $_GET['mode'] == 'import' && strstr($_GET['filename'], 'import') )
		{
			$arExchangeSettings = self::GetExchangeSettings();
			if ( !isset( $arExchangeSettings["SKIP_PRODUCTS"] ) || $arExchangeSettings["SKIP_PRODUCTS"] !== "Y" )
			{
				COption::SetOptionString("askaron.pro1c", "last_success_import_date", $time_string );
			}		
		}
		
		if( $_GET['type'] == 'catalog' && $_GET['mode'] == 'import' && strstr($_GET['filename'], 'offers') )
		{
			COption::SetOptionString("askaron.pro1c", "last_success_offers_date", $time_string );
		}		
		
		if( $_GET['type'] == 'catalog' && $_GET['mode'] == 'import' && strstr($_GET['filename'], 'prices') )
		{
			COption::SetOptionString("askaron.pro1c", "last_success_prices_date", $time_string );
		}
		
		if( $_GET['type'] == 'catalog' && $_GET['mode'] == 'import' && strstr($_GET['filename'], 'rests') )
		{
			COption::SetOptionString("askaron.pro1c", "last_success_rests_date", $time_string );
		}		
	}

	public static function GetModuleVersion( $module_id )
	{
		$result = false;
		
		if ($obInfo = CModule::CreateModuleObject( $module_id ) )
		{
			$result = $obInfo->MODULE_VERSION;	
		}
		
		return $result;
	}
	
	public static function GetLogFileName()
	{
		$result = "";
		
		if ( defined("LOG_FILENAME") )
		{
			$result = LOG_FILENAME;								
		}
		else
		{
			$result = $_SERVER["DOCUMENT_ROOT"]."/log_askaron_pro1c__".COption::GetOptionString( "askaron.pro1c", "random_value" ).".txt";
		}
		
		return $result;
	}
	
	
	public static function GetCatalogInfo( $ID )
	{
		$ID = intval($ID);
		$arResult = array();
		
		static $arCache = array();
		
		
		if ( isset($arCache[$ID]) )
		{
			$arResult = $arCache[$ID];
		}
		else
		{
			if ( $ID > 0 && CModule::IncludeModule( "catalog" ) )
			{
				$arResult = CCatalog::GetByID($ID);

				if ( $arResult )
				{
					$arResult["ADDITIONAL"] = array(
						"IBLOCK_ID" => $ID,			// current id
						"PRODUCT_IBLOCK_ID" => "",	// product iblock id
						"OFFERS_IBLOCK_ID" => "",	// offers iblock id
						"OFFERS_PROPERTY_ID" => "",	// sku property id
						"LIST" => array(),			// product_iblock_id and offers_iblock_id keys
					);

					if ( $arResult["OFFERS"] == "N" )
					{
						$arResult["ADDITIONAL"]["PRODUCT_IBLOCK_ID"] = $arResult["ID"];
						$arResult["ADDITIONAL"]["OFFERS_IBLOCK_ID"] = $arResult["OFFERS_IBLOCK_ID"];
						$arResult["ADDITIONAL"]["OFFERS_PROPERTY_ID"] = $arResult["OFFERS_PROPERTY_ID"];
					}
					else
					{
						$arResult["ADDITIONAL"]["PRODUCT_IBLOCK_ID"] = $arResult["PRODUCT_IBLOCK_ID"];
						$arResult["ADDITIONAL"]["OFFERS_IBLOCK_ID"] = $arResult["ID"];
						$arResult["ADDITIONAL"]["OFFERS_PROPERTY_ID"] = $arResult["SKU_PROPERTY_ID"];	
					}

					if ( $arResult["ADDITIONAL"]["PRODUCT_IBLOCK_ID"] > 0 )
					{
						$arResult["ADDITIONAL"]["LIST"][ $arResult["ADDITIONAL"]["PRODUCT_IBLOCK_ID"] ] = "PRODUCT";
					}

					if ( $arResult["ADDITIONAL"]["OFFERS_IBLOCK_ID"] > 0 )
					{
						$arResult["ADDITIONAL"]["LIST"][ $arResult["ADDITIONAL"]["OFFERS_IBLOCK_ID"] ] = "OFFERS";
					}
					
					$arCache[$ID] = $arResult;
				}
			}
		}

		
		return $arResult;
	}
	
	public static function GetKnownOrderDatePaths()
	{		
		
		$arResult = array(
			"/bitrix/admin/1c_excha" => true,
		);
		
//		TODO select names from table b_option
		
		$arSettings = self::GetSettings();
		
		if ( is_array($arSettings) )
		{
			foreach ( $arSettings as $arItem )
			{
				if ( strlen( $arItem["NAME"] ) > 0 )
				{
					$arResult[ substr( $arItem["NAME"], 0, 22) ] = true;
				}
			}
		}
		
		return $arResult;
	}	
}
?>