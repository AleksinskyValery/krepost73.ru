<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$APPLICATION->IncludeComponent("bitrix:eshop.socnet.links", "bootstrap_v4", array(
	"COMPONENT_TEMPLATE" => "bootstrap_v4",
		"FACEBOOK" => "https://www.facebook.com/",
		"VKONTAKTE" => "https://vk.com/",
		"TWITTER" => "https://twitter.com/",
		"GOOGLE" => "https://plus.google.com/",
		"INSTAGRAM" => "https://instagram.com/"
	),
	false,
	array(
	"HIDE_ICONS" => "N",
		"ACTIVE_COMPONENT" => "Y"
	)
);?>