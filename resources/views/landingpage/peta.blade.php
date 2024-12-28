<x-guest-layout>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
    <section id="ppatbm-program">
        <div class="container py-5">
            <div class="text-center mb-4">
                <h1 class="display-6 fw-bold mb-2">Peta Pemetaan PPATBM Kelurahan</h1>
                <p class="fs-5 text-secondary">Terdiri dari {{ $Kantor->count() }} lokasi PPATBM yang tersebar diseluruh
                    wilayah Kota
                    Balikpapan</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-11">
                    <div id="map"></div>
                </div>
            </div>


            <div class="text-end" style="margin: 2rem 2.5rem;">
                <form method="GET" action="{{ route('peta') }}" id="filterForm" style="display: inline-block;">
                    <select id="kecamatan" name="kecamatan" class="form-select"
                        style="width: 200px; display: inline-block; border: 2px solid green; color: green;">
                        <option value="all" {{ request('kecamatan') == 'all' ? 'selected' : '' }}>Semua Kecamatan
                        </option>
                        @foreach ($kecamatan as $item)
                            <option value="{{ $item->code }}"
                                {{ request('kecamatan') == $item->code ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>

                    <select id="kelurahan" name="kelurahan" class="form-select"
                        style="width: 200px; display: inline-block; border: 2px solid green; color: green;">
                        <option value="all" {{ request('kelurahan') == 'all' ? 'selected' : '' }}>Semua Kelurahan
                        </option>
                    </select>

                    <button type="submit" class="btn btn-success" style="margin-left: 10px;">Filter</button>
                </form>
            </div>


            <div class="container">
                <div class="row justify-content-center" style="margin: 1rem 0;">
                    @foreach ($location as $item)
                        <a href="{{ route('peta.detail', $item['slug']) }}" class="card"
                            style="width: 18rem; margin: 1rem 0.5rem; text-decoration: none;">
                            <div>
                                <img src={{ $item['foto']? $item['foto']: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAN4AAACUCAMAAADLemePAAAAMFBMVEXp7vG6vsG3u76+wsXY3N/e4uXj6OvFyczQ1NfIzM/V2dzLz9Lg5ejm6+7a3+Ls8fTzRuEdAAACT0lEQVR4nO3b67aqIBRAYQFN1ND3f9vjZZs3LA3PkNWY389sN5qbRNRKEgAAAAAAAAAAAAAAAHzinlmwx90Ru9IiN8Fy+7y7w88adQmTNneneFh9TZ1SOsLxyy4au465O2ar7AcveM8b/kn13TUbRZdXPB+h+j4b3d7X54VPCk2l480ryXtPSl7TOf8yMvJcXbTzoD2/whKRV5v+MKFVdTZQQF6TqnEFo4uTfQLyHvMVSHHunQrIK+arT52depn487LlAvLc8MWfVx5cH6e+B6PPa9Z5zv8HVpWeR38lz3ZP3z4cfV570Fvk5d6n236b3aTHn+cWedr7Vu3fVrveEH/e6rKE57PZ2NfW9edTQF5ipj5de96pndWvxk9CnsvHOOOZPdxidPWyT0Je4spcaa1M4VuyrC6pLftE5LXrzros08x3TLBqbT7CQvJ2eS6HzsdPeJ7/Yu/UJztv+8lc9YnO271Q/zr4C8tbTC57Y6emIll5Vk2nPa56UzfOL6LyrNKvvvd1Y5+gvGFpaYa+5kNd65lIyhtP/Pq+5t1+9zd8svKmabJdllSfb27KypsPV/p57ITlHQmSm1eev9MuKO/82EnK++pbElLyDhwEJOd9+Q0XIXlfzCqC8tZXqckj727kkffDeUJOZ923upeJPy8Iebf49bxuctjcSz6vvzUYX95wmpCHGu7Le7/ycqtsPc0H2PsqzI3cgUt9B+nwXfh6Lr+oT1d3p/jZ8F8QGaPy+H7EMGgedRqsdhF+MgEAAAAAAAAAAAAAAAAAAP6rf2LALGyaHXsNAAAAAElFTkSuQmCC' }}
                                    class="card-img-top" style="max-height: 200px; padding: 0.5rem;" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title" style="color: darkslategray;">{{ $item['kantor'] }}</h5>
                                    <p class="card-text" style="color: gray;">{{ $item['deskripsi'] }}</p>
                                    {{-- <a href="{{ route('peta.detail', $item['slug']) }}" class="btn btn-success">Detail</a> --}}
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/markerclustererplus@2.1.4/dist/markerclusterer.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var kelurahanSelect = $('#kelurahan');
            var kecamatanSelect = $('#kecamatan');


            // Ambil data kelurahan dari PHP ke JavaScript
            var kelurahanData = {!! json_encode($kelurahan) !!};


            // Fungsi untuk mengisi dropdown kelurahan
            function populateKelurahan(kecamatan) {
                kelurahanSelect.empty().append('<option value="all">Semua Kelurahan</option>');

                if (kecamatan !== 'all') {
                    var filteredKelurahan = kelurahanData.filter(function(item) {
                        return item.district_code == kecamatan;
                    });

                    filteredKelurahan.forEach(function(item) {
                        kelurahanSelect.append('<option value="' + item.code + '">' + item.name +

                            '</option>');
                    });

                    // Jika ada kelurahan yang sudah dipilih, set sebagai selected
                    var selectedKelurahan = '{{ request('kelurahan', 'all') }}';
                    kelurahanSelect.val(selectedKelurahan);
                }
            }

            // Jalankan saat dropdown kecamatan berubah
            kecamatanSelect.on('change', function() {
                var kecamatan = $(this).val();
                populateKelurahan(kecamatan);
            });

            // Saat halaman dimuat, cek jika ada kecamatan yang dipilih
            var initialKecamatan = kecamatanSelect.val();
            if (initialKecamatan !== 'all') {
                populateKelurahan(initialKecamatan);
            }
        });
    </script>

    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: -1.269160,
                    lng: 116.825264
                },
                zoom: 13
            });

            var clusterOptions = {
                imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m',
                gridSize: 100,
                maxZoom: 15
            };

            var locationData = {!! json_encode($location) !!};
            console.log(locationData, 'filee mapapp')
            var count = locationData.length;
            var markers = {};

            for (var i = 0; i < count; i++) {
                var latitude = locationData[i].latitude;
                var longitude = locationData[i].longitude;
                var kantor = locationData[i].kantor;
                var deskripsi_map = locationData[i].deskripsi_map;
                var detail_slug = locationData[i].detail_slug;
                var foto = locationData[i].foto;
                var link = locationData[i].link;

                var dataMarker = new google.maps.Marker({
                    position: {
                        lat: Number(latitude),
                        lng: Number(longitude)
                    },
                    title: kantor,
                    // icon: {
                    //     url: 'https://cdn-icons-png.flaticon.com/512/2838/2838912.png',
                    //     scaledSize: new google.maps.Size(15, 15),
                    //     origin: new google.maps.Point(0, 0),
                    //     anchor: new google.maps.Point(16, 16)
                    // }
                });
                console.log(dataMarker, 'data marker')

                markers[`marker${i+1}`] = dataMarker;

                var infoWindow1 = new google.maps.InfoWindow({
                    content: `
                        <div style="display: flex; align-items: flex-start; font-family: Arial, sans-serif; max-width: 300px;">
                            <img src="${foto}" alt="Foto Kantor" style="width: 80px; height: 80px; object-fit: cover; border-radius: 5px; margin-right: 10px;">
                            <div>
                                <a target="_blank" href="${detail_slug}" style="text-decoration: none; color: #28a745;">
                                    <h5 style="margin: 0; font-size: 16px;">${kantor}</h5>
                                </a>
                                <p style="margin: 5px 0; font-size: 12px; color: #555;">${locationData[i].deskripsi}</p>
                                <p style="margin: 5px 0; font-size: 12px; color: #555;">${deskripsi_map}</p>
                                <a target="_blank" href="${link}" style="color: #007BFF; font-weight: bold;">
                                    Link on maps
                                </a>
                            </div>
                        </div>
                    `
                });



                attachInfoWindow(dataMarker, infoWindow1);
            }

            function attachInfoWindow(marker, infoWindow) {
                marker.addListener('click', function() {
                    infoWindow.open(map, marker);
                });
            }

            var markerCluster = new MarkerClusterer(map, Object.values(markers), clusterOptions);


        }
    </script>

    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgDPppx-aVuLurlFjVI2QUGvdY2QHNGcg&callback=initMap&v=weekly"
        async defer></script>
</x-guest-layout>
