<?php

include("../renovacion.php");
include("../f002.php");
$renov = new renovacion;
$f002 = new f002;
$f003 = new f003;
$f001 = new f001;


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
if(isset($_POST["tipoBuscar"])){
    $renov->tipoBuscar = $_POST["tipoBuscar"];
}else{
    $renov->tipoBuscar = "nada";
}


if($accion=="BusRenov"){
    $renov->busRenov();
}
if($accion=="form3"){
    if(isset($_POST["idInmueble"])){
        $f003->idInmueble = $_POST["idInmueble"];
    }else{
        $f003->idInmueble = "nada";
    }
    if(isset($_POST["idProp"])){
        $f003->idProp = $_POST["idProp"];
    }else{
        $f003->idProp = "nada";
    }
    if(isset($_POST["nuExp"])){
        $f002->nuExp = $_POST["nuExp"];
    }else{
        $f002->nuExp = "nada";
    }
    if(isset($_POST["montoFact"])){
        $f002->montoFact = $_POST["montoFact"];
    }else{
        $f002->montoFact = "nada";
    }
    if(isset($_POST["fechFact"])){
        $f002->fechFact = $_POST["fechFact"];
    }else{
        $f002->fechFact = "nada";
    }
    if(isset($_POST["numFact"])){
        $f002->numFact = $_POST["numFact"];
    }else{
        $f002->numFact = "nada";
    }
    if(isset($_POST["operacion"])){
        $f002->operacion = $_POST["operacion"];
    }else{
        $f002->operacion = "nada";
    }
    echo'<div id="enlacePdf"></div>';
    $f003->imprimir();
}
if($accion=="form1"){
    if(isset($_POST["idInmueble"])){
        $f001->idInmueble = $_POST["idInmueble"];
    }else{
        $f001->idInmueble = "nada";
    }
    if(isset($_POST["idProp"])){
        $f001->idProp = $_POST["idProp"];
    }else{
        $f001->idProp = "nada";
    }
    if(isset($_POST["nuExp"])){
        $f001->nuExp = $_POST["nuExp"];
    }else{
        $f001->nuExp = "nada";
    }
    if(isset($_POST["montoFact"])){
        $f001->montoFact = $_POST["montoFact"];
    }else{
        $f001->montoFact = "nada";
    }
    if(isset($_POST["fechFact"])){
        $f001->fechFact = $_POST["fechFact"];
    }else{
        $f001->fechFact = "nada";
    }
    if(isset($_POST["numFact"])){
        $f001->numFact = $_POST["numFact"];
    }else{
        $f001->numFact = "nada";
    }
    if(isset($_POST["operacion"])){
        $f001->operacion = $_POST["operacion"];
    }else{
        $f001->operacion = "nada";
    }
    echo'<div id="enlacePdf"></div>';
    $f001->imprimir();
}
if($accion=="form2"){
    if(isset($_POST["idInmueble"])){
        $f002->idInmueble = $_POST["idInmueble"];
    }else{
        $f002->idInmueble = "nada";
    }
    if(isset($_POST["idProp"])){
        $f002->idProp = $_POST["idProp"];
    }else{
        $f002->idProp = "nada";
    }
    if(isset($_POST["nuExp"])){
        $f002->nuExp = $_POST["nuExp"];
    }else{
        $f002->nuExp = "nada";
    }
    if(isset($_POST["montoFact"])){
        $f002->montoFact = $_POST["montoFact"];
    }else{
        $f002->montoFact = "nada";
    }
    if(isset($_POST["fechFact"])){
        $f002->fechFact = $_POST["fechFact"];
    }else{
        $f002->fechFact = "nada";
    }
    if(isset($_POST["numFact"])){
        $f002->numFact = $_POST["numFact"];
    }else{
        $f002->numFact = "nada";
    }
    if(isset($_POST["operacion"])){
        $f002->operacion = $_POST["operacion"];
    }else{
        $f002->operacion = "nada";
    }
    echo'<div id="enlacePdf"></div>';
    $f002->imprimir();
}
?>