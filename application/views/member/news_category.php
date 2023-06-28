<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $category[0]->kategori ; ?></h1>
<br>
<div class="row">
  <?php foreach ($news_by_category as $nc) { 
  ?> 
  <div class="col-lg-6">
    <a href="<?= base_url('member/member/news_increment/' . $nc->id_berita) ?>">
    <div class="card mb-4 py-3 border-left-primary">
      <div class="col mr-2">
        <div class="h5 mb-0 font-weight text-gray-800"><?= $nc->judul; ?></div>
      </div>
    </div>
    </a>
  </div>
  <?php }?>
</div>