<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<?if (!empty($arResult)):?>

<ul class="header-info__catalogue-list">
<?
$previousLevel = 0;
$keyL1 = 0;
foreach($arResult as $arItem):
    
if($arItem["DEPTH_LEVEL"] == 1)
{
    $keyL1++;
}
?>
 	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li class="header-info__catalogue-item"><a href="<?=$arItem["LINK"]?>" class="header-info__catalogue-link<?if ($arItem["SELECTED"]):?> selected<?endif?>"><?=$arItem["TEXT"]?></a>
				<ul class="header-info__catalogue-sublist">
		<?else:?>
			<li><a href="<?=$arItem["LINK"]?>" class="parent<?if ($arItem["SELECTED"]):?> item-selected<?endif?>"><?=$arItem["TEXT"]?></a>
				<ul class="lvl-3">
		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li class="header-info__catalogue-item"><a href="<?=$arItem["LINK"]?>" class="header-info__catalogue-link<?if ($arItem["SELECTED"]):?> selected<?endif?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li class="header-info__catalogue-subitem"><a href="<?=$arItem["LINK"]?>" class="header-info__catalogue-sublink<?if ($arItem["SELECTED"]):?> item-selected<?endif?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?else:?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><a href="" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

</ul>
<?endif?>
<script>
toggleHeaderCatalogue({
	catalogueSelector: '.header-info__catalogue',
	catalogueActiveClass: 'header-info__catalogue_active',
	catalogueOpenSelector: '.header-info__catalogue-open',
	catalogueOpenActiveClass: 'header-info__catalogue-open_active',
});
toggleTabs({
	tabParentSelector: '.header-info__catalogue-list',
    tabHeaderSelector: '.header-info__catalogue-link',
    tabItemSelector: '.header-info__catalogue-sublist',
    tabItemActiveClass: 'header-info__catalogue-sublist_active',
    event: 'mouseover'
});
</script>