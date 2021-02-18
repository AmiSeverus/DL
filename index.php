<?php

define ('DEBUG', true);

if (DEBUG) {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
}

$config = include 'config.php';
include 'psql.php';

$psql = new psql();
$psql->connect($config['local_psql']);
print_r($psql);

