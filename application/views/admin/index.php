<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <h1 class="h4 mb-4 text-gray-800"><?= $title; ?></h1>
        <!-- Content Row -->
        <div class="row">
            
        <!-- Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= base_url('admin/Dashboard/get_member/'); ?>">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Anggota</div>
                                <div class="h2 mb-0 font-weight-bold text-gray-800"><?= $total_member ;?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            </div>
            <!-- Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= base_url('admin/News/'); ?>">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Berita
                                </div>
                                <div class="h2 mb-0 font-weight-bold text-gray-800"><?= $total_news; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= base_url('admin/Comment/'); ?>">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Komentar
                                </div>
                                <div class="h2 mb-0 font-weight-bold text-gray-800"><?= $total_comment;?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comment fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            </div>
        </div>
        <div class="row">
            <div class="col-xl col-md-6 mb-4">
        <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold">Komentar Terbaru</h6>
                    </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama Anggota</th>
                                    <th>Isi Komentar</th>
                                    <th>Judul Berita</th>
                                    <th>Waktu Dibuat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($recent_comment as $r_comment) {
                                ?>
                                <tr>
                                    <td><?= $r_comment->nama; ?></td>
                                    <td><a href="<?= base_url('admin/News/preview/'. $r_comment->id_berita); ?>"><?= $r_comment->isi_komentar;?></a></td>
                                    <td><?= $r_comment->judul;?></td>
                                    <td><?= $r_comment->waktu_dibuat_komentar;?></td>
                                    
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl col-md-6 mb-4">
        <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold">Berita Terpopuler</h6>
                    </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Judul Berita</th>
                                    <th>Waktu Dibuat</th>
                                    <th>Dilihat</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                foreach ($popular_news as $p) {
                                ?>
                                <tr>
                                    <td><a href="<?= base_url('admin/News/preview/'. $p->id_berita); ?>"><?= $p->judul;?></td>
                                    <td><?= $p->waktu_dibuat;?></td>
                                    <td><?= $p->dilihat;?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>