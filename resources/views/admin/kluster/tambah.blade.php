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
                <h4>Artikel Kluster {{ $kluster->kluster }}</h4>
                <h6>Tambah Data Artikel Kluster {{ $kluster->kluster }}</h6>
            </div>
        </div>
        <!-- /add -->
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('kluster.artikel.store', $kluster->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Judul</label>
                                <input name="title" type="text">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Sub Judul</label>
                                <input name="subtitle" type="text">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <x-forms.tinymce-editor name="description"></x-forms.tinymce-editor>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Jenis</label>
                                <select name="jenis" class="form-control">
                                    <option value="A">Artikel</option>
                                    <option value="B">Foto</option>
                                    <option value="C">text</option>
                                </select>
                            </div>
                        </div>
                        {{-- Show If Jenis Artikel --}}
                        <div class="col-lg-12 col-sm-12 col-12 jenis-artikel">
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
                                                    name='detail_a_foto[]' multiple>
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>

                                            <div class="custom-file-container__image-preview custom-file-container__image-preview--active"
                                                style="background-image: url(&quot;&quot;);"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Show If Jenis Foto --}}
                        <div class="col-lg-12 col-sm-12 col-12 jenis-foto">
                            <div class="form-group">
                                <div class="card">
                                    <div class="card-body row">
                                        <div class="col-4">
                                            <input type="file" name="detail_b_foto[0]">
                                            <input type="text" name="detail_b_title[0]" placeholder="Judul">
                                            <input type="text" name="detail_b_subtitle[0]" placeholder="Sub Judul">
                                        </div>
                                        <div class="col-4">
                                            <input type="file" name="detail_b_foto[1]">
                                            <input type="text" name="detail_b_title[1]" placeholder="Judul">
                                            <input type="text" name="detail_b_subtitle[1]" placeholder="Sub Judul">
                                        </div>
                                        <div class="col-4">
                                            <input type="file" name="detail_b_foto[2]">
                                            <input type="text" name="detail_b_title[2]" placeholder="Judul">
                                            <input type="text" name="detail_b_subtitle[2]" placeholder="Sub Judul">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Show If Jenis text --}}
                        <div class="col-lg-12 col-sm-12 col-12 jenis-text">
                            <div class="form-group isi">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-11">
                                                <div class="form-group">
                                                    <label>Judul</label>
                                                    <input name="detail_c_title[]" type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-1">
                                                <br>
                                                <button type="button" class="btn btn-outline-secondary">New
                                                    Field</button>
                                            </div>
                                            <div class="col-lg-11">
                                                <div class="form-group">
                                                    <label>Deskripsi</label>
                                                    <textarea class="form-control" rows="3" name="detail_c_subtitle[]"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <a href="{{ route('kluster.edit', $kluster->id) }}" class="btn btn-cancel">Cancel</a>
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
        <script>
            $(document).ready(function() {
                // Ambil elemen select jenis
                var jenisSelect = $("select[name='jenis']");

                // Ambil elemen-elemen yang ingin Anda tampilkan/sembunyikan
                var jenisArtikelDiv = $(".jenis-artikel");
                var jenisFotoDiv = $(".jenis-foto");
                var jenisTextDiv = $(".jenis-text");

                // Sembunyikan elemen-elemen awal saat halaman dimuat
                jenisArtikelDiv.show();
                jenisFotoDiv.hide();
                jenisTextDiv.hide();

                // Tambahkan event listener untuk mengubah tampilan saat jenis berubah
                jenisSelect.on("change", function() {
                    var selectedOption = jenisSelect.val();

                    // Sembunyikan semua elemen terlebih dahulu
                    jenisArtikelDiv.hide();
                    jenisFotoDiv.hide();
                    jenisTextDiv.hide();

                    // Tampilkan elemen yang sesuai berdasarkan pilihan
                    if (selectedOption === "A") { // Jenis Artikel
                        jenisArtikelDiv.show();
                    } else if (selectedOption === "B") { // Jenis Foto
                        jenisFotoDiv.show();
                    } else if (selectedOption === "C") { // Jenis Text
                        jenisTextDiv.show();
                    }
                    // Anda bisa menambahkan kondisi lain sesuai dengan jenis yang Anda miliki
                });


                // Tambahkan event listener untuk menambah input field pada jenis Text
                jenisTextDiv.on("click", ".btn-outline-secondary", function() {
                    var newField = $(`<div class="form-group isi">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-11">
                                                <div class="form-group">
                                                    <label>Judul</label>
                                                    <input name="detail_c_title[]" type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-1">
                                                <br>
                                                <button type="button" class="btn btn-outline-danger">remove</button>
                                            </div>
                                            <div class="col-lg-11">
                                                <div class="form-group">
                                                    <label>Deskripsi</label>
                                                    <textarea class="form-control" rows="3" name="detail_c_subtitle[]"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`); // New elemen input

                    // Bersihkan nilai input
                    // newField.find("input[type='text']").val("");
                    // newField.find("textarea").val("");

                    // Tambahkan elemen baru ke dalam div
                    jenisTextDiv.append(newField);

                    // Tambahkan event listener untuk menghapus input field pada jenis Text
                    jenisTextDiv.on("click", ".btn-outline-danger", function() {
                        console.log(($(this)));
                        $(this).closest(".form-group.isi")
                            .remove(); // Hapus elemen yang mengandung tombol "Hapus"
                    });
                    jenisTextDiv = $(".jenis-text");
                    // jenisTextDiv.find(".col-lg-1").empty();
                    // var btnRemoveText = $(
                    //     '<button type="button" class="btn btn-outline-danger">remove</button>')
                    // jenisTextDiv.find(".col-lg-1").append(btnRemoveText);

                    // console.log(btnRemoveText);


                });
            });
        </script>
    @endpush
</x-app-layout>
