<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 23.02.2019
 * Time: 00:22
 * © : 2019
 */


class View {

	function __construct() {
	    $this->db2 = new Database();
	    $kat = $this->db2->select("menue","*","WHERE up = '1' order by name");
	    for($i=0;$i<count($kat);$i++){

	        $erg = $this->db2->select("menue","*","WHERE up = '".$kat[$i]['id']."' ORDER by sort");

	        for($j=0;$j<count($erg);$j++){

                $menu[$kat[$i]['name']][$erg[$j]['name']] = $erg[$j]['ziel'];

            }
        }
	    $this->menu = $menu;



    }

	public function render($name, $display = true)
	{
		if (!$display) {
			require 'views/' . $name . '.php';	
		}
		else {
			require 'views/header.php';
			require 'views//menu/menu.php';
			require 'views/' . $name . '.php';
			require 'views/footer.php';	
		}
	}
}