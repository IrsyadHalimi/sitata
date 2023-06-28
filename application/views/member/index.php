<div class="container-fluid">
  <h2><strong>Selamat Datang Di Website SITATA</strong></h2> <h4>Portal Berita Desa Cilandak</h4>
</div><br>
<img class="img-fluid" src="<?= base_url('assets/img/pexels-afta-putta-gunawan-1250343.jpg') ?>" alt="">
<div class="container-fluid">
<!-- Page Heading -->
<br><h1 class="h3 mb-2 text-gray-800"><?= $title;?></h1><br>
<h5 class="h5 mb-2 text-gray-800">Pengumuman Terbaru</h5>
<div class="row">
  <?php 
  if (empty($announce_news)) { ?>
    <div class="col-lg-6">
      <?= 'Tidak ada berita';?>
    </div>
  <?php
  } else {
  foreach ($announce_news as $a) {
  ?>
  <div class="col-lg-6">
    <div class="card mb-4 py-3 border-left-primary">
      <a href="<?= base_url('member/Member/news_increment/' . $a->id_berita);?>">
      <div class="card-body">
        <img class="img-fluid" src="<?= base_url()?>assets/img/news/<?= $a->gambar ;?>" alt="" width="460" height="260">
      </div>
      <div class="card-body">
        <h5><strong><?= $a->judul ;?></strong></h5>
          Baca Selengkapnya...
      </div>
      </a>
      <div class="card-body">
        <i class="fas fa-eye fa-sm"></i> <?= $a->dilihat;?><br>      
        Diposting pada <?= $a->waktu_dibuat;?>
      </div>
    </div>
  </div>
  <?php } 
  }?>
</div>
<br><br>
<h5 class="h5 mb-2 text-gray-800">Berita Terpopuler</h5>
<div class="row">
  <?php foreach ($popular_news as $p) {
  ?>
  <div class="col-lg-6">
    <div class="card mb-4 py-3 border-left-primary">
      <a href="<?= base_url('member/Member/news_increment/' . $p->id_berita);?>">
      <div class="card-body">
        <img class="img-fluid" src="<?= base_url()?>assets/img/news/<?= $p->gambar ;?>" alt="" width="460" height="260">
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
<h5 class="h5 mb-2 text-gray-800">Berita Terbaru</h5>
<div class="row">
  <?php foreach ($recent_news as $r) {
  ?>
  <div class="col-lg-6">
    <div class="card mb-4 py-3 border-left-primary">
      <a href="<?= base_url('member/Member/news_increment/' . $r->id_berita);?>">
      <div class="card-body">
        <img class="img-fluid" src="<?= base_url()?>assets/img/news/<?= $r->gambar ;?>" alt="" width="460" height="260">
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
    