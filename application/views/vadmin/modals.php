<form method="POST" action=<?= base_url("cadmin/admin/auth") ?>>
    <!--MODAL START-->
    <div class="modal fade" id="displayModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi Aksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h7 class="modal-title" id="exampleModalLongTitle">Anda yakin akan menghapus record dengan ID <?php echo  $id; ?> ?<br></p>
                        <h5><b> <?php echo  $nama_admin['nama']; ?> </b></h5>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="auth_pass" id="auth_pass" placeholder="Masukan Password Super Admin" required />
                            <input type="hidden" name="id_record" id="id_record" value=<?php echo  $id; ?> />
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <input type="submit" name="auth_confirm" class="btn btn-primary btn-user btn-block" value="Konfirmasi" />
                </div>
            </div>
        </div>
    </div>
    <!--MODAL END-->

</form>