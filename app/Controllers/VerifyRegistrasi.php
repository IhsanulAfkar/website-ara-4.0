<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\OlimModel;

class VerifyRegistrasi extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();;
        $this->Olim_Model = new OlimModel();
    }

    private function moveFile($path, $file)
    {
        if (!empty($file)) {
            $renamed = $file->getRandomName();
            $file->move($path, $renamed);
            return $renamed;
        }
        // File tidak ada
        return null;
    }
    public function verify_regis_olim()
    {
        $fieldError = 'Field ini harus diisi';
        $imgSizeError = 'Melebihi batas max 1 mb';
        $imgTypeError = 'File ini bukan gambar';

        $validationRules = [
            'tim_nama' => [
                'label' => 'tim_nama',
                'rules' => 'required|is_unique[olim.olim_tim_nama]',
                'errors' => [
                    'required' => $fieldError,
                    'is_unique' => 'Nama tim sudah terdaftar'
                ]
            ],
            'nama_ketua' => [
                'label' => 'nama_ketua',
                'rules' => 'required',
                'errors' => [
                    'required' => $fieldError,
                ]
            ],
            'asal_institusi' => [
                'label' => 'asal_institusi',
                'rules' => 'required',
                'errors' => [
                    'required' => $fieldError,
                ]
            ],
            'email_ketua' => [
                'label' => 'email_ketua',
                'rules' => 'required|valid_email|is_unique[olim.olim_email_ketua]',
                'errors' => [
                    'required' => $fieldError,
                    'valid_email' => 'Email tidak valid',
                    'is_unique' => 'Email sudah terdaftar'
                ]
            ],
            'nama_anggota_1' => [
                'label' => 'nama_anggota_1',
                'rules' => 'required',
                'errors' => [
                    'required' => $fieldError,
                ]
            ],
            'surket_ketua' => [
                'label'     => 'suket_ketua',
                'rules'     => 'uploaded[surket_ketua]|is_image[surket_ketua]|max_size[surket_ketua, 1024]',
                'errors'    => [
                    'uploaded'  => 'Field ini harus diisi',
                    'is_image'  => $imgTypeError,
                    'max_size'  => $imgSizeError
                ]
            ],
            'surket_anggota_1' => [
                'label'     => 'surket_anggota_1',
                'rules'     => 'uploaded[surket_anggota_1]|is_image[surket_anggota_1]|max_size[surket_anggota_1, 1024]',
                'errors'    => [
                    'uploaded'  => 'Field ini harus diisi',
                    'is_image'  => $imgTypeError,
                    'max_size'  => $imgSizeError
                ]
            ],
            'ig_ara_ketua' => [
                'label'     => 'ig_ara_ketua',
                'rules'     => 'uploaded[ig_ara_ketua]|is_image[ig_ara_ketua]|max_size[ig_ara_ketua, 1024]',
                'errors'    => [
                    'uploaded'  => 'Field ini harus diisi',
                    'is_image'  => $imgTypeError,
                    'max_size'  => $imgSizeError
                ]
            ],
            'ig_hmit_ketua' => [
                'label'     => 'ig_hmit_ketua',
                'rules'     => 'uploaded[ig_hmit_ketua]|is_image[ig_hmit_ketua]|max_size[ig_hmit_ketua, 1024]',
                'errors'    => [
                    'uploaded'  => 'Field ini harus diisi',
                    'is_image'  => $imgTypeError,
                    'max_size'  => $imgSizeError
                ]
            ],
            'ig_ara_anggota_1' => [
                'label'     => 'ig_ara_anggota_1',
                'rules'     => 'uploaded[ig_ara_anggota_1]|is_image[ig_ara_anggota_1]|max_size[ig_ara_anggota_1, 1024]',
                'errors'    => [
                    'uploaded'  => 'Field ini harus diisi',
                    'is_image'  => $imgTypeError,
                    'max_size'  => $imgSizeError
                ]
            ],
            'ig_hmit_anggota_1' => [
                'label'     => 'ig_hmit_anggota_1',
                'rules'     => 'uploaded[ig_hmit_anggota_1]|is_image[ig_hmit_anggota_1]|max_size[ig_hmit_anggota_1, 1024]',
                'errors'    => [
                    'uploaded'  => 'Field ini harus diisi',
                    'is_image'  => $imgTypeError,
                    'max_size'  => $imgSizeError
                ]
            ],
            'bukti_bayar' => [
                'label'     => 'bukti_bayar',
                'rules'     => 'uploaded[bukti_bayar]|is_image[bukti_bayar]|max_size[bukti_bayar, 1024]',
                'errors'    => [
                    'uploaded'  => 'Field ini harus diisi',
                    'is_image'  => $imgTypeError,
                    'max_size'  => $imgSizeError
                ]
            ],
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to('/register/olimpiade')->withInput();
        }

        $tim_nama = $this->request->getVar('tim_nama');
        $asal_institusi = $this->request->getVar('asal_institusi');

        // ketua
        $nama_ketua = $this->request->getVar('nama_ketua');
        $phone_ketua = $this->request->getVar('phone_ketua');
        $email_ketua = $this->request->getVar('email_ketua');
        $surket_ketua = $this->request->getFile('surket_ketua');
        $ig_ara_ketua = $this->request->getFile('ig_ara_ketua');
        $ig_hmit_ketua = $this->request->getFile('ig_hmit_ketua');

        // Anggota 
        $nama_anggota_1 = $this->request->getVar('nama_anggota_1');
        $surket_anggota_1 = $this->request->getFile('surket_anggota_1');
        $ig_ara_anggota_1 = $this->request->getFile('ig_ara_anggota_1');
        $ig_hmit_anggota_1 = $this->request->getFile('ig_hmit_anggota_1');

        $fileBuktiBayar = $this->request->getFile('bukti_bayar');

        // Define path
        $bukti_bayar_path = 'uploads/olim/bukti_bayar/';
        $surket_path = 'uploads/olim/suket/';
        $ig_ara_path = 'uploads/olim/ig_ara/';
        $ig_hmit_path = 'uploads/olim/ig_hmit/';

        // Pindah file + rename
        $moved_surket_ketua = $this->moveFile($surket_path, $surket_ketua);
        $moved_surket_anggota_1 = $this->moveFile($surket_path, $surket_anggota_1);
        $moved_ig_ara_ketua = $this->moveFile($ig_ara_path, $ig_ara_ketua);
        $moved_ig_ara_anggota_1 = $this->moveFile($ig_ara_path, $ig_ara_anggota_1);
        $moved_ig_hmit_ketua = $this->moveFile($ig_hmit_path, $ig_hmit_ketua);
        $moved_ig_hmit_anggota_1 = $this->moveFile($ig_hmit_path, $ig_hmit_anggota_1);

        $movedBuktiBayar = $this->moveFile($bukti_bayar_path, $fileBuktiBayar);
        $data =
            [
                'olim_tim_nama' => $tim_nama,
                'olim_asal_institusi' => $asal_institusi,
                'olim_nama_ketua' => $nama_ketua,
                'olim_phone_ketua' => $phone_ketua,
                'olim_email_ketua' => $email_ketua,
                'olim_kp_surket_ketua' => $moved_surket_ketua,
                'olim_nama_anggota_1' => $nama_anggota_1,
                'olim_kp_surket_anggota_1' => $moved_surket_anggota_1,
                'olim_ig_ara_ketua' => $moved_ig_ara_ketua,
                'olim_ig_hmit_ketua' => $moved_ig_hmit_ketua,
                'olim_ig_ara_anggota_1' => $moved_ig_ara_anggota_1,
                'olim_ig_hmit_anggota_1' => $moved_ig_hmit_anggota_1,
                'olim_bukti_bayar' => $movedBuktiBayar,
                // olim_status 0 berarti belum konfirmasi
                'olim_status' => 0,
                'olim_status_final' => 0,
            ];

        // Insert ke db dan redirect ke finish regist
        $this->Olim_Model->save($data);
        $this->session->setFlashdata('msg', 'Registrasi berhasil');
        return redirect()->to('/register/olimpiade');
    }
}
