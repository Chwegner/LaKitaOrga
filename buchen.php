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
    <form action="<?php echo URL; ?>fibu/setZahlung/true" method="post">
        <label>Jahr:
            <select name="jahr" size="1">
                <option>2019</option>
                <option>2018</option>
                <option>2017</option>
                <option>2016</option>
                <option>2015</option>
            </select>
        </label>
        &nbsp;&nbsp;&nbsp;
        <label>Monat:
            <select name="monat" size="1">
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
        </label>
        &nbsp;&nbsp;&nbsp;
        <label>Name:
            <input type="text" name="name">
        </label>
        <input type="submit" value="bezahlt">
    </form>
</div>
<p>
    <?php echo (!empty($this->anzeigeDatum))?$this->anzeigeDatum:'' ; ?>
</p>