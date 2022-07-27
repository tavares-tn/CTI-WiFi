
<div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-fullscreenbutton="false" data-widget-editbutton="false" data-widget-sortable="false">
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



<script type="text/javascript">

    pageSetUp();

    var myNewChart_1, myNewChart_2, myNewChart_3, myNewChart_4, myNewChart_5, myNewChart_6;

    var pagefunction = function () {



        var barOptions = {
            scaleBeginAtZero: true,
            scaleShowGridLines: true,
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleGridLineWidth: 1,
            barShowStroke: true,
            barStrokeWidth: 1,
            barValueSpacing: 5,
            barDatasetSpacing: 1,
            responsive: true,
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
        }

        var barData = {
            labels: [<?php
            $hoje = date('d');
            for ($i = 1; $i < (date('d') + 1); $i++) {

                $inicio = date('d', strtotime("-" . (($i - date('d')) * -1) . "days"));


                echo '"' . $inicio . '", ';
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

            for ($i = 1; $i < (date('d') + 1); $i++) {
                $inicio = date('Y-m-d', strtotime("-" . (($i - date('d')) * -1) . "days"));
                $fim = date('Y-m-d', strtotime("-" . (($i + 1 - date('d')) * -1) . "days"));

                $dados->extrato($barMes, $inicio, $fim);
            }

            $dados->fecharConexaoBancoDados();
            ?>]
                }
            ]
        };

        var ctx = document.getElementById("barChart").getContext("2d");
        myNewChart_2 = new Chart(ctx).Bar(barData, barOptions);

    };

    loadScript("js/plugin/chartjs/chart.min.js", pagefunction);


    var pagedestroy = function () {

        myNewChart_1.destroy();
        myNewChart_1 = null;

        myNewChart_2.destroy();
        myNewChart_2 = null;

        myNewChart_3.destroy();
        myNewChart_3 = null;

        myNewChart_4.destroy();
        myNewChart_4 = null;

        myNewChart_5.destroy();
        myNewChart_5 = null;

        myNewChart_6.destroy();
        myNewChart_6 = null;

        if (debugState) {
            root.console.log("✔ Chart.js charts destroyed");
        }
    }

</script>
