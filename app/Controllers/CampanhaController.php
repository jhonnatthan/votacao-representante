<?php

namespace App\Controllers;

class CampanhaController{

  public function renderizar() {
    if (\App\Controllers\UsuarioController::isLogado()) {
      \App\View::make("campanha/nova",
        array(
          "title" => "Cadastrar campanha"
        )
      );
    } else {
      header("Location: /");
      exit;
    }
  }

  public function armazenar() {

  }
}
