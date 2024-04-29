<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);
?>

<style type="text/css">
    /*.adress_plus_coordinate p
    {
        cursor: pointer;
    }

    .adress_plus_coordinate p:hover
    {
        color: #4e7144;
    }*/

     .adress_plus_coordinate
    {
    	display: flex;
    	align-items: center;
    }

    .adress_plus_coordinate a
    {
    	text-decoration: none;
    }
</style>

<div class="all_coordinates" style="display: none;">
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <div>
            <p> <?= $arItem['PROPERTIES']['COORDINATES']['VALUE']; ?></p>
            <span> <?= $arItem['PROPERTIES']['ADRESS']['VALUE']; ?> </span>
        </div>
    <? endforeach; ?> 
</div>

<div class="contacts" id="contacts_scroll">
	<div class="adress">
		<div>
			<h2 class="titlee">Ждем вас в офисе</h2>
			<div>
				<p>Отдел продаж в Новосибирске:</p>
				<? foreach ($arResult["ITEMS"] as $arItem): ?>
					<div class="adress_plus_coordinate" style="margin-bottom: 0px;">
						<p style="font-weight: normal;"> <?= $arItem['PROPERTIES']['ADRESS']['VALUE']; ?></p>
						<!-- <a href="#yndex_map">&nbsp;&#128269;</a> -->
						<a href="#yndex_map">&nbsp;<i style="color: #4e7144;" class="fa fa-location-dot"></i></a>
						<span style="display: none;"><?= $arItem['PROPERTIES']['COORDINATES']['VALUE']; ?></span>
					</div>	
				<? endforeach; ?>
			</div>

			<div>
				<p>Телефоны для связи:</p>
				<? foreach ($arResult["ITEMS"] as $arItem): ?>
					<a href="tel:<?= explode(';', $arItem['PROPERTIES']['PHONE']['VALUE'])[0]; ?>" style="text-decoration: none; color: black;">
						<span class="boldd"><?= explode(';', $arItem['PROPERTIES']['PHONE']['VALUE'])[0]; ?></span> <span><?= explode(';', $arItem['PROPERTIES']['PHONE']['VALUE'])[1]; ?></span>
					</a>
					<br>
				<? endforeach; ?>
			</div>
		</div>
	</div>
	
	<div class="map">
		<div id="yndex_map" style="height: 100%; width: 100%;">
    
        </div>
	</div>
</div>
