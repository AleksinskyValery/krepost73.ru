<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul class="promo__catalogue-list">
<?
foreach($arResult as $arItem):
	$strImg = '';
 
	if(intval($arItem["PARAMS"]["PICTURE"])>0 && $arItem["DEPTH_LEVEL"]==1){
   		$img = CFile::ResizeImageGet($arItem["PARAMS"]["PICTURE"], array('width'=>30, 'height'=>30),
 			BX_RESIZE_IMAGE_PROPORTIONAL, false);  
   		$strImg = '<img alt="" src="'.$img['src'].'" />';
 	}
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
	<?if($arItem["SELECTED"]):?>
		<li class="promo__catalogue-item"><?=$strImg?><?=$arItem["PARAMS"]["icon"]?><a href="<?=$arItem["LINK"]?>" class="promo__catalogue-link selected <?=$arItem["PARAMS"]["class"]?>"><?=$arItem["TEXT"]?></a></li>
	<?else:?>
		<li class="promo__catalogue-item"><?=$strImg?><?=$arItem["PARAMS"]["icon"]?><a href="<?=$arItem["LINK"]?>" class="promo__catalogue-link <?=$arItem["PARAMS"]["class"]?>"><?=$arItem["TEXT"]?></a></li>
	<?endif?>
<?endforeach?>

</ul>
<?endif?>
<?
/*
foreach($arResult as $arItem):
	echo "<pre>"; print_r($arItem["PARAMS"]);echo "</pre>";
endforeach
echo "<pre>"; print_r($arResult);echo "</pre>";?>
*/