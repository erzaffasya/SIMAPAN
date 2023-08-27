<x-app-layout>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Persentase Anak</h4>
                <h6>Tambah Data Persentase Anak</h6>
            </div>
        </div>
        <!-- /add -->
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('persentase-anak.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Tahun</label>
                                <input name="tahun" type="text" placeholder="2022" maxlength="4" min="1999"
                                    max="2200" minlength="4" required>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Jumlah Akta Kelahiran Anak</label>
                                <input name="akta_kelahiran" type="number" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Jumlah Kutipan Kartu Identitas</label>
                                <input name="kartu_identitas" type="number" class="form-control" required>
                            </div>
                        </div>



                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <a href="{{ route('persentase-anak.index') }}" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /add -->
    </div>


</x-app-layout>
