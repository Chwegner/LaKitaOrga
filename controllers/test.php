<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 11.03.2019
 * Time: 09:06
 * © : 2019
 */
class Test extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $_POST['vorname'] = 'Manuel';
        $_POST['zweitname'] = '';
        $_POST['nachname'] = 'Osterholzer';
        echo uname_gen($_POST['vorname'],$_POST['zweitname'],$_POST['nachname']);
    }

    function rechte_index(){
        $this->view->rechte = $this->model->getRechte();
        $this->view->gruppen = $this->model->getGruppen();
        $this->view->real_names = $this->model->getNames();
        $this->view->render("admin/rechte");
    }

    function rechteInsert(){
        $this->view->rechteInsert = 'Recht erfolgreich eingetragen!';
        $this->model->rechteInsert();
        $this->rechte_index();
    }

    function delrechte($id){
        $this->view->rechteDel = 'Recht gelöscht!';
        $this->model->delRechte($id);
        $this->rechte_index();
    }

    function gruppeInsert(){
        $this->view->gruppeInsert = 'Gruppenrecht erfolgreich zugewisen!';
        $this->model->gruppeInsert();
        $this->rechte_index();
    }

    function delgruppe($id){
        $this->view->gruppeDel = 'Gruppenrecht gelöscht!';
        $this->model->delGruppe($id);
        $this->rechte_index();
    }

}