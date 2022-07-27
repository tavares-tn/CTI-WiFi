<?php
include_once '../Grafico.class.php';

echo '<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark">
			
			<i class="fa-fw fa fa-home"></i> 
				Wireless CTISM
			<span>  
				total de dispositivos conectados
			</span>
		</h1>
	</div>';

$gTotal = new Grafico();

$gTotal->dinamicoTodosAP();
?>