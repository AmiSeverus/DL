<?php

$psql = new psql();
$psql->connect($config['local_psql']);
print_r($psql);

