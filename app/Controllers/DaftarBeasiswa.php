<?php

namespace App\Controllers;

use App\Models\BeasiswaAkademikModel;
use App\Models\BeasiswaNonAkademikModel;

class DaftarBeasiswa extends BaseController
{

  protected $beasiswaakademikModel;
  protected $beasiswanonakademikModel;

  public function __construct()
  {
    $this->beasiswaakademikModel = new BeasiswaAkademikModel();
    $this->beasiswanonakademikModel = new BeasiswaNonAkademikModel();
  }

  // Halaman Registrasi Beasiswa Akademik
  public function registrasi_beasiswa_akademik()
  {
    helper(['form']);
    $data = [
      'title' => 'Registrasi Beasiswa Akademik || Beasiswa Akademik',
      'validation' => \Config\Services::validation()
    ];

    // $ipk = 3;
    // session()->set('ipk', $ipk);

    return view('v_registrasi/registrasi_beasiswa_akademik', $data);
  }

  // Digunakan untuk Validasi Halaman Registrasi Beasiswa
  public function saveAkademik()
  {
    // Validasi Input
    if (!$this->validate([

      // Nama
      'nama' => [
        'rules' => 'required[akademik.nama]',
        'errors' => [
          'required' => 'Nama Harus Diisi !!'
        ]
      ],
      // Email
      'email' => [
        'rules' => 'required[akademik.email]|valid_email|is_unique[akademik.email]',
        'errors' => [
          'required' => 'Email Harus Diisi !!',
          'valid_email' => 'Mohon cek kembali format Email gunakan @'
        ]
      ],
      // Nomor
      'nomor' => [
        'rules' => 'required[akademik.nomor]|regex_match[/^08\d{7,10}$/]',
        'errors' => [
          'required' => 'Nomor Harus Diisi !!',
          'regex_match' => 'Gunakan Format 08 !!'

        ]
      ],
      // Semester
      'semester' => [
        'rules' => 'required[akademik.semester]',
        'errors' => [
          'required' => 'Semester Harus Diisi !!'
        ]
      ],
      // Ipk
      'ipk' => [
        'rules' => 'required[akademik.ipk]',
        'errors' => [
          'required' => 'IPK Harus Diisi !!'
        ]
      ],
      // Beasiswa
      'beasiswa' => [
        'rules' => 'required[akademik.beasiswa]',
        'errors' => [
          'required' => 'Beasiswa Harus Diisi !!'
        ]
      ],
      // Berkas Syarat
      'berkassyarat' => [
        'rules' => 'mime_in[berkassyarat,image/jpg,image/jpeg,image/png,application/pdf]',
        'errors' => [
          // 'max_size' => 'Ukuran Gambar terlalu besar !!',
          // 'is_image' => 'Yang anda pilih bukan gambar !!',
          'mime_in' => 'Yang anda pilih bukan gambar'
        ]
      ]

    ])) {
      $validation = \Config\Services::validation();
      return redirect()->to(base_url() . '/daftarbeasiswa/registrasi_beasiswa_akademik')->withInput();
    }

    // Cara Memanggil Gambar
    $fileBerkas = $this->request->getFile('berkassyarat');
    if ($fileBerkas->getError() == 4) {
      $namaFileBerkas = 'img/folder.PNG';
    } else {
      // Generate nama foto berita random
      $namaFileBerkas = $fileBerkas->getRandomName();
      // Memindahkan File Gambar ke Folder img/Berita
      $fileBerkas->move('img/imgAkademik', $namaFileBerkas);
    }

    $this->beasiswaakademikModel->save([
      'berkassyarat' => $namaFileBerkas,
      'nama' => $this->request->getVar('nama'),
      'email' => $this->request->getVar('email'),
      'nomor' => $this->request->getVar('nomor'),
      'semester' => $this->request->getVar('semester'),
      'ipk' => $this->request->getVar('ipk'),
      'beasiswa' => $this->request->getVar('beasiswa'),
    ]);
    session()->setFlashdata('pesan', 'Selamat Anda Berhasil Melakukan Pendaftaran Beasiswa !!');
    return redirect()->to('/hasilbeasiswa/index');
  }










  // Halaman Registrasi Beasiswa Akademik
  public function registrasi_beasiswa_nonakademik()
  {
    helper(['form']);
    $data = [
      'title' => 'Registrasi Beasiswa Non Akademik || Beasiswa Akademik',
      'validation' => \Config\Services::validation()
    ];

    // $ipk = 3;
    // session()->set('ipk', $ipk);

    return view('v_registrasi/registrasi_beasiswa_nonakademik', $data);
  }

  // Digunakan untuk Validasi Halaman Registrasi Beasiswa
  public function saveNonAkademik()
  {
    // Validasi Input
    if (!$this->validate([

      // Nomor
      'nama' => [
        'rules' => 'required[nonakademik.nama]',
        'errors' => [
          'required' => 'nama Harus Diisi !!'
        ]
      ],
      // Email
      'email' => [
        'rules' => 'required[akademik.email]|valid_email|is_unique[akademik.email]',
        'errors' => [
          'required' => 'Email Harus Diisi !!',
          'valid_email' => 'Mohon cek kembali format Email gunakan @'
        ]
      ],
      // Email
      'nomor' => [
        'rules' => 'required[nonakademik.nomor]',
        'errors' => [
          'required' => 'Nomor Harus Diisi !!'
        ]
      ],
      // Semester
      'semester' => [
        'rules' => 'required[nonakademik.semester]',
        'errors' => [
          'required' => 'Semester Harus Diisi !!'
        ]
      ],
      // Ipk
      'ipk' => [
        'rules' => 'required[nonakademik.ipk]',
        'errors' => [
          'required' => 'IPK Harus Diisi !!'
        ]
      ],
      // Beasiswa
      'beasiswa' => [
        'rules' => 'required[nonakademik.beasiswa]',
        'errors' => [
          'required' => 'Beasiswa Harus Diisi !!'
        ]
      ],
      // Berkas Syarat
      'berkassyarat' => [
        'rules' => 'max_size[berkassyarat,1024]|is_image[berkassyarat]|mime_in[berkassyarat,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => 'Ukuran Gambar terlalu besar !!',
          'is_image' => 'Yang anda pilih bukan gambar !!',
          'mime_in' => 'Yang anda pilih bukan gambar'
        ]
      ]

    ])) {
      $validation = \Config\Services::validation();
      return redirect()->to(base_url() . '/daftarbeasiswa/registrasi_beasiswa_nonakademik')->withInput();
    }

    // Cara Memanggil Gambar
    $fileBerkas = $this->request->getFile('berkassyarat');
    if ($fileBerkas->getError() == 4) {
      $namaFileBerkas = 'img/folder.PNG';
    } else {
      // Generate nama foto berita random
      $namaFileBerkas = $fileBerkas->getRandomName();
      // Memindahkan File Gambar ke Folder img/Berita
      $fileBerkas->move('img/imgNonAkademik', $namaFileBerkas);
    }

    $this->beasiswanonakademikModel->save([
      'berkassyarat' => $namaFileBerkas,
      'nama' => $this->request->getVar('nama'),
      'email' => $this->request->getVar('email'),
      'nomor' => $this->request->getVar('nomor'),
      'semester' => $this->request->getVar('semester'),
      'ipk' => $this->request->getVar('ipk'),
      'beasiswa' => $this->request->getVar('beasiswa'),
    ]);
    session()->setFlashdata('pesan', 'Selamat Anda Berhasil Melakukan Pendaftaran Beasiswa !!');
    return redirect()->to('/hasilbeasiswa/index');
  }
}
