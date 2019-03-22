<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 23.02.2019
 * Time: 00:22
 * © : 2019
 */

class Admin extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->logfile = $this->model->showLog();
        $this->view->blockedUser = $this->model->Blocked();
        $this->view->unpaid = $this->model->Unpaid();
        $this->view->vacation = $this->model->Vacation();
        $this->view->userlist = $this->model->Userlist();
        $this->view->render('admin/index');
    }

    function create($pwd = "")
    {
        $this->view->pwd = $pwd;
        $this->view->grouplist = $this->model->Grouplist();
        $this->view->userRights = $this->model->RightsList();
        $this->view->render('admin/create');
    }

    function change($erg = "")
    {
        $this->view->erg = $erg;
        $this->view->userlist = $this->model->ChangeStaff();
        $this->view->render('admin/change');
    }

    function staffNew()
    {
        log_action(date("d.m.Y - H:i:s"), Session::get('u_name'), "User angelegt: " . uname_gen($_POST['firstname'], $_POST['secondname'], $_POST['surname']));
        $pwd = $this->model->NewStaff();
        $this->create($pwd);
    }

    function staffChange($id = "")
    {

        $this->view->grouplist = $this->model->Grouplist();

        if ($id == "") {
            $this->model->ChangeStaff();
        } else {
            $this->view->userdetails = $this->model->showuser($id);
        }

        $this->change();

    }

    function changeUser()
    {
        log_action(date("d.m.Y - H:i:s"), Session::get('u_name'), "Mitarbeiter bearbeitet (ID): " . $_POST['userId']);
        $erg = $this->model->userChange();
        $this->change($erg);
    }

    function rechte_index()
    {
        $this->view->rechte = $this->model->getRechte();
        $this->view->gruppen = $this->model->getGruppen();
        $this->view->real_names = $this->model->getNames();
        $this->view->render("admin/rechte");
    }

    function rechteInsert()
    {
        $this->view->rechteInsert = 'Recht erfolgreich eingetragen!';
        $this->model->rechteInsert();
        $this->rechte_index();
    }

    function delrechte($id)
    {
        $this->view->rechteDel = 'Recht gelöscht!';
        $this->model->delRechte($id);
        $this->rechte_index();
    }

    function gruppeInsert()
    {
        $this->view->gruppeInsert = 'Gruppenrecht erfolgreich zugewisen!';
        $this->model->gruppeInsert();
        $this->rechte_index();
    }

    function delgruppe($id)
    {
        $this->view->gruppeDel = 'Gruppenrecht gelöscht!';
        $this->model->delGruppe($id);
        $this->rechte_index();
    }

    function vacation()
    {
        $this->view->userlist = $this->model->Userlist();
        $this->view->render("admin/vacation");
    }

    function vacationNew()
    {
        $this->model->vacationNew();
        log_action(date("d.m.Y - H:i:s"), Session::get('u_name'), "Urlaub eingetragen für MitarbeiterID: " . $_POST['u_id']);
        $this->vacation();
    }


}
