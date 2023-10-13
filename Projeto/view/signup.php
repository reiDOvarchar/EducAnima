<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../view/css/signup.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script defer src="../view/js/signup.js"></script>
    <title>Sign Up</title>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script src="https://unpkg.com/jwt-decode/build/jwt-decode.js"></script>
    <script> 
        $(function(){
            $("#includeHeader").load("header.php"); 
        });
    </script>
</head>
<body>
<div id="includeHeader"></div>
    <div class="vertical"></div>

    <div class="container-sign">
        <div class="card sign-container">
            <div class="card-header text-center">
                Cadastro
            </div>
            <div class="card-body">
                <form action="">
                    <div class="row g-2 align-items-center">
                        <div class="col-12">
                            <label for="">Nome</label>
                            <input type="text" class="form-control mt-2">
                        </div>
                        <div class="col-12">
                            <label for="">E-mail</label>
                            <input type="text" class="form-control mt-2">
                        </div>
                        <div class="col-12">
                            <label for="">Senha</label>
                            <input type="password" class="form-control mt-2">
                        </div>
                        <div class="col-6">
                            <label for="">Data de Nascimento</label>
                            <input type="date" class="form-control mt-2">
                        </div>
                        <div class="col-6">
                            <label for="form-professor">Professor</label>
                            <select name="" id="form-professor" class="form-control mt-2">
                                <option value="nao">Não</option>
                                <option value="sim">Sim</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="form-ensino">Ensino</label>
                            <select name="" id="form-ensino" class="form-control mt-2" disabled>
                                <option value=""></option>
                                <option value="Infantil">Infantil</option>
                                <option value="Fundamental">Fundamental</option>
                                <option value="Médio">Médio</option>
                                <option value="Técnico">Técnico</option>
                                <option value="Graduação">Graduação</option>
                                <option value="Pós-Graduação">Pós-Graduação</option>
                                <option value="Mestrado">Mestrado</option>
                                <option value="Doutorado">Doutorado</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="form-formacao">Formação</label>
                            <input type="text" id="form-formacao" class="form-control mt-2" disabled>
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <div class="mt-1" id="buttonDiv"></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer p-3 text-center">
                <button type="button" class="btn btn-lg btn-sign">
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