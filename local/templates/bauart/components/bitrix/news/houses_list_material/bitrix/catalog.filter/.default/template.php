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
        $arFilter = Array("IBLOCK_ID"=>6, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "SECTION_CODE" => explode('/', $_SERVER["REQUEST_URI"])[2]);

        $res = CIBlockElement::GetList(
            Array(), //сортировка данных
            $arFilter, //фильтр данных
            false, //группировка данных
            false, // постраничная навигация
            Array()
        );

        $num_elements = 0;
        while ($res->GetNextElement()) 
        {
        	$num_elements++;
        }
    }
        
?>

<!-- <script type="text/javascript">
        
        $(document).ready(function(){
         
           $(".testt").change(function() {
			    this.submit();
			  });
        });
</script> -->

<script type="text/javascript">
	BX.addCustomEvent('onAjaxSuccess', function() {
		Button_event_handler_house_list();
		Sumbit_without_button();
	});
</script>

<style type="text/css">
	.modify_this_but
	{
		margin: 0px 20px 0px 0px;
		width: 200px;
		font-size: 27px;
	}

	.row_butt
	{
		display: flex;
		flex-wrap: wrap;
		margin-bottom: 60px;
	}

	@media screen and (max-width: 1250px)
	{
		.modify_this_but
		{
			font-size: 16px;
		}
	}

	@media screen and (max-width: 750px)
	{
		.row_butt
		{
			margin-bottom: 0px;
		}
	}

	@media screen and (max-width: 500px)
	{
		.modify_this_but
		{
			width: 40%;
			font-size: 14px;
		}
	}
</style>


<? if($num_elements > 0): ?>
<form class="universal_form" name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get">

<div class="formm">
	<div>
		<div class="area">
			<label for="areaa">Площадь, м²</label>
			<br>
			<div class="input_box">
				<div>
					<input id="areaa" type="number" name="arrFilter_pf[AREA][LEFT]" value="<?= $_GET['arrFilter_pf']['AREA']['LEFT']??null; ?>">
					<span>от</span>
					<p>&#124;</p>
				</div>
				<div>
					<input id="areaa_2" type="number" name="arrFilter_pf[AREA][RIGHT]" value="<?= $_GET['arrFilter_pf']['AREA']['RIGHT']??null; ?>">
					<span>до</span>
				</div>
			</div>
		</div>

		<div class="floor">
			<label>Этажность</label>
			<br>
			<div>
				<input <?= $_GET['arrFilter_pf']['FLOORS']=='6'?checked:null; ?> type="checkbox" name="arrFilter_pf[FLOORS]" value="6">
				<span>1</span>

				<input <?= $_GET['arrFilter_pf']['FLOORS']=='7'?checked:null; ?> type="checkbox" name="arrFilter_pf[FLOORS]" value="7">
				<span>2</span>

				<input <?= $_GET['arrFilter_pf']['FLOORS']=='8'?checked:null; ?> type="checkbox" name="arrFilter_pf[FLOORS]" value="8">
				<span>3</span>
			</div>
		</div>
	</div>


	<div class="form_column_two">
		<div class="price">
			<label for="pricee_1">Стоимость, млн</label>
			<br>
			<div class="input_box">
				<div>
					<input id="pricee_1" type="number" name="arrFilter_pf[PRICE][LEFT]" value="<?= $_GET['arrFilter_pf']['PRICE']['LEFT']??null; ?>">
					<span>от</span>
					<p>&#124;</p>
				</div>
				<div>
					<input id="pricee_2" type="number" name="arrFilter_pf[PRICE][RIGHT]" value="<?= $_GET['arrFilter_pf']['PRICE']['RIGHT']??null; ?>">
					<span>до</span>
				</div>
			</div>
		</div>


		<div class="terrace_and_floors">
			<div class="additionally">
				<label>Дополнительно</label>
				<br>
				<div>
					<input <?= $_GET['arrFilter_pf']['TERRACE']=='5'?checked:null; ?> type="checkbox" name="arrFilter_pf[TERRACE]" value="5"> 
					<span class="check_label terr">с террасой</span>
				</div>
			</div>

			<!-- Для мобилки -->
			<!-- <div class="floor hideee" style="display: none">
				<label>Этажность</label>
				<br>
				<div>
					<input type="checkbox" name="arrFilter_pf[FLOORS]" value="6">
					<span class="check_label">1</span>

					<input type="checkbox" name="arrFilter_pf[FLOORS]" value="7">
					<span class="check_label">2</span>

					<input type="checkbox" name="arrFilter_pf[FLOORS]" value="8">
					<span class="check_label">3</span>
				</div>
			</div> -->
		</div>
	</div>
</div>

<input type="hidden" name="set_filter" value="Y" />

<div class="row_butt" style="display: none;">
	<input class="submit_form buttonn modify_this_but" type="submit" name="set_filter" value="Показать" />

	<input class="drop_form buttonn modify_this_but" type="submit" name="del_filter" value="<?=GetMessage("IBLOCK_DEL_FILTER")?>" />
</div>

</form>

<? endif; ?>


<?/* debug($_GET); */?>


<?/*

<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get">
	<?foreach($arResult["ITEMS"] as $arItem):
		if(array_key_exists("HIDDEN", $arItem)):
			echo $arItem["INPUT"];
		endif;
	endforeach;?>
	<table class="data-table" cellspacing="0" cellpadding="2">
	<thead>
		<tr>
			<td colspan="2" align="center"><?=GetMessage("IBLOCK_FILTER_TITLE")?></td>
		</tr>
	</thead>
	<tbody>
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?if(!array_key_exists("HIDDEN", $arItem)):?>
				<tr>
					<td valign="top"><?=$arItem["NAME"]?>:</td>
					<td valign="top"><?=$arItem["INPUT"]?></td>
				</tr>
			<?endif?>
		<?endforeach;?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="2">
				<input type="submit" name="set_filter" value="<?=GetMessage("IBLOCK_SET_FILTER")?>" /><input type="hidden" name="set_filter" value="Y" />&nbsp;&nbsp;<input type="submit" name="del_filter" value="<?=GetMessage("IBLOCK_DEL_FILTER")?>" /></td>
		</tr>
	</tfoot>
	</table>
</form>
