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
<section class="producers">
    <div class="container">
        <h2 class="titleH2"><?echo GetMessage('PRODUCERS_TITLE')?></h2>
        <ul class="row producers__list">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
    <li class="col-lg-2 col-md-3 col-sm-4 col-6 producers__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <a href="<? echo $arResult['DISPLAY_PROPERTIES']['PRODUCER_LINK']['DISPLAY_VALUE'];?>" class="producers__link">
            <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
                 alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                 title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
                 class="producers__img">
        </a>
    </li>
<?endforeach;?>
        </ul>
    </div>
</section>
