<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail</h1>
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
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th width="110px">No Surat</th>
                                    <th width="30px">:</th>
                                    <td><?= $suratKeluar['no_surat']; ?></td>

                                    <th width="110px">Keterangan</th>
                                    <th width="30px">:</th>
                                    <td><?= $suratKeluar['keterangan']; ?></td>
                                </tr>
                                <tr>
                                    <th>Perihal</th>
                                    <th>:</th>
                                    <td><?= $suratKeluar['perihal']; ?></td>

                                    <th>Tgl Upload</th>
                                    <th>:</th>
                                    <td><?= date('d / m / Y H:i:s A', strtotime($suratKeluar['created_at'])); ?></td>
                                </tr>
                                <tr>
                                    <th>Asal Surat</th>
                                    <th>:</th>
                                    <td><?= $suratKeluar['tujuan']; ?></td>

                                    <th>Tgl Update</th>
                                    <th>:</th>
                                    <td><?= date('d / m / Y H:i:s A', strtotime($suratKeluar['updated_at'])); ?></td>
                                </tr>
                                <tr>
                                    <th>Tgl Surat</th>
                                    <th>:</th>
                                    <td><?= date('d / m / Y', strtotime($suratKeluar['tgl_surat'])); ?></td>

                                    <th>File Surat</th>
                                    <th>:</th>
                                    <td><?= $suratKeluar['files']; ?></td>
                                </tr>
                                <tr>
                                    <th>Tgl Keluar</th>
                                    <th>:</th>
                                    <td><?= date('d / m / Y', strtotime($suratKeluar['tgl_keluar'])); ?></td>

                                    <th>Ukuran File</th>
                                    <th>:</th>
                                    <td><?= $suratKeluar['file_size']; ?> KB</td>
                                </tr>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="col-sm-12">
                <iframe src="<?= base_url('upload/surat_keluar/' . $suratKeluar['files']) ?>" style="border:none;" height="750px" width="100%" title="Iframe Example"></iframe>
            </div>

        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->