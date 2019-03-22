<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 11.03.2019
 * Time: 09:06
 * © : 2019
 */
class Test_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function getRechte(){
        return $this->db->select("rights","*");
    }

    function getGruppen(){
        $erg = $this->db->prepare("
                SELECT t1.*,t2.name AS real_name,t3.name as right_name 
                FROM rights2group as t1, rightsNames as t2, rights as t3 
                WHERE t1.level = t2.g_id AND t3.r_id = t1.right");
        $erg->execute();
        $result = $erg->fetchAll();
        return $result;
    }

    function getNames(){
        return $this->db->select("rightsNames","*");
    }

    function rechteInsert(){
        $data = array(
            "r_id"=>$_POST['r_id'],
            "name"=>$_POST['name']
        );
        $this->db->insert("rights",$data);
    }

    function delRechte($id){
        $this->db->delete("rights","WHERE id = '".$id."'");
    }

    function gruppeInsert(){
        $data = array(
            "level"=>$_POST['level'],
            "right"=>$_POST['right']
        );
        $this->db->insert("rights2group",$data);
    }

    function delGruppe($id){
        $this->db->delete("rights2group","WHERE id = '".$id."'");
    }
}