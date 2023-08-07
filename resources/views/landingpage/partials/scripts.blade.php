
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        const ctx = document.getElementById('myChart');
        const data2021 = [98, 61]; // Contoh data dua label untuk tahun 2021
        const data2022 = [99, 67]; // Contoh data dua label untuk tahun 2022

        new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['2021', '2022'],
            datasets: [{
            label: 'Kutipan Akta Kelahiran',
            data: [data2021[0], data2022[0]],
            backgroundColor: 'rgba(62, 201, 62, 0.5)', // Warna untuk label 1
            borderWidth: 1
            },
            {
            label: 'Kartu Identitas Anak (KIA)',
            data: [data2021[1], data2022[1]],
            backgroundColor: 'rgba(54, 162, 235, 0.5)', // Warna untuk label 2
            borderWidth: 1
            }]
        },
        options: {
            scales: {
            y: {
                beginAtZero: true,
                ticks: {
                callback: function(value) {
                    return value + '%';
                }
                }
            }
            }
        }
        });

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
                // autoplay: true,
                // autoplaySpeed: 0,
                // speed: 2000,
            });
            $('.slide-1-view').slick({
                infinite: true,
                dots: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 0,
                speed: 2000,
            });
            $('.slide-2-view').slick({
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 0,
                speed: 2000,
            });

        });
    </script>