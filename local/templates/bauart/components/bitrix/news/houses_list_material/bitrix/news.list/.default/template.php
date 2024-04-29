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
//debug($arResult);
?>


<div class="popular_houses">
	<div class="houses_list">
	<? foreach($arResult["ITEMS"] as $arItem): ?>
		
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
						<p><?= $arItem["PREVIEW_TEXT"]; ?></p>
						<p class="house_price"><?= number_format($arItem["PROPERTIES"]["PRICE"]["VALUE"], 0, '.', ' ').' руб.'; ?></p>
					</div>
					<button class="button_list buttonn modify_butt_houses_list">Подробнее</button>
				</div>

			<? else: ?>

				<div class="house_block">
					<div>
						<img alt="#" src="<?= $arItem["PREVIEW_PICTURE"]["SRC"]; ?>">
						<h2 class="house_name"><?= $arItem["NAME"]; ?></h2>
						<p><?= $arItem["PREVIEW_TEXT"]; ?></p>
						<p class="house_price"><?= number_format($arItem["PROPERTIES"]["PRICE"]["VALUE"], 0, '.', ' ').' руб.'; ?></p>
					</div>
					<button class="button_list buttonn modify_butt_houses_list">Подробнее</button>
				</div>
			<? endif; ?>
		
	<? endforeach; ?>
	</div>
	<div style="margin-top: 20px;">
		<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
			<?=$arResult["NAV_STRING"]?>
		<?endif;?>
	</div>
</div>












