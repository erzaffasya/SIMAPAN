<x-app-layout>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Kantor</h4>
                <h6>Ubah Data Kantor</h6>
            </div>
        </div>
        <!-- /add -->
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('kantor.update', $Kantor->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Kantor</label>
                                <input name="kantor" value="{{ $Kantor->kantor }}" type="text">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Foto</label>
                                <input name="foto" type="file" accept="image/*">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" class="form-control">{{ $Kantor->deskripsi }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Maps</label>
                                <div style="position: relative; overflow:visible; width: 100%; height: 350px;">
                                    <div id="map" class="w-100 h-100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Latitude</label>
                                <input name="latitude" id="latitude" value="-1.2379274" onchange="onChangeLocation()"
                                    value="{{ $Kantor->latitude }}" type="text">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Longitude</label>
                                <input name="longitude" id="longitude" value="116.8528526" onchange="onChangeLocation()"
                                    value="{{ $Kantor->longitude }}" type="text">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <select name="kecamatan" class="form-control" id="kecamatan">
                                    <option value="">Pilih Kecamatan</option>
                                    @foreach ($lKecamatan as $item)
                                        <option value="{{ $item->code }}"
                                            {{ $item->code == $Kantor->kecamatan ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Kelurahan</label>
                                <select name="kelurahan" class="form-control" id="kelurahan"
                                    {{ $Kantor->kelurahan ? '' : 'disabled' }}>
                                    <option value="">Pilih Kelurahan</option>
                                    @foreach ($lKelurahan as $item)
                                        @if ($item->district_code == $Kantor->kecamatan)
                                            <option value="{{ $item->code }}"
                                                {{ $item->code == $Kantor->kelurahan ? 'selected' : '' }}>
                                                {{ $item->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Link Map</label>
                                <input name="link_map" id="link_map"
                                    value="https://www.google.com/maps?q=-1.2379274,116.8528526" readonly="true"
                                    value="{{ $Kantor->link_map }}" type="text">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Deskripsi Map</label>
                                <textarea name="deskripsi_map" class="form-control">{{ $Kantor->deskripsi_map }}</textarea>
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <a href="{{ route('kantor.index') }}" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /add -->
    </div>

    @push('scripts')
        <script>
            function initMap() {
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: {
                        lat: {{ $Kantor->latitude }},
                        lng: {{ $Kantor->longitude }}
                    },
                    zoom: 13
                });

                var marker = new google.maps.Marker({
                    map: map,
                    draggable: true,
                    position: {
                        lat: {{ $Kantor->latitude }},
                        lng: {{ $Kantor->longitude }}
                    },
                });

                var inputLongitude = document.getElementById('longitude');
                var inputLatitude = document.getElementById('latitude');
                var inputLink_map = document.getElementById('link_map');

                google.maps.event.addListener(map, 'click', function(event) {
                    var latitude = event.latLng.lat();
                    var longitude = event.latLng.lng();

                    marker.setPosition(event.latLng);
                    console.log(event.latLng)
                    inputLongitude.value = longitude;
                    inputLatitude.value = latitude;
                    inputLink_map.value = 'https://www.google.com/maps?q=' + latitude + ',' + longitude;
                });

                function loadGoogleMaps() {
                    var script = document.createElement('script');
                    script.defer = true;
                    script.async = true;
                    document.head.appendChild(script);
                }

                window.onload = loadGoogleMaps;
            }
        </script>
        <script>
            function onChangeLocation() {
                var inputLongitude = document.getElementById('longitude');
                var inputLatitude = document.getElementById('latitude');
                var inputLink_map = document.getElementById('link_map');

                inputLink_map.value = 'https://www.google.com/maps?q=' + inputLongitude.value + ',' + longitude.value;
            }
        </script>
    @endpush
    @push('scripts')
        <script>
            // Data kelurahan dari Laravel
            const kelurahanData = @json($lKelurahan);

            // Menangani perubahan pada dropdown Kecamatan
            document.getElementById('kecamatan').addEventListener('change', function() {
                const kecamatanCode = this.value;
                const kelurahanSelect = document.getElementById('kelurahan');

                // Bersihkan opsi kelurahan
                kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan</option>';
                kelurahanSelect.disabled = true; // Disable kelurahan pada awalnya

                if (kecamatanCode) {
                    // Filter kelurahan berdasarkan kecamatan yang dipilih
                    const filteredKelurahan = kelurahanData.filter(k => k.district_code === kecamatanCode);

                    // Tambahkan opsi kelurahan yang sesuai
                    filteredKelurahan.forEach(kelurahan => {
                        const option = document.createElement('option');
                        option.value = kelurahan.code;
                        option.textContent = kelurahan.name;
                        kelurahanSelect.appendChild(option);
                    });

                    // Enable kelurahan jika ada opsi yang tersedia
                    kelurahanSelect.disabled = filteredKelurahan.length === 0;
                }
            });

            // Set kelurahan berdasarkan kecamatan yang sudah dipilih saat edit
            window.onload = function() {
                const selectedKecamatan = document.getElementById('kecamatan').value;
                const kelurahanSelect = document.getElementById('kelurahan');

                // Jika ada kecamatan yang sudah dipilih, isi dropdown kelurahan
                if (selectedKecamatan) {
                    const filteredKelurahan = kelurahanData.filter(k => k.district_code === selectedKecamatan);

                    // Tambahkan opsi kelurahan yang sesuai
                    filteredKelurahan.forEach(kelurahan => {
                        const option = document.createElement('option');
                        option.value = kelurahan.code;
                        option.textContent = kelurahan.name;
                        kelurahanSelect.appendChild(option);
                    });

                    // Enable kelurahan jika ada opsi yang tersedia
                    kelurahanSelect.disabled = filteredKelurahan.length === 0;
                }

                // Jika ada kelurahan yang sudah dipilih, set sebagai selected
                const selectedKelurahan = "{{ $Kantor->kelurahan }}"; // Ambil ID kelurahan yang dipilih
                if (selectedKelurahan) {
                    kelurahanSelect.value = selectedKelurahan;
                }
            };
        </script>
    @endpush
</x-app-layout>
