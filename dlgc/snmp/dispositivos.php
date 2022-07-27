
<div class="row">
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa fa-pencil-square-o fa-fw "></i> 
            Configurações
            <span>> 
                Dispositivos
            </span>
        </h1>
    </div>
</div>


<section id="widget-grid" class="">
    <div class="row">
        <article class="col-sm-12 col-md-12 col-lg-6"  style="width:100%">
            <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
                <div>
                    <div class="widget-body">

                        <form class="form-horizontal" >

                            <fieldset class="demo-switcher-1" >
                                <legend>Dispositivos encontrados</legend>
                                <div class="form-group" >

                                    <?php
                                    $ipdispositivos = array();
                                    $nomedispositivos = array();
                                    $localdispositivos = array();
                                    $marcadispositivos = array();
                                    $cont = 1;



                                    for ($i =1; $i < 90; $i++) {

                                        $ip = '10.10.1.' . $i;

                                        if (shell_exec(" snmpwalk -v 2c -c public {$ip} 1.3.6.1.2.1.1.5 ") != NULL) {

                                            $ipdispositivos[$cont] = $ip;
                                            $nome = shell_exec("snmpwalk -v 2c -c public {$ip} 1.3.6.1.2.1.1.5");
                                            $nomedispositivos[$cont] = (substr($nome, 31));
                                            $local = shell_exec("snmpwalk -v 2c -c public {$ip} 1.3.6.1.2.1.1.6");
                                            $localdispositivos[$cont] = (substr($local, 35));
                                            $fabricante = shell_exec("snmpwalk -v 2c -c public {$ip} 1.3.6.1.2.1.1.1");
                                            $marcadispositivos[$cont] = (substr($fabricante,  32));
                                            $cont++;
                                        }
                                        
                                    }
                                    
                                    $fim = (count($ipdispositivos) + 1);

                                    for ($a = 1; $a < $fim; $a++) {

                                    echo '<div class="col-md-10" style="width:190%">';
                                    echo '<label class="checkbox-inline">';
                                    echo '<input type="checkbox" class="checkbox style-0">';
                                    echo "<span>NOME: $nomedispositivos[$a]  |    IP: $ipdispositivos[$a]  |   LOCAL: $localdispositivos[$a] | FABRICANTE: $marcadispositivos[$a]</span>";
//                                    echo "<span> NOME: ap02 | IP: 10.10.1.27 | LOCAL: UFSM-CTISM-SSI-PAVMEC01-SFFS-SDFGDAX </span>";
                                    echo '</label></div>';
                                            
                                     }        





                                    ?>
                                </div>
                                
                                <section class="col col-6">
                                                                            <span>Limite de dispositivos conectados:</span>
                                                                            
										<label class="input"> 
											<input >
										</label>
									</section>
                            </fieldset>
                            <div class="form-actions">
								<div class="row">
									<div class="col-md-12">
										<button class="btn btn-default" type="submit">
											Cancelar
										</button>
										<button class="btn btn-primary" type="submit">
											<i class="fa fa-save"></i>
											Salvar
										</button>
									</div>
								</div>
							</div>
                        </form>

                    </div>
                </div>
            </div>
        </article>
    </div>
</section>


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
     * OR
     * 
     * loadScript(".../plugin.js", run_after_loaded);
     */

    // PAGE RELATED SCRIPTS

    // pagefunction

    var pagefunction = function () {

        // class switcher for radio and checkbox
        $('input[name="demo-switcher-1"]').change(function () {
            //alert($(this).val())
            $this = $(this);

            myNewClass = $this.attr('id');

            $('.demo-switcher-1 input[type="checkbox"]').removeClass();
            $('.demo-switcher-1 input[type="checkbox"]').addClass("checkbox " + myNewClass);

            $('.demo-switcher-1 input[type="radio"]').removeClass();
            $('.demo-switcher-1 input[type="radio"]').addClass("radiobox " + myNewClass);

        });

    };

    // end pagefunction

    // run pagefunction on load

    pagefunction();

</script>
