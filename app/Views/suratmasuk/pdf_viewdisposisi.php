<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak PDF Disposisi</title>
    <style>
        .border-table {
            font-family: Arial, Helvetica, sans-serif;
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            font-size: 12px;
        }

        .border-table th {
            border: double;
        }

        .border-table td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <center>
        <p>PERUSAHAAN UMUM DAERAH AIR MINUM<br />
            <b>"TIRTA PERWITASARI"</b><br />
            <u>KABUPATEN PURWOREJO</u><br />
    </center>
    <h3 align="center">Disposisi</h3>
    <!-- </?php foreach ($suratmasuk as $sm) : ?>
        <h1 class="my-4">Disposisi #</?= $no_surat; ?></h1>
        <h4><i class="fas fa-file-alt"></i> Perihal: <a class="Text-danger"></?= $sm['perihal']; ?></a>
        </h4>
    </?php endforeach; ?> -->
    </a>
    <div class="row">
        <div class="col">
            <table class="border-table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Pengisi Disposisi</th>
                        <th scope="col">Nomor Surat</th>
                        <th scope="col">Tanggal disposisi</th>
                        <th scope="col">Disposisi</th>
                        <th scope="col">Diteruskan Ke</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php $i = 1; ?>
                    <?php foreach ($disposisi as $dp) : ?>
                        <tr>
                            <td scope="row"><?= $i++; ?></td>
                            <td><?= $dp['pengisi'] ?></td>
                            <td><?= $dp['no_surat'] ?></td>
                            <td><?= $dp['tgl_disposisi'] ?></td>
                            <td><?= $dp['disposisii'] ?></td>
                            <td><?= $dp['diteruskan'] ?></td>
                            <td><?= $dp['keterangan'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>