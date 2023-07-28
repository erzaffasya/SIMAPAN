</main>
<footer style="background-color: #142841;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <figure>
          <img src="asset/img/logo-1.png" alt="" height="50">
          <img src="asset/img/logo-2.png" alt="" height="50">
          <img src="asset/img/logo-3.png" alt="" height="50">
          <figcaption class="text-white mt-2">
            <h1 class="display-5 fw-bold mb-0">DP3AKB</h1>
            <p class="fs-5">Balikpapan</p>
          </figcaption>
        </figure>
      </div>
      <div class="col-2">
        <p class="text-white fs-5 fw-bold">SIMAPAN</p>
        <ul class="list-unstyled">
          <li class="my-2"><a href="#" class="text-white text-decoration-none">Konsultasi Online</a></li>
          <li class="my-2"><a href="#" class="text-white text-decoration-none">Kegiatan PPATBM</a></li>
          <li class="my-2"><a href="#" class="text-white text-decoration-none">Laporan Kejadian</a></li>
          <li class="my-2"><a href="#" class="text-white text-decoration-none">Bantuan Hukum</a></li>
        </ul>
      </div>
      <div class="col-2">
        <p class="text-white fs-5 fw-bold">Forum Anak</p>
        <ul class="list-unstyled">
          <li class="my-2"><a href="#" class="text-white text-decoration-none">Struktur Organisasi</a></li>
          <li class="my-2"><a href="#" class="text-white text-decoration-none">Profil Pengurus</a></li>
          <li class="my-2"><a href="#" class="text-white text-decoration-none">Artikel</a></li>
          <li class="my-2"><a href="#" class="text-white text-decoration-none">Kegiatan Forum Anak</a></li>
        </ul>
      </div>
      <div class="col-2">
        <p class="text-white fs-5 fw-bold">Profil Anak</p>
        <ul class="list-unstyled">
          <li class="my-2"><a href="#" class="text-white text-decoration-none">Informasi Kluster</a></li>
          <li class="my-2"><a href="#" class="text-white text-decoration-none">Kelembagaan</a></li>
          <li class="my-2"><a href="#" class="text-white text-decoration-none">Kegiatan Kelembagaan</a></li>
        </ul>
      </div>
    </div>
    <p class="text-white text-center fs-6 mt-4">© 2023 DP3AKB. Copyright and rights reserved</p>
  </div>
</footer>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.header-slide').slick({
      speed: 5000,
      autoplay: true,
      autoplaySpeed: 0,
      centerMode: true,
      cssEase: 'linear',
      slidesToShow: 1,
      slidesToScroll: 1,
      variableWidth: true,
      infinite: true,
      initialSlide: 1,
      arrows: false,
      buttons: false
    });
    $('.pengurus-slide').slick({
      infinite: true,
      slidesToShow: 5,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 0,
      speed: 2000,
    });
  });
</script>
</body>

</html>