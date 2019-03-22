<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 23.02.2019
 * Time: 00:22
 * © : 2019
 */


class Login extends Controller {

	function __construct() {
		parent::__construct();	
	}
	
	function index() 
	{
		$this->view->title = 'Login';
		$this->view->render('login/index');
	}
	
	function run()
	{
	    $this->model->run();
	}

	function logout(){
	    session_destroy();
	    header('Location: ../index');
    }
	

}