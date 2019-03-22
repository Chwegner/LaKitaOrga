<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 23.02.2019
 * Time: 00:22
 * © : 2019
 */

class Auth
{
	public static function handleLogin()
	{
		@session_start();
		$logged = $_SESSION['loggedIn'];
		if ($logged == false)
		{
			session_destroy();
			header('location: ../login');
			exit;
		}

		/*Session::init();
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('location: '. URL . 'login');
			exit;
		}*/
	}

}