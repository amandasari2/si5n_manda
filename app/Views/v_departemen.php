<div class="row">
        <div class="col-md-12">
                <div class="box box-primary box-solid">
                        <div class="box-header with-border">
                                <h3 class="box-title">Data Departemen</h3>
                                <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add"><i class="fa fa-plus">Add</i></button>
                                </div>
                        </div>
                        <div class="box-body">

                        <?php
                                if (session()->getFlashdata('pesan')) {
                                        echo '<div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <i class="icon fa fa-check"></i> Success - ' ;
                                        echo session()->getFlashdata('pesan');
                                        echo '</h4></div>';
                                }
                        ?>

                                <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                                <tr>
                                                        <th>No.</th>
                                                        <th>Nama Departemen</th>
                                                        <th>Aksi</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                                <?php $no = 1;
                                                foreach($departemen as $key => $value) { ?>
                                                     <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $value['nama_departemen'] ?></td>
                                                        <td>
                                                                <button class="btn btn-sm btn-warning" data-toggle="modal"
                                                                data-target="#edit<?= $value['id_departemen']; ?>">Edit</button>

                                                                <button class="btn btn-sm btn-danger" data-toggle="modal"
                                                                data-target="#hapus<?= $value['id_departemen']; ?>">Hapus</button>
                                                        </td>
                                                     </tr>   
                                                <?php } ?>
                                        </tbody>
                                </table>
                        </div>
                </div>
        </div>
</div>

<div class="modal fade" id="add">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Departemen</h4>
              </div>
              <div class="modal-body">
                <?php echo form_open('departemen/tambah') ?>

                <div class="form-grup">
                        <label>Nama Departemen</label>
                        <input name="nama_departemen" class="form-control" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Keluar</button>
                <button type="sumbit" class="btn btn-primary">Simpan</button>
              </div>

              <?php echo form_close() ?>

            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

<!-- Modal Edit -->
<?php foreach ($departemen as $key => $value) { ?>
<div class="modal fade" id="edit<?= $value['id_departemen'] ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Departemen</h4>
              </div>
              <div class="modal-body">
                <?php echo form_open('departemen/edit/' .$value['id_departemen']) ?>

                <div class="form-grup">
                        <label>Nama Departemen</label>
                        <input name="nama_departemen" value="<?= $value['nama_departemen'] ?>" class="form-control" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Keluar</button>
                <button type="sumbit" class="btn btn-primary">Simpan</button>
              </div>

              <?php echo form_close() ?>

            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
<?php } ?>
        <!-- /.modal -->

<!-- Modal Hapus -->
<?php foreach ($departemen as $key => $value) { ?>
<div class="modal fade" id="hapus<?= $value['id_departemen'] ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Departemen</h4>
              </div>
              <div class="modal-body">
                Apakah anda yakin ingin menghapus data dari <?= $value['nama_departemen'] ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Keluar</button>
                
                <a href="<?= base_url('departemen/hapus/' .$value['id_departemen']) ?>" type="submit" class="btn btn-primary">Yes</a>
              </div>

            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
<?php } ?>
        <!-- /.modal -->
       