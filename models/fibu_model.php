<?php
/**
 * Copyright (c) 2019.
 * by Dammers web&werbung
 */

/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 23.02.2019
 * Time: 15:57
 * © 2019
 */
class FiBu_Model extends Model{

    public function __construct()
    {
        parent::__construct();
    }


    public function anzeigeDaten($daten)
    {

        if (($daten["jahr"] == "alle") && ($daten["monat"] != "alle")) {
            $where = "WHERE date BETWEEN '2017-01-01' AND NOW() AND MONTH(date) = '".$daten["monat"]."'";
        } elseif (($daten["jahr"] != "alle") && ($daten["monat"] == "alle")) {
            $where = "WHERE date BETWEEN '".$daten["jahr"]."-01-01' and NOW()";
        } elseif (($daten["jahr"] == "alle") && ($daten["monat"] == "alle")) {
            $where = "WHERE date BETWEEN '2017-01-01' and NOW()";
        } else {
            $where = "where date between '" . $daten["jahr"] . "-" . $daten["monat"] . "-01' and '" . $daten["jahr"] . "-" . $daten["monat"] . "-31'";
        }
        if($_POST['id']!=''){
            $where .= " AND k_id = '".$_POST['id']."'";
        }
        
        $buchungen = $this->db->select("buchung", "*", $where);
        return $buchungen;
    }


    public function zugangsdatenSpeichern($daten){

            $this->db->update("stammdaten",$daten,"where id = '1'");
        log_action(date("Y-m-d H:i"),SESSION::get('u_name'),"STAMMDATEN GEÄNDERT");
            return true;
		}

    public function getZugangsdaten(){

        return $this->db->select("stammdaten","*","where id = '1'",'',1);
    }

    public function zahlungSpeichern($daten){

        $setDaten = array("status"=>"bezahlt","betrag"=>$daten["betrag"]);
        $erg = $this->db->update("buchung",$setDaten,"WHERE YEAR(date) = '" . $daten["jahr"] . "' AND MONTH(date) = '" . $daten["monat"] . "' AND k_id = '" . $daten["id"] . "'");
        if($erg[1]==0){
            log_action(date("Y-m-d H:i"),SESSION::get('u_name'),"KindID: ".$daten["id"].' Buchung bezahlt '.$daten["jahr"].' '.$daten["monat"].'.');
            return true;
        }else{
            return false;
        }

    }

    public function buchungen_anzeigen($jahr,$monat){
        return "jahr = ".$jahr." monat= ".$monat;
    }

    public function get_name_index(){
        $erg = $this->db->select("kinder",array("nachname","vorname","k_id"),"WHERE nachname like '%".$_POST['hint']."%'");
        for($i=0;$i<count($erg);$i++){
            $array[$i] = array("label"=>$erg[$i]['nachname']. ' '.$erg[$i]['vorname'],"value"=>$erg[$i]['k_id']);
        }
        return $array;
    }
    public function get_name_buchen(){
        $erg = $this->db->select("kinder",array("nachname","vorname","k_id"),"WHERE nachname like '%".$_POST['hint']."%'");
        for($i=0;$i<count($erg);$i++){
            $array[$i] = array("label"=>$erg[$i]['nachname']. ' '.$erg[$i]['vorname'],"value"=>$erg[$i]['k_id']);
        }
        return $array;
    }
}