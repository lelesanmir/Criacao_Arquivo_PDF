<?php
include 'classPDF.php';

$pdf = new PDF();

//Cabeçalho da Coluna
$header = array('Nome', 'Curso', 'Disciplina', 'Média');

//Leitura dos dados do arquivo
$dados = $pdf->LoadData('alunos.csv');
$pdf->SetFont('Arial', '', 14);
$pdf->AddPage();
$pdf->FancyTable($header, $dados);
$pdf->Output();

?>