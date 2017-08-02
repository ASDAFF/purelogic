<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<div class="search_table">
<?

if(!empty($arResult["SECTIONS"])){
	foreach($arResult["SECTIONS"] as $section):?>

	<div class="table_td_wr">

		<div class="col-md-6 name_search " data-label="Название">
			<a href="<?= $section["SECTION_PAGE_URL"]; ?>"><?= $section["NAME"]; ?></a>
		</div>

	</div>
	<?endforeach;?>



<?
}else {

	if (!empty($arResult['ITEMS'])) {
		foreach ($arResult["ITEMS"] as $arItem) {

			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
			$strMainID = $this->GetEditAreaId($arItem['ID']);
			?>

			<div class="table_td_wr">

				<?

				?>

				<div class="col-md-1 padding-left_0"
					 data-label="Код"><?= $arItem["PROPERTIES"]["CML2_ARTICLE"]["VALUE"]; ?></div>
				<div class="col-md-2 " style="text-align:center" data-label="Инфо">
					<div class="quest">
						<div class="im_quest"></div>
						<div class="text_quest for_search">
							<div class="text_for_quest"><?= $arItem["PREVIEW_TEXT"]; ?>
							</div>
							<div class="img_for_text"
								 style="background:url('<?= $arItem["PREVIEW_PICTURE"]["SRC"]; ?>')no-repeat;"></div>

						</div>
					</div>
				</div>
				<div class="col-md-6 name_search " data-label="Название"><a
						href="<?= $arItem["DETAIL_PAGE_URL"]; ?>"><?= $arItem["NAME"]; ?></a></div>


				<div class="col-md-2 "
					 data-label="Стоимость"> <?= $arItem["MIN_PRICE"]["PRINT_DISCOUNT_VALUE_VAT"]; ?></div>

				<div class="col-md-1 padding_right_0" data-label="Кол">
					<div class="add_in_card" style="float:right;">
						<form action="" method="get" class="add_in_card">
							<input type="text" name="quantity" value="1">
							<input type="submit" value="">
							<input name="action" type="hidden" value="ADD2BASKET">
							<input type="hidden" name="id" value="<?= $arItem["ID"]; ?>">
						</form>

					</div>
				</div>


			</div>
		<?
		} ?>
		<?= $arResult["NAV_STRING"] ?><?
	}
}
?>
</div>