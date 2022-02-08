<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

<nav class="header-mobile">
    <div class="container container_p0">
        <ul class="header-mobile__menu">
<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
	<li class="header-mobile__menu-item">
		<?// В ссылке выводим содержимое параметра "not_link" если оно существует, если его нет, выводится обычная ссылка ?> 
		<a href="<?=($arItem["PARAMS"]["not_link"]) ? $arItem["PARAMS"]["not_link"] : $arItem["LINK"];?>" class="header-mobile__menu-link">
			<img src="<?=$arItem["PARAMS"]["icon_link"]?>" alt="<?=$arItem["TEXT"]?>" class="header-mobile__menu-img">
			<p class="header-mobile__menu-text"><?=$arItem["TEXT"]?></p>
		</a>
	</li>
<?endforeach?>
		</ul>
    </div>
</nav>

<?endif?>