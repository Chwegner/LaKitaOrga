<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 12.03.2019
 * Time: 10:21
 * © 2019
 */


/**
 * Liefert ein array zurück mit dem Passwort in klartext und verschlüsselt
 *
 * @param int $laenge [OPTIONAL]
 * @return array(pwd_klar,pwd_schluessel)
 */

function pwd_gen($laenge = 8)
{
    $pwd = '';
    $pool = "ABCDEFGHJKMNPQRSTUVWXYZ";
    $pool .= strtolower($pool);
    $pool .= "123456789";
    srand((double)microtime() * 1000000);
    for ($i = 0; $i < $laenge; $i++) {
        $pwd .= substr($pool, (rand() % (strlen($pool))), 1);
    }
    $pwd_schluessel = password_hash($pwd, PASSWORD_DEFAULT);
    $pwd_array = array("pwd_klar" => $pwd, "pwd_verschluesselt" => $pwd_schluessel);

    return $pwd_array;
}

function uname_gen($vorname, $zweitname = '', $nachname)
{
    $u_name = strtolower(substr($vorname, 0, 1));
    if ($zweitname != '') {
        $u_name .= strtolower(substr($zweitname, 0, 1));
    }
    $u_name .= strtolower($nachname);

    return $u_name;
}

function sort_menu($link)
{
    $link_arr = array();
    foreach ($link AS $key => $value) {
        $link_arr['id'][$key] = '0';
        $link_arr['name'][$key] = 'name';
        $link_arr['ziel'][$key] = 'ziel';
        $link_arr['up'][$key] = 'up';
        $link_arr['sort'][$key] = 'sort';

    }
    for ($i = 0; $i < count($link); $i++) {
        $link_arr['id'][$i] = $link[$i]['id'];
        $link_arr['name'][$i] = $link[$i]['name'];
        $link_arr['ziel'][$i] = $link[$i]['ziel'];
        $link_arr['up'][$i] = $link[$i]['up'];
        $link_arr['sort'][$i] = $link[$i]['sort'];
    }
    return $link_arr;
}


function log_action($date, $username, $what)
{
    $string = "\r\n" . $date . "|" . $username . "|" . $what."|";


    touch("logs/log.txt");


    $fp = fopen("logs/log.txt", "a");


    fputs($fp, $string);


    fclose($fp);


}

