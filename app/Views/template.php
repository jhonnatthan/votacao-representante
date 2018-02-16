<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Site para publicação de documentação técnica e diarios de bordo">
        <meta name="author" content="Equipe WorkLess">
        <meta name="keywords" content="diario de bordo, tcc, documentação, wkless, online">
        <meta name="theme-color" content="#00449B">
        <link rel="icon" href="favicon.ico">
        <title>DBO - <?php echo $title;?></title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet" >
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
        <link href="http://<?php echo HOST_PATH; ?>/css/style.css" rel="stylesheet">
    </head>
 
    <body>
         
        <?php 
        	if (isset($viewName)) { 
        		$path = VIEW_PATH . $viewName . '.php'; 
        		if (file_exists($path)) { 
        			require_once $path; 
        		} 
        	} 
        ?>

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
        <div class="modal-dialog " role="document" id="modalContent">
        </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://<?php echo HOST_PATH; ?>/js/bootstrap-notify.min.js"></script>
    <script src="http://<?php echo HOST_PATH; ?>/js/ie10-viewport-bug-workaround.js"></script>
    <?php if(isset($script)) { ?>
    <script src="http://<?php echo HOST_PATH.'/js/'.$script?>"></script>
    <?php }?>
 
    </body>

</html>