<x-app-layout>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Fast Link</h4>
                <h6>Ubah Data Fast Link</h6>
            </div>
        </div>
        <!-- /add -->
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('fastlink.update', $fastlink->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Judul</label>
                                <input name="judul" value="{{ $fastlink->judul }}" type="text" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Lnik</label>
                                <input name="link" value="{{ $fastlink->link }}" type="text" required>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <a href="{{ route('fastlink.index') }}" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
