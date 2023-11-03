<?php

namespace App\Controllers;

use App\Models\BeasiswaAkademikModel;
use App\Models\BeasiswaNonAkademikModel;

class HasilBeasiswa extends BaseController
{

  protected $beasiswaakademikModel;
  protected $beasiswanonakademikModel;

  public function __construct()
  {
    $this->beasiswaakademikModel = new BeasiswaAkademikModel();
    $this->beasiswanonakademikModel = new BeasiswaNonAkademikModel();
  }

  // Halaman Index
  public function index()
  {
    $data = [
      'title' => 'Hasil Akademik dan Non Akademik Beasiswa',
      'akademik' => $this->beasiswaakademikModel->getBeasiswaAkademik(),
      'nonakademik' => $this->beasiswanonakademikModel->getBeasiswaNonAkademik(),
      $data['akademikData'] = $this->beasiswaakademikModel->findAll(),
      $data['nonakademikData'] = $this->beasiswanonakademikModel->findAll(),
    ];
    return view('v_hasil_registrasi/index', $data);
  }










  // Digunakan untuk menampilkan Grafik
  public function grafikBeasiswa()
  {
    $data = [
      'title' => 'Grafik Beasiswa Akademik & Non Akademik',
      ''
    ];
    return view('v_hasil_registrasi/index');
  }









  // Hasil Beasiswa Akademik
  public function hasil_beasiswa_akademik()
  {
    $data = [
      'title' => 'Hasil Beasiswa Akademik || Beasiswa Akademik'
    ];
    return view('v_hasil_registrasi/hasil_beasiswa_akademik', $data);
  }









  // Halaman Beasiswa Non Akademik
  public function hasil_beasiswa_nonakademik()
  {
    $data = [
      'title' => 'Hasil Beasiswa Non Akademik || Beasiswa Non Akademik'
    ];
    return view('v_hasil_registrasi/hasil_beasiswa_nonakademik', $data);
  }
}
