<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $judul; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('assets/tampilan_admin/'); ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?= base_url('assets/tampilan_admin/'); ?>css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url('assets/tampilan_admin/'); ?>css/startmin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= base_url('assets/tampilan_admin/'); ?>css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Silakan Registrasi</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="<?= base_url("autentifikasi/registrasi") ?>" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" id="nama" name="name" placeholder="Nama Lengkap" value="<?= set_value('name'); ?>" autofocus><?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="email" id="email" name="email" placeholder="Alamat email" value="<?= set_value('email'); ?>"><?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" id="password1" name="password1" placeholder="Kata Sandi"><?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" id="password2" name="password2" placeholder="Konfirmasi Kata Sandi">
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">Buat Akun</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url('assets/tampilan_admin/'); ?>js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url('assets/tampilan_admin/'); ?>js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?= base_url('assets/tampilan_admin/'); ?>js/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url('assets/tampilan_admin/'); ?>js/startmin.js"></script>

</body>

</html>