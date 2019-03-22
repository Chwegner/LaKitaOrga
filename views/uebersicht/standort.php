<?php

?>

<style>
    form {
        padding: 0.5em;
    }

    select {
        padding: 0.5em;
    }

    input {
        padding: 0.5em;
    }
</style>

<div style="width:80%; margin: 0 auto; margin-top: 2.0em; text-align: center;">
    <form action="<?php echo URL; ?>kind/auswahl/true" method="post">
        <label>Name:
            <input id="hint" type="text" name="name"  value="<?php echo (!empty($this->datenVorhanden["name"])) ? $this->datenVorhanden["name"] : ''; ?>">
            <input hidden id="hint_id" type="text" name="id" value="<?php echo (!empty($this->datenVorhanden["id"])) ? $this->datenVorhanden["id"] : ''; ?>">
        </label>
        &nbsp;&nbsp;&nbsp;
        <br>
        <input type="submit" value="absenden" name="absenden">
    </form>

    <p><br></p>
    <div style="margin: 0 auto; text-align: center;">

            <?php
            if($_POST["absenden"] == "absenden") {
                if (empty($this->anzeige_daten)) {
                    echo "Für diese Auswahl liegen keine Daten vor!";
                } else {
                    echo "<h2> Buchungsdaten für: " . $_POST["name"] . "</h2>
                    <br>
                    <table style='border: 1px solid black; width: 90%; margin: 0 auto; padding: 1.0em;'>
                    <tr>
                    <td style='padding: 0.5em; width: 30%;'>Datum</td>
                    <td>Status</td>
                    <td>Betrag</td>
                    </tr>";

                    for ($i = 0; $i < count($this->anzeige_daten); $i++) {
                        echo "<tr>";
                        echo "<td>";
                        echo $this->anzeige_daten[$i]["date"];
                        echo "</td>";
                        echo "<td>";
                        echo $this->anzeige_daten[$i]["status"];
                        echo "</td>";
                        echo "<td>";
                        echo $this->anzeige_daten[$i]["betrag"];
                        echo "</td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                }
            }
            ?>


    </div>

</div>

<script type="text/javascript">
    var URL_AJAX = "<?php echo URL;?>fibu/suchFeldIndex";
</script>

<!-- Dieses script muß auch geladen werden da ist die function drin -->
<script src="<?php echo PUBLIC_URL; ?>js/searcher.js" type="text/javascript"></script>
