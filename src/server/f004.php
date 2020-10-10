<?php
require('../lib/fpdf/fpdf.php');
class PDF4 extends FPDF
{
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

?>