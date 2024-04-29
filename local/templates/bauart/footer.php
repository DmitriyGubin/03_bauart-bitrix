<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>



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


</div>
    <footer class="footerr">
        <div class="content">
            <div class="left_info">
                <img alt="#" class="emblema" src="<?=SITE_TEMPLATE_PATH?>/img/2.png">
                <div>
                    <a href="https://vk.com/bauartesthetics">
                        <img alt="#" src="<?=SITE_TEMPLATE_PATH?>/img/20.png">
                    </a>

                    <a href="https://t.me/bauartesthetics">
                        <img alt="#" src="<?=SITE_TEMPLATE_PATH?>/img/21.png">
                    </a>
                    
                    <a href="https://www.youtube.com/channel/UCXwg_ZmN4kmoa2jlFxHP_aw">
                        <img alt="#" src="<?=SITE_TEMPLATE_PATH?>/img/22.png">
                    </a>
                </div>
                <p>
                    Вся представленая информация носит информационный характер.
                </p>

            </div>

            <nav>
            	<ul class="footer_menu_one">
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

                <?php if ($_SERVER['REQUEST_URI'] == '/'): ?>
                    <ul class="footer_menu_two scroll_menuu">
                        <li> <a href="#about_company_scroll">О компании</a> </li>
                        <li> <a href="#about_our_houses_scroll">О наших домах</a> </li>
                        <li> <a href="#popular_houses_scroll">Популярные дома</a> </li>
                        <li> <a href="#townships_scroll">Посёлки</a> </li>
                        <li> <a href="#contacts_scroll">Контакты</a> </li>
                    </ul>
                <?php else: ?>
                    <ul class="footer_menu_two">
                        <li> <a href="/#about_company_scroll">О компании</a> </li>
                        <li> <a href="/#about_our_houses_scroll">О наших домах</a> </li>
                        <li> <a href="/#popular_houses_scroll">Популярные дома</a> </li>
                        <li> <a href="/#townships_scroll">Посёлки</a> </li>
                        <li> <a href="/#contacts_scroll">Контакты</a> </li>
                    </ul>
                <?php endif; ?>

            </nav>

            <div class="contactt">
                <div>
                  <a href="tel:<?=$arResult_contacts[0]['PHONE']['VALUE']?>" style="text-decoration: none; color: black;">
                    <h2><?=$arResult_contacts[0]['PHONE']['VALUE']?></h2>
                  </a>
                    <p><?=$arResult_contacts[0]['CITY']['VALUE']?></p>
                </div>
            </div>
        </div> 
    </footer>
</body>
</html> 