<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 12.03.2019
 * Time: 11:43
 * © 2019
 */
$outside = true;
include '../config.php';
include '../libs/Database.php';
$db = new Database();

$stammdaten = $db->select("stammdaten","*","WHERE id='1'","",1);
$schema = parse_url($stammdaten['url'], PHP_URL_SCHEME);
$host =  parse_url($stammdaten['url'], PHP_URL_HOST);
$port = parse_url($stammdaten['url'], PHP_URL_PORT);
$path = parse_url($stammdaten['url'], PHP_URL_PATH);
$path=substr($path,1,strlen($path)-1);
if($port=='')$port=80;
if($schema=='https')$schema='http';
$daten = file_get_contents($schema.'://'.$host.':'.$port.'/'.$path.'?username='.$stammdaten['benutzer'].'&passwort='.$stammdaten['pin']);
$data = explode("|",$daten);
$summe =  count($data)-1;
echo $summe;
echo '<br>';
if(empty($_GET['counter']))$counter=0;else $counter = $_GET['counter'];
$j=$counter;

for($i=$counter;$i<$summe/3;$i++){
    echo $data[($i*3)+0].' - '.$data[($i*3)+1].' - '.$data[($i*3)+2].'<br>';
    $data_b = array("date"=>$data[($i*3)+0],"k_id"=>$data[($i*3)+1]);
    $db->insert("buchung",$data_b);
    $data_b = '';
    $j++;
    if($j%100 == 0){
        break;
    }
}

if($counter<($summe/3)){
    $url = 'http://lakitaorga.ostsan.de/cronjobs/bank_cron_set.php?counter='.$j;
    $ausgabe = '<br>Neuladen in 5 Sekunden.';
    $ausgabe .= "<meta http-equiv='refresh' content='5;url=".$url."'>";
}else{
    $ausgabe = '<br><h1>Fertig</h1>';
}

    echo $ausgabe;


