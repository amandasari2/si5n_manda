<div class="row">
        <div class="col-md-6">
                <div class="box box-secondary box-solid">
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

                                <?php echo form_open_multipart('user/editdata/' . $user['id_user']) ?>
                                <div class="form-group">
                                        <label>Nama User</label>
                                        <input name="nama_user" value="<?= $user['nama_user'] ?>" class="form-control">
                                </div>

                                <div class="form-group">
                                        <label>Username</label>
                                        <input name="username" value="<?= $user['username'] ?>" class="form-control" readonly>
                                </div>

                                <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" value="<?= $user['password'] ?>" name="password" class="form-control">
                                </div>

                                <div class="form-group">
                                        <label>Level</label>
                                        <select name="level" class="form-control">
                                                <option value="<?= $user['level'] ?>"><?php if ($user['level'] == 1) {
                                                                                                echo 'Admin';
                                                                                        } else {
                                                                                                echo 'User';
                                                                                        } ?>
                                                </option>
                                                <option value="1">Admin</option>
                                                <option value="2">User</option>
                                        </select>
                                </div>

                                <div class="form-group">
                                        <label>Departemen</label>
                                        <select name="id_departemen" class="form-control">
                                                <option value="<?= $user['id_departemen'] ?>"><?= $user['nama_departemen'] ?></option>
                                                <?php foreach ($departemen as $key => $value) { ?>
                                                        <option value="<?= $value['id_departemen'] ?>"><?= $value['nama_departemen'] ?></option>
                                                <?php } ?>
                                        </select>
                                </div>

                                <div class="row">
                                        <div class="col-md-4">
                                                <label>Foto User</label>
                                                <img src="<?= base_url('foto/' . $user['foto']) ?>" width="100px">
                                        </div>


                                        <div class="col-md-8">
                                                <div class="form-group">
                                                        <label>Ganti Foto</label>
                                                        <input type="file" name="foto" class="form-control">
                                                </div>
                                        </div>
                                </div>

                                <div class="form-group">
                                        <br>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="<?= base_url('user') ?>" class="btn btn-danger">Kembali</a>
                                </div>

                                <?php echo form_close() ?>
                        </div>
                </div>
        </div>
</div>