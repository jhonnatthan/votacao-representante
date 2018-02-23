<?php

namespace App\Controllers;
use App\Models\Usuario;

class UsuarioController {

    public static function verificaLogado() {
        return $_SESSION['logado'] ?? false;
    }

}