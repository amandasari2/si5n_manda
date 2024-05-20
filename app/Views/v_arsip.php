<div class="row">
        <div class="col-md-24" style="width: 109%">
                <div class="box box-primary box-solid">
                        <div class="box-header with-border">
                                <h3 class="box-title">Data Arsip</h3>
                                <div class="box-tools pull-right">
                                <div class="box-tools pull-right">
                                        <a href="<?= base_url('arsip/tambah') ?>" class="btn btn-primary" ><i class="fa fa-plus">Add</i></a>
                                </div>
                                </div>
                        </div>
                        <div class="box-body">

                                <?php
                                if (session()->getFlashdata('pesan')) {
                                        echo '<div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <i class="icon fa fa-check"></i> Success - ';
                                        echo session()->getFlashdata('pesan');
                                        echo '</h4></div>';
                                }
                                ?>

                                <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                                <tr>
                                                        <th>No.</th>
                                                        <th>No.Arsip</th>
                                                        <th>Nama Arsip</th>
                                                        <th>Kategori</th>
                                                        <th>Tanggal Upload</th>
                                                        <th>Tanggal Update</th>
                                                        <th>Departemen</th>
                                                        <th>User</th>
                                                        <th>File Arsip</th>
                                                        <th>Aksi</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                                <?php $no = 1;
                                                foreach ($arsip as $key => $value) { ?>
                                                        <tr>
                                                                <td><?= $no++; ?></td>
                                                                <td><?= $value['no_arsip'] ?></td>
                                                                <td><?= $value['nama_arsip'] ?></td>
                                                                <td><?= $value['nama_kategori'] ?></td>
                                                                <td><?= $value['tgl_upload'] ?></td>
                                                                <td><?= $value['tgl_update'] ?></td>
                                                                <td><?= $value['nama_departemen'] ?></td>
                                                                <td><?= $value['nama_user'] ?></td>
                                                                <td class="text-center"><a href="<?= base_url('arsip/viewpdf/'.$value['id_arsip']) ?>">
                                                                <i class="fa fa-file-pdf-o fa-2x label-danger"></i></a></td>
                                                                <td>
                                                                        <a href="<?= base_url('arsip/edit/' . $value['id_arsip']) ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>

                                                                        <a href="<?= base_url('arsip/hapus/' . $value['id_arsip']) ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>

                                                                </td>
                                                        </tr>
                                                <?php } ?>
                                        </tbody>
                                </table>
                        </div>
                </div>
        </div>
</div>

<!-- Modal Hapus -->
<?php foreach ($arsip as $key => $value) { ?>
        <div class="modal fade" id="hapus<?= $value['id_arsip'] ?>">
                <div class="modal-dialog">
                        <div class="modal-content">
                                <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Delete Arsip</h4>
                                </div>
                                <div class="modal-body">
                                        Apakah anda yakin ingin menghapus data dari <?= $value['nama_arsip'] ?>
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Keluar</button>

                                        <a href="<?= base_url('arsip/hapus/' . $value['id_arsip']) ?>" type="submit" class="btn btn-primary">Yes</a>
                                </div>

                        </div>
                        <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
        </div>
<?php } ?>
<!-- /.modal -->