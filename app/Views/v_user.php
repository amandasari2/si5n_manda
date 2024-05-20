<style>
        th {
                background-color: red;
                color: whitesmoke;
        }
</style>

<div class="row">
        <div class="col-md-12">
                <div class="box box-info box-solid">
                        <div class="box-header with-border">
                                <h3 class="box-title">Data User</h3>
                                <div class="box-tools pull-right">
                                        <a href="<?= base_url('user/tambah') ?>" class="btn btn-success" ><i class="fa fa-plus">Add</i></a>
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
                                                <tr >
                                                        <th>No.</th>
                                                        <th>Nama User</th>
                                                        <th>Username</th>
                                                        <th>Password</th>
                                                        <th>Level</th>
                                                        <th>Departemen</th>
                                                        <th>Foto</th>
                                                        <th>Aksi</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                                <?php $no = 1;
                                                foreach ($user as $key => $value) { ?>
                                                        <tr>
                                                                <td><?= $no++; ?></td>
                                                                <td><?= $value['nama_user'] ?></td>
                                                                <td><?= $value['username'] ?></td>
                                                                <td><?= $value['password'] ?></td>
                                                                <td><?php if ($value['level'] == 1) {
                                                                                echo 'Admin';
                                                                        } else {
                                                                                echo 'User';
                                                                        } ?></td>
                                                                <td><?= $value['nama_departemen'] ?></td>
                                                                <td><img src="<?= base_url('foto/' . $value['foto']) ?>" width="70px"></td>
                                                                <td>
                                                                        <a href="<?= base_url('user/edit/'.$value['id_user']) ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>

                                                                        <a href="<?= base_url('user/hapus/'.$value['id_user']) ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>

                                                                </td>
                                                        </tr>
                                                <?php } ?>
                                        </tbody>
                                </table>
                        </div>
                </div>
        </div>
</div>