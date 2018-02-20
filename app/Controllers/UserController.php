<<<<<<< current
<?php

namespace App\Controllers;
use App\Models\User;
use App\Models\Criptografia;

class UserController {

    public function index() 
    {
        // Função para renderizar as views
        // Local da view
        // Variaveis a serem passadas para a view
        // Title e script são necessários para passar o titulo da página e o script js
        \App\View::make('login/login', array(
            'title' => 'Login',
            'scripts' => array(
                  'login.js'
            ),
            'links' => array(
                'login.js'
            ))
        );
    }
    
    
    public function login()
    {
        // Function to login
        
    }
    
    public function renderRegister()
    {
        //this function render register template
        \App\View::make('register/register', array(
            'title' => 'Register',
            'scripts' => array(
                  'login.js'
            ),
            'links' => array(
                'login.js'
            ))
        );
    }

    public function storeRegister()
    {
        //this function displays a new user
        //registration and data storage screen
        // pega os dados do formuário
        $name = isset($_POST['name']) ? $_POST['name'] : null;
        $pass = isset($_POST['pass']) ? $_POST['pass'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $ra = isset($_POST['ra']) ? $_POST['ra'] : null;

        if (User::save($name, $pass, $email, $ra))
        {
            header('Location: /');
            exit;
        }
    }

}
=======
<?php

namespace App\Controllers;
use App\Models\User;
use App\Models\Criptografia;

class UserController {

    public function index()
    {
        // Função para renderizar as views
        // Local da view
        // Variaveis a serem passadas para a view
        // Title e script são necessários para passar o titulo da página e o script js
        \App\View::make('login/login', array(
            'title' => 'Login',
            'scripts' => array(
                  'login.js'
            ),
            'links' => array(
                'login.js'
            ))
        );
    }


    public function login()
    {
        // Function to login

    }

    public function renderRegister()
    {
        //this function render register template
        \App\View::make('login/register', array(
            'title' => 'Register',
            'scripts' => array(
                  'login.js'
            ),
            'links' => array(
                'login.js'
            ))
        );
    }

    public function storeRegister()
    {
        //this function displays a new user
        //registration and data storage screen
        // pega os dados do formuário
        $name = isset($_POST['name']) ? $_POST['name'] : null;
        $pass = isset($_POST['pass']) ? $_POST['pass'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $ra = isset($_POST['ra']) ? $_POST['ra'] : null;

        if (User::save($name, $pass, $email, $ra))
        {
            header('Location: /');
            exit;
        }
    }

}
>>>>>>> before discard
