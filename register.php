<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>SMS Portal-SageIT Services</title>
    <meta name="keywords" content="HTML5, Bootstrap 3, Admin Template, UI Theme" />
    <meta name="description" content="Alliance - A Responsive HTML5 Admin UI Framework">
    <meta name="author" content="ThemeREX">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic' rel='stylesheet'
        type='text/css'>
    <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">
    <link rel="stylesheet" type="text/css" href="assets/allcp/forms/css/forms.css">
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <!-- sweet alert -->
    <link rel="stylesheet" href="sweetalert2.min.css">
</head>

<body class="utility-page sb-l-c sb-r-c">
    <div id="main" class="animated fadeIn">
        <section id="content_wrapper">

            <div id="canvas-wrapper">
                <canvas id="demo-canvas"></canvas>
            </div>
            <section id="content" class="">

                <div class="allcp-form theme-primary mw600" id="register">
                    <div class="bg-primary mw600 text-center mb20 br3 pv15">
                        <img src="assets/img/logo.png" alt="" />
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading pn">
                            <span class="panel-title">Registration form </span>
                        </div>

                        <form method="post" id="register_form">
                            <div class="panel-body pn">

                                <div class="section">
                                    <label for="fullname" class="field prepend-icon">
                                        <input type="test" name="fullname" id="fullname" class="gui-input"
                                            placeholder="Full Name" required>
                                        <label for="fullname" class="field-icon">
                                            <i class="fa fa-user"></i>
                                        </label>
                                    </label>
                                </div>

                                <div class="section">
                                    <label for="email" class="field prepend-icon">
                                        <input type="email" name="email" id="email" class="gui-input"
                                            placeholder="Email address" required>
                                        <label for="email" class="field-icon">
                                            <i class="fa fa-envelope"></i>
                                        </label>
                                    </label>
                                </div>

                                <div class="section">
                                    <label for="business-name" class="field prepend-icon">
                                        <input type="text" name="business_name" id="business_name" class="gui-input"
                                            placeholder="Business Name" required>
                                        <label for="username" class="field-icon">
                                            <i class="fa fa-user"></i>
                                        </label>
                                    </label>
                                </div>

                                <div class="section">
                                    <label for="phone-number" class="field prepend-icon">
                                        <input type="text" name="phonenumber" id="phonenumber" class="gui-input"
                                            placeholder="Phone Number" required>
                                        <label for="phone-number" class="field-icon">
                                            <i class="fa fa-user"></i>
                                        </label>
                                    </label>
                                </div>

                                <div class="section">
                                    <label for="password" class="field prepend-icon">
                                        <input type="password" name="password" id="password" class="gui-input"
                                            placeholder="Create a password" required>
                                        <label for="password" class="field-icon">
                                            <i class="fa fa-lock"></i>
                                        </label>
                                    </label>
                                </div>

                                <div class="section">
                                    <label for="confirmPassword" class="field prepend-icon">
                                        <input type="password" name="confirmPassword" id="confirmPassword" class="gui-input"
                                            placeholder="Retype your password" required> 
                                        <label for="confirmPassword" class="field-icon">
                                            <i class="fa fa-unlock-alt"></i>
                                        </label>
                                    </label>
                                </div>
                                <!-- -------------- /section -------------- -->

                                <div class="section">
                                    <div class="bs-component pull-left mt10">
                                        <div class="checkbox-custom checkbox-primary mb5">
                                            <input type="checkbox" id="agree" name="agree">
                                            <label for="agree">I agree to the
                                                <a href="#"> terms of use. </a></label>
                                        </div>
                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-bordered btn-primary loading">I Accept -
                                            Create Account
                                        </button>
                                    </div>
                                </div>
                                <!-- -------------- /section -------------- -->

                            </div>
                            <!-- -------------- /Form -------------- -->
                            <div class="panel-footer">

                            </div>
                            <!-- -------------- /Panel Footer -------------- -->
                        </form>
                    </div>
                </div>
                <!-- -------------- /Spec Form -------------- -->

            </section>
            <!-- -------------- /Content -------------- -->

        </section>
        <!-- -------------- /Main Wrapper -------------- -->

    </div>
    <!-- -------------- /Body Wrap  -------------- -->

    <!-- -------------- Scripts -------------- -->

    <!-- -------------- jQuery -------------- -->
    <script src="assets/js/jquery/jquery-1.11.3.min.js"></script>
    <script src="assets/js/jquery/jquery_ui/jquery-ui.min.js"></script>

    <!-- -------------- CanvasBG JS -------------- -->
    <script src="assets/js/plugins/canvasbg/canvasbg.js"></script>

    <!-- -------------- Theme Scripts -------------- -->
    <script src="assets/js/utility/utility.js"></script>
    <!-- <script src="assets/js/demo/demo.js"></script> -->
    <script src="assets/js/main.js"></script>

    <!-- -------------- Page JS -------------- -->
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
        $(document).on('submit', '#register_form', function (event) {
            event.preventDefault();
            if($('input[name="agree"]').is(':checked')) return submitFormQuery(this, "database/Account/register.php", ".loading", "Registration Successfully",
                "register");
            alert("Agree to terms and conditions");
        });
    </script>

    <!-- -------------- /Scripts -------------- -->

</body>

</html>