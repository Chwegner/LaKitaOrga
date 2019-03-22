<?php
/**
 * Created by IntelliJ IDEA.
 * User: cwegner
 * Date: 15.03.2019
 * Time: 08:50
 */

class Schedule_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Overview()
    {

        if (isset($_POST['scheduleSearchButton'])) {
            $groupname = "%" . $_POST['scheduleSearch'] . "%";

            $erg = $this->db->prepare("
                                        SELECT 
                                        t1.job_start AS start, t1.job_end AS finish, 
                                        t2.u_id AS userid, t2.vorname AS firstname, 
                                        t2.nachname AS lastname, 
                                        t3.g_id AS groupid, t3.gruppen_name AS groupname 
                                        FROM 
                                        einsatzzeiten AS t1, mitarbeiter AS t2, gruppen AS t3 
                                        WHERE 
                                        t1.employee = t2.u_id 
                                        AND 
                                        t1.group_id = t3.g_id 
                                        AND t3.gruppen_name LIKE '" . $groupname . "' 
                                        AND t1.job_end >= CURRENT_DATE");

            $erg->execute();
            $data = $erg->fetchAll();
            return $data;
        }

    }

    public function userList()
    {
        $erg = $this->db->select('mitarbeiter', '*');

        return $erg;
    }

    public function groupList()
    {
        $erg = $this->db->select('gruppen', '*');

        return $erg;
    }

    public function newDate()
    {
        try {
            if (isset($_POST['save'])) {
                foreach($_POST AS $key=>$value){
                    if($value == ''){
                        $_POST[$key] = NULL;
                    }
                }
                $start = $_POST['startdate'];
                $end = $_POST['enddate'];
                $userid = $_POST['employee'];
                $groupid = $_POST['groupname'];

                $erg = $this->db->prepare('
                                        INSERT INTO einsatzzeiten (job_start, job_end, employee, group_id) 
                                        VALUES (?, ?, ?, ?)');
                $erg->execute(array($start, $end, $userid, $groupid));

                $success = "Einsatz erfolgreich gespeichert";

                return $success;

            }
        } catch (PDOException $e)
        {
            $fail = "Fehler beim Speichern!";
            return $fail;
        }

    }
}
