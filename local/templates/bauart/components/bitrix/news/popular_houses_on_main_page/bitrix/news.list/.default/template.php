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

<script type="text/javascript">
	BX.addCustomEvent('onAjaxSuccess', function() {
		Button_event_handler_house_list();
	});
</script>

<?/*
$popular_houses = 0;
foreach($arResult["ITEMS"] as $arItem)
{
	if($arItem['PROPERTIES']['POPULAR']['VALUE'] == 'Y')
	{
		$popular_houses++;
	}
}*/
?>

<?/* if($popular_houses > 0): */?>
	<div class="popular_houses" id="popular_houses_scroll">
		<h2 class="titlee modify_tytle">Популярные дома</h2>
		<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list", 
	"popular_houses_sections_main_page", 
	array(
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COUNT_ELEMENTS" => "N",
		"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
		"FILTER_NAME" => "sectionsFilter",
		"IBLOCK_ID" => "6",
		"IBLOCK_TYPE" => "catalog",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_URL" => "#SITE_DIR#/#SECTION_CODE_PATH#/",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "2",
		"VIEW_MODE" => "TEXT",
		"COMPONENT_TEMPLATE" => "popular_houses_sections_main_page"
	),
	false
);?>

		<div class="houses_list">
			<? foreach($arResult["ITEMS"] as $arItem): ?>
				<?/* if($arItem['PROPERTIES']['POPULAR']['VALUE'] == 'Y'): */?>
					<? if($arItem['PROPERTIES']['BEST_OFFER']['VALUE'] == 'Y'): ?>
						<div class="house_block modify_house_block">
							<div class="good_chois">
								<h2>
									Лучшее предложение
								</h2>
							</div>
							<div>
								<img alt="#" src="<?= $arItem["PREVIEW_PICTURE"]["SRC"]; ?>">
								<h2 class="house_name"><?= $arItem["NAME"]; ?></h2>
								<p>
									<?= $arItem["PREVIEW_TEXT"]; ?>
								</p>
								<p class="house_price">
									<?= number_format($arItem["PROPERTIES"]["PRICE"]["VALUE"], 0, '.', ' ').' руб.'; ?>
								</p>
							</div>
							
							<button class="button_list buttonn modify_butt_houses_list">Подробнее</button>
							
							
						</div>
					<? else: ?>
							<div class="house_block">
								<div>
									<img alt="#" src="<?= $arItem["PREVIEW_PICTURE"]["SRC"]; ?>">
									<h2 class="house_name"><?= $arItem["NAME"]; ?></h2>
									<p>
										<?= $arItem["PREVIEW_TEXT"]; ?>
									</p>
									<p class="house_price">
										<?= number_format($arItem["PROPERTIES"]["PRICE"]["VALUE"], 0, '.', ' ').' руб.'; ?>
									</p>
								</div>
								<button class="button_list buttonn modify_butt_houses_list">Подробнее</button>
							</div>
					<? endif; ?>
				<?/* endif; */?>
			<? endforeach; ?>
		</div>

		<a class="all_popular_proj" href="/#popular_houses_scroll" style="display: block;">
			Все популярные проекты &#8194; &#10095;
		</a>
		<div style="margin-top: 20px;">
			<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
				<?=$arResult["NAV_STRING"]?>
			<?endif;?>	
		</div>
	</div>

<?/*endif;*/?>

