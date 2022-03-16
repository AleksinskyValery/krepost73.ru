<? 
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $APPLICATION; 
$aMenuLinksExt = $APPLICATION->IncludeComponent(
	"agatech:menu.sections", 
	"", 
	array(
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"DEPTH_LEVEL" => "1",
		"DETAIL_PAGE_URL" => "#SECTION_CODE#/#ELEMENT_CODE#/",
		"IBLOCK_ID" => "29",
		"IBLOCK_TYPE" => "1c_catalog",
		"ID" => $_REQUEST["ID"],
		"IS_SEF" => "Y",
		"SECTION_PAGE_URL" => "#SECTION_CODE#/",
		"SECTION_URL" => "",
		"SEF_BASE_URL" => "/catalog/"
	),
	false
);
$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
?>