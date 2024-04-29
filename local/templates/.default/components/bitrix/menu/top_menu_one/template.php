<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<style type="text/css">
	.active_menu
	{
		color: #4e7144 !important;
		border-bottom: 2px #4e7144 solid !important;
	}
</style>

<?/* debug($arResult); */?>

<?if (!empty($arResult)):?>

	<ul class="one_menu">
		<?foreach($arResult as $arItem): ?>

			<? if($arItem["TEXT"] == 'Готовые'): ?>
				<li class="submenu_one"> 
					<a class="<?= $arItem["SELECTED"]?active_menu:null; ?>" href="<?=$arItem["LINK"]?>">Готовые</a>
					<ul class="scroll_submenu_ready">
						<?$APPLICATION->IncludeComponent(
                            "bitrix:catalog.section.list",
                            "header_section",
                            Array(
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
                                "SECTION_FIELDS" => array("",""),
                                "SECTION_ID" => $_REQUEST["SECTION_ID"],
                                "SECTION_URL" => "",
                                "SECTION_USER_FIELDS" => array("",""),
                                "SHOW_PARENT_NAME" => "Y",
                                "TOP_DEPTH" => "2",
                                "VIEW_MODE" => "TEXT"
                            )
                        );?>
					</ul>
				</li>
			<? else: ?>
				<li><a class="<?= $arItem["SELECTED"]?active_menu:null; ?>" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
			<? endif; ?>

		<?endforeach?>
	</ul>

<?endif?>

