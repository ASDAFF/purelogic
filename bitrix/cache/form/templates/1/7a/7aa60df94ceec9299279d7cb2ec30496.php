<?
if($INCLUDE_FROM_CACHE!='Y')return false;
$datecreate = '001486722945';
$dateexpire = '001489314945';
$ser_content = 'a:2:{s:7:"CONTENT";s:0:"";s:4:"VARS";a:1:{s:13:"FORM_TEMPLATE";s:502:"<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?=$FORM->ShowFormHeader();?><?=$FORM->ShowFormErrors()?><?=$FORM->ShowFormNote()?> 
<div class="col-md-6"> 						<?=$FORM->ShowInput(\'name\')?> 						<?=$FORM->ShowInput(\'tovar\')?> 					</div>
 					 
<div class="col-md-6"> 						<?=$FORM->ShowInput(\'phone\')?> 						 
 <?=$FORM->ShowCaptchaField()?> 						<?=$FORM->ShowCaptchaImage()?> 	
 					 <?=$FORM->ShowSubmitButton("","")?> 					</div>
 <?=$FORM->ShowFormFooter();?>";}}';
return true;
?>