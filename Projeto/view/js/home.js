$(document).ready(function () {
    $(document).on("click", ".menu", function () {
        $(this).toggleClass('open');
    })

    $(document).on("click", "#btn-search", function () {
        searchDesenho();
    });

    $(document).on("click", ".div-desenho", function () {
        id = $(this).attr("data-id");
        window.location.href = "../view/desenho.php?id="+id;
    });

    var input = document.getElementById("search-bar");
    input.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("btn-search").click();
        }
    });
});

function searchDesenho() {
    var searchBarText = $("#search-bar").val();
    
    $.ajax({
        url: `/Projeto/controller/functionHandler.php`,
        type: "POST",
        data: {action: 'searchDesenho', item: searchBarText},
        dataType: "json",
        complete: function (r) {
            if (r.status == 200) {
                var html = ``;
                console.log(r);
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

                        html += `<div data-id="${elem.id}" class="div-desenho">`;
                        html += `   <img src="${elem.imagem}" class="imagem-desenho">`;
                        html += `   <p class="nome-desenho">${elem.nome}</p>`;
                        html += `</div>`;

                        cont++;
                    }
                } else {
                    
                }
                
                $("#desenhos-result").html(html);
                $('.div-lista-desenhos').css({opacity: 0, display: 'flex'}).animate({
                    opacity: 1,
                }, 1000);
                $("#search-bar").val("");
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