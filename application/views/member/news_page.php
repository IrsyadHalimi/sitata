<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tables</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p>

<!-- DataTales Example -->

<div class="row">
  <?php foreach ($news as $n) {
  ?>
  <div class="col-lg-6">
    <div class="card mb-4 py-3 border-left-primary">
      <a href="<?= base_url('Member/news_increment/' . $n->id_berita);?>">
      <div class="card-body">
        <img src="<?= base_url()?>assets/img/news/<?= $n->gambar ;?>" alt="" width="460" height="260">
      </div>
      <div class="card-body">
        <h5><strong><?= $n->judul ;?></strong></h5>
          Baca Selengkapnya...
      </div>
      </a>
      <div class="card-body">
        <i class="fas fa-eye fa-sm"></i> <?= $n->dilihat;?><br>      
        Diposting pada <?= $n->waktu_dibuat;?>
      </div>
    </div>
  </div>
  <?php } ?>
</div>
<center><button><?php echo $links; ?></button>
</center>
    