<x-app-layout>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Jumlah Anak</h4>
                <h6>Manajemen Jumlah Anak</h6>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('jumlahanak.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Perempuan</label>
                                <input name="perempuan" value="{{ $tentang->perempuan ?? '' }}" type="text">
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Laki-laki</label>
                                <input name="laki_laki" value="{{ $tentang->{'laki-laki'} ?? '' }}" type="text">
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
