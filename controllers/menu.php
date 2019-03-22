<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 13.03.2019
 * Time: 08:01
 * © : 2019
 */

class Menu extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->kat = $this->model->getKat();
        $this->view->link = $this->model->getLink();
        $this->view->links = $this->model->katlinks();
        $this->view->render("menu/admin/index");

    }

    function k_del($id){
        $this->model->k_del($id);
        $this->index();
    }

    function k_create(){

        $this->model->k_create();
        $this->index();
    }

    function l_del($id){
        $this->model->l_del($id);
        $this->index();
    }

    function l_create(){
        $this->model->l_create();
        $this->index();
    }

    function sort(){
        $this->model->sort($_POST);
        $this->index();
    }

    function test(){
        $menu = $this->model->katlinks();
        pre_r($menu);

    }
}