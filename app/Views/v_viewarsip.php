<div class="row">
        <div class="col-sm-12">
                <table class="tabel table-bordered">
                        <tr>
                                <th width="100px">No. Arsip</th>
                                <th width="30px">:</th>
                                <td><?= $arsip['no_arsip'] ?></td>
                                <th width="120px">Tanggal Upload</th>
                                <th width="30px">:</th>
                                <td><?= $arsip['tgl_upload'] ?></td>
                        </tr>
                        <tr height="50px">
                                <th>Nama Arsip</th>
                                <th>:</th>
                                <td><?= $arsip['nama_arsip'] ?></td>
                                <th width="120px">Tanggal Update</th>
                                <th width="30px">:</th>
                                <td><?= $arsip['tgl_update'] ?></td>
                        </tr>
                </table>
        </div>
        
        <br><br><br><br>
        <div class="col-sm-12">
                <iframe src="<?= base_url('file_arsip/'.$arsip['file_arsip']) ?>" 
                style="border: 3px solid blue;" height="600px" width="100%"></iframe>
        </div>
</div>