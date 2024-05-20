<div class="row">
        <div class="col-md-6">
                <div class="box box-danger box-solid">
                        <div class="box-header with-border">
                                <h3 class="box-title">Data User</h3>
                        </div>
                        <div class="box-body">
                                <?php
                                $errors = session()->getFlashdata('errors');
                                if (!empty($errors)) { ?>
                                        <div class="alert alert-danger alert-dismissible">
                                                <ul>
                                                        <?php foreach ($errors as $key => $value) { ?>
                                                                <li><?= esc($value) ?></li>
                                                        <?php } ?>
                                                </ul>
                                        </div>
                                <?php } ?>

                                <?php echo form_open_multipart('user/tambahdata') ?>
                                <div class="form-group">
                                        <label>Nama User</label>
                                        <input name="nama_user" class="form-control">
                                </div>

                                <div class="form-group">
                                        <label>Username</label>
                                        <input name="username" class="form-control">
                                </div>

                                <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control">
                                </div>

                                <div class="form-group">
                                        <label>Level</label>
                                        <select name="level" class="form-control">
                                                <option value="">-- Pilih --</option>
                                                <option value="1">Admin</option>
                                                <option value="2">User</option>
                                        </select>
                                </div>

                                <div class="form-group">
                                        <label>Departemen</label>
                                        <select name="id_departemen" class="form-control">
                                                <option value="">-- Pilih Departemen --</option>
                                                <?php foreach ($departemen as $key => $value) { ?>
                                                        <option value="<?= $value['id_departemen'] ?>"><?= $value['nama_departemen'] ?></option>
                                                <?php } ?>
                                        </select>
                                </div>

                                <div class="form-group">
                                        <label>Foto</label>
                                        <input type="file" name="foto" class="form-control">
                                </div>

                                <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="<?= base_url('user') ?>" class="btn btn-danger">Kembali</a>
                                </div>

                                <?php echo form_close() ?>
                        </div>
                </div>
        </div>
</div>