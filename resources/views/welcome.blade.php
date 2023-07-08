<!DOCTYPE html>
<html>
<head>
  <title>Google Maps API - Menggambar Pemetaan per Kecamatan</title>
  <style>
    #map {
      height: 400px;
      width: 100%;
    }
  </style>
</head>
<body>
  <h1>Pemetaan per Kecamatan</h1>
  <div id="map"></div>

  <script>
    // Fungsi ini akan dijalankan setelah API Google Maps dimuat
    function initMap() {
      // Buat objek peta
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: {lat: -1.2635389, lng: 	116.8278833}  // Koordinat Jakarta
      });

      // Gambar perbatasan kecamatan
      var kecamatanCoordinates = [
        // Koordinat per kecamatan
        // Contoh koordinat kecamatan A
        [
          {lat: -6.2070, lng: 106.8500},
          {lat: -6.2050, lng: 106.8500},
          {lat: -6.2050, lng: 106.8550},
          {lat: -6.2070, lng: 106.8550}
        ],
        // Contoh koordinat kecamatan B
        [
          {lat: -6.2080, lng: 106.8600},
          {lat: -6.2060, lng: 106.8600},
          {lat: -6.2060, lng: 106.8650},
          {lat: -6.2080, lng: 106.8650}
        ],
        // ...
      ];

      // Loop melalui koordinat kecamatan dan gambar batasnya
      for (var i = 0; i < kecamatanCoordinates.length; i++) {
        var kecamatanPath = new google.maps.Polygon({
          paths: kecamatanCoordinates[i],
          strokeColor: '#FF0000',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#FF0000',
          fillOpacity: 0.35
        });
        kecamatanPath.setMap(map);
      }
    }
  </script>
  <!-- Mengimpor API Google Maps -->
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3IzKovEv9pbMJ-pLfP9cO7nTSJXIDPDU&region=INA&language=ID&callback=initMap"&callback=initMap"></script>
</body>
</html>