<?php

namespace App\Controllers;
use App\Models\User;
use App\Models\Criptografia;

class UsuarioController {

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
        // Funçao de login
        $login = $_POST['login'] ?? "";
        $senha = $_POST['senha'] ?? "";
        $Banco = new \App\Banco();
        $table = array("tb_usuario");
        $args = array("cd_usuario" => ":login", "nm_senha" => ":senha");
        $stmt = $Banco->prepare($Banco::select($table, null, $args));
        $stmt->bindParam(":login", $login, \PDO::PARAM_STR);
        $stmt->bindParam(":senha", $senha, \PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            session_start();
            $user = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            $_SESSION['logado'] = true;
            $_SESSION['usuario'] = $user[0];
        } else {
            $_SESSION['logado'] = false;
            header('Location: /?error=0');
            exit;
        }
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

    public function isLogado() {
        return isset($_SESSION['logado']) && $_SESSION['logado'];
    }

}
