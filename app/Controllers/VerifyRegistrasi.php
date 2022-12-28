<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\OlimModel;
use App\Models\ExploitModel;

class VerifyRegistrasi extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->Olim_Model = new OlimModel();
        $this->Exploit_Model = new ExploitModel();

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
            'tiktok_ketua' => [
                'label'     => 'tiktok_ketua',
                'rules'     => 'uploaded[tiktok_ketua]|is_image[tiktok_ketua]|max_size[tiktok_ketua, 1024]',
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
            'tiktok_anggota_1' => [
                'label'     => 'tiktok_anggota_1',
                'rules'     => 'uploaded[tiktok_anggota_1]|is_image[tiktok_anggota_1]|max_size[tiktok_anggota_1, 1024]',
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
        $tiktok_ketua = $this->request->getFile('tiktok_ketua');

        // Anggota 
        $nama_anggota_1 = $this->request->getVar('nama_anggota_1');
        $surket_anggota_1 = $this->request->getFile('surket_anggota_1');
        $ig_ara_anggota_1 = $this->request->getFile('ig_ara_anggota_1');
        $tiktok_anggota_1 = $this->request->getFile('tiktok_anggota_1');
        $kupon = $this->request->getVar('kupon');
        $fileBuktiBayar = $this->request->getFile('bukti_bayar');

        // Define path
        $bukti_bayar_path = 'uploads/olim/bukti_bayar/';
        $surket_path = 'uploads/olim/suket/';
        $ig_ara_path = 'uploads/olim/ig_ara/';
        $tiktok_path = 'uploads/olim/tiktok/';

        // Pindah file + rename
        $moved_surket_ketua = $this->moveFile($surket_path, $surket_ketua);
        $moved_surket_anggota_1 = $this->moveFile($surket_path, $surket_anggota_1);
        $moved_ig_ara_ketua = $this->moveFile($ig_ara_path, $ig_ara_ketua);
        $moved_ig_ara_anggota_1 = $this->moveFile($ig_ara_path, $ig_ara_anggota_1);
        $moved_tiktok_ketua = $this->moveFile($tiktok_path, $tiktok_ketua);
        $moved_tiktok_anggota_1 = $this->moveFile($tiktok_path, $tiktok_anggota_1);

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
                'olim_tiktok_ketua' => $moved_tiktok_ketua,
                'olim_ig_ara_anggota_1' => $moved_ig_ara_anggota_1,
                'olim_tiktok_anggota_1' => $moved_tiktok_anggota_1,
                'coupon' => $kupon,
                'olim_bukti_bayar' => $movedBuktiBayar,
                // olim_status 0 berarti belum konfirmasi
                'olim_status' => 0,
                'olim_status_final' => 0,
            ];
        // Kirim Email
        $email = \Config\Services::email();
        $email->setTo($email_ketua);
        $email->setFrom('arenewalagent@gmail.com', 'ARA 4.0');
        $email->setSubject('Email Konfirmasi Pendaftaran Olimpiade');
        $body = "Halo {$tim_nama} dari {$asal_institusi},</br>
        </br>
        Terima kasih sudah mendaftar pada event kami, \"Olimpiade.\"<br>
        <br>
        Dengan ini, kami telah menerima berkas Anda. Kami akan mengecek kelengkapan berkas yang sudah dikirimkan sesuai dengan persyaratan kami. <br>
        <br>
        Terima kasih.<br>
        <br>
        --<br>
        Salam Hormat,<br>
        <br>
        A Renewal Agents 4.0";
        $email->setMessage($body);
        if ($email->send()) {
            $this->Olim_Model->save($data);
            $this->session->setFlashdata('msg', 'Registrasi berhasil');
            return redirect()->to('/register/olimpiade');
        } else {
            $dd = $email->printDebugger(['headers']);
            print_r($dd);
        }
        // Insert ke db dan redirect ke finish regist
    }

    public function verify_regis_exploit()
    {
        // dd("masuk kan ya");
        $fieldError = 'Field ini harus diisi';
        $pdfSizeError = 'Melebihi batas max 1 mb';
        $pdfTypeError = 'File ini bukan pdf';

        $validationRules = [
            'tim_nama' => [
                'label' => 'tim_nama',
                'rules' => 'required|is_unique[exploit.exploit_tim_nama]',
                'errors' => [
                    'required' => $fieldError,
                    'is_unique' => 'Nama tim sudah terdaftar'
                ]
            ],
            'ketua_nama' => [
                'label' => 'ketua_nama',
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
            'bidang_iot' => [
                'label' => 'bidang_iot',
                'rules' => 'required',
                'errors' => [
                    'required' => $fieldError,
                ]
            ],
            'email_ketua' => [
                'label' => 'email_ketua',
                'rules' => 'required|valid_email|is_unique[exploit.exploit_email]',
                'errors' => [
                    'required' => $fieldError,
                    'valid_email' => 'Email tidak valid',
                    'is_unique' => 'Email sudah terdaftar'
                ]
            ],
            'phone_ketua' => [
                'label' => 'phone_ketua',
                'rules' => 'required|is_unique[exploit.exploit_phone]|numeric',
                'errors' => [
                    'required' => $fieldError,
                    'is_unique' => 'Nomor sudah terdaftar',
                    'numeric' => 'Nomor harus berupa angka'
                ]
            ],
            'nama_produk' => [
                'label' => 'nama_produk',
                'rules' => 'required|is_unique[exploit.exploit_nama_produk]',
                'errors' => [
                    'required' => $fieldError,
                    'is_unique' => 'Nama produk sudah terdaftar'
                ]
            ],
            'deskripsi_produk' => [
                'label' => 'deskripsi_produk',
                'rules' => 'required',
                'errors' => [
                    'required' => $fieldError,
                ]
            ],
            'link_youtube' => [
                'label' => 'link_youtube',
                'rules' => 'required|valid_url|is_unique[exploit.exploit_link_youtube]',
                'errors' => [
                    'required' => $fieldError,
                    'valid_url' => 'Url tidak valid',
                    'is_unique' => 'Url sudah terdaftar'
                ]
            ],
            'surat_kontrak' => [
                'label'     => 'surat_kontrak',
                'rules'     => 'uploaded[surat_kontrak]|max_size[surat_kontrak, 1024]|mime_in[surat_kontrak,application/pdf]',
                'errors'    => [
                    'uploaded'  => 'Field ini harus diisi',
                    'max_size'  => $pdfSizeError,
                    'mime_in'   => $pdfTypeError,
                ]
            ],
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to('/register/exploit')->withInput();
        }

        // data tim
        $tim_nama = $this->request->getVar('tim_nama');
        $ketua_nama = $this->request->getVar('ketua_nama');
        $asal_institusi = $this->request->getVar('asal_institusi');
        $bidang_iot = $this->request->getVar('bidang_iot');
        $email_ketua = $this->request->getVar('email_ketua');
        $phone_ketua = $this->request->getVar('phone_ketua');

        // data produk
        $nama_produk = $this->request->getVar('nama_produk');
        $deskripsi_produk = $this->request->getVar('deskripsi_produk');
        $link_youtube = $this->request->getVar('link_youtube');

        $surat_kontrak = $this->request->getFile('surat_kontrak');

        // Define path
        $surat_kontrak_path = 'uploads/expoit/surat_kontrak/';

        // Pindah file + rename
        $moved_surat_kontrak = $this->moveFile($surat_kontrak_path, $surat_kontrak);

        $data = [
            'exploit_tim_nama' => $tim_nama,
            'exploit_nama_ketua' => $ketua_nama,
            'exploit_asal_institusi' => $asal_institusi,
            'exploit_bidang' => $bidang_iot,
            'exploit_email' => $email_ketua,
            'exploit_phone' => $phone_ketua,
            'exploit_nama_produk' => $nama_produk,
            'exploit_desk_produk' => $deskripsi_produk,
            'exploit_link_youtube' => $link_youtube,
            'exploit_surat_kontrak' => $moved_surat_kontrak,
        ];

        // Kirim Email
        $email = \Config\Services::email();
        $email->setTo($email_ketua);
        $email->setFrom('arenewalagent@gmail.com', 'ARA 4.0');
        $email->setSubject('Email Konfirmasi Pendaftaran ExploIT');
        $body = "Halo {$tim_nama} dari {$asal_institusi},</br>
        </br>
        Terima kasih sudah mendaftar pada event kami, \"ExploIT.\"<br>
        <br>
        Dengan ini, kami telah menerima berkas Anda. Kami akan mengecek kelengkapan berkas yang sudah dikirimkan sesuai dengan persyaratan kami. <br>
        <br>
        Terima kasih.<br>
        <br>
        --<br>
        Salam Hormat,<br>
        <br>
        A Renewal Agents 4.0";
        $email->setMessage($body);
        if ($email->send()) {
            $this->Exploit_Model->save($data);
            $this->session->setFlashdata('msg', 'Registrasi berhasil');
            return redirect()->to('/register/exploit');
        } else {
            $dd = $email->printDebugger(['headers']);
            print_r($dd);
        }
    }
}
