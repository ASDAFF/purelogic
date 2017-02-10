<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<? $fVerComposite = (defined("SM_VERSION") && version_compare(SM_VERSION, "14.5.0") >= 0 ? true : false); ?>
<? if($fVerComposite) $this->setFrameMode(true); ?>

<?$ALX = "FID".$arParams["FORM_ID"];?>

<? if($arResult["FANCYBOX_".$ALX]!='Y' && !isset($arResult["FANCYBOX_".$ALX]) && $arParams['ALX_CHECK_NAME_LINK']=='Y'): ?>
	<a class="alx_feedback_popup" id="form_id_<?=$ALX?>" href=""><?=$arParams["ALX_NAME_LINK"];?></a>
<?
	$bShort = ($APPLICATION->get_cookie("ALTASIB_FDB_SEND_".$ALX) != 'Y');
	if($arParams['ALX_LOAD_PAGE']=='Y' && $bShort):?>
	
<?	endif;?>

<?else:?>


<? $errorField=array(); ?>
<?foreach($arResult["FORM_ERRORS"] as $error):?>
<?	foreach($error as $key => $v):?>
<?		$errorField[] = $key;?>
<?	endforeach?>
<?endforeach?>
<?if($arParams["REWIND_FORM"] == "Y" && ((count($arResult["FORM_ERRORS"]) > 0) || ($arResult["success_".$ALX] == "yes"))):?>
	<a name="alx_position_feedback"></a>
<?endif?>
<div class="alx_feed_back_form alx_feed_back_theme2" id="alx_feed_back_theme2_<?=$ALX?>">
<?if(count($arResult["FORM_ERRORS"]) == 0 && ($arResult["success_".$ALX] == "yes" || $_REQUEST["success_".$ALX] == "yes")):?>
	<div class="alx_feed_back_form_error_block">
		<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td class="alx_feed_back_form_error_pic"><?=CFile::ShowImage($arParams["IMG_OK"])?></td>
			<td class="alx_feed_back_form_mess_ok_td_list">
			<div class="alx_feed_back_form_mess_ok"><?=$arParams["MESSAGE_OK"];?></div>
			</td>
		</tr>
		</table>
	</div>
	
<?endif?>
<?if($arParams["CHECK_ERROR"] == "Y"):?>
<?if(count($arResult["FORM_ERRORS"]) > 0):?>
	<div class="alx_feed_back_form_error_block">
		<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td class="alx_feed_back_form_error_pic"><?=CFile::ShowImage($arParams["IMG_ERROR"])?></td>
			<td class="alx_feed_back_form_error_td_list">
			<div class="alx_feed_back_form_title_error"><?=GetMessage("ALX_TP_REQUIRED_ERROR")?></div>
				<ul class="alx_feed_back_form_error_list">
<?					foreach($arResult["FORM_ERRORS"] as $error):?>
<?						foreach($error as $v):?>
							<li><span>-</span> <?=$v?></li>
<?						endforeach?>
<?					endforeach?>
				</ul>
			</td>
		</tr>
		</table>
	</div>
<?endif?>
<?endif?>
<?
$hide = false;
if($arParams["HIDE_FORM"] == "Y" && ($_REQUEST["success_".$ALX] == "yes" || $arResult["success_".$ALX] == "yes"))
	$hide = true;

$actionPage = $APPLICATION->GetCurPage();
if(strpos($actionPage, "index.php") !== false)
	$actionPage = $APPLICATION->GetCurDir();
?>
<?if(!$hide):?>
<div class="alx_feed_back_form_feedback_poles">
<form id="f_feedback_<?=$ALX?>" name="f_feedback_<?=$ALX?>" action="<?=$actionPage?>" method="post" enctype="multipart/form-data">
	<input type="hidden" name="FEEDBACK_FORM_<?=$ALX?>" value="Y" />
<?	echo bitrix_sessid_post()?>
<?	if(count($arResult["TYPE_QUESTION"]) >= 1):?>
		<div class="alx_feed_back_form_item_pole">
			<div class="alx_feed_back_form_name"><?=$arParams["CATEGORY_SELECT_NAME"]?></div>
			<div class="alx_feed_back_form_inputtext_bg">
				<input type="hidden" id="type_question_name_<?=$ALX?>" name="type_question_name_<?=$ALX?>" value="<?=$arResult["TYPE_QUESTION"][0]["NAME"]?>">
				<select id="type_question_<?=$ALX?>" name="type_question_<?=$ALX?>" onchange="ALX_SetNameQuestion(this, '<?=$ALX?>');">
<?					foreach($arResult["TYPE_QUESTION"] as $arField):?>
<?						if(trim(htmlspecialcharsEx($_POST["type_question"])) == $arField["ID"]):?>
							<option value="<?=$arField["ID"]?>" selected><?=$arField["NAME"]?></option>
<?						else:?>
							<option value="<?=$arField["ID"]?>"><?=$arField["NAME"]?></option>
<?						endif?>
<?					endforeach?>
				</select>
			</div>
		</div>
<?	endif?>
<?	$k = 0;?>
<?
	$countArr = count($arResult["FIELDS"]);
	$bFBtext = false;
	$strFBtext = '';
?>
<? 	if(is_array($arParams["PROPERTY_FIELDS"])
		&& in_array("FEEDBACK_TEXT", $arParams["PROPERTY_FIELDS"]))
	{
		$strFBtext = '<div class="alx_feed_back_form_item_pole'.((in_array('FEEDBACK_TEXT_'.$ALX, $errorField, true)) ? " alx_feed_back_form_error_pole" : "").'">';

		$strFBtext .= '<div class="alx_feed_back_form_name">';
		if(!empty($arParams["FB_TEXT_NAME"]))
			$strFBtext .= $arParams["FB_TEXT_NAME"];
		else
			$strFBtext .= GetMessage("ALX_TP_MESSAGE_TEXTMESS");

		if(in_array("FEEDBACK_TEXT_".$ALX, $arParams["PROPERTY_FIELDS_REQUIRED"]))
		{
			$strFBtext .= '<span class="alx_feed_back_form_required_text">*</span>';
		}
		$strFBtext .= '</div>
			<div class="alx_feed_back_form_inputtext_bg" id="error_EMPTY_TEXT"><div class="alx_feed_back_form_textarea_bg"><textarea cols="" rows="" id="EMPTY_TEXT1" name="FEEDBACK_TEXT_'.$ALX.'">'.$arResult["FEEDBACK_TEXT"].'</textarea></div></div></div>';
	}
?>
<?	foreach($arResult["FIELDS"] as $key=>$arField):?>
			
<?		/*LIST*/?>
<?		if($arField["TYPE"] == "L"):?>
<?			if($arField["LIST_TYPE"] == "L"):?>
				<div class="alx_feed_back_form_inputtext_bg">
<?				if($arField["MULTIPLE"] == "Y"):?>
					<select name="FIELDS[<?=$arField["CODE"]?>][]" multiple="multiple">
<?				else:?>
					<select name="FIELDS[<?=$arField["CODE"]?>]">
<?				endif;?>
						<option value=""><?=GetMessage("ALX_NOT_SET");?></option>
<?				foreach($arField["ENUM"] as $v):?>
<?					if(!isset($_POST["FIELDS"][$arField["CODE"]]) && !isset($arResult["FORM_ERRORS"]["EMPTY_FIELD"][$arField["CODE"]])):?>
						<option value="<?=$v["ID"]?>" <?if($v['DEF'] == 'Y') echo 'selected="selected"';?> ><?=$v["VALUE"]?></option>
<?					else:?>
<?						if($arField["MULTIPLE"] == "Y"):?>
							<option value="<?=$v["ID"]?>" <?if(in_array($v['ID'], $_POST["FIELDS"][$arField["CODE"]])) echo 'selected="selected"';?> ><?=$v["VALUE"]?></option>
<?						else:?>
							<option value="<?=$v["ID"]?>" <?if($v['ID'] == $_POST["FIELDS"][$arField["CODE"]]) echo 'selected="selected"';?> ><?=$v["VALUE"]?></option>
<?						endif;?>
<?					endif;?>
<?				endforeach?>
				</select>
				</div>
<?			elseif($arField["LIST_TYPE"] == "C"):?>
<?				if($arField["MULTIPLE"] == "Y"):
					?><input type="hidden" name="FIELDS[<?=$arField["CODE"]?>]" value=""><?
					foreach($arField["ENUM"] as $v):?>
<?						if(!isset($_POST["FIELDS"][$arField["CODE"]]) && !isset($arResult["FORM_ERRORS"]["EMPTY_FIELD"][$arField["CODE"]])):?>
							<input id="<?=$v["ID"]?>" type="checkbox" name="FIELDS[<?=$arField["CODE"]?>][]" value="<?=$v["ID"]?>" <?if($v["DEF"] == "Y") echo 'checked="checked"';?>><label for="<?=$v["ID"]?>"><?=$v["VALUE"]?></label><br />
<?						else:?>
							<input id="<?=$v["ID"]?>" type="checkbox" name="FIELDS[<?=$arField["CODE"]?>][]" value="<?=$v["ID"]?>" <?if(in_array($v['ID'], $_POST["FIELDS"][$arField["CODE"]])) echo 'checked="checked"';?>><label for="<?=$v["ID"]?>"><?=$v["VALUE"]?></label><br />
<?						endif;?>
<?					endforeach?>
<?				else:?>
<?					foreach($arField["ENUM"] as $v):?>
<?						if(!isset($_POST["FIELDS"][$arField["CODE"]]) && !isset($arResult["FORM_ERRORS"]["EMPTY_FIELD"][$arField["CODE"]])):?>
							<input id="<?=$v["ID"]?>" type="radio" name="FIELDS[<?=$arField["CODE"]?>]" value="<?=$v["ID"]?>" <?if($v['DEF'] == 'Y') echo 'checked="checked"';?>><label for="<?=$v["ID"]?>"><?=$v["VALUE"]?></label><br />
<?						else:?>
							<input id="<?=$v["ID"]?>" type="radio" name="FIELDS[<?=$arField["CODE"]?>]" value="<?=$v["ID"]?>" <?if($v['ID'] == $_POST["FIELDS"][$arField["CODE"]]) echo 'checked="checked"';?>><label for="<?=$v["ID"]?>"><?=$v["VALUE"]?></label><br />
<?						endif;?>
<?					endforeach?>
<?				endif?>
<?			endif?>
<?		/*HTML/TEXT*/?>
<?		elseif($arField["USER_TYPE"] == "HTML"):?>
			<div class="alx_feed_back_form_inputtext_bg" id="error_<?=$arField["CODE"]?>">
<?				if(!empty($_POST["FIELDS"][$arField["CODE"]])):?>
					<textarea cols="" rows="" id="<?=$arField["CODE"]?>1" name="FIELDS[<?=$arField["CODE"]?>]" style="height:<?=$arField["USER_TYPE_SETTINGS"]["height"]?>px;"><?=trim(htmlspecialcharsEx($_POST["FIELDS"][$arField["CODE"]]))?></textarea>
<?				elseif(!empty($arField["AUTOCOMPLETE_VALUE"])):?>
					<textarea cols="" rows="" id="<?=$arField["CODE"]?>1" name="FIELDS[<?=$arField["CODE"]?>]" style="height:<?=$arField["USER_TYPE_SETTINGS"]["height"]?>px;"><?=trim(htmlspecialcharsEx($arField["AUTOCOMPLETE_VALUE"]))?></textarea>
<?				else:?>
					<textarea cols="" rows="" id="<?=$arField["CODE"]?>1" name="FIELDS[<?=$arField["CODE"]?>]" style="height:<?=$arField["USER_TYPE_SETTINGS"]["height"]?>px;" onblur="if(this.value==''){this.value='<?=$arField["DEFAULT_VALUE"]["TEXT"]?>'}" onclick="if(this.value=='<?=$arField["DEFAULT_VALUE"]["TEXT"]?>'){this.value=''}"><?=$arField["DEFAULT_VALUE"]["TEXT"]?></textarea>
<?				endif;?>
			</div>
<?		/*Date or DateTime*/?>
<?		elseif($arField["USER_TYPE"] == "Date" || $arField["USER_TYPE"] == "DateTime"):?>
			<div class="alx_feed_back_form_inputtext_bg alx_feed_back_form_inputtext_bg_calendar" id="error_<?=$arField["CODE"]?>"><?
				$bShowTime=($arField["USER_TYPE"] == "Date" ? "false" : "true");
				$bHideTime=($arField["USER_TYPE"] == "Date" ? "true" : "false");?>

<?				if(!empty($_POST["FIELDS"][$arField["CODE"]])):?>
					<input type="text" size="40" id="<?=$arField["CODE"]?>1" name="FIELDS[<?=$arField["CODE"]?>]" value="<?=trim(htmlspecialcharsEx($_POST["FIELDS"][$arField["CODE"]]))?>" class="alx_feed_back_form_inputtext" readonly="readonly" onclick="BX.calendar({node:this, field:'FIELDS[<?=$arField["CODE"]?>]', form: '', bTime:<?=$bShowTime?>, currentTime: '<?=(time()+date("Z")+CTimeZone::GetOffset())?>', bHideTime:<?=$bHideTime?>});" />
<?				else:?>
					<input type="text" size="40" id="<?=$arField["CODE"]?>1" name="FIELDS[<?=$arField["CODE"]?>]" value="<?=$arField["DEFAULT_VALUE"]?>" class="alx_feed_back_form_inputtext" readonly="readonly" onclick="BX.calendar({node:this, field:'FIELDS[<?=$arField["CODE"]?>]', form: '', bTime:<?=$bShowTime?>, currentTime: '<?=(time()+date("Z")+CTimeZone::GetOffset())?>', bHideTime:<?=$bHideTime?>});" />
<?				endif;?>
				<div class="alx_feed_back_form_calendar_icon">
<?
					require_once($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/interface/admin_lib.php");
					define("ADMIN_THEME_ID", CAdminTheme::GetCurrentTheme());
					echo CAdminPage::ShowScript();
					echo Calendar("FIELDS[".$arField["CODE"]."]", "f_feedback_".$ALX);
					?>
				</div>
			</div>
<?		/*ELEMENTS*/?>
<?		elseif($arField["TYPE"] == "E"):?>
			<div class="alx_feed_back_form_element_bg alx_feed_back_form_inputtext_bg_element" id="error_<?=$arField["CODE"]?>">
<?				if($arField["PROPERTY"]["MULTIPLE"] == "Y"):?>
<?					foreach($arField["LINKED_ELEMENTS"] as $arEl):?>
						<p class="alx_feed_back_form_checkbox">
							<input type="checkbox" name="FIELDS[<?=$arField["CODE"]?>][]" value="<?=$arEl["ID"]?>" id="<?=$arField["CODE"]?>1_<?=$arEl["ID"]?>" <?
								if(!empty($_POST["FIELDS"][$arField["CODE"]]) && in_array($arEl["ID"], $_POST["FIELDS"][$arField["CODE"]])):?>checked="checked"<?endif;?>/>
							<label for="<?=$arField["CODE"]?>1_<?=$arEl["ID"]?>"><?=$arEl["NAME"]?></label>
						</p>
<?					endforeach;?>
<?				else:?>
<?					if(!empty($arField["LINKED_ELEMENTS"])):
					foreach($arField["LINKED_ELEMENTS"] as $val):?>
						<input id="<?=$arField["CODE"].'_'.$val["ID"]?>" type="radio" name="FIELDS[<?=$arField["CODE"]?>]" value="<?=$val["ID"]?>" <?if($val['ID'] == $_POST["FIELDS"][$arField["CODE"]]) echo 'checked="checked"';?>><label for="<?=$arField["CODE"].'_'.$val["ID"]?>"><?=$val["NAME"]?></label><br />
<?					endforeach;
					endif;

				endif;?>
			</div>
<?		/*SECTIONS*/?>
<?		elseif($arField["TYPE"] == "G"):?>
		<div class="alx_feed_back_form_inputtext_bg_element" id="error_<?=$arField["CODE"]?>">
<?			if(!empty($arField["LINKED_SECTIONS"])):?>
				<select name="FIELDS[<?=$arField["CODE"]?>][]" size="<?echo (!empty($arField["PROPERTY"]["MULTIPLE_CNT"]) ? $arField["PROPERTY"]["MULTIPLE_CNT"] : "5");?>"<?
					echo ($arField["PROPERTY"]["MULTIPLE"] == "Y" ? " multiple=\"multiple\"" : "");
				?>>
					<option value=""<?if(isset($_POST["FIELDS"][$arField["CODE"]]) && in_array("", $_POST["FIELDS"][$arField["CODE"]])) echo " selected"?>><?=GetMessage("ALX_NOT_SET");?></option>
<?
					foreach($arField["LINKED_SECTIONS"] as $arEl):
						?><option value="<?echo $arEl["ID"]?>"<?
						if(!empty($_POST["FIELDS"][$arField["CODE"]]) && in_array($arEl["ID"], $_POST["FIELDS"][$arField["CODE"]])) echo " selected"?>><?echo str_repeat(" . ", $arEl["DEPTH_LEVEL"]).$arEl["NAME"]?></option><?
					endforeach;?>
				</select>
<?			endif;?>
		</div>
<?			/*STRING*/?>
<?		elseif($arField["TYPE"] != "F"):?>
			
<?				if(!empty($_POST["FIELDS"][$arField["CODE"]])):?>
					<input type="text" size="40" id="<?=$arField["CODE"]?>1" name="FIELDS[<?=$arField["CODE"]?>]" value="<?=trim(htmlspecialcharsEx($_POST["FIELDS"][$arField["CODE"]]))?>" class="alx_feed_back_form_inputtext" />
<?				elseif(!empty($arField["AUTOCOMPLETE_VALUE"])):
					$readonly = "";
					if($arParams["PROPS_AUTOCOMPLETE_VETO"]=="Y")
						if($arField["CODE"] == "FIO_".$ALX || $arField["CODE"] == "EMAIL_".$ALX || $arField["CODE"] == "PHONE_".$ALX)
							$readonly = 'readonly = "readonly" ';
?>
					<input type="text" placeholder="<?=$arField["NAME"];?>" size="40" id="<?=$arField["CODE"]?>1" name="FIELDS[<?=$arField["CODE"]?>]" <?=$readonly?>value="<?=trim(htmlspecialcharsEx($arField["AUTOCOMPLETE_VALUE"]))?>" class="alx_feed_back_form_inputtext" />
<?				else:?>
					<input type="text"  placeholder="<?=$arField["NAME"];?>" size="40" id="<?=$arField["CODE"]?>1" name="FIELDS[<?=$arField["CODE"]?>]" value="<?=$arField["DEFAULT_VALUE"]?>" class="alx_feed_back_form_inputtext" onblur="if(this.value==''){this.value='<?=$arField["DEFAULT_VALUE"]?>'}" onclick="if(this.value=='<?=$arField["DEFAULT_VALUE"]?>'){this.value=''}" />
<?				endif;?>
			
<?			/*FILE*/?>
<?		elseif($arField["TYPE"] == "F"):?>
<?		$k++;?>
		<input type="hidden" id="codeFileFields" name="codeFileFields[<?=$arField['CODE']?>]" value="<?=$arField['CODE']?>">
				<div class="alx_feed_back_form_inputtext_bg_file">
					<div class="alx_feed_back_form_inputfile_s"><div>
<?			if($arField["MULTIPLE"] == "Y"):?>
						<input type="file" id="alx_feed_back_form_file_input_add<?=$k?>" name="myFile[<?=$arField['CODE']?>][]" class="alx_feed_back_form_file_input_add" multiple="true" />
<?			else:?>
						<input type="file" id="alx_feed_back_form_file_input_add<?=$k?>" name="myFile[<?=$arField['CODE']?>]" class="alx_feed_back_form_file_input_add" />
<?			endif;?>
						<input type="hidden" name="FIELDS[myFile][<?=$arField["CODE"]?>]">
					</div></div>
					<div id="alx_feed_back_form_filename<?=$k?>" class="alx_feed_back_form_filename">&nbsp;</div>
					<div class="alx_feed_back_form_file_button"><div class="alx_feed_back_form_file_button_bg"><span><?=GetMessage("ALX_TP_OVERVIEW")?></span></div></div>
				</div>
<?		endif?>
		
<?
		if(!$bFBtext && ($arResult["FIELDS"][$key+1]["SORT"]>10000 || $key==$countArr-1)):
			echo $strFBtext;
			$bFBtext = true;
		endif;?>

<?	endforeach?>
<?
	if(!$bFBtext)
	{
		echo $strFBtext;
		$bFBtext = true;
	}
?>
<?	if($arParams["USE_CAPTCHA"]):?>
<?		if($arParams["CAPTCHA_TYPE"] != 'recaptcha'):?>
			<div class="alx_feed_back_form_item_pole<?if(in_array('ALX_CP_WRONG_CAPTCHA', $errorField, true)):?> alx_feed_back_form_error_pole<?endif?>">
				<div class="alx_feed_back_form_name"><?=GetMessage("ALX_TP_MESSAGE_INPUTF")?> <span class="alx_feed_back_form_required_text">*</span></div>

<?				 if($fVerComposite) $frame = $this->createFrame()->begin('loading... <img src="/bitrix/themes/.default/start_menu/main/loading.gif">');?>
<?				$capCode = $GLOBALS["APPLICATION"]->CaptchaGetCode();?>
				<input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsEx($capCode)?>">
				<div><img id="alx_cm_CAPTCHA_<?=$ALX?>" src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsEx($capCode)?>" width="180" height="40"></div>
				<div style="margin-bottom:6px;"><small><a href="#" onclick="capCode='<?=htmlspecialcharsEx($capCode)?>'; ALX_ReloadCaptcha(capCode, '<?=$ALX?>'); return false;"><?=GetMessage("ALX_TP_RELOADIMG")?></a></small></div>
<?				 if($fVerComposite) $frame->end();?>
				  
				<div class="alx_feed_back_form_inputtext_bg"><input type="text" class="alx_feed_back_form_inputtext" id="captcha_word1" name="captcha_word" size="30" maxlength="50" value=""></div>
			</div>
<?		else:?>
<?			if (isset($arResult["SITE_KEY"])):?>
				<div class="alx_feed_back_form_item_pole<?if(in_array('ALX_CP_WRONG_CAPTCHA', $errorField, true)):?> alx_feed_back_form_error_pole<?endif?>">
					<div class="alx_feed_back_form_name"><?=GetMessage("ALX_TP_MESSAGE_RECAPTCHA")?><span class="alx_feed_back_form_required_text">*</span></div>

					<div class="alx_feed_back_form_inputtext_bg">
<?			 if($fVerComposite) $frame2 = $this->createFrame()->begin('loading... <img src="/bitrix/themes/.default/start_menu/main/loading.gif">');?>
					
					<div class="g-recaptcha" id="html_element_recaptcha" onload="AltasibFeedbackOnload_<?=$ALX?>()" data-sitekey="<?=$arResult["SITE_KEY"]?>"></div>
<?			 if($fVerComposite) $frame2->end();?>

					</div>
				</div>
<?			endif;?>
<?		endif;?>
<?	endif?>
	<div class="alx_feed_back_form_submit_block">
		<input type="submit" class="fb_close" id="fb_close_<?=$ALX?>" name="SEND_FORM" value="<?=GetMessage('ALX_TP_MESSAGE_SUBMIT')?>" />
	</div>
</form>
</div>
<?endif?>
</div>



<?endif;?>

<?if($arParams['ALX_CHECK_NAME_LINK']=='Y'):?>

<?endif?>