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
if(isset($_POST["tipoBuscar"])){
    $renov->tipoBuscar = $_POST["tipoBuscar"];
}else{
    $renov->tipoBuscar = "nada";
}


if($accion=="BusRenov"){
    $renov->busRenov();
}
if($accion=="form3"){
    include("../f002.php");
    $f003 = new f003;
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
    
    $f003->imprimir();
}
if($accion=="form1"){
    include("../f002.php");
    $f001 = new f001;
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
    $f001->imprimir();
}
if($accion=="form2"){
    include("../f001.php");
    $f1 = new f1;
    if(isset($_POST["idInmueble"])){
        $f1->idInmueble = $_POST["idInmueble"];
    }else{
        $f1->idInmueble = "nada";
    }
    if(isset($_POST["idProp"])){
        $f1->idProp = $_POST["idProp"];
    }else{
        $f1->idProp = "nada";
    }
    if(isset($_POST["nuExp"])){
        $f1->nuExp = $_POST["nuExp"];
    }else{
        $f1->nuExp = "nada";
    }
    if(isset($_POST["montoFact"])){
        $f1->montoFact = $_POST["montoFact"];
    }else{
        $f1->montoFact = "nada";
    }
    if(isset($_POST["fechFact"])){
        $f1->fechFact = $_POST["fechFact"];
    }else{
        $f1->fechFact = "nada";
    }
    if(isset($_POST["numFact"])){
        $f1->numFact = $_POST["numFact"];
    }else{
        $f1->numFact = "nada";
    }
    if(isset($_POST["operacion"])){
        $f1->operacion = $_POST["operacion"];
    }else{
        $f1->operacion = "nada";
    }
    $f1->imprimir();
}
if($accion=="empaExp"){
    include("../f002.php");
    $f004 = new f004;
    if(isset($_POST["idInmueble"])){
        $f004->idInmueble = $_POST["idInmueble"];
    }else{
        $f004->idInmueble = "nada";
    }
    if(isset($_POST["idProp"])){
        $f004->idProp = $_POST["idProp"];
    }else{
        $f004->idProp = "nada";
    }
    if(isset($_POST["nuExp"])){
        $f004->nuExp = $_POST["nuExp"];
    }else{
        $f004->nuExp = "nada";
    }
    if(isset($_POST["montoFact"])){
        $f004->montoFact = $_POST["montoFact"];
    }else{
        $f004->montoFact = "nada";
    }
    if(isset($_POST["fechFact"])){
        $f004->fechFact = $_POST["fechFact"];
    }else{
        $f004->fechFact = "nada";
    }
    if(isset($_POST["numFact"])){
        $f004->numFact = $_POST["numFact"];
    }else{
        $f004->numFact = "nada";
    }
    if(isset($_POST["operacion"])){
        $f004->operacion = $_POST["operacion"];
    }else{
        $f004->operacion = "nada";
    }
    $f004->imprimir();
}
echo'<div id="enlacePdf"></div>';
?>