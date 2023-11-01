$(document).ready(function () {
    $(document).on("click", "#teste", function () {
        $( "#menu" ).slideToggle(400);
    });
});

function myFunction(x) {
    x.classList.toggle("change");
  }