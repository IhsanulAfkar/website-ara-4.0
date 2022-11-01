<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\OlimModel;

class VerifyRegistrasi extends BaseController
{
    public function __construct()
    {
        $this->session = session();
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
        $imgSizeError = 'Melebihi batas max 500 kb';
        $imgTypeError = 'File ini bukan gambar';

        $validationRules = [
            'tim_nama' => [
                'label' => 'tim_nama',
                'rules' => 'required|uniqe[olim.olim_tim_nama]',
                'errors' => [
                    'required' => $fieldError,
                ]
            ],
            'bukti_bayar' => [
                'label' => 'bukti_bayar',
                'rules' => 'uploaded[olim_bukti_bayar]|max_size[bukti_bayar,500]|is_image[bukti_bayar]',
                'errors' => [
                    'uploaded' => $fieldError,
                    'max_size' => $imgSizeError,
                    'is_image' => $imgTypeError,
                ]
            ],
            'nama_ketua' => [
                'label' => 'nama_ketua',
                'rules' => 'required',
                'errors' => [
                    'required' => $fieldError,
                ]
            ],
            'nisn_ketua' => [
                'label' => 'nisn_ketua',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => $fieldError,
                    'numeric' => 'NISN harus berupa angka',
                ]
            ],
            'email_ketua' => [
                'label' => 'email_ketua',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => $fieldError,
                    'valid_email' => 'Email tidak valid',
                ]
            ],
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to('/register-olimpiade')->withInput();
        }

        $fileBuktiBayar = $this->request->getFile('bukti_bayar');

        // Pindahkan file ke folder
        $bukti_bayar_path = 'uploads/olim/bukti_bayar/';

        //renamed bukti bayar
        $movedBuktiBayar = $this->moveFile($bukti_bayar_path, $fileBuktiBayar);
        $data =
            [
                'olim_tim_nama' => $this->request->getVar('tim_nama'),
                'olim_bukti_bayar' => $movedBuktiBayar,
                'olim_nama_ketua' => $this->request->getVar('nama_ketua'),
                'olim_nisn_ketua' => $this->request->getVar('nisn_ketua'),
                'olim_email_ketua' => $this->request->getVar('email_ketua'),
            ];

        // Insert ke db dan redirect ke finish regist
        $this->Olim_Model->save($data);
        session()->setFlashdata('pesan', 'Registrasi berhasil');
        return redirect()->to('/home/coba');
    }
}
