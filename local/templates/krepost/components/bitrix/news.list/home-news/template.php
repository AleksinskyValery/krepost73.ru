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
$this->addExternalCss(SITE_TEMPLATE_PATH."/js/libs/swiper/swiper-bundle.min.css");
$this->addExternalJS(SITE_TEMPLATE_PATH."/js/libs/swiper/swiper-bundle.min.js");
?>
<div class="swiper swiper-news">
<ul class="swiper-wrapper">
<?foreach($arResult["ITEMS"] as $arItem):?>	
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<li class="swiper-slide news__item-wrapper" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="news__item">
			<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
                width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
                height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
                alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
                class="news__item-img">
				<time class="news__item-date" datetime="<?echo $arItem["DISPLAY_ACTIVE_FROM"]?>"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></time>
			<div class="news__item-descr"><?=TruncateText($arItem["NAME"], 59);?></div>
		</a>
	</li>
<?endforeach;?>
</ul>
<button class="slider__arrow slider__arrow-left"></button>
<button class="slider__arrow slider__arrow-right"></button>
</div>
<script>
const newsSlider = new Swiper(".swiper-news", {
  breakpoints: {
    576: {
      slidesPerView: 2,
      spaceBetween: 14,
    },
    767: {
      slidesPerView: 3,
      spaceBetween: 18,
    },
    992: {
      slidesPerView: 4,
      spaceBetween: 20,
    }
  },
  loop: true,
  navigation: {
    nextEl: ".slider__arrow-right",
    prevEl: ".slider__arrow-left",
  },
  spaceBetween: 20,
  slidesPerView: 1,
});
</script>