<?php
error_reporting(0);
if(isset($outside) AND $outside == true){
    $configs = parse_ini_file('../.env');
}
else{
    $configs = parse_ini_file('./.env');
}
//Mal sehen werden noch ersetzt
define('HASH_GENERAL_KEY', 'MixitUp200');

define('HASH_PASSWORD_KEY', 'catsFLYhigh2000miles');


foreach($configs AS $key=>$value){
    define($key,$value);
}
define('PUBLIC_URL',URL.PUBLIC_FOLDER);

// Global include aus dem Ordner global_functions für weitere Funktionen
foreach(glob("libs/global_functions/*.php") as $file) include($file);


function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

$phpFileUploadErrors = array (
    0 => 'Kein Fehler Datei hochgeladen!',
    1 => 'Datei ist zu groß php.ini Beschränkung',
    2 => 'Datei ist zu groß HTML Beschränkung',
    3 => 'Datei wurde nicht ganz hochgeladen',
    4 => 'Keine Datei hochgeladen',
    6 => 'Kein temporärer Ordner vorhanen',
    7 => 'Fehler beim schreiben der Datei',
    8 => 'eine PHP Erweiterung stoppte den Upload'
);

function reArrayFiles($file_post){
    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for($i=0;$i<$file_count;$i++){
        foreach ($file_keys as $key){
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }
    return $file_ary;
}

