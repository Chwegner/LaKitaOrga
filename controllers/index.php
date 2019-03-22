<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 23.02.2019
 * Time: 00:22
 * © : 2019
 */


class Index extends Controller {

	function __construct() {
		parent::__construct();
	}
	
	function index() {

        if(SESSION::get('loggedIn')) {
            $this->view->render('index/index');
        }else{
            $this->view->render("login/index");
        }

	}
	public function uebersicht(){
        $this->view->test="tschau";

        $this->view->render('index/index');
    }

    /*
     * rein zur veranschaulichung wie die suche funktioniert
     */
    public function test(){
        $this->view->daten = $this->model->test_daten();
	    $this->view->render("index/test");
    }
    /*
     * rein zur veranschaulichung wie die suche funktioniert
     */
    public function get_test(){
	    /*
	     * Wird vom javascript aufgerufen und gibt die daten zurück
	     * für die suche es muß nix gerendert bitte exit(json_encode($var)) nutzen
	     */
	    $erg = $this->model->get_test_json();
	    exit(json_encode($erg));
    }

    public function db_test(){
        $this->model->kinder_fuellen();
    }
}