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
class Uebersicht_Model extends Model{

    public function __construct()
    {
        parent::__construct();
    }
/*
 * Uebersicht Kind
 * ---------------------------------------------------------------------------------------------------------------------
 */
    public function getStammdatenKind($daten){
        return $this->db->select("kinder","*","WHERE k_id = '".$daten["id"]."'",'',1);
    }
    public function getStammdatenKindName($id){
        return $this->db->select("kinder","*","WHERE k_id = '".$id."'",'',1);
    }
/*
 * ---------------------------------------------------------------------------------------------------------------------
 */

/*
 * Uebersicht Vormund
 * ---------------------------------------------------------------------------------------------------------------------
 */
    public function getStammdatenVormund($daten){
        $erg = $this->db->prepare("SELECT t1.*,t2.k_id FROM vormund AS t1, kinder AS t2 WHERE t1.v_id = t2.vormund_1 AND t1.v_id = '".$daten["id"]."'");
        $erg->execute();
        return $erg->fetch();
    }
    public function getStammdatenVormundName($id){
        return $this->db->select("vormund","*","WHERE v_id = '".$id."'",'',1);
    }
/*
 * ---------------------------------------------------------------------------------------------------------------------
 */

/*
 * Uebersicht Gruppen
 * ---------------------------------------------------------------------------------------------------------------------
 */
    public function getGruppen(){
        return $this->db->select("gruppen","*");
    }
    public function getGruppenName($id){
        return $this->db->select("gruppen","gruppen_name","WHERE g_id = '".$id."'",'',1);
    }
    public function getDatenGes($id){
        return $this->db->select("kinder","*","WHERE gruppe = '".$id."'");
    }
    public function getMitarbeiterName($id){
        return $this->db->select("mitarbeiter","*","WHERE gruppe = '".$id."'");
    }
/*
 * ---------------------------------------------------------------------------------------------------------------------
 */

/*
 * Uebersicht Mitarbeiter
 * ---------------------------------------------------------------------------------------------------------------------
 */
    public function getStammdatenMitarbeiter($id){
        return $this->db->select("mitarbeiter","*","WHERE u_id = '".$id."'",'',1);
    }
    public function getStammdatenMitarbeiterName($id){
        return $this->db->select("mitarbeiter","*","WHERE u_id = '".$id."'",'',1);
    }
/*
 * ---------------------------------------------------------------------------------------------------------------------
 */

/*
 * Uebersicht Standorte
 * ---------------------------------------------------------------------------------------------------------------------
 */
    public function getStandortleiter($id){
        $erg = $this->db->prepare("SELECT mitarbeiter.anrede, mitarbeiter.vorname, mitarbeiter.nachname, mitarbeiter.u_id, standort.leiter
                                              FROM mitarbeiter, standort
                                              WHERE standort.leiter = mitarbeiter.u_id
                                              AND standort.s_id = '".$id."'");
        $erg->execute();
        return $erg->fetch();
    }
    public function getDatenStandorte($id){
        return $this->db->select("standort","*","WHERE s_id = '".$id."'", '',1);
    }
    public function getStandorte(){
        return $this->db->select("standort","*");
    }


/*
 * Suchfunktion
 * ---------------------------------------------------------------------------------------------------------------------
 */
    public function get_name_mitarbeiter(){
        $erg = $this->db->select("mitarbeiter",array("nachname","vorname","u_id"),"WHERE nachname like '%".$_POST['hint']."%'");
        for($i=0;$i<count($erg);$i++){
            $array[$i] = array("label"=>$erg[$i]['nachname']. ' '.$erg[$i]['vorname'],"value"=>$erg[$i]['u_id']);
        }
        return $array;
    }
    public function get_name_vormund(){
        $erg = $this->db->select("vormund",array("nachname","vorname","v_id"),"WHERE nachname like '%".$_POST['hint']."%'");
        for($i=0;$i<count($erg);$i++){
            $array[$i] = array("label"=>$erg[$i]['nachname']. ' '.$erg[$i]['vorname'],"value"=>$erg[$i]['v_id']);
        }
        return $array;
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