<?php

include('../login.php');

$log = new login;

if(isset($_POST['accion'])){
    $accion = $_POST['accion'];
}else{
    $accion = "nada";
}
if(isset($_POST['usuario'])){
    $log->usuario = $_POST['usuario'];
}else{
    $log->usuario="";
}
if(isset($_POST["pass"])){
    $log->pass = $_POST['pass'];
}else{
    $log->pass="";
}

if($accion=="logEntrar"){
    $log->fEntrar();
}
if($accion=="fSalir"){
    $log->fSalir();
}
?>