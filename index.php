<?php

    require 'vendor/autoload.php';
    require 'init.php';

    $app = new \Slim\App([
        'settings' => [
            'displayErrorDetails' => true
        ]
    ]);

    $app->get('/', function() {
        // Renderiza Index
        $UsuarioController = new \App\Controllers\UsuarioController();
        $UsuarioController->index();
    });

    $app->post('/', function () {
       // Envia formulário de Login
        $UsuarioController = new \App\Controllers\UsuarioController();
        $UsuarioController->login();
    });

    $app->get('/campanhas', function () {
       // Exibe campanhas ativas
    });

    $app->get('/campanhas/nova', function () {
        // Formulário de cadastro de novas campanhas
    });

    $app->post('/campanhas/nova', function() {
        // Envio de dados do formulário de campanha
    });

    $app->get('/campanha/{id}', function () {
        // $request->getAttribute('id') para pegar a váriavel da Url
        // Exibe campanha e seus candidatos
    });

    $app->get('/campanha/{campanha}/{candidato}', function($request) {
        // $request->getAttribute('id') para pegar a váriavel da Url
        // exibe os dados do candidato
    });

    $app->post('/campanha/{campanha}/{candidato}', function() {
        // Função de cadastro de votos
        // Cadastra voto no Candidato
    });

    $app->run();