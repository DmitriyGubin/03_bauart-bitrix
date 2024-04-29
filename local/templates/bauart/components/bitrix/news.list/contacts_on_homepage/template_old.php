<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);
?>

<div class="contacts" id="contacts_scroll">
	<div class="adress">
		<div>
			<h2 class="titlee">Ждем вас в офисе</h2>
			<div>
				<p>Отдел продаж в Новосибирске:</p>
				<p><?= $arResult["ITEMS"][0]['PROPERTIES']['SALES_DEPARTMENT_ADRESS_ONE']['VALUE']; ?></p>
				<p><?= $arResult["ITEMS"][0]['PROPERTIES']['SALES_DEPARTMENT_ADRESS_TWO']['VALUE']; ?></p>
				<p><?= $arResult["ITEMS"][0]['PROPERTIES']['SALES_DEPARTMENT_ADRESS_THREE']['VALUE']; ?></p>
			</div>

			<div>
				<p>Телефоны для связи:</p>
				<span class="boldd"><?= $arResult["ITEMS"][0]['PROPERTIES']['SALES_DEPARTMENT_PHONE']['VALUE']; ?></span> <span>(Отдел продаж)</span><br>
				<span class="boldd"><?= $arResult["ITEMS"][0]['PROPERTIES']['PARTNERS_AGENCIES_PHONE']['VALUE']; ?></span> <span>(Партнерам и агенствам недвижимости)</span><br>
				<span class="boldd"><?= $arResult["ITEMS"][0]['PROPERTIES']['SUPPLY_DEPARTMENT_PHONE']['VALUE']; ?></span> <span>(Отдел снабжения)</span>
			</div>
		</div>
	</div>
	<? //echo '<pre>'; print_r($arResult); echo '</pre>'; ?>
	<div class="map">
<!-- КАРТА -->



		
	
<script src="http://api-maps.yandex.ru/2.1/?apikey=<your API key>&lang=ru_RU" type="text/javascript"></script>
<script type="text/javascript">
$( document ).ready(function() {
ymaps.ready(function () {
	var map = new ymaps.Map('map', {
		center: [55.031685,82.925550],
		zoom: 12
	});
	var arPlaceMark=[];
	
<? foreach($arResult['ITEMS'] as $value_map) {
	if($value_map['PROPERTIES']['PROJECT_COORDINATES_ONE']['VALUE'] !== '') {
	$arMap[] = $value_map['PROPERTIES']['PROJECT_COORDINATES_ONE']['VALUE'];

	
	?>
			
	var myPlacemark = new ymaps.Placemark([<?=$value_map['PROPERTIES']['PROJECT_COORDINATES_ONE']['VALUE'] ?>], null, {
				hintContent: 'Содержимое всплывающей подсказки',
				balloonContent: 'Содержимое балуна'
	});

	// arPlaceMark.push({'ID':<?//=$value_map['ID']?>,'ELEMENT':myPlacemark});

	map.geoObjects.add(myPlacemark);
	/*iconImageHref: "/local/templates/rascvetay-ctweb/components/bitrix/catalog.section/projects_section/map.png", */

	<? }?>
	<?}?>


	// $('.project_items').click(function(){
	// 	var customID = $(this).data('element');
	// 	for(var i = 0;arPlaceMark.length > i;i++){
	// 		if (customID === arPlaceMark[i].ID) {
	// 		arPlaceMark[i].ELEMENT.balloon.open();
	// 		}
	// 	}

	// }); 
	
});
});

	</script>

<?// echo '<pre>'; print_r($value_map); echo '</pre>'; ?>

	<div id="map" style="width: 100%; height: 100%; position: sticky;top: 10px;"></div>



<!-- КОНЕЦ КАРТЫ -->
	</div>
</div>
















<?/*
<div class="news-list">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<p class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img
						class="preview_picture"
						border="0"
						src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
						width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
						height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
						alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
						title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
						style="float:left"
						/></a>
			<?else:?>
				<img
					class="preview_picture"
					border="0"
					src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
					width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
					height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
					alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
					title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
					style="float:left"
					/>
			<?endif;?>
		<?endif?>
		<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
			<span class="news-date-time"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
		<?endif?>
		<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><b><?echo $arItem["NAME"]?></b></a><br />
			<?else:?>
				<b><?echo $arItem["NAME"]?></b><br />
			<?endif;?>
		<?endif;?>
		<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
			<?echo $arItem["PREVIEW_TEXT"];?>
		<?endif;?>
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<div style="clear:both"></div>
		<?endif?>
		<?foreach($arItem["FIELDS"] as $code=>$value):?>
			<small>
			<?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?>
			</small><br />
		<?endforeach;?>
		<?foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
			<small>
			<?=$arProperty["NAME"]?>:&nbsp;
			<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
				<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
			<?else:?>
				<?=$arProperty["DISPLAY_VALUE"];?>
			<?endif?>
			</small><br />
		<?endforeach;?>
	</p>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
