<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Surat Masuk</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <!-- Button to Open the Modal -->
                            <a href="/SuratMasuk/create" class="btn btn-primary">Tambah Data</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr class="table-primary">
                                        <th class="text-center" width="1%">No</th>
                                        <th class="text-center">Nomor Surat</th>
                                        <th class="text-center">Perihal</th>
                                        <th class="text-center">Asal Surat</th>
                                        <th class="text-center">Tgl Surat</th>
                                        <th class="text-center">Tgl Diterima</th>
                                        <th class="text-center">Keterangan</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($suratMasuk as $sm) : ?>
                                        <tr>
                                            <td class="text-center"><?= $i++; ?></td>
                                            <td class="text-center"><?= $sm['no_surat']; ?></td>
                                            <td class="text-center"><?= $sm['perihal']; ?></td>
                                            <td class="text-center"><?= $sm['asal_surat']; ?></td>
                                            <td class="text-center"><?= $sm['tgl_surat']; ?></td>
                                            <td class="text-center"><?= $sm['tgl_diterima']; ?></td>
                                            <td class="text-center"><?= $sm['keterangan']; ?></td>
                                            <td class="project-actions text-center">
                                                <a href="surat_masuk.php?downloadFile=asda" target="_blank"><button type="button" class="btn btn-success" name="downloadFile">
                                                        <i class="fas fa-folder"></i>
                                                    </button></a>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                </button>
                                                <form action="/SuratMasuk/<?= $sm['id']; ?>" method="post" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->