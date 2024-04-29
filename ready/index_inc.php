<?php 

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
        <img alt="#" id="show_menu" src="img/menu.png">
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
            <li> <a href="#">Готовые дома</a> </li>
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

    <div class="head_title">
        <h1>Коттеджи в продаже</h1>
    </div>
</div>

<!-- <img alt="#" class="wrapp_img" src="img/27.jpg"> -->
<div class="right_fon">
    <img alt="#" src="img/27.jpg">
    <div class="content-box">
        <div>
            <h2>Строительство домов <br> из кирпича</h2>
            <p>от 31 000 руб/м²</p>
            <button class="buttonn pop_up_order">Подробнее</button>
        </div>
    </div>
</div>