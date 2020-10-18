<?php
require('../../lib/fpdf/fpdf.php');

class PDF extends FPDF{


    // Cabecera de página
    function Header(){
        // Logos
        $this->Image('../../../assets/logo.jpg',10,3,34);
        $this->Image('../../../assets/escudo.jpg',175,3,30);
        $this->Image('../../../assets/fondoCabecera.jpg',50,3,120,25);
        // Arial bold 15
        $this->SetFont('Times','B',9);
        // Título
        $this->SetY(3);
        $this->SetX(74);
        $this->Cell(30,10,'REPUBLICA BOLIVARIANA DE VENEZUELA',0,'C');
        $this->SetY(7);
        $this->SetX(80);
        $this->Cell(30,10,'INSTITUTO AUTONOMO MUNICIPAL ',0,'C');
        $this->SetY(11);
        $this->SetX(81);
        $this->Cell(30,10,'DE ORDENAMIENTO TERRITORIAL',0,'C');
        $this->SetY(17);
        $this->SetX(71);
        $this->Cell(65,6,'MUNICIPIO FERNANDEZ FEO - EDO. TACHIRA',0,'C');
        $this->SetY(19);
        $this->SetX(95);
        $this->Cell(30,10,'RIF: G200129891',0,'C');
        // Salto de línea
        $this->Ln(20);
    }

    // Pie de página
    function Footer(){
        // Posición: a 1,5 cm del final
        $this->Image('../../../assets/fondoFooter.jpg',20,308,170,17);
        $this->SetY(311);    
        $this->SetX(71);
        $this->MultiCell(80,4,utf8_decode('PIÑAL, CALLE 3 ENTRE CARRERAS 3 Y 4,PALACIO MUNICIPAL, MUNICIPIO FERNANDEZ FEO '.utf8_encode('-').' ESTADO TACHIRA IAMOTFF@GMAIL.COM'),0,'C');
        // Arial italic 8
        $this->SetFont('Arial','I',8);
    }
}


class f004{
    var $empadro = "";
    var $idInmueble = "";
    var $idProp = "";
    var $nuExp = "";
    var $montoFact = "";
    var $fechFact = "";
    var $numFact= "";
    var $operacion= "";
    function imprimir(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        session_start();
        //BUSQUEDA DE USUARIO
            $userSql = "SELECT * FROM usuarios where nick='".$_SESSION["usuario"]."'";
            $resultUser= $link->query($userSql);
            $idUser= $resultUser->fetch_assoc();
        //BUSQUEDA FACTURA
            $expFactSql= "SELECT * FROM factura where n_factura='".$this->numFact."'";
            $resExpFact= $link->query($expFactSql);
            $idExpFact= $resExpFact->fetch_array();
        //BUSQUEDA DEL EXPEDIENTE
            $busExpSQL = "SELECT * FROM expempadro where id='".$this->nuExp."'";
            $resBusEXP = $link->query($busExpSQL);
            $busExpedienteRes = $resBusEXP->fetch_array();
            $fecha = explode('-',$busExpedienteRes["fecha"]);
            $anoExp= $fecha[0];
            echo '<input type="hidden" value="'.$anoExp.'" id="anoExp" />
            <input type="hidden" value="'.$busExpedienteRes["n_expediente"].'" id="nuExp" />';
        //BUSQUEDA DEL INMUEBLE
            $inmueDeSql= "SELECT * from inmueble where id=".$busExpedienteRes["fk_inmueble"]."";
            $resInmueDe= $link->query($inmueDeSql);
            $resultInmueDe = $resInmueDe->fetch_assoc();
            $idProt= $resultInmueDe["fk_protocolizacion"];
            $idLindDoc= $resultInmueDe["fk_lind_documento"];
            $idLindGen= $resultInmueDe["fk_lind_general"];
            $idConst= $resultInmueDe["fk_carac_construccion"];
            $idServicios= $resultInmueDe["fk_servicios"];
            $idCaracInmue= $resultInmueDe["fk_carac_inmuebles"];
            $idcaracConstruccion= $resultInmueDe["fk_carac_construccion"];
        //BUSQUEDA DEL PROPIETARIO
            $propDeSql= "SELECT * from propietarios where id=".$busExpedienteRes["fk_propietario"]."";
            $resPropDe= $link->query($propDeSql);
            $resultPropieDe = $resPropDe->fetch_assoc();
            $nombreProp= ''.$resultPropieDe["nombre"].' '.$resultPropieDe["apellido"].'';
        //BUSQUEDA DE PROTOCOLIZACION
            $protSql = "SELECT * from datos_protocolizacion where id='".$idProt."' ";
            $resProt = $link->query($protSql);
            $resultProp = $resProt->fetch_assoc();
        //BUSQUEDA DE LINDEROS SEGUN DOCUMENTO
            $lindDocSql= "SELECT * FROM linderos_documento where id='".$idLindDoc."'";
            $resLindDoc = $link->query($lindDocSql);
            $resultLindDoc= $resLindDoc->fetch_assoc();
        ///BUSQUEDA DE DATOS CONSTRUCCION
            $constSql= "SELECT * from caracteristicas_construccion where id='".$idConst."'";
            $resConst= $link->query($constSql);
            $resultConst= $resConst->fetch_assoc();
        //BUSQUEDA DE SERVICIOS
            $servSql= "SELECT * FROM servicios_inmue where id='".$idServicios."'";
            $resServ= $link->query($servSql);
            $resultServ= $resServ->fetch_assoc();
        //BUSQUEDA DE CARACTERISTICAS DEL INMUEBLE
            $carastInmue= "SELECT * FROM carc_inmueble where id='".$idCaracInmue."'";
            $rescarastInmue= $link->query($carastInmue);
            $mostcarastInmue= $rescarastInmue->fetch_assoc();
        //BUSQUEDA DE CARACTERISTICAS DE LA CONSTRUCCION
            $carcConstSql= "SELECT * FROM caracteristicas_construccion where id='".$idcaracConstruccion."'";
            $resCaracConst= $link->query($carcConstSql);
            $resulCaracInmue= $resCaracConst->fetch_assoc();
        //INSERT CONSTANCIA
            $fechaConst= date('Y-m-d');
            $busConstSQL = "SELECT * FROM constancias where fk_expedi=".$busExpedienteRes["n_expediente"]."";
            $resBusConst = $link->query($busConstSQL);
            $busConstRes = $resBusConst->fetch_array();
            if($busConstRes!=0){
                $updateConst = "UPDATE constancias SET tipo_operacion='".$this->operacion."' where fk_expedi=".$busExpedienteRes["n_expediente"]."";
                $resupdaConst = $link->query($updateConst);
                $idConstancias = $busConstRes["id"];
            }else{
                $constansSql= "INSERT INTO constancias(tipo_operacion,fecha,fk_redactor,fk_expedi)value('".$this->operacion."','".$fechaConst."',".$idUser["id"].",".$busExpedienteRes["n_expediente"].")";
                $link->query($constansSql);
                $idConstancias = $link->insert_id;
            }
        //INSERT PAGOS
            $pagoExpSql= "INSERT INTO pagos(fk_expedient,fk_factura,fechaPagos,tipo)value(".$busExpedienteRes["n_expediente"].",".$idExpFact["id"].",'".$this->fechFact."','EMPADRONAMIENTO')";
            $link->query($pagoExpSql);
            $idPagoExp= $link->insert_id;
        // Creación del objeto de la clase heredada
            $pdf = new PDF('P','mm',array(216,335));
            $pdf->SetMargins(20,0,22);
            $pdf->AliasNbPages();
            $pdf->AddPage();
        //CONTINUACION HEADER
            $pdf->SetFont('Times','B',10);
            $pdf->SetX(38);
            $pdf->SetY(34);
            $pdf->MultiCell(0,4,''.utf8_decode('Quien suscribe, Presidente del Instituto Autónomo Municipal de
            Ordenamiento Territorial  del Municipio Fernández Feo 
            (I.A.M.O.T.F.F)').'',0,'C');
            $pdf->SetY(50);
            $pdf->SetX(70);
            $pdf->SetFont('Times','B',10);
            $pdf->SetDrawColor(0,0,0,0);
            $pdf->SetLineWidth(0.5);
            $pdf->Cell(78,8,'CERTIFICADO DE EMPADRONAMIENTO:','0,0,0,B:1',0,'C');
            $pdf->SetY(58);
            $pdf->SetX(22);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(40,10,'Fecha: '.date('d-m-Y').'');
            $pdf->SetY(58);
            $pdf->SetX(140);
            $pdf->cell(40,10,'No de Factura: '.$idExpFact["n_factura"].'');
            $pdf->SetY(62);
            $pdf->SetX(22);
            $pdf->cell(40,10,'No Civico: No Aplica');
            $pdf->SetY(62);
            $pdf->SetX(140);
            $pdf->cell(40,10,utf8_decode('IAMOTFF/Nº: '.$busExpedienteRes["n_expediente"].''));
            $pdf->SetY(66);
            $pdf->SetX(22);
            $pdf->cell(40,10,''.utf8_decode('Tipo de Operación: '.$this->operacion.'').'');
        //CODIGO CATASTRAL
            $pdf->SetY(76);
            $pdf->SetX(19);
            $pdf->SetFont('Times','B',9);
            $pdf->cell(0,5,'CODIGO CATASTRAL',1,0,'C');
            $pdf->SetY(81);
            $pdf->SetX(19);
            $pdf->cell(16,4,'Efed',1,0,'C');
            $pdf->SetY(81);
            $pdf->SetX(35);
            $pdf->cell(16,4,'Mun',1,0,'C');
            $pdf->SetY(81);
            $pdf->SetX(51);
            $pdf->cell(16,4,'Prr',1,0,'C');
            $pdf->SetY(81);
            $pdf->SetX(67);
            $pdf->cell(18,4,'Amb',1,0,'C');
            $pdf->SetY(81);
            $pdf->SetX(85);
            $pdf->cell(18,4,'Sec',1,0,'C');
            $pdf->SetY(81);
            $pdf->SetX(103);
            $pdf->cell(18,4,'Ssec',1,0,'C');
            $pdf->SetY(81);
            $pdf->SetX(121);
            $pdf->cell(18,4,'Man',1,0,'C');
            $pdf->SetY(81);
            $pdf->SetX(139);
            $pdf->cell(18,4,'Par',1,0,'C');
            $pdf->SetY(81);
            $pdf->SetX(157);
            $pdf->cell(18,4,'Niv',1,0,'C');
            $pdf->SetY(81);
            $pdf->SetX(175);
            $pdf->cell(19,4,'Und',1,0,'C');
            $pdf->SetY(85);
            $pdf->SetX(19);
            $pdf->cell(8,4,'2',1,0,'C');//LISTO
            $pdf->SetY(85);
            $pdf->SetX(27);
            $pdf->cell(8,4,'0',1,0,'C');//LISTO
            $pdf->SetY(85);
            $pdf->SetX(35);
            $pdf->cell(8,4,'0',1,0,'C');//LISTO
            $pdf->SetY(85);
            $pdf->SetX(43);
            $pdf->cell(8,4,'7',1,0,'C');//LISTO
            $pdf->SetY(85);
            $pdf->SetX(51);
            $pdf->cell(8,4,'0',1,0,'C');//LISTO
            $pdf->SetY(85);
            $pdf->SetX(59);
            if($resultInmueDe["parroquia"]=="Capital"){
                $pdf->cell(8,4,'1',1,0,'C');
            }elseif($resultInmueDe["parroquia"]=="Dr. Alberto Adriani"){
                $pdf->cell(8,4,'2',1,0,'C');
            }elseif($resultInmueDe["parroquia"]=="Santo Domingo"){
                $pdf->cell(8,4,'3',1,0,'C');
            }else{
                $pdf->cell(8,4,'0',1,0,'C');
            }//LISTO
            $pdf->SetY(85);
            $pdf->SetX(67);
            if($resultInmueDe["ambito"]=="Urbano"){
                $pdf->cell(6,4,'U',1,0,'C');
            }elseif($resultInmueDe["ambito"]=="Rural"){
                $pdf->cell(6,4,'R',1,0,'C');
            }else{
                $pdf->cell(6,4,'0',1,0,'C');
            }//LISTO
            $pdf->SetY(85);
            $pdf->SetX(73.2);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(85);
            $pdf->SetX(79);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(85);
            $pdf->SetX(85);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(85);
            $pdf->SetX(91);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(85);
            $pdf->SetX(97);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(85);
            $pdf->SetX(103);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(85);
            $pdf->SetX(109);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(85);
            $pdf->SetX(115);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(85);
            $pdf->SetX(121);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(85);
            $pdf->SetX(127);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(85);
            $pdf->SetX(133);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(85);
            $pdf->SetX(139);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(85);
            $pdf->SetX(145);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(85);
            $pdf->SetX(151);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(85);
            $pdf->SetX(157);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(85);
            $pdf->SetX(163);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(85);
            $pdf->SetX(169);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(85);
            $pdf->SetX(175);
            $pdf->cell(6,4,'0',1,0,'C');
            $pdf->SetY(85);
            $pdf->SetX(181);
            $pdf->cell(6,4,'0',1,0,'C');
            $pdf->SetY(85);
            $pdf->SetX(187);
            $pdf->cell(7,4,'0',1,0,'C');
        //DATOS DEL PROPIETARIO
            $pdf->SetFont('Times','B',9);
            $pdf->SetY(89);
            $pdf->SetX(19);
            $pdf->cell(0,5,'DATOS DEL PROPIETARIO',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(19);
            $pdf->cell(46,5,'No de Cedula',1,0,'L');
            $pdf->SetY(94);
            $pdf->SetX(65);
            $pdf->cell(0,5,''.$resultPropieDe["cedula"].'',1,0,'L');
            $pdf->SetY(99);
            $pdf->SetX(19);
            $pdf->cell(46,5,'Rif',1,0,'L');
            $pdf->SetY(99);
            $pdf->SetX(65);
            $divRifSec = explode('-',$resultPropieDe["rif"]);
            $divTelfSec = explode('-',$resultPropieDe["telef"]);
            if($divRifSec[0]=="N/A"){
                if($divRifSec[1]=="NO APLICA"){
                    $pdf->cell(0,5,'NO APLICA',1,0,'L');
                }else{
                    $pdf->cell(0,5,'NO APLICA',1,0,'L');
                }
            }else{
                if($divRifSec[1]!="NO APLICA"){
                    $pdf->cell(0,5,''.$resultPropieDe["rif"].'',1,0,'L');
                }else{
                    $pdf->cell(0,5,'NO APLICA',1,0,'L');
                }
            }
            $pdf->SetY(104);
            $pdf->SetX(19);
            $pdf->cell(46,5,'Apellidos Y Nombres ',1,0,'L');
            $pdf->SetY(104);
            $pdf->SetX(65);
            $pdf->Cell(0,5,''.utf8_decode($nombreProp).'',1,0,'L');
            $pdf->SetX(84);
            $pdf->Cell(0,5,'' ,0,0,'L');
            $pdf->SetY(109);
            $pdf->SetX(19);
            $pdf->cell(46,5,utf8_decode('No de Teléfono '),1,0,'L');
            $pdf->SetY(109);
            $pdf->SetX(65);
            if($divTelfSec[0]=="N/A"){
                if($divTelfSec[1]=="NO APLICA"){
                    $pdf->cell(0,5,'NO APLICA',1,0,'L');
                }else{
                    $pdf->cell(0,5,'NO APLICA',1,0,'L');
                }
            }else{
                if($divTelfSec[1]!="NO APLICA"){
                    $pdf->cell(0,5,''.$resultPropieDe["telef"].'',1,0,'L');
                }else{
                    $pdf->cell(0,5,'NO APLICA',1,0,'L');
                }
            }
            $pdf->SetY(114);
            $pdf->SetX(19);
            $pdf->cell(46,5,utf8_decode('Dirección Del Propietario'),1,0,'L');
            $pdf->SetY(114);
            $pdf->SetX(65);
            $pdf->cell(0,5,''.utf8_decode($resultPropieDe["dir_hab"]).'',1,0,'L');
        //DATOS DE PROTOCOLIZACION
            $pdf->SetY(119);
            $pdf->SetX(19);
            $pdf->cell(0,5,''.utf8_decode("DATOS DE PROTOCOLIZACIÓN").'',1,0,'C');
            $pdf->SetY(124);
            $pdf->SetX(19);
            $pdf->cell(80,5,'Documento Debidamente: '.$resultProp["documento"].'',1,0,'L');
            $pdf->SetY(124);
            $pdf->SetX(99);
            if($resultProp["direccion"]=="NO APLICA"){
                $pdf->cell(0,5,utf8_decode('Dirección: NO APLICA'),1,0,'L');
            }else{
                $pdf->cell(0,5,utf8_decode('Dirección: '.$resultProp["direccion"].''),1,0,'L');
            }
            $pdf->SetY(129);
            $pdf->SetX(19);
            $pdf->cell(25,5,utf8_decode('Número:'),1,0,'C');
            $pdf->SetY(134);
            $pdf->SetX(19);
            $pdf->SetFont('Times','B',9);
            if($resultProp["numero"]=="NO APLICA"){
                $pdf->cell(25,5,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(25,5,''.$resultProp["numero"].'',1,0,'C');
            }
            $pdf->SetY(129);
            $pdf->SetX(44);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(25,5,'Tomo',1,0,'C');
            $pdf->SetY(134);
            $pdf->SetX(44);
            $pdf->SetFont('Times','B',9);
            if($resultProp["tomo"]=="NO APLICA"){
                $pdf->cell(25,5,'NO APLICA',1,0,'C');    
            }else{
                $pdf->cell(25,5,''.$resultProp["tomo"].'',1,0,'C');
            }
            $pdf->SetY(129);
            $pdf->SetX(69);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(23,5,'Folios',1,0,'C');
            $pdf->SetY(134);
            $pdf->SetX(69);
            $pdf->SetFont('Times','B',9);
            if($resultProp["folio"]=="NO APLICA"){
                $pdf->cell(23,5,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(23,5,''.$resultProp["folio"].'',1,0,'C');
            }
            $pdf->SetY(129);
            $pdf->SetX(92);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(23,5,'Protocolo',1,0,'C');
            $pdf->SetY(134);
            $pdf->SetX(92);
            $pdf->SetFont('Times','B',9);
            if($resultProp["protocolo"]=="NO APLICA"){
                $pdf->cell(23,5,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(23,5,''.$resultProp["protocolo"].'',1,0,'C');
            }
            $pdf->SetY(129);
            $pdf->SetX(115);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(23,5,'Trimestre',1,0,'C');
            $pdf->SetY(134);
            $pdf->SetX(115);
            $pdf->SetFont('Times','B',9);
            if($resultProp["trimestre"]=="NO APLICA"){
                $pdf->cell(23,5,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(23,5,''.$resultProp["trimestre"].'',1,0,'C');
            }
            $pdf->SetY(129);
            $pdf->SetX(138);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(23,5,'Fecha',1,0,'C');
            $pdf->SetY(134);
            $pdf->SetX(138);
            $pdf->SetFont('Times','B',9);
            if($resultProp["fecha"]=="0000-00-00"){
                $pdf->cell(23,5,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(23,5,''.$resultProp["fecha"].'',1,0,'C');
            }
            $pdf->SetY(129);
            $pdf->SetX(161);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(0,5,'Valor de Inmueble',1,0,'C');
            $pdf->SetY(134);
            $pdf->SetX(161);
            $pdf->SetFont('Times','B',9);
            if($resultProp["valor_inmueble"]=="NO APLICA"){
                $pdf->cell(0,5,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(0,5,''.$resultProp["valor_inmueble"].'',1,0,'C');
            }
        //DATOS DE COLINDANTES SEGUN DOCUMENTO
            $pdf->SetY(139);
            $pdf->SetX(19);
            $pdf->cell(0,5,utf8_decode('DATOS DE COLINDANTES SEGÚN DOCUMENTO'),1,0,'C');
            $pdf->SetY(144);
            $pdf->SetX(19);
            $pdf->cell(35,4,'Puntos Cardinales',1,0,'C');
            $pdf->SetY(144);
            $pdf->SetX(54);
            $pdf->cell(113,4,'Alinderado',1,0,'C');
            $pdf->SetY(144);
            $pdf->SetX(167);
            $pdf->cell(0,4,'Medida (m)',1,0,'C');
            $pdf->SetY(148);
            $pdf->SetX(19);
            if($resultLindDoc["norte"]!="N/A"){
                $pdf->cell(35,6,'NORTE',1,0,'C');
            }elseif($resultLindDoc["norte"]=="N/A"){
                $pdf->cell(35,6,'NORESTE',1,0,'C');
            }
            $pdf->SetY(148);
            $pdf->SetX(54);
            $pdf->cell(113,6,utf8_decode(''),1,0,'C');
            $pdf->SetY(148);
            $pdf->SetX(54);
            $pdf->SetFont('Times','B',8);
            $pdf->Multicell(113,3,utf8_decode(''.$resultLindDoc["alind_n"].''),0,'C');
            $pdf->SetY(148);
            $pdf->SetX(167);
            $pdf->SetFont('Times','B',9);
            if($resultLindDoc["norte"]!="nada"){
                if($resultLindDoc["uniNorte"] =="m"){
                    $pdf->cell(0,6,''.$resultLindDoc["norte"].'',1,0,'C');    
                }elseif($resultLindDoc["uniNorte"] =="Lq"){
                    $pdf->cell(0,6,''.$resultLindDoc["norte"].' '.$resultLindDoc["uniNorte"].'',1,0,'C');
                }elseif($resultLindDoc["uniNorte"] =="Ld"){
                    $pdf->cell(0,6,''.$resultLindDoc["norte"].' '.$resultLindDoc["uniNorte"].'',1,0,'C');
                }elseif($resultLindDoc["uniNorte"] =="otros"){
                    $pdf->cell(0,6,''.$resultLindDoc["norte"].'',1,0,'C');
                }else{
                    $pdf->cell(0,6,'',1,0,'C');
                }
            }
            if($resultLindDoc["norte"]=="nada"){
                if($resultLindDoc["uniNorte"] =="m"){
                    $pdf->cell(0,6,''.$resultLindDoc["noreste"].'',1,0,'C');    
                }elseif($resultLindDoc["uniNorte"] =="Lq"){
                    $pdf->cell(0,6,''.$resultLindDoc["noreste"].' '.$resultLindDoc["uniNorte"].'',1,0,'C');
                }elseif($resultLindDoc["uniNorte"] =="Ld"){
                    $pdf->cell(0,6,''.$resultLindDoc["noreste"].' '.$resultLindDoc["uniNorte"].'',1,0,'C');
                }elseif($resultLindDoc["uniNorte"] =="otros"){
                    $pdf->cell(0,6,''.$resultLindDoc["noreste"].'',1,0,'C');
                }else{
                    $pdf->cell(0,6,'',1,0,'C');
                }
            }
            $pdf->SetY(154);
            $pdf->SetX(19);
            if($resultLindDoc["sur"]!="nada"){
                $pdf->cell(35,6,'SUR',1,0,'C');
            }
            if($resultLindDoc["sur"]=="nada"){
                $pdf->cell(35,6,'SURESTE',1,0,'C');
            }
            $pdf->SetY(154);
            $pdf->SetX(54);
            $pdf->cell(113,6,utf8_decode(''),1,0,'C');
            $pdf->SetY(154);
            $pdf->SetX(54);
            $pdf->SetFont('Times','B',8);
            $pdf->Multicell(113,3,utf8_decode(''.$resultLindDoc["alind_s"].''),0,'C');
            $pdf->SetY(154);
            $pdf->SetX(167);
            $pdf->SetFont('Times','B',9);
            if($resultLindDoc["sur"]!="nada"){
                if($resultLindDoc["uniSur"] =="m"){
                    $pdf->cell(0,6,''.$resultLindDoc["sur"].'',1,0,'C');
                }elseif($resultLindDoc["uniSur"] == "Lq"){
                    $pdf->cell(0,6,''.$resultLindDoc["sur"].' '.$resultLindDoc["uniSur"].'',1,0,'C');
                }elseif($resultLindDoc["uniSur"] == "Ld"){
                    $pdf->cell(0,6,''.$resultLindDoc["sur"].' '.$resultLindDoc["uniSur"].'',1,0,'C');
                }elseif($resultLindDoc["uniSur"] == "otros"){
                    $pdf->cell(0,6,''.$resultLindDoc["sur"].'',1,0,'C');
                }else{
                    $pdf->cell(0,6,'',1,0,'C');
                }
            }
            if($resultLindDoc["sur"]=="nada"){
                if($resultLindDoc["uniSur"] =="m"){
                    $pdf->cell(0,6,''.$resultLindDoc["sureste"].'',1,0,'C');
                }elseif($resultLindDoc["uniSur"] == "Lq"){
                    $pdf->cell(0,6,''.$resultLindDoc["sureste"].' '.$resultLindDoc["uniSur"].'',1,0,'C');
                }elseif($resultLindDoc["uniSur"] == "Ld"){
                    $pdf->cell(0,6,''.$resultLindDoc["sureste"].' '.$resultLindDoc["uniSur"].'',1,0,'C');
                }elseif($resultLindDoc["uniSur"] == "otros"){
                    $pdf->cell(0,6,''.$resultLindDoc["sureste"].'',1,0,'C');
                }else{
                    $pdf->cell(0,6,'',1,0,'C');
                }
            }
            
            $pdf->SetY(160);
            $pdf->SetX(19);
            if($resultLindDoc["este"]!="nada"){
                $pdf->cell(35,6,'ESTE',1,0,'C');
            }
            if($resultLindDoc["este"]=="nada"){
                $pdf->cell(35,6,'SUROESTE',1,0,'C');
            }
            $pdf->SetY(160);
            $pdf->SetX(54);
            $pdf->cell(113,6,utf8_decode(''),1,0,'C');
            $pdf->SetY(160);
            $pdf->SetX(54);
            $pdf->SetFont('Times','B',8);
            $pdf->Multicell(113,3,utf8_decode(''.$resultLindDoc["alind_e"].''),0,'C');
            $pdf->SetY(160);
            $pdf->SetX(167);
            $pdf->SetFont('Times','B',9);
            if($resultLindDoc["este"]!="nada"){
                if($resultLindDoc["uniEste"] =="m"){
                    $pdf->cell(0,6,''.$resultLindDoc["este"].'',1,0,'C');
                }elseif($resultLindDoc["uniEste"] == "Lq"){
                    $pdf->cell(0,6,''.$resultLindDoc["este"].' '.$resultLindDoc["uniEste"].'',1,0,'C');
                }elseif($resultLindDoc["uniEste"] == "Ld"){
                    $pdf->cell(0,6,''.$resultLindDoc["este"].' '.$resultLindDoc["uniEste"].'',1,0,'C');
                }elseif($resultLindDoc["uniEste"] == "otros"){
                    $pdf->cell(0,6,''.$resultLindDoc["este"].'',1,0,'C');
                }else{
                    $pdf->cell(0,6,'',1,0,'C');
                }
            }
            if($resultLindDoc["este"]=="nada"){
                if($resultLindDoc["uniEste"] =="m"){
                    $pdf->cell(0,6,''.$resultLindDoc["suroeste"].'',1,0,'C');
                }elseif($resultLindDoc["uniEste"] == "Lq"){
                    $pdf->cell(0,6,''.$resultLindDoc["suroeste"].' '.$resultLindDoc["uniEste"].'',1,0,'C');
                }elseif($resultLindDoc["uniEste"] == "Ld"){
                    $pdf->cell(0,6,''.$resultLindDoc["suroeste"].' '.$resultLindDoc["uniEste"].'',1,0,'C');
                }elseif($resultLindDoc["uniEste"] == "otros"){
                    $pdf->cell(0,6,''.$resultLindDoc["suroeste"].'',1,0,'C');
                }else{
                    $pdf->cell(0,6,'',1,0,'C');
                }
            }
            $pdf->SetY(166);
            $pdf->SetX(19);
            if($resultLindDoc["oeste"]!="nada"){
                $pdf->cell(35,6,'OESTE',1,0,'C');
            }
            if($resultLindDoc["oeste"]=="nada"){
                $pdf->cell(35,6,'NOROESTE',1,0,'C');
            }
            $pdf->SetY(166);
            $pdf->SetX(54);
            $pdf->cell(113,6,utf8_decode(''),1,'C');
            $pdf->SetY(166);
            $pdf->SetX(54);
            $pdf->SetFont('Times','B',8);
            $pdf->Multicell(113,3,utf8_decode(''.$resultLindDoc["alind_o"].''),0,'C');
            $pdf->SetY(166);
            $pdf->SetX(167);
            $pdf->SetFont('Times','B',9);
            if($resultLindDoc["oeste"]!="nada"){
                if($resultLindDoc["uniOeste"] =="m"){
                    $pdf->cell(0,6,''.$resultLindDoc["oeste"].'',1,0,'C');
                }elseif($resultLindDoc["uniOeste"] == "Lq"){
                    $pdf->cell(0,6,''.$resultLindDoc["oeste"].' '.$resultLindDoc["uniOeste"].'',1,0,'C');
                }elseif($resultLindDoc["uniEste"] == "Ld"){
                    $pdf->cell(0,6,''.$resultLindDoc["oeste"].' '.$resultLindDoc["uniOeste"].'',1,0,'C');
                }elseif($resultLindDoc["uniEste"] == "otros"){
                    $pdf->cell(0,6,''.$resultLindDoc["oeste"].'',1,0,'C');
                }else{
                    $pdf->cell(0,6,'',1,0,'C');
                }
            }
            if($resultLindDoc["oeste"]=="nada"){
                if($resultLindDoc["uniOeste"] =="m"){
                    $pdf->cell(0,6,''.$resultLindDoc["noroeste"].'',1,0,'C');
                }elseif($resultLindDoc["uniOeste"] == "Lq"){
                    $pdf->cell(0,6,''.$resultLindDoc["noroeste"].' '.$resultLindDoc["uniOeste"].'',1,0,'C');
                }elseif($resultLindDoc["uniOeste"] == "Ld"){
                    $pdf->cell(0,6,''.$resultLindDoc["noroeste"].' '.$resultLindDoc["uniOeste"].'',1,0,'C');
                }elseif($resultLindDoc["uniOeste"] == "otros"){
                    $pdf->cell(0,6,''.$resultLindDoc["noroeste"].'',1,0,'C');
                }else{
                    $pdf->cell(0,6,'',1,0,'C');
                }
            }
        //PARTE 6
            $pdf->SetY(172);    
            $pdf->SetX(19);
            $pdf->cell(25,5,'Area de Terreno',1,0,'C');
            $pdf->SetY(172);    
            $pdf->SetX(44);
            if($resultLindDoc["areaTotal"]=="NO APLICA"){
                $pdf->cell(22,5,'NO APLICA',1,0,'C');
            }else{
                if($resultLindDoc["uniAreaT"]=="N/A"){
                    $pdf->cell(22,5,''.$resultLindDoc["areaTotal"].'',1,0,'C');
                }else{
                     $pdf->cell(22,5,''.$resultLindDoc["areaTotal"].' '.$resultLindDoc["uniAreaT"].'',1,0,'C');
                }
                
            }
            $pdf->SetY(172);    
            $pdf->SetX(66);
            $pdf->cell(35,5,utf8_decode('Niveles de Construcción'),1,0,'C');
            $pdf->SetY(172);    
            $pdf->SetX(101);
            if($resultLindDoc["nivelesConst"]=="NO APLICA"){
                $pdf->cell(35,5,'',1,0,'C');
            }else{
                $pdf->cell(35,5,''.$resultLindDoc["nivelesConst"].'',1,0,'C');
            }
            $pdf->SetY(172);    
            $pdf->SetX(136);
            $pdf->cell(31,5,utf8_decode('Area de Construcción'),1,0,'C');
            $pdf->SetY(172);    
            $pdf->SetX(167);
            if($resultLindDoc["areaConst"]=="NO APLICA"){
                $pdf->cell(0,5,'NO APLICA',1,0,'C');
            }else{
                if($resultLindDoc["uniAreaC"]=="N/A"){
                    $pdf->cell(0,5,''.$resultLindDoc["areaConst"].'',1,0,'C');
                }else{
                    $pdf->cell(0,5,''.$resultLindDoc["areaConst"].' '.$resultLindDoc["uniAreaC"].'',1,0,'C');
                }
            }
            $pdf->SetY(177);    
            $pdf->SetX(19);
            $pdf->cell(40,6,utf8_decode('Dirección del Inmueble'),1,0,'L');
            $pdf->SetY(177);    
            $pdf->SetX(59);
            $pdf->cell(0,6,'',1,0,'L');
            $pdf->SetY(177);    
            $pdf->SetX(59);
            $pdf->SetFont('Times','B',8);
            $pdf->Multicell(0,3,''.utf8_decode($resultInmueDe["direccion"]).'',0,'L');
        //SERVICIOS 1
            $pdf->SetFont('Times','B',9);
            $pdf->SetY(183);    
            $pdf->SetX(19);
            $pdf->cell(25,19,'Servicios',1,0,'C');
            $pdf->SetY(183);    
            $pdf->SetX(44);
            $pdf->cell(0,19,'',1,0,'C');
            $pdf->SetY(184);    
            $pdf->SetX(44);
            $pdf->cell(30,4,'Acueducto',0,0,'L');
            $pdf->SetY(184);    
            $pdf->SetX(74);
            if($resultServ["acued"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(188);    
            $pdf->SetX(44);
            $pdf->cell(30,4,'Acueducto Rural',0,0,'L');
            $pdf->SetY(188);    
            $pdf->SetX(74);
            if($resultServ["acuedRural"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(192);    
            $pdf->SetX(44);
            $pdf->cell(30,4,utf8_decode('Aguas Subterráneas'),0,0,'L');
            $pdf->SetY(192);    
            $pdf->SetX(74);
            if($resultServ["aguasSubter"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(196);    
            $pdf->SetX(44);
            $pdf->cell(30,4,'Aguas Servidas',0,0,'L');
            $pdf->SetY(196);    
            $pdf->SetX(74);
            if($resultServ["aguasServ"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
        //SERVICIOS 2
            $pdf->SetY(184);    
            $pdf->SetX(79);
            $pdf->cell(30,4,'Pavimento Flexible',0,0,'L');
            $pdf->SetY(184);    
            $pdf->SetX(109);
            if($resultServ["pavimentoFlex"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(188);    
            $pdf->SetX(79);
            $pdf->cell(30,4,'Pavimento Rigido',0,0,'L');
            $pdf->SetY(188);    
            $pdf->SetX(109);
            if($resultServ["pavimentoRig"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(192);    
            $pdf->SetX(79);
            $pdf->cell(30,4,utf8_decode('Vía Engranzonada'),0,0,'L');
            $pdf->SetY(192);    
            $pdf->SetX(109);
            if($resultServ["viaEngran"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(196);    
            $pdf->SetX(79);
            $pdf->cell(30,4,'Acera',0,0,'L');
            $pdf->SetY(196);    
            $pdf->SetX(109);
            if($resultServ["acera"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
        //SERVICIOS 3
            $pdf->SetY(184);    
            $pdf->SetX(114);
            $pdf->cell(30,4,utf8_decode('Alumbrado Público'),0,0,'L');
            $pdf->SetY(184);    
            $pdf->SetX(144);
            if($resultServ["alumbradoPub"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(188);    
            $pdf->SetX(114);
            $pdf->cell(30,4,'Aseo',0,0,'L');
            $pdf->SetY(188);    
            $pdf->SetX(144);
            if($resultServ["aseo"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(192);    
            $pdf->SetX(114);
            $pdf->cell(30,4,utf8_decode('Transporte Público'),0,0,'L');
            $pdf->SetY(192);    
            $pdf->SetX(144);
            if($resultServ["transportePublic"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(196);    
            $pdf->SetX(114);
            $pdf->cell(30,4,utf8_decode('Pozo Séptico'),0,0,'L');
            $pdf->SetY(196);    
            $pdf->SetX(144);
            if($resultServ["pozoSept"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
        //SERVICIOS 4
            $pdf->SetY(184);    
            $pdf->SetX(150);
            $pdf->cell(30,4,'Electricidad Residencial',0,0,'L');
            $pdf->SetY(184);    
            $pdf->SetX(186);
            if($resultServ["electriResi"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(188);    
            $pdf->SetX(150);
            $pdf->cell(30,4,'Electricidad Industrial',0,0,'L');
            $pdf->SetY(188);    
            $pdf->SetX(186);
            if($resultServ["electriIndus"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(192);    
            $pdf->SetX(150);
            $pdf->cell(30,4,utf8_decode('Línea Telefónica'),0,0,'L');
            $pdf->SetY(192);    
            $pdf->SetX(186);
            if($resultServ["lineaTelef"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
        //CARACTERISTICAS DEL TERRENO
            $pdf->SetY(202);    
            $pdf->SetX(19);
            $pdf->cell(106,4,'Caracteristicas del Terreno',1,0,'C');
            $pdf->SetY(240);    
            $pdf->SetX(19);
            $pdf->cell(78,14,'',1,0,'L'); //CUADRO DE OBSERVACIONES
            $pdf->SetY(240);    
            $pdf->SetX(20);
            $pdf->Cell(30,6,'Observaciones:',0,0,'L');
            $pdf->SetY(245);    
            $pdf->SetX(20);
            $pdf->MultiCell(75,8,$resultConst["observ"],0,"L");
            //TOPOGRAFIA
                $pdf->SetY(206);    
                $pdf->SetX(19);
                $pdf->cell(35,4,utf8_decode('Topografía'),1,0,'C');
                $pdf->SetY(210);    
                $pdf->SetX(19);
                $pdf->cell(35,11,'',1,0,'C');
                $pdf->SetY(205);    
                $pdf->SetX(15);
                $pdf->cell(30,17,'Terreno Llano',0,0,'C');
                $pdf->SetY(211);    
                $pdf->SetX(49);
                if($mostcarastInmue["topografia"]=="Terreno Llano"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(209);    
                $pdf->SetX(18);
                $pdf->cell(30,17,'Terreno Quebrado',0,0,'C');
                $pdf->SetY(215);    
                $pdf->SetX(49);
                if($mostcarastInmue["topografia"]=="Terreno Quebrado"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
            //FORMA
                $pdf->SetY(221);    
                $pdf->SetX(19);
                $pdf->cell(35,6,'Forma',1,0,'C');
                $pdf->SetY(227);    
                $pdf->SetX(19);
                $pdf->cell(35,13,'',1,0,'C');
                $pdf->SetY(227);    
                $pdf->SetX(25);
                $pdf->cell(50,7,'Regular',0,'C');
                $pdf->SetY(229);    
                $pdf->SetX(49);
                if($mostcarastInmue["forma"]=="Regular"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(232);    
                $pdf->SetX(25);
                $pdf->cell(50,7,'Irregular',0,'C');
                $pdf->SetY(234);    
                $pdf->SetX(49);
                if($mostcarastInmue["forma"]=="Irregular"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
            //USO
                $pdf->SetY(206);    
                $pdf->SetX(54);
                $pdf->cell(43,4,'Uso',1,0,'C');
                $pdf->SetY(210);    
                $pdf->SetX(54);
                $pdf->cell(43,30,'',1,0,'C');
                $pdf->SetY(212);    
                $pdf->SetX(55);
                $pdf->cell(30,4,'Residencial',0,0,'L');
                $pdf->SetY(212);    
                $pdf->SetX(91);
                if($mostcarastInmue["uso"]=="Residencial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(216);    
                $pdf->SetX(55);
                $pdf->cell(30,4,'Comercial',0,0,'L');
                $pdf->SetY(216);    
                $pdf->SetX(91);
                if($mostcarastInmue["uso"]=="Comercial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(220);    
                $pdf->SetX(55);
                $pdf->cell(30,4,'Residencial-Comercial',0,0,'L');
                $pdf->SetY(220);    
                $pdf->SetX(91);
                if($mostcarastInmue["uso"]=="Residencial-Comercial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(224);    
                $pdf->SetX(55);
                $pdf->cell(30,4,'Industrial',0,0,'L');
                $pdf->SetY(224);    
                $pdf->SetX(91);
                if($mostcarastInmue["uso"]=="Industrial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(228);    
                $pdf->SetX(55);
                $pdf->cell(30,4,utf8_decode('Espacios Públicos'),0,0,'L');
                $pdf->SetY(228);    
                $pdf->SetX(91);
                if($mostcarastInmue["uso"]=="Espacios-Publicos"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(232);    
                $pdf->SetX(55);
                $pdf->cell(30,4,'Rural',0,0,'L');
                $pdf->SetY(232);    
                $pdf->SetX(91);
                if($mostcarastInmue["uso"]=="Rural"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
            //TENENCIA
                $pdf->SetY(206);    
                $pdf->SetX(97);
                $pdf->cell(28,4,'Tenencia',1,0,'C');
                $pdf->SetY(210);    
                $pdf->SetX(97);
                $pdf->cell(28,44,'',1,0,'C');
                $pdf->SetY(211);    
                $pdf->SetX(98);
                $pdf->cell(25,4,'Municipio',0,0,'L');
                $pdf->SetY(211);    
                $pdf->SetX(119);
                if($mostcarastInmue["tenencia"]=="Municipio"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(215);    
                $pdf->SetX(98);
                $pdf->cell(25,4,'Comunidad',0,0,'L');
                $pdf->SetY(215);    
                $pdf->SetX(119);
                if($mostcarastInmue["tenencia"]=="Comunidad"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(219);    
                $pdf->SetX(98);
                $pdf->cell(25,4,'INTU',0,0,'L');
                $pdf->SetY(219);    
                $pdf->SetX(119);
                if($mostcarastInmue["tenencia"]=="INTU"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(223);    
                $pdf->SetX(98);
                $pdf->cell(25,4,'INTI',0,0,'L');
                $pdf->SetY(223);    
                $pdf->SetX(119);
                if($mostcarastInmue["tenencia"]=="INTI"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(227);    
                $pdf->SetX(98);
                $pdf->cell(25,4,'Propio',0,0,'L');
                $pdf->SetY(227);    
                $pdf->SetX(119);
                if($mostcarastInmue["tenencia"]=="Propio"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(231);    
                $pdf->SetX(98);
                $pdf->cell(25,4,'Enfiteusis',0,0,'L');
                $pdf->SetY(231);    
                $pdf->SetX(119);
                if($mostcarastInmue["tenencia"]=="Enfiteusis"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(235);    
                $pdf->SetX(98);
                $pdf->cell(25,4,'Ocupado',0,0,'L');
                $pdf->SetY(235);    
                $pdf->SetX(119);
                if($mostcarastInmue["tenencia"]=="Ocupado"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(239);    
                $pdf->SetX(98);
                $pdf->cell(25,4,'Otros',0,0,'L');
                $pdf->SetY(239);    
                $pdf->SetX(119);
                if($mostcarastInmue["tenencia"]=="Otros"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
        //CARACTERISTICAS DE LA CONSTRUCCION
                $pdf->SetY(202);    
                $pdf->SetX(125);
                $pdf->cell(0,4,utf8_decode('Caracteristicas del Construcción'),1,0,'C');
            //TIPOS DE CONSTRUCCION
                $pdf->SetY(206);    
                $pdf->SetX(125);
                $pdf->cell(33,4,utf8_decode('Tipo de Construcción'),1,0,'C');
                $pdf->SetY(211);    
                $pdf->SetX(126);
                $pdf->cell(4,4,'Concreto',0,0,'L');
                $pdf->SetY(211);    
                $pdf->SetX(153);
                if($resulCaracInmue["estructura"]=="Concreto"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(215);    
                $pdf->SetX(126);
                $pdf->cell(4,4,'Acero',0,0,'L');
                $pdf->SetY(215);    
                $pdf->SetX(153);
                if($resulCaracInmue["estructura"]=="Acero"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(219);    
                $pdf->SetX(126);
                $pdf->cell(4,4,'Concreto-Acero',0,0,'L');
                $pdf->SetY(219);    
                $pdf->SetX(153);
                if($resulCaracInmue["estructura"]=="Concreto-Acero"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(223);    
                $pdf->SetX(126);
                $pdf->cell(4,4,'Paredes Portantes',0,0,'L');
                $pdf->SetY(223);    
                $pdf->SetX(153);
                if($resulCaracInmue["estructura"]=="Paredes-Portantes"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(227);    
                $pdf->SetX(126);
                $pdf->cell(4,4,'Madera',0,0,'L');
                $pdf->SetY(227);    
                $pdf->SetX(153);
                if($resulCaracInmue["estructura"]=="Madera"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(231);    
                $pdf->SetX(126);
                $pdf->cell(4,4,'Prefabricado',0,0,'L');
                $pdf->SetY(231);    
                $pdf->SetX(153);
                if($resulCaracInmue["estructura"]=="Prefabricado"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(235);    
                $pdf->SetX(126);
                $pdf->cell(4,4,'Otros',0,0,'L');
                $pdf->SetY(235);    
                $pdf->SetX(153);
                if($resulCaracInmue["estructura"]=="Otros"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(210);    
                $pdf->SetX(125);
                $pdf->cell(33,44,'',1,0,'C');
            //DESTINO DE LA EDIFICACION
                $pdf->SetY(206);    
                $pdf->SetX(158);
                $pdf->cell(0,4,utf8_decode('Destino de la Edificación'),1,0,'C');
                $pdf->SetY(210);    
                $pdf->SetX(158);
                $pdf->cell(0,44,'',1,0,'C');
                $pdf->SetY(211);    
                $pdf->SetX(158);
                $pdf->cell(4,4,'Unifamiliar',0,0,'L');
                $pdf->SetY(211);    
                $pdf->SetX(188);
                if($resulCaracInmue["destino"]=="Unifamiliar"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(215);    
                $pdf->SetX(158);
                $pdf->cell(4,4,'Bifamiliar',0,0,'L');
                $pdf->SetY(215);    
                $pdf->SetX(188);
                if($resulCaracInmue["destino"]=="Bifamiliar"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(219);    
                $pdf->SetX(158);
                $pdf->cell(4,4,'Multifamiliar',0,0,'L');
                $pdf->SetY(219);    
                $pdf->SetX(188);
                if($resulCaracInmue["destino"]=="Multifamiliar"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(223);    
                $pdf->SetX(158);
                $pdf->cell(4,4,'Comercial',0,0,'L');
                $pdf->SetY(223);    
                $pdf->SetX(188);
                if($resulCaracInmue["destino"]=="Comercial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(227);    
                $pdf->SetX(158);
                $pdf->cell(4,4,'Industrial',0,0,'L');
                $pdf->SetY(227);    
                $pdf->SetX(188);
                if($resulCaracInmue["destino"]=="Industrial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(231);    
                $pdf->SetX(158);
                $pdf->cell(4,4,'Hotel-Posada',0,0,'L');
                $pdf->SetY(231);    
                $pdf->SetX(188);
                if($resulCaracInmue["destino"]=="Hotel-Posada"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(235);    
                $pdf->SetX(158);
                $pdf->cell(4,4,utf8_decode('Institución Pública'),0,0,'L');
                $pdf->SetY(235);    
                $pdf->SetX(188);
                if($resulCaracInmue["destino"]=="Institución Pública"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(239);    
                $pdf->SetX(158);
                $pdf->cell(4,4,utf8_decode('Espacios Públicos'),0,0,'L');
                $pdf->SetY(239);    
                $pdf->SetX(188);
                if($resulCaracInmue["destino"]=="Espacios Públicos"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }

        //NOTA EMPADRONAMIENTO
            $pdf->SetY(254);
            $pdf->SetX(19);
            $pdf->Cell(0,19,'',1,0);
            $pdf->SetY(255);
            $pdf->SetX(20);
            $pdf->Multicell(0,4,utf8_decode('NOTA: Declaro que la emisión del presente Certificado de Empadronamiento, no supone propiedad sobre el Inmueble por parte del ocupante. De conformidad a lo establecido en los Art. 18 Nº 34, Art. 105 y Art. 106; de la Ordenanza del Instituto Autónomo Municipal de Ordenamiento Territorial del Municipio Fernández Feo, Número De Gaceta 249, del 10 de Diciembre de 2.018.'),0,'L');
        //REDACCION
            $pdf->SetY(274);    
            $pdf->SetX(21);
            $pdf->SetFont('Times','B',9);
            $pdf->cell(50,4,utf8_decode('REDACCIÓN:'),0,'C');
            $pdf->SetY(274);    
            $pdf->SetX(44);
            $pdf->SetFont('Times','',9);
            $pdf->cell(50,4,utf8_decode(''.$idUser["nombre"].' '.$idUser["apellido"].''),0,'C');
            $pdf->SetY(278);    
            $pdf->SetX(21);
            $pdf->SetFont('Times','B',9);
            $pdf->Cell(100,4,'OBSERVACIONES:',0,'C');
            $pdf->SetY(278);    
            $pdf->SetX(51);
            $pdf->SetFont('Times','',9);
            $pdf->Cell(82,4,'Actualmente El (I.G.V.S.B) Y El ,',0,'J');
            $pdf->SetY(282);    
            $pdf->SetX(21);
            $pdf->MultiCell(75,4,utf8_decode('(I.A.M.O.T.F.F) Están Realizando El Trabajo De Actualización De La Nomenclatura De Los Inmuebles Del Municipio Fernández Feo.'),0,'J');
            $pdf->SetY(295);    
            $pdf->SetX(21);
            $pdf->SetFont('Times','B',9);
            $pdf->Cell(80,4,'NOTA:',0,'C');
            $pdf->SetY(295);    
            $pdf->SetX(34);
            $pdf->SetFont('Times','',9);
            $pdf->Cell(80,4,'Constancia que se expide a solicitud de parte',0,'J');
            $pdf->SetY(299);    
            $pdf->SetX(21);
            $pdf->SetFont('Times','',9);
            $pdf->MultiCell(75,4,utf8_decode('interesada para fines legales en la fecha antes descrita,'),0,'J');
            $pdf->SetY(303);    
            $pdf->SetX(21);
            $pdf->SetFont('Times','B',9);
            $pdf->MultiCell(114,4,utf8_decode('La presente tiene vigencia para el año fiscal en curso. '),0,'J');
        //FIRMA
            $pdf->SetY(290);    
            $pdf->SetX(120);
            $pdf->SetDrawColor(0,0,0,0);
            $pdf->SetFont('Times','B',7);
            $pdf->SetLineWidth(0.5);
            $pdf->MultiCell(73,3,utf8_decode('ING. LENIS YONDELBER COLMENARES CONTRERAS PRESIDENTE DEL INSTITUTO AUTONOMO MUNICIPAL DE ORDENAMIENTO TERRITORIAL DEL MUNICIPIO FERNANDEZ FEO (I.A.M.O.T.F.F.) SEGÚN RESOLUCIÓN NRO. ABSMFF/2020-021
            '),'T:1','C');
        
        $carpeta ='../../../assets/constancias/'.date("Y").'';
        if(!file_exists($carpeta)){
            mkdir($carpeta,0777,true);
            $pdf->Output('F','../../../assets/constancias/'.date("Y").'/'.$busExpedienteRes["n_expediente"].'.pdf');
        }else{
            $pdf->Output('F','../../../assets/constancias/'.date("Y").'/'.$busExpedienteRes["n_expediente"].'.pdf');
        }
        echo'
        <input type="hidden" id="rutaPdf" value="./assets/constancias/'.date("Y").'/'.$busExpedienteRes["n_expediente"].'.pdf" />
        <input type="hidden" id="numExp" value="'.$busExpedienteRes["n_expediente"].'">';
        
    }
}
class fMulta{
    var $empadro = "";
    var $idInmueble = "";
    var $idProp = "";
    var $nuExp = "";
    var $montoFact = "";
    var $fechFact = "";
    var $numFact= "";
    var $operacion= "";

    function imprimir(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        session_start();
        //BUSQUEDA DE USUARIO
            // $userSql = "SELECT id,nick,pass,nombre,apellido,cedula,direccion,telef,correo FROM usuarios where nick='".$_SESSION["usuario"]."'";
            // $resultUser= $link->query($userSql);
            // $idUser= $resultUser->fetch_assoc();
        //INSERT FACTURA
            // $expFactSql= "INSERT INTO factura(monto,n_factura,fecha)value('".$this->montoFact."','".$this->numFact."','".$this->fechFact."')";
            // $link->query($expFactSql);
            // $idExpFact= $link->insert_id;
        //INSERT CONSTANCIA
            // $fechaConst= date('Y-m-d');
            // $constansSql= "INSERT INTO constancias(tipo_operacion,fecha,fk_redactor,fk_exped)value('".$this->operacion."','".$fechaConst."',".$idUser["id"].",".$this->nuExp.")";
            // $link->query($constansSql);
            // $idConstancias = $link->insert_id;
        //INSERT PAGOS
            // $pagoExpSql= "INSERT INTO pagos(fk_expediente,fk_factura,fecha)value(".$this->nuExp.",".$idExpFact.",".$this->fechFact.")";
            // $link->query($pagoExpSql);
            // $idPagoExp= $link->insert_id;
        //BUSQUEDA DEL EXPEDIENTE
            // $busExpSql = "SELECT * FROM expediente where id=".$this->nuExp."";
            // $resBusExp = $link->query($busExpSql);
            // $busExpRes = $resBusExp->fetch_array();
        //BUSQUEDA DEL INMUEBLE
            // $expSql= "SELECT * from inmueble where id=".$this->idInmueble."";
            // $resInmue= $link->query($expSql);
            // $resultInmue = $resInmue->fetch_assoc();
            // $idProt= $resultInmue["fk_protocolizacion"];
            // $idLindDoc= $resultInmue["fk_lind_documento"];
            // $idTerreno = $resultInmue["fk_terreno"];
            // $idConst= $resultInmue["fk_carac_construccion"];
            // $idServicios= $resultInmue["fk_servicios"];
            // $idCaracInmue= $resultInmue["fk_carac_inmuebles"];
            // $idcaracConstruccion= $resultInmue["fk_carac_construccion"];
        //BUSQUEDA DEL PROPIETARIO
            // $expSql= "SELECT * from propietarios where id=".$this->idProp."";
            // $resProp= $link->query($expSql);
            // $resultPropie = $resProp->fetch_assoc();
            // $nombreProp= ''.$resultPropie["nombre"].' '.$resultPropie["apellido"].'';
        //BUSQUEDA DE PROTOCOLIZACION
            // $protSql = "SELECT * from datos_protocolizacion where id=".$idProt."";
            // $resProt = $link->query($protSql);
            // $resultProp = $resProt->fetch_assoc();
        //BUSQUEDA DE LINDEROS SEGUN DOCUMENTO
            // $lindDocSql= "SELECT * FROM linderos_documento where id=".$idLindDoc."";
            // $resLindDoc = $link->query($lindDocSql);
            // $resultLindDoc= $resLindDoc->fetch_assoc();
        //BUSQUEDA DE DATOS TERRENO
            // $terrSql= "SELECT * FROM terreno where id=".$idTerreno."";
            // $resTerr= $link->query($terrSql);
            // $resultTerr= $resTerr->fetch_assoc();
        //BUSQUEDA DE DATOS CONSTRUCCION
            // $constSql= "SELECT * from caracteristicas_construccion where id=".$idConst."";
            // $resConst= $link->query($constSql);
            // $resultConst= $resConst->fetch_assoc();
        //BUSQUEDA DE SERVICIOS
            // $servSql= "SELECT * FROM servicios_inmue where id=".$idServicios."";
            // $resServ= $link->query($servSql);
            // $resultServ= $resServ->fetch_assoc();
        //BUSQUEDA DE CARACTERISTICAS DEL INMUEBLE
            // $carastInmue= "SELECT * FROM carc_inmueble where id=".$idCaracInmue."";
            // $rescarastInmue= $link->query($carastInmue);
            // $mostcarastInmue= $rescarastInmue->fetch_assoc();
        //BUSQUEDA DE CARACTERISTICAS DE LA CONSTRUCCION
            // $carcConstSql= "SELECT * FROM caracteristicas_construccion where id=".$idcaracConstruccion."";
            // $resCaracConst= $link->query($carcConstSql);
            // $resulCaracInmue= $resCaracConst->fetch_assoc();
        // Creación del objeto de la clase heredada
            $pdf = new PDF('P','mm','A3');
            $pdf->SetMargins(20,0,22);
            $pdf->AliasNbPages();
            $pdf->AddPage();
        //CONTINUACION HEADER
            $pdf->SetFont('Times','B',12);
            $pdf->SetX(38);
            $pdf->SetY(44);
            $pdf->MultiCell(0,6,''.utf8_decode('Quien suscribe, Presidente del Instituto Autónomo Municipal de
            Ordenamiento Territorial  del Municipio Fernández Feo 
            (I.A.M.O.T.F.F)').'',0,'C');
            $pdf->SetY(65);
            $pdf->SetX(125);
            $pdf->SetFont('Times','B',11);
            $pdf->SetDrawColor(0,0,0,0);
            $pdf->SetLineWidth(0.5);
            $pdf->Cell(53,10,utf8_decode('NOTIFICACIÓN DE MULTA:'),'0,0,0,B:1',0,'C');
            $pdf->SetY(78);
            $pdf->SetX(215);
            $pdf->cell(40,10,'Fecha: '.date('d-m-Y').'');
            $pdf->SetY(84);
            $pdf->SetX(215);
            $pdf->cell(40,10,'IAMOTFF/P.A.M-xx/xx/xxxx-nº');
            $pdf->SetY(90);
            $pdf->SetX(215);
            $pdf->cell(40,10,'No Expediente: '.$busExpRes["n_expediente"].'');
        //CODIGO CATASTRAL
            $pdf->SetY(100);
            $pdf->SetX(19);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(0,5,'CODIGO CATASTRAL:',1,0,'C');
            $pdf->SetY(105);
            $pdf->SetX(19);
            $pdf->cell(26,5,'Efed',1,0,'C');
            $pdf->SetY(105);
            $pdf->SetX(45);
            $pdf->cell(26,5,'Mun',1,0,'C');
            $pdf->SetY(105);
            $pdf->SetX(71);
            $pdf->cell(26,5,'Prr',1,0,'C');
            $pdf->SetY(105);
            $pdf->SetX(97);
            $pdf->cell(26,5,'Amb',1,0,'C');
            $pdf->SetY(105);
            $pdf->SetX(123);
            $pdf->cell(26,5,'Sec',1,0,'C');
            $pdf->SetY(105);
            $pdf->SetX(149);
            $pdf->cell(26,5,'Ssec',1,0,'C');
            $pdf->SetY(105);
            $pdf->SetX(175);
            $pdf->cell(26,5,'Man',1,0,'C');
            $pdf->SetY(105);
            $pdf->SetX(201);
            $pdf->cell(25,5,'Par',1,0,'C');
            $pdf->SetY(105);
            $pdf->SetX(226);
            $pdf->cell(25,5,'Niv',1,0,'C');
            $pdf->SetY(105);
            $pdf->SetX(251);
            $pdf->cell(24,5,'Und',1,0,'C');
            $pdf->SetY(110);
            $pdf->SetX(19);
            $pdf->cell(13,7,'2',1,0,'C');
            $pdf->SetY(110);
            $pdf->SetX(32);
            $pdf->cell(13,7,'0',1,0,'C');
            $pdf->SetY(110);
            $pdf->SetX(45);
            $pdf->cell(13,7,'0',1,0,'C');
            $pdf->SetY(110);
            $pdf->SetX(58);
            $pdf->cell(13,7,'7',1,0,'C');
            $pdf->SetY(110);
            $pdf->SetX(71);
            $pdf->cell(13,7,'0',1,0,'C');
            $pdf->SetY(110);
            $pdf->SetX(84);
            if($resultInmue["parroquia"]=="Capital"){
                $pdf->cell(13,7,'1',1,0,'C');
            }elseif($resultInmue["parroquia"]=="Dr. Alberto Adriani"){
                $pdf->cell(13,7,'2',1,0,'C');
            }elseif($resultInmue["parroquia"]=="Santo Domingo"){
                $pdf->cell(13,7,'3',1,0,'C');
            }else{
                $pdf->cell(13,7,'0',1,0,'C');
            }
            $pdf->SetY(110);
            $pdf->SetX(97.2);
            if($resultInmue["ambito"]=="Urbano"){
                $pdf->cell(8.6,7,'U',1,0,'C');
            }elseif($resultInmue["ambito"]=="Rural"){
                $pdf->cell(8.6,7,'R',1,0,'C');
            }else{
                $pdf->cell(8.6,7,'0',1,0,'C');
            }
            $pdf->SetY(110);
            $pdf->SetX(106);
            $pdf->cell(8.6,7,'0',1,0,'C');
            $pdf->SetY(110);
            $pdf->SetX(114.6);
            $pdf->cell(8.6,7,'0',1,0,'C');
            $pdf->SetY(110);
            $pdf->SetX(123);
            $pdf->cell(8.6,7,'0',1,0,'C');
            $pdf->SetY(110);
            $pdf->SetX(131.6);
            $pdf->cell(8.6,7,'0',1,0,'C');
            $pdf->SetY(110);
            $pdf->SetX(140);
            $pdf->cell(8.9,7,'0',1,0,'C');
            $pdf->SetY(110);
            $pdf->SetX(149);
            $pdf->cell(8.6,7,'0',1,0,'C');
            $pdf->SetY(110);
            $pdf->SetX(157.5);
            $pdf->cell(8.6,7,'0',1,0,'C');
            $pdf->SetY(110);
            $pdf->SetX(166);
            $pdf->cell(8.9,7,'0',1,0,'C');
            $pdf->SetY(110);
            $pdf->SetX(174.8);
            $pdf->cell(8.9,7,'0',1,0,'C');
            $pdf->SetY(110);
            $pdf->SetX(184);
            $pdf->cell(8.6,7,'0',1,0,'C');
            $pdf->SetY(110);
            $pdf->SetX(192.4);
            $pdf->cell(8.6,7,'0',1,0,'C');
            $pdf->SetY(110);
            $pdf->SetX(200.7);
            $pdf->cell(8.6,7,'0',1,0,'C');
            $pdf->SetY(110);
            $pdf->SetX(209);
            $pdf->cell(8.6,7,'0',1,0,'C');
            $pdf->SetY(110);
            $pdf->SetX(217.4);
            $pdf->cell(8.6,7,'0',1,0,'C');
            $pdf->SetY(110);
            $pdf->SetX(226);
            $pdf->cell(8.6,7,'0',1,0,'C');
            $pdf->SetY(110);
            $pdf->SetX(234.6);
            $pdf->cell(8.6,7,'0',1,0,'C');
            $pdf->SetY(110);
            $pdf->SetX(243.2);
            $pdf->cell(7.8,7,'0',1,0,'C');
            $pdf->SetY(110);
            $pdf->SetX(251.2);
            $pdf->cell(8,7,'0',1,0,'C');
            $pdf->SetY(110);
            $pdf->SetX(259);
            $pdf->cell(8,7,'0',1,0,'C');
            $pdf->SetY(110);
            $pdf->SetX(267);
            $pdf->cell(8,7,'0',1,0,'C');
        //DATOS DEL PROPIETARIO
            $pdf->SetY(117);
            $pdf->SetX(19);
            $pdf->cell(0,5,'DATOS DEL PROPIETARIO:',1,0,'C');
            $pdf->SetY(122);
            $pdf->SetX(19);
            $pdf->cell(50,6,'No de Cedula:',1,0,'L');
            $pdf->SetY(122);
            $pdf->SetX(69);
            $pdf->cell(0,6,''.$resultPropie["cedula"].'',1,0,'L');
            $pdf->SetY(128);
            $pdf->SetX(19);
            $pdf->cell(50,6,'Rif:',1,0,'L');
            $pdf->SetY(128);
            $pdf->SetX(69);
            $pdf->cell(0,6,''.$resultPropie["rif"].'',1,0,'L');
            $pdf->SetY(134);
            $pdf->SetX(19);
            $pdf->cell(50,6,'Apellidos Y Nombres: ',1,0,'L');
            $pdf->SetY(134);
            $pdf->SetX(69);
            $pdf->Cell(0,6,''.utf8_decode($nombreProp).'',1,0,'L');
            $pdf->SetX(88);
            $pdf->Cell(0,6,'' ,0,0,'L');
            $pdf->SetY(140);
            $pdf->SetX(19);
            $pdf->cell(50,6,utf8_decode('No de Teléfono: '),1,0,'L');
            $pdf->SetY(140);
            $pdf->SetX(69);
            $pdf->cell(0,6,''.$resultPropie["telef"].'',1,0,'L');
            $pdf->SetY(146);
            $pdf->SetX(19);
            $pdf->cell(50,6,utf8_decode('Dirección Del Propietario:'),1,0,'L');
            $pdf->SetY(146);
            $pdf->SetX(69);
            $pdf->cell(0,6,''.utf8_decode($resultPropie["dir_hab"]).'',1,0,'L');
        //DATOS DE PROTOCOLIZACION
            $pdf->SetY(152);
            $pdf->SetX(19);
            $pdf->cell(0,6,''.utf8_decode("DATOS DE PROTOCOLIZACIÓN:").'',1,0,'C');
            $pdf->SetY(158);
            $pdf->SetX(19);
            $pdf->cell(110,6,'Documento Debidamente: '.$resultProp["documento"].'',1,0,'L');
            $pdf->SetY(158);
            $pdf->SetX(129);
            $pdf->cell(0,6,utf8_decode('Dirección: '.$resultProp["direccion"].''),1,0,'L');
            $pdf->SetY(164);
            $pdf->SetX(19);
            $pdf->cell(25,6,utf8_decode('Número:'),1,0,'C');
            $pdf->SetY(170);
            $pdf->SetX(19);
            $pdf->cell(25,6,''.$resultProp["numero"].'',1,0,'C');
            $pdf->SetY(164);
            $pdf->SetX(44);
            $pdf->cell(25,6,'Tomo:',1,0,'C');
            $pdf->SetY(170);
            $pdf->SetX(44);
            $pdf->cell(25,6,''.$resultProp["tomo"].'',1,0,'C');
            $pdf->SetY(164);
            $pdf->SetX(69);
            $pdf->cell(25,6,'Folio:',1,0,'C');
            $pdf->SetY(170);
            $pdf->SetX(69);
            $pdf->cell(25,6,''.$resultProp["folio"].'',1,0,'C');
            $pdf->SetY(164);
            $pdf->SetX(94);
            $pdf->cell(25,6,'Protocolo:',1,0,'C');
            $pdf->SetY(170);
            $pdf->SetX(94);
            $pdf->cell(25,6,''.$resultProp["protocolo"].'',1,0,'C');
            $pdf->SetY(164);
            $pdf->SetX(119);
            $pdf->cell(25,6,'Trimestre:',1,0,'C');
            $pdf->SetY(170);
            $pdf->SetX(119);
            $pdf->cell(25,6,''.$resultProp["trimestre"].'',1,0,'C');
            $pdf->SetY(164);
            $pdf->SetX(144);
            $pdf->cell(25,6,'Fecha:',1,0,'C');
            $pdf->SetY(170);
            $pdf->SetX(144);
            $pdf->cell(25,6,''.$resultProp["fecha"].'',1,0,'C');
            $pdf->SetY(164);
            $pdf->SetX(169);
            $pdf->cell(0,6,'Valor de Inmueble:',1,0,'C');
            $pdf->SetY(170);
            $pdf->SetX(169);
            $pdf->cell(0,6,''.$resultProp["valor_inmueble"].'',1,0,'C');
        //DATOS DE COLINDANTES SEGUN DOCUMENTO
            $pdf->SetY(176);
            $pdf->SetX(19);
            $pdf->cell(0,6,utf8_decode('DATOS DE COLINDANTES SEGÚN DOCUMENTO :'),1,0,'C');
            $pdf->SetY(182);
            $pdf->SetX(19);
            $pdf->cell(60,6,'Puntos Cardinales:',1,0,'C');
            $pdf->SetY(182);
            $pdf->SetX(79);
            $pdf->cell(150,6,'Alinderado:',1,0,'C');
            $pdf->SetY(182);
            $pdf->SetX(229);
            $pdf->cell(0,6,'Medida (m):',1,0,'C');
            $pdf->SetY(188);
            $pdf->SetX(19);
            $pdf->cell(60,6,'NORTE',1,0,'C');
            $pdf->SetY(188);
            $pdf->SetX(79);
            $pdf->cell(150,6,utf8_decode(''.$resultLindDoc["alind_n"].''),1,0,'C');
            $pdf->SetY(188);
            $pdf->SetX(229);
            if($resultLindDoc["uniNorte"] =="m"){
                $pdf->cell(0,6,''.$resultLindDoc["norte"].'',1,0,'C');    
            }elseif($resultLindDoc["uniNorte"] =="Lq"){
                $pdf->cell(0,6,''.$resultLindDoc["norte"].' '.$resultLindDoc["uniNorte"].'',1,0,'C');
            }else{
                $pdf->cell(0,6,'',1,0,'C');
            }
            $pdf->SetY(194);
            $pdf->SetX(19);
            $pdf->cell(60,6,'SUR',1,0,'C');
            $pdf->SetY(194);
            $pdf->SetX(79);
            $pdf->cell(150,6,utf8_decode(''.$resultLindDoc["alind_s"].''),1,0,'C');
            $pdf->SetY(194);
            $pdf->SetX(229);
            if($resultLindDoc["uniSur"] =="m"){
                $pdf->cell(0,6,''.$resultLindDoc["sur"].'',1,0,'C');
            }elseif($resultLindDoc["uniSur"] == "Lq"){
                $pdf->cell(0,6,''.$resultLindDoc["sur"].' '.$resultLindDoc["uniSur"].'',1,0,'C');
            }else{
                $pdf->cell(0,6,'',1,0,'C');
            }
            $pdf->SetY(200);
            $pdf->SetX(19);
            $pdf->cell(60,6,'ESTE',1,0,'C');
            $pdf->SetY(200);
            $pdf->SetX(79);
            $pdf->cell(150,6,utf8_decode(''.$resultLindDoc["alind_e"].''),1,0,'C');
            $pdf->SetY(200);
            $pdf->SetX(229);
            if($resultLindDoc["uniEste"] =="m"){
                $pdf->cell(0,6,''.$resultLindDoc["este"].'',1,0,'C');
            }elseif($resultLindDoc["uniEste"] == "Lq"){
                $pdf->cell(0,6,''.$resultLindDoc["este"].' '.$resultLindDoc["uniEste"].'',1,0,'C');
            }else{
                $pdf->cell(0,6,'',1,0,'C');
            }
            $pdf->SetY(206);
            $pdf->SetX(19);
            $pdf->cell(60,6,'OESTE',1,0,'C');
            $pdf->SetY(206);
            $pdf->SetX(79);
            $pdf->cell(150,6,utf8_decode(''.$resultLindDoc["alind_o"].''),1,0,'C');
            $pdf->SetY(206);
            $pdf->SetX(229);
            if($resultLindDoc["uniOeste"] =="m"){
                $pdf->cell(0,6,''.$resultLindDoc["oeste"].'',1,0,'C');
            }elseif($resultLindDoc["uniOeste"] == "Lq"){
                $pdf->cell(0,6,''.$resultLindDoc["oeste"].' '.$resultLindDoc["uniOeste"].'',1,0,'C');
            }else{
                $pdf->cell(0,6,''.$resultLindDoc["oeste"].'',1,0,'C');
            }
        //GACETA 
            $pdf->SetFont('Times','B',12);
            $pdf->SetY(212);    
            $pdf->SetX(19);
            $pdf->Multicell(0,6,utf8_decode('Según Gaceta Municipal N° 249, Publicada El 10 De Diciembre Del Año 2.018, En Su CAPÍTULO X: De Las Notificaciones, Sanciones, Recursos Administrativos Catastrales En El (I.A.M.O.T.F.F.). En La SECCIÓN SEGUNDA: De Las Sanciones. En Concordancia Con La Reforma Parcial De La Ordenanza Del Instituto Según Gaceta Municipal N° 225, Publicada El 10 De Diciembre Del Año 2.019'),1,'C');
        //SANCION 1
            $pdf->SetFont('Times','',11);
            $pdf->SetY(230);    
            $pdf->SetX(19);
            $pdf->cell(243,6,utf8_decode('Sanción Por Incumplimiento A La Obligación De Inscripción Del Inmueble En El Instituto, Art. 127.'),1,0,'L');
            $pdf->SetY(230);    
            $pdf->SetX(-35);
            $pdf->cell(13,6,utf8_decode(''),1,0,'L');
        //SANCION 2
            $pdf->SetY(236);    
            $pdf->SetX(19);
            $pdf->Multicell(243,6,utf8_decode('Sanción Por Incumplimiento A La Obligación De Mantenimiento, Conservación Y Actualización Del Inmueble Ante El Instituto (Mas De Un Año), Art. 127 Parágrafo Primero.'),1,'L');
            $pdf->SetY(236);    
            $pdf->SetX(-35);
            $pdf->cell(13,12,utf8_decode(''),1,0,'L');
        //SANCION 3
            $pdf->SetY(248);    
            $pdf->SetX(19);
            $pdf->Multicell(243,6,utf8_decode('Sanción Por Incumplimiento A La Obligación De Mantenimiento, Conservación Y Actualización Del Inmueble Ante El Instituto (Por Cada Dos Año), Art. 127 Parágrafo Segundo.'),1,'L');
            $pdf->SetY(248);    
            $pdf->SetX(-35);
            $pdf->cell(13,12,utf8_decode(''),1,0,'L');
        //SANCION 4
            $pdf->SetY(260);    
            $pdf->SetX(19);
            $pdf->Multicell(243,6,utf8_decode('Sanción Por Presentar Datos Falsos, Erróneos, Alterados O Insuficientes Ante El Instituto, Art. 128.'),1,'L');
            $pdf->SetY(260);    
            $pdf->SetX(-35);
            $pdf->cell(13,6,utf8_decode(''),1,0,'L');
        //SANCION 5
            $pdf->SetY(266);    
            $pdf->SetX(19);
            $pdf->Multicell(243,6,utf8_decode('Sanción Por Impedir Labores Catastrales Al Personal Autorizado Por El Instituto, Art. 129.'),1,'L');
            $pdf->SetY(266);    
            $pdf->SetX(-35);
            $pdf->cell(13,6,utf8_decode(''),1,0,'L');
        //SANCION 6
            $pdf->SetY(272);    
            $pdf->SetX(19);
            $pdf->Multicell(243,6,utf8_decode('Sanción Por Incumplimiento De Inscripción E Desarrollos Urbanísticos O Parcelarios En La Oficina Del Instituto, Art. 130.'),1,'L');
            $pdf->SetY(272);    
            $pdf->SetX(-35);
            $pdf->cell(13,6,utf8_decode(''),1,0,'L');
        //VALOR DE LA MULTA
            $pdf->SetFont('Times','B',13);
            $pdf->SetY(278);    
            $pdf->SetX(19);
            $pdf->cell(200,6,utf8_decode('El Valor De La Multa Pecuniaria Es'),1,0,'L');
            $pdf->SetY(278);    
            $pdf->SetX(-78);
            $pdf->cell(0,6,utf8_decode(''),1,0,'L');
        //SECCION TERCER
            $pdf->SetY(284);    
            $pdf->SetX(19);
            $pdf->cell(0,6,utf8_decode('SECCIÓN TERCERA: DE LOS RECURSOS ADMINISTRATIVOS'),1,0,'L');
        //ARTICULO
            $pdf->SetY(290);    
            $pdf->SetX(19);
            $pdf->Multicell(0,18,utf8_decode(''),1,'L');
            $pdf->SetY(290);    
            $pdf->SetX(20);
            $pdf->SetFont('Times','B',11);
            $pdf->Multicell(0,6,utf8_decode('Articulo 134.-'),0,'L');
            $pdf->SetFont('Times','',11);
            $pdf->SetY(290);    
            $pdf->SetX(44);
            $pdf->Multicell(0,6,utf8_decode('el interesado (a) podrá intentar el'),0,'L');
            $pdf->SetFont('Times','B',12);
            $pdf->SetY(290);    
            $pdf->SetX(97);
            $pdf->Multicell(0,6,utf8_decode('Recurso De Reconsideración'),0,'L');
            $pdf->SetFont('Times','',11);
            $pdf->SetY(290);    
            $pdf->SetX(150);
            $pdf->Multicell(0,6,utf8_decode('por ante el presidente (a) del (I.A.M.O.T.F.F.), este deberá ser ejercido dentro'),0,'L');
            $pdf->SetFont('Times','',11);
            $pdf->SetY(296);    
            $pdf->SetX(20);
            $pdf->Multicell(0,6,utf8_decode('de un lapso de quince (15) días hábiles, contados a partir de la fecha de su notificación; de la misma forma, podrá ejercer el'),0,'L');
            $pdf->SetFont('Times','B',12);
            $pdf->SetY(296);    
            $pdf->SetX(213);
            $pdf->Multicell(0,6,utf8_decode('Recurso De Apelación O'),0,'L');
            $pdf->SetY(302);    
            $pdf->SetX(20);
            $pdf->Multicell(0,6,utf8_decode('Jerárquico'),0,'L');
            $pdf->SetFont('Times','',11);
            $pdf->SetY(302);    
            $pdf->SetX(42);
            $pdf->Multicell(0,6,utf8_decode('por ante el alcalde (sa) del Municipio de conformidad con lo dispuesto en el'),0,'L');
            $pdf->SetFont('Times','B',12);
            $pdf->SetY(302);    
            $pdf->SetX(161);
            $pdf->Multicell(0,6,utf8_decode('Art. 135'),0,'L');
            $pdf->SetFont('Times','',11);
            $pdf->SetY(302);    
            $pdf->SetX(177);
            $pdf->Multicell(0,6,utf8_decode('de la (O.C.I.A.M.O.T.F.F.).'),0,'L');
        //NOTA
            $pdf->SetFont('Times','B',12);
            $pdf->SetY(310);    
            $pdf->SetX(20);
            $pdf->Multicell(0,6,utf8_decode('NOTA: La presenta multa, deberá ser cancelada en un lapso de quince (15) días hábiles'),0,'L');
        //REDACCION
            $pdf->SetFont('Times','B',11);
            $pdf->SetY(323);    
            $pdf->SetX(35);
            $pdf->cell(50,6,utf8_decode('Fecha:'),0,'C');
            $pdf->SetY(330);    
            $pdf->SetX(35);
            $pdf->cell(50,6,utf8_decode('Recibido Por:'),0,'C');
            $pdf->SetY(338);    
            $pdf->SetX(35);
            $pdf->cell(50,6,utf8_decode('C.I.V:'),0,'C');
            $pdf->SetY(345);    
            $pdf->SetX(35);
            $pdf->cell(50,6,utf8_decode('Horas:'),0,'C');
            $pdf->SetY(353);    
            $pdf->SetX(35);
            $pdf->cell(50,6,utf8_decode('NºTLF:'),0,'C');
            $pdf->SetY(361);    
            $pdf->SetX(35);
            $pdf->cell(50,6,utf8_decode('Firma:'),0,'C');
        //FIRMA
            $pdf->SetY(360);    
            $pdf->SetX(160);
            $pdf->SetDrawColor(0,0,0,0);
            $pdf->SetFont('Times','B',9);
            $pdf->SetLineWidth(0.5);
            $pdf->MultiCell(120,6,utf8_decode('ING. LENIS YONDELBER COLMENARES CONTRERAS PRESIDENTE DEL INSTITUTO AUTONOMO MUNICIPAL DE ORDENAMIENTO TERRITORIAL DEL MUNICIPIO FERNANDEZ FEO (I.A.M.O.T.F.F.) SEGÚN RESOLUCIÓN NRO. ABSMFF/2020-021
            '),'T:1','C');
        
        $pdf->Output('I','../../assets/constancias/'.$busExpRes["n_expediente"].'.pdf');
        echo'<input type="hidden" id="numExp" value="'.$busExpRes["n_expediente"].'">';
        
    }
}
// $F001 = new f002;
// $F001->imprimir();
?>