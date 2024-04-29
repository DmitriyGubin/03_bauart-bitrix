<?php

//https://href.kz/blog/bitrix/ajax-forma-obratnoj-svyazi-na-bitrix

//testgubin@mail.ru

//m@psfond.ru --- почта заказчика

// подключаем пролог, для использования Bitrix API без подключения шаблона
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

// поключаем модуль инфоблоков
CModule::IncludeModule('iblock');

$arResult = array('status' => false); // переменная для результата
$err = 0; // счётчик ошибок
$PROP = array(); // данные для полей элемента инфоблока

foreach ($_POST as $key => $value) 
{
    $_POST[$key] = trim($value);
    if (isset($_POST[$key]) && !empty($_POST[$key]))
    {
        //$PROP[$key] = htmlspecialchars( $value, ENT_QUOTES );
        $PROP[$key] = $value;
    } 
    else 
    {
        if ($key == 'AGENT_EMAIL' || $key == 'OBJECT_NAME' || $key == 'COMMENT' || $key == 'HOUSE_NAME' || $key == 'HOUSE_PRICE')
        {
            continue;//необязательные поля
        }
        $err++;
    }
}

// страница, с которой был отправлен запрос
$PROP['HTTP_REFERER'] = $_SERVER['HTTP_REFERER'];

$date = date_create();
date_modify($date, '4 hour');
$date = date_format($date, 'd.m.Y H:i:s');
 
if ($err == 0)
{
    $el = new CIBlockElement;
    // массив полей для нового элемента

    $arElem = Array(
                "IBLOCK_SECTION_ID" => false,
                "IBLOCK_ID"      => 14,
                "NAME"           => 'Новая заявка звонка с сайта от '.$date,
                "ACTIVE"         => "Y",
                "PROPERTY_VALUES"=> $PROP
            );

    if (isset($PROP['PERSON_NAME']))
    {
         $arElem["IBLOCK_ID"] = 12;
    }

    if ($PRODUCT_ID = $el->Add($arElem))
    {
        // устанавливаем статус
        $arResult['status'] = true;

        // подготавливаем поля для почтового события
        $PROP['THEME'] = 'Новая заявка БАУАРТ от '.$date;

        // отправка почты


        if (isset($PROP['HOUSE_NAME']) && $PROP['HOUSE_NAME'] != '')
        {
             CEvent::Send("NEW_USER_RESPONSE", "s1", $PROP);
        }
        else if(isset($PROP['PERSON_NAME']))
        {
            CEvent::Send("NEW_USER_RESPONSE_WITHOUT_HOME", "s1", $PROP);
        }
        else
        {
            CEvent::Send("NEW_USER_RESPONSE_PARTNERS", "s1", $PROP);
        } 
    }
}

echo json_encode($arResult);