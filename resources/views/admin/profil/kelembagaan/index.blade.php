<x-app-layout>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Kelembagaan</h4>
                <h6>Manajemen Kelembagaan</h6>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('profil-kelembagaan.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Judul</label>
                                <input name="judul" value="{{ $kelembagaan->judul ?? '' }}" type="text" required>
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
                                <label>Deskripsi</label>
                                <x-forms.tinymce-editor name="deskripsi">{{ $kelembagaan->deskripsi ?? '' }}
                                </x-forms.tinymce-editor>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /product list -->
    </div>
</x-app-layout>
