<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)
{
	die();
}
use \Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
?>
<div class="container">
<?
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
<form name="<?= $arResult['FORM_ID'];?>" method="post" target="_top" action="<?= POST_FORM_ACTION_URI;?>" class="authorization__form form">
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-8 col-12">
				<input type="text" name="<?= $arResult['FIELDS']['login'];?>" maxlength="255" value="<?= \htmlspecialcharsbx($arResult['LAST_LOGIN']);?>" class="form__input" placeholder="<?= Loc::getMessage('MAIN_AUTH_FORM_FIELD_LOGIN');?>"/>
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
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-8 col-12">
				<input type="password" name="<?= $arResult['FIELDS']['password'];?>" maxlength="255" autocomplete="off" class="form__input" placeholder="<?= Loc::getMessage('MAIN_AUTH_FORM_FIELD_PASS');?>"/>
				<?if ($arResult['CAPTCHA_CODE']):?>
					<input type="hidden" name="captcha_sid" value="<?= \htmlspecialcharsbx($arResult['CAPTCHA_CODE']);?>" />
					<?= Loc::getMessage('MAIN_AUTH_FORM_FIELD_CAPTCHA');?>
					<div class="bx-captcha"><img src="/bitrix/tools/captcha.php?captcha_sid=<?= \htmlspecialcharsbx($arResult['CAPTCHA_CODE']);?>" width="180" height="40" alt="CAPTCHA" /></div>
					<div class="bx-authform-input-container">
						<input type="text" name="captcha_word" maxlength="50" value="" autocomplete="off" />
					</div>
				<?endif;?>
			</div>
		</div>
		<?if ($arResult['STORE_PASSWORD'] == 'Y'):?>
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-8 col-12">
				<label class="form__policy-label">
					<input class="" type="checkbox" id="USER_REMEMBER" name="<?= $arResult['FIELDS']['remember'];?>" value="Y" />
					<span class="form__policy-title"><?= Loc::getMessage('MAIN_AUTH_FORM_FIELD_REMEMBER');?></span>
				</label>
			</div>
		</div>
		<?endif?>
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-8 col-12">
				<input type="submit" class="form__submit" name="<?= $arResult['FIELDS']['action'];?>" value="<?= Loc::getMessage('MAIN_AUTH_FORM_FIELD_SUBMIT');?>" />
			</div>
		</div>
	<?if ($arResult['AUTH_FORGOT_PASSWORD_URL'] || $arResult['AUTH_REGISTER_URL']):?>
		<?if ($arResult['AUTH_FORGOT_PASSWORD_URL']):?>
			<a class="authorization__recovery" href="<?= $arResult['AUTH_FORGOT_PASSWORD_URL'];?>" rel="nofollow"><?= Loc::getMessage('MAIN_AUTH_FORM_URL_FORGOT_PASSWORD');?></a>
		<?endif;?>
		<?if ($arResult['AUTH_REGISTER_URL']):?>
			<a class="authorization__registration" href="<?= $arResult['AUTH_REGISTER_URL'];?>" rel="nofollow"><?= Loc::getMessage('MAIN_AUTH_FORM_URL_REGISTER_URL');?></a>
		<?endif;?>
	<?endif;?>
	</form>
</div>

<script type="text/javascript">
	<?if ($arResult['LAST_LOGIN'] != ''):?>
	try{document.<?= $arResult['FORM_ID'];?>.USER_PASSWORD.focus();}catch(e){}
	<?else:?>
	try{document.<?= $arResult['FORM_ID'];?>.USER_LOGIN.focus();}catch(e){}
	<?endif?>
</script>