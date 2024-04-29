<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? 
use Bitrix\Main\Page\Asset; 
$asset = Asset::getInstance();
?>


<!DOCTYPE html> 
<html>
<head>
    <title><?$APPLICATION->ShowTitle();?></title>
    <? $APPLICATION->ShowHead(); ?>
    <!--  slick-slider -->
    <? $asset->addJs("https://code.jquery.com/jquery-3.6.0.js"); ?>
    <? $asset->addJs(SITE_TEMPLATE_PATH . '/js/slick.min.js'); ?>
    <? $asset->addCss(SITE_TEMPLATE_PATH . "/css/slick.css"); ?>
    <? $asset->addCss(SITE_TEMPLATE_PATH . "/css/slick-theme.css"); ?>
    <!--  slick-slider -->
    <? $asset->addCss(SITE_TEMPLATE_PATH . "/css/styles.css"); ?>
    <? $asset->addCss(SITE_TEMPLATE_PATH . "/css/media.css"); ?>
    <? $asset->addJs(SITE_TEMPLATE_PATH . '/js/scriptt.js'); ?>
    <? $asset->addJs(SITE_TEMPLATE_PATH . '/js/order.js'); ?>
    <? $asset->addJs(SITE_TEMPLATE_PATH . '/js/order_partners.js'); ?>
    <? $asset->addJs(SITE_TEMPLATE_PATH . '/js/maskedinput.js'); ?>
    <!-- Яндекс карты -->
    <? $asset->addJs(SITE_TEMPLATE_PATH . '/js/map.js'); ?>
    <? $asset->addJs("https://api-maps.yandex.ru/2.1/?apikey=2750cb15-81ed-4ea8-a8d2-e1e7c2d7e5e2&lang=ru_RU"); ?>
    <!-- Яндекс карты -->
    <? $asset->addString('<meta name="viewport" content="width=device-width, initial-scale=1">'); ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <meta charset="utf-8">
    <script type="text/javascript">
       jQuery(function($){
       $("#pop-up-phone").mask("+7(999) 999-9999");
       });
    </script>
</head>
<body>
    
    <?$APPLICATION->ShowPanel()?>
    <header class="headd" id="main_head">
        <div class="left_menu" id="left_menu_main">
            <nav>
                <div class="emblema_menu">
                    <a class="main_page_ref" href="/"><img alt="#" src="<?=SITE_TEMPLATE_PATH?>/img/2.png"></a>
                    <h2 id="hide_menu">&#10006;</h2>
                </div>

                <img alt="#" style="display: none" class="burger_menu" src="<?=SITE_TEMPLATE_PATH?>/img/menu.png">


                <div class="all_menu">

                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "top_menu_one",
                        Array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "left",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "1",
                            "MENU_CACHE_GET_VARS" => array(""),
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "top_one",
                            "USE_EXT" => "N"
                        )
                    );?>

                    <ul class="two_menu">
                        <?$APPLICATION->IncludeComponent(
                           "bitrix:catalog.section.list", 
                           "header_section", 
                           array(
                              "ADD_SECTIONS_CHAIN" => "Y",
                              "CACHE_FILTER" => "N",
                              "CACHE_GROUPS" => "Y",
                              "CACHE_TIME" => "36000000",
                              "CACHE_TYPE" => "A",
                              "COUNT_ELEMENTS" => "N",
                              "COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
                              "FILTER_NAME" => "sectionsFilter",
                              "IBLOCK_ID" => "6",
                              "IBLOCK_TYPE" => "catalog",
                              "SECTION_CODE" => "",
                              "SECTION_FIELDS" => array(
                                 0 => "",
                                 1 => "",
                             ),
                              "SECTION_ID" => $_REQUEST["SECTION_ID"],
                              "SECTION_URL" => "",
                              "SECTION_USER_FIELDS" => array(
                                 0 => "",
                                 1 => "",
                             ),
                              "SHOW_PARENT_NAME" => "Y",
                              "TOP_DEPTH" => "2",
                              "VIEW_MODE" => "TEXT",
                              "COMPONENT_TEMPLATE" => "header_section"
                          ),
                           false
                       );?>
                   </ul>


                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "top_menu_two",
                        Array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "left",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "1",
                            "MENU_CACHE_GET_VARS" => array(""),
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "top_two",
                            "USE_EXT" => "N"
                        )
                    );?>
                </div>
                
                <h3 style="display: none;">+7 (383) 312-17-49</h3>
            </nav>

            <div class="video">
                <div>
                    <a href="https://www.youtube.com/channel/UCXwg_ZmN4kmoa2jlFxHP_aw">
                        <img alt="#" src="<?=SITE_TEMPLATE_PATH?>/img/3.png">
                    </a>
                </div>
                <p>
                    Посмотрите <br> видео о компании
                </p>
            </div>
        </div>

        <div class="right_area">

            <? $APPLICATION->IncludeComponent("bitrix:main.include", "right_area", Array(
	            "AREA_FILE_SHOW" => "page",	// Показывать включаемую область
		        "AREA_FILE_SUFFIX" => "inc",	// Суффикс имени файла включаемой области
		        "EDIT_TEMPLATE" => "",	// Шаблон области по умолчанию
           ),
            false
        ); ?>

    	</div>
</header>


<div class="content">

    <!-- Попап на заявку -->
    <div class="send_order" style="display: none;">

        <div class="pop-up-form">
            <span id="close">&#10005;</span>
            <div id="form-content">
                <h2>Оставить заявку</h2>
                <p>
                    Заполните заявку и наш менеджер свяжется с вами в ближайшее время
                </p>

                <input id="pop-up-name" placeholder="Введите ваше имя*" name="namee" type="text"/>

                <input id="pop-up-phone" placeholder="Введите ваш телефон*" name="phone" type="text"/>

                <input id="house-name" type="hidden"/>

                <input id="house-price" type="hidden"/>

                <p class="below_input_text">
                    Нажимая кнопку “отправить” вы соглашаетесь с <span>Политикой Конфедициальности</span>
                </p>
                <button id="for_send" class="buttonn">Отправить</button>
            </div>

            <h2 id="succes_order" style="display: none">
                Ваши данные отправлены успешно!<br>Ожидайте звонка наших операторов.
            </h2>
        </div>
        
    </div>
    
    <!-- Попап на заявку -->



