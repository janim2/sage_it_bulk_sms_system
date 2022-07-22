<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>SMS Portal-SageIT Services</title>
    <meta name="keywords" content="sms api, portal"/>
    <meta name="description" content="sms portal">
    <meta name="author" content="sms api">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic' rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">
    <link rel="stylesheet" type="text/css" href="assets/allcp/forms/css/forms.css">
    <link rel="shortcut icon" href="assets/img/sageit_logo.png">
</head>

<body class="utility-page sb-l-c sb-r-c" style="background:url(https://miro.medium.com/max/1400/1*nbevbHZPQ-9QSAn_pmTokA.png) no-repeat center center; background-size: cover;">
<div id="main1" class="animated fadeIn">

    <section id="content_wrapper">

        <div id="canvas-wrapper">
            <canvas id="demo-canvas"></canvas>
        </div>
        <section id="content">

            <div class="allcp-form theme-primary mw320 pull-center" id="login" >
                <div class="text-center mb20">
                    <img src="assets/img/new_portal.jpg" class="img-responsive" alt="Logo"/>
                </div>
                <div class="panel mw320">
                    <div class="panel-heading pn">
                        <span class="panel-title">WELCOME BACK </span>
                    </div>
                    <form method="post" id="login_form">
                        <div class="panel-body pn mv10">
                            
                            <div class="section">
                                <label for="username" class="field prepend-icon">
                                    <input type="text" name="login_email" id="login_email" class="gui-input"
                                           placeholder="email">
                                    <label for="username" class="field-icon">
                                        <i class="fa fa-user"></i>
                                    </label>
                                </label>
                            </div>

                            <div class="section">
                                <label for="password" class="field prepend-icon">
                                    <input type="password" name="login_password" id="login_password" class="gui-input"
                                           placeholder="Password">
                                    <label for="password" class="field-icon">
                                        <i class="fa fa-lock"></i>
                                    </label>
                                </label>
                            </div>

                            <div class="section">
                                <button type="submit" class="btn btn-bordered btn-primary pull-right loading">Log in to access your account</button>
                            </div>
                            
                            <div class="section">
                                <div class="bs-component pull-left pt5">
                                    <div class="mb5 lh25">
                                        <label for="remember">Don't have an account? <a href="register.php">Create an account</a></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </section>
</div>
<script src="assets/js/jquery/jquery-1.11.3.min.js"></script>
<script src="assets/js/jquery/jquery_ui/jquery-ui.min.js"></script>
<script src="assets/js/plugins/canvasbg/canvasbg.js"></script>
<script src="assets/js/utility/utility.js"></script>

<script src="assets/js/main.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {

        "use strict";

        // Init Theme Core
        Core.init();

        // Init Demo JS
        Demo.init();

        // Init CanvasBG
        CanvasBG.init({
            Loc: {
                x: window.innerWidth / 5,
                y: window.innerHeight / 10
            }
        });

    });
</script>


<?php include_once 'helpers/sweet_alert.php'; ?>

<script src="helpers/submittion_helper.js"></script>

<script>
    $(document).on('submit', '#login_form', function (event) {
        event.preventDefault();
        return submitFormQuery(this, "database/Account/login.php", ".loading", "Login Successful",
            "login");
    });
</script>

</body>

</html>
