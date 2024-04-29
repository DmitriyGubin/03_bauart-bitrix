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

//debug($arResult['ITEMS'][0]['PROPERTIES']['LIST_REQUIREMENTS']['VALUE'][1]);
?>
<script type="text/javascript">
        
        $(document).ready(function(){
         
            $('.single-item').slick({
                 dots: true
            });
        });
</script>

<div class="list">
	<h2>
		Перед разработкой индивидуального проекта учитывают:
	</h2>
	<ul>
		<?php foreach ($arResult['ITEMS'][0]['PROPERTIES']['LIST_REQUIREMENTS']['VALUE'] as $arItem): ?>
			<li><?= $arItem; ?></li>
		<?php endforeach; ?>
	</ul>
</div>

<div class="examples">
	<h2>
		Примеры визуализации при индивидуальном проектировании:
	</h2>
	<div class="img_box">
		<?php foreach ($arResult['ITEMS'][0]['DISPLAY_PROPERTIES']['VISUALIZATION_EXAMPLES']['FILE_VALUE'] as $arItem): ?>
			<img alt="#" src="<?= $arItem['SRC']; ?>">
		<?php endforeach; ?>
	</div>

	<!-- Для мобильной версии -->
	<div class="slider single-item img_box_mobile" style="display: none;">
		<?php foreach ($arResult['ITEMS'][0]['DISPLAY_PROPERTIES']['VISUALIZATION_EXAMPLES']['FILE_VALUE'] as $arItem): ?>
			<div class="wrapp_example">
				<img alt="#" src="<?= $arItem['SRC']; ?>">
			</div>
		<?php endforeach; ?>
	</div>
	<!-- Для мобильной версии -->
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