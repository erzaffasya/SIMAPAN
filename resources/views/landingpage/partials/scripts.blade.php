
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
            $('.slide-4-view').slick({
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 0,
                speed: 2000,
            });

        });
            // START CHART KLUSTER 1
            const c1ctx = document.getElementById('c1chart');
            const c1data2021 = [98, 61]; // Contoh data dua label untuk tahun 2021
            const c1data2022 = [99, 67]; // Contoh data dua label untuk tahun 2022

            new Chart(c1ctx, {
            type: 'bar',
            data: {
                labels: ['2021', '2022'],
                datasets: [{
                label: 'Kutipan Akta Kelahiran',
                data: [c1data2021[0], c1data2022[0]],
                backgroundColor: 'rgba(62, 201, 62, 0.5)', // Warna untuk label 1
                borderWidth: 1
                },
                {
                label: 'Kartu Identitas Anak (KIA)',
                data: [c1data2021[1], c1data2022[1]],
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
            // END CHART KLUSTER 1
            
            // START CHART KLUSTER 2
                const c2ctx = document.getElementById('c2chart');
                const c2data2017 = [98, 4487, 0]; 
                const c2data2018 = [105, 19943, 0]; 
                const c2data2019 = [153, 4314, 0]; 
                const c2data2020 = [86, 413, 1287]; 
                const c2data2021 = [239, 570, 1055]; 
                const c2data2022 = [931, 3918, 4982];

                new Chart(c2ctx, {
                type: 'bar',
                data: {
                    labels: ['2017','2018','2019','2020','2021', '2022'],
                    datasets: [{
                        label: 'Layanan Indoor',
                        data: [c2data2017[0], c2data2018[0], c2data2019[0], c2data2020[0], c2data2021[0], c2data2022[0]],
                        backgroundColor: 'rgba(220, 159, 53, 0.7)', // Warna untuk label 2
                        borderWidth: 1
                    },
                    {
                        label: 'Layanan Outdoor/Sosialisasi',
                        data: [c2data2017[1], c2data2018[1], c2data2019[1], c2data2020[1], c2data2021[1], c2data2022[1]],
                        backgroundColor: 'rgba(220, 53, 69, 0.7)', // Warna untuk label 1
                        borderWidth: 1
                    },
                    {
                        label: 'Layanan Online',
                        data: [c2data2017[2], c2data2018[2], c2data2019[2], c2data2020[2], c2data2021[2], c2data2022[2]],
                        backgroundColor: 'rgba(247, 104, 52, 0.7)', // Warna untuk label 2
                        borderWidth: 1
                    },
                ]
                },
                options: {
                    scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                        callback: function(value) {
                            return value + 'x';
                        }
                        }
                    }
                    }
                }
                });
            // END CHART KLUSTER 2

            // START CHART KLUSTER 4
            
        // END CHART KLUSTER 4
                

    </script>

    @stack('scripts')