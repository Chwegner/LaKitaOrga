<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 08.03.2019
 * Time: 11:56
 * © : 2019
 */
?>
<!-- Sodale allround suche fertig
Das input tag das sucht muß die id hint benutzen !!
Das input Tag das die id des zu suchenden element´s aufnimmt
muß die id hint_id benutzen !!

Das hint feld braucht keinen type name oder value
Das input tag hint_id kann hidden sein auch readonly what ever
die ID die vom script zurückgegeben wird wird als value gesetzt bei der auswahl

Guckt euch noch den controler index methode get_test
und das index_model methode get_test_json an da steckt
die Serverseitige sache für die Suche drin"
-->

<form action="#" method="post">
    <input id="hint" type="text" name="v1">
    <input hidden id="hint_id" type="text" name="id" value="">
</form>

<!-- Dieses ScriptTAG muß gesetzt werden die URL_AJAX muß den link
zu dem Script beinhalten wo die POST variable hingeschickt wird und
verarbeitet wird -->
<script type="text/javascript">
    var URL_AJAX = "<?php echo URL;?>index/get_test";
</script>

<!-- Dieses script muß auch geladen werden da ist die function drin -->
<script src="<?php echo PUBLIC_URL;?>js/searcher.js" type="text/javascript"></script>



