<?php
// include autoloader
require 'vendor/autoload.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

$conteudoHtml = "<h2 style='text-align:center'> PHP para PDF</h2>
                 <p style='color:red'>Testando lib domPDF</p>";

// instantiate and use the dompdf class
$dompdf = new Dompdf(); //objeto
$dompdf->loadHtml($conteudoHtml); //método

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape'); //ou portrait
// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();