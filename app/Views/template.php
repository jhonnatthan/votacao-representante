<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Sistema para decisão de representante do curso Sistemas para Internet da Fatec BS">
        <meta name="author" content="SI012018">
        <meta name="keywords" content="FATEC, FATECBS, FATECRL, Votação">
        <meta name="theme-color" content="#FFF">
        <link rel="icon" href="favicon.ico">
        <title>Votação - <?php echo $title;?></title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet" >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
        <?php

            if(isset($links)) {
                if(is_array($links)) {
                    foreach ($links as $link) {
                       echo '<link rel="stylesheet" href="' . $link . ' >';
                    }
                }
            }

        ?>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>


        <?php

        if(isset($scripts)) {
            if(is_array($scripts)) {
                foreach ($scripts as $script) {
                    echo '<script src="' . $script . ' >';
                }
            } else {
                echo '<script src="'.$scripts.'>';
            }
        }

    ?>
 
    </body>

</html>