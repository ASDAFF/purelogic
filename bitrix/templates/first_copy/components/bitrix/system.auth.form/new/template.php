<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR'])
	ShowMessage($arResult['ERROR_MESSAGE']);
?>


<div class="bx-system-auth-form form_vtt1">


<?if($arResult["FORM_TYPE"] == "login"):?>


	<form name="system_auth_form<?=$arResult["RND"]?>" method="post" class="hidden-sm form_author1 hidden-xs" target="_top" action="<?=$arResult["AUTH_URL"]?>">
		<?if($arResult["BACKURL"] <> ''):?>
			<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
		<?endif?>
		<?foreach ($arResult["POST"] as $key => $value):?>
			<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
		<?endforeach?>
		<input type="hidden" name="AUTH_FORM" value="Y" />
		<input type="hidden" name="TYPE" value="AUTH" />

		<li><input type="text" placeholder="Логин" name="USER_LOGIN"  required value="<?=$arResult["USER_LOGIN"]?>"  /></li>
		<li><input type="password" placeholder="Пароль" name="USER_PASSWORD"   required autocomplete="off" /></li>
		<li><span class="reg-hover"><i class="fa fa-key" aria-hidden="true"></i><a href="/vhod/registration.php">Регистрация</a></span><input type="submit" value="войти"></li>



	</form>

	<?
elseif($arResult["FORM_TYPE"] == "otp"):
	?>

	<form name="system_auth_form<?=$arResult["RND"]?>" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
		<?if($arResult["BACKURL"] <> ''):?>
			<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
		<?endif?>
		<input type="hidden" name="AUTH_FORM" value="Y" />
		<input type="hidden" name="TYPE" value="OTP" />
		<table width="95%">
			<tr>
				<td colspan="2">
					<?echo GetMessage("auth_form_comp_otp")?><br />
					<input type="text" name="USER_OTP" maxlength="50" value="" size="17" autocomplete="off" /></td>
			</tr>
			<?if ($arResult["CAPTCHA_CODE"]):?>
				<tr>
					<td colspan="2">
						<?echo GetMessage("AUTH_CAPTCHA_PROMT")?>:<br />
						<input type="hidden" name="captcha_sid" value="<?echo $arResult["CAPTCHA_CODE"]?>" />
						<img src="/bitrix/tools/captcha.php?captcha_sid=<?echo $arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" /><br /><br />
						<input type="text" name="captcha_word" maxlength="50" value="" /></td>
				</tr>
			<?endif?>
			<?if ($arResult["REMEMBER_OTP"] == "Y"):?>
				<tr>
					<td valign="top"><input type="checkbox" id="OTP_REMEMBER_frm" name="OTP_REMEMBER" value="Y" /></td>
					<td width="100%"><label for="OTP_REMEMBER_frm" title="<?echo GetMessage("auth_form_comp_otp_remember_title")?>"><?echo GetMessage("auth_form_comp_otp_remember")?></label></td>
				</tr>
			<?endif?>
			<tr>
				<td colspan="2"><input type="submit" name="Login" value="<?=GetMessage("AUTH_LOGIN_BUTTON")?>" /></td>
			</tr>
			<tr>
				<td colspan="2"><noindex><a href="<?=$arResult["AUTH_LOGIN_URL"]?>" rel="nofollow"><?echo GetMessage("auth_form_comp_auth")?></a></noindex><br /></td>
			</tr>
		</table>
	</form>

	<?
else:
	?>

	<form action="<?=$arResult["AUTH_URL"]?>">


		<li style="text-align: left"><a href="/personal/" title="<?=GetMessage("AUTH_PROFILE")?>">Личный кабинет</a></li>
		<li style="text-align: left"><a href="/personal/order/">Мои заказы</a></li>
		<li style="text-align: left"><input type="submit" name="logout_butt" value="<?=GetMessage("AUTH_LOGOUT_BUTTON")?>" /></li>

		<style>
			.header-new .personal-new .personal-two a:hover{
				color: #94b82f;
			}
		</style>

		<?foreach ($arResult["GET"] as $key => $value):?>
			<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
		<?endforeach?>
		<input type="hidden" name="logout" value="yes" />


	</form>
<?endif?>


</div>

