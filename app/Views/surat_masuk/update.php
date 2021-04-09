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
                            <form action="/SuratMasuk/save" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="row">
                                    <div class="col">
                                        <label>Nomor Surat :</label>
                                        <input type="text" name="no_surat" class="form-control <?= ($validation->hasError('no_surat')) ? 'is-invalid' : ''; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('no_surat'); ?>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label>Tanggal Surat :</label>
                                        <input type="date" name="tgl_surat" class="form-control <?= ($validation->hasError('tgl_surat')) ? 'is-invalid' : ''; ?>">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label>Perihal :</label>
                                        <input type="text" name="perihal" class="form-control <?= ($validation->hasError('perihal')) ? 'is-invalid' : ''; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('perihal'); ?>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label>Tanggal Diterima:</label>
                                        <input type="date" name="tgl_diterima" class="form-control <?= ($validation->hasError('tgl_diterima')) ? 'is-invalid' : ''; ?>">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label>Asal Surat :</label>
                                        <input type="text" name="asal_surat" class="form-control <?= ($validation->hasError('asal_surat')) ? 'is-invalid' : ''; ?>">
                                    </div>
                                    <div class="col">
                                        <label>Keterangan :</label>
                                        <select name="keterangan" class="custom-select">
                                            <option selected disabled>Pilih Keterangan</option>
                                            <option value="AKTIF">AKTIF</option>
                                            <option value="INAKTIF">INAKTIF</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <label>Upload File :</label>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" id="files" name="files">
                                    <label class="custom-file-label" for="files">Choose file</label>
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
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