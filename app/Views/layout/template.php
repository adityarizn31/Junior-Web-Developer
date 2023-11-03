<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- My Css -->
  <link rel="stylesheet" href="/css/style.css">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">

  <!-- JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Chart JS -->
  <script src=" <?= base_url() ?>/chart/dist/Chart.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <title><?= $title; ?></title>

</head>

<body>

  <?= $this->include('layout/navbar'); ?>

  <?= $this->renderSection('content'); ?>

  <div class="footer">
    <div class="text-center my-auto">
      <span>Copyright &copy; Kampuskuaja.ac.id</span>
    </div>
  </div>

  <script>
    // Halaman Berita
    function previewImgBerita() {
      const fotoberita = document.querySelector('#berkassyarat');
      const imgPreviewBerita = document.querySelector('.img-preview');

      const fileFotoBerita = new FileReader();
      fileFotoBerita.readAsDataURL(fotoberita.files[0]);

      fileFotoBerita.onload = function(e) {
        imgPreviewBerita.src = e.target.result;
      }
    }
  </script>

</body>

</html>