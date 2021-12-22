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
<ul class="accordeon__list">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<li class="accordeon__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if($arItem["FIELDS"]["DETAIL_TEXT"]):?>
		<details class="row accordeon__details">
			<summary class="row accordeon__summary">
				<span class="col-sm-11 offset-sm-1 col-10 offset-2 accordeon__title"><?echo $arItem["NAME"]?></span>
				<span class="col-sm-11 offset-sm-1 col-10 offset-2 accordeon__subtitle"><?echo $arItem["PREVIEW_TEXT"];?></span>
			</summary>
			<div class="col-11 offset-1 accordeon__delivery">
				<?echo $arItem["FIELDS"]["DETAIL_TEXT"];?>
			</div>
        </details>
		<?else:?>
		<div class="row accordeon__details">
			<div class="row accordeon__summary">
				<span class="col-sm-11 offset-sm-1 col-10 offset-2 accordeon__title"><?echo $arItem["NAME"]?></span>
				<span class="col-sm-11 offset-sm-1 col-10 offset-2  accordeon__subtitle"><?echo $arItem["PREVIEW_TEXT"];?></span>
			</div>
		</div>
		<?endif;?>
    </li>
<?endforeach;?>
</ul>