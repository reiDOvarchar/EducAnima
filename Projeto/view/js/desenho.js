$(document).ready(function () {
   
    $(document).on("click", "#btn-cadastrar-desenho", function () {
        // insertDesenho();
        insertCategoria();
        insertPlataforma();
    });

    // $(document).on("click", "#btn-delete-desenho", function () {
    //     var id = $(this).attr("data-id");
    //     deleteDesenho(id);
    // });

    // $(document).on("click", "#btn-edit-desenho", function () {
    //     updateDesenho();
    // });

    initializeSelectize();
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
                    title: 'Calma ae meu nego',
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
                    title: 'Calma ae meu nego',
                    text: r.responseText,
                })
            }
        },
    });
}

function insertPlataforma() {
    var item = $('#plataforma').val(); 

    $.ajax({
        url: `/Projeto/controller/functionHandler.php`,
        type: "POST",
        data: {action: 'insertPlataforma', item: item},
        dataType: "json",
        complete: function (r) {
            if (r.status != 200) {
                Swal.fire({
                    icon: 'error',
                    title: 'Calma ae meu nego',
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
                    title: 'Calma ae meu nego',
                    text: r.responseText,
                })
            }
        },
    });
}

function updateDesenho() {
    var item = $("#form-edit-desenho").serialize();
    
    $.ajax({
        url: `/Projeto/controller/functionHandler.php`,
        type: "POST",
        data: {action: 'updateDesenho', item: item},
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
                    title: 'Calma ae meu nego',
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