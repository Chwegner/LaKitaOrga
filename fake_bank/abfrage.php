<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 06.03.2019
 * Time: 10:53
 * © : 2019
 */
$outside = true;
require '../config.php';
require '../libs/Database.php';
$db = new Database();

$username = 'lakita';
$passwort = '12345';

if(empty($_GET['username']) OR empty($_GET['passwort'])) {
    echo '1009|';
}elseif($_GET['username']!=$username OR $_GET['passwort']!=$passwort){
    echo '1008|';
}else{
    if(!empty($_GET['von']) AND !empty($_GET['bis'])){
        $where = "WHERE date between '".$_GET['von']."' AND '".$_GET['bis']."'";
    }
    $erg = $db->select("z_fake_bank_buchungen","*",$where);
    $count = count($erg);
    if($count>0) {
        $ausgabe = '';
        for ($i = 0; $i < count($erg); $i++) {
            $ausgabe .= $erg[$i]['date'] . "|" . $erg[$i]['verwendungszweck'] . "|" . $erg[$i]['betrag'] . "|";
        }
    }else{
        $ausgabe = '1002|';
    }
    echo $ausgabe;
}

