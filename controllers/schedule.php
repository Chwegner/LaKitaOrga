<?php
/**
 * Created by IntelliJ IDEA.
 * User: cwegner
 * Date: 15.03.2019
 * Time: 08:47
 */

class Schedule extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('schedule/index');
    }

    function Overview()
    {
        $this->view->schedule = $this->model->Overview();
        $this->view->render('schedule/index');
    }

    function newDate($erg='')
    {
        $this->view->erg = $erg;
        $this->view->userlist = $this->model->userList();
        $this->view->grouplist = $this->model->groupList();
        $this->view->render('schedule/newDate');
    }

    function addDate()
    {
        log_action(date("d.m.Y - H:i:s"), Session::get('u_name'), "Einsatzzeitraum für Mitarbeiter (ID): " . $_POST['employee']);

        $erg = $this->model->newDate();
        $this->newDate($erg);
    }
}
