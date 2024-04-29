<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>


<?php //debug($arResult['SECTIONS']); ?>

<?php 

	foreach ($arResult['SECTIONS'] as $arSection)
	{
		//if ($arSection['CODE'] == explode('/', $_SERVER['REQUEST_URI'])[2])
        if(strpos($_SERVER['REQUEST_URI'], $arSection['CODE']) != false)
		{
			$material = $arSection['NAME'];
			$title = $arSection['PICTURE']['DESCRIPTION'];
			$descriptionn = $arSection['DESCRIPTION'];
			$pictere = $arSection['PICTURE']['SRC'];
		}
	}

	if(CModule::IncludeModule("iblock"))
    { 
        $arFilter = Array("IBLOCK_ID"=>5, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");

        $res = CIBlockElement::GetList(
            Array(), //сортировка данных
            $arFilter, //фильтр данных
            false, //группировка данных
            false, // постраничная навигация
            Array()
        );

        $ob = $res->GetNextElement();
        $arResult_contacts[] = $ob->GetProperties();
    }
	
?>

<!-- Для мобильной версии -->
<div class="mobile_head" style="display: none">
    <div class="phone_plus_menu">
        <img alt="#" id="show_menu" src="<?=SITE_TEMPLATE_PATH?>/img/menu.png">
        <div class="phone">
            <a href="tel:<?=$arResult_contacts[0]['PHONE']['VALUE']?>" style="text-decoration: none; color: black;">
                <h2><?=$arResult_contacts[0]['PHONE']['VALUE']?></h2>
            </a>
            <p><?=$arResult_contacts[0]['CITY']['VALUE']?></p>
        </div>
    </div>
</div>
<!-- Для мобильной версии -->


<div class="right_area_text">
    <div class="right_area_first_line">

        <ul class="nav_chain">
            <li> <a href="/">Главная&#8194;❯&#8194;</a> </li>
            <li> <a href="#"><?= $material; ?></a> </li>
        </ul>
        
        <div class="phone_plus_menu desctop_head">
            <div class="phone">
                <a href="tel:<?=$arResult_contacts[0]['PHONE']['VALUE']?>" style="text-decoration: none; color: black;">
                    <h2><?=$arResult_contacts[0]['PHONE']['VALUE']?></h2>
                </a>
            	<p><?=$arResult_contacts[0]['CITY']['VALUE']?></p>
            </div>
        </div>
    </div>

    <div class="head_title">
    	<h1><?= $title; ?></h1>
    	<p><?= $descriptionn; ?></p>
    </div>
</div>


<div class="right_fon wrapp_img">
    <img alt="#" src="<?= $pictere; ?>">
    <div class="content-box">
        <div>
            <h2><?= $title; ?></h2>
            <button class="buttonn pop_up_order">Подробнее</button>
        </div>
    </div>
</div>
<!-- <img class="wrapp_img"> -->
