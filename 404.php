<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");
define("HIDE_SIDEBAR", true);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("not_show_nav_chain", "Y");
$APPLICATION->SetTitle('ГК "Крепость" || 404 Страница не найдена');?>

<section class="not-found">
	<div class="container">
		<img class="not-found__img" src="<?= SITE_TEMPLATE_PATH ?>/img/404/404.png" alt="404">
		<h1 class="not-found__descr">
			<span>Ой!</span>
			<span>Страница не найдена.</span>
		</h1>
	</div>
</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>