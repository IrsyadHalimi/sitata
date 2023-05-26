<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

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
                        <h3 class="panel-title">Selamat datang.. silakan Masuk</h3>
                    </div>
                    <div class="panel-body">
                        <?php if ($this->session->flashdata('message_login_error')): ?>
                            <div class="invalid-feedback">
                                <?= $this->session->flashdata('message_login_error') ?>
                            </div>
                        <?php endif ?>
                        <form role="form" action="" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input type="text" name="email"  class="<?= form_error('email') ? 'invalid' : '' ?>" value="<?= set_value('email'); ?>" id="email" placeholder="Masukkan email" name="email" autofocus required ><?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password*</label>
                                    <input type="password" name="password" class="<?= form_error('password') ? 'invalid' : '' ?>"placeholder="Enter your password" value="<?= set_value('password') ?>" required />
                                    <div class="invalid-feedback"><?= form_error('password') ?></div>
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block" value="Login">Masuk</button>
                                <a class="small" href="<?= base_url("autentifikasi/registrasi"); ?>">Buat Akun</a>
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