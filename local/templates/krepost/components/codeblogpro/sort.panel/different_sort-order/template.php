<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Localization\Loc;

if (!empty($arResult['SORT']['PROPERTIES'])) {
    $ceated = $arResult['SORT']['PROPERTIES']['created'];
    $price = $arResult['SORT']['PROPERTIES']['catalog_PRICE_1'];
    ?>
    <?= Loc::getMessage('SORT_BY_VALUE') ?>:<br>
    <a href="<?= $ceated['URL']; ?>">Переключение сортировки по новизне</a><br>
    <a href="<?= $price['URL']; ?>">Переключение сортировки по цене</a>
<?}?>

<h3>Прямыми ссылками:</h3>
<a href="/actions/?sort=catalog_PRICE_1&order=asc">сначала дешёвые</a><br>
<a href="/actions/?sort=catalog_PRICE_1&order=desc">сначала дорогие</a>

<h3>Можно использовать для значения по умолчанию:</h3>
<a href="/actions/?sort=created&order=asc">сначала новые</a><br>
<a href="/actions/?sort=created&order=asc">сначала старые</a>

<!--
<div class="d-flex justify-content-between flex-wrap"><div>
    <span class="select__text">Сортировать по:</span>
    <div class="select">
        <div class="select__header">
            <span class="select__current">по умолчанию</span>
        </div>
        <ul class="select__body">
            <li class="select__item">сначала дешёвые</li>
            <li class="select__item">сначала дорогие</li>
            
        </ul>
    </div>
</div></div>
<script>
toggleSelect({
        selectSelector: '.actions .select',
       selectActiveClass: 'select_active',
       selectHeaderSelector: '.actions .select__header',
       selectBodySelector: '.actions .select__body',
       selectCurrentSelector: '.actions .select__current'
   });
</script>
-->