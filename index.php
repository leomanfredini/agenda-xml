<?php
	require ("SimpleDOM.php");
	require_once ("config.php");
	require_once ("funcoes.php");
	$buscar = !empty($_REQUEST["buscar"]) ? $_REQUEST["buscar"] : "";
	$opc	= !empty($_REQUEST["opc"]) ? $_REQUEST["opc"] : "nome";
	$order	= !empty($_REQUEST["order"]) ? $_REQUEST["order"] : "@nome";
	$id		= !empty($_REQUEST["id"]) ? $_REQUEST["id"] : "";
	$by		= !empty($_REQUEST["by"]) ? $_REQUEST["by"] : "a";
	$byC	= ($by == "d") ? "a" : "d";

    $action = isset($_GET['action']) ? $_GET['action'] : "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agenda de Contatos</title>

    <!-- Bootstrap -->
    <link href="assets/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>
<body>

    <div class="container">
        <h1><span class="glyphicon glyphicon-paperclip"></span> AGENDA DE CONTATOS</h1>
        
    
        <hr />
    
        <div class="row">
            
    
            <div class="col-md-12">
                <?php require 'xml-buscar.php' ?>
            </div><!-- col-md-8 -->
    
        </div><!-- row -->
    
    </div><!-- container -->

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    
    <script src="js/main.js" type="text/javascript"></script>
    <!-- MakedInput -->
    <script src="js/jquery.maskedinput.min.js" type="text/javascript"></script>
    <!-- bootstrap -->
    <script src="js/bootstrap.min.js" type="text/javascript"></script>

    

</body>
</html>
