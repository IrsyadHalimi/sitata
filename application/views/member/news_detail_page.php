<div class="container-fluid">

<!-- Page Heading -->

<!-- DataTales Example -->

<div class="row">
  <div class="col-lg">
    <div class="card mb-4 py-3 border-left-primary">
      <div class="card-body">
        <h1 class="h3 mb-2 text-gray-800"><strong><?= $news_detail['judul'];?></strong></h1>
      </div>
      <div class="card-body">
        <center><img src="<?= base_url()?>assets/img/news/<?= $news_detail['gambar'] ;?>" alt="" width="520" height="320"></center>
      </div>
      <div class="card-body">
          <?= $news_detail['isi_berita']; ?>
      </div>
      <div class="card-body">
        <i class="fas fa-eye fa-sm"></i> <?= $news_detail['dilihat'];?><br>
        Diposting pada <?= $news_detail['waktu_dibuat'];?>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg">
    <div class="card mb-4 py-3 border-left-primary">
      <div class="card-body">
      <?php echo form_open_multipart('comment/new/'. $news_detail['id_berita']);?>
      <form action="" method="post">
        <strong><label for="">Komentar</label></strong><br>
        <?php foreach ($komentar as $k) {
        ?>
        <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" width="30" height="30"><strong><?= $k->nama;?>:</strong> <?= $k->isi_komentar ;?><br><?= $k->waktu_dibuat_komentar ;?><br><br>
        <?php } ?>
        <br><br><br>
        <div class="input-group">
          <input type="hidden" name="idberita" class="form-control" value="<?= $news_detail['id_berita']; ?>">  
          <input type="hidden" name="iduser" class="form-control" value="<?= $user['id']; ?>">  
          <input type="text" name="isikomentar" class="form-control bg-light border-0 small" placeholder="Masukkan komentar anda" 
          aria-label="Search" aria-describedby="basic-addon2" value=""><button type="submit" class="btn btn-primary"> Kirim</button> 
        </div>
      </form>
      <?php echo form_close();?>
      </div>
    </div>
  </div>
</div>