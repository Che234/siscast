<?php
require('../../lib/fpdf/fpdf.php');

class PDF extends FPDF{


    // Cabecera de página
    function Header(){
        // Logos
        $this->Image('../../../assets/logo.jpg',25,5,34);
        $this->Image('../../../assets/escudo.jpg',240,5,34);
        $this->Image('../../../assets/fondoCabecera.jpg',63,5,172,30);
        // Arial bold 15
        $this->SetFont('Times','B',10);
        // Título
        $this->SetY(6);
        $this->SetX(114);
        $this->Cell(30,10,'REPUBLICA BOLIVARIANA DE VENEZUELA',0,'C');
        $this->SetY(11);
        $this->SetX(120);
        $this->Cell(30,10,'INSTITUTO AUTONOMO MUNICIPAL ',0,'C');
        $this->SetY(16);
        $this->SetX(121);
        $this->Cell(30,10,'DE ORDENAMIENTO TERRITORIAL',0,'C');
        $this->SetY(23);
        $this->SetX(112);
        $this->Cell(65,6,'MUNICIPIO FERNANDEZ FEO - EDO. TACHIRA',0,'C');
        $this->SetY(26);
        $this->SetX(138);
        $this->Cell(30,10,'RIF: G200129891',0,'C');
        // Salto de línea
        $this->Ln(20);
    }

    // Pie de página
    function Footer(){
        // Posición: a 1,5 cm del final
        $this->Image('../../../assets/fondoFooter.jpg',19,395,260,20);
        $this->SetY(395);    
        $this->SetX(100);
        $this->Cell(100,10,utf8_decode('PIÑAL, CALLE 3 ENTRE CARRERAS 3 Y 4,'),0,0,'C',false);
        $this->SetY(400);    
        $this->SetX(95);
        $this->Cell(100,10,utf8_decode('PALACIO MUNICIPAL, MUNICIPIO FERNANDEZ FEO – ESTADO TACHIRA'),0,'C');
        $this->SetY(405);    
        $this->SetX(99);
        $this->cell(100,10,'IAMOTFF@GMAIL.COM.',0,0,'C');
        // Arial italic 8
        $this->SetFont('Arial','I',8);
    }
}

class f001{
    var $empadro = "";
    var $idInmueble = "";
    var $idProp = "";
    var $nuExp = "";
    var $montoFact = "";
    var $fechFact = "";
    var $numFact= "";
    var $operacion = "";
    
    function imprimir(){
        $pdf = new PDF('P','mm','A3');
        $pdf->SetMargins(20,0,22);
        $pdf->AliasNbPages();
        $pdf->AddPage();
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
                $busExpSQL = "SELECT * FROM expediente where id=".$this->nuExp."";
                echo $busExpSQL;
                $resBusEXP = $link->query($busExpSQL);
                $busExpedienteRes = $resBusEXP->fetch_array();
                $fecha = explode('-',$busExpedienteRes["fecha"]);
                $anoExp= $fecha[0];
                echo '<input type="hidden" value="'.$anoExp.'" id="anoExp" />
                <input type="hidden" value="'.$busExpedienteRes["n_expediente"].'" id="nuExp" />';
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
            //BUSQUEDA DE LINDEROS GENERAL
                $lindGenSql= "SELECT * FROM linderos_general where id='".$idLindGen."'";
                $resLindGen = $link->query($lindGenSql);
                $resultLindGen= $resLindGen->fetch_assoc();
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
                $pagoExpSql= "INSERT INTO pagos(fk_expedient,fk_factura,fechaPagos,tipo)value(".$busExpedienteRes["n_expediente"].",".$idExpFact["id"].",'".$this->fechFact."',DEFAULT)";
                $link->query($pagoExpSql);
                $idPagoExp= $link->insert_id;
            
        //CONTINUACION HEADER
            $pdf->SetFont('Times','B',12);
            $pdf->SetX(38);
            $pdf->SetY(38);
            $pdf->MultiCell(0,6,utf8_decode('Quien suscribe, Presidente del Instituto Autónomo Municipal de
            Ordenamiento Territorial  del Municipio Fernández Feo 
            (I.A.M.O.T.F.F)
            '),0,'C');
            $pdf->SetY(52);
            $pdf->SetX(240);
            $pdf->Cell(20,10,'F-001');
            $pdf->SetY(58);
            $pdf->SetX(130);
            $pdf->SetFont('Times','B',11);
            $pdf->SetDrawColor(0,0,0,0);
            $pdf->SetLineWidth(0.5);
            $pdf->Cell(40,7,'HACE CONSTAR:','0,0,0,B:1',0,'C');
            $pdf->SetY(65);
            $pdf->SetX(22);
            $pdf->cell(40,10,'Fecha: '.date('d-m-Y').'');
            $pdf->SetY(65);
            $pdf->SetX(215);
            $pdf->cell(40,10,'No de Factura: '.$this->numFact.'');
            $pdf->SetY(70);
            $pdf->SetX(22);
            $pdf->cell(40,10,'No Civico: No Aplica');
            $pdf->SetY(70);
            $pdf->SetX(215);
            $pdf->cell(40,10,'No Expediente: '.$busExpedienteRes["n_expediente"].'');
            $pdf->SetY(74);
            $pdf->SetX(22);
            $pdf->cell(40,10,utf8_decode('Tipo de Operación: '.$this->operacion.''));
        //CODIGO CATASTRAL
            $pdf->SetY(84);
            $pdf->SetX(19);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(0,5,'CODIGO CATASTRAL',1,0,'C');
            $pdf->SetY(89);
            $pdf->SetX(19);
            $pdf->cell(26,5,'Efed',1,0,'C');
            $pdf->SetY(89);
            $pdf->SetX(45);
            $pdf->cell(26,5,'Mun',1,0,'C');
            $pdf->SetY(89);
            $pdf->SetX(71);
            $pdf->cell(26,5,'Prr',1,0,'C');
            $pdf->SetY(89);
            $pdf->SetX(97);
            $pdf->cell(26,5,'Amb',1,0,'C');
            $pdf->SetY(89);
            $pdf->SetX(123);
            $pdf->cell(26,5,'Sec',1,0,'C');
            $pdf->SetY(89);
            $pdf->SetX(149);
            $pdf->cell(26,5,'Ssec',1,0,'C');
            $pdf->SetY(89);
            $pdf->SetX(175);
            $pdf->cell(26,5,'Man',1,0,'C');
            $pdf->SetY(89);
            $pdf->SetX(201);
            $pdf->cell(25,5,'Par',1,0,'C');
            $pdf->SetY(89);
            $pdf->SetX(226);
            $pdf->cell(25,5,'Niv',1,0,'C');
            $pdf->SetY(89);
            $pdf->SetX(251);
            $pdf->cell(24,5,'Und',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(19);
            $pdf->cell(13,4,'2',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(32);
            $pdf->cell(13,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(45);
            $pdf->cell(13,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(58);
            $pdf->cell(13,4,'7',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(71);
            $pdf->cell(13,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(84);
            if($resultInmueDe["parroquia"]=="Capital"){
                $pdf->cell(13,4,'1',1,0,'C');
            }elseif($resultInmueDe["parroquia"]=="Dr. Alberto Adriani"){
                $pdf->cell(13,4,'2',1,0,'C');
            }elseif($resultInmueDe["parroquia"]=="Santo Domingo"){
                $pdf->cell(13,4,'3',1,0,'C');
            }else{
                $pdf->cell(13,4,'0',1,0,'C');
            }
            $pdf->SetY(94);
            $pdf->SetX(97.2);
            if($resultInmueDe["ambito"]=="Urbano"){
                $pdf->cell(8.6,4,'U',1,0,'C');
            }elseif($resultInmueDe["ambito"]=="Rural"){
                $pdf->cell(8.6,4,'R',1,0,'C');
            }else{
                $pdf->cell(8.6,4,'0',1,0,'C');
            }
            $pdf->SetY(94);
            $pdf->SetX(106);
            $pdf->cell(8.6,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(114.6);
            $pdf->cell(8.6,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(123);
            $pdf->cell(8.6,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(131.6);
            $pdf->cell(8.6,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(140);
            $pdf->cell(8.9,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(149);
            $pdf->cell(8.6,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(157.5);
            $pdf->cell(8.6,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(166);
            $pdf->cell(8.9,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(174.8);
            $pdf->cell(8.9,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(184);
            $pdf->cell(8.6,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(192.4);
            $pdf->cell(8.6,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(200.7);
            $pdf->cell(8.6,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(209);
            $pdf->cell(8.6,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(217.4);
            $pdf->cell(8.6,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(226);
            $pdf->cell(8.6,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(234.6);
            $pdf->cell(8.6,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(243.2);
            $pdf->cell(7.8,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(251.2);
            $pdf->cell(8,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(259);
            $pdf->cell(8,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(267);
            $pdf->cell(8,4,'0',1,0,'C');
        //DATOS DEL PROPIETARIO
            $pdf->SetY(98);
            $pdf->SetX(19);
            $pdf->cell(0,5,'DATOS DEL PROPIETARIO',1,0,'C');
            $pdf->SetY(103);
            $pdf->SetX(19);
            $pdf->cell(50,6,'No de Cedula',1,0,'L');
            $pdf->SetY(103);
            $pdf->SetX(69);
            $pdf->cell(0,6,''.$resultPropieDe["cedula"].'',1,0,'L');
            $pdf->SetY(109);
            $pdf->SetX(19);
            $pdf->cell(50,6,'Rif',1,0,'L');
            $pdf->SetY(109);
            $pdf->SetX(69);
            $divTelfSec = explode('-',$resultPropieDe["telef"]);
            $divRifSec = explode('-',$resultPropieDe["rif"]);
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
            $pdf->SetY(115);
            $pdf->SetX(19);
            $pdf->cell(50,6,'Apellidos Y Nombres',1,0,'L');
            $pdf->SetY(115);
            $pdf->SetX(69);
            $pdf->cell(0,6,''.utf8_decode($nombreProp).'',1,0,'L');
            $pdf->SetY(121);
            $pdf->SetX(19);
            $pdf->cell(50,6,utf8_decode('No de Teléfono'),1,0,'L');
            $pdf->SetY(121);
            $pdf->SetX(69);
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
            $pdf->SetY(127);
            $pdf->SetX(19);
            $pdf->cell(50,6,utf8_decode('Dirección Del Propietario'),1,0,'L');
            $pdf->SetY(127);
            $pdf->SetX(69);
            $pdf->cell(0,6,''.utf8_decode($resultPropieDe["dir_hab"]).'',1,0,'L');
        //DATOS DE PROTOCOLIZACION
            $pdf->SetY(133);
            $pdf->SetX(19);
            $pdf->cell(0,5,utf8_decode('DATOS DE PROTOCOLIZACIÓN'),1,0,'C');
            $pdf->SetY(138);
            $pdf->SetX(19);
            if($resultProp["documento"]=="NO APLICA"){
                $pdf->cell(110,6,'Documento Debidamente: NO APLICA',1,0,'L');
            }else{
                $pdf->cell(110,6,'Documento Debidamente: '.$resultProp["documento"].'',1,0,'L');
            }
            
            $pdf->SetY(138);
            $pdf->SetX(129);
            if($resultProp["direccion"]=="NO APLICA"){
                 $pdf->cell(0,6,utf8_decode('Dirección: NO APLICA'),1,0,'L');
             }else{
                 $pdf->cell(0,6,utf8_decode('Dirección: '.$resultProp["direccion"].''),1,0,'L');
             }
            $pdf->SetY(144);
            $pdf->SetX(19);
            $pdf->cell(28,5,utf8_decode('Número'),1,0,'C');
            $pdf->SetY(149);
            $pdf->SetX(19);
            if($resultProp["numero"]=="NO APLICA"){
                $pdf->cell(28,6,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(28,6,''.$resultProp["numero"].'',1,0,'C');
            }
            $pdf->SetY(144);
            $pdf->SetX(47);
            $pdf->cell(28,5,'Tomo',1,0,'C');
            $pdf->SetY(149);
            $pdf->SetX(47);
            if($resultProp["tomo"]=="NO APLICA"){
                $pdf->cell(28,6,'NO APLICA',1,0,'C');    
            }else{
                $pdf->cell(28,6,''.$resultProp["tomo"].'',1,0,'C');
            }
            $pdf->SetY(144);
            $pdf->SetX(75);
            $pdf->cell(28,5,'Folios',1,0,'C');
            $pdf->SetY(149);
            $pdf->SetX(75);
            if($resultProp["folio"]=="NO APLICA"){
                $pdf->cell(28,6,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(28,6,''.$resultProp["folio"].'',1,0,'C');
            }
            $pdf->SetY(144);
            $pdf->SetX(103);
            $pdf->cell(28,5,'Protocolo',1,0,'C');
            $pdf->SetY(149);
            $pdf->SetX(103);
            if($resultProp["protocolo"]=="NO APLICA"){
                $pdf->cell(28,6,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(28,6,''.$resultProp["protocolo"].'',1,0,'C');
            }
            $pdf->SetY(144);
            $pdf->SetX(131);
            $pdf->cell(28,5,'Trimestre',1,0,'C');
            $pdf->SetY(149);
            $pdf->SetX(131);
            if($resultProp["trimestre"]=="NO APLICA"){
                $pdf->cell(28,6,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(28,6,''.$resultProp["trimestre"].'',1,0,'C');
            }
            $pdf->SetY(144);
            $pdf->SetX(159);
            $pdf->cell(28,5,'Fecha',1,0,'C');
            $pdf->SetY(149);
            $pdf->SetX(159);
            if($resultProp["fecha"]=="NO APLICA"){
                $pdf->cell(28,6,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(28,6,''.$resultProp["fecha"].'',1,0,'C');
            }
            $pdf->SetY(144);
            $pdf->SetX(187);
            $pdf->cell(0,5,'Valor de Inmueble',1,0,'C');
            $pdf->SetY(149);
            $pdf->SetX(187);
            if($resultProp["valor_inmueble"]=="NO APLICA"){
                $pdf->cell(0,6,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(0,6,''.$resultProp["valor_inmueble"].'',1,0,'C');
            }
        //DATOS DE COLINDANTES SEGUN DOCUMENTO
            $pdf->SetY(155);
            $pdf->SetX(19);
            $pdf->cell(0,5,utf8_decode('DATOS DE COLINDANTES SEGÚN DOCUMENTO'),1,0,'C');
            $pdf->SetY(160);
            $pdf->SetX(19);
            $pdf->cell(60,6,'Puntos Cardinales',1,0,'C');
            $pdf->SetY(160);
            $pdf->SetX(79);
            $pdf->cell(150,6,'Alinderado',1,0,'C');
            $pdf->SetY(160);
            $pdf->SetX(229);
            $pdf->cell(0,6,'Medida (Mts)',1,0,'C');
            $pdf->SetY(166);
            $pdf->SetX(19);
            if($resultLindDoc["norte"]!="nada"){
                $pdf->cell(60,6,'NORTE',1,0,'C');
            }
            if($resultLindDoc["norte"]=="nada"){
                $pdf->cell(60,6,'NORESTE',1,0,'C');
            }
            $pdf->SetY(166);
            $pdf->SetX(79);
            $pdf->cell(150,6,utf8_decode(''.$resultLindDoc["alind_n"].''),1,0,'C');
            $pdf->SetY(166);
            $pdf->SetX(229);
            if($resultLindDoc["norte"]!="nada"){
                if($resultLindDoc["uniNorte"] =="m"){
                    $pdf->cell(0,6,''.$resultLindDoc["norte"].'',1,0,'C');
                }elseif($resultLindDoc["uniNorte"] == "Lq"){
                    $pdf->cell(0,6,''.$resultLindDoc["norte"].' '.$resultLindDoc["uniNorte"].'',1,0,'C');
                }elseif($resultLindDoc["uniNorte"] == "Ld"){
                    $pdf->cell(0,6,''.$resultLindDoc["norte"].' '.$resultLindDoc["uniNorte"].'',1,0,'C');
                }elseif($resultLindDoc["uniNorte"] == "otros"){
                    $pdf->cell(0,6,''.$resultLindDoc["norte"].'',1,0,'C');
                }else{
                    $pdf->cell(0,6,'',1,0,'C');
                }
            }
            if($resultLindDoc["norte"]=="nada"){
                if($resultLindDoc["uniNorte"] =="m"){
                    $pdf->cell(0,6,''.$resultLindDoc["noreste"].'',1,0,'C');
                }elseif($resultLindDoc["uniNorte"] == "Lq"){
                    $pdf->cell(0,6,''.$resultLindDoc["noreste"].' '.$resultLindDoc["uniNorte"].'',1,0,'C');
                }elseif($resultLindDoc["uniNorte"] == "Ld"){
                    $pdf->cell(0,6,''.$resultLindDoc["noreste"].' '.$resultLindDoc["uniNorte"].'',1,0,'C');
                }elseif($resultLindDoc["uniNorte"] == "otros"){
                    $pdf->cell(0,6,''.$resultLindDoc["noreste"].'',1,0,'C');
                }else{
                    $pdf->cell(0,6,'',1,0,'C');
                }
            }
            
            $pdf->SetY(172);
            $pdf->SetX(19);
            if($resultLindDoc["sur"]!="nada"){
                $pdf->cell(60,6,'SUR',1,0,'C');
            }
            if($resultLindDoc["sur"]=="nada"){
                $pdf->cell(60,6,'SURESTE',1,0,'C');
            }
            $pdf->SetY(172);
            $pdf->SetX(79);
            $pdf->cell(150,6,utf8_decode(''.$resultLindDoc["alind_s"].''),1,0,'C');
            $pdf->SetY(172);
            $pdf->SetX(229);
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
           
            $pdf->SetY(178);
            $pdf->SetX(19);
            if($resultLindDoc["este"]!="nada"){
                $pdf->cell(60,6,'ESTE',1,0,'C');
            }
            if($resultLindDoc["este"]=="nada"){
                $pdf->cell(60,6,'SUROESTE',1,0,'C');
            }
            $pdf->SetY(178);
            $pdf->SetX(79);
            $pdf->cell(150,6,utf8_decode(''.$resultLindDoc["alind_e"].''),1,0,'C');
            $pdf->SetY(178);
            $pdf->SetX(229);
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
            
            $pdf->SetY(184);
            $pdf->SetX(19);
            if($resultLindDoc["oeste"]!="nada"){
                $pdf->cell(60,6,'OESTE',1,0,'C');
            }
            if($resultLindDoc["oeste"]=="nada"){
                $pdf->cell(60,6,'NOROESTE',1,0,'C');
            }
            $pdf->SetY(184);
            $pdf->SetX(79);
            $pdf->cell(150,6,utf8_decode(''.$resultLindDoc["alind_o"].''),1,0,'C');
            $pdf->SetY(184);
            $pdf->SetX(229);
            if($resultLindDoc["oeste"]!="nada"){
                if($resultLindDoc["uniOeste"] =="m"){
                    $pdf->cell(0,6,''.$resultLindDoc["oeste"].'',1,0,'C');
                }elseif($resultLindDoc["uniOeste"] == "Lq"){
                    $pdf->cell(0,6,''.$resultLindDoc["oeste"].' '.$resultLindDoc["uniOeste"].'',1,0,'C');
                }elseif($resultLindDoc["uniOeste"] == "Ld"){
                    $pdf->cell(0,6,''.$resultLindDoc["oeste"].' '.$resultLindDoc["uniOeste"].'',1,0,'C');
                }elseif($resultLindDoc["uniOeste"] == "otros"){
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
            
            $pdf->SetY(190);    
            $pdf->SetX(19);
            $pdf->cell(40,6,'Area de Terreno',1,0,'C');
            $pdf->SetY(190);    
            $pdf->SetX(59);
            if($resultLindDoc["areaTotal"]=="NO APLICA"){
                $pdf->cell(40,6,'NO APLICA',1,0,'C');
            }else{
                if($resultLindDoc["uniAreaT"]=="N/A"){
                    $pdf->cell(40,6,''.$resultLindDoc["areaTotal"].'',1,0,'C');
                }else{
                    $pdf->cell(40,6,''.$resultLindDoc["areaTotal"].' '.$resultLindDoc["uniAreaT"].'',1,0,'C');
                }
            }
            $pdf->SetY(190);    
            $pdf->SetX(99);
            $pdf->cell(60,6,utf8_decode('Niveles de Construcción'),1,0,'C');
            $pdf->SetY(190);    
            $pdf->SetX(159);
            if($resultLindDoc["nivelesConst"]=="NO APLICA"){
                $pdf->cell(30,6,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(30,6,''.$resultLindDoc["nivelesConst"].'',1,0,'C');
            }
            $pdf->SetY(190);    
            $pdf->SetX(189);
            $pdf->cell(50,6,utf8_decode('Area de Construcción'),1,0,'C');
            $pdf->SetY(190);    
            $pdf->SetX(239);
            if($resultLindDoc["areaConst"]=="NO APLICA"){
                $pdf->cell(36,6,'NO APLICA',1,0,'C');
            }else{
                if($resultLindDoc["uniAreaC"]=="N/A"){
                    $pdf->cell(36,6,'NO APLICA',1,0,'C');
                }else{
                    $pdf->cell(36,6,''.$resultLindDoc["areaConst"].' '.$resultLindDoc["uniAreaC"].'',1,0,'C');
                }
                
            }
        //DATOS DE COLINDANTES SEGUN INSPECCION
            $pdf->SetY(196);
            $pdf->SetX(19);
            $pdf->cell(0,5,utf8_decode('DATOS DE COLINDANTES SEGÚN INSPECCIÓN'),1,0,'C');
            $pdf->SetY(201);
            $pdf->SetX(19);
            $pdf->cell(60,6,'Puntos Cardinales',1,0,'C');
            $pdf->SetY(201);
            $pdf->SetX(79);
            $pdf->cell(150,6,'Alinderado',1,0,'C');
            $pdf->SetY(201);
            $pdf->SetX(229);
            $pdf->cell(0,6,'Medida (Mts)',1,0,'C');
            $pdf->SetY(207);
            $pdf->SetX(19);
            if($resultLindGen["norte"]!="nada"){
                $pdf->cell(60,6,'NORTE',1,0,'C');
            }
            if($resultLindGen["norte"]=="nada"){
                $pdf->cell(60,6,'NORESTE',1,0,'C');
            }
            $pdf->SetY(207);
            $pdf->SetX(79);
            $pdf->cell(150,6,''.$resultLindGen["alind_n"].'',1,0,'C');
            $pdf->SetY(207);
            $pdf->SetX(229);
            if($resultLindGen["norte"]!="nada"){
                if($resultLindGen["uniNorte"] =="m"){
                    $pdf->cell(0,6,''.$resultLindGen["norte"].'',1,0,'C');
                }elseif($resultLindGen["uniNorte"] == "Lq"){
                    $pdf->cell(0,6,''.$resultLindGen["norte"].' '.$resultLindGen["uniNorte"].'',1,0,'C');
                }elseif($resultLindGen["uniNorte"] == "Ld"){
                    $pdf->cell(0,6,''.$resultLindGen["norte"].' '.$resultLindGen["uniNorte"].'',1,0,'C');
                }elseif($resultLindGen["uniNorte"] == "otros"){
                    $pdf->cell(0,6,''.$resultLindGen["norte"].'',1,0,'C');
                }else{
                    $pdf->cell(0,6,'',1,0,'C');
                }
            }
            if($resultLindGen["norte"]=="nada"){
                if($resultLindGen["uniNorte"] =="m"){
                    $pdf->cell(0,6,''.$resultLindGen["noreste"].'',1,0,'C');
                }elseif($resultLindGen["uniNorte"] == "Lq"){
                    $pdf->cell(0,6,''.$resultLindGen["noreste"].' '.$resultLindGen["uniNorte"].'',1,0,'C');
                }elseif($resultLindGen["uniNorte"] == "Ld"){
                    $pdf->cell(0,6,''.$resultLindGen["noreste"].' '.$resultLindGen["uniNorte"].'',1,0,'C');
                }elseif($resultLindGen["uniNorte"] == "otros"){
                    $pdf->cell(0,6,''.$resultLindGen["noreste"].'',1,0,'C');
                }else{
                    $pdf->cell(0,6,'',1,0,'C');
                }
            }
            
            $pdf->SetY(213);
            $pdf->SetX(19);
            if($resultLindGen["sur"]!="nada"){
                $pdf->cell(60,6,'SUR',1,0,'C');
            }
            if($resultLindGen["sur"]=="nada"){
                $pdf->cell(60,6,'SURESTE',1,0,'C');
            }
            $pdf->SetY(213);
            $pdf->SetX(79);
            $pdf->cell(150,6,utf8_decode(''.$resultLindGen["alind_s"].''),1,0,'C');
            $pdf->SetY(213);
            $pdf->SetX(229);
            if($resultLindGen["sur"]!="nada"){
                if($resultLindGen["uniSur"] =="m"){
                    $pdf->cell(0,6,''.$resultLindGen["sur"].'',1,0,'C');
                }elseif($resultLindGen["uniSur"] == "Lq"){
                    $pdf->cell(0,6,''.$resultLindGen["sur"].' '.$resultLindGen["uniSur"].'',1,0,'C');
                }elseif($resultLindGen["uniSur"] == "Ld"){
                    $pdf->cell(0,6,''.$resultLindGen["sur"].' '.$resultLindGen["uniSur"].'',1,0,'C');
                }elseif($resultLindGen["uniSur"] == "otros"){
                    $pdf->cell(0,6,''.$resultLindGen["sur"].' '.$resultLindGen["uniSur"].'',1,0,'C');
                }else{
                    $pdf->cell(0,6,'',1,0,'C');
                }
            }
            if($resultLindGen["sur"]=="nada"){
                if($resultLindGen["uniSur"] =="m"){
                    $pdf->cell(0,6,''.$resultLindGen["sureste"].'',1,0,'C');
                }elseif($resultLindGen["uniSur"] == "Lq"){
                    $pdf->cell(0,6,''.$resultLindGen["sureste"].' '.$resultLindGen["uniSur"].'',1,0,'C');
                }elseif($resultLindGen["uniSur"] == "Ld"){
                    $pdf->cell(0,6,''.$resultLindGen["sureste"].' '.$resultLindGen["uniSur"].'',1,0,'C');
                }elseif($resultLindGen["uniSur"] == "otros"){
                    $pdf->cell(0,6,''.$resultLindGen["sureste"].'',1,0,'C');
                }else{
                    $pdf->cell(0,6,'',1,0,'C');
                }
            }
            
            $pdf->SetY(219);
            $pdf->SetX(19);
            if($resultLindGen["este"]!="nada"){
                $pdf->cell(60,6,'ESTE',1,0,'C');
            }
            if($resultLindGen["este"]=="nada"){
                $pdf->cell(60,6,'SUROESTE',1,0,'C');
            }
            $pdf->SetY(219);
            $pdf->SetX(79);
            $pdf->cell(150,6,utf8_decode(''.$resultLindGen["alind_e"].''),1,0,'C');
            $pdf->SetY(219);
            $pdf->SetX(229);
            if($resultLindGen["este"]!="nada"){
                if($resultLindGen["uniEste"] =="m"){
                    $pdf->cell(0,6,''.$resultLindGen["este"].'',1,0,'C');
                }elseif($resultLindGen["uniEste"] == "Lq"){
                    $pdf->cell(0,6,''.$resultLindGen["este"].' '.$resultLindGen["uniEste"].'',1,0,'C');
                }elseif($resultLindGen["uniEste"] == "Ld"){
                    $pdf->cell(0,6,''.$resultLindGen["este"].' '.$resultLindGen["uniEste"].'',1,0,'C');
                }elseif($resultLindGen["uniEste"] == "otros"){
                    $pdf->cell(0,6,''.$resultLindGen["este"].'',1,0,'C');
                }else{
                    $pdf->cell(0,6,'',1,0,'C');
                }
            }
            if($resultLindGen["este"]=="nada"){
                if($resultLindGen["uniEste"] =="m"){
                    $pdf->cell(0,6,''.$resultLindGen["suroeste"].'',1,0,'C');
                }elseif($resultLindGen["uniEste"] == "Lq"){
                    $pdf->cell(0,6,''.$resultLindGen["suroeste"].' '.$resultLindGen["uniEste"].'',1,0,'C');
                }elseif($resultLindGen["uniEste"] == "Ld"){
                    $pdf->cell(0,6,''.$resultLindGen["suroeste"].' '.$resultLindGen["uniEste"].'',1,0,'C');
                }elseif($resultLindGen["uniEste"] == "otros"){
                    $pdf->cell(0,6,''.$resultLindGen["suroeste"].' '.$resultLindGen["uniEste"].'',1,0,'C');
                }else{
                    $pdf->cell(0,6,'',1,0,'C');
                }
            }
            
            $pdf->SetY(225);
            $pdf->SetX(19);
            if($resultLindGen["oeste"]!="nada"){
                $pdf->cell(60,6,'OESTE',1,0,'C');
            }
            if($resultLindGen["oeste"]=="nada"){
                $pdf->cell(60,6,'NOROESTE',1,0,'C');
            }
            $pdf->SetY(225);
            $pdf->SetX(79);
            $pdf->cell(150,6,utf8_decode(''.$resultLindGen["alind_o"].''),1,0,'C');
            $pdf->SetY(225);
            $pdf->SetX(229);
            if($resultLindGen["oeste"]!="nada"){
                if($resultLindGen["uniOeste"] =="m"){
                    $pdf->cell(0,6,''.$resultLindGen["oeste"].'',1,0,'C');
                }elseif($resultLindGen["uniOeste"] == "Lq"){
                    $pdf->cell(0,6,''.$resultLindGen["oeste"].' '.$resultLindGen["uniOeste"].'',1,0,'C');
                }elseif($resultLindGen["uniOeste"] == "Ld"){
                    $pdf->cell(0,6,''.$resultLindGen["oeste"].' '.$resultLindGen["uniOeste"].'',1,0,'C');
                }elseif($resultLindGen["uniOeste"] == "otros"){
                    $pdf->cell(0,6,''.$resultLindGen["oeste"].'',1,0,'C');
                }else{
                    $pdf->cell(0,6,'',1,0,'C');
                }
            }
            if($resultLindGen["oeste"]=="nada"){
                if($resultLindGen["uniOeste"] =="m"){
                    $pdf->cell(0,6,''.$resultLindGen["noroeste"].'',1,0,'C');
                }elseif($resultLindGen["uniOeste"] == "Lq"){
                    $pdf->cell(0,6,''.$resultLindGen["noroeste"].' '.$resultLindGen["uniOeste"].'',1,0,'C');
                }elseif($resultLindGen["uniOeste"] == "Ld"){
                    $pdf->cell(0,6,''.$resultLindGen["noroeste"].' '.$resultLindGen["uniOeste"].'',1,0,'C');
                }elseif($resultLindGen["uniOeste"] == "otros"){
                    $pdf->cell(0,6,''.$resultLindGen["noroeste"].'',1,0,'C');
                }else{
                    $pdf->cell(0,6,'',1,0,'C');
                }
            }
            
            $pdf->SetY(231);    
            $pdf->SetX(19);
            $pdf->cell(40,6,'Area de Terreno',1,0,'C');
            $pdf->SetY(231);    
            $pdf->SetX(59);
            if($resultLindGen["areaTotal"]=="NO APLICA"){
                $pdf->cell(40,6,'NO APLICA',1,0,'C');
            }else{
                if($resultLindGen["uniAreaT"]=="N/A"){
                    $pdf->cell(40,6,'NO APLICA',1,0,'C');
                }else{
                    $pdf->cell(40,6,''.$resultLindGen["areaTotal"].' '.$resultLindGen["uniAreaT"].'',1,0,'C');
                }
            }
            $pdf->SetY(231);    
            $pdf->SetX(99);
            $pdf->cell(60,6,utf8_decode('Niveles de Construcción'),1,0,'C');
            $pdf->SetY(231);    
            $pdf->SetX(159);
            if($resultLindGen["nivelesConst"]=="NO APLICA"){
                $pdf->cell(30,6,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(30,6,''.$resultLindGen["nivelesConst"].'',1,0,'C');
            }
            $pdf->SetY(231);    
            $pdf->SetX(189);
            $pdf->cell(50,6,utf8_decode('Area de Construcción'),1,0,'C');
            $pdf->SetY(231);    
            $pdf->SetX(239);
            if($resultLindGen["areaConst"]=="NO APLICA"){
                $pdf->cell(36,6,'NO APICA',1,0,'C');
            }else{
                if($resultLindGen["uniAreaC"]=="N/A"){
                    $pdf->cell(36,6,'NO APLICA',1,0,'C');
                }else{
                    $pdf->cell(36,6,''.$resultLindGen["areaConst"].' '.$resultLindGen["uniAreaC"].'',1,0,'C');
                }
            }
        //PARTE 6
            $pdf->SetY(237);    
            $pdf->SetX(19);
            $pdf->cell(60,6,utf8_decode('Dirección del Inmueble'),1,0,'C');
            $pdf->SetY(237);    
            $pdf->SetX(79);
            $pdf->cell(0,6,''.utf8_decode($resultInmueDe["direccion"]).'',1,0,'C');
            $pdf->SetY(243);    
            $pdf->SetX(19);
            $pdf->cell(60,6,utf8_decode('Régimen de la Propiedad'),1,0,'C');
            $pdf->SetY(243);    
            $pdf->SetX(79);
            $pdf->cell(0,6,''.$resultConst["Regimen"].'',1,0,'C');
            $pdf->SetY(249);    
            $pdf->SetX(19);
            $pdf->cell(60,6,'Uso del Inmueble',1,0,'C');
            $pdf->SetY(249);    
            $pdf->SetX(79);
            $pdf->cell(0,6,''.$mostcarastInmue["uso"].'',1,0,'C');
            $pdf->SetY(255);    
            $pdf->SetX(19);
            $pdf->cell(60,6,'Valor Estimado del Inmueble',1,0,'C');
            $pdf->SetY(255);    
            $pdf->SetX(79);
            $pdf->cell(0,6,''.$busExpedienteRes["valorInmue"].'',1,0,'C');
        //SERVICIOS 1
            $pdf->SetY(261);    
            $pdf->SetX(19);
            $pdf->cell(40,23,'Servicios',1,0,'C');
            $pdf->SetY(261);    
            $pdf->SetX(59);
            $pdf->cell(0,23,'',1,0,'C');
            $pdf->SetY(261);    
            $pdf->SetX(62);
            $pdf->cell(30,10,'Acueducto',0,0,'L');
            $pdf->SetY(264);    
            $pdf->SetX(106);
            if($resultServ["acued"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(265);    
            $pdf->SetX(62);
            $pdf->cell(30,10,'Acueducto Rural',0,0,'L');
            $pdf->SetY(268);    
            $pdf->SetX(106);
            if($resultServ["acuedRural"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(269);    
            $pdf->SetX(62);
            $pdf->cell(30,10,utf8_decode('Aguas Subterráneas'),0,0,'L');
            $pdf->SetY(272);    
            $pdf->SetX(106);
            if($resultServ["aguasSubter"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(273);    
            $pdf->SetX(62);
            $pdf->cell(30,10,'Aguas Servidas',0,0,'L');
            $pdf->SetY(276);    
            $pdf->SetX(106);
            if($resultServ["aguasServ"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
        //SERVICIOS 2
            $pdf->SetY(261);    
            $pdf->SetX(113);
            $pdf->cell(30,10,'Pavimento Flexible',0,0,'L');
            $pdf->SetY(264);    
            $pdf->SetX(156);
            if($resultServ["pavimentoFlex"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(265);    
            $pdf->SetX(113);
            $pdf->cell(30,10,'Pavimento Rigido',0,0,'L');
            $pdf->SetY(268);    
            $pdf->SetX(156);
            if($resultServ["pavimentoRig"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(269);    
            $pdf->SetX(113);
            $pdf->cell(30,10,utf8_decode('Vía Engranzonada'),0,0,'L');
            $pdf->SetY(272);    
            $pdf->SetX(156);
            if($resultServ["viaEngran"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(273);    
            $pdf->SetX(113);
            $pdf->cell(30,10,'Acera',0,0,'L');
            $pdf->SetY(276);    
            $pdf->SetX(156);
            if($resultServ["acera"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
        //SERVICIOS 3
            $pdf->SetY(261);    
            $pdf->SetX(163);
            $pdf->cell(30,10,utf8_decode('Alumbrado Público'),0,0,'L');
            $pdf->SetY(264);    
            $pdf->SetX(205);
            if($resultServ["alumbradoPub"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(265);    
            $pdf->SetX(163);
            $pdf->cell(30,10,'Aseo',0,0,'L');
            $pdf->SetY(268);    
            $pdf->SetX(205);
            if($resultServ["aseo"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(269);    
            $pdf->SetX(163);
            $pdf->cell(30,10,utf8_decode('Transporte Público'),0,0,'L');
            $pdf->SetY(272);    
            $pdf->SetX(205);
            if($resultServ["transportePublic"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(273);    
            $pdf->SetX(163);
            $pdf->cell(30,10,utf8_decode('Pozo Séptico'),0,0,'L');
            $pdf->SetY(276);    
            $pdf->SetX(205);
            if($resultServ["pozoSept"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
        //SERVICIOS 4
            $pdf->SetY(261);    
            $pdf->SetX(210);
            $pdf->cell(30,10,'Electricidad Residencial',0,0,'L');
            $pdf->SetY(264);    
            $pdf->SetX(260);
            if($resultServ["electriResi"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(265);    
            $pdf->SetX(210);
            $pdf->cell(30,10,'Electricidad Industrial',0,0,'L');
            $pdf->SetY(268);    
            $pdf->SetX(260);
            if($resultServ["electriIndus"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(269);    
            $pdf->SetX(210);
            $pdf->cell(30,10,utf8_decode('Línea Telefónica'),0,0,'L');
            $pdf->SetY(272);    
            $pdf->SetX(260);
            if($resultServ["lineaTelef"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
        //CARACTERISTICAS DEL TERRENO
            $pdf->SetY(284);    
            $pdf->SetX(19);
            $pdf->cell(150,6,'Caracteristicas del Terreno',1,0,'C');
            $pdf->SetY(334);    
            $pdf->SetX(19);
            $pdf->cell(110,14,'',1,0,'L');
            $pdf->SetY(334);    
            $pdf->SetX(20);
            $pdf->cell(30,6,'Observaciones:',0,0,'L');
            $pdf->SetY(340);    
            $pdf->SetX(20);
            $pdf->Cell(30,6,$resultConst["observ"],0,0,'L');
            //TOPOGRAFIA
                $pdf->SetY(290);    
                $pdf->SetX(19);
                $pdf->cell(50,6,utf8_decode('Topografía'),1,0,'C');
                $pdf->SetY(296);    
                $pdf->SetX(19);
                $pdf->cell(50,11,'',1,0,'C');
                $pdf->SetY(290);    
                $pdf->SetX(19);
                $pdf->cell(30,17,'Terreno Llano',0,0,'C');
                $pdf->SetY(297);    
                $pdf->SetX(59);
                if($mostcarastInmue["topografia"]=="Terreno Llano"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(295);    
                $pdf->SetX(22);
                $pdf->cell(30,17,'Terreno Quebrado',0,0,'C');
                $pdf->SetY(302);    
                $pdf->SetX(59);
                if($mostcarastInmue["topografia"]=="Terreno Quebrado"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
            //FORMA
                $pdf->SetY(307);    
                $pdf->SetX(19);
                $pdf->cell(50,6,'Forma',1,0,'C');
                $pdf->SetY(313);    
                $pdf->SetX(19);
                $pdf->cell(50,21,'',1,0,'C');
                $pdf->SetY(314);    
                $pdf->SetX(22);
                $pdf->cell(50,7,'Regular',0,'C');
                $pdf->SetY(316);    
                $pdf->SetX(49);
                if($mostcarastInmue["forma"]=="Regular"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(320);    
                $pdf->SetX(22);
                $pdf->cell(50,7,'Irregular',0,'C');
                $pdf->SetY(321);    
                $pdf->SetX(49);
                if($mostcarastInmue["forma"]=="Irregular"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
            //USO
                $pdf->SetY(290);    
                $pdf->SetX(69);
                $pdf->cell(60,6,'Uso',1,0,'C');
                $pdf->SetY(296);    
                $pdf->SetX(69);
                $pdf->cell(60,38,'',1,0,'C');
                $pdf->SetY(298);    
                $pdf->SetX(72);
                $pdf->cell(30,6,'Residencial',0,0,'L');
                $pdf->SetY(299.5);    
                $pdf->SetX(120);
                if($mostcarastInmue["uso"]=="Residencial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(302);    
                $pdf->SetX(72);
                $pdf->cell(30,6,'Comercial',0,0,'L');
                $pdf->SetY(303.5);    
                $pdf->SetX(120);
                if($mostcarastInmue["uso"]=="Comercial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(306);    
                $pdf->SetX(72);
                $pdf->cell(30,6,'Residencial-Comercial',0,0,'L');
                $pdf->SetY(307.5);    
                $pdf->SetX(120);
                if($mostcarastInmue["uso"]=="Residencial-Comercial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(310);    
                $pdf->SetX(72);
                $pdf->cell(30,6,'Industrial',0,0,'L');
                $pdf->SetY(311.5);    
                $pdf->SetX(120);
                if($mostcarastInmue["uso"]=="Industrial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(314);    
                $pdf->SetX(72);
                $pdf->cell(30,6,utf8_decode('Espacios Públicos'),0,0,'L');
                $pdf->SetY(315.5);    
                $pdf->SetX(120);
                if($mostcarastInmue["uso"]=="Espacios-Publicos"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(318);    
                $pdf->SetX(72);
                $pdf->cell(30,7,'Rural',0,0,'L');
                $pdf->SetY(319.5);    
                $pdf->SetX(120);
                if($mostcarastInmue["uso"]=="Rural"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
            //TENENCIA
                $pdf->SetY(290);    
                $pdf->SetX(129);
                $pdf->cell(40,6,'Tenencia',1,0,'C');
                $pdf->SetY(296);    
                $pdf->SetX(129);
                $pdf->cell(40,52,'',1,0,'C');
                $pdf->SetY(297);    
                $pdf->SetX(130);
                $pdf->cell(25,5,'Municipio',0,0,'L');
                $pdf->SetY(298);    
                $pdf->SetX(160);
                if($mostcarastInmue["tenencia"]=="Municipio"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(301);    
                $pdf->SetX(130);
                $pdf->cell(25,5,'Comunidad',0,0,'L');
                $pdf->SetY(302);    
                $pdf->SetX(160);
                if($mostcarastInmue["tenencia"]=="Comunidad"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(305);    
                $pdf->SetX(130);
                $pdf->cell(25,5,'INTU',0,0,'L');
                $pdf->SetY(306);    
                $pdf->SetX(160);
                if($mostcarastInmue["tenencia"]=="INTU"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(309);    
                $pdf->SetX(130);
                $pdf->cell(25,5,'INTI',0,0,'L');
                $pdf->SetY(310);    
                $pdf->SetX(160);
                if($mostcarastInmue["tenencia"]=="INTI"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(313);    
                $pdf->SetX(130);
                $pdf->cell(25,5,'Propio',0,0,'L');
                $pdf->SetY(314);    
                $pdf->SetX(160);
                if($mostcarastInmue["tenencia"]=="Propio"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(317);    
                $pdf->SetX(130);
                $pdf->cell(25,5,'Enfiteusis',0,0,'L');
                $pdf->SetY(318);    
                $pdf->SetX(160);
                if($mostcarastInmue["tenencia"]=="Enfiteusis"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(321);    
                $pdf->SetX(130);
                $pdf->cell(25,5,'Ocupado',0,0,'L');
                $pdf->SetY(322);    
                $pdf->SetX(160);
                if($mostcarastInmue["tenencia"]=="Ocupado"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(325);    
                $pdf->SetX(130);
                $pdf->cell(25,5,'Otros',0,0,'L');
                $pdf->SetY(326);    
                $pdf->SetX(160);
                if($mostcarastInmue["tenencia"]=="Otros"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
        //CARACTERISTICAS DE LA CONSTRUCCION
            //TIPOS DE CONSTRUCCION
                $pdf->SetY(284);    
                $pdf->SetX(169);
                $pdf->cell(0,6,utf8_decode('Caracteristicas del Construcción'),1,0,'C');
                $pdf->SetY(290);    
                $pdf->SetX(169);
                $pdf->cell(50,6,utf8_decode('Tipo de Construcción'),1,0,'C');
                $pdf->SetY(297);    
                $pdf->SetX(170);
                $pdf->cell(4,4,'Concreto',0,0,'L');
                $pdf->SetY(297);    
                $pdf->SetX(209);
                if($resulCaracInmue["estructura"]=="Concreto"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(301);    
                $pdf->SetX(170);
                $pdf->cell(4,4,'Acero',0,0,'L');
                $pdf->SetY(301);    
                $pdf->SetX(209);
                if($resulCaracInmue["estructura"]=="Acero"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(305);    
                $pdf->SetX(170);
                $pdf->cell(4,4,'Concreto-Acero',0,0,'L');
                $pdf->SetY(305);    
                $pdf->SetX(209);
                if($resulCaracInmue["estructura"]=="Concreto-Acero"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(309);    
                $pdf->SetX(170);
                $pdf->cell(4,4,'Paredes Portantes',0,0,'L');
                $pdf->SetY(309);    
                $pdf->SetX(209);
                if($resulCaracInmue["estructura"]=="Paredes-Portantes"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(313);    
                $pdf->SetX(170);
                $pdf->cell(4,4,'Madera',0,0,'L');
                $pdf->SetY(313);    
                $pdf->SetX(209);
                if($resulCaracInmue["estructura"]=="Madera"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(317);    
                $pdf->SetX(170);
                $pdf->cell(4,4,'Prefabricado',0,0,'L');
                $pdf->SetY(317);    
                $pdf->SetX(209);
                if($resulCaracInmue["estructura"]=="Prefabricado"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(321);    
                $pdf->SetX(170);
                $pdf->cell(4,4,'Otros',0,0,'L');
                $pdf->SetY(321);    
                $pdf->SetX(209);
                if($resulCaracInmue["estructura"]=="Otros"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(296);    
                $pdf->SetX(169);
                $pdf->cell(50,52,'',1,0,'C');
            //DESTINO DE LA EDIFICACION
                $pdf->SetY(290);    
                $pdf->SetX(219);
                $pdf->cell(0,6,utf8_decode('Destino de la Edificación'),1,0,'C');
                $pdf->SetY(296);    
                $pdf->SetX(219);
                $pdf->cell(0,52,'',1,0,'C');
                $pdf->SetY(297);    
                $pdf->SetX(221);
                $pdf->cell(4,4,'Unifamiliar',0,0,'L');
                $pdf->SetY(297);    
                $pdf->SetX(266);
                if($resulCaracInmue["destino"]=="Unifamiliar"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(301);    
                $pdf->SetX(221);
                $pdf->cell(4,4,'Bifamiliar',0,0,'L');
                $pdf->SetY(301);    
                $pdf->SetX(266);
                if($resulCaracInmue["destino"]=="Bifamiliar"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(305);    
                $pdf->SetX(221);
                $pdf->cell(4,4,'Multifamiliar',0,0,'L');
                $pdf->SetY(305);    
                $pdf->SetX(266);
                if($resulCaracInmue["destino"]=="Multifamiliar"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(309);    
                $pdf->SetX(221);
                $pdf->cell(4,4,'Comercial',0,0,'L');
                $pdf->SetY(309);    
                $pdf->SetX(266);
                if($resulCaracInmue["destino"]=="Comercial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(313);    
                $pdf->SetX(221);
                $pdf->cell(4,4,'Industrial',0,0,'L');
                $pdf->SetY(313);    
                $pdf->SetX(266);
                if($resulCaracInmue["destino"]=="Industrial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(317);    
                $pdf->SetX(221);
                $pdf->cell(4,4,'Hotel-Posada',0,0,'L');
                $pdf->SetY(317);    
                $pdf->SetX(266);
                if($resulCaracInmue["destino"]=="Hotel-Posada"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(321);    
                $pdf->SetX(221);
                $pdf->cell(4,4,utf8_decode('Institución Pública'),0,0,'L');
                $pdf->SetY(321);    
                $pdf->SetX(266);
                if($resulCaracInmue["destino"]=="Institución Pública"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(325);    
                $pdf->SetX(221);
                $pdf->cell(4,4,utf8_decode('Espacios Públicos'),0,0,'L');
                $pdf->SetY(325);    
                $pdf->SetX(266);
                if($resulCaracInmue["destino"]=="Espacios Públicos"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
        //REDACCION
            $pdf->SetY(350);    
            $pdf->SetX(20);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(50,6,utf8_decode('REDACCIÓN:'),0,'C');
            $pdf->SetY(350);    
            $pdf->SetX(47);
            $pdf->SetFont('Times','',11);
            $pdf->cell(50,6,utf8_decode(''.$idUser["nombre"].' '.$idUser["apellido"].''),0,'C');
            $pdf->SetY(357);    
            $pdf->SetX(20);
            $pdf->SetFont('Times','B',10);
            $pdf->Cell(100,7,'OBSERVACIONES:',0,'C');
            $pdf->SetY(357);    
            $pdf->SetX(54.5);
            $pdf->SetFont('Times','',11);
            $pdf->Cell(100,7,'Actualmente El (I.G.V.S.B) Y El (I.A.M.O.T.F.F),',0,'J');
            $pdf->SetY(363);    
            $pdf->SetX(19);
            $pdf->MultiCell(110,5,utf8_decode('Están Realizando El Trabajo De Actualización De La Nomenclatura De Los Inmuebles Del Municipio Fernández Feo.'),0,'J');
            $pdf->SetY(374.5);    
            $pdf->SetX(20);
            $pdf->SetFont('Times','B',11);
            $pdf->Cell(80,7,'NOTA:',0,'C');
            $pdf->SetY(375);    
            $pdf->SetX(36.5);
            $pdf->SetFont('Times','',11);
            $pdf->Cell(80,6,'Constancia que se expide a solicitud de parte interesada para',0,'J');
            $pdf->SetY(380.5);    
            $pdf->SetX(19);
            $pdf->SetFont('Times','',11);
            $pdf->MultiCell(100,5,utf8_decode('fines legales en la fecha antes descrita,                                                          '),0,'J');
            $pdf->SetY(380.5);    
            $pdf->SetX(19);
            $pdf->SetFont('Times','B',11);
            $pdf->MultiCell(115,6,utf8_decode('                                                               La presente tiene vigencia para el año fiscal en curso. '),0,'J');
        //FIRMA
                $pdf->SetY(376);    
                $pdf->SetX(160);
                $pdf->SetDrawColor(0,0,0,0);
                $pdf->SetFont('Times','B',9);
                $pdf->SetLineWidth(0.5);
                $pdf->MultiCell(120,4,utf8_decode('ING. LENIS YONDELBER COLMENARES CONTRERAS PRESIDENTE DEL INSTITUTO AUTONOMO MUNICIPAL DE ORDENAMIENTO TERRITORIAL DEL MUNICIPIO FERNANDEZ FEO (I.A.M.O.T.F.F.) SEGÚN RESOLUCIÓN NRO. ABSMFF/2020-021
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
class f003{
    var $empadro = "";
    var $idInmueble = "";
    var $idProp = "";
    var $nuExp = "";
    var $idExp = "";
    var $montoFact = "";
    var $fechFact = "";
    var $numFact= "";
    var $operacion = "";
    function imprimir(){
        $pdf = new PDF('P','mm','A3');
        $pdf->SetMargins(20,0,22);
        $pdf->AliasNbPages();
        $pdf->AddPage();
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
            $busExpSQL = "SELECT * FROM expediente where n_expediente=".$this->nuExp."";
            $resBusEXP = $link->query($busExpSQL);
            $busExpedienteRes = $resBusEXP->fetch_array();
            $fecha = explode('-',$busExpedienteRes["fecha"]);
            $anoExp= $fecha[0];
            echo '<input type="hidden" value="'.$anoExp.'" id="anoExp" />
            <input type="hidden" value="'.$busExpedienteRes["n_expediente"].'" id="nuExp" />';
        //INSERT PAGOS
            $pagoExpSql= "INSERT INTO pagos(fk_expedient,fk_factura,fechaPagos,tipo)value(".$busExpedienteRes["n_expediente"].",".$idExpFact["id"].",'".$this->fechFact."',DEFAULT)";
            $link->query($pagoExpSql);
            $idPagoExp= $link->insert_id;
        //BUSQUEDA DEL INMUEBLE
            $inmueDeSql= "SELECT * from inmueble where id=".$this->idInmueble."";
            $resInmueDe= $link->query($inmueDeSql);
            $resultInmueDe = $resInmueDe->fetch_assoc();
            $idProt= $resultInmueDe["fk_protocolizacion"];
            $idLindDoc= $resultInmueDe["fk_lind_documento"];
            $idLindPosVenta= $resultInmueDe["fk_lind_pos_venta"];
            $idConst= $resultInmueDe["fk_carac_construccion"];
            $idServicios= $resultInmueDe["fk_servicios"];
            $idCaracInmue= $resultInmueDe["fk_carac_inmuebles"];
            $idcaracConstruccion= $resultInmueDe["fk_carac_construccion"];
        //BUSQUEDA DEL PROPIETARIO
            $propDeSql= "SELECT * from propietarios where id=".$busExpedienteRes["fk_propietario"]."";
            $resPropDe= $link->query($propDeSql);
            $resultPropieDe = $resPropDe->fetch_array();
            $nombreProp= ''.$resultPropieDe["nombre"].' '.$resultPropieDe["apellido"].'';
        //BUSQUEDA DE PROTOCOLIZACION
            $protSql = "SELECT * from datos_protocolizacion where id='".$idProt."' ";
            $resProt = $link->query($protSql);
            $resultProp = $resProt->fetch_assoc();
        //BUSQUEDA DE LINDEROS SEGUN DOCUMENTO
            $lindDocSql= "SELECT * FROM linderos_documento where id=".$idLindDoc."";
            $resLindDoc = $link->query($lindDocSql);
            $resultLindDoc= $resLindDoc->fetch_assoc();
        //BUSQUEDA DE LINDEROS (POSIBLE VENTA)
            $lindPosVentaSQL= "SELECT * FROM linderos_posible_venta where id=".$idLindPosVenta."";
            $resLindPosVenta = $link->query($lindPosVentaSQL);
            $resultPosVenta= $resLindPosVenta->fetch_assoc();
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
            $busConstSQL = "SELECT * FROM constancias where fk_expedi=".$busExpedienteRes["n_expediente"]."";
            $resBusConst = $link->query($busConstSQL);
            $busConstRes = $resBusConst->fetch_array();
            if($busConstRes!=0){
                $updateConst = "UPDATE constancias SET tipo_operacion='".$busExpedienteRes["n_expediente"]."' where fk_expedi=".$this->nuExp."";
                $resupdaConst = $link->query($updateConst);
                $idConstancias = $busConstRes["id"];
            }else{
                $constansSql= "INSERT INTO constancias(tipo_operacion,fecha,fk_redactor,fk_expedi)value('".$this->operacion."','".$fechaConst."',".$idUser["id"].",".$busExpedienteRes["n_expediente"].")";
                $link->query($constansSql);
                $idConstancias = $link->insert_id;
            }
        
        //CONTINUACION HEADER
            $pdf->SetFont('Times','B',12);
            $pdf->SetX(38);
            $pdf->SetY(38);
            $pdf->MultiCell(0,6,utf8_decode('Quien suscribe, Presidente del Instituto Autónomo Municipal de
            Ordenamiento Territorial  del Municipio Fernández Feo 
            (I.A.M.O.T.F.F)
            '),0,'C');
            $pdf->SetY(52);
            $pdf->SetX(240);
            $pdf->Cell(20,10,'F-003');
            $pdf->SetY(58);
            $pdf->SetX(130);
            $pdf->SetFont('Times','B',11);
            $pdf->SetDrawColor(0,0,0,0);
            $pdf->SetLineWidth(0.5);
            $pdf->Cell(40,7,'HACE CONSTAR:','0,0,0,B:1',0,'C');
            $pdf->SetY(65);
            $pdf->SetX(22);
            $pdf->cell(40,10,'Fecha: '.date('d-m-Y').'');
            $pdf->SetY(65);
            $pdf->SetX(215);
            $pdf->cell(40,10,'No de Factura: '.$this->numFact.'');
            $pdf->SetY(70);
            $pdf->SetX(22);
            $pdf->cell(40,10,'No Civico: No Aplica');
            $pdf->SetY(70);
            $pdf->SetX(215);
            $pdf->cell(40,10,'No Expediente: '.$busExpedienteRes["n_expediente"].'');
            $pdf->SetY(74);
            $pdf->SetX(22);
            $pdf->cell(40,10,utf8_decode('Tipo de Operación: '.$this->operacion.''));
        //CODIGO CATASTRAL
            $pdf->SetY(84);
            $pdf->SetX(19);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(0,5,'CODIGO CATASTRAL',1,0,'C');
            $pdf->SetY(89);
            $pdf->SetX(19);
            $pdf->cell(26,5,'Efed',1,0,'C');
            $pdf->SetY(89);
            $pdf->SetX(45);
            $pdf->cell(26,5,'Mun',1,0,'C');
            $pdf->SetY(89);
            $pdf->SetX(71);
            $pdf->cell(26,5,'Prr',1,0,'C');
            $pdf->SetY(89);
            $pdf->SetX(97);
            $pdf->cell(26,5,'Amb',1,0,'C');
            $pdf->SetY(89);
            $pdf->SetX(123);
            $pdf->cell(26,5,'Sec',1,0,'C');
            $pdf->SetY(89);
            $pdf->SetX(149);
            $pdf->cell(26,5,'Ssec',1,0,'C');
            $pdf->SetY(89);
            $pdf->SetX(175);
            $pdf->cell(26,5,'Man',1,0,'C');
            $pdf->SetY(89);
            $pdf->SetX(201);
            $pdf->cell(25,5,'Par',1,0,'C');
            $pdf->SetY(89);
            $pdf->SetX(226);
            $pdf->cell(25,5,'Niv',1,0,'C');
            $pdf->SetY(89);
            $pdf->SetX(251);
            $pdf->cell(24,5,'Und',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(19);
            $pdf->cell(13,4,'2',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(32);
            $pdf->cell(13,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(45);
            $pdf->cell(13,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(58);
            $pdf->cell(13,4,'7',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(71);
            $pdf->cell(13,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(84);
            if($resultInmueDe["parroquia"]=="Capital"){
                $pdf->cell(13,4,'1',1,0,'C');
            }elseif($resultInmueDe["parroquia"]=="Dr. Alberto Adriani"){
                $pdf->cell(13,4,'2',1,0,'C');
            }elseif($resultInmueDe["parroquia"]=="Santo Domingo"){
                $pdf->cell(13,4,'3',1,0,'C');
            }
            $pdf->SetY(94);
            $pdf->SetX(97.2);
            if($resultInmueDe["ambito"]=="Urbano"){
                $pdf->cell(8.6,4,'U',1,0,'C');
            }elseif($resultInmueDe["ambito"]=="Rural"){
                $pdf->cell(8.6,4,'R',1,0,'C');
            }
            $pdf->SetY(94);
            $pdf->SetX(106);
            $pdf->cell(8.6,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(114.6);
            $pdf->cell(8.6,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(123);
            $pdf->cell(8.6,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(131.6);
            $pdf->cell(8.6,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(140);
            $pdf->cell(8.9,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(149);
            $pdf->cell(8.6,4,'5',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(157.5);
            $pdf->cell(8.6,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(166);
            $pdf->cell(8.9,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(174.8);
            $pdf->cell(8.9,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(184);
            $pdf->cell(8.6,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(192.4);
            $pdf->cell(8.6,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(200.7);
            $pdf->cell(8.6,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(209);
            $pdf->cell(8.6,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(217.4);
            $pdf->cell(8.6,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(226);
            $pdf->cell(8.6,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(234.6);
            $pdf->cell(8.6,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(243.2);
            $pdf->cell(7.8,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(251.2);
            $pdf->cell(8,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(259);
            $pdf->cell(8,4,'0',1,0,'C');
            $pdf->SetY(94);
            $pdf->SetX(267);
            $pdf->cell(8,4,'0',1,0,'C');
        //DATOS DEL PROPIETARIO
            $pdf->SetY(98);
            $pdf->SetX(19);
            $pdf->cell(0,5,'DATOS DEL PROPIETARIO',1,0,'C');
            $pdf->SetY(103);
            $pdf->SetX(19);
            $pdf->cell(50,6,'No de Cedula',1,0,'L');
            $pdf->SetY(103);
            $pdf->SetX(69);
            $pdf->cell(0,6,''.$resultPropieDe["cedula"].'',1,0,'L');
            $pdf->SetY(109);
            $pdf->SetX(19);
            $pdf->cell(50,6,'Rif',1,0,'L');
            $pdf->SetY(109);
            $pdf->SetX(69);
            $divTelfSec = explode('-',$resultPropieDe["telef"]);
            $divRifSec = explode('-',$resultPropieDe["rif"]);
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
            $pdf->SetY(115);
            $pdf->SetX(19);
            $pdf->cell(50,6,'Apellidos Y Nombres',1,0,'L');
            $pdf->SetY(115);
            $pdf->SetX(69);
            $pdf->cell(0,6,''.utf8_decode($nombreProp).'',1,0,'L');
            $pdf->SetY(121);
            $pdf->SetX(19);
            $pdf->cell(50,6,utf8_decode('No de Teléfono'),1,0,'L');
            $pdf->SetY(121);
            $pdf->SetX(69);
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
            $pdf->SetY(127);
            $pdf->SetX(19);
            $pdf->cell(50,6,utf8_decode('Dirección Del Propietario'),1,0,'L');
            $pdf->SetY(127);
            $pdf->SetX(69);
            $pdf->cell(0,6,''.utf8_decode($resultPropieDe["dir_hab"]).'',1,0,'L');
        //DATOS DE PROTOCOLIZACION
            $pdf->SetY(133);
            $pdf->SetX(19);
            $pdf->cell(0,5,utf8_decode('DATOS DE PROTOCOLIZACIÓN'),1,0,'C');
            $pdf->SetY(138);
            $pdf->SetX(19);
            $pdf->cell(110,6,'Documento Debidamente: '.$resultProp["documento"].'',1,0,'L');
            $pdf->SetY(138);
            $pdf->SetX(129);
            if($resultProp["direccion"]=="NO APLICA"){
                $pdf->cell(0,6,utf8_decode('Dirección: NO APLICA'),1,0,'L');
            }else{
                $pdf->cell(0,6,utf8_decode('Dirección: '.$resultProp["direccion"].''),1,0,'L');
            }
            $pdf->SetY(144);
            $pdf->SetX(19);
            $pdf->cell(28,5,utf8_decode('Número'),1,0,'C');
            $pdf->SetY(149);
            $pdf->SetX(19);
            if($resultProp["numero"]=="NO APLICA"){
                $pdf->cell(28,6,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(28,6,''.$resultProp["numero"].'',1,0,'C');
            }
            $pdf->SetY(144);
            $pdf->SetX(47);
            $pdf->cell(28,5,'Tomo',1,0,'C');
            $pdf->SetY(149);
            $pdf->SetX(47);
            if($resultProp["tomo"]=="NO APLICA"){
                $pdf->cell(28,6,'NO APLICA',1,0,'C');    
            }else{
                $pdf->cell(28,6,''.$resultProp["tomo"].'',1,0,'C');
            }
            $pdf->SetY(144);
            $pdf->SetX(75);
            $pdf->cell(28,5,'Folios',1,0,'C');
            $pdf->SetY(149);
            $pdf->SetX(75);
            if($resultProp["folio"]=="NO APLICA"){
                $pdf->cell(28,6,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(28,6,''.$resultProp["folio"].'',1,0,'C');
            }
            $pdf->SetY(144);
            $pdf->SetX(103);
            $pdf->cell(28,5,'Protocolo',1,0,'C');
            $pdf->SetY(149);
            $pdf->SetX(103);
            if($resultProp["protocolo"]=="NO APLICA"){
                $pdf->cell(28,6,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(28,6,''.$resultProp["protocolo"].'',1,0,'C');
            }
            $pdf->SetY(144);
            $pdf->SetX(131);
            $pdf->cell(28,5,'Trimestre',1,0,'C');
            $pdf->SetY(149);
            $pdf->SetX(131);
            if($resultProp["trimestre"]=="NO APLICA"){
                $pdf->cell(28,6,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(28,6,''.$resultProp["trimestre"].'',1,0,'C');
            }
            $pdf->SetY(144);
            $pdf->SetX(159);
            $pdf->cell(28,5,'Fecha',1,0,'C');
            $pdf->SetY(149);
            $pdf->SetX(159);
            if($resultProp["fecha"]=="NO APLICA"){
                $pdf->cell(28,6,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(28,6,''.$resultProp["fecha"].'',1,0,'C');
            }
            $pdf->SetY(144);
            $pdf->SetX(187);
            $pdf->cell(0,5,'Valor de Inmueble',1,0,'C');
            $pdf->SetY(149);
            $pdf->SetX(187);
            if($resultProp["valor_inmueble"]=="NO APLICA"){
                $pdf->cell(0,6,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(0,6,''.$resultProp["valor_inmueble"].'',1,0,'C');
            }
        //DATOS DE COLINDANTES SEGUN DOCUMENTO
            $pdf->SetY(155);
            $pdf->SetX(19);
            $pdf->cell(0,5,utf8_decode('DATOS DE COLINDANTES SEGÚN DOCUMENTO'),1,0,'C');
            $pdf->SetY(160);
            $pdf->SetX(19);
            $pdf->cell(60,6,'Puntos Cardinales',1,0,'C');
            $pdf->SetY(160);
            $pdf->SetX(79);
            $pdf->cell(150,6,'Alinderado',1,0,'C');
            $pdf->SetY(160);
            $pdf->SetX(229);
            $pdf->cell(0,6,'Medida (Mts)',1,0,'C');
            $pdf->SetY(166);
            $pdf->SetX(19);
            if($resultLindDoc["norte"]!="nada"){
                $pdf->cell(60,6,'NORTE',1,0,'C');
            }
            if($resultLindDoc["norte"]=="nada"){
                $pdf->cell(60,6,'NORESTE',1,0,'C');
            }
            $pdf->SetY(166);
            $pdf->SetX(79);
            $pdf->cell(150,6,utf8_decode(''.$resultLindDoc["alind_n"].''),1,0,'C');
            $pdf->SetY(166);
            $pdf->SetX(229);
            if($resultLindDoc["norte"]!="nada"){
                if($resultLindDoc["uniNorte"] =="m"){
                    $pdf->cell(0,6,''.$resultLindDoc["norte"].'',1,0,'C');
                }elseif($resultLindDoc["uniNorte"] == "Lq"){
                    $pdf->cell(0,6,''.$resultLindDoc["norte"].' '.$resultLindDoc["uniNorte"].'',1,0,'C');
                }elseif($resultLindDoc["uniNorte"] == "Ld"){
                    $pdf->cell(0,6,''.$resultLindDoc["norte"].' '.$resultLindDoc["uniNorte"].'',1,0,'C');
                }elseif($resultLindDoc["uniNorte"] == "otros"){
                    $pdf->cell(0,6,''.$resultLindDoc["norte"].'',1,0,'C');
                }else{
                    $pdf->cell(0,6,'',1,0,'C');
                }
            }
            if($resultLindDoc["norte"]=="nada"){
                if($resultLindDoc["uniNorte"] =="m"){
                    $pdf->cell(0,6,''.$resultLindDoc["noreste"].'',1,0,'C');
                }elseif($resultLindDoc["uniNorte"] == "Lq"){
                    $pdf->cell(0,6,''.$resultLindDoc["noreste"].' '.$resultLindDoc["uniNorte"].'',1,0,'C');
                }elseif($resultLindDoc["uniNorte"] == "Ld"){
                    $pdf->cell(0,6,''.$resultLindDoc["noreste"].' '.$resultLindDoc["uniNorte"].'',1,0,'C');
                }elseif($resultLindDoc["uniNorte"] == "otros"){
                    $pdf->cell(0,6,''.$resultLindDoc["noreste"].'',1,0,'C');
                }else{
                    $pdf->cell(0,6,'',1,0,'C');
                }
            }
            
            $pdf->SetY(172);
            $pdf->SetX(19);
            if($resultLindDoc["sur"]!="nada"){
                $pdf->cell(60,6,'SUR',1,0,'C');
            }
            if($resultLindDoc["sur"]=="nada"){
                $pdf->cell(60,6,'SURESTE',1,0,'C');
            }
            $pdf->SetY(172);
            $pdf->SetX(79);
            $pdf->cell(150,6,utf8_decode(''.$resultLindDoc["alind_s"].''),1,0,'C');
            $pdf->SetY(172);
            $pdf->SetX(229);
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
            
            $pdf->SetY(178);
            $pdf->SetX(19);
            if($resultLindDoc["este"]!="nada"){
                $pdf->cell(60,6,'ESTE',1,0,'C');
            }
            if($resultLindDoc["este"]=="nada"){
                $pdf->cell(60,6,'SUROESTE',1,0,'C');
            }
            $pdf->SetY(178);
            $pdf->SetX(79);
            $pdf->cell(150,6,utf8_decode(''.$resultLindDoc["alind_e"].''),1,0,'C');
            $pdf->SetY(178);
            $pdf->SetX(229);
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
            
            $pdf->SetY(184);
            $pdf->SetX(19);
            if($resultLindDoc["oeste"]!="nada"){
                $pdf->cell(60,6,'OESTE',1,0,'C');
            }
            if($resultLindDoc["oeste"]=="nada"){
                $pdf->cell(60,6,'NOROESTE',1,0,'C');
            }
            $pdf->SetY(184);
            $pdf->SetX(79);
            $pdf->cell(150,6,utf8_decode(''.$resultLindDoc["alind_o"].''),1,0,'C');
            $pdf->SetY(184);
            $pdf->SetX(229);
            if($resultLindDoc["oeste"]!="nada"){
                if($resultLindDoc["uniOeste"] =="m"){
                    $pdf->cell(0,6,''.$resultLindDoc["oeste"].'',1,0,'C');
                }elseif($resultLindDoc["uniOeste"] == "Lq"){
                    $pdf->cell(0,6,''.$resultLindDoc["oeste"].' '.$resultLindDoc["uniOeste"].'',1,0,'C');
                }elseif($resultLindDoc["uniOeste"] == "Ld"){
                    $pdf->cell(0,6,''.$resultLindDoc["oeste"].' '.$resultLindDoc["uniOeste"].'',1,0,'C');
                }elseif($resultLindDoc["uniOeste"] == "otros"){
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
           
            $pdf->SetY(190);    
            $pdf->SetX(19);
            $pdf->cell(40,6,'Area de Terreno',1,0,'C');
            $pdf->SetY(190);    
            $pdf->SetX(59);
            if($resultLindDoc["areaTotal"]=="NO APLICA"){
                $pdf->cell(40,6,'NO APLICA',1,0,'C');
            }else{
                if($resultLindDoc["uniAreaT"]=="N/A"){
                    $pdf->cell(40,6,'NO APLICA',1,0,'C');
                }else{
                    $pdf->cell(40,6,''.$resultLindDoc["areaTotal"].' '.$resultLindDoc["uniAreaT"].'',1,0,'C');
                }
                
            }
            $pdf->SetY(190);    
            $pdf->SetX(99);
            $pdf->cell(60,6,utf8_decode('Niveles de Construcción'),1,0,'C');
            $pdf->SetY(190);    
            $pdf->SetX(159);
            if($resultLindDoc["nivelesConst"]=="NO APLICA"){
                $pdf->cell(30,6,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(30,6,''.$resultLindDoc["nivelesConst"].'',1,0,'C');
            }
            $pdf->SetY(190);    
            $pdf->SetX(189);
            $pdf->cell(50,6,utf8_decode('Area de Construcción'),1,0,'C');
            $pdf->SetY(190);    
            $pdf->SetX(239);
            if($resultLindDoc["areaConst"]=="NO APLICA"){
                $pdf->cell(36,6,'NO APLICA',1,0,'C');
            }else{
                if($resultLindDoc["uniAreaC"]=="N/A"){
                    $pdf->cell(36,6,'NO APLICA',1,0,'C');
                }else{
                    $pdf->cell(36,6,''.$resultLindDoc["areaConst"].' '.$resultLindDoc["uniAreaC"].'',1,0,'C');
                }
                
            }
        //DATOS DE COLINDANTES (POSIBLE VENTA)
            $pdf->SetY(196);
            $pdf->SetX(19);
            $pdf->cell(0,5,utf8_decode('DATOS DE COLINDANTES (POSIBLE VENTA)'),1,0,'C');
            $pdf->SetY(201);
            $pdf->SetX(19);
            $pdf->cell(60,6,'Puntos Cardinales',1,0,'C');
            $pdf->SetY(201);
            $pdf->SetX(79);
            $pdf->cell(150,6,'Alinderado',1,0,'C');
            $pdf->SetY(201);
            $pdf->SetX(229);
            $pdf->cell(0,6,'Medida (Mts)',1,0,'C');
            $pdf->SetY(207);
            $pdf->SetX(19);
            if($resultPosVenta["norte"]!="nada"){
                $pdf->cell(60,6,'NORTE',1,0,'C');
            }
            if($resultPosVenta["norte"]=="nada"){
                $pdf->cell(60,6,'NORESTE',1,0,'C');
            }
            $pdf->SetY(207);
            $pdf->SetX(79);
            $pdf->cell(150,6,utf8_decode(''.$resultPosVenta["alind_n"].''),1,0,'C');
            $pdf->SetY(207);
            $pdf->SetX(229);
            if($resultPosVenta["norte"]!="nada"){
                if($resultPosVenta["uniNorte"] =="m"){
                    $pdf->cell(0,6,''.$resultPosVenta["norte"].'',1,0,'C');
                }elseif($resultPosVenta["uniNorte"] == "Lq"){
                    $pdf->cell(0,6,''.$resultPosVenta["norte"].' '.$resultPosVenta["uniNorte"].'',1,0,'C');
                }elseif($resultPosVenta["uniNorte"] == "Ld"){
                    $pdf->cell(0,6,''.$resultPosVenta["norte"].' '.$resultPosVenta["uniNorte"].'',1,0,'C');
                }elseif($resultPosVenta["uniNorte"] == "otros"){
                    $pdf->cell(0,6,''.$resultPosVenta["norte"].'',1,0,'C');
                }else{
                    $pdf->cell(0,6,'',1,0,'C');
                }
            }
            if($resultPosVenta["norte"]=="nada"){
                if($resultPosVenta["uniNorte"] =="m"){
                    $pdf->cell(0,6,''.$resultPosVenta["noreste"].'',1,0,'C');
                }elseif($resultPosVenta["uniNorte"] == "Lq"){
                    $pdf->cell(0,6,''.$resultPosVenta["noreste"].' '.$resultPosVenta["uniNorte"].'',1,0,'C');
                }elseif($resultPosVenta["uniNorte"] == "Ld"){
                    $pdf->cell(0,6,''.$resultPosVenta["noreste"].' '.$resultPosVenta["uniNorte"].'',1,0,'C');
                }elseif($resultPosVenta["uniNorte"] == "otros"){
                    $pdf->cell(0,6,''.$resultPosVenta["noreste"].'',1,0,'C');
                }else{
                    $pdf->cell(0,6,'',1,0,'C');
                }
            }
            
            $pdf->SetY(213);
            $pdf->SetX(19);
            if($resultPosVenta["sur"]!="nada"){
                $pdf->cell(60,6,'SUR',1,0,'C');
            }
            if($resultPosVenta["sur"]=="nada"){
                $pdf->cell(60,6,'SURESTE',1,0,'C');
            }
            $pdf->SetY(213);
            $pdf->SetX(79);
            $pdf->cell(150,6,utf8_decode(''.$resultPosVenta["alind_s"].''),1,0,'C');
            $pdf->SetY(213);
            $pdf->SetX(229);
            if($resultPosVenta["sur"]!="nada"){
                if($resultPosVenta["uniSur"] =="m"){
                    $pdf->cell(0,6,''.$resultPosVenta["sur"].'',1,0,'C');
                }elseif($resultPosVenta["uniSur"] == "Lq"){
                    $pdf->cell(0,6,''.$resultPosVenta["sur"].' '.$resultPosVenta["uniSur"].'',1,0,'C');
                }elseif($resultPosVenta["uniSur"] == "Ld"){
                    $pdf->cell(0,6,''.$resultPosVenta["sur"].' '.$resultPosVenta["uniSur"].'',1,0,'C');
                }elseif($resultPosVenta["uniSur"] == "otros"){
                    $pdf->cell(0,6,''.$resultPosVenta["sur"].'',1,0,'C');
                }else{
                    $pdf->cell(0,6,'',1,0,'C');
                }
            }
            if($resultPosVenta["sur"]=="nada"){
                if($resultPosVenta["uniSur"] =="m"){
                    $pdf->cell(0,6,''.$resultPosVenta["sureste"].'',1,0,'C');
                }elseif($resultPosVenta["uniSur"] == "Lq"){
                    $pdf->cell(0,6,''.$resultPosVenta["sureste"].' '.$resultPosVenta["uniSur"].'',1,0,'C');
                }elseif($resultPosVenta["uniSur"] == "Ld"){
                    $pdf->cell(0,6,''.$resultPosVenta["sureste"].' '.$resultPosVenta["uniSur"].'',1,0,'C');
                }elseif($resultPosVenta["uniSur"] == "otros"){
                    $pdf->cell(0,6,''.$resultPosVenta["sureste"].'',1,0,'C');
                }else{
                    $pdf->cell(0,6,'',1,0,'C');
                }
            }
            $pdf->SetY(219);
            $pdf->SetX(19);
            if($resultPosVenta["este"]!="nada"){
                $pdf->cell(60,6,'ESTE',1,0,'C');
            }
            if($resultPosVenta["este"]=="nada"){
                $pdf->cell(60,6,'SUROESTE',1,0,'C');
            }
            $pdf->SetY(219);
            $pdf->SetX(79);
            $pdf->cell(150,6,utf8_decode(''.$resultPosVenta["alind_e"].''),1,0,'C');
            $pdf->SetY(219);
            $pdf->SetX(229);
            if($resultPosVenta["este"]!="nada"){
                if($resultPosVenta["uniEste"] =="m"){
                    $pdf->cell(0,6,''.$resultPosVenta["este"].'',1,0,'C');
                }elseif($resultPosVenta["uniEste"] == "Lq"){
                    $pdf->cell(0,6,''.$resultPosVenta["este"].' '.$resultPosVenta["uniEste"].'',1,0,'C');
                }elseif($resultPosVenta["uniEste"] == "Ld"){
                    $pdf->cell(0,6,''.$resultPosVenta["este"].' '.$resultPosVenta["uniEste"].'',1,0,'C');
                }elseif($resultPosVenta["uniEste"] == "otros"){
                    $pdf->cell(0,6,''.$resultPosVenta["este"].'',1,0,'C');
                }else{
                    $pdf->cell(0,6,'',1,0,'C');
                }
            }
            if($resultPosVenta["este"]=="nada"){
                if($resultPosVenta["uniEste"] =="m"){
                    $pdf->cell(0,6,''.$resultPosVenta["suroeste"].'',1,0,'C');
                }elseif($resultPosVenta["uniEste"] == "Lq"){
                    $pdf->cell(0,6,''.$resultPosVenta["suroeste"].' '.$resultPosVenta["uniEste"].'',1,0,'C');
                }elseif($resultPosVenta["uniEste"] == "Ld"){
                    $pdf->cell(0,6,''.$resultPosVenta["suroeste"].' '.$resultPosVenta["uniEste"].'',1,0,'C');
                }elseif($resultPosVenta["uniEste"] == "otros"){
                    $pdf->cell(0,6,''.$resultPosVenta["suroeste"].' '.$resultPosVenta["uniEste"].'',1,0,'C');
                }else{
                    $pdf->cell(0,6,'',1,0,'C');
                }
            }
            
            $pdf->SetY(225);
            $pdf->SetX(19);
            if($resultPosVenta["oeste"]!="nada"){
                $pdf->cell(60,6,'OESTE',1,0,'C');
            }
            if($resultPosVenta["oeste"]=="nada"){
                $pdf->cell(60,6,'NOROESTE',1,0,'C');
            }
            $pdf->SetY(225);
            $pdf->SetX(79);
            $pdf->cell(150,6,utf8_decode(''.$resultPosVenta["alind_o"].''),1,0,'C');
            $pdf->SetY(225);
            $pdf->SetX(229);
            if($resultPosVenta["oeste"]!="nada"){
                if($resultPosVenta["uniOeste"] =="m"){
                    $pdf->cell(0,6,''.$resultPosVenta["oeste"].'',1,0,'C');
                }elseif($resultPosVenta["uniOeste"] == "Lq"){
                    $pdf->cell(0,6,''.$resultPosVenta["oeste"].' '.$resultPosVenta["uniOeste"].'',1,0,'C');
                }elseif($resultPosVenta["uniOeste"] == "Ld"){
                    $pdf->cell(0,6,''.$resultPosVenta["oeste"].' '.$resultPosVenta["uniOeste"].'',1,0,'C');
                }elseif($resultPosVenta["uniOeste"] == "otros"){
                    $pdf->cell(0,6,''.$resultPosVenta["oeste"].'',1,0,'C');
                }else{
                    $pdf->cell(0,6,'',1,0,'C');
                }
            }
            if($resultPosVenta["oeste"]=="nada"){
                if($resultPosVenta["uniOeste"] =="m"){
                    $pdf->cell(0,6,''.$resultPosVenta["noroeste"].'',1,0,'C');
                }elseif($resultPosVenta["uniOeste"] == "Lq"){
                    $pdf->cell(0,6,''.$resultPosVenta["noroeste"].' '.$resultPosVenta["uniOeste"].'',1,0,'C');
                }elseif($resultPosVenta["uniOeste"] == "Ld"){
                    $pdf->cell(0,6,''.$resultPosVenta["noroeste"].' '.$resultPosVenta["uniOeste"].'',1,0,'C');
                }elseif($resultPosVenta["uniOeste"] == "otros"){
                    $pdf->cell(0,6,''.$resultPosVenta["noroeste"].'',1,0,'C');
                }else{
                    $pdf->cell(0,6,'',1,0,'C');
                }
            }
            
            $pdf->SetY(231);    
            $pdf->SetX(19);
            $pdf->cell(40,6,'Area de Terreno',1,0,'C');
            $pdf->SetY(231);    
            $pdf->SetX(59);
            if($resultPosVenta["areaTotal"]=="NO APLICA"){
                $pdf->cell(40,6,'NO APLICA',1,0,'C');
            }else{
                if($resultPosVenta["uniAreaT"]=="N/A"){
                    $pdf->cell(40,6,'NO APLICA',1,0,'C');
                }else{
                    $pdf->cell(40,6,''.$resultPosVenta["areaTotal"].' '.$resultPosVenta["uniAreaT"].'',1,0,'C');
                }
            }
            $pdf->SetY(231);    
            $pdf->SetX(99);
            $pdf->cell(60,6,utf8_decode('Niveles de Construcción'),1,0,'C');
            $pdf->SetY(231);    
            $pdf->SetX(159);
            if($resultPosVenta["nivelesConst"]=="NO APLICA"){
                $pdf->cell(30,6,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(30,6,''.$resultPosVenta["nivelesConst"].'',1,0,'C');
            }
            $pdf->SetY(231);    
            $pdf->SetX(189);
            $pdf->cell(50,6,utf8_decode('Area de Construcción'),1,0,'C');
            $pdf->SetY(231);    
            $pdf->SetX(239);
            if($resultPosVenta["areaConst"]=="NO APLICA"){
                $pdf->cell(36,6,'NO APLICA',1,0,'C');
            }else{
                if($resultPosVenta["uniAreaC"]=="N/A"){
                    $pdf->cell(36,6,'NO APLICA',1,0,'C');
                }else{
                    $pdf->cell(36,6,''.$resultPosVenta["areaConst"].' '.$resultPosVenta["uniAreaC"].'',1,0,'C');
                }
            }
        //PARTE 6
            $pdf->SetY(237);    
            $pdf->SetX(19);
            $pdf->cell(60,6,utf8_decode('Dirección del Inmueble'),1,0,'C');
            $pdf->SetY(237);    
            $pdf->SetX(79);
            $pdf->cell(0,6,''.utf8_decode($resultInmueDe["direccion"]).'',1,0,'C');
            $pdf->SetY(243);    
            $pdf->SetX(19);
            $pdf->cell(60,6,utf8_decode('Régimen de la Propiedad'),1,0,'C');
            $pdf->SetY(243);    
            $pdf->SetX(79);
            $pdf->cell(0,6,''.$resultConst["Regimen"].'',1,0,'C');
            $pdf->SetY(249);    
            $pdf->SetX(19);
            $pdf->cell(60,6,'Uso del Inmueble',1,0,'C');
            $pdf->SetY(249);    
            $pdf->SetX(79);
            $pdf->cell(0,6,''.$mostcarastInmue["uso"].'',1,0,'C');
            $pdf->SetY(255);    
            $pdf->SetX(19);
            $pdf->cell(60,6,'Valor Estimado del Inmueble',1,0,'C');
            $pdf->SetY(255);    
            $pdf->SetX(79);
            $pdf->cell(0,6,''.$busExpedienteRes["valorInmue"].'',1,0,'C');
        //SERVICIOS 1
            $pdf->SetY(261);    
            $pdf->SetX(19);
            $pdf->cell(40,23,'Servicios',1,0,'C');
            $pdf->SetY(261);    
            $pdf->SetX(59);
            $pdf->cell(0,23,'',1,0,'C');
            $pdf->SetY(261);    
            $pdf->SetX(62);
            $pdf->cell(30,10,'Acueducto',0,0,'L');
            $pdf->SetY(264);    
            $pdf->SetX(106);
            if($resultServ["acued"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(265);    
            $pdf->SetX(62);
            $pdf->cell(30,10,'Acueducto Rural',0,0,'L');
            $pdf->SetY(268);    
            $pdf->SetX(106);
            if($resultServ["acuedRural"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(269);    
            $pdf->SetX(62);
            $pdf->cell(30,10,utf8_decode('Aguas Subterráneas'),0,0,'L');
            $pdf->SetY(272);    
            $pdf->SetX(106);
            if($resultServ["aguasSubter"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(273);    
            $pdf->SetX(62);
            $pdf->cell(30,10,'Aguas Servidas',0,0,'L');
            $pdf->SetY(276);    
            $pdf->SetX(106);
            if($resultServ["aguasServ"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
        //SERVICIOS 2
            $pdf->SetY(261);    
            $pdf->SetX(113);
            $pdf->cell(30,10,'Pavimento Flexible',0,0,'L');
            $pdf->SetY(264);    
            $pdf->SetX(156);
            if($resultServ["pavimentoFlex"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(265);    
            $pdf->SetX(113);
            $pdf->cell(30,10,'Pavimento Rigido',0,0,'L');
            $pdf->SetY(268);    
            $pdf->SetX(156);
            if($resultServ["pavimentoRig"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(269);    
            $pdf->SetX(113);
            $pdf->cell(30,10,utf8_decode('Vía Engranzonada'),0,0,'L');
            $pdf->SetY(272);    
            $pdf->SetX(156);
            if($resultServ["viaEngran"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(273);    
            $pdf->SetX(113);
            $pdf->cell(30,10,'Acera',0,0,'L');
            $pdf->SetY(276);    
            $pdf->SetX(156);
            if($resultServ["acera"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
        //SERVICIOS 3
            $pdf->SetY(261);    
            $pdf->SetX(163);
            $pdf->cell(30,10,utf8_decode('Alumbrado Público'),0,0,'L');
            $pdf->SetY(264);    
            $pdf->SetX(205);
            if($resultServ["alumbradoPub"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(265);    
            $pdf->SetX(163);
            $pdf->cell(30,10,'Aseo',0,0,'L');
            $pdf->SetY(268);    
            $pdf->SetX(205);
            if($resultServ["aseo"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(269);    
            $pdf->SetX(163);
            $pdf->cell(30,10,utf8_decode('Transporte Público'),0,0,'L');
            $pdf->SetY(272);    
            $pdf->SetX(205);
            if($resultServ["transportePublic"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(273);    
            $pdf->SetX(163);
            $pdf->cell(30,10,utf8_decode('Pozo Séptico'),0,0,'L');
            $pdf->SetY(276);    
            $pdf->SetX(205);
            if($resultServ["pozoSept"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
        //SERVICIOS 4
            $pdf->SetY(261);    
            $pdf->SetX(210);
            $pdf->cell(30,10,'Electricidad Residencial',0,0,'L');
            $pdf->SetY(264);    
            $pdf->SetX(260);
            if($resultServ["electriResi"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(265);    
            $pdf->SetX(210);
            $pdf->cell(30,10,'Electricidad Industrial',0,0,'L');
            $pdf->SetY(268);    
            $pdf->SetX(260);
            if($resultServ["electriIndus"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(269);    
            $pdf->SetX(210);
            $pdf->cell(30,10,utf8_decode('Línea Telefónica'),0,0,'L');
            $pdf->SetY(272);    
            $pdf->SetX(260);
            if($resultServ["lineaTelef"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
        //CARACTERISTICAS DEL TERRENO
            $pdf->SetY(284);    
            $pdf->SetX(19);
            $pdf->cell(150,6,'Caracteristicas del Terreno',1,0,'C');
            $pdf->SetY(334);    
            $pdf->SetX(19);
            $pdf->cell(110,14,'',1,0,'L');
            $pdf->SetY(334);    
            $pdf->SetX(20);
            $pdf->cell(30,6,'Observaciones:',0,0,'L');
            $pdf->SetY(340);    
            $pdf->SetX(20);
            $pdf->Cell(30,6,$resultConst["observ"],0,0,'L');
            //TOPOGRAFIA
                $pdf->SetY(290);    
                $pdf->SetX(19);
                $pdf->cell(50,6,utf8_decode('Topografía'),1,0,'C');
                $pdf->SetY(296);    
                $pdf->SetX(19);
                $pdf->cell(50,11,'',1,0,'C');
                $pdf->SetY(290);    
                $pdf->SetX(19);
                $pdf->cell(30,17,'Terreno Llano',0,0,'C');
                $pdf->SetY(297);    
                $pdf->SetX(59);
                if($mostcarastInmue["topografia"]=="Terreno Llano"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(295);    
                $pdf->SetX(22);
                $pdf->cell(30,17,'Terreno Quebrado',0,0,'C');
                $pdf->SetY(302);    
                $pdf->SetX(59);
                if($mostcarastInmue["topografia"]=="Terreno Quebrado"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
            //FORMA
                $pdf->SetY(307);    
                $pdf->SetX(19);
                $pdf->cell(50,6,'Forma',1,0,'C');
                $pdf->SetY(313);    
                $pdf->SetX(19);
                $pdf->cell(50,21,'',1,0,'C');
                $pdf->SetY(314);    
                $pdf->SetX(22);
                $pdf->cell(50,7,'Regular',0,'C');
                $pdf->SetY(316);    
                $pdf->SetX(49);
                if($mostcarastInmue["forma"]=="Regular"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(320);    
                $pdf->SetX(22);
                $pdf->cell(50,7,'Irregular',0,'C');
                $pdf->SetY(321);    
                $pdf->SetX(49);
                if($mostcarastInmue["forma"]=="Irregular"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
            //USO
                $pdf->SetY(290);    
                $pdf->SetX(69);
                $pdf->cell(60,6,'Uso',1,0,'C');
                $pdf->SetY(296);    
                $pdf->SetX(69);
                $pdf->cell(60,38,'',1,0,'C');
                $pdf->SetY(298);    
                $pdf->SetX(72);
                $pdf->cell(30,6,'Residencial',0,0,'L');
                $pdf->SetY(299.5);    
                $pdf->SetX(120);
                if($mostcarastInmue["uso"]=="Residencial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(302);    
                $pdf->SetX(72);
                $pdf->cell(30,6,'Comercial',0,0,'L');
                $pdf->SetY(303.5);    
                $pdf->SetX(120);
                if($mostcarastInmue["uso"]=="Comercial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(306);    
                $pdf->SetX(72);
                $pdf->cell(30,6,'Residencial-Comercial',0,0,'L');
                $pdf->SetY(307.5);    
                $pdf->SetX(120);
                if($mostcarastInmue["uso"]=="Residencial-Comercial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(310);    
                $pdf->SetX(72);
                $pdf->cell(30,6,'Industrial',0,0,'L');
                $pdf->SetY(311.5);    
                $pdf->SetX(120);
                if($mostcarastInmue["uso"]=="Industrial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(314);    
                $pdf->SetX(72);
                $pdf->cell(30,6,utf8_decode('Espacios Públicos'),0,0,'L');
                $pdf->SetY(315.5);    
                $pdf->SetX(120);
                if($mostcarastInmue["uso"]=="Espacios-Publicos"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(318);    
                $pdf->SetX(72);
                $pdf->cell(30,7,'Rural',0,0,'L');
                $pdf->SetY(319.5);    
                $pdf->SetX(120);
                if($mostcarastInmue["uso"]=="Rural"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
            //TENENCIA
                $pdf->SetY(290);    
                $pdf->SetX(129);
                $pdf->cell(40,6,'Tenencia',1,0,'C');
                $pdf->SetY(296);    
                $pdf->SetX(129);
                $pdf->cell(40,52,'',1,0,'C');
                $pdf->SetY(297);    
                $pdf->SetX(130);
                $pdf->cell(25,5,'Municipio',0,0,'L');
                $pdf->SetY(298);    
                $pdf->SetX(160);
                if($mostcarastInmue["tenencia"]=="Municipio"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(301);    
                $pdf->SetX(130);
                $pdf->cell(25,5,'Comunidad',0,0,'L');
                $pdf->SetY(302);    
                $pdf->SetX(160);
                if($mostcarastInmue["tenencia"]=="Comunidad"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(305);    
                $pdf->SetX(130);
                $pdf->cell(25,5,'INTU',0,0,'L');
                $pdf->SetY(306);    
                $pdf->SetX(160);
                if($mostcarastInmue["tenencia"]=="INTU"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(309);    
                $pdf->SetX(130);
                $pdf->cell(25,5,'INTI',0,0,'L');
                $pdf->SetY(310);    
                $pdf->SetX(160);
                if($mostcarastInmue["tenencia"]=="INTI"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(313);    
                $pdf->SetX(130);
                $pdf->cell(25,5,'Propio',0,0,'L');
                $pdf->SetY(314);    
                $pdf->SetX(160);
                if($mostcarastInmue["tenencia"]=="Propio"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(317);    
                $pdf->SetX(130);
                $pdf->cell(25,5,'Enfiteusis',0,0,'L');
                $pdf->SetY(318);    
                $pdf->SetX(160);
                if($mostcarastInmue["tenencia"]=="Enfiteusis"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(321);    
                $pdf->SetX(130);
                $pdf->cell(25,5,'Ocupado',0,0,'L');
                $pdf->SetY(322);    
                $pdf->SetX(160);
                if($mostcarastInmue["tenencia"]=="Ocupado"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(325);    
                $pdf->SetX(130);
                $pdf->cell(25,5,'Otros',0,0,'L');
                $pdf->SetY(326);    
                $pdf->SetX(160);
                if($mostcarastInmue["tenencia"]=="Otros"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
        //CARACTERISTICAS DE LA CONSTRUCCION
            //TIPOS DE CONSTRUCCION
                $pdf->SetY(284);    
                $pdf->SetX(169);
                $pdf->cell(0,6,utf8_decode('Caracteristicas del Construcción'),1,0,'C');
                $pdf->SetY(290);    
                $pdf->SetX(169);
                $pdf->cell(50,6,utf8_decode('Tipo de Construcción'),1,0,'C');
                $pdf->SetY(297);    
                $pdf->SetX(170);
                $pdf->cell(4,4,'Concreto',0,0,'L');
                $pdf->SetY(297);    
                $pdf->SetX(209);
                if($resulCaracInmue["estructura"]=="Concreto"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(301);    
                $pdf->SetX(170);
                $pdf->cell(4,4,'Acero',0,0,'L');
                $pdf->SetY(301);    
                $pdf->SetX(209);
                if($resulCaracInmue["estructura"]=="Acero"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(305);    
                $pdf->SetX(170);
                $pdf->cell(4,4,'Concreto-Acero',0,0,'L');
                $pdf->SetY(305);    
                $pdf->SetX(209);
                if($resulCaracInmue["estructura"]=="Concreto-Acero"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(309);    
                $pdf->SetX(170);
                $pdf->cell(4,4,'Paredes Portantes',0,0,'L');
                $pdf->SetY(309);    
                $pdf->SetX(209);
                if($resulCaracInmue["estructura"]=="Paredes-Portantes"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(313);    
                $pdf->SetX(170);
                $pdf->cell(4,4,'Madera',0,0,'L');
                $pdf->SetY(313);    
                $pdf->SetX(209);
                if($resulCaracInmue["estructura"]=="Madera"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(317);    
                $pdf->SetX(170);
                $pdf->cell(4,4,'Prefabricado',0,0,'L');
                $pdf->SetY(317);    
                $pdf->SetX(209);
                if($resulCaracInmue["estructura"]=="Prefabricado"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(321);    
                $pdf->SetX(170);
                $pdf->cell(4,4,'Otros',0,0,'L');
                $pdf->SetY(321);    
                $pdf->SetX(209);
                if($resulCaracInmue["estructura"]=="Otros"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(296);    
                $pdf->SetX(169);
                $pdf->cell(50,52,'',1,0,'C');
            //DESTINO DE LA EDIFICACION
                $pdf->SetY(290);    
                $pdf->SetX(219);
                $pdf->cell(0,6,utf8_decode('Destino de la Edificación'),1,0,'C');
                $pdf->SetY(296);    
                $pdf->SetX(219);
                $pdf->cell(0,52,'',1,0,'C');
                $pdf->SetY(297);    
                $pdf->SetX(221);
                $pdf->cell(4,4,'Unifamiliar',0,0,'L');
                $pdf->SetY(297);    
                $pdf->SetX(266);
                if($resulCaracInmue["destino"]=="Unifamiliar"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(301);    
                $pdf->SetX(221);
                $pdf->cell(4,4,'Bifamiliar',0,0,'L');
                $pdf->SetY(301);    
                $pdf->SetX(266);
                if($resulCaracInmue["destino"]=="Bifamiliar"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(305);    
                $pdf->SetX(221);
                $pdf->cell(4,4,'Multifamiliar',0,0,'L');
                $pdf->SetY(305);    
                $pdf->SetX(266);
                if($resulCaracInmue["destino"]=="Multifamiliar"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(309);    
                $pdf->SetX(221);
                $pdf->cell(4,4,'Comercial',0,0,'L');
                $pdf->SetY(309);    
                $pdf->SetX(266);
                if($resulCaracInmue["destino"]=="Comercial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(313);    
                $pdf->SetX(221);
                $pdf->cell(4,4,'Industrial',0,0,'L');
                $pdf->SetY(313);    
                $pdf->SetX(266);
                if($resulCaracInmue["destino"]=="Industrial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(317);    
                $pdf->SetX(221);
                $pdf->cell(4,4,'Hotel-Posada',0,0,'L');
                $pdf->SetY(317);    
                $pdf->SetX(266);
                if($resulCaracInmue["destino"]=="Hotel-Posada"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(321);    
                $pdf->SetX(221);
                $pdf->cell(4,4,utf8_decode('Institución Pública'),0,0,'L');
                $pdf->SetY(321);    
                $pdf->SetX(266);
                if($resulCaracInmue["destino"]=="Institución Pública"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(325);    
                $pdf->SetX(221);
                $pdf->cell(4,4,utf8_decode('Espacios Públicos'),0,0,'L');
                $pdf->SetY(325);    
                $pdf->SetX(266);
                if($resulCaracInmue["destino"]=="Espacios Públicos"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
        //REDACCION
            $pdf->SetY(350);    
            $pdf->SetX(20);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(50,6,utf8_decode('REDACCIÓN:'),0,'C');
            $pdf->SetY(350);    
            $pdf->SetX(47);
            $pdf->SetFont('Times','',11);
            $pdf->cell(50,6,utf8_decode(''.$idUser["nombre"].' '.$idUser["apellido"].''),0,'C');
            $pdf->SetY(357);    
            $pdf->SetX(20);
            $pdf->SetFont('Times','B',10);
            $pdf->Cell(100,7,'OBSERVACIONES:',0,'C');
            $pdf->SetY(357);    
            $pdf->SetX(54.5);
            $pdf->SetFont('Times','',11);
            $pdf->Cell(100,7,'Actualmente El (I.G.V.S.B) Y El (I.A.M.O.T.F.F),',0,'J');
            $pdf->SetY(363);    
            $pdf->SetX(19);
            $pdf->MultiCell(112,5,utf8_decode('Están Realizando El Trabajo De Actualización De La Nomenclatura De Los Inmuebles Del Municipio Fernández Feo.'),0,'J');
            $pdf->SetY(374.5);    
            $pdf->SetX(20);
            $pdf->SetFont('Times','B',11);
            $pdf->Cell(80,7,'NOTA:',0,'C');
            $pdf->SetY(375);    
            $pdf->SetX(36.5);
            $pdf->SetFont('Times','',11);
            $pdf->Cell(80,6,'Constancia que se expide a solicitud de parte interesada para',0,'J');
            $pdf->SetY(380.5);    
            $pdf->SetX(19);
            $pdf->SetFont('Times','',11);
            $pdf->MultiCell(100,5,utf8_decode('fines legales en la fecha antes descrita,                                                          '),0,'J');
            $pdf->SetY(380.5);    
            $pdf->SetX(19);
            $pdf->SetFont('Times','B',11);
            $pdf->MultiCell(115,6,utf8_decode('                                                               La presente tiene vigencia para el año fiscal en curso. '),0,'J');
        //FIRMA
            $pdf->SetY(376);    
            $pdf->SetX(160);
            $pdf->SetDrawColor(0,0,0,0);
            $pdf->SetFont('Times','B',9);
            $pdf->SetLineWidth(0.5);
            $pdf->MultiCell(120,4,utf8_decode('ING. LENIS YONDELBER COLMENARES CONTRERAS PRESIDENTE DEL INSTITUTO AUTONOMO MUNICIPAL DE ORDENAMIENTO TERRITORIAL DEL MUNICIPIO FERNANDEZ FEO (I.A.M.O.T.F.F.) SEGÚN RESOLUCIÓN NRO. ABSMFF/2020-021
            '),'T:1','C');
        $carpeta ='../../../assets/constancias/'.date("Y").'';
        if(!file_exists($carpeta)){
            mkdir($carpeta,0777,true);
            $pdf->Output('F','../../../../assets/constancias/'.date("Y").'/'.$busExpedienteRes["n_expediente"].'.pdf');
        }else{
            $pdf->Output('F','../../../assets/constancias/'.date("Y").'/'.$busExpedienteRes["n_expediente"].'.pdf');
        }
        echo'
        <input type="hidden" id="rutaPdf" value="./assets/constancias/'.date("Y").'/'.$busExpedienteRes["n_expediente"].'.pdf" />
        <input type="hidden" id="numExp" value="'.$busExpedienteRes["n_expediente"].'">';
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
            // $pdf = new PDF('P','mm','A3');
            $pdf = new PDF('P','mm',array(216,330));
            $pdf->SetMargins(20,0,22);
            $pdf->AliasNbPages();
            $pdf->AddPage();
        //CONTINUACION HEADER
            $pdf->SetFont('Times','B',12);
            $pdf->SetX(38);
            $pdf->SetY(41);
            $pdf->MultiCell(0,6,''.utf8_decode('Quien suscribe, Presidente del Instituto Autónomo Municipal de
            Ordenamiento Territorial  del Municipio Fernández Feo 
            (I.A.M.O.T.F.F)').'',0,'C');
            $pdf->SetY(60);
            $pdf->SetX(115);
            $pdf->SetFont('Times','B',11);
            $pdf->SetDrawColor(0,0,0,0);
            $pdf->SetLineWidth(0.5);
            $pdf->Cell(78,8,'CERTIFICADO DE EMPADRONAMIENTO:','0,0,0,B:1',0,'C');
            $pdf->SetY(70);
            $pdf->SetX(22);
            $pdf->cell(40,10,'Fecha: '.date('d-m-Y').'');
            $pdf->SetY(70);
            $pdf->SetX(215);
            $pdf->cell(40,10,'No de Factura: '.$idExpFact["n_factura"].'');
            $pdf->SetY(76);
            $pdf->SetX(22);
            $pdf->cell(40,10,'No Civico: No Aplica');
            $pdf->SetY(76);
            $pdf->SetX(215);
            $pdf->cell(40,10,'No Expediente: '.$busExpedienteRes["n_expediente"].'');
            $pdf->SetY(81);
            $pdf->SetX(22);
            $pdf->cell(40,10,''.utf8_decode('Tipo de Operación: '.$this->operacion.'').'');
        //CODIGO CATASTRAL
            $pdf->SetY(92);
            $pdf->SetX(19);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(0,5,'CODIGO CATASTRAL:',1,0,'C');
            $pdf->SetY(97);
            $pdf->SetX(19);
            $pdf->cell(26,5,'Efed',1,0,'C');
            $pdf->SetY(97);
            $pdf->SetX(45);
            $pdf->cell(26,5,'Mun',1,0,'C');
            $pdf->SetY(97);
            $pdf->SetX(71);
            $pdf->cell(26,5,'Prr',1,0,'C');
            $pdf->SetY(97);
            $pdf->SetX(97);
            $pdf->cell(26,5,'Amb',1,0,'C');
            $pdf->SetY(97);
            $pdf->SetX(123);
            $pdf->cell(26,5,'Sec',1,0,'C');
            $pdf->SetY(97);
            $pdf->SetX(149);
            $pdf->cell(26,5,'Ssec',1,0,'C');
            $pdf->SetY(97);
            $pdf->SetX(175);
            $pdf->cell(26,5,'Man',1,0,'C');
            $pdf->SetY(97);
            $pdf->SetX(201);
            $pdf->cell(25,5,'Par',1,0,'C');
            $pdf->SetY(97);
            $pdf->SetX(226);
            $pdf->cell(25,5,'Niv',1,0,'C');
            $pdf->SetY(97);
            $pdf->SetX(251);
            $pdf->cell(24,5,'Und',1,0,'C');
            $pdf->SetY(102);
            $pdf->SetX(19);
            $pdf->cell(13,5,'2',1,0,'C');
            $pdf->SetY(102);
            $pdf->SetX(32);
            $pdf->cell(13,5,'0',1,0,'C');
            $pdf->SetY(102);
            $pdf->SetX(45);
            $pdf->cell(13,5,'0',1,0,'C');
            $pdf->SetY(102);
            $pdf->SetX(58);
            $pdf->cell(13,5,'7',1,0,'C');
            $pdf->SetY(102);
            $pdf->SetX(71);
            $pdf->cell(13,5,'0',1,0,'C');
            $pdf->SetY(102);
            $pdf->SetX(84);
            if($resultInmueDe["parroquia"]=="Capital"){
                $pdf->cell(13,5,'1',1,0,'C');
            }elseif($resultInmueDe["parroquia"]=="Dr. Alberto Adriani"){
                $pdf->cell(13,5,'2',1,0,'C');
            }elseif($resultInmueDe["parroquia"]=="Santo Domingo"){
                $pdf->cell(13,5,'3',1,0,'C');
            }else{
                $pdf->cell(13,5,'',1,0,'C');
            }
            $pdf->SetY(102);
            $pdf->SetX(97.2);
            if($resultInmueDe["ambito"]=="Urbano"){
                $pdf->cell(8.6,5,'U',1,0,'C');
            }elseif($resultInmueDe["ambito"]=="Rural"){
                $pdf->cell(8.6,5,'R',1,0,'C');
            }else{
                $pdf->cell(8.6,5,'',1,0,'C');
            }
            $pdf->SetY(102);
            $pdf->SetX(106);
            $pdf->cell(8.6,5,'0',1,0,'C');
            $pdf->SetY(102);
            $pdf->SetX(114.6);
            $pdf->cell(8.6,5,'0',1,0,'C');
            $pdf->SetY(102);
            $pdf->SetX(123);
            $pdf->cell(8.6,5,'0',1,0,'C');
            $pdf->SetY(102);
            $pdf->SetX(131.6);
            $pdf->cell(8.6,5,'0',1,0,'C');
            $pdf->SetY(102);
            $pdf->SetX(140);
            $pdf->cell(8.9,5,'0',1,0,'C');
            $pdf->SetY(102);
            $pdf->SetX(149);
            $pdf->cell(8.6,5,'0',1,0,'C');
            $pdf->SetY(102);
            $pdf->SetX(157.5);
            $pdf->cell(8.6,5,'0',1,0,'C');
            $pdf->SetY(102);
            $pdf->SetX(166);
            $pdf->cell(8.9,5,'0',1,0,'C');
            $pdf->SetY(102);
            $pdf->SetX(174.8);
            $pdf->cell(8.9,5,'0',1,0,'C');
            $pdf->SetY(102);
            $pdf->SetX(184);
            $pdf->cell(8.6,5,'0',1,0,'C');
            $pdf->SetY(102);
            $pdf->SetX(192.4);
            $pdf->cell(8.6,5,'0',1,0,'C');
            $pdf->SetY(102);
            $pdf->SetX(200.7);
            $pdf->cell(8.6,5,'0',1,0,'C');
            $pdf->SetY(102);
            $pdf->SetX(209);
            $pdf->cell(8.6,5,'0',1,0,'C');
            $pdf->SetY(102);
            $pdf->SetX(217.4);
            $pdf->cell(8.6,5,'0',1,0,'C');
            $pdf->SetY(102);
            $pdf->SetX(226);
            $pdf->cell(8.6,5,'0',1,0,'C');
            $pdf->SetY(102);
            $pdf->SetX(234.6);
            $pdf->cell(8.6,5,'0',1,0,'C');
            $pdf->SetY(102);
            $pdf->SetX(243.2);
            $pdf->cell(7.8,5,'0',1,0,'C');
            $pdf->SetY(102);
            $pdf->SetX(251.2);
            $pdf->cell(8,5,'0',1,0,'C');
            $pdf->SetY(102);
            $pdf->SetX(259);
            $pdf->cell(8,5,'0',1,0,'C');
            $pdf->SetY(102);
            $pdf->SetX(267);
            $pdf->cell(8,5,'0',1,0,'C');
        //DATOS DEL PROPIETARIO
            $pdf->SetY(107);
            $pdf->SetX(19);
            $pdf->cell(0,5,'DATOS DEL PROPIETARIO:',1,0,'C');
            $pdf->SetY(112);
            $pdf->SetX(19);
            $pdf->cell(50,6,'No de Cedula',1,0,'L');
            $pdf->SetY(112);
            $pdf->SetX(69);
            $pdf->cell(0,6,''.$resultPropieDe["cedula"].'',1,0,'L');
            $pdf->SetY(118);
            $pdf->SetX(19);
            $pdf->cell(50,6,'Rif',1,0,'L');
            $pdf->SetY(118);
            $pdf->SetX(69);
            $divRifSec = explode('-',$resultPropieDe["rif"]);
            $divTelfSec = explode('-',$resultPropieDe["telef"]);
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
            $pdf->SetY(124);
            $pdf->SetX(19);
            $pdf->cell(50,6,'Apellidos Y Nombres ',1,0,'L');
            $pdf->SetY(124);
            $pdf->SetX(69);
            $pdf->Cell(0,6,''.utf8_decode($nombreProp).'',1,0,'L');
            $pdf->SetX(88);
            $pdf->Cell(0,6,'' ,0,0,'L');
            $pdf->SetY(130);
            $pdf->SetX(19);
            $pdf->cell(50,6,utf8_decode('No de Teléfono '),1,0,'L');
            $pdf->SetY(130);
            $pdf->SetX(69);
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
            $pdf->SetY(136);
            $pdf->SetX(19);
            $pdf->cell(50,6,utf8_decode('Dirección Del Propietario'),1,0,'L');
            $pdf->SetY(136);
            $pdf->SetX(69);
            $pdf->cell(0,6,''.utf8_decode($resultPropieDe["dir_hab"]).'',1,0,'L');
        //DATOS DE PROTOCOLIZACION
            $pdf->SetY(142);
            $pdf->SetX(19);
            $pdf->cell(0,6,''.utf8_decode("DATOS DE PROTOCOLIZACIÓN:").'',1,0,'C');
            $pdf->SetY(148);
            $pdf->SetX(19);
            $pdf->cell(110,6,'Documento Debidamente: '.$resultProp["documento"].'',1,0,'L');
            $pdf->SetY(148);
            $pdf->SetX(129);
            if($resultProp["direccion"]=="NO APLICA"){
                $pdf->cell(0,6,utf8_decode('Dirección: NO APLICA'),1,0,'L');
            }else{
                $pdf->cell(0,6,utf8_decode('Dirección: '.$resultProp["direccion"].''),1,0,'L');
            }
            $pdf->SetY(154);
            $pdf->SetX(19);
            $pdf->cell(25,5,utf8_decode('Número'),1,0,'C');
            $pdf->SetY(159);
            $pdf->SetX(19);
            if($resultProp["numero"]=="NO APLICA"){
                $pdf->cell(25,5,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(25,5,''.$resultProp["numero"].'',1,0,'C');
            }
            $pdf->SetY(154);
            $pdf->SetX(44);
            $pdf->cell(25,5,'Tomo',1,0,'C');
            $pdf->SetY(159);
            $pdf->SetX(44);
            if($resultProp["tomo"]=="NO APLICA"){
                $pdf->cell(25,5,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(25,5,''.$resultProp["tomo"].'',1,0,'C');
            }
            $pdf->SetY(154);
            $pdf->SetX(69);
            $pdf->cell(25,5,'Folios',1,0,'C');
            $pdf->SetY(159);
            $pdf->SetX(69);
            if($resultProp["folio"]=="NO APLICA"){
                $pdf->cell(25,5,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(25,5,''.$resultProp["folio"].'',1,0,'C');
            }
            $pdf->SetY(154);
            $pdf->SetX(94);
            $pdf->cell(25,5,'Protocolo',1,0,'C');
            $pdf->SetY(159);
            $pdf->SetX(94);
            if($resultProp["protocolo"]=="NO APLICA"){
                $pdf->cell(25,5,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(25,5,''.$resultProp["protocolo"].'',1,0,'C');
            }
            $pdf->SetY(154);
            $pdf->SetX(119);
            $pdf->cell(25,5,'Trimestre',1,0,'C');
            $pdf->SetY(159);
            $pdf->SetX(119);
            if($resultProp["trimestre"]=="NO APLICA"){
                $pdf->cell(25,5,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(25,5,''.$resultProp["trimestre"].'',1,0,'C');
            }
            $pdf->SetY(154);
            $pdf->SetX(144);
            $pdf->cell(25,5,'Fecha',1,0,'C');
            $pdf->SetY(159);
            $pdf->SetX(144);
            if($resultProp["fecha"]=="NO APLICA"){
                $pdf->cell(25,5,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(25,5,''.$resultProp["fecha"].'',1,0,'C');
            }
            $pdf->SetY(154);
            $pdf->SetX(169);
            $pdf->cell(0,5,'Valor de Inmueble',1,0,'C');
            $pdf->SetY(159);
            $pdf->SetX(169);
            $pdf->cell(0,5,''.$resultProp["valor_inmueble"].'',1,0,'C');
        //DATOS DE COLINDANTES SEGUN DOCUMENTO
            $pdf->SetY(164);
            $pdf->SetX(19);
            $pdf->cell(0,6,utf8_decode('DATOS DE COLINDANTES SEGÚN DOCUMENTO :'),1,0,'C');
            $pdf->SetY(170);
            $pdf->SetX(19);
            $pdf->cell(60,6,'Puntos Cardinales',1,0,'C');
            $pdf->SetY(170);
            $pdf->SetX(79);
            $pdf->cell(150,6,'Alinderado',1,0,'C');
            $pdf->SetY(170);
            $pdf->SetX(229);
            $pdf->cell(0,6,'Medida (m)',1,0,'C');
            $pdf->SetY(176);
            $pdf->SetX(19);
            if($resultLindDoc["norte"]!="nada"){
                $pdf->cell(60,6,'NORTE',1,0,'C');
            }
            if($resultLindDoc["norte"]=="nada"){
                $pdf->cell(60,6,'NORESTE',1,0,'C');
            }
            $pdf->SetY(176);
            $pdf->SetX(79);
            $pdf->cell(150,6,utf8_decode(''.$resultLindDoc["alind_n"].''),1,0,'C');
            $pdf->SetY(176);
            $pdf->SetX(229);
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
            
            $pdf->SetY(182);
            $pdf->SetX(19);
            if($resultLindDoc["sur"]!="nada"){
                $pdf->cell(60,6,'SUR',1,0,'C');
            }
            if($resultLindDoc["sur"]=="nada"){
                $pdf->cell(60,6,'SURESTE',1,0,'C');
            }
            $pdf->SetY(182);
            $pdf->SetX(79);
            $pdf->cell(150,6,utf8_decode(''.$resultLindDoc["alind_s"].''),1,0,'C');
            $pdf->SetY(182);
            $pdf->SetX(229);
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
                    $pdf->cell(0,6,''.$resultLindDoc["sureste"].' '.$resultLindDoc["uniSur"].'',1,0,'C');
                }else{
                    $pdf->cell(0,6,'',1,0,'C');
                }
            }
            
            $pdf->SetY(188);
            $pdf->SetX(19);
            if($resultLindDoc["este"]!="nada"){
                $pdf->cell(60,6,'ESTE',1,0,'C');
            }
            if($resultLindDoc["este"]=="nada"){
                $pdf->cell(60,6,'SUROESTE',1,0,'C');
            }
            $pdf->SetY(188);
            $pdf->SetX(79);
            $pdf->cell(150,6,utf8_decode(''.$resultLindDoc["alind_e"].''),1,0,'C');
            $pdf->SetY(188);
            $pdf->SetX(229);
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
                    $pdf->cell(0,6,''.$resultLindDoc["Suroeste"].'',1,0,'C');
                }elseif($resultLindDoc["uniEste"] == "Lq"){
                    $pdf->cell(0,6,''.$resultLindDoc["Suroeste"].' '.$resultLindDoc["uniEste"].'',1,0,'C');
                }elseif($resultLindDoc["uniEste"] == "Ld"){
                    $pdf->cell(0,6,''.$resultLindDoc["Suroeste"].' '.$resultLindDoc["uniEste"].'',1,0,'C');
                }elseif($resultLindDoc["uniEste"] == "otros"){
                    $pdf->cell(0,6,''.$resultLindDoc["Suroeste"].'',1,0,'C');
                }else{
                    $pdf->cell(0,6,'',1,0,'C');
                }
            }
            
            $pdf->SetY(194);
            $pdf->SetX(19);
            if($resultLindDoc["oeste"]!="nada"){
                $pdf->cell(60,6,'OESTE',1,0,'C');
            }
            if($resultLindDoc["oeste"]=="nada"){
                $pdf->cell(60,6,'NOROESTE',1,0,'C');
            }
            $pdf->SetY(194);
            $pdf->SetX(79);
            $pdf->cell(150,6,utf8_decode(''.$resultLindDoc["alind_o"].''),1,0,'C');
            $pdf->SetY(194);
            $pdf->SetX(229);
            if($resultLindDoc["oeste"]!="nada"){
                if($resultLindDoc["uniOeste"] =="m"){
                    $pdf->cell(0,6,''.$resultLindDoc["oeste"].'',1,0,'C');
                }elseif($resultLindDoc["uniOeste"] == "Lq"){
                    $pdf->cell(0,6,''.$resultLindDoc["oeste"].' '.$resultLindDoc["uniOeste"].'',1,0,'C');
                }elseif($resultLindDoc["uniOeste"] == "Ld"){
                    $pdf->cell(0,6,''.$resultLindDoc["oeste"].' '.$resultLindDoc["uniOeste"].'',1,0,'C');
                }elseif($resultLindDoc["uniOeste"] == "otros"){
                    $pdf->cell(0,6,''.$resultLindDoc["oeste"].' ',1,0,'C');
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
            $pdf->SetY(200);    
            $pdf->SetX(19);
            $pdf->cell(40,6,'Area de Terreno',1,0,'C');
            $pdf->SetY(200);    
            $pdf->SetX(59);
            if($resultLindDoc["uniAreaT"]=="N/A"){
                if($resultLindDoc["areaTotal"]=="NO APLICA"){
                    $pdf->cell(40,6,'NO APLICA',1,0,'C');
                }else{
                    $pdf->cell(40,6,''.$resultLindDoc["areaTotal"].'',1,0,'C');
                }
            }else{
                if($resultLindDoc["areaTotal"]=="NO APLICA"){
                    $pdf->cell(40,6,'NO APLICA',1,0,'C');
                }else{
                    $pdf->cell(40,6,''.$resultLindDoc["areaTotal"].' '.$resultLindDoc["uniAreaT"].'',1,0,'C');
                }
            }
            
            $pdf->SetY(200);    
            $pdf->SetX(99);
            $pdf->cell(60,6,utf8_decode('Niveles de Construcción'),1,0,'C');
            $pdf->SetY(200);    
            $pdf->SetX(159);
            $pdf->cell(30,6,''.$resultLindDoc["nivelesConst"].'',1,0,'C');
            $pdf->SetY(200);    
            $pdf->SetX(189);
            $pdf->cell(50,6,utf8_decode('Area de Construcción'),1,0,'C');
            $pdf->SetY(200);    
            $pdf->SetX(239);
            if($resultLindDoc["uniAreaC"]=="N/A"){
                if($resultLindDoc["areaTotal"]=="NO APLICA"){
                    $pdf->cell(40,6,'NO APLICA',1,0,'C');
                }else{
                    $pdf->cell(36,6,''.$resultLindDoc["areaConst"].'',1,0,'C');
                }
            }else{
                if($resultLindDoc["areaTotal"]=="NO APLICA"){
                    $pdf->cell(40,6,'NO APLICA',1,0,'C');
                }else{
                    $pdf->cell(36,6,''.$resultLindDoc["areaConst"].' '.$resultLindDoc["uniAreaC"].'',1,0,'C');
                }
                
            }
            $pdf->SetY(206);    
            $pdf->SetX(19);
            $pdf->cell(40,6,utf8_decode('Dirección del Inmueble'),1,0,'L');
            $pdf->SetY(206);    
            $pdf->SetX(59);
            $pdf->cell(0,6,''.utf8_decode($resultInmueDe["direccion"]).'',1,0,'C');
        //SERVICIOS 1
            $pdf->SetY(212);    
            $pdf->SetX(19);
            $pdf->cell(40,27,'Servicios',1,0,'C');
            $pdf->SetY(212);    
            $pdf->SetX(59);
            $pdf->cell(0,27,'',1,0,'C');
            $pdf->SetY(212);    
            $pdf->SetX(62);
            $pdf->cell(30,10,'Acueducto',0,0,'L');
            $pdf->SetY(215);    
            $pdf->SetX(106);
            if($resultServ["acued"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(218);    
            $pdf->SetX(62);
            $pdf->cell(30,10,'Acueducto Rural',0,0,'L');
            $pdf->SetY(221);    
            $pdf->SetX(106);
            if($resultServ["acuedRural"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(224);    
            $pdf->SetX(62);
            $pdf->cell(30,10,utf8_decode('Aguas Subterráneas'),0,0,'L');
            $pdf->SetY(227);    
            $pdf->SetX(106);
            if($resultServ["aguasSubter"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(230);    
            $pdf->SetX(62);
            $pdf->cell(30,10,'Aguas Servidas',0,0,'L');
            $pdf->SetY(233);    
            $pdf->SetX(106);
            if($resultServ["aguasServ"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
        //SERVICIOS 2
            $pdf->SetY(212);    
            $pdf->SetX(113);
            $pdf->cell(30,10,'Pavimento Flexible',0,0,'L');
            $pdf->SetY(215);    
            $pdf->SetX(156);
            if($resultServ["pavimentoFlex"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(218);    
            $pdf->SetX(113);
            $pdf->cell(30,10,'Pavimento Rigido',0,0,'L');
            $pdf->SetY(221);    
            $pdf->SetX(156);
            if($resultServ["pavimentoRig"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(224);    
            $pdf->SetX(113);
            $pdf->cell(30,10,utf8_decode('Vía Engranzonada'),0,0,'L');
            $pdf->SetY(227);    
            $pdf->SetX(156);
            if($resultServ["viaEngran"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(230);    
            $pdf->SetX(113);
            $pdf->cell(30,10,'Acera',0,0,'L');
            $pdf->SetY(233);    
            $pdf->SetX(156);
            if($resultServ["acera"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
        //SERVICIOS 3
            $pdf->SetY(212);    
            $pdf->SetX(163);
            $pdf->cell(30,10,utf8_decode('Alumbrado Público'),0,0,'L');
            $pdf->SetY(215);    
            $pdf->SetX(205);
            if($resultServ["alumbradoPub"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(218);    
            $pdf->SetX(163);
            $pdf->cell(30,10,'Aseo',0,0,'L');
            $pdf->SetY(221);    
            $pdf->SetX(205);
            if($resultServ["aseo"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(224);    
            $pdf->SetX(163);
            $pdf->cell(30,10,utf8_decode('Transporte Público'),0,0,'L');
            $pdf->SetY(227);    
            $pdf->SetX(205);
            if($resultServ["transportePublic"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(230);    
            $pdf->SetX(163);
            $pdf->cell(30,10,utf8_decode('Pozo Séptico'),0,0,'L');
            $pdf->SetY(233);    
            $pdf->SetX(205);
            if($resultServ["pozoSept"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
        //SERVICIOS 4
            $pdf->SetY(212);    
            $pdf->SetX(210);
            $pdf->cell(30,10,'Electricidad Residencial',0,0,'L');
            $pdf->SetY(215);    
            $pdf->SetX(260);
            if($resultServ["electriResi"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(218);    
            $pdf->SetX(210);
            $pdf->cell(30,10,'Electricidad Industrial',0,0,'L');
            $pdf->SetY(221);    
            $pdf->SetX(260);
            if($resultServ["electriIndus"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(224);    
            $pdf->SetX(210);
            $pdf->cell(30,10,utf8_decode('Línea Telefónica'),0,0,'L');
            $pdf->SetY(227);    
            $pdf->SetX(260);
            if($resultServ["lineaTelef"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
        //CARACTERISTICAS DEL TERRENO
            $pdf->SetY(239);    
            $pdf->SetX(19);
            $pdf->cell(150,6,'Caracteristicas del Terreno',1,0,'C');
            $pdf->SetY(289);    
            $pdf->SetX(19);
            $pdf->cell(110,14,'',1,0,'L');
            $pdf->SetY(289);    
            $pdf->SetX(20);
            $pdf->Cell(30,6,'Observaciones:',0,0,'L');
            $pdf->SetY(296);    
            $pdf->SetX(20);
            $pdf->Cell(30,6,utf8_decode($resultConst["observ"]),0,0,'L');
            //TOPOGRAFIA
                $pdf->SetY(245);    
                $pdf->SetX(19);
                $pdf->cell(50,6,utf8_decode('Topografía'),1,0,'C');
                $pdf->SetY(245);    
                $pdf->SetX(19);
                $pdf->cell(50,17,'',1,0,'C');
                $pdf->SetY(245.5);    
                $pdf->SetX(19);
                $pdf->cell(30,17,'Terreno Llano',0,0,'C');
                $pdf->SetY(252);    
                $pdf->SetX(59);
                if($mostcarastInmue["topografia"]=="Terreno Llano"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(250.5);    
                $pdf->SetX(22);
                $pdf->cell(30,17,'Terreno Quebrado',0,0,'C');
                $pdf->SetY(257);    
                $pdf->SetX(59);
                if($mostcarastInmue["topografia"]=="Terreno Quebrado"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
            //FORMA
                $pdf->SetY(262);    
                $pdf->SetX(19);
                $pdf->cell(50,6,'Forma',1,0,'C');
                $pdf->SetY(268);    
                $pdf->SetX(19);
                $pdf->cell(50,21,'',1,0,'C');
                $pdf->SetY(271);    
                $pdf->SetX(22);
                $pdf->cell(50,7,'Regular',0,'C');
                $pdf->SetY(272.5);    
                $pdf->SetX(49);
                if($mostcarastInmue["forma"]=="Regular"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(278);    
                $pdf->SetX(22);
                $pdf->cell(50,7,'Irregular',0,'C');
                $pdf->SetY(279);    
                $pdf->SetX(49);
                if($mostcarastInmue["forma"]=="Irregular"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
            //USO
                $pdf->SetY(245);    
                $pdf->SetX(69);
                $pdf->cell(60,6,'Uso',1,0,'C');
                $pdf->SetY(251);    
                $pdf->SetX(69);
                $pdf->cell(60,38,'',1,0,'C');
                $pdf->SetY(251);    
                $pdf->SetX(72);
                $pdf->cell(30,6,'Residencial',0,0,'L');
                $pdf->SetY(252);    
                $pdf->SetX(120);
                if($mostcarastInmue["uso"]=="Residencial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(257);    
                $pdf->SetX(72);
                $pdf->cell(30,6,'Comercial',0,0,'L');
                $pdf->SetY(258);    
                $pdf->SetX(120);
                if($mostcarastInmue["uso"]=="Comercial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(263);    
                $pdf->SetX(72);
                $pdf->cell(30,6,'Residencial-Comercial',0,0,'L');
                $pdf->SetY(264);    
                $pdf->SetX(120);
                if($mostcarastInmue["uso"]=="Residencial-Comercial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(269);    
                $pdf->SetX(72);
                $pdf->cell(30,6,'Industrial',0,0,'L');
                $pdf->SetY(270);    
                $pdf->SetX(120);
                if($mostcarastInmue["uso"]=="Industrial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(274.5);    
                $pdf->SetX(72);
                $pdf->cell(30,6,utf8_decode('Espacios Públicos'),0,0,'L');
                $pdf->SetY(276);    
                $pdf->SetX(120);
                if($mostcarastInmue["uso"]=="Espacios-Publicos"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(280.5);    
                $pdf->SetX(72);
                $pdf->cell(30,7,'Rural',0,0,'L');
                $pdf->SetY(283);    
                $pdf->SetX(120);
                if($mostcarastInmue["uso"]=="Rural"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
            //TENENCIA
                $pdf->SetY(245);    
                $pdf->SetX(129);
                $pdf->cell(40,6,'Tenencia',1,0,'C');
                $pdf->SetY(251);    
                $pdf->SetX(129);
                $pdf->cell(40,52,'',1,0,'C');
                $pdf->SetY(254);    
                $pdf->SetX(130);
                $pdf->cell(25,5,'Municipio',0,0,'L');
                $pdf->SetY(254);    
                $pdf->SetX(160);
                if($mostcarastInmue["tenencia"]=="Municipio"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(260);    
                $pdf->SetX(130);
                $pdf->cell(25,5,'Comunidad',0,0,'L');
                $pdf->SetY(260);    
                $pdf->SetX(160);
                if($mostcarastInmue["tenencia"]=="Comunidad"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(266);    
                $pdf->SetX(130);
                $pdf->cell(25,5,'INTU',0,0,'L');
                $pdf->SetY(266);    
                $pdf->SetX(160);
                if($mostcarastInmue["tenencia"]=="INTU"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(272);    
                $pdf->SetX(130);
                $pdf->cell(25,5,'INTI',0,0,'L');
                $pdf->SetY(272);    
                $pdf->SetX(160);
                if($mostcarastInmue["tenencia"]=="INTI"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(278);    
                $pdf->SetX(130);
                $pdf->cell(25,5,'Propio',0,0,'L');
                $pdf->SetY(278);    
                $pdf->SetX(160);
                if($mostcarastInmue["tenencia"]=="Propio"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(284);    
                $pdf->SetX(130);
                $pdf->cell(25,5,'Enfiteusis',0,0,'L');
                $pdf->SetY(284);    
                $pdf->SetX(160);
                if($mostcarastInmue["tenencia"]=="Enfiteusis"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(290);    
                $pdf->SetX(130);
                $pdf->cell(25,5,'Ocupado',0,0,'L');
                $pdf->SetY(290);    
                $pdf->SetX(160);
                if($mostcarastInmue["tenencia"]=="Ocupado"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(296);    
                $pdf->SetX(130);
                $pdf->cell(25,5,'Otros',0,0,'L');
                $pdf->SetY(296);    
                $pdf->SetX(160);
                if($mostcarastInmue["tenencia"]=="Otros"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
        //CARACTERISTICAS DE LA CONSTRUCCION
            //TIPOS DE CONSTRUCCION
                $pdf->SetY(239);    
                $pdf->SetX(169);
                $pdf->cell(0,6,utf8_decode('Caracteristicas del Construcción'),1,0,'C');
                $pdf->SetY(245);    
                $pdf->SetX(169);
                $pdf->cell(50,6,utf8_decode('Tipo de Construcción'),1,0,'C');
                $pdf->SetY(254);    
                $pdf->SetX(170);
                $pdf->cell(4,4,'Concreto',0,0,'L');
                $pdf->SetY(254);    
                $pdf->SetX(209);
                if($resulCaracInmue["estructura"]=="Concreto"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(260);    
                $pdf->SetX(170);
                $pdf->cell(4,4,'Acero',0,0,'L');
                $pdf->SetY(260);    
                $pdf->SetX(209);
                if($resulCaracInmue["estructura"]=="Acero"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(266);    
                $pdf->SetX(170);
                $pdf->cell(4,4,'Concreto-Acero',0,0,'L');
                $pdf->SetY(266);    
                $pdf->SetX(209);
                if($resulCaracInmue["estructura"]=="Concreto-Acero"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(272);    
                $pdf->SetX(170);
                $pdf->cell(4,4,'Paredes Portantes',0,0,'L');
                $pdf->SetY(272);    
                $pdf->SetX(209);
                if($resulCaracInmue["estructura"]=="Paredes-Portantes"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(278);    
                $pdf->SetX(170);
                $pdf->cell(4,4,'Madera',0,0,'L');
                $pdf->SetY(278);    
                $pdf->SetX(209);
                if($resulCaracInmue["estructura"]=="Madera"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(284);    
                $pdf->SetX(170);
                $pdf->cell(4,4,'Prefabricado',0,0,'L');
                $pdf->SetY(284);    
                $pdf->SetX(209);
                if($resulCaracInmue["estructura"]=="Prefabricado"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(290);    
                $pdf->SetX(170);
                $pdf->cell(4,4,'Otros',0,0,'L');
                $pdf->SetY(290);    
                $pdf->SetX(209);
                if($resulCaracInmue["estructura"]=="Otros"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(251);    
                $pdf->SetX(169);
                $pdf->cell(50,52,'',1,0,'C');
            //DESTINO DE LA EDIFICACION
                $pdf->SetY(245);    
                $pdf->SetX(219);
                $pdf->cell(0,6,utf8_decode('Destino de la Edificación'),1,0,'C');
                $pdf->SetY(251);    
                $pdf->SetX(219);
                $pdf->cell(0,52,'',1,0,'C');
                $pdf->SetY(254);    
                $pdf->SetX(221);
                $pdf->cell(4,4,'Unifamiliar',0,0,'L');
                $pdf->SetY(254);    
                $pdf->SetX(266);
                if($resulCaracInmue["destino"]=="Unifamiliar"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(260);    
                $pdf->SetX(221);
                $pdf->cell(4,4,'Bifamiliar',0,0,'L');
                $pdf->SetY(260);    
                $pdf->SetX(266);
                if($resulCaracInmue["destino"]=="Bifamiliar"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(266);    
                $pdf->SetX(221);
                $pdf->cell(4,4,'Multifamiliar',0,0,'L');
                $pdf->SetY(266);    
                $pdf->SetX(266);
                if($resulCaracInmue["destino"]=="Multifamiliar"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(272);    
                $pdf->SetX(221);
                $pdf->cell(4,4,'Comercial',0,0,'L');
                $pdf->SetY(272);    
                $pdf->SetX(266);
                if($resulCaracInmue["destino"]=="Comercial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(278);    
                $pdf->SetX(221);
                $pdf->cell(4,4,'Industrial',0,0,'L');
                $pdf->SetY(278);    
                $pdf->SetX(266);
                if($resulCaracInmue["destino"]=="Industrial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(284);    
                $pdf->SetX(221);
                $pdf->cell(4,4,'Hotel-Posada',0,0,'L');
                $pdf->SetY(284);    
                $pdf->SetX(266);
                if($resulCaracInmue["destino"]=="Hotel-Posada"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(290);    
                $pdf->SetX(221);
                $pdf->cell(4,4,utf8_decode('Institución Pública'),0,0,'L');
                $pdf->SetY(290);    
                $pdf->SetX(266);
                if($resulCaracInmue["destino"]=="Institución Pública"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(296);    
                $pdf->SetX(221);
                $pdf->cell(4,4,utf8_decode('Espacios Públicos'),0,0,'L');
                $pdf->SetY(296);    
                $pdf->SetX(266);
                if($resulCaracInmue["destino"]=="Espacios Públicos"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }

        //NOTA EMPADRONAMIENTO
            $pdf->SetY(303);
            $pdf->SetX(19);
            $pdf->Cell(0,16,'',1,0);
            $pdf->SetY(304.5);
            $pdf->SetX(20);
            $pdf->Multicell(0,4.5,utf8_decode('NOTA: Declaro que la emisión del presente Certificado de Empadronamiento, no supone propiedad sobre el Inmueble por parte del ocupante. De conformidad a lo establecido en los Art. 18 Nº 34, Art. 105 y Art. 106; de la Ordenanza del Instituto Autónomo Municipal de Ordenamiento Territorial del Municipio Fernández Feo, Número De Gaceta 249, del 10 de Diciembre de 2.018.'),0,'L');
        //REDACCION
            $pdf->SetY(322);    
            $pdf->SetX(19);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(50,6,utf8_decode('REDACCIÓN:'),0,'C');
            $pdf->SetY(322);    
            $pdf->SetX(47);
            $pdf->SetFont('Times','',11);
            $pdf->cell(50,6,utf8_decode(''.$idUser["nombre"].' '.$idUser["apellido"].''),0,'C');
            $pdf->SetY(328);    
            $pdf->SetX(19);
            $pdf->SetFont('Times','B',10);
            $pdf->Cell(100,7,'OBSERVACIONES:',0,'C');
            $pdf->SetY(328);    
            $pdf->SetX(53);
            $pdf->SetFont('Times','',10);
            $pdf->Cell(100,7,'Actualmente El (I.G.V.S.B) Y El (I.A.M.O.T.F.F),',0,'J');
            $pdf->SetY(335);    
            $pdf->SetX(19);
            $pdf->MultiCell(110,7,utf8_decode('Están Realizando El Trabajo De Actualización De La Nomenclatura De Los Inmuebles Del Municipio Fernández Feo.'),0,'J');
            $pdf->SetY(351.5);    
            $pdf->SetX(19);
            $pdf->SetFont('Times','B',11);
            $pdf->Cell(80,7,'NOTA:',0,'C');
            $pdf->SetY(352);    
            $pdf->SetX(35);
            $pdf->SetFont('Times','',11);
            $pdf->Cell(80,6,'Constancia que se expide a solicitud de parte interesada para',0,'J');
            $pdf->SetY(357.5);    
            $pdf->SetX(19);
            $pdf->SetFont('Times','',11);
            $pdf->MultiCell(100,6,utf8_decode('fines legales en la fecha antes descrita,                                                          '),0,'J');
            $pdf->SetY(357.5);    
            $pdf->SetX(19);
            $pdf->SetFont('Times','B',11);
            $pdf->MultiCell(115,6,utf8_decode('                                                               La presente tiene vigencia para el año fiscal en curso. '),0,'J');
        //FIRMA
            $pdf->SetY(360);    
            $pdf->SetX(160);
            $pdf->SetDrawColor(0,0,0,0);
            $pdf->SetFont('Times','B',9);
            $pdf->SetLineWidth(0.5);
            $pdf->MultiCell(120,6,utf8_decode('ING. LENIS YONDELBER COLMENARES CONTRERAS PRESIDENTE DEL INSTITUTO AUTONOMO MUNICIPAL DE ORDENAMIENTO TERRITORIAL DEL MUNICIPIO FERNANDEZ FEO (I.A.M.O.T.F.F.) SEGÚN RESOLUCIÓN NRO. ABSMFF/2020-021
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