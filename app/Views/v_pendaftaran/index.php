<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>


<div class="container" style="padding-top: 50px; padding-bottom: 50px;">
  <div class="text-center">
    <div class="row row-cols-1 row-cols-md-2 g-4">
      <div class="col">
        <div class="card shadow border-2">
          <a href="/daftarbeasiswa/registrasi_beasiswa_akademik" style="text-decoration: none;">
            <img src="/img/Beasiswa.png" class="card-img-top" style="width: 70%;">
            <div class="card-body">
              <h5 class="card-title text-black">Beasiswa Akademik</h5>
            </div>
          </a>
        </div>
      </div>
      <div class="col">
        <div class="card shadow border-2">
          <a href="/daftarbeasiswa/registrasi_beasiswa_nonakademik" style="text-decoration: none;">
            <img src="/img/Beasiswa.png" class="card-img-top" style="width: 70%;">
            <div class="card-body">
              <h5 class="card-title text-black">Beasiswa Non Akademik</h5>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>


<?= $this->endSection('content'); ?>