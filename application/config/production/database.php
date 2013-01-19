<?php

return array(
    'profile' => false,
    'default' => 'production',
    'connections' => array(
        'production' => array(
            'driver'   => 'mysql',
            'host'     => 'localhost',
            'database' => $_ENV['THADBCONN'],
            'username' => $_ENV['THADBUSER'],
            'password' => $_ENV['THADRAGON'],
            'charset'  => 'utf8',
            'prefix'   => '',
        ),
    ),
);