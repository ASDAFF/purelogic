<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => 'Перерыв',
	"DESCRIPTION" => 'Время до перерыва',
	
	"PATH" => array(
		"ID" => "terkulov",
		"CHILD" => array(
			"ID" => "date_yo",
			"NAME" => "Имя",
			"SORT" => 10,
			"CHILD" => array(
				"ID" => "date_yo",
			),
		),
	),
);
?>