<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Восстановление пароля");
?><?$APPLICATION->IncludeComponent("bitrix:main.auth.forgotpasswd", "get_password", Array(
	"AUTH_AUTH_URL" => "/auth/index.php",	// Страница для авторизации
		"AUTH_REGISTER_URL" => "/auth/registration.php",	// Страница для регистрации
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>