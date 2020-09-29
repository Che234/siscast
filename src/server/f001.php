<?php
require('../../lib/fpdf/fpdf.php');

class PDF1 extends FPDF{
    var $empadro = "";
    var $idInmueble = "";
    var $idProp = "";
    var $nuExp = "";
    var $montoFact = "";
    var $fechFact = "";
    var $numFact= "";
    var $operacion= "";
    // Cabecera de página
    function Header(){
        // Logos
        $this->Image('../../../assets/logo.jpg',10,3,34);
        $this->Image('../../../assets/escudo.jpg',175,3,34);
        $this->Image('../../../assets/fondoCabecera.jpg',50,3,120,30);
        // Arial bold 15
        $this->SetFont('Times','B',9);
        // Título
        $this->SetY(3);
        $this->SetX(74);
        $this->Cell(30,10,'REPUBLICA BOLIVARIANA DE VENEZUELA',0,'C');
        $this->SetY(8);
        $this->SetX(80);
        $this->Cell(30,10,'INSTITUTO AUTONOMO MUNICIPAL ',0,'C');
        $this->SetY(13);
        $this->SetX(81);
        $this->Cell(30,10,'DE ORDENAMIENTO TERRITORIAL',0,'C');
        $this->SetY(20);
        $this->SetX(71);
        $this->Cell(65,6,'MUNICIPIO FERNANDEZ FEO - EDO. TACHIRA',0,'C');
        $this->SetY(23);
        $this->SetX(98);
        $this->Cell(30,10,'RIF: G200129891',0,'C');
        // Salto de línea
        $this->Ln(20);
    }

    // Pie de página
    function Footer(){
        // Posición: a 1,5 cm del final
        $this->Image('../../../assets/fondoFooter.jpg',18,334,184,17);
        $this->SetY(336);    
        $this->SetX(70);
        $this->MultiCell(80,4,utf8_decode('PIÑAL, CALLE 3 ENTRE CARRERAS 3 Y 4,PALACIO MUNICIPAL, MUNICIPIO FERNANDEZ FEO '.utf8_encode('-').' ESTADO TACHIRA IAMOTFF@GMAIL.COM'),0,'C');
        // Arial italic 8
        $this->SetFont('Arial','I',8);
    }
        
}
class f1{
    var $empadro = "";
    var $idInmueble = "";
    var $idProp = "";
    var $nuExp = "";
    var $montoFact = "";
    var $fechFact = "";
    var $numFact= "";
    var $operacion= "";

    function imprimir(){
        include('conexion.php');
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
            $busExpSQL = "SELECT * FROM expediente where id=".$this->nuExp."";
            $resBusEXP = $link->query($busExpSQL);
            $busExpedienteRes = $resBusEXP->fetch_array();
        //BUSQUEDA DEL INMUEBLE
            $inmueDeSql= "SELECT * from inmueble where id=".$this->idInmueble."";
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
        //BUSQUEDA DE DATOS CONSTRUCCION
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
            $constansSql= "INSERT INTO constancias(tipo_operacion,fecha,fk_redactor,fk_expedi)value('".$this->operacion."','".$fechaConst."',".$idUser["id"].",".$this->nuExp.")";
            $link->query($constansSql);
            $idConstancias = $link->insert_id;
        //INSERT PAGOS
            $pagoExpSql= "INSERT INTO pagos(fk_expedient,fk_factura,fechaPagos)value(".$this->nuExp.",".$idExpFact["id"].",'".$this->fechFact."')";
            $link->query($pagoExpSql);
            $idPagoExp= $link->insert_id;

        // Creación del objeto de la clase heredada
            $pdf = new PDF1('P','mm',array(215.9,355.6));
            $pdf->SetMargins(20,0,22);
            $pdf->AliasNbPages();
            $pdf->AddPage();
        //CONTINUACION HEADER
            $pdf->SetFont('Times','B',11);
            $pdf->SetX(38);
            $pdf->SetY(38);
            $pdf->MultiCell(0,5,''.utf8_decode('Quien suscribe, Presidente del Instituto Autónomo Municipal de
            Ordenamiento Territorial  del Municipio Fernández Feo 
            (I.A.M.O.T.F.F)').'',0,'C');
            $pdf->SetX(182);
            $pdf->Cell(20,10,'F-002');
            $pdf->SetY(54);
            $pdf->SetX(92);
            $pdf->SetFont('Times','B',10);
            $pdf->SetDrawColor(0,0,0,0);
            $pdf->SetLineWidth(0.5);
            $pdf->Cell(40,5,'HACE CONSTAR:','0,0,0,B:1',0,'C');
            $pdf->SetY(60);
            $pdf->SetX(22);
            $pdf->cell(40,10,'Fecha: '.date('d-m-Y').'');
            $pdf->SetY(60);
            $pdf->SetX(140);
            $pdf->cell(40,10,'No de Factura: '.$this->numFact.'');
            $pdf->SetY(65);
            $pdf->SetX(22);
            $pdf->cell(40,10,'No Civico: No Aplica');
            $pdf->SetY(65);
            $pdf->SetX(140);
            $pdf->cell(40,10,'No Expediente: '.$busExpedienteRes["n_expediente"].'');
            $pdf->SetY(70);
            $pdf->SetX(22);
            $pdf->cell(40,10,''.utf8_decode('Tipo de Operación: '.$this->operacion.'').'');
        //CODIGO CATASTRAL
            $pdf->SetY(81);
            $pdf->SetX(19);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(0,5,'CODIGO CATASTRAL',1,0,'C');
            $pdf->SetY(86);
            $pdf->SetX(19);
            $pdf->cell(16,5,'Efed',1,0,'C');
            $pdf->SetY(86);
            $pdf->SetX(35);
            $pdf->cell(16,5,'Mun',1,0,'C');
            $pdf->SetY(86);
            $pdf->SetX(51);
            $pdf->cell(16,5,'Prr',1,0,'C');
            $pdf->SetY(86);
            $pdf->SetX(67);
            $pdf->cell(18,5,'Amb',1,0,'C');
            $pdf->SetY(86);
            $pdf->SetX(85);
            $pdf->cell(18,5,'Sec',1,0,'C');
            $pdf->SetY(86);
            $pdf->SetX(103);
            $pdf->cell(18,5,'Ssec',1,0,'C');
            $pdf->SetY(86);
            $pdf->SetX(121);
            $pdf->cell(18,5,'Man',1,0,'C');
            $pdf->SetY(86);
            $pdf->SetX(139);
            $pdf->cell(18,5,'Par',1,0,'C');
            $pdf->SetY(86);
            $pdf->SetX(157);
            $pdf->cell(18,5,'Niv',1,0,'C');
            $pdf->SetY(86);
            $pdf->SetX(175);
            $pdf->cell(19,5,'Und',1,0,'C');
            $pdf->SetY(91);
            $pdf->SetX(19);
            $pdf->cell(8,5,'2',1,0,'C');//LISTO
            $pdf->SetY(91);
            $pdf->SetX(27);
            $pdf->cell(8,5,'0',1,0,'C');//LISTO
            $pdf->SetY(91);
            $pdf->SetX(35);
            $pdf->cell(8,5,'0',1,0,'C');//LISTO
            $pdf->SetY(91);
            $pdf->SetX(43);
            $pdf->cell(8,5,'7',1,0,'C');//LISTO
            $pdf->SetY(91);
            $pdf->SetX(51);
            $pdf->cell(8,5,'0',1,0,'C');//LISTO
            $pdf->SetY(91);
            $pdf->SetX(59);
            if($resultInmueDe["parroquia"]=="Capital"){
                $pdf->cell(8,5,'1',1,0,'C');
            }elseif($resultInmueDe["parroquia"]=="Dr. Alberto Adriani"){
                $pdf->cell(8,5,'2',1,0,'C');
            }elseif($resultInmueDe["parroquia"]=="Santo Domingo"){
                $pdf->cell(8,5,'3',1,0,'C');
            }else{
                $pdf->cell(8,5,'0',1,0,'C');
            }//LISTO
            $pdf->SetY(91);
            $pdf->SetX(67);
            if($resultInmueDe["ambito"]=="Urbano"){
                $pdf->cell(6,5,'U',1,0,'C');
            }elseif($resultInmueDe["ambito"]=="Rural"){
                $pdf->cell(6,5,'R',1,0,'C');
            }else{
                $pdf->cell(6,5,'0',1,0,'C');
            }//LISTO
            $pdf->SetY(91);
            $pdf->SetX(73.2);
            $pdf->cell(6,5,'0',1,0,'C');//LISTO
            $pdf->SetY(91);
            $pdf->SetX(79);
            $pdf->cell(6,5,'0',1,0,'C');//LISTO
            $pdf->SetY(91);
            $pdf->SetX(85);
            $pdf->cell(6,5,'0',1,0,'C');//LISTO
            $pdf->SetY(91);
            $pdf->SetX(91);
            $pdf->cell(6,5,'0',1,0,'C');//LISTO
            $pdf->SetY(91);
            $pdf->SetX(97);
            $pdf->cell(6,5,'0',1,0,'C');//LISTO
            $pdf->SetY(91);
            $pdf->SetX(103);
            $pdf->cell(6,5,'0',1,0,'C');//LISTO
            $pdf->SetY(91);
            $pdf->SetX(109);
            $pdf->cell(6,5,'0',1,0,'C');//LISTO
            $pdf->SetY(91);
            $pdf->SetX(115);
            $pdf->cell(6,5,'0',1,0,'C');//LISTO
            $pdf->SetY(91);
            $pdf->SetX(121);
            $pdf->cell(6,5,'0',1,0,'C');//LISTO
            $pdf->SetY(91);
            $pdf->SetX(127);
            $pdf->cell(6,5,'0',1,0,'C');//LISTO
            $pdf->SetY(91);
            $pdf->SetX(133);
            $pdf->cell(6,5,'0',1,0,'C');//LISTO
            $pdf->SetY(91);
            $pdf->SetX(139);
            $pdf->cell(6,5,'0',1,0,'C');//LISTO
            $pdf->SetY(91);
            $pdf->SetX(145);
            $pdf->cell(6,5,'0',1,0,'C');//LISTO
            $pdf->SetY(91);
            $pdf->SetX(151);
            $pdf->cell(6,5,'0',1,0,'C');//LISTO
            $pdf->SetY(91);
            $pdf->SetX(157);
            $pdf->cell(6,5,'0',1,0,'C');//LISTO
            $pdf->SetY(91);
            $pdf->SetX(163);
            $pdf->cell(6,5,'0',1,0,'C');//LISTO
            $pdf->SetY(91);
            $pdf->SetX(169);
            $pdf->cell(6,5,'0',1,0,'C');//LISTO
            $pdf->SetY(91);
            $pdf->SetX(175);
            $pdf->cell(6,5,'0',1,0,'C');
            $pdf->SetY(91);
            $pdf->SetX(181);
            $pdf->cell(6,5,'0',1,0,'C');
            $pdf->SetY(91);
            $pdf->SetX(187);
            $pdf->cell(7,5,'0',1,0,'C');
        //DATOS DEL PROPIETARIO
            $pdf->SetFont('Times','B',9);
            $pdf->SetY(96);
            $pdf->SetX(19);
            $pdf->cell(0,5,'DATOS DEL PROPIETARIO',1,0,'C');
            $pdf->SetY(101);
            $pdf->SetX(19);
            $pdf->cell(46,6,'No de Cedula',1,0,'L');
            $pdf->SetY(101);
            $pdf->SetX(65);
            $pdf->cell(0,6,''.$resultPropieDe["cedula"].'',1,0,'L');
            $pdf->SetY(107);
            $pdf->SetX(19);
            $pdf->cell(46,6,'Rif',1,0,'L');
            $pdf->SetY(107);
            $pdf->SetX(65);
            $divRifSec = explode($resultPropieDe["rif"],'-');
            if($divRifSec[0]=="N/A"){
                if($divRifSec[1]=="NO APLICA"){
                    $pdf->cell(0,6,'NO APLICA',1,0,'L');
                }else{
                    $pdf->cell(0,6,'NO APLICA',1,0,'L');
                }
            }else{
                if($divRifSec[1]!="NO APLICA"){
                    $pdf->cell(0,6,''.$resultPropieDe["rif"].'',1,0,'L');
                }else{
                    $pdf->cell(0,6,'NO APLICA',1,0,'L');
                }
            }
            $pdf->SetY(113);
            $pdf->SetX(19);
            $pdf->cell(46,6,'Apellidos Y Nombres ',1,0,'L');
            $pdf->SetY(113);
            $pdf->SetX(65);
            $pdf->Cell(0,6,''.utf8_decode($nombreProp).'',1,0,'L');
            $pdf->SetX(84);
            $pdf->Cell(0,6,'' ,0,0,'L');
            $pdf->SetY(119);
            $pdf->SetX(19);
            $pdf->cell(46,6,utf8_decode('No de Teléfono '),1,0,'L');
            $pdf->SetY(119);
            $pdf->SetX(65);
            $divTelfSec = explode($resultPropieDe["telef"],'-');
            if($divTelfSec[0]=="N/A"){
                if($divTelfSec[1]=="NO APLICA"){
                    $pdf->cell(0,6,'NO APLICA',1,0,'L');
                }else{
                    $pdf->cell(0,6,'NO APLICA',1,0,'L');
                }
            }else{
                if($divTelfSec[1]!="NO APLICA"){
                    $pdf->cell(0,6,''.$resultPropieDe["telef"].'',1,0,'L');
                }else{
                    $pdf->cell(0,6,'NO APLICA',1,0,'L');
                }
            }
            $pdf->SetY(125);
            $pdf->SetX(19);
            $pdf->cell(46,6,utf8_decode('Dirección Del Propietario'),1,0,'L');
            $pdf->SetY(125);
            $pdf->SetX(65);
            $pdf->cell(0,6,''.utf8_decode($resultPropieDe["dir_hab"]).'',1,0,'L');
        //DATOS DE PROTOCOLIZACION
            $pdf->SetY(131);
            $pdf->SetX(19);
            $pdf->cell(0,6,''.utf8_decode("DATOS DE PROTOCOLIZACIÓN").'',1,0,'C');
            $pdf->SetY(137);
            $pdf->SetX(19);
            $pdf->cell(110,6,'Documento Debidamente: '.$resultProp["documento"].'',1,0,'L');
            $pdf->SetY(137);
            $pdf->SetX(129);
            $pdf->cell(0,6,utf8_decode('Dirección: '.$resultProp["direccion"].''),1,0,'L');
            $pdf->SetY(143);
            $pdf->SetX(19);
            $pdf->cell(25,6,utf8_decode('Número:'),1,0,'C');
            $pdf->SetY(149);
            $pdf->SetX(19);
            $pdf->SetFont('Times','B',9);
            $pdf->cell(25,6,''.$resultProp["numero"].'',1,0,'C');
            $pdf->SetY(143);
            $pdf->SetX(44);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(25,6,'Tomo',1,0,'C');
            $pdf->SetY(149);
            $pdf->SetX(44);
            $pdf->SetFont('Times','B',9);
            $pdf->cell(25,6,''.$resultProp["tomo"].'',1,0,'C');
            $pdf->SetY(143);
            $pdf->SetX(69);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(23,6,'Folios',1,0,'C');
            $pdf->SetY(149);
            $pdf->SetX(69);
            $pdf->SetFont('Times','B',9);
            $pdf->cell(23,6,''.$resultProp["folio"].'',1,0,'C');
            $pdf->SetY(143);
            $pdf->SetX(92);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(23,6,'Protocolo',1,0,'C');
            $pdf->SetY(149);
            $pdf->SetX(92);
            $pdf->SetFont('Times','B',9);
            $pdf->cell(23,6,''.$resultProp["protocolo"].'',1,0,'C');
            $pdf->SetY(143);
            $pdf->SetX(115);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(23,6,'Trimestre',1,0,'C');
            $pdf->SetY(149);
            $pdf->SetX(115);
            $pdf->SetFont('Times','B',9);
            $pdf->cell(23,6,''.$resultProp["trimestre"].'',1,0,'C');
            $pdf->SetY(143);
            $pdf->SetX(138);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(23,6,'Fecha',1,0,'C');
            $pdf->SetY(149);
            $pdf->SetX(138);
            $pdf->SetFont('Times','B',9);
            $pdf->cell(23,6,''.$resultProp["fecha"].'',1,0,'C');
            $pdf->SetY(143);
            $pdf->SetX(161);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(0,6,'Valor de Inmueble',1,0,'C');
            $pdf->SetY(149);
            $pdf->SetX(161);
            $pdf->SetFont('Times','B',9);
            $pdf->cell(0,6,''.$resultProp["valor_inmueble"].'',1,0,'C');
        //DATOS DE COLINDANTES SEGUN DOCUMENTO
            $pdf->SetY(155);
            $pdf->SetX(19);
            $pdf->cell(0,6,utf8_decode('DATOS DE COLINDANTES SEGÚN DOCUMENTO'),1,0,'C');
            $pdf->SetY(161);
            $pdf->SetX(19);
            $pdf->cell(35,6,'Puntos Cardinales',1,0,'C');
            $pdf->SetY(161);
            $pdf->SetX(54);
            $pdf->cell(113,6,'Alinderado',1,0,'C');
            $pdf->SetY(161);
            $pdf->SetX(167);
            $pdf->cell(0,6,'Medida (m)',1,0,'C');
            $pdf->SetY(167);
            $pdf->SetX(19);
            if($resultLindDoc["norte"]!="N/A"){
                $pdf->cell(35,6,'NORTE',1,0,'C');
            }elseif($resultLindDoc["norte"]=="N/A"){
                $pdf->cell(35,6,'NORESTE',1,0,'C');
            }
            $pdf->SetY(167);
            $pdf->SetX(54);
            $pdf->cell(113,6,utf8_decode(''.$resultLindDoc["alind_n"].''),1,0,'C');
            $pdf->SetY(167);
            $pdf->SetX(167);
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
            $pdf->SetY(173);
            $pdf->SetX(19);
            if($resultLindDoc["sur"]!="nada"){
                $pdf->cell(35,6,'SUR',1,0,'C');
            }
            if($resultLindDoc["sur"]=="nada"){
                $pdf->cell(35,6,'SURESTE',1,0,'C');
            }
            $pdf->SetY(173);
            $pdf->SetX(54);
            $pdf->cell(113,6,utf8_decode(''.$resultLindDoc["alind_s"].''),1,0,'C');
            $pdf->SetY(173);
            $pdf->SetX(167);
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
            
            $pdf->SetY(179);
            $pdf->SetX(19);
            if($resultLindDoc["este"]!="nada"){
                $pdf->cell(35,6,'ESTE',1,0,'C');
            }
            if($resultLindDoc["este"]=="nada"){
                $pdf->cell(35,6,'SUROESTE',1,0,'C');
            }
            $pdf->SetY(179);
            $pdf->SetX(54);
            $pdf->cell(113,6,utf8_decode(''.$resultLindDoc["alind_e"].''),1,0,'C');
            $pdf->SetY(179);
            $pdf->SetX(167);
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
            
            $pdf->SetY(185);
            $pdf->SetX(19);
            if($resultLindDoc["oeste"]!="nada"){
                $pdf->cell(35,6,'OESTE',1,0,'C');
            }
            if($resultLindDoc["oeste"]=="nada"){
                $pdf->cell(35,6,'NOROESTE',1,0,'C');
            }
            $pdf->SetY(185);
            $pdf->SetX(54);
            $pdf->cell(113,6,utf8_decode(''.$resultLindDoc["alind_o"].''),1,0,'C');
            $pdf->SetY(185);
            $pdf->SetX(167);
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
            $pdf->SetY(191);    
            $pdf->SetX(19);
            $pdf->cell(25,6,'Area de Terreno',1,0,'C');
            $pdf->SetY(191);    
            $pdf->SetX(44);
            if($resultLindDoc["areaTotal"]=="NO APLICA"){
                $pdf->cell(22,6,'NO APLICA',1,0,'C');
            }else{
                if($resultLindDoc["uniAreaT"]=="N/A"){
                    $pdf->cell(22,6,''.$resultLindDoc["areaTotal"].'',1,0,'C');
                }else{
                     $pdf->cell(22,6,''.$resultLindDoc["areaTotal"].''.$resultLindDoc["uniAreaT"].'',1,0,'C');
                }
                
            }
            $pdf->SetY(191);    
            $pdf->SetX(66);
            $pdf->cell(35,6,utf8_decode('Niveles de Construcción'),1,0,'C');
            $pdf->SetY(191);    
            $pdf->SetX(101);
            if($resultLindDoc["nivelesConst"]=="NO APLICA"){
                $pdf->cell(35,6,'',1,0,'C');
            }else{
                $pdf->cell(35,6,''.$resultLindDoc["nivelesConst"].'',1,0,'C');
            }
            
            $pdf->SetY(191);    
            $pdf->SetX(136);
            $pdf->cell(31,6,utf8_decode('Area de Construcción'),1,0,'C');
            $pdf->SetY(191);    
            $pdf->SetX(167);
            if($resultLindDoc["areaConst"]=="NO APLICA"){
                $pdf->cell(0,6,'NO APLICA',1,0,'C');
            }else{
                if($resultLindDoc["uniAreaC"]=="N/A"){
                    $pdf->cell(0,6,''.$resultLindDoc["areaConst"].'',1,0,'C');
                }else{
                    $pdf->cell(0,6,''.$resultLindDoc["areaConst"].' '.$resultLindDoc["uniAreaC"].'',1,0,'C');
                }
            }
            $pdf->SetY(197);    
            $pdf->SetX(19);
            $pdf->cell(60,6,utf8_decode('Dirección del Inmueble'),1,0,'L');
            $pdf->SetY(197);    
            $pdf->SetX(79);
            $pdf->cell(0,6,''.utf8_decode($resultInmueDe["direccion"]).'',1,0,'L');
        //SERVICIOS 1
            $pdf->SetY(203);    
            $pdf->SetX(19);
            $pdf->cell(25,19,'Servicios',1,0,'C');
            $pdf->SetY(203);    
            $pdf->SetX(44);
            $pdf->cell(0,19,'',1,0,'C');
            $pdf->SetY(201);    
            $pdf->SetX(44);
            $pdf->cell(30,10,'Acueducto',0,0,'L');
            $pdf->SetY(204);    
            $pdf->SetX(74);
            if($resultServ["acued"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(205);    
            $pdf->SetX(44);
            $pdf->cell(30,10,'Acueducto Rural',0,0,'L');
            $pdf->SetY(208);    
            $pdf->SetX(74);
            if($resultServ["acuedRural"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(209);    
            $pdf->SetX(44);
            $pdf->cell(30,10,utf8_decode('Aguas Subterráneas'),0,0,'L');
            $pdf->SetY(212);    
            $pdf->SetX(74);
            if($resultServ["aguasSubter"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(213);    
            $pdf->SetX(44);
            $pdf->cell(30,10,'Aguas Servidas',0,0,'L');
            $pdf->SetY(216);    
            $pdf->SetX(74);
            if($resultServ["aguasServ"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
        //SERVICIOS 2
            $pdf->SetY(201);    
            $pdf->SetX(79);
            $pdf->cell(30,10,'Pavimento Flexible',0,0,'L');
            $pdf->SetY(204);    
            $pdf->SetX(109);
            if($resultServ["pavimentoFlex"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(205);    
            $pdf->SetX(79);
            $pdf->cell(30,10,'Pavimento Rigido',0,0,'L');
            $pdf->SetY(208);    
            $pdf->SetX(109);
            if($resultServ["pavimentoRig"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(209);    
            $pdf->SetX(79);
            $pdf->cell(30,10,utf8_decode('Vía Engranzonada'),0,0,'L');
            $pdf->SetY(212);    
            $pdf->SetX(109);
            if($resultServ["viaEngran"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(213);    
            $pdf->SetX(79);
            $pdf->cell(30,10,'Acera',0,0,'L');
            $pdf->SetY(216);    
            $pdf->SetX(109);
            if($resultServ["acera"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
        //SERVICIOS 3
            $pdf->SetY(201);    
            $pdf->SetX(114);
            $pdf->cell(30,10,utf8_decode('Alumbrado Público'),0,0,'L');
            $pdf->SetY(204);    
            $pdf->SetX(144);
            if($resultServ["alumbradoPub"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(205);    
            $pdf->SetX(114);
            $pdf->cell(30,10,'Aseo',0,0,'L');
            $pdf->SetY(208);    
            $pdf->SetX(144);
            if($resultServ["aseo"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(209);    
            $pdf->SetX(114);
            $pdf->cell(30,10,utf8_decode('Transporte Público'),0,0,'L');
            $pdf->SetY(212);    
            $pdf->SetX(144);
            if($resultServ["transportePublic"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(213);    
            $pdf->SetX(114);
            $pdf->cell(30,10,utf8_decode('Pozo Séptico'),0,0,'L');
            $pdf->SetY(216);    
            $pdf->SetX(144);
            if($resultServ["pozoSept"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
        //SERVICIOS 4
            $pdf->SetY(201);    
            $pdf->SetX(150);
            $pdf->cell(30,10,'Electricidad Residencial',0,0,'L');
            $pdf->SetY(204);    
            $pdf->SetX(186);
            if($resultServ["electriResi"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(205);    
            $pdf->SetX(150);
            $pdf->cell(30,10,'Electricidad Industrial',0,0,'L');
            $pdf->SetY(208);    
            $pdf->SetX(186);
            if($resultServ["electriIndus"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(209);    
            $pdf->SetX(150);
            $pdf->cell(30,10,utf8_decode('Línea Telefónica'),0,0,'L');
            $pdf->SetY(212);    
            $pdf->SetX(186);
            if($resultServ["lineaTelef"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
        //CARACTERISTICAS DEL TERRENO
            $pdf->SetY(222);    
            $pdf->SetX(19);
            $pdf->cell(106,6,'Caracteristicas del Terreno',1,0,'C');
            $pdf->SetY(263);    
            $pdf->SetX(19);
            $pdf->cell(78,12,'',1,0,'L'); //CUADRO DE OBSERVACIONES
            $pdf->SetY(263);    
            $pdf->SetX(20);
            $pdf->Cell(30,6,'Observaciones:',0,0,'L');
            $pdf->SetY(267);    
            $pdf->SetX(20);
            $pdf->MultiCell(75,4,$resultConst["observ"],0,"L");
            //TOPOGRAFIA
                $pdf->SetY(228);    
                $pdf->SetX(19);
                $pdf->cell(35,5,utf8_decode('Topografía'),1,0,'C');
                $pdf->SetY(233);    
                $pdf->SetX(19);
                $pdf->cell(35,11,'',1,0,'C');
                $pdf->SetY(228);    
                $pdf->SetX(15);
                $pdf->cell(30,17,'Terreno Llano',0,0,'C');
                $pdf->SetY(234);    
                $pdf->SetX(49);
                if($mostcarastInmue["topografia"]=="Terreno Llano"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(232);    
                $pdf->SetX(18);
                $pdf->cell(30,17,'Terreno Quebrado',0,0,'C');
                $pdf->SetY(238);    
                $pdf->SetX(49);
                if($mostcarastInmue["topografia"]=="Terreno Quebrado"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
            //FORMA
                $pdf->SetY(244);    
                $pdf->SetX(19);
                $pdf->cell(35,6,'Forma',1,0,'C');
                $pdf->SetY(250);    
                $pdf->SetX(19);
                $pdf->cell(35,13,'',1,0,'C');
                $pdf->SetY(250);    
                $pdf->SetX(25);
                $pdf->cell(50,7,'Regular',0,'C');
                $pdf->SetY(252);    
                $pdf->SetX(49);
                if($mostcarastInmue["forma"]=="Regular"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(255);    
                $pdf->SetX(25);
                $pdf->cell(50,7,'Irregular',0,'C');
                $pdf->SetY(256);    
                $pdf->SetX(49);
                if($mostcarastInmue["forma"]=="Irregular"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
            //USO
                $pdf->SetY(228);    
                $pdf->SetX(54);
                $pdf->cell(43,5,'Uso',1,0,'C');
                $pdf->SetY(233);    
                $pdf->SetX(54);
                $pdf->cell(43,30,'',1,0,'C');
                $pdf->SetY(234);    
                $pdf->SetX(55);
                $pdf->cell(30,6,'Residencial',0,0,'L');
                $pdf->SetY(235);    
                $pdf->SetX(91);
                if($mostcarastInmue["uso"]=="Residencial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(238);    
                $pdf->SetX(55);
                $pdf->cell(30,6,'Comercial',0,0,'L');
                $pdf->SetY(239);    
                $pdf->SetX(91);
                if($mostcarastInmue["uso"]=="Comercial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(242);    
                $pdf->SetX(55);
                $pdf->cell(30,6,'Residencial-Comercial',0,0,'L');
                $pdf->SetY(243);    
                $pdf->SetX(91);
                if($mostcarastInmue["uso"]=="Residencial-Comercial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(246);    
                $pdf->SetX(55);
                $pdf->cell(30,6,'Industrial',0,0,'L');
                $pdf->SetY(247);    
                $pdf->SetX(91);
                if($mostcarastInmue["uso"]=="Industrial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(250);    
                $pdf->SetX(55);
                $pdf->cell(30,6,utf8_decode('Espacios Públicos'),0,0,'L');
                $pdf->SetY(251);    
                $pdf->SetX(91);
                if($mostcarastInmue["uso"]=="Espacios-Publicos"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(254);    
                $pdf->SetX(55);
                $pdf->cell(30,7,'Rural',0,0,'L');
                $pdf->SetY(255);    
                $pdf->SetX(91);
                if($mostcarastInmue["uso"]=="Rural"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
            //TENENCIA
                $pdf->SetY(228);    
                $pdf->SetX(97);
                $pdf->cell(28,5,'Tenencia',1,0,'C');
                $pdf->SetY(228);    
                $pdf->SetX(97);
                $pdf->cell(28,47,'',1,0,'C');
                $pdf->SetY(234);    
                $pdf->SetX(98);
                $pdf->cell(25,5,'Municipio',0,0,'L');
                $pdf->SetY(235);    
                $pdf->SetX(119);
                if($mostcarastInmue["tenencia"]=="Municipio"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(239);    
                $pdf->SetX(98);
                $pdf->cell(25,5,'Comunidad',0,0,'L');
                $pdf->SetY(239);    
                $pdf->SetX(119);
                if($mostcarastInmue["tenencia"]=="Comunidad"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(243);    
                $pdf->SetX(98);
                $pdf->cell(25,5,'INTU',0,0,'L');
                $pdf->SetY(243);    
                $pdf->SetX(119);
                if($mostcarastInmue["tenencia"]=="INTU"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(247);    
                $pdf->SetX(98);
                $pdf->cell(25,5,'INTI',0,0,'L');
                $pdf->SetY(247);    
                $pdf->SetX(119);
                if($mostcarastInmue["tenencia"]=="INTI"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(251);    
                $pdf->SetX(98);
                $pdf->cell(25,5,'Propio',0,0,'L');
                $pdf->SetY(251);    
                $pdf->SetX(119);
                if($mostcarastInmue["tenencia"]=="Propio"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(255);    
                $pdf->SetX(98);
                $pdf->cell(25,5,'Enfiteusis',0,0,'L');
                $pdf->SetY(255);    
                $pdf->SetX(119);
                if($mostcarastInmue["tenencia"]=="Enfiteusis"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(259);    
                $pdf->SetX(98);
                $pdf->cell(25,5,'Ocupado',0,0,'L');
                $pdf->SetY(259);    
                $pdf->SetX(119);
                if($mostcarastInmue["tenencia"]=="Ocupado"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(263);    
                $pdf->SetX(98);
                $pdf->cell(25,5,'Otros',0,0,'L');
                $pdf->SetY(263);    
                $pdf->SetX(119);
                if($mostcarastInmue["tenencia"]=="Otros"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
        //CARACTERISTICAS DE LA CONSTRUCCION
                $pdf->SetY(222);    
                $pdf->SetX(125);
                $pdf->cell(0,6,utf8_decode('Caracteristicas del Construcción'),1,0,'C');
            //TIPOS DE CONSTRUCCION
                $pdf->SetY(228);    
                $pdf->SetX(125);
                $pdf->cell(33,5,utf8_decode('Tipo de Construcción'),1,0,'C');
                $pdf->SetY(238);    
                $pdf->SetX(126);
                $pdf->cell(4,4,'Concreto',0,0,'L');
                $pdf->SetY(238);    
                $pdf->SetX(153);
                if($resulCaracInmue["estructura"]=="Concreto"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(242);    
                $pdf->SetX(126);
                $pdf->cell(4,4,'Acero',0,0,'L');
                $pdf->SetY(242);    
                $pdf->SetX(153);
                if($resulCaracInmue["estructura"]=="Acero"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(246);    
                $pdf->SetX(126);
                $pdf->cell(4,4,'Concreto-Acero',0,0,'L');
                $pdf->SetY(246);    
                $pdf->SetX(153);
                if($resulCaracInmue["estructura"]=="Concreto-Acero"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(250);    
                $pdf->SetX(126);
                $pdf->cell(4,4,'Paredes Portantes',0,0,'L');
                $pdf->SetY(250);    
                $pdf->SetX(153);
                if($resulCaracInmue["estructura"]=="Paredes-Portantes"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(254);    
                $pdf->SetX(126);
                $pdf->cell(4,4,'Madera',0,0,'L');
                $pdf->SetY(254);    
                $pdf->SetX(153);
                if($resulCaracInmue["estructura"]=="Madera"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(258);    
                $pdf->SetX(126);
                $pdf->cell(4,4,'Prefabricado',0,0,'L');
                $pdf->SetY(258);    
                $pdf->SetX(153);
                if($resulCaracInmue["estructura"]=="Prefabricado"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(262);    
                $pdf->SetX(126);
                $pdf->cell(4,4,'Otros',0,0,'L');
                $pdf->SetY(262);    
                $pdf->SetX(153);
                if($resulCaracInmue["estructura"]=="Otros"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(233);    
                $pdf->SetX(125);
                $pdf->cell(33,42,'',1,0,'C');
            //DESTINO DE LA EDIFICACION
                $pdf->SetY(228);    
                $pdf->SetX(158);
                $pdf->cell(0,5,utf8_decode('Destino de la Edificación'),1,0,'C');
                $pdf->SetY(233);    
                $pdf->SetX(158);
                $pdf->cell(0,42,'',1,0,'C');
                $pdf->SetY(237);    
                $pdf->SetX(158);
                $pdf->cell(4,4,'Unifamiliar',0,0,'L');
                $pdf->SetY(237);    
                $pdf->SetX(188);
                if($resulCaracInmue["destino"]=="Unifamiliar"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(241.5);    
                $pdf->SetX(158);
                $pdf->cell(4,4,'Bifamiliar',0,0,'L');
                $pdf->SetY(241);    
                $pdf->SetX(188);
                if($resulCaracInmue["destino"]=="Bifamiliar"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(246);    
                $pdf->SetX(158);
                $pdf->cell(4,4,'Multifamiliar',0,0,'L');
                $pdf->SetY(245);    
                $pdf->SetX(188);
                if($resulCaracInmue["destino"]=="Multifamiliar"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(250);    
                $pdf->SetX(158);
                $pdf->cell(4,4,'Comercial',0,0,'L');
                $pdf->SetY(249);    
                $pdf->SetX(188);
                if($resulCaracInmue["destino"]=="Comercial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(254);    
                $pdf->SetX(158);
                $pdf->cell(4,4,'Industrial',0,0,'L');
                $pdf->SetY(253);    
                $pdf->SetX(188);
                if($resulCaracInmue["destino"]=="Industrial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(258);    
                $pdf->SetX(158);
                $pdf->cell(4,4,'Hotel-Posada',0,0,'L');
                $pdf->SetY(257);    
                $pdf->SetX(188);
                if($resulCaracInmue["destino"]=="Hotel-Posada"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(262);    
                $pdf->SetX(158);
                $pdf->cell(4,4,utf8_decode('Institución Pública'),0,0,'L');
                $pdf->SetY(261);    
                $pdf->SetX(188);
                if($resulCaracInmue["destino"]=="Institución Pública"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(266);    
                $pdf->SetX(158);
                $pdf->cell(4,4,utf8_decode('Espacios Públicos'),0,0,'L');
                $pdf->SetY(265);    
                $pdf->SetX(188);
                if($resulCaracInmue["destino"]=="Espacios Públicos"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }

        //REDACCION
            $pdf->SetY(280);    
            $pdf->SetX(19);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(50,6,utf8_decode('REDACCIÓN:'),0,'C');
            $pdf->SetY(280);    
            $pdf->SetX(47);
            $pdf->SetFont('Times','',11);
            $pdf->cell(50,6,utf8_decode(''.$idUser["nombre"].' '.$idUser["apellido"].''),0,'C');
            $pdf->SetY(286);    
            $pdf->SetX(19);
            $pdf->SetFont('Times','B',9);
            $pdf->Cell(100,7,'OBSERVACIONES:',0,'C');
            $pdf->SetY(286);    
            $pdf->SetX(49);
            $pdf->SetFont('Times','',9);
            $pdf->MultiCell(80,7,'Actualmente El (I.G.V.S.B) Y El,',0);
            $pdf->SetY(292);    
            $pdf->SetX(19);
            $pdf->MultiCell(75,5,utf8_decode('(I.A.M.O.T.F.F) están Realizando El Trabajo De Actualización De La Nomenclatura De Los Inmuebles Del Municipio Fernández Feo.'),0,'J');
            $pdf->SetY(306);    
            $pdf->SetX(19);
            $pdf->SetFont('Times','B',9);
            $pdf->Cell(80,7,'NOTA:',0,'C');
            $pdf->SetY(306.5);    
            $pdf->SetX(31);
            $pdf->SetFont('Times','',9);
            $pdf->Cell(65,6,'Constancia que se expide a solicitud de parte',0,'J');
            $pdf->SetY(312);    
            $pdf->SetX(19);
            $pdf->SetFont('Times','',9);
            $pdf->MultiCell(75,4,utf8_decode('interesada para fines legales en la fecha antes descrita, La presente tiene vigencia para el año fiscal en curso.'),0,'J');
        //FIRMA
            $pdf->SetY(310);    
            $pdf->SetX(120);
            $pdf->SetDrawColor(0,0,0,0);
            $pdf->SetFont('Times','B',7);
            $pdf->SetLineWidth(0.5);
            $pdf->MultiCell(73,5,utf8_decode('ING. LENIS YONDELBER COLMENARES CONTRERAS PRESIDENTE DEL INSTITUTO AUTONOMO MUNICIPAL DE ORDENAMIENTO TERRITORIAL DEL MUNICIPIO FERNANDEZ FEO (I.A.M.O.T.F.F.) SEGÚN RESOLUCIÓN NRO. ABSMFF/2020-021'),'T:1','C');
        
        $carpeta ='../../../assets/constancias/'.date("Y").'';
        if(!file_exists($carpeta)){
            mkdir($carpeta,0777,true);
            $pdf->Output('F','../../../assets/constancias/'.date("Y").'/'.$busExpedienteRes["n_expediente"].'.pdf');
        }else{
            $pdf->Output('F','../../../assets/constancias/'.date("Y").'/'.$busExpedienteRes["n_expediente"].'.pdf');
        }
        echo'
        <input type="hidden" id="rutaPdf" value="http://localhost/SisCast/assets/constancias/'.date("Y").'/'.$busExpedienteRes["n_expediente"].'.pdf" />
        <input type="hidden" id="numExp" value="'.$busExpedienteRes["n_expediente"].'">';
        
    }

}
?>