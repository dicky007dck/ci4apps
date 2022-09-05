<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak PDF Surat Keluar</title>
    <style>
        .border-table {
            font-family: Arial, Helvetica, sans-serif;
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            font-size: 12px;
        }

        .border-table th {
            border: 2 solid #000;
            font-weight: bold;
        }

        .border-table td {
            border: 1 solid #000;
        }
    </style>
</head>

<body>
    <center>
        <p>PERUSAHAAN UMUM DAERAH AIR MINUM<br />
            <b>"TIRTA PERWITASARI"</b><br />
            <u>KABUPATEN PURWOREJO</u><br />
    </center>
    <h3 align="center">Surat Keluar</h3>
    </a>
    <div class="row">
        <div class="col">
            <table class="border-table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal Surat</th>
                        <th scope="col">Kepada</th>
                        <th scope="col">Perihal</th>
                        <th scope="col">Pengolah</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Klasifikasi</th>
                        <th scope="col">Catatan</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                    <?php foreach ($suratkeluar as $s) : ?>
                        <tr>
                            <td scope="row"><?= $i++; ?></td>
                            <td><?= $s['tgl_surat']; ?></td>
                            <td><?= $s['kepada']; ?></td>
                            <td><?= $s['perihal']; ?></td>
                            <td><?= $s['pengolah']; ?></td>
                            <td><?= $s['jenis']; ?></td>
                            <td><?= $s['klasifikasi']; ?></td>
                            <td><?= $s['catatan']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>