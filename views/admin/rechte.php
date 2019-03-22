<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 11.03.2019
 * Time: 09:07
 * © : 2019
 */
?>
<style>
    .form-group{
        width: 40%;
    }
    .table_rechte{
        border: 1px solid;
        width: 40%;
    }
</style>
<span class="alert-success"><?php echo (!empty($this->rechteInsert)) ? $this->rechteInsert : '';?></span>
<span class="alert-danger"><?php echo (!empty($this->rechteDel)) ? $this->rechteDel : '';?></span>
<table class="table_rechte">
    <th>RechteID</th><th>Bezeichnung</th><th>Aktion</th>
    <?php
    for($i=0;$i<count($this->rechte);$i++){
        echo '
            <tr>
                <td>'.$this->rechte[$i]['r_id'].'</td>
                <td>'.$this->rechte[$i]['name'].'</td>
                <td><a class="alert-danger" href="'.URL.'rechte/delrechte/'.$this->rechte[$i]['id'].'">DEL</a></td>
            </tr>';
    }
    ?>
</table>

<form action="<?php echo URL;?>rechte/rechteInsert" method="post">
<div class="form-group">
RechteID: <input type="text" class="form-control" name="r_id"> Bezeichnung: <input type="text" class="form-control" name="name">
    <button type="submit" class="btn btn-primary">erstellen</button>
</div>
</form>
<br>
<span class="alert-success"><?php echo (!empty($this->gruppeInsert)) ? $this->gruppeInsert : '';?></span>
<span class="alert-danger"><?php echo (!empty($this->gruppeDel)) ? $this->gruppeDel : '';?></span>
<table class="table_rechte">
    <th>RechteID</th><th>Bezeichnung</th><th>GruppenID</th><th>Aktion</th>
    <?php
    for($i=0;$i<count($this->gruppen);$i++){
        echo '
            <tr>
                <td>'.$this->gruppen[$i]['right'].'</td>
                <td>'.$this->gruppen[$i]['right_name'].'</td>
                <td>'.$this->gruppen[$i]['real_name'].'</td>
                <td><a class="alert-danger" href="'.URL.'rechte/delgruppe/'.$this->gruppen[$i]['id'].'">DEL</a></td>
            </tr>';
    }
    ?>
</table>
<form action="<?php echo URL;?>rechte/gruppeInsert" method="post">
<div class="form-group">
neues Rechte->Gruppen Zuordnung erstellen<br>
RechteID: <input type="text" class="form-control" name="right">
    GruppenID:
    <select name="level" class="form-control">
    <option>Bitte wählen...</option>
    <?php
    for($i=0;$i<count($this->real_names);$i++){
        echo'
        <option value="'.$this->real_names[$i]['g_id'].'">'.$this->real_names[$i]['name'].'</option>
        ';
    }
    ?>
    </select>
    <button type="submit" class="btn btn-primary">erstellen</button>
</div>
</form>