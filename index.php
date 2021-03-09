<?php

define ('DEBUG', true);

if (DEBUG) {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
}


$config = include __DIR__ . DIRECTORY_SEPARATOR . 'configs' . DIRECTORY_SEPARATOR . 'config.php'; 

include './configs/core.php';

$dl = new core($config);
$dl->run();

/*
$config = include './configs/config.php';
include './configs/psql.php';

$psql = new psql();
$psql->connect($config['local_psql']);*/

