<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
 * @var array $arParams
 * @var array $arResult
 * @var $APPLICATION CMain
 */

if ($arParams["SET_TITLE"] == "Y")
	$APPLICATION->SetTitle(Loc::getMessage("SOA_ORDER_COMPLETE"));
?>

<div class="static_page">
	<div class="container">
<? if (!empty($arResult["ORDER"])): ?>
	<h1>Информация по заказу</h1>

	<?=Loc::getMessage("SOA_ORDER_SUC", array(
		"#ORDER_DATE#" => $arResult["ORDER"]["DATE_INSERT"],
		"#ORDER_ID#" => $arResult["ORDER"]["ACCOUNT_NUMBER"]
	))?>
	<? if (!empty($arResult['ORDER']["PAYMENT_ID"])): ?>
		<?=Loc::getMessage("SOA_PAYMENT_SUC", array(
			"#PAYMENT_ID#" => $arResult['PAYMENT'][$arResult['ORDER']["PAYMENT_ID"]]['ACCOUNT_NUMBER']
		))?>
	<? endif ?>
	<br />
	<div class="select_text">
		<?=Loc::getMessage("SOA_ORDER_SUC1", array("#LINK#" => $arParams["PATH_TO_PERSONAL"]))?>
	</div>

	<?
	if (!empty($arResult["PAYMENT"]))
	{
		foreach ($arResult["PAYMENT"] as $payment)
		{
			if ($payment["PAID"] != 'Y')
			{
				if (!empty($arResult['PAY_SYSTEM_LIST'])
					&& array_key_exists($payment["PAY_SYSTEM_ID"], $arResult['PAY_SYSTEM_LIST'])
				)
				{
					$arPaySystem = $arResult['PAY_SYSTEM_LIST'][$payment["PAY_SYSTEM_ID"]];

					if (empty($arPaySystem["ERROR"]))
					{
					?>
						<br />
						<h2 class="pay_name"><?= Loc::getMessage("SOA_PAY") ?></h2>
						<?= CFile::ShowImage($arPaySystem["LOGOTIP"], 100, 100, "border=0\" style=\"width:100px\"", "", false) ?>
						<div class="paysystem_name"><?= $arPaySystem["NAME"] ?></div>
						<br/>

						<? if (strlen($arPaySystem["ACTION_FILE"]) > 0 && $arPaySystem["NEW_WINDOW"] == "Y" && $arPaySystem["IS_CASH"] != "Y"): ?>
							<?
							$orderAccountNumber = urlencode(urlencode($arResult["ORDER"]["ACCOUNT_NUMBER"]));
							$paymentAccountNumber = $payment["ACCOUNT_NUMBER"];
							?>
							<script>
								window.open('<?=$arParams["PATH_TO_PAYMENT"]?>?ORDER_ID=<?=$orderAccountNumber?>&PAYMENT_ID=<?=$paymentAccountNumber?>');
							</script>

<div class="select_text">
	<?=Loc::getMessage("SOA_PAY_LINK", array("#LINK#" => $arParams["PATH_TO_PAYMENT"]."?ORDER_ID=".$orderAccountNumber."&PAYMENT_ID=".$paymentAccountNumber))?>
</div>

							<? if (CSalePdf::isPdfAvailable() && $arPaySystem['IS_AFFORD_PDF']): ?>
								<br/>
								<?=Loc::getMessage("SOA_PAY_PDF", array("#LINK#" => $arParams["PATH_TO_PAYMENT"]."?ORDER_ID=".$orderAccountNumber."&pdf=1&DOWNLOAD=Y"))?>
							<? endif ?>
						<? else: ?>
							<?=$arPaySystem["BUFFERED_OUTPUT"]?>
						<? endif ?>
						
					<?
					}
					else
					{
					?>
						<span style="color:red;"><?= Loc::getMessage("SOA_ORDER_PS_ERROR")?></span>
					<?
					}
				}
				else
				{
				?>
					<span style="color:red;"><?= Loc::getMessage("SOA_ORDER_PS_ERROR")?></span>
				<?
				}
			}
		}
	}
	?>
	
<? else: ?>
	
	<b><?=Loc::getMessage("SOA_ERROR_ORDER")?></b>
	<br /><br />

	<table class="sale_order_full_table">
		<tr>
			<td>
				<?=Loc::getMessage("SOA_ERROR_ORDER_LOST", array("#ORDER_ID#" => $arResult["ACCOUNT_NUMBER"]))?>
				<?=Loc::getMessage("SOA_ERROR_ORDER_LOST1")?>
			</td>
		</tr>
	</table>
	
<? endif ?>
	</div>
</div>