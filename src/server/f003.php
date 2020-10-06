<?php
require('../../lib/fpdf/fpdf.php');
class PDF3 extends FPDF
{
    // Cabecera de página
    function Header(){
        // Logos
        $this->Image('../../../assets/logo.jpg',15,3,34);
        $this->Image('../../../assets/escudo.jpg',295,3,34);
        $this->Image('../../../assets/fondoCabecera.jpg',55,3,235,30);
        // Arial bold 15
        $this->SetFont('Times','B',10);
        // Título
        $this->SetY(3);
        $this->SetX(131);
        $this->Cell(30,10,'REPUBLICA BOLIVARIANA DE VENEZUELA',0,'C');
        $this->SetY(8);
        $this->SetX(137);
        $this->Cell(30,10,'INSTITUTO AUTONOMO MUNICIPAL ',0,'C');
        $this->SetY(13);
        $this->SetX(138);
        $this->Cell(30,10,'DE ORDENAMIENTO TERRITORIAL',0,'C');
        $this->SetY(20);
        $this->SetX(129);
        $this->Cell(65,6,'MUNICIPIO FERNANDEZ FEO - EDO. TACHIRA',0,'C');
        $this->SetY(23);
        $this->SetX(154);
        $this->Cell(30,10,'RIF: G200129891',0,'C');
        // Salto de línea
        $this->Ln(20);
    }

    // Pie de página
    function Footer(){
        // Posición: a 1,5 cm del final
        $this->SetFont('Arial','B',10);
        $this->Image('../../../assets/fondoFooter.jpg',18,180,314,24);
        $this->SetY(185);    
        $this->SetX(95);
        $this->MultiCell(140,4,utf8_decode('PIÑAL, CALLE 3 ENTRE CARRERAS 3 Y 4, 
            PALACIO MUNICIPAL, MUNICIPIO FERNANDEZ FEO '.utf8_encode('-').' ESTADO TACHIRA IAMOTFF@GMAIL.COM'),0,'C');
        // Arial italic 8
        
        
    }
}
class report{
    
        var $campReport = "";

    function imprimir(){
        // Creación del objeto de la clase heredada
            $pdf = new PDF3('L','mm',array(215.9,355.6));
            $pdf->SetMargins(20,0,22);
            $pdf->AliasNbPages();
            $pdf->AddPage();

        include('../conexion.php');
        session_start();
        $MySql = new conexion;
        $link= $MySql->conectar();
        

        if($this->campReport=="usuarios"){
                $pdf->SetFont('Times','B',9);
            $userConstSql = "SELECT * FROM constancias ORDER BY fk_redactor";
            $resUserConst = $link->query($userConstSql);
            $y =67;
            $c;
            $userConstRes=0;
            while ($userConstRes = $resUserConst->fetch_array()) {
                $pdf->SetY($y);
                $pdf->SetX(12);
                $pdf->Cell(16,15,utf8_decode($c+=1),1,0,'C');
                $nExpedientSQL = "SELECT * FROM expediente where n_expediente=".$userConstRes["fk_expedi"]."";
                $resNExpediente = $link->query($nExpedientSQL);
                $nExpedienteRes = $resNExpediente->fetch_array();
                $idRedactor = $userConstRes["fk_redactor"];
                if($nExpedienteRes!=0){
                    $numExp = $nExpedienteRes["n_expediente"];
                    $idExp = $nExpedienteRes["id"];
                    $tipo = "normal";
                    $propietario = $nExpedienteRes["fk_propietario"];
                }else{
                    $nExpeEmpadroSQL = "SELECT * FROM expempadro where n_expediente=".$userConstRes["fk_expedi"]."";
                    $resNEmpadro = $link->query($nExpeEmpadroSQL);
                    $nEmpadroRes = $resNEmpadro->fetch_array();
                    $numExp = $nEmpadroRes["n_expediente"];
                    $idExp = $nEmpadroRes["id"];
                    $propietario = $nEmpadroRes["fk_propietario"];
                    $tipo = "EMPADRONAMIENTO";
                }
                $propirSQL = "SELECT * FROM propietarios where id=".$propietario."";
                $resPropir = $link->query($propirSQL);
                $propirRes = $resPropir->fetch_array();
                $pdf->SetY($y);
                $pdf->SetX(28);
                $pdf->Cell(21,15,utf8_decode($numExp),1,0,'C');
                $pdf->SetY($y);
                $pdf->SetX(49);
                $pdf->MultiCell(80,15,utf8_decode($propirRes["nombre"].' '.$userConstRes["apellido"]),1,'C');
                $pdf->SetY($y);
                $pdf->SetX(129);
                $pdf->MultiCell(30,15,utf8_decode($propirRes["cedula"]),1,'C');
                $pdf->SetY($y);
                $pdf->SetX(159);
                $pdf->Cell(110,15,utf8_decode($propirRes["dir_hab"]),1,'L');
                $pagosSQL = "SELECT * FROM pagos where fk_expedient=".$idExp." AND tipo='".$tipo."'";
                $resPagosConst = $link->query($pagosSQL);
                $pagosConstRes = $resPagosConst->fetch_array();
                $pdf->SetY($y);
                $pdf->SetX(269);
                $pdf->Cell(26,15,utf8_decode($pagosConstRes["fechaPagos"]),1,0,'C');
                $redactSQL = "SELECT * FROM usuarios where id=".$idRedactor."";
                $resRedact = $link->query($redactSQL);
                $redactRes = $resRedact->fetch_array();
                $pdf->SetY($y);
                $pdf->SetX(295);
                $pdf->Cell(50,15,utf8_decode($redactRes["nombre"].' '.$redactRes["apellido"]),1,0,'C');
                $y+=15;
            }
            $pdf->SetFont('Times','B',11);
            $pdf->SetY(50);
            $pdf->SetX(140);
            $pdf->Cell(10,10,'REPORTE POR USUARIO');
            $pdf->SetY(60);
            $pdf->SetX(12);
            $pdf->Cell(16,7,utf8_decode('Nº'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(28);
            $pdf->Cell(21,7,utf8_decode('Expediente'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(49);
            $pdf->Cell(80,7,utf8_decode('Nombre'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(129);
            $pdf->Cell(30,7,utf8_decode('Cedula'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(159);
            $pdf->Cell(110,7,utf8_decode('Direccion'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(269);
            $pdf->Cell(26,7,utf8_decode('Pago'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(295);
            $pdf->Cell(50,7,utf8_decode('Redactor'),1,0,'C');
        }
        if($this->campReport=="parroquia"){
            $pdf->SetFont('Times','B',9);
            $userConstSql = "SELECT * FROM inmueble ORDER BY parroquia";
            $resUserConst = $link->query($userConstSql);
            $y =67;
            $c;
            $userConstRes=0;
            while ($userConstRes = $resUserConst->fetch_array()) {
                $pdf->SetY($y);
                $pdf->SetX(12);
                $pdf->Cell(16,15,utf8_decode($c+=1),1,0,'C');
                $nExpedientSQL = "SELECT * FROM expediente where fk_inmueble=".$userConstRes["id"]."";
                $resNExpediente = $link->query($nExpedientSQL);
                $nExpedienteRes = $resNExpediente->fetch_array();
                $idRedactor = $userConstRes["fk_redactor"];
                if($nExpedienteRes!=0){
                    $numExp = $nExpedienteRes["n_expediente"];
                    $idExp = $nExpedienteRes["id"];
                    $tipo = "normal";
                    $propietario = $nExpedienteRes["fk_propietario"];
                }else{
                    $nExpeEmpadroSQL = "SELECT * FROM expempadro where fk_inmueble=".$userConstRes["id"]."";
                    $resNEmpadro = $link->query($nExpeEmpadroSQL);
                    $nEmpadroRes = $resNEmpadro->fetch_array();
                    $numExp = $nEmpadroRes["n_expediente"];
                    $idExp = $nEmpadroRes["id"];
                    $propietario = $nEmpadroRes["fk_propietario"];
                    $tipo = "EMPADRONAMIENTO";
                }
                $propirSQL = "SELECT * FROM propietarios where id=".$propietario."";
                $resPropir = $link->query($propirSQL);
                $propirRes = $resPropir->fetch_array();
                $pdf->SetY($y);
                $pdf->SetX(28);
                $pdf->Cell(21,15,utf8_decode($numExp),1,0,'C');
                $pdf->SetY($y);
                $pdf->SetX(49);
                $pdf->MultiCell(80,15,utf8_decode($propirRes["nombre"].' '.$userConstRes["apellido"]),1,'C');
                $pdf->SetY($y);
                $pdf->SetX(129);
                $pdf->MultiCell(30,15,utf8_decode($propirRes["cedula"]),1,'C');
                $pdf->SetY($y);
                $pdf->SetX(159);
                $pdf->Cell(110,15,utf8_decode($propirRes["dir_hab"]),1,'L');
                $pagosSQL = "SELECT * FROM pagos where fk_expedient=".$idExp." AND tipo='".$tipo."'";
                $resPagosConst = $link->query($pagosSQL);
                $pagosConstRes = $resPagosConst->fetch_array();
                $pdf->SetY($y);
                $pdf->SetX(269);
                $pdf->Cell(26,15,utf8_decode($pagosConstRes["fechaPagos"]),1,0,'C');
                $pdf->SetY($y);
                $pdf->SetX(295);
                $pdf->Cell(50,15,utf8_decode($userConstRes["parroquia"]),1,0,'C');
                $y+=15;
            }
            $pdf->SetFont('Times','B',11);
            $pdf->SetY(50);
            $pdf->SetX(140);
            $pdf->Cell(10,10,'REPORTE POR USUARIO');
            $pdf->SetY(60);
            $pdf->SetX(12);
            $pdf->Cell(16,7,utf8_decode('Nº'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(28);
            $pdf->Cell(21,7,utf8_decode('Expediente'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(49);
            $pdf->Cell(80,7,utf8_decode('Nombre'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(129);
            $pdf->Cell(30,7,utf8_decode('Cedula'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(159);
            $pdf->Cell(110,7,utf8_decode('Direccion'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(269);
            $pdf->Cell(26,7,utf8_decode('Pago'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(295);
            $pdf->Cell(50,7,utf8_decode('Parroquia'),1,0,'C');
        }
        if($this->campReport=="uso"){
            $pdf->SetFont('Times','B',9);
            $userConstSql = "SELECT * FROM carc_inmueble ORDER BY uso";
            $resUserConst = $link->query($userConstSql);
            $y =67;
            $c;
            $userConstRes=0;
            while ($userConstRes = $resUserConst->fetch_array()) {
                $pdf->SetY($y);
                $pdf->SetX(12);
                $pdf->Cell(16,15,utf8_decode($c+=1),1,0,'C');
                $caracInmueSQL = "SELECT * FROM inmueble where fk_carac_inmuebles=".$userConstRes["id"]."";
                $resCarcInmue = $link->query($caracInmueSQL);
                $carcInmueRes = $resCarcInmue->fetch_array();

                $nExpedientSQL = "SELECT * FROM expediente where fk_inmueble=".$carcInmueRes["id"]."";
                $resNExpediente = $link->query($nExpedientSQL);
                $nExpedienteRes = $resNExpediente->fetch_array();
                if($nExpedienteRes!=0){
                    $numExp = $nExpedienteRes["n_expediente"];
                    $idExp = $nExpedienteRes["id"];
                    $tipo = "normal";
                    $propietario = $nExpedienteRes["fk_propietario"];
                }else{
                    $nExpeEmpadroSQL = "SELECT * FROM expempadro where fk_inmueble=".$carcInmueRes["id"]."";
                    $resNEmpadro = $link->query($nExpeEmpadroSQL);
                    $nEmpadroRes = $resNEmpadro->fetch_array();
                    $numExp = $nEmpadroRes["n_expediente"];
                    $idExp = $nEmpadroRes["id"];
                    $propietario = $nEmpadroRes["fk_propietario"];
                    $tipo = "EMPADRONAMIENTO";
                }
                $propirSQL = "SELECT * FROM propietarios where id=".$propietario."";
                $resPropir = $link->query($propirSQL);
                $propirRes = $resPropir->fetch_array();
                $pdf->SetY($y);
                $pdf->SetX(28);
                $pdf->Cell(21,15,utf8_decode($numExp),1,0,'C');
                $pdf->SetY($y);
                $pdf->SetX(49);
                $pdf->MultiCell(80,15,utf8_decode($propirRes["nombre"].' '.$userConstRes["apellido"]),1,'C');
                $pdf->SetY($y);
                $pdf->SetX(129);
                $pdf->MultiCell(30,15,utf8_decode($propirRes["cedula"]),1,'C');
                $pdf->SetY($y);
                $pdf->SetX(159);
                $pdf->Cell(110,15,utf8_decode($propirRes["dir_hab"]),1,'L');
                $pagosSQL = "SELECT * FROM pagos where fk_expedient=".$idExp." AND tipo='".$tipo."'";
                $resPagosConst = $link->query($pagosSQL);
                $pagosConstRes = $resPagosConst->fetch_array();
                $pdf->SetY($y);
                $pdf->SetX(269);
                $pdf->Cell(26,15,utf8_decode($pagosConstRes["fechaPagos"]),1,0,'C');
                $pdf->SetY($y);
                $pdf->SetX(295);
                $pdf->Cell(50,15,utf8_decode($userConstRes["uso"]),1,0,'C');
                $y+=15;
            }
            $pdf->SetFont('Times','B',11);
            $pdf->SetY(50);
            $pdf->SetX(140);
            $pdf->Cell(10,10,'REPORTE POR USUARIO');
            $pdf->SetY(60);
            $pdf->SetX(12);
            $pdf->Cell(16,7,utf8_decode('Nº'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(28);
            $pdf->Cell(21,7,utf8_decode('Expediente'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(49);
            $pdf->Cell(80,7,utf8_decode('Nombre'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(129);
            $pdf->Cell(30,7,utf8_decode('Cedula'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(159);
            $pdf->Cell(110,7,utf8_decode('Direccion'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(269);
            $pdf->Cell(26,7,utf8_decode('Pago'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(295);
            $pdf->Cell(50,7,utf8_decode('Uso'),1,0,'C');
        }
        if($this->campReport=="ambito"){
            $pdf->SetFont('Times','B',9);
            $userConstSql = "SELECT * FROM inmueble ORDER BY ambito";
            $resUserConst = $link->query($userConstSql);
            $y =67;
            $c;
            $userConstRes=0;
            while ($userConstRes = $resUserConst->fetch_array()) {
                $pdf->SetY($y);
                $pdf->SetX(12);
                $pdf->Cell(16,15,utf8_decode($c+=1),1,0,'C');

                $nExpedientSQL = "SELECT * FROM expediente where fk_inmueble=".$userConstRes["id"]."";
                $resNExpediente = $link->query($nExpedientSQL);
                $nExpedienteRes = $resNExpediente->fetch_array();
                if($nExpedienteRes!=0){
                    $numExp = $nExpedienteRes["n_expediente"];
                    $idExp = $nExpedienteRes["id"];
                    $tipo = "normal";
                    $propietario = $nExpedienteRes["fk_propietario"];
                }else{
                    $nExpeEmpadroSQL = "SELECT * FROM expempadro where fk_inmueble=".$userConstRes["id"]."";
                    $resNEmpadro = $link->query($nExpeEmpadroSQL);
                    $nEmpadroRes = $resNEmpadro->fetch_array();
                    $numExp = $nEmpadroRes["n_expediente"];
                    $idExp = $nEmpadroRes["id"];
                    $propietario = $nEmpadroRes["fk_propietario"];
                    $tipo = "EMPADRONAMIENTO";
                }
                $propirSQL = "SELECT * FROM propietarios where id=".$propietario."";
                $resPropir = $link->query($propirSQL);
                $propirRes = $resPropir->fetch_array();
                $pdf->SetY($y);
                $pdf->SetX(28);
                $pdf->Cell(21,15,utf8_decode($numExp),1,0,'C');
                $pdf->SetY($y);
                $pdf->SetX(49);
                $pdf->MultiCell(80,15,utf8_decode($propirRes["nombre"].' '.$userConstRes["apellido"]),1,'C');
                $pdf->SetY($y);
                $pdf->SetX(129);
                $pdf->MultiCell(30,15,utf8_decode($propirRes["cedula"]),1,'C');
                $pdf->SetY($y);
                $pdf->SetX(159);
                $pdf->Cell(110,15,utf8_decode($propirRes["dir_hab"]),1,'L');
                $pagosSQL = "SELECT * FROM pagos where fk_expedient=".$idExp." AND tipo='".$tipo."'";
                $resPagosConst = $link->query($pagosSQL);
                $pagosConstRes = $resPagosConst->fetch_array();
                $pdf->SetY($y);
                $pdf->SetX(269);
                $pdf->Cell(26,15,utf8_decode($pagosConstRes["fechaPagos"]),1,0,'C');
                $pdf->SetY($y);
                $pdf->SetX(295);
                $pdf->Cell(50,15,utf8_decode($userConstRes["ambito"]),1,0,'C');
                $y+=15;
            }
            $pdf->SetFont('Times','B',11);
            $pdf->SetY(50);
            $pdf->SetX(140);
            $pdf->Cell(10,10,'REPORTE POR USUARIO');
            $pdf->SetY(60);
            $pdf->SetX(12);
            $pdf->Cell(16,7,utf8_decode('Nº'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(28);
            $pdf->Cell(21,7,utf8_decode('Expediente'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(49);
            $pdf->Cell(80,7,utf8_decode('Nombre'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(129);
            $pdf->Cell(30,7,utf8_decode('Cedula'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(159);
            $pdf->Cell(110,7,utf8_decode('Direccion'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(269);
            $pdf->Cell(26,7,utf8_decode('Pago'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(295);
            $pdf->Cell(50,7,utf8_decode('Ambito'),1,0,'C');
        }
        if($this->campReport=="tenencia"){
            $pdf->SetFont('Times','B',9);
            $userConstSql = "SELECT * FROM carc_inmueble ORDER BY tenencia";
            $resUserConst = $link->query($userConstSql);
            $y =67;
            $c;
            $userConstRes=0;
            while ($userConstRes = $resUserConst->fetch_array()) {
                $pdf->SetY($y);
                $pdf->SetX(12);
                $pdf->Cell(16,15,utf8_decode($c+=1),1,0,'C');
                $caracInmueSQL = "SELECT * FROM inmueble where fk_carac_inmuebles=".$userConstRes["id"]."";
                $resCarcInmue = $link->query($caracInmueSQL);
                $carcInmueRes = $resCarcInmue->fetch_array();

                $nExpedientSQL = "SELECT * FROM expediente where fk_inmueble=".$carcInmueRes["id"]."";
                $resNExpediente = $link->query($nExpedientSQL);
                $nExpedienteRes = $resNExpediente->fetch_array();
                if($nExpedienteRes!=0){
                    $numExp = $nExpedienteRes["n_expediente"];
                    $idExp = $nExpedienteRes["id"];
                    $tipo = "normal";
                    $propietario = $nExpedienteRes["fk_propietario"];
                }else{
                    $nExpeEmpadroSQL = "SELECT * FROM expempadro where fk_inmueble=".$carcInmueRes["id"]."";
                    $resNEmpadro = $link->query($nExpeEmpadroSQL);
                    $nEmpadroRes = $resNEmpadro->fetch_array();
                    $numExp = $nEmpadroRes["n_expediente"];
                    $idExp = $nEmpadroRes["id"];
                    $propietario = $nEmpadroRes["fk_propietario"];
                    $tipo = "EMPADRONAMIENTO";
                }
                $propirSQL = "SELECT * FROM propietarios where id=".$propietario."";
                $resPropir = $link->query($propirSQL);
                $propirRes = $resPropir->fetch_array();
                $pdf->SetY($y);
                $pdf->SetX(28);
                $pdf->Cell(21,15,utf8_decode($numExp),1,0,'C');
                $pdf->SetY($y);
                $pdf->SetX(49);
                $pdf->MultiCell(80,15,utf8_decode($propirRes["nombre"].' '.$userConstRes["apellido"]),1,'C');
                $pdf->SetY($y);
                $pdf->SetX(129);
                $pdf->MultiCell(30,15,utf8_decode($propirRes["cedula"]),1,'C');
                $pdf->SetY($y);
                $pdf->SetX(159);
                $pdf->Cell(110,15,utf8_decode($propirRes["dir_hab"]),1,'L');
                $pagosSQL = "SELECT * FROM pagos where fk_expedient=".$idExp." AND tipo='".$tipo."'";
                $resPagosConst = $link->query($pagosSQL);
                $pagosConstRes = $resPagosConst->fetch_array();
                $pdf->SetY($y);
                $pdf->SetX(269);
                $pdf->Cell(26,15,utf8_decode($pagosConstRes["fechaPagos"]),1,0,'C');
                $pdf->SetY($y);
                $pdf->SetX(295);
                $pdf->Cell(50,15,utf8_decode($userConstRes["tenencia"]),1,0,'C');
                $y+=15;
            }
            $pdf->SetFont('Times','B',11);
            $pdf->SetY(50);
            $pdf->SetX(140);
            $pdf->Cell(10,10,'REPORTE POR USUARIO');
            $pdf->SetY(60);
            $pdf->SetX(12);
            $pdf->Cell(16,7,utf8_decode('Nº'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(28);
            $pdf->Cell(21,7,utf8_decode('Expediente'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(49);
            $pdf->Cell(80,7,utf8_decode('Nombre'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(129);
            $pdf->Cell(30,7,utf8_decode('Cedula'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(159);
            $pdf->Cell(110,7,utf8_decode('Direccion'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(269);
            $pdf->Cell(26,7,utf8_decode('Pago'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(295);
            $pdf->Cell(50,7,utf8_decode('Tenencia'),1,0,'C');
        }
        if($this->campReport=="dia"){
            $pdf->SetFont('Times','B',9);
            $userConstSql = "SELECT * FROM constancias where fecha='".date("Y-m-d")."'";
            $resUserConst = $link->query($userConstSql);
            $y =67;
            $c;
            $userConstRes=0;
            while ($userConstRes = $resUserConst->fetch_array()) {
                $pdf->SetY($y);
                $pdf->SetX(24);
                $pdf->Cell(16,15,utf8_decode($c+=1),1,0,'C');

                $nExpedientSQL = "SELECT * FROM expediente where n_expediente='".$userConstRes["fk_expedi"]."'";
                $resNExpediente = $link->query($nExpedientSQL);
                $nExpedienteRes = $resNExpediente->fetch_array();
                if($nExpedienteRes!=0){
                    $numExp = $nExpedienteRes["n_expediente"];
                    $idExp = $nExpedienteRes["id"];
                    $tipo = "normal";
                    $propietario = $nExpedienteRes["fk_propietario"];
                }else{
                    $nExpeEmpadroSQL = "SELECT * FROM expempadro where n_expediente='".$userConstRes["fk_expedi"]."'";
                    $resNEmpadro = $link->query($nExpeEmpadroSQL);
                    $nEmpadroRes = $resNEmpadro->fetch_array();
                    $numExp = $nEmpadroRes["n_expediente"];
                    $idExp = $nEmpadroRes["id"];
                    $propietario = $nEmpadroRes["fk_propietario"];
                    $tipo = "EMPADRONAMIENTO";
                }
                $propirSQL = "SELECT * FROM propietarios where id=".$propietario."";
                $resPropir = $link->query($propirSQL);
                $propirRes = $resPropir->fetch_array();
                $pdf->SetY($y);
                $pdf->SetX(40);
                $pdf->Cell(21,15,utf8_decode($numExp),1,0,'C');
                $pdf->SetY($y);
                $pdf->SetX(61);
                $pdf->MultiCell(80,15,utf8_decode($propirRes["nombre"].' '.$userConstRes["apellido"]),1,'C');
                $pdf->SetY($y);
                $pdf->SetX(141);
                $pdf->MultiCell(30,15,utf8_decode($propirRes["cedula"]),1,'C');
                $pdf->SetY($y);
                $pdf->SetX(171);
                $pdf->Cell(110,15,utf8_decode($propirRes["dir_hab"]),1,'L');
                $pagosSQL = "SELECT * FROM pagos where fk_expedient=".$idExp." AND tipo='".$tipo."'";
                $resPagosConst = $link->query($pagosSQL);
                $pagosConstRes = $resPagosConst->fetch_array();
                $pdf->SetY($y);
                $pdf->SetX(281);
                $pdf->Cell(26,15,utf8_decode($pagosConstRes["fechaPagos"]),1,0,'C');
                $y+=15;
            }
            $pdf->SetFont('Times','B',11);
            $pdf->SetY(50);
            $pdf->SetX(140);
            $pdf->Cell(10,10,'REPORTE POR USUARIO');
            $pdf->SetY(60);
            $pdf->SetX(24);
            $pdf->Cell(16,7,utf8_decode('Nº'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(40);
            $pdf->Cell(21,7,utf8_decode('Expediente'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(61);
            $pdf->Cell(80,7,utf8_decode('Nombre'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(141);
            $pdf->Cell(30,7,utf8_decode('Cedula'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(171);
            $pdf->Cell(110,7,utf8_decode('Direccion'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(281);
            $pdf->Cell(26,7,utf8_decode('Pago'),1,0,'C');
        }
        if($this->campReport=="guardado"){
            $pdf->SetFont('Times','B',9);
            $userConstSql = "SELECT * FROM constancias ORDER BY fecha";
            $resUserConst = $link->query($userConstSql);
            $y =67;
            $c;
            $userConstRes=0;
            while ($userConstRes = $resUserConst->fetch_array()) {
                $pdf->SetY($y);
                $pdf->SetX(24);
                $pdf->Cell(16,15,utf8_decode($c+=1),1,0,'C');

                $nExpedientSQL = "SELECT * FROM expediente where n_expediente='".$userConstRes["fk_expedi"]."'";
                $resNExpediente = $link->query($nExpedientSQL);
                $nExpedienteRes = $resNExpediente->fetch_array();
                if($nExpedienteRes!=0){
                    $numExp = $nExpedienteRes["n_expediente"];
                    $idExp = $nExpedienteRes["id"];
                    $tipo = "normal";
                    $propietario = $nExpedienteRes["fk_propietario"];
                }else{
                    $nExpeEmpadroSQL = "SELECT * FROM expempadro where n_expediente='".$userConstRes["fk_expedi"]."'";
                    $resNEmpadro = $link->query($nExpeEmpadroSQL);
                    $nEmpadroRes = $resNEmpadro->fetch_array();
                    $numExp = $nEmpadroRes["n_expediente"];
                    $idExp = $nEmpadroRes["id"];
                    $propietario = $nEmpadroRes["fk_propietario"];
                    $tipo = "EMPADRONAMIENTO";
                }
                $propirSQL = "SELECT * FROM propietarios where id=".$propietario."";
                $resPropir = $link->query($propirSQL);
                $propirRes = $resPropir->fetch_array();
                $pdf->SetY($y);
                $pdf->SetX(40);
                $pdf->Cell(21,15,utf8_decode($numExp),1,0,'C');
                $pdf->SetY($y);
                $pdf->SetX(61);
                $pdf->MultiCell(80,15,utf8_decode($propirRes["nombre"].' '.$userConstRes["apellido"]),1,'C');
                $pdf->SetY($y);
                $pdf->SetX(141);
                $pdf->MultiCell(30,15,utf8_decode($propirRes["cedula"]),1,'C');
                $pdf->SetY($y);
                $pdf->SetX(171);
                $pdf->Cell(110,15,utf8_decode($propirRes["dir_hab"]),1,'L');
                $pagosSQL = "SELECT * FROM pagos where fk_expedient=".$idExp." AND tipo='".$tipo."'";
                $resPagosConst = $link->query($pagosSQL);
                $pagosConstRes = $resPagosConst->fetch_array();
                $pdf->SetY($y);
                $pdf->SetX(281);
                $pdf->Cell(26,15,utf8_decode($pagosConstRes["fechaPagos"]),1,0,'C');
                $y+=15;
            }
            $pdf->SetFont('Times','B',11);
            $pdf->SetY(50);
            $pdf->SetX(140);
            $pdf->Cell(10,10,'REPORTE POR USUARIO');
            $pdf->SetY(60);
            $pdf->SetX(24);
            $pdf->Cell(16,7,utf8_decode('Nº'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(40);
            $pdf->Cell(21,7,utf8_decode('Expediente'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(61);
            $pdf->Cell(80,7,utf8_decode('Nombre'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(141);
            $pdf->Cell(30,7,utf8_decode('Cedula'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(171);
            $pdf->Cell(110,7,utf8_decode('Direccion'),1,0,'C');
            $pdf->SetY(60);
            $pdf->SetX(281);
            $pdf->Cell(26,7,utf8_decode('Pago'),1,0,'C');
        }
        $pdf->Output('F','../../../assets/constancias/'.date("Y").'/'.$busExpedienteRes["n_expediente"].'.pdf');
        echo'
        <input type="hidden" id="rutaPdf" value="./assets/constancias/'.date("Y").'/'.$busExpedienteRes["n_expediente"].'.pdf" />
        <input type="hidden" id="numExp" value="'.$busExpedienteRes["n_expediente"].'">';
    }

}
?>