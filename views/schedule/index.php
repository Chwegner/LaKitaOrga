<?php
/**
 * Created by IntelliJ IDEA.
 * User: cwegner
 * Date: 15.03.2019
 * Time: 08:45
 */

?>

<h1 align="center">Einsatzzeiten - Übersicht</h1>
<br>
<form method="post" action="<?php echo URL; ?>schedule/Overview">
    <input type="text" name="scheduleSearch">
    <input type="submit" name="scheduleSearchButton" value="Gruppensuche">
</form>

<table>

<tr>
    <th>Einsatzstart</th>
    <th>Einsatzende</th>
    <th>Mitarbeiter</th>
    <th>Gruppe</th>
</tr>

    <?php
    for ($i = 0; $i < count($this->schedule); $i++) {
        echo '<tr>
                <td>' . $this->schedule[$i]['start'] . '</td>
                <td>' . $this->schedule[$i]['finish'] . '</td>
                <td>' . $this->schedule[$i]['firstname'] . " " . $this->schedule[$i]['lastname'] . '</td>
                <td>' . $this->schedule[$i]['groupname'] . '</td>
               </tr>';
    }
    ?>

</table>



