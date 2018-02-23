<?php

/*
  ########################################
  #                                      #
  #  BIBLIOTECA PARA CONVERSÃO DE DADOS  #
  #                                      #
  ########################################
*/

/*

  ####################
  #  CONVERTER DATA  #
  ####################

*/

function convert_date($data_) {
  
  //Entrada:  30/12/2018
  //Saída:    2018-12-30

  //Filtro de Entrada Inválida
  if ($data_ == '' || $data_ == null):
    return null;
  endif;

  $nova_data = str_replace('/', '-', $data_);
  $nova_data = date('Y-m-d', strtotime($nova_data));
  return $nova_data; 
} 

/*

  #######################
  #  DESCONVERTER DATA  #
  #######################

*/

function desconvert_date($data_) {
  
  //Entrada:  2018-12-30
  //Saída:    30/12/2018

  //Filtro de Entrada Inválida
  if ($data_ == '' || $data_ == null):
    return null;
  endif;

  $nova_data = str_replace('-', '/', $data_);
  $nova_data = date('d/m/Y', strtotime($nova_data));
  return $nova_data; 
}

/*

  ################################
  #  DESCONVERTER DATA REDUZIDA  #
  ################################

*/

function desconvert_min_date($data_) {
  
  //Entrada:  2018-12-30
  //Saída:    30/12

  //Filtro de Entrada Inválida
  if ($data_ == '' || $data_ == null):
    return null;
  endif;

  $nova_data = str_replace('-', '/', $data_);
  $nova_data = date('d/m', strtotime($nova_data));
  return $nova_data; 
}

/*

  ########################
  #  CONVERTER DINHEIRO  #
  ########################

*/

function convert_money($money_) {

  //Entrada:  1000
  //Saída:    R$ 1.000,00

  //Filtro de Entrada Inválida
  if ($money_ == '' || $money_ == null):
    return 0;
  endif;

  $novo_money = 'R$ ' . number_format($money_, 2, ',', '.');
  return $novo_money;
}

/*

  ###########################
  #  DESCONVERTER DINHEIRO  #
  ###########################

*/

function desconvert_money($money_) {

  //Entrada:  R$ 1.000,00
  //Saída:    1000.00

  //Filtro de Entrada Inválida
  if ($money_ == '' || $money_ == null):
    return 0;
  endif;

  $novo_money = str_replace('R$ ', '', $money_);
  $novo_money = str_replace('.', '', $novo_money);
  $novo_money = str_replace(',', '.', $novo_money);
  return $novo_money;
}


/*

  ##########################
  #  CONVERTER QUANTIDADE  #
  ##########################

*/

function convert_qt($qt_) {

  //Entrada:  1000
  //Saída:    1.000

  //Filtro de Entrada Inválida
  if ($qt_ == '' || $qt_ == null):
    return 0;
  endif;

  $nova_qt = number_format($qt_, 0, '', '.');
  return $nova_qt;
}

?>