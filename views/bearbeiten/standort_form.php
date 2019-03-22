<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 20.03.2019
 * Time: 18:59
 * © : 2019
 */
?>
<form action="<?php echo URL;?>bearbeiten/standort_save" method="post">

<input hidden type="text" name="id" value="<?php echo $this->so['s_id'];?>">
<label for="standortname">Standortname :</label><input value="<?php echo $this->so['standort_name'];?>" id="standortname" type="text" name="standort_name"><br>
<label for="straße">Straße :</label><input value="<?php echo $this->so['strasse'];?>" id="straße" type="text" name="strasse"><br>
<label fro="hsnr">Hausnummer :</label><input value="<?php echo $this->so['hausnummer'];?>" id="hsnr" type="text" name="hausnummer"><br>
<label for="plz">Postleitzahl :</label><input value="<?php echo $this->so['plz'];?>" id="plz" type="text" name="plz"><br>
<label for="ort">Ort :</label><input value="<?php echo $this->so['ort'];?>" id="ort" type="text" name="ort"><br>
<label for="tele">Telefon :</label><input value="<?php echo $this->so['telefon'];?>" id="tele" type="text" name="telefon"><br>
<label for="mobil">Handy :</label><input value="<?php echo $this->so['mobil'];?>" id="mobil" type="text" name="mobil"><br>
<label for="mail">Em@il :</label><input value="<?php echo $this->so['mail'];?>" id="mail" type="text" name="mail"><br>
<label for="leiter">Leiter :</label><input value="<?php echo $this->so['leiter'];?>" id="leiter" type="text" name="leiter"><br><br>
<label for"submit"></label><input id="submit" type="submit" value="speichern"/>
</form>
<?php echo (!empty($this->status)) ? $this->status.'<br>' : '';?>
