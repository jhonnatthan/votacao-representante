<?php
    define('DS', DIRECTORY_SEPARATOR);
	define('BASE_PATH', dirname(__FILE__));
	define('VIEW_PATH', BASE_PATH . DS . 'app' . DS . 'Views' . DS);
	define('CONTROLLER_PATH', BASE_PATH . DS . 'app' . DS . 'Controllers' . DS);
	define('MODEL_PATH', BASE_PATH . DS . 'app' . DS . 'Models' . DS);
	define('HOST_PATH', $_SERVER['HTTP_HOST']);

  // Credenciais do Banco de Dados
  define("DB_NAME", "mydb");
  define("DB_USER", "root");
  define("DB_PASS", "");
  define("DB_HOST", "127.0.0.1");

	ini_set('display_erros', true);
	error_reporting(E_ALL);

	date_default_timezone_set('America/Sao_Paulo');
