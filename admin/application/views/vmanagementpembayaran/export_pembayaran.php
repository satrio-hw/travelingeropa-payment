<?php

header("Content-type: application/vnd-ms-excel");

header("Content-Disposition: attachment; filename=DataPembayaranTravelingEropa.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">

    <thead>

        <tr>
            <th>Status Pembayaran</th>
            <th>Email</th>
            <th>id_order</th>
            <th>waktu</th>
            <th>bukti</th>
            <th>Konfirmasi</th>
            <th>admin</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pembayaran as $record) : ?>
            <tr>
                <td><?php echo  $record['status_pembayaran']; ?></td>
                <td><?php echo  $record['email']; ?></td>
                <td><?php echo  $record['id_order']; ?></td>
                <td><?php echo  $record['waktu']; ?></td>
                <td><?php echo  '<img src="data:image/jpg;base64,' . base64_encode($record['bukti']) . '" width="200" height="200" >'; ?></td>
                <td>
                    <div>
                        <a onclick="return confirm('Anda yakin untuk melakukan konfirmasi?')" class="btn btn-primary btn-user"><i class="fas fa-check-circle"></i></a>
                        <a onclick="return confirm('Anda yakin untuk melakukan pembatalan?')" class="btn btn-danger btn-user"><i class="fas fa-times-circle"></i></a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>

</table>