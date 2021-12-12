<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<nav class="header-menu">
    <div class="container container_p0">
        <div class="row">
            <div class="col-sm-10 col-12 offset-sm-2 offset-0">
                <ul class="header-menu__list">
<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
	<?if($arItem["SELECTED"]):?>
        <li class="header-menu__item"><a href="<?=$arItem["LINK"]?>" class="header-menu__link active"><?=$arItem["TEXT"]?></a></li>
	<?else:?>
        <li class="header-menu__item"><a href="<?=$arItem["LINK"]?>" class="header-menu__link"><?=$arItem["TEXT"]?></a></li>
	<?endif?>
	
<?endforeach?>

                </ul>
            </div>
        </div>
    </div>
</nav>
<?endif?>