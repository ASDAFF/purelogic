<?
/**
 * @global CMain $APPLICATION
 * @param array $arParams
 * @param array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();
?>

<section class="user_acaunnt">
	<div class="container">
		<div class="row">
		
			<div class="col-md-8">
				<div class="hidden-sm hidden-md hidden-lg сol-xs-12 padding_0">
					<ul id="breadcrumbs-two">
						<li><a href="/">Главная</a></li>
						<li><a href="#">Мой акаунт</a></li>
						 
					</ul>
				</div>
				<h2>Кабинет пользователя</h2>
				

				<input type="email" class="user_name" name="LOGIN" maxlength="50" value="<? echo $arResult["arUser"]["LOGIN"]?>" />
				
				<div class="time_ucaunt">
					<p>Вы зарегистрированы как физическое лицо <span><?=$arResult["arUser"]["TIMESTAMP_X"]?></span></p>     
					<span>|</span>     
					<p>Последняя авторизация:  <span><?=$arResult["arUser"]["LAST_LOGIN"]?></span></p>
				</div>
			
			</div>
			<div class="col-md-3 col-md-offset-1">
				<div class="col-md-6 col-sm-4 col-xs-6 padding_0">
					<div class="icon_but_wr">
						<a href="/personal/order/" class="icon_but">
							<img src="/img/icon/text.png" alt="">
						</a>
						<p>Заказы</p>
					</div>
				</div>
				
				<div class="col-md-6 col-sm-4 col-xs-6 padding_0">
					<div class="icon_but_wr">
						<a href="/support/" class="icon_but">
							<img src="/img/icon/cal.png" alt="">
						</a>
						<p>Поддержка</p>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<section class="user_inf">
					<div class="hidden-md hidden-sm col-sm-2 col-lg-2">
						<div class="img_form_user">
							<img src="/img/icon/people_user.png" alt="">
						</div>
					</div>
					
<?ShowError($arResult["strProfileError"]);?>
<?
if ($arResult['DATA_SAVED'] == 'Y')
	ShowNote(GetMessage('PROFILE_DATA_SAVED'));
?>
<script type="text/javascript">
<!--
var opened_sections = [<?
$arResult["opened"] = $_COOKIE[$arResult["COOKIE_PREFIX"]."_user_profile_open"];
$arResult["opened"] = preg_replace("/[^a-z0-9_,]/i", "", $arResult["opened"]);
if (strlen($arResult["opened"]) > 0)
{
	echo "'".implode("', '", explode(",", $arResult["opened"]))."'";
}
else
{
	$arResult["opened"] = "reg";
	echo "'reg'";
}
?>];
//-->

var cookie_prefix = '<?=$arResult["COOKIE_PREFIX"]?>';
</script>
<form method="post" name="form1" id="user_form" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data">
<?=$arResult["BX_SESSION_CHECK"]?>
<input type="hidden" name="lang" value="<?=LANG?>" />
<input type="hidden" name="ID" value=<?=$arResult["ID"]?> />
<input type="text"  style="display:none" class="user_name" name="LOGIN" maxlength="50" value="<? echo $arResult["arUser"]["LOGIN"]?>" />
				<input type="text" style="display:none" class="user_name" name="EMAIL" maxlength="50" value="<? echo $arResult["arUser"]["EMAIL"]?>" />
				

						<div class="col-md-12 col-lg-3">
							<h4>Личная информация</h4>
						</div>
						<div class="col-md-12 col-lg-7 ">
							<p>Поля, отмеченные звездочкой, обязательны для заполнения</p>
						</div>
						<div class="col-md-5 col-sm-5 col-lg-3">
							<label for="text"><?=GetMessage('NAME')?>*</label>
						</div>
						<div class="col-md-7 col-sm-7">
							<input type="text" name="NAME" required maxlength="50" value="<?=$arResult["arUser"]["NAME"]?>" />
						</div>
						<div class="col-md-5 col-sm-5 col-lg-3">
							<label for="text"><?=GetMessage('LAST_NAME')?></label>
						</div>
						<div class="col-md-7 col-sm-7">
							<input type="text" name="LAST_NAME" maxlength="50" value="<?=$arResult["arUser"]["LAST_NAME"]?>" />
						</div>
						
		
	                   <div class="col-md-5 col-sm-5 col-lg-3">
							<label for="tel"><?=GetMessage('USER_PHONE')?></label>
						</div>
						<div class="col-md-7 col-sm-7">
							<input type="text" name="PERSONAL_PHONE" maxlength="255" value="<?=$arResult["arUser"]["PERSONAL_PHONE"]?>" />
						</div>
						<div class="col-md-5 col-sm-5 col-lg-3">
							<label for="password">Для смены пароля введите новый:</label>
						</div>
						<div class="col-md-7 col-sm-7">
							<input type="password" name="NEW_PASSWORD" maxlength="50" value="" autocomplete="off" class="bx-auth-input" />
						</div>
						<div class="col-md-5 col-sm-5 col-lg-3">
							<label for="password">Подтвердите новый пароль:</label>
						</div>
						<div class="col-md-7 col-sm-7">
							<input type="password" name="NEW_PASSWORD_CONFIRM" maxlength="50" value="" autocomplete="off" />
						</div>
						<div class="col-md-5 col-sm-5 col-lg-3">
							<label>Дополнительная информация</label>
						</div>
						<div class="col-md-7 col-sm-7">
							<textarea cols="30" rows="5" name="PERSONAL_NOTES"><?=$arResult["arUser"]["PERSONAL_NOTES"]?></textarea>
						</div>

						
						<div class="col-md-8 col-sm-10 col-ld-6 col-xs-10" >
							<label>Согласен на обработку моих персональных данных* <a href="#">Условия предоставления</a></label>
						</div>
						<div class="col-md-1 col-sm-2 col-xs-2 padding-left_0">
							<input type="checkbox" checked required name="UF_YES" value="1">
						</div>
						<div class="col-md-12 col-sm-4 col-lg-3 col-lg-offset-7">
							<input type="submit" name="save" value="<?=(($arResult["ID"]>0) ? GetMessage("MAIN_SAVE") : GetMessage("MAIN_ADD"))?>">
						</div>
					</form>
				</section>
				
			</div>
			

		</div>
	</div>
</section>



