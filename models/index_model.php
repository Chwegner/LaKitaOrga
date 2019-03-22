<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 23.02.2019
 * Time: 15:57
 * © 2019
 */
class Index_Model extends Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function test_daten(){
        $erg = $this->db->select("vormund",array('nachname','vorname'),"order by nachname");
        return $erg;
    }
    /*
     * rein zur veranschaulichung wie die suche funktioniert
     */
    public function get_test_json(){
        /*
         * $_POST['hint] ist das was der user in der suche eingibt mit % $var % sucht
         * es alle eingaben in dem betrefenden feld das irgedwie übereinstimmt
         * in der for schleife wird das array zusammengebaut für
         * das Javascript bitte darauf achten das label im array ist das was im suchfeld angezeigt
         * wird das value das was im hint_id ausgefüllt wird
         */
        $erg = $this->db->select("vormund",array(nachname,vorname,v_id),"WHERE nachname like '%".$_POST['hint']."%'");$array[] = array("value"=>$erg['v_id'],"label"=>$erg['nachname']);
        for($i=0;$i<count($erg);$i++){
            $array[$i] = array("label"=>$erg[$i]['nachname']. ' '.$erg[$i]['vorname'],"value"=>$erg[$i]['v_id']);
        }
        return $array;
    }

    public function kinder_fuellen(){
        for ($i=301;$i<=601;$i++){
            $erg = $this->db->select("kinder","*","WHERE vormund_2 = '0' limit 0,1","",1);
            $data = array("vormund_2"=>$i);
            $this->db->update("kinder",$data,"where k_id = '".$erg['k_id']."' order by k_id ");
        }

    }
}