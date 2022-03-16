<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$CurDir = $APPLICATION->GetCurDir();
$CurUri = $APPLICATION->GetCurUri();
$IsMainPage = $APPLICATION->GetCurPage(false) == SITE_DIR;
?>
<!doctype html>
<html lang="ru">
<head>
<?
use Bitrix\Main\Page\Asset;
CUtil::InitJSCore();
CJSCore::Init(array("fx"));
CJSCore::Init(array('ajax')); CJSCore::Init(array("popup"));
$APPLICATION->ShowHead();
// Подключение CSS
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/bootstrap/bootstrap.min.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/bootstrap/mdb.min.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/main.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/new.css');
Asset::getInstance()->addString("<link href='//fonts.googleapis.com/css?family=Roboto:300,regular,500,700' rel='stylesheet' type='text/css'>");
Asset::getInstance()->addString("<link href='//fonts.googleapis.com/css2?family=Oswald&display=swap' rel='stylesheet' type='text/css'>");
// Подключение JS
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/appscripts.js');
Asset::getInstance()->addString('<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">');
Asset::getInstance()->addString('<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">');
?>
<title>ГК "Крепость" || <? $APPLICATION->ShowTitle() ?></title>
</head>
<body>

<?
$APPLICATION->ShowPanel();
?>

<header class="header">
    <div class="header-info">
        <div class="container container_p0">
            <div class="row">
                <div class="col-sm-2 col-12">
                    <div class="header-info__logo-wrapper">
                        <?if($IsMainPage):?>
                            <span class="header-info__logo-link">
                        <?else:?>
                            <a href="/" class="header-info__logo-link">
                        <?endif;?>
                                <img class="header-info__logo logo" src="<?= SITE_TEMPLATE_PATH ?>/img/main/logo.svg" alt="Группа компаний Крепость">
                        <?if($IsMainPage):?>
                            </span>
                        <?else:?>
                            </a>
                        <?endif;?>
                    </div>
                </div>
<?if ($GLOBALS["APPLICATION"]->GetCurPage() == "/"):?>
<div class="col-lg-7 search-without-catalogue">
<?$APPLICATION->IncludeComponent(
	"bitrix:search.title", 
	"search-title", 
	array(
		"CATEGORY_0" => array(
			0 => "iblock_main",
			1 => "iblock_delivery",
			2 => "iblock_1c_catalog",
		),
		"CATEGORY_0_TITLE" => "",
		"CATEGORY_0_iblock_1c_catalog" => array(
			0 => "29",
			1 => "30",
		),
		"CHECK_DATES" => "N",
		"CONTAINER_ID" => "title-search",
		"CONVERT_CURRENCY" => "N",
		"INPUT_ID" => "title-search-input",
		"NUM_CATEGORIES" => "1",
		"ORDER" => "date",
		"PAGE" => "#SITE_DIR#search/index.php",
		"PREVIEW_HEIGHT" => "75",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PREVIEW_WIDTH" => "75",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"SHOW_INPUT" => "Y",
		"SHOW_OTHERS" => "N",
		"SHOW_PREVIEW" => "Y",
		"TEMPLATE_THEME" => "",
		"TOP_COUNT" => "5",
		"USE_LANGUAGE_GUESS" => "Y",
		"COMPONENT_TEMPLATE" => "search-title",
		"CATEGORY_0_iblock_main" => array(
			0 => "4",
			1 => "8",
			2 => "9",
			3 => "19",
		),
		"CATEGORY_0_iblock_delivery" => array(
			0 => "all",
		)
	),
	false
);?>
</div>
<?else:?>
    <div class="col-md-1 col-2 catalogue">
    <button class="header-info__catalogue-open">
        <span class="header-info__catalogue-open-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
        <span class="header-info__catalogue-open-text">Каталог</span>
    </button>
    <div class="header-info__catalogue">
<?$APPLICATION->IncludeComponent("bitrix:menu", "catalog-top", Array(
	"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
		"CHILD_MENU_TYPE" => "subcatalog-top",	// Тип меню для остальных уровней
		"COMPONENT_TEMPLATE" => "catalog",
		"DELAY" => "N",	// Откладывать выполнение шаблона меню
		"MAX_LEVEL" => "2",	// Уровень вложенности меню
		"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
		"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"MENU_CACHE_TYPE" => "N",	// Тип кеширования
		"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
		"ROOT_MENU_TYPE" => "catalog-top",	// Тип меню для первого уровня
		"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
	),
	false
);?>
    </div>
</div>
<div class="col-md-5 col-sm-10 col-12 offset-lg-1 offset-md-0 offset-sm-2 offset-0 search-with-catalogue">
<?$APPLICATION->IncludeComponent(
	"bitrix:search.title", 
	"search-title", 
	array(
		"CATEGORY_0" => array(
			0 => "main",
			1 => "iblock_main",
			2 => "iblock_delivery",
			3 => "iblock_1c_catalog",
		),
		"CATEGORY_0_TITLE" => "Каталог",
		"CATEGORY_0_iblock_1c_catalog" => array(
			0 => "29",
		),
		"CHECK_DATES" => "N",
		"CONTAINER_ID" => "title-search",
		"CONVERT_CURRENCY" => "N",
		"INPUT_ID" => "title-search-input",
		"NUM_CATEGORIES" => "1",
		"ORDER" => "date",
		"PAGE" => "#SITE_DIR#search/index.php",
		"PREVIEW_HEIGHT" => "75",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PREVIEW_WIDTH" => "75",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"SHOW_INPUT" => "Y",
		"SHOW_OTHERS" => "Y",
		"SHOW_PREVIEW" => "Y",
		"TEMPLATE_THEME" => "",
		"TOP_COUNT" => "5",
		"USE_LANGUAGE_GUESS" => "Y",
		"COMPONENT_TEMPLATE" => "search-title",
		"CATEGORY_OTHERS_TITLE" => "",
		"CATEGORY_0_main" => array(
		),
		"CATEGORY_0_iblock_main" => array(
			0 => "4",
			1 => "8",
			2 => "9",
			3 => "19",
		),
		"CATEGORY_0_iblock_delivery" => array(
			0 => "all",
		)
	),
	false
);?>
</div>
<?endif;?>
                <div class="col-2 header-info__phones-wrapper">
                    <ul class="header-info__phones-list">
                        <li class="header-info__phones-item">
                            <?$APPLICATION->IncludeFile(
                                SITE_DIR."include/phone_number.php",
                                array(),
                                array(
                                     "MODE" => "text"
                                )
                            );?>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-1 col-2 header-info__user-wrapper">
                    <ul class="header-info__user-list">
                        <li class="header-info__user-item">
						<?$APPLICATION->IncludeComponent(
							"bitrix:system.auth.form",
							"emarket_auth",
							Array(
								"FORGOT_PASSWORD_URL" => "",
								"PROFILE_URL" => SITE_DIR."personal/",
								"REGISTER_URL" => SITE_DIR."auth/",
								"SHOW_ERRORS" => "N"
							)
						);?>
                        </li>
                        <li class="header-info__user-item">
							<?$APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket.line", 
	"header_cart", 
	array(
		"HIDE_ON_BASKET_PAGES" => "N",
		"PATH_TO_AUTHORIZE" => "",
		"PATH_TO_BASKET" => SITE_DIR."personal/cart/",
		"PATH_TO_ORDER" => SITE_DIR."personal/order/make/",
		"PATH_TO_PERSONAL" => SITE_DIR."personal/",
		"PATH_TO_PROFILE" => SITE_DIR."personal/",
		"PATH_TO_REGISTER" => SITE_DIR."login/",
		"POSITION_FIXED" => "N",
		"SHOW_AUTHOR" => "N",
		"SHOW_EMPTY_VALUES" => "Y",
		"SHOW_NUM_PRODUCTS" => "Y",
		"SHOW_PERSONAL_LINK" => "N",
		"SHOW_PRODUCTS" => "N",
		"SHOW_REGISTRATION" => "N",
		"SHOW_TOTAL_PRICE" => "N",
		"COMPONENT_TEMPLATE" => "header_cart"
	),
	false
);?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?$APPLICATION->IncludeComponent(
        "bitrix:menu",
        "top_menu",
        Array(
            "ALLOW_MULTI_SELECT" => "N",
            "CHILD_MENU_TYPE" => "left",
            "COMPONENT_TEMPLATE" => ".default",
            "DELAY" => "N",
            "MAX_LEVEL" => "1",
            "MENU_CACHE_GET_VARS" => "",
            "MENU_CACHE_TIME" => "3600",
            "MENU_CACHE_TYPE" => "N",
            "MENU_CACHE_USE_GROUPS" => "Y",
            "ROOT_MENU_TYPE" => "top",
            "USE_EXT" => "N"
        )
    );?>
</header>

<?if(!$IsMainPage):?>
    <?$APPLICATION->IncludeComponent(
        "bitrix:breadcrumb",
        "breadcrumbs",
        Array(
            "PATH" => "",
            "SITE_ID" => "s1",
            "START_FROM" => "0"
        )
    );?>
<?endif?>

<? if (defined('ERROR_404') || ERROR_404 == 'Y'){?>
	<section class="not-found">
	<div class="container">
		<h1 class="titleH1"><? $APPLICATION->ShowTitle(false) ?></h1>
	</div>
<?} else { ?>
<main class="main">
	<?if(!$IsMainPage):?>
	<div class="container title_wrap">
		<h1 class="titleH1 titleH1_mt"><? $APPLICATION->ShowTitle(false) ?></h1>
	</div>
	<?endif?>
<?}?>