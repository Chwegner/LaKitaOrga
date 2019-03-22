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


class FiBu extends Controller {

	function __construct() {
		parent::__construct();
	}

    function getDaten($absenden=false){
	    if($absenden==true){
            $this->view->anzeige_daten = $this->model->anzeigeDaten($_POST);
            $this->view->render("fibu/index");
        }
    }

    function setZugangsdaten($absenden=false){
        if($absenden==true){
            if($this->view->zugangsdaten_speichern = $this->model->zugangsdatenSpeichern($_POST)){
                $this->view->ausgabe="Die Daten wurden gespeichert";
            }
            $this->view->render("fibu/zugangsdaten");
        }
    }

    function setZahlung($absenden=false){
        if($absenden==true){
            if ((empty($_POST["name"])) or (empty($_POST["betrag"]))){
                $this->view->ausgabe = "<p class='p1'> Fehler!<br>Möglicherweise existiert zu diesem Datum kein offener Posten,<br>oder Sie haben keinen Namen angegeben!<br><br></p>";
            }elseif($this->model->zahlungSpeichern($_POST)){
                $this->view->zahlung_speichern = '';
                $this->view->ausgabe="Die Daten wurden gespeichert";
            }else{
                $this->view->ausgabe = "<p class='p1'> Fehler!<br>Möglicherweise existiert zu diesem Datum kein offener Posten,<br>oder Sie haben keinen Namen angegeben!<br><br></p>";
            }
            $this->view->render("fibu/buchen");
        }
    }


	function getMonat($monat){
	    $this->model->buchungen_anzeigen($monat);
    }


	//Startseit FiBu - Buchungen anzeigen
	function index() {

		$this->view->render('fibu/index');

	}

    //FiBu - manuell buchen
    function buchen($jahr="",$monat="",$name="",$id="") {
	    //Leerzeichen zwischen Nachname und Vorname einfuegen
        $name = str_replace("@"," ",$name);
        //Parameter in Array speichern
        $this->view->datenVorhanden = array("jahr"=>$jahr,
                                            "monat"=>$monat,
                                            "name"=>$name,
                                            "id"=>$id,);

        $this->view->render('fibu/buchen');

    }

    //FiBu - Bank Stammdaten
    function zugangsdaten() {

        $this->view->daten=$this->model->getZugangsdaten();
        $this->view->render('fibu/zugangsdaten');

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