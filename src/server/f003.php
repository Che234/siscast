<?php
require('../lib/fpdf/fpdf.php');
class PDF3 extends FPDF
{
    // Cabecera de página
    function Header(){
        // Logos
        $this->Image('../../assets/logo.jpg',10,3,34);
        $this->Image('../../assets/escudo.jpg',290,3,34);
        $this->Image('../../assets/fondoCabecera.jpg',50,3,235,30);
        // Arial bold 15
        $this->SetFont('Times','B',10);
        // Título
        $this->SetY(3);
        $this->SetX(126);
        $this->Cell(30,10,'REPUBLICA BOLIVARIANA DE VENEZUELA',0,'C');
        $this->SetY(8);
        $this->SetX(132);
        $this->Cell(30,10,'INSTITUTO AUTONOMO MUNICIPAL ',0,'C');
        $this->SetY(13);
        $this->SetX(133);
        $this->Cell(30,10,'DE ORDENAMIENTO TERRITORIAL',0,'C');
        $this->SetY(20);
        $this->SetX(124);
        $this->Cell(65,6,'MUNICIPIO FERNANDEZ FEO - EDO. TACHIRA',0,'C');
        $this->SetY(23);
        $this->SetX(149);
        $this->Cell(30,10,'RIF: G200129891',0,'C');
        // Salto de línea
        $this->Ln(20);
    }

    // Pie de página
    function Footer(){
        // Posición: a 1,5 cm del final
        $this->SetFont('Arial','B',10);
        $this->Image('../../assets/fondoFooter.jpg',18,180,314,24);
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
        $MySql = new conexion;
        $link= $MySql->conectar();
        

        if($this->campReport=="usuarios"){
            $contUserConst = "SELECT COUNT(*) FROM constancias";
            $resContUser = $link->query($contUserConst);
            $contUserRes = $resContUser->fetch_array();

            $userConstSql = "SELECT * FROM constancias ORDER BY fk_redactor";
            $resUserConst = $link->query($userConstSql);

            $x =19;
            $y =19;
           var $c;
            for($i=0; $i < $contUserRes["COUNT(*)"]; $i++){
                $pdf->SetFont('Times','B',11);
                $pdf->SetX($x);
                $pdf->SetY($y);
            }
        }

        $pdf->SetFont('Times','B',11);
        $pdf->SetY(50);
        $pdf->SetX(137);
        $pdf->Cell(10,10,'REPORTE POR USUARIO');
        $pdf->SetY(60);
        $pdf->SetX(25);
        $pdf->Cell(16,7,utf8_decode('Nº'),1,0,'C');
        $pdf->SetY(60);
        $pdf->SetX(41);
        $pdf->Cell(21,7,utf8_decode('Expediente'),1,0,'C');
        $pdf->SetY(60);
        $pdf->SetX(62);
        $pdf->Cell(80,7,utf8_decode('Nombre'),1,0,'C');
        $pdf->SetY(60);
        $pdf->SetX(142);
        $pdf->Cell(55,7,utf8_decode('Cedula'),1,0,'C');
        $pdf->SetY(60);
        $pdf->SetX(197);
        $pdf->Cell(80,7,utf8_decode('Direccion'),1,0,'C');
        $pdf->SetY(60);
        $pdf->SetX(277);
        $pdf->Cell(26,7,utf8_decode('Pago'),1,0,'C');
        // $pdf->SetY(67);
        // $pdf->SetX(20);
        // $pdf->Cell(16,7,utf8_decode(''),1,0,'C');
        // $pdf->SetY(67);
        // $pdf->SetX(36);
        // $pdf->Cell(21,7,utf8_decode(''),1,0,'C');
        // $pdf->SetY(67);
        // $pdf->SetX(57);
        // $pdf->MultiCell(80,7,utf8_decode(''),1,'C');
        // $pdf->SetY(67);
        // $pdf->SetX(137);
        // $pdf->MultiCell(55,7,utf8_decode(''),1,'C');
        // $pdf->SetY(67);
        // $pdf->SetX(192);
        // $pdf->Cell(80,7,utf8_decode(''),1,0,'C');
        // $pdf->SetY(67);
        // $pdf->SetX(272);
        // $pdf->Cell(26,7,utf8_decode(''),1,0,'C');

        $pdf->Output('I','../../assets/constancias/'.date("Y").'/'.$busExpedienteRes["n_expediente"].'.pdf');
        echo'
        <input type="hidden" id="rutaPdf" value="http://localhost/SisCast/assets/constancias/'.date("Y").'/'.$busExpedienteRes["n_expediente"].'.pdf" />
        <input type="hidden" id="numExp" value="'.$busExpedienteRes["n_expediente"].'">';
    }

}
$f003 = new report;
$f003->imprimir();
?>