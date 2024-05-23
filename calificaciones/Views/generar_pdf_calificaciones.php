<?php
session_start();
require('../fpdf/fpdf.php');
include "../Controllers/conexion.php";

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Movernos a la derecha
        $this->Cell(70);
        // Título
        $this->Cell(70, 10, 'Reporte de notas', 2, 0, 'C');
        // Salto de línea
        $this->Ln(20);

        $this->Cell(100, 10, 'Nombre estudiante', 1, 0, 'C', 0);
        $this->Cell(45, 10, 'Asignatura', 1, 0, 'C', 0);
        $this->Cell(45, 10, 'Nota', 1, 1, 'C', 0);

    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, mb_convert_encoding('Página ', 'ISO-8859-1', 'UTF-8') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}


$consulta = "SELECT * FROM calificaciones 
                                  INNER JOIN usuarios ON calificaciones.estudiante = usuarios.idusuarios 
                                  INNER JOIN materia ON calificaciones.materia = materia.idmateria";
$resultado = $conexion->query($consulta);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 14);

while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell(100, 10, $row['nombreusuario'], 1, 0, 'C', 0);
    $pdf->Cell(45, 10, $row['nombremateria'], 1, 0, 'C', 0);
    $pdf->Cell(45, 10, $row['nota'], 1, 1, 'C', 0);
}

$pdf->Output();
?>