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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($emergency as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->users_id }}</td>
                                    <td>{{ $item->created_at->format('D, d M Y') }}</td>
                                    <td>{{ $item->catatan }}</td>
                                    <td>
                                        <a href="javascript:void(0);" class="product-img">
                                            <img src="{{ asset("storage/photo/$item->photo") }}" alt="product">
                                        </a>
                                    </td>
                                    <td>
                                        <img src="{{ asset('tadmin/assets/img/icons/edit.svg') }}"
                                        alt="img">
                                    <td>
                                        <a target="_blank" href="{{ $item->gmaps }}">{{ $item->gmaps }}</a>
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
