<x-app-layout>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Aspirasi</h4>
                <h6>Ubah Data Aspirasi</h6>
            </div>
        </div>
        <!-- /add -->
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('kategori-artikel.update', $aspirasi->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Nama</label>
                                <input name="nama" type="text" value="{{ $aspirasi->nama }}">
                            </div>
                        </div>

                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" type="email"
                                    value="{{ $aspirasi->email }}">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Aspirasi</label>
                                <x-forms.tinymce-editor name="aspirasi">{{ $aspirasi->aspirasi }}
                                </x-forms.tinymce-editor>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <a href="{{ route('kategori-artikel.index') }}" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
