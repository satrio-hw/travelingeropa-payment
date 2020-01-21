<?php

header("Content-type: application/vnd-ms-excel");

header("Content-Disposition: attachment; filename=DataPembayaranTravelingEropa.xls");

header("Pragma: no-cache");

header("Expires: 0");

$this->load->model('paket_model');
?>
<?php $packages = $this->db->get('paket')->result_array();
foreach ($packages as $paket) :
    $order = $this->db->get_where('order', ['id_paket' => $paket['id_paket']])->result_array();
    if ($order != Null) {
        $idorder = $order[0]['id_order'];
?>
        <br>
        <br>
        <br>
        <table border="1" width="100%">

            <thead>
                <tr>
                    <th>Nama Paket</th>
                    <th>:</th>
                    <th><?= $paket['nama'] ?></th>
                </tr>
                <tr>
                    <th>Harga Paket</th>
                    <th>:</th>
                    <th><?= $paket['harga'] ?></th>
                </tr>
                <tr>
                    <th>Harga Land Tour</th>
                    <th>:</th>
                    <th><?= $paket['harga_in_landtour'] ?></th>
                </tr>
                <tr>
                    <th>Upgrade Kamar</th>
                    <th>:</th>
                    <th><?= $paket['upgrade_kamar'] ?></th>
                </tr>
                <tr>
                    <th>Opsional</th>
                    <th>:</th>
                    <th><?= $paket['keterangan_tambahan'] ?></th>
                </tr>
                <tr>
                    <th>Visa</th>
                    <th>:</th>
                    <th><?= $paket['visa'] ?></th>
                </tr>
                <tr>
                    <th>Asuransi</th>
                    <th>:</th>
                    <th><?= $paket['asuransi'] ?></th>
                </tr>
                <tr>
                    <th>SIM Card</th>
                    <th>:</th>
                    <th><?= $paket['simcard'] ?></th>
                </tr>
                <tr>
                    <th>Upgrade Bagasi 1-way</th>
                    <th>:</th>
                    <th><?= $paket['upgrade_bagasi'] ?></th>
                </tr>
                <tr>
                    <th>Jml peserta</th>
                    <th>:</th>
                    <th><?php
                        $sql = "SELECT COUNT(email_peserta) as totalpeserta FROM peserta WHERE peserta.id_order = $idorder";
                        $totalpeserta = $this->db->query($sql)->result_array();
                        echo $totalpeserta[0]['totalpeserta'];
                        ?></th>
                </tr>
                <tr>
                    <th>Jml Incl. Tiket</th>
                    <th>:</th>
                    <th><?php
                        $sql = "SELECT COUNT(email_peserta) as totalpeserta FROM peserta WHERE peserta.id_order = $idorder and peserta.status_tiket = 'Include'";
                        $totalpeserta = $this->db->query($sql)->result_array();
                        echo $totalpeserta[0]['totalpeserta'];
                        ?></th>
                </tr>
                <tr>
                    <th>Jml Excl. Tiket</th>
                    <th>:</th>
                    <th><?php
                        $sql = "SELECT COUNT(email_peserta) as totalpeserta FROM peserta WHERE peserta.id_order = $idorder and peserta.status_tiket = 'Tidak Include'";
                        $totalpeserta = $this->db->query($sql)->result_array();
                        echo $totalpeserta[0]['totalpeserta'];
                        ?></th>
                </tr>
                <tr>
                    <th>Jml Peserta cancel</th>
                    <th>:</th>
                    <th><?php
                        $sql = "SELECT COUNT(email_peserta) as totalpeserta FROM peserta,pembayaran WHERE peserta.id_order = '20200121000117000000' and peserta.id_order = pembayaran.id_order and pembayaran.konfirmasi = 'REJECTED' ";
                        $totalpeserta = $this->db->query($sql)->result_array();
                        echo $totalpeserta[0]['totalpeserta'];
                        ?></th>
                </tr>
            </thead>
        </table>
        <br>
        <table border="1" width="100%">
            <thead>
                <tr>
                    <th>Nama Peserta</th>
                    <th>Tgl Lahir</th>
                    <th>No.Paspor</th>
                    <th>Tgl. Exp. Pass</th>
                    <th>Incl/Excl Tiket</th>
                    <th>No. Hp</th>
                    <th>Email</th>
                    <th>Domisili</th>
                    <th></th>

                    <th>Up. Kamar</th>
                    <th>Opsional</th>
                    <th>Visa</th>
                    <th>Asuransi</th>
                    <th>SIM Card</th>
                    <th>Upg. Bagasi Pergi</th>
                    <th>Upg. Bagai Pulang</th>
                    <th></th>

                    <th>DP</th>
                    <th>Cicilan 1</th>
                    <th>Cicilan 2</th>
                    <th>Cicilan 3</th>
                    <th>Cicilan 4</th>
                    <th>Pelunasan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $pesertaall = $this->db->get_where('peserta', ['id_order' => $idorder])->result_array();
                #var_dump($pesertaall);
                foreach ($pesertaall as $peserta) :
                    $pembayaran = $this->db->get_where('pembayaran', ['id_order'])->result_array();
                ?>
                    <tr>
                        <td><?php echo  $peserta['nama']; ?></td>
                        <td><?php echo  $peserta['tanggal_lahir']; ?></td>
                        <td>
                            <?php if ($peserta['no_passport'] == null) {
                                echo '-';
                            } else {
                                echo $peserta['no_passport'];
                            } ?></td>
                        <td>
                            <?php if ($peserta['exp_passport'] == null) {
                                echo '-';
                            } else {
                                echo $peserta['exp_passport'];
                            } ?>
                        <td><?php echo  $peserta['status_tiket']; ?></td>
                        <td><?php echo  $peserta['hp']; ?></td>
                        <td><?php echo  $peserta['email_peserta']; ?></td>
                        <td><?php echo  $peserta['domisili']; ?></td>
                        <td></td>

                        <td><?php echo  $peserta['upkamar']; ?></td>
                        <td><?php echo  $peserta['opsional']; ?></td>
                        <td><?php echo  $peserta['visa']; ?></td>
                        <td><?php echo  $peserta['asuransi']; ?></td>
                        <td><?php echo  $peserta['simcard']; ?></td>
                        <td><?php echo  $peserta['upbagasipergi']; ?></td>
                        <td><?php echo  $peserta['upbagasipulang']; ?></td>
                        <td></td>

                        <td><?php
                            $DP = $this->db->get_where('pembayaran', ['id_order' => $idorder, 'pembayaran' => 'DP'])->result_array();
                            if ($DP == Null) {
                                echo '-';
                            } else {
                                echo "(" . $DP[0]['waktu'] . ") <br>" . $DP[0]['konfirmasi'] . " : <br>" . $DP[0]['admin'];
                            } ?></td>
                        <td><?php
                            $cicilan1 = $this->db->get_where('pembayaran', ['id_order' => $idorder, 'pembayaran' => 'cicilan1'])->result_array();
                            if ($cicilan1 == Null) {
                                echo '-';
                            } else {
                                echo "(" . $cicilan1[0]['waktu'] . ") <br>" . $cicilan1[0]['konfirmasi'] . " : <br>" . $cicilan1[0]['admin'];
                            } ?></td>
                        <td><?php
                            $cicilan2 = $this->db->get_where('pembayaran', ['id_order' => $idorder, 'pembayaran' => 'cicilan2'])->result_array();
                            if ($cicilan2 == Null) {
                                echo '-';
                            } else {
                                echo "(" . $cicilan2[0]['waktu'] . ") <br>" . $cicilan2[0]['konfirmasi'] . " : <br>" . $cicilan2[0]['admin'];
                            } ?></td>
                        <td><?php
                            $cicilan3 = $this->db->get_where('pembayaran', ['id_order' => $idorder, 'pembayaran' => 'cicilan3'])->result_array();
                            if ($cicilan3 == Null) {
                                echo '-';
                            } else {
                                echo "(" . $cicilan3[0]['waktu'] . ") <br>" . $cicilan3[0]['konfirmasi'] . " : <br>" . $cicilan3[0]['admin'];
                            } ?></td>
                        <td><?php
                            $cicilan4 = $this->db->get_where('pembayaran', ['id_order' => $idorder, 'pembayaran' => 'cicilan4'])->result_array();
                            if ($cicilan4 == Null) {
                                echo '-';
                            } else {
                                echo "(" . $cicilan4[0]['waktu'] . ") <br>" . $cicilan4[0]['konfirmasi'] . " : <br>" . $cicilan4[0]['admin'];
                            } ?></td>
                        <td><?php
                            $pelunasan = $this->db->get_where('pembayaran', ['id_order' => $idorder, 'pembayaran' => 'pelunasan'])->result_array();
                            if ($pelunasan == Null) {
                                echo '-';
                            } else {
                                echo "(" . $pelunasan[0]['waktu'] . ") <br>" . $pelunasan[0]['konfirmasi'] . " : <br>" . $pelunasan[0]['admin'];
                            } ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
<?php }
endforeach; ?>
<br>
<br>
<b>TABEL PENANGGUNG JAWAB</b>
<?php $pj = $this->db->get('pemesan')->result_array();
?>
<table border="1" width="100%">
    <thead bgcolor="#4655f2">
        <tr>
            <th>
                <font color="black">Email PJ</font>
            </th>
            <th>
                <font color="black">Nama PJ</font>
            </th>
            <th>
                <font color="black">No. Hp</font>
            </th>
            <th>
                <font color="black">Tanggal Lahir</font>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($pj as $PJ) { ?>
            <tr>
                <th>
                    <?php echo  $PJ['email']; ?>
                </th>
                <th>
                    <?= $PJ['nama']; ?>
                </th>
                <th>
                    <?= $PJ['hp']; ?>
                </th>
                <th>
                    <?= $PJ['tanggal_lahir']; ?>
                </th>
            </tr>
        <?php } ?>
    </tbody>
</table>