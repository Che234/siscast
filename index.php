<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Catastral Automatizado</title>
    <link rel="stylesheet" href="./src/stylus/estructura.css">
    <link rel="stylesheet" href="./src/lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./src/stylus/usuarios.css">
    <link rel="stylesheet" href="./src/stylus/constancias.css">
</head>
<body>
    <?php
        include('./src/server/usuario.php');
        include('./src/server/estructura.php');
        include('./src/server/login.php');
        session_start();
        if(!isset($_SESSION["usuario"])){
            $_SESSION["usuario"]="";            
        }
        if(!isset($_SESSION["pass"])){
            $_SESSION["pass"]="";
        }

        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());

    $busqueda="SELECT * from usuarios where nick='".$_SESSION["usuario"]."' and pass='".$_SESSION["pass"]."' ";
    $rest = $link->query($busqueda);
    $filas = $rest->num_rows;
    if($filas != 0){
        $estructura = new estructura();
        $estructura->header();
        echo'<div id="campGeneral">';
        $estructura->body();
        echo'</div>';
        
        
    }else{
        echo'<div id="campGeneral">';
        $nlog= new login();
        $nlog->fLogin();
        echo'</div>';
        
    };
    ?>
<script src="./src/lib/logica/ajax.js"></script>
<script src="./src/lib/logica/expresiones.js"></script>
<script src="./src/lib/logica/renovacion.js"></script>
<script src="./src/lib/logica/login.js"></script>
<script src="./src/lib/logica/constancias.js"></script>
<script src="./src/lib/logica/busquedas.js"></script>
<script src="./src/lib/logica/usuarios.js"></script>
<script src="./src/lib/jquery/jquery.min.js"></script>
<script src="./src/lib/bootstrap/js/bootstrap.js"></script>
</body>
</html>