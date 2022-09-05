<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>


<div class="container">
    <div class="row">
        <div class="col-8">
            <h3 class="mt-3 mb-5"> Form Tambah Disposisi</h3>
            <form action="/disposisi/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <div class="col-sm-10">
                        <?php foreach ($suratmasuk as $sm) : ?>
                            <input type="hidden" class="form-control " id="no_surat" name="id_suratmasuk" autofocus value="<?= $sm['id_suratmasuk']; ?>">
                            <input type="hidden" class="form-control " id="no_surat" name="no_surat" autofocus value="<?= $sm['no_surat']; ?>">
                            <input type="hidden" class="form-control " id="no_surat" name="perihal" autofocus value="<?= $sm['perihal']; ?>">
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pengisi" class="col-sm-2 col-form-label">Pengisi Disposisi</label>
                    <div class="col-sm-10">
                        <select class="form-control select2" id="pengisi" name="pengisi">
                            <option selected="selected">Direktur</option>
                            <option>Kabag Administrasi</option>
                            <option>Kabag Teknik</option>
                            <option>Kepala Satuan Pengawas Internal</option>
                            <option>Kasubag Umum dan Kepegawaian</option>
                            <option>Kasubag Keuangan</option>
                            <option>Kasubag Pengolahan Data Elektronik</option>
                            <option>Kasubag Perencanaan dan Pengawasan</option>
                            <option>Kasubag Produksi</option>
                            <option>Kasubag Penanggulangan Kehilangan Air</option>
                            <option>Kacab Purworejo</option>
                            <option>Kacab Kutoarjo</option>
                            <option>Kacab Bener</option>
                            <option>Kacab Loano</option>
                            <option>Kacab Purwodadi</option>
                            <option>Kacab Banyuurip</option>
                            <option>Kacab Kemiri</option>
                            <option>Kacab Pituruh</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tgl_disposisi" class="col-sm-2 col-form-label">Tanggal Disposisi</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control <?= ($validation->hasError('tgl_disposisi')) ? 'is-invalid' : ''; ?>" id="tgl_disposisi" name="tgl_disposisi" autofocus value="<?= old('tgl_disposisi'); ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= $validation->getError('tgl_disposisi'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jenis" class="col-sm-2 col-form-label">Disposisi</label>
                    <div class="col-sm-10">
                        <select class="form-control select2" id="disposisii" name="disposisii">
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
                        <input type="text" class="form-control <?= ($validation->hasError('diteruskan')) ? 'is-invalid' : ''; ?>" id="diteruskan" name="diteruskan" value="<?= old('diteruskan'); ?>">
                    </div>
                    <div id="validationServer04Feedback" class="invalid-feedback">
                        <?= $validation->getError('diteruskan'); ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control " id="keterangan" name="keterangan" value="<?= old('keterangan'); ?>">
                    </div>
                </div>
                <a class="btn btn-danger mt-4 mb-5" href="/suratmasuk" role="button">Batal</a>
                <button type="submit" class="btn btn-primary mt-4 mb-5 ">Tambah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>