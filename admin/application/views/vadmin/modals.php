<form method="POST" action=<?= site_url("cadmin/admin/deletelist") ?>>
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
                    <h7 class="modal-title" id="exampleModalLongTitle">Upaya menghapus record dengan email <?php echo  $email; ?><br></p>
                        <h5><b> <?php echo  $record_admin['nama']; ?> </b></h5>
                        <div class="form-group">
                            <label>Autentikasi dibutuhkan</label>
                            <input type="password" class="form-control" name="auth_pass" id="auth_pass" placeholder="Masukan Password Super Admin" required />
                            <input type="hidden" name="email_record" id="email_record" value=<?php echo  $email; ?> />
                        </div>

                </div>
                <div class="modal-footer">
                    <input type="submit" name="auth_confirm" class="btn btn-danger btn-user" value="Konfirmasi" />
                    <button type="button" class="btn btn-secondary  btn-block" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
    <!--MODAL END-->

</form>