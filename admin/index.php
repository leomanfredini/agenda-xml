<?php
	require ("../SimpleDOM.php");
	require_once ("../config.php");
	require_once ("../funcoes.php");
	$buscar = !empty($_REQUEST["buscar"]) ? $_REQUEST["buscar"] : "";
	$opc	= !empty($_REQUEST["opc"]) ? $_REQUEST["opc"] : "nome";
	$order	= !empty($_REQUEST["order"]) ? $_REQUEST["order"] : "@nome";
	$id		= !empty($_REQUEST["id"]) ? $_REQUEST["id"] : "";
	$by		= !empty($_REQUEST["by"]) ? $_REQUEST["by"] : "a";
	$byC	= ($by == "d") ? "a" : "d";

    $action = isset($_GET['action']) ? $_GET['action'] : "";



    session_start();

    $_POST['senha'] = ( isset($_POST['senha']) ) ? $_POST['senha'] : null;

    if($_POST['senha'] == $senhaAdmin)
    {
        $_SESSION['login'] = $_POST['senha'];
    }

    if((!isset ($_SESSION['login']) == true))
    {
    unset($_SESSION['login']);  
    header('location:login.php');
    } 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMIN - Agenda de Contatos</title>

    <!-- Bootstrap -->
    <link href="../assets/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-12">
                <h1><span class="glyphicon glyphicon-paperclip"></span> AGENDA DE CONTATOS - ADMINISTRAÇÃO</h1>
            </div>
            
        </div>
        
        
    
        <hr />
    
        <div class="row justify-content-md-center">
            <div class="col-md-2">
				<?php if (empty($action)){ ?>
                    <a href="index.php?action=add" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> NOVO CONTATO</a>
                <?php } ?>
			</div>
			<div class="col col-md-9">    
                
    
                <?php
                if($_REQUEST){
                    switch ($action){
                        case "add":
                            // adicionando
                            include ('xml-adicionar.php');
                            break;
                        case "del":
                            // apagando
                            include ('xml-deletar.php');
                            break;
                        case "edt":
                            // editando
                            include ('xml-editar.php');
                            break;
                        case "logout":
                            // saindo
                            include ('logout.php');
                            break;
                    }
                }
                ?>
            </div>
			<div class="col col-md-1">
                <a href="index.php?action=logout" class="btn btn-danger"><span class="glyphicon glyphicon-log-out"></span> SAIR</a> 
			</div>
    
          
    
        </div><!-- row -->
		
		
		<div class="row">

    
            <div class="col-md-12">
                <?php require 'xml-buscar-admin.php' ?>
            </div><!-- col-md-8 -->
    
        </div><!-- row -->
    
    </div><!-- container -->

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    
    <script src="../js/main.js" type="text/javascript"></script>
    <!-- MakedInput -->
    <script src="../js/jquery.maskedinput.min.js" type="text/javascript"></script>
    <!-- bootstrap -->
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(function () {
            $("#linkExcluir").click(function (e) {

                var $modal = $('#modalExclusao');
                parent = $(this).closest('tr');
                $modal.data("parent", parent);
                $modal.modal('show');

                $modal.find("#btnExcluir").on('click', function(){
                    var parent = $modal.data("parent");

                    $modal.modal('hide');

                    parent.fadeOut(400, function () {
                        parent.remove();
                    });
                    var href = $("#linkExcluir").attr("href");
                    window.location.href = href;
                });

                // prevenindo clique no link
                e.preventDefault();
            });
        });
    </script>

</body>
</html>
