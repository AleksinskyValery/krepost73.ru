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
<section class="news">
    <div class="container">
        <div class="slider__wrapper">
            <ul class="slider" style="width: 100%; transform: translateX(0px); transition: all 0.75s ease 0s;">
                <li class="slider__item" style="width: 1125px;">
                    <ul class="row news__list">

<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>

    <li class="col-md-4 col-sm-6 col-12 news__item-wrapper" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <div class="news__item">
            <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="news__item-link">
                <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
                     width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
                     height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
                     alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                     title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
                     class="news__item-img">
            </a>
            <time class="news__item-date" datetime="<?echo $arItem["DISPLAY_ACTIVE_FROM"]?>"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></time>
            <h3 class="news__item-title"><?echo $arItem["NAME"]?></h3>
        </div>
    </li>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</section>