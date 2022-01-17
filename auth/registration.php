<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("TITLE", "Регистрация");
$APPLICATION->SetPageProperty("keywords", "Регистрация");
$APPLICATION->SetPageProperty("description", "Регистрация");
$APPLICATION->SetTitle("Регистрация");
?><?$APPLICATION->IncludeComponent("bitrix:main.register", "registration", Array(
	"AUTH" => "Y",	// Автоматически авторизовать пользователей
		"REQUIRED_FIELDS" => array(	// Поля, обязательные для заполнения
			0 => "EMAIL",
		),
		"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
		"SHOW_FIELDS" => array(	// Поля, которые показывать в форме
			0 => "EMAIL",
			1 => "TITLE",
			2 => "PERSONAL_PHONE",
		),
		"SUCCESS_PAGE" => "/personal/",	// Страница окончания регистрации
		"USER_PROPERTY" => "",	// Показывать доп. свойства
		"USER_PROPERTY_NAME" => "",	// Название блока пользовательских свойств
		"USE_BACKURL" => "Y",	// Отправлять пользователя по обратной ссылке, если она есть
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>