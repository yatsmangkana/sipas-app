<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Data Surat Masuk</h1>
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
                            <form action="/surat_masuk/save" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="row">
                                    <div class="col">
                                        <label>Nomor Surat :</label>
                                        <input type="text" name="no_surat" class="form-control <?= ($validation->hasError('no_surat')) ? 'is-invalid' : ''; ?>" autofocus value="<?= old('no_surat'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('no_surat'); ?>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label>Tanggal Surat :</label>
                                        <input type="date" name="tgl_surat" class="form-control <?= ($validation->hasError('tgl_surat')) ? 'is-invalid' : ''; ?>" autofocus value="<?= old('tgl_surat'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tgl_surat'); ?>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label>Perihal :</label>
                                        <input type="text" name="perihal" class="form-control <?= ($validation->hasError('perihal')) ? 'is-invalid' : ''; ?>" autofocus value="<?= old('perihal'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('perihal'); ?>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label>Tanggal Diterima:</label>
                                        <input type="date" name="tgl_diterima" class="form-control <?= ($validation->hasError('tgl_diterima')) ? 'is-invalid' : ''; ?>" autofocus value="<?= old('tgl_diterima'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tgl_diterima'); ?>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label>Asal Surat :</label>
                                        <input type="text" name="asal_surat" class="form-control <?= ($validation->hasError('asal_surat')) ? 'is-invalid' : ''; ?>" autofocus value="<?= old('asal_surat'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('asal_surat'); ?>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label>Keterangan :</label>
                                        <input type="text" name="keterangan" class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" autofocus value="<?= old('keterangan'); ?>">
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
                                    <label class="custom-file-label" for="files">Pilih file..</label>
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="/surat_masuk" class="btn btn-danger">Batal</a>
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