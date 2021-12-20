<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<? if ($arResult["isFormNote"] === "Y"): ?>
<div class="modal modal_thanks modal_active">
	<div class="modal__container">
		<button class="modal__close">×</button>
		<div class="modal__descr-wrapper">
			<p>Спасибо!</p>
			<p>В ближайшее время мы с Вами свяжемся.</p>
		</div>
	</div>
</div>
<? else: ?>
<section class="callback">
    <div class="container">
	<?=$arResult["FORM_HEADER"]?>
	<div class="error-msg"></div>
	<div class="row callback__form">
		<input type="hidden" name="web_form_submit" value="Y">
	
		<? if ($arResult["isFormErrors"] === "Y"): ?>
			<div class="errors">
				<?=$arResult["FORM_ERRORS_TEXT"]?>
			</div>
		<? endif; ?>
		<div class="col-md-4 col-12">
			<?=$arResult["QUESTIONS"]['NAME']['HTML_CODE']?>
		</div>
		<div class="col-md-4 col-12">
			<?=$arResult["QUESTIONS"]['PHONE']['HTML_CODE']?>
		</div>
	
		<div class="col-xl-3 col-md-4 col-12">
			<input class="callback__submit callback__submit_1920" type="submit" value="<?=$arResult["arForm"]["BUTTON"]?>">
			<input class="callback__submit callback__submit_768" type="submit" value="Заказать звонок">
		</div>
	</div>
<?=$arResult["FORM_FOOTER"]?>
	</div>
</section>
<? endif; ?>
<script>
    ajaxForm(document.getElementsByName('<?=$arResult['arForm']['SID']?>')[0], '<?=$templateFolder?>/ajax.php')
</script>