<div>
    <br><br>
    <form action="<?php echo URL; ?>uebersicht/kind/true" method="post">
        <label>Name:</label>
            <input id="hint" type="text" name="name"  value="<?php echo (!empty($this->datenVorhanden["name"])) ? $this->datenVorhanden["name"] : ''; ?>">
            <input hidden id="hint_id" type="text" name="id" value="<?php echo (!empty($this->datenVorhanden["id"])) ? $this->datenVorhanden["id"] : ''; ?>">
        <br><br>
        <label>&nbsp;</label>
        <input type="submit" value="absenden" name="absenden">
    </form>

    <p><br></p>
    <div style="margin: 0 auto; text-align: center;">

            <?php
            if($_POST["absenden"] == "absenden") {
                if (empty($this->daten)) {
                    echo "Für diese Auswahl liegen keine Daten vor!";
                } else {
                    echo "<h2> Stammdaten für: " . $_POST["name"] . "</h2>
                    <br>
                    <table style='border: 1px solid black; width: 90%; margin: 0 auto; padding: 1.0em;'>
                    <tr>
                    <td>Anrede</td>
                    <td>Vorname</td>
                    <td>Zweitname</td>
                    <td>Nachname</td>
                    <td>Eintrittsdatum</td>
                    <td>Gruppe</td>
                    <td>Vormund 1</td>
                    <td>Vormund 2</td>
                    </tr>
                    <tr>
                    <td>".$this->daten["anrede"]."</td>
                    <td>".$this->daten["vorname"]."</td>
                    <td>".$this->daten["zweitname"]."</td>
                    <td>".$this->daten["nachname"]."</td>
                    <td>".$this->daten["eintritt"]."</td>
                    <td><a href='".URL."uebersicht/gruppen/".$this->daten["gruppe"]."'>Gruppe anzeigen</a></td>
                    <td><a href='".URL."uebersicht/vormund/".$this->daten["vormund_1"]."'>Vormund 1 anzeigen</a></td>
                    <td><a href='".URL."uebersicht/vormund/".$this->daten["vormund_2"]."'>Vormund 2 anzeigen</a></td>
                    </tr>
                    </table>";
                }
            }
            ?>


    </div>

</div>

<script type="text/javascript">
    var URL_AJAX = "<?php echo URL;?>uebersicht/suchFeldIndex";
</script>

<!-- Dieses script muß auch geladen werden da ist die function drin -->
<script src="<?php echo PUBLIC_URL; ?>js/searcher.js" type="text/javascript"></script>
