<?php
/**
 * Created by PhpStorm.
 * User: sholtei
 * Date: 07.03.2019
 * Time: 09:11
 */
?>

<form action="<?php echo URL;?>anlegen/gruppen/true" method="post">
    <br>
    <br>
    <br>

    <label for="gruppenname"> Gruppenname : </label>     <input type="text" name="gruppen_name"> <br>
    <label for="standort_id">Standort ID : </label>     <select name="s_id">
    <?php for($i=0;$i<count($this->ort);$i++){ ?><option value="<?php echo $this->ort[$i]['s_id'];?>"><?php echo $this->ort[$i]['standort_name'];?></option> <?php } ?><br>
    </select><br>
    <input type="submit" value="Anlegen"/>



</form>
