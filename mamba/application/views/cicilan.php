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
        <li><a href="<?= base_url('cdp'); ?>">Form DP</a></li>
        <li><a href="<?= base_url('ccicilan'); ?>">Form Cicilan</a></li>
      </ul>
    </div>
    <!-- /dl-menuwrapper -->
  </div>
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
              <p><span> FORM CICILAN </span></p>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>


        <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class></i>Form Cicilan</h3>
        <!-- BASIC FORM VALIDATION -->
    
            <div class="form-panel">
              <form role="form" class="form-horizontal style-form">
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">ID Order</label>
                  <div class="col-md-5">
                  <select class="form-control" name="id_order" id="id_order" required>
                                                <?php
                                                foreach ($id_order as $id_order) { ?>
                                                    <option value='<?= $id_order->id_order; ?>'>(<?= $id_order->id_order; ?>) <?= $paket->nama; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                  </div>
                </div>
                <div class="form-group has-error">
                  <label class="col-lg-2 control-label">Upload Bukti Pembayaran ( <?= '<' ?> 5MB ):</label>
                                <input type="file" name='bukti'>
                                <?= date('YmdHisu'); ?>
                            </div>
                            <input type="submit" name = "submit" class="btn btn-primary btn-block" value="Submit    "/>
              </form>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
        <!-- row -->
      </section>
      <!-- /wrapper -->
    </section>
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

</html>