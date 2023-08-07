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

            .custom-file-container .custom-file-container__image-preview--active {
                display: flex;
                flex-wrap: wrap;
            }

            .custom-file-container .custom-file-container__image-preview--active {
                display: flex;
                flex-wrap: wrap;
            }

            .custom-file-container__image-multi-preview__single-image-clear .custom-file-container__image-multi-preview__single-image-clear__icon {
                color: red;
                font-size: 20px;
                font-weight: bold;
                cursor: pointer;
                padding-left: 4px;
            }
        </style>
    @endpush
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Kategori Artikel</h4>
                <h6>Ubah Data Kategori Artikel</h6>
            </div>
        </div>
        <!-- /add -->
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('forum-kategori-galeri.update', $forum_kategori_galeri->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Judul</label>
                                <input name="judul" value="{{ $forum_kategori_galeri->judul }}" type="text"
                                    required>
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

                                            <div class="custom-file-container__image-preview custom-file-container__image-preview--active"
                                                style="background-image: url(&quot;&quot;);"></div>

                                            <div class="custom-file-container__image-preview--active"
                                                style="background-image: url(&quot;&quot;);">
                                                @foreach ($forum_kategori_galeri->galeri as $gambar)
                                                    <div class="custom-file-container__image-multi-preview"
                                                        data-upload-token="vpsl9mz18gtr7yxnl5gg"
                                                        style="background-image: url({{ asset("storage/img/forum_galeri/{$gambar->kategori->id}/$gambar->foto") }}); ">
                                                        <span
                                                            class="custom-file-container__image-multi-preview__single-image-clear">
                                                            <span
                                                                class="custom-file-container__image-multi-preview__single-image-clear__icon deleteRecord"
                                                                data-id="{{ $gambar->id }}">×</span>
                                                        </span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <x-forms.tinymce-editor name="deskripsi">{{ $forum_kategori_galeri->deskripsi }}
                                </x-forms.tinymce-editor>
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
    </div>
    @push('scripts')
        <script src="{{ asset('tadmin/assets/plugins/fileupload/fileupload.min.js') }}"></script>
        <script>
            $(".deleteRecord").click(function() {
                var id = $(this).data("id");
                var token = $("input[name='_token']").val();

                $.ajax({
                    url: "{{ url('') }}/admin/forum-galeri/" + id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function() {
                        console.log("it Works");
                    }
                });
                $(this).parent().parent().remove();
                toastr.success(
                    `Deleted Image`,
                    "Success", {
                        closeButton: !0,
                        tapToDismiss: !1,
                        progressBar: !0
                    }
                )
            });
        </script>
    @endpush
</x-app-layout>
