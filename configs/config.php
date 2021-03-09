<?php

$dl_path = __DIR__ . DIRECTORY_SEPARATOR . '..';

return [
    'controllers_path' => $dl_path . DIRECTORY_SEPARATOR . 'controllers',
    'local_psql'=> [
        'host'=> '127.0.0.1',
        'port'=>'5432',
        'login'=> 'wd7test',
        'password'=> 'test',
        'name'=> 'dl'
    ],
];