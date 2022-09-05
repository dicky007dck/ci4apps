<?php

namespace App\Controllers;

use App\Models\SuratkeluarModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;

class Suratkeluar extends BaseController
{
    protected $suratkeluarModel;
    public function __construct()
    {
        $this->suratkeluarModel = new SuratkeluarModel();
    }

    public function index()
    {
        $suratkeluar = $this->suratkeluarModel->findAll();

        $currentPage = $this->request->getVar('page_suratkeluar') ? $this->request->getVar('page_suratkeluar') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $surkel = $this->suratkeluarModel->search($keyword);
        } else {
            $surkel = $this->suratkeluarModel;
        }

        $data = [
            'title' => 'PDAM | Surat Keluar',
            // 'suratkeluar' => $suratkeluar
            'suratkeluar' => $surkel->paginate(5, 'suratkeluar'),
            'pager' => $this->suratkeluarModel->pager,
            'currentPage' => $currentPage
        ];
        $data['title'] = 'Surat Keluar';
        $data['activeMenu'] = 'suratkeluar';

        //$suratkeluarModel = new \App\Models\SuratkeluarModel();


        echo view('suratkeluar/index', $data);
    }


    public function create()
    {

        $data = [
            'title' => 'PDAM | Form Tambah Data',
            'validation' => \Config\Services::validation()
        ];

        return view('suratkeluar/create', $data);
    }
    public function save()
    {

        // validasi input
        if (!$this->validate([
            'tgl_surat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => ' Harap tetapkan tanggal.'
                ]
            ],
            'kepada' => [
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
            return redirect()->to('/suratkeluar/create')->withInput();
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
        $namaLampiran = $fileLampiran->getRandomName();
        $fileLampiran->move('img', $namaLampiran);

        $this->suratkeluarModel->save([
            'tgl_surat' => $this->request->getVar('tgl_surat'),
            'kepada' => $this->request->getVar('kepada'),
            'id_tujuan' => $this->request->getVar('id_tujuan'),
            'perihal' => $this->request->getVar('perihal'),
            'pengolah' => $this->request->getVar('pengolah'),
            'jenis' => $this->request->getVar('jenis'),
            'klasifikasi' => $this->request->getVar('klasifikasi'),
            // 'lampiran' => $image,
            'lampiran' => $namaLampiran,
            // 'lampiran_type' => $file_type,
            'catatan' => $this->request->getVar('catatan')


        ]);

        session()->setFlashdata('pesan', 'Data berhasil Ditambahkan.');


        return redirect()->to('/suratkeluar');
    }
    public function delete($id)
    {
        $this->suratkeluarModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil Dihapus.');
        return redirect()->to('/suratkeluar');
    }
    public function edit($id)
    {

        $data = [
            'title' => 'PDAM | Form Edit Data',
            'validation' => \config\Services::validation(),
            's' => $this->suratkeluarModel->find($id)
        ];
        return view('suratkeluar/edit', $data);
    }
    public function update($id)
    {

        if (!$this->validate([
            'tgl_surat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => ' Harap tetapkan tanggal.'
                ]
            ],
            'kepada' => [
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
            return redirect()->to('/suratkeluar/edit/' . $id)->withInput();
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
        $namaLampiran = $fileLampiran->getRandomName();
        $fileLampiran->move('img', $namaLampiran);

        $this->suratkeluarModel->save([
            'id_suratkeluar' => $id,
            'tgl_surat' => $this->request->getVar('tgl_surat'),
            'kepada' => $this->request->getVar('kepada'),
            'id_tujuan' => $this->request->getVar('id_tujuan'),
            'perihal' => $this->request->getVar('perihal'),
            'pengolah' => $this->request->getVar('pengolah'),
            'jenis' => $this->request->getVar('jenis'),
            'klasifikasi' => $this->request->getVar('klasifikasi'),
            'lampiran' => $namaLampiran,
            // 'lampiran_type' => $file_type,
            'catatan' => $this->request->getVar('catatan')

        ]);

        session()->setFlashdata('pesan', 'Data berhasil Diperbarui.');


        return redirect()->to('/suratkeluar');
    }
    public function img($id)
    {

        $data = $this->suratkeluarModel->find($id);
        echo '<img src="data:image/jpeg;base64,' . base64_encode($data['lampiran']) . '"/>';
    }
    public function export()
    {
        $suratkeluar = $this->suratkeluarModel->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('C1', 'Tanggal Surat');
        $sheet->setCellValue('E1', 'Kepada');
        $sheet->setCellValue('F1', 'Perihal');
        $sheet->setCellValue('G1', 'Pengolah');
        $sheet->setCellValue('H1', 'jenis');
        $sheet->setCellValue('I1', 'Klasifikasi');
        $sheet->setCellValue('J1', 'Dokumen');
        $sheet->setCellValue('K1', 'Catatan');

        $column = 2;
        foreach ($suratkeluar as $key => $value) {
            $sheet->setCellValue('A' . $column, ($column - 1));
            $sheet->setCellValue('B' . $column, $value->tgl_surat);
            $sheet->setCellValue('C' . $column, $value->kepada);
            $sheet->setCellValue('D' . $column, $value->perihal);
            $sheet->setCellValue('E' . $column, $value->pengolah);
            $sheet->setCellValue('F' . $column, $value->jenis);
            $sheet->setCellValue('G' . $column, $value->klasifikasi);
            $sheet->setCellValue('H' . $column, $value->lampiran);
            $sheet->setCellValue('I' . $column, $value->catatan);
            $column++;

            // foreach ($suratkeluar as $skel) {
            //     $spreadsheet->setActiveSheetIndex(0)

            //         ->setCellValue('A' . $column, [$column - 1])
            //         ->setCellValue('B' . $column, $skel['tgl_surat'])
            //         ->setCellValue('C' . $column, $skel['kepada'])
            //         ->setCellValue('D' . $column, $skel['perihal'])
            //         ->setCellValue('E' . $column, $skel['pengolah'])
            //         ->setCellValue('F' . $column, $skel['jenis'])
            //         ->setCellValue('G' . $column, $skel['klasifikasi'])
            //         ->setCellValue('H' . $column, $skel['lampiran'])
            //         ->setCellValue('I' . $column, $skel['catatan']);

            //     $column++;
        }
        $sheet->getStyle('A1:I1')->getFont()->setBold(true);
        $sheet->getStyle('A1:I1')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFFFFF00');
        $styleArray = [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                'color' => ['argb' => 'FF000000'],
            ],
        ];

        $sheet->getStyle('A1:K' . ($column - 1))->applyFromArray($styleArray);

        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->getColumnDimension('H')->setAutoSize(true);
        $sheet->getColumnDimension('I')->setAutoSize(true);
        $sheet->getColumnDimension('J')->setAutoSize(true);

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=contents.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }
    public function printpdf()
    {

        $dompdf = new Dompdf();

        $suratkeluar = $this->suratkeluarModel->findAll();

        $currentPage = $this->request->getVar('page_suratkeluar') ? $this->request->getVar('page_suratkeluar') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $surkel = $this->suratkeluarModel->search($keyword);
        } else {
            $surkel = $this->suratkeluarModel;
        }

        $data = [
            'title' => 'PDAM | Surat Keluar',
            // 'suratkeluar' => $suratkeluar
            'suratkeluar' => $surkel->paginate(5, 'suratkeluar'),
            'pager' => $this->suratkeluarModel->pager,
            'currentPage' => $currentPage
        ];
        $data['title'] = 'Surat Keluar';
        $data['activeMenu'] = 'suratkeluar';

        //$suratkeluarModel = new \App\Models\SuratkeluarModel();


        $html = view('suratkeluar/pdf_view', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('Surat Keluar.pdf', array(
            "Attachment" => false
        ));
    }
    public function printexcel()
    {
        $suratkeluarModel = new suratkeluarModel();
        $suratkeluar = $suratkeluarModel->findAll();

        $spreadsheet = new Spreadsheet();

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Tanggal Surat')
            ->setCellValue('C1', 'Kepada')
            ->setCellValue('D1', 'Perihal')
            ->setCellValue('E1', 'Pengolah')
            ->setCellValue('F1', 'Jenis')
            ->setCellValue('G1', 'Klasifikasi')
            ->setCellValue('H1', 'Dokumen')
            ->setCellValue('I1', 'Catatan');

        $column = 2;
        // var_dump($suratkeluar);

        foreach ($suratkeluar as $skel) {
            $spreadsheet->setActiveSheetIndex(0)

                ->setCellValue('A' . $column, $column - 1)
                ->setCellValue('B' . $column, $skel['tgl_surat'])
                ->setCellValue('C' . $column, $skel['kepada'])
                ->setCellValue('D' . $column, $skel['perihal'])
                ->setCellValue('E' . $column, $skel['pengolah'])
                ->setCellValue('F' . $column, $skel['jenis'])
                ->setCellValue('G' . $column, $skel['klasifikasi'])
                ->setCellValue('H' . $column, $skel['lampiran'])
                ->setCellValue('I' . $column, $skel['catatan']);

            $column++;
        }


        $writer = new Xlsx($spreadsheet);
        $filename = date('Y-m-d-His') . '-Data-skel';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
