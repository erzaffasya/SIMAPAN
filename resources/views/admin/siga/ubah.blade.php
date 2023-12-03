<x-app-layout>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Siga</h4>
                <h6>Ubah Data Siga</h6>
            </div>
        </div>
        <!-- /add -->
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('siga.update', $siga->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="row">

                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Jenis Siga</label>
                                <select class="form-control" name="siga_jenis_id">
                                    <option value="">Pilih Siga</option>
                                    @foreach ($SigaJenis as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $siga->siga_jenis_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->judul }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Judul</label>
                                <input name="judul" type="text" value="{{ $siga->judul }}" required>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Foto</label>
                                <input name="file" type="file">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" class="form-control">{{ $siga->deskripsi }}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <a href="{{ route('siga.index') }}" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
