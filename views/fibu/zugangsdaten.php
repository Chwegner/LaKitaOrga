<div>
    <br><br>
    <form action="<?php echo URL; ?>fibu/setZugangsdaten/true" method="post">

        <label>URL (zB https://www.commerzbank.de)</label>
        <input type="text" name="url" value="<?php echo $this->daten['url']; ?>">

        <br />

        <label>BLZ (zB 36080080)</label>
        <input type="text" name="blz" value="<?php echo $this->daten['blz']; ?>">

        <br />

        <label>Benutzername</label>
        <input type="text" name="benutzer" value="<?php echo $this->daten['benutzer']; ?>">

        <br />

        <label>pin (für OnlinBanking)</label>
        <input type="text" name="pin" value="<?php echo $this->daten['pin']; ?>">

        <br /><br />
        <label>&nbsp;</label>
        <input type="submit" value="absenden">
    </form>
    <br>
    <?php
    if(isset($this->ausgabe)){
        echo $this->ausgabe;
    }else{
        echo "";
    }

    ?>
</div>
