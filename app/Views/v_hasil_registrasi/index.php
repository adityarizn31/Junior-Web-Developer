<!-- Halaman Menampilkan Hasil Tabel Akademik dan Non Akademik -->
<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
  <div class="row">
    <div class="col">

      <?php if (session()->getFlashdata('pesan')) : ?>

        <div class="alert alert-success" role="alert">
          <?= session()->getFlashdata('pesan'); ?>
        </div>

      <?php endif; ?>

      <div class="card shadow mb-4 border-2" style="margin-top: 25px;">

        <div class="card-header py-3">
          <div class="d-sm-flex align-items-center justify-content-between" style="padding-top: 10px;">
            <h6 class="m-0 font-weight-bold text-primary">Hasil Beasiswa Akademik Lolos</h6>
          </div>
        </div>


        <div class="card-body">
          <table class="table table-fixed table-hover">

            <thead class="table-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Beasiswa</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>

            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($akademik as $aka) : ?>
                <tr>
                  <th scope="row"><?= $i++; ?></th>
                  <td><?= $aka['nama']; ?></td>
                  <td><?= $aka['email']; ?></td>
                  <td><?= $aka['beasiswa']; ?></td>
                  <td>
                    <a href="/detailbeasiswa/detail_akademik/<?= $aka['nama']; ?>" class="btn btn-success">Detail</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>

          </table>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col">

      <div class="card shadow mb-4 border-2" style="margin-top: 25px;">

        <div class="card-header py-3">
          <div class="d-sm-flex align-items-center justify-content-between" style="padding-top: 10px;">
            <h6 class="m-0 font-weight-bold text-primary">Hasil Beasiswa Non Akademik Lolos</h6>
          </div>
        </div>

        <div class="card-body">
          <table class="table table-fixed table-hover">

            <thead class="table-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Beasiswa</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>

            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($nonakademik as $non) : ?>
                <tr>
                  <th scope="row"><?= $i++; ?></th>
                  <td><?= $non['nama']; ?></td>
                  <td><?= $non['email']; ?></td>
                  <td><?= $non['beasiswa']; ?></td>
                  <td>
                    <a href="/detailbeasiswa/detail_nonakademik/<?= $non['nama']; ?>" class="btn btn-success">Detail</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>

          </table>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col">
      <div class="col-lg-8">
        <div class="card text-white bg-primary mb-3">
          <div class="card-header"> Laporan Grafik </div>
          <div class="card-body bg-white viewTampilGrafik">
            <canvas id="myChart" width="400" height="400"></canvas>


          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  var akademikData = <?php echo json_encode($akademik); ?>;
  var nonakademikData = <?php echo json_encode($nonakademik); ?>;
  var countAkademik = akademikData.length
  var countNonAkademik = nonakademikData.length

  var total = countAkademik + countNonAkademik;

  var percentAkademik = parseFloat((countAkademik / total) * 100, 2).toFixed(2)
  var percentNonAkademik = parseFloat((countNonAkademik / total) * 100, 2).toFixed(2)

  var labelAkademik = `Akademik (${percentAkademik}%)`
  var labelNonAkademik = `Non-Akademik (${percentNonAkademik}%)`

  const ctx = document.getElementById('myChart');
  new Chart(ctx, {
    type: 'pie',
    data: {
      labels: [labelAkademik, labelNonAkademik],
      datasets: [{
        label: 'Beasiswa',
        data: [countAkademik, countNonAkademik],
        borderWidth: 1
      }]
    }
  });
</script>

<?= $this->endSection('content'); ?>