<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 23.02.2019
 * Time: 00:22
 * © : 2019
 */


class Err extends Controller {

	function __construct() {
		parent::__construct();
	}
	
	function index() {
		$this->view->title = '404 Error';
		$this->view->render('err/inc/header', false);
		$this->view->msg = 'Die Seite existiert nicht !!';
		$this->view->render('err/index', false);
		$this->view->render('err/inc/footer', false);
	}

	function urights_false(){
	    $this->view->title = 'Fehlende Berechtigung';
        $this->view->render('err/inc/header', false);
        $this->view->msg = 'fehlende Benutzerrechte';
        $this->view->render('err/index', false);
        $this->view->render('err/inc/footer', false);
    }

}