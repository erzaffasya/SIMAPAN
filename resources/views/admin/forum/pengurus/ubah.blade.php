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
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Kantor</label>
                                <select name="kantor_id" class="form-select">
                                    <option value="">Pilih Kantor</option>
                                    @foreach ($kantor as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == $forum_penguru->kantor_id ? 'selected' : '' }}>
                                            {{ $item->kantor }}{{ $item->kecamatanKantor ? ', ' . ucwords(strtolower($item->kecamatanKantor->name)) : '' }}{{ $item->kelurahanKantor ? ', ' . ucwords(strtolower($item->kelurahanKantor->name)) : '' }}
                                        </option>
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
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <a href="{{ route('forum-pengurus.index') }}" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
