<?php

/*
  ########################################
  #                                      #
  #  BIBLIOTECA PARA VALIDAÇÃO DE DADOS  #
  #                                      #
  ########################################
*/

/*

  ##################
  #  VALIDAR DATA  #
  ##################

*/

function validar_data($data_) {
  
  //FORMATOS ACEITOS
  // 30/12/2018

  $formatos_aceitos = array(
    "/[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/" //dd/mm/yyyy
  );

  foreach ($formatos_aceitos as $item) {
    if(preg_match($item, $data_)):
      return true;
    endif;
  }
  
  return false;
}

/*

  #################
  #  VALIDAR CPF  #
  #################

*/

function validar_cpf($cpf_) {

  $cpf = preg_replace('/[^0-9]/', '', $cpf_);
  
  if ( strlen($cpf) != 11 || preg_match('/^([0-9])\1+$/', $cpf) ):
    return false;
  endif;

  $digit = substr($cpf, 0, 9); // 9 primeiros digitos do cpf
  for ($j=10; $j <= 11; $j++) {  // calculo dos 2 digitos verificadores
    
    $sum = 0;
    for($i=0; $i< $j-1; $i++) {
      $sum += ($j-$i) * ((int) $digit[$i]);
    }
    
    $summod11 = $sum % 11;
    $digit[$j-1] = $summod11 < 2 ? 0 : 11 - $summod11;
  }
  
  return $digit[9] == ((int)$cpf[9]) && $digit[10] == ((int)$cpf[10]);
}

?>