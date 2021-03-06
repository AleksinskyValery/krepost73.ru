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
<section class="actions">
	<div class="container container_p0">
		<ul class="row actions__list">
		<?foreach($arResult["ITEMS"] as $arItem):?>	
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<li class="col-md-4 col-sm-6 col-12" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="actions__item">
					<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>" title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>" class="actions__item-img">
					<p class="actions__item-date">Акция действует до: <time datetime="<?echo $arItem["PREVIEW_TEXT"];?>"><?echo $arItem["PREVIEW_TEXT"];?></time></p>
					<h3 class="actions__item-title"><?echo $arItem["NAME"]?></h3>
				</div>
			</li>
		<?endforeach;?>
		</ul>
	</div>
</section>