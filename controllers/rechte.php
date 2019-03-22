<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 20.03.2019
 * Time: 07:58
 * © : 2019
 */

class Rechte extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
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
        $this->index();
    }

    function delrechte($id)
    {
        $this->view->rechteDel = 'Recht gelöscht!';
        $this->model->delRechte($id);
        $this->index();
    }

    function gruppeInsert()
    {
        $this->view->gruppeInsert = 'Gruppenrecht erfolgreich zugewisen!';
        $this->model->gruppeInsert();
        $this->index();
    }

    function delgruppe($id)
    {
        $this->view->gruppeDel = 'Gruppenrecht gelöscht!';
        $this->model->delGruppe($id);
        $this->index();
    }
}