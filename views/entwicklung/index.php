
<form action="<?php echo URL;?>entwicklung/load" method="post">
    <input class="form-control" style="max-width: 30%" type="text" name="name" id="hint" required> <input hidden type="text" name="k_id" id="hint_id">
    <br><input class="ui-button" type="submit" value="suchen">

</form>
<?php if(@!empty($this->succsess)){ ?>
<div  style="margin:0px;width: 30%" class="alert-success alert"><?php echo $this->succsess;?></div>
<?php } ?>
<?php if(@!empty($this->change)){ ?>
<form action="<?php echo URL;?>entwicklung/save" method="post">
    <input hidden type="text" name="k_id" value="<?php echo $this->kind['k_id'];?>">
    <br>
    <?php if(@empty($this->succsess)){ ?>
    <label for="name">Name:</label><span id="name"><?php echo $this->kind['vorname'].' '.$this->kind['zweitname'].' '.$this->kind['nachname'];?></span><br>
    <?php }else{ ?>

    <?php } ?>
    <br>
    <textarea class="form-control" style="max-width: 60%;" rows="10" name="entwicklung"><?php echo $this->kind['entwicklung'];?></textarea>

    <?php if(SESSION::get('u_rights')==3){
        echo '<br><input class="ui-button" type="submit" value="speichern">';
    }
    ?>
</form>
<?php } ?>

<script type="text/javascript">
    var URL_AJAX = "<?php echo URL;?>entwicklung/jsonKind";
</script>


<script src="<?php echo PUBLIC_URL;?>js/searcher.js" type="text/javascript"></script>