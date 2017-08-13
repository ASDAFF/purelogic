<?
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
\Bitrix\Main\Loader::includeModule("sale");
$result['code']=0;
if($_POST['InvoiceId']){
	$arOrder = \CSaleOrder::GetByID($_POST['InvoiceId']);
	if($arOrder){
		if($arOrder['PRICE']!=$_POST['PaymentAmount'])
			$result['code']=11;
	}else{
		$result['code']=10;
	}
	if($arOrder['PAYED']=='Y'){
		$result['code']=13;
	}
}
echo json_encode($result);
?>