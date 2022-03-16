<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("test");
?><div class="container">
	 <?$APPLICATION->IncludeComponent(
	"altasib:feedback.form", 
	"popap_form", 
	array(
		"ACTIVE_ELEMENT" => "Y",
		"ADD_HREF_LINK" => "Y",
		"ADD_LEAD" => "N",
		"ALX_IBLOCK_ELEMENT_LINK" => "",
		"ALX_LINK_POPUP" => "Y",
		"ALX_LOAD_PAGE" => "N",
		"ALX_NAME_LINK" => ".callback_popap_1",
		"ALX_POPUP_TITLE" => "Заказать обратный звонок",
		"BBC_MAIL" => "",
		"CAPTCHA_TYPE" => "recaptchav3",
		"CATEGORY_SELECT_NAME" => "Выберите категорию",
		"CHANGE_CAPTCHA" => "N",
		"CHECKBOX_TYPE" => "CHECKBOX",
		"CHECK_ERROR" => "Y",
		"COLOR_OTHER" => "#E31E24",
		"COLOR_SCHEME" => "BRIGHT",
		"COLOR_THEME" => "",
		"COMPONENT_TEMPLATE" => "popap_form",
		"EVENT_TYPE" => "ALX_FEEDBACK_FORM",
		"FB_TEXT_NAME" => "",
		"FB_TEXT_SOURCE" => "PREVIEW_TEXT",
		"FORM_ID" => "1",
		"IBLOCK_ID" => "26",
		"IBLOCK_TYPE" => "altasib_feedback",
		"INPUT_APPEARENCE" => array(
			0 => "DEFAULT",
		),
		"JQUERY_EN" => "jquery3",
		"LINK_SEND_MORE_TEXT" => "Отправить ещё одно сообщение",
		"LOCAL_REDIRECT_ENABLE" => "N",
		"MASKED_INPUT_PHONE" => array(
			0 => "PHONE",
		),
		"MESSAGE_OK" => "Ваше сообщение было успешно отправлено",
		"NAME_ELEMENT" => "ALX_DATE",
		"NOT_CAPTCHA_AUTH" => "Y",
		"POPUP_ANIMATION" => "4",
		"POPUP_DELAY" => "",
		"PROPERTY_FIELDS" => array(
			0 => "PHONE",
			1 => "FIO",
		),
		"PROPERTY_FIELDS_REQUIRED" => array(
			0 => "PHONE",
			1 => "FIO",
		),
		"PROPS_AUTOCOMPLETE_EMAIL" => array(
			0 => "EMAIL",
		),
		"PROPS_AUTOCOMPLETE_NAME" => array(
			0 => "FIO",
		),
		"PROPS_AUTOCOMPLETE_PERSONAL_PHONE" => array(
			0 => "PHONE",
		),
		"PROPS_AUTOCOMPLETE_VETO" => "N",
		"RECAPTCHA_THEME" => "light",
		"RECAPTCHA_VALID_SCORE" => "0.5",
		"REQUIRED_SECTION" => "N",
		"SECTION_FIELDS_ENABLE" => "N",
		"SECTION_MAIL_ALL" => "sale@bitrix.krepost73.ru",
		"SEND_IMMEDIATE" => "Y",
		"SEND_MAIL" => "N",
		"SHOW_LINK_TO_SEND_MORE" => "Y",
		"SHOW_MESSAGE_LINK" => "Y",
		"SPEC_CHAR" => "N",
		"USERMAIL_FROM" => "N",
		"USER_CONSENT" => "Y",
		"USER_CONSENT_ID" => "1",
		"USER_CONSENT_INPUT_LABEL" => "",
		"USER_CONSENT_IS_CHECKED" => "Y",
		"USER_CONSENT_IS_LOADED" => "N",
		"USE_CAPTCHA" => "N",
		"WIDTH_FORM" => "50%"
	),
	false
);?><br>
 <div href class="callback_popap_1">Заказать обратный звонок</div><br>
	 Тестовая страница
</div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>