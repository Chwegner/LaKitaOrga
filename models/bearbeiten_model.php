<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 15.03.2019
 * Time: 07:42
 * © : 2019
 */

class Bearbeiten_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function kind_save($k_id){
        $this->db->update("kinder",$_POST,"WHERE k_id = '".$k_id."'");
        log_action(date("Y-m-d H:i"),SESSION::get('u_name'),'Kind '.$k_id.' geändert');
    }

    function getKind($id=''){
        if($id=='') {
            $var = $this->db->select("kinder", "*", "WHERE nachname like '%" . $_POST['hint'] . "%'");
            for ($i = 0; $i < count($var); $i++) {
                $array[$i] = array("label" => $var[$i]['nachname'] . ' ' . $var[$i]['vorname'], "value" => $var[$i]['k_id']);
            }
            return $array;
        }else{
            return $this->db->select("kinder","*","WHERE k_id = '".$id."'",'',1);
        }
    }

    function getVormund($id=''){
        if($id=='') {
            $var = $this->db->select("vormund", "*", "WHERE nachname like '%" . $_POST['hint'] . "%'");
            for ($i = 0; $i < count($var); $i++) {
                $array[$i] = array("label" => $var[$i]['nachname'] . ' ' . $var[$i]['vorname'], "value" => $var[$i]['v_id']);
            }
            return $array;
        }else{
            return $this->db->select("vormund","*","WHERE v_id = '".$id."'",'',1);
        }
    }

    function getGruppe($id=''){
        if ($id != '') {
            return $this->db->select("gruppen", "*", "WHERE g_id = '" . $id . "'", '', 1);
        }else{
            return $this->db->select("gruppen","*");
        }
    }

    function saveGruppe($id){
        $this->db->update("gruppe",$_POST,"WHERE g_id = '".id."'");
        log_action(date("Y-m-d H:i"),SESSION::get('u_name'),'Gruppe '.$id.' geändert');
    }

    function vormund_save($v_id){
        $this->db->update("vormund",$_POST,"WHERE v_id = '".$v_id."'");
        log_action(date("Y-m-d H:i"),SESSION::get('u_name'),'Vormund '.$v_id.' geändert');
    }

    function getStandorte($id=''){
        if($id=='') {
            return $this->db->select("standort", "*");
        }else{
            return $this->db->select("standort", "*","WHERE s_id = '".$id."'",'',1);
        }
    }
    function saveStandort($id){
        $this->db->update("standort",$_POST,"WHERE s_id='".$id."'");
        log_action(date("Y-m-d H:i"),SESSION::get('u_name'),'Standort '.$id.' geändert');
    }
}