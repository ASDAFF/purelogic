<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты - Purelogic R&D");
?><style>
	.text-center{text-align:center}
	.contacts ul li:first-child{font-weight:600}
</style>
<div class="container contacts">
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<h1 class="text-center">Контакты</h1>
			<ul class="main-office">
				<li>Основной офис</li>
				<li>Центр инновация и развития. Производство</li>
				<li>394033, Россия, г.Воронеж, Ленинский проспект, 160</li>
			</ul>
			<ul class="filials-office">
				<li>Филиалы</li>
				<li>- Россия, г.Москва, 1-й Добрынинский переулок, дом 19, строение 6, подъезд 5, офис 1</li>
				<li>- Россия, г.Санкт-Петербург, ул.Белоостровская, д.8 (БЦ "Ильич"), экаж 4, офис 1429</li>
			</ul>
			<ul class="work-time">
				<li>Время работы</li>
				<li>Понедельник - четверг: 8.00 - 17.00</li>
				<li>Пятница: 8.00 - 16.00</li>
			</ul>
			<ul class="phone">
				<li>Телефоны</li>
				<li>+7(473) 204-51-56 (Воронеж)</li>
				<li>+7(495) 505-63-74 (Москва)</li>
				<li>+7(812) 425-17-35 (Санкт-Петербург)</li>
				<li>+8(800) 555-63-74 (Звонки по России бесплатно)</li>
			</ul>
			<ul class="mail">
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
			<ul class="main-office">
				<li>Main office:</li>
				<li>Center for Innovation and Development. Production</li>
				<li>160, Leninsky prospect, Voronezh, 394033, Russia</li>
			</ul>
			<ul class="filials-office">
				<li>Additional office:</li>
				<li>- office 1, proch 5, building 6, house 19, 1st Dobrininsky pereulok, Moskow, Russia</li>
				<li>- office 1429, floor 4, house 8, Beloostrovskaya st., St. Petersburg, Russia</li>
			</ul>
			<ul class="work-time">
				<li>Work hours:</li>
				<li>Monday to Thursday: 8.00 until 17.00</li>
				<li>Friday: 8.00 until 16.00</li>
			</ul>
			<ul class="phone">
				<li>Phones:</li>
				<li>+7(473) 204-51-56 (Voronezh)</li>
				<li>+7(495) 505-63-74 (Moscow)</li>
				<li>+7(812) 425-17-35 (St. Petersburg)</li>
				<li>+8(800) 555-63-74 (free calls in Russia)</li>
			</ul>
			<ul class="mail">
				<li>E-mail:</li>
				<li><a href="mailto:info@purelogic.ru">info@purelogic.ru</a></li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view", 
	".default", 
	array(
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"CONTROLS" => array(
			0 => "ZOOM",
			1 => "MINIMAP",
			2 => "TYPECONTROL",
			3 => "SCALELINE",
		),
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:3:{s:10:\"yandex_lat\";s:7:\"55.7383\";s:10:\"yandex_lon\";s:7:\"37.5946\";s:12:\"yandex_scale\";i:10;}",
		"MAP_HEIGHT" => "350",
		"MAP_ID" => "",
		"MAP_WIDTH" => "100%",
		"OPTIONS" => array(
			0 => "ENABLE_SCROLL_ZOOM",
			1 => "ENABLE_DBLCLICK_ZOOM",
			2 => "ENABLE_DRAGGING",
		),
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?><br>
		</div>
		<div class="col-xs-12 col-sm-6">
<?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view", 
	".default", 
	array(
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"CONTROLS" => array(
			0 => "ZOOM",
			1 => "MINIMAP",
			2 => "TYPECONTROL",
			3 => "SCALELINE",
		),
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:3:{s:10:\"yandex_lat\";s:7:\"55.7383\";s:10:\"yandex_lon\";s:7:\"37.5946\";s:12:\"yandex_scale\";i:10;}",
		"MAP_HEIGHT" => "350",
		"MAP_ID" => "",
		"MAP_WIDTH" => "100%",
		"OPTIONS" => array(
			0 => "ENABLE_SCROLL_ZOOM",
			1 => "ENABLE_DBLCLICK_ZOOM",
			2 => "ENABLE_DRAGGING",
		),
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?>
		</div>
		<div class="col-xs-12 col-sm-6">
<?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view", 
	".default", 
	array(
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"CONTROLS" => array(
			0 => "ZOOM",
			1 => "MINIMAP",
			2 => "TYPECONTROL",
			3 => "SCALELINE",
		),
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:3:{s:10:\"yandex_lat\";s:7:\"55.7383\";s:10:\"yandex_lon\";s:7:\"37.5946\";s:12:\"yandex_scale\";i:10;}",
		"MAP_HEIGHT" => "350",
		"MAP_ID" => "",
		"MAP_WIDTH" => "100%",
		"OPTIONS" => array(
			0 => "ENABLE_SCROLL_ZOOM",
			1 => "ENABLE_DBLCLICK_ZOOM",
			2 => "ENABLE_DRAGGING",
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