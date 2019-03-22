<?php
/**
 * Created by PhpStorm.
 * User: sholtei
 * Date: 07.03.2019
 * Time: 09:11
 */?>

<form action="<?php echo URL;?>anlegen/standort/true" method="post">
    <br>
    <br>
    <br>

    <label for="standortname">Standortname :</label><input id="standortname" type="text" name="standort_name"><br>
    <label for="straße">Straße :</label><input id="straße" type="text" name="strasse"><br>
    <label fro="hsnr">Hausnummer :</label><input id="hsnr" type="text" name="hausnummer"><br>
    <label for="plz">Postleitzahl :</label><input id="plz" type="text" name="plz"><br>
    <label for="ort">Ort :</label><input id="ort" type="text" name="ort"><br>
    <label for="tele">Telefon :</label><input id="tele" type="text" name="telefon"><br>
    <label for="mobil">Handy :</label><input id="mobil" type="text" name="mobil"><br>
    <label for="mail">Em@il :</label><input id="mail" type="text" name="mail"><br>
    <label for="leiter">Leiter :</label><input id="leiter" type="text" name="leiter"><br><br>
    <label for"submit"></label><input id="submit" type="submit" value="Anlegen"/>



</form>