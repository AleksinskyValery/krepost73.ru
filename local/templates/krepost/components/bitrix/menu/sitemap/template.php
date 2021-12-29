<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<?if (!empty($arResult)):?>

<div class="sitemap">
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
			<h3 class="sitemap-item-sub"><a data-tabheader href="<?=$arItem["LINK"]?>" class="sitemap-link"><?=$arItem["TEXT"]?></a></h3>
				<ul class="sitemap-sublist">
		<?else:?>
			<li><a href="<?=$arItem["LINK"]?>" class="parent"><?=$arItem["TEXT"]?></a>
				<ul class="lvl-3">
		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<h3 class="sitemap-item"><a href="<?=$arItem["LINK"]?>" class="sitemap-link"><?=$arItem["TEXT"]?></a></h3>
			<?else:?>
				<li class="sitemap-subitem"><a href="<?=$arItem["LINK"]?>" class="sitemap-sublink"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?else:?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><a href="" class="root-item" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul>", ($previousLevel-1) );?>
<?endif?>

</ul>
<?endif?>