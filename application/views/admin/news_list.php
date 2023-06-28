<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h4 mb-4 text-gray-800"><?= $title; ?></h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?= base_url('admin/News/new/');?>"><button class="btn btn-danger"><i class="fas fa-plus fa-sm"></i> Tambah Berita</button></a>
    </div>
    <?= $this->session->flashdata('message'); ?>
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
                        <td><a href="<?= base_url('admin/News/preview/' . $n->id_berita);?>" class="btn btn-danger"><i class="fas fa-eye fa-sm"></i></a>  <a href="<?= base_url('admin/News/news_edit/' . $n->id_berita);?>" class="btn btn-danger"><i class="fas fa-pen fa-sm"></i></a>  <a href="<?= base_url('admin/News/delete/' . $n->id_berita);?>" class="btn btn-danger"><i class="fas fa-trash fa-sm"></i></a></td>
                    </tr>
                  <?php } ?>
                </tbody>
            </table>
            <center><button><?php echo $links; ?></button></center>
        </div>
    </div>
</div>