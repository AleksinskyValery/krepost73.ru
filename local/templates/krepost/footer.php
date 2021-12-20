<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (defined('ERROR_404') || ERROR_404 == 'Y'){
    require_once("footer_404.php");
} else { ?>

    <?
    if (CSite::InDir('/news/')){ ?>
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
		"CHECK_DATES" => "Y",
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
			0 => "",
			1 => "ADVANTAGE_ICON",
			2 => "",
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

</main>
<footer class="footer">
<nav class="footer-menu">
        <div class="container container_p0">
            <ul class="row footer-menu__list footer-menu__list_1920">
                <li class="col-2 offset-1 offset-md-0 footer-menu__item">
                    <ul class="footer-menu__sublist">
                        <li class="footer-menu__subitem">
                            <a href="/page/novelties.html" class="footer-menu__sublink">Новинки</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/page/actions.html#hit" class="footer-menu__sublink">Лидеры продаж</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/page/actions.html" class="footer-menu__sublink">Акции</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/page/sale.html" class="footer-menu__sublink">Распродажа</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/page/company.html" class="footer-menu__sublink">О компании</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/page/services.html" class="footer-menu__sublink">Услуги</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/page/documents.html" class="footer-menu__sublink">Документы</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/page/delivery.html" class="footer-menu__sublink">Доставка и оплата</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/page/contacts.html" class="footer-menu__sublink">Контакты</a>
                        </li>
                    </ul>
                </li>
                <li class="col-4 offset-1 footer-menu__item">
                    <ul class="footer-menu__sublist">
                        <li class="footer-menu__subitem">
                            <a href="/category/Domofonnye-sistemy" class="footer-menu__sublink">Домофонные системы</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/category/Istochnik-elektropitaniya.-Akkumulyatory" class="footer-menu__sublink">Источники электропитания</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/category/svetilniki-avariinogo-osveshcheniya" class="footer-menu__sublink">Светильники аварийного освещения</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/category/sistema-videonabludeniya" class="footer-menu__sublink">Системы видеонаблюдения</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/category/Sredstva-pojarotusheniya" class="footer-menu__sublink">Средства пожаротушения</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/category/Rashodnye-i-montajnye-materialy.-Kabel-kanaly" class="footer-menu__sublink">Расходные и монтажные <br> материалы, кабель-каналы</a>
                        </li>
                    </ul>
                </li>
                <li class="col-4 offset-md-1 footer-menu__item">
                    <ul class="footer-menu__sublist">
                        <li class="footer-menu__subitem">
                            <a href="/category/Znaki-bezopasnosti" class="footer-menu__sublink">Знаки безопасности</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/category/Kontrol-upravleniya-dostupom" class="footer-menu__sublink">Контроль управления доступом</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/category/Dispetcherskii-kompleks-Ob" class="footer-menu__sublink">Диспетчерский комплекс ОБЬ</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/category/Kabelno-provodnikovaya-produkciya" class="footer-menu__sublink">Кабельно-проводниковая продукция</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/category/Ohranno-pojarnaya-signalizaciya" class="footer-menu__sublink">Охранно-пожарная сигнализация</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/category/Dveri-protivopojarnye" class="footer-menu__sublink">Двери противожарные</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/category/Dopolnitelnye-ustroistva" class="footer-menu__sublink">Дополнительные устройства</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="row footer-menu__list footer-menu__list_576">
                <li class="col-sm-5 col-6 footer-menu__item">
                    <ul class="footer-menu__sublist">
                        <li class="footer-menu__subitem">
                            <a href="/page/novelties.html" class="footer-menu__sublink">Новинки</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/page/actions.html#hit" class="footer-menu__sublink">Лидеры продаж</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/page/actions.html" class="footer-menu__sublink">Акции</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/page/sale.html" class="footer-menu__sublink">Распродажа</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/page/company.html" class="footer-menu__sublink">О компании</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/page/services.html" class="footer-menu__sublink">Услуги</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/page/documents.html" class="footer-menu__sublink">Документы</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/page/delivery.html" class="footer-menu__sublink">Доставка и оплата</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/page/contacts.html" class="footer-menu__sublink">Контакты</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/category/Domofonnye-sistemy" class="footer-menu__sublink">Домофонные системы</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/category/Istochnik-elektropitaniya.-Akkumulyatory" class="footer-menu__sublink">Источники электропитания</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/category/sistema-videonabludeniya" class="footer-menu__sublink">Системы видеонаблюдения</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/category/Sredstva-pojarotusheniya" class="footer-menu__sublink">Средства пожаротушения</a>
                        </li>
                    </ul>
                </li>
                <li class="col-6 offset--sm-1 footer-menu__item">
                    <ul class="footer-menu__sublist">
                        <li class="footer-menu__subitem">
                            <a href="/category/svetilniki-avariinogo-osveshcheniya" class="footer-menu__sublink">Светильники аварийного освещения</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/category/Rashodnye-i-montajnye-materialy.-Kabel-kanaly" class="footer-menu__sublink">Расходные и монтажные <br> материалы, кабель-каналы</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/category/Znaki-bezopasnosti" class="footer-menu__sublink">Знаки безопасности</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/category/Kontrol-upravleniya-dostupom" class="footer-menu__sublink">Контроль управления доступом</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/category/Dispetcherskii-kompleks-Ob" class="footer-menu__sublink">Диспетчерский комплекс ОБЬ</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/category/Kabelno-provodnikovaya-produkciya" class="footer-menu__sublink">Кабельно-проводниковая продукция</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/category/Ohranno-pojarnaya-signalizaciya" class="footer-menu__sublink">Охранно-пожарная сигнализация</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/category/Dveri-protivopojarnye" class="footer-menu__sublink">Двери противожарные</a>
                        </li>
                        <li class="footer-menu__subitem">
                            <a href="/category/Dopolnitelnye-ustroistva" class="footer-menu__sublink">Дополнительные устройства</a>
                        </li>
                    </ul>
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

</body>
</html>
<?}?>