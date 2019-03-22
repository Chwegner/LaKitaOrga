<?php

class Anlegen extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {

        $this->view->render('anlegen/index');

    }
    function kinder($absenden=false){
        if($absenden==true){
            $this->model->eintragen_kinder($_POST);
            $this->view->render("anlegen/done");
        }else {
            $this->view->render("anlegen/kinder");
        }
    }
    function eltern($absenden=false){
        if($absenden==true){
            $this->model->eintragen_eltern($_POST);
            $this->view->render("anlegen/done");
        }else {
            $this->view->render("anlegen/eltern");
        }
    }
    function standort($absenden=false){
        if($absenden==true){
            $this->model->eintragen_standort($_POST);
            $this->view->render("anlegen/done");
        }else {
            $this->view->render("anlegen/standort");
        }
    }
    function gruppen($absenden=false){
        if($absenden==true){
            $this->model->eintragen_gruppe($_POST);
            $this->view->render("anlegen/done");
        }else {
            $this->view->ort = $this->model->getGruppen();
            $this->view->render("anlegen/gruppen");
        }
    }
    function getJson(){

        $erg = $this->model->getJson_data();
        exit(json_encode($erg));
    }
}