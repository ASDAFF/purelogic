<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?>
<div class="advensed_fiback">
<h3 class="name_section">Обратная связь</h3>	
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius impedit non voluptas magni accusantium optio ducimus laborum, cumque ab iusto cum eligendi placeat, dicta libero? Voluptates consequatur, minima consequuntur beatae atque doloribus quasi unde a alias fugit, architecto odit facilis laborum sequi laudantium doloremque facere illo in. Deleniti error ipsa perferendis architecto non alias voluptas, beatae quam amet. Voluptates doloribus maxime aliquam nesciunt cumque nihil aspernatur sequi quod unde provident illo quaerat ea repellat placeat, ipsum doloremque vel deleniti rem officiis hic facilis! Magnam molestias, tempore. Inventore impedit, esse officiis quasi voluptates eos deserunt eveniet minus praesentium dolorem incidunt quod illum sequi molestiae, consectetur dolor cumque nesciunt, temporibus laudantium quaerat cupiditate ratione soluta nam libero enim! Ut incidunt sed unde officiis provident eveniet, praesentium nesciunt quas rem quae dicta, iusto neque. Quas distinctio sequi, molestias vel aliquam eligendi, deleniti facilis. Vero perspiciatis iure beatae accusantium omnis cupiditate distinctio fuga doloribus reiciendis. Odit beatae tenetur, amet enim. Molestias accusantium veritatis nisi natus laudantium, aperiam omnis. Obcaecati sit explicabo quibusdam laboriosam, totam similique, beatae ad nulla autem expedita maxime magnam quia dignissimos dolor. Deserunt ipsum culpa veniam atque nemo reprehenderit, dolorum ullam eligendi quas libero modi et voluptates sint rerum, consectetur nostrum.</p>
					<div id="user_form">
					<div class="col-md-12">
							<p>Поля, отмеченные звездочкой, обязательны для заполнения</p>
						</div>
					<?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new",
	".default",
	Array(
		"AJAX_MODE" => "Y",
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
		"VARIABLE_ALIASES" => array("WEB_FORM_ID"=>"WEB_FORM_ID","RESULT_ID"=>"RESULT_ID",),
		"WEB_FORM_ID" => "3"
	)
);?>
					</div>
				</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>