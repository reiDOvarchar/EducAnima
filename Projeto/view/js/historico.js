$(document).ready(function () {
    $(document).on("click", "#add-historico", function () {
        var id = $(this).attr("");
        addHistorico(id);
    });
    $(document).on("click", ".div-desenho", function () {
        id = $(this).attr("data-id");
        addHistorico(id);
    });

    $(document).on("click", ".imagem-desenho", function () {
        id = $(this).attr("data-id");
        addHistorico(id);
    });

    $(document).on("click", "#limpar-item", function () {
        var id = $(this).attr("data-id");
        limparItem(id);

    });

    $(document).on("click", ".desenho", function () {
        id = $(this).attr("data-id");
        window.location.href = "../view/desenho.php?id="+id;
    });

    $(document).on("click", "#limpar-historico", function () {
        limparTudo();
    });

    var input = document.getElementById("pesquisar-historico");
    input.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("btn-lupa").click();
        }
    });

    $(document).on("click", "#btn-lupa", function () {
        pesquisarHistorico();
        $("#pesquisar-historico").val("");
    });

    if (window.location.href == "http://localhost:8080/Projeto/view/historico.php") {
        displayHistorico();
    }
});

function addHistorico(id) {
    $.ajax({
        url: `/Projeto/controller/functionHandler.php`,
        type: "POST",
        data: {action: 'insertHistorico', item: id},
        dataType: "json",
        complete: function (r) {
            if (r.status == 200) {
                var html = '';
            }
            
        }
    })
}

function limparItem(id) {
    $.ajax({
        url: `/Projeto/controller/functionHandler.php`,
        type: "POST",
        data: {action: 'deleteItemHistorico', item: id},
        dataType: "json",
        complete: function (r) {
            if (r.status == 200) {
                var html = '';

                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso',
                    text: 'Item excluído',
                    timer: 3000
                }); 
                setTimeout(() => {
                    window.location.reload(true);
                }, 2200);
            }
        }
    });
}

function pesquisarHistorico() {
    var pesquisaHistorico = $("#pesquisar-historico").val()
    $.ajax({

        url: `/Projeto/controller/functionHandler.php`,
        type: "POST",
        data: {action: 'pesquisarHistorico', item: pesquisaHistorico},
        dataType: "json",
        complete: function (r) {
            if (r.status == 200) {
                var html = '';
                console.log(r)
                if (r.responseJSON.length > 0) {
                    for (var i in r.responseJSON) {
                        const elem = r.responseJSON[i];
                        const meses = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"];
                            
                        let dateHoraAcesso = new Date(elem.data_hora_acesso);
                        let dataFormatada = ((meses[(dateHoraAcesso.getMonth())] + " " + dateHoraAcesso.getDate() + ", " + dateHoraAcesso.getFullYear()))
                        
                        html += `<div class="historico-desenho">`
                        html += `    <img src="${elem.imagem}" data-id="${elem.id}" class="desenho">`
                        html += `    <img data-id="${elem.historicoId}" id="limpar-item" src="img/circulo.png" alt="" class="excluir">`
                        html += `    <div class="informacoes-historico">`
                        html += `        <p class="titulo-desenho">${elem.nome}</p><br>`
                        html += `        <p class="dia-acesso">Último acesso em: ${dateHoraAcesso.toLocaleTimeString()}</p><br>`
                        html += `        <p class="data_acesso">${dataFormatada}</p>`
                        html += `    </div>`
                        html += `</div>`
                    }
                }else{

                }
                $("#desenhos-result").html(html);
            }
        }
    });
}

    function limparTudo() {
        $.ajax({
            url: `/Projeto/controller/functionHandler.php`,
            type: "POST",
            data: {action: 'deleteAllHistorico'},
            dataType: "json",
            complete: function (r) {
                if (r.status == 200) {
                    var html = '';
    
                    Swal.fire({
                        icon: 'success',
                        title: 'Sucesso',
                        text: 'Todos os itens foram excluídos',
                        timer: 3000
                    }); 
                    setTimeout(() => {
                        window.location.reload(true);
                    }, 2200);
                } else {
                    console.log(r.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro!',
                        text: r.responseText
                    });
                }
            }
        });
    }

    function displayHistorico() {
        $.ajax({
            url: `/Projeto/controller/functionHandler.php`,
            type: "POST",
            data: {action: 'displayHistorico'},
            dataType: "json",
            complete: function (r) {
                if (r.status == 200) {
                    var html = '';
                    console.log(r)
                    if (r.responseJSON.length > 0) {
                        for (var i in r.responseJSON) {
                            const elem = r.responseJSON[i];
                            const meses = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"];
                                
                            let dateHoraAcesso = new Date(elem.data_hora_acesso);
                            let dataFormatada = ((meses[(dateHoraAcesso.getMonth())] + " " + dateHoraAcesso.getDate() + ", " + dateHoraAcesso.getFullYear()))
                            
                            html += `<div class="historico-desenho">`
                            html += `    <img src="${elem.imagem}" data-id="${elem.id}" class="desenho">`
                            html += `    <img data-id="${elem.historicoId}" id="limpar-item" src="img/circulo.png" alt="" class="excluir">`
                            html += `    <div class="informacoes-historico">`
                            html += `        <p class="titulo-desenho">${elem.nome}</p><br>`
                            html += `        <p class="dia-acesso">Último acesso em: ${dateHoraAcesso.toLocaleTimeString()}</p><br>`
                            html += `        <p class="data_acesso">${dataFormatada}</p>`
                            html += `    </div>`
                            html += `</div>`
    
                            
                        }
                    }else{
    
                    }
                    $("#desenhos-result").html(html);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro!',
                        text: r.responseText,
                    })
                }
                
            }
        })
    }