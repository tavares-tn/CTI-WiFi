<?php
include('user.php');
?>
<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="utf-8">


        <title> CTIWifi </title>



        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Basic Styles -->
        <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">	
        <link rel="stylesheet" type="text/css" media="screen" href="css/font-awesome.min.css">

        <!-- SmartAdmin Styles : Please note (smartadmin-production.css) was created using LESS variables -->
        <link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-production.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-skins.min.css">	

        <!-- SmartAdmin RTL Support is under construction-->
        <link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-rtl.min.css"> 

        <!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
        <link rel="stylesheet" type="text/css" media="screen" href="css/demo.min.css">

        <!-- page related CSS -->
        <link rel="stylesheet" type="text/css" media="screen" href="css/lockscreen.min.css">

        <!-- FAVICONS -->
        <link rel="shortcut icon" href="img/favicons/favicon.ico" type="image/x-icon">
        <link rel="icon" href="img/favicons/favicon.png" type="image/x-icon">

        <!-- GOOGLE FONT -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">


    </head>
    <body>

        <div id="main" role="main">

            <!-- MAIN CONTENT -->

            <form class="lockscreen animated flipInY" action="index.php" method="post">
                <div class="logo">
                    <h1 class="semi-bold"><img src="img/ctiwifi2.png" alt="" />  CTIWifi  </h1>
                </div>
                <div>
                    <img src="img/avatars/male.png" alt="" width="120" height="120" />
                    <div>
                        <h1><i class="fa fa-user fa-3x text-muted air air-top-right hidden-mobile"></i>Por favor entre com seu<br/> usuário e senha <small><i class="fa fa-lock text-muted"></i> &nbsp;Site Protegido</small><?php
                            $erro = $user->getFailMessage();
                            if ($erro != null) {
                                echo $erro;
                            }
                            ?></h1>

                        <fieldset>

                            <section class="col col-6">
                                <label class="input"> 
                                    <input type="text" name="user" placeholder="Usuário">
                                    <i class="icon-prepend fa fa-user"></i>
                                </label>
                            </section>
                            <section class="col col-6">
                                <label class="input"> 
                                    <input type="password" name="password" placeholder="Senha">
                                    <i class="icon-prepend fa fa-lock"></i>
                                </label>
                            </section>


                            <section>
                                <div class="col col-6">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-key"></i> Entrar
                                    </button>
                                </div>
                            </section>

                    </div>

                </div>
                <p class="font-xs margin-top-5">
                    Colégio Técnico Industrial de Santa Maria- UFSM

                </p>
            </form>

        </div>

        <!--================================================== -->	

        <!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
        <script src="js/plugin/pace/pace.min.js"></script>

        <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script> if (!window.jQuery) {
                document.write('<script src="js/libs/jquery-2.0.2.min.js"><\/script>');
            }</script>

        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script> if (!window.jQuery.ui) {
                document.write('<script src="js/libs/jquery-ui-1.10.3.min.js"><\/script>');
            }</script>

        <!-- JS TOUCH : include this plugin for mobile drag / drop touch events 		
        <script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->

        <!-- BOOTSTRAP JS -->		
        <script src="js/bootstrap/bootstrap.min.js"></script>

        <!-- CUSTOM NOTIFICATION -->
        <script src="js/notification/SmartNotification.min.js"></script>

        <!-- JARVIS WIDGETS -->
        <script src="js/smartwidgets/jarvis.widget.min.js"></script>

        <!-- EASY PIE CHARTS -->
        <script src="js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

        <!-- SPARKLINES -->
        <script src="js/plugin/sparkline/jquery.sparkline.min.js"></script>

        <!-- JQUERY VALIDATE -->
        <script src="js/plugin/jquery-validate/jquery.validate.min.js"></script>

        <!-- JQUERY MASKED INPUT -->
        <script src="js/plugin/masked-input/jquery.maskedinput.min.js"></script>

        <!-- JQUERY SELECT2 INPUT -->
        <script src="js/plugin/select2/select2.min.js"></script>

        <!-- JQUERY UI + Bootstrap Slider -->
        <script src="js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

        <!-- browser msie issue fix -->
        <script src="js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

        <!-- FastClick: For mobile devices -->
        <script src="js/plugin/fastclick/fastclick.min.js"></script>

        <!--[if IE 7]>
                
                <h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
                
        <![endif]-->

        <!-- MAIN APP JS FILE -->
        <script src="js/app.min.js"></script>

    </body>
</html>