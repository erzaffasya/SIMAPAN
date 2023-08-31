<x-app-layout>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Data Sekolah Ramah Anak</h4>
                <h6>Manajemen Data Sekolah Ramah Anak</h6>
            </div>
            <div class="page-btn">
                <a href="{{ route('sekolah-ramah-anak.create') }}" class="btn btn-added"><img
                        src="{{ asset('tadmin/assets/img/icons/plus.svg') }}" alt="img">Tambah Sekolah Ramah Anak</a>
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
                                <th>TK/RA/PAUD</th>
                                <th>SD/MI</th>
                                <th>SMP/MTS</th>
                                <th>SMA/SMK/MA</th>
                                <th>SLB</th>
                                <th>Aktif</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sekolah_ramah_anak as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->tahun }}</td>
                                    <td>{{ $item->paud }}</td>
                                    <td>{{ $item->sd }}</td>
                                    <td>{{ $item->smp }}</td>
                                    <td>{{ $item->slta }}</td>
                                    <td>{{ $item->slb }}</td>
                                    <td>{{ $item->isaktif ? 'Aktif' : 'Tidak' }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="me-3" href="{{ route('sekolah-ramah-anak.edit', $item->id) }}">
                                                <img src="{{ asset('tadmin/assets/img/icons/edit.svg') }}"
                                                    alt="img">
                                            </a>
                                            <a class='confirm-text' href='javascript:void(0);' data-bs-toggle='modal'
                                                data-bs-target='#deleteModal' data-id='{{ $item->id }}'
                                                data-action='{{ route('sekolah-ramah-anak.destroy', $item->id) }}'
                                                data-message='{{ $item->tahun }}'>
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
