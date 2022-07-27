<?php
include_once '../Grafico.class.php';
$ap33 = new Grafico();

echo '<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">';
$ap33->barChartMes('AP33');
echo'</article>';

echo '<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">';
$ap33->doughnutChartAno('AP33');
echo '</article>';

$ap33->dinamicoAP('AP33');
?>