<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 21.03.2019
 * Time: 08:23
 * © : 2019
 */

$outside = true;
include '../config.php';
include '../libs/Database.php';
$db = new Database();

$erg = $db->select("buchung","*","ORDER BY b_id DESC");
pre_r($erg);
?>


