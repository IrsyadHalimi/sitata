<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $title;?></h1>
<h6 class="h6 mb-2 text-gray-800">Berita Terpopuler</h6>
<div class="row">
  <?php foreach ($popular_news as $p) {
  ?>
  <div class="col-lg-6">
    <div class="card mb-4 py-3 border-left-primary">
      <a href="<?= base_url('Member/news_increment/' . $p->id_berita);?>">
      <div class="card-body">
        <img src="<?= base_url()?>assets/img/news/<?= $p->gambar ;?>" alt="" width="460" height="260">
      </div>
      <div class="card-body">
        <h5><strong><?= $p->judul ;?></strong></h5>
          Baca Selengkapnya...
      </div>
      </a>
      <div class="card-body">
        <i class="fas fa-eye fa-sm"></i> <?= $p->dilihat;?><br>      
        Diposting pada <?= $p->waktu_dibuat;?>
      </div>
    </div>
  </div>
  <?php } ?>
</div>
<br><br>
<h6 class="h6 mb-2 text-gray-800">Berita Terbaru</h6>
<div class="row">
  <?php foreach ($recent_news as $r) {
  ?>
  <div class="col-lg-6">
    <div class="card mb-4 py-3 border-left-primary">
      <a href="<?= base_url('Member/news_increment/' . $r->id_berita);?>">
      <div class="card-body">
        <img src="<?= base_url()?>assets/img/news/<?= $r->gambar ;?>" alt="" width="460" height="260">
      </div>
      <div class="card-body">
        <h5><strong><?= $r->judul ;?></strong></h5>
          Baca Selengkapnya...
      </div>
      </a>
      <div class="card-body">
        <i class="fas fa-eye fa-sm"></i> <?= $r->dilihat;?><br>      
        Diposting pada <?= $r->waktu_dibuat;?>
      </div>
    </div>
  </div>
  <?php } ?>
</div>
    