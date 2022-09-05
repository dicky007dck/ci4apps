<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratkeluarModel extends Model
{
    protected $table = 'suratkeluar';
    protected $primaryKey = 'id_suratkeluar';
    protected $useTimestamps = true;
    protected $allowedFields = ['tgl_surat', 'kepada', 'perihal', 'pengolah', 'jenis', 'klasifikasi', 'lampiran', 'catatan'];

    public function search($keyword)
    {
        return $this->table('suratkeluar')->like('kepada', $keyword)->orLike('perihal', $keyword)->orLike('pengolah', $keyword)->orLike('jenis', $keyword)->orLike('klasifikasi', $keyword)->orLike('catatan', $keyword);
    }
}
