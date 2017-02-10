<?
###################################################
# askaron.pro1c module		                      #
# Copyright (c) 2011-2013 Askaron Systems ltd.    #
# http://askaron.ru                               #
# mailto:mail@askaron.ru                          #
###################################################

IncludeModuleLangFile(__FILE__);
IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/options.php");
require_once( "prolog.php" );

$module_id = "askaron.pro1c";
$install_status = CModule::IncludeModuleEx($module_id);

if( $install_status==0 )
{
	// module not found (0)
}
elseif( $install_status==3 )
{
	//demo expired (3)
	CAdminMessage::ShowMessage(
		Array(
			"TYPE"=>"ERROR",
			"MESSAGE" => GetMessage("askaron_pro1c_prolog_status_demo_expired"),
			"DETAILS"=> GetMessage("askaron_pro1c_prolog_buy_html"),
			"HTML"=>true
		)
	);	
}
else
{

	$RIGHT = $APPLICATION->GetGroupRight($module_id);
	$RIGHT_W = ($RIGHT>="W");
	$RIGHT_R = ($RIGHT>="R");

	if ($RIGHT_R)
	{	
		$arErrors = array();
		$arSettings = array();		

		if (
			$RIGHT_W
			&& check_bitrix_sessid()
			&& isset($_REQUEST['action']) && $_REQUEST['action'] == "clear_log"
		)
		{
			$log_file_name = CAskaronPro1c::GetLogFileName();
			
			@file_put_contents( $log_file_name, "" );
			$url = $APPLICATION->GetCurPageParam( "", array("action", "sessid") );
			LocalRedirect($url);
		}
		
		
		if (
			$REQUEST_METHOD=="POST"
			&& strlen($Update)>0
			&& $RIGHT_W
			&& check_bitrix_sessid()
		)
		{
			foreach ($_REQUEST as $key => $value)
			{
				if ( preg_match( '/^askaron_pro1c_settings_([0-9]+)_row$/', $key, $arMatches ) )
				{
					$arItem = array(
						"ACTIVE" => "N",
						"NAME" => "",
						"SKIP_PRODUCTS" => "",
					);

					if ( isset( $value["NAME"] ) && strlen( $value["NAME"] ) > 0 )
					{
						$arItem["NAME"] = $value["NAME"];

						if ( isset( $value["ACTIVE"] ) && $value["ACTIVE"] == "Y" )
						{
							$arItem["ACTIVE"] = $value["ACTIVE"];
						}

						if ( isset( $value["SKIP_PRODUCTS"] ) && $value["SKIP_PRODUCTS"] == "Y" )
						{
							$arItem["SKIP_PRODUCTS"] = "Y";
						}	
						else
						{
							$arItem["SKIP_PRODUCTS"] = "N";
						}

						$arSettings[] = $arItem;
//
//						$field_name_html = htmlspecialcharsbx($arItem["NAME"]);
//						
//						if ( strlen( $arItem["CODE"] ) == 0 )
//						{
//							$arErrors[] = GetMessage( "askaron_pro1c_error_empty", array( "#TRAIT#" => $field_name_html ) );
//						}
//						elseif (  preg_match( '/^([0-9]+).*?$/', $arItem["CODE"] ) )
//						{
//							$arErrors[] = GetMessage( "askaron_pro1c_error_first_symbol", array( "#TRAIT#" => $field_name_html ) );							
//						}
//						elseif ( !preg_match( '/^([a-zA-Z0-9_]+)$/', $arItem["CODE"] ) )
//						{
//							$arErrors[] = GetMessage( "askaron_pro1c_error_format", array( "#TRAIT#" => $field_name_html ) );							
//						}
					}					
				}
			}

			if (count( $arErrors ) == 0 )
			{
				$bSaved = CAskaronPro1C::SetSettings( $arSettings );
				if (!$bSaved)
				{
					$arErrors[] = GetMessage("askaron_pro1c_error_save");
				}
			}

			if (intval($_REQUEST[ "import_pause" ]) > 0)
			{
				COption::SetOptionString($module_id, "import_pause", intval( $_REQUEST[ "import_pause" ] ) );
			}
			else
			{
				COption::SetOptionString($module_id, "import_pause", "0" );		
			}			
			
			$_REQUEST[ "time_limit" ] = trim( $_REQUEST[ "time_limit" ] );
			if ( strlen( $_REQUEST[ "time_limit" ] ) > 0 )
			{
				if ( intval($_REQUEST[ "time_limit" ]) > 0 )
				{
					COption::SetOptionString($module_id, "time_limit", intval( $_REQUEST[ "time_limit" ] ) );
				}
				else
				{
					COption::SetOptionString($module_id, "time_limit", "0" );
				}
				
			}
			else
			{
				COption::SetOptionString($module_id, "time_limit", "" );
			}
		
			
			$_REQUEST[ "memory_limit" ] = trim( $_REQUEST[ "memory_limit" ] );
			if ( strlen( $_REQUEST[ "memory_limit" ] ) > 0 )
			{
				COption::SetOptionString($module_id, "memory_limit", intval( $_REQUEST[ "memory_limit" ] ) );
			}
			else
			{
				COption::SetOptionString($module_id, "memory_limit", "" );
			}			
			
			if ( isset($_REQUEST[ "forbidden" ]) && $_REQUEST[ "forbidden" ] == "Y" )
			{
				COption::SetOptionString($module_id, "forbidden", "Y" );
			}
			else
			{
				COption::SetOptionString($module_id, "forbidden", "N" );				
			}

			if ( isset($_REQUEST[ "log" ]) && $_REQUEST[ "log" ] == "Y" )
			{
				COption::SetOptionString($module_id, "log", "Y" );
			}
			else
			{
				COption::SetOptionString($module_id, "log", "N" );				
			}
			
			$_REQUEST[ "log_max_size" ] = trim( $_REQUEST[ "log_max_size" ] );
			if ( intval( $_REQUEST[ "log_max_size" ] ) > 0 )
			{
				COption::SetOptionString($module_id, "log_max_size", intval( $_REQUEST[ "log_max_size" ] ) );
			}		

			if ( isset($_REQUEST[ "live_log" ]) && $_REQUEST[ "live_log" ] == "Y" )
			{
				COption::SetOptionString($module_id, "live_log", "Y" );
			}
			else
			{
				COption::SetOptionString($module_id, "live_log", "N" );				
			}

			if ( isset($_REQUEST[ "fast_write" ]) && $_REQUEST[ "fast_write" ] == "Y" )
			{
				COption::SetOptionString($module_id, "fast_write", "Y" );
			}
			else
			{
				COption::SetOptionString($module_id, "fast_write", "N" );
			}

			if ( isset($_REQUEST[ "quantity_set_to_zero" ]) && $_REQUEST[ "quantity_set_to_zero" ] == "Y" )
			{
				COption::SetOptionString($module_id, "quantity_set_to_zero", "Y" );
			}
			else
			{
				COption::SetOptionString($module_id, "quantity_set_to_zero", "N" );
			}
		}	


		if (
			$REQUEST_METHOD=="POST"
			&& $RIGHT_W
			&& strlen($RestoreDefaults)>0
			&& check_bitrix_sessid()
		)
		{
			// save option value
			$random_value_tmp = COption::GetOptionString( $module_id, "random_value" );
			
			COption::RemoveOption("askaron.pro1c");
			
			COption::SetOptionString( $module_id, "random_value", $random_value_tmp );
			
			$z = CGroup::GetList($v1="id",$v2="asc", array("ACTIVE" => "Y", "ADMIN" => "N"), $get_users_amount = "N");
			while($zr = $z->Fetch())
			{
				$APPLICATION->DelGroupRight($module_id, array($zr["ID"]));
			}
		}

		if (count( $arErrors ) == 0 )
		{
			$arSettings = CAskaronPro1C::GetSettings();
		}
		
		
		$import_pause = intval( COption::GetOptionString( $module_id, "import_pause") );
		$time_limit = COption::GetOptionString( $module_id, "time_limit");
		$memory_limit = COption::GetOptionString( $module_id, "memory_limit");
		$forbidden = COption::GetOptionString( $module_id, "forbidden");		
		$live_log = COption::GetOptionString( $module_id, "live_log");
		$log = COption::GetOptionString( $module_id, "log");
		$log_max_size = COption::GetOptionString( $module_id, "log_max_size");
		$fast_write = COption::GetOptionString( $module_id, "fast_write");
		$quantity_set_to_zero = COption::GetOptionString( $module_id, "quantity_set_to_zero");
		
		if ( count( $arErrors ) > 0 )
		{
			CAdminMessage::ShowMessage(
				Array(
					"TYPE"=>"ERROR",
					"MESSAGE" => GetMessage("askaron_pro1c_error_save_header"),
					"DETAILS"=> implode( "<br />", $arErrors ),
					"HTML"=>true
				)
			);
		}
		
		$aTabs = array(
			array("DIV" => "edit1", "TAB" => GetMessage("MAIN_TAB_SET"), "ICON" => "", "TITLE" => GetMessage("MAIN_TAB_TITLE_SET")),
			array("DIV" => "edit2", "TAB" => GetMessage("askaron_pro1c_additional_settings"), "ICON" => "", "TITLE" => GetMessage("askaron_pro1c_additional_settings") ),
			array("DIV" => "edit3", "TAB" => GetMessage("MAIN_TAB_RIGHTS"), "ICON" => "", "TITLE" => GetMessage("MAIN_TAB_TITLE_RIGHTS")),
		);

		$tabControl = new CAdminTabControl("tabControl", $aTabs);
		$tabControl->Begin();

		$rowIndex = 0;

		?>

		<form method="post" action="<?echo $APPLICATION->GetCurPage()?>?mid=<?=htmlspecialchars($mid)?>&lang=<?=LANGUAGE_ID?>">
			<?=bitrix_sessid_post()?>
			<?$tabControl->BeginNextTab();?>
			<tr>
				<td width="100%" style="" colspan="2">
					<?	
					//demo (2)
					if ( $install_status == 2 )
					{
						CAdminMessage::ShowMessage(
							Array(
								"TYPE"=>"OK",
								"MESSAGE" => GetMessage("askaron_pro1c_prolog_status_demo"),
								"DETAILS"=> GetMessage("askaron_pro1c_prolog_buy_html"),
								"HTML"=>true
							)
						);
					}
					?>	
				</td>
			</tr>
			<tr class="heading">
				<td valign="top" colspan="2" align="center"><?=GetMessage("askaron_pro1c_header_files")?></td>
			</tr>
			<tr>
				<td width="100%" style="" colspan="2">
					<table style="width: auto; margin: 0 auto;">
						<tr>
							<td>
								<table class="internal" cellspacing="0" cellpadding="0" border="0">					
									<thead>
										<tr class="heading">
											<td><?=GetMessage("askaron_pro1c_field_active")?></td>
											<td><?=GetMessage("askaron_pro1c_field_name")?></td>											
											<td><?=GetMessage("askaron_pro1c_field_skip_product")?></td>
										</tr>
									</thead>
									<tbody id="askaron_pro1c_settings_body">
										<?foreach ( $arSettings as $arItem ):?>
											<tr>
												<td style="text-align: center;"><input name="askaron_pro1c_settings_<?=$rowIndex?>_row[ACTIVE]" value="Y" type="checkbox"<?if ($arItem["ACTIVE"] == "Y" ) echo ' checked="checked"'; ?> /></td>
												<td><input name="askaron_pro1c_settings_<?=$rowIndex?>_row[NAME]" value="<?=htmlspecialcharsbx($arItem["NAME"])?>" type="text" size="60" /></td>
												<td style="text-align: center;"><input name="askaron_pro1c_settings_<?=$rowIndex?>_row[SKIP_PRODUCTS]" value="Y" type="checkbox"<?if ($arItem["SKIP_PRODUCTS"] == "Y" ) echo ' checked="checked"'; ?> /></td>
											</tr>
											<?$rowIndex++;?>
										<?endforeach?>

										<?for ( $i = 0; $i < 1; $i++ ):?>
											<tr>
												<td style="text-align: center;"><input name="askaron_pro1c_settings_<?=$rowIndex?>_row[ACTIVE]" value="Y" type="checkbox" checked="checked" /></td>
												<td><input name="askaron_pro1c_settings_<?=$rowIndex?>_row[NAME]" value="" type="text" size="60" /></td>
												<td style="text-align: center;"><input name="askaron_pro1c_settings_<?=$rowIndex?>_row[SKIP_PRODUCTS]" value="Y" type="checkbox" /></td>
											</tr>
											<?$rowIndex++;?>
										<?endfor?>								
									</tbody>							
								</table>
								<br  />
								<div style="width: 100%; text-align: center;">
									<input type="button" value="<?=GetMessage("askaron_pro1c_more")?>" onclick="askaron_pro1c_add_row();" />							
								</div>

								<div style="clear: both"> </div>
								<br  />	
								<?=BeginNote();?>
									<?=GetMessage("askaron_pro1c_settings_help")?>
								<?=EndNote();?>	
							</td>
						<tr>
					</table>
				</td>
			</tr>

			<tr class="heading">
				<td valign="top" colspan="2" align="center"><?=GetMessage("askaron_pro1c_header_failure_resistance")?></td>
			</tr>	

			<tr>
				<td valign="top" width="50%" class="field-name"><label for='askaron_pro1c_import_pause'><?=GetMessage("askaron_pro1c_import_pause")?></label></td>
				<td valign="top" width="50%">
					<input
						type="text" 
						value="<?=$import_pause?>"
						id="askaron_pro1c_import_pause"
						name="import_pause"
					/> <?=GetMessage("askaron_pro1c_import_pause_2")?>
					
					<?=BeginNote();?>
						<?=GetMessage("askaron_pro1c_import_pause_help", array("#LANG#" => LANG ) );?>
					<?=EndNote();?>		
				</td>				
			</tr>
	
			<tr>
				<td valign="top" width="50%" class="field-name"><label for='askaron_pro1c_time_limit'><?=GetMessage("askaron_pro1c_time_limit")?></label></td>
				<td valign="top" width="50%">
					<input
						type="text" 
						value="<?=$time_limit?>"
						id="askaron_pro1c_time_limit"
						name="time_limit"
					/> <?=GetMessage("askaron_pro1c_time_limit_2")?>
					
					<?=BeginNote();?>
						<?=GetMessage("askaron_pro1c_time_limit_help", array("#TIME_LIMIT#" => ini_get( "max_execution_time" ) ) );?>
					<?=EndNote();?>		
				</td>				
			</tr>			
			
			<tr>
				<td valign="top" width="50%" class="field-name"><label for='askaron_pro1c_memory_limit'><?=GetMessage("askaron_pro1c_memory_limit")?></label></td>
				<td valign="top" width="50%">
					<input
						type="text" 
						value="<?=$memory_limit?>"
						id="askaron_pro1c_memory_limit"
						name="memory_limit"
					/> <?=GetMessage("askaron_pro1c_memory_limit_2")?>
					
					<?=BeginNote();?>
						<?=GetMessage("askaron_pro1c_memory_limit_help", array("#MEMORY_LIMIT#" => ini_get( "memory_limit" ) ) );?>
					<?=EndNote();?>		
				</td>				
			</tr>			

			<tr class="heading">
				<td valign="top" colspan="2" align="center"><?=GetMessage("askaron_pro1c_header_failure_debug")?></td>
			</tr>				

			<tr>
				<td valign="top" width="50%" class="field-name"><label for='askaron_pro1c_forbidden'><?=GetMessage("askaron_pro1c_forbidden")?></label></td>
				<td valign="top" width="50%">
					
					<input
						type="checkbox" 
						value="Y"
						id="askaron_pro1c_forbidden"
						name="forbidden"
						<?if ( $forbidden == "Y" ):?>
							checked="checked"
						<?endif?>
					/>
					
					<?=BeginNote();?>
						<?=GetMessage("askaron_pro1c_forbidden_help", array("#MEMORY_LIMIT#" => ini_get( "memory_limit" ) ) );?>
					<?=EndNote();?>		
				</td>				
			</tr>					
			
			<tr>
				<td valign="top" width="50%" class="field-name"><label for='askaron_pro1c_live_log'><?=GetMessage("askaron_pro1c_live_log")?></label></td>
				<td valign="top" width="50%">
					
					<input
						type="checkbox" 
						value="Y"
						id="askaron_pro1c_live_log"
						name="live_log"
						<?if ( $live_log == "Y" ):?>
							checked="checked"
						<?endif?>
					/>
					
					<?=BeginNote();?>

					
						<?=GetMessage("askaron_pro1c_live_log_help" );?>
						
						<?if(CModule::IncludeModule("pull")):?>
							
							<?$pull_version = CAskaronPro1c::GetModuleVersion("pull");?>
					
							<?if ( version_compare( $pull_version, '14.0.0' ) < 0):?>
								<br /><br />
								<?=GetMessage("askaron_pro1c_live_log_version", array("#LANG#" => LANG,  "#CURRENT_VERSION#" => $pull_version )  );?>
							<?endif?>
							
							<br /><br />
							<?=GetMessage("askaron_pro1c_live_log_open", array("#LANG#" => LANG ) );?>
							
							<?if ( !CPullOptions::GetNginxStatus() ):?>
								<br /><br />
								<?=GetMessage("askaron_pro1c_pull_notice", array("#LANG#" => LANG ) );?>
							<?endif?>
							
						<?else:?>
							<br /><br />
							<?=GetMessage("askaron_pro1c_pull_not_installed" );?>
							
							<?if(@file_exists( $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/pull/install/index.php") ):?>
								<br /><br />
								<?=GetMessage("askaron_pro1c_pull_install", array("#LANG#" => LANG ) );?>							
							<?endif?>
							
						<?endif?>
					
							
						<?/*
						<?//=GetMessage("askaron_pro1c_log_help");?>
						<br /><br />
						<?if ( defined("LOG_FILENAME") ):?>
						
							<?=GetMessage("askaron_pro1c_log_help_defined", array("#LOG_FILENAME#" => LOG_FILENAME ) );?>
							<br /><br />
							<?if ( is_file(LOG_FILENAME) ):?>
								<?
									$count_replace = 1;
									$url = LOG_FILENAME;
									$url = str_replace( $_SERVER["DOCUMENT_ROOT"] , "", $url, $count_replace );
									$url = str_replace( "\\" , "/", $url );									
								
									$arChange = array(
										"#URL#" => $url,
										"#DATE#" => ConvertTimeStamp( filemtime(LOG_FILENAME), FULL ),
										"#BYTE#" => number_format( filesize(LOG_FILENAME) , 0, ',', ' '),
									);
								?>
								<?=GetMessage("askaron_pro1c_log_help_file_info", $arChange);?>
							<?else:?>
								<?=GetMessage("askaron_pro1c_log_help_not_exist");?>
							<?endif?>
						
						<?else:?>
							<?=GetMessage("askaron_pro1c_log_help_not_defined", array("#MEMORY_LIMIT#" => ini_get( "memory_limit" ) ) );?>
						<?endif?>
						*/?>
					<?=EndNote();?>		
				</td>				
			</tr>			

			<tr>
				<td valign="top" width="50%" class="field-name"><label for='askaron_pro1c_log'><?=GetMessage("askaron_pro1c_log")?></label></td>
				<td valign="top" width="50%">
					<input
						type="checkbox" 
						value="Y"
						id="askaron_pro1c_log"
						name="log"
						<?if ( $log == "Y" ):?>
							checked="checked"
						<?endif?>
					/>					
					
					<?//=BeginNote();?>
						<?//=GetMessage("askaron_pro1c_log_help_warning");?>
					<?//=EndNote();?>		
					
					<?=BeginNote();?>
						<?$log_file_name = CAskaronPro1c::GetLogFileName();?>
					
						<?=GetMessage("askaron_pro1c_log_help", array("#LOG_FILENAME#" => $log_file_name ) );?>
					
						<?if ( !defined("LOG_FILENAME") ):?>
							<br /><br />
							<?=GetMessage("askaron_pro1c_log_help_not_defined");?>
						<?endif?>

						<br /><br />
						<?if ( is_file($log_file_name) ):?>
							<?
								$count_replace = 1;
								$url = $log_file_name;
								$url = str_replace( $_SERVER["DOCUMENT_ROOT"] , "", $url, $count_replace );
								$url = str_replace( "\\" , "/", $url );									

								$arChange = array(
									"#URL#" => $url,
									"#DATE#" => ConvertTimeStamp( filemtime($log_file_name), FULL ),
									"#BYTE#" => number_format( filesize($log_file_name) , 0, ',', ' '),
									"#CLEAR_URL#" => $APPLICATION->GetCurPageParam("action=clear_log&amp;".bitrix_sessid_get(), array("action", "sessid")),
								);
							?>
							<?=GetMessage("askaron_pro1c_log_help_file_info", $arChange);?>
						
							<?if ($RIGHT_W):?>
								<br /><br />
								<a href="<?=$APPLICATION->GetCurPageParam("action=clear_log&amp;".bitrix_sessid_get(), array("action", "sessid"))?>"><?=GetMessage("askaron_pro1c_log_clear");?></a>
							<?endif?>
							
						<?else:?>
							<?=GetMessage("askaron_pro1c_log_help_not_exist");?>
						<?endif?>

						
					<?=EndNote();?>						
				</td>
			</tr>			
			<tr>				
				<td valign="top" width="50%" class="field-name"><label for='askaron_pro1c_log_max_size'><?=GetMessage("askaron_pro1c_log_max_size")?></label></td>
				<td valign="top" width="50%">
					<input
						type="text" 
						value="<?=$log_max_size?>"
						id="askaron_pro1c_log_max_size"
						name="log_max_size"
					/> <?=GetMessage("askaron_pro1c_log_max_size_2")?>
					
					<?=BeginNote();?>
						<?=GetMessage("askaron_pro1c_log_max_size_help" );?>
					<?=EndNote();?>		
					
				</td>				
			</tr>
			
			<?/*
			<tr>
				<td valign="top" width="50%" class="field-name"><label><?=GetMessage("askaron_pro1c_import_date")?></label></td>
				<td valign="top" width="50%"><?=CAskaronPro1C::GetLastSuccessImportDate("&mdash;");?></td>				
			</tr>
			<tr>
				<td valign="top" width="50%" class="field-name"><label><?=GetMessage("askaron_pro1c_offers_date")?></label></td>
				<td valign="top" width="50%"><?=CAskaronPro1C::GetLastSuccessOffersDate("&mdash;");?></td>				
			</tr>		
			 */?>
			
			<?$tabControl->BeginNextTab();?>

			<tr class="heading">
				<td valign="top" colspan="2" align="center"><?=GetMessage("askaron_pro1c_header_products")?></td>
			</tr>				

			<tr>
				<td valign="top" width="50%" class="field-name"><label for='askaron_pro1c_fast_write'><?=GetMessage("askaron_pro1c_fast_write")?></label></td>
				<td valign="top" width="50%">
					
					<input
						type="checkbox" 
						value="Y"
						id="askaron_pro1c_fast_write"
						name="fast_write"
						<?if ( $fast_write == "Y" ):?>
							checked="checked"
						<?endif?>
					/>
					
					<?=BeginNote();?>
						<?=GetMessage("askaron_pro1c_fast_write_help" );?>
					<?=EndNote();?>		
				</td>				
			</tr>			
			<tr class="heading">
				<td valign="top" colspan="2" align="center"><?=GetMessage("askaron_pro1c_header_quantity")?></td>
			</tr>				
			<tr>
				<td valign="top" width="50%" class="field-name"><label for='askaron_pro1c_quantity_set_to_zero'><?=GetMessage("askaron_pro1c_quantity_set_to_zero")?></label></td>
				<td valign="top" width="50%">
					
					<input
						type="checkbox" 
						value="Y"
						id="askaron_pro1c_quantity_set_to_zero"
						name="quantity_set_to_zero"
						<?if ( $quantity_set_to_zero == "Y" ):?>
							checked="checked"
						<?endif?>
					/>
					
					<?=BeginNote();?>
						<?=GetMessage("askaron_pro1c_quantity_set_to_zero_help" );?>
					<?=EndNote();?>		
				</td>				
			</tr>			
			
			
			<?$tabControl->BeginNextTab();?>
			<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/admin/group_rights.php");?>
			<?$tabControl->Buttons();?>		
			<input <?if(!$RIGHT_W) echo "disabled" ?> type="submit" name="Update" value="<?=GetMessage("MAIN_SAVE")?>" title="<?=GetMessage("MAIN_OPT_SAVE_TITLE")?>">
			<input <?if(!$RIGHT_W) echo "disabled" ?> type="submit" name="RestoreDefaults" title="<?echo GetMessage("MAIN_HINT_RESTORE_DEFAULTS")?>" OnClick="confirm('<?echo AddSlashes(GetMessage("MAIN_HINT_RESTORE_DEFAULTS_WARNING"))?>')" value="<?echo GetMessage("MAIN_RESTORE_DEFAULTS")?>">
			<?$tabControl->End();?>
		</form>

		<table style="display: none;">					
			<tbody id="askaron_pro1c_settings_body_from">
				<tr>
					<td style="text-align: center;"><input name="ACTIVE" value="Y" type="checkbox" checked="checked" /></td>
					<td><input name="NAME" value="" type="text" size="60" /></td>
					<td style="text-align: center;"><input name="SKIP_PRODUCTS" value="Y" type="checkbox" /></td>			
				</tr>
			</tbody>							
		</table>
		<script type="text/javascript">
			var askaron_pro1c_add_row_index = <?=$rowIndex?>;

			var askaron_pro1c_add_row = function()
			{
				var from = document.getElementById("askaron_pro1c_settings_body_from");
				var to = document.getElementById("askaron_pro1c_settings_body");

				// clone the first children <tr>
				var node = from.getElementsByTagName("tr")[0].cloneNode(true);

				// inputs
				var children = node.getElementsByTagName("input");
				for(var i=0; i<children.length; i++) 
				{
					children[i].name = "askaron_pro1c_settings_" + askaron_pro1c_add_row_index + "_row[" + children[i].name + "]";
				}

				// selects
				var children = node.getElementsByTagName("select");
				for(var i=0; i<children.length; i++) 
				{
					children[i].name = "askaron_pro1c_settings_" + askaron_pro1c_add_row_index + "_row[" + children[i].name + "]";
				}

				to.appendChild( node );
				askaron_pro1c_add_row_index++;				
			};
		</script>
	<?
	}
}
?>