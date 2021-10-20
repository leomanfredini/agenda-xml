<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Login</title>
<link href="../assets/bootstrap.min.css" rel="stylesheet">

<style>
.login-form {
    width: 340px;
    margin: 50px auto;
  	font-size: 15px;
}
.login-form form {
    margin-bottom: 15px;
    background: #e8e8e8;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.login-form h2 {
    margin: 0 0 15px;
}
.form-control, .btn {
    min-height: 38px;
    border-radius: 2px;
}
.btn {        
    font-size: 15px;
    font-weight: bold;
}
</style>
</head>

<body>
<div class="login-form">
    <form action="index.php" method="post">
        <h2 class="text-center"><span class="glyphicon glyphicon-log-in"></span></h2> 
        <div class="form-group">
            <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </div>               
    </form>    
    <p class="text-center"><a href="../index.php">Acessar Área de Usuário</a></p>
</div>
</body>
</html>