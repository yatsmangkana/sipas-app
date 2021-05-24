<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Arsip Surat Masuk</h1>
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
                            <a href="/surat_masuk/create" class="btn btn-primary">Tambah Data</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="surat_masuk" class="table table-bordered table-hover">
                                <thead>
                                    <tr class="table-primary">
                                        <th class="text-center" width="1%">No</th>
                                        <th class="text-center">Nomor Surat</th>
                                        <th class="text-center">Perihal</th>
                                        <th class="text-center">Asal Surat</th>
                                        <th class="text-center">Tgl Surat</th>
                                        <th class="text-center">Tgl Diterima</th>
                                        <th class="text-center">Keterangan</th>
                                        <th class="text-center">Detail</th>
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
                                            <td class="text-center"><?= date('d / m / Y', strtotime($sm['tgl_surat'])); ?></td>
                                            <td class="text-center"><?= date('d / m / Y', strtotime($sm['tgl_diterima'])); ?></td>
                                            <td class="text-center"><?= $sm['keterangan']; ?></td>
                                            <td class="project-detail text-center">
                                                <form action="/surat_masuk/detail/<?= $sm['id']; ?>" method="post" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="">
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="fas fa-download"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td class="project-actions text-center">
                                                <form action="/surat_masuk/edit/<?= $sm['id']; ?>" method="post" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="">
                                                    <button type="submit" class="btn btn-warning">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </button>
                                                </form>
                                                <button type="submit" value="<?= $sm['id']; ?>" class="btn btn-danger hapus_sm">
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

<!-- Arsip
Surat Masuk :
- No Surat
- Pengirim
- Perihal
- Tanggal Surat
- Tanggal Masuk

Surat Masuk :
- No Surat
- Tujuan
- Perihal
- Tanggal Surat

Surat Tugas :

Perihal Surat :
- Surat Izin Penelitian
- Surat Keterangan
- Surat Tugas
- Surat Undangan
- Sertifikat

No. Surat : 'no-urut'/UN36.11/LP2M/'tahun' -->