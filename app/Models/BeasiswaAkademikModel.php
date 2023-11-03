<?php

namespace App\Models;

use CodeIgniter\Model;

class BeasiswaAkademikModel extends Model
{
  //Cara menghubungkan Model dengan Tabel
  protected $table = 'akademik';
  protected $useTimestamps = true;
  protected $allowedFields = ['nama', 'email', 'nomor', 'semester', 'ipk', 'beasiswa', 'berkassyarat'];

  public function getBeasiswaAkademik($nama = false)
  {
    // Jika nama pemohon == false maka yang akan ditampilkan semua
    if ($nama == false) {
      return $this->findAll();
    }

    // Namun jika nama pemohon == true makan akan ditampilkan nama tersebut saja
    return $this->where(['nama' => $nama])->first();
  }
}
