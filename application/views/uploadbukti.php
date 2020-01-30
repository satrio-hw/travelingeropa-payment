<!DOCTYPE html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>traveling eropa </title>
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- css -->
  <link href=<?= base_url("assets/css/bootstrap.min.css") ?> rel="stylesheet" media="screen">
  <link href=<?= base_url("assets/css/style.css") ?> rel="stylesheet" media="screen">
  <link href=<?= base_url("assets/color/default.css") ?> rel="stylesheet" media="screen">
  <script src=<?= base_url("assets/js/modernizr.custom.js") ?>></script>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
      font-size: 10pt;
    }

    th,
    td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    tr:hover {
      background-color: #c9d7f2;
    }
  </style>
  <!-- =======================================================
    Theme Name: Mamba
    Theme URL: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <!-- intro area -->

  <div id="intro">

    <div class="intro-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">

            <div class="brand">
              <h1><a onclick="return confirm('Kembali ke halaman pertama?')" href='https://travelingeropapay.com'><img src="<?= base_url('assets/img/logo_ori.png'); ?>" width=300 height=120/> </a>
                <div class="line-spacer"></div>
                <p><span> FORM DOWNPAYMENT </span></p>
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
            <h2>FORM DOWNPAYMENT</h2>
            <p> </p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">

          <div id="sendmessage"></div>
          <div id="errormessage"></div>

          <form action="<?= base_url('cdp/addpembayaran') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <div class="form-group">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <tr>
                    <th> Nama Pemesan :
                    </th>
                    <th> <?= $this->session->userdata('namapj') ?>
                    </th>
                  </tr>
                  <tr>
                    <th> Email Pemesan :
                    </th>
                    <th> <?= $this->session->userdata('email_pemesan') ?>
                    </th>
                  </tr>
                  <tr>
                    <th> Pembayaran :
                    </th>
                    <th> <?= $this->session->userdata('tipe_bayar') ?>
                    </th>
                  </tr>
                  <tr>
                    <th> untuk paket :
                    </th>
                    <th> (<?= $id_paket; ?>) <?= $nama; ?>
                    </th>
                  </tr>
                </table>
                <table class="table-bordered" id="dataTable" cellspacing="0">
                  <thead bgcolor="#4655f2">
                    <tr>
                      <th>
                        <font color="white">
                          Email Peserta
                      </th>
                      <th>
                        <font color="white">
                          Nama
                      </th>
                      <th>
                        <font color="white">
                          Tanggal Lahir
                      </th>
                      <th>
                        <font color="white">
                          Nomor Passport
                      </th>
                      <th>
                        <font color="white">
                          Expired Passport
                      </th>
                      <th>
                        <font color="white">
                          Status Tiket
                      </th>
                      <th>
                        <font color="white">
                          Nomor Hanphone
                      </th>
                      <th>
                        <font color="white">
                          Domisili
                      </th>

                      <th>
                        <font color="white">
                          Up Room
                      </th>
                      <th>
                        <font color="white">
                          Opsi.
                      </th>
                      <th>
                        <font color="white">
                          VISA
                      </th>
                      <th>
                        <font color="white">
                          Asuransi
                      </th>
                      <th>
                        <font color="white">
                          SIM Card
                      </th>
                      <th>
                        <font color="white">
                          Up. Bgg Perg
                      </th>
                      <th>
                        <font color="white">
                          Up. Bgg Pul
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php for ($i = 0; $i < intval($this->session->userdata('jmlh_psrta')); $i++) {
                    ?>
                      <tr>
                        <td>
                          <font color="black">
                            <?= strval($this->session->userdata('que_email_peserta')[$i]); ?>
                        </td>
                        <td>
                          <font color="black">
                            <?= strval($this->session->userdata('que_nama_peserta')[$i]); ?>
                        </td>
                        <td>
                          <font color="black">
                            <?= strval($this->session->userdata('que_ttl_peserta')[$i]); ?>
                        </td>
                        <td>
                          <font color="black">
                            <?= strval($this->session->userdata('que_nopass_peserta')[$i]); ?>
                        </td>
                        <td>
                          <font color="black">
                            <?= strval($this->session->userdata('que_exppass_peserta')[$i]); ?>
                        </td>
                        <td>
                          <font color="black">
                            <?= strval($this->session->userdata('que_tiket_peserta')[$i]); ?>
                        </td>
                        <td>
                          <font color="black">
                            <?= strval($this->session->userdata('que_nohp_peserta')[$i]); ?>
                        </td>
                        <td>
                          <font color="black">
                            <?= strval($this->session->userdata('que_domisili_peserta')[$i]); ?>
                        </td>

                        <td>
                          <font color="black">
                            <?= strval($this->session->userdata('que_upgrade_kamar')[$i]); ?>
                        </td>
                        <td>
                          <font color="black">
                            <?= strval($this->session->userdata('que_optional')[$i]); ?>
                        </td>
                        <td>
                          <font color="black">
                            <?= strval($this->session->userdata('que_visa')[$i]); ?>
                        </td>
                        <td>
                          <font color="black">
                            <?= strval($this->session->userdata('que_asuransi')[$i]); ?>
                        </td>
                        <td>
                          <font color="black">
                            <?= strval($this->session->userdata('que_simcard')[$i]); ?>
                        </td>
                        <td>
                          <font color="black">
                            <?= strval($this->session->userdata('que_bagasipergi')[$i]); ?>
                        </td>
                        <td>
                          <font color="black">
                            <?= strval($this->session->userdata('que_bagasipulang')[$i]); ?>
                        </td>
                      </tr>
                    <?php
                    } ?>
                  </tbody>
                </table>
              </div>
              <div class="form-group">
                <label>Upload Bukti Pembayaran ( <?= '<' ?> 5MB ):</label>
                <input type="file" name='bukti'required>
              </div>

              <div class="col-md-offset-2 col-md-8">
                <input onclick="return confirm('PASTIKAN DATA YANG ANDA MASUKAN BENAR ! \n\n Upload bukti bayar?')" type="submit" name="submitaddform" class="btn btn-primary btn-block" value="Next" />
              </div>
            </div>
          </form>


        </div>

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
  <script src='<?= base_url("assets/js/jquery.js") ?>'></script>
  <script src='<?= base_url("assets/js/bootstrap.min.js") ?>'></script>
  <script src='<?= base_url("assets/js/jquery.smooth-scroll.min.js") ?>'></script>
  <script src='<?= base_url("assets/js/jquery.dlmenu.js") ?>'></script>
  <script src='<?= base_url("assets/js/wow.min.js") ?>'></script>
  <script src='<?= base_url("assets/js/custom.js") ?>'></script>
  <script src='<?= base_url("assets/contactform/contactform.js") ?>'></script>

</body>

</html>x