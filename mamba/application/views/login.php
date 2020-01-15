<!DOCTYPE html>
<html>

<head>
  <title>traveling eropa </title>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- css -->
  <link href=<?= base_url("assets/css/bootstrap.min.css")?> rel="stylesheet" media="screen">
  <link href=<?= base_url("assets/css/style.css")?> rel="stylesheet" media="screen">
  <link href=<?= base_url("assets/color/default.css")?> rel="stylesheet" media="screen">
  <script src=<?= base_url("assets/js/modernizr.custom.js")?>></script>
  <!-- =======================================================
    Theme Name: Mamba
    Theme URL: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <div class="menu-area">
    <div id="dl-menu" class="dl-menuwrapper">
      <button class="dl-trigger">Open Menu</button>
      <ul class="dl-menu">
        <li>
          <a href="#intro">Home</a>
        </li>
        <li><a href="<?= base_url('login'); ?>">Login</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#works">Works</a></li>
        <li><a href="#contact">Contact</a></li>
        <li>
          <a href="#">Sub Menu</a>
          <ul class="dl-submenu">
            <li><a href="#">Sub menu</a></li>
            <li><a href="#">Sub menu</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- /dl-menuwrapper -->
  </div>

  <!-- intro area -->
  <div id="intro">

    <div class="intro-text">
      <div class="container">
        <div class="row">


          <div class="col-md-12">

            <div class="brand">
              <h1><a href=<?= base_url('maincontrol')?>>TRAVELING EROPA</a>
              <div class="line-spacer"></div>
              <p><span> R E G I S T E R </span></p>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>


 <body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form class="form-login" action="index.html">
        <h2 class="form-login-heading">sign in now</h2>
        <div class="login-wrap">
          <input type="text" class="form-control" placeholder="User ID" autofocus>
          <br>
          <input type="password" class="form-control" placeholder="Password">
          <label class="checkbox">
            <input type="checkbox" value="remember-me"> Remember me
            <span class="pull-right">
            <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
            </span>
            </label>
          <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
          <hr>
          <div class="login-social-link centered">
            <p>or you can sign in via your social network</p>
            <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
            <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
          </div>
          <div class="registration">
            Don't have an account yet?<br/>
            <a class="" href="#">
              Create an account
              </a>
          </div>
        </div>
        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Forgot Password ?</h4>
              </div>
              <div class="modal-body">
                <p>Enter your e-mail address below to reset your password.</p>
                <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-theme" type="button">Submit</button>
              </div>
            </div>
          </div>
        </div>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p>&copy; Travelingeropa</p>
          <div class="credits">
            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Mamba
            -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>

        </div>
      </div>
    </div>
  </footer>

  
  <!-- js -->
  <script src='<?= base_url("assets/js/jquery.js")?>'></script>
  <script src='<?= base_url("assets/js/bootstrap.min.js")?>'></script>
  <script src='<?= base_url("assets/js/jquery.smooth-scroll.min.js")?>'></script>
  <script src='<?= base_url("assets/js/jquery.dlmenu.js")?>'></script>
  <script src='<?= base_url("assets/js/wow.min.js")?>'></script>
  <script src='<?= base_url("assets/js/custom.js")?>'></script>
  <script src='<?= base_url("assets/contactform/contactform.js")?>'></script>

</body>

</html>x