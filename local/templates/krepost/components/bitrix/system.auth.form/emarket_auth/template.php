<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
CJSCore::Init(array("jquery"));
?>
<?if ($arResult["FORM_TYPE"] == "login") {?>
		<?//echo '<pre>'; print_r($_SERVER['DOCUMENT_ROOT']);echo '</pre>';?>
		<input type="hidden" name="eMarket_auth_cur_page" value="<?=$this->GetFolder()?>">
		<input type="hidden" name="eMarket_auth_backurl" value="<?=$arResult["BACKURL"]?>">
		<input type="hidden" name="eMarket_auth_forgotPassUrl" value="<?=$arResult["AUTH_FORGOT_PASSWORD_URL"]?>">
		<input type="hidden" name="eMarket_auth_site_id" value="<?=SITE_ID?>">
		
		
		<a href="<?=SITE_DIR?>auth/" class="header-info__user-link">
    		<img src="<?= SITE_TEMPLATE_PATH ?>/img/main/icons/header-authorization.svg" title="<?=GetMessage("AUTH_LOGIN_TITLE")?>" alt="Личный кабинет" class="header-info__user-img">
		</a>
	<?} else {
		$name = trim($USER->GetFullName());
		if(strlen($name) <= 0) 
			$name = $USER->GetLogin();
		?>
		<a href="<?=$arResult['PROFILE_URL']?>" class="header-info__user-link">
    		<img src="<?=$this->GetFolder()?>/images/header-authorization.svg" title="<?=htmlspecialcharsEx($name);?>" alt="Личный кабинет" class="header-info__user-img">
		</a>

		<a href="<?=$APPLICATION->GetCurPageParam("logout=yes&".bitrix_sessid_get(), [
				"login",
				"logout",
				"register",
				"forgot_password",
				"change_password"]
				);?>">
			<img src="<?=$this->GetFolder()?>/images/logout.svg" title="<?=GetMessage("AUTH_LOGOUT")?>" alt="Выход" class="header-info__user-img-logout">
		</a>
<?}?>