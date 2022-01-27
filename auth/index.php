<?
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Вход или регистрация");
if (isset($_REQUEST["backurl"]) && strlen($_REQUEST["backurl"])>0)
	LocalRedirect($backurl);
$APPLICATION->SetTitle("Вход или регистрация");
// LocalRedirect(SITE_DIR."personal/");
?><?$APPLICATION->IncludeComponent(
	"bitrix:main.auth.form", 
	".default", 
	array(
		"AUTH_FORGOT_PASSWORD_URL" => "/auth/get_password.php",
		"AUTH_REGISTER_URL" => "/auth/registration.php",
		"AUTH_SUCCESS_URL" => "/personal/",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>