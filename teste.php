<?php
//PROCESSO DE CRIACAO de PDF

//1 - Camar a biblioteca do FPDF (COnferir a localização correta do arquivo)
require('../../fpdf/fpdf.php');

//2- Crar um objeto FPDF
$pdf = new FPDF();

//3 - Chamamos o metodo AddPage
$pdf->AddPage();

//4- Chamar metodo SetFront
$pdf->SetFont('Arial','B',16);

//5- Chamar o metodo Cell
$pdf->Cell(40,10,'Hello World!');

//6- Chamar o metodo Output()
$pdf->Output();

?>