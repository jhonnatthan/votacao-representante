<?php
	namespace App;

	class Banco	extends \PDO{

		private $dsn;
		private $username;
		private $password;
		private $database;

		public function __construct($dsn = null, $username = null, $password = null, $database = null, $options = array()) {
			$this->dsn = isset($dsn) ? $dsn : sprintf("mysql:host=%s;dbname=%s", DB_HOST, DB_NAME);
			$this->username = isset($username) ? $username : DB_USER;
			$this->password = isset($password) ? $password : DB_PASS;
			$this->database = isset($database) ? $database : DB_NAME;
			parent::__construct($this->dsn, $this->username, $this->password, $options);
		}

		public function getDsn(){
			return $this->dsn;
		}

		public function getUsername(){
			return $this->username;
		}

		public function getPassword(){
			return $this->password;
		}

		public function getDatabase(){
			return $this->database;
		}

		public function setDsn($dsn) {
			$this->dsn = $dsn;
		}

		public function setUsername($username) {
			$this->username = $username;
		}

		public function setPassword($password) {
			$this->password = $password;
		}

		public function setDatabase($database) {
			$this->database = $database;
		}

		static function select($tabela, $campos = null, $argumentos = null, $agrupar = null, $havendo = null, $ordernar = null, $limite = null) {
			$tabela = is_array($tabela) ? implode(', ', $tabela) : $tabela;
			$campos = ($campos) ? implode(', ', $campos) : "*";

			if($argumentos) {
				foreach ($argumentos as $chave => $valor) {
					$args[] = "{$chave} = {$valor}";
				}
				$argumentos = 'WHERE '.implode(' AND ',$args);
			}

			$agrupar = ($agrupar) ? 'GROUP BY '.$agrupar : null;
			$havendo = ($havendo) ? 'HAVING '.$havendo : null;
			$ordernar = ($ordernar) ? 'ORDER BY '.$ordernar : null;
			$limite = ($limite) ? 'LIMIT '.$limite : null;

			return "SELECT {$campos} FROM {$tabela} {$argumentos} {$agrupar} {$havendo} {$ordernar} {$limite}";
		}

    static function insert($tabela, $dados, $id = false) {
			$campos = implode(', ', array_keys($dados));
			$valores = "'" . implode("', '", $dados) . "'";

			return "INSERT INTO {$tabela} ({$campos}) VALUES ({$valores})";
		}

    static function update($tabela, $dados, $argumentos = null) {

			foreach ($dados as $chave => $valor) {
				$valores[] = "{$chave} = '{$valor}'";
			}
			$valores = implode(', ', $valores);

			if($argumentos) {
				foreach ($argumentos as $chave => $valor) {
					$args[] = "{$chave} = '{$valor}'";
				}
				$argumentos = 'WHERE '.implode(' AND ',$args);
			}

			return "UPDATE {$tabela} SET {$valores} {$argumentos}";
		}

		static function delete($tabela, $argumentos = null) {

			if($argumentos) {
				foreach ($argumentos as $chave => $valor) {
					$args[] = "{$chave} = '{$valor}'";
				}
				$argumentos = 'WHERE '.implode(' AND ',$args);
			}

			return "DELETE FROM {$tabela} {$argumentos}";
		}
	}

?>
