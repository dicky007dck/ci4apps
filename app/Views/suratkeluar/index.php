<?= $this->extend('layout/template1'); ?>

<?= $this->section('content'); ?>

<!-- </? php
$pdf = false;
if (strpos(current_url(), "printpdf")){
    $pdf = true;
}
if ($pdf == false){
    ?> -->
}
<div class="container">
    <div class="row">
        <div class="col-3">
            <a class="btn btn-outline-primary mt-3" href="/suratkeluar/create" role="button">Tambah Data</a>
            <a class="btn btn-outline-danger mt-3" href="/pages" role="button">Home</a>
            <p> </p>
            <form action="" method="get">
                <div class="input-grup mb-3">
                    <input type="text" class="form-control" placeholder="Keyword Pencarian.." name="keyword">
                </div>
            </form>
        </div>
        <div class="col">
            <br>
            <br>
            <br>
            <a href="/export" class="btn btn-info mb-2 float-sm-right fas fa-file-download btn-sm" role="button">
                <i class="fas fa-file-excel"></i> Print Excel
            </a>
            <a href="/printpdf" class="btn btn-danger mb-2 float-sm-right fas fa-file-download btn-sm" role="button">
                <i class="fas fa-file-pdf"></i> Print PDF
            </a>
            <!-- <a href="export" class="btn btn-info mb-2 float-sm-right fas fa-file-download btn-sm" role="button">
                <i class="fas fa-file-word"></i> Print
            </a> -->
        </div>
    </div>
    <!-- </? php } ?> -->
    <div class="row">
        <div class="col">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?> </div>
            <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal Surat</th>
                        <th scope="col">Kepada</th>
                        <th scope="col">Perihal</th>
                        <th scope="col">Pengolah</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Klasifikasi</th>
                        <th scope="col">Dokumen</th>
                        <th scope="col">Catatan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                    <?php foreach ($suratkeluar as $s) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $s['tgl_surat']; ?></td>
                            <td><?= $s['kepada']; ?></td>
                            <td><?= $s['perihal']; ?></td>
                            <td><?= $s['pengolah']; ?></td>
                            <td><?= $s['jenis']; ?></td>
                            <td><?= $s['klasifikasi']; ?></td>
                            <td>
                                <!-- Rubah untuk menampilkan gambar -->
                                <!-- </?php if (!empty($s['lampiran'])) { ?>
                                    <img src="data:image/jpeg;base64,</?= base64_encode($s['lampiran']); ?>" style="width:100px;" />
                                </?php } ?> -->
                                <img src="/img/<?= $s['lampiran']; ?>" alt="" class="lampiran" />

                            </td>
                            <td><?= $s['catatan']; ?></td>
                            <td class="btn-group" role="group" aria-label="Basic example">
                                <a href="<?php echo base_url('suratkeluar/edit'); ?>/<?= $s['id_suratkeluar']; ?>" class="btn btn-outline-warning my-4">Edit</a>
                                <form action="/suratkeluar/<?= $s['id_suratkeluar']; ?>" method="post" class="d-inline my-4">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('apakah anda yakin?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('suratkeluar', 'suratkeluar_pagination'); ?>
            <br>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>