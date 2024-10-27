<x-app-layout>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Tentang</h4>
                <h6>Menambah Section Tentang</h6>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('tentang.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Video</label>
                                <input name="video" value="" type="text">
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" value="" type="text">
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Phone</label>
                                <input name="phone" value="" type="text">
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>WhatsApp</label>
                                <input name="whatsapp" value="" type="text">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Tentang</label>
                                <textarea name="tentang" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /product list -->
    </div>
</x-app-layout>
