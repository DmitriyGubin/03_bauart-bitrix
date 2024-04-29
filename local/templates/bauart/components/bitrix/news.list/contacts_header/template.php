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

//echo '<pre>'.print_r($arResult["ITEMS"],1).'<pre>';

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

<?
    if(CModule::IncludeModule("iblock"))
    { 
         
        $arSelect = Array("ID", "IBLOCK_ID","PROPERTY_*");//IBLOCK_ID и ID обязательно должны быть указаны

        $arFilter = Array("IBLOCK_ID"=>5, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");

        $res = CIBlockElement::GetList(
            Array(), //сортировка данных
            $arFilter, //фильтр данных
            false, //группировка данных
            false, // постраничная навигация
            $arSelect
        );

        $ob = $res->GetNextElement();
        $arResult_contacts[] = $ob->GetProperties();

        //echo '<pre>'.print_r($arResult_contacts[0]['PHONE']['VALUE'],1).'</pre>';
    }
?>

<!-- Для мобильной версии -->
<div class="mobile_head" style="display: none;">
    <div class="phone_plus_menu">
        <img id="show_menu" src="<?=SITE_TEMPLATE_PATH?>/img/menu.png">
        <div class="phone">
            <a href="tel:<?=$arResult_contacts[0]['PHONE']['VALUE']?>" style="text-decoration: none; color: black;">
                <h2><?=$arResult_contacts[0]['PHONE']['VALUE']?></h2>
            </a>
            <p><?=$arResult_contacts[0]['CITY']['VALUE']?></p>
        </div>
    </div>
</div>
<!-- Для мобильной версии -->

<div class="wrap_text">
    <div class="right_area_first_line">

        <ul class="nav_chain">
            <li> <a href="/">Главная&#8194;❯&#8194;</a> </li>
            <li> <a href="/about/">О компании&#8194;❯&#8194;</a> </li>
            <li> <a href="#">Контакты</a> </li>
        </ul>

        <div class="phone_plus_menu desctop_head">
            <!-- <img id="show_menu" src="img/menu.png"> -->
            <div class="phone">
                 <a href="tel:<?=$arResult_contacts[0]['PHONE']['VALUE']?>" style="text-decoration: none; color: black;">
                    <h2><?=$arResult_contacts[0]['PHONE']['VALUE']?></h2>
                </a>
                <p><?=$arResult_contacts[0]['CITY']['VALUE']?></p>
            </div>
        </div>
    </div>

    <h1 class="head_title desctop">Мы ждём вас в нашем офисе!</h1>
    <h2 class="head_title mobile">Ждём вас в офисе</h2>
    <div class="contacts_text">
        <div class="sales_department">
            <p class="boldd">Отдел продаж в Новосибирске:</p>
            <? foreach ($arResult["ITEMS"] as $arItem): ?>
                <div class="adress_plus_coordinate">
                    <p> <?= $arItem['PROPERTIES']['ADRESS']['VALUE']; ?></p>
                    <!-- <a href="#yndex_map">&nbsp;&#128269;</a> -->
                    <a href="#yndex_map">&nbsp;<i style="color: #4e7144;" class="fa fa-location-dot"></i></a>
                    <span style="display: none;"><?= $arItem['PROPERTIES']['COORDINATES']['VALUE']; ?></span>
                </div>
            <? endforeach; ?>
        </div>

        <div class="phones">
            <p class="boldd">Телефоны для связи:</p>
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
