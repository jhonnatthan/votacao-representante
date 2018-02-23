<?php 

/*
  ##################################
  #                                #
  #  BIBLIOTECA PARA CRIPTOGRAFIA  #
  #                                #
  ##################################
*/

class Criptografia {

  private $encrypt_method = "AES-256-CBC";
  private $secret_key = '@@2018Fatec_SI@@_KEY|@@2018Fatec_SI@@_KEY|@@2018Fatec_SI@@_KEY';
  private $secret_iv = '@@2018Fatec_SI@@_IV|@@2018Fatec_SI@@|_IV@@2018Fatec_SI@@_IV';


/*

  #########################
  #  CODIFICAÇÃO SIMPLES  #
  #########################

*/

  function encriptar_simple($string_) {

    $output = false;
    $key = hash('sha256', $this->secret_key);
    $iv = substr(hash('sha256', $this->secret_iv), 0, 16);

    $output = openssl_encrypt($string_, $this->encrypt_method, $key, 0, $iv);
    $output = base64_encode($output);
    return $output;
  }

/*

  ###########################
  #  DECODIFICAÇÃO SIMPLES  #
  ###########################

*/

  function descriptar_simple($string_) {

    $output = false;
    $key = hash('sha256', $this->secret_key);
    $iv = substr(hash('sha256', $this->secret_iv), 0, 16);

    $output = openssl_decrypt(base64_decode($string_), $this->encrypt_method, $key, 0, $iv);
    return $output;
  }

/*

  ######################################
  #  CODIFICAÇÃO COMPLEXA SEM RETORNO  #
  ######################################

*/

  function encriptar_complex($string_) {

    $encriptado = hash('sha512', $string_);
    return $encriptado;
  }

}

/*


#  EXEMPLO DE USO

$criptografia = new Criptografia();

$texto = "1234";
echo "Texto: " . $texto . "\n";

$criptado = $criptografia->encriptar($texto);
echo "Encriptado: " . $criptado . "\n";

$descriptado = $criptografia->descriptar($criptado);
echo "Descriptado: " . $descriptado . "\n\n";

if ( $texto === $descriptado ):
  echo "#SUCESSO" . "\n\n";
else:
  echo "#FALHA" . "\n\n";
endif;

*/
?>