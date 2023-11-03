<?php

namespace App\Controllers;

use App\Models\BeasiswaAkademikModel;
use App\Models\BeasiswaNonAkademikModel;

class DetailBeasiswa extends BaseController
{

  protected $beasiswaakademikModel;
  protected $beasiswanonakademikModel;

  public function __construct()
  {
    $this->beasiswaakademikModel = new BeasiswaAkademikModel();
    $this->beasiswanonakademikModel = new BeasiswaNonAkademikModel();
  }









  // Halaman Detail Akademik
  public function detail_akademik($nama)
  {
    $data = [
      'title' => 'Detail Akademik Beasiswa',
      'akademik' => $this->beasiswaakademikModel->getBeasiswaAkademik($nama)
    ];
    return view('v_detail/detail_beasiswa_akademik', $data);
  }









  // Halaman Detail Non Akademik
  public function detail_nonakademik($nama)
  {
    $data = [
      'title' => 'Detail Non Akademik Beasiswa',
      'nonakademik' => $this->beasiswanonakademikModel->getBeasiswaNonAkademik($nama)
    ];
    return view('v_detail/detail_beasiswa_nonakademik', $data);
  }
}
