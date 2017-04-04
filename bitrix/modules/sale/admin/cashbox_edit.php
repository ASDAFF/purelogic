<?
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Application;
use Bitrix\Main\Page;
use Bitrix\Sale\Cashbox\Internals\KkmModelTable;
use Bitrix\Sale\Cashbox;

require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/sale/include.php");

$saleModulePermissions = $APPLICATION->GetGroupRight("sale");
if ($saleModulePermissions < "W")
	$APPLICATION->AuthForm(GetMessage("SALE_ACCESS_DENIED"));

Loc::loadMessages(__FILE__);

$instance = Application::getInstance();
$context = $instance->getContext();
$request = $context->getRequest();
$server = $context->getServer();
$lang = $context->getLanguage();
$documentRoot = Application::getDocumentRoot();
$cashbox = array();

\Bitrix\Sale\Cashbox\Cashbox::init();

$id = (int)$request->get('ID');
if ($id <= 0)
{
	LocalRedirect("/bitrix/admin/sale_cashbox_list.php?lang=".$lang."&".GetFilterParams("filter_", false));
}

$aTabs = array(
	array(
		"DIV" => "edit1",
		"TAB" => GetMessage("SALE_TAB_CASHBOX"),
		"ICON" => "sale",
		"TITLE" => GetMessage("SALE_TAB_CASHBOX_DESCR"),
	)
);

if ($id > 0)
{
	$res = \Bitrix\Sale\Cashbox\Internals\CashboxTable::getList(array('filter' => array('ID' => $id)));
	$cashbox = $res->fetch();

	if ($request->getRequestMethod() !== 'POST')
	{
		$aTabs[] = array(
			"DIV" => "edit2",
			"TAB" => GetMessage("SALE_CASHBOX_RESTRICTION"),
			"ICON" => "sale",
			"TITLE" => GetMessage("SALE_CASHBOX_RESTRICTION_DESC"),
		);
	}

	if ($request->getRequestMethod() !== 'POST')
	{
		$aTabs[] = array(
			"DIV" => "edit3",
			"TAB" => GetMessage("SALE_CASHBOX_TAB_TITLE_SETTINGS"),
			"ICON" => "sale",
			"TITLE" => GetMessage("SALE_CASHBOX_TAB_TITLE_SETTINGS_DESC"),
		);
	}
}

$tabControl = new CAdminTabControl("tabControl", $aTabs);

$errorMessage = '';

if ($server->getRequestMethod() == "POST"
	&& ($request->get('save') !== null || $request->get('apply') !== null)
	&& $saleModulePermissions == "W"
	&& check_bitrix_sessid()
)
{
	$name = $request->getPost('NAME');
	if (empty($name))
		$errorMessage .= GetMessage('ERROR_NO_NAME')."<br>\n";

	$handler = $request->getPost('HANDLER');
	if (empty($handler))
		$errorMessage .= GetMessage('ERROR_NO_HANDLER')."<br>\n";

	if ($errorMessage === '')
	{
		$settings = $request->getPost('SETTINGS') ? $request->getPost('SETTINGS') : array();
		$handler = $request->getPost('HANDLER');
		$numberKkm = $request->getPost('NUMBER_KKM');
		if ($handler === "\\Bitrix\\Sale\\Cashbox\\Cashbox1C" || empty($numberKkm))
		{
			$settings = array();
		}
		else
		{
			/** @var $payment - hack is for difference between real values of payment cashbox's settings and user view (diff is '-1') */
			foreach ($settings['PAYMENT_TYPE'] as &$payment)
			{
				if ((int)$payment)
					$payment = (int)$payment - 1;
				else
					$payment = 0;
			}
		}

		$fields = array(
			'NAME' => $request->get('NAME'),
			'HANDLER' => $handler,
			'OFD' => $request->getPost('OFD'),
			'NUMBER_KKM' => $numberKkm,
			'KKM_ID' => $request->get('KKM_ID'),
			'ACTIVE' => ($request->get('ACTIVE') == 'Y') ? 'Y' : 'N',
			'OFD_TEST_MODE' => ($request->get('OFD_TEST_MODE') == 'Y') ? 'Y' : 'N',
			'USE_OFFLINE' => ($request->get('USE_OFFLINE') == 'Y') ? 'Y' : 'N',
			'NUMBER_FN' => $request->get('NUMBER_FN'),
			'SORT' => $request->getPost('SORT') ?: 100,
			'SETTINGS' => $settings,
		);

		if ($id > 0)
		{
			$result = Cashbox\Manager::update($id, $fields);
		}
		else
		{
			$result = Cashbox\Manager::add($fields);
			$id = $result->getId();
		}

		if ($result->isSuccess())
		{
			if ($settings && isset($settings['Z_REPORT_TIME']))
			{
				$dateTime = new \Bitrix\Main\Type\DateTime();
				$dateTime->setTime($settings['Z_REPORT_TIME']['H'], $settings['Z_REPORT_TIME']['M']);
			}

			if (strlen($request->getPost("apply")) == 0)
				LocalRedirect("/bitrix/admin/sale_cashbox_list.php?lang=".$lang."&".GetFilterParams("filter_", false));
			else
				LocalRedirect("/bitrix/admin/sale_cashbox_edit.php?lang=".$lang."&ID=".$id."&".GetFilterParams("filter_", false));
		}
		else
		{
			$errorMessage .= implode("\n", $result->getErrorMessages());
		}
	}
}

require_once($documentRoot."/bitrix/modules/sale/prolog.php");

$APPLICATION->SetTitle(($id > 0) ? Loc::getMessage("SALE_CASHBOX_EDIT_RECORD", array("#ID#" => $id)) : Loc::getMessage("SALE_CASHBOX_NEW_RECORD"));

$restrictionsHtml = '';

if ($id > 0 && $request->getRequestMethod() !== 'POST')
{
	ob_start();
	require_once($documentRoot."/bitrix/modules/sale/admin/cashbox_restrictions_list.php");
	$restrictionsHtml = ob_get_contents();
	ob_end_clean();
}

require($documentRoot."/bitrix/modules/main/include/prolog_admin_after.php");
Page\Asset::getInstance()->addJs("/bitrix/js/sale/cashbox.js");
?>

<?
$aMenu = array(
	array(
		"TEXT" => Loc::getMessage("SALE_CASHBOX_2FLIST"),
		"LINK" => "/bitrix/admin/sale_cashbox_list.php?lang=".$context->getLanguage().GetFilterParams("filter_"),
		"ICON" => "btn_list"
	)
);

if ($id > 0 && $saleModulePermissions >= "W")
{
	$aMenu[] = array("SEPARATOR" => "Y");

	$aMenu[] = array(
			"TEXT" => Loc::getMessage("SALE_DELETE_CASHBOX"),
			"LINK" => "javascript:if(confirm('".Loc::getMessage("SPSN_DELETE_CASHBOX_CONFIRM")."')) window.location='/bitrix/admin/sale_cashbox_list.php?action=delete&ID[]=".$id."&lang=".$context->getLanguage()."&".bitrix_sessid_get()."#tb';",
			"WARNING" => "Y",
			"ICON" => "btn_delete"
		);
}
$contextMenu = new CAdminContextMenu($aMenu);
$contextMenu->Show();
?>

<?if ($errorMessage !== '')
	CAdminMessage::ShowMessage(array("DETAILS"=>$errorMessage, "TYPE"=>"ERROR", "MESSAGE"=>Loc::getMessage("SALE_CASHBOX_ERROR"), "HTML"=>true));?>

<form method="POST" action="<?=$APPLICATION->GetCurPage()."?ID=".$id."&lang=".$lang;?>" name="pay_sys_form" enctype="multipart/form-data">
<?echo GetFilterHiddens("filter_");?>
<input type="hidden" name="Update" value="Y">
<input type="hidden" name="lang" value="<?=$context->getLanguage();?>">
<input type="hidden" name="ID" value="<?=$id;?>" id="ID">
<?=bitrix_sessid_post();?>

<?
$tabControl->Begin();
$tabControl->BeginNextTab();
?>
	<?if ($id>0):?>
		<tr>
			<td width="40%">ID:</td>
			<td width="60%"><?=$id;?></td>
		</tr>
	<?endif;?>
	<tr>
		<td width="40%"><label for="ACTIVE"><?=Loc::getMessage("SALE_CASHBOX_ACTIVE");?>:</label></td>
		<td width="60%">
			<?
			if ($request->isPost())
				$active = $request->get('ACTIVE') ? $request->get('ACTIVE') : '';
			else
				$active = isset($cashbox['ACTIVE']) ? $cashbox['ACTIVE'] : 'Y';
			?>
			<input type="checkbox" name="ACTIVE" id="ACTIVE" value="Y" <?=($active == 'Y' ? 'checked' : '')?>>
		</td>
	</tr>
	<tr class="adm-detail-required-field">
		<td width="40%"><?=Loc::getMessage("SALE_CASHBOX_HANDLER");?>:</td>
		<td width="60%" valign="top">
			<select name="HANDLER" id="HANDLER" onchange="BX.Sale.Cashbox.toggleSettings(event.target.value)">
				<?
					$handlerList = Bitrix\Sale\Cashbox\Cashbox::getHandlerList();

					if ($request->get('HANDLER') !== null)
						$handlerName = $request->get('HANDLER');
					else
						$handlerName = $cashbox['HANDLER'];
				?>
				<option value=""><?=Loc::getMessage("SALE_CASHBOX_NO_HANDLER") ?></option>
				<?
				foreach ($handlerList as $handler => $path)
				{
					if (class_exists($handler))
					{
						$selected = ($handler === $handlerName) ? 'selected' : '';
						echo '<option value="'.$handler.'" '.$selected.'>'.$handler::getName().'</option>';
					}
				}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td width="40%"><?=Loc::getMessage("SALE_CASHBOX_OFD");?>:</td>
		<td width="60%">
			<select name="OFD" id="OFD">
				<?
					$ofdList = Bitrix\Sale\Cashbox\Ofd::getHandlerList();

					if ($request->get('OFD') !== null)
						$handlerName = $request->get('OFD');
					else
						$handlerName = $cashbox['OFD'];
				?>
				<option value=""><?=Loc::getMessage("SALE_CASHBOX_NO_HANDLER") ?></option>
				<?
				foreach ($ofdList as $handler => $name)
				{
					$selected = ($handler === $handlerName) ? 'selected' : '';
					echo '<option value="'.$handler.'" '.$selected.'>'.$name.'</option>';
				}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td width="40%"><label for="OFD_TEST_MODE"><?=Loc::getMessage("SALE_CASHBOX_OFD_TEST_MODE");?>:</label></td>
		<td width="60%">
			<?
			if ($request->isPost())
				$ofdTestMode = $request->get('OFD_TEST_MODE') ? $request->get('OFD_TEST_MODE') : '';
			else
				$ofdTestMode = isset($cashbox['OFD_TEST_MODE']) ? $cashbox['OFD_TEST_MODE'] : 'Y';
			?>
			<input type="checkbox" name="OFD_TEST_MODE" id="OFD_TEST_MODE" value="Y" <?=($ofdTestMode == 'Y' ? 'checked' : '')?>>
		</td>
	</tr>
	<tr class="adm-detail-required-field">
		<td width="40%"><?=Loc::getMessage("SALE_CASHBOX_NAME");?>:</td>
		<td width="60%">
			<?
			$name = $request->get('NAME') ? $request->get('NAME') : $cashbox['NAME'];
			?>
			<input type="text" name="NAME" id="NAME" value="<?=htmlspecialcharsbx($name);?>" size="40">
		</td>
	</tr>
	<tr>
		<td width="40%"><?=Loc::getMessage("SALE_CASHBOX_KKM_ID");?>:</td>
		<td width="60%">
			<?
				$kkmId = $request->get('KKM_ID') ? $request->get('KKM_ID') : $cashbox['KKM_ID'];
			?>
			<select name="KKM_ID" id="KKM_ID" onchange="BX.Sale.Cashbox.changeDefaultSettings(event.target.value, <?=(int)$kkmId ? (int)$kkmId : "null"?>)">
				<option value=""><?=Loc::getMessage('SALE_CASHBOX_KKM_NO_CHOOSE')?></option>
				<?					
					$dbRes = \Bitrix\Sale\Cashbox\Internals\KkmModelTable::getList();
					while ($kkm = $dbRes->fetch())
					{
						$selected = ($kkm['ID'] === $kkmId) ? 'selected' : '';
						echo '<option value="'.$kkm['ID'].'" '.$selected.'>'.$kkm['NAME'].'</option>';
					}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td width="40%"><?=Loc::getMessage("SALE_CASHBOX_NUMBER_KKM");?>:</td>
		<td width="60%">
			<?
			$numberKkm = $request->get('NUMBER_KKM') ? $request->get('NUMBER_KKM') : $cashbox['NUMBER_KKM'];
			?>
			<input type="text" name="NUMBER_KKM" id="NUMBER_KKM" value="<?=htmlspecialcharsbx($numberKkm)?>" size="40">
		</td>
	</tr>
	<tr>
		<td width="40%"><?=Loc::getMessage("SALE_CASHBOX_NUMBER_FN");?>:</td>
		<td width="60%">
			<?
			$numberFn = $request->get('NUMBER_FN') ? $request->get('NUMBER_FN') : $cashbox['NUMBER_FN'];
			?>
			<input type="text" name="NUMBER_FN" id="NUMBER_FN" value="<?=htmlspecialcharsbx($numberFn)?>" size="40">
		</td>
	</tr>
	<tr>
		<td width="40%" align="right"><label for="USE_OFFLINE"><?=Loc::getMessage("SALE_CASHBOX_USE_OFFLINE");?>:</label></td>
		<td width="60%">
			<?
				if ($request->isPost())
					$isOffline = $request->get('USE_OFFLINE') ? $request->get('USE_OFFLINE') : '';
				else
					$isOffline = isset($cashbox['USE_OFFLINE']) ? $cashbox['USE_OFFLINE'] : 'N';
			?>

			<input type="checkbox" name="USE_OFFLINE" id="USE_OFFLINE" value="Y"<?=($isOffline == 'Y') ? ' checked' : '';?>>
		</td>
	</tr>
<?

$tabControl->EndTab();

if ($restrictionsHtml !== ''):?>
	<?$tabControl->BeginNextTab();?>
		<tr><td id="sale-cashbox-restriction-container"><?=$restrictionsHtml?></td></tr>
	<?$tabControl->EndTab();
endif;

if ($restrictionsHtml !== ''):?>
	<?$tabControl->BeginNextTab();?>
	<?
	$vatData= \Bitrix\Catalog\VatTable::getList(
		array(
			'filter' => array('ACTIVE' => 'Y')
		)
	);
	$cashboxSettings = $cashbox['SETTINGS'];
	$vatCatalogList = $vatData->fetchAll();
	$kkmDefault = array();
	if ((int)$cashbox['KKM_ID'])
	{
		$kkmData = KkmModelTable::getById($cashbox['KKM_ID']);
		$kkm = $kkmData->fetch();
		$kkmDefault = $kkm['SETTINGS'];
	}
	$defaultVatMap = $kkmDefault['VAT'];
	?>
	<tr>
		<td colspan="2" id="sale-cashbox-settings-vat-container">
			<tr class="heading">
				<td colspan="2"><?=Loc::getMessage("SALE_CASHBOX_SETTINGS_VAT_TITLE")?></td>
			</tr>
			<tr>
				<td align="center">
					<table class="internal" id="cashbox-settings-vat">
						<tr class="heading">
							<td><?=Loc::getMessage("SALE_CASHBOX_SETTINGS_VAT")?></td>
							<td><?=Loc::getMessage("SALE_CASHBOX_SETTINGS_VAT_CASHBOX")?></td>
						</tr>
						<tr>
							<td width="45%"><?=Loc::getMessage("SALE_CASHBOX_SETTINGS_VAT_EMPTY")?> [<?=Loc::getMessage("SALE_CASHBOX_SETTINGS_VAT_EMPTY_DEFAULT")?>]:</td>
							<td width="55%" valign="top">
								<input bx-vat-value="NOT_VAT"
									   bx-vat-id="NOT_VAT"
									   type="text"
									   name="SETTINGS[VAT][NOT_VAT]"
									   value="<?=empty($cashboxSettings['VAT']['NOT_VAT']) ? $defaultVatMap['NOT_VAT'] : (int)$cashboxSettings['VAT']['NOT_VAT']?>">
							</td>
						</tr>
						<?
							foreach ($vatCatalogList as $vatCatalog)
							{
								if (!empty($cashboxSettings['VAT'][$vatCatalog['ID']]))
								{
									$vatValue = (int)$cashboxSettings['VAT'][$vatCatalog['ID']];
								}
								elseif (isset($defaultVatMap[(int)$vatCatalog['RATE']]) && $vatCatalog['RATE'] == (int)$vatCatalog['RATE'])
								{
									$vatValue = (int)($defaultVatMap[(int)$vatCatalog['RATE']]);
								}
								else
								{
									$vatValue = null;
								}
								?>
								<tr>
									<td width="45%"><?=htmlspecialcharsbx($vatCatalog['NAME'])?> [<?=htmlspecialcharsbx((float)$vatCatalog['RATE'])?>%]:</td>
									<td width="55%" valign="top">
										<input	bx-vat-value="<?=(float)$vatCatalog['RATE']?>"
												bx-vat-id="<?=(int)$vatCatalog['ID']?>"
												type="text"
												name="SETTINGS[VAT][<?=(int)$vatCatalog['ID']?>]"
												value="<?=$vatValue?>">
									</td>
								</tr>
								<?
							}
						?>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<a href="/bitrix/admin/cat_vat_admin.php?lang=<?=LANGUAGE_ID?>" target="_blank">
						<?=Loc::getMessage("SALE_CASHBOX_SETTINGS_LINK_VAT_LIST")?>
					</a>
				</td>
			</tr>
			<tr class="heading">
				<td colspan="2"><?=Loc::getMessage("SALE_CASHBOX_SETTINGS_PAYMENT_TITLE")?></td>
			</tr>
			<?
			$defaultPaymentMap = $kkmDefault['PAYMENT_TYPE'];
			?>
			<tr>
				<td align="center" class="sale-cashbox-settings-vat-container">
					<table class="internal" id="cashbox-settings-payment-type">
						<tr class="heading">
							<td><?=Loc::getMessage("SALE_CASHBOX_SETTINGS_PAYMENT")?></td>
							<td><?=Loc::getMessage("SALE_CASHBOX_SETTINGS_PAYMENT_CASHBOX")?></td>
						</tr>
						<tr>
							<td width="45%"><?=Loc::getMessage("SALE_CASHBOX_SETTINGS_PAYMENT_CASH")?>:</td>
							<td width="55%" valign="top">
								<input bx-payment-type = "Y"  
										type="text"
										name="SETTINGS[PAYMENT_TYPE][Y]"
										value="<?=(!isset($cashboxSettings['PAYMENT_TYPE']['Y']) ? $defaultPaymentMap['Y'] : (int)($cashboxSettings['PAYMENT_TYPE']['Y'])) + 1?>">
							</td>
						</tr>
						<tr>
							<td width="45%"><?=Loc::getMessage("SALE_CASHBOX_SETTINGS_PAYMENT_BANK")?>:</td>
							<td width="55%" valign="top">
								<input bx-payment-type = "N"
									   type="text"
										name="SETTINGS[PAYMENT_TYPE][N]"
										value="<?=(!isset($cashboxSettings['PAYMENT_TYPE']['N']) ? $defaultPaymentMap['N'] : (int)($cashboxSettings['PAYMENT_TYPE']['N'])) + 1?>">
							</td>
						</tr>
						<tr>
							<td width="45%"><?=Loc::getMessage("SALE_CASHBOX_SETTINGS_PAYMENT_CARD")?>:</td>
							<td width="55%" valign="top">
								<input bx-payment-type = "A"
									   type="text"
										name="SETTINGS[PAYMENT_TYPE][A]"
										value="<?=(!isset($cashboxSettings['PAYMENT_TYPE']['A']) ? $defaultPaymentMap['A'] : (int)($cashboxSettings['PAYMENT_TYPE']['A'])) + 1?>">
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr class="heading">
				<td colspan="2"><?=Loc::getMessage("SALE_CASHBOX_SETTINGS_Z_PRINT")?></td>
			</tr>
			<tr>
				<td align="center">
					<table>
						<tr>
							<td width="45%"><?=Loc::getMessage("SALE_CASHBOX_SETTINGS_Z_PRINT_START")?>:</td>
							<td width="55%" valign="top">
								<select name="SETTINGS[Z_REPORT_TIME][H]">
								<?for ($i = 0; $i < 24; $i++):?>
									<?$value = ($i < 10) ? '0'.$i : $i;?>
									<option value="<?=$i;?>" <?=$cashboxSettings['Z_REPORT_TIME']['H']==$i ? 'selected' : '';?>><?=$value;?></option>
								<?endfor;?>
								</select> :
								<select name="SETTINGS[Z_REPORT_TIME][M]">
								<?for ($i = 0; $i < 60; $i+=5):?>
									<?$value = ($i < 10) ? '0'.$i : $i;?>
									<option value="<?=$i;?>" <?=$cashboxSettings['Z_REPORT_TIME']['M']==$i ? 'selected' : '';?>><?=$value;?></option>
								<?endfor;?>
								</select>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</td>
	</tr>
	<?$tabControl->EndTab();
endif;

$tabControl->Buttons(
	array(
		"disabled" => ($saleModulePermissions < "W"),
		"back_url" => "/bitrix/admin/sale_cashbox_list.php?lang=".$context->getLanguage().GetFilterParams("filter_")
	)
);
$tabControl->End();
?>
</form>
<script language="JavaScript">
	<?
	if ($cashbox['HANDLER'] === "\\Bitrix\\Sale\\Cashbox\\Cashbox1C" || empty($cashbox['KKM_ID']))
	{
		?>
		tabControl.DisableTab('edit3');
		<?
	}
	?>
	BX.message({
		SALE_RDL_RESTRICTION: '<?=Loc::getMessage("SALE_CASHBOX_RDL_RESTRICTION")?>',
		SALE_RDL_SAVE: '<?=Loc::getMessage("SALE_CASHBOX_RDL_SAVE")?>'
	});
</script>
<?
require($documentRoot."/bitrix/modules/main/include/epilog_admin.php");
?>
