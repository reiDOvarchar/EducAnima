$(document).ready(function () {
    $(document).on("click", "#teste", function () {
        $( "#menu" ).slideToggle(400);
    });
});

function myFunction(x) {
    x.classList.toggle("change");
  }

function getInfoFromPHP() {
    fetch('info.php')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json(); // Se a resposta for JSON
    })
    .then(data => {
        // Aqui, a variável "data" conterá a informação do PHP
        console.log('Informação recebida: ', data);
        // Use a informação recebida como precisar
    })
    .catch(error => {
        console.error('Houve um problema com a requisição:', error);
    });
}