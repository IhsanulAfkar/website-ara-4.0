<?php

namespace App\Models;

use CodeIgniter\Model;

class OlimModel extends Model
{
    protected $table = 'olim';
    protected $primaryKey = 'olim_tim_id';

    protected $allowedFields =  [
        'olim_tim_nama',
        'olim_asal_institusi',
        'olim_jumlah_anggota',
        'olim_nama_ketua',
        'olim_phone_ketua',
        'olim_email_ketua',
        'olim_kp_surket_ketua',
        'olim_nama_anggota_1',
        'olim_kp_surket_anggota_1',
        'olim_ig_ara_ketua',
        'olim_tiktok_ketua',
        'olim_ig_ara_anggota_1',
        'olim_tiktok_anggota_1',
        'coupon',
        'olim_bukti_bayar',
        'olim_status',
        'olim_status_final',
    ];

    protected $useTimestamps = true;
    protected $createdField = 'olim_date_created';
    protected $updatedField = 'olim_date_updated';
}
