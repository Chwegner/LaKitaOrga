<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 13.03.2019
 * Time: 10:25
 * © : 2019
 */
?>
<style>
    .dropdown {
        position: relative;
        display: inline-block;
        margin: 10px;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 260px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        padding: 12px 16px;
        z-index: 1;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .btn {
        cursor: pointer;
        color: #00A3E0
    }
</style>
<div class="dropdown nav nav-tabs">
    <span class="btn"><a href="<?php echo URL; ?>">HOME</a></span>
</div>
<?php
$rights_array_1 = array('Anlegen', 'Bearbeiten', 'Übersicht', 'Fibu');
$rights_array_1_1 = array('fibu/buchen', 'fibu/zugangsdaten');
$rights_array_2 = array('Übersicht', 'Fibu');
$rights_array_2_1 = array('fibu/buchen', 'fibu/zugangsdaten');
$rights_array_3 = array('Übersicht');


foreach ($this->menu as $key => $value) {

    if ($_SESSION['u_rights'] == 3) {

        echo '<div class="dropdown nav nav-tabs">
            <span class="btn"><a href="#"> ' . $key . '</a></span>
            <div class="dropdown-content">';
        foreach ($value as $key => $value) {
            echo '<p><a href="' . URL . $value . '">' . $key . '</a></p>';
        }
        echo '</div></div>';
    }

    if ($_SESSION['u_rights'] == 2) {
        if (in_array($key, $rights_array_2)) {
            echo '<div class="dropdown nav nav-tabs">
            <span class="btn"><a href="#"> ' . $key . '</a></span>
            <div class="dropdown-content">';
            foreach ($value as $key => $value) {
                if (!in_array($value, $rights_array_2_1)) {
                    echo '<p><a href="' . URL . $value . '">' . $key . '</a></p>';
                }
            }
            echo '</div></div>';
        }
    }

    if ($_SESSION['u_rights'] == 1) {
        if (in_array($key, $rights_array_3)) {
            echo '<div class="dropdown nav nav-tabs">
            <span class="btn"><a href="#"> ' . $key . '</a></span>
            <div class="dropdown-content">';
            foreach ($value as $key => $value) {
                echo '<p><a href="' . URL . $value . '">' . $key . '</a></p>';
            }
            echo '</div></div>';
        }
    }
}
if (SESSION::get('loggedIn')) {
    ?>
    <div class="dropdown nav nav-tabs">
        <span class="btn"> <a class="submit" href="<?php echo URL; ?>login/logout"><i>Logout</i></a></span>
    </div>
    <div class="dropdown nav nav-tabs">
        <span class="btn"> <a class="submit" href="<?php echo URL; ?>layout/change">Layout</a></span>
    </div>
<?php } ?>
<div class="dropdown nav nav-tabs">
    <span class="btn"> <a class="submit" href="javascript:print();">Drucken</a></span>
</div>
<div class="dropdown nav nav-tabs">
    <span class="btn"> <a target="_blank" class="submit" href="<?php echo URL; ?>Benutzerhandbuch.pdf">Hilfe</a></span>
</div>
<hr>

