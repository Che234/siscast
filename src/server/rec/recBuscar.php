<?php

include('../busquedas.php');

$bus = new busquedas;

if(isset($_POST['accion'])){
    $accion= $_POST['accion'];
}else{
    $accion= "nada";
}
if(isset($_POST['tipoBuscar'])){
    $bus->tipoBuscar= $_POST['tipoBuscar'];
}else{
    $bus->tipoBuscar= "nada";
}
if(isset($_POST['campBuscar'])){
    $bus->campBuscar= $_POST['campBuscar'];
}else{
    $bus->campBuscar= "nada";
}


if($accion =="busExp"){
    $bus->mostBusqueda();
}

?>