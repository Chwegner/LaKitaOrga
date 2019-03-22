<div>
    <br><br>
    <form action="<?php echo URL; ?>fibu/setZahlung/true" method="post">
        <label>Jahr:</label>
            <select name="jahr" size="1">
                <option <?php echo ($this->datenVorhanden["jahr"] == "2019" ? "selected" : ''); ?>>2019</option>
                <option <?php echo ($this->datenVorhanden["jahr"] == "2018" ? "selected" : ''); ?>>2018</option>
                <option <?php echo ($this->datenVorhanden["jahr"] == "2017" ? "selected" : ''); ?>>2017</option>
            </select>
<br>

        <label>Monat:</label>
            <select name="monat" size="1">
                <option <?php echo ($this->datenVorhanden["monat"] == "1" ? "selected" : ''); ?>>01</option>
                <option <?php echo ($this->datenVorhanden["monat"] == "2" ? "selected" : ''); ?>>02</option>
                <option <?php echo ($this->datenVorhanden["monat"] == "3" ? "selected" : ''); ?>>03</option>
                <option <?php echo ($this->datenVorhanden["monat"] == "4" ? "selected" : ''); ?>>04</option>
                <option <?php echo ($this->datenVorhanden["monat"] == "5" ? "selected" : ''); ?>>05</option>
                <option <?php echo ($this->datenVorhanden["monat"] == "6" ? "selected" : ''); ?>>06</option>
                <option <?php echo ($this->datenVorhanden["monat"] == "7" ? "selected" : ''); ?>>07</option>
                <option <?php echo ($this->datenVorhanden["monat"] == "8" ? "selected" : ''); ?>>08</option>
                <option <?php echo ($this->datenVorhanden["monat"] == "9" ? "selected" : ''); ?>>09</option>
                <option <?php echo ($this->datenVorhanden["monat"] == "10" ? "selected" : ''); ?>>10</option>
                <option <?php echo ($this->datenVorhanden["monat"] == "11" ? "selected" : ''); ?>>11</option>
                <option <?php echo ($this->datenVorhanden["monat"] == "12" ? "selected" : ''); ?>>12</option>
            </select>
        <br>

        <label>Name:</label>
            <input id="hint" type="text" name="name"  value="<?php echo (!empty($this->datenVorhanden["name"])) ? $this->datenVorhanden["name"] : ''; ?>">
            <input hidden id="hint_id" type="text" name="id" value="<?php echo (!empty($this->datenVorhanden["id"])) ? $this->datenVorhanden["id"] : ''; ?>">
        <br>
        <label>Betrag:</label>
            <input type="number" min="0.00" max="2500.00" step="0.01" name="betrag">
        <br><br>
        <label>&nbsp;</label>
        <input type="submit" value="buchen">
    </form>
    <p>
        <?php echo (!empty($this->ausgabe)) ? $this->ausgabe : '' ; ?>
    </p>
</div>


<script type="text/javascript">
    var URL_AJAX = "<?php echo URL;?>fibu/suchFeldBuchen";
</script>

<!-- Dieses script muß auch geladen werden da ist die function drin -->
<script src="<?php echo PUBLIC_URL;?>js/searcher.js" type="text/javascript"></script>