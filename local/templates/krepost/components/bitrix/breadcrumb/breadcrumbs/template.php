<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '<div class="container"><div class="breadcrumbs__wrapper" >';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	$arrow = ($index > 0? '<div class="breadcrumbs__divider"></div>' : '');

	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		$strReturn .= $arrow.'<a href="'.$arResult[$index]["LINK"].'" class="breadcrumbs__link">'.$title.'</a>';
	}
	else
	{
		$strReturn .= $arrow.'<span " class="breadcrumbs__link">'.$title.'</span>';
	}
}

$strReturn .= '</div></div>';

return $strReturn;