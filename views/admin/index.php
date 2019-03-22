<h1 align="center">Admin-Übersicht</h1>
<h2 align="center">Gesperrte Nutzer</h2>
<table class="table">
    <tr>

        <th>ID</th>
        <th>Username</th>
        <th>Benutzerrecht</th>
        <th>Mitarbeiter</th>
        <th>Gruppe</th>
        <th>E-Mail</th>
    </tr>
    <?php
    foreach ($this->blockedUser AS $key => $value) {
        echo '<tr>
                <td>' . $value['u_id'] . '</td>
                <td>' . $value['u_name'] . '</td>
                <td>' . $value['u_rights'] . '</td>
                <td>' . $value['vorname'] . " " . $value['nachname'] . '</td>
                <td>' . $value['gruppe'] . '</td>
                <td>' . $value['u_mail'] . '</td>
               </tr>';
    }
    ?>
</table>
<br>
<h2 align="center">offene Mitgliedsbeiträge</h2>
<table class="table">
    <tr>
        <th>Kind</th>
        <th>Vormund</th>
        <th>Datum</th>
        <th>FiBu</th>
    </tr>
    <?php
    for ($i = 0; $i < count($this->unpaid); $i++) {

        echo '<tr>
                <td>' . $this->unpaid[$i]['kindV'] . " " . $this->unpaid[$i]['kindN'] . '</td>
                <td>' . $this->unpaid[$i]['vormundV'] . " " . $this->unpaid[$i]['vormundN'] . '</td>
                <td>' . $this->unpaid[$i]['monthDate'] . "/" . $this->unpaid[$i]['yearDate'] . '</td>
                <td>
                <a href="http://lakitaorga.ostsan.de/fibu/buchen/' . $this->unpaid[$i]['yearDate'] . '/' . $this->unpaid[$i]['monthDate'] . '/' . $this->unpaid[$i]['kindN'] . '@' . $this->unpaid[$i]['kindV'] . '/' . $this->unpaid[$i]['idk'] . '">Buchen</a>
                </td>
               </tr>';
    }
    ?>
</table>
<br>
<h2 align="center">Urlaubsliste</h2>
<table class="table">
    <tr>
        <th>Mitarbeiter</th>
        <th>Zeitraum</th>
    </tr>
    <?php
    for ($i = 0; $i < count($this->vacation); $i++) {
        echo '<tr>
                <td>' . $this->vacation[$i]['mitarbeiterV'] . " " . $this->vacation[$i]['mitarbeiterN'] . '</td>
                <td>' . $this->vacation[$i]['vacationStart'] . " - " . $this->vacation[$i]['vacationEnd'] . '</td>
               </tr>';
    }
    ?>
</table>
<br>
<h2 align="center">Userliste</h2>
<table class="table">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Benutzerrecht</th>
        <th>Name</th>
        <th>Gruppe</th>
        <th>Last Pwd Change</th>
        <th>E-Mail</th>
    </tr>
    <?php
    for ($i = 0; $i < count($this->userlist); $i++) {
        echo '<tr>
                <td>' . $this->userlist[$i]['u_id'] . '</td>
                <td>' . $this->userlist[$i]['u_name'] . '</td>
                <td>' . $this->userlist[$i]['u_rights'] . '</td>
                <td>' . $this->userlist[$i]['vorname'] . " " . $this->userlist[$i]['nachname'] . '</td>
                <td>' . $this->userlist[$i]['gruppe'] . '</td>
                <td>' . $this->userlist[$i]['changed'] . '</td>
                <td>' . $this->userlist[$i]['u_mail'] . '</td>
               </tr>';
    }
    ?>
</table>
<br>
<h2 align="center">letzte 10 Änderungen</h2>

<table class="table">
    <tr>
        <th>Date</th>
        <th>Username</th>
        <th>Description</th>
    </tr>
    <?php
    $data = $this->logfile;
    $data = array_reverse($data);
    for ($i = 0; $i < 10; $i++) {
        echo '<tr>
                <td>'. $data[$i][0] . '</td>
                <td>'. $data[$i][1] . '</td>
                <td>'. $data[$i][2] . '</td>
              </tr>';
    }
    ?>

</table>


