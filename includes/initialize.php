<?php
    error_reporting(E_ALL & ~E_NOTICE);
    require('config.php');
    require('dbx.php');
    require('functions.php');
    $urlFile = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
?>