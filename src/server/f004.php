<?php
require('../lib/fpdf/fpdf.php');
class PDF4 extends FPDF
{
    // Cabecera de página
    function Header(){
        // Logos
        $this->Image('../../assets/logo.png',25,11,34);
        $this->Image('../../assets/escudo.jpg',240,8,34);
        $this->Image('../../assets/fondoCabecera.jpg',63,8,172,30);
        // Arial bold 15
        $this->SetFont('Times','B',10);
        // Título
        $this->SetY(9);
        $this->SetX(114);
        $this->Cell(30,10,'REPUBLICA BOLIVARIANA DE VENEZUELA',0,'C');
        $this->SetY(14);
        $this->SetX(120);
        $this->Cell(30,10,'INSTITUTO AUTONOMO MUNICIPAL ',0,'C');
        $this->SetY(19);
        $this->SetX(121);
        $this->Cell(30,10,'DE ORDENAMIENTO TERRITORIAL',0,'C');
        $this->SetY(26);
        $this->SetX(112);
        $this->Cell(65,6,'MUNICIPIO FERNANDEZ FEO - EDO. TACHIRA',0,'C');
        $this->SetY(29);
        $this->SetX(138);
        $this->Cell(30,10,'RIF: G200129891',0,'C');
        // Salto de línea
        $this->Ln(20);
    }

    // Pie de página
    function Footer(){
        // Posición: a 1,5 cm del final
        $this->Image('../../assets/fondoFooter.jpg',47,395,204);
        $this->SetY(395);    
        $this->SetX(100);
        $this->Cell(100,10,'PIÑAL, CALLE 3 ENTRE CARRERAS 3 Y 4,',0,0,'C',false);
        $this->SetY(400);    
        $this->SetX(100);
        $this->Cell(100,10,'PALACIO MUNICIPAL, MUNICIPIO FERNANDEZ FEO – ESTADO TACHIRA',0,0,'C');
        $this->SetY(405);    
        $this->SetX(99);
        $this->cell(100,10,'IAMOTFF@GMAIL.COM.',0,0,'C');
        // Arial italic 8
        $this->SetFont('Arial','I',8);
    }
}

?>