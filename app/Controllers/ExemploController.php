<?php

namespace App\Controllers;
use App\Models\Exemplo;
use App\Models\Criptografia;

class ExemploController {

    public function index() {

        // Função para renderizar as views
        // Local da view
        // Variaveis a serem passadas para a view
        // Title e script são necessários para passar o titulo da página e o script js
        \App\View::make('login/exemplo', array(
            'title' => 'Login',
            'scripts' => array(
                  'login.js'
            ),
            'links' => array(
                'login.js'
            ))
        );
    }


}