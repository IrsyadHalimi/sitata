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
    <div class="card-header py-3">
        <a href="<?= base_url('News/new/');?>"><button class="btn btn-primary"><i class="fas fa-plus fa-sm"></i> Tambah Berita</button></a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Waktu Dibuat</th>
                        <th>Dilihat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Waktu Dibuat</th>
                        <th>Dilihat</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                  <?php
                  foreach ($news as $n) {
                  ?>
                    <tr>
                        <td><?= $n->judul;?></td>
                        <td><?= $n->kategori;?></td>
                        <td><?= $n->waktu_dibuat;?></td>
                        <td><?= $n->dilihat;?></td>
                        <td><a href="<?= base_url('News/preview/' . $n->id_berita);?>" class="btn btn-primary"><i class="fas fa-eye fa-sm"></i></a>  <a href="<?= base_url('News/news_edit/' . $n->id_berita);?>" class="btn btn-warning"><i class="fas fa-pen fa-sm"></i></a>  <a href="<?= base_url('News/delete/' . $n->id_berita);?>" class="btn btn-danger"><i class="fas fa-trash fa-sm"></i></a></td>
                    </tr>
                  <?php } ?>
                </tbody>
            </table>
            <button><?php echo $links; ?></button>
        </div>
    </div>
</div>