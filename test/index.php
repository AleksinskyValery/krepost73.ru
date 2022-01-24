<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("test");
?><div class="container">
</div>
<div class="container">
	 <?$APPLICATION->IncludeComponent(
	"agatech:menu.sections",
	"",
	Array(
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"DEPTH_LEVEL" => "2",
		"IBLOCK_ID" => "17",
		"IBLOCK_TYPE" => "1c_catalog",
		"ID" => $_REQUEST["ID"],
		"IS_SEF" => "N",
		"SECTION_URL" => "/catalog/#SECTION_CODE#/"
	)
);?><br>
 <br>
 <br>
 <br>
	 Тестовая страница
</div>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>