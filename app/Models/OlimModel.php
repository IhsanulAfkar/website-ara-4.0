<?php

namespace App\Models;

use CodeIgniter\Model;

class OlimModel extends Model
{
    protected $table = 'olim';
    protected $primaryKey = 'olim_tim_id';
    
    protected $allowedFields =  [
                                'olim_tim_nama',
                                'olim_bukti_bayar',
                                'olim_nama_ketua',
                                'olim_nisn_ketua',
                                'olim_email_ketua',
                                ];
    
    protected $useTimestamps = true;
    protected $createdField = 'olim_date_created';
    protected $updatedField = 'olim_date_updated';
}
