<div>
    <br><br>
    <form action="<?php echo URL; ?>fibu/getDaten/true" method="post">
        <label>Jahr:</label>
            <select name="jahr" size="1">
                <option>alle</option>
                <option>2019</option>
                <option>2018</option>
                <option>2017</option>
            </select>
        <br>
        <label>Monat:</label>
            <select name="monat" size="1">
                <option>alle</option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
                <option>04</option>
                <option>05</option>
                <option>06</option>
                <option>07</option>
                <option>08</option>
                <option>09</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
            </select>

        <br>
        <label>Name:</label>
            <input id="hint" type="text" name="name">
            <input id="hint_id" type="hidden" name="id" value="">
        <br><br>
        <label>&nbsp;</label>
        <input type="submit" value="absenden" name="absenden">
    </form>

    <p><br></p>
    <div style="margin: 0 auto; text-align: center;">

            <?php
            if($_POST["absenden"] == "absenden") {
                if (empty($this->anzeige_daten)) {
                    echo "Sie haben keinen oder einen falschen Namen eingegeben!
                    <br><br>";
                } else {
                    echo "<h2> Buchungsdaten für: " . $_POST["name"] . " - Zeitraum: Jahr ".$_POST["jahr"]." / Monat ".$_POST["monat"]."</h2>
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
