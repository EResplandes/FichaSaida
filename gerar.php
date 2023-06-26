<?php
require_once('TCPDF/tcpdf.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Posto = $_POST['posto'];
    $Militar = $_POST['militar'];
    $Chefe = $_POST['chefe'];
    $Divisao = $_POST['divisao'];
    $HoraSaida = $_POST['hora'];
    $Destino = $_POST['destino'];
    $dataAtual = date('d/m/Y');
    $imagePath = 'assets/img/simbolo.jpg';
    $imageWidth = 30;
    $imageHeight = 30;



    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

    $pdf->AddPage();
    $pdfWidth = $pdf->GetPageWidth();
    $imageX = ($pdfWidth - $imageWidth) / 2;
    $currentY = $pdf->GetY();
    $pdf->Image($imagePath, $imageX, $currentY, $imageWidth, $imageHeight);

    $newY = $currentY + $imageHeight + 10;

    // Define a nova posição Y
    $pdf->SetY($newY);

    // Define a nova posição Y
    $pdf->SetY($newY);
    $pdf->SetFont('helvetica', 'B', 14);
    $pdf->SetFont('helvetica', 'b', 12);
    $pdf->SetY($pdf->GetY() - 5); // Ajuste o valor '-10' para mover o texto para cima
    $pdf->Cell(0, -5, 'EXÉRCITO BRASILEIRO', 0, 1, 'C');
    $pdf->SetY($pdf->GetY() - 10); // Ajuste o valor '-10' para mover o texto para cima
    $pdf->Cell(0, 0, 'MINISTÉRIO DA DEFESA', 0, 1, 'C');
    $pdf->SetY($pdf->GetY() +4); // Ajuste o valor '-10' para mover o texto para cima
    $pdf->Cell(0, 0, 'GRÁFICA DO EXÉRCITO', 0, 1, 'C');
    $pdf->SetFont('helvetica', '', 12);
    $pdf->SetY($pdf->GetY() + 1); // Ajuste o valor '-10' para mover o texto para cima
    $pdf->SetFont('helvetica', 'b', 12);
    $pdf->Cell(0, 10, 'Ficha de Controle de Saída de Militares', 0, 1, 'C');

    // Criação da tabela com duas colunas

    // Calcula a posição X para centralizar a tabela
    $tableWidth = 160; // Largura total da tabela (80 + 80)
    $pageWidth = $pdf->GetPageWidth();
    $tableX = ($pageWidth - $tableWidth) / 2;

    // Define a posição X da tabela
    $pdf->SetX($tableX);
    $pdf->SetFont('helvetica', 12);
    $pdf->Cell(80, 10, 'DATA: ' . $dataAtual, 1, 0, 'C');
    $pdf->Cell(80, 10, 'DIVISÃO: ' . $Divisao, 1, 1, 'C');

    $pdf->SetX($tableX);
    $pdf->Cell(80, 10, 'MILITAR:', 1, 0, 'C');
    $pdf->Cell(80, 10, $Posto. ' ' .$Militar, 1, 1, 'C');

    $pdf->SetX($tableX);
    $pdf->Cell(80, 10, 'HORÁRIO DE SAÍDA: ', 1, 0, 'C');
    $pdf->Cell(80, 10, $HoraSaida, 1, 1, 'C');

    $pdf->SetX($tableX);
    $pdf->Cell(80, 10, 'HORÁRIO DE RETORNO: ', 1, 0, 'C');
    $pdf->Cell(80, 10, '' , 1, 1, 'C');

    $pdf->SetX($tableX);
    $pdf->Cell(80, 10, 'DESTINO:', 1, 0, 'C');
    $pdf->Cell(80, 10, $Destino, 1, 1, 'C');

    $pdf->SetY($pdf->GetY() + 15); // Ajuste o valor '-10' para mover o texto para cima
    $pdf->SetX($tableX);
    $pdf->Cell(0, 3, '________________________________________', 0, 1, 'C');
    $pdf->SetX($tableX);
    $pdf->Cell(0, 7, 'Autorizado por: '. $Chefe, 0, 1, 'C');
    $pdf->SetX($tableX);


    $pdf->Output('ficha_viatura.pdf', 'I');
}
