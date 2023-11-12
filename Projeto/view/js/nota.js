$(document).ready(function () {


    

    // $(document).on("click", "#estrela-nota-vazia", function () {
    //     console.log(123);
    //     var nota = $(this).attr("data-id");
    //     inserirNota(nota);
    // });

    // $(document).on("click", "#estrela-nota-metade", function () {
    //     console.log(123);
    //     var nota = $(this).attr("data-id");
    //     inserirNota(nota);
    // });

    const searchParams = new URLSearchParams(window.location.search);
    
    let id = searchParams.get('id');
    setTimeout(() => {
        mostrarNota(id);
     }, 400);
     
     

    setTimeout(() => {
        $(document).on("click", ".estrela", function () {
            var nota = $(this).attr("data-id");
            inserirNota(nota);
        });
     }, 400);
})

function inserirNota(nota){
    $.ajax({
        url: `/Projeto/controller/functionHandler.php`,
        type: "POST",
        data: {action: 'insertNota', nota: nota},
        dataType: "json",
        complete: function (r) {
            if (r.status == 200) {
                var html = '';
            }
            if (r.status == 200) {
                
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso',
                    text: 'Nota enviada: ' + nota,
                    timer: 3000
                })
                setTimeout(() => {
                    window.location.reload(true);
                 }, 1800);
                
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

function getIdDesenho(){
    $.ajax({
        url: `/Projeto/controller/functionHandler.php`,
        type: "POST",
        data: {action: 'getIdDesenho'},
        dataType: "json",
        complete: function (r) {
            let id_desenho = (r.responseJSON);
            return id_desenho;
        }
    })
}

function mostrarNota(id){
    $.ajax({
        url: `/Projeto/controller/functionHandler.php`,
        type: "POST",
        data: {action: 'mostrarNota', item: id},
        dataType: "json",
        complete: function (r) {
            let nota = (r.responseJSON["avg(nota)"]);
            console.log(nota)

            if (r.status == 200) {
                var html = '';

                html +=`<div class="div-estrelas">`
                html +=`     <div class="div-estrela-cheia">`
                if (!nota) {
                    html +=`        <img src="img/favorito_estrelaVazia.png" class="estrela1-vazia estrela" data-id="1" id="estrela-nota-vazia">`
                    html +=`         <img src="img/favorito_estrelaVazia.png" class="estrela2-vazia estrela" data-id="2" id="estrela-nota-vazia">`
                    html +=`         <img src="img/favorito_estrelaVazia.png" class="estrela3-vazia estrela" data-id="3" id="estrela-nota-vazia">`
                    html +=`         <img src="img/favorito_estrelaVazia.png" class="estrela4-vazia estrela" data-id="4" id="estrela-nota-vazia">`
                    html +=`         <img src="img/favorito_estrelaVazia.png" class="estrela5-vazia estrela" data-id="5" id="estrela-nota-vazia">`
                    html +=`<p class="mensagem-nota">Este desenho ainda não avalidado, seja o(a) primeiro(a)!</p>        `
                }
                else if (nota < 0.5) {
                    html +=`        <img src="img/favorito_estrelaVazia.png" class="estrela1-vazia estrela" data-id="1" id="estrela-nota-vazia">`
                    html +=`         <img src="img/favorito_estrelaVazia.png" class="estrela2-vazia estrela" data-id="2" id="estrela-nota-vazia">`
                    html +=`         <img src="img/favorito_estrelaVazia.png" class="estrela3-vazia estrela" data-id="3" id="estrela-nota-vazia">`
                    html +=`         <img src="img/favorito_estrelaVazia.png" class="estrela4-vazia estrela" data-id="4" id="estrela-nota-vazia">`
                    html +=`         <img src="img/favorito_estrelaVazia.png" class="estrela5-vazia estrela" data-id="5" id="estrela-nota-vazia">`
                    html += `<p class="nota-numero">${parseFloat(nota).toFixed(1)}</p>`
                }

                if (nota >= 0.5 && nota< 1) {
                    html +=`         <img src="img/favorito_estrelaMetade.png" class="estrela1-metade estrela" id="estrela-nota-metade" data-id="1">`
                    html +=`         <img src="img/favorito_estrelaVazia.png" class="estrela2-vazia estrela" data-id="2" id="estrela-nota-vazia">`
                    html +=`         <img src="img/favorito_estrelaVazia.png" class="estrela3-vazia estrela" data-id="3" id="estrela-nota-vazia">`
                    html +=`         <img src="img/favorito_estrelaVazia.png" class="estrela4-vazia estrela" data-id="4" id="estrela-nota-vazia">`
                    html +=`         <img src="img/favorito_estrelaVazia.png" class="estrela5-vazia estrela" data-id="5" id="estrela-nota-vazia">`
                    html += `<p class="nota-numero">${parseFloat(nota).toFixed(1)}</p>`
                }

                if(nota >= 1 && nota < 1.5){
                    html +=`        <img src="img/favorito_estrelaCheia.png" class="estrela1-cheia estrela" id="estrela-nota" data-id="1">`
                    html +=`         <img src="img/favorito_estrelaVazia.png" class="estrela2-vazia estrela" data-id="2" id="estrela-nota-vazia">`
                    html +=`         <img src="img/favorito_estrelaVazia.png" class="estrela3-vazia estrela" data-id="3" id="estrela-nota-vazia">`
                    html +=`         <img src="img/favorito_estrelaVazia.png" class="estrela4-vazia estrela" data-id="4" id="estrela-nota-vazia">`
                    html +=`         <img src="img/favorito_estrelaVazia.png" class="estrela5-vazia estrela" data-id="5" id="estrela-nota-vazia">`
                    html += `<p class="nota-numero">${parseFloat(nota).toFixed(1)}</p>`
                } else if (nota >= 1.5 && nota < 2) {
                    html +=`        <img src="img/favorito_estrelaCheia.png" class="estrela1-cheia estrela" id="estrela-nota" data-id="1">`
                    html +=`         <img src="img/favorito_estrelaMetade.png" class="estrela2-metade estrela" id="estrela-nota-metade" data-id="2">`
                    html +=`         <img src="img/favorito_estrelaVazia.png" class="estrela3-vazia estrela" data-id="3" id="estrela-nota-vazia">`
                    html +=`         <img src="img/favorito_estrelaVazia.png" class="estrela4-vazia estrela" data-id="4" id="estrela-nota-vazia">`
                    html +=`         <img src="img/favorito_estrelaVazia.png" class="estrela5-vazia estrela" data-id="5" id="estrela-nota-vazia">`
                    html += `<p class="nota-numero">${parseFloat(nota).toFixed(1)}</p>`
                } else if (nota >= 2 && nota < 2.5) {
                    html +=`        <img src="img/favorito_estrelaCheia.png" class="estrela1-cheia estrela" id="estrela-nota" data-id="1">`
                    html +=`         <img src="img/favorito_estrelaCheia.png" class="estrela2-cheia estrela" id="estrela-nota" data-id="2">`
                    html +=`         <img src="img/favorito_estrelaVazia.png" class="estrela3-vazia estrela" data-id="3" id="estrela-nota-vazia">`
                    html +=`         <img src="img/favorito_estrelaVazia.png" class="estrela4-vazia estrela" data-id="4" id="estrela-nota-vazia">`
                    html +=`         <img src="img/favorito_estrelaVazia.png" class="estrela5-vazia estrela" data-id="5" id="estrela-nota-vazia">`
                    html += `<p class="nota-numero">${parseFloat(nota).toFixed(1)}</p>`
                }
                else if(nota >= 2.5 && nota < 3){
                    html +=`         <img src="img/favorito_estrelaCheia.png" class="estrela1-cheia estrela" id="estrela-nota" data-id="1">`
                    html +=`         <img src="img/favorito_estrelaCheia.png" class="estrela2-cheia estrela" id="estrela-nota" data-id="2">`
                    html +=`         <img src="img/favorito_estrelaMetade.png" class="estrela3-metade estrela" id="estrela-nota-metade" data-id="3">` 
                    html +=`         <img src="img/favorito_estrelaVazia.png" class="estrela4-vazia estrela" data-id="4" id="estrela-nota-vazia">`
                    html +=`         <img src="img/favorito_estrelaVazia.png" class="estrela5-vazia estrela" data-id="5" id="estrela-nota-vazia">`
                    html += `<p class="nota-numero">${parseFloat(nota).toFixed(1)}</p>`
                }
                else if(nota >= 3 && nota < 3.5){
                    html +=`        <img src="img/favorito_estrelaCheia.png" class="estrela1-cheia estrela" id="estrela-nota" data-id="1">`
                    html +=`         <img src="img/favorito_estrelaCheia.png" class="estrela2-cheia estrela" id="estrela-nota" data-id="2">` 
                    html +=`         <img src="img/favorito_estrelaCheia.png" class="estrela3-cheia estrela" id="estrela-nota" data-id="3">` 
                    html +=`         <img src="img/favorito_estrelaVazia.png" class="estrela4-vazia estrela" data-id="4" id="estrela-nota-vazia">`
                    html +=`         <img src="img/favorito_estrelaVazia.png" class="estrela5-vazia estrela" data-id="5" id="estrela-nota-vazia">`
                    html += `<p class="nota-numero">${parseFloat(nota).toFixed(1)}</p>`
                }
                else if(nota >= 3.5 && nota < 4){
                    html +=`        <img src="img/favorito_estrelaCheia.png" class="estrela1-cheia estrela" id="estrela-nota" data-id="1">`
                    html +=`         <img src="img/favorito_estrelaCheia.png" class="estrela2-cheia estrela" id="estrela-nota" data-id="2">` 
                    html +=`         <img src="img/favorito_estrelaCheia.png" class="estrela3-cheia estrela" id="estrela-nota" data-id="3">` 
                    html +=`         <img src="img/favorito_estrelaMetade.png" class="estrela4-metade estrela" id="estrela-nota-metade" data-id="4">`
                    html +=`         <img src="img/favorito_estrelaVazia.png" class="estrela5-vazia estrela" data-id="5" id="estrela-nota-vazia">`
                    html += `<p class="nota-numero">${parseFloat(nota).toFixed(1)}</p>`
                }
                else if(nota >= 4 && nota < 4.5){
                    html +=`        <img src="img/favorito_estrelaCheia.png" class="estrela1-cheia estrela" id="estrela-nota" data-id="1">`
                    html +=`         <img src="img/favorito_estrelaCheia.png" class="estrela2-cheia estrela" id="estrela-nota" data-id="2">` 
                    html +=`         <img src="img/favorito_estrelaCheia.png" class="estrela3-cheia estrela" id="estrela-nota" data-id="3">` 
                    html +=`         <img src="img/favorito_estrelaCheia.png" class="estrela4-cheia estrela" id="estrela-nota" data-id="4">`
                    html +=`         <img src="img/favorito_estrelaVazia.png" class="estrela5-vazia estrela" data-id="5" id="estrela-nota-vazia">`
                    html += `<p class="nota-numero">${parseFloat(nota).toFixed(1)}</p>`
                }
                
                else if(nota >= 4.5 && nota < 5){
                    html +=`        <img src="img/favorito_estrelaCheia.png" class="estrela1-cheia estrela" id="estrela-nota" data-id="1">`
                    html +=`         <img src="img/favorito_estrelaCheia.png" class="estrela2-cheia estrela" id="estrela-nota" data-id="2">` 
                    html +=`         <img src="img/favorito_estrelaCheia.png" class="estrela3-cheia estrela" id="estrela-nota" data-id="3">` 
                    html +=`         <img src="img/favorito_estrelaCheia.png" class="estrela4-cheia estrela" id="estrela-nota" data-id="4">`
                    html +=`         <img src="img/favorito_estrelaMetade.png" class="estrela5-metade estrela" id="estrela-nota-metade" data-id="5">`
                    html += `<p class="nota-numero">${parseFloat(nota).toFixed(1)}</p>`
                } else if (nota == 5) {
                    html +=`        <img src="img/favorito_estrelaCheia.png" class="estrela1-cheia estrela" id="estrela-nota" data-id="1">`
                    html +=`         <img src="img/favorito_estrelaCheia.png" class="estrela2-cheia estrela" id="estrela-nota" data-id="2">` 
                    html +=`         <img src="img/favorito_estrelaCheia.png" class="estrela3-cheia estrela" id="estrela-nota" data-id="3">` 
                    html +=`         <img src="img/favorito_estrelaCheia.png" class="estrela4-cheia estrela" id="estrela-nota" data-id="4">`
                    html +=`         <img src="img/favorito_estrelaCheia.png" class="estrela5-cheia estrela" id="estrela-nota" data-id="5">`
                    html += `<p class="nota-numero">${parseFloat(nota).toFixed(1)}</p>`
                }
                
                html +=`     </div>`
                html +=`</div>`

                
                
                $("#div-result-estrelas").html(html);
            }
        }
    })
}