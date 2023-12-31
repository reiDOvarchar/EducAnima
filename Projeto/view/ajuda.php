<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../view/css/ajuda.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <!-- <script defer src="../view/js/ajuda.js"></script> -->
    <title>Ajuda</title>

    <script> 
        $(function(){
            $("#includeHeader").load("header.php"); 
        });
    </script>
</head>
<body>
    <div id="includeHeader"></div>

    <div class="main">
        <form action="">
            <div>
                <label for = "email">Digite um e-mail válido</label>
                <input type = "text" id = "email" name = "email" class="form-control">
            </div>
            <div>
                <label for = "motivo">Motivo da chamada</label>
                <input type = "text" id = "motivo" name = "motivo" class="form-control">
            </div>
            <div>
                <label for = "problema">Fale de forma breve a sua dúvida ou problema </label>
                <textarea name="problema" id="problema" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <button type="submit">Enviar</button>
        </form>
    </div>
    
    <div class="vertical"></div>
</body>
</html>