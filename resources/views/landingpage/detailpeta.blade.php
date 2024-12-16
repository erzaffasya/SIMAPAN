<x-guest-layout>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>


    <div class="container" style="margin: 6rem auto;">
        <section class="d-flex" style="gap: 2rem;">
            <div style="flex: 1;">
                <img src={{ $Kantor['foto']? asset("storage/img/kantor/$Kantor->foto"): 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAN4AAACUCAMAAADLemePAAAAMFBMVEXp7vG6vsG3u76+wsXY3N/e4uXj6OvFyczQ1NfIzM/V2dzLz9Lg5ejm6+7a3+Ls8fTzRuEdAAACT0lEQVR4nO3b67aqIBRAYQFN1ND3f9vjZZs3LA3PkNWY389sN5qbRNRKEgAAAAAAAAAAAAAAAHzinlmwx90Ru9IiN8Fy+7y7w88adQmTNneneFh9TZ1SOsLxyy4au465O2ar7AcveM8b/kn13TUbRZdXPB+h+j4b3d7X54VPCk2l480ryXtPSl7TOf8yMvJcXbTzoD2/whKRV5v+MKFVdTZQQF6TqnEFo4uTfQLyHvMVSHHunQrIK+arT52depn487LlAvLc8MWfVx5cH6e+B6PPa9Z5zv8HVpWeR38lz3ZP3z4cfV570Fvk5d6n236b3aTHn+cWedr7Vu3fVrveEH/e6rKE57PZ2NfW9edTQF5ipj5de96pndWvxk9CnsvHOOOZPdxidPWyT0Je4spcaa1M4VuyrC6pLftE5LXrzros08x3TLBqbT7CQvJ2eS6HzsdPeJ7/Yu/UJztv+8lc9YnO271Q/zr4C8tbTC57Y6emIll5Vk2nPa56UzfOL6LyrNKvvvd1Y5+gvGFpaYa+5kNd65lIyhtP/Pq+5t1+9zd8svKmabJdllSfb27KypsPV/p57ITlHQmSm1eev9MuKO/82EnK++pbElLyDhwEJOd9+Q0XIXlfzCqC8tZXqckj727kkffDeUJOZ923upeJPy8Iebf49bxuctjcSz6vvzUYX95wmpCHGu7Le7/ycqtsPc0H2PsqzI3cgUt9B+nwXfh6Lr+oT1d3p/jZ8F8QGaPy+H7EMGgedRqsdhF+MgEAAAAAAAAAAAAAAAAAAP6rf2LALGyaHXsNAAAAAElFTkSuQmCC' }}
                    class="card-img-top" style="max-height: 300px; padding: 0.5rem; object-fit: cover;" alt="...">
            </div>

            <div style="flex: 1; display: flex; flex-direction: column; justify-content: center;">
                <h1 style="font-size: 2rem;">{{ $Kantor['kantor'] }}</h1>

                <div class="text-success" style="font-weight: bold; display: flex; gap: 0.5rem; align-items: baseline;">
                    <i class="fa-solid fa-location-dot"></i>

                    <p>
                        {{ ucwords(strtolower($Kantor->kecamatanKantor['name'])) }},
                        {{ ucwords(strtolower($Kantor->kelurahanKantor['name'])) }}
                    </p>
                </div>

                <div style="margin: 1rem auto;">
                    <p style="color: gray; font-size: 1rem;">{{ $Kantor['deskripsi'] }}</p>
                </div>



            </div>
        </section>

        {{-- <section style="margin: 2rem auto;">
            <div id="map"></div>
        </section> --}}

        <section style="margin: 8rem auto;">
            <div class="row align-items-center gy-4">



                <h1 class="text-center"
                    style="border-bottom: 5px solid green; max-width: 400px; margin: auto; padding-bottom: 1rem;">
                    Kegiatan
                    {{ $Kantor['kantor'] }}</h1>

                <form action="">
                    <div class="row justify-content-between pt-4">
                        <div class="col-12 col-lg-6">
                            <div class="input-group mb-3">
                                <input type="text" name="c" class="form-control form-control-lg"
                                    placeholder="Tulis Judul" aria-label="Tulis Judul" aria-describedby="button-addon2"
                                    value="{{ $c }}" required>
                                <button class="btn btn-secondary" type="submit" id="button-addon2">Cari
                                    Artikel</button>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <select class="form-select form-select-lg" aria-label="Default select example"
                                name="s" onchange="this.closest('form').submit()">
                                <option value="d" {{ $s == 'DESC' ? 'selected' : '' }}>Terbaru</option>
                                <option value="a" {{ $s == 'ASC' ? 'selected' : '' }}>Terlama</option>
                            </select>
                        </div>
                    </div>
                </form>
                <div class="row justify-content-between pb-4">
                    @if ($c)
                        <h6>Mencari Artikel Dengan Kata Kunci <span style="font-weight: 900">{{ $c }}</span>
                        </h6>
                        <a href="{{ url('artikel-kantor') }}">Bersihkan</a>
                    @endif
                </div>

                @forelse ($Kantor->kegiatan as $item)
                    <div class="col-12 col-lg-3">
                        <a class="card-artikel1"
                            href="{{ route('landingpage.artikel-kantor-detail', $item->slug ?? '') }}">
                            <figure class="shadow-lg mb-0 position-relative overflow-hidden">
                                <img src="{{ asset("storage/img/kegiatan/$item->foto") }}" alt=""
                                    width="100%" height="350">
                                <figcaption class="rounded bg-white py-2 px-3 mx-auto">
                                    <p class="fw-bold mb-2 lh-sm text-dark">{!! \Illuminate\Support\Str::limit($item->judul, 55) !!}
                                    </p>
                                    <p class="fs-6 mb-0 text-secondary">{{ $item->created_at->format('D, d M Y') }}</p>
                                </figcaption>
                            </figure>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <h5>Tidak Ada Artikel Ditemukan</h5>
                    </div>
                @endforelse

            </div>
        </section>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/markerclustererplus@2.1.4/dist/markerclusterer.min.js"></script>
    <script>
        function initMap() {
            var lat = {!! json_encode($Kantor['latitude']) !!};
            var long = {!! json_encode($Kantor['longitude']) !!};

            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: parseFloat(lat),
                    lng: parseFloat(long)
                },
                zoom: 13
            });

            var clusterOptions = {
                imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m',
                gridSize: 100,
                maxZoom: 15
            };


            var locationData = lat + "," + long;
            console.log(locationData, 'filee mapapp')
            var count = locationData.length;
            var markers = {};

            for (var i = 0; i < count; i++) {
                var latitude = locationData[i].latitude;
                var longitude = locationData[i].longitude;
                var kantor = locationData[i].kantor;
                var deskripsi_map = locationData[i].deskripsi_map;
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
                    content: `<div><h5>${kantor}</h5>
                        <br>
                        <img height="80" src="${foto}"/>
                        <p>${deskripsi_map}.</p></div>
                        <br>
                        <a target="_blank" href=${link}>Link on maps</a>`
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
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgDPppx-aVuLurlFjVI2QUGvdY2QHNGcg&callback=initMap&v=weekly"
        async defer></script>
</x-guest-layout>
