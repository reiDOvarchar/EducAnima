<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/selectize@0.12.6/dist/css/selectize.min.css">
    <link rel="stylesheet" type="text/css" href="../view/css/cadastroDesenhos.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/selectize@0.12.6/dist/js/standalone/selectize.min.js"></script>
    <script defer src="../view/js/desenho.js"></script>
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
                <form id="form-desenho">
                    <div class="container-inputs">
                        <label for="ip1" class="label1">Nome:</label>
                        <input type="text"  name="nomeDesenho" class="input-cadastro ip1">
                        <div class="div-direita">
                            <label for="ip3" class="label3">Quantidade de epidódios:</label>
                            <input type="number"  name="quatidadeEp" class="input-cadastro ip3">
                            <label for="ip5" class="label5">Duração média dos episódios:</label>
                            <input type="number" name="duracaoMedia" class="input-cadastro ip5">
                            <label for="" class="label7">Classficação etária:</label>
                            <select name="classificacao" id="" class="clas-et">
                                <option value=""></option>
                                <option value="Livre">Livre</option>
                                <option value="10">10 anos</option>
                                <option value="12">12 anos</option>
                                <option value="14">14 anos</option>
                                <option value="16">16 anos</option>
                                <option value="18">18 anos</option>
                            </select>
                        </div>
                        <div class="div-esquerda">
                            <label for="ip2" class="label2">Ano de lançamento:</label>
                            <input type="number" name="lancamento" id="" class="input-cadastro ip2">
                            <label for="ip4" class="label4">Quantidade de temporadas:</label>
                            <input type="number" name="quantidadeTemporadas" class="input-cadastro ip4">
                            <label for="ip6" class="label6">Criador da animação:</label>
                            <input type="text" name="nomeCriador" class="input-cadastro ip6">
                        </div>
                        <div>
                            <label for="">Sinopse da animação:</label><br>
                            <textarea name="sinopse" id="sinopse" rows="5" class="text-area" style="resize: none"></textarea>
                            <label for="">Categorias:</label>
                            <select name="categoria" id="categoria" class="clas-et-categorias" multiple>
                                <option value=""></option>
                                <option value="Londrina">Londrina</option>
                                <option value="Cambé">Cambé</option>
                                <option value="Jataizinho">Jataizinho</option>
                                <option value="Arapongas">Arapongas</option>
                                <option value="Assaí">Assaí</option>
                                <option value="Apucarana">Apucarana</option>
                                <option value="Rolândia">Rolândia</option>
                                <option value="Cornélio Procópio">Cornélio Procópio</option>
                                <option value="Santa Mariana">Santa Mariana</option>
                                <option value="Tamarana">Tamarana</option>
                            </select>
                            <div class="div-imagem">
                                <label for="">URL da imagem:</label>
                                <textarea name="imagemURL" id="imagemURL" cols="30" rows="3" class="textarea-imagem"></textarea>
                            </div>
                            <div class="div-trailer-stream">
                                <div class="div-trailer">
                                    <label for="">URL do trailer:</label><br>
                                    <input type="text" class="input-video" name="videoURL" id="videoURL"> 
                                </div>
                                <div class="div-stream">
                                    <label for="">Plataformas de streaming</label><br>
                                    <select name="plataforma" id="plataforma" class="clas-et-stream" multiple>
                                        <option value=""></option>
                                        <option value="sbt">sbt</option>
                                        <option value="record">record</option>
                                        <option value="globo">globo</option>
                                        <option value="band">band</option>
                                        <option value="rede tv">rede tv</option>
                                    </select>
                                </div>
                            </div>
                                
                        </div>
                    </div>
                </form>
            <div class="container-footer">
                <input type="button" id="btn-cadastrar-desenho" value="Enviar" class="botao-envio">
            </div>
        </div>
    </div>
</body>
</html>