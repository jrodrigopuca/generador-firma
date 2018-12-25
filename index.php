<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Mail</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="front/estilo.css">
</head>
<body>
    <form action="enviar-2.php" class="card" method="post">
        <span class="card-title">Contacto</span>
        <div class='input-field'>
            <input name='nombre' required='true' type='text'>
            <label for='nombre'>Nombre</label>
        </div>
        <div class='input-field'>
            <input name='email' required='true' type='email'>
            <label for='email'>Email</label>
        </div>
        <div class='input-field'>
            <label for='mensaje'>Mensaje</label>
            <textarea name='mensaje' class='materialize-textarea' required='true'></textarea>
        </div>
        <input type="hidden" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
        <input type="hidden" name="browser" value="<?php echo $_SERVER['HTTP_USER_AGENT']; ?>">
        <div class='input-field'>
            <input type="submit" value="Enviar" name="send" class="btn waves-effect waves-light"/>
        </div>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>    
    <script src="front/script.js"></script>    
</body>
</html>



