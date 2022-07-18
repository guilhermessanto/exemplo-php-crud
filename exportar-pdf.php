<?php
//exportar-pdf.php
use Dompdf\Dompdf;
use Dompdf\Options;
require_once "vendor/autoload.php";
session_start();

$paragrafo = "";
foreach($_SESSION['dados'] as $fabricante){
    //operador .= de contatenção e atribuição
    $paragrafo .= "<p>".$fabricante['nome']."</p>";
}
/* Conteúdo HTML para o resumo usando sintaxe heredoc PHP*/
$data = date("d/m/Y");
$conteudo = <<<HTML
    <div style="border:solid 2px; padding:10px;
    width: 70%; margin:auto;">
        <h2 style="text-align:center;">Resumo de Fabricantes - $data</h2>
        $paragrafo
        
    </div>
    HTML;
   
    /* die(); */ //Parar o script aqui
    /* $dompdf = new Dompdf(); */
    
    
    /*  $options = $dompdf->getOptions();
    $options->setDefaultFont('Verdana');
    $dompdf->setOptions($options); */
    

    $options = new Options();
    $options->set('defaultFont', 'Courier');
    $dompdf = new Dompdf($options);
    $dompdf = new Dompdf();
    
    $dompdf->loadHtml($conteudo);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream("Resumo de Fabricantes - ".date("d-m-Y").".pdf");