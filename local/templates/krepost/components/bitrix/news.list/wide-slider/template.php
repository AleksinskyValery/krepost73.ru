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
<div class="wide-slider-section">
    <div class="container container_p0">
        <div class="slider__wrapper">
            <ul class="wide-slider">
                <?foreach($arResult["ITEMS"] as $arItem):
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                    <li class="slider__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                        <a href="<?=$arItem['DISPLAY_PROPERTIES']['ATT_PROMO_LINK']['VALUE']?>" class="slider__link">
                            <picture>
                                <source srcset="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" media="(max-width: 575px)">
                                <source srcset="<?=$arItem['DETAIL_PICTURE']['SRC']?>" media="(min-width: 576px)">
                                <img src="#" data-src="<?=$arItem['DETAIL_PICTURE']['SRC']?>" alt="" class="slider__img">
                            </picture>
                        </a>
                    </li>
                <?endforeach;?>
            </ul>
        </div>
        <nav class="slider__nav">
            <ul class="slider__nav-list">
                <?foreach($arResult["ITEMS"] as $arItem):?>
                    <li class="slider__nav-item">
                        <button class="slider__nav-btn">
                            <span></span>
                        </button>
                    </li>
                <?endforeach;?>
            </ul>
        </nav>
    </div>
</div>