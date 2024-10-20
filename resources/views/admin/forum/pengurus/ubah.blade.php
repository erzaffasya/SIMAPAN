<x-app-layout>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Pengurus</h4>
                <h6>Ubah Data Pengurus</h6>
            </div>
        </div>
        <!-- /add -->
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('forum-pengurus.update', $forum_penguru->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Nama</label>
                                <input name="nama" value="{{ $forum_penguru->nama }}" type="text" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input name="jabatan" value="{{ $forum_penguru->jabatan }}" type="text" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <select name="kecamatan" class="form-control" id="kecamatan">
                                    <option value="">Pilih Kecamatan</option>
                                    @foreach ($lKecamatan as $item)
                                        <option value="{{ $item->code }}"
                                            {{ $item->code == $forum_penguru->kecamatan ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Kelurahan</label>
                                <select name="kelurahan" class="form-control" id="kelurahan"
                                    {{ $forum_penguru->kelurahan ? '' : 'disabled' }}>
                                    <option value="">Pilih Kelurahan</option>
                                    @foreach ($lKelurahan as $item)
                                        @if ($item->district_code == $forum_penguru->kecamatan)
                                            <option value="{{ $item->code }}"
                                                {{ $item->code == $forum_penguru->kelurahan ? 'selected' : '' }}>
                                                {{ $item->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Foto</label>
                                <input name="foto" type="file" accept="image/*">
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Tampilkan Pengurus ?</label>
                                <input name="is_show" type="checkbox" {{ $forum_penguru->is_show ? 'checked' : '' }}>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <a href="{{ route('forum-pengurus.index') }}" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
                const selectedKelurahan = "{{ $forum_penguru->kelurahan }}"; // Ambil ID kelurahan yang dipilih
                if (selectedKelurahan) {
                    kelurahanSelect.value = selectedKelurahan;
                }
            };
        </script>
    @endpush
</x-app-layout>
