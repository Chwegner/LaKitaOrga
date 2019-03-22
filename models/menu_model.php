<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 13.03.2019
 * Time: 08:03
 * © : 2019
 */

class Menu_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function k_create()
    {
        $data = array(
            "name" => $_POST['kat'],
            "up" => "1"
        );
        $this->db->insert("menue", $data);
    }

    function k_del($id)
    {
        $this->db->delete("menue", "WHERE id='" . $id . "'");
    }

    function getKat()
    {
        return $this->db->select("menue", "*", "WHERE up='1' order by name");
    }

    function l_create()
    {
        $data = array(
            "name" => $_POST['l_name'],
            "up" => $_POST['e_id'],
            "ziel" => $_POST['z_name']
        );
        $this->db->insert("menue", $data);
    }

    function l_del($id)
    {
        $this->db->delete("menue", "WHERE id='" . $id . "'");
    }

    function getLink($id = '')
    {
        if ($id != '') {
            return $this->db->select("menue", "*", "WHERE up = '" . $id . "'  ORDER BY sort ");
        } else {
            return $this->db->select("menue", "*", "WHERE up <> '1'  ORDER BY up ");
        }
    }

    function sort($array)
    {
        $input = explode("|", key($array));
        $id = $input[1];
        $parent = $input[0];
        $position = $array[key($array)];
        $richtung = $array['direction'];

        if ($position > 0) {
            if ($richtung == 'runter') {
                $old = $position + 1;
            } elseif ($richtung == 'hoch') {
                $old = $position - 1;
            }
            $t = $this->db->select("menue", "*", "WHERE up = '" . $parent . "' AND sort='" . $old . "'",'',1);
            $data1 = array("sort"=>$position);
            $data2 = array("sort"=>$old);
            $this->db->update("menue",$data1,"WHERE id = '".$t['id']."'");
            $this->db->update("menue",$data2,"WHERE id = '".$id."'");
        }

        #$t = $this->db->select

        #$this->db->update("menue",$data,"WHERE id = '".$input[1]."'");

    }

    function katlinks()
    {
        $links = array();
        $kat = $this->getKat();
        foreach ($kat as $key => $value) {
            $links[$value['id']] = array("kat" => $value['name']);
            $link = $this->getLink($value['id']);

            for ($i = 0; $i < count($link); $i++) {
                $links[$value['id']][$i]['id'] = $link[$i]['id'];
                $links[$value['id']][$i]['name'] = $link[$i]['name'];
                $links[$value['id']][$i]['ziel'] = $link[$i]['ziel'];
                $links[$value['id']][$i]['up'] = $link[$i]['up'];
                $links[$value['id']][$i]['sort'] = $link[$i]['sort'];
            }
        }
        return $links;
    }

}