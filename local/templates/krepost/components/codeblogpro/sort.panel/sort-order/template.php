<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Localization\Loc;

if (!empty($arResult['SORT']['PROPERTIES'])) {
    $def = $arResult['SORT']['PROPERTIES']['created'];
    $price = $arResult['SORT']['PROPERTIES']['catalog_PRICE_1'];
    ?>
    <?= Loc::getMessage('SORT_BY_VALUE') ?>: <a href="<?= $def['URL']; ?>">по умолчанию</a>
    <a href="<?= $price['URL']; ?>"><?
    if (strpos($price['ORDER'], 'asc') !== false) {
        echo 'сначала дешёвые'; // в кавычках можно вывести любой html
    }
    elseif (strpos($price['ORDER'], 'desc') !== false) {
        echo 'сначала дорогие'; // в кавычках можно вывести любой html
    }
    ?></a>
<?} ?>

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

<?// echo "<pre>"; print_r($arResult['SORT']['PROPERTIES']);echo "</pre>";?>