<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 15.03.2019
 * Time: 08:19
 * © : 2019
 */
?>


<form action="<?php echo URL; ?>bearbeiten/kind_save" method="post">
    <br>
    <br>
    <br>
<input hidden type="text" name="k_id" value="<?php echo $this->kind['k_id'];?>">
    <label for="anrede">Anrede :</label>
    <select name="anrede">
        <option value=""> Bitte Wählen</option>
        <option <?php if ($this->kind['anrede'] == 'Herr') echo ' selected '; ?>
                value="Herr"> Herr
        </option>
        <option <?php if ($this->kind['anrede'] == 'Frau') echo ' selected '; ?>
                value="Frau"> Frau
        </option>
    </select> <br>
    <label for="vorname">Vorname :</label> <input type="text" name="vorname"
                                                  value="<?php echo $this->kind['vorname']; ?>"><br>
    <label for="zweitname">Zweitname :</label> <input type="text" name="zweitname"
                                                      value="<?php echo $this->kind['zweitname']; ?>"><br>
    <label for="nachname">Nachname :</label> <input type="text" name="nachname"
                                                    value="<?php echo $this->kind['nachname']; ?>"><br>

    <label for="vormund_1">Vormund 1 :</label> <input id="hint"
                                                      value="<?php echo $this->vormund_1['nachname'] . ' ' . $this->vormund_1['vorname']; ?>">
    <input hidden id="hint_id" type="text" name="vormund_1" value="<?php echo $this->vormund_1['v_id']; ?>"><br>

    <label for="vormund_2">Vormund 2 :</label> <input id="hint_1"
                                                      value="<?php echo $this->vormund_2['nachname'] . ' ' . $this->vormund_2['vorname']; ?>">
    <input hidden id="hint_id_1" type="text" name="vormund_2" value="<?php echo $this->vormund_2['v_id']; ?>"><br>

    <label for="gruppen">Gruppen :</label> <input id="hint_2" value="<?php echo  $this->gruppe['gruppen_name'];?>">
    <input hidden id="hint_id_2" type="text" name="gruppe" value="<?php echo $this->kind['gruppe']; ?>"><br>

    <label for="eintrittsdatum">Eintrittsdatum :</label> <input type="date" name="eintritt"
                                                                value="<?php echo $this->kind['eintritt']; ?>"><br>
    <input type="submit" value="speichern"/>


</form>

<script type="text/javascript">
    var URL_AJAX = "<?php echo URL;?>anlegen/getJson";
</script>

<!-- Dieses script muß auch geladen werden da ist die function drin -->
<script src="<?php echo PUBLIC_URL; ?>js/searcher.js" type="text/javascript"></script>