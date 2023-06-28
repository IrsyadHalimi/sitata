<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?= base_url('admin/News_category/new/');?>"><button class="btn btn-danger"><i class="fas fa-plus fa-sm"></i> Tambah Kategori</button></a>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID Kategori</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($category as $c) {
                  ?>
                    <tr>
                        <td><?= $c->id_kategori;?></td>
                        <td><?= $c->kategori;?></td>
                        <td><a href="<?= base_url('admin/News_category/category_edit/' . $c->id_kategori);?>" class="btn btn-danger"><i class="fas fa-pen fa-sm"></i></a>  
                        <?php
                        if ($c->id_kategori == 12) { ?>
                           
                        <?php } else {
                        ?>
                            <a href="<?= base_url('admin/News_category/delete/' . $c->id_kategori);?>" class="btn btn-danger"><i class="fas fa-trash fa-sm"></i></a>
                        <?php } ?>
                        </td>
                    </tr>
                  <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>