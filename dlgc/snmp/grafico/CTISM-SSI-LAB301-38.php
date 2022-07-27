<?php
include_once '../Grafico.class.php';

$ap38 = new Grafico();

echo '<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">';
$ap38->barChartMes('AP38');
echo'</article>';

echo '<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">';
$ap38->lineChartAno('AP38');
echo '</article>';

$ap38->dinamicoAP('AP38')
?>