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

            $table = "users";
            $data = array(
                "name" => $name,
                "email" => $email,
                "gender" => $gender,
                "birthdate" =>$birthdate
            );
            $returnID = false;

            self::insert($table, $data, $returnID);
        }


        public static function updateUser($id, $name, $email, $gender, $birthdate) {

            self::connect();

            $table = "users";
            $data = array(
                "name" => $name,
                "email" => $email,
                "gender" => $gender,
                "birthdate" =>$birthdate
            );
            $where = array(
                "id" => $id
            );

            self::update($table, $data, $where);

        }


        public static function remove($id) {

            self::connect();

            $table = "users";
            $where = array(
                "id" => $id
            );
            self::delete($table, $where);
        }
    }
?>