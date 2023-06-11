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
                        <th>Gambar Berita</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="<?= base_url();?>assets/img/news/<?= $news_detail['gambar'];?>" alt="Gambar Berita" width="720" height="360"></td>
                    </tr>
                </tbody>
                <thead>
            </table>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID Berita</th>
                        <th>Judul</th>
                        <th>Kategori Berita</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $news_detail['id_berita'];?></td>
                        <td><?= $news_detail['judul'];?></td>
                        <td><?= $news_detail['kategori'];?></td>
                    </tr>
                </tbody>
                <thead>
            </table>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Isi Berita</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $news_detail['isi_berita'];?></td>
                    </tr>
                </tbody>
                <thead>
            </table>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Waktu Dibuat</th>
                        <th>Dilihat</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $news_detail['waktu_dibuat'];?></td>
                        <td><?= $news_detail['dilihat'];?></td>
                    </tr>
                </tbody>
                <thead>
            </table>
        </div>
    </div>
</div>