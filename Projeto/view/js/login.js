$(document).ready(function () {
    function handleCredentialResponse(response) {
        const data = jwt_decode(response.credential);
        pictureUser.setAttribute("src", data.picture);
    }

    window.onload = function () {
        google.accounts.id.initialize({
            client_id: "694826735355-516vd3cc1re4fbobogggrtnecqp730uk.apps.googleusercontent.com",
            callback: handleCredentialResponse
        });

        google.accounts.id.renderButton(
            document.getElementById("buttonDiv"),
            { 
                theme: "outline", 
                size: "large",
                type: "standard", 
                shape: "pill", 
                text: "continue_with", 
                logo_alignment: "left", 
                width: "300"
            }  // customization attributes
        );

        google.accounts.id.prompt(); // also display the One Tap dialog
    }
});