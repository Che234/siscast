<?php

include('../constancias.php');
include('../f002.php');

$nconst = new constancias;
$f002 = new f002;
$f001 = new f001;
$f003 = new f003;
$f004 = new f004;


if(isset($_POST["accion"])){
    $accion= $_POST["accion"];
}else{
    $accion= "nada";
}
//PRIMERA PARTE
    if(isset($_POST["recFact"])){
        $nconst->recFact= $_POST["recFact"];
    }else{
        $nconst->recFact= "nada";
    }
    if(isset($_POST["cedFul"])){
        $nconst->cedFul= $_POST["cedFul"];
    }else{
        $nconst->cedFul= "nada";
    }
    if(isset($_POST["rifConst"])){
        $nconst->rifConst= $_POST["rifConst"];
    }else{
        $nconst->rifConst= "nada";
    }
    if(isset($_POST["nomProp"])){
        $nconst->nomProp= $_POST["nomProp"];
    }else{
        $nconst->nomProp= "nada";
    }
    if(isset($_POST["apelProp"])){
        $nconst->apelProp= $_POST["apelProp"];
    }else{
        $nconst->apelProp= "nada";
    }
    if(isset($_POST["codTelf"])){
        $nconst->codTelf= $_POST["codTelf"];
    }else{
        $nconst->codTelf= "nada";
    }
    if(isset($_POST["numText"])){
        $nconst->numText= $_POST["numText"];
    }else{
        $nconst->numText= "nada";
    }
    if(isset($_POST["direcProp"])){
        $nconst->direcProp= $_POST["direcProp"];
    }else{
        $nconst->direcProp= "nada";
    }
    if(isset($_POST["codTelf2"])){
        $nconst->codTelf2= $_POST["codTelf2"];
    }else{
        $nconst->codTelf2= "nada";
    }
    if(isset($_POST["telfFull2"])){
        $nconst->telfFull2= $_POST["telfFull2"];
    }
    if(isset($_POST["telfFull"])){
        $nconst->telfFull = $_POST["telfFull"];
    }
    if(isset($_POST["numTelf2"])){
        $nconst->numTelf2= $_POST["numTelf2"];
    }else{
        $nconst->numTelf2= "nada";
    }
    if(isset($_POST["parrInmue"])){
        $nconst->parrInmue= $_POST["parrInmue"];
    }else{
        $nconst->parrInmue= "nada";
    }
    if(isset($_POST["secInmue"])){
        $nconst->secInmue= $_POST["secInmue"];
    }else{
        $nconst->secInmue= "nada";
    }
    if(isset($_POST["direcInmue"])){
        $nconst->direcInmue= $_POST["direcInmue"];
    }else{
        $nconst->direcInmue= "nada";
    }
    if(isset($_POST["topoConst"])){
        $nconst->topoConst= $_POST["topoConst"];
    }else{
        $nconst->topoConst= "nada";
    }
    if(isset($_POST["formaConst"])){
        $nconst->formaConst= $_POST["formaConst"];
    }else{
        $nconst->formaConst= "nada";
    }
    if(isset($_POST["servPublic"])){
        $nconst->servPublic= $_POST["servPublic"];
    }else{
        $nconst->servPublic= "nada";
    }
    if(isset($_POST["usoConst"])){
        $nconst->usoConst= $_POST["usoConst"];
    }else{
        $nconst->usoConst= "nada";
    }
    if(isset($_POST["tenenConst"])){
        $nconst->tenenConst= $_POST["tenenConst"];
    }else{
        $nconst->tenenConst= "nada";
    }
    if(isset($_POST["regInmue"])){
        $nconst->regInmue=$_POST["regInmue"];
    }else{
        $nconst->regInmue= "nada";
    }
    if(isset($_POST["ambInmue"])){
        $nconst->ambInmue=$_POST["ambInmue"];
    }else{
        $nconst->ambInmue= "nada";
    }

/* PARTE 2 DEL REGISTRO */
    if(isset($_POST["destConst"])){
        $nconst->destConst= $_POST["destConst"];
    }else{
        $nconst->destConst= "nada";
    }
    if(isset($_POST["estConst"])){
        $nconst->estConst= $_POST["estConst"];
    }else{
        $nconst->estConst= "nada";
    }
    if(isset($_POST["pareTipoInmue"])){
        $nconst->pareTipoInmue= $_POST["pareTipoInmue"];
    }else{
        $nconst->pareTipoInmue= "nada";
    }
    if(isset($_POST["pareAcaInmue"])){
        $nconst->pareAcaInmue= $_POST["pareAcaInmue"];
    }else{
        $nconst->pareAcaInmue= "nada";
    }
    if(isset($_POST["pintConst"])){
        $nconst->pintConst= $_POST["pintConst"];
    }else{
        $nconst->pintConst= "nada";
    }
    if(isset($_POST["techoConst"])){
        $nconst->techoConst= $_POST["techoConst"];
    }else{
        $nconst->techoConst= "nada";
    }
    if(isset($_POST["pisosConst"])){
        $nconst->pisosConst= $_POST["pisosConst"];
    }else{
        $nconst->pisosConst= "nada";
    }
    if(isset($_POST["piezConst"])){
        $nconst->piezConst= $_POST["piezConst"];
    }else{
        $nconst->piezConst= "nada";
    }
    if(isset($_POST["ventConst"])){
        $nconst->ventConst= $_POST["ventConst"];
    }else{
        $nconst->ventConst= "nada";
    }
    if(isset($_POST["puertConst"])){
        $nconst->puertConst= $_POST["puertConst"];
    }else{
        $nconst->puertConst= "nada";
    }
    if(isset($_POST["instElect"])){
        $nconst->instElect= $_POST["instElect"];
    }else{
        $nconst->instElect= "nada";
    }
    if(isset($_POST["ambConst"])){
        $nconst->ambConst= $_POST["ambConst"];
    }else{
        $nconst->ambConst= "nada";
    }
    if(isset($_POST["compConst"])){
        $nconst->compConst= $_POST["compConst"];
    }else{
        $nconst->compConst= "nada";
    }
    if(isset($_POST["estConserv"])){
        $nconst->estConserv= $_POST["estConserv"];
    }else{
        $nconst->estConserv= "nada";
    }
    if(isset($_POST["obsConst"])){
        $nconst->obsConst= $_POST["obsConst"];
    }else{
        $nconst->obsConst= "nada";
    }
    if(isset($_POST["docDebConst"])){
        $nconst->docDebConst= $_POST["docDebConst"];
    }else{
        $nconst->docDebConst= "nada";
    }
    if(isset($_POST["direcProtConst"])){
        $nconst->direcProtConst= $_POST["direcProtConst"];
    }else{
        $nconst->direcProtConst= "nada";
    }
    if(isset($_POST["numProtConst"])){
        $nconst->numProtConst= $_POST["numProtConst"];
    }else{
        $nconst->numProtConst= "nada";
    }
    if(isset($_POST["tomoProtConst"])){
        $nconst->tomoProtConst= $_POST["tomoProtConst"];
    }else{
        $nconst->tomoProtConst= "nada";
    }
    if(isset($_POST["folioProtConst"])){
        $nconst->folioProtConst= $_POST["folioProtConst"];
    }else{
        $nconst->folioProtConst= "nada";
    }
    if(isset($_POST["protoConst"])){
        $nconst->protoConst= $_POST["protoConst"];
    }else{
        $nconst->protoConst= "nada";
    }
    if(isset($_POST["trimProtConst"])){
        $nconst->trimProtConst= $_POST["trimProtConst"];
    }else{
        $nconst->trimProtConst= "nada";
    }
    if(isset($_POST["dateProtConst"])){
        $nconst->dateProtConst= $_POST["dateProtConst"];
    }else{
        $nconst->dateProtConst= "nada";
    }
    if(isset($_POST["valorProtConst"])){
        $nconst->valorProtConst= $_POST["valorProtConst"];
    }else{
        $nconst->valorProtConst= "nada";
    }
    if(isset($_POST["ano_construc"])){
        $nconst->ano_construc= $_POST["ano_construc"];
    }else{
        $nconst->ano_construc= "nada";
    }
    if(isset($_POST["ano_refac"])){
        $nconst->ano_refac= $_POST["ano_refac"];
    }else{
        $nconst->ano_refac= "nada";
    }
    if(isset($_POST["edadEfec"])){
        $nconst->edadEfec= $_POST["edadEfec"];
    }else{
        $nconst->edadEfec= "nada";
    }
    if(isset($_POST["numPlata"])){
        $nconst->numPlata= $_POST["numPlata"];
    }else{
        $nconst->numPlata= "nada";
    }
    if(isset($_POST["numVivienda"])){
        $nconst->numVivienda= $_POST["numVivienda"];
    }else{
        $nconst->numVivienda= "nada";
    }
    if(isset($_POST["porFina"])){
        $nconst->porFina= $_POST["porFina"];
    }else{
        $nconst->porFina= "nada";
    }
    if(isset($_POST["porceEcon"])){
        $nconst->porceEcon= $_POST["porceEcon"];
    }else{
        $nconst->porceEcon= "nada";
    }
    if(isset($_POST["banera"])){
        $nconst->banera= $_POST["banera"];
    }else{
        $nconst->banera= "nada";
    }
    if(isset($_POST["calentador"])){
        $nconst->calentador= $_POST["calentador"];
    }else{
        $nconst->calentador= "nada";
    }
    if(isset($_POST["wc"])){
        $nconst->wc= $_POST["wc"];
    }else{
        $nconst->wc= "nada";
    }
    if(isset($_POST["bidet"])){
        $nconst->bidet= $_POST["bidet"];
    }else{
        $nconst->bidet= "nada";
    }
    if(isset($_POST["lavamanos"])){
        $nconst->lavamanos= $_POST["lavamanos"];
    }else{
        $nconst->lavamanos= "nada";
    }
    if(isset($_POST["ducha"])){
        $nconst->ducha= $_POST["ducha"];
    }else{
        $nconst->ducha= "nada";
    }
    if(isset($_POST["urinario"])){
        $nconst->urinario= $_POST["urinario"];
    }else{
        $nconst->urinario= "nada";
    }

//PARTE 3 GUARDAR
    if(isset($_POST["entamFina"])){
        $nconst->entamFina=$_POST["entamFina"];
    }else{
        $nconst->entamFina= "nada";
    }
    if(isset($_POST["entamEcon"])){
        $nconst->entamEcon=$_POST["entamEcon"];
    }else{
        $nconst->entamEcon= "nada";
    }
    if(isset($_POST["madeCepil"])){
        $nconst->madeCepil=$_POST["madeCepil"];
    }else{
        $nconst->madeCepil= "nada";
    }
    if(isset($_POST["hierro"])){
        $nconst->hierro=$_POST["hierro"];
    }else{
        $nconst->hierro= "nada";
    }
    if(isset($_POST["puntNorte"])){
        $nconst->puntNorte=$_POST["puntNorte"];
    }else{
        $nconst->puntNorte= "nada";
    }
    if(isset($_POST["puntSur"])){
        $nconst->puntSur=$_POST["puntSur"];
    }else{
        $nconst->puntSur= "nada";
    }
    if(isset($_POST["puntEste"])){
        $nconst->puntEste=$_POST["puntEste"];
    }else{
        $nconst->puntEste= "nada";
    }
    if(isset($_POST["puntOeste"])){
        $nconst->puntOeste=$_POST["puntOeste"];
    }else{
        $nconst->puntOeste= "nada";
    }
    if(isset($_POST["puntNorte2"])){
        $nconst->puntNorte2=$_POST["puntNorte2"];
    }else{
        $nconst->puntNorte2= "nada";
    }
    if(isset($_POST["puntSur2"])){
        $nconst->puntSur2=$_POST["puntSur2"];
    }else{
        $nconst->puntSur2= "nada";
    }
    if(isset($_POST["puntEste2"])){
        $nconst->puntEste2=$_POST["puntEste2"];
    }else{
        $nconst->puntEste2= "nada";
    }
    if(isset($_POST["puntOeste2"])){
        $nconst->puntOeste2=$_POST["puntOeste2"];
    }else{
        $nconst->puntOeste2= "nada";
    }
    if(isset($_POST["puntNorte3"])){
        $nconst->puntNorte3=$_POST["puntNorte3"];
    }else{
        $nconst->puntNorte3= "nada";
    }
    if(isset($_POST["puntSur3"])){
        $nconst->puntSur3=$_POST["puntSur3"];
    }else{
        $nconst->puntSur3= "nada";
    }
    if(isset($_POST["puntEste3"])){
        $nconst->puntEste3=$_POST["puntEste3"];
    }else{
        $nconst->puntEste3= "nada";
    }
    if(isset($_POST["puntOeste3"])){
        $nconst->puntOeste3=$_POST["puntOeste3"];
    }else{
        $nconst->puntOeste3= "nada";
    }
    if(isset($_POST["parte1"])){
        $nconst->parte1=$_POST["parte1"];
    }else{
        $nconst->parte1= "nada";
    }
    if(isset($_POST["nortGen"])){
        $nconst->nortGen=$_POST["nortGen"];
    }else{
        $nconst->nortGen= "nada";
    }
    if(isset($_POST["alindNort"])){
        $nconst->alindNort=$_POST["alindNort"];
    }else{
        $nconst->alindNort= "nada";
    }
    if(isset($_POST["surGen"])){
        $nconst->surGen=$_POST["surGen"];
    }else{
        $nconst->surGen= "nada";
    }
    if(isset($_POST["alindSur"])){
        $nconst->alindSur=$_POST["alindSur"];
    }else{
        $nconst->alindSur= "nada";
    }
    if(isset($_POST["esteGen"])){
        $nconst->esteGen=$_POST["esteGen"];
    }else{
        $nconst->esteGen= "nada";
    }
    if(isset($_POST["alindEste"])){
        $nconst->alindEste=$_POST["alindEste"];
    }else{
        $nconst->alindEste= "nada";
    }
    if(isset($_POST["oesteGen"])){
        $nconst->oesteGen=$_POST["oesteGen"];
    }else{
        $nconst->oesteGen= "nada";
    }
    if(isset($_POST["alindOeste"])){
        $nconst->alindOeste=$_POST["alindOeste"];
    }else{
        $nconst->alindOeste= "nada";
    }
    if(isset($_POST["nortPosVenta"])){
        $nconst->nortPosVenta=$_POST["nortPosVenta"];
    }else{
        $nconst->nortPosVenta= "nada";
    }
    if(isset($_POST["alindPosNort"])){
        $nconst->alindPosNort=$_POST["alindPosNort"];
    }else{
        $nconst->alindPosNort= "nada";
    }
    if(isset($_POST["surPosVenta"])){
        $nconst->surPosVenta=$_POST["surPosVenta"];
    }else{
        $nconst->surPosVenta= "nada";
    }
    if(isset($_POST["alindPosSur"])){
        $nconst->alindPosSur=$_POST["alindPosSur"];
    }else{
        $nconst->alindPosSur= "nada";
    }
    if(isset($_POST["estePosVenta"])){
        $nconst->estePosVenta=$_POST["estePosVenta"];
    }else{
        $nconst->estePosVenta= "nada";
    }
    if(isset($_POST["alindPosEste"])){
        $nconst->alindPosEste=$_POST["alindPosEste"];
    }else{
        $nconst->alindPosEste= "nada";
    }
    if(isset($_POST["oestePosVenta"])){
        $nconst->oestePosVenta=$_POST["oestePosVenta"];
    }else{
        $nconst->oestePosVenta= "nada";
    }
    if(isset($_POST["alindPosOeste"])){
        $nconst->alindPosOeste=$_POST["alindPosOeste"];
    }else{
        $nconst->alindPosOeste= "nada";
    }
    if(isset($_POST["nortSecDoc"])){
        $nconst->nortSecDoc=$_POST["nortSecDoc"];
    }else{
        $nconst->nortSecDoc= "nada";
    }
    if(isset($_POST["alindSecNorte"])){
        $nconst->alindSecNorte=$_POST["alindSecNorte"];
    }else{
        $nconst->alindSecNorte= "nada";
    }
    if(isset($_POST["surSecDoc"])){
        $nconst->surSecDoc=$_POST["surSecDoc"];
    }else{
        $nconst->surSecDoc= "nada";
    }
    if(isset($_POST["alindSecSur"])){
        $nconst->alindSecSur=$_POST["alindSecSur"];
    }else{
        $nconst->alindSecSur= "nada";
    }
    if(isset($_POST["esteSecDoc"])){
        $nconst->esteSecDoc=$_POST["esteSecDoc"];
    }else{
        $nconst->esteSecDoc= "nada";
    }
    if(isset($_POST["alindSecEste"])){
        $nconst->alindSecEste=$_POST["alindSecEste"];
    }else{
        $nconst->alindSecEste= "nada";
    }
    if(isset($_POST["oesteSecDoc"])){
        $nconst->oesteSecDoc=$_POST["oesteSecDoc"];
    }else{
        $nconst->oesteSecDoc= "nada";
    }
    if(isset($_POST["alindSecOeste"])){
        $nconst->alindSecOeste=$_POST["alindSecOeste"];
    }else{
        $nconst->alindSecOeste= "nada";
    }
    if(isset($_POST["arTotal"])){
        $nconst->arTotal=$_POST["arTotal"];
    }else{
        $nconst->arTotal= "nada";
    }
    if(isset($_POST["NivConstTotal"])){
        $nconst->NivConstTotal=$_POST["NivConstTotal"];
    }else{
        $nconst->NivConstTotal= "nada";
    }
    if(isset($_POST["parte2"])){
        $nconst->parte2=$_POST["parte2"];
    }else{
        $nconst->parte2= "nada";
    }
    if(isset($_POST["nuExp"])){
        $nconst->nuExp=$_POST["nuExp"];
    }else{
        $nconst->nuExp= "nada";
    }
    if(isset($_POST["montoFact"])){
        $nconst->montoFact=$_POST["montoFact"];
    }else{
        $nconst->montoFact= "nada";
    }
    if(isset($_POST["fechFact"])){
        $nconst->fechFact=$_POST["fechFact"];
    }else{
        $nconst->fechFact= "nada";
    }
    if(isset($_POST["telfFul"])){
        $nconst->telfFul=$_POST["telfFul"];
    }else{
        $nconst->telfFul= "nada";
    }
    if(isset($_POST["telfFul2"])){
        $nconst->telfFul2=$_POST["telfFul2"];
    }else{
        $nconst->telfFul2= "nada";
    }

    if(isset($_POST["Acue"])){
        $nconst->Acue=$_POST["Acue"];
    }else{
        $nconst->Acue= "nada";
    }
    if(isset($_POST["AcueRural"])){
        $nconst->AcueRural=$_POST["AcueRural"];
    }else{
        $nconst->AcueRural= "nada";
    }
    if(isset($_POST["AguasSub"])){
        $nconst->AguasSub=$_POST["AguasSub"];
    }else{
        $nconst->AguasSub= "nada";
    }
    if(isset($_POST["AguasServ"])){
        $nconst->AguasServ=$_POST["AguasServ"];
    }else{
        $nconst->AguasServ= "nada";
    }
    if(isset($_POST["PavFlex"])){
        $nconst->PavFlex=$_POST["PavFlex"];
    }else{
        $nconst->PavFlex= "nada";
    }
    if(isset($_POST["PavRig"])){
        $nconst->PavRig=$_POST["PavRig"];
    }else{
        $nconst->PavRig= "nada";
    }
    if(isset($_POST["viaEngran"])){
        $nconst->viaEngran=$_POST["viaEngran"];
    }else{
        $nconst->viaEngran= "nada";
    }
    if(isset($_POST["acera"])){
        $nconst->acera=$_POST["acera"];
    }else{
        $nconst->acera= "nada";
    }
    if(isset($_POST["AlumPublico"])){
        $nconst->AlumPublico=$_POST["AlumPublico"];
    }else{
        $nconst->AlumPublico= "nada";
    }
    if(isset($_POST["aseo"])){
        $nconst->aseo=$_POST["aseo"];
    }else{
        $nconst->aseo= "nada";
    }
    if(isset($_POST["transPublic"])){
        $nconst->transPublic=$_POST["transPublic"];
    }else{
        $nconst->transPublic= "nada";
    }
    if(isset($_POST["pozoSept"])){
        $nconst->pozoSept=$_POST["pozoSept"];
    }else{
        $nconst->pozoSept= "nada";
    }
    if(isset($_POST["ElectResidencial"])){
        $nconst->ElectResidencial=$_POST["ElectResidencial"];
    }else{
        $nconst->ElectResidencial= "nada";
    }
    if(isset($_POST["ElectriIndust"])){
        $nconst->ElectriIndust=$_POST["ElectriIndust"];
    }else{
        $nconst->ElectriIndust= "nada";
    }
    if(isset($_POST["linTelf"])){
        $nconst->linTelf=$_POST["linTelf"];
    }else{
        $nconst->linTelf= "nada";
    }
    if(isset($_POST["multa"])){
        $nconst->multa=$_POST["multa"];
    }else{
        $nconst->multa= "nada";
    }
    if(isset($_POST["arTotal3"])){
        $nconst->arTotal3=$_POST["arTotal3"];
    }else{
        $nconst->arTotal3= "nada";
    }
    if(isset($_POST["NivConstTotal3"])){
        $nconst->NivConstTotal3=$_POST["NivConstTotal3"];
    }else{
        $nconst->NivConstTotal3= "nada";
    }
    if(isset($_POST["arConstTotal3"])){
        $nconst->arConstTotal3=$_POST["arConstTotal3"];
    }else{
        $nconst->arConstTotal3= "nada";
    }
    if(isset($_POST["arConstTotal2"])){
        $nconst->arConstTotal2=$_POST["arConstTotal2"];
    }else{
        $nconst->arConstTotal2= "nada";
    }
    if(isset($_POST["arConstTotal"])){
        $nconst->arConstTotal=$_POST["arConstTotal"];
    }else{
        $nconst->arConstTotal= "nada";
    }
    if(isset($_POST["arTotal2"])){
        $nconst->arTotal2=$_POST["arTotal2"];
    }else{
        $nconst->arTotal2= "nada";
    }
    if(isset($_POST["NivConstTotal2"])){
        $nconst->NivConstTotal2=$_POST["NivConstTotal2"];
    }else{
        $nconst->NivConstTotal2= "nada";
    }
    if(isset($_POST["arConstTotal2"])){
        $nconst->arConstTotal2=$_POST["arConstTotal2"];
    }else{
        $nconst->arConstTotal2= "nada";
    }
    if(isset($_POST["uniNorte"])){
        $nconst->uniNorte=$_POST["uniNorte"];
    }else{
        $nconst->uniNorte= "nada";
    }
    if(isset($_POST["uniSur"])){
        $nconst->uniSur=$_POST["uniSur"];
    }else{
        $nconst->uniSur= "nada";
    }
    if(isset($_POST["uniEste"])){
        $nconst->uniEste=$_POST["uniEste"];
    }else{
        $nconst->uniEste= "nada";
    }
    if(isset($_POST["uniOeste"])){
        $nconst->uniOeste=$_POST["uniOeste"];
    }else{
        $nconst->uniOeste= "nada";
    }
    if(isset($_POST["uniNorte2"])){
        $nconst->uniNorte2=$_POST["uniNorte2"];
    }else{
        $nconst->uniNorte2= "nada";
    }
    if(isset($_POST["uniSur2"])){
        $nconst->uniSur2=$_POST["uniSur2"];
    }else{
        $nconst->uniSur2= "nada";
    }
    if(isset($_POST["uniEste2"])){
        $nconst->uniEste2=$_POST["uniEste2"];
    }else{
        $nconst->uniEste2= "nada";
    }
    if(isset($_POST["uniOeste2"])){
        $nconst->uniOeste2=$_POST["uniOeste2"];
    }else{
        $nconst->uniOeste2= "nada";
    }
    if(isset($_POST["uniNorte3"])){
        $nconst->uniNorte3=$_POST["uniNorte3"];
    }else{
        $nconst->uniNorte3= "nada";
    }
    if(isset($_POST["uniSur3"])){
        $nconst->uniSur3=$_POST["uniSur3"];
    }else{
        $nconst->uniSur3= "nada";
    }
    if(isset($_POST["uniEste3"])){
        $nconst->uniEste3=$_POST["uniEste3"];
    }else{
        $nconst->uniEste3= "nada";
    }
    if(isset($_POST["uniOeste3"])){
        $nconst->uniOeste3=$_POST["uniOeste3"];
    }else{
        $nconst->uniOeste3= "nada";
    }
    if(isset($_POST["campBuscar"])){
        $nconst->campBuscar = $_POST["campBuscar"];
    }else{
        $nconst->campBuscar = "nada";
    }
    if(isset($_POST["numFact"])){
        $nconst->numFact = $_POST["numFact"];
    }else{
        $nconst->numFact = "nada";
    }
    if(isset($_POST["uniAreaT3"])){
        $nconst->uniAreaT3 = $_POST["uniAreaT3"];
    }else{
        $nconst->uniAreaT3 = "nada";
    }
    if(isset($_POST["uniAreaT2"])){
        $nconst->uniAreaT2 = $_POST["uniAreaT2"];
    }else{
        $nconst->uniAreaT2 = "nada";
    }
    if(isset($_POST["uniAreaT"])){
        $nconst->uniAreaT = $_POST["uniAreaT"];
    }else{
        $nconst->uniAreaT = "nada";
    }
    if(isset($_POST["uniAreaConst3"])){
        $nconst->uniAreaConst3 = $_POST["uniAreaConst3"];
    }else{
        $nconst->uniAreaConst3 = "nada";
    }
    if(isset($_POST["uniAreaConst2"])){
        $nconst->uniAreaConst2 = $_POST["uniAreaConst2"];
    }else{
        $nconst->uniAreaConst2 = "nada";
    }
    if(isset($_POST["uniAreaConst"])){
        $nconst->uniAreaConst = $_POST["uniAreaConst"];
    }else{
        $nconst->uniAreaConst = "nada";
    }
    if(isset($_POST["dormit"])){
        $nconst->dormit = $_POST["dormit"];
    }else{
        $nconst->dormit = "nada";
    }
    if(isset($_POST["comedor"])){
        $nconst->comedor = $_POST["comedor"];
    }else{
        $nconst->comedor = "nada";
    }
    if(isset($_POST["sala"])){
        $nconst->sala = $_POST["sala"];
    }else{
        $nconst->sala = "nada";
    }
    if(isset($_POST["banos"])){
        $nconst->banos = $_POST["banos"];
    }else{
        $nconst->banos = "nada";
    }
    if(isset($_POST["Cocina"])){
        $nconst->Cocina = $_POST["Cocina"];
    }else{
        $nconst->Cocina = "nada";
    }
    if(isset($_POST["Servicio"])){
        $nconst->Servicio = $_POST["Servicio"];
    }else{
        $nconst->Servicio = "nada";
    }
    if(isset($_POST["oficina"])){
        $nconst->oficina = $_POST["oficina"];
    }else{
        $nconst->oficina = "nada";
    }
    if(isset($_POST["garaje"])){
        $nconst->garaje = $_POST["garaje"];
    }else{
        $nconst->garaje = "nada";
    }
    if(isset($_POST["estac"])){
        $nconst->estac = $_POST["estac"];
    }else{
        $nconst->estac = "nada";
    }
    if(isset($_POST["ascensor"])){
        $nconst->ascensor = $_POST["ascensor"];
    }else{
        $nconst->ascensor = "nada";
    }
    if(isset($_POST["aireAcond"])){
        $nconst->aireAcond = $_POST["aireAcond"];
    }else{
        $nconst->aireAcond = "nada";
    }
    if(isset($_POST["rejas"])){
        $nconst->rejas = $_POST["rejas"];
    }else{
        $nconst->rejas = "nada";
    }
    if(isset($_POST["closets"])){
        $nconst->closets = $_POST["closets"];
    }else{
        $nconst->closets = "nada";
    }
    if(isset($_POST["porcelana"])){
        $nconst->porcelana = $_POST["porcelana"];
    }else{
        $nconst->porcelana = "nada";
    }
    if(isset($_POST["fechaExp"])){
        $nconst->fechaExp = $_POST["fechaExp"];
    }else{
        $nconst->fechaExp = "nada";
    }
    if(isset($_POST["idProp"])){
        $nconst->idProp = $_POST["idProp"];
    }else{
        $nconst->idProp = "nada";
    }
    if(isset($_POST["idInmue"])){
        $nconst->idInmue = $_POST["idInmue"];
    }else{
        $nconst->idInmue = "nada";
    }
    if(isset($_POST["idCaraInmue"])){
        $nconst->idCaraInmue = $_POST["idCaraInmue"];
    }else{
        $nconst->idCaraInmue = "nada";
    }
    if(isset($_POST["idCaraConst"])){
        $nconst->idCaraConst = $_POST["idCaraConst"];
    }else{
        $nconst->idCaraConst = "nada";
    }
    if(isset($_POST["idProto"])){
        $nconst->idProto = $_POST["idProto"];
    }else{
        $nconst->idProto = "nada";
    }
    if(isset($_POST["idLindGen"])){
        $nconst->idLindGen = $_POST["idLindGen"];
    }else{
        $nconst->idLindGen = "nada";
    }
    if(isset($_POST["idLindDoc"])){
        $nconst->idLindDoc = $_POST["idLindDoc"];
    }else{
        $nconst->idLindDoc = "nada";
    }
    if(isset($_POST["idPosVenta"])){
        $nconst->idPosVenta = $_POST["idPosVenta"];
    }else{
        $nconst->idPosVenta = "nada";
    }
    if(isset($_POST["idServInmue"])){
        $nconst->idServInmue = $_POST["idServInmue"];
    }else{
        $nconst->idServInmue = "nada";
    }
    if(isset($_POST["idEstConserv"])){
        $nconst->idEstConserv = $_POST["idEstConserv"];
    }else{
        $nconst->idEstConserv = "nada";
    }
    if(isset($_POST["idPiezSant"])){
        $nconst->idPiezSant = $_POST["idPiezSant"];
    }else{
        $nconst->idPiezSant = "nada";
    }
    if(isset($_POST["idAmbientes"])){
        $nconst->idAmbientes = $_POST["idAmbientes"];
    }else{
        $nconst->idAmbientes = "nada";
    }
    if(isset($_POST["idPuertas"])){
        $nconst->idPuertas = $_POST["idPuertas"];
    }else{
        $nconst->idPuertas = "nada";
    }
    if(isset($_POST["idComple"])){
        $nconst->idComple = $_POST["idComple"];
    }else{
        $nconst->idComple = "nada";
    }
    if(isset($_POST["idFactura"])){
        $nconst->idFactura = $_POST["idFactura"];
    }else{
        $nconst->idFactura = "nada";
    }
    if(isset($_POST["idExp"])){
        $nconst->idExp = $_POST["idExp"];
    }else{
        $nconst->idExp = "nada";
    }
    if(isset($_POST["valorInmue"])){
        $nconst->valorInmue = $_POST["valorInmue"];
    }else{
        $nconst->valorInmue = "nada";
    }

//ACCIONES
    if($accion=="elimReg"){
        $nconst->elimReg();
    }
    //PROPIETARIO
    if($accion=="formProp"){
        $nconst->fPropietario();
    }
    if($accion=="guardProp"){
        $nconst->guardProp();
    }
    //INMUEBLE
    if($accion=="formInmue"){
        $nconst->fInmueble();
    }
    if($accion=="guarInmue"){
        $nconst->guarInmue();
    }
    //CARACTERISTICAS DEL TERRENO
    if($accion=="formCarTerr"){
        $nconst->fCarTerreno();
    }
    if($accion=="guarCarTerr"){
        $nconst->guarCarTerr();
    }
    //CARACTERISTICAS DE LA CONSTRUCCION
    if($accion=="guarCaracConst"){
        $nconst->guarCaracConst();
    }
    //PROTOCOLIZACION DEL INMUEBLE
    if($accion=="guarProtInmue"){
        $nconst->guarProtInmue();
    }
    //LINDEROS SEGUN INSPECCION
    if($accion=="guarGeneral"){
        $nconst->guarGeneral();
    }
    //LINDEROS SEGUN DOCUMENTO
    if($accion=="guarSecDoc"){
        $nconst->guarSecDoc();
    }
    //LINDEROS POSIBLE VENTA
    if($accion=="guarPosVenta"){
        $nconst->guarPosVenta();
    }
    //ESTADDO DE CONSERVACIÓN
    if($accion=="fConserv"){
        $nconst->fConserv();
    }
    if($accion=="guarConserv"){
        $nconst->guarConserv();
    }
    //PIEZAS SANITARIAS
    if($accion=="fPiezSant"){
        $nconst->fPiezSant();
    }
    if($accion=="guarPiezSant"){
        $nconst->guarPiezSant();
    }
    //PUERTAS
    if($accion=="fpuertas"){
        $nconst->fpuertas();
    }
    if($accion=="guarPuertas"){
        $nconst->guarPuertas();
    }
    //AMBIENTES
    if($accion=="fAmbi"){
        $nconst->fambien();
    }
    if($accion=="guarAmbien"){
        $nconst->guarAmbien();
    }
    //COMPLEMENTOS
    if($accion=="fComple"){
        $nconst->fConple();
    }
    if($accion=="guarComple"){
        $nconst->guarComple();
    }
    //EXPEDIENTE
    if($accion=="fExpedient"){
        $nconst->fExpedient();
    }
    if($accion=="guarExpe"){
        $nconst->guarExpe();
    }
    //SERVICIOS
    if($accion=="fServicios"){
        $nconst->fServicios();
    }
    if($accion=="guarServicios"){
        $nconst->guarServicios();
    }
    //FACTURA
    if($accion=="fFactura"){
        $nconst->fFactura();
    }
    if($accion=="guarFact"){
        $nconst->guarFact();
    }
    //VERIFICACION
    if($accion=="veriF3"){
        $nconst->veriF3();
    }
    if($accion=="veriF2"){
        $nconst->veriF2();
    }
    if($accion=="veriF1"){
        $nconst->veriF1();
    }
    if($accion=="veriFEmpadro"){
        $nconst->veriFEmpadro();
    }
    if($accion=="fcaracConst"){
        $nconst->fcaracConst();
    }
    if($accion=="fprotInmue"){
        $nconst->fprotInmue();
    }
    if($accion=="flinDoc"){
        $nconst->SecDoc();
    }
    if($accion== "fProp"){
        $nconst->secNuvIns();
    }
    if($accion== "fCarac"){
        $nconst->fCarac();
    }
    if($accion == "fLid"){
        $nconst->fProtConst();
    }
    if($accion== "fActGeneral"){
        $nconst->actGeneral();
    }
    if($accion== "factPosVenta"){
        $nconst->actPosVenta();
    }
    if($accion == "factSecDoc"){
        $nconst->SecDoc();
    }
    if($accion == "guardConst"){
        $nconst->guardConst();
    }
    if($accion == "cambSect"){
        $nconst->cambSect();
    }
    if($accion== "revUsuario"){
        $nconst->revUsuario();
    }
    if($accion == "imprConst2"){
        if(isset($_POST["idInmueble"])){
            $f002->idInmueble=$_POST["idInmueble"];
        }else{
            $f002->idInmueble= "nada";
        }
        if(isset($_POST["operacion"])){
            $f002->operacion=$_POST["operacion"];
        }else{
            $f002->operacion= "nada";
        }
        if(isset($_POST["nuExp"])){
            $f002->nuExp=$_POST["nuExp"];
        }else{
            $f002->nuExp= "nada";
        }
        if(isset($_POST["montoFact"])){
            $f002->montoFact=$_POST["montoFact"];
        }else{
            $f002->montoFact= "nada";
        }
        if(isset($_POST["fechFact"])){
            $f002->fechFact=$_POST["fechFact"];
        }else{
            $f002->fechFact= "nada";
        }
        if(isset($_POST["empadro"])){
            $f002->empadro=$_POST["empadro"];
        }else{
            $f002->empadro= "nada";
        }
        if(isset($_POST["idProp"])){
            $f002->idProp=$_POST["idProp"];
        }else{
            $f002->idProp= "nada";
        }
        if(isset($_POST["numFact"])){
            $f002->numFact=$_POST["numFact"];
        }else{
            $f002->numFact= "nada";
        }
        echo'<div id="enlacePdf"></div>';
        $f002->imprimir();
    }
    if($accion=="imprConst1"){
        if(isset($_POST["idInmueble"])){
            $f001->idInmueble=$_POST["idInmueble"];
        }else{
            $f001->idInmueble= "nada";
        }
        if(isset($_POST["operacion"])){
            $f001->operacion=$_POST["operacion"];
        }else{
            $f001->operacion= "nada";
        }
        if(isset($_POST["nuExp"])){
            $f001->nuExp=$_POST["nuExp"];
        }else{
            $f001->nuExp= "nada";
        }
        if(isset($_POST["montoFact"])){
            $f001->montoFact=$_POST["montoFact"];
        }else{
            $f001->montoFact= "nada";
        }
        if(isset($_POST["fechFact"])){
            $f001->fechFact=$_POST["fechFact"];
        }else{
            $f001->fechFact= "nada";
        }
        if(isset($_POST["empadro"])){
            $f001->empadro=$_POST["empadro"];
        }else{
            $f001->empadro= "nada";
        }
        if(isset($_POST["idProp"])){
            $f001->idProp=$_POST["idProp"];
        }else{
            $f001->idProp= "nada";
        }
        if(isset($_POST["numFact"])){
            $f001->numFact=$_POST["numFact"];
        }else{
            $f001->numFact= "nada";
        }
        echo'<div id="enlacePdf"></div>';
        $f001->imprimir();
    }
    if($accion=="imprConst3"){
        if(isset($_POST["idInmueble"])){
            $f003->idInmueble=$_POST["idInmueble"];
        }else{
            $f003->idInmueble= "nada";
        }
        if(isset($_POST["operacion"])){
            $f003->operacion=$_POST["operacion"];
        }else{
            $f003->operacion= "nada";
        }
        if(isset($_POST["nuExp"])){
            $f003->nuExp=$_POST["nuExp"];
        }else{
            $f003->nuExp= "nada";
        }
        if(isset($_POST["montoFact"])){
            $f003->montoFact=$_POST["montoFact"];
        }else{
            $f003->montoFact= "nada";
        }
        if(isset($_POST["fechFact"])){
            $f003->fechFact=$_POST["fechFact"];
        }else{
            $f003->fechFact= "nada";
        }
        if(isset($_POST["empadro"])){
            $f003->empadro=$_POST["empadro"];
        }else{
            $f003->empadro= "nada";
        }
        if(isset($_POST["idProp"])){
            $f003->idProp=$_POST["idProp"];
        }else{
            $f003->idProp= "nada";
        }
        if(isset($_POST["numFact"])){
            $f003->numFact=$_POST["numFact"];
        }else{
            $f003->numFact= "nada";
        }
        echo'<div id="enlacePdf"></div>';
        $f003->imprimir();
    }
    if($accion=="imprConst4"){
        if(isset($_POST["idInmueble"])){
            $f004->idInmueble=$_POST["idInmueble"];
        }else{
            $f004->idInmueble= "nada";
        }
        if(isset($_POST["operacion"])){
            $f004->operacion=$_POST["operacion"];
        }else{
            $f004->operacion= "nada";
        }
        if(isset($_POST["nuExp"])){
            $f004->nuExp=$_POST["nuExp"];
        }else{
            $f004->nuExp= "nada";
        }
        if(isset($_POST["montoFact"])){
            $f004->montoFact=$_POST["montoFact"];
        }else{
            $f004->montoFact= "nada";
        }
        if(isset($_POST["fechFact"])){
            $f004->fechFact=$_POST["fechFact"];
        }else{
            $f004->fechFact= "nada";
        }
        if(isset($_POST["empadro"])){
            $f004->empadro=$_POST["empadro"];
        }else{
            $f004->empadro= "nada";
        }
        if(isset($_POST["idProp"])){
            $f004->idProp=$_POST["idProp"];
        }else{
            $f004->idProp= "nada";
        }
        if(isset($_POST["numFact"])){
            $f004->numFact=$_POST["numFact"];
        }else{
            $f004->numFact= "nada";
        }
        echo'<div id="enlacePdf"></div>';
        $f004->imprimir();
    }
    if($accion=="formImpri"){
        $nconst->formImpri();
    }
    if($accion=="veriImpr"){
        $nconst->veriImpr();
    }
    if($accion=="busExpediente"){
        $nconst->busExpediente();
    }
    if($accion=="busFactura"){
        $nconst->busFactura();
    }
?>