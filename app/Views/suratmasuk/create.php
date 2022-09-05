<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h3 class="mt-3 mb-5"> Form Tambah Data Surat Masuk</h3>
            <form action="/suratmasuk/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="no_surat" class="col-sm-2 col-form-label">Nomor Surat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('no_surat')) ? 'is-invalid' : ''; ?>" id="no_surat" name="no_surat" autofocus value="<?= old('no_surat'); ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= $validation->getError('no_surat'); ?>
                        </div>
                    </div>
                </div>
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
                    <label for="tgl_terima" class="col-sm-2 col-form-label">Tanggal Terima</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control <?= ($validation->hasError('tgl_terima')) ? 'is-invalid' : ''; ?>" id="tgl_terima" name="tgl_terima" autofocus value="<?= old('tgl_terima'); ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= $validation->getError('tgl_terima'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pengirim" class="col-sm-2 col-form-label">Pengirim</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('pengirim')) ? 'is-invalid' : 'is_valid'; ?>" id="pengirim" name="pengirim" value="<?= old('pengirim'); ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= $validation->getError('pengirim'); ?>
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
                    <label for="pengolah" class="col-sm-2 col-form-label">Pengolah</label>
                    <div class="col-sm-10">
                        <select class="form-control select2 " name="lampiran">
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
                        <select class="form-control select2  " id="jenis" name="jenis">
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
                    <label for="lampiran1" class="col-sm-2 col-form-label">Dokumen</label>
                    <div class="col-sm-10">
                        <!-- <div class="custom-filew"> 
                            merubah file input type file ke defalut-->
                        <!-- <input type="file" class="form-control select2 </?= ($validation->hasError('lampiran')) ? 'is-invalid' : ''; ?>" id="lampiran" name="lampiran">
                        </?php if (!empty($sm['lampiran'])) { ?>
                            <img src="data:image/jpeg;base64,</?= base64_encode($sm['lampiran']); ?>" style="width:200px;" />
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
                <div class="row mb-3">
                    <label for="catatan" class="col-sm-2 col-form-label">Catatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="catatan" name="catatan" value="<?= old('catatan'); ?>">
                    </div>
                </div>
                <a class="btn btn-danger mt-4 mb-5" href="<?php echo base_url('suratmasuk/disposisi/'); ?>/<?= $sm['no_surat']; ?>" role="button">Batal</a>
                <button type="submit" class="btn btn-primary mt-4 mb-5 ">Tambah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>