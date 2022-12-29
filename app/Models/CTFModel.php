<?php

namespace App\Models;

use CodeIgniter\Model;

class CTFModel extends Model
{
    protected $table = 'ctf';
    protected $primaryKey = 'ctf_tim_id';
    protected $allowedFields = [
        'ctf_tim_nama', 
        'ctf_asal_institusi', 
        'ctf_phone_ketua', 
        'ctf_jum_anggota', 
        'ctf_dc_ketua', 
        'ctf_nama_ketua', 
        'ctf_email_ketua', 
        'ctf_kp_surket_ketua', 
        'ctf_ig_ara_ketua', 
        'ctf_tiktok_ketua', 
        'ctf_nama_anggota_1', 
        'ctf_kp_surket_anggota_1', 
        'ctf_ig_ara_anggota_1', 
        'ctf_tiktok_anggota_1', 
        'ctf_nama_anggota_2',	
        'ctf_kp_surket_anggota_2',	
        'ctf_ig_ara_anggota_2',	
        'ctf_tiktok_anggota_2',	
        'ctf_bukti_bayar'
    ];
    
    protected $useTimestamps = true; // untuk fitur created_at dan updated_at yang update otomatis
    protected $createdField = 'ctf_date_created';
    protected $updatedField = 'ctf_date_updated';

    // public function getData($tim = false) {
    //     if ($tim == false) {
    //         return $this->findAll();
    //     }
    //     return $this->where(['ctf_tim_nama' => $tim])->first();
    // }
}