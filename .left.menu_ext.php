<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$new_m=array();
foreach($aMenuLinks as $ml){

$ml[1]=$ml[1]."index.php";
$new_m[]=$ml;
}

$aMenuLinks=$new_m;
?>