<!DOCTYPE html>
<!--
  package      SIM RESI (Pondok Kode Web Project Development)
  version      Beta Version 0.1
  programmer   Fika Ridaul Maulayya
  copyright    Copyright © 2015 Pondok Kode - Web Project Development.
  link         http://pondokkode.com
-->
<html lang="en">
<head>
    <!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php print $_SESSION['description'] ?>">
<meta name="keywords" content="<?php print $_SESSION['keywords'] ?>">
<meta name="author" content="Fika Ridaul Maulayya">
<meta name="google-site-verification" content="h9NYnax1vhzr5lO7ZBWCJyA-oyqTN69HrF1bO2K5cJs" />

<title><?php print $_SESSION['web_title'] ?></title>

<link rel="stylesheet" href="<?php print base_url()?>statics/web/assets/css/validationEngine.jquery.css" type="text/css"/>

<link rel="stylesheet" href="<?php print base_url()?>statics/web/assets/css/template.css" type="text/css"/>
<!-- Bootstrap core CSS -->

<link href="<?php print base_url()?>statics/web/assets/css/bootstrap.min.css" rel="stylesheet">

<!-- Font awesome CSS -->
<link href="<?php print base_url()?>statics/web/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">

<!-- Documentation extras -->

<link href="<?php print base_url()?>statics/web/assets/css/docs.min.css" rel="stylesheet">

<!--[if lt IE 9]><script src="../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="<?php print base_url()?>statics/web/assets/js/ie-emulation-modes-warning.js"></script>

<!-- Favicons -->
<link rel="apple-touch-icon" href="/apple-touch-icon.png">
<link rel="icon" href="/favicon.ico">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-146052-10', 'getbootstrap.com');
  ga('send', 'pageview');
</script>
  </head>
  <body class="bs-docs-home">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
              <li class="<?php print $home ?>">
                <a href="<?php print base_url()?>"><i class="fa fa-home"></i> Home</a>
              </li>
              <li class="<?php print $jne ?>">
                <a href="<?php print base_url()?>resi-pengiriman/jne/"><i class="fa fa-truck fa-flip-horizontal"></i> JNE (Jalur Nugraha Ekakurir)</a>
              </li>
              <li class="<?php print $pos ?>">
                <a href="<?php print base_url()?>resi-pengiriman/pos/"><i class="fa fa-truck fa-flip-horizontal"></i> POS (PT. Pos Indonesia)</a>
              </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="<?php print $help ?>">
              <a href="<?php print base_url()?>help/"><i class="fa fa-question-circle"></i> Help</a>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
  </div>
</header>
