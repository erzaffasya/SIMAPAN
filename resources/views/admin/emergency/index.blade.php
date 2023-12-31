<x-app-layout>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Emergency</h4>
                <h6>Manajemen Emergency</h6>
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
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Catatan</th>
                                <th>Foto</th>
                                <th>Gmaps</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($emergency as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->created_at->format('D, d M Y') }}</td>
                                    <td>{{ $item->catatan }}</td>
                                    <td>
                                        <a href="javascript:void(0);" class="product-img">
                                            <img src="{{ asset("$item->photo") }}" alt="product">
                                        </a>
                                    </td>
                                   <td>
                                        <a target="_blank" href="{{ $item->gmaps }}">{{ $item->gmaps }}</a>
                                    </td>
                                    <td>
                                      
                                        <a class='confirm-text' href='javascript:void(0);' data-bs-toggle='modal'
                                        data-bs-target='#deleteModal' data-id='{{ $item->id }}'
                                        data-action='{{ route('emergency.destroy', $item->id) }}'
                                        data-message='{{ $item->name }}'>
                                        <img src="{{ asset('tadmin/assets/img/icons/delete.svg') }}"
                                            alt="img">
                                    </a>
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
