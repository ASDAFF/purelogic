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
				

						<div class="col-md-12 col-lg-3" style="overflow: hidden;width: auto;float: none;">
							<h4>Личная информация</h4>
						</div>

						<div class="col-md-12 col-lg-7 " style="overflow: hidden;width: auto;float: none;">
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
						<div class="col-md-7 col-sm-7" style="    height: 52px;">
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

						
						<div class="col-md-8 col-sm-10 col-lg-7 col-xs-10 radios" >
							<label class="need_l">Даю согласие на обработку персональных данных* <a href="#">Условия предоставления</a></label><input style="display:none" type="checkbox" checked required name="UF_YES" id="uff" value="1"><label class="radio_b deliv_chck" for="uff"></label>
						</div>
						
						<div class="col-md-4 col-sm-4 col-lg-3 ">
							<input type="submit" name="save" value="<?=(($arResult["ID"]>0) ? GetMessage("MAIN_SAVE") : GetMessage("MAIN_ADD"))?>">
						</div>
					</form>
				</section>
				
			</div>
			<div class="col-md-12">
				<section class="user_inf_dostavka not_fl">
					<div class="hidden-md  hidden-sm col-xs-12 col-lg-2">
						<div class="img_form_user">
							<img src="/img/icon/bus.png" alt="">
						</div>
					</div>
					<form action="#" id="user_form">
					<div class="col-md-12 col-lg-3">
							<h4>Информация о доставке</h4>
						</div>
						<div class="col-md-12 col-lg-7">
							<p>Поля, отмеченные звездочкой, обязательны для заполнения</p>
						</div>
						<div class="radio">
																				
							
							<div class="col-md-3 col-sm-6 col-xs-12 radios" style="margin-bottom:10px">
						
<input type="radio" style="display:none" id="ID_DELIVERY_ID_25" name="DELIVERY_ID" value="25"> <label class="radio_b deliv_chck" for="ID_DELIVERY_ID_25"></label><p>СПСР (ГЕПАРД-ЭКСПРЕСС)</p>
							</div>
														
							
							<div class="col-md-3 col-sm-6 col-xs-12 radios" style="margin-bottom:10px">
						
<input type="radio" style="display:none" id="ID_DELIVERY_ID_33" name="DELIVERY_ID" value="33"> <label class="radio_b deliv_chck" for="ID_DELIVERY_ID_33"></label><p>Деловые линии</p>
							</div>
														
							
							<div class="col-md-3 col-sm-6 col-xs-12 radios" style="margin-bottom:10px">
						
<input type="radio" style="display:none" id="ID_DELIVERY_ID_28" name="DELIVERY_ID" value="28"> <label class="radio_b deliv_chck" for="ID_DELIVERY_ID_28"></label><p>СПСР (ПЕЛИКАН-СТАНДАРТ)</p>
							</div>
														
							
							<div class="col-md-3 col-sm-6 col-xs-12 radios" style="margin-bottom:10px">
						
<input type="radio" style="display:none" id="ID_DELIVERY_ID_20" name="DELIVERY_ID" value="20"> <label class="radio_b deliv_chck" for="ID_DELIVERY_ID_20"></label><p>EMS Почта России (экспресс-доставка)</p>
							</div>
														
							
							<div class="col-md-3 col-sm-6 col-xs-12 radios" style="margin-bottom:10px">
						
<input type="radio" style="display:none" id="ID_DELIVERY_ID_6" name="DELIVERY_ID" value="6" checked=""> <label class="radio_b deliv_chck" for="ID_DELIVERY_ID_6"></label><p>Самовывоз</p>
							</div>
														
							
						</div>
						<div class="col-lg-7 col-md-12 col-lg-offset-3 col-xs-12">
								<p>Со стоимостью доставки Вы можете ознакомиться на сайте транспортной компании</p>
							</div>
						
					
						<div class="col-md-3 col-sm-5">
							<label for="tel">Почтовый индекс*</label>
						</div>
						<div class="col-md-2">
							<input type="tel" >
						</div>
						<div class="col-md-1">
							<label>Страна*</label>
						</div>
						<div class="col-md-4">
							<select id="demo" tabindex="1">
			                    <option >Российская Федерация</option>
			                    <option >Казахстан</option>
			                    <option >Украина</option>
			                    <option >Беларусь</option>
			                    <option >Молдова</option>
			                   	<option >Румуния</option>
			                   
			                </select>
						</div>

						
						
						<div class="col-md-3 col-sm-5">
							<label for="text">Регион, область, край*</label>
						</div>
						<div class="col-md-7 col-sm-7">
							<input type="text" required value="" >
						</div>
						<div class="col-md-3 col-sm-5">
							<label for="text">Район*</label>
						</div>
						<div class="col-md-7 col-sm-7">
							<input type="text" required value="" >
						</div>
						<div class="col-md-3 col-sm-5">
							<label for="text">Населеный пункт*</label>
						</div>
						<div class="col-md-7 col-sm-7">
							<input type="text" required value="" >
						</div>
						<div class="col-md-3 col-sm-5">
							<label for="text">Улица*</label>
						</div>
						<div class="col-md-7 col-sm-7">
							<input type="text" required value="" >
						</div>
						<div class="col-md-3 col-sm-5 col-xs-4">
							<label for="text">Корпус,строение</label>
						</div>
						<div class="col-md-2 col-sm-7 ">
							<input type="text" required value="" >
						</div>
						<div class="col-md-3 col-sm-12 col-xs-6 ">
							<div class="col-md-4 col-sm-5 padding-left_0"> 
								<label for="text">Дом*</label>
							</div> 	
							<div class="col-md-8  col-sm-7 padding-left_0"> 
								<input type="text" required value="" >
							</div>	
						</div>
						<div class="col-md-2 col-sm-12 col-xs-6">
							<div class="col-md-6 col-sm-5 padding_0"> 
								<label for="text">Квартира</label>
							</div> 	
							<div class="col-md-6 col-sm-7 padding_0"> 
								<input type="text" required value="" >
							</div>	
						</div>
						<div class="col-md-10 col-sm-12">
							<textarea name="" id="" cols="30" rows="10" placeholder="Если это необходимо, напишите, пожалуйста, любую уточняющую информацию "></textarea>
						</div>
						<div class="col-lg-3 col-lg-offset-9  col-md-10">
							<input type="submit" value="сохранить">
						</div>
						
					</form>
				</section>
				
			</div>

		</div>
	</div>
</section>



