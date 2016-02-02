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
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php print base_url() ?>favicon.png">

    <title>Login - <?php print $_SESSION['admin_title']; ?></title>

    <!--Core CSS -->
    <link href="<?php print base_url() ?>statics/admin/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php print base_url() ?>statics/admin/css/bootstrap-reset.css" rel="stylesheet">
    <link href="<?php print base_url() ?>statics/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="<?php print base_url() ?>statics/admin/css/style.css" rel="stylesheet">
    <link href="<?php print base_url() ?>statics/admin/css/style-responsive.css" rel="stylesheet" />
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="js/ie8/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-body">

    <div class="container">

      <form class="form-signin" id="form1" method="post" action="<?php print base_url() ?>admin/auth">
          <h2 class="form-signin-heading"><img src="<?php print base_url() ?>statics/images/logo_login.png"/></h2>
        <?php print $this->session->flashdata('login_info')?>
        <?php print $login_info ?>
        <div class="login-wrap">
            <div class="user-login-info">
                <div class="input-group m-bot15">
                <span class="input-group-addon btn-primary"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control" autocomplete="off" title="Masukan Username Anda" placeholder="Username" name="user_name" id="user_name">
                </div>
                <div class="input-group m-bot15">
                <span class="input-group-addon btn-primary"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control" autocomplete="off" title="Masukan Password Anda" placeholder="Password" name="pass_user" id="pass_user">
                </div>
            </div>
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Ingatkan Saya
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Lupa Password ?</a>

                </span>
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit"><i class="fa fa-unlock-alt"></i> Sign in</button>

            <div class="registration">
                <?php echo $_SESSION['admin_footer']; ?>
            </div>

        </div>

          <!-- Modal Forgot Password -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
            <form action="admin/reset_password" method="post">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Lupa Password ?</h4>
                      </div>
                      <div class="modal-body">
                          <p>Masukan email anda untuk melakukan reset password.</p>
                          <input type="email" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-danger" type="button">Kembali</button>
                          <button class="btn btn-primary" type="button">Kirim</button>
                      </div>
                  </div>
              </div>
            </form>
          </div>
          <!-- modal -->

          <!-- Modal Warning Remember Me -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="ModalRememberMe" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Peringatan !</h4>
                      </div>
                      <div class="modal-body">
                          <p>Jika anda pilih Ingat Saya maka sesi login anda akan diingat selama 30 hari!</p>
                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                      </div>
                  </div>
              </div>
          </div>
          <!-- modal -->
      </form>
    </div>
    <!-- Placed js at the end of the document so the pages load faster -->
    <!--Core js-->
    <script type="text/javascript" src="<?php print base_url() ?>statics/tadmin/js/jquery-validate/jquery.validate.min.js"></script>
    <script src="<?php print base_url() ?>statics/admin/js/jquery-validate/validation-init.js"></script>
    <script src="<?php print base_url() ?>statics/admin/js/lib/jquery.js"></script>
    <script src="<?php print base_url() ?>statics/admin/bs3/js/bootstrap.min.js"></script>
    <script>
    // click remember me
    $('#rememberme').click(function(){
    if ($(this).is(':checked')) {
        alert("Jika anda pilih Ingat Saya maka sesi login anda akan diingat selama 30 hari!");
    }
    });
    // akhir click remember me </script>
  </body>
</html>
