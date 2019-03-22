<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 22.03.2019
 * Time: 08:42
 * © : 2019
 */

class Entwicklung_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function load(){
        $id = $_POST['k_id'];
        return $this->db->select("kinder","*","WHERE k_id = '".$id."'",'',1);
    }

    function save(){
        $id = $_POST['k_id'];
        $data = array('entwicklung'=>$_POST['entwicklung']);
        $this->db->update("kinder",$data,"WHERE k_id = '".$id."'");
    }

    function getKinder(){
        $var = $this->db->select("kinder", "*", "WHERE nachname like '%" . $_POST['hint'] . "%'");
        for ($i = 0; $i < count($var); $i++) {
            $array[$i] = array("label" => $var[$i]['nachname'] . ' ' . $var[$i]['vorname'], "value" => $var[$i]['k_id']);
        }
        return $array;
    }

}