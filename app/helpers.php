<?php

    function converteData($data) {
        if ( ! strstr( $data, '/' ) ) {
            sscanf($data, '%d-%d-%d', $y, $m, $d);
            return sprintf('%02d/%02d/%04d', $d, $m, $y);
        } else {
            sscanf($data, '%d/%d/%d', $d, $m, $y);
            return sprintf('%04d-%02d-%02d', $y, $m, $d);
        }

        return false;
    }

    function excluiDir($dir) {

        if ($dd = opendir($dir)) {
            while (false !== ($arq = readdir($dd))) {
                if($arq != "." && $arq != ".."){
                    $path = "$dir/$arq";
                    if(is_dir($path)){
                        excluiDir($path);
                    }elseif(is_file($path)){
                        unlink($path);
                    }
                }
            }
            closedir($dd);
        }
        rmdir($dir);
    }

    function geraAleatorio() {
        $tamanho = 15;

        $all_str = "abcdefghijlkmnopqrstuvxyzwABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";

        $nome = "";
        for ($i = 0;$i <= $tamanho;$i++) {
            $nome .= $all_str[mt_rand(0,61)];
        }

        return $nome;
    }

    function trataArray(&$item, $key) {
        $item = addslashes(trim($item));
    }

    function protegeDados(&$dados) {
        array_walk_recursive($dados, 'trataArray');
    }

    function responseJson() {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header('Content-Type: application/json; charset=UTF-8');
    }

    function responseHtml() {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header('Content-Type: text/html; charset=UTF-8');
    }

    function getMobileData() {

    }

