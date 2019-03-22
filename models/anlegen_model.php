<?php

/**
 * Created by PhpStorm.
 * User: sholtei
 * Date: 08.03.2019
 * Time: 09:32
 */
class Anlegen_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function eintragen_eltern($uebergabe_ellis)
    {

        for ($i = 1; $i <= 2; $i++) {
            if ($uebergabe_ellis['anrede_' . $i]) {
                $data['anrede'] = $uebergabe_ellis['anrede_' . $i];
            }

            if ($uebergabe_ellis['vorname_' . $i]) {
                $data['vorname'] = $uebergabe_ellis['vorname_' . $i];
            }

            if ($uebergabe_ellis['zweitname_' . $i]) {
                $data['zweitname'] = $uebergabe_ellis['zweitname_' . $i];
            }

            if ($uebergabe_ellis['nachname_' . $i]) {
                $data['nachname'] = $uebergabe_ellis['nachname_' . $i];
            }

            if ($uebergabe_ellis['straße_' . $i]) {
                $data['strasse'] = $uebergabe_ellis['straße_' . $i];
            }

            if ($uebergabe_ellis['hausnummer_' . $i]) {
                $data['hausnummer'] = $uebergabe_ellis['hausnummer_' . $i];
            }

            if ($uebergabe_ellis['postleitzahl_' . $i]) {
                $data['plz'] = $uebergabe_ellis['postleitzahl_' . $i];
            }

            if ($uebergabe_ellis['ort_' . $i]) {
                $data['ort'] = $uebergabe_ellis['ort_' . $i];
            }

            if ($uebergabe_ellis['telefonnummer_' . $i]) {
                $data['telefonnummer'] = $uebergabe_ellis['telefonnumer_' . $i];
            }

            if ($uebergabe_ellis['handynummer_' . $i]) {
                $data['mobil'] = $uebergabe_ellis['handynummer_' . $i];
            }

            if ($uebergabe_ellis['e-Mail_' . $i]) {
                $data['mail'] = $uebergabe_ellis['e-Mail_' . $i];
            }
            if (!empty($uebergabe_ellis['vorname_' . $i])) {

                $this->db->insert("vormund", $data);
                log_action(date("Y-m-d H:i"),SESSION::get('u_name'),"Vormund: ".$data['nachname'].' '.$data['vorname'].' angeleget.');
            }
        }

    }

    function eintragen_kinder($uebergabe_kids)
    {

        $this->db->insert("kinder",$_POST);
        log_action(date("Y-m-d H:i"),SESSION::get('u_name'),"Kind: ".$_POST['nachname'].' '.$_POST['vorname'].' angeleget.');

    }

    function eintragen_gruppe($uebergabe_grp)
    {

        if ($uebergabe_grp['gruppen_name']) {
            $data['gruppen_name'] = $uebergabe_grp['gruppen_name'];
        }

        if ($uebergabe_grp['standort_id']) {
            $data['standort_id'] = $uebergabe_grp['standort_id'];
        }
        if (!empty($data['gruppen_name'])) {
            $this->db->insert("gruppen", $data);
            log_action(date("Y-m-d H:i"),SESSION::get('u_name'),"Gruppe angelegt ".$data['gruppen_name']);
        }

    }

    function eintragen_standort($uebergabe_standort)
    {

       $this->db->insert("standort",$_POST);

    }

    function getJson_data(){

        if (!empty($_POST['hint'])) {
            $erg = $this->db->select("vormund", array('nachname', 'vorname', 'v_id'), "WHERE nachname like '%" . $_POST['hint'] . "%'");
            for ($i = 0; $i < count($erg); $i++) {
                $array[$i] = array("label" => $erg[$i]['nachname'] . ' ' . $erg[$i]['vorname'], "value" => $erg[$i]['v_id']);
            }
            return $array;
        }
        if (!empty($_POST['hint_1'])) {
            $erg = $this->db->select("vormund", array('nachname', 'vorname', 'v_id'), "WHERE nachname like '%" . $_POST['hint_1'] . "%'");
            for ($i = 0; $i < count($erg); $i++) {
                $array[$i] = array("label" => $erg[$i]['nachname'] . ' ' . $erg[$i]['vorname'], "value" => $erg[$i]['v_id']);
            }
            return $array;
        }
        if (!empty($_POST['hint_2'])) {
            $erg = $this->db->select("gruppen", "*", "WHERE gruppen_name like '%" . $_POST['hint_2'] . "%'");
            for ($i = 0; $i < count($erg); $i++) {
                $array[$i] = array("label" => $erg[$i]['gruppen_name'], "value" => $erg[$i]['g_id']);
            }
            return $array;
        }
    }

    function getGruppen(){
        return $this->db->select("standort","*");
    }

}