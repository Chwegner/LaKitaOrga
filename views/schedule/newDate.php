<?php
/**
 * Created by IntelliJ IDEA.
 * User: cwegner
 * Date: 15.03.2019
 * Time: 11:27
 */
?>

<script>
    $( function() {
        $( "#startdate" ).datepicker({dateFormat: "yy-mm-dd"});
        $( "#enddate" ).datepicker({dateFormat: "yy-mm-dd"});
    } );
</script>

<h1 align="center">Neue Einsatzzeit eintragen</h1>
<br><br>

<form method="post" action="<?php echo URL; ?>schedule/addDate">

    <label for="startdate">Starttermin </label>
    <input type="text" id="startdate" name="startdate" readonly>
    <br>
    <label for="enddate">Endtermin </label>
    <input type="text" id="enddate" name="enddate" readonly>
    <br>
    <label for="employee">Mitarbeiter </label>
    <select id="employee" name="employee">
        <?php
        foreach ($this->userlist AS $key => $value) {
            echo '<option value="' . $value['u_id'] . '">' . $value['vorname'] . " " . $value['nachname'] . '</option>';
        }
        ?>
    </select>
    <br>
    <label for="groupname">Gruppe </label>
    <select id="groupname" name="groupname">
        <?php
        foreach ($this->grouplist AS $key => $value) {
            echo '<option value="' . $value['g_id'] . '">' . $value['gruppen_name'] . '</option>';
        }
        ?>
    </select>
    <br>
    <input type="submit" name="save" value="Speichern">
    <br><br>
    <label><?php echo $this->erg; ?></label>

</form>

