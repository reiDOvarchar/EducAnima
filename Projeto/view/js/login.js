$(document).ready(function () {
    function handleCredentialResponse(response) {
        const data = jwt_decode(response.credential);
        pictureUser.setAttribute("src", data.picture);
    }

    $(document).ready(function (){
        $(document).on('click', '#btn-lg',
        function() {
            loginUser();
        })
    });


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
            document.getElementById("btn-lg").click();
        }
    });
});

function loginUser(){
    var item = $("#caralho").serialize()

    $.ajax({
        url: `/Projeto/controller/functionHandler.php`,
        type: "POST",
        data: {action: 'loginUser', item: item},
        dataType: "json",
        complete: function(r){
            if (r.status == 200) {
                
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso',
                    text: r.responseText,
                    timer: 3000
                })
                setTimeout(() => {
                   window.location.href = "home.php"; 
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