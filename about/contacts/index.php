<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты - Purelogic R&D");
?><style>
	.text-center{text-align:center}
	.contacts ul.cont{padding-left:30px;}
	.contacts ul.cont:before{content:"";display:block;width:26px;height:26px;background-image:url(/upload/icon/contacts_icon1.png);position: relative;top: 16px;left: -30px;}
	.contacts ul.main-office:before{background-position-x: -52px;}
	.contacts ul.filials-office:before{background-position-x: -100px;}
	.contacts ul.work-time:before{background-position-x: 0px;}
	.contacts ul.phone:before{background-position-x: -77px;background-position-y:3px}
	.contacts ul.mail:before{background-position-x: -26px;}
	.contacts ul li:first-child{font-weight:600}
	.contacts .contacts-maps{position:relative}
	.contacts .contacts-maps h3{position:relative;z-index:4;color:#fff;background-color:#333133;padding:10px;margin:0px;text-align:left;width:100%}
	.contacts #user_form form .col-md-9{width:100%}
	.contacts #user_form form .col-md-9 input{z-index:1}
	.contacts .social_icon.lf_fix{margin-top: 0px;position: absolute;width: 55px;top: 3px;}
	.contacts .social_icon.lf_fix li{height: 36px;width: 36px;margin:5px 0px}
	.contacts .social_icon.lf_fix li a{width:auto;margin:0px;display:block;text-align:center;padding:4px 0px 6px 0px;color:#bcbbbc;background:none;border-color:#bcbbbc}
	.contacts .social_icon.lf_fix li a:hover{color:#94b82f;border-color:#333133}
	.contacts .right_soc_block{position:relative;width:55px;float:right;}
	.contacts .rsb{position:absolute;right:-60px;}


</style>
<div class="contacts">
<div class="rsb">
	<div class="right_soc_block">
		<ul class="social_icon lf_fix">
			<li><a href="http://vk.com/purelogic"><i class="fa fa-vk" aria-hidden="true"></i></a></li>
			<li><a href="#"><i class="fa fa-odnoklassniki" aria-hidden="true"></i></a></li>
			<li><a class="fs" href="http://www.facebook.com/pages/Purelogic-RD/537251916397242"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
			<li><a class="tw" href="http://twitter.com/PurelogicRND"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
			<li><a class="yot" href="http://www.youtube.com/channel/UCj5qToQUJQvhBaonL0DU_5A"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
			<!-- <li><a class="pen" href="http://purelogicrnd.livejournal.com/"><span class="pen_icon"></span></a></li> -->
		</ul>
	</div>
</div>
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<h1 class="text-center">Контакты</h1>
			<ul class="cont main-office">
				<li>Основной офис</li>
				<li><b>Центр инновация и развития. Производство</b></li>
				<li>394033, Россия, г.Воронеж, Ленинский проспект, 160</li>
			</ul>
			<ul class="cont filials-office">
				<li>Филиалы</li>
				<li>- Россия, г.Москва, 1-й Добрынинский переулок, дом 19, строение 6, подъезд 5, офис 1</li>
				<li>- Россия, г.Санкт-Петербург, ул.Белоостровская, д.8 (БЦ "Ильич"), экаж 4, офис 1429</li>
			</ul>
			<ul class="cont work-time">
				<li>Время работы</li>
				<li>Понедельник - четверг: 8.00 - 17.00</li>
				<li>Пятница: 8.00 - 16.00</li>
			</ul>
			<ul class="cont phone">
				<li>Телефоны</li>
				<li>+7(473) 204-51-56 (Воронеж)</li>
				<li>+7(495) 505-63-74 (Москва)</li>
				<li>+7(812) 425-17-35 (Санкт-Петербург)</li>
				<li>+8(800) 555-63-74 (Звонки по России бесплатно)</li>
			</ul>
			<ul class="cont mail">
				<li>Email</li>
				<li><a href="mailto:info@purelogic.ru">info@purelogic.ru</a></li>
			</ul>
 <br>
			<p>
				 Обязательно уточняйте наличие товаров у менеджера и согласовывайте время своего визита. Обращаем ваше внимание, что отгрузка товара самовывозом прекращается за час до окончания рабочего дня.
			</p>
		</div>
		<div class="col-xs-12 col-sm-6">
			<h1 class="text-center">Contacts</h1>
			<ul class="cont main-office">
				<li>Main office:</li>
				<li><b>Center for Innovation and Development. Production</b></li>
				<li>160, Leninsky prospect, Voronezh, Russia 394033</li>
			</ul>
			<ul class="cont filials-office">
				<li>Additional office:</li>
				<li>- office 1, proch 5, building 6, house 19, 1st Dobrininsky pereulok, Moskow, Russia</li>
				<li>- office 1429, floor 4, house 8, Beloostrovskaya st., St. Petersburg, Russia</li>
			</ul>
			<ul class="cont work-time">
				<li>Work hours:</li>
				<li>Monday to Thursday: 8.00 until 17.00</li>
				<li>Friday: 8.00 until 16.00</li>
			</ul>
			<ul class="cont phone">
				<li>Phones:</li>
				<li>+7(473) 204-51-56 (Voronezh)</li>
				<li>+7(495) 505-63-74 (Moscow)</li>
				<li>+7(812) 425-17-35 (St. Petersburg)</li>
				<li>+8(800) 555-63-74 (free calls in Russia)</li>
			</ul>
			<ul class="cont mail">
				<li>E-mail:</li>
				<li><a href="mailto:info@purelogic.ru">info@purelogic.ru</a></li>
			</ul>
			<br>
			<p>
			Purelogic R&D company has three main lines of activity:<br>
			• The full range of research and development for producing equipment and controlling systems of stepper motors and servo motors;<br>
			• CNC machines research and manufacture;<br>
			• Shipment of parts for automation systems.<br>
			</p>
		</div>
	</div>
	<br>
	<div class="row">
	<div class="col-xs-12">
	<h3 class="name_section">Быстрая связь</h3>
	<div id="user_form" class="card_company">
	<?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new", 
	".default", 
	array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"COMPONENT_TEMPLATE" => ".default",
		"EDIT_URL" => "result_edit.php",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LIST_URL" => "result_list.php",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"WEB_FORM_ID" => "2",
		"AJAX_MODE" => "Y",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?>
</div></div></div>
<br>
	<div class="row">
		<div class="col-xs-12 contacts-maps">
			<h3>Purelogic R&D - Воронеж</h3>
			 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view", 
	".default", 
	array(
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"CONTROLS" => array(
			0 => "ZOOM",
			1 => "MINIMAP",
			2 => "SCALELINE",
		),
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:51.689212500122004;s:10:\"yandex_lon\";d:39.2695851993337;s:12:\"yandex_scale\";i:16;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:39.26958519933375;s:3:\"LAT\";d:51.68921250012102;s:4:\"TEXT\";s:13:\"Purelogic R&D\";}}}",
		"MAP_HEIGHT" => "350",
		"MAP_ID" => "",
		"MAP_WIDTH" => "100%",
		"OPTIONS" => array(
			0 => "ENABLE_DBLCLICK_ZOOM",
			1 => "ENABLE_DRAGGING",
		),
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?><br>
		</div>
		<div class="col-xs-12 col-sm-6 contacts-maps">
			<h3>Purelogic R&D - Москва</h3>
			<?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view", 
	".default", 
	array(
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"CONTROLS" => array(
			0 => "ZOOM",
			1 => "MINIMAP",
			2 => "SCALELINE",
		),
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:55.725287989793664;s:10:\"yandex_lon\";d:37.619325115066516;s:12:\"yandex_scale\";i:16;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:37.6208378809509;s:3:\"LAT\";d:55.72524257741779;s:4:\"TEXT\";s:13:\"Pureligic R&D\";}}}",
		"MAP_HEIGHT" => "350",
		"MAP_ID" => "",
		"MAP_WIDTH" => "100%",
		"OPTIONS" => array(
			0 => "ENABLE_DBLCLICK_ZOOM",
			1 => "ENABLE_DRAGGING",
		),
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?>
		</div>
		<div class="col-xs-12 col-sm-6 contacts-maps">
		<h3>Purelogic R&D - Санкт-Петербург</h3>
		<?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view", 
	".default", 
	array(
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"CONTROLS" => array(
			0 => "ZOOM",
			1 => "MINIMAP",
			2 => "SCALELINE",
		),
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:59.98585684305268;s:10:\"yandex_lon\";d:30.321224084655707;s:12:\"yandex_scale\";i:16;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:30.321245542327862;s:3:\"LAT\";d:59.98600736403683;s:4:\"TEXT\";s:13:\"Purelogic R&D\";}}}",
		"MAP_HEIGHT" => "350",
		"MAP_ID" => "",
		"MAP_WIDTH" => "100%",
		"OPTIONS" => array(
			0 => "ENABLE_DBLCLICK_ZOOM",
			1 => "ENABLE_DRAGGING",
		),
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?>
		</div>
	</div>

</div>
<br>
 <br>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php")?>