<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 15.03.2019
 * Time: 08:19
 * © : 2019
 */
?>


<form action="<?php echo URL; ?>bearbeiten/vormund_save" method="post">
    <br>
    <br>
    <br>
    <input hidden type="text" name="v_id" value="<?php echo $this->vormund['v_id'];?>">

    <label class="erstes" for="anrede">Anrede :</label>                <select name="anrede">
        <option value="anrede_bitte_waehlen"> Bitte Wählen </option>
        <option <?php if ($this->vormund['anrede'] == 'Herr') echo ' selected '; ?> value="Herr"> Herr </option>
        <option <?php if ($this->vormund['anrede'] == 'Frau') echo ' selected '; ?> value="Frau"> Frau </option> </select>     <br>
    <label class="erstes" for="vorname">Vorname :</label>              <input id="vorname"type="text" name="vorname" value="<?php echo $this->vormund['vorname'];?>"><br>
    <label class="erstes" for="zweitname">Zweitname :</label>          <input id="zweitname"type="text" name="zweitname" value="<?php echo $this->vormund['zweitname'];?>"><br>
    <label class="erstes" for="nachname">Nachname :</label>            <input id="nachname"type="text" name="nachname" value="<?php echo $this->vormund['nachname'];?>"><br>
    <label class="erstes" for="straße">Straße :</label>                <input id="straße"type="text" name="strasse" value="<?php echo $this->vormund['strasse'];?>"><br>
    <label class="erstes" for="hausnummer">Hausnummer :</label>        <input id="hausnummer"type="text" name="hausnummer" value="<?php echo $this->vormund['hausnummer'];?>"><br>
    <label class="erstes" for="plz">Postleizzahl :</label>             <input id="plz"type="text" name="plz" value="<?php echo $this->vormund['plz'];?>"><br>
    <label class="erstes" for="wohnort">Wohnort :</label>              <input id="wohnort"type="text" name="ort" value="<?php echo $this->vormund['ort'];?>"><br>
    <label class="erstes" for="telefonnummer">Telefonnummer  :</label> <input id="telefonnummer"type="text" name="telefon" value="<?php echo $this->vormund['telefon'];?>"><br>
    <label class="erstes" for="handynummer">Handynummer :</label>      <input id="handynummer"type="text" name="mobil" value="<?php echo $this->vormund['mobil'];?>"><br>
    <label class="erstes" for="e-mail">E-Mail :</label>                <input id="e-mail"type="text" name="mail" value="<?php echo $this->vormund['mail'];?>"><br>



    <input type="submit" value="speichern"/>


</form>

<script type="text/javascript">
    var URL_AJAX = "<?php echo URL;?>anlegen/getJson";
</script>

<!-- Dieses script muß auch geladen werden da ist die function drin -->
<script src="<?php echo PUBLIC_URL; ?>js/searcher.js" type="text/javascript"></script>