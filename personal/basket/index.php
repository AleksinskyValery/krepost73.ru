<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Корзина");
?><?$APPLICATION->IncludeComponent("bitrix:sale.basket.basket", "basket-big", Array(
	"ACTION_VARIABLE" => "basketAction",	// Название переменной действия
		"AUTO_CALCULATION" => "Y",	// Автопересчет корзины
		"COLUMNS_LIST" => array(
			0 => "NAME",
			1 => "DELETE",
			2 => "PRICE",
			3 => "QUANTITY",
			4 => "SUM",
			5 => "PROPERTY_EMARKET_PREVIEW_CH",
		),
		"COUNT_DISCOUNT_4_ALL_QUANTITY" => "Y",
		"GIFTS_BLOCK_TITLE" => "Выберите один из подарков",	// Текст заголовка "Подарки"
		"GIFTS_CONVERT_CURRENCY" => "N",	// Показывать цены в одной валюте
		"GIFTS_HIDE_BLOCK_TITLE" => "N",	// Скрыть заголовок "Подарки"
		"GIFTS_HIDE_NOT_AVAILABLE" => "N",	// Не отображать товары, которых нет на складах
		"GIFTS_MESS_BTN_BUY" => "Выбрать",	// Текст кнопки "Выбрать"
		"GIFTS_MESS_BTN_DETAIL" => "Подробнее",	// Текст кнопки "Подробнее"
		"GIFTS_PAGE_ELEMENT_COUNT" => "4",	// Количество элементов в строке
		"GIFTS_PLACE" => "BOTTOM",	// Вывод блока "Подарки"
		"GIFTS_PRODUCT_PROPS_VARIABLE" => "prop",	// Название переменной, в которой передаются характеристики товара
		"GIFTS_PRODUCT_QUANTITY_VARIABLE" => "",	// Название переменной, в которой передается количество товара
		"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",	// Показывать процент скидки
		"GIFTS_SHOW_IMAGE" => "Y",
		"GIFTS_SHOW_NAME" => "Y",
		"GIFTS_SHOW_OLD_PRICE" => "Y",	// Показывать старую цену
		"GIFTS_TEXT_LABEL_GIFT" => "Подарок",	// Текст метки "Подарка"
		"HIDE_COUPON" => "N",	// Спрятать поле ввода купона
		"OFFERS_PROPS" => "",
		"PATH_TO_ORDER" => "/personal/order/",	// Страница оформления заказа
		"PRICE_VAT_SHOW_VALUE" => "N",	// Отображать значение НДС
		"QUANTITY_FLOAT" => "N",	// Использовать дробное значение количества
		"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
		"TEMPLATE_THEME" => "",	// Цветовая тема
		"USE_GIFTS" => "Y",	// Показывать блок "Подарки"
		"USE_PREPAYMENT" => "N",	// Использовать предавторизацию для оформления заказа (PayPal Express Checkout)
		"COMPONENT_TEMPLATE" => "bootstrap_v4",
		"DEFERRED_REFRESH" => "N",	// Использовать механизм отложенной актуализации данных товаров с провайдером
		"USE_DYNAMIC_SCROLL" => "Y",	// Использовать динамическую подгрузку товаров
		"SHOW_FILTER" => "Y",	// Отображать фильтр товаров
		"SHOW_RESTORE" => "Y",	// Разрешить восстановление удалённых товаров
		"COLUMNS_LIST_EXT" => array(	// Выводимые колонки
			0 => "PREVIEW_PICTURE",
			1 => "DISCOUNT",
			2 => "DELETE",
			3 => "DELAY",
			4 => "TYPE",
			5 => "SUM",
		),
		"COLUMNS_LIST_MOBILE" => array(	// Колонки, отображаемые на мобильных устройствах
			0 => "PREVIEW_PICTURE",
			1 => "DISCOUNT",
			2 => "DELETE",
			3 => "DELAY",
			4 => "TYPE",
			5 => "SUM",
		),
		"TOTAL_BLOCK_DISPLAY" => array(	// Отображение блока с общей информацией по корзине
			0 => "bottom",
		),
		"DISPLAY_MODE" => "extended",	// Режим отображения корзины
		"PRICE_DISPLAY_MODE" => "Y",	// Отображать цену в отдельной колонке
		"SHOW_DISCOUNT_PERCENT" => "Y",	// Показывать процент скидки рядом с изображением
		"DISCOUNT_PERCENT_POSITION" => "bottom-right",	// Расположение процента скидки
		"PRODUCT_BLOCKS_ORDER" => "props,sku,columns",	// Порядок отображения блоков товара
		"USE_PRICE_ANIMATION" => "Y",	// Использовать анимацию цен
		"LABEL_PROP" => "",	// Свойства меток товара
		"CORRECT_RATIO" => "Y",	// Автоматически рассчитывать количество товара кратное коэффициенту
		"COMPATIBLE_MODE" => "Y",	// Включить режим совместимости
		"EMPTY_BASKET_HINT_PATH" => "/",	// Путь к странице для продолжения покупок
		"ADDITIONAL_PICT_PROP_16" => "-",	// Дополнительная картинка [1C]
		"ADDITIONAL_PICT_PROP_17" => "-",	// Дополнительная картинка [Пакет предложений (1C)]
		"BASKET_IMAGES_SCALING" => "adaptive",	// Режим отображения изображений товаров
		"USE_ENHANCED_ECOMMERCE" => "N",	// Отправлять данные электронной торговли в Google и Яндекс
	),
	false
);?> <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>