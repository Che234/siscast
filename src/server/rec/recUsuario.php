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
if(isset($_POST["cedula"])){
    $nusu->cedula = $_POST["cedula"];
}else{
    $nusu->cedula= "nada";
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
if(isset($_POST["nivUsu"])){
    $nusu->nivUsu = $_POST["nivUsu"];
}else{
    $nusu->nivUsu = "";
}
if(isset($_POST["cedUsu"])){
    $nusu->cedUsu = $_POST["cedUsu"];
}else{
    $nusu->cedUsu = "";
}
if(isset($_POST["nomUsu"])){
    $nusu->nomUsu = $_POST["nomUsu"];
}else{
    $nusu->nomUsu = "";
}
if(isset($_POST["apelUsu"])){
    $nusu->apelUsu = $_POST["apelUsu"];
}else{
    $nusu->apelUsu = "";
}
if(isset($_POST["dirUsu"])){
    $nusu->dirUsu = $_POST["dirUsu"];
}else{
    $nusu->dirUsu = "";
}
if(isset($_POST["telfUsu"])){
    $nusu->telfUsu = $_POST["telfUsu"];
}else{
    $nusu->telfUsu = "";
}
if(isset($_POST["corUsu"])){
    $nusu->corUsu = $_POST["corUsu"];
}else{
    $nusu->corUsu = "";
}
if(isset($_POST["idUsu"])){
    $nusu->idUsu = $_POST["idUsu"];
}else{
    $nusu->idUsu = "";
}
if(isset($_POST["cedu"])){
    $nusu->cedu = $_POST["cedu"];
}else{
    $nusu->cedu = "";
}
if(isset($_POST["direc"])){
    $nusu->direc = $_POST["direc"];
}else{
    $nusu->direc = "";
}
if(isset($_POST["telefono"])){
    $nusu->telefono = $_POST["telefono"];
}else{
    $nusu->telefono = "";
}
if(isset($_POST["contrasena"])){
    $nusu->contrasena = $_POST["contrasena"];
}else{
    $nusu->contrasena = "";
}
if(isset($_POST["verPass"])){
    $nusu->verPass = $_POST["verPass"];
}else{
    $nusu->verPass = "";
}
if(isset($_POST["antClav"])){
    $nusu->antClav = $_POST["antClav"];
}else{
    $nusu->antClav = "";
}
if(isset($_POST["nuevaClav"])){
    $nusu->nuevaClav = $_POST["nuevaClav"];
}else{
    $nusu->nuevaClav = "";
}

if ($accion == "mostReg"){
    $nusu->mostRegistro();
}
if($accion == "guardUsu"){
    $nusu->guardUsu();
}
if($accion == "ModUsu"){
    $nusu->ModUsu();
}
if($accion == "encUsu"){
    $nusu->encUsu();
}
if($accion=="actUsu"){
    $nusu->actUsu();
}
if($accion=="mostList"){
    $nusu->mostList();
}
if($accion=="eliminarUsu"){
    $nusu->eliminarUsu();
}
if($accion=="cambClave"){
    $nusu->cambClave();
}
if($accion=="actClave"){
    $nusu->actClave();
}
?>