<?
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
global $MESS;
include($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/sale/payment/cloudpayments/".LANGUAGE_ID."/payment.php");
\Bitrix\Main\Loader::includeModule("sale");
$result['code']=0;
if($_POST['InvoiceId']){
	$bCorrectPayment = True;
		if (!($arOrder = CSaleOrder::GetByID(IntVal($_POST['InvoiceId']))))
			$bCorrectPayment = False;
		if ($bCorrectPayment)
			CSalePaySystemAction::InitParamArrays($arOrder, $arOrder["ID"]);
	$strPS_STATUS_DESCRIPTION = "";
	$strPS_STATUS_DESCRIPTION .= $MESS["VBCH_CLOUDPAY_ORDERID"].$_POST['InvoiceId']."; ";
	$strPS_STATUS_DESCRIPTION .= $MESS["VBCH_CLOUDPAY_ORDERNUM"]." <a target='_blank' href='https://merchant.cloudpayments.ru/Transactions/Details/".$_POST['TransactionId']."'>".$_POST['TransactionId']."</a>; ";
	$strPS_STATUS_DESCRIPTION .= $MESS["VBCH_CLOUDPAY_DATEPAY"].$_POST['DateTime']."; ";
	$strPS_STATUS_DESCRIPTION .= $MESS["VBCH_CLOUDPAY_SUCCESCODE"].$_POST['AuthCode']."";
	$strPS_STATUS_MESSAGE = "";
			if ($_POST['AccountId'])
				$strPS_STATUS_MESSAGE .= $MESS["VBCH_CLOUDPAY_BUYEREMAIL"].$_POST['AccountId']."; ";
	$arFields = array(
					"PS_STATUS" => "Y",
					"PS_STATUS_CODE" => $_POST['Status'],
					"PS_STATUS_DESCRIPTION" => $strPS_STATUS_DESCRIPTION,
					"PS_STATUS_MESSAGE" => $strPS_STATUS_MESSAGE,
					"PS_SUM" => $_POST['PaymentAmount'],
					"PAY_VOUCHER_NUM"=>$_POST['TransactionId'],
					"PAY_VOUCHER_DATE"=>Date(CDatabase::DateFormatToPHP(CLang::GetDateFormat("FULL", LANG))),
					"PS_CURRENCY" => $_POST['PaymentCurrency'],
					"PS_RESPONSE_DATE" => Date(CDatabase::DateFormatToPHP(CLang::GetDateFormat("FULL", LANG))),
					"USER_ID" => $arOrder["USER_ID"]
				);
	CSaleOrder::Update($arOrder["ID"], $arFields);
	CSaleOrder::PayOrder($arOrder["ID"], "Y");
}
echo json_encode($result);
?>