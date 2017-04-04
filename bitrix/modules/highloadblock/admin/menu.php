<?php
IncludeModuleLangFile(__FILE__);

if (!\Bitrix\Main\Loader::includeModule('highloadblock'))
{
	return false;
}

// items
$items = array();
$res = \Bitrix\Highloadblock\HighloadBlockTable::getList(array(
			'select' => array('*', 'NAME_LANG' => 'LANG.NAME'),
			'order' => array('NAME_LANG' => 'ASC', 'NAME' => 'ASC')
	));
while ($row = $res->fetch())
{
	$items[$row['ID']] = array(
		'text' => $row['NAME_LANG'] != '' ? $row['NAME_LANG'] : $row['NAME'],
		'url' => 'highloadblock_rows_list.php?ENTITY_ID='.$row['ID'].'&lang='.LANG,
		'module_id' => 'highloadblock',
		'more_url' => Array(
			'highloadblock_row_edit.php?ENTITY_ID='.$row['ID'].'&lang='.LANG,
			'highloadblock_entity_edit.php?ID='.$row['ID'].'&lang'.LANG
		),
	);
}

// check rights
if (!$USER->isAdmin() && !empty($items))
{
	$rights = \Bitrix\HighloadBlock\HighloadBlockRightsTable::getOperationsName(array_keys($items));
	if (!empty($rights))
	{
		foreach ($items as $hlId => $item)
		{
			if (!isset($rights[$hlId]))
			{
				unset($items[$hlId]);
			}
		}
	}
	else
	{
		return false;
	}
}

// menu
if (!empty($items))
{
	return array(
		'parent_menu' => 'global_menu_content',
		'section' => 'highloadblock',
		'sort' => 350,
		'text' => GetMessage('HLBLOCK_ADMIN_MENU_TITLE'),
		'url' => 'highloadblock_index.php?lang='.LANGUAGE_ID,
		'icon' => 'highloadblock_menu_icon',
		'page_icon' => 'highloadblock_page_icon',
		'more_url' => array(
			'highloadblock_entity_edit.php',
			'highloadblock_rows_list.php',
			'highloadblock_row_edit.php'
		),
		'items_id' => 'menu_highloadblock',
		'items' => $items
	);
}
else
{
	return false;
}