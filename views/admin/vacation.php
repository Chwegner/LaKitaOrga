<?php
/**
 * Created by IntelliJ IDEA.
 * User: cwegner
 * Date: 19.03.2019
 * Time: 12:19
 */
?>

<script>
    $( function() {
        $( "#startdate" ).datepicker({dateFormat: "yy-mm-dd"});
        $( "#enddate" ).datepicker({dateFormat: "yy-mm-dd"});
    } );
</script>

<h1 align="center">Neuer Urlaubseintrag</h1>

<form method="post" action="<?php echo URL; ?>admin/vacationNew">
    <label for="employee">Mitarbeiter </label>
    <select id="employee" name="u_id">
        <?php
        for ($i = 0; $i < count($this->userlist); $i++) {
            echo '<option value="' . $this->userlist[$i]['u_id'] . '">
            ' . $this->userlist[$i]['nachname'] . ', 
            ' . $this->userlist[$i]['vorname'] . ' </option>';}
        ?>
    </select>
    <br>
    <label for="startdate">Urlaubsstart </label>
    <input type="text" id="startdate" name="startdate" readonly>
    <br>
    <label for="enddate">Urlaubsende </label>
    <input type="text" id="enddate" name="enddate" readonly>
    <br>
    <input type="submit" value="Speichern" name="save">

</form>
