<x-app-layout>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Pemberdayaan Masyarakat</h4>
                <h6>Ubah Data Pemberdayaan Masyarakat</h6>
            </div>
        </div>
        <!-- /add -->
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('pemberdayaan-masyarakat.update', $pemberdayaanMasyarakat->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Judul</label>
                                <input name="judul" type="text" value="{{ $pemberdayaanMasyarakat->judul }}" required>
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
                                <textarea name="deskripsi" class="form-control">{{ $pemberdayaanMasyarakat->deskripsi }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Link</label>
                                <input name="link" type="text" value="{{ $pemberdayaanMasyarakat->link }}" required>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <a href="{{ route('pemberdayaan-masyarakat.index') }}" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
