<?php

namespace App\Models;

use CodeIgniter\Model;

class BeasiswaNonAkademikModel extends Model
{
  //Cara menghubungkan Model dengan Tabel
  protected $table = 'nonakademik';
  protected $useTimestamps = true;
  protected $allowedFields = ['nama', 'email', 'nomor', 'semester', 'ipk', 'beasiswa', 'berkassyarat'];

  public function getBeasiswaNonAkademik($nama = false)
  {
    // Jika nama pemohon == false maka yang akan ditampilkan semua
    if ($nama == false) {
      return $this->findAll();
    }

    // Namun jika nama pemohon == true makan akan ditampilkan nama tersebut saja
    return $this->where(['nama' => $nama])->first();
  }
}
