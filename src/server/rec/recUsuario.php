<?php
include('../usuario.php');

$nusu= new usuario;

if(isset($_POST['accion'])){
    $accion= $_POST['accion'];
}else{
    $accion= "nada";
}
if(isset($_POST['nombre'])){
    $nusu->nombre= $_POST['nombre'];
}else{
    $nusu->nombre= "nada";
}
if(isset($_POST['apellido'])){
    $nusu->apellido= $_POST['apellido'];
}else{
    $nusu->apellido= "nada";
}
if(isset($_POST['correo'])){
    $nusu->correo= $_POST['correo'];
}else{
    $nusu->correo= "nada";
}
if(isset($_POST['direccion'])){
    $nusu->direccion= $_POST['direccion'];
}else{
    $nusu->direccion= "nada";
}
if(isset($_POST['telf'])){
    $nusu->telf= $_POST['telf'];
}else{
    $nusu->telf= "nada";
}
if(isset($_POST['user'])){
    $nusu->user= $_POST['user'];
}else{
    $nusu->user= "nada";
}
if(isset($_POST['pass'])){
    $nusu->pass= $_POST['pass'];
}else{
    $nusu->pass= "nada";
}

if ($accion == "mostReg"){
    $nusu->mostRegistro();
}
if($accion == "guardUsu"){
    $nusu->guardUsu();
}

?>