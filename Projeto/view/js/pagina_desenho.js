$(document).ready(function () {
    
   
    $(document).on("click", "#btn-trailer", function () {
        $("#trailer").css("z-index", "1000");
        $("#trailer").css("opacity", "100%");
    });

    $(document).on("click", "#btn-imagem", function () {
        $("#trailer").css("z-index", "0");
        $("#trailer").css("opacity", "0");
    });

   

    teste();
});


function teste() {
    const searchParams = new URLSearchParams(window.location.search);
    
    let id = searchParams.get('id');
    desenho(id);
}

function desenho(id) {
    $.ajax({
        url: `/Projeto/controller/functionHandler.php`,
        type: "POST",
        data: {action: 'desenho', item: id},
        dataType: "json",
        complete: function (r) {
            if (r.status == 200) {
                var html = ``;
                console.log(r.responseJSON);

                if (r.responseJSON) {
                    var desenho = r.responseJSON["desenho"][0];
                    var categorias = r.responseJSON["categorias"];
                    var plataformas = r.responseJSON["plataformas"];

                    html += `<div class="div-informacoes">`;
                    html += `   <div class="div-titulo">`;
                    html += `       <p class="titulo">${desenho.nome}</p>`      ;
                    html += `   </div> `;
                    html += `   <div class="div-categorias">`;

                    for (var i in categorias) {
                        if (categorias[i].cor == "Laranja") {
                            categorias[i].cor = "orange"
                        } else if (categorias[i].cor == "Verde") {
                            categorias[i].cor = "green"
                        } else if (categorias[i].cor == "Vermelho") {
                            categorias[i].cor = "red"
                        } else if (categorias[i].cor == "Azul") {
                            categorias[i].cor = "blue"
                        }

                        html += `<li style="color: ${categorias[i].cor}">${categorias[i].nome}</li>`
                        html += `<li> / </li>`;
                    }

                    html += `   </div>`;
                    html += `   <div class="div-sinopse">`;
                    html += `       <label for="div-sinopse">Sinopse:</label>`;
                    html += `       <p>${desenho.sinopse}</p>`;
                    html += `   </div>`;
                    html += `   <div class="div-streamings">`;
                    html += `       <p>Disponível em:</p>`;
                    html += `       <div class="div-streamings-imagens">`;

                    for (var i in plataformas) {
                        html += `<div class="div-streamings-imagens-apoio">`;
                        html += `   <img src="${plataformas[i].imagem}" alt=""><br>`;
                        html += `   <label for="div-streamings-imagens">${plataformas[i].nome}</label>`;
                        html += `</div>`;
                    }

                    html += `       </div>`;
                    html += `   </div>`;
                    html += `   <div class="div-info-desenho div-sub">`;
                    html += `       <ul>`;
                    html += `           <h5>Informações sobre a animação:</h5>`;
                    html += `           <li>Ano lançamento:`;
                    html += `               <p>${desenho.ano_lancamento}</p>`;
                    html += `           </li>`;
                    html += `           <br>`;
                    html += `           <hr class="linha-divisoria">`;
                    html += `           <li>Quantidade de episódios:`;
                    html += `               <p>${desenho.qtd_episodios}</p>`;
                    html += `           </li>`;
                    html += `           <br>`;
                    html += `           <hr class="linha-divisoria">`;
                    html += `           <li>Quantidade de temporadas:`;
                    html += `               <p>${desenho.qtd_temp}</p>`;
                    html += `           </li>`;
                    html += `           <br>`;
                    html += `           <hr class="linha-divisoria">`;
                    html += `           <li>Classificação etária:`;
                    html += `               <p>${desenho.classificacao_indicativa}</p>`;
                    html += `           </li>`;
                    html += `           <br>`;
                    html += `           <hr class="linha-divisoria">`;
                    html += `           <li>Criado por:`;
                    html += `               <p>${desenho.criador_desenho}</p>`;
                    html += `           </li>`;
                    html += `           <br>`;
                    html += `           <hr class="linha-divisoria">`;
                    html += `       </ul>`;
                    html += `   </div>`;
                    html += `</div>`;
                    html += `</div> `;
                    html += `<div class="div-desenho">`;
                    html += `   <div class="div-imagem">`;
                    html += `       <div class="div-imagem-trailer">`;
                    html += `           <div class="div-botoes">`;
                    html += `               <button class="opcao-imagem" id="btn-imagem">Imagem</button>`;
                    html += `               <button class="opcao-trailer" id="btn-trailer">Trailer</button>`;
                    html += `           </div>`;
                    html += `           <iframe width="1863" height="801" src="${desenho.video_trailer}" title="${desenho.nome}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen class="trailer-desenho" id="trailer"></iframe>`;
                    html += `           <img src="${desenho.imagem}" alt="Imagem temporária" class="imagem-desenho" id="imagem"> `;
                    html += `           <img src="img/favorito_vermelho.png" data-id="${desenho.id}" alt="" id="fav-icon" class="icon-favorito-vermelho btn-fav">`;
                    html += `           <img src="img/favorito.png" alt="" data-id="${desenho.id}" class="icon-favorito btn-fav btn-desfav" >`;
                    html += `       </div>`;
                    html += `       <div id="div-result-estrelas">`;
                    html += `       </div>`;
                    html += `   </div>`;
                    html += `</div>`;
                    html += `<div class="div-info-desenho">`;
                    html += `   <ul>`;
                    html += `        <li>Ano lançamento:`;
                    html += `           <p>${desenho.ano_lancamento}</p>`;
                    html += `       </li>`;
                    html += `       <br>`;
                    html += `       <hr class="linha-divisoria">`;
                    html += `       <li>Quantidade de episódios:`;
                    html += `           <p>${desenho.qtd_episodios}</p>`;
                    html += `       </li>`;
                    html += `       <br>`;
                    html += `       <hr class="linha-divisoria">`;
                    html += `       <li>Quantidade de temporadas:`;
                    html += `           <p>${desenho.qtd_temp}</p>`;
                    html += `       </li>`;
                    html += `       <br>`;
                    html += `       <hr class="linha-divisoria">`;
                    html += `       <li>Tempo médio por episódio:`;
                    html += `           <p>${desenho.tempo_medio}</p>`;
                    html += `       </li>`;
                    html += `       <br>`;
                    html += `       <hr class="linha-divisoria">`;
                    html += `       <li>Classificação etária:`;
                    html += `           <p>${desenho.classificacao_indicativa}</p>`;
                    html += `       </li>`;
                    html += `       <br>`;
                    html += `       <hr class="linha-divisoria">`;
                    html += `       <li>Criado por:`;
                    html += `           <p>${desenho.criador_desenho}</p>`;
                    html += `       </li>`;
                    html += `       <br>`;
                    html += `       <hr class="linha-divisoria">`;
                    html += `    </ul>`;
                    html += `</div>`;
                } else {
                    
                }
                
                $("#desenho-screen").html(html);
                if (desenho.video_trailer == 0) {
                    $('#btn-trailer').prop('disabled', true);
                }
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro!',
                    text: r.responseText,
                })
            }
        },
    })
}