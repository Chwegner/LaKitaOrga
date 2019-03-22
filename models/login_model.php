<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 23.02.2019
 * Time: 00:22
 * © : 2019
 */

class Login_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function run()
	{
	    $sth = $this->db->prepare("SELECT * FROM `".DB_PREFIX."mitarbeiter` WHERE u_name = :login");
		$sth->execute(array(
			':login' => $_POST['login']
		));
		// ein datensatz
		$data = $sth->fetch();
		// mehrere datensätze
        #$data = $sth->fetchAll();
		#print_r($data);
		$count =  $sth->rowCount();
		if ($count > 0) {
		    if(password_verify($_POST['password'],$data['u_pwd'])) {
                // login
                Session::init();
                Session::set('loggedIn', true);
                Session::set('u_id', $data['u_id']);
                Session::set('u_rights',$data['u_rights']);
                Session::set('u_name',$data['u_name']);

                $data1 = array("last_login"=>date());
                $this->db->update("mitarbeiter",$data1,"WHERE u_id = '".$data['u_id']."'");

                //Wohin der eingelogte User geleitet werden soll
                header('location: ../index/index');

            } else {
		        $data2 = array("login_false"=>$data['login_false']+1);
                $this->db->update("mitarbeiter",$data2,"WHERE u_id = '".$data['u_id']."'");
		        header('location: ../login');
            }
		} else {
		    header('location: ../login');
		}
	}
	
}
