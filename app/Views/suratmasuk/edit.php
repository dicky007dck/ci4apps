<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <a class="btn btn-outline-danger mt-3" href="/suratmasuk" role="button">Kembali</a>
            <h3 class="my-5"> Form Edit Data Surat Masuk</h3>
            <form action="<?php echo base_url('suratmasuk/update'); ?>/<?= $sm['id_suratmasuk']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="no_surat" class="col-sm-2 col-form-label">Nomor Surat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('no_surat')) ? 'is-invalid' : ''; ?>" id="no_surat" name="no_surat" value="<?= $sm['no_surat']; ?>" autofocus>
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= $validation->getError('no_surat'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tgl_surat" class="col-sm-2 col-form-label">Tanggal Surat</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control <?= ($validation->hasError('tgl_surat')) ? 'is-invalid' : ''; ?>" id="tgl_surat" name="tgl_surat" value="<?= $sm['tgl_surat']; ?>" autofocus>
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= $validation->getError('tgl_surat'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tgl_terima" class="col-sm-2 col-form-label">Tanggal Terima</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control <?= ($validation->hasError('tgl_terima')) ? 'is-invalid' : ''; ?>" id="tgl_terima" name="tgl_terima" value="<?= $sm['tgl_terima']; ?>" autofocus>
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= $validation->getError('tgl_terima'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pengirim" class="col-sm-2 col-form-label">Pengirim</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('pengirim')) ? 'is-invalid' : ''; ?>" id="pengirim" name="pengirim" value="<?= $sm['pengirim']; ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= $validation->getError('pengirim'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="perihal" class="col-sm-2 col-form-label">Perihal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('perihal')) ? 'is-invalid' : ''; ?>" id="perihal" name="perihal" value="<?= $sm['perihal']; ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= $validation->getError('perihal'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pengolah" class="col-sm-2 col-form-label">Pengolah</label>
                    <div class="col-sm-10">
                        <!-- Menampilakan Value berdasar input -->
                        <select class="form-control select2 " name="pengolah">
                            <optgroup label="Bagian Admin Keuangan">
                                <option <?= ($sm['pengolah'] == 'Sub Bagian Umum dan Kepegawaian' ? 'selected' : ''); ?>>Sub Bagian Umum dan Kepegawaian</option>
                                <option <?= ($sm['pengolah'] == 'Sub Bagian Keuangan' ? 'selected' : ''); ?>>Sub Bagian Keuangan</option>
                                <option <?= ($sm['pengolah'] == 'Sub Bagian Pengolahan Data Elektronik' ? 'selected' : ''); ?>>Sub Bagian Pengolahan Data Elektronik</option>
                            </optgroup>
                            <optgroup label="Bagian Teknik">
                                <option <?= ($sm['pengolah'] == 'Sub Bagian Perencanaan dan Pengawasan' ? 'selected' : ''); ?>>Sub Bagian Perencanaan dan Pengawasan</option>
                                <option <?= ($sm['pengolah'] == 'Sub Bagian Produksi' ? 'selected' : ''); ?>>Sub Bagian Produksi</option>
                                <option <?= ($sm['pengolah'] == 'Sub Bagian Penanggulangan Kehilangan Air' ? 'selected' : ''); ?>>Sub Bagian Penanggulangan Kehilangan Air</option>
                            </optgroup>
                            <optgroup label="Kepala Satuan Pengawas Internal">
                                <option>Kepala Satuan Pengawas Internal</option>
                        </select>

                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jenis" class="col-sm-2 col-form-label">Jenis</label>
                    <div class="col-sm-10">
                        <!-- Menampilakan Value berdasar input -->
                        <select class="form-control select2  " id="jenis" name="jenis">
                            <option <?= ($sm['jenis'] == 'Surat Pribadi') ? 'selected' : ''; ?>>Surat Pribadi</option>
                            <option <?= ($sm['jenis'] == 'Surat Dinas') ? 'selected' : ''; ?>>Surat Dinas</option>
                            <option <?= ($sm['jenis'] == 'Surat Niaga') ? 'selected' : ''; ?>>Surat Niaga</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="klasifikasi" class="col-sm-2 col-form-label">Klasifikasi</label>
                    <div class="col-sm-10">
                        <!-- Menampilakan Value berdasar input -->
                        <select class="form-control select2 " id="klasifikasi" name="klasifikasi">
                            <option <?= ($sm['klasifikasi'] == 'Segera') ? 'selected' : ''; ?>>Segera</option>
                            <option <?= ($sm['klasifikasi'] == 'Rahasia') ? 'selected' : ''; ?>>Rahasia</option>
                            <option <?= ($sm['klasifikasi'] == 'Biasa') ? 'selected' : ''; ?>>Biasa</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="lampiran1" class="col-sm-2 col-form-label">Dokumen</label>
                    <div class="col-sm-10">
                        <div class="custom-filew">
                            <!-- merubah file input type file ke defalut-->
                            <!-- <input type="file" class="custom-file-label </?= ($validation->hasError('lampiran')) ? 'is-invalid' : ''; ?>" id="lampiran" name="lampiran">
                        </?php if (!empty($sm['lampiran'])) { ?>
                            <img src="data:image/jpeg/png;base64,</?= base64_encode($sm['lampiran']); ?>" style="width:200px;" />
                        </?php } ?>
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            </?= $validation->getError('lampiran'); ?>
                        </div> -->
                            <input type="file" class="custom-file-input <?= ($validation->hasError('lampiran')) ? 'is-invalid' : ''; ?>" id="lampiran" name="lampiran" value="<?= old('lampiran'); ?>">
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
                        <input type="text" class="form-control select2 <?= ($validation->hasError('catatan')) ? 'is-invalid' : ''; ?>" id="catatan" name="catatan" value="<?= $sm['catatan']; ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= $validation->getError('catatan'); ?>
                        </div>
                    </div>
                </div>
                <a class="btn btn-danger mt-4 mb-5" href="/suratmasuk" role="button">Batal</a>
                <button type="submit" class="btn btn-primary mt-4 mb-5">Edit Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>