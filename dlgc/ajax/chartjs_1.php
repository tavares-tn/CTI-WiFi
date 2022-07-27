
<div class="row">
	
	<!-- col -->
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark">
			
			
			<i class="fa-fw fa fa-home"></i> 
				Page Header 
			<span>>  
				Subtitle
			</span>
		</h1>
	</div>
	
</div>


<section id="widget-grid" class="">

	<div class="row">

		<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

			<div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-fullscreenbutton="false" data-widget-editbutton="false" data-widget-sortable="false">

				<header>
					
					<h2>Line Chart </h2>				
					
				</header>

				<div>

					<div class="jarviswidget-editbox">

						<input class="form-control" type="text">	
					</div>

					<div class="widget-body">
						
						<canvas id="lineChart" height="120"></canvas>

					</div>
					
				</div>

			</div>

		</article>

		<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

			<div class="jarviswidget" id="wid-id-2" data-widget-colorbutton="false" data-widget-fullscreenbutton="false" data-widget-editbutton="false" data-widget-sortable="false">

				<header>

                                    <h2>Gráfico mês de <?php
                                    
                                                                                    switch (date('m')) {
                                                                                        case 01:
                                                                                            echo "Janeiro";
                                                                                            break;
                                                                                        case 02:
                                                                                            echo "Fevereiro";
                                                                                            break;
                                                                                        case 03:
                                                                                            echo "Março";
                                                                                            break;
                                                                                        case 04:
                                                                                            echo "Abril";
                                                                                            break;
                                                                                        case 05:
                                                                                            echo "Maio";
                                                                                            break;
                                                                                        case 06:
                                                                                            echo "Junho";
                                                                                            break;
                                                                                        case 07:
                                                                                            echo "Julho";
                                                                                            break;
                                                                                        case 08:
                                                                                            echo "Agosto";
                                                                                            break;
                                                                                        case 09:
                                                                                            echo "Setembro";
                                                                                            break;
                                                                                        case 10:
                                                                                            echo "Outubro";
                                                                                            break;
                                                                                        case 11:
                                                                                            echo "Novembro";
                                                                                            break;
                                                                                        case 12:
                                                                                            echo "Dezembro";
                                                                                            break;                                                                                        
                                                                                    }
                                                                    
                                                                    ?>  </h2>				
					
				</header>

				<div>
					
					<div class="jarviswidget-editbox">

						<input class="form-control" type="text">	
					</div>

					<div class="widget-body">
						
						<canvas id="barChart" height="120"></canvas>

					</div>

					
				</div>

				
			</div>

		</article>

		
	</div>


</section>
<!-- end widget grid -->

<script type="text/javascript">
	
	/* DO NOT REMOVE : GLOBAL FUNCTIONS!
	 *
	 * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
	 *
	 * // activate tooltips
	 * $("[rel=tooltip]").tooltip();
	 *
	 * // activate popovers
	 * $("[rel=popover]").popover();
	 *
	 * // activate popovers with hover states
	 * $("[rel=popover-hover]").popover({ trigger: "hover" });
	 *
	 * // activate inline charts
	 * runAllCharts();
	 *
	 * // setup widgets
	 * setup_widgets_desktop();
	 *
	 * // run form elements
	 * runAllForms();
	 *
	 ********************************
	 *
	 * pageSetUp() is needed whenever you load a page.
	 * It initializes and checks for all basic elements of the page
	 * and makes rendering easier.
	 *
	 */

	pageSetUp();
	
	/*
	 * ALL PAGE RELATED SCRIPTS CAN GO BELOW HERE
	 * eg alert("my home function");
	 * 
	 * var pagefunction = function() {
	 *   ...
	 * }
	 * loadScript("js/plugin/_PLUGIN_NAME_.js", pagefunction);
	 * 
	 * TO LOAD A SCRIPT:
	 * var pagefunction = function (){ 
	 *  loadScript(".../plugin.js", run_after_loaded);	
	 * }
	 * 
	 * OR you can load chain scripts by doing
	 * 
	 * loadScript(".../plugin.js", function(){
	 * 	 loadScript("../plugin.js", function(){
	 * 	   ...
	 *   })
	 * });
	 */
	
	 var  myNewChart_1, myNewChart_2, myNewChart_3, myNewChart_4, myNewChart_5, myNewChart_6;

	// pagefunction

	var pagefunction = function() {
		// clears the variable if left blank
		
			

			// reference: http://www.chartjs.org/docs/

			// LINE CHART
			// ref: http://www.chartjs.org/docs/#line-chart-introduction
		    var lineOptions = {
			    ///Boolean - Whether grid lines are shown across the chart
			    scaleShowGridLines : true,
			    //String - Colour of the grid lines
			    scaleGridLineColor : "rgba(0,0,0,.05)",
			    //Number - Width of the grid lines
			    scaleGridLineWidth : 1,
			    //Boolean - Whether the line is curved between points
			    bezierCurve : true,
			    //Number - Tension of the bezier curve between points
			    bezierCurveTension : 0.4,
			    //Boolean - Whether to show a dot for each point
			    pointDot : true,
			    //Number - Radius of each point dot in pixels
			    pointDotRadius : 4,
			    //Number - Pixel width of point dot stroke
			    pointDotStrokeWidth : 1,
			    //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
			    pointHitDetectionRadius : 20,
			    //Boolean - Whether to show a stroke for datasets
			    datasetStroke : true,
			    //Number - Pixel width of dataset stroke
			    datasetStrokeWidth : 2,
			    //Boolean - Whether to fill the dataset with a colour
			    datasetFill : true,
			    //Boolean - Re-draw chart on page resize
		        responsive: true,
			    //String - A legend template
			    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
		    };

		    var lineData = { labels: [<?php

                                    
               for ($i = 1; $i < (date('m')+1); $i++) {                    

                                     switch ($i) {
                                                                                        case 01:
                                                                                            echo "'Janeiro', ";
                                                                                            break;
                                                                                        case 02:
                                                                                            echo "'Fevereiro', ";
                                                                                            break;
                                                                                        case 03:
                                                                                            echo "'Março', ";
                                                                                            break;
                                                                                        case 04:
                                                                                            echo "'Abril', ";
                                                                                            break;
                                                                                        case 05:
                                                                                            echo "'Maio', ";
                                                                                            break;
                                                                                        case 06:
                                                                                            echo "'Junho', ";
                                                                                            break;
                                                                                        case 07:
                                                                                            echo "'Julho', ";
                                                                                            break;
                                                                                        case 08:
                                                                                            echo "'Agosto', ";
                                                                                            break;
                                                                                        case 09:
                                                                                            echo "'Setembro', ";
                                                                                            break;
                                                                                        case 10:
                                                                                            echo "'Outubro', ";
                                                                                            break;
                                                                                        case 11:
                                                                                            echo "'Novembro', ";
                                                                                            break;
                                                                                        case 12:
                                                                                            echo "'Dezembro'";
                                                                                            break;                                                                                        
                                                                                    }

               }                                           
                                    
                                    ?>],
		        datasets: [
			            {
			            label: "My Second dataset",
			            fillColor: "rgba(151,187,205,0.2)",
			            strokeColor: "rgba(151,187,205,1)",
			            pointColor: "rgba(151,187,205,1)",
			            pointStrokeColor: "#fff",
			            pointHighlightFill: "#fff",
			            pointHighlightStroke: "rgba(151,187,205,1)",
			            data: [<?php
                                    
                                            include_once '../Banco.class.php';

                                     $dados = new Banco();
                                     $dados->conectaBanco();

                                     for ($x = 1; $x < (date('m')+1); $x++) {
                                         $y = $x+1;
                                         
                                            $dados->extrato('AP38', "2016-{$x}-01", "2016-{$y}-01");
                                     }
                                     
                                     $dados->fecharConexaoBancoDados();
                                    
                                           ?>]
			        }
			    ]
		    };

		    // render chart
		    var ctx = document.getElementById("lineChart").getContext("2d");
		    myNewChart_1 = new Chart(ctx).Line(lineData, lineOptions);

		    // END LINE CHART

		    // BAR CHART

		    var barOptions = {
			    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
			    scaleBeginAtZero : true,
			    //Boolean - Whether grid lines are shown across the chart
			    scaleShowGridLines : true,
			    //String - Colour of the grid lines
			    scaleGridLineColor : "rgba(0,0,0,.05)",
			    //Number - Width of the grid lines
			    scaleGridLineWidth : 1,
			    //Boolean - If there is a stroke on each bar
			    barShowStroke : true,
			    //Number - Pixel width of the bar stroke
			    barStrokeWidth : 1,
			    //Number - Spacing between each of the X value sets
			    barValueSpacing : 5,
			    //Number - Spacing between data sets within X values
			    barDatasetSpacing : 1,
			    //Boolean - Re-draw chart on page resize
		        responsive: true,
			    //String - A legend template
			    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
		    }

		    var barData = {
		        labels: [<?php

                                    $hoje = date('d');
                                    for($i=1; $i< (date('d')+1); $i++){

                                    $inicio = date('d',strtotime("-". (($i -date('d'))*-1). "days"));


                                    echo '"'.$inicio.'", ';

                                    }
                                    ?>],
		         datasets: [
			  
			        {
			            label: "My Second dataset",
			            fillColor: "rgba(151,187,205,0.5)",
			            strokeColor: "rgba(151,187,205,0.8)",
			            highlightFill: "rgba(151,187,205,0.75)",
			            highlightStroke: "rgba(151,187,205,1)",
			            data: [<?php
                                        include_once '../Banco.class.php';

                                     $hoje = date('Y-m-d');
                                     $inicio = date('Y-m-d', strtotime("-" . ((1 - date('d')) * -1) . "days"));

                                     $dados = new Banco();
                                     $dados->conectaBanco();

                                     for ($i = 1; $i < (date('d')+1); $i++) {
                                             $inicio = date('Y-m-d', strtotime("-" . (($i - date('d')) * -1) . "days"));
                                            $fim = date('Y-m-d', strtotime("-" . (($i+1 - date('d')) * -1) . "days"));

                                            $dados->extrato('AP38', $inicio, $fim);
                                     }
                                     
                                     $dados->fecharConexaoBancoDados();

                                        
                                            ?>]
			        }
			    ]
		    };

		    // render chart
		    var ctx = document.getElementById("barChart").getContext("2d");
		    myNewChart_2 = new Chart(ctx).Bar(barData, barOptions);

		    // END BAR CHART


		   



	};
	
	loadScript("js/plugin/chartjs/chart.min.js", pagefunction); 

	// end pagefunction

	// destroy generated instances 
	// pagedestroy is called automatically before loading a new page
	// only usable in AJAX version!

	var pagedestroy = function(){
		
		//destroy all charts
    	myNewChart_1.destroy();
		myNewChart_1=null;

    	myNewChart_2.destroy();
    	myNewChart_2=null;

    	myNewChart_3.destroy();
    	myNewChart_3=null;

    	myNewChart_4.destroy();
    	myNewChart_4=null;

    	myNewChart_5.destroy();
    	myNewChart_5=null;

    	myNewChart_6.destroy();
    	myNewChart_6=null;

    	if (debugState){
			root.console.log("✔ Chart.js charts destroyed");
		} 
	}

	// end destroy
	
</script>
