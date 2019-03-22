<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 20.03.2019
 * Time: 18:59
 * © : 2019
 */
?>
<form action="<?php echo URL;?>bearbeiten/gruppe" method="post">
    <select name="id">
        <?php
        for($i=0;$i<count($this->gr);$i++){ ?>
            <option value="<?php echo $this->gr[$i]['g_id'];?>"><?php echo $this->gr[$i]['gruppen_name'];?></option>
        <?php }
        ?>
    </select> <input type="submit" value="bearbeiten">

</form>
