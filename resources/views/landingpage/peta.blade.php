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
                <h1 class="display-6 fw-bold mb-2">Peta Pemetaan PPATBM</h1>
                <p class="fs-5 text-secondary">Terdiri dari 20 lokasi PPATBM yang tersebar diseluruh wilayah Kota
                    Balikpapan</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-10">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/markerclustererplus@2.1.4/dist/markerclusterer.min.js"></script>
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
            var count = locationData.length;
            var markers = {};

            for (var i = 0; i < count; i++) {
                var latitude = locationData[i].latitude;
                var longitude = locationData[i].longitude;
                var kantor = locationData[i].kantor;
                var deskripsi_map = locationData[i].deskripsi_map;

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

                markers[`marker${i+1}`] = dataMarker;

                var infoWindow1 = new google.maps.InfoWindow({
                    content: `<div><h3>${kantor}</h3><p>${deskripsi_map}.</p></div>`
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
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3IzKovEv9pbMJ-pLfP9cO7nTSJXIDPDU&callback=initMap&v=weekly"
        async defer></script>
</x-guest-layout>
