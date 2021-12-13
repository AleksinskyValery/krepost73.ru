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

<section class="advantages">
    <div class="container">
        <h2 class="titleH2 sr-only">Преимущества</h2>
        <ul class="row advantages__list">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
    <li class="col-lg-3 col-md-4 col-sm-6 col-12" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <div class="advantages__item">
            <img src="<?echo $arItem["DISPLAY_PROPERTIES"]["ADVANTAGE_ICON"]["FILE_VALUE"]["SRC"]?>"
                 alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                 title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
                 class="advantages__img">
            <p class="advantages__descr"><?echo $arItem["NAME"]?></p>
        </div>
    </li>
<?endforeach;?>
        </ul>
    </div>
</section>