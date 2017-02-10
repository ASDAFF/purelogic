<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Страница не найдена");?>
<section class="st_404">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="st_404_wr">
					<img src="/img/404.png" alt="">
				</div>

			</div>
			<div class="col-md-2 col-sm-2"><a href="javascript:history.back()" class="btn_grey">Назад</a></div>
			<div class="col-md-2 col-sm-2"><a href="/" class="btn_grey">На главную</a></div>
			<div class=" col-md-6 col-sm-6 ">
				<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"404",
	Array(
		"ADD_SECTIONS_CHAIN" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => ".default",
		"COUNT_ELEMENTS" => "Y",
		"IBLOCK_ID" => "5",
		"IBLOCK_TYPE" => "1c_catalog",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array(0=>"",1=>"",),
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(0=>"",1=>"",),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "4",
		"VIEW_MODE" => "LIST"
	)
);?>
			</div>
			<div class="col-md-2 col-sm-2">
				<a href="#" class="btn_grey go_to404">Перейти</a>
			</div>
		</div>
	</div>
</section>	
<script>
jQuery(document).ready(function(){
jQuery(".go_to404").attr("href",jQuery("#go_404 option:selected").val());
jQuery("#go_404").change(function(){

jQuery(".go_to404").attr("href",jQuery(this).find("option:selected").val());
});
});
</script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>