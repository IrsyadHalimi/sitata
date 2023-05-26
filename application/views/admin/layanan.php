<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?= $judul; ?></h1>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6">
                <?php echo $this->session->flashdata('data'); ?>
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="<?= base_url('Admin/Layanan/tambahLayanan'); ?>"><button type="button" class="btn btn-info btn-circle"><i class="fa fa-plus"></i></button></a>
                        Tambah Data Layanan
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Jenis Layanan</th>
                                        <th>Kategori Layanan</th>
                                        <th>Deskripsi</th>
                                        <th>Biaya</th>
                                        <th>Rata-rata Durasi Layanan</th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($layanan as $l) {
                                    ?>
                                        <tr class="odd gradeX">
                                            <td><?= $l->nama_layanan; ?></td>
                                            <td><?= $l->nama_kategori; ?></td>
                                            <td><?= $l->deskripsi_layanan; ?></td>
                                            <td>Rp.<?= $l->biaya_layanan; ?></td>
                                            <td><?= $l->durasi_layanan; ?> Menit</td>
                                            <td>
                                                <img src="<?php echo base_url(); ?>assets/img/layanan/<?php echo $l->gambar_layanan; ?>" alt="" width="250" height="180">
                                            </td>
                                            <td><a href="<?= site_url('Admin/Layanan/editLayanan/' . $l->id_layanan); ?>"><button type="button" class="btn btn-warning">Ubah</button></a><br>
                                                <br><a href="<?= site_url('Admin/Layanan/hapusLayanan/' . $l->id_layanan); ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</div>