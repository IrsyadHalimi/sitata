<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tables</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p>

<!-- DataTales Example -->

<div class="row">
  <div class="col-lg">
    <div class="card mb-4 py-3 border-left-primary">
      <div class="card-body">
        <center><img src="<?= base_url()?>assets/img/news/<?= $news_detail['gambar'] ;?>" alt="" width="520" height="320"></center>
      </div>
      <div class="card-body">
        <h5><strong><?= $news_detail['judul'] ;?></strong></h5>
          <?= $news_detail['isi_berita']; ?>
      </div>
      <div class="card-body">
        <i class="fas fa-eye fa-sm"></i> <?= $news_detail['dilihat'];?><br>
        Diposting pada <?= $news_detail['waktu_dibuat'];?>
      </div>
    </div>
  </div>
</div>
    