<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (defined('ERROR_404') || ERROR_404 == 'Y'){?>
</section>
    <?require_once("footer_404.php");
} else {
    if (CSite::InDir('/news/')||CSite::InDir('/catalog/')||CSite::InDir('/auth/')){ ?>
     <?} else { ?>
        <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"advantages", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "N",
		"COMPONENT_TEMPLATE" => "advantages",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "5",
		"IBLOCK_TYPE" => "main",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "100",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "ADVANTAGE_POPUP",
			1 => "ADVANTAGE_LINK",
			2 => "ADVANTAGE_ICON",
			3 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	),
	false
);?>
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
);?>
<?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new",
	"callback_footer",
	Array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"EDIT_URL" => "",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LIST_URL" => "",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "Y",
		"VARIABLE_ALIASES" => array("RESULT_ID"=>"RESULT_ID","WEB_FORM_ID"=>"WEB_FORM_ID",),
		"WEB_FORM_ID" => "1"
	)
);?>
    <?}?>
	</div>
</main>
<footer class="footer">
<nav class="footer-menu">
        <div class="container container_p0">
            <ul class="row footer-menu__list footer-menu__list_1920">
                <li class="col-2 offset-1 offset-md-0 footer-menu__item">
<?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"bottom",
	Array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "",
		"COMPONENT_TEMPLATE" => ".default",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => "",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "bottom1",
		"USE_EXT" => "N"
	)
);?>
                </li>
                <li class="col-4 offset-1 footer-menu__item">
<?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"bottom",
	Array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(""),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "bottom2",
		"USE_EXT" => "N"
	)
);?>
                </li>
                <li class="col-4 offset-md-1 footer-menu__item">
<?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"bottom",
	Array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(""),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "bottom3",
		"USE_EXT" => "N"
	)
);?>
                </li>
            </ul>

            <ul class="row footer-menu__list footer-menu__list_576">
                <li class="col-sm-5 col-6 footer-menu__item">
<?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"bottom",
	Array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "",
		"COMPONENT_TEMPLATE" => ".default",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => "",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "bottom1",
		"USE_EXT" => "N"
	)
);?>
                </li>
                <li class="col-6 offset--sm-1 footer-menu__item">
<?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"bottom",
	Array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(""),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "bottom2",
		"USE_EXT" => "N"
	)
);?>
<br>
<?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"bottom",
	Array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(""),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "bottom3",
		"USE_EXT" => "N"
	)
);?>
                </li>
            </ul>
        </div>
    </nav>
    <div class="footer-info">
        <div class="container container_p0">
            <div class="footer-info__main">
            <?if($IsMainPage):?>
                <span class="footer-info__logo-link">
            <?else:?>
                <a href="/" class="footer-info__logo-link">
            <?endif;?>
                    <img class="footer-info__logo" src="<?= SITE_TEMPLATE_PATH ?>/img/main/logo.svg" alt="Группа компаний Крепость">
            <?if($IsMainPage):?>
                </span>
            <?else:?>
                </a>
            <?endif;?>

                <ul class="footer-info__social-list">
                    <li class="footer-info__social-item">
                        <a href="https://instagram.com/krepost.73" class="footer-info__social-link" target="_blank">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/img/main/icons/footer-social-inst.svg" alt="Инстаграм" class="footer-info__social-img">
                        </a>
                    </li>
                    <li class="footer-info__social-item">
                        <a href="https://vk.com/krepost73" class="footer-info__social-link" target="_blank">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/img/main/icons/footer-social-vk.svg" alt="Вконтакте" class="footer-info__social-img">
                        </a>
                    </li>
                    <li class="footer-info__social-item">
                        <a href="https://ok.ru/group/54937615007827?st._aid=ExternalGroupWidget_OpenGroup" class="footer-info__social-link" target="_blank">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/img/main/icons/footer-social-ok.svg" alt="Одноклассники" class="footer-info__social-img">
                        </a>
                    </li>
                </ul>
                <ul class="footer-info__contacts-list">
                    <li class="footer-info__contacts-item">
                        <?$APPLICATION->IncludeFile(
                            SITE_DIR."include/phone_number.php",
                            array(),
                            array(
                                "MODE" => "text"
                            )
                        );?>
                    </li>
                    <li class="footer-info__contacts-item">
                        <?$APPLICATION->IncludeFile(
                            SITE_DIR."include/main_email.php",
                            array(),
                            array(
                                "MODE" => "text"
                            )
                        );?>
                    </li>
                </ul>
            </div>
            <div class="footer-info__copyright-wrapper">
                <p class="footer-info__copyright">© 2013 - <?php echo date( 'Y' ); ?> <?$APPLICATION->IncludeFile(
                        SITE_DIR."include/copyright_text.php",
                        array(),
                        array(
                            "MODE" => "text"
                        )
                    );?></p>
                <a href="https://agatech.ru/" class="footer-info__copyright-link" target="_blank">
                    <img class="footer-info__copyright-img" src="<?= SITE_TEMPLATE_PATH ?>/img/main/footer-agatech.png" alt="AGATECH">
                </a>
            </div>
        </div>
    </div>
</footer>
<?// Меню для мобильных
$APPLICATION->IncludeComponent("bitrix:menu", "mobile", Array(
	"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
		"CHILD_MENU_TYPE" => "",	// Тип меню для остальных уровней
		"DELAY" => "N",	// Откладывать выполнение шаблона меню
		"MAX_LEVEL" => "1",	// Уровень вложенности меню
		"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
		"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"MENU_CACHE_TYPE" => "N",	// Тип кеширования
		"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
		"ROOT_MENU_TYPE" => "mobile",	// Тип меню для первого уровня
		"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
		"COMPONENT_TEMPLATE" => "catalog"
	),
	false
);?>

</body>
</html>
<?}?>