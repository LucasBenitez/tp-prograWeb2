<?php
require 'fpdf/fpdf.php';

class PDF extends FPDF{

    function Header()
    {
        $this->Image('images/headerInfonete.png',5,5,30);
        $this->SetFont('Arial','B','15');
        $this->Cell(30);

        $this->Cell(120,10,'Reporte de usuarios',0,1,'C');

        $this->SetFont('Arial','I','10');
        $this->Cell(100,10,'El codigo de usuario 1 pertenece a Administrador',0,1,'c');
        $this->SetFont('Arial','I','10');
        $this->Cell(100,10,'El codigo de usuario 2 pertenece a  Contenidista',0,1,'c');
        $this->SetFont('Arial','I','10');
        $this->Cell(100,10,'El codigo de usuario 3 pertenece a Lector',0,1,'c');
        $this->Ln(20);

    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Pagina'.$this->PageNo().'/{nb}',0,0,'C');
    }

}