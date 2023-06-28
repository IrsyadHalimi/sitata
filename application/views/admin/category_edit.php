<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
        <?php echo form_open_multipart('admin/News_category/category_update/');?>
          <?php foreach ($category as $c) {
          ?>
          <form action="" method="post">
            <label for=""><strong>Kategori</strong></label><?= form_error('kategori', '<small class="text-danger pl-3">', '</small>');?>
            <div class="input-group">
              <input type="hidden" name="idkategori" class="form-control" value="<?= $c->id_kategori ?>">
              <input type="text" name="kategori" class="form-control bg-light border-0 small" value="<?= set_value('kategori'); ?><?= $c->kategori;?>" placeholder="Masukkan Kategori berita"
              aria-label="Search" aria-describedby="basic-addon2">
            </div>
            <br>
            <button type="reset" class="btn btn-warning"> Batal</button>  <button type="submit" class="btn btn-primary"> Simpan</button> 
          </form>
          <?php } ?>
        <?PHP echo form_close();?>
        </div>
      </div>
    </div>
  </div>
</div>