<x-app-layout>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Artikel Kluster 1</h4>
                <h6>Manajemen Artikel Kluster 1</h6>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('kluster.update', $kluster->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="next">Judul</label>
                            <input class="form-control" type="text" name="title" value="{{ $kluster->title }}">
                        </div>
                        <div class="form-group col-12">
                            <label for="next">Sub Judul</label>
                            <input class="form-control" type="text" name="subtitle" value="{{ $kluster->subtitle }}">
                        </div>
                        <div class="form-group col-12">
                            <label for="next">Logo</label>
                            <input class="form-control" type="file" name="logo">
                        </div>
                        <div class="form-group col-12">
                            <label for="next">Deskripsi</label>
                            <x-forms.tinymce-editor
                                name="description">{{ $kluster->description }}</x-forms.tinymce-editor>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                        </div>
                    </div>
                </form>

                <hr>
                <!-- /Filter -->
                <div class="col-lg-12">
                    <div class="table-top">
                        <div class="search-set">
                            <a href="{{ route('kluster.artikel.create', $kluster->id) }}" class="btn btn-success">Tambah
                                Artikel</a>
                        </div>
                        <div class="search-set">
                            <div class="search-input">
                                <a class="btn btn-searchset"><img
                                        src="{{ asset('tadmin/assets/img/icons/search-white.svg') }}"
                                        alt="img"></a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table datanew">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Jenis</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kluster->artikel ?? [] as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->jenis }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="me-3"
                                                    href="{{ route('kluster.artikel.edit', ['kluster' => $kluster->id, 'artikel' => $item->id]) }}">
                                                    <img src="{{ asset('tadmin/assets/img/icons/edit.svg') }}"
                                                        alt="img">
                                                </a>
                                                <a class='confirm-text' href='javascript:void(0);'
                                                    data-bs-toggle='modal' data-bs-target='#deleteModal'
                                                    data-id='{{ $item->id }}'
                                                    data-action='{{ route('kluster.artikel.destroy', ['kluster' => $kluster->id, 'artikel' => $item->id]) }}'
                                                    data-message='{{ $item->name }}'>
                                                    <img src="{{ asset('tadmin/assets/img/icons/delete.svg') }}"
                                                        alt="img">
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
