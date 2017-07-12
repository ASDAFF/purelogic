<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?if(CModule::IncludeModule("iblock") && CModule::IncludeModule("sale") && CModule::IncludeModule("catalog"))
{
    $arFields = array(
        "QUANTITY" => $_GET["count"]
    );

    if(CSaleBasket::Update($_GET["id"], $arFields))
    {
        echo "success";
    }
    else
    {
        echo "error";
    }
}
else
{
    echo "error";
}?>