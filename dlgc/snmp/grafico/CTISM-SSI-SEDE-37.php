<?php
include_once '../Grafico.class.php';
$ap37 = new Grafico();

echo '<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">';
$ap37->doughnutChartAno('AP37');
echo'</article>';

echo '<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">';
$ap37->lineChartMes('AP37');
echo '</article>';

$a37->dinamicoAP('AP37');

?>