<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)
{
	die();
}
use \Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

if ($arResult['AUTHORIZED'])
{
	echo Loc::getMessage('MAIN_AUTH_FORM_SUCCESS');
	return;
}

if ($arResult['ERRORS']):?>
<div class="alert alert-danger">
	<? foreach ($arResult['ERRORS'] as $error)
	{
		echo $error;
	}
	?>
</div>
<?endif;?>
<form name="<?= $arResult['FORM_ID'];?>" method="post" target="_top" action="<?= POST_FORM_ACTION_URI;?>">
111111111
<input type="text" name="<?= $arResult['FIELDS']['login'];?>" maxlength="255" value="<?= \htmlspecialcharsbx($arResult['LAST_LOGIN']);?>" />
<?if ($arResult['SECURE_AUTH']):?>
	<div class="bx-authform-psw-protected" id="bx_auth_secure" style="display:none">
		<div class="bx-authform-psw-protected-desc"><span></span>
			<?= Loc::getMessage('MAIN_AUTH_FORM_SECURE_NOTE');?>
		</div>
	</div>
	<script type="text/javascript">
		document.getElementById('bx_auth_secure').style.display = '';
	</script>
<?endif?>
<input type="password" name="<?= $arResult['FIELDS']['password'];?>" maxlength="255" autocomplete="off" />
<?if ($arResult['CAPTCHA_CODE']):?>
	<input type="hidden" name="captcha_sid" value="<?= \htmlspecialcharsbx($arResult['CAPTCHA_CODE']);?>" />
	<?= Loc::getMessage('MAIN_AUTH_FORM_FIELD_CAPTCHA');?>
	<div class="bx-captcha"><img src="/bitrix/tools/captcha.php?captcha_sid=<?= \htmlspecialcharsbx($arResult['CAPTCHA_CODE']);?>" width="180" height="40" alt="CAPTCHA" /></div>
	<div class="bx-authform-input-container">
		<input type="text" name="captcha_word" maxlength="50" value="" autocomplete="off" />
	</div>
<?endif;?>
<?if ($arResult['STORE_PASSWORD'] == 'Y'):?>
<label class="bx-filter-param-label">
	<input type="checkbox" id="USER_REMEMBER" name="<?= $arResult['FIELDS']['remember'];?>" value="Y" />
	<span class="bx-filter-param-text"><?= Loc::getMessage('MAIN_AUTH_FORM_FIELD_REMEMBER');?></span>
</label>
<?endif?>
<input type="submit" class="btn btn-primary" name="<?= $arResult['FIELDS']['action'];?>" value="<?= Loc::getMessage('MAIN_AUTH_FORM_FIELD_SUBMIT');?>" />

<?if ($arResult['AUTH_FORGOT_PASSWORD_URL'] || $arResult['AUTH_REGISTER_URL']):?>
	<?if ($arResult['AUTH_FORGOT_PASSWORD_URL']):?>
		<a href="<?= $arResult['AUTH_FORGOT_PASSWORD_URL'];?>" rel="nofollow"><?= Loc::getMessage('MAIN_AUTH_FORM_URL_FORGOT_PASSWORD');?></a>
	<?endif;?>
	<?if ($arResult['AUTH_REGISTER_URL']):?>
		<a href="<?= $arResult['AUTH_REGISTER_URL'];?>" rel="nofollow"><?= Loc::getMessage('MAIN_AUTH_FORM_URL_REGISTER_URL');?></a>
	<?endif;?>
<?endif;?>
</form>

<script type="text/javascript">
	<?if ($arResult['LAST_LOGIN'] != ''):?>
	try{document.<?= $arResult['FORM_ID'];?>.USER_PASSWORD.focus();}catch(e){}
	<?else:?>
	try{document.<?= $arResult['FORM_ID'];?>.USER_LOGIN.focus();}catch(e){}
	<?endif?>
</script>