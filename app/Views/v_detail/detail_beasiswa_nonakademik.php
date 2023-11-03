<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
  <div class="card shadow mb-4 border-2" style="margin-top: 25px;">

    <div class="card-header py-3 border-0">
      <h6 class="m-0 font-weight-bold text-primary">Detail Beasiswa Non Akademik</h6>
    </div>

    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="/img/imgNonAkademik/<?= $nonakademik['berkassyarat']; ?>" class="img-fluid rounded-start">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Data Pendaftar Beasiswaw Non Akademik</h5>
                  <p class="card-text">Nama : <?= $nonakademik['nama']; ?></p>
                  <p class="card-text">Email :<?= $nonakademik['email']; ?></p>
                  <p class="card-text">Nomor : <?= $nonakademik['nomor']; ?></p>
                  <p class="card-text">Semester : <?= $nonakademik['semester']; ?></p>
                  <p class="card-text">IPK : <?= $nonakademik['ipk']; ?></p>
                  <p class="card-text">Beasiswa : <?= $nonakademik['beasiswa']; ?></p>
                  <td><button class="btn btn-warning">Belum Verifikasi</button></td>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<?= $this->endSection('content'); ?>