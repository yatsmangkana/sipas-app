<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="col s12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Test Date Time</h4><br>
                        <h5>Current Time: <?= date('h:i:s A'); ?></h5>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $sm_rows; ?></h3>

                            <p>Surat Masuk</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-envelope"></i>
                        </div>
                        <a href="pages/surat_masuk.php" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $sk_rows; ?></h3>

                            <p>Surat Keluar</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-paper-plane"></i>
                        </div>
                        <a href="pages/surat_keluar.php" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->