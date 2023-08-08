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
                                <th>Catatan</th>
                                <th>Gmaps</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($emergency as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->users_id }}</td>
                                    <td>{{ $item->catatan }}</td>
                                    <td>
                                        <a href="{{ $item->gmaps }}">{{ $item->gmaps }}</a>
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
