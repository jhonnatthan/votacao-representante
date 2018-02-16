<?php

    require 'vendor/autoload.php';
    require 'init.php';

    $app = new \Slim\App([
        'settings' => [
            'displayErrorDetails' => true
        ]
    ]);


    $app->get('/', function() {
    });

    $app->post('/', function (){
    });

    $app->run();

?>