<?php
    require_once("../fpdf/fpdf.php");

    function Uploads() {
        $pasta = scandir("../upload/");
        if(count($pasta) > 0) {
            for ($i=2; $i < count($pasta); $i++) { 
                $html = $html . $pasta[$i] . "\n";
            }
        }
        return $html;
    }
    $html = Uploads();
    
    $pdf= new FPDF("P","pt","A4");
    $pdf->AddPage();
    
    $pdf->SetFont('arial', 'B', 18);
    $pdf->Cell(0, 5, "Ficha", 0, 1, 'C');
    $pdf->Cell(0, 10, "", "B", 1, 'C');
    $pdf->Ln(8);
    
    function gerarLinha($pdf, $texto, $dado, $cell = false) {
        $pdf->SetFont('arial', 'B', 12);
        $pdf->Cell(70, 20, $texto, 0, $cell, 'L');
        $pdf->setFont('arial', '', 12);
        $cell === true ? $pdf->MultiCell(0, 20, $dado, 0, 'J') : $pdf->Cell(0, 20, $dado, 0, 1, 'L');
    }
    gerarLinha($pdf, "Nome:", $_COOKIE["user"]);
    gerarLinha($pdf, "E-mail:", $_COOKIE["email"]);
    gerarLinha($pdf, "Senha:", $_COOKIE["password"]);
    gerarLinha($pdf, "Arquivos:", $html, true);

    $pdf->Output();
?>