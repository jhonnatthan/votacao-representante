<?php
	namespace App;

	class Banco	{
		static private $host;
		static private $username;
		static private $password;
		static private $database;
		static private $charset;
		static private $link;

		static function connect($database = "", $host = "localhost", $username = "root", $password = "usbw", $charset = "utf8") {
			self::$host = $host;
			self::$username = $username;
			self::$password = $password;
			self::$database = $database;
			self::$charset = $charset;
			self::$link = mysqli_connect(self::$host, self::$username, self::$password, self::$database) or die('Erro de conexão '.mysqli_error(self::$link));
			mysqli_set_charset(self::$link, self::$charset);
		}

		static function disconnect() {
			mysqli_close(self::$link);
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
			
			$sql = mysqli_query(self::$link, "SELECT {$campos} FROM {$tabela} {$argumentos} {$agrupar} {$havendo} {$ordernar} {$limite}") or die(mysqli_error(self::$link));
			
			$numrows = mysqli_num_rows($sql);
			
			if($numrows > 0 ) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$dados[] = $row;
				}
			}		
			
			return ($numrows > 0 && $sql) ? $dados : false ;
		}

        static function insert($tabela, $dados, $id = false) {
			$campos = implode(', ', array_keys($dados));
			$valores = "'" . implode("', '", $dados) . "'";
			
			$sql = mysqli_query(self::$link, "INSERT INTO {$tabela} ({$campos}) VALUES ({$valores})") or die(mysqli_error(self::$link));
			
			if($sql) {
				return ($id) ? mysqli_insert_id(self::$link) : $sql;
			} else {
				return false;
			}
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
			
			$sql = mysqli_query(self::$link, "UPDATE {$tabela} SET {$valores} {$argumentos}") or die(mysqli_error(self::$link));
			
			return ($sql) ? mysqli_affected_rows(self::$link) : false;
		}
		
		static function delete($tabela, $argumentos = null) {
			
			if($argumentos) {
				foreach ($argumentos as $chave => $valor) {
					$args[] = "{$chave} = '{$valor}'";
				}
				$argumentos = 'WHERE '.implode(' AND ',$args);
			}
			
			$sql = mysqli_query(self::$link, "DELETE FROM {$tabela} {$argumentos}") or die(mysqli_error(self::$link));
			
			return ($sql) ? mysqli_affected_rows(self::$link) : false;
		}

		static function getError() {
		    return mysqli_error(self::$link);
        }

	}

?>