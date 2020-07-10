<?php
include "plantilla.php";
require "conexcion.php";


$query = "SELECT Id_usuario,Nombre,Pass,Cod_Usuario FROM usuario";
$resultado = $mysqli->query($query);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell(70, 6, 'USUARIOS', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'ID', 1, 0, 'C', 1);
$pdf->Cell(70, 6, 'Clave', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Cod_Usuario', 1, 1, 'C', 1);

while ($row=$resultado->fetch_assoc()){

    $pdf->Cell(70, 6, $row['Nombre'], 1, 0, 'C', 1);
    $pdf->Cell(20, 6, $row['Id_usuario'], 1, 0, 'C', 1);
    $pdf->Cell(70, 6, $row['Pass'], 1, 0, 'C', 1);
    $pdf->Cell(30, 6, $row['Cod_Usuario'], 1, 1, 'C', 1);




}


$pdf->Output();
