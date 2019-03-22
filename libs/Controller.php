<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 23.02.2019
 * Time: 00:22
 * © : 2019
 */


class Controller {

	function __construct() {
        Session::init();
	    $this->view = new View();

	}
	
	public function loadModel($name) {
	    $path = 'models/'.$name.'_model.php';
		if (file_exists($path)) {
			require 'models/'.$name.'_model.php';
			$modelName = $name . '_Model';

			$this->model = new $modelName();
		}		
	}
}