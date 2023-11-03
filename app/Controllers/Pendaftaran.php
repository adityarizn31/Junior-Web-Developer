<?php

namespace App\Controllers;

class Pendaftaran extends BaseController
{
  public function index()
  {
    $data = [
      'title' => 'Beasiswa Kampus'
    ];
    return view('v_pendaftaran/index', $data);
  }
}
