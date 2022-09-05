<?= $this->extend('layout/template2'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <a class="btn btn-outline-danger mt-3" href="/suratkeluar" role="button">Kembali</a>
            <h3 class="mt-3 mb-5"> Form Tambah Data Surat Keluar</h3>
            <form action="/suratkeluar/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="tgl_surat" class="col-sm-2 col-form-label">Tanggal Surat</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control <?= ($validation->hasError('tgl_surat')) ? 'is-invalid' : ''; ?>" id="tgl_surat" name="tgl_surat" autofocus value="<?= old('tgl_surat'); ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= $validation->getError('tgl_surat'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="kepada" class="col-sm-2 col-form-label">Kepada</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('kepada')) ? 'is-invalid' : 'is_valid'; ?>" id="kepada" name="kepada" value="<?= old('kepada'); ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= $validation->getError('kepada'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="perihal" class="col-sm-2 col-form-label">Perihal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('perihal')) ? 'is-invalid' : ''; ?>" id="perihal" name="perihal" value="<?= old('perihal'); ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= $validation->getError('perihal'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pengolah " class="col-sm-2 col-form-label">Pengolah</label>
                    <div class="col-sm-10">
                        <select class="form-control select2 " name="pengolah">
                            <optgroup label="Bagian Admin Keuangan">
                                <option>Sub Bagian Umum dan Kepegawaian</option>
                                <option>Sub Bagian Keuangan</option>
                                <option>Sub Bagian Pengolahan Data Elektronik</option>
                            </optgroup>
                            <optgroup label="Bagian Teknik">
                                <option>Sub Bagian Perencanaan dan Pengawasan</option>
                                <option>Sub Bagian Produksi</option>
                                <option>Sub Bagian Penanggulangan Kehilangan Air</option>
                            </optgroup>
                            <optgroup label="Kepala Satuan Pengawas Internal">
                                <option>Kepala Satuan Pengawas Internal</option>
                        </select>
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="jenis" class="col-sm-2 col-form-label">Jenis</label>
                    <div class="col-sm-10">
                        <select class="form-control select2 " id="jenis" name="jenis">
                            <option selected>Surat Pribadi</option>
                            <option> Surat Dinas</option>
                            <option> Surat Niaga</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="klasifikasi" class="col-sm-2 col-form-label">Klasifikasi</label>
                    <div class="col-sm-10">
                        <select class="form-control select2 " id="klasifikasi" name="klasifikasi">
                            <option selected>Biasa</option>
                            <option> Rahasia</option>
                            <option> Segera</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="lampiran" class="col-sm-2 col-form-label">Dokumen</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <!-- merubah file input type file ke defalut-->
                            <!-- <input type="file" class="form-control select2  </?= ($validation->hasError('lampiran')) ? 'is-invalid' : ''; ?>" id="lampiran" name="lampiran">
                        </?php if (!empty($s['lampiran'])) { ?>
                            <img src="data:image/jpeg;base64,</?= base64_encode($s['lampiran']); ?>" style="width:200px;" />
                        </?php } ?>
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            </?= $validation->getError('lampiran'); ?>
                        </div> -->
                            <!-- </div> -->
                            <input type="file" class="custom-file-input <?= ($validation->hasError('lampiran')) ? 'is-invalid' : ''; ?>" id="lampiran" name="lampiran">
                            <label class="custom-file-label" for="Lampiran">Pilih Gambar</label>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                <?= $validation->getError('lampiran'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="catatan" class="col-sm-2 col-form-label">Catatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="catatan" name="catatan" value="<?= old('catatan'); ?>">
                    </div>
                </div>
                <a class="btn btn-danger mt-4 mb-5" href="/suratkeluar" role="button">Batal</a>
                <button type="submit" class="btn btn-primary mt-4 mb-5">Tambah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>