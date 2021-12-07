<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$CurDir = $APPLICATION->GetCurDir();
$CurUri = $APPLICATION->GetCurUri();
?>
<!doctype html>
<html lang="ru">
<head>
<?
use Bitrix\Main\Page\Asset;
// Пример подключения JS
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/appscripts.js');
// Пример подключения CSS
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/appstyles.css');
$APPLICATION->ShowHead();
?>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<title><? $APPLICATION->ShowTitle() ?></title>
</head>
<body>

<?
$APPLICATION->ShowPanel();
?>

<div class="container">

    <div class="header">

    </div>
