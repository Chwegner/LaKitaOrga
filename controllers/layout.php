<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 21.03.2019
 * Time: 07:33
 * © : 2019
 */

class Layout extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index(){

    }

    function change(){
        $_referer = $_SERVER["HTTP_REFERER"];
        $layout = SESSION::get('layout');
        if($layout==0)SESSION::set('layout',1);else SESSION::set('layout',0);
        header('Location: '.$_referer);
    }
}