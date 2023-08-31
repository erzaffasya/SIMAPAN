<x-app-layout>

    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>User</h4>
                <h6>Tambah Data User</h6>
            </div>
        </div>
        <!-- /add -->
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('user.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        {{-- <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control" name="role_id">
                                    <option value="">Pilih Role</option>
                                    @foreach ($role as $item)
                                        <option value="{{ $item->id }}">{{ $item->role }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control" name="role">
                                    <option disabled value="">Pilih Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="artikel">Artikel</option>
                                    <option value="forum">Forum Anak</option>
                                    <option value="edukasi">Edukasi Anak</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Username</label>
                                <input name="name" type="text">
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" type="text">
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Password</label>
                                <input name="password" type="password">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <a href="{{ route('user.index') }}" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /add -->
    </div>


</x-app-layout>
