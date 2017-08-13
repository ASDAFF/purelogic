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
	$strPS_STATUS_DESCRIPTION = "";
	$strPS_STATUS_DESCRIPTION .= $MESS["VBCH_CLOUDPAY_ORDERID"].$_POST['InvoiceId']."; ";
	$strPS_STATUS_DESCRIPTION .= $MESS["VBCH_CLOUDPAY_ORDERNUM"]." <a target='_blank' href='https://merchant.cloudpayments.ru/Transactions/Details/".$_POST['TransactionId']."'>".$_POST['TransactionId']."</a>; ";
	$strPS_STATUS_DESCRIPTION .= $MESS["VBCH_CLOUDPAY_DATEPAY"].$_POST['DateTime']."; ";
	$strPS_STATUS_DESCRIPTION .= $MESS["VBCH_CLOUDPAY_ERRORCODE"].$_POST['ReasonCode']."; ";
	$strPS_STATUS_MESSAGE = "";
	
	if ($_POST['AccountId'])
		$strPS_STATUS_MESSAGE .= $MESS["VBCH_CLOUDPAYMENT_".$_POST['ReasonCode']];
	$arFields = array(
					"PS_STATUS" => "N",
					"PS_STATUS_CODE" =>$MESS["VBCH_CLOUDPAYMENT_".$_POST['ReasonCode']],
					"PS_STATUS_DESCRIPTION" => $strPS_STATUS_DESCRIPTION,
					"PS_STATUS_MESSAGE" => $strPS_STATUS_MESSAGE,
					"PS_SUM" => $_POST['PaymentAmount'],
					"PS_CURRENCY" => $_POST['Currency'],
					"PS_RESPONSE_DATE" => Date(CDatabase::DateFormatToPHP(CLang::GetDateFormat("FULL", LANG))),
					"USER_ID" => $arOrder["USER_ID"]
				);
	CSaleOrder::Update($arOrder["ID"], $arFields);
}
echo json_encode($result);
?>