<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)
{
	die();
}

use \Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

\Bitrix\Main\Page\Asset::getInstance()->addCss(
	'/bitrix/css/main/system.auth/flat/style.css'
);
?>
<div class="container">
<?
if ($arResult['AUTHORIZED'])
{
	echo Loc::getMessage('MAIN_AUTH_PWD_SUCCESS');
	return;
}
?>
	<?if ($arResult['ERRORS']):?>
	<div class="alert alert-danger">
		<? foreach ($arResult['ERRORS'] as $error)
		{
			echo $error;
		}
		?>
	</div>
	<?elseif ($arResult['SUCCESS']):?>
	<div class="alert alert-success">
		<?= $arResult['SUCCESS'];?>
	</div>
	<?endif;?>

	<h3 class="bx-title"><?= Loc::getMessage('MAIN_AUTH_PWD_HEADER');?></h3>
	<div class="row">
		<div class="col-lg-4 col-md-6 col-sm-8 col-12">
			<p class="bx-authform-content-container"><?= Loc::getMessage('MAIN_AUTH_PWD_NOTE');?></p>
		</div>
	</div>
	<form name="bform" method="post" target="_top" action="<?= POST_FORM_ACTION_URI;?>" class="authorization__form form">
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-8 col-12">
				<input class="form__input" type="text" name="<?= $arResult['FIELDS']['login'];?>" maxlength="255" value="<?= \htmlspecialcharsbx($arResult['LAST_LOGIN']);?>" placeholder="<?= Loc::getMessage('MAIN_AUTH_PWD_FIELD_LOGIN');?>"/>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-8 col-12">
				<p class="text-center"><?= Loc::getMessage('MAIN_AUTH_PWD_OR');?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-8 col-12">
				<input class="form__input" type="text" name="<?= $arResult['FIELDS']['email'];?>" maxlength="255" value=""  placeholder="<?= Loc::getMessage('MAIN_AUTH_PWD_FIELD_EMAIL');?>"/>
			</div>
		</div>

		<?if ($arResult['CAPTCHA_CODE']):?>
			<input type="hidden" name="captcha_sid" value="<?= \htmlspecialcharsbx($arResult['CAPTCHA_CODE']);?>" />
			<div class="bx-authform-formgroup-container dbg_captha">
				<div class="bx-authform-label-container">
					<?= Loc::getMessage('MAIN_AUTH_PWD_FIELD_CAPTCHA');?>
				</div>
				<div class="bx-captcha"><img src="/bitrix/tools/captcha.php?captcha_sid=<?= \htmlspecialcharsbx($arResult['CAPTCHA_CODE']);?>" width="180" height="40" alt="CAPTCHA" /></div>
				<div class="bx-authform-input-container">
					<input type="text" name="captcha_word" maxlength="50" value="" autocomplete="off" />
				</div>
			</div>
		<?endif;?>

		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-8 col-12">
				<input class="form__submit" type="submit" name="<?= $arResult['FIELDS']['action'];?>" value="<?= Loc::getMessage('MAIN_AUTH_PWD_FIELD_SUBMIT');?>" />
			</div>
		</div>

		<?if ($arResult['AUTH_AUTH_URL'] || $arResult['AUTH_REGISTER_URL']):?>
			<hr class="bxe-light">
			<noindex>
			<?if ($arResult['AUTH_AUTH_URL']):?>
				<a class="authorization__registration" href="<?= $arResult['AUTH_AUTH_URL'];?>" rel="nofollow">
					<?= Loc::getMessage('MAIN_AUTH_PWD_URL_AUTH_URL');?>
				</a>
			<?endif;?>
			<?if ($arResult['AUTH_REGISTER_URL']):?>
				<a class="authorization__registration" href="<?= $arResult['AUTH_REGISTER_URL'];?>" rel="nofollow">
					<?= Loc::getMessage('MAIN_AUTH_PWD_URL_REGISTER_URL');?>
				</a>
			<?endif;?>
			</noindex>
		<?endif;?>

	</form>
</div>

<script type="text/javascript">
	document.bform.<?= $arResult['FIELDS']['login'];?>.focus();
</script>
