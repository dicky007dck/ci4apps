<?php

namespace App\Controllers;

use App\Models\SuratmasukModel;
use App\Models\DisposisiModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;

class Suratmasuk extends BaseController
{
    protected $suratmasukModel;
    protected $disposisiModel;

    public function __construct()
    {
        $this->suratmasukModel = new SuratmasukModel();
        $this->disposisiModel = new DisposisiModel();
    }

    public function index()
    {
        $suratmasuk = $this->suratmasukModel->findAll();

        $currentPage = $this->request->getVar('page_suratmasuk') ? $this->request->getVar('page_suratmasuk') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $surmas = $this->suratmasukModel->search($keyword);
        } else {
            $surmas = $this->suratmasukModel;
        }

        $data = [
            'title' => 'PDAM | Surat Masuk',
            // 'suratmasuk' => $suratmasuk
            'surmas' => $surmas->paginate(5, 'suratmasuk'),
            'pager' => $this->suratmasukModel->pager,
            'currentPage' => $currentPage,
            'suratmasuk' => $suratmasuk,
            'suratmasuk' => $this->suratmasukModel->getDisposisi()
        ];
        $data['title'] = 'Surat Masuk';
        $data['activeMenu'] = 'suratmasuk';

        //$suratmasukModel = new \App\Models\SuratmasukModel();

        echo view('suratmasuk/index', $data);
    }


    public function create()
    {

        $data = [
            'title' => 'PDAM | Form Tambah Data',
            'validation' => \Config\Services::validation()
        ];

        return view('suratmasuk/create', $data);
    }

    public function save()
    {

        // validasi input
        if (!$this->validate([
            'no_surat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => ' Harap tetapkan tanggal.'
                ]
            ],
            'tgl_surat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => ' Harap tetapkan tanggal.'
                ]
            ],
            'tgl_terima' => [
                'rules' => 'required',
                'errors' => [
                    'required' => ' Harap tetapkan tanggal.'
                ]
            ],
            'pengirim' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kepada Harus diisi.'
                ]
            ],
            'perihal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Perihal Harus diisi.'
                ]
            ],
            'lampiran' => [
                'rules' => 'uploaded[lampiran]|max_size[lampiran,1024]|is_image[lampiran]|mime_in[lampiran,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Masukkan gambar terlebih dahulu',
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar',

                ]
            ]

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/suratmasuk/create')->withInput('validation', $validation);
        }
        //disini untuk upload gambar
        // $image = 'fdf';
        // if (isset($_FILES['lampiran']['img'])) {
        //     $file_name = $_FILES['lampiran']['name'];
        //     $file_size = $_FILES['lampiran']['size'];
        //     $file_type = $_FILES['lampiran']['type'];
        //     $image   = addslashes(file_get_contents($_FILES['lampiran']['img']));
        // }
        $fileLampiran = $this->request->getFile('lampiran');
        $image = $fileLampiran->getRandomName();
        $fileLampiran->move('img', $image);

        $this->suratmasukModel->save([
            'no_surat' => $this->request->getVar('no_surat'),
            'tgl_surat' => $this->request->getVar('tgl_surat'),
            'tgl_terima' => $this->request->getVar('tgl_terima'),
            'pengirim' => $this->request->getVar('pengirim'),
            'id_tujuan' => $this->request->getVar('id_tujuan'),
            'perihal' => $this->request->getVar('perihal'),
            'pengolah2' => $this->request->getVar('pengolah2'),
            'jenis' => $this->request->getVar('jenis'),
            'klasifikasi' => $this->request->getVar('klasifikasi'),
            'lampiran' => $image,
            // 'lampiran_type' => $file_type,
            'catatan' => $this->request->getVar('catatan')

        ]);

        session()->setFlashdata('pesan', 'Data berhasil Ditambahkan.');


        return redirect()->to('/suratmasuk');
    }
    public function delete($id)
    {
        $this->suratmasukModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil Dihapus.');
        return redirect()->to('/suratmasuk');
    }

    public function edit($id)
    {

        $data = [
            'title' => 'PDAM | Form Edit Data',
            'validation' => \config\Services::validation(),
            'sm' => $this->suratmasukModel->find($id)
        ];
        return view('suratmasuk/edit', $data);
    }
    public function update($id)
    {
        // validasi input
        if (!$this->validate([
            'no_surat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => ' Harap tetapkan tanggal.'
                ]
            ],
            'tgl_surat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => ' Harap tetapkan tanggal.'
                ]
            ],
            'tgl_terima' => [
                'rules' => 'required',
                'errors' => [
                    'required' => ' Harap tetapkan tanggal.'
                ]
            ],
            'pengirim' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kepada Harus diisi.'
                ]
            ],
            'perihal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Perihal Harus diisi.'
                ]
            ],
            'lampiran' => [
                'rules' => 'uploaded[lampiran]|max_size[lampiran,1024]|is_image[lampiran]|mime_in[lampiran,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Masukkan gambar terlebih dahulu',
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar',

                ]
            ]

        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/suratmasuk/edit/' . $id)->withInput();
        }
        //disini untuk upload gambar
        // $image = 'fdf';
        // if (isset($_FILES['lampiran']['tmp_name'])) {
        //     $file_name = $_FILES['lampiran']['name'];
        //     $file_size = $_FILES['lampiran']['size'];
        //     $file_type = $_FILES['lampiran']['type'];
        //     $image   = addslashes(file_get_contents($_FILES['lampiran']['tmp_name']));
        // }
        $fileLampiran = $this->request->getFile('lampiran');
        $image = $fileLampiran->getRandomName();
        $fileLampiran->move('img', $image);

        $this->suratmasukModel->save([
            'id_suratmasuk' => $id,
            'no_surat' => $this->request->getVar('no_surat'),
            'tgl_surat' => $this->request->getVar('tgl_surat'),
            'tgl_terima' => $this->request->getVar('tgl_terima'),
            'pengirim' => $this->request->getVar('pengirim'),
            'id_tujuan' => $this->request->getVar('id_tujuan'),
            'perihal' => $this->request->getVar('perihal'),
            'pengolah' => $this->request->getVar('pengolah'),
            'jenis' => $this->request->getVar('jenis'),
            'klasifikasi' => $this->request->getVar('klasifikasi'),
            'lampiran' => $image,
            // 'lampiran_type' => $file_type,
            'catatan' => $this->request->getVar('catatan')

        ]);

        session()->setFlashdata('pesan', 'Data berhasil Diperbarui.');

        return redirect()->to('/suratmasuk');
    }

    public function img($id)
    {

        $data = $this->suratmasukModel->find($id);
        echo '<img src="data:image/jpeg;base64,' . base64_encode($data['lampiran']) . '"/>';
    }

    public function disposisi($id_suratmasuk)
    {
        // $this->model->disposisi();
        // $suratmasuk = $this->suratmasukModel->findAll();
        // $disposisi = $this->disposisiModel->getDisposisi();

        // $data = [
        //     'title' => 'PDAM | Disposisi',
        //     'disposisi' => $disposisi
        // ];

        // $data['suratmasuk'] = $this->suratmasukModel->getdatawithadd('id_suratmasuk = ' . $id);
        // $data['disposisi'] = $this->suratmasukModel->getotherwithadd('disposisi', 'inner join suratmasuk on disposisi.id_suratmasuk = suratmasuk.id_suratmasuk where disposisi.id_suratmasuk=' . $id)->result();

        // $disposisi = $this->suratmasukModel->getDisposisi();
        // $perihal = $disposisi->perihal;

        $suratmasuk = $this->suratmasukModel->where('id_suratmasuk', $id_suratmasuk)->findAll();

        $disposisi = $this->disposisiModel->where('id_suratmasuk', $id_suratmasuk)->findAll();





        $data = [
            'title' => 'PDAM | Disposisi',
            'id_suratmasuk' => $id_suratmasuk,
            'suratmasuk' => $suratmasuk,
            'disposisi' => $disposisi

        ];

        // $db = db_connect();
        // $db->query('');


        //$suratmasukModel = new \App\Models\SuratmasukModel();

        return view('suratmasuk/disposisi', $data);
    }

    public function tampil($id_suratmasuk)
    {
        $suratmasuk = $this->suratmasukModel->where('id_suratmasuk', $id_suratmasuk)->find();

        $data = [
            'title' => 'PDAM | Form Tambah Data',
            'suratmasuk' => $suratmasuk,
            'validation' => \Config\Services::validation()
        ];

        return view('suratmasuk/inputdisposisi', $data);
    }



    public function savedisposisi()
    {

        // validasi input
        if (!$this->validate([

            'tgl_disposisi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => ' Harap tetapkan tanggal.'
                ]
            ],
            'diteruskan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Diteruskan Harus diisi.'
                ]
            ]

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/suratmasuk/disposisi')->withInput('validation', $validation);
        }
        // //disini untuk upload gambar
        // $image = 'fdf';
        // if (isset($_FILES['lampiran']['tmp_name'])) {
        //     $file_name = $_FILES['lampiran']['name'];
        //     $file_size = $_FILES['lampiran']['size'];
        //     $file_type = $_FILES['lampiran']['type'];
        //     $image   = addslashes(file_get_contents($_FILES['lampiran']['tmp_name']));
        // }

        $this->disposisiModel->save([
            'pengisi' => $this->request->getVar('pengisi'),
            'tgl_disposisi' => $this->request->getVar('tgl_disposisi'),
            'disposisii' => $this->request->getVar('disposisii'),
            'diteruskan' => $this->request->getVar('diteruskan'),
            'keterangan' => $this->request->getVar('keterangan'),
            'id_suratmasuk' => $this->request->getVar('id_suratmasuk'),
            'no_surat' => $this->request->getVar('no_surat'),
            'perihal' => $this->request->getVar('perihal')

        ]);

        session()->setFlashdata('pesan', 'Data berhasil Ditambahkan.');


        return redirect()->to('/suratmasuk');
    }
    public function deletedisposisi($id)
    {
        $this->disposisiModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil Dihapus.');
        return redirect()->to('/suratmasuk');
    }

    public function editdisposisi($id)
    {

        $data = [
            'title' => 'PDAM | Form Edit Data',
            'validation' => \config\Services::validation(),
            'sm' => $this->disposisiModel->find($id)
        ];
        return view('suratmasuk/editdisposisi', $data);
    }
    public function updatedisp($id)
    {
        // validasi input
        if (!$this->validate([

            'tgl_disposisi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => ' Harap tetapkan tanggal.'
                ]
            ]

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/suratmasuk/editdisposisi')->withInput('validation', $validation);
        }
        // //disini untuk upload gambar
        // $image = 'fdf';
        // if (isset($_FILES['lampiran']['tmp_name'])) {
        //     $file_name = $_FILES['lampiran']['name'];
        //     $file_size = $_FILES['lampiran']['size'];
        //     $file_type = $_FILES['lampiran']['type'];
        //     $image   = addslashes(file_get_contents($_FILES['lampiran']['tmp_name']));
        // }

        $this->disposisiModel->save([
            'pengisi' => $this->request->getVar('pengisi'),
            'tgl_disposisi' => $this->request->getVar('tgl_disposisi'),
            'disposisii' => $this->request->getVar('disposisii'),
            'diteruskan' => $this->request->getVar('diteruskan'),
            'keterangan' => $this->request->getVar('keterangan'),
            'id_suratmasuk' => $this->request->getVar('id_suratmasuk'),
            'no_surat' => $this->request->getVar('no_surat'),
            'perihal' => $this->request->getVar('perihal'),

        ]);


        session()->setFlashdata('pesan', 'Data berhasil Diperbarui.');

        $suratmasuk = $this->suratmasukModel->findAll();
        $currentPage = $this->request->getVar('page_disposisi') ? $this->request->getVar('page_disposisi') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $disp = $this->disposisiModel->search($keyword);
        } else {
            $disp = $this->disposisiModel;
        }

        $data = [
            'title' => 'PDAM | Surat Masuk',
            // 'disposisi' => $disposisi
            'disp' => $disp->paginate(3, 'disposisi'),
            'pager' => $this->disposisiModel->pager,
            'currentPage' => $currentPage,
            'suratmasuk' => $suratmasuk,
            'disposisi' => $this->disposisiModel->getDisposisi()
        ];


        //$suratmasukModel = new \App\Models\SuratmasukModel();

        return view('suratmasuk/disposisi', $data);
    }
    public function printpdfs()
    {

        $dompdf = new Dompdf();

        $suratmasuk = $this->suratmasukModel->findAll();

        $currentPage = $this->request->getVar('page_suratmasuk') ? $this->request->getVar('page_suratmasuk') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $surkel = $this->suratmasukModel->search($keyword);
        } else {
            $surkel = $this->suratmasukModel;
        }
        $data = [
            'title' => 'PDAM | Surat Masuk',
            // 'suratmasuk' => $suratmasuk
            'suratmasuk' => $surkel->paginate(5, 'suratmasuk'),
            'pager' => $this->suratmasukModel->pager,
            'currentPage' => $currentPage,
            'suratmasuk' => $suratmasuk
        ];
        $data['title'] = 'Surat Masuk';
        $data['activeMenu'] = 'suratmasuk';

        //$suratmasukModel = new \App\Models\SuratmasukModel();


        $html = view('suratmasuk/pdf_view', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('Surat Masuk.pdf', array(
            "Attachment" => false
        ));
    }
    public function printpdfdis($id_suratmasuk)
    {

        $dompdf = new Dompdf();

        // $disposisi = $this->disposisiModel->findAll();
        // $suratmasuk = $this->suratmasukModel->findAll();

        $suratmasuk = $this->suratmasukModel->where('id_suratmasuk', $id_suratmasuk)->findAll();

        $disposisi = $this->disposisiModel->where('id_suratmasuk', $id_suratmasuk)->findAll();


        $currentPage = $this->request->getVar('page_disposisi') ? $this->request->getVar('page_disposisi') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $surkel = $this->disposisiModel->search($keyword);
        } else {
            $surkel = $this->disposisiModel;
        }
        $data = [
            'title' => 'PDAM | Surat Masuk',
            // 'disposisi' => $disposisi
            // 'id_suratmasuk' => $id_suratmasuk,
            'disposisi' => $surkel->paginate(5, 'disposisi'),
            'pager' => $this->disposisiModel->pager,
            'currentPage' => $currentPage,
            'disposisi' => $disposisi,
            'suratmasuk' => $this->disposisiModel->getSuratmasuk()

        ];
        $data['title'] = 'Surat Masuk';
        $data['activeMenu'] = 'suratmasuk';

        //$disposisiModel = new \App\Models\disposisiModel();


        $html = view('suratmasuk/pdf_viewdisposisi', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('Disposisi.pdf', array(
            "Attachment" => false
        ));
    }
    public function printexcel()
    {
        $suratmasukModel = new suratmasukModel();
        $suratmasuk = $suratmasukModel->findAll();

        $spreadsheet = new Spreadsheet();

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'No Surat')
            ->setCellValue('C1', 'Tanggal Surat')
            ->setCellValue('D1', 'Tanggal Terima')
            ->setCellValue('E1', 'Pengirim')
            ->setCellValue('F1', 'Perihal')
            ->setCellValue('G1', 'Pengolah')
            ->setCellValue('H1', 'Jenis')
            ->setCellValue('I1', 'Klasifikasi')
            ->setCellValue('J1', 'Dokumen')
            ->setCellValue('K1', 'Catatan');

        $column = 2;
        // var_dump($suratmasuk);

        foreach ($suratmasuk as $smas) {
            $spreadsheet->setActiveSheetIndex(0)

                ->setCellValue('A' . $column, $column - 1)
                ->setCellValue('B' . $column, $smas['no_surat'])
                ->setCellValue('C' . $column, $smas['tgl_surat'])
                ->setCellValue('D' . $column, $smas['tgl_terima'])
                ->setCellValue('E' . $column, $smas['pengirim'])
                ->setCellValue('F' . $column, $smas['perihal'])
                ->setCellValue('G' . $column, $smas['pengolah'])
                ->setCellValue('H' . $column, $smas['jenis'])
                ->setCellValue('I' . $column, $smas['klasifikasi'])
                ->setCellValue('J' . $column, $smas['lampiran'])
                ->setCellValue('K' . $column, $smas['catatan']);

            $column++;
        }


        $writer = new Xlsx($spreadsheet);
        $filename = date('Y-m-d-His') . '-Data-smas';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function printexceldis($id_suratmasuk)
    {
        $disposisiModel = new disposisiModel();
        // $disposisi = $disposisiModel->findAll();

        $suratmasuk = $this->suratmasukModel->where('id_suratmasuk', $id_suratmasuk)->findAll();

        $disposisi = $this->disposisiModel->where('id_suratmasuk', $id_suratmasuk)->findAll();

        $spreadsheet = new Spreadsheet();

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Pengisi Disposisi')
            ->setCellValue('C1', 'Nomor Surat')
            ->setCellValue('D1', 'Tanggal Disposisi')
            ->setCellValue('E1', 'Disposisi')
            ->setCellValue('F1', 'Diteruskan')
            ->setCellValue('G1', 'Keterangan');

        $column = 2;
        // var_dump($disposisi);

        foreach ($disposisi as $dispo) {
            $spreadsheet->setActiveSheetIndex(0)

                ->setCellValue('A' . $column, $column - 1)
                ->setCellValue('B' . $column, $dispo['pengisi'])
                ->setCellValue('C' . $column, $dispo['no_surat'])
                ->setCellValue('D' . $column, $dispo['tgl_disposisi'])
                ->setCellValue('E' . $column, $dispo['disposisii'])
                ->setCellValue('F' . $column, $dispo['diteruskan'])
                ->setCellValue('G' . $column, $dispo['keterangan']);

            $column++;
        }


        $writer = new Xlsx($spreadsheet);
        $filename = date('Y-m-d-His') . '-Data-Disposisi';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
