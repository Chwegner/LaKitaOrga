<?php
/**
 * Created by IntelliJ IDEA.
 * User: cwegner
 * Date: 08.03.2019
 * Time: 12:31
 */
?>

<h1 align="center">Neuen Mitarbeiter anlegen</h1>

<form action="<?php echo URL; ?>admin/staffNew" method="post">
    <br>
    <label for="title">Anrede:</label>
    <select name="title" required id="title">
        <option value="Herr">Herr</option>
        <option value="Frau">Frau</option>
    </select>
    <br>
    <label for="firstname">Vorname:</label>
    <input type="text" name="firstname" required id="firstname">
    <br>
    <label for="secondname">Zweitname</label>
    <input type="text" name="secondname" id="secondname">
    <br>
    <label for="lastname">Nachname:</label>
    <input type="text" name="surname" required id="lastname">
    <br>
    <label for="email">E-Mail:</label>
    <input type="email" name="email" required id="email">
    <br>
    <label for="group">Gruppe:</label>
    <select name="group" id="group">
        <?php
        for ($i = 0; $i < count($this->grouplist); $i++) {
            {
                echo '<option value="' . $this->grouplist[$i]['id'] . '">
                ' . $this->grouplist[$i]['gruppe'] . " - " . $this->grouplist[$i]['ort'] . '</option>';
            }
        }
        ?>
    </select>
    <br>
    <label for="rights">Benutzerrechte:</label>
    <select name="rights" required id="rights">
        <?php
        foreach ($this->userRights AS $key => $value) {
            echo '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
        }
        ?>
    </select>
    <br>
    <input type="submit" value="Speichern" name="save"/>

    <?php
    if (!empty($this->pwd[0]))
    {
        ?>
        <script type="text/javascript">
            alert("Passwort: <?php echo $this->pwd[0]; ?>");
        </script>

        <?php
    }
    ?>
    <br><br>
    <label><?php echo $this->pwd[1]; ?></label>

</form>

