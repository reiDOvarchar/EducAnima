var desenhoList = [];
$(document).ready(function () {
   
    $(document).on("click", "#btn-cadastrar-desenho", function () {
        if ($("#id_desenho_edit").val()) {
            updateDesenho();
        } else {
            insertDesenho();
        }
    });

    $(document).on("click", "#btn-excluir", function () {
        var id = $(this).attr("data-id");
        deleteDesenho(id);
    });

    $(document).on("click", "#btn-atualizar", function () {
        var id = $(this).attr("data-id");
        prepareUpdate(id);
    });

    // $(document).on("click", "#btn-edit-desenho", function () {
    //     updateDesenho();
    // });

    initializeSelectize();

    mostrarTudo();
});

function insertDesenho() {
    var item = $("#form-desenho").serialize();

    $.ajax({
        url: `/Projeto/controller/functionHandler.php`,
        type: "POST",
        data: {action: 'insertDesenho', item: item},
        dataType: "json",
        complete: function (r) {
            if (r.status == 200) {
                insertCategoria();
                insertPlataforma();
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso',
                    text: r.responseText,
                }).then((result) => {
                    location.reload();
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro!',
                    text: r.responseText,
                })
            }
        },
    });
}

function insertCategoria() {
    var item = $('#categoria').val(); 
    
    $.ajax({
        url: `/Projeto/controller/functionHandler.php`,
        type: "POST",
        data: {action: 'insertCategoria', item: item},
        dataType: "json",
        complete: function (r) {
            if (r.status != 200) {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro!',
                    text: r.responseText,
                })
            }
        },
    });
}

function updateCategoria() {
    var item = [];

    item["categoria"] = $('#categoria').val(); 
    item["id_desenho_edit"] = "";
    if ($("#id_desenho_edit").val()) {
        item["id_desenho_edit"] = $("#id_desenho_edit").val();
    }
    
    $.ajax({
        url: `/Projeto/controller/functionHandler.php`,
        type: "POST",
        data: {action: 'updateCategoria', item: item["categoria"], id: item["id_desenho_edit"]},
        dataType: "json",
        complete: function (r) {
            if (r.status != 200) {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro!',
                    text: r.responseText,
                })
            }
        },
    });
}

function insertPlataforma() {
    var item = [];

    item["plataforma"] = $('#plataforma').val(); 
    if ($("#id_desenho_edit").val()) {
        item["id_desenho_edit"] = $("#id_desenho_edit").val();
    }

    $.ajax({
        url: `/Projeto/controller/functionHandler.php`,
        type: "POST",
        data: {action: 'insertPlataforma', item: item},
        dataType: "json",
        complete: function (r) {
            if (r.status != 200) {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro!',
                    text: r.responseText,
                })
            }
        },
    });
}

function updatePlataforma() {
    var item = [];

    item["plataforma"] = $('#plataforma').val();
    item["id_desenho_edit"] = ""; 
    if ($("#id_desenho_edit").val()) {
        item["id_desenho_edit"] = $("#id_desenho_edit").val();
    }

    $.ajax({
        url: `/Projeto/controller/functionHandler.php`,
        type: "POST",
        data: {action: 'updatePlataforma', item: item["plataforma"], id: item["id_desenho_edit"]},
        dataType: "json",
        complete: function (r) {
            if (r.status != 200) {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro!',
                    text: r.responseText,
                })
            }
        },
    });
}

function deleteDesenho(id) {
    $.ajax({
        url: `/Projeto/controller/functionHandler.php`,
        type: "POST",
        data: {action: 'deleteDesenho', item: id},
        dataType: "json",
        complete: function (r) {
            if (r.status == 200) {
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso',
                    text: r.responseText,
                }).then((result) => {
                    location.reload();
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro!',
                    text: r.responseText,
                })
            }
        },
    });
}

function prepareUpdate(id) {
    var desenhoEdit;
    var desenho;
    var plataformas;
    var categorias;

    for (var i in desenhoList) {
        if (desenhoList[i].id == id) {
            desenhoEdit = desenhoList[i];
        }
    }

    if (desenhoEdit.id) {
        $.ajax({
            url: `/Projeto/controller/functionHandler.php`,
            type: "POST",
            data: {action: 'getPlataformasAndCategorias', item: desenhoEdit.id},
            dataType: "json",
            complete: function (r) {
                console.log(r.responseJSON);

                desenho = r.responseJSON["desenho"];
                plataformas = r.responseJSON["plataformas"];
                categorias = r.responseJSON["categorias"];

                $("#id_desenho_edit").val(desenho[0].id);
                $("#nomeDesenho").val(desenho[0].nome);
                $("#quatidadeEp").val(desenho[0].qtd_episodios);
                $("#duracaoMedia").val(desenho[0].tempo_medio);
                $("#classificacaoEtaria").val(desenho[0].classificacao_indicativa);
                $("#anoLancamento").val(desenho[0].ano_lancamento);
                $("#quantidadeTemporadas").val(desenho[0].qtd_temp);
                $("#nomeCriador").val(desenho[0].criador_desenho);
                $("#sinopse").val(desenho[0].sinopse);

                var arr1 = [];
                for (var i in categorias) {
                    arr1[i] = categorias[i].id;
                }

                $("#categoria")[0].selectize.setValue(arr1);
                $("#imagemURL").val(desenho[0].imagem);
                $("#videoURL").val(desenho[0].video_trailer);

                var arr2 = [];
                for (var i in plataformas) {
                    arr2[i] = plataformas[i].id;
                }

                $("#plataforma")[0].selectize.setValue(arr2);
            },
        });
    }
}

function updateDesenho() {
    var item = $("#form-desenho").serialize();
    
    $.ajax({
        url: `/Projeto/controller/functionHandler.php`,
        type: "POST",
        data: {action: 'updateDesenho', item: item},
        dataType: "json",
        complete: function (r) {
            if (r.status == 200) {
                deletePlataformaANdDesenho();
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso',
                    text: r.responseText,
                }).then((result) => {
                    location.reload();
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro!',
                    text: r.responseText,
                })
            }
        },
    });
}

function deletePlataformaANdDesenho() {
    var id = $('#id_desenho_edit').val(); 

    $.ajax({
        url: `/Projeto/controller/functionHandler.php`,
        type: "POST",
        data: {action: 'deletePlataformaANdDesenho', item: id},
        dataType: "json",
        complete: function (r) {
            if (r.status == 200) {
                updateCategoria();
                updatePlataforma();
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso',
                    text: r.responseText,
                }).then((result) => {
                    location.reload();
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro!',
                    text: r.responseText,
                })
            }
        },
    });
}

function mostrarTudo(){
    $.ajax({
        url: `/Projeto/controller/functionHandler.php`,
        type: "POST",
        data: {action: 'mostrarTudo'},
        dataType: "json",
        complete: function (r) {
            if (r.status == 200) {
                var html = ``;
                console.log(r)
                if (r.responseJSON.length > 0) {
                    desenhoList = r.responseJSON;
                    html += `<table>`;
                    html += `   <thead>`
                    html += `   <tr>`;
                    html += `       <th>ID</th>`;
                    html += `       <th>Nome</th>`;
                    html += `       <th>Ano lançamento</th>`;
                    html += `       <th>Temporadas</th>`;
                    html += `       <th>Criador</th>`;
                    html += `       <th>Episódios</th>`;
                    html += `       <th>Duração</th>`;
                    html += `       <th>Classificação</th>`;
                    html += `       <th>Ações</th>`;
                    html += `   </tr>`;
                    html += `   </thead>`;
                    html += `   <tbody>`;
                    for (var i in r.responseJSON) {
                        const elem = r.responseJSON[i];

                        
                        html += `<tr>`;
                        html += `   <td>${elem.id}</td>`;
                        html += `   <td>${elem.nome}</td>`;
                        html += `   <td>${elem.ano_lancamento}</td>`;
                        html += `   <td>${elem.qtd_temp}</td>`;
                        html += `   <td>${elem.criador_desenho}</td>`;
                        html += `   <td>${elem.qtd_episodios}</td>`;
                        html += `   <td>${elem.tempo_medio}</td>`;
                        html += `   <td>${elem.classificacao_indicativa}</td>`;
                        html += `   <td><button data-id="${elem.id}" class="botao-atualizar-excluir" id="btn-excluir"><img src="img/excluir.png" alt=""></button>
                        <button data-id="${elem.id}" class="botao-atualizar-excluir" id="btn-atualizar"><img src="img/botao-editar.png" alt=""></button></td>`;
                        html += `</tr>`;
                    }
                    html += `   </tbody>`;
                    html += `</table>`
                } else {
                    
                }
                
                $("#table-result").html(html);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro!',
                    text: r.responseText,
                })
            }
        },
    });
}

function initializeSelectize() {
    $("#plataforma").selectize();
    $("#categoria").selectize({ maxItems: 4 });
}