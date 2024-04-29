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

//debug($arResult["ITEMS"][0]);

?>
<!-- Для мобильной версии -->
<div class="mobile_head" style="display: none">
    <div class="phone_plus_menu">
        <img alt="#" id="show_menu" src="<?=SITE_TEMPLATE_PATH?>/img/menu.png">
        <div class="phone">
            <a href="tel:<?= $arResult["ITEMS"][0]['PROPERTIES']['PHONE']['VALUE']; ?>" style="text-decoration: none; color: black;">
                <h2><?= $arResult["ITEMS"][0]['PROPERTIES']['PHONE']['VALUE']; ?></h2>
            </a>
            <p><?= $arResult["ITEMS"][0]['PROPERTIES']['CITY']['VALUE']; ?></p>
        </div>
    </div>
</div>
<!-- Для мобильной версии -->

<div class="wrapp_right_picture">
    <div class="right_area_first_line">

        <ul class="nav_chain">
            <li> <a href="/">Главная&#8194;❯&#8194;</a> </li>
            <li> <a href="#">О компании</a> </li>
        </ul>

        <div class="phone_plus_menu desctop_head">
            <div class="phone">
                <a href="tel:<?= $arResult["ITEMS"][0]['PROPERTIES']['PHONE']['VALUE']; ?>" style="text-decoration: none; color: black;">
                    <h2><?= $arResult["ITEMS"][0]['PROPERTIES']['PHONE']['VALUE']; ?></h2>
                </a>
                <p><?= $arResult["ITEMS"][0]['PROPERTIES']['CITY']['VALUE']; ?></p>
            </div>
        </div>
    </div>

    <h1 class="head_title">О компании</h1>

    <h2 class="head_sub_title">
        <?= $arResult["ITEMS"][0]['PREVIEW_TEXT']; ?> 
    </h2>

    <p>
      <?= $arResult["ITEMS"][0]['DETAIL_TEXT']; ?>
    </p>
</div>


<div class="wrapp_right_picture">
    <img alt="#" class="desctop_img" src="<?= $arResult["ITEMS"][0]['PREVIEW_PICTURE']['SRC']; ?>">
    <img alt="#" class="mobile_img" src="<?=\CFile::GetPath($arResult["ITEMS"][0]['PROPERTIES']['MOBILE_PICTURE']['VALUE'])?>">


</div> 