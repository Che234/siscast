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
if(isset($_POST["secciones"])){
    $secciones = $_POST["secciones"];
}else{
    $secciones = "nada";
}
if(isset($_POST["expBuscar"])){
    $bus->expBuscar = $_POST["expBuscar"];
}else{
    $bus->expBuscar = "nada";
}
if(isset($_POST["cedula"])){
    $bus->cedula = $_POST["cedula"];
}else{
    $bus->cedula = "nada";
}
if(isset($_POST["rif"])){
    $bus->rif = $_POST["rif"];
}else{
    $bus->rif = "nada";
}
if(isset($_POST["nomProp"])){
    $bus->nomProp = $_POST["nomProp"];
}else{
    $bus->nomProp = "nomProp";
}
if(isset($_POST["apelProp"])){
    $bus->apelProp = $_POST["apelProp"];
}else{
    $bus->apelProp = "apelProp";
}
if(isset($_POST["telefono"])){
    $bus->telefono = $_POST["telefono"];
}else{
    $bus->telefono = "telefono";
}
if(isset($_POST["direcProp"])){
    $bus->direcProp = $_POST["direcProp"];
}else{
    $bus->direcProp = "direcProp";
}
if(isset($_POST["cedula2"])){
    $bus->cedula2 = $_POST["cedula2"];
}else{
    $bus->cedula2 = "cedula2";
}


if($accion =="busExp"){
    $bus->mostBusqueda();
}
if($accion == "mostRest"){
    $bus->mostModif();
}
if($secciones=="Propietario"){
    $bus->modifPropietario();
}
if($accion == "actProp"){
    $bus->actProp();
}
?>