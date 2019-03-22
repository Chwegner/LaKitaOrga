<?php
/**
 * Created by IntelliJ IDEA.
 * User: cwegner
 * Date: 11.03.2019
 * Time: 12:00
 */
?>

<script type="text/javascript">

    function saveValue() {
        var fname = document.getElementById("firstname");
        localStorage.setItem("firstname", fname.value);

        var lname = document.getElementById("lastname");
        localStorage.setItem("lastname", lname.value);

        var group = document.getElementById("group");
        localStorage.setItem("group", group.value);

        var loc = document.getElementById("location");
        localStorage.setItem("location", loc.value);
    }

    window.onload = function getValue() {
        document.getElementById("firstname").value = localStorage.getItem("firstname");
        document.getElementById("lastname").value = localStorage.getItem("lastname");
        document.getElementById("group").value = localStorage.getItem("group");
        document.getElementById("location").value = localStorage.getItem("location");
    }
</script>

<h1 align="center">Mitarbeiter bearbeiten</h1>

<form action="<?php echo URL; ?>admin/staffChange" method="post">
    <label for="firstname">Vorname: </label>
    <input type="text" id="firstname" name="firstnameText" onchange="saveValue();">
    <br>
    <label for="lastname">Nachname: </label>
    <input type="text" name="surnameText" id="lastname" onchange="saveValue();">
    <br>
    <label for="group">Gruppe: </label>
    <input type="text" name="groupText" id="group" onchange="saveValue();">
    <br>
    <label for="location">Standort: </label>
    <input type="text" name="locationText" id="location" onchange="saveValue();">
    <br>
    <input type="submit" value="Suchen" name="searchButton">
</form>

<br><br><br>

<form>
    <table>
        <tr>
            <th>Username</th>
            <th>Name</th>
            <th>Gruppe</th>
            <th>Standort</th>
            <th>Änderung</th>
        </tr>

        <?php
        for ($i = 0; $i < count($this->userlist); $i++) {
            {
                echo '<tr>
                        <td> ' . $this->userlist[$i]['username'] . '</td>
                        <td> 
                        ' . $this->userlist[$i]['vname'] . ' ' . '
                        ' . $this->userlist[$i]['nname'] . '
                        </td>
                        <td contenteditable="true">' . $this->userlist[$i]['gruppe'] . '</td>
                        <td>' . $this->userlist[$i]['standort'] . '</td>
                        <td><a href="' . URL . ' admin/staffChange/' . $this->userlist[$i]['id'] . '">Bearbeiten</a></td>
                </tr>';
            }
        }
        ?>
    </table>
</form>

<br><br>

<form action="<?php echo URL; ?>admin/changeUser" method="post">
    <input hidden type="text" name="userId" value="<?php echo $this->userdetails['id']; ?>">
    <label for="firstnameChange">Vorname: </label>
    <input id="firstnameChange" type="text" value="<?php echo $this->userdetails['firstname']; ?>" name="changeFirstname">
    <br>
    <label for="secondnameChange">Zweitname: </label>
    <input id="secondnameChange" type="text" value="<?php echo $this->userdetails['secondname']; ?>" name="changeSecondname">
    <br>
    <label for="lastnameChange">Nachname: </label>
    <input id="lastnameChange" type="text" value="<?php echo $this->userdetails['lastname']; ?>" name="changeLastname">
    <br>
    <label for="groupChange">Gruppe: </label>
    <select id="groupChange" name="changeGroup">
        <?php
        for ($i = 0; $i < count($this->grouplist); $i++) {
            {
                echo '<option value="' . $this->grouplist[$i]['id'].'"' ;
                if ($this->grouplist[$i]['id'] == $this->userdetails['groupId']) {
                    echo ' selected ';
                }
                echo  '> '. $this->grouplist[$i]['gruppe'] . '</option>';
            }

        }
        ?>
    </select>
    <br>
    <label for="rechteID">RechteGruppe</label>
    <select id="rechteID" name="u_rights">
        <option <?php if($this->userdetails['u_rights']==1) echo ' selected '; ?> value="1">Normal</option>
        <option <?php if($this->userdetails['u_rights']==2) echo ' selected '; ?> value="2">Heftig</option>
        <option <?php if($this->userdetails['u_rights']==3) echo ' selected '; ?> value="3">Superheftig</option>
    </select>
    <br>
    <input type="submit" value="Speichern" name="changeButton">
    <?php
    if (!empty($this->erg[0]))
    {
        ?>
        <script type="text/javascript">
            alert("Neues Passwort: <?php echo $this->erg[0]; ?>");
        </script>

    <?php
    }
    ?>
    <input type="submit" value="Löschen" name="deleteButton">
    <input type="submit" value="Neues Passwort" name="passwordButton">
    <br><br>
    <label><?php echo $this->erg[1]; ?></label>

</form>
