<?= $this->extend('layout/template2'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="col-12">
                <div class="callout callout-outline-success">
                    <?php foreach ($suratmasuk as $sm) : ?>
                        <!-- <a class="btn btn-primary mt-3 text-light" href="/disposisi/inputdisposisi/</?= $sm['id_suratmasuk'] ?>" role="button">Tambah Disposisi</a> -->
                        <button type="button" class="btn btn-outline-primary mt-3" data-toggle="modal" data-target="#tambah">
                            Tambah Disposisi
                        </button>
                        <a type="button" class="btn btn-danger mt-3 text-light" href="/suratmasuk">kembali</a>
                        <h1 class="my-4">Disposisi #<?= $sm['no_surat']; ?></h1>
                        <h4><i class="fas fa-file-alt"></i> Perihal: <a class="Text-danger"><?= $sm['perihal']; ?></a>
                        </h4>
                        <div class="col">
                            <br>
                            <br>
                            <br>
                            <a href="/exportdis/<?= $id_suratmasuk ?>" class="btn btn-info mb-2 float-sm-right fas fa-file-download btn-sm text-light" role="button">
                                <i class="fas fa-file-excel"></i> Print Excel
                            </a>
                            <a href="/printpdfdis/<?= $id_suratmasuk ?>" class="btn btn-danger mb-2 float-sm-right fas fa-file-download btn-sm text-light" role="button">
                                <i class="fas fa-file-pdf"></i> Print PDF
                            </a>
                            <!-- <a href="export" class="btn btn-info mb-2 float-sm-right fas fa-file-download btn-sm" role="button">
                            <i class="fas fa-file-word"></i> Print</a> -->
                        </div>
                    <?php endforeach; ?>

                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?> </div>
                    <?php endif; ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Pengisi Disposisi</th>
                                <th scope="col">Tanggal disposisi</th>
                                <th scope="col">Disposisi</th>
                                <th scope="col">Diteruskan Ke</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php $i = 1; ?>
                            <?php foreach ($disposisi as $dp) : ?>
                                <tr>
                                    <td scope="row"><?= $i++; ?></td>
                                    <td><?= $dp['pengisi'] ?></td>
                                    <td><?= $dp['tgl_disposisi'] ?></td>
                                    <td><?= $dp['disposisii'] ?></td>
                                    <td><?= $dp['diteruskan'] ?></td>
                                    <td><?= $dp['keterangan'] ?></td>
                                    <td class="btn-group" role="group" aria-label="Basic example">
                                        <!-- <a href="</?php echo base_url('/disposisi/editdisposisi'); ?>/</?= $dp['id_disposisi']; ?>" class="btn btn-warning my-2 text-light">Edit</a> -->
                                        <form action="/disposisi/hapus<?= $dp['id_disposisi']; ?>" method="post" class="d-inline my-2">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('apakah anda yakin?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="tambah">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Tambah Disposisi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/disposisi/save" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row mb-3">
                            <div class="col-sm-10">
                                <?php foreach ($suratmasuk as $sm) : ?>
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
                                <input type="date" class="form-control" id="tgl_disposisi" name="tgl_disposisi" autofocus value="<?= old('tgl_disposisi'); ?>">
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
                                <input type="text" class="form-control" id="diteruskan" name="diteruskan" value="<?= old('diteruskan'); ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control " id="keterangan" name="keterangan" value="<?= old('keterangan'); ?>">
                            </div>
                        </div>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Disposisi</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="ubah">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Ubah Disposisi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
<?= $this->endSection(); ?>