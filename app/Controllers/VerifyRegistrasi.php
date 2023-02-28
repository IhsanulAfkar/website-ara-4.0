<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\OlimModel;
use App\Models\CTFModel;
use App\Models\ExploitModel;
use App\Models\ExploitVisitorModel;

class VerifyRegistrasi extends BaseController
{
    protected $session;
    protected $Olim_Model;
    protected $CTF_Model;
    protected $Exploit_Model;
    protected $ExploitVisitor_Model;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->Olim_Model = new OlimModel();
        $this->CTF_Model = new CTFModel();
        $this->Exploit_Model = new ExploitModel();
        $this->ExploitVisitor_Model = new ExploitVisitorModel();
    }

    private function moveFile($path, $file)
    {
        if (!empty($file) && $file->getSize() != 0) {
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

    public function verify_regis_ctf()
    {
        $fieldError = 'Field ini harus diisi';
        $imgSizeError = 'Melebihi batas max 1 mb';
        $imgTypeError = 'File ini bukan gambar';

        $validationRules = [
            'tim_nama' =>
            [
                'label' => 'tim_nama',
                'rules' => 'required|is_unique[ctf.ctf_tim_nama]',
                'errors' => [
                    'required' => $fieldError,
                    'is_unique' => 'Nama tim sudah terdaftar'
                ]
            ],
            'nama_ketua' =>
            [
                'label' => 'nama_ketua',
                'rules' => 'required',
                'errors' => [
                    'required' => $fieldError,
                ]
            ],
            'asal_institusi' =>
            [
                'label' => 'asal_institusi',
                'rules' => 'required',
                'errors' => [
                    'required' => $fieldError,
                ]
            ],
            'email_ketua' =>
            [
                'label' => 'email_ketua',
                'rules' => 'required|valid_email|is_unique[ctf.ctf_email_ketua]',
                'errors' => [
                    'required' => $fieldError,
                    'valid_email' => 'Email tidak valid',
                    'is_unique' => 'Email sudah terdaftar'
                ]
            ],
            // 'nama_anggota_1' => 
            // [
            //     'label' => 'nama_anggota_1',
            // ],
            // 'nama_anggota_2' => 
            // [
            //     'label' => 'nama_anggota_2',
            // ],
            'surket_ketua' =>
            [
                'label'     => 'surket_ketua',
                'rules'     => 'uploaded[surket_ketua]|is_image[surket_ketua]|max_size[surket_ketua, 1024]',
                'errors'    => [
                    'uploaded'  => 'Field ini harus diisi',
                    'is_image'  => $imgTypeError,
                    'max_size'  => $imgSizeError
                ]
            ],
            'surket_anggota_1' =>
            [
                'label'     => 'surket_anggota_1',
                'rules'     => 'is_image[surket_anggota_1]|max_size[surket_anggota_1, 1024]',
                'errors'    => [
                    'is_image'  => $imgTypeError,
                    'max_size'  => $imgSizeError
                ]
            ],
            'surket_anggota_2' =>
            [
                'label'     => 'surket_anggota_2',
                'rules'     => 'is_image[surket_anggota_2]|max_size[surket_anggota_2, 1024]',
                'errors'    => [
                    'is_image'  => $imgTypeError,
                    'max_size'  => $imgSizeError
                ]
            ],
            'ig_ara_ketua' =>
            [
                'label'     => 'ig_ara_ketua',
                'rules'     => 'uploaded[ig_ara_ketua]|is_image[ig_ara_ketua]|max_size[ig_ara_ketua, 1024]',
                'errors'    => [
                    'uploaded'  => 'Field ini harus diisi',
                    'is_image'  => $imgTypeError,
                    'max_size'  => $imgSizeError
                ]
            ],
            'ig_ara_anggota_1' =>
            [
                'label'     => 'ig_ara_anggota_1',
                'rules'     => 'is_image[ig_ara_anggota_1]|max_size[ig_ara_anggota_1, 1024]',
                'errors'    => [
                    'is_image'  => $imgTypeError,
                    'max_size'  => $imgSizeError
                ]
            ],
            'ig_ara_anggota_2' =>
            [
                'label'     => 'ig_ara_anggota_2',
                'rules'     => 'is_image[ig_ara_anggota_2]|max_size[ig_ara_anggota_2, 1024]',
                'errors'    => [
                    'is_image'  => $imgTypeError,
                    'max_size'  => $imgSizeError
                ]
            ],
            'bukti_bayar' =>
            [
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
            return redirect()->to('/register/ctf')->withInput();
        }

        $tim_nama = $this->request->getVar('tim_nama');
        $asal_institusi = $this->request->getVar('asal_institusi');

        // ketua
        $nama_ketua = $this->request->getVar('nama_ketua');
        $phone_ketua = $this->request->getVar('phone_ketua');
        $email_ketua = $this->request->getVar('email_ketua');
        $surket_ketua = $this->request->getFile('surket_ketua');
        $ig_ara_ketua = $this->request->getFile('ig_ara_ketua');

        // Anggota 1
        $nama_anggota_1 = $this->request->getVar('nama_anggota_1');
        $surket_anggota_1 = $this->request->getFile('surket_anggota_1');
        $ig_ara_anggota_1 = $this->request->getFile('ig_ara_anggota_1');
        $kupon = $this->request->getVar('kupon');
        $fileBuktiBayar = $this->request->getFile('bukti_bayar');

        // Anggota 2
        $nama_anggota_2 = $this->request->getVar('nama_anggota_2');
        $surket_anggota_2 = $this->request->getFile('surket_anggota_2');
        $ig_ara_anggota_2 = $this->request->getFile('ig_ara_anggota_2');
        $kupon = $this->request->getVar('kupon');
        $fileBuktiBayar = $this->request->getFile('bukti_bayar');

        // Define path
        $bukti_bayar_path = 'uploads/ctf/bukti_bayar/';
        $surket_path = 'uploads/ctf/suket/';
        $ig_ara_path = 'uploads/ctf/ig_ara/';

        // Pindah file + rename
        $moved_surket_ketua = $this->moveFile($surket_path, $surket_ketua);
        $moved_surket_anggota_1 = $this->moveFile($surket_path, $surket_anggota_1);
        $moved_surket_anggota_2 = $this->moveFile($surket_path, $surket_anggota_2);
        $moved_ig_ara_ketua = $this->moveFile($ig_ara_path, $ig_ara_ketua);
        $moved_ig_ara_anggota_1 = $this->moveFile($ig_ara_path, $ig_ara_anggota_1);
        $moved_ig_ara_anggota_2 = $this->moveFile($ig_ara_path, $ig_ara_anggota_2);
        $movedBuktiBayar = $this->moveFile($bukti_bayar_path, $fileBuktiBayar);

        $data =
            [
                'ctf_tim_nama' => $tim_nama,
                'ctf_asal_institusi' => $asal_institusi,
                'ctf_nama_ketua' => $nama_ketua,
                'ctf_phone_ketua' => $phone_ketua,
                'ctf_email_ketua' => $email_ketua,
                'ctf_kp_surket_ketua' => $moved_surket_ketua,
                'ctf_nama_anggota_1' => $nama_anggota_1,
                'ctf_kp_surket_anggota_1' => $moved_surket_anggota_1,
                'ctf_nama_anggota_2' => $nama_anggota_2,
                'ctf_kp_surket_anggota_2' => $moved_surket_anggota_2,
                'ctf_ig_ara_ketua' => $moved_ig_ara_ketua,
                'ctf_ig_ara_anggota_1' => $moved_ig_ara_anggota_1,
                'ctf_ig_ara_anggota_2' => $moved_ig_ara_anggota_2,
                'coupon' => $kupon,
                'ctf_bukti_bayar' => $movedBuktiBayar,
                'ctf_status' => 0, //default 0 = belum bayar
                'ctf_status_final' => 0,
            ];

        // Kirim Email
        $email = \Config\Services::email();
        $email->setTo($email_ketua);
        $email->setFrom('arenewalagent@gmail.com', 'ARA 4.0');
        $email->setSubject('Email Konfirmasi Pendaftaran CTF');
        $body = "Halo {$tim_nama} dari {$asal_institusi},</br>
        </br>
        Terima kasih sudah mendaftar pada event kami, \"Kompetisi CTF.\"<br>
        <br>
        Dengan ini, kami telah menerima berkas Anda. Kami akan mengecek kelengkapan berkas yang sudah dikirimkan sesuai dengan persyaratan kami. <br>
        <br>
        Terima kasih.<br>
        <br>
        --<br>
        Salam Hormat,<br>
        <br>
        A Renewal Agent 4.0";
        $email->setMessage($body);
        if ($email->send()) {
            $this->CTF_Model->save($data);
            $this->session->setFlashdata('msg', 'Registrasi berhasil');
            return redirect()->to('/register/ctf');
        } else {
            $dd = $email->printDebugger(['headers']);
            print_r($dd);
        }
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
            'suket_ketua' => [
                'label'     => 'suket_ketua',
                'rules'     => 'uploaded[suket_ketua]|max_size[suket_ketua, 1024]|mime_in[suket_ketua,application/pdf]',
                'errors'    => [
                    'uploaded'  => 'Field ini harus diisi',
                    'max_size'  => $pdfSizeError,
                    'mime_in'   => $pdfTypeError,
                ]
            ],
            // Anggota 1
            'suket_anggota_1' => [
                'label'     => 'suket_anggota_1',
                'rules'     => 'max_size[suket_anggota_1, 1024]|mime_in[suket_anggota_1,application/pdf]',
                'errors'    => [
                    'uploaded'  => 'Field ini harus diisi',
                    'max_size'  => $pdfSizeError,
                    'mime_in'   => $pdfTypeError,
                ]
            ],
            // Anggota 2
            'suket_anggota_2' => [
                'label'     => 'suket_anggota_2',
                'rules'     => 'max_size[suket_anggota_2, 1024]|mime_in[suket_anggota_2,application/pdf]',
                'errors'    => [
                    'uploaded'  => 'Field ini harus diisi',
                    'max_size'  => $pdfSizeError,
                    'mime_in'   => $pdfTypeError,
                ]
            ],
            // Anggota 3
            'suket_anggota_3' => [
                'label'     => 'suket_anggota_3',
                'rules'     => 'max_size[suket_anggota_3, 1024]|mime_in[suket_anggota_3,application/pdf]',
                'errors'    => [
                    'max_size'  => $pdfSizeError,
                    'mime_in'   => $pdfTypeError,
                ]
            ],
            // Anggota 4
            'suket_anggota_4' => [
                'label'     => 'suket_anggota_4',
                'rules'     => 'max_size[suket_anggota_4, 1024]|mime_in[suket_anggota_4,application/pdf]',
                'errors'    => [
                    'max_size'  => $pdfSizeError,
                    'mime_in'   => $pdfTypeError,
                ]
            ],
            //
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
        $jumlah_anggota = 1;
        // data tim
        $tim_nama = $this->request->getVar('tim_nama');
        $ketua_nama = $this->request->getVar('ketua_nama');
        $suket_ketua = $this->request->getFile('suket_ketua');
        $nama_anggota_1 = $this->request->getVar('nama_anggota_1');
        $suket_anggota_1 = $this->request->getFile('suket_anggota_1');
        $nama_anggota_2 = $this->request->getVar('nama_anggota_2');
        $suket_anggota_2 = $this->request->getFile('suket_anggota_2');
        $nama_anggota_3 = $this->request->getVar('nama_anggota_3');
        $suket_anggota_3 = $this->request->getFile('suket_anggota_3');
        $nama_anggota_4 = $this->request->getVar('nama_anggota_4');
        $suket_anggota_4 = $this->request->getFile('suket_anggota_4');
        $asal_institusi = $this->request->getVar('asal_institusi');
        $bidang_iot = $this->request->getVar('bidang_iot');
        $email_ketua = $this->request->getVar('email_ketua');
        $phone_ketua = $this->request->getVar('phone_ketua');
        // dd($suket_anggota_1);
        // data produk
        $nama_produk = $this->request->getVar('nama_produk');
        $deskripsi_produk = $this->request->getVar('deskripsi_produk');
        $link_youtube = $this->request->getVar('link_youtube');

        $surat_kontrak = $this->request->getFile('surat_kontrak');
        // if (empty($suket_anggota_1))
        // dd($suket_anggota_1->getSize());
        // else
        // dd($suket_anggota_1);
        // Define path
        $surat_kontrak_path = 'uploads/exploit/surat_kontrak/';
        $suket_path = 'uploads/exploit/identitas/';
        $moved_suket_anggota_1 = null;
        $moved_suket_anggota_2 = null;
        $moved_suket_anggota_3 = null;
        $moved_suket_anggota_4 = null;
        // Pindah file + rename
        $moved_surat_kontrak = $this->moveFile($surat_kontrak_path, $surat_kontrak);
        $moved_suket_ketua = $this->moveFile($suket_path, $suket_ketua);
        if (!empty($nama_anggota_1)) {
            $jumlah_anggota++;
            $moved_suket_anggota_1 = $this->moveFile($suket_path, $suket_anggota_1);
        }
        if (!empty($nama_anggota_2)) {
            $jumlah_anggota++;
            $moved_suket_anggota_2 = $this->moveFile($suket_path, $suket_anggota_2);
        }
        if (!empty($nama_anggota_3)) {
            $jumlah_anggota++;
            $moved_suket_anggota_3 = $this->moveFile($suket_path, $suket_anggota_3);
        }
        if (!empty($nama_anggota_4)) {
            $jumlah_anggota++;
            $moved_suket_anggota_4 = $this->moveFile($suket_path, $suket_anggota_4);
        }

        $data = [
            'exploit_tim_nama' => $tim_nama,
            'exploit_jumlah_anggota' => $jumlah_anggota,
            'exploit_nama_ketua' => $ketua_nama,
            'exploit_asal_institusi' => $asal_institusi,
            'exploit_bidang' => $bidang_iot,
            'exploit_email' => $email_ketua,
            'exploit_phone' => $phone_ketua,
            'exploit_nama_anggota_1' => $nama_anggota_1,
            'exploit_nama_anggota_2' => $nama_anggota_2,
            'exploit_nama_anggota_3' => $nama_anggota_3,
            'exploit_nama_anggota_4' => $nama_anggota_4,
            'exploit_suket_ketua' => $moved_suket_ketua,
            'exploit_suket_anggota_1' => $moved_suket_anggota_1,
            'exploit_suket_anggota_2' => $moved_suket_anggota_2,
            'exploit_suket_anggota_3' => $moved_suket_anggota_3,
            'exploit_suket_anggota_4' => $moved_suket_anggota_4,
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

    public function verify_regis_exploit_visitor()
    {
        $fieldError = 'Field ini harus diisi';
        $imgSizeError = 'Melebihi batas max 1 mb';
        $imgTypeError = 'File ini bukan gambar';

        $validationRules = [
            'nama' => [
                'label' => 'nama',
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
            'whatsapp' => [
                'label' => 'whatsapp',
                'rules' => 'required|is_unique[exploit-visitor.visitor_wa]|numeric',
                'errors' => [
                    'required' => $fieldError,
                    'is_unique' => 'Nomor sudah terdaftar',
                    'numeric' => 'Nomor harus berupa angka'
                ]
            ],
            'email' => [
                'label' => 'email',
                'rules' => 'required|valid_email|is_unique[exploit-visitor.visitor_email]',
                'errors' => [
                    'required' => $fieldError,
                    'valid_email' => 'Email tidak valid',
                    'is_unique' => 'Email sudah terdaftar'
                ]
            ],
            'story_invitation_card' => [
                'label'     => 'story_invitation_card',
                'rules'     => 'uploaded[story_invitation_card]|is_image[story_invitation_card]|max_size[story_invitation_card, 1024]',
                'errors'    => [
                    'uploaded'  => 'Field ini harus diisi',
                    'is_image'  => $imgTypeError,
                    'max_size'  => $imgSizeError
                ]
            ],
            'reupload_poster' => [
                'label'     => 'reupload_poster',
                'rules'     => 'uploaded[reupload_poster]|is_image[reupload_poster]|max_size[reupload_poster, 1024]',
                'errors'    => [
                    'uploaded'  => 'Field ini harus diisi',
                    'is_image'  => $imgTypeError,
                    'max_size'  => $imgSizeError
                ]
            ],
            'follow_ig_ara' => [
                'label'     => 'follow_ig_ara',
                'rules'     => 'uploaded[follow_ig_ara]|is_image[follow_ig_ara]|max_size[follow_ig_ara, 1024]',
                'errors'    => [
                    'uploaded'  => 'Field ini harus diisi',
                    'is_image'  => $imgTypeError,
                    'max_size'  => $imgSizeError
                ]
            ],
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to('/register/exploit-visitor')->withInput();
        }

        $nama = $this->request->getVar('nama');
        $asal_institusi = $this->request->getVar('asal_institusi');
        $whatsapp = $this->request->getVar('whatsapp');
        $email_visitor = $this->request->getVar('email');
        $story_invitation_card = $this->request->getFile('story_invitation_card');
        $reupload_poster = $this->request->getFile('reupload_poster');
        $follow_ig_ara = $this->request->getFile('follow_ig_ara');

        // Define path
        $story_invitation_card_path = 'uploads/exploit-visitor/story_invitation_card';
        $reupload_poster_path = 'uploads/exploit-visitor/reupload_poster';
        $follow_ig_ara_path = 'uploads/exploit-visitor/follow_ig_ara';

         // Pindah file + rename
        $moved_story_invitation_card = $this->moveFile($story_invitation_card_path, $story_invitation_card);
        $moved_reupload_poster = $this->moveFile($reupload_poster_path, $reupload_poster);
        $moved_follow_ig_ara = $this->moveFile($follow_ig_ara_path, $follow_ig_ara);

        $data = [
        'visitor_nama' => $nama,
        'visitor_email' => $email_visitor,
        'visitor_wa' => $whatsapp,
        'visitor_institusi' => $asal_institusi,
        'visitor_story_invitation_card' => $moved_story_invitation_card,
        'visitor_reupload_poster' => $moved_reupload_poster,
        'visitor_follow_ig_ara' => $moved_follow_ig_ara,
        'visitor_status' => 0
        ];

        // Kirim Email
        $email = \Config\Services::email();
        $email->setTo($email_visitor);
        $email->setFrom('arenewalagent@gmail.com', 'ARA 4.0');
        $email->setSubject('Email Konfirmasi Pendaftaran Pengunjung ExploIT');
        $body = "Halo {$nama},</br>
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
        if($email->send()){
            $this->ExploitVisitor_Model->save($data);
            $this->session->setFlashdata('msg', 'Registrasi berhasil');
            return redirect()->to('/register/exploit-visitor');
        } else {
            $dd = $email->printDebugger(['headers']);
            print_r($dd);
        }
    }
}
