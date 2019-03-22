<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<form action="<?php echo URL;?>anlegen/kinder/true" method="post">
    <br>
    <br>
    <br>

    <label for="anrede">Anrede :</label>             <select name="anrede">
        <option value="anrede_bitte_waehlen"> Bitte Wählen </option>
        <option value="Herr"> Herr </option>
        <option value="Frau"> Frau </option>  </select> <br>
    <label for="vorname">Vorname :</label>            <input type="text" name="vorname"><br>
    <label for="zweitname">Zweitname :</label>          <input type="text" name="zweitname"><br>
    <label for="nachname">Nachname :</label>         <input type="text" name="nachname"><br>
    <label for="vormund_1">Vormund 1 :</label>            <input id="hint">
                                                        <input hidden id="hint_id" type="text" name="vormund_1" value=""><br>
    <label for="vormund_2">Vormund 2 :</label>          <input id="hint_1">
                                                        <input hidden id="hint_id_1" type="text" name="vormund_2" value=""><br>
    <label for="gruppe">Gruppen ID :</label>        <input id="hint_2" type="text"><br>
    <input hidden id="hint_id_2"  name="gruppe">

    <label for="eintrittsdatum">Eintrittsdatum :</label>     <input type="date" name="eintritt"><br>
    <input type="submit" value="Anlegen"/>



</form>

<script type="text/javascript">
    var URL_AJAX = "<?php echo URL;?>anlegen/getJson";
</script>

<!-- Dieses script muß auch geladen werden da ist die function drin -->
<script src="<?php echo PUBLIC_URL;?>js/searcher.js" type="text/javascript"></script>