<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Surat Keluar</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <!-- <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div> -->
            <?php endif; ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <!-- Button -->
                            <a href="/SuratKeluar/create" class="btn btn-primary">Tambah Data</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="surat_keluar" class="table table-bordered table-hover">
                                <thead>
                                    <tr class="table-primary">
                                        <th class="text-center" width="1%">No</th>
                                        <th class="text-center">Nomor Surat</th>
                                        <th class="text-center">Perihal</th>
                                        <th class="text-center">Tujuan</th>
                                        <th class="text-center">Tgl Surat</th>
                                        <th class="text-center">Tgl Keluar</th>
                                        <th class="text-center">Keterangan</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($suratKeluar as $sk) : ?>
                                        <tr>
                                            <td class="text-center"><?= $i++; ?></td>
                                            <td class="text-center"><?= $sk['no_surat']; ?></td>
                                            <td class="text-center"><?= $sk['perihal']; ?></td>
                                            <td class="text-center"><?= $sk['tujuan']; ?></td>
                                            <td class="text-center"><?= $sk['tgl_surat']; ?></td>
                                            <td class="text-center"><?= $sk['tgl_keluar']; ?></td>
                                            <td class="text-center"><?= $sk['keterangan']; ?></td>
                                            <td class="project-actions text-center">
                                                <form action="/SuratKeluar/detail/<?= $sk['id']; ?>" method="post" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="">
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </form>
                                                <form action="/SuratKeluar/edit/<?= $sk['id']; ?>" method="post" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="">
                                                    <button type="submit" class="btn btn-warning">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </button>
                                                </form>
                                                <button type="submit" value="<?= $sk['id']; ?>" class="btn btn-danger hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
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