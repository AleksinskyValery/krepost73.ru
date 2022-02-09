<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

use Bitrix\Main\Localization\Loc;

?>

<div class="container">
	<?
	ShowError($arResult["strProfileError"]);

	if ($arResult['DATA_SAVED'] == 'Y')
	{
		ShowNote(Loc::getMessage('PROFILE_DATA_SAVED'));
	}

	?>
	<form method="post" name="form1" action="<?=POST_FORM_ACTION_URI?>" enctype="multipart/form-data" role="form">
		<?=$arResult["BX_SESSION_CHECK"]?>
		<input type="hidden" name="lang" value="<?=LANG?>" />
		<input type="hidden" name="ID" value="<?=$arResult["ID"]?>" />
		<input type="hidden" name="LOGIN" value="<?=$arResult["arUser"]["LOGIN"]?>" />
		<div class="main-profile-block-shown" id="user_div_reg">
			<div class="main-profile-block-date-info">
				<?
				if($arResult["ID"]>0)
				{
					if ($arResult["arUser"]["TIMESTAMP_X"] <> '')
					{
						?>
						<div class="col-sm-9 col-md-offset-3 small">
							<strong><?=Loc::getMessage('LAST_UPDATE')?></strong>
							<strong><?=$arResult["arUser"]["TIMESTAMP_X"]?></strong>
						</div>
						<?
					}

					if ($arResult["arUser"]["LAST_LOGIN"] <> '')
					{
						?>
						<div class="col-sm-9 col-md-offset-3 small">
							<strong><?=Loc::getMessage('LAST_LOGIN')?></strong>
							<strong><?=$arResult["arUser"]["LAST_LOGIN"]?></strong>
						</div>
						<?
					}
				}
				?>
			</div>
			<?
			if (!in_array(LANGUAGE_ID,array('ru', 'ua')))
			{
				?>
				<div class="col-sm-12 col-md-4">
					<label class="main-profile-form-label" for="main-profile-title"><?=Loc::getMessage('main_profile_title')?></label>
					<input class="main-profile-form-control" type="text" name="TITLE" maxlength="50" id="main-profile-title" value="<?=$arResult["arUser"]["TITLE"]?>" />
				</div>
				<?
			}
			?>
			<div class="col-sm-12 col-md-4">
				<label class="main-profile-form-label" for="main-profile-name"><?=Loc::getMessage('NAME')?></label>
				<input class="main-profile-form-control" placeholder="<?=Loc::getMessage('NAME')?>" type="text" name="NAME" maxlength="50" id="main-profile-name" value="<?=$arResult["arUser"]["NAME"]?>" />
			</div>
			<div class="col-sm-12 col-md-4">
				<label class="main-profile-form-label" for="main-profile-last-name"><?=Loc::getMessage('LAST_NAME')?></label>
				<input class="main-profile-form-control" placeholder="<?=Loc::getMessage('LAST_NAME')?>" type="text" name="LAST_NAME" maxlength="50" id="main-profile-last-name" value="<?=$arResult["arUser"]["LAST_NAME"]?>" />
			</div>
			<div class="col-sm-12 col-md-4">
				<label class="main-profile-form-label" for="main-profile-second-name"><?=Loc::getMessage('SECOND_NAME')?></label>
				<input class="main-profile-form-control" placeholder="<?=Loc::getMessage('SECOND_NAME')?>" type="text" name="SECOND_NAME" maxlength="50" id="main-profile-second-name" value="<?=$arResult["arUser"]["SECOND_NAME"]?>" />
			</div>
			<div class="col-sm-12 col-md-4">
				<label class="main-profile-form-label" for="main-profile-email"><?=Loc::getMessage('EMAIL')?></label>
				<input class="main-profile-form-control" placeholder="<?=Loc::getMessage('EMAIL')?>" type="text" name="EMAIL" maxlength="50" id="main-profile-email" value="<?=$arResult["arUser"]["EMAIL"]?>" />
			</div>
			<?
			if ($arResult['CAN_EDIT_PASSWORD'])
			{
				?>
				<div class="col-sm-12 col-md-4">
					<label class="main-profile-form-label main-profile-password" for="main-profile-password"><?=Loc::getMessage('NEW_PASSWORD_REQ')?></label>
					<span class="password-annotation"><?=Loc::getMessage('PASSWORD_REQUIREMENTS')?></span>
					<input class=" main-profile-form-control bx-auth-input main-profile-password" placeholder="<?=Loc::getMessage('NEW_PASSWORD_REQ')?>" type="password" name="NEW_PASSWORD" maxlength="50" id="main-profile-password" value="" autocomplete="off"/>
				</div>
				<div class="col-sm-12 col-md-4">
					<label class="main-profile-form-label main-profile-password" for="main-profile-password-confirm">
						<?=Loc::getMessage('NEW_PASSWORD_CONFIRM')?>
					</label>
					<input class="main-profile-form-control" placeholder="<?=Loc::getMessage('NEW_PASSWORD_CONFIRM')?>" type="password" name="NEW_PASSWORD_CONFIRM" maxlength="50" value="" id="main-profile-password-confirm" autocomplete="off" />
				</div>
				<?
			}
			?>
		</div>
		<div class="col-sm-12 col-md-4 main-profile-submit">
			<input type="submit" name="save" class="main-profile-submit-save" value="<?=(($arResult["ID"]>0) ? Loc::getMessage("MAIN_SAVE") : Loc::getMessage("MAIN_ADD"))?>">
			&nbsp;
			<input type="submit" class="main-profile-submit-reset"  name="reset" value="<?echo GetMessage("MAIN_RESET")?>">
		</div>
	</form>
	<div class="col-sm-12 main-profile-social-block">
		<?
		if ($arResult["SOCSERV_ENABLED"])
		{
			$APPLICATION->IncludeComponent("bitrix:socserv.auth.split", ".default", array(
	"SHOW_PROFILES" => "N",
		"ALLOW_DELETE" => "Y",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "N"
	)
);
		}
		?>
	</div>
	<div class="clearfix"></div>
	<script>
		BX.Sale.PrivateProfileComponent.init();
	</script>
</div>