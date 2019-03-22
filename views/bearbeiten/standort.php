<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 20.03.2019
 * Time: 18:58
 * © : 2019
 */
?>

<form action="<?php echo URL;?>bearbeiten/standort" method="post">
    <select name="id">
        <?php for($i=0;$i<count($this->so);$i++){?>
        <option value="<?php echo $this->so[$i]['s_id'];?>"><?php echo $this->so[$i]['standort_name'];?></option>
        <?php } ?>
    </select> <input type="submit" value="bearbeiten">

</form>
