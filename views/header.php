<!DOCTYPE HTML>
<html>
<head>
    <link rel="shortcut icon" href="<?php echo PUBLIC_URL; ?>images/favicon.ico">
    <?php if(SESSION::get('layout')==1){ ?>
        <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_URL; ?>css/res.css">


    <?php } ?>
    <?php if(SESSION::get('layout')==0 OR !SESSION::get('layout')){ ?>
        <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_URL; ?>css/Bootstrap/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_URL; ?>css/manu.css">
    <?php } ?>
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_URL; ?>css/jquery-ui.css">
    <meta charset="utf-8">
    <meta http-equiv="language" content="DE">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=1"/>
    <title><?php echo (isset($this->title)) ? $this->title : 'LaKitaOrga'; ?></title>
    <meta name="robots" content="all">
    <!-- @TODO muß noch in den Footer verlegt werden -->
    <script src="<?php echo PUBLIC_URL; ?>js/jquery-3.3.1.js"></script>
    <script src="<?php echo PUBLIC_URL; ?>js/jquery-ui.min.js"></script>
    <!-- @TODO muß noch in den Footer verlegt werden ende -->
    <?php
    if (isset($this->js)) {
        foreach ($this->js as $js)
            echo '<script type="text/javascript" src="' . URL . 'views/' . $js . '"></script>
    ';
    }
    ?>
</head>
<body class="body">
<div id="wrapper">
    <?php if(!SESSION::get('layout'))SESSION::set('layout',0); ?>
