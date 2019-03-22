<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 22.03.2019
 * Time: 08:40
 * © : 2019
 */

class Entwicklung extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    function index(){

        $this->view->render("entwicklung/index");
    }

    function load(){
        $this->view->kind = $this->model->load();
        $this->view->change = true;
        $this->index();
    }

    function save(){
        $this->model->save();
        $this->view->succsess = ' eingetragen ';
        $this->index();
    }

    function jsonKind(){
        $erg = $this->model->getKinder();
        exit(json_encode($erg));

    }

}