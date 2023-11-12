$(document).ready(function () {
    $(document).on("change", "#form-professor", function () {
        if ($("#form-professor").val() == 1) {
            $( "#form-formacao" ).prop( "disabled", false );
            $( "#form-ensino" ).prop( "disabled", false );
        } else {
            $( "#form-formacao" ).prop( "disabled", true );
            $( "#form-ensino" ).prop( "disabled", true );
            $( "#form-formacao" ).val("");
            $( "#form-ensino" ).val("");
        }
    });

    $(document).ready(function () {
        $(document).on("click", "#btn-sign", function () {
            insertUser();
        });
    });

    function handleCredentialResponse(response) {
        const data = jwt_decode(response.credential);
        pictureUser.setAttribute("src", data.picture);

        $("#form-nome").val(data.name);
        $("#form-email").val(data.email);
        $("#senha-google").val(data.sub);
        $("#form-senha").val("");
        $("#form-senha").prop("disabled", true );
    }

    // window.onload = function () {
    //     google.accounts.id.initialize({
    //         client_id: "694826735355-516vd3cc1re4fbobogggrtnecqp730uk.apps.googleusercontent.com",
    //         callback: handleCredentialResponse
    //     });

    //     google.accounts.id.renderButton(
    //         document.getElementById("buttonDiv"),
    //         { 
    //             theme: "outline", 
    //             size: "large",
    //             type: "standard", 
    //             shape: "pill", 
    //             text: "continue_with", 
    //             logo_alignment: "left", 
    //             width: "300"
    //         }  // customization attributes
    //     );

    //     google.accounts.id.prompt(); // also display the One Tap dialog
    // }
    window.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("btn-sign").click();
        }
    });
});


function insertUser() {
    var item = $("#form-sign-up").serialize();

    $.ajax({
        url: `/Projeto/controller/functionHandler.php`,
        type: "POST",
        data: {action: 'insertUser', item: item},
        dataType: "json",
        complete: function (r) {
            if (r.status == 200) {
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso',
                    text: r.responseText,
                })
                setTimeout(() => {
                    window.location.href = "login.php"; 
                }, 2200);
            } else {
                console.log(r.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Erro!',
                    text: r.responseText,
                })
            }
        },
    });
}