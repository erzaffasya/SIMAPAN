<x-app-layout>
    @push('css')
        <style>
            .custom-file-container .custom-file-container__image-multi-preview {
                background-position: center center;
                background-size: cover;
                width: 150px;
                height: 150px;
                margin: 2px;
            }

            .custom-file-container .custom-file-container__image-preview.custom-file-container__image-preview--active {
                display: flex;
                flex-wrap: wrap;
            }

            .custom-file-container__image-multi-preview__single-image-clear .custom-file-container__image-multi-preview__single-image-clear__icon {
                color: red;
                font-size: 20px;
                font-weight: bold;
                cursor: pointer;
            }
        </style>
    @endpush
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Kategori Artikel</h4>
                <h6>Tambah Data Kategori Artikel</h6>
            </div>
        </div>
        <!-- /add -->
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('forum-kategori-galeri.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Judul</label>
                                <input name="judul" type="text">
                            </div>
                        </div>

                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control" name="kategori">
                                    <option value="F">Forum Anak</option>
                                    <option value="P">Profil Anak</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Multiple File Upload</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="custom-file-container" data-upload-id="mySecondImage">
                                            <label>Upload (Allow Multiple) <a href="javascript:void(0)"
                                                    class="custom-file-container__image-clear"
                                                    title="Clear Image">x</a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file"
                                                    class="custom-file-container__custom-file__custom-file-input"
                                                    name='foto[]' multiple>
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>

                                            <div class="custom-file-container__image-preview">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <x-forms.tinymce-editor name="deskripsi" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <a href="{{ route('forum-kategori-galeri.index') }}" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /add -->
    </div>

    @push('scripts')
        <script src="{{ asset('tadmin/assets/plugins/fileupload/fileupload.min.js') }}"></script>
    @endpush
</x-app-layout>
