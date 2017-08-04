<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");

$arFields = array();

$order_props = CSaleOrderPropsValue::GetOrderProps(82);
while ($arProps = $order_props->Fetch())
{
    if($arProps["TYPE"] == "FILE"){
        $arFile = array();
        foreach(unserialize($arProps['VALUE']) as $file){
            $arFile[] = SITE_SERVER_NAME.CFile::GetPath($file);
        }
        $arFields[$arProps['CODE']] = implode("<br>", $arFile);
    }else{
        $arFields[$arProps['CODE']] = $arProps['VALUE'];
    }
}

var_dump($arFields);

?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>