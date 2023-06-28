<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $title ;?></h1>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID Anggota</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Foto Profil</th>
                        <th>Waktu Registrasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID Anggota</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Foto Profil</th>
                        <th>Waktu Pendaftaran Akun</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                  <?php
                  foreach ($member as $m) {
                  ?>
                    <tr>
                        <td><?= $m->id;?></td>
                        <td><?= $m->nama;?></td>
                        <td><?= $m->email;?></td>
                        <td><img class="img-fluid" src="<?= base_url()?>assets/img/profile/<?= $m->image;?>" alt="Foto Profil" width="70" height="70"></td>
                        <td><?= date('d F Y', $m->date_created); ?></td>
                        <td><a href="<?= base_url('admin/dashboard/delete_member/' . $m->id);?>" class="btn btn-danger"><i class="fas fa-trash fa-sm"></i></a></td>
                    </tr>
                  <?php } ?>
                </tbody>
            </table>
            <center><button><?php echo $links; ?></button></center>
        </div>
    </div>
</div>