$(document).ready(function () {
    $(document).on("click", ".btn-fav", function () {
        var id = $(this).attr("data-id");
        
        $(".btn-fav").css("z-index", "1000");
        $(".btn-fav").css("cursor", "pointer");
        $(".btn-fav").hover(function(){
            $(".btn-desfav").css("z-index", "1000");
        })
        favoritar(id);
    })
    displayFavoritos();
    

    $(document).on("click", "#btn-desfavoritar", function () {
        var id = $(this).attr("data-id");
        desfavoritar(id);
    });

    $(document).on("click", ".imagem-desenho", function () {
        id = $(this).attr("data-id");
        window.location.href = "../view/desenho.php?id="+id;
    });
});

function favoritar(id) {
    $.ajax({
        url: `/Projeto/controller/functionHandler.php`,
        type: "POST",
        data: {action: 'insertFavorito', item: id},
        dataType: "json",
        complete: function (r) {
            if (r.status == 200) {
                var html = '';
            }
            if (r.status == 200) {
                
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso',
                    text: 'Enviado aos favoritos',
                    timer: 3000
                })
                setTimeout(() => {
                    window.location.reload(true);
                 }, 2200);
                
            } else if(r.status == 500){
                Swal.fire({
                    icon: 'error',
                    title: 'Erro!',
                    text: r.responseText,
                })
            } else {
                desfavoritar(id);
                Swal.fire({
                    icon: 'error',
                    title: 'Erro!',
                    text: r.responseText,
                })
            }
        }
    })
}

function displayFavoritos() {
    $.ajax({
        url: `/Projeto/controller/functionHandler.php`,
        type: "POST",
        data: {action: 'displayFavoritos'},
        dataType: "json",
        complete: function (r) {
            if (r.status == 200) {
                var html = '';
                console.log(r)
                if (r.responseJSON.length > 0) {
                    var cont = 0;
                    var first = true;
                    for (var i in r.responseJSON) {
                        const elem = r.responseJSON[i];

                        if (cont == 3) {
                            html += `</div>`;
                            cont == 0;
                        }
                        if (cont == 3 || first) {
                            html += `<div class="div-lista-desenhos">`;
                            first = false;
                        }

                        html += `<div class="div-desenho">`;
                        html += `    <img src="img/favorito_vermelho.png" alt="" class="icon-favorito">`
                        html += `    <img src="img/favorito.png" alt="" class="icon-favorito-vazio" id="btn-desfavoritar" data-id="${elem.id}">`
                        html += `   <img src="${elem.imagem}" class="imagem-desenho" data-id="${elem.id}">`;
                        html += `   <p class="nome-desenho">${elem.nome}</p>`;
                        html += `</div>`;

                        cont++;
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

function desfavoritar(id){
    $.ajax({
        url: `/Projeto/controller/functionHandler.php`,
        type: "POST",
        data: {action: 'deleteFavoritos', item: id},
        dataType: "json",
        complete: function (r) {
            if (r.status == 200) {
                
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso',
                    text: 'Retirado dos favoritos',
                    timer: 3000
                })
                setTimeout(() => {
                    window.location.reload(true);
                 }, 2200);
                
                } else {
                console.log(r.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Erro!',
                    text: r.responseText,
                })
            }

        }
    })
}