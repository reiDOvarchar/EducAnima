<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../view/css/home.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
    <script defer src="../view/js/home.js"></script>
    <script defer src="../view/js/historico.js"></script>
    <title>Home</title>

    <script> 
        $(function(){
            $("#includeHeader").load("header.php"); 
        });
    </script>
</head>
<body>
    <div id="includeHeader"></div>
    <div class="container-meio">
        
        <div class="div-input-meio">
            <div class="container-meio-img">
                <img src = "img/logoazul.png" alt = "Logo" class="logo-meio">
            </div>
            <div class="div-botao-input">
                <input type="text" id="search-bar" name="search-bar" class="input-meio" placeholder="Pesquise aqui..">
                <img src="img/lupa.png" id="btn-search" class="botao-pesquisa">
            </div>
            
        </div>
        
    </div>

    <div id="desenhos-result">
        <div class="div-mensagem">
            <p><b>Bem vindo ao site EducAnima!</b></p>
            <p>Na barra de pesquisa acima, você pode pesquisar pelas animações utlizando o nome do desenho ou suas categorias</p>
            <p></p>
        </div>
    </div>
</html>