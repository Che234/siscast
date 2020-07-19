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
    $bus->nomProp = "nada";
}
if(isset($_POST["apelProp"])){
    $bus->apelProp = $_POST["apelProp"];
}else{
    $bus->apelProp = "nada";
}
if(isset($_POST["telefono"])){
    $bus->telefono = $_POST["telefono"];
}else{
    $bus->telefono = "nada";
}
if(isset($_POST["direcProp"])){
    $bus->direcProp = $_POST["direcProp"];
}else{
    $bus->direcProp = "nada";
}
if(isset($_POST["cedula2"])){
    $bus->cedula2 = $_POST["cedula2"];
}else{
    $bus->cedula2 = "nada";
}
if(isset($_POST["telefono2"])){
    $bus->telefono2 = $_POST["telefono2"];
}else{
    $bus->telefono2 = "nada";
}
if(isset($_POST["parrInmue"])){
    $bus->parrInmue = $_POST["parrInmue"];
}else{
    $bus->parrInmue = "nada";
}
if(isset($_POST["secInmue"])){
    $bus->secInmue = $_POST["secInmue"];
}else{
    $bus->secInmue = "nada";
}
if(isset($_POST["direcInmue"])){
    $bus->direcInmue = $_POST["direcInmue"];
}else{
    $bus->direcInmue = "nada";
}
if(isset($_POST["ambInmue"])){
    $bus->ambInmue = $_POST["ambInmue"];
}else{
    $bus->ambInmue = "nada";
}
if(isset($_POST["idInmueble"])){
    $bus->idInmueble = $_POST["idInmueble"];
}else{
    $bus->idInmueble = "nada";
}
if(isset($_POST["topoConst"])){
    $bus->topoConst = $_POST["topoConst"];
}else{
    $bus->topoConst = "nada";
}
if(isset($_POST["formaConst"])){
    $bus->formaConst = $_POST["formaConst"];
}else{
    $bus->formaConst = "nada";
}
if(isset($_POST["regInmue"])){
    $bus->regInmue = $_POST["regInmue"];
}else{
    $bus->regInmue = "nada";
}
if(isset($_POST["usoConst"])){
    $bus->usoConst = $_POST["usoConst"];
}else{
    $bus->usoConst = "nada";
}
if(isset($_POST["tenenConst"])){
    $bus->tenenConst = $_POST["tenenConst"];
}else{
    $bus->tenenConst = "nada";
}
if(isset($_POST["ocupConst"])){
    $bus->ocupConst = $_POST["ocupConst"];
}else{
    $bus->ocupConst = "nada";
}
if(isset($_POST["dimeConst"])){
    $bus->dimeConst = $_POST["dimeConst"];
}else{
    $bus->dimeConst = "nada";
}
if(isset($_POST["idCarac"])){
    $bus->idCarac = $_POST["idCarac"];
}else{
    $bus->idCarac = "nada";
}
if(isset($_POST["destConst"])){
    $bus->destConst = $_POST["destConst"];
}else{
    $bus->destConst = "nada";
}
if(isset($_POST["estConst"])){
    $bus->estConst = $_POST["estConst"];
}else{
    $bus->estConst = "nada";
}
if(isset($_POST["pareTipoInmue"])){
    $bus->pareTipoInmue = $_POST["pareTipoInmue"];
}else{
    $bus->pareTipoInmue = "nada";
}
if(isset($_POST["pareAcaInmue"])){
    $bus->pareAcaInmue = $_POST["pareAcaInmue"];
}else{
    $bus->pareAcaInmue = "nada";
}
if(isset($_POST["pintConst"])){
    $bus->pintConst = $_POST["pintConst"];
}else{
    $bus->pintConst = "nada";
}
if(isset($_POST["estConserv"])){
    $bus->estConserv = $_POST["estConserv"];
}else{
    $bus->estConserv = "nada";
}
if(isset($_POST["techoConst"])){
    $bus->techoConst = $_POST["techoConst"];
}else{
    $bus->techoConst = "nada";
}
if(isset($_POST["pisosConst"])){
    $bus->pisosConst = $_POST["pisosConst"];
}else{
    $bus->pisosConst = "nada";
}
if(isset($_POST["piezConst"])){
    $bus->piezConst = $_POST["piezConst"];
}else{
    $bus->piezConst = "nada";
}
if(isset($_POST["ventConst"])){
    $bus->ventConst = $_POST["ventConst"];
}else{
    $bus->ventConst = "nada";
}
if(isset($_POST["puertConst"])){
    $bus->puertConst = $_POST["puertConst"];
}else{
    $bus->puertConst = "nada";
}
if(isset($_POST["instElect"])){
    $bus->instElect = $_POST["instElect"];
}else{
    $bus->instElect = "nada";
}
if(isset($_POST["ambConst"])){
    $bus->ambConst = $_POST["ambConst"];
}else{
    $bus->ambConst = "nada";
}
if(isset($_POST["compConst"])){
    $bus->compConst = $_POST["compConst"];
}else{
    $bus->compConst = "nada";
}
if(isset($_POST["obsConst"])){
    $bus->obsConst = $_POST["obsConst"];
}else{
    $bus->obsConst = "nada";
}
if(isset($_POST["idCaracConst"])){
    $bus->idCaracConst = $_POST["idCaracConst"];
}else{
    $bus->idCaracConst = "nada";
}
if(isset($_POST["docDebConst"])){
    $bus->docDebConst = $_POST["docDebConst"];
}else{
    $bus->docDebConst = "nada";
}
if(isset($_POST["direcProtConst"])){
    $bus->direcProtConst = $_POST["direcProtConst"];
}else{
    $bus->direcProtConst = "nada";
}
if(isset($_POST["numProtConst"])){
    $bus->numProtConst = $_POST["numProtConst"];
}else{
    $bus->numProtConst = "nada";
}
if(isset($_POST["tomoProtConst"])){
    $bus->tomoProtConst = $_POST["tomoProtConst"];
}else{
    $bus->tomoProtConst = "nada";
}
if(isset($_POST["folioProtConst"])){
    $bus->folioProtConst = $_POST["folioProtConst"];
}else{
    $bus->folioProtConst = "nada";
}
if(isset($_POST["protoConst"])){
    $bus->protoConst = $_POST["protoConst"];
}else{
    $bus->protoConst = "nada";
}
if(isset($_POST["trimProtConst"])){
    $bus->trimProtConst = $_POST["trimProtConst"];
}else{
    $bus->trimProtConst = "nada";
}
if(isset($_POST["dateProtConst"])){
    $bus->dateProtConst = $_POST["dateProtConst"];
}else{
    $bus->dateProtConst = "nada";
}
if(isset($_POST["valorProtConst"])){
    $bus->valorProtConst = $_POST["valorProtConst"];
}else{
    $bus->valorProtConst = "nada";
}
if(isset($_POST["idProto"])){
    $bus->idProto = $_POST["idProto"];
}else{
    $bus->idProto = "nada";
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
if($secciones=="Inmueble"){
    $bus->modifInmueble();
}
if($secciones == "Caract Terreno"){
    $bus->modifcarcTerreno();
}
if($secciones == "Caract Construccion"){
    $bus->modifcarcConstruccion();
}
if($secciones == "Protocolizacion"){
    $bus->modificarProtocol();
}
if($accion == "actProp"){
    $bus->actProp();
}
if($accion == "cambSecMod"){
    $bus->cambSecMod();
}
if($accion == "actInmue"){
    $bus->actInmue();
}
if($accion=="actCaracInmue"){
    $bus->actCaracInmue();
}
if($accion=="actConst"){
    $bus->actConst();
}
if($accion=="actProtocol"){
    $bus->actProtocol();
}

if($_POST["parrInmue2"]=="Capital"){
    $bus->cambSecMod();
}
if($_POST["parrInmue2"]=="Dr. Alberto Adriani"){
    $bus->cambSecMod();
}
if($_POST["parrInmue2"] =="Santo Domingo"){
    $bus->cambSecMod();
}
?>