<?php
    include "cadastroController.class.php";

    if(isset($_POST['email'])) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST[]'senha'], PASSWORD_DEFAULT);

     $mysqli->query("INSERT INTO usuario (nome, email, senha) VALUES ('$nome', '$email', '$senha')")
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
    <title>Document</title>

    <title></title>

    <script> 
        $(function(){
            $("#includeHeader").load("header.php"); 
        });
    </script>
</head>
<body>
    <div id="includeHeader"></div>

    </form action = "realizar_cadastro" method = "post">
        <label for="nome">Digite seu nome:</label>
        <input type = "text" id = "nome" name = "nome">

        <label for =" e-mail">Digite seu e-mail:</label>
        <input type = "text" id = "e-mail" name = "e-mail">

        <label for = "senha">Digite sua senha:</label>
        <input type ="password" id = "senha" name = "senha">

        <label for = "confirma_senha">Confirme sua senha:</label>
        <input type = "password" id = "confirma_senha" name = "confirma_senha">

        <button type = "cadastrar">Cadastrar</button>
    </form>
</body>
</html>