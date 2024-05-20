<div class="row">
        <div class="col-md-6">
                <div class="box box-danger box-solid">
                        <div class="box-header with-border">
                                <h3 class="box-title">Edit Arsip</h3>
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

                                <?php echo form_open_multipart('arsip/editdata/'. $arsip['id_arsip']) ?>

                                <div class="form-group">
                                        <label>No Arsip</label>
                                        <input name="no_arsip" class="form-control" value="<?= $arsip['no_arsip']?>" readonly>
                                </div>

                                <div class="form-group">
                                        <label>Nama Arsip</label>
                                        <input name="nama_arsip" value="<?= $arsip['nama_arsip'] ?>" class="form-control">
                                </div>

                                <div class="form-group">
                                        <label>Kategori</label>
                                        <select name="id_kategori" class="form-control">
                                                <option value="<?= $arsip['id_kategori'] ?>"><?= $arsip['nama_kategori'] ?></option>
                                                <?php foreach ($kategori as $key => $value) { ?>
                                                        <option value="<?= $value['id_kategori'] ?>"><?= $value['nama_kategori'] ?></option>
                                                <?php } ?>
                                        </select>
                                </div>

                                 <div class="row">
                                 <div class="col-md-4">
                                         <label>File Arsip</label>
                                         <input type="pdf" name="file_arsip" value="<?= $arsip['file_arsip'] ?>" class="form-control">
                                 </div>


                                 <div class="col-md-8">
                                         <div class="form-group">
                                                 <label>Ganti File Arsip</label>
                                                 <input type="file" name="file_arsip" class="form-control">
                                         </div>
                                 </div>
                         </div>

                                <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="<?= base_url('arsip') ?>" class="btn btn-danger">Kembali</a>
                                </div>

                                <?php echo form_close() ?>
                        </div>
                </div>
        </div>
</div>