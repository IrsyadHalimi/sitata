<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href=?">SITATA</a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <!-- Top Navigation: Right Menu -->
        <ul class="nav navbar-right navbar-top-links">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>?<b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li class="divider"></li>
                    <li><a href="<?= base_url('autentifikasi/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- Sidebar -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">

                <ul class="nav" id="side-menu">
                    <li>
                        <a href="<?= base_url('Admin/Admin'); ?>" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    <li><br>
                        <a href="<?= base_url('Admin/Karyawan'); ?>" class="active"><i class="fa fa-users fa-fw"></i> Anggota</a>
                    </li><br>
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> Berita<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Data Berita</a>
                            </li>
                        </ul>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Tambah Berita Baru</a>
                            </li>
                        </ul>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Kategori Berita</a>
                            </li>
                        </ul>
                    </li><br>
                    <li>
                        <a href="<?= base_url('Admin/kategori'); ?>" class="active"><i class="fa fa-bars fa-fw"></i> Komentar</a>
                    </li><br>
                    <li>
                        <a href="<?= base_url('Admin/Klien'); ?>" class="active"><i class="fa fa-smile-o fa-fw"></i> Laporan</a>
                    </li><br>
                    </li>
                </ul>
            </div>
        </div>
    </nav>