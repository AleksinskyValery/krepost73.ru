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
<ul class="product-category__list">
<?
foreach ($arResult['SECTIONS'] as &$arSection):
	$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
	$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
	?>
	<?// echo "<pre>"; print_r($arSection);echo "</pre>";?>
	<li id="<? echo $this->GetEditAreaId($arSection['ID']); ?>" class="product-category__item">
		<a href="<? echo $arSection['SECTION_PAGE_URL']; ?>" class="product-category__link">
			<img src="<?if ($arSection['PICTURE']['SRC'])
				{
					echo $arSection['PICTURE']['SRC'];
				}
				else {
					echo "/upload/img/no-image.png";
				} ?>"
				class="product-category__item-img img-fluid"
				style="max-width: 204px; max-height: 140px;"
				alt="<? echo $arSection['NAME']; ?>">
			<h3 class="product-category__item-title"><? echo $arSection['NAME']; ?></h3>
			<? if ($arParams["COUNT_ELEMENTS"] && $arSection['ELEMENT_CNT'] !== null)
				{?>
				<p class="product-category__item-amount"><? echo $arSection['ELEMENT_CNT']; ?></p>
				<?}?>
		</a>
	</li><?
	unset($arSection);
endforeach;
?>
</ul>