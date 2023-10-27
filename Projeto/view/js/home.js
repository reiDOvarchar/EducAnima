$(document).ready(function () {
    $(document).on("click", "#teste", function () {
        
    });

    $(document).on("click", ".menu", function () {
        $(this).toggleClass('open');
    })

    $(document).on("click", "#btn-search", function () {
        searchDesenho();
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
                console.log(r.responseJSON);

                if (r.responseJSON.length > 0) {
                    var html = ``;
                    for (var i in r.responseJSON) {
                        const elem = r.responseJSON[i];

                        html += ``;
                        html += ``;
                        html += ``;
                        html += ``;
                        html += ``;
                        html += ``;
                        html += ``;
                        html += ``;
                        html += ``;
                        html += ``;
                        html += ``;
                        html += ``;
                        html += ``;
                        html += ``;
                    }
                } else {

                }

                $("#desenhos-result").html(html);
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