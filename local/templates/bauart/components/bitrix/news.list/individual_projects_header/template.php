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

//debug($arResult);

?>

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

        //$arResult_contacts[0]['PHONE']['VALUE']
        //$arResult_contacts[0]['CITY']['VALUE']

    }
?>

<!-- Для мобильной версии -->
<div class="mobile_head" style="display: none">
    <div class="phone_plus_menu">
        <img alt="#" id="show_menu" src="<?=SITE_TEMPLATE_PATH?>/img/menu.png">
        <div class="phone">
            <a href="tel:<?= $arResult_contacts[0]['PHONE']['VALUE']; ?>" style="text-decoration: none; color: black;">
                <h2><?= $arResult_contacts[0]['PHONE']['VALUE']; ?></h2>
            </a>
            <p><?= $arResult_contacts[0]['CITY']['VALUE']; ?></p>
        </div>
    </div>
</div>
<!-- Для мобильной версии -->

<div class="wrapp_right_picture">
    <div class="right_area_first_line">

        <ul class="nav_chain">
            <li> <a href="/">Главная&#8194;❯&#8194;</a> </li>
            <li> <a href="#">Индивидуальные проекты</a> </li>
        </ul>

        <div class="phone_plus_menu desctop_head">
           
            <div class="phone">
                <a href="tel:<?= $arResult_contacts[0]['PHONE']['VALUE']; ?>" style="text-decoration: none; color: black;">
                    <h2><?= $arResult_contacts[0]['PHONE']['VALUE']; ?></h2>
                </a>
                <p><?= $arResult_contacts[0]['CITY']['VALUE']; ?></p>
            </div>
        </div>
    </div>

    <h1 class="head_title">Индивидуальные проекты</h1>
        <?= $arResult['ITEMS'][0]['~PREVIEW_TEXT']; ?>
    

    <h2>Стоимость разработки индивидуальных проектов</h2>

    <p style="margin-bottom: 0px;">
        <?= $arResult['ITEMS'][0]['PROPERTIES']['DEVELOPMENT_COST']['VALUE']['TEXT']; ?>
    </p>
</div>