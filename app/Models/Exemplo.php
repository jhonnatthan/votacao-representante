<?php 

    namespace App\Models;
    use App\Banco;

    class Exemplo extends Banco{

        public static function selectAll($id = null) {

            // Conecta ao banco
            self::connect();

            // Define as variaveis da query
            // Tabela
            $table = "users";

            // Campos
            $fields = array(
                "id", 
                "name", 
                "email", 
                "gender", 
                "birthdate"
            );

            // Where (Se id for igual $id)
            $where = !empty($id) ? array("id" => $id) : null;

            $users = self::select($table, $fields, $where, null, null, "name ASC");

            return $users;
        }

        public static function save($name, $email, $gender, $birthdate) {

            self::connect();

        }


        public static function updateUser($id, $name, $email, $gender, $birthdate) {

            self::connect();

        }


        public static function remove($id) {

            self::connect();

        }
    }
?>