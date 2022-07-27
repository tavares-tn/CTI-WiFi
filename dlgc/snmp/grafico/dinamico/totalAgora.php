
<section id="widget-grid" class="">
    <div class="row">
        <article class="col-sm-12">
            <div class="jarviswidget" id="wid-id-0" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
                <header>
                    <h2>usuários conectados</h2>
                </header>
                <div class="no-padding">
                    <div class="widget-body">
                        <div id="myTabContent" class="tab-content">
                            <div class="row no-space">
                                <span class="demo-liveupdate-1"> <span class="onoffswitch-title">Live switch</span> <span class="onoffswitch">
                                        <input type="checkbox" name="start_interval" class="onoffswitch-checkbox" id="start_interval">
                                        <label class="onoffswitch-label" for="start_interval"> 
                                            <span class="onoffswitch-inner" data-swchon-text="ON" data-swchoff-text="OFF"></span> 
                                            <span class="onoffswitch-switch"></span> </label> </span> 
                                </span>
                                <div id="updating-chart" class="chart-large txt-color-blue"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </div>



    <div class="row">

        <article class="col-sm-12 col-md-12 col-lg-6">

            <div id="chat-body" >

            </div>
        </article>
    </div>

</section>

<script type="text/javascript">

    var flot_updating_chart, flot_statsChart, flot_multigraph, calendar;

    pageSetUp();

    var pagefunction = function () {

        $(".js-status-update a").click(function () {
            var selText = $(this).text();
            var $this = $(this);
            $this.parents('.btn-group').find('.dropdown-toggle').html(selText + ' <span class="caret"></span>');
            $this.parents('.dropdown-menu').find('li').removeClass('active');
            $this.parent().addClass('active');
        });

        $("#sortable1, #sortable2").sortable({
            handle: '.handle',
            connectWith: ".todo",
            update: countTasks
        }).disableSelection();


        $('.todo .checkbox > input[type="checkbox"]').click(function () {
            var $this = $(this).parent().parent().parent();

            if ($(this).prop('checked')) {
                $this.addClass("complete");

                $(this).parent().hide();

                $this.slideUp(500, function () {
                    $this.clone().prependTo("#sortable3").effect("highlight", {}, 800);
                    $this.remove();
                    countTasks();
                });
            } else {

            }

        })

        function countTasks() {

            $('.todo-group-title').each(function () {
                var $this = $(this);
                $this.find(".num-of-tasks").text($this.next().find("li").size());
            });

        }


        loadScript("js/plugin/flot/jquery.flot.cust.min.js", function () {
            loadScript("js/plugin/flot/jquery.flot.resize.min.js", function () {
                loadScript("js/plugin/flot/jquery.flot.time.min.js", function () {
                    loadScript("js/plugin/flot/jquery.flot.tooltip.min.js", generatePageGraphs);
                });
            });
        });


        function generatePageGraphs() {


            var data = [],
                    totalPoints = 100,      
                    $UpdatingChartColors = $("#updating-chart").css('color');   //cor

            function getRandomData() {
                if (data.length > 0)
                    data = data.slice(1);

                while (data.length < totalPoints) {
//

                    //valor quantidade
                    var dados = <?php
                        include_once '../Banco.class.php';
                        $agora = new Banco();
                        $agora->conectaBanco();

                        $agora->extratoAgora($ap);
                        ?>;

                    data.push(dados);
                }

                var res = [];
                for (var i = 0; i < data.length; ++i)
                    res.push([i, data[i]])
                return res;
            }


 var updateInterval = 60000;
            $("#updating-chart").val(updateInterval).change(function () {

                var v = $(this).val();
                if (v && !isNaN(+v)) {
                    updateInterval = +v;
                    $(this).val("" + updateInterval);
                }

            });

            var options = {
                yaxis: {
                    min: 0,
                    max: 100
                },
                colors: [$UpdatingChartColors],
                series: {
                    lines: {
                        lineWidth: 1,
                        fill: true,
                        fillColor: {
                            colors: [{
                                    opacity: 0.4
                                }, {
                                    opacity: 0
                                }]
                        },
                        steps: false

                    }
                }
            };

            flot_updating_chart = $.plot($("#updating-chart"), [getRandomData()], options);


            $('input[type="checkbox"]#start_interval').click(function () {
                if ($(this).prop('checked')) {
                    $on = true;
                    updateInterval = 3000; //tempo atualiza grafico
                    update();
                } else {
                    clearInterval(updateInterval);
                    $on = false;
                }
            });

            function update() {

                try {
                    if ($on == true) {
                        flot_updating_chart.setData([getRandomData()]);
                        flot_updating_chart.draw();
                        setTimeout(update, updateInterval);

                    } else {
                        clearInterval(updateInterval)
                    }
                } catch (err) {
                    clearInterval(updateInterval);
                }

            }

            var $on = false;

        }




    };


    var pagedestroy = function () {


        calendar.fullCalendar('destroy');
        calendar = null;

        flot_updating_chart.shutdown();
        flot_updating_chart = null;
        flot_statsChart.shutdown();
        flot_statsChart = null;

        flot_multigraph.shutdown();
        flot_multigraph = null;

        $('#vector-map').find('*').addBack().off().remove();

        $("#sortable1, #sortable2").sortable("destroy");
        $('.todo .checkbox > input[type="checkbox"]').off();


        $("#rev-toggles").find(':checkbox').off();
        $('#chat-container').find('*').addBack().off().remove();


        if (debugState) {
            root.console.log("✔ Calendar, Flot Charts, Vector map, misc events destroyed");
        }

    }

    pagefunction();


</script>
