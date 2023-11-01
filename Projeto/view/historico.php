<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../view/css/historico.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script defer src="../view/js/historico.js"></script>
    <title>Document</title>

    <script> 
        $(function(){
            $("#includeHeader").load("header.php"); 
        });
    </script>
</head>
<body>
    <div id="includeHeader"></div>
    <p class="p-resultados">Resultados:</p>
    <div class="pesquisa-historico">
        <div class="div-input">
           <input type="text" class="pesquisa-input" placeholder="Pesquisar"> 
        </div>
        <input type="button" value="Limpar Histórico" class="limpar-historico">
    </div>
    <div class="container-lista">
        <div class="historico-desenho">
            <img src="img/141a2aa76f5ac4e3.png" class="desenho">
            <img src="img/circulo.png" alt="" class="excluir">
            <div class="informacoes-historico">
                <p class="titulo-desenho">Boku no Pico</p><br>
                <p class="dia-acesso">Último acesso em: Domingo</p><br>
                <p class="data_acesso">Outubro 11, 2023</p>
            </div>
        </div>
        <div class="historico-desenho">
            <img src="img/e94423aa77f7f3f4ebd67ce36ab276ec.png" class="desenho">
            <img src="img/circulo.png" alt="" class="excluir">
            <div class="informacoes-historico">
                <p class="titulo-desenho">Yosuga no sora</p><br>
                <p class="dia-acesso">Último acesso em: Sábado</p><br>
                <p class="data_acesso">Outubro 7, 2023</p>
            </div>
        </div>
        <div class="historico-desenho">
            <img src="img/Kaifuku-Jutsushi-no-Yarinaoshi-vai-ser-anime-2-e1610565157336.png" class="desenho">
            <img src="img/circulo.png" alt="" class="excluir">
            <div class="informacoes-historico">
                <p class="titulo-desenho">Kaifuku Jutsushi no Yarinaoshi</p><br>
                <p class="dia-acesso">Último acesso em: Sábado</p><br>
                <p class="data_acesso">Outubro 7, 2023</p>
            </div>
        </div>
    </div>
    
</body>
</html>