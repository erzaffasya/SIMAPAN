<x-app-layout>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Banner</h4>
                <h6>Ubah Data Banner</h6>
            </div>
        </div>
        <!-- /add -->
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('banner.update', $banner->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">

                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Judul</label>
                                <input name="judul" value="{{ $banner->judul }}" type="text">
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Banner</label>
                                <input name="banner" type="file" accept="image/*">
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Gambar</label>
                                <input name="gambar" type="file" accept="image/*">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" class="form-control">{{ $banner->deskripsi }}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <a href="{{ route('banner.index') }}" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
