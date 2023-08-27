<x-app-layout>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Data Persentase anak</h4>
                <h6>Manajemen Data Persentase anak</h6>
            </div>
            <div class="page-btn">
                <a href="{{ route('persentase-anak.create') }}" class="btn btn-added"><img
                        src="{{ asset('tadmin/assets/img/icons/plus.svg') }}" alt="img">Tambah Persentase anak</a>
            </div>
        </div>
        <!-- /product list -->
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
                                <th>Tahun</th>
                                <th>Kutipan Akta Kelahiran</th>
                                <th>Kartu Identitad Anak</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($persentase_anak as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->tahun }}</td>
                                    <td>{{ $item->akta_kelahiran }}</td>
                                    <td>{{ $item->kartu_identitas }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="me-3" href="{{ route('persentase-anak.edit', $item->id) }}">
                                                <img src="{{ asset('tadmin/assets/img/icons/edit.svg') }}"
                                                    alt="img">
                                            </a>
                                            <a class='confirm-text' href='javascript:void(0);' data-bs-toggle='modal'
                                                data-bs-target='#deleteModal' data-id='{{ $item->id }}'
                                                data-action='{{ route('persentase-anak.destroy', $item->id) }}'
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
        <!-- /product list -->
    </div>
</x-app-layout>
