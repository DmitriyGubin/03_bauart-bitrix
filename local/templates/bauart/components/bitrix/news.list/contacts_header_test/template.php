777<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

//debug($arResult["ITEMS"]);

/*


*/

?>

<a href="tel:+79001111111">+7-900-111-11-11</a>

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
            <h2><?=$arResult_contacts[0]['PHONE']['VALUE']?></h2>
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
                <h2><?=$arResult_contacts[0]['PHONE']['VALUE']?></h2>
                <p><?=$arResult_contacts[0]['CITY']['VALUE']?></p>
            </div>
        </div>
    </div>

    <h2 class="head_title desctop">Мы ждём вас в нашем офисе!</h2>
    <h2 class="head_title mobile">Ждём вас в офисе</h2>
    <div class="contacts_text">
        <div class="sales_department">
            <p class="boldd">Отдел продаж в Новосибирске:</p>
            <p><?= $arResult["ITEMS"][0]['PROPERTIES']['SALES_DEPARTMENT_ADRESS_ONE']['VALUE']; ?></p>
            <p><?= $arResult["ITEMS"][0]['PROPERTIES']['SALES_DEPARTMENT_ADRESS_TWO']['VALUE']; ?></p>
            <p><?= $arResult["ITEMS"][0]['PROPERTIES']['SALES_DEPARTMENT_ADRESS_THREE']['VALUE']; ?></p>
        </div>

        <div class="phones">
            <p class="boldd">Телефоны для связи:</p>
            <span class="boldd"><?= $arResult["ITEMS"][0]['PROPERTIES']['SALES_DEPARTMENT_PHONE']['VALUE']; ?></span> <span>(Отдел продаж)</span><br>
            <span class="boldd"><?= $arResult["ITEMS"][0]['PROPERTIES']['PARTNERS_AGENCIES_PHONE']['VALUE']; ?></span> <span>(Партнерам и агенствам недвижимости)</span><br>
            <span class="boldd"><?= $arResult["ITEMS"][0]['PROPERTIES']['SUPPLY_DEPARTMENT_PHONE']['VALUE']; ?></span> <span>(Отдел снабжения)</span>
        </div>
    </div>
</div>













<script type="text/javascript">
    ymaps.ready(initt);

function initt () {
    var myMap = new ymaps.Map("yndex_mappp", {
        center: [54.970000,82.925550],
        zoom: 9,
                //controls: [],//без элементов управления
            }, {
                searchControlProvider: 'yandex#search'
            }),
    // Создание макета содержимого хинта.
    // Макет создается через фабрику макетов с помощью текстового шаблона.
    HintLayout = ymaps.templateLayoutFactory.createClass( "<div class='my-hint'>" +
        "{{ properties.address }}" +
        "</div>", {
                // Определяем метод getShape, который
                // будет возвращать размеры макета хинта.
                // Это необходимо для того, чтобы хинт автоматически
                // сдвигал позицию при выходе за пределы карты.
                getShape: function () {
                    var el = this.getElement(),
                    result = null;
                    if (el) {
                        var firstChild = el.firstChild;
                        result = new ymaps.shape.Rectangle(
                            new ymaps.geometry.pixel.Rectangle([
                                [0, 0],
                                [firstChild.offsetWidth, firstChild.offsetHeight]
                                ])
                            );
                    }
                    return result;
                }
            }
            );



    
    function Add_point(x, y, adress)
    {
        var myPlacemark = new ymaps.Placemark([x, y], {
        address: adress
        // object: "Центр современного искусства"
        }, {
            hintLayout: HintLayout
        });

        myMap.geoObjects.add(myPlacemark);
        return myPlacemark;
    }
    
    


    //myPlacemark.hint.open([Number(x), Number(y)]);


     var myPlacemark_one = new ymaps.Placemark([54.983680, 82.892600], {
        address: 'Маркса 2'
        // object: "Центр современного искусства"
        }, {
            hintLayout: HintLayout
        });

        myMap.geoObjects.add(myPlacemark_one);
        //myPlacemark_one.hint.open([54.983680, 82.892600]);



    var myPlacemark_two = new ymaps.Placemark([54.758289, 83.107129], {
        address: 'Бердск'
        // object: "Центр современного искусства"
        }, {
            hintLayout: HintLayout
        });

        myMap.geoObjects.add(myPlacemark_two);
        //myPlacemark_one.hint.open([54.758289, 83.107129]);

       //myMap.hint.show([54.758289, 83.107129]);



    var j = 0;
    var mas = [];

    var elements = document.querySelectorAll('.all_coordinates div');
    if(elements.length != 0)
    {
        for (let item of elements)
        {
            let coord_arr = item.querySelector('p').innerHTML.split(',');
            let adress = item.querySelector('span').innerHTML;
            Add_point(coord_arr[0], coord_arr[1], adress);
            j++;
        }
    }
    
    console.log(mas);

    myMap.balloon.open([55.65,37.7], "Содержимое балуна", { closeButton: true });

     // myMap.behaviors
     //    // Отключаем часть включенных по умолчанию поведений:
     //    //  - drag - перемещение карты при нажатой левой кнопки мыши;
     //    //  - magnifier.rightButton - увеличение области, выделенной правой кнопкой мыши.
     //    .disable(['scrollZoom']);

    
    //map.options.set('maxAnimationZoomDifference', Infinity);

    //https://ru.stackoverflow.com/questions/1004231/setzoom-%D0%BF%D0%BB%D0%B0%D0%B2%D0%BD%D1%8B%D0%B9-%D0%B7%D1%83%D0%BC%D0%B8%D0%BD?ysclid=l8tnngu9yk359573362
    document.querySelector('#testic').addEventListener("click", func);
    function func()
    {
        myMap.panTo([54.83825, 82.900541], {
                            delay: 0,
                            flying: true
                        }).then(function() {
                            // myMap.setZoom(15);
                          //   myMap.setZoom(15, { 
                          //     smooth: true,
                          //     duration: 2000
                          // });

                          myMap.setZoom(13,{smooth: true,duration:1000}).then(() => myMap.setZoom(15,{smooth: true,duration:1000}));
                        });
    }

 }
</script>










<button id="testic">Click_me</button>

<!-- <script type="text/javascript">
    

</script> -->








<div class="map">
    <div id="yndex_mappp" style="height: 300px; width: 100%;">
    
    </div>
</div>
