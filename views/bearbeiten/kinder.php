<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 15.03.2019
 * Time: 07:43
 * © : 2019
 */
?>
<form action="<?php echo URL;?>bearbeiten/kind" method="post">
    <input id="hint" required>
    <input hidden id="hint_id" type="text" name="id" value="">
    <input type="submit" value="bearbeiten">
</form>


<script type="text/javascript">
    var URL_AJAX = "<?php echo URL;?>bearbeiten/json_kind";
</script>


<script src="<?php echo PUBLIC_URL;?>js/searcher.js" type="text/javascript"></script>
