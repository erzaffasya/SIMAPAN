<x-app-layout>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Aspirasi</h4>
                <h6>Tambah Data Aspirasi</h6>
            </div>
        </div>
        <!-- /add -->
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('aspirasi.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Nama</label>
                                <input name="nama" type="text">
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" type="email">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Aspirasi</label>
                                <x-forms.tinymce-editor name="aspirasi" />
                            </div>
                        </div>



                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <a href="{{ route('aspirasi.index') }}" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /add -->
    </div>


</x-app-layout>
