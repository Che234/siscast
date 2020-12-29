<?php
require('../../lib/fpdf/fpdf.php');
class PDF4 extends FPDF
{
    // Cabecera de página
    function Header(){
        // Logos
        $this->Image('../../../assets/logo.jpg',10,3,32,23);
        $this->Image('../../../assets/escudo.jpg',175,3,31,23.6);
        $this->Image('../../../assets/fondoCabecera.jpg',50,3,120,22);
        // Arial bold 15
        $this->SetFont('Times','B',9);
        // Título
        $this->SetY(1);
        $this->SetX(74);
        $this->Cell(30,10,'REPUBLICA BOLIVARIANA DE VENEZUELA',0,'C');
        $this->SetY(5);
        $this->SetX(80);
        $this->Cell(30,10,'INSTITUTO AUTONOMO MUNICIPAL ',0,'C');
        $this->SetY(9);
        $this->SetX(81);
        $this->Cell(30,10,'DE ORDENAMIENTO TERRITORIAL',0,'C');
        $this->SetY(15);
        $this->SetX(71);
        $this->Cell(65,6,'MUNICIPIO FERNANDEZ FEO - EDO. TACHIRA',0,'C');
        $this->SetY(17);
        $this->SetX(95);
        $this->Cell(30,10,'RIF: G200129891',0,'C');
    }

    // Pie de página
    function Footer(){
        // Arial italic 8
        $this->SetFont('Arial','B',8);
        // Posición: a 1,5 cm del final
        $this->Image('../../../assets/fondoFooter.jpg',20,310,170,14); //Image(string file [, float x [, float y [, float w [, float h [, string type [, mixed link]]]]]])
        $this->SetY(312);    
        $this->SetX(71);
        $this->MultiCell(80,4,utf8_decode('PIÑAL, CALLE 3 ENTRE CARRERAS 3 Y 4,PALACIO MUNICIPAL, MUNICIPIO FERNANDEZ FEO '.utf8_encode('-').' ESTADO TACHIRA IAMOTFF@GMAIL.COM'),0,'C');
        
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
                $busExpSQL = "SELECT * FROM expediente where n_expediente='".$this->nuExp."'";
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
                $resultPropieDe = $resPropDe->fetch_array();
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
        // Creación del objeto de la clase heredada  
            $pdf = new PDF4('P','mm',array(216,335));
            $pdf->SetMargins(20,0,22);
            $pdf->AliasNbPages();
            $pdf->AddPage();
        //CONTINUACION HEADER
            $pdf->SetFont('Times','B',10);
            $pdf->SetX(38);
            $pdf->SetY(29);
            $pdf->MultiCell(0,4,''.utf8_decode('Quien suscribe, Presidente del Instituto Autónomo Municipal de
            Ordenamiento Territorial  del Municipio Fernández Feo 
            (I.A.M.O.T.F.F)').'',0,'C');
            $pdf->SetX(182);
            $pdf->Cell(20,10,'F-001');
            $pdf->SetY(43);
            $pdf->SetX(95);
            $pdf->SetFont('Times','B',10);
            $pdf->SetDrawColor(0,0,0,0);
            $pdf->SetLineWidth(0.5);
            $pdf->Cell(31,5,'HACE CONSTAR','0,0,0,B:1',0,'C');
            $pdf->SetY(48);
            $pdf->SetX(22);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(40,10,'Fecha: '.date('d-m-Y').'');
            $pdf->SetY(48);
            $pdf->SetX(140);
            $pdf->cell(40,10,utf8_decode('Nº de Factura: '.$this->numFact.''));
            $pdf->SetY(52);
            $pdf->SetX(22);
            $pdf->cell(40,10,utf8_decode('Nº Civico: No Aplica'));
            $pdf->SetY(52);
            $pdf->SetX(140);
            $pdf->cell(40,10,utf8_decode('Nº Expediente: '.$busExpedienteRes["n_expediente"].''));
            $pdf->SetY(56);
            $pdf->SetX(22);
            $pdf->cell(40,10,''.utf8_decode('Tipo de Operación: '.$this->operacion.'').'');
        //CODIGO CATASTRAL
            $pdf->SetY(66);
            $pdf->SetX(19);
            $pdf->SetFont('Times','B',9);
            $pdf->cell(0,4,'CODIGO CATASTRAL',1,0,'C');
            $pdf->SetY(70);
            $pdf->SetX(19);
            $pdf->cell(16,4,'Efed',1,0,'C');
            $pdf->SetY(70);
            $pdf->SetX(35);
            $pdf->cell(16,4,'Mun',1,0,'C');
            $pdf->SetY(70);
            $pdf->SetX(51);
            $pdf->cell(16,4,'Prr',1,0,'C');
            $pdf->SetY(70);
            $pdf->SetX(67);
            $pdf->cell(18,4,'Amb',1,0,'C');
            $pdf->SetY(70);
            $pdf->SetX(85);
            $pdf->cell(18,4,'Sec',1,0,'C');
            $pdf->SetY(70);
            $pdf->SetX(103);
            $pdf->cell(18,4,'Ssec',1,0,'C');
            $pdf->SetY(70);
            $pdf->SetX(121);
            $pdf->cell(18,4,'Man',1,0,'C');
            $pdf->SetY(70);
            $pdf->SetX(139);
            $pdf->cell(18,4,'Par',1,0,'C');
            $pdf->SetY(70);
            $pdf->SetX(157);
            $pdf->cell(18,4,'Niv',1,0,'C');
            $pdf->SetY(70);
            $pdf->SetX(175);
            $pdf->cell(19,4,'Und',1,0,'C');
            $pdf->SetY(74);
            $pdf->SetX(19);
            $pdf->cell(8,4,'2',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(27);
            $pdf->cell(8,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(35);
            $pdf->cell(8,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(43);
            $pdf->cell(8,4,'7',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(51);
            $pdf->cell(8,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
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
            $pdf->SetY(74);
            $pdf->SetX(67);
            if($resultInmueDe["ambito"]=="Urbano"){
                $pdf->cell(6,4,'U',1,0,'C');
            }elseif($resultInmueDe["ambito"]=="Rural"){
                $pdf->cell(6,4,'R',1,0,'C');
            }else{
                $pdf->cell(6,4,'0',1,0,'C');
            }//LISTO
            $pdf->SetY(74);
            $pdf->SetX(73.2);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(79);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(85);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(91);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(97);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(103);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(109);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(115);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(121);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(127);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(133);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(139);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(145);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(151);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(157);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(163);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(169);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(175);
            $pdf->cell(6,4,'0',1,0,'C');
            $pdf->SetY(74);
            $pdf->SetX(181);
            $pdf->cell(6,4,'0',1,0,'C');
            $pdf->SetY(74);
            $pdf->SetX(187);
            $pdf->cell(7,4,'0',1,0,'C');
        //DATOS DEL PROPIETARIO
            $pdf->SetFont('Times','B',9);
            $pdf->SetY(78);
            $pdf->SetX(19);
            $pdf->cell(0,4,'DATOS DEL PROPIETARIO',1,0,'C');
            $pdf->SetY(82);
            $pdf->SetX(19);
            $pdf->cell(46,4,utf8_decode('Nº de Cedula'),1,0,'L');
            $pdf->SetY(82);
            $pdf->SetX(65);
            if($resultPropieDe["cedula"]=="NO APLICA"){
                $pdf->cell(0,5,'NO APLICA',1,0,'L');//89
            }else{
                $pdf->cell(0,5,''.$resultPropieDe["cedula"].'',1,0,'L');//89
            }
            $pdf->SetY(86);
            $pdf->SetX(19);
            $pdf->cell(46,4,'Rif',1,0,'L');
            $pdf->SetY(86);
            $pdf->SetX(65);
            $divRifSec = explode('|',$resultPropieDe["rif"]);
            if($divRifSec[0]=="N/A"){
                if($divRifSec[1]=="NO APLICA"){
                    $pdf->cell(0,4,'NO APLICA',1,0,'L');
                }else{
                    $pdf->cell(0,4,'NO APLICA',1,0,'L');
                }
            }else{
                if($divRifSec[1]!="NO APLICA"){
                    $pdf->cell(0,4,''.$divRifSec[0]."-".$divRifSec[1].'',1,0,'L');
                }else{
                    $pdf->cell(0,4,'NO APLICA',1,0,'L');
                }
            }
            $pdf->SetY(90);
            $pdf->SetX(19);
            $pdf->cell(46,4,'Apellidos Y Nombres ',1,0,'L');
            $pdf->SetY(90);
            $pdf->SetX(65);
            $pdf->Cell(0,4,''.utf8_decode($nombreProp).'',1,0,'L');
            $pdf->SetX(84);
            $pdf->Cell(0,4,'' ,0,0,'L');
            $pdf->SetY(94);
            $pdf->SetX(19);
            $pdf->cell(46,4,utf8_decode('Nº de Teléfono '),1,0,'L');
            $pdf->SetY(94);
            $pdf->SetX(65);
            $divTelfSec = explode('-',$resultPropieDe["telef"]);
            if($divTelfSec[0]=="N/A"){
                if($divTelfSec[1]=="NO APLICA"){
                    $pdf->cell(0,4,'NO APLICA',1,0,'L');
                }else{
                    $pdf->cell(0,4,'NO APLICA',1,0,'L');
                }
            }else{
                if($divTelfSec[1]!="NO APLICA"){
                    $pdf->cell(0,4,''.$resultPropieDe["telef"].'',1,0,'L');
                }else{
                    $pdf->cell(0,4,'NO APLICA',1,0,'L');
                }
            }
            $pdf->SetY(98);
            $pdf->SetX(19);
            $pdf->cell(46,4,utf8_decode('Dirección Del Propietario'),1,0,'L');
            $pdf->SetY(98);
            $pdf->SetX(65);
            $pdf->cell(0,4,''.utf8_decode($resultPropieDe["dir_hab"]).'',1,0,'L');
        //DATOS DE PROTOCOLIZACION
            $pdf->SetY(102);
            $pdf->SetX(19);
            $pdf->cell(0,4,''.utf8_decode("DATOS DE PROTOCOLIZACIÓN").'',1,0,'C');
            $pdf->SetY(106);
            $pdf->SetX(19);
            $pdf->cell(80,4,'Documento Debidamente: '.$resultProp["documento"].'',1,0,'L');
            $pdf->SetY(106);
            $pdf->SetX(99);
            if($resultProp["direccion"]=="NO APLICA"){
                $pdf->cell(0,4,utf8_decode('Dirección: NO APLICA'),1,0,'L');
            }else{
                $pdf->cell(0,4,utf8_decode('Dirección: '.$resultProp["direccion"].''),1,0,'L');
            }
            $pdf->SetY(110);
            $pdf->SetX(19);
            $pdf->cell(25,4,utf8_decode('Número:'),1,0,'C');
            $pdf->SetY(114);
            $pdf->SetX(19);
            $pdf->SetFont('Times','B',9);
            if($resultProp["numero"]=="NO APLICA"){
                $pdf->cell(25,4,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(25,4,''.$resultProp["numero"].'',1,0,'C');
            }
            $pdf->SetY(110);
            $pdf->SetX(44);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(25,4,'Tomo',1,0,'C');
            $pdf->SetY(114);
            $pdf->SetX(44);
            $pdf->SetFont('Times','B',9);
            if($resultProp["tomo"]=="NO APLICA"){
                $pdf->cell(25,4,'NO APLICA',1,0,'C');    
            }else{
                $pdf->cell(25,4,''.$resultProp["tomo"].'',1,0,'C');
            }
            $pdf->SetY(110);
            $pdf->SetX(69);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(23,4,'Folios',1,0,'C');
            $pdf->SetY(114);
            $pdf->SetX(69);
            $pdf->SetFont('Times','B',9);
            if($resultProp["folio"]=="NO APLICA"){
                $pdf->cell(23,4,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(23,4,''.$resultProp["folio"].'',1,0,'C');
            }
            $pdf->SetY(110);
            $pdf->SetX(92);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(23,4,'Protocolo',1,0,'C');
            $pdf->SetY(114);
            $pdf->SetX(92);
            $pdf->SetFont('Times','B',9);
            if($resultProp["protocolo"]=="NO APLICA"){
                $pdf->cell(23,4,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(23,4,''.$resultProp["protocolo"].'',1,0,'C');
            }
            $pdf->SetY(110);
            $pdf->SetX(115);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(23,4,'Trimestre',1,0,'C');
            $pdf->SetY(114);
            $pdf->SetX(115);
            $pdf->SetFont('Times','B',9);
            if($resultProp["trimestre"]=="NO APLICA"){
                $pdf->cell(23,4,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(23,4,''.$resultProp["trimestre"].'',1,0,'C');
            }
            $pdf->SetY(110);
            $pdf->SetX(138);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(23,4,'Fecha',1,0,'C');
            $pdf->SetY(114);
            $pdf->SetX(138);
            $pdf->SetFont('Times','B',9);
            if($resultProp["fecha"]=="0000-00-00"){
                $pdf->cell(23,4,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(23,4,''.$resultProp["fecha"].'',1,0,'C');
            }
            $pdf->SetY(110);
            $pdf->SetX(161);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(0,4,'Valor de Inmueble',1,0,'C');
            $pdf->SetY(114);
            $pdf->SetX(161);
            $pdf->SetFont('Times','B',9);
            if($resultProp["valor_inmueble"]=="NO APLICA"){
                $pdf->cell(0,4,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(0,4,''.$resultProp["valor_inmueble"].'',1,0,'C');
            }
        //DATOS DE COLINDANTES SEGUN DOCUMENTO
            $pdf->SetY(118);
            $pdf->SetX(19);
            $pdf->cell(0,4,utf8_decode('DATOS DE COLINDANTES SEGÚN DOCUMENTO'),1,0,'C');
            $pdf->SetY(122);
            $pdf->SetX(19);
            $pdf->SetFont('Times','B',9);
            $pdf->cell(35,4,'Puntos Cardinales',1,0,'C');
            $pdf->SetY(122);
            $pdf->SetX(54);
            $pdf->cell(113,4,'Alinderado',1,0,'C');
            $pdf->SetY(122);
            $pdf->SetX(167);
            $pdf->cell(0,4,'Medida (m)',1,0,'C');
            $pdf->SetY(126);
            $pdf->SetX(19);
            if($resultLindDoc["norte"]!="N/A"){
                $pdf->cell(35,6,'NORTE',1,0,'C');
            }elseif($resultLindDoc["norte"]=="N/A"){
                $pdf->cell(35,6,'NORESTE',1,0,'C');
            }
            $pdf->SetY(126);
            $pdf->SetX(54);
            $pdf->SetFont('Times','B',8);
            $pdf->cell(0,6,'',1,0,'C');
            $pdf->SetY(126);
            $pdf->SetX(54);
            $pdf->Multicell(113,3,utf8_decode(''.$resultLindDoc["alind_n"].''),0,'C');//106 caracteres
            $pdf->SetY(126);
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
            $pdf->SetY(132);
            $pdf->SetX(19);
            if($resultLindDoc["sur"]!="nada"){
                $pdf->cell(35,6,'SUR',1,0,'C');
            }
            if($resultLindDoc["sur"]=="nada"){
                $pdf->cell(35,6,'SURESTE',1,0,'C');
            }
            $pdf->SetY(132);
            $pdf->SetX(54);
            $pdf->cell(113,6,'',1,0,'C');
            $pdf->SetY(132);
            $pdf->SetX(54);
            $pdf->SetFont('Times','B',8);
            $pdf->Multicell(113,3,utf8_decode(''.$resultLindDoc["alind_s"].''),0,'C');
            $pdf->SetY(132);
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
            
            $pdf->SetY(138);
            $pdf->SetX(19);
            if($resultLindDoc["este"]!="nada"){
                $pdf->cell(35,6,'ESTE',1,0,'C');
            }
            if($resultLindDoc["este"]=="nada"){
                $pdf->cell(35,6,'SUROESTE',1,0,'C');
            }
            $pdf->SetY(138);
            $pdf->SetX(54);
            $pdf->cell(113,6,utf8_decode(''),1,0,'C');
            $pdf->SetY(138);
            $pdf->SetX(54);
            $pdf->SetFont('Times','B',8);
            $pdf->Multicell(113,3,utf8_decode(''.$resultLindDoc["alind_e"].''),0,'C');
            $pdf->SetY(138);
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
            
            $pdf->SetY(144);
            $pdf->SetX(19);
            if($resultLindDoc["oeste"]!="nada"){
                $pdf->cell(35,6,'OESTE',1,0,'C');
            }
            if($resultLindDoc["oeste"]=="nada"){
                $pdf->cell(35,6,'NOROESTE',1,0,'C');
            }
            $pdf->SetY(144);
            $pdf->SetX(54);
            $pdf->cell(113,6,utf8_decode(''),1,0,'C');
            $pdf->SetY(144);
            $pdf->SetX(54);
            $pdf->SetFont('Times','B',8);
            $pdf->Multicell(113,3,utf8_decode(''.$resultLindDoc["alind_o"].''),0,'C');
            $pdf->SetY(144);
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
        //DATOS DE COLINDANTES SEGUN INSPECCION
            $pdf->SetY(150);
            $pdf->SetX(19);
            $pdf->cell(0,4,utf8_decode('DATOS DE COLINDANTES SEGÚN INSPECCIÓN'),1,0,'C');
            $pdf->SetY(154);
            $pdf->SetX(19);
            $pdf->cell(35,4,'Puntos Cardinales',1,0,'C');
            $pdf->SetY(154);
            $pdf->SetX(54);
            $pdf->cell(113,4,'Alinderado',1,0,'C');
            $pdf->SetY(154);
            $pdf->SetX(167);
            $pdf->cell(0,4,'Medida (m)',1,0,'C');
            $pdf->SetY(158);
            $pdf->SetX(19);
            if($resultLindGen["norte"]!="nada"){
                $pdf->cell(35,6,'NORTE',1,0,'C');
            }
            if($resultLindGen["norte"]=="nada"){
                $pdf->cell(35,6,'NORESTE',1,0,'C');
            }
            $pdf->SetY(158);
            $pdf->SetX(54);
            $pdf->cell(113,6,'',1,0,'C');
            $pdf->SetY(158);
            $pdf->SetX(54);
            $pdf->SetFont('Times','B',8);
            $pdf->Multicell(113,3,utf8_decode(''.$resultLindGen["alind_n"].''),0,'C');
            $pdf->SetY(158);
            $pdf->SetX(167);
            $pdf->SetFont('Times','B',9);
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
            
            $pdf->SetY(164);
            $pdf->SetX(19);
            if($resultLindGen["sur"]!="nada"){
                $pdf->cell(35,6,'SUR',1,0,'C');
            }
            if($resultLindGen["sur"]=="nada"){
                $pdf->cell(35,6,'SURESTE',1,0,'C');
            }
            $pdf->SetY(164);
            $pdf->SetX(54);
            $pdf->cell(113,6,'',1,0,'C');
            $pdf->SetY(164);
            $pdf->SetX(54);
            $pdf->SetFont('Times','B',8);
            $pdf->Multicell(113,3,utf8_decode(''.$resultLindGen["alind_s"].''),0,'C');
            $pdf->SetY(164);
            $pdf->SetX(167);
            $pdf->SetFont('Times','B',9);
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
            
            $pdf->SetY(170);
            $pdf->SetX(19);
            if($resultLindGen["este"]!="nada"){
                $pdf->cell(35,6,'ESTE',1,0,'C');
            }
            if($resultLindGen["este"]=="nada"){
                $pdf->cell(35,6,'SUROESTE',1,0,'C');
            }
            $pdf->SetY(170);
            $pdf->SetX(54);
            $pdf->cell(113,6,utf8_decode(''),1,'C');
            $pdf->SetY(170);
            $pdf->SetX(54);
            $pdf->SetFont('Times','B',8);
            $pdf->cell(113,3,utf8_decode(''.$resultLindGen["alind_e"].''),0,'C');
            $pdf->SetY(170);
            $pdf->SetX(167);
            $pdf->SetFont('Times','B',9);
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
            
            $pdf->SetY(176);
            $pdf->SetX(19);
            if($resultLindGen["oeste"]!="nada"){
                $pdf->cell(35,6,'OESTE',1,0,'C');
            }
            if($resultLindGen["oeste"]=="nada"){
                $pdf->cell(35,6,'NOROESTE',1,0,'C');
            }
            $pdf->SetY(176);
            $pdf->SetX(54);
            $pdf->cell(113,6,utf8_decode(''),1,'C');
            $pdf->SetY(176);
            $pdf->SetX(54);
            $pdf->SetFont('Times','B',8);
            $pdf->Multicell(113,3,utf8_decode(''.$resultLindGen["alind_o"].''),0,'C');
            $pdf->SetY(176);
            $pdf->SetX(167);
            $pdf->SetFont('Times','B',9);
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
            
            $pdf->SetY(182);    
            $pdf->SetX(19);
            $pdf->cell(35,4,'Area de Terreno',1,0,'C');
            $pdf->SetY(182);    
            $pdf->SetX(54);
            if($resultLindGen["areaTotal"]=="NO APLICA"){
                $pdf->cell(25,4,'NO APLICA',1,0,'C');
            }else{
                if($resultLindGen["uniAreaT"]=="N/A"){
                    $pdf->cell(25,4,'NO APLICA',1,0,'C');
                }else{
                    $pdf->cell(25,4,''.$resultLindGen["areaTotal"].' '.$resultLindGen["uniAreaT"].'',1,0,'C');
                }
            }
            $pdf->SetY(182);    
            $pdf->SetX(79);
            $pdf->cell(35,4,utf8_decode('Niveles de Construcción'),1,0,'C');
            $pdf->SetY(182);    
            $pdf->SetX(114);
            if($resultLindGen["nivelesConst"]=="NO APLICA"){
                $pdf->cell(35,4,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(35,4,''.$resultLindGen["nivelesConst"].'',1,0,'C');
            }
            $pdf->SetY(182);    
            $pdf->SetX(149);
            $pdf->cell(31,4,utf8_decode('Area de Construcción'),1,0,'C');
            $pdf->SetY(182);    
            $pdf->SetX(180);
            if($resultLindGen["areaConst"]=="NO APLICA"){
                $pdf->cell(0,4,'NO APICA',1,0,'C');
            }else{
                if($resultLindGen["uniAreaC"]=="N/A"){
                    $pdf->cell(0,4,'NO APLICA',1,0,'C');
                }else{
                    $pdf->cell(0,4,''.$resultLindGen["areaConst"].' '.$resultLindGen["uniAreaC"].'',1,0,'C');
                }
            }
        //PARTE 6
            $pdf->SetY(186);    
            $pdf->SetX(19);
            $pdf->cell(60,7,utf8_decode('Dirección del Inmueble'),1,0,'C');
            $pdf->SetY(186);    
            $pdf->SetX(79);
            $pdf->cell(0,7,'',1,0,'C');
            $pdf->SetY(187);    
            $pdf->SetX(79);
            $pdf->SetFont('Times','B',8);
            $pdf->Multicell(0,3,''.utf8_decode($resultInmueDe["direccion"]).'',0,'C'); //114 carac
            $pdf->SetY(193);    
            $pdf->SetX(19);
            $pdf->SetFont('Times','B',9);
            $pdf->cell(60,4,utf8_decode('Régimen de la Propiedad'),1,0,'C');
            $pdf->SetY(193);    
            $pdf->SetX(79);
            $pdf->cell(0,4,''.$resultConst["Regimen"].'',1,0,'C');
            $pdf->SetY(197);    
            $pdf->SetX(19);
            $pdf->cell(60,4,'Uso del Inmueble',1,0,'C');
            $pdf->SetY(197);    
            $pdf->SetX(79);
            $pdf->cell(0,4,''.$mostcarastInmue["uso"].'',1,0,'C');
            $pdf->SetY(201);    
            $pdf->SetX(19);
            $pdf->cell(60,4,'Valor Estimado del Inmueble',1,0,'C');
            $pdf->SetY(201);    
            $pdf->SetX(79);
            $pdf->cell(0,4,''.$busExpedienteRes["valorInmue"].'',1,0,'C');
        //SERVICIOS 1
            $pdf->SetY(205);    
            $pdf->SetX(19);
            $pdf->cell(20,19,'Servicios',1,0,'C');
            $pdf->SetY(205);    
            $pdf->SetX(39);
            $pdf->cell(0,19,'',1,0,'C');
            $pdf->SetY(205.5);    
            $pdf->SetX(42);
            $pdf->cell(30,4,'Acueducto',0,0,'L');
            $pdf->SetY(206);    
            $pdf->SetX(72);
            if($resultServ["acued"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(209.5);    
            $pdf->SetX(42);
            $pdf->cell(30,4,'Acueducto Rural',0,0,'L');
            $pdf->SetY(210);    
            $pdf->SetX(72);
            if($resultServ["acuedRural"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(214);    
            $pdf->SetX(42);
            $pdf->cell(30,4,utf8_decode('Aguas Subterráneas'),0,0,'L');
            $pdf->SetY(214);    
            $pdf->SetX(72);
            if($resultServ["aguasSubter"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(218);    
            $pdf->SetX(42);
            $pdf->cell(30,4,'Aguas Servidas',0,0,'L');
            $pdf->SetY(218);    
            $pdf->SetX(72);
            if($resultServ["aguasServ"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
        //SERVICIOS 2
            $pdf->SetY(205.5);    
            $pdf->SetX(78);
            $pdf->cell(30,4,'Pavimento Flexible',0,0,'L');
            $pdf->SetY(206);    
            $pdf->SetX(108);
            if($resultServ["pavimentoFlex"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(209.5);    
            $pdf->SetX(78);
            $pdf->cell(30,4,'Pavimento Rigido',0,0,'L');
            $pdf->SetY(210);    
            $pdf->SetX(108);
            if($resultServ["pavimentoRig"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(214);    
            $pdf->SetX(78);
            $pdf->cell(30,4,utf8_decode('Vía Engranzonada'),0,0,'L');
            $pdf->SetY(214);    
            $pdf->SetX(108);
            if($resultServ["viaEngran"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(218);    
            $pdf->SetX(78);
            $pdf->cell(30,4,'Acera',0,0,'L');
            $pdf->SetY(218);    
            $pdf->SetX(108);
            if($resultServ["acera"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
        //SERVICIOS 3
            $pdf->SetY(205.5);    
            $pdf->SetX(114);
            $pdf->cell(30,4,utf8_decode('Alumbrado Público'),0,0,'L');
            $pdf->SetY(206);    
            $pdf->SetX(144);
            if($resultServ["alumbradoPub"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(209.5);    
            $pdf->SetX(114);
            $pdf->cell(30,4,'Aseo',0,0,'L');
            $pdf->SetY(210);    
            $pdf->SetX(144);
            if($resultServ["aseo"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(214);    
            $pdf->SetX(114);
            $pdf->cell(30,4,utf8_decode('Transporte Público'),0,0,'L');
            $pdf->SetY(214);    
            $pdf->SetX(144);
            if($resultServ["transportePublic"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(218);    
            $pdf->SetX(114);
            $pdf->cell(30,4,utf8_decode('Pozo Séptico'),0,0,'L');
            $pdf->SetY(218);    
            $pdf->SetX(144);
            if($resultServ["pozoSept"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
        //SERVICIOS 4
            $pdf->SetY(205.5);    
            $pdf->SetX(150);
            $pdf->cell(30,6,'Electricidad Residencial',0,0,'L');
            $pdf->SetY(206);    
            $pdf->SetX(188);
            if($resultServ["electriResi"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(209.5);    
            $pdf->SetX(150);
            $pdf->cell(30,10,'Electricidad Industrial',0,0,'L');
            $pdf->SetY(210);    
            $pdf->SetX(188);
            if($resultServ["electriIndus"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(214);    
            $pdf->SetX(150);
            $pdf->cell(30,10,utf8_decode('Línea Telefónica'),0,0,'L');
            $pdf->SetY(214);    
            $pdf->SetX(188);
            if($resultServ["lineaTelef"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
        //CARACTERISTICAS DEL TERRENO
            $pdf->SetY(224);    
            $pdf->SetX(19);
            $pdf->cell(107,4,'Caracteristicas del Terreno',1,0,'C');
            //TOPOGRAFIA
                $pdf->SetY(228);    
                $pdf->SetX(19);
                $pdf->cell(37,4,utf8_decode('Topografía'),1,0,'C');
                $pdf->SetY(232);    
                $pdf->SetX(19);
                $pdf->cell(37,10,'',1,0,'C');
                $pdf->SetY(233);    
                $pdf->SetX(16);
                $pdf->cell(30,4,'Terreno Llano',0,0,'C');
                $pdf->SetY(233);    
                $pdf->SetX(50);
                if($mostcarastInmue["topografia"]=="Terreno Llano"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(237);    
                $pdf->SetX(19);
                $pdf->cell(30,4,'Terreno Quebrado',0,0,'C');
                $pdf->SetY(237);    
                $pdf->SetX(50);
                if($mostcarastInmue["topografia"]=="Terreno Quebrado"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
            //FORMA
                $pdf->SetY(242);    
                $pdf->SetX(19);
                $pdf->cell(37,4,'Forma',1,0,'C');
                $pdf->SetY(246);    
                $pdf->SetX(19);
                $pdf->cell(37,11,'',1,0,'C');
                $pdf->SetY(246);    
                $pdf->SetX(20);
                $pdf->cell(30,4,'Regular',0,'C');
                $pdf->SetY(247);    
                $pdf->SetX(50);
                if($mostcarastInmue["forma"]=="Regular"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(251);    
                $pdf->SetX(20);
                $pdf->cell(30,4,'Irregular',0,'C');
                $pdf->SetY(251);    
                $pdf->SetX(50);
                if($mostcarastInmue["forma"]=="Irregular"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
            //USO
                $pdf->SetY(228);    
                $pdf->SetX(56);
                $pdf->cell(40,4,'Uso',1,0,'C');
                $pdf->SetY(232);    
                $pdf->SetX(56);
                $pdf->cell(40,25,'',1,0,'C');
                $pdf->SetY(233);    
                $pdf->SetX(56);
                $pdf->cell(30,4,'Residencial',0,0,'L');
                $pdf->SetY(233);    
                $pdf->SetX(91);
                if($mostcarastInmue["uso"]=="Residencial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(237);    
                $pdf->SetX(56);
                $pdf->cell(30,4,'Comercial',0,0,'L');
                $pdf->SetY(237);    
                $pdf->SetX(91);
                if($mostcarastInmue["uso"]=="Comercial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(241);    
                $pdf->SetX(56);
                $pdf->cell(30,4,'Residencial-Comercial',0,0,'L');
                $pdf->SetY(241);    
                $pdf->SetX(91);
                if($mostcarastInmue["uso"]=="Residencial-Comercial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(245);    
                $pdf->SetX(56);
                $pdf->cell(30,4,'Industrial',0,0,'L');
                $pdf->SetY(245);    
                $pdf->SetX(91);
                if($mostcarastInmue["uso"]=="Industrial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(249);    
                $pdf->SetX(56);
                $pdf->cell(30,4,utf8_decode('Espacios Públicos'),0,0,'L');
                $pdf->SetY(249);    
                $pdf->SetX(91);
                if($mostcarastInmue["uso"]=="Espacios-Publicos"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(253);    
                $pdf->SetX(56);
                $pdf->cell(30,4,'Rural',0,0,'L');
                $pdf->SetY(253);    
                $pdf->SetX(91);
                if($mostcarastInmue["uso"]=="Rural"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
            //TENENCIA
                $pdf->SetY(228);    
                $pdf->SetX(96);
                $pdf->cell(30,4,'Tenencia',1,0,'C');
                $pdf->SetY(232);    
                $pdf->SetX(96);
                $pdf->cell(30,37,'',1,0,'C');
                $pdf->SetY(257);    
                $pdf->SetX(19);
                $pdf->cell(27,4,'Observaciones:',0,0,'L');
                $pdf->SetY(260);    
                $pdf->SetX(20);
                $pdf->Multicell(80,4,$resultConst["observ"],0,'L');
                $pdf->SetY(257);    
                $pdf->SetX(19);
                $pdf->cell(77,12,'',1,0,'L');// CUADRO DE OBSERVACIONES
                $pdf->SetY(233);    
                $pdf->SetX(96);
                $pdf->cell(25,4,'Municipio',0,0,'L');
                $pdf->SetY(233);    
                $pdf->SetX(116);
                if($mostcarastInmue["tenencia"]=="Municipio"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(237);    
                $pdf->SetX(96);
                $pdf->cell(25,4,'Comunidad',0,0,'L');
                $pdf->SetY(237);    
                $pdf->SetX(116);
                if($mostcarastInmue["tenencia"]=="Comunidad"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(241);    
                $pdf->SetX(96);
                $pdf->cell(25,4,'INTU',0,0,'L');
                $pdf->SetY(241);    
                $pdf->SetX(116);
                if($mostcarastInmue["tenencia"]=="INTU"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(245);    
                $pdf->SetX(96);
                $pdf->cell(25,4,'INTI',0,0,'L');
                $pdf->SetY(245);    
                $pdf->SetX(116);
                if($mostcarastInmue["tenencia"]=="INTI"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(249);    
                $pdf->SetX(96);
                $pdf->cell(25,4,'Propio',0,0,'L');
                $pdf->SetY(249);    
                $pdf->SetX(116);
                if($mostcarastInmue["tenencia"]=="Propio"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(253);    
                $pdf->SetX(96);
                $pdf->cell(25,4,'Enfiteusis',0,0,'L');
                $pdf->SetY(253);    
                $pdf->SetX(116);
                if($mostcarastInmue["tenencia"]=="Enfiteusis"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(257);    
                $pdf->SetX(96);
                $pdf->cell(25,4,'Ocupado',0,0,'L');
                $pdf->SetY(257);    
                $pdf->SetX(116);
                if($mostcarastInmue["tenencia"]=="Ocupado"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(261);    
                $pdf->SetX(96);
                $pdf->cell(25,4,'Otros',0,0,'L');
                $pdf->SetY(261);    
                $pdf->SetX(116);
                if($mostcarastInmue["tenencia"]=="Otros"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
        //CARACTERISTICAS DE LA CONSTRUCCION
                $pdf->SetY(224);    
                $pdf->SetX(126);
                $pdf->cell(0,4,utf8_decode('Caracteristicas del Construcción'),1,0,'C');
                $pdf->SetY(228);    
                $pdf->SetX(126);
                $pdf->cell(34,41,'',1,0,'C');
            //TIPOS DE CONSTRUCCION
                $pdf->SetY(228);    
                $pdf->SetX(126);
                $pdf->cell(34,4,utf8_decode('Tipo de Construcción'),1,0,'C');
                $pdf->SetY(232);    
                $pdf->SetX(126);
                $pdf->cell(4,4,'Concreto',0,0,'L');
                $pdf->SetY(232);    
                $pdf->SetX(155);
                if($resulCaracInmue["estructura"]=="Concreto"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(236);    
                $pdf->SetX(126);
                $pdf->cell(4,4,'Acero',0,0,'L');
                $pdf->SetY(236);    
                $pdf->SetX(155);
                if($resulCaracInmue["estructura"]=="Acero"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(240);    
                $pdf->SetX(126);
                $pdf->cell(4,4,'Concreto-Acero',0,0,'L');
                $pdf->SetY(240);    
                $pdf->SetX(155);
                if($resulCaracInmue["estructura"]=="Concreto-Acero"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(244);    
                $pdf->SetX(126);
                $pdf->cell(4,4,'Paredes Portantes',0,0,'L');
                $pdf->SetY(244);    
                $pdf->SetX(155);
                if($resulCaracInmue["estructura"]=="Paredes-Portantes"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(248);    
                $pdf->SetX(126);
                $pdf->cell(4,4,'Madera',0,0,'L');
                $pdf->SetY(248);    
                $pdf->SetX(155);
                if($resulCaracInmue["estructura"]=="Madera"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(252);    
                $pdf->SetX(126);
                $pdf->cell(4,4,'Prefabricado',0,0,'L');
                $pdf->SetY(252);    
                $pdf->SetX(155);
                if($resulCaracInmue["estructura"]=="Prefabricado"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(256);    
                $pdf->SetX(126);
                $pdf->cell(4,4,'Otros',0,0,'L');
                $pdf->SetY(256);    
                $pdf->SetX(155);
                if($resulCaracInmue["estructura"]=="Otros"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
            //DESTINO DE LA EDIFICACION
                $pdf->SetY(228);    
                $pdf->SetX(160);
                $pdf->cell(0,4,utf8_decode('Destino de la Edificación'),1,0,'C');
                $pdf->SetY(232);    
                $pdf->SetX(160);
                $pdf->cell(0,37,'',1,0,'C');
                $pdf->SetY(233);    
                $pdf->SetX(160);
                $pdf->cell(4,4,'Unifamiliar',0,0,'L');
                $pdf->SetY(233);    
                $pdf->SetX(188);
                if($resulCaracInmue["destino"]=="Unifamiliar"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(237);    
                $pdf->SetX(160);
                $pdf->cell(4,4,'Bifamiliar',0,0,'L');
                $pdf->SetY(237);    
                $pdf->SetX(188);
                if($resulCaracInmue["destino"]=="Bifamiliar"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(241);    
                $pdf->SetX(160);
                $pdf->cell(4,4,'Multifamiliar',0,0,'L');
                $pdf->SetY(241);    
                $pdf->SetX(188);
                if($resulCaracInmue["destino"]=="Multifamiliar"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(245);    
                $pdf->SetX(160);
                $pdf->cell(4,4,'Comercial',0,0,'L');
                $pdf->SetY(245);    
                $pdf->SetX(188);
                if($resulCaracInmue["destino"]=="Comercial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(249);    
                $pdf->SetX(160);
                $pdf->cell(4,4,'Industrial',0,0,'L');
                $pdf->SetY(249);    
                $pdf->SetX(188);
                if($resulCaracInmue["destino"]=="Industrial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(253);    
                $pdf->SetX(160);
                $pdf->cell(4,4,'Hotel-Posada',0,0,'L');
                $pdf->SetY(253);    
                $pdf->SetX(188);
                if($resulCaracInmue["destino"]=="Hotel-Posada"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(257);    
                $pdf->SetX(160);
                $pdf->cell(4,4,utf8_decode('Institución Pública'),0,0,'L');
                $pdf->SetY(257);    
                $pdf->SetX(188);
                if($resulCaracInmue["destino"]=="Institución Pública"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(262);    
                $pdf->SetX(160);
                $pdf->cell(4,4,utf8_decode('Espacios Públicos'),0,0,'L');
                $pdf->SetY(262);    
                $pdf->SetX(188);
                if($resulCaracInmue["destino"]=="Espacios Públicos"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
        //REDACCION
            $pdf->SetY(270);    
            $pdf->SetX(21);
            $pdf->SetFont('Times','B',9);
            $pdf->cell(50,4,utf8_decode('REDACCIÓN:'),0,'C');
            $pdf->SetY(270);    
            $pdf->SetX(44);
            $pdf->SetFont('Times','',9);
            $pdf->cell(50,4,utf8_decode(''.$idUser["nombre"].' '.$idUser["apellido"].''),0,'C');
            $pdf->SetY(274);    
            $pdf->SetX(21);
            $pdf->SetFont('Times','B',9);
            $pdf->Cell(100,4,'OBSERVACIONES:',0,'C');
            $pdf->SetY(274);    
            $pdf->SetX(51);
            $pdf->SetFont('Times','',9);
            $pdf->Cell(82,4,'Actualmente El (I.G.V.S.B) Y El,',0,'J');
            $pdf->SetY(278);    
            $pdf->SetX(21);
            $pdf->MultiCell(75,4,utf8_decode('(I.A.M.O.T.F.F) Están Realizando El Trabajo De Actualización De La Nomenclatura De Los Inmuebles Del Municipio Fernández Feo.'),0,'J');
            $pdf->SetY(293);    
            $pdf->SetX(21);
            $pdf->SetFont('Times','B',9);
            $pdf->Cell(80,4,'NOTA:',0,'C');
            $pdf->SetY(293);    
            $pdf->SetX(34);
            $pdf->SetFont('Times','',9);
            $pdf->Cell(80,4,'Constancia que se expide a solicitud de parte',0,'J');
            $pdf->SetY(297);    
            $pdf->SetX(21);
            $pdf->SetFont('Times','',9);
            $pdf->MultiCell(75,4,utf8_decode('interesada para fines legales en la fecha antes descrita,'),0,'J');
            $pdf->SetY(301);    
            $pdf->SetX(21);
            $pdf->SetFont('Times','B',9);
            $pdf->MultiCell(114,4,utf8_decode('La presente tiene vigencia para el año fiscal en curso. '),0,'J');
        //FIRMA
                $pdf->SetY(286);    
                $pdf->SetX(115);
                $pdf->SetDrawColor(0,0,0,0);
                $pdf->SetFont('Times','B',8);
                $pdf->SetLineWidth(0.5);
                $pdf->MultiCell(70,4,utf8_decode('ING. ANA GABRIELA GARCIA HERNANDEZ PRESIDENTE DEL INSTITUTO AUTONOMO MUNICIPAL DE ORDENAMIENTO TERRITORIAL DEL MUNICIPIO FERNANDEZ FEO (I.A.M.O.T.F.F.) SEGÚN RESOLUCIÓN NRO. ABSMFF/2020-080 BAJO GACETA MUNICIPAL N° 242
                '),'T:1','C');
        $carpeta ='../../../assets/constancias/'.date("Y").'';
        if(!file_exists($carpeta)){
            mkdir($carpeta,777,true);
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
            $busExpSQL = "SELECT * FROM expediente where n_expediente='".$this->nuExp."'";
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
            $ced= explode('|',$resultPropieDe["cedula"]);
            $cedFul = $ced[0]."-".$ced[1];
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
            $pdf = new PDF4('P','mm',array(216,335));
            $pdf->SetMargins(20,0,22);
            $pdf->AliasNbPages();
            $pdf->AddPage();
        //CONTINUACION HEADER
            $pdf->SetFont('Times','B',10);
            $pdf->SetX(38);
            $pdf->SetY(29);
            $pdf->MultiCell(0,4,''.utf8_decode('Quien suscribe, Presidente del Instituto Autónomo Municipal de
            Ordenamiento Territorial  del Municipio Fernández Feo 
            (I.A.M.O.T.F.F)').'',0,'C');
            $pdf->SetX(182);
            $pdf->Cell(20,10,'F-003');
            $pdf->SetY(43);
            $pdf->SetX(95);
            $pdf->SetFont('Times','B',10);
            $pdf->SetDrawColor(0,0,0,0);
            $pdf->SetLineWidth(0.5);
            $pdf->Cell(31,5,'HACE CONSTAR','0,0,0,B:1',0,'C');
            $pdf->SetY(48);
            $pdf->SetX(22);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(40,10,'Fecha: '.date('d-m-Y').'');
            $pdf->SetY(48);
            $pdf->SetX(140);
            $pdf->cell(40,10,utf8_decode('Nº de Factura: '.$this->numFact.''));
            $pdf->SetY(52);
            $pdf->SetX(22);
            $pdf->cell(40,10,utf8_decode('Nº Civico: No Aplica'));
            $pdf->SetY(52);
            $pdf->SetX(140);
            $pdf->cell(40,10,utf8_decode('Nº Expediente: '.$busExpedienteRes["n_expediente"].''));
            $pdf->SetY(56);
            $pdf->SetX(22);
            $pdf->cell(40,10,''.utf8_decode('Tipo de Operación: '.$this->operacion.'').'');
        //CODIGO CATASTRAL
            $pdf->SetY(66);
            $pdf->SetX(19);
            $pdf->SetFont('Times','B',9);
            $pdf->cell(0,4,'CODIGO CATASTRAL',1,0,'C');
            $pdf->SetY(70);
            $pdf->SetX(19);
            $pdf->cell(16,4,'Efed',1,0,'C');
            $pdf->SetY(70);
            $pdf->SetX(35);
            $pdf->cell(16,4,'Mun',1,0,'C');
            $pdf->SetY(70);
            $pdf->SetX(51);
            $pdf->cell(16,4,'Prr',1,0,'C');
            $pdf->SetY(70);
            $pdf->SetX(67);
            $pdf->cell(18,4,'Amb',1,0,'C');
            $pdf->SetY(70);
            $pdf->SetX(85);
            $pdf->cell(18,4,'Sec',1,0,'C');
            $pdf->SetY(70);
            $pdf->SetX(103);
            $pdf->cell(18,4,'Ssec',1,0,'C');
            $pdf->SetY(70);
            $pdf->SetX(121);
            $pdf->cell(18,4,'Man',1,0,'C');
            $pdf->SetY(70);
            $pdf->SetX(139);
            $pdf->cell(18,4,'Par',1,0,'C');
            $pdf->SetY(70);
            $pdf->SetX(157);
            $pdf->cell(18,4,'Niv',1,0,'C');
            $pdf->SetY(70);
            $pdf->SetX(175);
            $pdf->cell(19,4,'Und',1,0,'C');
            $pdf->SetY(74);
            $pdf->SetX(19);
            $pdf->cell(8,4,'2',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(27);
            $pdf->cell(8,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(35);
            $pdf->cell(8,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(43);
            $pdf->cell(8,4,'7',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(51);
            $pdf->cell(8,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
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
            $pdf->SetY(74);
            $pdf->SetX(67);
            if($resultInmueDe["ambito"]=="Urbano"){
                $pdf->cell(6,4,'U',1,0,'C');
            }elseif($resultInmueDe["ambito"]=="Rural"){
                $pdf->cell(6,4,'R',1,0,'C');
            }else{
                $pdf->cell(6,4,'0',1,0,'C');
            }//LISTO
            $pdf->SetY(74);
            $pdf->SetX(73.2);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(79);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(85);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(91);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(97);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(103);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(109);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(115);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(121);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(127);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(133);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(139);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(145);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(151);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(157);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(163);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(169);
            $pdf->cell(6,4,'0',1,0,'C');//LISTO
            $pdf->SetY(74);
            $pdf->SetX(175);
            $pdf->cell(6,4,'0',1,0,'C');
            $pdf->SetY(74);
            $pdf->SetX(181);
            $pdf->cell(6,4,'0',1,0,'C');
            $pdf->SetY(74);
            $pdf->SetX(187);
            $pdf->cell(7,4,'0',1,0,'C');
        //DATOS DEL PROPIETARIO
            $pdf->SetFont('Times','B',9);
            $pdf->SetY(78);
            $pdf->SetX(19);
            $pdf->cell(0,4,'DATOS DEL PROPIETARIO',1,0,'C');
            $pdf->SetY(82);
            $pdf->SetX(19);
            $pdf->cell(46,4,utf8_decode('Nº de Cedula'),1,0,'L');
            $pdf->SetY(82);
            $pdf->SetX(65);
            if($resultPropieDe["cedula"]=="NO APLICA"){
                $pdf->cell(0,5,'NO APLICA',1,0,'L');//89
            }else{
                $pdf->cell(0,5,''.$cedFul.'',1,0,'L');//89
            }
            $pdf->SetY(86);
            $pdf->SetX(19);
            $pdf->cell(46,4,'Rif',1,0,'L');
            $pdf->SetY(86);
            $pdf->SetX(65);
            $divRifSec = explode('|',$resultPropieDe["rif"]);
            if($divRifSec[0]=="N/A"){
                if($divRifSec[1]=="NO APLICA"){
                    $pdf->cell(0,4,'NO APLICA',1,0,'L');
                }else{
                    $pdf->cell(0,4,'NO APLICA',1,0,'L');
                }
            }else{
                if($divRifSec[1]!="NO APLICA"){
                    $pdf->cell(0,4,''.$divRifSec[0]."-".$divRifSec[1].'',1,0,'L');
                }else{
                    $pdf->cell(0,4,'NO APLICA',1,0,'L');
                }
            }
            $pdf->SetY(90);
            $pdf->SetX(19);
            $pdf->cell(46,4,'Apellidos Y Nombres ',1,0,'L');
            $pdf->SetY(90);
            $pdf->SetX(65);
            $pdf->Cell(0,4,''.utf8_decode($nombreProp).'',1,0,'L');
            $pdf->SetX(84);
            $pdf->Cell(0,4,'' ,0,0,'L');
            $pdf->SetY(94);
            $pdf->SetX(19);
            $pdf->cell(46,4,utf8_decode('No de Teléfono '),1,0,'L');
            $pdf->SetY(94);
            $pdf->SetX(65);
            $divTelfSec = explode('-',$resultPropieDe["telef"]);
            if($divTelfSec[0]=="N/A"){
                if($divTelfSec[1]=="NO APLICA"){
                    $pdf->cell(0,4,'NO APLICA',1,0,'L');
                }else{
                    $pdf->cell(0,4,'NO APLICA',1,0,'L');
                }
            }else{
                if($divTelfSec[1]!="NO APLICA"){
                    $pdf->cell(0,4,''.$resultPropieDe["telef"].'',1,0,'L');
                }else{
                    $pdf->cell(0,4,'NO APLICA',1,0,'L');
                }
            }
            $pdf->SetY(98);
            $pdf->SetX(19);
            $pdf->cell(46,4,utf8_decode('Dirección Del Propietario'),1,0,'L');
            $pdf->SetY(98);
            $pdf->SetX(65);
            $pdf->cell(0,4,''.utf8_decode($resultPropieDe["dir_hab"]).'',1,0,'L');
        //DATOS DE PROTOCOLIZACION
            $pdf->SetY(102);
            $pdf->SetX(19);
            $pdf->cell(0,4,''.utf8_decode("DATOS DE PROTOCOLIZACIÓN").'',1,0,'C');
            $pdf->SetY(106);
            $pdf->SetX(19);
            $pdf->cell(80,4,'Documento Debidamente: '.$resultProp["documento"].'',1,0,'L');
            $pdf->SetY(106);
            $pdf->SetX(99);
            if($resultProp["direccion"]=="NO APLICA"){
                $pdf->cell(0,4,utf8_decode('Dirección: NO APLICA'),1,0,'L');
            }else{
                $pdf->cell(0,4,utf8_decode('Dirección: '.$resultProp["direccion"].''),1,0,'L');
            }
            $pdf->SetY(110);
            $pdf->SetX(19);
            $pdf->cell(25,4,utf8_decode('Número'),1,0,'C');
            $pdf->SetY(114);
            $pdf->SetX(19);
            $pdf->SetFont('Times','B',9);
            if($resultProp["numero"]=="NO APLICA"){
                $pdf->cell(25,4,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(25,4,''.$resultProp["numero"].'',1,0,'C');
            }
            $pdf->SetY(110);
            $pdf->SetX(44);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(25,4,'Tomo',1,0,'C');
            $pdf->SetY(114);
            $pdf->SetX(44);
            $pdf->SetFont('Times','B',9);
            if($resultProp["tomo"]=="NO APLICA"){
                $pdf->cell(25,4,'NO APLICA',1,0,'C');    
            }else{
                $pdf->cell(25,4,''.$resultProp["tomo"].'',1,0,'C');
            }
            $pdf->SetY(110);
            $pdf->SetX(69);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(23,4,'Folios',1,0,'C');
            $pdf->SetY(114);
            $pdf->SetX(69);
            $pdf->SetFont('Times','B',9);
            if($resultProp["folio"]=="NO APLICA"){
                $pdf->cell(23,4,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(23,4,''.$resultProp["folio"].'',1,0,'C');
            }
            $pdf->SetY(110);
            $pdf->SetX(92);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(23,4,'Protocolo',1,0,'C');
            $pdf->SetY(114);
            $pdf->SetX(92);
            $pdf->SetFont('Times','B',9);
            if($resultProp["protocolo"]=="NO APLICA"){
                $pdf->cell(23,4,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(23,4,''.$resultProp["protocolo"].'',1,0,'C');
            }
            $pdf->SetY(110);
            $pdf->SetX(115);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(23,4,'Trimestre',1,0,'C');
            $pdf->SetY(114);
            $pdf->SetX(115);
            $pdf->SetFont('Times','B',9);
            if($resultProp["trimestre"]=="NO APLICA"){
                $pdf->cell(23,4,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(23,4,''.$resultProp["trimestre"].'',1,0,'C');
            }
            $pdf->SetY(110);
            $pdf->SetX(138);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(23,4,'Fecha',1,0,'C');
            $pdf->SetY(114);
            $pdf->SetX(138);
            $pdf->SetFont('Times','B',9);
            if($resultProp["fecha"]=="0000-00-00"){
                $pdf->cell(23,4,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(23,4,''.$resultProp["fecha"].'',1,0,'C');
            }
            $pdf->SetY(110);
            $pdf->SetX(161);
            $pdf->SetFont('Times','B',10);
            $pdf->cell(0,4,'Valor de Inmueble',1,0,'C');
            $pdf->SetY(114);
            $pdf->SetX(161);
            $pdf->SetFont('Times','B',9);
            if($resultProp["valor_inmueble"]=="NO APLICA"){
                $pdf->cell(0,4,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(0,4,''.$resultProp["valor_inmueble"].'',1,0,'C');
            }
        //DATOS DE COLINDANTES SEGUN DOCUMENTO
            $pdf->SetY(118);
            $pdf->SetX(19);
            $pdf->cell(0,4,utf8_decode('DATOS DE COLINDANTES SEGÚN DOCUMENTO'),1,0,'C');
            $pdf->SetY(122);
            $pdf->SetX(19);
            $pdf->SetFont('Times','B',9);
            $pdf->cell(35,4,'Puntos Cardinales',1,0,'C');
            $pdf->SetY(122);
            $pdf->SetX(54);
            $pdf->cell(113,4,'Alinderado',1,0,'C');
            $pdf->SetY(122);
            $pdf->SetX(167);
            $pdf->cell(0,4,'Medida (m)',1,0,'C');
            $pdf->SetY(126);
            $pdf->SetX(19);
            if($resultLindDoc["norte"]!="N/A"){
                $pdf->cell(35,6,'NORTE',1,0,'C');
            }elseif($resultLindDoc["norte"]=="N/A"){
                $pdf->cell(35,6,'NORESTE',1,0,'C');
            }
            $pdf->SetY(126);
            $pdf->SetX(54);
            $pdf->SetFont('Times','B',8);
            $pdf->cell(0,6,'',1,0,'C');
            $pdf->SetY(126);
            $pdf->SetX(54);
            $pdf->Multicell(113,3,utf8_decode(''.$resultLindDoc["alind_n"].''),0,'C');//106 caracteres
            $pdf->SetY(126);
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
            $pdf->SetY(132);
            $pdf->SetX(19);
            if($resultLindDoc["sur"]!="nada"){
                $pdf->cell(35,6,'SUR',1,0,'C');
            }
            if($resultLindDoc["sur"]=="nada"){
                $pdf->cell(35,6,'SURESTE',1,0,'C');
            }
            $pdf->SetY(132);
            $pdf->SetX(54);
            $pdf->cell(113,6,'',1,0,'C');
            $pdf->SetY(132);
            $pdf->SetX(54);
            $pdf->SetFont('Times','B',8);
            $pdf->Multicell(113,3,utf8_decode(''.$resultLindDoc["alind_s"].''),0,'C');
            $pdf->SetY(132);
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
            
            $pdf->SetY(138);
            $pdf->SetX(19);
            if($resultLindDoc["este"]!="nada"){
                $pdf->cell(35,6,'ESTE',1,0,'C');
            }
            if($resultLindDoc["este"]=="nada"){
                $pdf->cell(35,6,'SUROESTE',1,0,'C');
            }
            $pdf->SetY(138);
            $pdf->SetX(54);
            $pdf->cell(113,6,utf8_decode(''),1,0,'C');
            $pdf->SetY(138);
            $pdf->SetX(54);
            $pdf->SetFont('Times','B',8);
            $pdf->Multicell(113,3,utf8_decode(''.$resultLindDoc["alind_e"].''),0,'C');
            $pdf->SetY(138);
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
            
            $pdf->SetY(144);
            $pdf->SetX(19);
            if($resultLindDoc["oeste"]!="nada"){
                $pdf->cell(35,6,'OESTE',1,0,'C');
            }
            if($resultLindDoc["oeste"]=="nada"){
                $pdf->cell(35,6,'NOROESTE',1,0,'C');
            }
            $pdf->SetY(144);
            $pdf->SetX(54);
            $pdf->cell(113,6,utf8_decode(''),1,0,'C');
            $pdf->SetY(144);
            $pdf->SetX(54);
            $pdf->SetFont('Times','B',8);
            $pdf->Multicell(113,3,utf8_decode(''.$resultLindDoc["alind_o"].''),0,'C');
            $pdf->SetY(144);
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
        //DATOS DE COLINDANTES (POSIBLE VENTA)
            $pdf->SetY(150);
            $pdf->SetX(19);
            $pdf->cell(0,4,utf8_decode('DATOS DE COLINDANTES (POSIBLE VENTA)'),1,0,'C');
            $pdf->SetY(154);
            $pdf->SetX(19);
            $pdf->cell(35,4,'Puntos Cardinales',1,0,'C');
            $pdf->SetY(154);
            $pdf->SetX(54);
            $pdf->cell(113,4,'Alinderado',1,0,'C');
            $pdf->SetY(154);
            $pdf->SetX(167);
            $pdf->cell(0,4,'Medida (m)',1,0,'C');
            $pdf->SetY(158);
            $pdf->SetX(19);
            if($resultPosVenta["norte"]!="nada"){
                $pdf->cell(35,6,'NORTE',1,0,'C');
            }
            if($resultPosVenta["norte"]=="nada"){
                $pdf->cell(35,6,'NORESTE',1,0,'C');
            }
            $pdf->SetY(158);
            $pdf->SetX(54);
            $pdf->cell(113,6,'',1,0,'C');
            $pdf->SetY(158);
            $pdf->SetX(54);
            $pdf->SetFont('Times','B',8);
            $pdf->Multicell(113,3,utf8_decode(''.$resultPosVenta["alind_n"].''),0,'C');
            $pdf->SetY(158);
            $pdf->SetX(167);
            $pdf->SetFont('Times','B',9);
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
            
            $pdf->SetY(164);
            $pdf->SetX(19);
            if($resultPosVenta["sur"]!="nada"){
                $pdf->cell(35,6,'SUR',1,0,'C');
            }
            if($resultPosVenta["sur"]=="nada"){
                $pdf->cell(35,6,'SURESTE',1,0,'C');
            }
            $pdf->SetY(164);
            $pdf->SetX(54);
            $pdf->cell(113,6,'',1,0,'C');
            $pdf->SetY(164);
            $pdf->SetX(54);
            $pdf->SetFont('Times','B',8);
            $pdf->Multicell(113,3,utf8_decode(''.$resultPosVenta["alind_s"].''),0,'C');
            $pdf->SetY(164);
            $pdf->SetX(167);
            $pdf->SetFont('Times','B',9);
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
            $pdf->SetY(170);
            $pdf->SetX(19);
            if($resultPosVenta["este"]!="nada"){
                $pdf->cell(35,6,'ESTE',1,0,'C');
            }
            if($resultPosVenta["este"]=="nada"){
                $pdf->cell(35,6,'SUROESTE',1,0,'C');
            }
            $pdf->SetY(170);
            $pdf->SetX(54);
            $pdf->cell(113,6,utf8_decode(''),1,'C');
            $pdf->SetY(170);
            $pdf->SetX(54);
            $pdf->SetFont('Times','B',8);
            $pdf->Multicell(113,3,utf8_decode(''.$resultPosVenta["alind_e"].''),0,'C');
            $pdf->SetY(170);
            $pdf->SetX(167);
            $pdf->SetFont('Times','B',9);
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
            
            $pdf->SetY(176);
            $pdf->SetX(19);
            if($resultPosVenta["oeste"]!="nada"){
                $pdf->cell(35,6,'OESTE',1,0,'C');
            }
            if($resultPosVenta["oeste"]=="nada"){
                $pdf->cell(35,6,'NOROESTE',1,0,'C');
            }
            $pdf->SetY(176);
            $pdf->SetX(54);
            $pdf->cell(113,6,utf8_decode(''),1,'C');
            $pdf->SetY(176);
            $pdf->SetX(54);
            $pdf->SetFont('Times','B',8);
            $pdf->Multicell(113,3,utf8_decode(''.$resultPosVenta["alind_o"].''),0,'C');
            $pdf->SetY(176);
            $pdf->SetX(167);
            $pdf->SetFont('Times','B',9);
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
            
            $pdf->SetY(182);    
            $pdf->SetX(19);
            $pdf->cell(35,4,'Area de Terreno',1,0,'C');
            $pdf->SetY(182);    
            $pdf->SetX(54);
            if($resultPosVenta["areaTotal"]=="NO APLICA"){
                $pdf->cell(25,4,'NO APLICA',1,0,'C');
            }else{
                if($resultPosVenta["uniAreaT"]=="N/A"){
                    $pdf->cell(25,4,'NO APLICA',1,0,'C');
                }else{
                    $pdf->cell(25,4,''.$resultPosVenta["areaTotal"].' '.$resultPosVenta["uniAreaT"].'',1,0,'C');
                }
            }
            $pdf->SetY(182);    
            $pdf->SetX(79);
            $pdf->cell(35,4,utf8_decode('Niveles de Construcción'),1,0,'C');
            $pdf->SetY(182);    
            $pdf->SetX(114);
            if($resultPosVenta["nivelesConst"]=="NO APLICA"){
                $pdf->cell(35,4,'NO APLICA',1,0,'C');
            }else{
                $pdf->cell(35,4,''.$resultPosVenta["nivelesConst"].'',1,0,'C');
            }
            $pdf->SetY(182);    
            $pdf->SetX(149);
            $pdf->cell(31,4,utf8_decode('Area de Construcción'),1,0,'C');
            $pdf->SetY(182);    
            $pdf->SetX(180);
            if($resultPosVenta["areaConst"]=="NO APLICA"){
                $pdf->cell(0,4,'NO APLICA',1,0,'C');
            }else{
                if($resultPosVenta["uniAreaC"]=="N/A"){
                    $pdf->cell(0,4,'NO APLICA',1,0,'C');
                }else{
                    $pdf->cell(0,4,''.$resultPosVenta["areaConst"].' '.$resultPosVenta["uniAreaC"].'',1,0,'C');
                }
            }
        //PARTE 6
            $pdf->SetY(186);    
            $pdf->SetX(19);
            $pdf->cell(60,7,utf8_decode('Dirección del Inmueble'),1,0,'C');
            $pdf->SetY(186);    
            $pdf->SetX(79);
            $pdf->cell(0,7,'',1,0,'C');
            $pdf->SetY(187);    
            $pdf->SetX(79);
            $pdf->SetFont('Times','B',8);
            $pdf->Multicell(0,3,''.utf8_decode($resultInmueDe["direccion"]).'',0,'C'); //114 carac
            $pdf->SetY(193);    
            $pdf->SetX(19);
            $pdf->SetFont('Times','B',9);
            $pdf->cell(60,4,utf8_decode('Régimen de la Propiedad'),1,0,'C');
            $pdf->SetY(193);    
            $pdf->SetX(79);
            $pdf->cell(0,4,''.$resultConst["Regimen"].'',1,0,'C');
            $pdf->SetY(197);    
            $pdf->SetX(19);
            $pdf->cell(60,4,'Uso del Inmueble',1,0,'C');
            $pdf->SetY(197);    
            $pdf->SetX(79);
            $pdf->cell(0,4,''.$mostcarastInmue["uso"].'',1,0,'C');
            $pdf->SetY(201);    
            $pdf->SetX(19);
            $pdf->cell(60,4,'Valor Estimado del Inmueble',1,0,'C');
            $pdf->SetY(201);    
            $pdf->SetX(79);
            $pdf->cell(0,4,''.$busExpedienteRes["valorInmue"].'',1,0,'C');
        //SERVICIOS 1
            $pdf->SetY(205);    
            $pdf->SetX(19);
            $pdf->cell(20,19,'Servicios',1,0,'C');
            $pdf->SetY(205);    
            $pdf->SetX(39);
            $pdf->cell(0,19,'',1,0,'C');
            $pdf->SetY(205.5);    
            $pdf->SetX(42);
            $pdf->cell(30,4,'Acueducto',0,0,'L');
            $pdf->SetY(206);    
            $pdf->SetX(72);
            if($resultServ["acued"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(209.5);    
            $pdf->SetX(42);
            $pdf->cell(30,4,'Acueducto Rural',0,0,'L');
            $pdf->SetY(210);    
            $pdf->SetX(72);
            if($resultServ["acuedRural"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(214);    
            $pdf->SetX(42);
            $pdf->cell(30,4,utf8_decode('Aguas Subterráneas'),0,0,'L');
            $pdf->SetY(214);    
            $pdf->SetX(72);
            if($resultServ["aguasSubter"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(218);    
            $pdf->SetX(42);
            $pdf->cell(30,4,'Aguas Servidas',0,0,'L');
            $pdf->SetY(218);    
            $pdf->SetX(72);
            if($resultServ["aguasServ"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
        //SERVICIOS 2
            $pdf->SetY(205.5);    
            $pdf->SetX(78);
            $pdf->cell(30,4,'Pavimento Flexible',0,0,'L');
            $pdf->SetY(206);    
            $pdf->SetX(108);
            if($resultServ["pavimentoFlex"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(209.5);    
            $pdf->SetX(78);
            $pdf->cell(30,4,'Pavimento Rigido',0,0,'L');
            $pdf->SetY(210);    
            $pdf->SetX(108);
            if($resultServ["pavimentoRig"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(214);    
            $pdf->SetX(78);
            $pdf->cell(30,4,utf8_decode('Vía Engranzonada'),0,0,'L');
            $pdf->SetY(214);    
            $pdf->SetX(108);
            if($resultServ["viaEngran"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(218);    
            $pdf->SetX(78);
            $pdf->cell(30,4,'Acera',0,0,'L');
            $pdf->SetY(218);    
            $pdf->SetX(108);
            if($resultServ["acera"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
        //SERVICIOS 3
            $pdf->SetY(205.5);    
            $pdf->SetX(114);
            $pdf->cell(30,4,utf8_decode('Alumbrado Público'),0,0,'L');
            $pdf->SetY(206);    
            $pdf->SetX(144);
            if($resultServ["alumbradoPub"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(209.5);    
            $pdf->SetX(114);
            $pdf->cell(30,4,'Aseo',0,0,'L');
            $pdf->SetY(210);    
            $pdf->SetX(144);
            if($resultServ["aseo"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(214);    
            $pdf->SetX(114);
            $pdf->cell(30,4,utf8_decode('Transporte Público'),0,0,'L');
            $pdf->SetY(214);    
            $pdf->SetX(144);
            if($resultServ["transportePublic"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(218);    
            $pdf->SetX(114);
            $pdf->cell(30,4,utf8_decode('Pozo Séptico'),0,0,'L');
            $pdf->SetY(218);    
            $pdf->SetX(144);
            if($resultServ["pozoSept"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
        //SERVICIOS 4
            $pdf->SetY(205.5);    
            $pdf->SetX(150);
            $pdf->cell(30,6,'Electricidad Residencial',0,0,'L');
            $pdf->SetY(206);    
            $pdf->SetX(188);
            if($resultServ["electriResi"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(210);    
            $pdf->SetX(150);
            $pdf->cell(30,4,'Electricidad Industrial',0,0,'L');
            $pdf->SetY(210);    
            $pdf->SetX(188);
            if($resultServ["electriIndus"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
            $pdf->SetY(214);    
            $pdf->SetX(150);
            $pdf->cell(30,4,utf8_decode('Línea Telefónica'),0,0,'L');
            $pdf->SetY(214);    
            $pdf->SetX(188);
            if($resultServ["lineaTelef"]=="si"){
                $pdf->cell(4,4,'',1,0,'L',true);
            }else{
                $pdf->cell(4,4,'',1,0,'L');
            }
        //CARACTERISTICAS DEL TERRENO
            $pdf->SetY(224);    
            $pdf->SetX(19);
            $pdf->cell(107,4,'Caracteristicas del Terreno',1,0,'C');
            //TOPOGRAFIA
                $pdf->SetY(228);    
                $pdf->SetX(19);
                $pdf->cell(37,4,utf8_decode('Topografía'),1,0,'C');
                $pdf->SetY(232);    
                $pdf->SetX(19);
                $pdf->cell(37,10,'',1,0,'C');
                $pdf->SetY(233);    
                $pdf->SetX(16);
                $pdf->cell(30,4,'Terreno Llano',0,0,'C');
                $pdf->SetY(233);    
                $pdf->SetX(50);
                if($mostcarastInmue["topografia"]=="Terreno Llano"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(237);    
                $pdf->SetX(19);
                $pdf->cell(30,4,'Terreno Quebrado',0,0,'C');
                $pdf->SetY(237);    
                $pdf->SetX(50);
                if($mostcarastInmue["topografia"]=="Terreno Quebrado"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
            //FORMA
                $pdf->SetY(242);    
                $pdf->SetX(19);
                $pdf->cell(37,4,'Forma',1,0,'C');
                $pdf->SetY(246);    
                $pdf->SetX(19);
                $pdf->cell(37,11,'',1,0,'C');
                $pdf->SetY(246);    
                $pdf->SetX(20);
                $pdf->cell(30,4,'Regular',0,'C');
                $pdf->SetY(247);    
                $pdf->SetX(50);
                if($mostcarastInmue["forma"]=="Regular"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(251);    
                $pdf->SetX(20);
                $pdf->cell(30,4,'Irregular',0,'C');
                $pdf->SetY(251);    
                $pdf->SetX(50);
                if($mostcarastInmue["forma"]=="Irregular"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
            //USO
                $pdf->SetY(228);    
                $pdf->SetX(56);
                $pdf->cell(40,4,'Uso',1,0,'C');
                $pdf->SetY(232);    
                $pdf->SetX(56);
                $pdf->cell(40,25,'',1,0,'C');
                $pdf->SetY(233);    
                $pdf->SetX(56);
                $pdf->cell(30,4,'Residencial',0,0,'L');
                $pdf->SetY(233);    
                $pdf->SetX(91);
                if($mostcarastInmue["uso"]=="Residencial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(237);    
                $pdf->SetX(56);
                $pdf->cell(30,4,'Comercial',0,0,'L');
                $pdf->SetY(237);    
                $pdf->SetX(91);
                if($mostcarastInmue["uso"]=="Comercial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(241);    
                $pdf->SetX(56);
                $pdf->cell(30,4,'Residencial-Comercial',0,0,'L');
                $pdf->SetY(241);    
                $pdf->SetX(91);
                if($mostcarastInmue["uso"]=="Residencial-Comercial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(245);    
                $pdf->SetX(56);
                $pdf->cell(30,4,'Industrial',0,0,'L');
                $pdf->SetY(245);    
                $pdf->SetX(91);
                if($mostcarastInmue["uso"]=="Industrial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(249);    
                $pdf->SetX(56);
                $pdf->cell(30,4,utf8_decode('Espacios Públicos'),0,0,'L');
                $pdf->SetY(249);    
                $pdf->SetX(91);
                if($mostcarastInmue["uso"]=="Espacios-Publicos"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(253);    
                $pdf->SetX(56);
                $pdf->cell(30,4,'Rural',0,0,'L');
                $pdf->SetY(253);    
                $pdf->SetX(91);
                if($mostcarastInmue["uso"]=="Rural"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
            //TENENCIA
               $pdf->SetY(228);    
                $pdf->SetX(96);
                $pdf->cell(30,4,'Tenencia',1,0,'C');
                $pdf->SetY(232);    
                $pdf->SetX(96);
                $pdf->cell(30,37,'',1,0,'C');
                $pdf->SetY(257);    
                $pdf->SetX(19);
                $pdf->cell(27,4,'Observaciones:',0,0,'L');
                $pdf->SetY(260);    
                $pdf->SetX(20);
                $pdf->Cell(27,4,$resultConst["observ"],0,0,'L');
                $pdf->SetY(257);    
                $pdf->SetX(19);
                $pdf->cell(77,12,'',1,0,'L');// CUADRO DE OBSERVACIONES
                $pdf->SetY(233);    
                $pdf->SetX(96);
                $pdf->cell(25,4,'Municipio',0,0,'L');
                $pdf->SetY(233);    
                $pdf->SetX(116);
                if($mostcarastInmue["tenencia"]=="Municipio"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(237);    
                $pdf->SetX(96);
                $pdf->cell(25,4,'Comunidad',0,0,'L');
                $pdf->SetY(237);    
                $pdf->SetX(116);
                if($mostcarastInmue["tenencia"]=="Comunidad"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(241);    
                $pdf->SetX(96);
                $pdf->cell(25,4,'INTU',0,0,'L');
                $pdf->SetY(241);    
                $pdf->SetX(116);
                if($mostcarastInmue["tenencia"]=="INTU"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(245);    
                $pdf->SetX(96);
                $pdf->cell(25,4,'INTI',0,0,'L');
                $pdf->SetY(245);    
                $pdf->SetX(116);
                if($mostcarastInmue["tenencia"]=="INTI"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(249);    
                $pdf->SetX(96);
                $pdf->cell(25,4,'Propio',0,0,'L');
                $pdf->SetY(249);    
                $pdf->SetX(116);
                if($mostcarastInmue["tenencia"]=="Propio"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(253);    
                $pdf->SetX(96);
                $pdf->cell(25,4,'Enfiteusis',0,0,'L');
                $pdf->SetY(253);    
                $pdf->SetX(116);
                if($mostcarastInmue["tenencia"]=="Enfiteusis"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(257);    
                $pdf->SetX(96);
                $pdf->cell(25,4,'Ocupado',0,0,'L');
                $pdf->SetY(257);    
                $pdf->SetX(116);
                if($mostcarastInmue["tenencia"]=="Ocupado"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(261);    
                $pdf->SetX(96);
                $pdf->cell(25,4,'Otros',0,0,'L');
                $pdf->SetY(261);    
                $pdf->SetX(116);
                if($mostcarastInmue["tenencia"]=="Otros"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
        //CARACTERISTICAS DE LA CONSTRUCCION
                $pdf->SetY(224);    
                $pdf->SetX(126);
                $pdf->cell(0,4,utf8_decode('Caracteristicas del Construcción'),1,0,'C');
                $pdf->SetY(228);    
                $pdf->SetX(126);
                $pdf->cell(34,41,'',1,0,'C');
            //TIPOS DE CONSTRUCCION
                $pdf->SetY(228);    
                $pdf->SetX(126);
                $pdf->cell(34,4,utf8_decode('Tipo de Construcción'),1,0,'C');
                $pdf->SetY(233);    
                $pdf->SetX(126);
                $pdf->cell(4,4,'Concreto',0,0,'L');
                $pdf->SetY(233);    
                $pdf->SetX(155);
                if($resulCaracInmue["estructura"]=="Concreto"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(237);    
                $pdf->SetX(126);
                $pdf->cell(4,4,'Acero',0,0,'L');
                $pdf->SetY(237);    
                $pdf->SetX(155);
                if($resulCaracInmue["estructura"]=="Acero"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(241);    
                $pdf->SetX(126);
                $pdf->cell(4,4,'Concreto-Acero',0,0,'L');
                $pdf->SetY(241);    
                $pdf->SetX(155);
                if($resulCaracInmue["estructura"]=="Concreto-Acero"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(245);    
                $pdf->SetX(126);
                $pdf->cell(4,4,'Paredes Portantes',0,0,'L');
                $pdf->SetY(245);    
                $pdf->SetX(155);
                if($resulCaracInmue["estructura"]=="Paredes-Portantes"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(249);    
                $pdf->SetX(126);
                $pdf->cell(4,4,'Madera',0,0,'L');
                $pdf->SetY(249);    
                $pdf->SetX(155);
                if($resulCaracInmue["estructura"]=="Madera"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(253);    
                $pdf->SetX(126);
                $pdf->cell(4,4,'Prefabricado',0,0,'L');
                $pdf->SetY(253);    
                $pdf->SetX(155);
                if($resulCaracInmue["estructura"]=="Prefabricado"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(257);    
                $pdf->SetX(126);
                $pdf->cell(4,4,'Otros',0,0,'L');
                $pdf->SetY(257);    
                $pdf->SetX(155);
                if($resulCaracInmue["estructura"]=="Otros"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
            //DESTINO DE LA EDIFICACION
                $pdf->SetY(228);    
                $pdf->SetX(160);
                $pdf->cell(0,4,utf8_decode('Destino de la Edificación'),1,0,'C');
                $pdf->SetY(232);    
                $pdf->SetX(160);
                $pdf->cell(0,37,'',1,0,'C');
                $pdf->SetY(233);    
                $pdf->SetX(160);
                $pdf->cell(4,4,'Unifamiliar',0,0,'L');
                $pdf->SetY(233);    
                $pdf->SetX(188);
                if($resulCaracInmue["destino"]=="Unifamiliar"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(237);    
                $pdf->SetX(160);
                $pdf->cell(4,4,'Bifamiliar',0,0,'L');
                $pdf->SetY(237);    
                $pdf->SetX(188);
                if($resulCaracInmue["destino"]=="Bifamiliar"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(241);    
                $pdf->SetX(160);
                $pdf->cell(4,4,'Multifamiliar',0,0,'L');
                $pdf->SetY(241);    
                $pdf->SetX(188);
                if($resulCaracInmue["destino"]=="Multifamiliar"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(245);    
                $pdf->SetX(160);
                $pdf->cell(4,4,'Comercial',0,0,'L');
                $pdf->SetY(245);    
                $pdf->SetX(188);
                if($resulCaracInmue["destino"]=="Comercial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(249);    
                $pdf->SetX(160);
                $pdf->cell(4,4,'Industrial',0,0,'L');
                $pdf->SetY(249);    
                $pdf->SetX(188);
                if($resulCaracInmue["destino"]=="Industrial"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(253);    
                $pdf->SetX(160);
                $pdf->cell(4,4,'Hotel-Posada',0,0,'L');
                $pdf->SetY(253);    
                $pdf->SetX(188);
                if($resulCaracInmue["destino"]=="Hotel-Posada"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(257);    
                $pdf->SetX(160);
                $pdf->cell(4,4,utf8_decode('Institución Pública'),0,0,'L');
                $pdf->SetY(257);    
                $pdf->SetX(188);
                if($resulCaracInmue["destino"]=="Institución Pública"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
                $pdf->SetY(261);    
                $pdf->SetX(160);
                $pdf->cell(4,4,utf8_decode('Espacios Públicos'),0,0,'L');
                $pdf->SetY(261);    
                $pdf->SetX(188);
                if($resulCaracInmue["destino"]=="Espacios Públicos"){
                    $pdf->cell(4,4,'',1,0,'L',true);
                }else{
                    $pdf->cell(4,4,'',1,0,'L');
                }
        //REDACCION
            $pdf->SetY(270);    
            $pdf->SetX(21);
            $pdf->SetFont('Times','B',9);
            $pdf->cell(50,4,utf8_decode('REDACCIÓN:'),0,'C');
            $pdf->SetY(270);    
            $pdf->SetX(44);
            $pdf->SetFont('Times','',9);
            $pdf->cell(50,4,utf8_decode(''.$idUser["nombre"].' '.$idUser["apellido"].''),0,'C');
            $pdf->SetY(274);    
            $pdf->SetX(21);
            $pdf->SetFont('Times','B',9);
            $pdf->Cell(100,4,'OBSERVACIONES:',0,'C');
            $pdf->SetY(274);    
            $pdf->SetX(51);
            $pdf->SetFont('Times','',9);
            $pdf->Cell(82,4,'Actualmente El (I.G.V.S.B) Y El,',0,'J');
            $pdf->SetY(278);    
            $pdf->SetX(21);
            $pdf->MultiCell(75,4,utf8_decode('(I.A.M.O.T.F.F) Están Realizando El Trabajo De Actualización De La Nomenclatura De Los Inmuebles Del Municipio Fernández Feo.'),0,'J');
            $pdf->SetY(293);    
            $pdf->SetX(21);
            $pdf->SetFont('Times','B',9);
            $pdf->Cell(80,4,'NOTA:',0,'C');
            $pdf->SetY(293);    
            $pdf->SetX(34);
            $pdf->SetFont('Times','',9);
            $pdf->Cell(80,4,'Constancia que se expide a solicitud de parte',0,'J');
            $pdf->SetY(297);    
            $pdf->SetX(21);
            $pdf->SetFont('Times','',9);
            $pdf->MultiCell(75,4,utf8_decode('interesada para fines legales en la fecha antes descrita,'),0,'J');
            $pdf->SetY(301);    
            $pdf->SetX(21);
            $pdf->SetFont('Times','B',9);
            $pdf->MultiCell(114,4,utf8_decode('La presente tiene vigencia para el año fiscal en curso. '),0,'J');
        //FIRMA
            $pdf->SetY(286);    
                $pdf->SetX(115);
                $pdf->SetDrawColor(0,0,0,0);
                $pdf->SetFont('Times','B',8);
                $pdf->SetLineWidth(0.5);
                $pdf->MultiCell(70,4,utf8_decode('ING. ANA GABRIELA GARCIA HERNANDEZ PRESIDENTE DEL INSTITUTO AUTONOMO MUNICIPAL DE ORDENAMIENTO TERRITORIAL DEL MUNICIPIO FERNANDEZ FEO (I.A.M.O.T.F.F.) SEGÚN RESOLUCIÓN NRO. ABSMFF/2020-080 BAJO GACETA MUNICIPAL N° 242
                '),'T:1','C');
        $carpeta ='../../../assets/constancias/'.date("Y").'';
        if(!file_exists($carpeta)){
            mkdir($carpeta,777,true);
            $pdf->Output('F','../../../../assets/constancias/'.date("Y").'/'.$busExpedienteRes["n_expediente"].'.pdf');
        }else{
            $pdf->Output('F','../../../assets/constancias/'.date("Y").'/'.$busExpedienteRes["n_expediente"].'.pdf');
        }
        echo'
        <input type="hidden" id="rutaPdf" value="./assets/constancias/'.date("Y").'/'.$busExpedienteRes["n_expediente"].'.pdf" />
        <input type="hidden" id="numExp" value="'.$busExpedienteRes["n_expediente"].'">';
    }
}
?>