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
        <?php echo form_open_multipart('admin/News_category/new');?>
          <form action="" method="post">
            <label for=""><strong>Kategori</strong></label><?= form_error('kategori', '<small class="text-danger pl-3">', '</small>');?>
            <div class="input-group">
              <input type="text" name="kategori" class="form-control bg-light border-0 small" placeholder="Masukkan Nama Kategori" 
              aria-label="Search" aria-describedby="basic-addon2" value="<?= set_value('kategori'); ?>">
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