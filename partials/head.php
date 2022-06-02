<?php
  session_start();
  if(isset($_SESSION['sage_it_sms_id'])){
  }
  else{?>
<script>
    location.href = 'index.php';
</script>
<?php
}
?>
<!DOCTYPE html>
<html>

<head>
    <!-- -------------- Meta and Title -------------- -->
    <meta charset="utf-8">
    <title>Alliance - A Responsive Bootstrap 3 Admin Dashboard Template</title>
    <meta name="keywords" content="HTML5, Bootstrap 3, Admin Template, UI Theme" />
    <meta name="description" content="Alliance - A Responsive HTML5 Admin UI Framework">
    <meta name="author" content="ThemeREX">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- -------------- Fonts -------------- -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic' rel='stylesheet'
        type='text/css'>

    <!-- -------------- Icomoon -------------- -->
    <link rel="stylesheet" type="text/css" href="assets/fonts/icomoon/icomoon.css">

    <!-- -------------- FullCalendar -------------- -->
    <link rel="stylesheet" type="text/css" href="assets/js/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="assets/js/plugins/magnific/magnific-popup.css">

    <!-- -------------- Plugins -------------- -->
    <link rel="stylesheet" type="text/css" href="assets/js/plugins/c3charts/c3.min.css">

    <!-- -------------- CSS - theme -------------- -->
    <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">

    <!-- -------------- CSS - allcp forms -------------- -->
    <link rel="stylesheet" type="text/css" href="assets/allcp/forms/css/forms.css">

    <!-- -------------- Favicon -------------- -->
    <link rel="shortcut icon" href="assets/img/favicon.ico">

    <!-- -------------- Datatables CSS -------------- -->
    <link rel="stylesheet" type="text/css" href="assets/js/plugins/datatables/media/css/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css"
        href="assets/js/plugins/datatables/extensions/Editor/css/dataTables.editor.css">
    <link rel="stylesheet" type="text/css"
        href="assets/js/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css">

    <!-- sweet alert -->
    <link rel="stylesheet" href="sweetalert2.min.css">
</head>

<body class="dashboard-page">

    <!-- -------------- Body Wrap  -------------- -->
    <div id="main">

        <!-- -------------- Header  -------------- -->
        <header class="navbar navbar-fixed-top bg-dark">
            <div class="navbar-logo-wrapper">
                <a class="navbar-logo-text" href="dashboard.php">
                    <b><?= $_SESSION['sage_it_business_name']; ?></b>
                </a>
                <span id="sidebar_left_toggle" class="ad ad-lines"></span>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown dropdown-fuse">
                    <a href="#" class="dropdown-toggle fw600" data-toggle="dropdown">
                        <span class="hidden-xs">
                            <name><?= $_SESSION['sage_it_sms_name']; ?></name>
                        </span>
                        <span class="fa fa-caret-down hidden-xs mr15"></span>
                        <img src="assets/img/avatars/profile_avatar.jpg" alt="avatar" class="mw55">
                    </a>
                    <ul class="dropdown-menu list-group keep-dropdown w250" role="menu">

                        <!--    <li class="list-group-item">
                        <a href="#" class="animated animated-short fadeInUp">
                            <span class="fa fa-envelope-o"></span> Messages
                            <span class="label label-warning">54</span>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="animated animated-short fadeInUp">
                            <span class="fa fa-users"></span> Friends
                            <span class="label label-warning">6</span>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="animated animated-short fadeInUp">
                            <span class="fa fa-bell"></span> Notifications </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="animated animated-short fadeInUp">
                            <span class="fa fa-cogs"></span> Settings </a>
                    </li>  -->
                        <li class="dropdown-footer text-center">
                            <a onclick="Logout()" class="btn btn-primary btn-sm btn-bordered">
                                <span class="fa fa-power-off pr5"></span> Logout </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </header>
        <!-- -------------- /Header  -------------- -->

        <!-- -------------- Sidebar  -------------- -->
        <aside id="sidebar_left" class="nano nano-light affix">

            <!-- -------------- Sidebar Left Wrapper  -------------- -->
            <div class="sidebar-left-content nano-content">

                <!-- -------------- Sidebar Header -------------- -->
                <header class="sidebar-header">

                    <!-- -------------- Sidebar - Author -------------- -->
                    <div class="sidebar-widget author-widget">
                        <div class="media">
                            <a class="media-left" href="#">
                                <img src="assets/img/avatars/profile_avatar.jpg" class="img-responsive">
                            </a>

                            <div class="media-body">
                                <div class="media-links">
                                    <a href="#" /*class="sidebar-menu-toggle"*/>User Menu -</a> <a onclick="Logout()" style="cursor: pointer;"
                                        >Logout</a>
                                </div>
                                <div class="media-author"><?= $_SESSION['sage_it_sms_name']; ?></div>
                            </div>
                        </div>
                    </div>

                    <!-- -------------- Sidebar - Author Menu  -------------- -->
                    <div class="sidebar-widget menu-widget">
                        <div class="row text-center mbn">
                            <div class="col-xs-2 pln prn">
                                <a href="dashboard.php" class="text-primary" data-toggle="tooltip" data-placement="top"
                                    title="Dashboard">
                                    <span class="fa fa-dashboard"></span>
                                </a>
                            </div>
                            <div class="col-xs-4 col-sm-2 pln prn">
                                <a href="#" class="text-info" data-toggle="tooltip" data-placement="top" title="Stats">
                                    <span class="fa fa-bar-chart-o"></span>
                                </a>
                            </div>
                            <div class="col-xs-4 col-sm-2 pln prn">
                                <a href="#" class="text-system" data-toggle="tooltip" data-placement="top"
                                    title="Orders">
                                    <span class="fa fa-info-circle"></span>
                                </a>
                            </div>
                            <div class="col-xs-4 col-sm-2 pln prn">
                                <a href="#" class="text-warning" data-toggle="tooltip" data-placement="top"
                                    title="Invoices">
                                    <span class="fa fa-file"></span>
                                </a>
                            </div>
                            <div class="col-xs-4 col-sm-2 pln prn">
                                <a href="#" class="text-alert" data-toggle="tooltip" data-placement="top" title="Users">
                                    <span class="fa fa-users"></span>
                                </a>
                            </div>
                            <div class="col-xs-4 col-sm-2 pln prn">
                                <a href="#" class="text-danger" data-toggle="tooltip" data-placement="top"
                                    title="Settings">
                                    <span class="fa fa-cogs"></span>
                                </a>
                            </div>
                        </div>
                    </div>

                </header>
                <!-- -------------- /Sidebar Header -------------- -->