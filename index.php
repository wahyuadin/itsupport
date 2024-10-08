<?php
include 'templates/header.php';

?>
 <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<h1 class="display-5" data-aos="fade-right" data-aos-duration="1000">Punya Kendala?</h1>
<p class="lead" data-aos="fade-right" data-aos-duration="1000">IT Helpdesk siap membantu.</p>
<div class="jumbotron-search" data-aos="fade-right" data-aos-duration="1000">
  <form action="search.php" method="POST">
    <p class="lead" style="margin-bottom: -1px;">Cek status laporan Anda</p>
    <input type="text" name="keyword" id="keyword" placeholder="Masukkan nomor laporan Anda disini">
    <button type="submit" class="btn btn-primary search-button" value="cari"><span class="fas fa-search mr-2"></span>Cek</button>
  </form>
  <p class="lead mt-2">atau ajukan laporan Anda</p>
  <a href="form-pengaduan.php" class="btn btn-primary sub-button"><span class="fas fa-chevron-right mr-2"></span>Disini</a>
</div>
<?php
include 'templates/footer.php';
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init({
        once: true,
      });
    </script>
    <script>
      const scriptURL = '<https://script.google.com/macros/s/AKfycbwEmWNlm00S4Mi7eYm-44Lf2HAESV3Nn_s7nB9rsbC-edRODluWWBrkJnHbCEpvs3pONA/exec>';
      const form = document.forms['contact-me'];

      form.addEventListener('submit', (e) => {
        e.preventDefault();
        fetch(scriptURL, { method: 'POST', body: new FormData(form) })
          .then((response) => console.log('Success!', response))
          .catch((error) => console.error('Error!', error.message));
      });