<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 11.03.2019
 * Time: 03:21
 * © : 2019
 */

class UsrRights
{

    function __construct()
    {
        $this->db = new Database();
    }

    public function  CheckLVL($rights,$controller){
        $load_controller = $this->db->prepare("SELECT * FROM rights WHERE name = '".$controller."'");
        $load_controller->execute();
        #echo $load_controller->rowCount();
        if($load_controller->rowCount()==0){
            return true;
        }else{
            $controller = $load_controller->fetchAll();
            $load_rights = $this->db->prepare(
                    "SELECT * FROM rights2group 
                              WHERE `right` = '".$controller[0]['r_id']."' AND `level` = '".$rights."'");

            $load_rights->execute();
            if($load_rights->rowCount()==0){
                return false;
            }else{
                return true;
            }
        }
    }
}