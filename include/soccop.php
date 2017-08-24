<p class="podpis" style="margin-top: 5px;">Горячая линия: 8(800) 555-63-74</p>
<ul class="social_icon" style="margin-top: 18px;">
	<li><a class="vk" href="http://vk.com/purelogic">
	<div class="vk_icon">
	</div>
 </a></li>
	<li><a class="ok" href="#">
	<div class="ok_icon">
	</div>
 </a></li>
	<li><a class="fs" href="http://www.facebook.com/pages/Purelogic-RD/537251916397242"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
	<li><a class="tw" href="http://twitter.com/PurelogicRND"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
	<li><a class="yot" href="http://www.youtube.com/channel/UCj5qToQUJQvhBaonL0DU_5A"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
	 <!-- <li><a class="pen" href="http://purelogicrnd.livejournal.com/"><span class="pen_icon"></span></a></li> -->
</ul>
 <?
				if (!function_exists('EditData')) {function EditData ($DATA) // конвертирует формат даты с 04.11.2008 в 04 Ноября, 2008
{
$MES = array( 
"01" => "Января", 
"02" => "Февраля", 
"03" => "Марта", 
"04" => "Апреля", 
"05" => "Мая", 
"06" => "Июня", 
"07" => "Июля", 
"08" => "Августа", 
"09" => "Сентября", 
"10" => "Октября", 
"11" => "Ноября", 
"12" => "Декабря"
);
$arData = explode(".", $DATA); 
$d = ($arData[0] < 10) ? substr($arData[0], 1) : $arData[0];

$newData = $d." ".$MES[$arData[1]].", ".$arData[2]; 
return $newData;
}
				
				}
				?>
<p class="podpis" style="margin-top: 5px;">
	 Сейчас <?echo EditData(date(CDatabase::DateFormatToPHP(CSite::GetDateFormat("FULL")), time()));?>
</p>
 <?$APPLICATION->IncludeComponent(
	"terkulov:date_yo",
	".default",
	Array(
		"COMPONENT_TEMPLATE" => ".default",
		"TIME" => "01:30",
		"WHEN" => "12:00"
	),
false,
Array(
	'ACTIVE_COMPONENT' => 'N'
)
);?>
<p class="podpis" style="margin-top: 0px;">
	 © Purelogic R&amp;D, 2005-2017
</p>