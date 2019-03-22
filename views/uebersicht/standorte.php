
<div>
    <br><br>
    <form action="<?php echo URL; ?>uebersicht/standorte/true" method="post">
        <label>Standorte: </label>
            <select name="standorte" size="1">
                <?php
                for ($i = 0; $i < count($this->daten); $i++) {
                    echo "<option value='".$this->daten[$i]["s_id"] ."' ". ($this->datenVorhanden['id'] == $this->daten[$i]["s_id"] ? 'selected' : '')." > ". $this->daten[$i]['standort_name']." </option>";
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

<div>

    <?php
    if (isset($_POST["standorte"])) {

        if (empty($this->daten_standorte)) {
            echo "Für diese Auswahl liegen keine Daten vor!";
        } else {
            echo "
            <h2> Standortleiter: </h2>
            <br>
            <p class='p1'>
            ".$this->daten_leiter['anrede']." ".$this->daten_leiter['vorname']." ".$this->daten_leiter['nachname']."  <a href='".URL."uebersicht/mitarbeiter/".$this->daten_leiter['u_id']."'>&nbsp;&nbsp;&nbsp;Mitarbeiter Stammdaten anzeigen</a>
            </p>
                <br><br>
                    <h3>Stammdaten für Standort: " . $this->daten_standorte["standort_name"] . "</h3>
                    <br>
                    <table>
                    <tr>
                    <td>Straße</td>
                    <td>Hausnummer</td>
                    <td>PLZ</td>
                    <td>Ort</td>
                    <td>Telefon</td>
                    <td>Mobil</td>
                    <td>Mail</td>
                    <td>Leiter</td>
                    </tr>
                    <tr>
                    <td>" . $this->daten_standorte["strasse"] . "</td>
                    <td>" . $this->daten_standorte["hausnummer"] . "</td>
                    <td>" . $this->daten_standorte["plz"] . "</td>
                    <td>" . $this->daten_standorte["ort"] . "</td>
                    <td>" . $this->daten_standorte["telefon"] . "</td>
                    <td>" . $this->daten_standorte["mobil"] . "</td>
                    <td>" . $this->daten_standorte["mail"] . "</td>
                    <td><a href='" . URL . "uebersicht/mitarbeiter/" . $this->daten_standorte["leiter"] . "'>Standortleiter anzeigen</a></td>
                    </tr>
                    </table>";
        }
    }
    ?>
</div>