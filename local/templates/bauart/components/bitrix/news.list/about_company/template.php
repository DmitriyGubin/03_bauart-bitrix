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

// echo '<pre>'.print_r($data,1).'<pre>';

?>
<p class="about_company">
	<?= $arResult["ITEMS"][0]['PROPERTIES']['ADDITIONAL_TEXT']['VALUE']['TEXT']; ?>
</p>

<div class="about_company_numbers">
	<div class="blokk">
		<h2>
			<?= $arResult["ITEMS"][0]['PROPERTIES']['NUMBER_HOUSES']['VALUE']; ?>
		</h2>
		<span>домов</span>
		<p>построено <br> для вас!</p>
	</div>

	<div class="blokk">
		<h2>
			<?= $arResult["ITEMS"][0]['PROPERTIES']['NUMBER_YEARS']['VALUE']; ?>
		</h2>
		<span>года</span>
		<p>плодотворной <br> работы</p>
	</div>

	<div class="blokk">
		<h2>
			<?= $arResult["ITEMS"][0]['PROPERTIES']['NUMBER_PROJECTS']['VALUE']; ?>
		</h2>
		<span>проектов</span>
		<p>домов <br> под заказ</p>
	</div>

	<div class="blokk">
		<h2>
			<?= $arResult["ITEMS"][0]['PROPERTIES']['NUMBER_EMPLOYEES']['VALUE']; ?>
		</h2>
		<span>экспертов</span>
		<p>работает в <br> нашей компании</p>
	</div>
</div>
</div>

<div class="order">
	<div>
		<h2>Планируете строительство дома?</h2>
		<p>
			Мы готовы помочь вам с ответом и выбором оптимальной конфигурации вашего проекта. Для этого заполните простую форму и мы свяжемся с вами в ближайшее время.
		</p>
		<button class="buttonn pop_up_order">Оставить заявку</button>
	</div> 
</div>
