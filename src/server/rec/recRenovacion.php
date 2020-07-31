<?php

include("../renovacion.php");

$renov = new renovacion;

if(isset($_POST["accion"])){
    $accion = $_POST["accion"];
}else{
    $accion = "nada";
}
if(isset($_POST["expBuscar"])){
    $renov->expBuscar = $_POST["expBuscar"];
}else{
    $renov->expBuscar = "nada";
}

if($accion=="BusRenov"){
    $renov->busRenov();
}


?>