<?php
/**
 * Copyright (c) 2019.
 * by Dammers web&werbung
 */

/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 23.02.2019
 * Time: 00:22
 * © : 2019
 */


class Uebersicht extends Controller {

	function __construct() {
		parent::__construct();
	}

	//Testausgabe
    function testausgabe(){
	    $this->view->render('uebersicht/index');
    }

	//Startseit Uebersicht
	function index() {

		$this->view->render('uebersicht/index');

	}

    //Uebersicht - Stammdaten Kind
    function kind($id=false) {
        if(!is_bool($id)){
            $KindName = $this->model->getStammdatenKindName($id);
            $name = $KindName["nachname"]." ".$KindName["vorname"];
            $this->view->datenVorhanden = array("id"=>$id,"name"=>$name,);
        }
        $this->view->daten = $this->model->getStammdatenKind($_POST);
        $this->view->render('uebersicht/kind');
    }

    //Uebersicht - Stammdaten Vormund
    function vormund($id=false) {
	    if(!is_bool($id)){
            $VormundName = $this->model->getStammdatenVormundName($id);
            $name = $VormundName["nachname"]." ".$VormundName["vorname"];
            $this->view->datenVorhanden = array("id"=>$id,"name"=>$name,);
        }
        $this->view->daten=$this->model->getStammdatenVormund($_POST);
        $this->view->render('uebersicht/vormund');
    }

    //Uebersicht - Stammdaten Mitarbeiter
    function mitarbeiter($id=false){
        if(!is_bool($id)){
            $mitarbeiterName = $this->model->getStammdatenMitarbeiterName($id);
            $name = $mitarbeiterName["nachname"]." ".$mitarbeiterName["vorname"];
            $this->view->datenVorhanden = array("id"=>$id,"name"=>$name,);
        }
        $this->view->daten=$this->model->getStammdatenMitarbeiter($_POST["id"]);
        $this->view->render('uebersicht/mitarbeiter');
    }

    //Uebersicht - Stammdaten Standorte
    function standorte($id=false){
        if($id=="true"){
            $this->view->daten_leiter = $this->model->getStandortleiter($_POST["standorte"]);
            $this->view->daten_standorte = $this->model->getDatenStandorte($_POST["standorte"]);
        }
        /*
        if(!is_bool($id)){
            $gruppenName = $this->model->getGruppenName($id);
            $this->view->datenVorhanden = array("id"=>$id,"name"=>$gruppenName);
        }
        */
        $this->view->daten=$this->model->getStandorte();
        $this->view->render('uebersicht/standorte');
    }

    //Uebersicht - Gruppen
    function gruppen($id=false){
	    if($id=="true"){
            $this->view->daten_mitarbeiter = $this->model->getMitarbeiterName($_POST["gruppe"]);
            $this->view->daten_gruppenname = $this->model->getGruppenName($_POST["gruppe"]);
            $this->view->daten_kinder = $this->model->getDatenGes($_POST["gruppe"]);
        }
        if(!is_bool($id)){
            $gruppenName = $this->model->getGruppenName($id);
            $this->view->datenVorhanden = array("id"=>$id,"name"=>$gruppenName);
        }
        $this->view->daten = $this->model->getGruppen();
        $this->view->render('uebersicht/gruppen');
    }
    //suchFeldMitarbeiter
    function suchFeldMitarbeiter(){
        $erg = $this->model->get_name_mitarbeiter();
        exit(json_encode($erg));
    }
    //suchFeldVormund
    function suchFeldVormund(){
        $erg = $this->model->get_name_vormund();
        exit(json_encode($erg));
    }
    //suchFeldINdex
    function suchFeldIndex(){
        $erg = $this->model->get_name_index();
        exit(json_encode($erg));
    }
    //suchFeldBuchen
    function suchFeldBuchen(){
        $erg = $this->model->get_name_buchen();
        exit(json_encode($erg));
    }
}