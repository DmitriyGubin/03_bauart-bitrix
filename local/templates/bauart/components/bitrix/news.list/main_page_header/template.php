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

//echo '<pre>'.print_r($arResult).'<pre>'; 

?>
<?


$res = CIBlockElement::GetList(
            Array(), //сортировка данных
            Array("IBLOCK_ID"=>5, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y"), //фильтр данных
        );

$ob = $res->GetNextElement();
$arResult_contacts[] = $ob->GetProperties();

        //echo '<pre>'.print_r($arResult_contacts).'</pre>';
?>


<script type="text/javascript">

    $(document).ready(function(){

        $('.single-item').slick({
            autoplay: true,
            arrows: false,
                // fade: true,
            });    
    });
</script>



<div class="slider single-item desctop-case">
    <?foreach($arResult["ITEMS"][0]['PROPERTIES']['HEADER_SLIDER_DESCTOP']['VALUE'] as $arItem):?>
        <div>
            <img class="slider_img" src="<?=\CFile::GetPath($arItem);?>">
        </div>
    <?endforeach;?>
</div>

<div class="slider single-item mobile-case" style="display: none;">
    <?foreach($arResult["ITEMS"][0]['PROPERTIES']['HEADER_SLIDER_MOBILE']['VALUE'] as $arItem):?>
        <div>
            <img class="slider_img" src="<?=\CFile::GetPath($arItem);?>">
        </div>
    <?endforeach;?>
</div>

<div class="content_box">
    <div class="right_area_first_line">
        <img id="show_menu" src="img/12.png">
        <div>
            <a href="tel:<?=$arResult_contacts[0]['PHONE']['VALUE']?>" style="text-decoration: none;">
                <h2><?=$arResult_contacts[0]['PHONE']['VALUE']?></h2>
            </a>
            <p><?=$arResult_contacts[0]['CITY']['VALUE']?></p> 
        </div>
    </div>

    <div class="middle_row">
        <h1 class="main_page_title">Строительство домов <br> из кирпича</h1>
        <p class="main_page_price">от 31 000 руб/м²</p>
        <button class="buttonn pop_up_order">Подробнее</button>
    </div>

    <div class="right_area_last_line">
        <p>Мы строим дома в которх хочется жить!</p>
        <div class="community">
            <a href="https://vk.com/bauartesthetics">
                <img src="<?=SITE_TEMPLATE_PATH?>/img/4.png">
            </a>
            <a href="https://t.me/bauartesthetics">
             <img src="<?=SITE_TEMPLATE_PATH?>/img/5.png">
         </a>
         <a href="https://www.youtube.com/channel/UCXwg_ZmN4kmoa2jlFxHP_aw">
             <img src="<?=SITE_TEMPLATE_PATH?>/img/6.png">
         </a>
     </div>
 </div>
</div>
