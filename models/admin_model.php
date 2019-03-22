<?php

/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 23.02.2019
 * Time: 15:57
 * © 2019
 */
class Admin_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function Blocked()
    {
        $erg = $this->db->select("mitarbeiter", "*", "WHERE login_false = '3'");

        return $erg;

    }

    public function Unpaid()
    {
        $erg = $this->db->prepare("SELECT month(t1.date) AS monthDate, year(t1.date) AS yearDate,
                                            t2.vorname AS kindV, t2.nachname AS kindN, t2.k_id AS idk, 
                                            t3.vorname AS vormundV, t3.nachname AS vormundN, t3.v_id AS id
                                            FROM `buchung` AS t1, `kinder` AS t2, `vormund` AS t3  
                                            WHERE t1.status = 'offen' 
                                            AND t1.k_id = t2.k_id 
                                            AND t3.v_id = t2.vormund_1 
                                            LIMIT 0,10");
        $erg->execute();
        $data = $erg->fetchAll();

        return $data;
    }

    public function Vacation()
    {
        $erg = $this->db->prepare("SELECT 
                                            t1.vorname AS mitarbeiterV, t1.nachname AS mitarbeiterN, 
                                            DATE_FORMAT(t2.von, '%d.%m.%Y') AS vacationStart, 
                                            DATE_FORMAT(t2.bis, '%d.%m.%Y') AS vacationEnd 
                                            FROM mitarbeiter AS t1, urlaub AS t2 
                                            WHERE CURRENT_DATE <= t2.bis 
                                            AND t1.u_id = t2.u_id");
        $erg->execute();
        $data = $erg->fetchAll();

        return $data;
    }

    public function Userlist()
    {
        $erg = $this->db->prepare("SELECT 
                                            u_id, u_name, u_rights, vorname, nachname, gruppe,  
                                            DATE_FORMAT(last_change_pwd, '%d.%m.%Y') AS changed, 
                                            u_mail  
                                            FROM mitarbeiter");
        $erg->execute();
        $data = $erg->fetchAll();

        return $data;

    }

    public function Grouplist()
    {
        $erg = $this->db->prepare("SELECT t1.gruppen_name AS gruppe, t1.g_id AS id, 
                                            t2.standort_name AS ort, t2.s_id AS sid 
                                            FROM gruppen AS t1, standort AS t2 
                                            WHERE t1.standort_id = t2.s_id");
        $erg->execute();
        $data = $erg->fetchAll();

        return $data;
    }

    public function RightsList()
    {
        $erg = $this->db->select("rightsNames", "*");

        return $erg;
    }

    public function NewStaff()
    {
        $back = array();

        try {
            if (isset($_POST['save'])) {
                $title = $_POST['title'];
                $firstname = $_POST['firstname'];
                $secondname = $_POST['secondname'];
                $surname = $_POST['surname'];
                $group = $_POST['group'];
                $rights = $_POST['rights'];
                $email = $_POST['email'];

                $newUsername = uname_gen($_POST['firstname'], $_POST['secondname'], $_POST['surname']);
                $newPassword = pwd_gen();

                $erg = $this->db->prepare("INSERT INTO mitarbeiter 
                                                ( last_change_pwd, u_name, u_pwd, u_mail, anrede, vorname, zweitname, nachname, gruppe, u_rights) 
                                                VALUES (CURRENT_DATE, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $erg->execute(array($newUsername, $newPassword["pwd_verschluesselt"], $email, $title, $firstname, $secondname, $surname, $group, $rights));

                $back[0] = $newPassword["pwd_klar"];
                $back[1] = "User wurde erfolgreich gespeichert!";

            }
        } catch (Exception $e) {
            $back[1] = "User konnte nicht gespeichert werden.";
        }

        return $back;
    }

    public function ChangeStaff()
    {
        if (isset($_POST['searchButton'])) {
            $search1 = $_POST['firstnameText'];
            $search3 = $_POST['surnameText'];
            $search4 = $_POST['groupText'];
            $search5 = $_POST['locationText'];

            $erg = $this->db->prepare("SELECT 
                                                t1.u_name AS username, t1.vorname AS vname, 
                                                t1.nachname AS nname, t1.u_id AS id, 
                                                t2.gruppen_name AS gruppe,
                                                t3.standort_name AS standort
                                                FROM mitarbeiter AS t1, gruppen AS t2, standort AS t3 
                                                WHERE vorname LIKE '%$search1%' 
                                                AND nachname LIKE '%$search3%' 
                                                AND gruppen_name LIKE '%$search4%' 
                                                AND standort_name LIKE '%$search5%' 
                                                AND t1.gruppe = t2.g_id
                                                AND t2.standort_id = t3.s_id 
                                                ORDER BY nachname");
            $erg->execute();
            $data = $erg->fetchAll();

            return $data;

        }

    }

    function userChange()
    {
        $back = array();

        if (isset($_POST['changeButton'])) {
            try {
                $userid = $_POST['userId'];
                $firstname = $_POST['changeFirstname'];
                $secondname = $_POST['changeSecondname'];
                $lastname = $_POST['changeLastname'];
                $group = $_POST['changeGroup'];
                $u_rights = $_POST['u_rights'];

                $erg = $this->db->prepare("UPDATE mitarbeiter 
                                                SET 
                                                vorname = ?, 
                                                zweitname = ?, 
                                                nachname = ?, 
                                                gruppe = ?, 
                                                u_rights = ?
                                                WHERE 
                                                u_id = ?");
                $erg->execute(array($firstname, $secondname, $lastname, $group, $u_rights, $userid));

                $back[1] = "User erfolgreich bearbeitet!";

            } catch (Exception $e) {
                $back[1] = "Fehler beim Speichern der Änderungen!";
            }
        }

        if (isset($_POST['deleteButton'])) {
            try {
                $userid = $_POST['userId'];

                $erg = $this->db->prepare("DELETE FROM mitarbeiter 
                                                WHERE u_id = ?");
                $erg->execute(array($userid));

                $back[1] = "User erfolgreich gelöscht!";
            } catch (Exception $e) {
                $back[1] = "Fehler beim Löschen des Users!";
            }
        }

        if (isset($_POST['passwordButton'])) {
            try {
                $userid = $_POST['userId'];
                $newPw = pwd_gen();

                $erg = $this->db->prepare("UPDATE mitarbeiter 
                                                SET u_pwd = ?, login_false = 0, last_change_pwd = CURRENT_DATE 
                                                WHERE u_id = ?");
                $erg->execute(array($newPw["pwd_verschluesselt"], $userid));
                $back[0] = $newPw["pwd_klar"];
                $back[1] = "Passwort erfolgreich gespeichert!";
            } catch (Exception $e) {
                $back[1] = "Fehler beim Speichern des Passworts!";
            }
        }
        return $back;

    }

    function getRechte()
    {
        return $this->db->select("rights", "*");
    }

    function getGruppen()
    {
        $erg = $this->db->prepare("
                SELECT t1.*,t2.name AS real_name,t3.name as right_name 
                FROM rights2group as t1, rightsNames as t2, rights as t3 
                WHERE t1.level = t2.g_id AND t3.r_id = t1.right");
        $erg->execute();
        $result = $erg->fetchAll();
        return $result;
    }

    function getNames()
    {
        return $this->db->select("rightsNames", "*");
    }

    function rechteInsert()
    {
        $data = array(
            "r_id" => $_POST['r_id'],
            "name" => $_POST['name']
        );
        $this->db->insert("rights", $data);
    }

    function delRechte($id)
    {
        $this->db->delete("rights", "WHERE id = '" . $id . "'");
    }

    function gruppeInsert()
    {
        $data = array(
            "level" => $_POST['level'],
            "right" => $_POST['right']
        );
        $this->db->insert("rights2group", $data);
    }

    function delGruppe($id)
    {
        $this->db->delete("rights2group", "WHERE id = '" . $id . "'");
    }

    function showUser($id)
    {
        $erg = $this->db->prepare("SELECT 
                                            t1.vorname AS firstname, 
                                            t1.zweitname AS secondname, 
                                            t1.nachname AS lastname, 
                                            t1.u_id AS id, 
                                            t1.u_rights,
                                            t1.gruppe AS groupId, 
                                            t2.gruppen_name AS team, 
                                            t2.standort_id AS locId, 
                                            t3.standort_name AS loc 
                                            FROM mitarbeiter AS t1, gruppen AS t2, standort AS t3                                             
                                            WHERE t1.gruppe = t2.g_id 
                                            AND t2.standort_id = t3.s_id 
                                            AND t1.u_id = ? 
                                            ");
        $erg->execute(array($id));
        $data = $erg->fetch();

        return $data;
    }

    function showLog()
    {
        $fp = file_get_contents("logs/log.txt");
        $data1 = explode("|",$fp);
        $summe =  count($data1)-1;
        $data = array();
        for($i=0;$i<$summe/3;$i++){
            $data[] = array($data1[($i*3)+0],$data1[($i*3)+1],$data1[($i*3)+2]);
        }
        return $data;
    }

    function vacationNew()
    {
        if (isset($_POST['save'])) {

            $userid = $_POST['u_id'];
            $start = $_POST['startdate'];
            $end = $_POST['enddate'];

            $erg = $this->db->prepare("INSERT INTO urlaub (von, bis, u_id) 
                                            VALUES (?, ?, ?)");
            $erg->execute(array($start, $end, $userid));

        }
    }
}
