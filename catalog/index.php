<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Основные категории");
?><div class="container">
<?$APPLICATION->IncludeComponent("bitrix:catalog", "catalog", Array(
	"ACTION_VARIABLE" => "action",	// Название переменной, в которой передается действие
		"ADD_ELEMENT_CHAIN" => "Y",	// Включать название элемента в цепочку навигации
		"ADD_PICT_PROP" => "MORE_PHOTO",	// Дополнительная картинка основного товара
		"ADD_PROPERTIES_TO_BASKET" => "N",	// Добавлять в корзину свойства товаров и предложений
		"ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
		"AJAX_MODE" => "N",	// Включить режим AJAX
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
		"BASKET_URL" => "/personal/basket.php",	// URL, ведущий на страницу с корзиной покупателя
		"BIG_DATA_RCM_TYPE" => "personal",	// Тип рекомендации
		"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"COMMON_ADD_TO_BASKET_ACTION" => "ADD",	// Показывать кнопку добавления в корзину или покупки
		"COMMON_SHOW_CLOSE_POPUP" => "Y",	// Показывать кнопку продолжения покупок во всплывающих окнах
		"COMPARE_ELEMENT_SORT_FIELD" => "sort",
		"COMPARE_ELEMENT_SORT_ORDER" => "asc",
		"COMPARE_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"COMPARE_NAME" => "CATALOG_COMPARE_LIST",
		"COMPARE_OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"COMPARE_POSITION" => "top left",
		"COMPARE_POSITION_FIXED" => "Y",
		"COMPATIBLE_MODE" => "N",	// Включить режим совместимости
		"CONVERT_CURRENCY" => "N",	// Показывать цены в одной валюте
		"DETAIL_ADD_DETAIL_TO_SLIDER" => "Y",	// Добавлять детальную картинку в слайдер
		"DETAIL_ADD_TO_BASKET_ACTION" => array(	// Показывать кнопки добавления в корзину и покупки на детальной странице товара
			0 => "BUY",
			1 => "ADD",
		),
		"DETAIL_ADD_TO_BASKET_ACTION_PRIMARY" => array(	// Выделять кнопки добавления в корзину и покупки на детальной странице товара
			0 => "BUY",
		),
		"DETAIL_BACKGROUND_IMAGE" => "-",	// Установить фоновую картинку для шаблона из свойства
		"DETAIL_BRAND_USE" => "N",	// Использовать компонент "Бренды"
		"DETAIL_BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства
		"DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",	// Использовать код группы из переменной, если не задан раздел элемента
		"DETAIL_DETAIL_PICTURE_MODE" => array(	// Режим показа детальной картинки
			0 => "POPUP",
		),
		"DETAIL_DISPLAY_NAME" => "N",	// Выводить название элемента
		"DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "E",	// Показ описания для анонса на детальной странице
		"DETAIL_IMAGE_RESOLUTION" => "1by1",	// Соотношение сторон изображения товара
		"DETAIL_META_DESCRIPTION" => "-",	// Установить описание страницы из свойства
		"DETAIL_META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства
		"DETAIL_OFFERS_FIELD_CODE" => array(	// Поля предложений
			0 => "",
			1 => "",
		),
		"DETAIL_PRODUCT_INFO_BLOCK_ORDER" => "sku,props",	// Порядок отображения блоков информации о товаре
		"DETAIL_PRODUCT_PAY_BLOCK_ORDER" => "rating,price,priceRanges,quantityLimit,quantity,buttons",	// Порядок отображения блоков покупки товара
		"DETAIL_SET_CANONICAL_URL" => "Y",	// Устанавливать канонический URL
		"DETAIL_SET_VIEWED_IN_COMPONENT" => "N",	// Включить сохранение информации о просмотре товара на детальной странице для старых шаблонов
		"DETAIL_SHOW_POPULAR" => "Y",	// Показывать блок "Популярное в разделе"
		"DETAIL_SHOW_SLIDER" => "Y",	// Показывать слайдер для товаров
		"DETAIL_SHOW_VIEWED" => "Y",	// Показывать блок "Просматривали"
		"DETAIL_SLIDER_INTERVAL" => "5000",	// Интервал смены слайдов, мс
		"DETAIL_SLIDER_PROGRESS" => "Y",	// Показывать полосу прогресса
		"DETAIL_STRICT_SECTION_CHECK" => "Y",	// Строгая проверка раздела для детального показа элемента
		"DETAIL_USE_COMMENTS" => "N",	// Включить отзывы о товаре
		"DETAIL_USE_VOTE_RATING" => "N",	// Включить рейтинг товара
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",	// Не подключать js-библиотеки в компоненте
		"DISCOUNT_PERCENT_POSITION" => "bottom-right",	// Расположение процента скидки
		"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
		"DISPLAY_ELEMENT_SELECT_BOX" => "N",
		"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
		"ELEMENT_SORT_FIELD" => "sort",	// По какому полю сортируем товары в разделе
		"ELEMENT_SORT_FIELD2" => "name",	// Поле для второй сортировки товаров в разделе
		"ELEMENT_SORT_ORDER" => "asc",	// Порядок сортировки товаров в разделе
		"ELEMENT_SORT_ORDER2" => "desc",	// Порядок второй сортировки товаров в разделе
		"FIELDS" => array(	// Поля
			0 => "",
			1 => "",
		),
		"FILTER_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_HIDE_ON_MOBILE" => "N",	// Скрывать умный фильтр на мобильных устройствах
		"FILTER_NAME" => "",
		"FILTER_OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_OFFERS_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_PRICE_CODE" => array(
			0 => "BASE",
		),
		"FILTER_PROPERTY_CODE" => array(
			0 => "CML2_MANUFACTURER",
			1 => "CML2_ATTRIBUTES",
			2 => "",
		),
		"FILTER_VIEW_MODE" => "VERTICAL",	// Вид отображения умного фильтра
		"GIFTS_DETAIL_BLOCK_TITLE" => "Выберите один из подарков",
		"GIFTS_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => "4",
		"GIFTS_DETAIL_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => "Выберите один из товаров, чтобы получить подарок",
		"GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => "4",
		"GIFTS_MESS_BTN_BUY" => "Выбрать",
		"GIFTS_SECTION_LIST_BLOCK_TITLE" => "Подарки к товарам этого раздела",
		"GIFTS_SECTION_LIST_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_SECTION_LIST_PAGE_ELEMENT_COUNT" => "4",
		"GIFTS_SECTION_LIST_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
		"GIFTS_SHOW_IMAGE" => "Y",
		"GIFTS_SHOW_NAME" => "Y",
		"GIFTS_SHOW_OLD_PRICE" => "Y",
		"HIDE_NOT_AVAILABLE" => "L",	// Недоступные товары
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",	// Недоступные торговые предложения
		"IBLOCK_ID" => "16",	// Инфоблок
		"IBLOCK_TYPE" => "1c_catalog",	// Тип инфоблока
		"INCLUDE_SUBSECTIONS" => "N",	// Показывать элементы подразделов раздела
		"INSTANT_RELOAD" => "N",	// Мгновенная фильтрация при включенном AJAX
		"LABEL_PROP" => "",	// Свойство меток товара
		"LAZY_LOAD" => "Y",	// Показать кнопку ленивой загрузки Lazy Load
		"LINE_ELEMENT_COUNT" => "3",	// Количество элементов, выводимых в одной строке таблицы
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",	// URL на страницу, где будет показан список связанных элементов
		"LINK_IBLOCK_ID" => "",	// ID инфоблока, элементы которого связаны с текущим элементом
		"LINK_IBLOCK_TYPE" => "",	// Тип инфоблока, элементы которого связаны с текущим элементом
		"LINK_PROPERTY_SID" => "",	// Свойство, в котором хранится связь
		"LIST_BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства раздела
		"LIST_ENLARGE_PRODUCT" => "STRICT",	// Выделять товары в списке
		"LIST_META_DESCRIPTION" => "-",	// Установить описание страницы из свойства раздела
		"LIST_META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства раздела
		"LIST_OFFERS_FIELD_CODE" => array(	// Поля предложений
			0 => "",
			1 => "",
		),
		"LIST_OFFERS_LIMIT" => "5",
		"LIST_PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",	// Порядок отображения блоков товара
		"LIST_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false}]",	// Вариант отображения товаров
		"LIST_SHOW_SLIDER" => "Y",	// Показывать слайдер для товаров
		"LIST_SLIDER_INTERVAL" => "3000",	// Интервал смены слайдов, мс
		"LIST_SLIDER_PROGRESS" => "Y",	// Показывать полосу прогресса
		"LOAD_ON_SCROLL" => "N",	// Подгружать товары при прокрутке до конца
		"MAIN_TITLE" => "В наличии",	// Заголовок блока
		"MESSAGE_404" => "",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",	// Текст кнопки "Добавить в корзину"
		"MESS_BTN_BUY" => "Купить",	// Текст кнопки "Купить"
		"MESS_BTN_COMPARE" => "Сравнение",	// Текст кнопки "Сравнение"
		"MESS_BTN_DETAIL" => "Подробнее",	// Текст кнопки "Подробнее"
		"MESS_BTN_LAZY_LOAD" => "Показать ещё",	// Текст кнопки "Показать ещё"
		"MESS_BTN_SUBSCRIBE" => "Подписаться",	// Текст кнопки "Уведомить о поступлении"
		"MESS_COMMENTS_TAB" => "Комментарии",	// Текст вкладки "Комментарии"
		"MESS_DESCRIPTION_TAB" => "Описание",	// Текст вкладки "Описание"
		"MESS_NOT_AVAILABLE" => "Нет в наличии",	// Сообщение об отсутствии товара
		"MESS_PRICE_RANGES_TITLE" => "Цены",	// Название блока c расширенными ценами
		"MESS_PROPERTIES_TAB" => "Характеристики",	// Текст вкладки "Характеристики"
		"MESS_SHOW_MAX_QUANTITY" => "Наличие",	// Текст для остатка
		"MIN_AMOUNT" => "2",	// Значение, ниже которого выводится "мало"
		"OFFERS_SORT_FIELD" => "sort",	// По какому полю сортируем предложения товара
		"OFFERS_SORT_FIELD2" => "id",	// Поле для второй сортировки предложений товара
		"OFFERS_SORT_ORDER" => "asc",	// Порядок сортировки предложений товара
		"OFFERS_SORT_ORDER2" => "desc",	// Порядок второй сортировки предложений товара
		"OFFER_ADD_PICT_PROP" => "-",	// Дополнительные картинки предложения
		"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
		"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
		"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
		"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
		"PAGER_TEMPLATE" => "modern",	// Шаблон постраничной навигации
		"PAGER_TITLE" => "Товары",	// Название категорий
		"PAGE_ELEMENT_COUNT" => "8",	// Количество элементов на странице
		"PARTIAL_PRODUCT_PROPERTIES" => "N",	// Разрешить добавлять в корзину товары, у которых заполнены не все характеристики
		"PRICE_CODE" => array(	// Тип цены
			0 => "BASE",
		),
		"PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
		"PRICE_VAT_SHOW_VALUE" => "N",	// Отображать значение НДС
		"PRODUCT_DISPLAY_MODE" => "Y",	// Схема отображения
		"PRODUCT_ID_VARIABLE" => "id",	// Название переменной, в которой передается код товара для покупки
		"PRODUCT_PROPS_VARIABLE" => "prop",	// Название переменной, в которой передаются характеристики товара
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",	// Название переменной, в которой передается количество товара
		"PRODUCT_SUBSCRIPTION" => "Y",	// Разрешить оповещения для отсутствующих товаров
		"SEARCH_CHECK_DATES" => "Y",	// Искать только в активных по дате документах
		"SEARCH_NO_WORD_LOGIC" => "Y",	// Отключить обработку слов как логических операторов
		"SEARCH_PAGE_RESULT_COUNT" => "50",	// Количество результатов на странице
		"SEARCH_RESTART" => "N",	// Искать без учета морфологии (при отсутствии результата поиска)
		"SEARCH_USE_LANGUAGE_GUESS" => "Y",	// Включить автоопределение раскладки клавиатуры
		"SEARCH_USE_SEARCH_RESULT_ORDER" => "Y",	// Использовать сортировку результатов по релевантности
		"SECTIONS_SHOW_PARENT_NAME" => "N",	// Показывать название раздела
		"SECTIONS_VIEW_MODE" => "TILE",	// Вид списка подразделов
		"SECTION_ADD_TO_BASKET_ACTION" => "ADD",	// Показывать кнопку добавления в корзину или покупки на странице списка товаров
		"SECTION_BACKGROUND_IMAGE" => "-",	// Установить фоновую картинку для шаблона из свойства
		"SECTION_COUNT_ELEMENTS" => "Y",	// Показывать количество элементов в разделе
		"SECTION_ID_VARIABLE" => "SECTION_ID",	// Название переменной, в которой передается код группы
		"SECTION_TOP_DEPTH" => "1",	// Максимальная отображаемая глубина разделов
		"SEF_FOLDER" => "/catalog/",	// Каталог ЧПУ (относительно корня сайта)
		"SEF_MODE" => "Y",	// Включить поддержку ЧПУ
		"SET_LAST_MODIFIED" => "Y",	// Устанавливать в заголовках ответа время модификации страницы
		"SET_STATUS_404" => "Y",	// Устанавливать статус 404
		"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
		"SHOW_404" => "Y",	// Показ специальной страницы
		"SHOW_DEACTIVATED" => "N",	// Показывать деактивированные товары
		"SHOW_DISCOUNT_PERCENT" => "Y",	// Показывать процент скидки
		"SHOW_EMPTY_STORE" => "N",	// Отображать склад при отсутствии на нем товара
		"SHOW_GENERAL_STORE_INFORMATION" => "N",	// Показывать общую информацию по складам
		"SHOW_MAX_QUANTITY" => "Y",	// Показывать остаток товара
		"SHOW_OLD_PRICE" => "Y",	// Показывать старую цену
		"SHOW_PRICE_COUNT" => "1",	// Выводить цены для количества
		"SHOW_SKU_DESCRIPTION" => "N",	// Отображать описание для каждого торгового предложения
		"SHOW_TOP_ELEMENTS" => "N",	// Выводить топ элементов
		"SIDEBAR_DETAIL_SHOW" => "N",	// Показывать боковую панель на детальной странице
		"SIDEBAR_PATH" => "",	// Путь к включаемой области для вывода информации в боковой панели
		"SIDEBAR_SECTION_SHOW" => "N",	// Показывать боковую панель в списке товаров
		"STORES" => array(	// Склады
			0 => "1",
			1 => "",
		),
		"STORE_PATH" => "/contacts/#store_id#",	// Шаблон пути к каталогу STORE (относительно корня)
		"TEMPLATE_THEME" => "",	// Цветовая тема
		"TOP_ADD_TO_BASKET_ACTION" => "ADD",	// Показывать кнопку добавления в корзину или покупки на странице с top'ом товаров
		"TOP_ELEMENT_COUNT" => "8",
		"TOP_ELEMENT_SORT_FIELD" => "sort",
		"TOP_ELEMENT_SORT_FIELD2" => "id",
		"TOP_ELEMENT_SORT_ORDER" => "asc",
		"TOP_ELEMENT_SORT_ORDER2" => "desc",
		"TOP_ENLARGE_PRODUCT" => "STRICT",
		"TOP_LINE_ELEMENT_COUNT" => "3",
		"TOP_OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"TOP_OFFERS_LIMIT" => "5",
		"TOP_PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"TOP_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false}]",
		"TOP_SHOW_SLIDER" => "Y",
		"TOP_SLIDER_INTERVAL" => "3000",
		"TOP_SLIDER_PROGRESS" => "N",
		"TOP_VIEW_MODE" => "SECTION",
		"USER_CONSENT" => "Y",	// Запрашивать согласие
		"USER_CONSENT_ID" => "1",	// Соглашение
		"USER_CONSENT_IS_CHECKED" => "Y",	// Галка по умолчанию проставлена
		"USER_CONSENT_IS_LOADED" => "N",	// Загружать текст сразу
		"USER_FIELDS" => array(	// Пользовательские поля
			0 => "",
			1 => "",
		),
		"USE_BIG_DATA" => "Y",	// Показывать персональные рекомендации
		"USE_COMMON_SETTINGS_BASKET_POPUP" => "N",	// Одинаковые настройки показа кнопок добавления в корзину или покупки на всех страницах
		"USE_COMPARE" => "N",	// Разрешить сравнение товаров
		"USE_ELEMENT_COUNTER" => "Y",	// Использовать счетчик просмотров
		"USE_ENHANCED_ECOMMERCE" => "N",	// Включить отправку данных в электронную торговлю
		"USE_FILTER" => "N",	// Показывать фильтр
		"USE_GIFTS_DETAIL" => "N",	// Показывать блок "Подарки" в детальном просмотре
		"USE_GIFTS_MAIN_PR_SECTION_LIST" => "N",	// Показывать блок "Товары к подарку" в детальном просмотре
		"USE_GIFTS_SECTION" => "N",	// Показывать блок "Подарки" в списке
		"USE_MAIN_ELEMENT_SECTION" => "Y",	// Использовать основной раздел для показа элемента
		"USE_MIN_AMOUNT" => "Y",	// Показывать вместо точного количества информацию о достаточности
		"USE_PRICE_COUNT" => "N",	// Использовать вывод цен с диапазонами
		"USE_PRODUCT_QUANTITY" => "Y",	// Разрешить указание количества товара
		"USE_REVIEW" => "N",
		"USE_SALE_BESTSELLERS" => "Y",	// Показывать список лидеров продаж
		"USE_STORE" => "Y",	// Показывать блок "Количество товара на складе"
		"COMPONENT_TEMPLATE" => "bootstrap_v4",
		"SIDEBAR_SECTION_POSITION" => "right",	// Расположение боковой панели в списке товаров
		"SIDEBAR_DETAIL_POSITION" => "right",	// Расположение боковой панели на детальной странице
		"SECTIONS_HIDE_SECTION_NAME" => "N",	// Не показывать названия подразделов
		"FILE_404" => "",	// Страница для показа (по умолчанию /404.php)
		"SEF_URL_TEMPLATES" => array(
			"sections" => "",
			"section" => "#SECTION_CODE#/",
			"element" => "#SECTION_CODE#/#ELEMENT_CODE#/",
			"compare" => "compare.php?action=#ACTION_CODE#",
			"smart_filter" => "#SECTION_CODE#/filter/#SMART_FILTER_PATH#/apply/",
		),
		"VARIABLE_ALIASES" => array(
			"compare" => array(
				"ACTION_CODE" => "action",
			),
		)
	),
	false
);?>
</div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>