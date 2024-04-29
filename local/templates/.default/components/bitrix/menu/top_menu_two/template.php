<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<style type="text/css">
	.active_menu_main
	{
		color: #4e7144 !important;
		border-bottom: 2px #4e7144 solid !important;
	}
</style>

<?if (!empty($arResult)):?>

	<ul class="three_menu">
		<?foreach($arResult as $arItem): ?>
			<? if($arItem["TEXT"] == 'О компании'): ?>
				<li class="submenu_three"> 
					<a class="<?= $arItem["SELECTED"]?active_menu_main:null; ?>" href="<?=$arItem["LINK"]?>">О компании</a>
					<ul class="scroll_submenu_about_company">
						<?foreach($arResult as $arItem_two): ?>
							<? if($arItem_two["TEXT"] == 'Контакты'): ?>
								<li> <a class="<?= $arItem_two["SELECTED"]?active_menu_main:null; ?>" href="<?=$arItem_two["LINK"]?>">Контакты</a> </li>
							<? endif; ?>
						<?endforeach?>
					</ul>
				</li>
			<? else: ?>
				<li class="<?= $arItem["TEXT"] == 'Контакты'?delete_menu_item:null; ?>">
					<a class="<?= $arItem["SELECTED"]?active_menu_main:null; ?>" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
				</li>
			<? endif; ?>
		<?endforeach?>
	</ul>

<?endif?>
