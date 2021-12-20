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
?>
<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
	<time class="news-item__date" datetime="<?=$arResult["DISPLAY_ACTIVE_FROM"]?>"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></time>
<?endif;?>
<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
	<img
		class="news-item__img"
		src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
		width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
		height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
		alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
		title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
	/>
<?endif?>
<div class="news-item__descr">
	<?echo $arResult["DETAIL_TEXT"];?>
</div>