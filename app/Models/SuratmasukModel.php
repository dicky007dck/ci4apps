<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratmasukModel extends Model
{
    protected $table = 'suratmasuk';
    protected $primaryKey = 'id_suratmasuk';
    protected $useTimestamps = true;
    protected $allowedFields = ['no_surat', 'tgl_surat', 'tgl_terima', 'pengirim', 'perihal', 'pengolah', 'jenis', 'klasifikasi', 'lampiran', 'catatan'];

    public function search($keyword)
    {
        return $this->table('suratmasuk')->like('no_surat', $keyword)->orLike('pengirim', $keyword)->orLike('perihal', $keyword)->orLike('pengolah', $keyword)->orLike('jenis', $keyword)->orLike('klasifikasi', $keyword)->orLike('catatan', $keyword);
    }

    public function getDisposisi($no_surat = false)
    {
        if ($no_surat == false) {
            return $this->findAll();
        }

        return $this->where(['no_surat' => $no_surat])->first();
    }

    public function getDp($no_surat)
    {


        $builder = $this->db->table('suratmasuk');
        $builder->select('*');
        $builder->where('no_surat', $no_surat);
        $query = $builder->get();
        return $query;
    }

    // public function getdatawithadd()
    // {
    //     $builder = $this->db->table('suratmasuk');
    //     $query = $builder->get();

    //     return $query;

    //     //select sm.nomer_suratnya, *.dp from table_disposisinya dp join table_surat_masuknya sm on sm.id_suratnya = dp.id_suratnya
    // }
} //{
//     return $table = 'disposisi';
//     return $primaryKey = 'id_disposisi';
//     return $useTimestamps = true;
//     return $allowedFields = ['tgl_disposisi', 'disposisi', 'diteruskan', 'catatan'];
// }
