<div>
    <br><br>
    <form action="<?php echo URL; ?>uebersicht/gruppen/true" method="post">
        <label>Gruppe:</label>
            <select name="gruppe" size="1">
                <?php
                for ($i = 0; $i < count($this->daten); $i++){
                echo "<option value='".$this->daten[$i]["g_id"]."' ".($this->datenVorhanden['id'] == $this->daten[$i]["g_id"] ? 'selected' : '').">". $this->daten[$i]['gruppen_name']."</option>";
                }
                ?>
            </select>

<br><br>
        <label>&nbsp;</label>
        <input type="submit" value="auswählen">
    </form>
    <p>

    </p>
</div>
<p><br></p>
<div style="margin: 0 auto; text-align: center;">

    <?php
    if(isset($_POST["gruppe"])) {
        if (empty($this->daten_kinder)) {
            echo "Für diese Auswahl liegen keine Daten vor!";
        } else {
            echo "<h2> Gruppenleiter: </h2>";

                     for($i = 0; $i < count($this->daten_mitarbeiter); $i++){
                     echo "
                     <br>
                      ".$this->daten_mitarbeiter[$i]["anrede"]." ".$this->daten_mitarbeiter[$i]["vorname"]." ".$this->daten_mitarbeiter[$i]["nachname"]."  <a href='".URL."uebersicht/mitarbeiter/".$this->daten_mitarbeiter[$i]["u_id"]."'>Mitarbeiter Stammdaten anzeigen</a>
                    ";
                     }


                    echo
                    "<br><br>
                    <h3>Kinder der Gruppe ".$this->daten_gruppenname["gruppen_name"]."</h3>
                    <br>
                    <table style='border: 1px solid black; width: 90%; margin: 0 auto; padding: 1.0em;'>
                    <tr>
                    <td>Anrede</td>
                    <td>Vorname</td>
                    <td>Zweitname</td>
                    <td>Nachname</td>
                    <td>Eintrittsdatum</td>
                    <td>Vormund 1</td>
                    <td>Vormund 2</td>
                    </tr>";

                    for($i = 0; $i < count($this->daten_kinder); $i++){
                        echo "
                        <tr>
                    <td>".$this->daten_kinder[$i]["anrede"]."</td>
                    <td>".$this->daten_kinder[$i]["vorname"]."</td>
                    <td>".$this->daten_kinder[$i]["zweitname"]."</td>
                    <td>".$this->daten_kinder[$i]["nachname"]."</td>
                    <td>".$this->daten_kinder[$i]["eintritt"]."</td>
                    <td><a href='".URL."uebersicht/vormund/".$this->daten_kinder[$i]["vormund_1"]."'>Vormund 1 anzeigen</a></td>
                    <td><a href='".URL."uebersicht/vormund/".$this->daten_kinder[$i]["vormund_2"]."'>Vormund 2 anzeigen</a></td>
                    </tr>
                    ";
                    }


            echo "</table>";
        }
    }
    ?>
</div>