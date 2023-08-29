<x-app-layout>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Artikel Kluster 5</h4>
                <h6>Manajemen Artikel Kluster 5</h6>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-top">
                    <div class="search-set">
                        <div class="search-input">
                            <a class="btn btn-searchset"><img
                                    src="{{ asset('tadmin/assets/img/icons/search-white.svg') }}" alt="img"></a>
                        </div>
                    </div>
                </div>
                <!-- /Filter -->
                <div class="table-responsive">
                    <table class="table datanew">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kluster5 as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="me-3" href="{{ route('kluster5.edit', $item->id) }}">
                                                <img src="{{ asset('tadmin/assets/img/icons/edit.svg') }}"
                                                    alt="img">
                                            </a>
                                            <a class='confirm-text' href='javascript:void(0);' data-bs-toggle='modal'
                                                data-bs-target='#deleteModal' data-id='{{ $item->id }}'
                                                data-action='{{ route('kluster5.destroy', $item->id) }}'
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
</x-app-layout>
