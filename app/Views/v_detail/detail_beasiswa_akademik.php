<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
  <div class="card shadow mb-4 border-2" style="margin-top: 25px;">

    <div class="card-header py-3 border-0">
      <h6 class="m-0 font-weight-bold text-primary">Detail Beasiswa Akademik</h6>
    </div>

    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="/img/imgAkademik/<?= $akademik['berkassyarat']; ?>" class="img-fluid rounded-start">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Data Pendaftar Akademik</h5>
                  <p class="card-text">Nama : <?= $akademik['nama']; ?></p>
                  <p class="card-text">Email :<?= $akademik['email']; ?></p>
                  <p class="card-text">Nomor : <?= $akademik['nomor']; ?></p>
                  <p class="card-text">Semester : <?= $akademik['semester']; ?></p>
                  <p class="card-text">IPK : <?= $akademik['ipk']; ?></p>
                  <p class="card-text">Beasiswa : <?= $akademik['beasiswa']; ?></p>
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