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
$count = 1;
?>
<section class="documents">
    <div class="container">
		<ul class="row documents__list">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<?if(!($arItem["DISPLAY_PROPERTIES"]["DOC_FILE"]["FILE_VALUE"]["SRC"])):?>
	<li class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12 documents__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<a href="<?=$arItem["FIELDS"]["DETAIL_PICTURE"]["SRC"]?>" class="glightbox documents__item-link">
            <img	src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
					alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
					width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
					height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
					class="documents__item-img">
		</a>
        <p class="documents__item-title"><?echo $arItem["NAME"]?></p>
	</li>
	<?endif;?>
	<?// echo "<pre>"; print_r($arItem);echo "</pre>";?>
<?endforeach;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?if($arItem["DISPLAY_PROPERTIES"]["DOC_FILE"]["FILE_VALUE"]["SRC"]):?>
	<li class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12 documents__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<a href="<?echo $arItem["DISPLAY_PROPERTIES"]["DOC_FILE"]["FILE_VALUE"]["SRC"];?>" class="documents__item-link glightbox">
			<img src="<?= SITE_TEMPLATE_PATH ?>/img/documents/document-pdf.png" alt="<?echo $arItem["NAME"]?>" class="documents__item-img">
		</a>
		<p class="documents__item-title"><?echo $arItem["NAME"]?></p>
	</li>
	<?endif;?>
<?endforeach;?>
</ul>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?if(!($arItem["DISPLAY_PROPERTIES"]["DOC_FILE"]["FILE_VALUE"]["SRC"])):?>
		<div class="modal modal_documents" data-modal="<?echo $count?>">
			<img class="documents__fullimg" src="<?echo $arItem["FIELDS"]["DETAIL_PICTURE"]["SRC"];?>" alt="<?echo $arItem["NAME"]?>">
		</div>
		<?$count++?>
	<?endif;?>
<?endforeach;?>
	</div>
</section>
<script>
var lightbox = GLightbox();
</script>
<?// echo "<pre>"; print_r($arResult);echo "</pre>";?>