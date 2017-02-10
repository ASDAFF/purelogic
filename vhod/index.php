<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Вход на сайт");
?>


<?



?>

<?$APPLICATION->IncludeComponent(
	"bitrix:system.auth.form",
	"forg",
	Array(
"SHOW_ERRORS" => "Y",
"AJAX_MODE" => "N",  // режим AJAX
"AJAX_OPTION_SHADOW" => "N", // затемнять область
"AJAX_OPTION_JUMP" => "N", // скроллить страницу до компонента
"AJAX_OPTION_STYLE" => "Y", // подключать стили
"AJAX_OPTION_HISTORY" => "N",
	)
);
 
?>

<?
$APPLICATION->IncludeComponent(
	"bitrix:system.auth.forgotpasswd",
	"",
	Array(

	)
);
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>