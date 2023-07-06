<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $title;?></h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
        <?php echo form_open_multipart('admin/news/new');?>
          <form action="" method="post">
            <label for=""><strong>Judul Berita</strong></label><?= form_error('judul', '<small class="text-danger pl-3">', '</small>');?>
            <div class="input-group">
              <input type="text" name="judul" class="form-control bg-light border-0 small" placeholder="Masukkan Judul Berita" 
              aria-label="Search" aria-describedby="basic-addon2" value="<?= set_value('judul'); ?>">
              
            </div>
            <br>
            <label for=""><strong>Isi Berita</strong></label><?= form_error('isiberita', '<small class="text-danger pl-3">', '</small>');?>
            <div class="input-group">
              <textarea class="form-control bg-light border-0 small" placeholder="Masukkan Isi Berita" name="isiberita" id="" cols="30" rows="10" value="<?= set_value('isiberita'); ?>"><?= set_value('isiberita'); ?></textarea>
            </div>
            <br>
            <label for=""><strong>Pilih Kategori Berita</strong></label><?= form_error('idkategori', '<small class="text-danger pl-3">', '</small>');?>
            <div class="input-group">
              <select name="idkategori"  class="form-control bg-light border-0 small" id="" >
                <option selected="true" value="" disabled="disabled">--PILIH--</option>
                <?php foreach ($category as $c) { ?>
                <option value="<?= $c->id_kategori ?>" required><?= $c->kategori;?></option>
                <?php } ?>
              </select>
            </div>
            <br>
            <label for=""><strong>Upload Gambar Berita</strong></label>
            <div class="input-group">
              <input type="file" name="gambar">
            </div>
            <br>
            <button type="reset" class="btn btn-warning"> Batal</button>  <button type="submit" class="btn btn-primary"> Simpan</button> 
          </form>
        <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>