<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <!-- <a class="btn btn-outline-danger mt-3" href="/suratmasuk" role="button">Kembali</a> -->
            <h3 class="mt-3 mb-5"> Edit Disposisi</h3>
            <form action="<?php echo base_url('disposisi/updatedisp'); ?>/<?= $sm['no_surat']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="pengisi" class="col-sm-2 col-form-label">Pengisi Disposisi</label>
                    <div class="col-sm-10">
                        <select class="form-control select2" id="pengisi" name="pengisi">
                            <option <?= ($sm['pengisi'] == 'Direktur' ? 'selected' : ''); ?> selected="selected">Direktur</option>
                            <option <?= ($sm['pengisi'] == 'Kabag Admin dan Keuangan' ? 'selected' : ''); ?>>Kabag Administrasi</option>
                            <option <?= ($sm['pengisi'] == 'Kabag Teknik' ? 'selected' : ''); ?>>Kabag Teknik</option>
                            <option <?= ($sm['pengisi'] == 'Kepala Satuan Pengawas Internal' ? 'selected' : ''); ?>>Kepala Satuan Pengawas Internal</option>
                            <option <?= ($sm['pengisi'] == 'Kasubag Umum dan Kepegawaian' ? 'selected' : ''); ?>>Kasubag Umum dan Kepegawaian</option>
                            <option <?= ($sm['pengisi'] == 'Kasubag Keuangan' ? 'selected' : ''); ?>>Kasubag Keuangan</option>
                            <option <?= ($sm['pengisi'] == 'Kasubag pengolahan Data Elektronik' ? 'selected' : ''); ?>>Kasubag pengolahan Data Elektronik</option>
                            <option <?= ($sm['pengisi'] == 'Kasubag Perencanaan dan Pengawasan' ? 'selected' : ''); ?>>Kasubag Perencanaan dan Pengawasan</option>
                            <option <?= ($sm['pengisi'] == 'Kasubag Produksi' ? 'selected' : ''); ?>>Kasubag Produksi</option>
                            <option <?= ($sm['pengisi'] == 'Kasubag Penanggulangan Kehilangan Air' ? 'selected' : ''); ?>>Kasubag Penanggulangan Kehilangan Air</option>
                            <option <?= ($sm['pengisi'] == 'Kacab Purworejo' ? 'selected' : ''); ?>>Kacab Purworejo</option>
                            <option <?= ($sm['pengisi'] == 'Kacab Kutoarjo' ? 'selected' : ''); ?>>Kacab Kutoarjo</option>
                            <option <?= ($sm['pengisi'] == 'Kacab Bener' ? 'selected' : ''); ?>>Kacab Bener</option>
                            <option <?= ($sm['pengisi'] == 'Kacab Loano' ? 'selected' : ''); ?>>Kacab Loano</option>
                            <option <?= ($sm['pengisi'] == 'Kacab Purwodadi' ? 'selected' : ''); ?>>Kacab Purwodadi</option>
                            <option <?= ($sm['pengisi'] == 'Kacab Banyuurip' ? 'selected' : ''); ?>>Kacab Banyuurip</option>
                            <option <?= ($sm['pengisi'] == 'Kacab Kemiri' ? 'selected' : ''); ?>>Kacab Kemiri</option>
                            <option <?= ($sm['pengisi'] == 'Kacab Pituruh' ? 'selected' : ''); ?>>Kacab Pituruh</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tgl_disposisi" class="col-sm-2 col-form-label">Tanggal Disposisi</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control <?= ($validation->hasError('tgl_disposisi')) ? 'is-invalid' : ''; ?>" id="tgl_disposisi" name="tgl_disposisi" value="<?= $sm['tgl_disposisi']; ?>" autofocus>
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= $validation->getError('tgl_disposisi'); ?>
                        </div>
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= $validation->getError('tgl_disposisi'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jenis" class="col-sm-2 col-form-label">Disposisi</label>
                    <div class="col-sm-10">
                        <select class="form-control select2 " id="disposisii" name="disposisii">
                            <option selected>Ditindaklanjuti</option>
                            <option>Diarsip</option>
                            <option>Sebagai Referensi</option>
                            <option>Sebagai Pembanding</option>
                            <option>Dijadwalkan</option>
                            <option>Lain-lain</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="diteruskan" class="col-sm-2 col-form-label">Diteruskan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('diteruskan')) ? 'is-invalid' : ''; ?>" id="diteruskan" name="diteruskan" value="<?= $sm['diteruskan']; ?>">
                    </div>
                    <div id="validationServer04Feedback" class="invalid-feedback">
                        <?= $validation->getError('diteruskan'); ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" id="keterangan" name="keterangan" value="<?= $sm['keterangan']; ?>">
                    </div>
                    <div id="validationServer04Feedback" class="invalid-feedback">
                        <?= $validation->getError('keterangan'); ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="no_surat" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control <?= ($validation->hasError('no_surat')) ? 'is-invalid' : ''; ?>" id="no_surat" name="no_surat" value="<?= $sm['no_surat']; ?>" autofocus>
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= $validation->getError('no_surat'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="perihal" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control <?= ($validation->hasError('perihal')) ? 'is-invalid' : ''; ?>" id="perihal" name="perihal" value="<?= $sm['perihal']; ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= $validation->getError('perihal'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="id_suratmasuk" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control <?= ($validation->hasError('id_suratmasuk')) ? 'is-invalid' : ''; ?>" id="id_suratmasuk" name="id_suratmasuk" value="<?= $sm['id_suratmasuk']; ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= $validation->getError('id_suratmasuk'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="id_suratmasuk" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control <?= ($validation->hasError('id_suratmasuk')) ? 'is-invalid' : ''; ?>" id="id_suratmasuk" name="id_suratmasuk" value="<?= $sm['id_suratmasuk']; ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= $validation->getError('id_suratmasuk'); ?>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url('suratmasuk/disposisi/'); ?>/<?= $sm['no_surat']; ?>" class="btn btn-danger mt-4 mb-5 ">Batal</a>
                <button type="submit" class="btn btn-primary mt-4 mb-5 ">Ubah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>