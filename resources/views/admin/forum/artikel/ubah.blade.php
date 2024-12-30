<x-app-layout>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Artikel</h4>
                <h6>Ubah Data Artikel</h6>
            </div>
        </div>
        <!-- /add -->
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('forum-artikel.update', $forum_artikel->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        {{-- <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control" name="id_kategori">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($lKategori as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == $forum_artikel->id_kategori ? 'selected' : '' }}>
                                            {{ $item->judul }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Judul</label>
                                <input name="judul" value="{{ $forum_artikel->judul }}" type="text" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <select name="kecamatan" class="form-control" id="kecamatan">
                                    <option value="">Pilih Kecamatan</option>
                                    @foreach ($lKecamatan as $item)
                                        <option value="{{ $item->code }}"
                                            {{ $item->code == $forum_artikel->kecamatan ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Kelurahan</label>
                                <select name="kelurahan" class="form-control" id="kelurahan"
                                    {{ $forum_artikel->kelurahan ? '' : 'disabled' }}>
                                    <option value="">Pilih Kelurahan</option>
                                    @foreach ($lKelurahan as $item)
                                        @if ($item->district_code == $forum_artikel->kecamatan)
                                            <option value="{{ $item->code }}"
                                                {{ $item->code == $forum_artikel->kelurahan ? 'selected' : '' }}>
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
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Isi</label>
                                <x-forms.tinymce-editor name="isi">{{ $forum_artikel->isi }}
                                </x-forms.tinymce-editor>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <a href="{{ route('forum-artikel.index') }}" class="btn btn-cancel">Cancel</a>
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
                const selectedKelurahan = "{{ $forum_artikel->kelurahan }}"; // Ambil ID kelurahan yang dipilih
                if (selectedKelurahan) {
                    kelurahanSelect.value = selectedKelurahan;
                }
            };

            document.querySelector("form").addEventListener("submit", function(event) {
                const fotoInput = document.querySelector('input[name="foto"]');
                const fotoFile = fotoInput.files[0];
                const maxSize = 5 * 1024 * 1024; // 5MB

                // Jika ukuran file lebih besar dari 5MB
                if (fotoFile && fotoFile.size > maxSize) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ukuran Gambar Terlalu Besar',
                        text: 'Ukuran gambar tidak boleh lebih dari 5MB.'
                    });
                    event.preventDefault(); // Membatalkan submit
                    return;
                }
            });
        </script>
    @endpush
</x-app-layout>
