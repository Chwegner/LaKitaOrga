<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 20.03.2019
 * Time: 18:59
 * © : 2019
 */
?>
<form action="<?php echo URL;?>bearbeiten/gruppe_save" method="post">
    <label for="gruppenname"> Gruppenname : </label><input type="text" name="gruppen_name" value="<?php echo $this->gr['gruppen_name'];?>"> <br>
    <label for="standort_id">Standort ID : </label><input type="text" name="standort_id" value="<?php echo $this->gr['standort_id'];?>"><br>
    <input type="submit" value="Anlegen"/>
</form>
