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

<div class="about_company" id="about_company_scroll">
	<div class="about_company_text">
		<img alt="#" src="<?=\CFile::GetPath($arResult["ITEMS"][0]['PROPERTIES']['MAIN_PAGE_PICTURE']['VALUE'])?>">
		<div class="textt">
			<div>
				<h2 class="titlee">О компании</h2>
				<p>
					<?= $arResult["ITEMS"][0]['PREVIEW_TEXT']; ?>
				</p>
				<p>
					<?= $arResult["ITEMS"][0]['DETAIL_TEXT']; ?>
				</p>   
			</div>
		</div>
	</div>

	<div class="about_company_numbers">
		<div class="blokk">
			<h2><?= $arResult["ITEMS"][0]['PROPERTIES']['NUMBER_HOUSES']['VALUE'];?></h2>
			<span>домов</span>
			<p>построено <br> для вас!</p>
		</div>

		<div class="blokk">
			<h2><?= $arResult["ITEMS"][0]['PROPERTIES']['NUMBER_YEARS']['VALUE'];?></h2>
			<span>года</span>
			<p>плодотворной <br> работы</p>
		</div>

		<div class="blokk">
			<h2><?= $arResult["ITEMS"][0]['PROPERTIES']['NUMBER_PROJECTS']['VALUE'];?></h2>
			<span>проектов</span>
			<p>домов <br> под заказ</p>
		</div>

		<div class="blokk">
			<h2><?= $arResult["ITEMS"][0]['PROPERTIES']['NUMBER_EMPLOYEES']['VALUE'];?></h2>
			<span>экспертов</span>
			<p>работает в <br> нашей компании</p>
		</div>
	</div>
</div>

