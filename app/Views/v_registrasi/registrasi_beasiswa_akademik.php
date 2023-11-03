<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>


<div class="container">
  <div class="card shadow mb-4 border-2">
    <div class="container">

      <form action="/daftarbeasiswa/saveAkademik" method="post" enctype="multipart/form-data">

        <?= csrf_field(); ?>

        <!-- Nama -->
        <div class="row">
          <div class="mb-4">
            <label for="nama" class="form-label fw-semibold">Nama</label>
            <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" name="nama" id="nama" autofocus value="<?= old('nama'); ?>">
            <div class="invalid-feedback">
              <?= $validation->getError('nama'); ?>
            </div>
          </div>
        </div>

        <!-- Email -->
        <div class="row">
          <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Email</label>
            <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" name="email" id="email" value="<?= old('email'); ?>">
            <div class="invalid-feedback">
              <?= $validation->getError('email'); ?>
            </div>
          </div>
        </div>

        <!-- Nomor -->
        <div class="row">
          <div class="mb-3">
            <label for="nomor" class="form-label fw-semibold">Nomor</label>
            <input type="text" class="form-control <?= ($validation->hasError('nomor')) ? 'is-invalid' : ''; ?>" name="nomor" id="nomor" value="<?= old('nomor'); ?>">
            <div class="invalid-feedback">
              <?= $validation->getError('nomor'); ?>
            </div>
          </div>
        </div>

        <!-- Semester  -->
        <div class="row">
          <div class="mb-3">
            <label for="semester" class="form-label fw-semibold">Semester</label>
            <select class="form-control <?= ($validation->hasError('semester')) ? 'is-invalid' : ''; ?>" name="semester" id="semester">
              <option value="Pilih Semester" <?= set_select('semester', 'Pilih', true) ?>> -- Pilih -- </option>
              <option value="1" <?= set_select('semester', 1) ?>>1</option>
              <option value="2" <?= set_select('semester', 2) ?>>2</option>
              <option value="3" <?= set_select('semester', 3) ?>>3</option>
              <option value="4" <?= set_select('semester', 4) ?>>4</option>
              <option value="5" <?= set_select('semester', 5) ?>>5</option>
              <option value="6" <?= set_select('semester', 6) ?>>6</option>
              <option value="7" <?= set_select('semester', 7) ?>>7</option>
              <option value="8" <?= set_select('semester', 8) ?>>8</option>
              <div class="invalid-feedback">
                <?= $validation->getError('semester'); ?>
              </div>
            </select>
          </div>
        </div>

        <!-- IPK -->
        <!-- <div class="row">
          <div class="mb-3">
            <label for="ipk" class="form-label fw-semibold">IPK Terakhir</label>
            <p class="form-control" name="ipk" id="ipk">IPK Anda : <?= $ipk = session()->get('ipk'); ?></p>
            <input type="text" name="ipk" value="<?= $ipk = session()->get('ipk'); ?>" hidden>
          </div>
        </div> -->

        <!-- IPK -->
        <form id="mahasiswaForm">
          <div class="row">
            <div class="mb-3">
              <label for="ipk" class="form-label fw-semibold">IPK Terakhir</label>
              <input type="number" onchange="handleChange()" class="form-control <?= ($validation->hasError('ipk')) ? 'is-invalid' : ''; ?>" name="ipk" id="ipk" value="<?= old('ipk'); ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('ipk'); ?>
              </div>
            </div>
          </div>


          <!-- Beasiswa -->
          <div class="row">
            <div class="mb-3">
              <label for="beasiswa" class="form-label fw-semibold">Beasiswa</label>
              <select class="form-control <?= ($validation->hasError('beasiswa')) ? 'is-invalid' : ''; ?>" name="beasiswa" id="beasiswa">
                <option value="pilihbeasiswa" <?= set_select('pilihbeasiswa', 'beasiswa', true) ?>> -- Pilih Beasiswa -- </option>
                <option value="Beasiswa Akademik" <?= set_select('beasiswaakademik') ?>>Beasiswa Akademik</option>
                <option value="Beasiswa Non Akademik" <?= set_select('beasiswanonakademik') ?>>Beasiswa Non Akademik</option>
              </select>
            </div>
          </div>

          <!-- Form Upload File -->
          <div class="row">
            <div class="mb-3">
              <label for="berkassyarat" class="form-label fw-semibold">Foto Berita</label>
              <input type="file" class="form-control <?= ($validation->hasError('berkassyarat')) ? 'is-invalid' : ''; ?>" name="berkassyarat" id="berkassyarat" value="<?= old('berkassyarat'); ?>" onchange="previewImgBerita()">
              <div class="invalid-feedback">
                <?= $validation->getError('berkassyarat'); ?>
              </div>
              <div class="col-sm-2 my-4">
                <img src="/img/berita/beritadef.PNG" class="img-thumbnail img-preview" srcset="">
              </div>
            </div>
          </div>

          <div class="container overflow-hidden text-center" style="padding-bottom: 20px;">
            <button type="submit" class="btn btn-primary">Daftar</button>
            <button class="btn btn-danger"><a href="/Home/" class="text-white" style="text-decoration:none;">Batal</a></button>
          </div>
        </form>

      </form>

      <script>
        function handleChange() {
          event.preventDefault();
          var ipkInput = document.getElementById('ipk');
          var ipkValue = parseFloat(ipkInput.value);

          var beasiswaForm = document.getElementById('beasiswa');
          var berkasForm = document.getElementById('berkassyarat');

          if (ipkValue < 3) {
            beasiswaForm.disabled = true;
            berkasForm.disabled = true;
            alert('IPK Anda kurang dari 3. Tidak dapat mengirimkan formulir atau berkas.');
          } else if (ipkValue >= 3) {
            beasiswaForm.disabled = false;
            berkasForm.disabled = false;
          }
        }
      </script>

    </div>
  </div>
</div>

<?= $this->endSection('content'); ?>