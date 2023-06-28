<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $title;?></h1>
<br>
<div class="row">
  <?php foreach ($category as $c) { 
  ?> 
  <div class="col-lg-6">
    <div class="card mb-4 py-3 border-left-primary">
      <a href="<?= base_url('member/Category/news_by_category/') . $c->id_kategori?>">
      <div class="col mr-2">
        <div class="h5 mb-0 font-weight text-gray-800"><?= $c->kategori; ?></div>
      </div>
    </div>
  </div>
  <?php }?>
</div>