<?php

namespace App\Models;
use App\Banco;

class Campanha {

    public static function criaCampanha($nome, $descricao, $imagem = null, $anonimo = true, $dataInicio, $dataFim) {
      $banco = new \App\Banco(); // Instância do objeto
      $sql = "CALL campanha_insert(:nome, :descricao, :imagem, :anonimo, :dataInicio, :dataFim)"; // Query SQL
      $stmt = $banco->prepare($sql); // Cria um Statement (Utilizdo para Query SQL)
      /* Parâmetros da Procedure,
        Isto é utilizado para segurança, evitando coisas como SQLInjection */
      $stmt->bindParam(":nome", $nome, \PDO::PARAM_STR);
      $stmt->bindParam(":descricao", $descricao, \PDO::PARAM_STR);
      $stmt->bindParam(":imagem", $imagem, \PDO::PARAM_LOB);
      $stmt->bindParam(":anonimo", $anonimo, \PDO::PARAM_BOOL);
      $stmt->bindParam("dataInicio", $dataInicio, \PDO::PARAM_STR);
      $stmt->bindParam(":dataFim", $dataFim, \PDO::PARAM_STR);

      $stmt->execute();
    }

    public static function selecionaCampanha($codigoCampanha) {

    }

    public static function atualizaCampanha($nome, $descricao, $imagem = null, $anonimo = true, $dataInicio, $dataFim) {

    }

    public static function deletaCampanha($codigoCampanha) {

    }

}
