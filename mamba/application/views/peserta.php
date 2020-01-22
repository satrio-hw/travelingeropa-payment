<!DOCTYPE html>
<html>

<head>
  <title>traveling eropa </title>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- css -->
  <link href=<?= base_url("assets/css/bootstrap.min.css") ?> rel="stylesheet" media="screen">
  <link href=<?= base_url("assets/css/style.css") ?> rel="stylesheet" media="screen">
  <link href=<?= base_url("assets/color/default.css") ?> rel="stylesheet" media="screen">
  <script src=<?= base_url("assets/js/modernizr.custom.js") ?>></script>
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
              <h1><a href=<?= base_url('maincontrol') ?>>TRAVELING EROPA</a>
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

      <form action="<?= base_url("cdp/addpembayaran") ?>" method="post" enctype="multipart/form-data">
        <div class="row">
          <h5>Data Diri Peserta:</h5>
          <div class="row">
            <label for="email_peserta">Email Peserta<font color='red'>*</font></label>
            <input class="form-control <?php echo form_error('email_peserta') ? 'is-invalid' : '' ?>" type="text" name="email_peserta" placeholder="Email Peserta" required />
            <div class="invalid-feedback">
              <?php echo form_error('email_peserta') ?>
            </div>
          </div>
          <div class="row">
            <br>
            <label for="nama">Nama Peserta<font color='red'>*</font></label>
            <input class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" type="text" name="nama" placeholder="Nama Peserta" required />
            <div class="invalid-feedback">
              <?php echo form_error('nama') ?>
            </div>
          </div>
        </div>
        <div class="row">
          <br>
          <label for="tanggal_lahir">Tanggal Lahir<font color='red'>*</font></label>
          <input class="form-control <?php echo form_error('tanggal_lahir') ? 'is-invalid' : '' ?>" type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" required />
          <div class="invalid-feedback">
            <?php echo form_error('tanggal_lahir') ?>
          </div>
        </div>
        <div class="row">
          <br>
          <label for="no_passport">Nomor Passport</label>
          <input class="form-control <?php echo form_error('no_passport') ? 'is-invalid' : '' ?>" type="text" name="no_passport" placeholder="Nomor Passport" />
          <div class="invalid-feedback">
            <?php echo form_error('no_passport') ?>
          </div>
        </div>
        <div class="row">
          <br>
          <label for="exp_passport">Expired Passport</label>
          <input class="form-control <?php echo form_error('exp_passport') ? 'is-invalid' : '' ?>" type="date" name="exp_passport" placeholder="Expired Passport" />
          <div class="invalid-feedback">
            <?php echo form_error('exp_passport') ?>
          </div>
        </div>
        <div class="row">
          <br>
          <label for="status_tiket">Status Tiket<font color='red'>*</font></label>
          <select name="status_tiket" class="form-control <?php echo form_error('status_tiket') ? 'is-invalid' : '' ?>" required>
            <option value="">--Pilih--</option>
            <option value="Include">Include</option>
            <option value="Tidak Include">Tidak Include</option>
          </select>
          <div class="invalid-feedback">
            <?php echo form_error('status_tiket') ?>
          </div>
        </div>
        <div class="row">
          <br>
          <label for="hp">Nomor Handphone<font color='red'>*</font></label>
          <input class="form-control <?php echo form_error('hp') ? 'is-invalid' : '' ?>" type="number" name="hp" min=0 placeholder="Nomor Handphone" required />
          <div class="invalid-feedback">
            <?php echo form_error('hp') ?>
          </div>
        </div>
        <div class="row">
          <br>
          <label for="domisili">Domisili<font color='red'>*</font></label>
          <input class="form-control <?php echo form_error('domisili') ? 'is-invalid' : '' ?>" type="text" name="domisili" placeholder="Domisili" required />
          <div class="invalid-feedback">
            <?php echo form_error('domisili') ?>
          </div>
        </div>

        <br>
        <br>
        <h5>Layanan /pax :</h5>
        <div class="row">
          <label for="upkamar">Upgrade Kamar<font color='red'>*</font></label>
          <select name="upkamar" class="form-control <?php echo form_error('status_tiket') ? 'is-invalid' : '' ?>" required>
            <option value="">--Pilih--</option>
            <option value="Include">Include</option>
            <option value="Tidak Include">Tidak Include</option>
          </select>
        </div>
        <div class="row">
          <br>
          <label for="optional">Opsional<font color='red'>*</font></label>
          <select name="optional" class="form-control <?php echo form_error('status_tiket') ? 'is-invalid' : '' ?>" required>
            <option value="">--Pilih--</option>
            <option value="Include">Include</option>
            <option value="Tidak Include">Tidak Include</option>
          </select>
        </div>
        <div class="row">
          <br>
          <label for="visa">Visa<font color='red'>*</font></label>
          <select name="visa" class="form-control <?php echo form_error('status_tiket') ? 'is-invalid' : '' ?>" required>
            <option value="">--Pilih--</option>
            <option value="Include">Include</option>
            <option value="Tidak Include">Tidak Include</option>
          </select>
        </div>
        <div class="row">
          <br>
          <label for="asuransi">Asuransi<font color='red'>*</font></label>
          <select name="asuransi" class="form-control <?php echo form_error('status_tiket') ? 'is-invalid' : '' ?>" required>
            <option value="">--Pilih--</option>
            <option value="Include">Include</option>
            <option value="Tidak Include">Tidak Include</option>
          </select>
        </div>
        <div class="row">
          <br>
          <label for="simcard">SIM Card<font color='red'>*</font></label>
          <select name="simcard" class="form-control <?php echo form_error('status_tiket') ? 'is-invalid' : '' ?>" required>
            <option value="">--Pilih--</option>
            <option value="Include">Include</option>
            <option value="Tidak Include">Tidak Include</option>
          </select>
        </div>
        <div class="row">
          <br>
          <label for="bagasipergi">Upgrade Bagasi Pergi<font color='red'>*</font></label>
          <select name="bagasipergi" class="form-control <?php echo form_error('status_tiket') ? 'is-invalid' : '' ?>" required>
            <option value="">--Pilih--</option>
            <option value="Include">Include</option>
            <option value="Tidak Include">Tidak Include</option>
          </select>
        </div>
        <div class="row">
          <br>
          <label for="bagasipulang">Upgrade Bagasi Pulang<font color='red'>*</font></label>
          <select name="bagasipulang" class="form-control <?php echo form_error('status_tiket') ? 'is-invalid' : '' ?>" required>
            <option value="">--Pilih--</option>
            <option value="Include">Include</option>
            <option value="Tidak Include">Tidak Include</option>
          </select>
        </div>
        <br>
        <?php if ($this->session->userdata('loop_input_psrta') == 1) {
        ?>
          <input class="btn btn-primary" type="submit" name="submitdetail" value="Selanjutnya" />
        <?php
        } else {
        ?><input class="btn btn-primary" type="submit" name="submitdetail" value=">> Peserta <?= (($this->session->userdata('jmlh_psrta') - $this->session->userdata('loop_input_psrta') + 2)); ?> " />
        <?php
        } ?>

      </form>
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
  <script src='<?= base_url("assets/js/jquery.js") ?>'></script>
  <script src='<?= base_url("assets/js/bootstrap.min.js") ?>'></script>
  <script src='<?= base_url("assets/js/jquery.smooth-scroll.min.js") ?>'></script>
  <script src='<?= base_url("assets/js/jquery.dlmenu.js") ?>'></script>
  <script src='<?= base_url("assets/js/wow.min.js") ?>'></script>
  <script src='<?= base_url("assets/js/custom.js") ?>'></script>
  <script src='<?= base_url("assets/contactform/contactform.js") ?>'></script>

</body>

</html>x