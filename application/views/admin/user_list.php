<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tables</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID Anggota</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Foto Profil</th>
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
                  foreach ($member as $m) {
                  ?>
                    <tr>
                        <td><?= $m->id;?></td>
                        <td><?= $m->nama;?></td>
                        <td><?= $m->email;?></td>
                        <td><?= $m->image;?></td>
                        <td><?= date('d F Y', $m->date_created); ?></td>
                        <td><a href="<?= base_url('Admin/delete_member/' . $m->id);?>" class="btn btn-danger"><i class="fas fa-trash fa-sm"></i> Hapus</a></td>
                    </tr>
                  <?php } ?>
                </tbody>
            </table>
            <center><button><?php echo $links; ?></button></center>
        </div>
    </div>
</div>