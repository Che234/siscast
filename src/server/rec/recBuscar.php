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
if(isset($_POST['idInmue'])){
    $bus->idInmue= $_POST['idInmue'];
}else{
    $bus->idInmue= "nada";
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
if(isset($_POST["n_gen"])){
    $bus->n_gen = $_POST["n_gen"];
}else{
    $bus->n_gen = "nada";
}
if(isset($_POST["s_gen"])){
    $bus->s_gen = $_POST["s_gen"];
}else{
    $bus->s_gen = "nada";
}
if(isset($_POST["e_gen"])){
    $bus->e_gen = $_POST["e_gen"];
}else{
    $bus->e_gen = "nada";
}
if(isset($_POST["o_gen"])){
    $bus->o_gen = $_POST["o_gen"];
}else{
    $bus->o_gen = "nada";
}
if(isset($_POST["alindN_gen"])){
    $bus->alindN_gen = $_POST["alindN_gen"];
}else{
    $bus->alindN_gen = "nada";
}
if(isset($_POST["alindS_gen"])){
    $bus->alindS_gen = $_POST["alindS_gen"];
}else{
    $bus->alindS_gen = "nada";
}
if(isset($_POST["alindE_gen"])){
    $bus->alindE_gen = $_POST["alindE_gen"];
}else{
    $bus->alindE_gen = "nada";
}
if(isset($_POST["alindO_gen"])){
    $bus->alindO_gen = $_POST["alindO_gen"];
}else{
    $bus->alindO_gen = "nada";
}
if(isset($_POST["area_gen"])){
    $bus->area_gen = $_POST["area_gen"];
}else{
    $bus->area_gen = "nada";
}
if(isset($_POST["niveles_gen"])){
    $bus->niveles_gen = $_POST["niveles_gen"];
}else{
    $bus->niveles_gen = "nada";
}
if(isset($_POST["areaConst_gen"])){
    $bus->areaConst_gen = $_POST["areaConst_gen"];
}else{
    $bus->areaConst_gen = "nada";
}
if(isset($_POST["uniN_gen"])){
    $bus->uniN_gen = $_POST["uniN_gen"];
}else{
    $bus->uniN_gen = "nada";
}
if(isset($_POST["uniS_gen"])){
    $bus->uniS_gen = $_POST["uniS_gen"];
}else{
    $bus->uniS_gen = "nada";
}
if(isset($_POST["uniE_gen"])){
    $bus->uniE_gen = $_POST["uniE_gen"];
}else{
    $bus->uniE_gen = "nada";
}
if(isset($_POST["uniO_gen"])){
    $bus->uniO_gen = $_POST["uniO_gen"];
}else{
    $bus->uniO_gen = "nada";
}
if(isset($_POST["idGen"])){
    $bus->idGen = $_POST["idGen"];
}else{
    $bus->idGen = "nada";
}
if(isset($_POST["n_posventa"])){
    $bus->n_posventa = $_POST["n_posventa"];
}else{
    $bus->n_posventa = "nada";
}
if(isset($_POST["s_posVenta"])){
    $bus->s_posVenta = $_POST["s_posVenta"];
}else{
    $bus->s_posVenta = "nada";
}
if(isset($_POST["e_posVenta"])){
    $bus->e_posVenta = $_POST["e_posVenta"];
}else{
    $bus->e_posVenta = "nada";
}
if(isset($_POST["o_posVenta"])){
    $bus->o_posVenta = $_POST["o_posVenta"];
}else{
    $bus->o_posVenta = "nada";
}
if(isset($_POST["alindN_posVenta"])){
    $bus->alindN_posVenta = $_POST["alindN_posVenta"];
}else{
    $bus->alindN_posVenta = "nada";
}
if(isset($_POST["alindS_posVenta"])){
    $bus->alindS_posVenta = $_POST["alindS_posVenta"];
}else{
    $bus->alindS_posVenta = "nada";
}
if(isset($_POST["alindE_posVenta"])){
    $bus->alindE_posVenta = $_POST["alindE_posVenta"];
}else{
    $bus->alindE_posVenta = "nada";
}
if(isset($_POST["alindO_posVenta"])){
    $bus->alindO_posVenta = $_POST["alindO_posVenta"];
}else{
    $bus->alindO_posVenta = "nada";
}
if(isset($_POST["area_posVenta"])){
    $bus->area_posVenta = $_POST["area_posVenta"];
}else{
    $bus->area_posVenta = "nada";
}
if(isset($_POST["niveles_posVenta"])){
    $bus->niveles_posVenta = $_POST["niveles_posVenta"];
}else{
    $bus->niveles_posVenta = "nada";
}
if(isset($_POST["areaConst_posVenta"])){
    $bus->areaConst_posVenta = $_POST["areaConst_posVenta"];
}else{
    $bus->areaConst_posVenta = "nada";
}
if(isset($_POST["uniN_posVenta"])){
    $bus->uniN_posVenta = $_POST["uniN_posVenta"];
}else{
    $bus->uniN_posVenta = "nada";
}
if(isset($_POST["uniS_posVenta"])){
    $bus->uniS_posVenta = $_POST["uniS_posVenta"];
}else{
    $bus->uniS_posVenta = "nada";
}
if(isset($_POST["uniE_posVenta"])){
    $bus->uniE_posVenta = $_POST["uniE_posVenta"];
}else{
    $bus->uniE_posVenta = "nada";
}
if(isset($_POST["uniO_posVenta"])){
    $bus->uniO_posVenta = $_POST["uniO_posVenta"];
}else{
    $bus->uniO_posVenta = "nada";
}
if(isset($_POST["uniO_posVenta"])){
    $bus->uniO_posVenta = $_POST["uniO_posVenta"];
}else{
    $bus->uniO_posVenta = "nada";
}
if(isset($_POST["idPosVenta"])){
    $bus->idPosVenta = $_POST["idPosVenta"];
}else{
    $bus->idPosVenta = "nada";
}
if(isset($_POST["idlindGen"])){
    $bus->idlindGen = $_POST["idlindGen"];
}else{
    $bus->idlindGen = "nada";
}
if(isset($_POST["idlindDocumento"])){
    $bus->idlindDocumento = $_POST["idlindDocumento"];
}else{
    $bus->idlindDocumento = "nada";
}
if(isset($_POST["nortGen"])){
    $bus->nortGen = $_POST["nortGen"];
}else{
    $bus->nortGen = "nada";
}
if(isset($_POST["uniNorte"])){
    $bus->uniNorte = $_POST["uniNorte"];
}else{
    $bus->uniNorte = "nada";
}
if(isset($_POST["alindNort"])){
    $bus->alindNort = $_POST["alindNort"];
}else{
    $bus->alindNort = "nada";
}
if(isset($_POST["surGen"])){
    $bus->surGen = $_POST["surGen"];
}else{
    $bus->surGen = "nada";
}
if(isset($_POST["uniSur"])){
    $bus->uniSur = $_POST["uniSur"];
}else{
    $bus->uniSur = "nada";
}
if(isset($_POST["alindSur"])){
    $bus->alindSur = $_POST["alindSur"];
}else{
    $bus->alindSur = "nada";
}
if(isset($_POST["esteGen"])){
    $bus->esteGen = $_POST["esteGen"];
}else{
    $bus->esteGen = "nada";
}
if(isset($_POST["uniEste"])){
    $bus->uniEste = $_POST["uniEste"];
}else{
    $bus->uniEste = "nada";
}
if(isset($_POST["alindEste"])){
    $bus->alindEste = $_POST["alindEste"];
}else{
    $bus->alindEste = "nada";
}
if(isset($_POST["oesteGen"])){
    $bus->oesteGen = $_POST["oesteGen"];
}else{
    $bus->oesteGen = "nada";
}
if(isset($_POST["uniOeste"])){
    $bus->uniOeste = $_POST["uniOeste"];
}else{
    $bus->uniOeste = "nada";
}
if(isset($_POST["alindOeste"])){
    $bus->alindOeste = $_POST["alindOeste"];
}else{
    $bus->alindOeste = "nada";
}
if(isset($_POST["arTotal"])){
    $bus->arTotal = $_POST["arTotal"];
}else{
    $bus->arTotal = "nada";
}
if(isset($_POST["NivConstTotal"])){
    $bus->NivConstTotal = $_POST["NivConstTotal"];
}else{
    $bus->NivConstTotal = "nada";
}
if(isset($_POST["arConstTotal"])){
    $bus->arConstTotal = $_POST["arConstTotal"];
}else{
    $bus->arConstTotal = "nada";
}
if(isset($_POST["nortPosVenta"])){
    $bus->nortPosVenta = $_POST["nortPosVenta"];
}else{
    $bus->nortPosVenta = "nada";
}
if(isset($_POST["uniNorte2"])){
    $bus->uniNorte2 = $_POST["uniNorte2"];
}else{
    $bus->uniNorte2 = "nada";
}
if(isset($_POST["alindPosNort"])){
    $bus->alindPosNort = $_POST["alindPosNort"];
}else{
    $bus->alindPosNort = "nada";
}
if(isset($_POST["surPosVenta"])){
    $bus->surPosVenta = $_POST["surPosVenta"];
}else{
    $bus->surPosVenta = "nada";
}
if(isset($_POST["uniSur2"])){
    $bus->uniSur2 = $_POST["uniSur2"];
}else{
    $bus->uniSur2 = "nada";
}
if(isset($_POST["alindPosSur"])){
    $bus->alindPosSur = $_POST["alindPosSur"];
}else{
    $bus->alindPosSur = "nada";
}
if(isset($_POST["estePosVenta"])){
    $bus->estePosVenta = $_POST["estePosVenta"];
}else{
    $bus->estePosVenta = "nada";
}
if(isset($_POST["uniEste2"])){
    $bus->uniEste2 = $_POST["uniEste2"];
}else{
    $bus->uniEste2 = "nada";
}
if(isset($_POST["alindPosEste"])){
    $bus->alindPosEste = $_POST["alindPosEste"];
}else{
    $bus->alindPosEste = "nada";
}
if(isset($_POST["oestePosVenta"])){
    $bus->oestePosVenta = $_POST["oestePosVenta"];
}else{
    $bus->oestePosVenta = "nada";
}
if(isset($_POST["uniOeste2"])){
    $bus->uniOeste2 = $_POST["uniOeste2"];
}else{
    $bus->uniOeste2 = "nada";
}
if(isset($_POST["alindPosOeste"])){
    $bus->alindPosOeste = $_POST["alindPosOeste"];
}else{
    $bus->alindPosOeste = "nada";
}
if(isset($_POST["arTotal2"])){
    $bus->arTotal2 = $_POST["arTotal2"];
}else{
    $bus->arTotal2 = "nada";
}
if(isset($_POST["NivConstTotal2"])){
    $bus->NivConstTotal2 = $_POST["NivConstTotal2"];
}else{
    $bus->NivConstTotal2 = "nada";
}
if(isset($_POST["arConstTotal2"])){
    $bus->arConstTotal2 = $_POST["arConstTotal2"];
}else{
    $bus->arConstTotal2 = "nada";
}
if(isset($_POST["nortSecDoc"])){
    $bus->nortSecDoc = $_POST["nortSecDoc"];
}else{
    $bus->nortSecDoc = "nada";
}
if(isset($_POST["uniNorte3"])){
    $bus->uniNorte3 = $_POST["uniNorte3"];
}else{
    $bus->uniNorte3 = "nada";
}
if(isset($_POST["alindSecNorte"])){
    $bus->alindSecNorte = $_POST["alindSecNorte"];
}else{
    $bus->alindSecNorte = "nada";
}
if(isset($_POST["surSecDoc"])){
    $bus->surSecDoc = $_POST["surSecDoc"];
}else{
    $bus->surSecDoc = "nada";
}
if(isset($_POST["uniSur3"])){
    $bus->uniSur3 = $_POST["uniSur3"];
}else{
    $bus->uniSur3 = "nada";
}
if(isset($_POST["alindSecSur"])){
    $bus->alindSecSur = $_POST["alindSecSur"];
}else{
    $bus->alindSecSur = "nada";
}
if(isset($_POST["esteSecDoc"])){
    $bus->esteSecDoc = $_POST["esteSecDoc"];
}else{
    $bus->esteSecDoc = "nada";
}
if(isset($_POST["uniEste3"])){
    $bus->uniEste3 = $_POST["uniEste3"];
}else{
    $bus->uniEste3 = "nada";
}
if(isset($_POST["alindSecEste"])){
    $bus->alindSecEste = $_POST["alindSecEste"];
}else{
    $bus->alindSecEste = "nada";
}
if(isset($_POST["oesteSecDoc"])){
    $bus->oesteSecDoc = $_POST["oesteSecDoc"];
}else{
    $bus->oesteSecDoc = "nada";
}
if(isset($_POST["uniOeste3"])){
    $bus->uniOeste3 = $_POST["uniOeste3"];
}else{
    $bus->uniOeste3 = "nada";
}
if(isset($_POST["alindSecOeste"])){
    $bus->alindSecOeste = $_POST["alindSecOeste"];
}else{
    $bus->alindSecOeste = "nada";
}
if(isset($_POST["arTotal3"])){
    $bus->arTotal3 = $_POST["arTotal3"];
}else{
    $bus->arTotal3 = "nada";
}
if(isset($_POST["NivConstTotal3"])){
    $bus->NivConstTotal3 = $_POST["NivConstTotal3"];
}else{
    $bus->NivConstTotal3 = "nada";
}
if(isset($_POST["arConstTotal3"])){
    $bus->arConstTotal3 = $_POST["arConstTotal3"];
}else{
    $bus->arConstTotal3 = "nada";
}
if(isset($_POST["idlindGen"])){
    $bus->idlindGen = $_POST["idlindGen"];
}else{
    $bus->idlindGen = "nada";
}
if(isset($_POST["idlindPosVenta"])){
    $bus->idlindPosVenta = $_POST["idlindPosVenta"];
}else{
    $bus->idlindPosVenta = "nada";
}
if(isset($_POST["idlindDocumento"])){
    $bus->idlindDocumento = $_POST["idlindDocumento"];
}else{
    $bus->idlindDocumento = "nada";
}
if(isset($_POST["idTerreno"])){
    $bus->idTerreno = $_POST["idTerreno"];
}else{
    $bus->idTerreno = "nada";
}
if(isset($_POST["Acue"])){
    $bus->Acue = $_POST["Acue"];
}else{
    $bus->Acue = "nada";
}
if(isset($_POST["AcueRural"])){
    $bus->AcueRural = $_POST["AcueRural"];
}else{
    $bus->AcueRural = "nada";
}
if(isset($_POST["AguasServ"])){
    $bus->AguasServ = $_POST["AguasServ"];
}else{
    $bus->AguasServ = "nada";
}
if(isset($_POST["PavFlex"])){
    $bus->PavFlex = $_POST["PavFlex"];
}else{
    $bus->PavFlex = "nada";
}
if(isset($_POST["PavRig"])){
    $bus->PavRig = $_POST["PavRig"];
}else{
    $bus->PavRig = "nada";
}
if(isset($_POST["viaEngran"])){
    $bus->viaEngran = $_POST["viaEngran"];
}else{
    $bus->viaEngran = "nada";
}
if(isset($_POST["acera"])){
    $bus->acera = $_POST["acera"];
}else{
    $bus->acera = "nada";
}
if(isset($_POST["AlumPublico"])){
    $bus->AlumPublico = $_POST["AlumPublico"];
}else{
    $bus->AlumPublico = "nada";
}
if(isset($_POST["aseo"])){
    $bus->aseo = $_POST["aseo"];
}else{
    $bus->aseo = "nada";
}
if(isset($_POST["transPublic"])){
    $bus->transPublic = $_POST["transPublic"];
}else{
    $bus->transPublic = "nada";
}
if(isset($_POST["pozoSept"])){
    $bus->pozoSept = $_POST["pozoSept"];
}else{
    $bus->pozoSept = "nada";
}
if(isset($_POST["ElectResidencial"])){
    $bus->ElectResidencial = $_POST["ElectResidencial"];
}else{
    $bus->ElectResidencial = "nada";
}
if(isset($_POST["ElectriIndust"])){
    $bus->ElectriIndust = $_POST["ElectriIndust"];
}else{
    $bus->ElectriIndust = "nada";
}
if(isset($_POST["linTelf"])){
    $bus->linTelf = $_POST["linTelf"];
}else{
    $bus->linTelf = "nada";
}
if(isset($_POST["idServ"])){
    $bus->idServ = $_POST["idServ"];
}else{
    $bus->idServ = "nada";
}
if(isset($_POST["montoFact"])){
    $bus->montoFact = $_POST["montoFact"];
}else{
    $bus->montoFact = "nada";
}
if(isset($_POST["numFact"])){
    $bus->numFact = $_POST["numFact"];
}else{
    $bus->numFact = "nada";
}
if(isset($_POST["fechFact"])){
    $bus->fechFact = $_POST["fechFact"];
}else{
    $bus->fechFact = "nada";
}
if(isset($_POST["tipoCed"])){
    $bus->tipoCed = $_POST["tipoCed"];
}else{
    $bus->tipoCed = "nada";
}
if(isset($_POST["numFactHid"])){
    $bus->numFactHid = $_POST["numFactHid"];
}else{
    $bus->numFactHid = "nada";
}
if(isset($_POST["fechFact"])){
    $bus->fechFact = $_POST["fechFact"];
}else{
    $bus->fechFact = "nada";
}
if(isset($_POST["puntNorte"])){
    $bus->puntNorte = $_POST["puntNorte"];
}else{
    $bus->puntNorte = "nada";
}
if(isset($_POST["puntSur"])){
    $bus->puntSur = $_POST["puntSur"];
}else{
    $bus->puntSur = "nada";
}
if(isset($_POST["puntEste"])){
    $bus->puntEste = $_POST["puntEste"];
}else{
    $bus->puntEste = "nada";
}
if(isset($_POST["puntOeste"])){
    $bus->puntOeste = $_POST["puntOeste"];
}else{
    $bus->puntOeste = "nada";
}
if(isset($_POST["uniAreaT"])){
    $bus->uniAreaT = $_POST["uniAreaT"];
}else{
    $bus->uniAreaT = "nada";
}
if(isset($_POST["uniAreaConst"])){
    $bus->uniAreaConst = $_POST["uniAreaConst"];
}else{
    $bus->uniAreaConst = "nada";
}
if(isset($_POST["puntNorte2"])){
    $bus->puntNorte2 = $_POST["puntNorte2"];
}else{
    $bus->puntNorte2 = "nada";
}
if(isset($_POST["puntSur2"])){
    $bus->puntSur2 = $_POST["puntSur2"];
}else{
    $bus->puntSur2 = "nada";
}
if(isset($_POST["puntEste2"])){
    $bus->puntEste2 = $_POST["puntEste2"];
}else{
    $bus->puntEste2 = "nada";
}
if(isset($_POST["puntOeste2"])){
    $bus->puntOeste2 = $_POST["puntOeste2"];
}else{
    $bus->puntOeste2 = "nada";
}
if(isset($_POST["uniAreaT2"])){
    $bus->uniAreaT2 = $_POST["uniAreaT2"];
}else{
    $bus->uniAreaT2 = "nada";
}
if(isset($_POST["uniAreaConst2"])){
    $bus->uniAreaConst2 = $_POST["uniAreaConst2"];
}else{
    $bus->uniAreaConst2 = "nada";
}
if(isset($_POST["puntNorte3"])){
    $bus->puntNorte3 = $_POST["puntNorte3"];
}else{
    $bus->puntNorte3 = "nada";
}
if(isset($_POST["puntSur3"])){
    $bus->puntSur3 = $_POST["puntSur3"];
}else{
    $bus->puntSur3 = "nada";
}
if(isset($_POST["puntEste3"])){
    $bus->puntEste3 = $_POST["puntEste3"];
}else{
    $bus->puntEste3 = "nada";
}
if(isset($_POST["puntOeste3"])){
    $bus->puntOeste3 = $_POST["puntOeste3"];
}else{
    $bus->puntOeste3 = "nada";
}
if(isset($_POST["uniAreaT3"])){
    $bus->uniAreaT3 = $_POST["uniAreaT3"];
}else{
    $bus->uniAreaT3 = "nada";
}
if(isset($_POST["uniAreaConst3"])){
    $bus->uniAreaConst3 = $_POST["uniAreaConst3"];
}else{
    $bus->uniAreaConst3 = "nada";
}
if(isset($_POST["ano_construc"])){
    $bus->ano_construc = $_POST["ano_construc"];
}else{
    $bus->ano_construc = "nada";
}
if(isset($_POST["ano_refac"])){
    $bus->ano_refac = $_POST["ano_refac"];
}else{
    $bus->ano_refac = "nada";
}
if(isset($_POST["edadEfec"])){
    $bus->edadEfec = $_POST["edadEfec"];
}else{
    $bus->edadEfec = "nada";
}
if(isset($_POST["numPlata"])){
    $bus->numPlata = $_POST["numPlata"];
}else{
    $bus->numPlata = "nada";
}
if(isset($_POST["numVivienda"])){
    $bus->numVivienda = $_POST["numVivienda"];
}else{
    $bus->numVivienda = "nada";
}
if(isset($_POST["porFina"])){
    $bus->porFina = $_POST["porFina"];
}else{
    $bus->porFina = "nada";
}
if(isset($_POST["porceEcon"])){
    $bus->porceEcon = $_POST["porceEcon"];
}else{
    $bus->porceEcon = "nada";
}
if(isset($_POST["banera"])){
    $bus->banera = $_POST["banera"];
}else{
    $bus->banera = "nada";
}
if(isset($_POST["calentador"])){
    $bus->calentador = $_POST["calentador"];
}else{
    $bus->calentador = "nada";
}
if(isset($_POST["wc"])){
    $bus->wc = $_POST["wc"];
}else{
    $bus->wc = "nada";
}
if(isset($_POST["bidet"])){
    $bus->bidet = $_POST["bidet"];
}else{
    $bus->bidet = "nada";
}
if(isset($_POST["ducha"])){
    $bus->ducha = $_POST["ducha"];
}else{
    $bus->ducha = "nada";
}
if(isset($_POST["urinario"])){
    $bus->urinario = $_POST["urinario"];
}else{
    $bus->urinario = "nada";
}
if(isset($_POST["entamFina"])){
    $bus->entamFina = $_POST["entamFina"];
}else{
    $bus->entamFina = "nada";
}
if(isset($_POST["entamEcon"])){
    $bus->entamEcon = $_POST["entamEcon"];
}else{
    $bus->entamEcon = "nada";
}
if(isset($_POST["madeCepil"])){
    $bus->madeCepil = $_POST["madeCepil"];
}else{
    $bus->madeCepil = "nada";
}
if(isset($_POST["hierro"])){
    $bus->hierro = $_POST["hierro"];
}else{
    $bus->hierro = "nada";
}
if(isset($_POST["dormit"])){
    $bus->dormit = $_POST["dormit"];
}else{
    $bus->dormit = "nada";
}
if(isset($_POST["comedor"])){
    $bus->comedor = $_POST["comedor"];
}else{
    $bus->comedor = "nada";
}
if(isset($_POST["sala"])){
    $bus->sala = $_POST["sala"];
}else{
    $bus->sala = "nada";
}
if(isset($_POST["banos"])){
    $bus->banos = $_POST["banos"];
}else{
    $bus->banos = "nada";
}
if(isset($_POST["Cocina"])){
    $bus->Cocina = $_POST["Cocina"];
}else{
    $bus->Cocina = "nada";
}
if(isset($_POST["Servicio"])){
    $bus->Servicio = $_POST["Servicio"];
}else{
    $bus->Servicio = "nada";
}
if(isset($_POST["oficina"])){
    $bus->oficina = $_POST["oficina"];
}else{
    $bus->oficina = "nada";
}
if(isset($_POST["garaje"])){
    $bus->garaje = $_POST["garaje"];
}else{
    $bus->garaje = "nada";
}
if(isset($_POST["estac"])){
    $bus->estac = $_POST["estac"];
}else{
    $bus->estac = "nada";
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
if($secciones == "Linderos"){
    $bus->modifLinderos();
}
if($secciones == "Areas Terreno"){
    $bus->modifAreaTerreno();
}
if($secciones == "Servicios"){
    $bus->modifServi();
}
if($secciones == "Factura"){
    $bus->modifFact();
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
if($accion=="mostInsp"){
    $bus->mostInsp();
}
if($accion=="mostLindVenta"){
    $bus->mostLindVenta();
}
if($accion=="actLindVenta"){
    $bus->actLindVenta();
}
if($accion=="mostLindDoc"){
    $bus->mostLindDoc();
}
if($accion=="actLindDoc"){
    $bus->actLindDoc();
}
if($accion=="guarActLind"){
    $bus->guarActLind();
}
if($accion=="guarActServ"){
    $bus->guarActServ();
}
if($accion=="guarActFact"){
    $bus->guarActFact();
}
if($accion=="actEstConst"){
    $bus->actEstConst();
}
if($accion=="elimGen"){
    $bus->elimGen();
}

if($accion=="pagarInmue"){
    $bus->pagarInmue();
}
if($accion=="verPagos"){
    $bus->verPagos();
}
if($accion=="formPagosInmue"){
    $bus->formPagosInmue();
}
if($accion=="eliminarBus"){
    $bus->eliminarBus();
}
if($accion=="mostConserv"){
    $bus->modifEstConserv();
}
if($accion=="mostPiezSant"){
    $bus->mostPiezSant();
}
if($accion=="actPiez"){
    $bus->actPiez();
}
if($accion=="mostPuert"){
    $bus->mostPuert();
}
if($accion=="mostAmbien"){
    $bus->mostAmbien();
}
if($accion=="actPuertas"){
    $bus->actPuertas();
}
if($accion=="actAmbien"){
    $bus->actAmbien();
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