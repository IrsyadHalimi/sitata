<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $title ;?></h1>
<div class="card shadow mb-4">
    <?= $this->session->flashdata('message'); ?>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID Anggota</th>
                        <th>Nama</th>
                        <th>Isi Komentar</th>
                        <th>Judul Berita</th>
                        <th>Waktu Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID Anggota</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Foto Profil</th>
                        <th>Waktu Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                  <?php
                  foreach ($comment as $c) {
                  ?>
                    <tr>
                        <td><?= $c->id;?></td>
                        <td><?= $c->nama;?></td>
                        <td><?= $c->isi_komentar;?></td>
                        <td><?= $c->judul?></td>
                        <td><?= $c->waktu_dibuat_komentar ?></td>
                        <td><a href="<?= base_url('admin/Comment/delete/' . $c->id_komentar);?>" class="btn btn-danger"><i class="fas fa-trash fa-sm"></i></a></td>
                    </tr>
                  <?php } ?>
                </tbody>
            </table>
            <center><button><?php echo $links; ?></button></center>
        </div>
    </div>
</div>