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
                        <input type="hidden" id="id_desenho_edit" name="id_desenho_edit">
                        <label for="ip1" class="label1">Nome:</label>
                        <input type="text" id="nomeDesenho"  name="nomeDesenho" class="input-cadastro ip1">
                        <div class="div-direita">
                            <label for="ip3" class="label3">Quantidade de epidódios:</label>
                            <input type="number" id="quatidadeEp" name="quatidadeEp" class="input-cadastro ip3">
                            <label for="ip5" class="label5">Duração média dos episódios:</label>
                            <input type="number" id="duracaoMedia" name="duracaoMedia" class="input-cadastro ip5">
                            <label for="" class="label7">Classficação etária:</label>
                            <select name="classificacao" id="classificacaoEtaria" class="clas-et">
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
                            <input type="number" name="lancamento" id="anoLancamento" class="input-cadastro ip2">
                            <label for="ip4" class="label4">Quantidade de temporadas:</label>
                            <input type="number" id="quantidadeTemporadas" name="quantidadeTemporadas" class="input-cadastro ip4" id="quantidadeTemporadas">
                            <label for="ip6" class="label6">Criador da animação:</label>
                            <input type="text" name="nomeCriador" class="input-cadastro ip6" id="nomeCriador">
                        </div>
                        <div>
                            <label for="">Sinopse da animação:</label><br>
                            <textarea name="sinopse" id="sinopse" rows="5" class="text-area" style="resize: none"></textarea>
                            <label for="">Categorias:</label>
                            <select name="categoria" id="categoria" class="clas-et-categorias" multiple>
                                <option value=""></option>
                                <option value="1">Aventura</option>
                                <option value="2">Drama</option>
                                <option value="3">Suspense</option>
                                <option value="4">Literatura</option>
                                <option value="5">Biologia</option>
                                <option value="6">Química</option>
                                <option value="7">Física</option>
                                <option value="8">Matemática</option>
                                <option value="9">Letras</option>
                                <option value="10">Infantil</option>
                                <option value="11">Línguas Estrangeiras</option>
                                <option value="12">Fantasia</option>
                                <option value="13">Artes</option>
                                <option value="14">História</option>
                                <option value="15">Geografia</option>
                                <option value="16">Ciências</option>
                                <option value="17">Comédia</option>
                                <option value="18">Terror</option>
                                <option value="19">Ação</option>
                                <option value="20">Culinária</option>
                                <option value="21">Costura</option>
                                <option value="22">Programação</option>
                                <option value="23">Informática</option>
                                <option value="24">Engenharia</option>
                                <option value="25">Astronomia</option>
                                <option value="26">Educação Física</option>
                                <option value="27">Nutrição</option>
                                <option value="28">Filosofia</option>
                                <option value="29">Sociologia</option>
                                <option value="30">Psicologia</option>
                                <option value="31">Economia</option>
                                <option value="32">Ecologia</option>
                                <option value="33">Dança</option>
                                <option value="34">Música</option>
                                <option value="35">Design</option>
                                <option value="36">Jornalismo</option>
                                <option value="37">Arquitetura</option>
                                <option value="38">Publicidade</option>
                                <option value="39">Religião</option>
                                <option value="40">Amizade</option>
                                <option value="41">Companheirismo</option>
                                <option value="42">Altruísmo</option>
                                <option value="43">Amor</option>
                                <option value="44">Solidariedade</option>
                                <option value="45">Ética</option>
                                <option value="46">LGBTQIA+</option>
                                <option value="47">Ficção Ciêntifica</option>
                                <option value="48">Romance</option>
                                <option value="49">Documentário</option>
                                <option value="50">Vida Cotidiana</option>
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
                                        <option value="1">Netflix</option>
                                        <option value="2">Amazon Prime Video</option>
                                        <option value="3">HBO Max</option>
                                        <option value="4">Star+</option>
                                        <option value="5">Globoplay</option>
                                        <option value="6">Disney+</option>
                                        <option value="7">Paramount+</option>
                                        <option value="8">Apple TV+</option>
                                        <option value="9">Mercado Play</option>
                                        <option value="10">Discovery+</option>
                                        <option value="11">Hulu</option>
                                        <option value="12">TeleCine play</option>
                                        <option value="13">Youtube</option>
                                        <option value="14">Outros</option>
                                        <option value="15">Claro TV+</option>
                                        <option value="16">Não Possui (Websites)</option>
                                        <option value="17">Crunchyroll</option>
                                        <option value="18">Funimation</option>
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
    <div>
        <div id="table-result">
            
        </div>
    </div>
</body>
</html>