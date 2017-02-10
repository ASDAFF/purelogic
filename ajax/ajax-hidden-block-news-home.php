<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
session_start();
$_SESSION['news_hidden_home'] = $_GET['news'];
