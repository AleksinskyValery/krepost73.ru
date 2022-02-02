<?php
$res = AllProductDiscount::getFull(
    array("ACTIVE" => "Y", "SITE_ID" => SITE_ID),
    array()
);
foreach($res['IDS'] as $ID) {
    $sale_id[] = $ID;
}
$GLOBALS['arrFilter'] = array("ID"=>$sale_id);
?>