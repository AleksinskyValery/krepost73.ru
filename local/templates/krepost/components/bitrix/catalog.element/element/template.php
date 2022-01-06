<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
* @global CMain $APPLICATION
* @var array $arParams
* @var array $arResult
* @var CatalogSectionComponent $component
* @var CBitrixComponentTemplate $this
* @var string $templateName
* @var string $componentPath
* @var string $templateFolder
*/

$this->setFrameMode(true);

$templateLibrary = array('popup', 'fx');
$currencyList = '';

if (!empty($arResult['CURRENCIES']))
{
	$templateLibrary[] = 'currency';
	$currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$templateData = array(
	'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
	'TEMPLATE_LIBRARY' => $templateLibrary,
	'CURRENCIES' => $currencyList,
	'ITEM' => array(
		'ID' => $arResult['ID'],
		'IBLOCK_ID' => $arResult['IBLOCK_ID'],
		'OFFERS_SELECTED' => $arResult['OFFERS_SELECTED'],
		'JS_OFFERS' => $arResult['JS_OFFERS']
	)
);
unset($currencyList, $templateLibrary);

$mainId = $this->GetEditAreaId($arResult['ID']);
$itemIds = array(
	'ID' => $mainId,
	'DISCOUNT_PERCENT_ID' => $mainId.'_dsc_pict',
	'STICKER_ID' => $mainId.'_sticker',
	'BIG_SLIDER_ID' => $mainId.'_big_slider',
	'BIG_IMG_CONT_ID' => $mainId.'_bigimg_cont',
	'SLIDER_CONT_ID' => $mainId.'_slider_cont',
	'OLD_PRICE_ID' => $mainId.'_old_price',
	'PRICE_ID' => $mainId.'_price',
	'DISCOUNT_PRICE_ID' => $mainId.'_price_discount',
	'PRICE_TOTAL' => $mainId.'_price_total',
	'SLIDER_CONT_OF_ID' => $mainId.'_slider_cont_',
	'QUANTITY_ID' => $mainId.'_quantity',
	'QUANTITY_DOWN_ID' => $mainId.'_quant_down',
	'QUANTITY_UP_ID' => $mainId.'_quant_up',
	'QUANTITY_MEASURE' => $mainId.'_quant_measure',
	'QUANTITY_LIMIT' => $mainId.'_quant_limit',
	'BUY_LINK' => $mainId.'_buy_link',
	'ADD_BASKET_LINK' => $mainId.'_add_basket_link',
	'BASKET_ACTIONS_ID' => $mainId.'_basket_actions',
	'NOT_AVAILABLE_MESS' => $mainId.'_not_avail',
	'COMPARE_LINK' => $mainId.'_compare_link',
	'TREE_ID' => $mainId.'_skudiv',
	'DISPLAY_PROP_DIV' => $mainId.'_sku_prop',
	'DESCRIPTION_ID' => $mainId.'_description',
	'DISPLAY_MAIN_PROP_DIV' => $mainId.'_main_sku_prop',
	'OFFER_GROUP' => $mainId.'_set_group_',
	'BASKET_PROP_DIV' => $mainId.'_basket_prop',
	'SUBSCRIBE_LINK' => $mainId.'_subscribe',
	'TABS_ID' => $mainId.'_tabs',
	'TAB_CONTAINERS_ID' => $mainId.'_tab_containers',
	'SMALL_CARD_PANEL_ID' => $mainId.'_small_card_panel',
	'TABS_PANEL_ID' => $mainId.'_tabs_panel'
);
$obName = $templateData['JS_OBJ'] = 'ob'.preg_replace('/[^a-zA-Z0-9_]/', 'x', $mainId);
$name = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
	: $arResult['NAME'];
$title = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE']
	: $arResult['NAME'];
$alt = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT']
	: $arResult['NAME'];

$haveOffers = !empty($arResult['OFFERS']);
if ($haveOffers)
{
	$actualItem = $arResult['OFFERS'][$arResult['OFFERS_SELECTED']] ?? reset($arResult['OFFERS']);
	$showSliderControls = false;

	foreach ($arResult['OFFERS'] as $offer)
	{
		if ($offer['MORE_PHOTO_COUNT'] > 1)
		{
			$showSliderControls = true;
			break;
		}
	}
}
else
{
	$actualItem = $arResult;
	$showSliderControls = $arResult['MORE_PHOTO_COUNT'] > 1;
}

$skuProps = array();
$price = $actualItem['ITEM_PRICES'][$actualItem['ITEM_PRICE_SELECTED']];
$measureRatio = $actualItem['ITEM_MEASURE_RATIOS'][$actualItem['ITEM_MEASURE_RATIO_SELECTED']]['RATIO'];
$showDiscount = $price['PERCENT'] > 0;

if ($arParams['SHOW_SKU_DESCRIPTION'] === 'Y')
{
	$skuDescription = false;
	foreach ($arResult['OFFERS'] as $offer)
	{
		if ($offer['DETAIL_TEXT'] != '' || $offer['PREVIEW_TEXT'] != '')
		{
			$skuDescription = true;
			break;
		}
	}
	$showDescription = $skuDescription || !empty($arResult['PREVIEW_TEXT']) || !empty($arResult['DETAIL_TEXT']);
}
else
{
	$showDescription = !empty($arResult['PREVIEW_TEXT']) || !empty($arResult['DETAIL_TEXT']);
}
$showBuyBtn = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION']);
$buyButtonClassName = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-primary' : 'btn-link';
$showAddBtn = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION']);
$showButtonClassName = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-primary' : 'btn-link';
$showSubscribe = $arParams['PRODUCT_SUBSCRIPTION'] === 'Y' && ($arResult['PRODUCT']['SUBSCRIBE'] === 'Y' || $haveOffers);

$arParams['MESS_BTN_BUY'] = $arParams['MESS_BTN_BUY'] ?: Loc::getMessage('CT_BCE_CATALOG_BUY');
$arParams['MESS_BTN_ADD_TO_BASKET'] = $arParams['MESS_BTN_ADD_TO_BASKET'] ?: Loc::getMessage('CT_BCE_CATALOG_ADD');
$arParams['MESS_NOT_AVAILABLE'] = $arParams['MESS_NOT_AVAILABLE'] ?: Loc::getMessage('CT_BCE_CATALOG_NOT_AVAILABLE');
$arParams['MESS_BTN_COMPARE'] = $arParams['MESS_BTN_COMPARE'] ?: Loc::getMessage('CT_BCE_CATALOG_COMPARE');
$arParams['MESS_PRICE_RANGES_TITLE'] = $arParams['MESS_PRICE_RANGES_TITLE'] ?: Loc::getMessage('CT_BCE_CATALOG_PRICE_RANGES_TITLE');
$arParams['MESS_DESCRIPTION_TAB'] = $arParams['MESS_DESCRIPTION_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_DESCRIPTION_TAB');
$arParams['MESS_PROPERTIES_TAB'] = $arParams['MESS_PROPERTIES_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_PROPERTIES_TAB');
$arParams['MESS_COMMENTS_TAB'] = $arParams['MESS_COMMENTS_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_COMMENTS_TAB');
$arParams['MESS_SHOW_MAX_QUANTITY'] = $arParams['MESS_SHOW_MAX_QUANTITY'] ?: Loc::getMessage('CT_BCE_CATALOG_SHOW_MAX_QUANTITY');
$arParams['MESS_RELATIVE_QUANTITY_MANY'] = $arParams['MESS_RELATIVE_QUANTITY_MANY'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['MESS_RELATIVE_QUANTITY_FEW'] = $arParams['MESS_RELATIVE_QUANTITY_FEW'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_FEW');

$positionClassMap = array(
	'left' => 'product-item-label-left',
	'center' => 'product-item-label-center',
	'right' => 'product-item-label-right',
	'bottom' => 'product-item-label-bottom',
	'middle' => 'product-item-label-middle',
	'top' => 'product-item-label-top'
);

$discountPositionClass = 'product-item-label-big';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION']))
{
	foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos)
	{
		$discountPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}

$labelPositionClass = 'product-item-label-big';
if (!empty($arParams['LABEL_PROP_POSITION']))
{
	foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos)
	{
		$labelPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}

$themeClass = isset($arParams['TEMPLATE_THEME']) ? ' bx-'.$arParams['TEMPLATE_THEME'] : '';
?>
<div id="<?=$itemIds['ID']?>" itemscope itemtype="http://schema.org/Product">
	<div class="row">
		<div class="col-6">
			<div class="product-item-detail-slider-container" id="<?=$itemIds['BIG_SLIDER_ID']?>">
				<span class="product-item-detail-slider-close" data-entity="close-popup"></span>
				<div class="product-item-detail-slider-block
				<?=($arParams['IMAGE_RESOLUTION'] === '1by1' ? 'product-item-detail-slider-block-square' : '')?>"
					data-entity="images-slider-block">
					<span class="product-item-detail-slider-left" data-entity="slider-control-left" style="display: none;"></span>
					<span class="product-item-detail-slider-right" data-entity="slider-control-right" style="display: none;"></span>
					<?php
					if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y')
					{
						if ($haveOffers)
						{
							?>
							<div class="product-item-label-ring <?=$discountPositionClass?>"
								id="<?=$itemIds['DISCOUNT_PERCENT_ID']?>"
								style="display: none;">
							</div>
							<?php
						}
						else
						{
							if ($price['DISCOUNT'] > 0)
							{
								?>
								<div class="product-item-label-ring <?=$discountPositionClass?>"
									id="<?=$itemIds['DISCOUNT_PERCENT_ID']?>"
									title="<?=-$price['PERCENT']?>%">
									<span><?=-$price['PERCENT']?>%</span>
								</div>
								<?php
							}
						}
					}
					?>
					<div class="product-item-detail-slider-images-container" data-entity="images-container">
						<?php
						if (!empty($actualItem['MORE_PHOTO']))
						{
							foreach ($actualItem['MORE_PHOTO'] as $key => $photo)
							{
								?>
								<div class="product-item-detail-slider-image<?=($key == 0 ? ' active' : '')?>" data-entity="image" data-id="<?=$photo['ID']?>">
									<img src="<?=$photo['SRC']?>" alt="<?=$alt?>" title="<?=$title?>"<?=($key == 0 ? ' itemprop="image"' : '')?>>
								</div>
								<?php
							}
						}

						if ($arParams['SLIDER_PROGRESS'] === 'Y')
						{
							?>
							<div class="product-item-detail-slider-progress-bar" data-entity="slider-progress-bar" style="width: 0;"></div>
							<?php
						}
						?>
					</div>
				</div>
				<?php
				if ($showSliderControls)
				{
					if ($haveOffers)
					{
						foreach ($arResult['OFFERS'] as $keyOffer => $offer)
						{
							if (!isset($offer['MORE_PHOTO_COUNT']) || $offer['MORE_PHOTO_COUNT'] <= 0)
								continue;

							$strVisible = $arResult['OFFERS_SELECTED'] == $keyOffer ? '' : 'none';
							?>
							<div class="product-item-detail-slider-controls-block" id="<?=$itemIds['SLIDER_CONT_OF_ID'].$offer['ID']?>" style="display: <?=$strVisible?>;">
								<?php
								foreach ($offer['MORE_PHOTO'] as $keyPhoto => $photo)
								{
									?>
									<div class="product-item-detail-slider-controls-image<?=($keyPhoto == 0 ? ' active' : '')?>"
										data-entity="slider-control" data-value="<?=$offer['ID'].'_'.$photo['ID']?>">
										<img src="<?=$photo['SRC']?>">
									</div>
									<?php
								}
								?>
							</div>
							<?php
						}
					}
					else
					{
						?>
						<div class="product-item-detail-slider-controls-block" id="<?=$itemIds['SLIDER_CONT_ID']?>">
							<?php
							if (!empty($actualItem['MORE_PHOTO']))
							{
								foreach ($actualItem['MORE_PHOTO'] as $key => $photo)
								{
									?>
									<div class="product-item-detail-slider-controls-image<?=($key == 0 ? ' active' : '')?>"
										data-entity="slider-control" data-value="<?=$photo['ID']?>">
										<img src="<?=$photo['SRC']?>">
									</div>
									<?php
								}
							}
							?>
						</div>
						<?php
					}
				}
				?>
			</div>
		</div>
		<?php
		$showOffersBlock = $haveOffers && !empty($arResult['OFFERS_PROP']);
		$mainBlockProperties = array_intersect_key($arResult['DISPLAY_PROPERTIES'], $arParams['MAIN_BLOCK_PROPERTY_CODE']);
		$showPropsBlock = !empty($mainBlockProperties) || $arResult['SHOW_OFFERS_PROPS'];
		$showBlockWithOffersAndProps = $showOffersBlock || $showPropsBlock;
		?>
		<div class="<?=($showBlockWithOffersAndProps ? "col-md-6 col-lg-4" : "col-md-6 col-lg-4"); ?>">
			<div class="row">
				<div class="<?=($showBlockWithOffersAndProps ? "col-lg-7" : "col-lg"); ?>">
				<p class="product__code">Код: <?if ($arResult['PROPERTIES']['CML2_ARTICLE']['VALUE'])
					{
						echo $arResult['PROPERTIES']['CML2_ARTICLE']['VALUE'];?></p><?
					}
					else
					{
						?>Отсутсвует</p><?
					}
					if ($arResult['PROPERTIES']['ATT_HIT']['VALUE'] == 1)
						{?>
							<div class="product__info-top"><p class="product__info-label">Хит продаж</p></div>
						<?}
						foreach ($arParams['PRODUCT_PAY_BLOCK_ORDER'] as $blockName)
						{
							switch ($blockName)
							{
								case 'rating':
									if ($arParams['USE_VOTE_RATING'] === 'Y')
									{
										?>
										<div class="mb-3">
											<?php
											$APPLICATION->IncludeComponent(
												'bitrix:iblock.vote',
												'bootstrap_v4',
												array(
													'CUSTOM_SITE_ID' => $arParams['CUSTOM_SITE_ID'] ?? null,
													'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
													'IBLOCK_ID' => $arParams['IBLOCK_ID'],
													'ELEMENT_ID' => $arResult['ID'],
													'ELEMENT_CODE' => '',
													'MAX_VOTE' => '5',
													'VOTE_NAMES' => array('1', '2', '3', '4', '5'),
													'SET_STATUS_404' => 'N',
													'DISPLAY_AS_RATING' => $arParams['VOTE_DISPLAY_AS_RATING'],
													'CACHE_TYPE' => $arParams['CACHE_TYPE'],
													'CACHE_TIME' => $arParams['CACHE_TIME']
												),
												$component,
												array('HIDE_ICONS' => 'Y')
											);
											?>
										</div>
										<?php
									}

									break;

								case 'price':
									?>
									<div class="product__info-bottom">
										<?php
										if ($showDiscount)
										{
											?><div>Цена со скидкой:</div><?
										}
										else
										{
											?><div>Цена:</div><?
										}
										?><div class="product__info-price-wrap"><?
										if ($arParams['SHOW_OLD_PRICE'] === 'Y')
										{
											?>
											<div class="product__info-old"
												id="<?=$itemIds['OLD_PRICE_ID']?>"
												<?=($showDiscount ? '' : 'style="display: none;"')?>><?=($showDiscount ? $price['PRINT_RATIO_BASE_PRICE'] : '')?></div>
											<?php
										}
										?>

										<div class="product__info-price" id="<?=$itemIds['PRICE_ID']?>"><?=$price['PRINT_RATIO_PRICE']?></div>

										<?php
										if ($arParams['SHOW_OLD_PRICE'] === 'Y')
										{
											?>
											<div class="product__info--economy"
												id="<?=$itemIds['DISCOUNT_PRICE_ID']?>"
												<?=($showDiscount ? '' : 'style="display: none;"')?>><?php
												if ($showDiscount)
												{
													echo Loc::getMessage('CT_BCE_CATALOG_ECONOMY_INFO2', array('#ECONOMY#' => $price['PRINT_RATIO_DISCOUNT']));
												}
												?></div>
											<?php
										}
										?>
										</div>
									</div>
									<?php
									break;

								case 'priceRanges':
									if ($arParams['USE_PRICE_COUNT'])
									{
										$showRanges = !$haveOffers && count($actualItem['ITEM_QUANTITY_RANGES']) > 1;
										$useRatio = $arParams['USE_RATIO_IN_RANGES'] === 'Y';
										?>
										<div class="mb-3"
											<?=$showRanges ? '' : 'style="display: none;"'?>
											data-entity="price-ranges-block">
											<?php
											if ($arParams['MESS_PRICE_RANGES_TITLE'])
											{
												?>
												<div class="product-item-detail-info-container-title text-center">
													<?= $arParams['MESS_PRICE_RANGES_TITLE'] ?>
													<span data-entity="price-ranges-ratio-header">
												(<?= (Loc::getMessage(
															'CT_BCE_CATALOG_RATIO_PRICE',
															array('#RATIO#' => ($useRatio ? $measureRatio : '1').' '.$actualItem['ITEM_MEASURE']['TITLE'])
														)) ?>)
											</span>
												</div>
												<?php
											}
											?>
											<ul class="product-item-detail-properties" data-entity="price-ranges-body">
												<?php
												if ($showRanges)
												{
													foreach ($actualItem['ITEM_QUANTITY_RANGES'] as $range)
													{
														if ($range['HASH'] !== 'ZERO-INF')
														{
															$itemPrice = false;

															foreach ($arResult['ITEM_PRICES'] as $itemPrice)
															{
																if ($itemPrice['QUANTITY_HASH'] === $range['HASH'])
																{
																	break;
																}
															}

															if ($itemPrice)
															{
																?>
																<li class="product-item-detail-properties-item">
																<span class="product-item-detail-properties-name text-muted">
																	<?php
																	echo Loc::getMessage(
																			'CT_BCE_CATALOG_RANGE_FROM',
																			array('#FROM#' => $range['SORT_FROM'].' '.$actualItem['ITEM_MEASURE']['TITLE'])
																		).' ';

																	if (is_infinite($range['SORT_TO']))
																	{
																		echo Loc::getMessage('CT_BCE_CATALOG_RANGE_MORE');
																	}
																	else
																	{
																		echo Loc::getMessage(
																			'CT_BCE_CATALOG_RANGE_TO',
																			array('#TO#' => $range['SORT_TO'].' '.$actualItem['ITEM_MEASURE']['TITLE'])
																		);
																	}
																	?>
																</span>
																	<span class="product-item-detail-properties-dots"></span>
																	<span class="product-item-detail-properties-value"><?=($useRatio ? $itemPrice['PRINT_RATIO_PRICE'] : $itemPrice['PRINT_PRICE'])?></span>
																</li>
																<?php
															}
														}
													}
												}
												?>
											</ul>
										</div>
										<?php
										unset($showRanges, $useRatio, $itemPrice, $range);
									}

									break;

								case 'quantityLimit':
									if ($arParams['SHOW_MAX_QUANTITY'] !== 'N')
									{
										if ($haveOffers)
										{
											?>
											<div class="mb-3" id="<?=$itemIds['QUANTITY_LIMIT']?>" style="display: none;">
												<div class="product-item-detail-info-container-title text-center">
													<?=$arParams['MESS_SHOW_MAX_QUANTITY']?>:
												</div>
												<span class="product-item-quantity" data-entity="quantity-limit-value"></span>
											</div>
											<?php
										}
										else
										{
											if (
												$measureRatio
												&& (float)$actualItem['PRODUCT']['QUANTITY'] > 0
												&& $actualItem['CHECK_QUANTITY']
											)
											{
												?>
												<div class="product__info-middle" id="<?=$itemIds['QUANTITY_LIMIT']?>">
													<p class="product__info-availability"><?=$arParams['MESS_SHOW_MAX_QUANTITY']?>:</p>
													<p class="product__info-quantity" data-entity="quantity-limit-value">
														<?php
														if ($arParams['SHOW_MAX_QUANTITY'] === 'M')
														{
															if ((float)$actualItem['PRODUCT']['QUANTITY'] / $measureRatio >= $arParams['RELATIVE_QUANTITY_FACTOR'])
															{
																echo $arParams['MESS_RELATIVE_QUANTITY_MANY'];
															}
															else
															{
																echo $arParams['MESS_RELATIVE_QUANTITY_FEW'];
															}
														}
														else
														{
															echo $actualItem['PRODUCT']['QUANTITY'].' '.$actualItem['ITEM_MEASURE']['TITLE'];
														}
														?>
													</p>
												</div>
												<?php
											}
										}
									}

									break;

								case 'quantity':
									if ($arParams['USE_PRODUCT_QUANTITY'])
									{
										?>
										<div class="quantity-item" <?= (!$actualItem['CAN_BUY'] ? ' style="display: none;"' : '') ?> data-entity="quantity-block">
											<?php
											if (Loc::getMessage('CATALOG_QUANTITY'))
											{
												?>
												<div class="product-item-detail-info-container-title text-center"><?= Loc::getMessage('CATALOG_QUANTITY') ?></div>
												<?php
											}
											?>

											<div class="product-item-amount">
												<div class="product-item-amount-field-container">
													<span class="product-item-amount-field-btn-minus no-select" id="<?=$itemIds['QUANTITY_DOWN_ID']?>"></span>
													<div class="product-item-amount-field-block">
														<input class="product-item-amount-field" id="<?=$itemIds['QUANTITY_ID']?>" type="number" value="<?=$price['MIN_QUANTITY']?>">
														<span class="product-item-amount-description-container">
														<span id="<?=$itemIds['QUANTITY_MEASURE']?>"><?=$actualItem['ITEM_MEASURE']['TITLE']?></span>
														<span id="<?=$itemIds['PRICE_TOTAL']?>"></span>
													</span>
													</div>
													<span class="product-item-amount-field-btn-plus no-select" id="<?=$itemIds['QUANTITY_UP_ID']?>"></span>
												</div>
											</div>
										</div>
										<?php
									}

									break;

								case 'buttons':
									?>
									<div data-entity="main-button-container">
										<div id="<?=$itemIds['BASKET_ACTIONS_ID']?>"  class="product__info-buttons-wrapper" style="display: <?=($actualItem['CAN_BUY'] ? '' : 'none')?>;">
											<?php
											if ($showAddBtn)
											{
												?>
												<button class="product__info-add-to-cart" id="<?=$itemIds['ADD_BASKET_LINK']?>"
														href="javascript:void(0);"><?=$arParams['MESS_BTN_ADD_TO_BASKET']?></button>
												<?php
											}

											if ($showBuyBtn)
											{
												?>
												<a class="product__info-order" id="<?=$itemIds['BUY_LINK']?>"
														href="javascript:void(0);"><?=$arParams['MESS_BTN_BUY']?></a>
												<?php
											}
											?>
										</div>
									</div>
									<?php
									if ($showSubscribe)
									{
										?>
										<div class="mb-3">
											<?php
											$APPLICATION->IncludeComponent(
												'bitrix:catalog.product.subscribe',
												'',
												array(
													'CUSTOM_SITE_ID' => $arParams['CUSTOM_SITE_ID'] ?? null,
													'PRODUCT_ID' => $arResult['ID'],
													'BUTTON_ID' => $itemIds['SUBSCRIBE_LINK'],
													'BUTTON_CLASS' => 'product__info-order',
													'DEFAULT_DISPLAY' => !$actualItem['CAN_BUY'],
													'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
												),
												$component,
												array('HIDE_ICONS' => 'Y')
											);
											?>
										</div>
										<?php
									}
									?>
									<div class="mb-3" id="<?=$itemIds['NOT_AVAILABLE_MESS']?>" style="display: <?=(!$actualItem['CAN_BUY'] ? '' : 'none')?>;">
										<a class="product__info-order" href="javascript:void(0)" rel="nofollow"><?=$arParams['MESS_NOT_AVAILABLE']?></a>
									</div>
									<?php
									break;
							}
						}

						if ($arParams['DISPLAY_COMPARE'])
						{
							?>
							<div class="product-item-detail-compare-container">
								<div class="product-item-detail-compare">
									<div class="checkbox">
										<label class="m-0" id="<?=$itemIds['COMPARE_LINK']?>">
											<input type="checkbox" data-entity="compare-checkbox">
											<span data-entity="compare-title"><?=$arParams['MESS_BTN_COMPARE']?></span>
										</label>
									</div>
								</div>
							</div>
							<?php
						}
						?>

				</div>
			</div>
		</div>

	</div>
	<?php
	if ($haveOffers)
	{
		if ($arResult['OFFER_GROUP'])
		{
			?>
			<div class="row">
				<div class="col">
					<?php
					foreach ($arResult['OFFER_GROUP_VALUES'] as $offerId)
					{
						?>
						<span id="<?=$itemIds['OFFER_GROUP'].$offerId?>" style="display: none;">
							<?php
							$APPLICATION->IncludeComponent(
								'bitrix:catalog.set.constructor',
								'bootstrap_v4',
								array(
									'CUSTOM_SITE_ID' => $arParams['CUSTOM_SITE_ID'] ?? null,
									'IBLOCK_ID' => $arResult['OFFERS_IBLOCK'],
									'ELEMENT_ID' => $offerId,
									'PRICE_CODE' => $arParams['PRICE_CODE'],
									'BASKET_URL' => $arParams['BASKET_URL'],
									'OFFERS_CART_PROPERTIES' => $arParams['OFFERS_CART_PROPERTIES'],
									'CACHE_TYPE' => $arParams['CACHE_TYPE'],
									'CACHE_TIME' => $arParams['CACHE_TIME'],
									'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
									'TEMPLATE_THEME' => $arParams['~TEMPLATE_THEME'],
									'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
									'CURRENCY_ID' => $arParams['CURRENCY_ID'],
									'DETAIL_URL' => $arParams['~DETAIL_URL']
								),
								$component,
								array('HIDE_ICONS' => 'Y')
							);
							?>
						</span>
						<?php
					}
					?>
				</div>
			</div>
			<?php
		}
	}
	else
	{
		if ($arResult['MODULES']['catalog'] && $arResult['OFFER_GROUP'])
		{
			?>
			<div class="row">
				<div class="col">
					<?php $APPLICATION->IncludeComponent(
						'bitrix:catalog.set.constructor',
						'bootstrap_v4',
						array(
							'CUSTOM_SITE_ID' => $arParams['CUSTOM_SITE_ID'] ?? null,
							'IBLOCK_ID' => $arParams['IBLOCK_ID'],
							'ELEMENT_ID' => $arResult['ID'],
							'PRICE_CODE' => $arParams['PRICE_CODE'],
							'BASKET_URL' => $arParams['BASKET_URL'],
							'CACHE_TYPE' => $arParams['CACHE_TYPE'],
							'CACHE_TIME' => $arParams['CACHE_TIME'],
							'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
							'TEMPLATE_THEME' => $arParams['~TEMPLATE_THEME'],
							'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
							'CURRENCY_ID' => $arParams['CURRENCY_ID']
						),
						$component,
						array('HIDE_ICONS' => 'Y')
					);
					?>
				</div>
			</div>
			<?php
		}
	}
	?>

	<div class="row">
		<div class="col">
			<div class="row" id="<?=$itemIds['TABS_ID']?>">
				<div class="col">
					<div class="product-item-detail-tabs-container">
						<ul class="product-item-detail-tabs-list">
							<?php
							if ($showDescription)
							{
								?>
								<li class="product-item-detail-tab active" data-entity="tab" data-value="description">
									<a href="javascript:void(0);" class="product-item-detail-tab-link"><?=$arParams['MESS_DESCRIPTION_TAB']?></a>
								</li>
								<?php
							}

							if (!empty($arResult['DISPLAY_PROPERTIES']) || $arResult['SHOW_OFFERS_PROPS'])
							{
								?>
								<li class="product-item-detail-tab" data-entity="tab" data-value="properties">
									<a href="javascript:void(0);" class="product-item-detail-tab-link"><?=$arParams['MESS_PROPERTIES_TAB']?></a>
								</li>
								<?php
							}
							else {
								?>
								<li data-entity="tab" data-value="properties">
									<a href="javascript:void(0);" class="product-item-detail-tab-link not-use">Описание характеристик отсутствует</a>
								</li>
								<?php
							}

							if ($arParams['USE_COMMENTS'] === 'Y')
							{
								?>
								<li class="product-item-detail-tab" data-entity="tab" data-value="comments">
									<a href="javascript:void(0);" class="product-item-detail-tab-link">
										<span><?=$arParams['MESS_COMMENTS_TAB']?></span>
									</a>
								</li>
								<?php
							}
							?>
						</ul>
					</div>
				</div>
			</div>
			<div class="row" id="<?=$itemIds['TAB_CONTAINERS_ID']?>">
				<div class="col">
					<?php
					if ($showDescription)
					{
						?>
						<div class="product-item-detail-tab-content active"
							data-entity="tab-container"
							data-value="description"
							itemprop="description" id="<?=$itemIds['DESCRIPTION_ID']?>">
							<?php
							if (
								$arResult['PREVIEW_TEXT'] != ''
								&& (
									$arParams['DISPLAY_PREVIEW_TEXT_MODE'] === 'S'
									|| ($arParams['DISPLAY_PREVIEW_TEXT_MODE'] === 'E' && $arResult['DETAIL_TEXT'] == '')
								)
							)
							{
								echo $arResult['PREVIEW_TEXT_TYPE'] === 'html' ? $arResult['PREVIEW_TEXT'] : '<p>'.$arResult['PREVIEW_TEXT'].'</p>';
							}

							if ($arResult['DETAIL_TEXT'] != '')
							{
								echo $arResult['DETAIL_TEXT_TYPE'] === 'html' ? $arResult['DETAIL_TEXT'] : '<p>'.$arResult['DETAIL_TEXT'].'</p>';
							}
							?>
						</div>
						<?php
					}

					if (!empty($arResult['DISPLAY_PROPERTIES']) || $arResult['SHOW_OFFERS_PROPS'])
					{
						?>
						<div class="product-item-detail-tab-content" data-entity="tab-container" data-value="properties">
							<?php
							if (!empty($arResult['DISPLAY_PROPERTIES']))
							{
								?>
								<ul class="product-item-detail-properties">
									<?php
									foreach ($arResult['DISPLAY_PROPERTIES'] as $property)
									{
										?>
										<li class="product-item-detail-properties-item">
											<span class="product-item-detail-properties-name"><?=$property['NAME']?></span>
											<span class="product-item-detail-properties-dots"></span>
											<span class="product-item-detail-properties-value"><?=(
												is_array($property['DISPLAY_VALUE'])
													? implode(' / ', $property['DISPLAY_VALUE'])
													: $property['DISPLAY_VALUE']
												)?>
										</span>
										</li>
										<?
									}
									unset($property);
									?>
								</ul>
								<?php
							}

							if ($arResult['SHOW_OFFERS_PROPS'])
							{
								?>
								<ul class="product-item-detail-properties" id="<?=$itemIds['DISPLAY_PROP_DIV']?>"></ul>
								<?php
							}
							?>
						</div>
						<?php
					}

					if ($arParams['USE_COMMENTS'] === 'Y')
					{
						?>
						<div class="product-item-detail-tab-content" data-entity="tab-container" data-value="comments" style="display: none;">
							<?php
							$componentCommentsParams = array(
								'ELEMENT_ID' => $arResult['ID'],
								'ELEMENT_CODE' => '',
								'IBLOCK_ID' => $arParams['IBLOCK_ID'],
								'SHOW_DEACTIVATED' => $arParams['SHOW_DEACTIVATED'],
								'URL_TO_COMMENT' => '',
								'WIDTH' => '',
								'COMMENTS_COUNT' => '5',
								'BLOG_USE' => $arParams['BLOG_USE'],
								'FB_USE' => $arParams['FB_USE'],
								'FB_APP_ID' => $arParams['FB_APP_ID'],
								'VK_USE' => $arParams['VK_USE'],
								'VK_API_ID' => $arParams['VK_API_ID'],
								'CACHE_TYPE' => $arParams['CACHE_TYPE'],
								'CACHE_TIME' => $arParams['CACHE_TIME'],
								'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
								'BLOG_TITLE' => '',
								'BLOG_URL' => $arParams['BLOG_URL'],
								'PATH_TO_SMILE' => '',
								'EMAIL_NOTIFY' => $arParams['BLOG_EMAIL_NOTIFY'],
								'AJAX_POST' => 'Y',
								'SHOW_SPAM' => 'Y',
								'SHOW_RATING' => 'N',
								'FB_TITLE' => '',
								'FB_USER_ADMIN_ID' => '',
								'FB_COLORSCHEME' => 'light',
								'FB_ORDER_BY' => 'reverse_time',
								'VK_TITLE' => '',
								'TEMPLATE_THEME' => $arParams['~TEMPLATE_THEME']
							);
							if(isset($arParams["USER_CONSENT"]))
								$componentCommentsParams["USER_CONSENT"] = $arParams["USER_CONSENT"];
							if(isset($arParams["USER_CONSENT_ID"]))
								$componentCommentsParams["USER_CONSENT_ID"] = $arParams["USER_CONSENT_ID"];
							if(isset($arParams["USER_CONSENT_IS_CHECKED"]))
								$componentCommentsParams["USER_CONSENT_IS_CHECKED"] = $arParams["USER_CONSENT_IS_CHECKED"];
							if(isset($arParams["USER_CONSENT_IS_LOADED"]))
								$componentCommentsParams["USER_CONSENT_IS_LOADED"] = $arParams["USER_CONSENT_IS_LOADED"];
							$APPLICATION->IncludeComponent(
								'bitrix:catalog.comments',
								'',
								$componentCommentsParams,
								$component,
								array('HIDE_ICONS' => 'Y')
							);
							?>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<?php
			if ($arResult['CATALOG'] && $actualItem['CAN_BUY'] && \Bitrix\Main\ModuleManager::isModuleInstalled('sale'))
			{
				$APPLICATION->IncludeComponent(
					'bitrix:sale.prediction.product.detail',
					'',
					array(
						'CUSTOM_SITE_ID' => $arParams['CUSTOM_SITE_ID'] ?? null,
						'BUTTON_ID' => $showBuyBtn ? $itemIds['BUY_LINK'] : $itemIds['ADD_BASKET_LINK'],
						'POTENTIAL_PRODUCT_TO_BUY' => array(
							'ID' => $arResult['ID'] ?? null,
							'MODULE' => $arResult['MODULE'] ?? 'catalog',
							'PRODUCT_PROVIDER_CLASS' => $arResult['~PRODUCT_PROVIDER_CLASS'] ?? \Bitrix\Catalog\Product\Basket::getDefaultProviderName(),
							'QUANTITY' => $arResult['QUANTITY'] ?? null,
							'IBLOCK_ID' => $arResult['IBLOCK_ID'] ?? null,

							'PRIMARY_OFFER_ID' => $arResult['OFFERS'][0]['ID'] ?? null,
							'SECTION' => array(
								'ID' => $arResult['SECTION']['ID'] ?? null,
								'IBLOCK_ID' => $arResult['SECTION']['IBLOCK_ID'] ?? null,
								'LEFT_MARGIN' => $arResult['SECTION']['LEFT_MARGIN'] ?? null,
								'RIGHT_MARGIN' => $arResult['SECTION']['RIGHT_MARGIN'] ?? null,
							),
						)
					),
					$component,
					array('HIDE_ICONS' => 'Y')
				);
			}
			?>
		</div>
	</div>

	<!--Small Card-->
	<div class="p-2 product-item-detail-short-card-fixed d-none d-md-block" id="<?=$itemIds['SMALL_CARD_PANEL_ID']?>">
		<div class="product-item-detail-short-card-content-container">
			<div class="product-item-detail-short-card-image">
				<img src="" style="height: 65px;" data-entity="panel-picture">
			</div>
			<div class="product-item-detail-short-title-container" data-entity="panel-title">
				<div class="product-item-detail-short-title-text"><?=$name?></div>
				<?php
				if ($haveOffers)
				{
					?>
					<div>
						<div class="product-item-selected-scu-container" data-entity="panel-sku-container">
							<?php
							$i = 0;

							foreach ($arResult['SKU_PROPS'] as $skuProperty)
							{
								if (!isset($arResult['OFFERS_PROP'][$skuProperty['CODE']]))
								{
									continue;
								}

								$propertyId = $skuProperty['ID'];

								foreach ($skuProperty['VALUES'] as $value)
								{
									$value['NAME'] = htmlspecialcharsbx($value['NAME']);
									if ($skuProperty['SHOW_MODE'] === 'PICT')
									{
										?>
										<div class="product-item-selected-scu product-item-selected-scu-color selected"
											title="<?=$value['NAME']?>"
											style="background-image: url('<?=$value['PICT']['SRC']?>'); display: none;"
											data-sku-line="<?=$i?>"
											data-treevalue="<?=$propertyId?>_<?=$value['ID']?>"
											data-onevalue="<?=$value['ID']?>">
										</div>
										<?php
									}
									else
									{
										?>
										<div class="product-item-selected-scu product-item-selected-scu-text selected"
											title="<?=$value['NAME']?>"
											style="display: none;"
											data-sku-line="<?=$i?>"
											data-treevalue="<?=$propertyId?>_<?=$value['ID']?>"
											data-onevalue="<?=$value['ID']?>">
											<?=$value['NAME']?>
										</div>
										<?php
									}
								}

								$i++;
							}
							?>
						</div>
					</div>
					<?php
				}
				?>

			</div>
			<div class="product-item-detail-short-card-price">
				<?php
				if ($arParams['SHOW_OLD_PRICE'] === 'Y')
				{
					?>
					<div class="product__info-old" style="display: <?=($showDiscount ? '' : 'none')?>;" data-entity="panel-old-price">
						<?=($showDiscount ? $price['PRINT_RATIO_BASE_PRICE'] : '')?>
					</div>
					<?php
				}
				?>
				<div class="product__info-price" data-entity="panel-price"><?=$price['PRINT_RATIO_PRICE']?></div>
			</div>
			<?php
			if ($showAddBtn)
			{
				?>
				<div style="display: <?=($actualItem['CAN_BUY'] ? '' : 'none')?>;margin-right:15px;"
					data-entity="panel-add-button">
					<button class="product__info-add-to-cart"
						id="<?=$itemIds['ADD_BASKET_LINK']?>"
						href="javascript:void(0);">
						<?=$arParams['MESS_BTN_ADD_TO_BASKET']?>
					</button>
				</div>
				<?php
			}

			if ($showBuyBtn)
			{
				?>
				<div style="display: <?=($actualItem['CAN_BUY'] ? '' : 'none')?>;"
					data-entity="panel-buy-button">
					<a class="product__info-order"
						id="<?=$itemIds['BUY_LINK']?>"
						href="javascript:void(0);">
						<?=$arParams['MESS_BTN_BUY']?>
					</a>
				</div>
				<?php
			}
			?>
			<div style="display: <?=(!$actualItem['CAN_BUY'] ? '' : 'none')?>;"
				data-entity="panel-not-available-button">
				<a class="product__info-order" href="javascript:void(0)"
					rel="nofollow">
					<?=$arParams['MESS_NOT_AVAILABLE']?>
				</a>
			</div>
		</div>
	</div>
	<!--Top tabs-->
	<div class="pt-2 pb-0 product-item-detail-tabs-container-fixed d-none d-md-block" id="<?=$itemIds['TABS_PANEL_ID']?>">
		<ul class="product-item-detail-tabs-list">
			<?php
			if ($showDescription)
			{
				?>
				<li class="product-item-detail-tab active" data-entity="tab" data-value="description">
					<a href="javascript:void(0);" class="product-item-detail-tab-link">
						<span><?=$arParams['MESS_DESCRIPTION_TAB']?></span>
					</a>
				</li>
				<?php
			}

			if (!empty($arResult['DISPLAY_PROPERTIES']) || $arResult['SHOW_OFFERS_PROPS'])
			{
				?>
				<li class="product-item-detail-tab" data-entity="tab" data-value="properties">
					<a href="javascript:void(0);" class="product-item-detail-tab-link">
						<span><?=$arParams['MESS_PROPERTIES_TAB']?></span>
					</a>
				</li>
				<?php
			}

			if ($arParams['USE_COMMENTS'] === 'Y')
			{
				?>
				<li class="product-item-detail-tab" data-entity="tab" data-value="comments">
					<a href="javascript:void(0);" class="product-item-detail-tab-link">
						<span><?=$arParams['MESS_COMMENTS_TAB']?></span>
					</a>
				</li>
				<?php
			}
			?>
		</ul>
	</div>

	<meta itemprop="name" content="<?=$name?>" />
	<meta itemprop="category" content="<?=$arResult['CATEGORY_PATH']?>" />
	<meta itemprop="id" content="<?=$arResult['ID']?>" />
	<?php
	if ($haveOffers)
	{
		foreach ($arResult['JS_OFFERS'] as $offer)
		{
			$currentOffersList = array();

			if (!empty($offer['TREE']) && is_array($offer['TREE']))
			{
				foreach ($offer['TREE'] as $propName => $skuId)
				{
					$propId = (int)substr($propName, 5);

					foreach ($skuProps as $prop)
					{
						if ($prop['ID'] == $propId)
						{
							foreach ($prop['VALUES'] as $propId => $propValue)
							{
								if ($propId == $skuId)
								{
									$currentOffersList[] = $propValue['NAME'];
									break;
								}
							}
						}
					}
				}
			}

			$offerPrice = $offer['ITEM_PRICES'][$offer['ITEM_PRICE_SELECTED']];
			?>
			<span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
			<meta itemprop="sku" content="<?=htmlspecialcharsbx(implode('/', $currentOffersList))?>" />
			<meta itemprop="price" content="<?=$offerPrice['RATIO_PRICE']?>" />
			<meta itemprop="priceCurrency" content="<?=$offerPrice['CURRENCY']?>" />
			<link itemprop="availability" href="http://schema.org/<?=($offer['CAN_BUY'] ? 'InStock' : 'OutOfStock')?>" />
		</span>
			<?php
		}

		unset($offerPrice, $currentOffersList);
	}
	else
	{
		?>
		<span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
		<meta itemprop="price" content="<?=$price['RATIO_PRICE']?>" />
		<meta itemprop="priceCurrency" content="<?=$price['CURRENCY']?>" />
		<link itemprop="availability" href="http://schema.org/<?=($actualItem['CAN_BUY'] ? 'InStock' : 'OutOfStock')?>" />
	</span>
		<?php
	}
	?>
	<?php
	if ($haveOffers)
	{
		$offerIds = array();
		$offerCodes = array();

		$useRatio = $arParams['USE_RATIO_IN_RANGES'] === 'Y';

		foreach ($arResult['JS_OFFERS'] as $ind => &$jsOffer)
		{
			$offerIds[] = (int)$jsOffer['ID'];
			$offerCodes[] = $jsOffer['CODE'];

			$fullOffer = $arResult['OFFERS'][$ind];
			$measureName = $fullOffer['ITEM_MEASURE']['TITLE'];

			$strAllProps = '';
			$strMainProps = '';
			$strPriceRangesRatio = '';
			$strPriceRanges = '';

			if ($arResult['SHOW_OFFERS_PROPS'])
			{
				if (!empty($jsOffer['DISPLAY_PROPERTIES']))
				{
					foreach ($jsOffer['DISPLAY_PROPERTIES'] as $property)
					{
						$current = '<li class="product-item-detail-properties-item">
					<span class="product-item-detail-properties-name">'.$property['NAME'].'</span>
					<span class="product-item-detail-properties-dots"></span>
					<span class="product-item-detail-properties-value">'.(
							is_array($property['VALUE'])
								? implode(' / ', $property['VALUE'])
								: $property['VALUE']
							).'</span></li>';
						$strAllProps .= $current;

						if (isset($arParams['MAIN_BLOCK_OFFERS_PROPERTY_CODE'][$property['CODE']]))
						{
							$strMainProps .= $current;
						}
					}

					unset($current);
				}
			}

			if ($arParams['USE_PRICE_COUNT'] && count($jsOffer['ITEM_QUANTITY_RANGES']) > 1)
			{
				$strPriceRangesRatio = '('.Loc::getMessage(
						'CT_BCE_CATALOG_RATIO_PRICE',
						array('#RATIO#' => ($useRatio
								? $fullOffer['ITEM_MEASURE_RATIOS'][$fullOffer['ITEM_MEASURE_RATIO_SELECTED']]['RATIO']
								: '1'
							).' '.$measureName)
					).')';

				foreach ($jsOffer['ITEM_QUANTITY_RANGES'] as $range)
				{
					if ($range['HASH'] !== 'ZERO-INF')
					{
						$itemPrice = false;

						foreach ($jsOffer['ITEM_PRICES'] as $itemPrice)
						{
							if ($itemPrice['QUANTITY_HASH'] === $range['HASH'])
							{
								break;
							}
						}

						if ($itemPrice)
						{
							$strPriceRanges .= '<dt>'.Loc::getMessage(
									'CT_BCE_CATALOG_RANGE_FROM',
									array('#FROM#' => $range['SORT_FROM'].' '.$measureName)
								).' ';

							if (is_infinite($range['SORT_TO']))
							{
								$strPriceRanges .= Loc::getMessage('CT_BCE_CATALOG_RANGE_MORE');
							}
							else
							{
								$strPriceRanges .= Loc::getMessage(
									'CT_BCE_CATALOG_RANGE_TO',
									array('#TO#' => $range['SORT_TO'].' '.$measureName)
								);
							}

							$strPriceRanges .= '</dt><dd>'.($useRatio ? $itemPrice['PRINT_RATIO_PRICE'] : $itemPrice['PRINT_PRICE']).'</dd>';
						}
					}
				}

				unset($range, $itemPrice);
			}

			$jsOffer['DISPLAY_PROPERTIES'] = $strAllProps;
			$jsOffer['DISPLAY_PROPERTIES_MAIN_BLOCK'] = $strMainProps;
			$jsOffer['PRICE_RANGES_RATIO_HTML'] = $strPriceRangesRatio;
			$jsOffer['PRICE_RANGES_HTML'] = $strPriceRanges;
		}

		$templateData['OFFER_IDS'] = $offerIds;
		$templateData['OFFER_CODES'] = $offerCodes;
		unset($jsOffer, $strAllProps, $strMainProps, $strPriceRanges, $strPriceRangesRatio, $useRatio);

		$jsParams = array(
			'CONFIG' => array(
				'USE_CATALOG' => $arResult['CATALOG'],
				'SHOW_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
				'SHOW_PRICE' => true,
				'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'] === 'Y',
				'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'] === 'Y',
				'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
				'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
				'SHOW_SKU_PROPS' => $arResult['SHOW_OFFERS_PROPS'],
				'OFFER_GROUP' => $arResult['OFFER_GROUP'],
				'MAIN_PICTURE_MODE' => $arParams['DETAIL_PICTURE_MODE'],
				'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
				'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'] === 'Y',
				'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
				'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
				'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
				'USE_STICKERS' => true,
				'USE_SUBSCRIBE' => $showSubscribe,
				'SHOW_SLIDER' => $arParams['SHOW_SLIDER'],
				'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
				'ALT' => $alt,
				'TITLE' => $title,
				'MAGNIFIER_ZOOM_PERCENT' => 200,
				'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
				'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
				'BRAND_PROPERTY' => !empty($arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']])
					? $arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']]['DISPLAY_VALUE']
					: null,
				'SHOW_SKU_DESCRIPTION' => $arParams['SHOW_SKU_DESCRIPTION'],
				'DISPLAY_PREVIEW_TEXT_MODE' => $arParams['DISPLAY_PREVIEW_TEXT_MODE']
			),
			'PRODUCT_TYPE' => $arResult['PRODUCT']['TYPE'],
			'VISUAL' => $itemIds,
			'DEFAULT_PICTURE' => array(
				'PREVIEW_PICTURE' => $arResult['DEFAULT_PICTURE'],
				'DETAIL_PICTURE' => $arResult['DEFAULT_PICTURE']
			),
			'PRODUCT' => array(
				'ID' => $arResult['ID'],
				'ACTIVE' => $arResult['ACTIVE'],
				'NAME' => $arResult['~NAME'],
				'CATEGORY' => $arResult['CATEGORY_PATH'],
				'DETAIL_TEXT' => $arResult['DETAIL_TEXT'],
				'DETAIL_TEXT_TYPE' => $arResult['DETAIL_TEXT_TYPE'],
				'PREVIEW_TEXT' => $arResult['PREVIEW_TEXT'],
				'PREVIEW_TEXT_TYPE' => $arResult['PREVIEW_TEXT_TYPE']
			),
			'BASKET' => array(
				'QUANTITY' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
				'BASKET_URL' => $arParams['BASKET_URL'],
				'SKU_PROPS' => $arResult['OFFERS_PROP_CODES'],
				'ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
				'BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE']
			),
			'OFFERS' => $arResult['JS_OFFERS'],
			'OFFER_SELECTED' => $arResult['OFFERS_SELECTED'],
			'TREE_PROPS' => $skuProps
		);
	}
	else
	{
		$emptyProductProperties = empty($arResult['PRODUCT_PROPERTIES']);
		if ($arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y' && !$emptyProductProperties)
		{
			?>
			<div id="<?=$itemIds['BASKET_PROP_DIV']?>" style="display: none;">
				<?php
				if (!empty($arResult['PRODUCT_PROPERTIES_FILL']))
				{
					foreach ($arResult['PRODUCT_PROPERTIES_FILL'] as $propId => $propInfo)
					{
						?>
						<input type="hidden" name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propId?>]" value="<?=htmlspecialcharsbx($propInfo['ID'])?>">
						<?php
						unset($arResult['PRODUCT_PROPERTIES'][$propId]);
					}
				}

				$emptyProductProperties = empty($arResult['PRODUCT_PROPERTIES']);
				if (!$emptyProductProperties)
				{
					?>
					<table>
						<?php
						foreach ($arResult['PRODUCT_PROPERTIES'] as $propId => $propInfo)
						{
							?>
							<tr>
								<td><?=$arResult['PROPERTIES'][$propId]['NAME']?></td>
								<td>
									<?php
									if (
										$arResult['PROPERTIES'][$propId]['PROPERTY_TYPE'] === 'L'
										&& $arResult['PROPERTIES'][$propId]['LIST_TYPE'] === 'C'
									)
									{
										foreach ($propInfo['VALUES'] as $valueId => $value)
										{
											?>
											<label>
												<input type="radio" name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propId?>]"
													value="<?=$valueId?>" <?=($valueId == $propInfo['SELECTED'] ? '"checked"' : '')?>>
												<?=$value?>
											</label>
											<br>
											<?php
										}
									}
									else
									{
										?>
										<select name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propId?>]">
											<?php
											foreach ($propInfo['VALUES'] as $valueId => $value)
											{
												?>
												<option value="<?=$valueId?>" <?=($valueId == $propInfo['SELECTED'] ? '"selected"' : '')?>>
													<?=$value?>
												</option>
												<?php
											}
											?>
										</select>
										<?php
									}
									?>
								</td>
							</tr>
							<?php
						}
						?>
					</table>
					<?php
				}
				?>
			</div>
			<?php
		}

		$jsParams = array(
			'CONFIG' => array(
				'USE_CATALOG' => $arResult['CATALOG'],
				'SHOW_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
				'SHOW_PRICE' => !empty($arResult['ITEM_PRICES']),
				'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'] === 'Y',
				'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'] === 'Y',
				'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
				'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
				'MAIN_PICTURE_MODE' => $arParams['DETAIL_PICTURE_MODE'],
				'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
				'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'] === 'Y',
				'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
				'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
				'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
				'USE_STICKERS' => true,
				'USE_SUBSCRIBE' => $showSubscribe,
				'SHOW_SLIDER' => $arParams['SHOW_SLIDER'],
				'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
				'ALT' => $alt,
				'TITLE' => $title,
				'MAGNIFIER_ZOOM_PERCENT' => 200,
				'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
				'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
				'BRAND_PROPERTY' => !empty($arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']])
					? $arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']]['DISPLAY_VALUE']
					: null
			),
			'VISUAL' => $itemIds,
			'PRODUCT_TYPE' => $arResult['PRODUCT']['TYPE'],
			'PRODUCT' => array(
				'ID' => $arResult['ID'],
				'ACTIVE' => $arResult['ACTIVE'],
				'PICT' => reset($arResult['MORE_PHOTO']),
				'NAME' => $arResult['~NAME'],
				'SUBSCRIPTION' => true,
				'ITEM_PRICE_MODE' => $arResult['ITEM_PRICE_MODE'],
				'ITEM_PRICES' => $arResult['ITEM_PRICES'],
				'ITEM_PRICE_SELECTED' => $arResult['ITEM_PRICE_SELECTED'],
				'ITEM_QUANTITY_RANGES' => $arResult['ITEM_QUANTITY_RANGES'],
				'ITEM_QUANTITY_RANGE_SELECTED' => $arResult['ITEM_QUANTITY_RANGE_SELECTED'],
				'ITEM_MEASURE_RATIOS' => $arResult['ITEM_MEASURE_RATIOS'],
				'ITEM_MEASURE_RATIO_SELECTED' => $arResult['ITEM_MEASURE_RATIO_SELECTED'],
				'SLIDER_COUNT' => $arResult['MORE_PHOTO_COUNT'],
				'SLIDER' => $arResult['MORE_PHOTO'],
				'CAN_BUY' => $arResult['CAN_BUY'],
				'CHECK_QUANTITY' => $arResult['CHECK_QUANTITY'],
				'QUANTITY_FLOAT' => is_float($arResult['ITEM_MEASURE_RATIOS'][$arResult['ITEM_MEASURE_RATIO_SELECTED']]['RATIO']),
				'MAX_QUANTITY' => $arResult['PRODUCT']['QUANTITY'],
				'STEP_QUANTITY' => $arResult['ITEM_MEASURE_RATIOS'][$arResult['ITEM_MEASURE_RATIO_SELECTED']]['RATIO'],
				'CATEGORY' => $arResult['CATEGORY_PATH']
			),
			'BASKET' => array(
				'ADD_PROPS' => $arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y',
				'QUANTITY' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
				'PROPS' => $arParams['PRODUCT_PROPS_VARIABLE'],
				'EMPTY_PROPS' => $emptyProductProperties,
				'BASKET_URL' => $arParams['BASKET_URL'],
				'ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
				'BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE']
			)
		);
		unset($emptyProductProperties);
	}

	if ($arParams['DISPLAY_COMPARE'])
	{
		$jsParams['COMPARE'] = array(
			'COMPARE_URL_TEMPLATE' => $arResult['~COMPARE_URL_TEMPLATE'],
			'COMPARE_DELETE_URL_TEMPLATE' => $arResult['~COMPARE_DELETE_URL_TEMPLATE'],
			'COMPARE_PATH' => $arParams['COMPARE_PATH']
		);
	}

	$jsParams["IS_FACEBOOK_CONVERSION_CUSTOMIZE_PRODUCT_EVENT_ENABLED"] =
		$arResult["IS_FACEBOOK_CONVERSION_CUSTOMIZE_PRODUCT_EVENT_ENABLED"]
	;

	?>
</div>
<script>
	BX.message({
		ECONOMY_INFO_MESSAGE: '<?=GetMessageJS('CT_BCE_CATALOG_ECONOMY_INFO2')?>',
		TITLE_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_TITLE_ERROR')?>',
		TITLE_BASKET_PROPS: '<?=GetMessageJS('CT_BCE_CATALOG_TITLE_BASKET_PROPS')?>',
		BASKET_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_BASKET_UNKNOWN_ERROR')?>',
		BTN_SEND_PROPS: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_SEND_PROPS')?>',
		BTN_MESSAGE_DETAIL_BASKET_REDIRECT: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_BASKET_REDIRECT')?>',
		BTN_MESSAGE_CLOSE: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE')?>',
		BTN_MESSAGE_DETAIL_CLOSE_POPUP: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE_POPUP')?>',
		TITLE_SUCCESSFUL: '<?=GetMessageJS('CT_BCE_CATALOG_ADD_TO_BASKET_OK')?>',
		COMPARE_MESSAGE_OK: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_OK')?>',
		COMPARE_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_UNKNOWN_ERROR')?>',
		COMPARE_TITLE: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_TITLE')?>',
		BTN_MESSAGE_COMPARE_REDIRECT: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT')?>',
		PRODUCT_GIFT_LABEL: '<?=GetMessageJS('CT_BCE_CATALOG_PRODUCT_GIFT_LABEL')?>',
		PRICE_TOTAL_PREFIX: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_PRICE_TOTAL_PREFIX')?>',
		RELATIVE_QUANTITY_MANY: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_MANY'])?>',
		RELATIVE_QUANTITY_FEW: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_FEW'])?>',
		SITE_ID: '<?=CUtil::JSEscape($component->getSiteId())?>'
	});

	var <?=$obName?> = new JCCatalogElement(<?=CUtil::PhpToJSObject($jsParams, false, true)?>);
</script>
<?php
unset($actualItem, $itemIds, $jsParams);
