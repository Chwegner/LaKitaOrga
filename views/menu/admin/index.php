<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 13.03.2019
 * Time: 08:05
 * © : 2019
 */
?>

<form action="<?php echo URL; ?>menu/k_create" method="post">
    <label for="kat">Kategorie : </label><input id="kat" type="text" name="kat"><br>
    <label for="submit"></label><input type="submit" name="kat_c" value="eintragen">
</form>
<br><br>
<table class="table">
    <th>ID</th>
    <th>Name</th>
    <th>action</th>
    <?php
    foreach ($this->kat as $value) {
        echo '<tr><td>' . $value['id'] . '</td><td>' . $value['name'] . '</td><td><a href="' . URL . 'menu/k_del/' . $value['id'] . '">del</a></td></tr>';
    }
    ?>
</table>
<br>
<form action="<?php echo URL; ?>menu/l_create" method="post">
    <label for="e_id">ElternID : </label><input id="e_id" type="text" name="e_id"><br>
    <label for="l_name">LinkName : </label><input id="l_name" type="text" name="l_name"><br>
    <label for="z_name">Ziel : </label><input id="z_name" type="text" name="z_name"><br>
    <label for="submit"></label><input type="submit" name="link_c" value="eintragen">
</form>
<br>

<table class="table">
    <th>ElternID</th>
    <th>reihenfolge</th>
    <th>LinkName</th>
    <th>Ziel</th>
    <th>action</th>
    <?php
    foreach ($this->links AS $key1 => $value1) {
        foreach ($value1 AS $key2 => $value2) {
            if (!is_array($value2)) {
                echo '<tr><td colspan="5" align="center"><b>' . $value2 . '</b></td></tr>';
            } else {
                for ($i = 0; $i < count($key2); $i++) {
                    echo '
              <tr>
              <td>' . $value2['up'] . '</td>
              <td>
                    <form action="' . URL . 'menu/sort" method="post">
                    <input hidden type="text" name="'.$value2['up'].'|' . $value2['id'] . '" value="' . $value2['sort'] . '">
                    <input class="ui-button" type="submit" name="direction" value="runter"> <input type="submit" name="direction" value="hoch">
                     </form>
              </td>
              <td>' . $value2['name'] . '</td>
              <td>' . $value2['ziel'] . '</td>
              <td><a href="' . URL . 'menu/l_del/' . $value2['id'] . '">del</a></td>
              </tr>';
                }
            }
        }

    }
    ?>
</table>
