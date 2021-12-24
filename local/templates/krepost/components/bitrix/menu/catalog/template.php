<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul class="promo__catalogue-list">

<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
	<?if($arItem["SELECTED"]):?>
		<li class="promo__catalogue-item"><?=$arItem["PARAMS"]["icon"]?><a href="<?=$arItem["LINK"]?>" class="promo__catalogue-link selected <?=$arItem["PARAMS"]["class"]?>"><?=$arItem["TEXT"]?></a></li>
	<?else:?>
		<li class="promo__catalogue-item"><?=$arItem["PARAMS"]["icon"]?><a href="<?=$arItem["LINK"]?>" class="promo__catalogue-link <?=$arItem["PARAMS"]["class"]?>"><?=$arItem["TEXT"]?></a></li>
	<?endif?>
	
<?endforeach?>

</ul>
<?endif?>