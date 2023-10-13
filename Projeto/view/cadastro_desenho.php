<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../view/css/cadastroDesenhos.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script defer src="../view/js/login.js"></script>
    <title>Document</title>
    <script> 
        $(function(){
            $("#includeHeader").load("header.php"); 
        });
    </script>
</head>
<body>
    <div id="includeHeader"></div>
    <div class="container-main">
        <div class="container-cadastro">
            <div class="container-header"><p>Cadastro de Animações</p></div>
                <div class="container-inputs">
                    <label for="ip1" class="label1">Nome:</label>
                    <input type="text" class="input-cadastro ip1">
                    <div class="div-direita">
                        <label for="ip3" class="label3">Quantidade de epidódios:</label>
                        <input type="number" class="input-cadastro ip3">
                        <label for="ip5" class="label5">Duração média dos episódios:</label>
                        <input type="number" class="input-cadastro ip5">
                        <label for="" class="label7">Classficação etária:</label>
                        <select name="" id="" class="clas-et">
                            <option value=""></option>
                            <option value="">Livre</option>
                            <option value="">10 anos</option>
                            <option value="">12 anos</option>
                            <option value="">14 anos</option>
                            <option value="">16 anos</option>
                            <option value="">18 anos</option>
                        </select>
                    </div>
                    <div class="div-esquerda">
                        <label for="ip2" class="label2">Ano de lançamento:</label>
                        <input type="number" name="" id="" class="input-cadastro ip2">
                         <label for="ip4" class="label4">Quantidade de temporadas:</label>
                        <input type="number" class="input-cadastro ip4">
                        <label for="ip6" class="label6">Criador da animação:</label>
                        <input type="text" class="input-cadastro ip6">
                    </div>
                    <label for="">Sinopse da animação:</label><br>
                    <textarea name="" id="" rows="5" class="text-area" style="resize: none"></textarea>
                </div>
            <div class="container-footer"></div>
        </div>
    </div>
</body>
</html>