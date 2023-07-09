<!DOCTYPE html>
<html>

<head>
    <title>Google Maps API</title>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>

</head>

<body>
    <h1>Pemetaan </h1>
    <div id="map"></div>

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

            var markers = [];

            var marker1 = new google.maps.Marker({
                position: {
                    lat: 37.7895,
                    lng: -122.4061
                },
                title: 'Marker 1',
                icon: {
                    url: 'https://cdn-icons-png.flaticon.com/512/2838/2838912.png',
                    scaledSize: new google.maps.Size(15, 15), 
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(16, 16)
                }
            });

            var marker2 = new google.maps.Marker({
                position: {
                    lat: 37.7749,
                    lng: -122.4194
                },
                title: 'Marker 2',
                icon: {
                    url: 'https://cdn-icons-png.flaticon.com/512/2838/2838912.png',
                    scaledSize: new google.maps.Size(15, 15), 
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(16, 16)
                }
            });

            markers.push(marker1);
            markers.push(marker2);

            var clusterOptions = {
                imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m',
                gridSize: 10, 
                maxZoom: 15 
            };

            var markerCluster = new MarkerClusterer(map, markers, clusterOptions);

            var infoWindow1 = new google.maps.InfoWindow({
                content: '<div><h3>Marker 1</h3><p>Additional details or description for Marker 1.</p></div>'
            });

            var infoWindow2 = new google.maps.InfoWindow({
                content: '<div><h3>Marker 2</h3><p>Additional details or description for Marker 2.</p></div>'
            });

            marker1.addListener('click', function() {
                infoWindow1.open(map, marker1);
            });

            marker2.addListener('click', function() {
                infoWindow2.open(map, marker2);
            });
        }
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3IzKovEv9pbMJ-pLfP9cO7nTSJXIDPDU&callback=initMap&v=weekly"
        async defer></script>
</body>

</html>
