<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 15.03.2019
 * Time: 07:41
 * © : 2019
 */

class bearbeiten extends Controller
{
    function __construct() {
        parent::__construct();
    }

    function index(){

    }

    function kind($id=''){
        if($_POST['id']=='')$_POST['id'] = $id;
        $this->view->kind = $this->model->getKind($_POST['id']);
        $this->view->vormund_1 = $this->model->getVormund($this->view->kind['vormund_1']);
        $this->view->vormund_2 = $this->model->getVormund($this->view->kind['vormund_2']);
        $this->view->gruppe = $this->model->getGruppe($this->view->kind['gruppe']);

        $this->view->render("bearbeiten/kind_form");
    }

    function kinder(){
        $this->view->render("bearbeiten/kinder");
    }

    function kind_save(){
        $k_id = $_POST['k_id'];
        unset($_POST['k_id']);
        $this->model->kind_save($k_id);
        $this->kind($k_id);
    }

    function json_kind(){
        $var = $this->model->getKind();
        exit(json_encode($var));
    }

    function vormunde(){
        $this->view->render("bearbeiten/vormund");
    }

    function vormund_save(){
        $v_id = $_POST['v_id'];
        unset($_POST['v_id']);
        $this->model->vormund_save($v_id);
        $this->vormund($v_id);
    }

    function vormund($id=''){
        if($_POST['id']=='')$_POST['id'] = $id;
        $this->view->vormund = $this->model->getVormund($_POST['id']);
        $this->view->render("bearbeiten/vormund_form");
    }

    function json_vormund(){
        $var = $this->model->getVormund();
        exit(json_encode($var));
    }

    function standort($id=''){
        if($id=='') $id = $_POST['id'];
        $this->view->so = $this->model->getStandorte($id);
        if($id=='') {
            $this->view->render("bearbeiten/standort");
        }else{
            $this->view->render("bearbeiten/standort_form");
        }
    }

    function standort_save(){
        $id = $_POST['id'];
        unset($_POST['id']);
        $this->model->saveStandort($id);
        $this->view->status='gespeichert';
        $this->standort($id);
    }

    function gruppe($id=''){
        if($id=='') $id = $_POST['id'];
        $this->view->gr = $this->model->getGruppe($id);
        if($id=='') {
            $this->view->render("bearbeiten/gruppe");
        }else{
            $this->view->render("bearbeiten/gruppe_form");
        }
    }

    function gruppe_save(){
        $id = $_POST['id'];
        unset($_POST['id']);
        $this->model->saveGruppe($id);
        $this->view->status='gespeichert';
        $this->standort($id);
    }

}