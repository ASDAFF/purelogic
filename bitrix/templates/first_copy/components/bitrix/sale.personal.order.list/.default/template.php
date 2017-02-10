<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<section class="user_acaunnt zakaz">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h2>Мои заказы</h2>
			
				<div class="time_ucaunt">
					
				</div>
			
			</div>
			<div class="col-md-4">
				<div class="col-md-4 col-sm-4 col-xs-6 padding_0">
					<div class="icon_but_wr">
						<a href="/personal/" class="icon_but">
							<img src="/img/icon/text.png" alt="">
						</a>
						<p>Аккаунт</p>
					</div>
				</div>
				
				<div class="col-md-4 col-sm-4 col-xs-6 padding_0">
					<div class="icon_but_wr">
						<a href="/support/" class="icon_but">
							<img src="/img/icon/cal.png" alt="">
						</a>
						<p>Поддержка</p>
					</div>
				</div>
			</div>
			
	

<?if(!empty($arResult['ERRORS']['FATAL'])):?>

	<?foreach($arResult['ERRORS']['FATAL'] as $error):?>
		<?=ShowError($error)?>
	<?endforeach?>

	<?$component = $this->__component;?>
	<?if($arParams['AUTH_FORM_IN_TEMPLATE'] && isset($arResult['ERRORS']['FATAL'][$component::E_NOT_AUTHORIZED])):?>
		<?$APPLICATION->AuthForm('', false, false, 'N', false);?>
	<?endif?>

<?else:?>

	<?if(!empty($arResult['ERRORS']['NONFATAL'])):?>

		<?foreach($arResult['ERRORS']['NONFATAL'] as $error):?>
			<?=ShowError($error)?>
		<?endforeach?>

	<?endif?>

	<?/*<div class="bx_my_order_switch">

		<?$nothing = !isset($_REQUEST["filter_history"]) && !isset($_REQUEST["show_all"]);?>

		<?if($nothing || isset($_REQUEST["filter_history"])):?>
			<a class="bx_mo_link" href="<?=$arResult["CURRENT_PAGE"]?>?show_all=Y"><?=GetMessage('SPOL_ORDERS_ALL')?></a>
		<?endif?>

		<?if($_REQUEST["filter_history"] == 'Y' || $_REQUEST["show_all"] == 'Y'):?>
			<a class="bx_mo_link" href="<?=$arResult["CURRENT_PAGE"]?>?filter_history=N"><?=GetMessage('SPOL_CUR_ORDERS')?></a>
		<?endif?>

		<?if($nothing || $_REQUEST["filter_history"] == 'N' || $_REQUEST["show_all"] == 'Y'):?>
			<a class="bx_mo_link" href="<?=$arResult["CURRENT_PAGE"]?>?filter_history=Y"><?=GetMessage('SPOL_ORDERS_HISTORY')?></a>
		<?endif?>

	</div>*/?>

	<?if(!empty($arResult['ORDERS'])):?>

		<?foreach($arResult["ORDER_BY_STATUS"] as $key => $group):?>

			<?foreach($group as $k => $order):?>

				<?if("titi"=="mimi"):?>

					<div class="bx_my_order_status_desc">

						<h2><?=GetMessage("SPOL_STATUS")?> "<?=$arResult["INFO"]["STATUS"][$key]["NAME"] ?>"</h2>
						<div class="bx_mos_desc"><?=$arResult["INFO"]["STATUS"][$key]["DESCRIPTION"] ?></div>

					</div>

				<?endif?>
<div class="col-md-12 zakaz_table">
				<div class="zakaz_name">
					<p>ЗАКАЗ  <span>#<?=$order["ORDER"]["ACCOUNT_NUMBER"]?> </span> ОТ<span><?=$order["ORDER"]["DATE_INSERT_FORMATED"];?></span></p>
					
					<p class="zakaz_status">Статус: <span class="<?=$arResult["INFO"]["STATUS"][$key]['COLOR']?>"><?=$arResult["INFO"]["STATUS"][$key]["NAME"]?></span></p>
				</div>
				<?foreach ($order["BASKET_ITEMS"] as $item):?>
<div class="zakaz_tovar">
					<div class="col-md-2">
						<p></p>
					</div>
					<div class="col-md-7">
						<p><?=$item['NAME']?></p>
					</div>	
					<div class="col-md-1">
						<p><?=$item['QUANTITY']?></p>
					</div>
					<div class="col-md-2">
						<p class="right"><?echo CurrencyFormat($item["PRICE"], 'RUB');?></p>
					</div>
				</div>
								

										<?endforeach?>
				
				
				<div class="zakaz_itog">
				<div class="col-md-9">
				</div>
				<div class="col-md-1">
				<p style="float:left; margin-left:0px">Итог</p>
				</div>
					<div class="col-md-2 ">
						<p><span><?echo CurrencyFormat($order["ORDER"]["PRICE"], 'RUB');?></span></p>
					</div>
				</div>
			</div>
				

			<?endforeach?>

		<?endforeach?>

		<?if(strlen($arResult['NAV_STRING'])):?>
			<?=$arResult['NAV_STRING']?>
		<?endif?>

	<?else:?>
		<?=GetMessage('SPOL_NO_ORDERS')?>
	<?endif?>

<?endif?>
	</div>
	</div>
</section>	