<?php
require_once ("inc/init.php");
?>
<!-- row -->
<div class="row">

    <!-- col -->
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
        <h1 class="page-title txt-color-blueDark"><!-- PAGE HEADER --><i class="fa-fw fa fa-home"></i> Proxy - Bloqueios <span>>
                MAC Address </span></h1>
    </div>
    <!-- end col -->




</div>
<!-- end row -->


<!-- widget grid -->
<section id="widget-grid" class="">

    <!-- row -->
    <div class="row">

        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <table id="jqgrid"></table>
            <div id="pjqgrid"></div>

            <br>

        </article>
        <!-- WIDGET END -->

    </div>

    <!-- end row -->

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
             */

            var pagefunction = function() {
            loadScript("js/plugin/jqgrid/jquery.jqGrid.min.js", run_jqgrid_function);
                    function run_jqgrid_function() {



                    jQuery("#jqgrid").jqGrid({
                    datatype : "json",
                            url : '/dlgc/getproxy.php?file=bloqueio_mac',
                            //datatype : "local",
                            mtype : 'GET',
                            height : 'auto',
                            jsonReader: {
                            repeatitems : false,
                                    id: "0"
                            },
                            colNames : ['Ações', 'MAC Address'],
                            colModel : [{
                            name : 'act',
                                    index : 'act',
                                    sortable : false,
                                    width : 20
                            }, {
                            name : 'valor',
                                    index : 'valor',
                                    editable : true,
                                    sortable : true
                            }],
                            rowNum : 100,
                            rowList : [100, 200, 300],
                            pager : '#pjqgrid',
                            sortname : 'valor',
                            toolbarfilter : false,
                            viewrecords : true,
                            sortorder : "asc",
                            gridComplete : function() {
                                
                            var ids = jQuery("#jqgrid").jqGrid('getDataIDs');
                                    for (var i = 0; i < ids.length; i++) {
                            var cl = ids[i];
                                    be = "<button class='btn btn-xs btn-default' data-original-title='Editar Linha' onclick=\"jQuery('#jqgrid').editRow('" + cl + "');\"><i class='fa fa-pencil'></i></button>";
                                    se = "<button class='btn btn-xs btn-default' data-original-title='Salvar Linha' onclick=\"jQuery('#jqgrid').saveRow('" + cl + "');\"><i class='fa fa-save'></i></button>";
                                    ca = "<button class='btn btn-xs btn-default' data-original-title='Cancelar' onclick=\"jQuery('#jqgrid').restoreRow('" + cl + "');\"><i class='fa fa-times'></i></button>";
                                    //ce = "<button class='btn btn-xs btn-default' onclick=\"jQuery('#jqgrid').restoreRow('"+cl+"');\"><i class='fa fa-times'></i></button>";
                                    //jQuery("#jqgrid").jqGrid('setRowData',ids[i],{act:be+se+ce});
                                    jQuery("#jqgrid").jqGrid('setRowData', ids[i], {
                            act : be + se + ca
                            });
                            }
                            },
                            editurl : "editproxy.php?file=bloqueio_mac",
                            caption : "Tabela",
                            multiselect : false,
                            autowidth : true,
                    });
                            jQuery("#jqgrid").jqGrid('navGrid', "#pjqgrid", {
                    edit : false,
                            add : false,
                            del : true
                    });
                            jQuery("#jqgrid").jqGrid('inlineNav', "#pjqgrid");
                            /* Add tooltips */
                            $('.navtable .ui-pg-button').tooltip({
                    container : 'body'
                    });
                            jQuery("#m1").click(function() {
                    var s;
                            s = jQuery("#jqgrid").jqGrid('getGridParam', 'selarrrow');
                            alert(s);
                    });
                            jQuery("#m1s").click(function() {
                    jQuery("#jqgrid").jqGrid('setSelection', "13");
                    });
                            // remove classes
                            $(".ui-jqgrid").removeClass("ui-widget ui-widget-content");
                            $(".ui-jqgrid-view").children().removeClass("ui-widget-header ui-state-default");
                            $(".ui-jqgrid-labels, .ui-search-toolbar").children().removeClass("ui-state-default ui-th-column ui-th-ltr");
                            $(".ui-jqgrid-pager").removeClass("ui-state-default");
                            $(".ui-jqgrid").removeClass("ui-widget-content");
                            // add classes
                            $(".ui-jqgrid-htable").addClass("table table-bordered table-hover");
                            $(".ui-jqgrid-btable").addClass("table table-bordered table-striped");
                            $(".ui-pg-div").removeClass().addClass("btn btn-sm btn-primary");
                            $(".ui-icon.ui-icon-plus").removeClass().addClass("fa fa-plus");
                            $(".ui-icon.ui-icon-pencil").removeClass().addClass("fa fa-pencil");
                            $(".ui-icon.ui-icon-trash").removeClass().addClass("fa fa-trash-o");
                            $(".ui-icon.ui-icon-search").removeClass().addClass("fa fa-search");
                            $(".ui-icon.ui-icon-refresh").removeClass().addClass("fa fa-refresh");
                            $(".ui-icon.ui-icon-disk").removeClass().addClass("fa fa-save").parent(".btn-primary").removeClass("btn-primary").addClass("btn-success");
                            $(".ui-icon.ui-icon-cancel").removeClass().addClass("fa fa-times").parent(".btn-primary").removeClass("btn-primary").addClass("btn-danger");
                            $(".ui-icon.ui-icon-seek-prev").wrap("<div class='btn btn-sm btn-default'></div>");
                            $(".ui-icon.ui-icon-seek-prev").removeClass().addClass("fa fa-backward");
                            $(".ui-icon.ui-icon-seek-first").wrap("<div class='btn btn-sm btn-default'></div>");
                            $(".ui-icon.ui-icon-seek-first").removeClass().addClass("fa fa-fast-backward");
                            $(".ui-icon.ui-icon-seek-next").wrap("<div class='btn btn-sm btn-default'></div>");
                            $(".ui-icon.ui-icon-seek-next").removeClass().addClass("fa fa-forward");
                            $(".ui-icon.ui-icon-seek-end").wrap("<div class='btn btn-sm btn-default'></div>");
                            $(".ui-icon.ui-icon-seek-end").removeClass().addClass("fa fa-fast-forward");
                            // update buttons

                            $(window).on('resize.jqGrid', function() {
                    $("#jqgrid").jqGrid('setGridWidth', $("#content").width());
                    });
                    }// end function

            }
    loadScript("js/plugin/jqgrid/grid.locale-en.min.js", pagefunction);

</script>
