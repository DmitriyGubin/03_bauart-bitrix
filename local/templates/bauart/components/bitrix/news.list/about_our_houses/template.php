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
//debug($arResult['ITEMS']);
?>

<div class="about_our_houses" id="about_our_houses_scroll">
	<div class="textt">
		<div>
			<h2 class="titlee">О наших домах</h2>
			<p>
				<?= $arResult["ITEMS"][0]['PREVIEW_TEXT']; ?>
			</p>

			<div class="hidden">
				<img alt="#" style="display: none;" class="img_1" src="<?=\CFile::GetPath($arResult["ITEMS"][0]['PROPERTIES']['OUR_HOUSES_GALLERY_MOBILE']['VALUE'][0])?>"/>
				<div class="righttt">
					<img alt="#" style="display: none;" class="img_2" src="<?=\CFile::GetPath($arResult["ITEMS"][0]['PROPERTIES']['OUR_HOUSES_GALLERY_MOBILE']['VALUE'][1])?>"/>
					<img alt="#" style="display: none;" class="img_3" src="<?=\CFile::GetPath($arResult["ITEMS"][0]['PROPERTIES']['OUR_HOUSES_GALLERY_MOBILE']['VALUE'][2])?>"/>
				</div>
			</div>

			<p>
				<?= $arResult["ITEMS"][0]['DETAIL_TEXT']; ?>
			</p>
		</div>
	</div>

	<div class="houses">
		<div>
			<img alt="#" src="<?=\CFile::GetPath($arResult["ITEMS"][0]['PROPERTIES']['OUR_HOUSES_GALLERY_DESCTOP']['VALUE'][0])?>" style="height: calc(100%/728*507);">
			<img src="<?=\CFile::GetPath($arResult["ITEMS"][0]['PROPERTIES']['OUR_HOUSES_GALLERY_DESCTOP']['VALUE'][1])?>" style="height: calc(100%/728*191);">
		</div>

		<div>
			<img alt="#" src="<?=\CFile::GetPath($arResult["ITEMS"][0]['PROPERTIES']['OUR_HOUSES_GALLERY_DESCTOP']['VALUE'][2])?>" style="height: calc(100%/728*191);">
			<img alt="#" src="<?=\CFile::GetPath($arResult["ITEMS"][0]['PROPERTIES']['OUR_HOUSES_GALLERY_DESCTOP']['VALUE'][3])?>" style="height: calc(100%/728*507);">
		</div>
	</div>
</div>
