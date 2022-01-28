<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Localization\Loc;


if (!empty($arResult['SORT']['PROPERTIES'])) {
    $ceated = $arResult['SORT']['PROPERTIES']['created'];
    $price = $arResult['SORT']['PROPERTIES']['catalog_PRICE_1'];
}?>
<div class="d-flex justify-content-between flex-wrap">
    <div>
        <span class="select__text"><?= Loc::getMessage('SORT_BY_VALUE') ?>:</span>
        <div class="select">
            <div class="select__header">
                <span class="select__current">по умолчанию</span>
            </div>
            <ul class="select__body">
                <li class="select__item">
                    <a href="/actions/?sort=catalog_PRICE_1&order=asc" class="select__link">сначала дешёвые</a>
                </li>
                <li class="select__item">
                    <a href="/actions/?sort=catalog_PRICE_1&order=desc" class="select__link">сначала дорогие</a>
                </li>
                <li class="select__item">
                    <a href="/actions/?sort=created&order=asc" class="select__link">сначала новые</a>
                </li>
                <li class="select__item">
                    <a href="/actions/?sort=created&order=desc" class="select__link">сначала старые</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<script>
toggleSelect({
    selectSelector: '.actions .select',
    selectActiveClass: 'select_active',
    selectHeaderSelector: '.actions .select__header',
    selectBodySelector: '.actions .select__body',
    selectCurrentSelector: '.actions .select__current'
});
</script>
