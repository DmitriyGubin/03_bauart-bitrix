<script type="text/javascript">
       jQuery(function($){
       $("#phonee").mask("+7(999) 999-9999");
       $("#agent_phonee").mask("+7(999) 999-9999");
       });
</script>

<?
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
        //debug($arResult_contacts);
    }
        
?>




<!-- Для мобильной версии -->
<div class="mobile_head" style="display: none">
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

<div class="wrapp_right_picture">
    <div class="right_area_first_line">

        <ul class="nav_chain">
            <li> <a href="/">Главная&#8194;❯&#8194;</a> </li>
            <li> <a href="/about/">О компании&#8194;❯&#8194;</a> </li>
            <li> <a href="#">Партнёрам</a> </li>
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

    <h1 class="head_title">Если вы хотите стать нашим партнером, заполните простую форму!</h1>
    <p class="main_filds">
        Поля отмеченные звёздочкой (*) обязательны для заполнения.
    </p>

    <form class="order_form" method="post" action="">
        <div class="form_block">
            <label for="full_name_clientt">Укажите ФИО клиента*</label>
            <br>
            <input placeholder="ФИО клиента" id="full_name_clientt" name="full_name_client" type="text"/>
        </div>

        <div class="form_block">
            <label for="phonee">Укажите телефон*</label>
            <br>
            <input placeholder="+7 (999) 999 99 99" id="phonee" name="phone" type="text"/>
        </div>

        <div class="form_block">
            <label for="agencyy">Укажите название агенства недвижимости*</label>
            <br>
            <input placeholder="Впешите название" id="agencyy" name="agency" type="text"/>
        </div>

        <div class="form_block">
            <label for="full_name_agentt">Укажите ФИО агента*</label>
            <br>
            <input placeholder="Впишите ФИО агента" id="full_name_agentt" name="full_name_agent" type="text"/>
        </div>

        <div class="form_block">
            <label for="agent_phonee">Укажите телефон агента*</label>
            <br>
            <input placeholder="+ 7 (999) 999 99 99" id="agent_phonee" name="agent_phonee" type="text"/>
        </div>

        <div class="form_block">
            <label for="emailll">Укажите e-mail агента</label>
            <br>
            <input placeholder="Впишите почту" id="emailll" name="emaill" type="email"/>
        </div>

        <div class="form_block">
            <label for="objectt">Впишите объект</label>
            <br>
            <input placeholder="Объект" id="objectt" name="object" type="text"/>
            <p>
                Отправляя эту форму, вы уведомляете БауАртЭститику 
                о клиенте агента. Оставленное вами уведомление будет
                отправлено в отдел продаж. Клиент закрпеляется за агентом
                на срок до 60 дней при бронировании и на 30 дней консультации.Заполняя данное обращение, вы <span> соглашаетесь на
                обработку персональных данных.</span>
            </p>
        </div>

        <div class="form_block">
            <label for="objectt">Комментарий</label>
            <br>
            <textarea id="comments" name="coments" placeholder="Бронь, консультация, номер паспорта"></textarea>
            <button id="send-order-partners" class="buttonn">Отправить</button>
        </div>

        <div class="mobile_record" style="display: none;">
            <p>
                Отправляя эту форму, вы уведомляете БауАртЭститику 
                о клиенте агента. Оставленное вами уведомление будет
                отправлено в отдел продаж. Клиент закрпеляется за агентом
                на срок до 60 дней при бронировании и на 30 дней консультации.Заполняя данное обращение, вы <span> соглашаетесь на
                обработку персональных данных.</span>
            </p>
        </div> 
    </form>
</div>