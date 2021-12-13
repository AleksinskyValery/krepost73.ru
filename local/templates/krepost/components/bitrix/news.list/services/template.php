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
<section class="services">
    <div class="container">
        <ul class="row services__list">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
<li class="col-md-4 col-sm-6 col-12 services__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
    <div class="services__item-front">
        <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
             alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
             title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
             class="services__item-img">
        <h3 class="services__item-title"><?echo $arItem["NAME"]?></h3>
    </div>
    <style>
    .services__item-link::after {
        background: url('<?echo $arItem["DISPLAY_PROPERTIES"]["SERVICE_ICON"]["FILE_VALUE"]["SRC"]?>');
        width: <?echo $arItem["DISPLAY_PROPERTIES"]["SERVICE_ICON_WIDTH"]["VALUE"]?>px;
        height: <?echo $arItem["DISPLAY_PROPERTIES"]["SERVICE_ICON_HEIGHT"]["VALUE"]?>px;
    }
    </style>
    <div class="services__item-back">
        <div class="services__item-link"></div>
        <form action="#" method="post" class="services__form services__form_active services__form_main">
            <input type="text" placeholder="Ваше имя" name="services__name" maxlength="30" required="" data-input="" data-name="Имя">
            <input type="tel" placeholder="Телефон" name="services__phone" required="" data-input="" data-name="Номер телефона">
            <input class="services__form-btn services__form-submit_1920" type="submit" value="Заказать обратный звонок">
            <input class="services__form-btn services__form-submit_768" type="submit" value="Заказать звонок">
        </form>
        <div class="services__form services__form_thanks">
            <p class="services__form-text">Спасибо!</p>
            <p class="services__form-text">Ваша заявка успешно отправлена.</p>
        </div>
        <div class="services__form services__form_error">
            <p class="services__form-text">Произошла ошибка!</p>
            <p class="services__form-text">Пожалуйста, попробуйте позже.</p>
        </div>
    </div>
</li>
		<?endforeach;?>
        </ul>
    </div>
</section>