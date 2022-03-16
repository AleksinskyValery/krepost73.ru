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

<div class="slider main-slider">
    <div class="slider__wrapper">
        <div class="slider__items">
            <?foreach($arResult["ITEMS"] as $arItem):?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div class="slider__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <p class="slider__item_title"><?echo $arItem["NAME"]?></p>
                    <img class="slider__item_img" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"/>
                    <div class="slider__item_link-wrapper">
                        <a href="<?=$arItem['DISPLAY_PROPERTIES']['ATT_PROMO_LINK']['VALUE']?>" class="slider__item_link">Подробнее</a>
                    </div>
                </div>
            <?endforeach;?>
		</div>
    </div>
    <button class="slider__control slider__control_prev" data-slide="prev"></button>
    <button class="slider__control slider__control_next" data-slide="next"></button>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new SimpleAdaptiveSlider('.main-slider', {
            loop: true,
            autoplay: true,
            interval: 6000,
            swipe: true
        });
    });
</script>