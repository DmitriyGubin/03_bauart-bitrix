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
//debug($arResult["ITEMS"]);
?>

<div class="townships" id="townships_scroll">
	<h2 class="titlee modify_tytle" style="margin-top: 60px">Поселки, которые мы рекомендуем</h2>
	<div>
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<a href="<?= $arItem['PROPERTIES']['TOWNSHIP_REF']['VALUE']; ?>">
				<img alt="#" src="<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>">
			</a>
		<?endforeach; ?>
	</div>
</div>

