<?php

return array(
    'profile' => false,
    'default' => 'production',
    'connections' => array(
        'production' => array(
            'driver'   => 'mysql',
            'host'     => 'localhost',
            'database' => $_SERVER['THADBCONN'],
            'username' => $_SERVER['THADBUSER'],
            'password' => $_SERVER['THADRAGON'],
            'charset'  => 'utf8',
            'prefix'   => '',
        ),
    ),
);