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
<section class="actions section">
    <div class="container container_p0">
        <h2 class="titleH2 sr-only">Акции</h2>
        <div class="slider__wrapper">
            <ul class="wide-slider">
                <?foreach($arResult["ITEMS"] as $arItem):
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                    <li class="row slider__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                        <div class="col-12">
                            <a href="<?=$arItem['DISPLAY_PROPERTIES']['ATT_PROMO_LINK']['VALUE']?>" class="slider__link" style="background-image: url(<?=$arItem['PREVIEW_PICTURE']['SRC']?>);"></a>
                        </div>
                    </li>
                <?// echo "<pre>"; print_r($arItem);echo "</pre>";?>
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
</section>