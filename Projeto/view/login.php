<?php

    include "cadastroController.class.php";

    if(isset($_POST['email'])) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql_code = "SELECT * FROM senha WHERE email = '$email'";
    $sql_exec = $mysql->query($sql_code) or die ($mysql->error);
    
    $usuario = $sql_exec->fetch_assoc();
    if (passord_verify($senha, $usuario['senha'])) {
        echo "Logado";
    } else {
        echo "Sem sucesso no login";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../view/css/login.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script defer src="../view/js/login.js"></script>
    <title>Login</title>

    <script> 
        $(function(){
            $("#includeHeader").load("header.php"); 
        });
    </script>
</head>
<body>
    <div id="includeHeader"></div>
    <div class="vertical"></div>
    <div class="container-login">
        <div class="card login-container">
            <div class="card-header text-center">
                Login
            </div>
            <div class="card-body">
                <form action="">
                    <div class="row g-2">
                        <div class="col-12">
                            <label for="">E-mail</label>
                            <input type="text" class="form-control mt-2">
                        </div>
                        <div class="col-12">
                            <label for="">Senha</label>
                            <input type="password" class="form-control mt-2">
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer p-3 text-center">
                <button type="button" class="btn btn-lg btn-login">
                    Entrar
                </button>
            </div>
        </div>
    </div>
    <div class="container-img">
        <img src="img/logoazul.png" alt="educanima">
    </div>
</body>
</html>