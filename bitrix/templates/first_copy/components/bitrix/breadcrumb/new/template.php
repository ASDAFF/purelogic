<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '';

//we can't use $APPLICATION->SetAdditionalCSS() here because we are inside the buffered function GetNavChain()
$css = $APPLICATION->GetCSSArray();


$strReturn .= '<ul id="breadcrumbs-two">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);

	$nextRef = ($index < $itemSize-2 && $arResult[$index+1]["LINK"] <> ""? ' itemref="bx_breadcrumb_'.($index+1).'"' : '');
	$child = ($index > 0? ' itemprop="child"' : '');
	$arrow = ($index > 0? '' : '');

	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
	$str_sec="";
	$cl_go="";
	if(CSite::InDir('/catalog/')){
	$arFilter = array('IBLOCK_ID' =>18,"NAME"=>$title); // выберет потомков без учета активности
   $rsSect = CIBlockSection::GetList(array('left_margin' => 'asc'),$arFilter,false,Array(
             'ID',
             'IBLOCK_SECTION_ID',
			 'DEPTH_LEVEL'
          ));
  if ($arSect = $rsSect->GetNext())
   {
  
       $cl_go="inside";
	   $arFilter1 = array('IBLOCK_ID' =>18,"SECTION_ID"=>$arSect["ID"],"DEPTH_LEVEL"=>$arSect["DEPTH_LEVEL"]+1); // выберет потомков без учета активности
   $rsSect1 = CIBlockSection::GetList(array('left_margin' => 'asc'),$arFilter1,false,Array(
             'ID',
             'IBLOCK_SECTION_ID',
			 'NAME',
			 'SECTION_PAGE_URL'
          ));
		  $str_sec='<div class="mm_br no">';
	   while($arSect1 = $rsSect1->GetNext())
   {
   $str_sec.='<div><a href="'.$arSect1["SECTION_PAGE_URL"].'">'.$arSect1["NAME"].'</a></div>';
   
   }
	   $str_sec.='</div><span class="open_brd">&#9660;</span>';
   }
	
	}
		$strReturn .= '
			<li  id="bx_breadcrumb_'.$index.'" class="'.$cl_go.'" itemscope="" >
				
				<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="url">
					'.$title.'
				</a>'.$str_sec.'
			</li>';
	}
	else
	{
		$strReturn .= '
			<li>
				
				<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="url">'.$title.'</a>
			</li>';
	}
}

$strReturn .= '</ul>';

return $strReturn;
