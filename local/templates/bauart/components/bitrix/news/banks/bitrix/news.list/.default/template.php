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
//CREDIT_CONDITIONS
//PROPERTIES--CREDIT_CONDITIONS--VALUE
?>

<!--  slick-slider -->
<script type="text/javascript">
	$(document).ready(function(){

		$('.single-item').slick();
	});
</script>
<!--  slick-slider -->

<div class="ipoteka">
	<h2 class="titlee modify_tytle">Ипотека на строителсьтво <br> и приобретение готовых домов</h2>
	<div class="ipoteka_list desctop-ipoteka-list">
		<?foreach($arResult["ITEMS"] as $arItem):?>	
		<div class="ipoteka_block">
			<div>
				<img alt="#" src="<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>">
				<h2><?= $arItem['NAME']; ?></h2>
				<h2><?= 'Кредит от '.$arItem['PROPERTIES']['CREDIT_RATE']['VALUE'].' %'; ?></h2>

				<ul>
					<?foreach($arItem['PROPERTIES']['CREDIT_CONDITIONS']['VALUE'] as $arItem_list):?>
					<li><span><?= $arItem_list; ?></span></li>
				<? endforeach; ?>	
			</ul>
		</div>
		<button class="buttonn button_list">Узнать подробнее</button>
	</div>
<? endforeach; ?>	
</div>


<!-- Для мобильной версии -->
<div class="slider single-item ipoteka_list mobile-ipoteka-list" style="display: none;">
	<?foreach($arResult["ITEMS"] as $arItem):?>	

	<div class="wrapp_ipoteka">
		<div class="ipoteka_block">
			<div>
				<img alt="#" src="<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>">
				<h2><?= $arItem['NAME']; ?></h2>
				<h2><?= 'Кредит от '.$arItem['PROPERTIES']['CREDIT_RATE']['VALUE'].' %'; ?></h2>

				<ul>
					<?foreach($arItem['PROPERTIES']['CREDIT_CONDITIONS']['VALUE'] as $arItem_list):?>
						<li><span><?= $arItem_list; ?></span></li>
					<? endforeach; ?>
				</ul>
		</div>
		<button class="buttonn button_list">Узнать подробнее</button>
	</div>
</div>

	<? endforeach; ?>	
</div>
<!-- Для мобильной версии -->
</div>





