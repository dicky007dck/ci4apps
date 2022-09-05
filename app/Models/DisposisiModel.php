<?php

namespace App\Models;

use CodeIgniter\Model;

class DisposisiModel extends Model
{
    protected $table = 'disposisi';
    protected $primaryKey = 'id_disposisi';
    protected $useTimestamps = true;
    protected $allowedFields = ['pengisi', 'tgl_disposisi', 'disposisii', 'diteruskan', 'keterangan', 'no_surat', 'perihal'];

    function getAll()
    {
        $builder = $this->db->table('disposisi');
        $builder->select('no_surat');
        $builder->join('suratmasuk', 'suratmasuk.id_suratmasuk = disposisi.id_suratmasuk');
        $query = $builder->get();
        return $query->getResult();
    }
    public function search($keyword)
    {
        return $this->table('disposisi')->like('pengisi', $keyword)->orLike('disposisi', $keyword)->orLike('perihal', $keyword)->orLike('diteruskan', $keyword)->orLike('keterangan', $keyword);
    }

    public function getSuratmasuk($no_surat = false)
    {
        if ($no_surat == false) {
            return $this->findAll();
        }

        return $this->where(['no_surat' => $no_surat])->first();
    }
}
