<? if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
$arComponentParameters = array(
	"PARAMETERS" => array(
	
	"WHEN" => array(
			"PARENT" => "BASE",
			"NAME" => "Время до начала",
			"TYPE" => "STRING",
			"DESCRIPTION"=>"Время начала шаблон - 00:00",
			"DEFAULT" => "12:00"
		),
		"TIME" => array( 
			"PARENT" => "BASE",
			"NAME" => "Сколько идет",
			"TYPE" => "STRING",
			"DESCRIPTION"=>"Количество часов и минут перерыва - 00:00",
			"DEFAULT" => "01:30"
		),
	),
);
?>