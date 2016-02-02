<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<!--
Project Name : SIM RESI (Pondok Kode Web Project Development)
Programmer   : Fika Ridaul Maulayya
More info visit :
FB           : https://www.facebook.com/fikaridaulmaulayya
Twitter      : https://twitter.com/fikacyber
Email/ Tlp   : ridaulmaulayya@gmail.com / 085785852224
-->
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="<?php print base_url() ?>favicon.png">

    <title><?php print $_SESSION['admin_title']; ?></title>

    <!--Core CSS -->
    <link href="<?php print base_url() ?>statics/admin/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php print base_url() ?>statics/admin/css/bootstrap-reset.css" rel="stylesheet">
    <link href="<?php print base_url() ?>statics/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!--external css-->
    <link rel="stylesheet" type="text/css" href="<?php print base_url() ?>assets/admin/js/gritter/css/jquery.gritter.css" />

    <!-- Custom styles for this template -->
    <link href="<?php print base_url() ?>statics/admin/css/style.css" rel="stylesheet">
    <link href="<?php print base_url() ?>statics/admin/css/style-responsive.css" rel="stylesheet" />

    <link rel="stylesheet" href="<?php print base_url() ?>statics/admin/assets/bootstrap-switch-master/build/css/bootstrap3/bootstrap-switch.css" />
    <link rel="stylesheet" type="text/css" href="<?php print base_url() ?>statics/admin/assets/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="<?php print base_url() ?>statics/admin/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" type="text/css" href="<?php print base_url() ?>statics/admin/assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php print base_url() ?>statics/admin/assets/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php print base_url() ?>statics/admin/assets/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php print base_url() ?>statics/admin/assets/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="<?php print base_url() ?>statics/admin/assets/bootstrap-datetimepicker/css/datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php print base_url() ?>statics/admin/assets/jquery-multi-select/css/multi-select.css" />
    <link rel="stylesheet" type="text/css" href="<?php print base_url() ?>statics/admin/assets/jquery-tags-input/jquery.tagsinput.css" />
    <link rel="stylesheet" type="text/css" href="<?php print base_url(); ?>statics/admin/js/bootstrap-toastr/toastr.min.css"/>
    <link rel="stylesheet" href="<?php print base_url() ?>statics/admin/js/tree/jquery.treeview.css" />

    <!--dynamic table-->
    <link href="<?php print base_url() ?>statics/admin/assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="<?php print base_url() ?>statics/admin/assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php print base_url() ?>statics/admin/assets/data-tables/DT_bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>statics/admin/css/jquery.fancybox-1.3.4.css" media="screen" />
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="js/ie8/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<section id="container" >
<!--header start-->
<div class="navbar-header">
<header class="header fixed-top clearfix">
    <button type="button" class="navbar-toggle dropdown-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="fa fa-bars"></span>
                  <span class="fa fa-bars"></span>
   </button>
<!--logo start-->
<div class="brand">

    <a href="<?php print base_url(); ?>admin/dashboard" class="logo">
        <img src="<?php print base_url() ?>statics/images/logo_admin.png" alt="">
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->
<div class="nav notify-row" id="top_menu">

</div>
<div class="nav navbar-nav horizontal-menu navbar-collapse collapse ">
<li><a href="<?php print base_url()?>" target="_BLANK"><i class="fa fa-globe"></i> Visit Site</a></li>
</div>

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="hidden" name="id_user_session" value="<?php print $this->session->userdata('user_id'); ?>">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="<?php print base_url() ?>statics/images/user/thumb/<?php echo $this->session->userdata("foto_user"); ?>">
                <span class="username"><?php print $this->session->userdata('nama_user'); ?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="<?php print base_url() ?>admin/master/user/edit/<?php echo $this->encryption->encode($this->session->userdata('user_id'));?>"><i class=" fa fa-user"></i>Profile</a></li>
                <li><a href="<?php print base_url() ?>admin/logout"><i class="fa fa-sign-out"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
    </ul>
    <!--search & user info end-->
</div>
</div>
</header>
<!--header end-->
