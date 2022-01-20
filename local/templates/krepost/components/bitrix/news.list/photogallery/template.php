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
<div class="photogallery__wrapper">
    <!-- Swiper -->
      <div class="swiper swiper-photogallery">
          <div class="swiper-wrapper">
          <?foreach($arResult["ITEMS"] as $arItem):
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="swiper-slide"><img src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>" alt="<?=$arItem["DETAIL_PICTURE"]["ALT"]?>"/><span class="photogallery__descr"><?=$arItem["PREVIEW_TEXT"]?></span></div>
          <?endforeach;?>
          </div>
      </div>
      <!-- thumbs -->
    <div class="thumbs-wrap">
      <button class="thumbs__arrow thumbs__arrow_top"></button>
      <div class="swiper swiper-thumbs">
        <ul class="swiper-wrapper">
        <?foreach($arResult["ITEMS"] as $arItem):?>
            <li class="swiper-slide">
                <img class="thumbs__img" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>">
            </li>
        <?endforeach;?>
        </ul>
      </div>
      <button class="thumbs__arrow thumbs__arrow_bottom"></button>
    </div>
 </div>


<script>
const galleryThumbs = new Swiper(".swiper-thumbs", {
  breakpoints: {
    576: {
      slidesPerView: 4,
      spaceBetween: 20,
    },
    992: {
      slidesPerView: 4,
      spaceBetween: 10,
    }
  },
  direction: getSliderDirection(),
  loop: true,
  navigation: {
    nextEl: ".thumbs__arrow_bottom",
    prevEl: ".thumbs__arrow_top",
  },
  on: {
    resize() {
      galleryThumbs.changeDirection(getSliderDirection());
    }
  },
  spaceBetween: 18,
  slidesPerView: 2,
});

function getSliderDirection() {
  return window.innerWidth <= 991 ? 'horizontal' : 'vertical';
}

new Swiper(".swiper-photogallery", {
  loop: true,
  grabCursor: true,
  spaceBetween: 10,
  thumbs: {
    swiper: galleryThumbs,
  },
});


/* Старый вариант
let gallery_thumbs = new Swiper(".mySwiper", {
  loop: true,
  grabCursor: true,
  spaceBetween: 18,
  slidesPerView: 2,
  navigation: {
    nextEl: ".slider__arrow-top",
    prevEl: ".slider__arrow-bottom",
  },
  breakpoints: {
    // when window width is >= 576px
    576: {
      slidesPerView: 4,
      spaceBetween: 20,
    },
    992: {
      slidesPerView: 4,
      spaceBetween: 10,
    }
  },
  direction: getDirection(),
  on: {
    resize: function () {
      gallery_thumbs.changeDirection(getDirection());
    }
  }
});
function getDirection() {
  var windowWidth = window.innerWidth;
  var direction = window.innerWidth <= 991 ? 'horizontal' : 'vertical';
  return direction;
}

let gallery = new Swiper(".mySwiper2", {
  loop: true,
  grabCursor: true,
  spaceBetween: 10,
  thumbs: {
    swiper: gallery_thumbs,
  },
});
*/
</script>