<?php
    include_once "../model/vo/cadastroVO.class.php";
    session_start();
    if(!empty($_SESSION["id"])){
        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../view/css/header.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script defer src="../view/js/header.js"></script>
    <title>Document</title>
</head>
<body>
    <header>   
        <nav class="navbar navbar-expand-lg navbar-light">
            
            <div class="container-fluid nav-color">
                <?php if(!empty($_SESSION)){ ?>
                    <div class="div-usuario">
                        <div class="div-nome-imagem-usuario">
                            <?php echo "<p class=\"nome-usuario\">".$_SESSION["nome"]."</p>"; ?> 
                            <img class="imagem-usuario" src="img/imagem-do-usuario-com-fundo-preto.png" alt="">
                            <img class="imagem-usuario" id="pictureUser" src="" alt="">
                        </div>
                    </div>
                <?php } ?>
                    <a class="navbar-brand" style="z-index: 3" href="home.php">
                        <img src = "img/logoazul2.png" alt = "Logo" height="40px">
                    </a>
                    
                    
                
</head>
<body>


    <div class="container" style="left: 100%; width: auto" onclick="myFunction(this)" id=teste>
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
    </div>
    </div>   
        </nav>
        
        <div id="menu_teste">
            <ul id="menu" class="menu">
                <a href=""  style="margin-top: 50px"></a>
                <?php if(empty($_SESSION)){ ?>
                    <a href="login.php"><li>Login</li></a>
                    <hr>
                    <a href="signup.php"><li>Cadastro</li></a>
                    <hr>
                <?php } ?>
                <?php if (!empty($_SESSION)) { ?>
                    <a href="historico.php"><li>Histórico</li></a>
                    <hr>
                <?php } ?>
                <a href="ajuda.php"><li>Ajuda</li></a>
                <hr>
                <?php if(!empty($_SESSION["adm"])){ ?>
                   <a href="cadastro_desenho.php"><li>Cadastro de desenhos</li></a>
                   <hr>
                <?php } ?>
                <?php if (!empty($_SESSION)) { ?>
                    <a href="favoritos.php"><li>Favoritos</li></a>
                    <hr>
                <?php } ?>
                <?php if (!empty($_SESSION)) { ?>
                    <a href="logout.php"><li>Logout</li></a>
                    <hr>
                <?php } ?>
            </ul>
        </div>
    </header>
</body>
</html>