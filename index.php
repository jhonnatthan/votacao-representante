<?php

    require 'vendor/autoload.php';
    require 'init.php';

    $app = new \Slim\App([
        'settings' => [
            'displayErrorDetails' => true
        ]
    ]);


    $app->get('/', function() {
        $UsersController = new App\Controllers\UserController;
        $UsersController->index();
    });

    
    // exibe o formulário de edição
    $app->get('/register/{id}', function ($request)
    {
        // pega o ID da URL
        $id = $request->getAttribute('id');
        $UserController = new \App\Controllers\UserController;
        $UserController->renderRegister($id);
    });
     
    // processa o formulário de edição
    $app->post('/register/', function ()
    {
        $UserController = new \App\Controllers\UserController;
        $UserController->storeRegister();
    });
    

    $app->run();

?>