<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Data Surat Keluar</h1>
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
                            <form action="/surat_keluar/update/<?= $suratKeluar['id']; ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" class="form-control" name="fileLama" value="<?= $suratKeluar['files']; ?>">
                                <?= csrf_field(); ?>
                                <div class="row">
                                    <div class="col">
                                        <label>Nomor Surat :</label>
                                        <input type="text" name="no_surat" class="form-control <?= ($validation->hasError('no_surat')) ? 'is-invalid' : ''; ?>" autofocus value="<?= (old('no_surat')) ? old('no_surat') : $suratKeluar['no_surat']; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('no_surat'); ?>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label>Tanggal Surat :</label>
                                        <input type="date" name="tgl_surat" class="form-control <?= ($validation->hasError('tgl_surat')) ? 'is-invalid' : ''; ?>" autofocus value="<?= (old('tgl_surat')) ? old('tgl_surat') : $suratKeluar['tgl_surat']; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tgl_surat'); ?>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label>Perihal :</label>
                                        <input type="text" name="perihal" class="form-control <?= ($validation->hasError('perihal')) ? 'is-invalid' : ''; ?>" autofocus value="<?= (old('perihal')) ? old('perihal') : $suratKeluar['perihal']; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('perihal'); ?>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label>Tanggal Keluar:</label>
                                        <input type="date" name="tgl_keluar" class="form-control <?= ($validation->hasError('tgl_keluar')) ? 'is-invalid' : ''; ?>" autofocus value="<?= (old('tgl_keluar')) ? old('tgl_keluar') : $suratKeluar['tgl_keluar']; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tgl_keluar'); ?>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label>Tujuan :</label>
                                        <input type="text" name="tujuan" class="form-control <?= ($validation->hasError('tujuan')) ? 'is-invalid' : ''; ?>" autofocus value="<?= (old('tujuan')) ? old('tujuan') : $suratKeluar['tujuan']; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tujuan'); ?>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label>Keterangan :</label>
                                        <input type="text" name="keterangan" class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" autofocus value="<?= (old('keterangan')) ? old('keterangan') : $suratKeluar['keterangan']; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('keterangan'); ?>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <label>Upload File :</label>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input <?= ($validation->hasError('files')) ? 'is-invalid' : ''; ?>" id="files" name="files">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('files'); ?>
                                    </div>
                                    <label class="custom-file-label" for="files"><?= $suratKeluar['files']; ?></label>
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="/surat_keluar" class="btn btn-danger">Batal</a>
                                </div>
                            </form>
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