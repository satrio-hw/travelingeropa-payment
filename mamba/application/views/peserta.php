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
              <p><span> ADD PESERTA </span></p>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>


  <!-- login -->
  <section id="contact" class="home-section bg-white">
    <div class="container">
      <div class="row">
        <div class="col-md-offset-2 col-md-8">
          <div class="section-heading">
            <h2> Add Peserta</h2>
            <p> </p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-offset-2 col-md-8">
          <div id="sendmessage"></div>
          <div id="errormessage"></div>
          <form action=<?= base_url("cdp/addpeserta") ?> method="post" >
          <div class="row form-group">
          <div class="col-md-12">
														<label for="fullname">Email Peserta</label>
														<input class="form-control <?php echo form_error('email_peserta') ? 'is-invalid' : '' ?>" type="text" name="email_peserta" placeholder="Email Peserta" />
                                                        <div class="invalid-feedback">
                                                        <?php echo form_error('email_peserta') ?>
                                                        </div>
                                                        </div>
                                                
                                                </div>
                                                <div class="row form-group">
													<div class="col-md-12">
														<label for="Alamat">Alamat</label>
														<input type="text" id="Alamat" class="form-control">
													</div>
                                                </div>
                                                <div class="row form-group">
													<div class="col-md-12">
                                                    <label for="nama">Nama Peserta</label>
                                    <input class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" type="text" name="nama" placeholder="Nama" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('nama') ?>
                                    </div>
                                    </div>
                                                </div>
                                                <div class="row form-group">
													<div class="col-md-12">
                                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input class="form-control <?php echo form_error('tanggal_lahir') ? 'is-invalid' : '' ?>" type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('tanggal_lahir') ?>
                                    </div>
                                                </div>
                                                <div class="row form-group">
													<div class="col-md-12">
                                                    <label for="no_pasport">Nomor Pasport</label>
                                    <input class="form-control <?php echo form_error('no_pasport') ? 'is-invalid' : '' ?>" type="number" name="no_pasport" placeholder="no_pasport" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('no_pasport') ?>
                                    </div>
                                                </div>
                                                <div class="row form-group">
													<div class="col-md-12">
                                                    <label for="exp_passport">Expired Passport</label>
                                    <input class="form-control <?php echo form_error('exp_passport') ? 'is-invalid' : '' ?>" type="date" name="exp_passport" placeholder="exp_passport" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('exp_passport') ?>
                                    </div>
                                                </div>
                                                <div class="row form-group">
													<div class="col-md-12">
                                                    <label for="exp_passport">Status Tiket</label>
                                                    <select name="status_tiket" class="form-control <?php echo form_error('status_tiket') ? 'is-invalid' : '' ?>">
                                        <option value="">--Pilih--</option>
                                        <option value="Inlcude">Include</option>
                                        <option value="Tidak Include">Tidak Include</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('status_tiket') ?>
                                    </div>
                                    <div class="row form-group">
													<div class="col-md-12">
                                                    <label for="hp">Nomor Handphone</label>
                                    <input class="form-control <?php echo form_error('hp') ? 'is-invalid' : '' ?>" type="number" name="hp" placeholder="Nomor Handphone" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('hp') ?>
                                    </div>
                                                </div>
                                                <div class="row form-group">
													<div class="col-md-12">
                                                    <label for="domisili">Domisili</label>
                                                    <input class="form-control <?php echo form_error('domisili') ? 'is-invalid' : '' ?>" type="text" name="domisili" placeholder="Domisili" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('domisili') ?>
                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-md-offset-2 col-md-8">
												<input type="submit" name = "submitdetail" class="btn btn-primary btn-block" value="Submit"/>
                        </div>
                    </div>
          </form>
         

        </div>
      
    </div>
  </section>

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