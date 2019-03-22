<?php
/**
 * Created by PhpStorm.
 * User: sholtei
 * Date: 07.03.2019
 * Time: 09:11
 */?>

<form class="form_klein" action="<?php echo URL;?>anlegen/eltern/true" method="post">
    <br>
<div style="width: 50%;margin: auto">
    <div class="eltern_w" style="float: left">
        Vormund 1    <br>

        <label class="erstes" for="anrede_1">Anrede :</label>                <select name="anrede_1">
        <option value="anrede_bitte_waehlen"> Bitte Wählen </option>
        <option value="Herr"> Herr </option>
            <option value="Frau"> Frau </option> </select>     <br>
        <label class="erstes" for="vorname">Vorname :</label>              <input id="vorname"type="text" name="vorname_1"><br>
        <label class="erstes" for="zweitname">Zweitname :</label>          <input id="zweitname"type="text" name="zweitname_1"><br>
        <label class="erstes" for="nachname">Nachname :</label>            <input id="nachname"type="text" name="nachname_1"><br>
        <label class="erstes" for="straße">Straße :</label>                <input id="straße"type="text" name="straße_1"><br>
        <label class="erstes" for="hausnummer">Hausnummer :</label>        <input id="hausnummer"type="text" name="hausnummer_1"><br>
        <label class="erstes" for="plz">Postleizzahl :</label>             <input id="plz"type="text" name="postleitzahl_1"><br>
        <label class="erstes" for="wohnort">Wohnort :</label>              <input id="wohnort"type="text" name="ort_1"><br>
        <label class="erstes" for="telefonnummer">Telefonnummer  :</label> <input id="telefonnummer"type="text" name="telefonnummer_1"><br>
        <label class="erstes" for="handynummer">Handynummer :</label>      <input id="handynummer"type="text" name="handynummer_1"><br>
        <label class="erstes" for="e-mail">E-Mail :</label>                <input id="e-mail"type="text" name="e-Mail_1"><br>
    </div>
    <div class="ellis_rechts" style="float: right">
        Vormund 2<br>
        <label class="zweites" for="anrede2">          Anrede :</label>                <select name="anrede_2">
            <option value="anrede_bitte_waehlen"> Bitte Wählen </option>
            <option value="Herr"> Herr </option>
            <option value="Frau"> Frau </option>  </select>    <br>
        <label class="zweites" for="vorname2">         Vorname :</label>              <input id="vorname2"type="text" name="vorname_2"><br>
        <label class="zweites" for="zweitname2">       Zweitname :</label>          <input id="zweitname2"type="text" name="zweitname_2"><br>
        <label class="zweites" for="nachname2">        Nachname :</label>            <input id="nachname2"type="text" name="nachname_2"><br>
        <label class="zweites" for="straße2">          Straße :</label>                <input id="straße2"type="text" name="straße_2"><br>
        <label class="zweites" for="hausnummer2">      Hausnummer :</label>        <input id="hausnummer2"type="text" name="hausnummer_2"><br>
        <label class="zweites" for="plz2">             Postleizzahl :</label>             <input id="plz2"type="text" name="postleitzahl_2"><br>
        <label class="zweites" for="wohnort2">         Wohnort :</label>              <input id="wohnort2"type="text" name="ort_2"><br>
        <label class="zweites" for="telefonnummer2">   Telefonnummer  :</label> <input id="telefonnummer2"type="text" name="telefonnummer_2"><br>
        <label class="zweites" for="handynummer2">     Handynummer :</label>      <input id="handynummer2"type="text" name="handynummer_2"><br>
        <label class="zweites" for="e-mail2">          E-Mail :</label>                <input id="e-mail2"type="text" name="e-Mail_2"><br>
    </div>
    <div style="clear: both"></div><br>
    <input type="submit" value="Anlegen"/>
</div>
</form>
