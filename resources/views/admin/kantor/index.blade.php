<x-app-layout>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Data Kantor</h4>
                <h6>Manajemen Data Kantor</h6>
            </div>
            <div class="page-btn">
                <a href="{{ route('Kantor.create') }}" class="btn btn-added"><img src="tadmin/assets/img/icons/plus.svg"
                        alt="img">Tambah Kantor</a>
            </div>
        </div>
        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                <div class="table-top">
                    <div class="search-set">
                        <div class="search-input">
                            <a class="btn btn-searchset"><img src="tadmin/assets/img/icons/search-white.svg"
                                    alt="img"></a>
                        </div>
                    </div>
                </div>
                <!-- /Filter -->
                <div class="table-responsive">
                    <table class="table  datanew">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kantor</th>
                                <th>Foto</th>
                                <th>Deskripsi</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Link Map</th>
                                <th>Deskripsi Map</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Kantor as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->kantor}}</td>
                                <td>
                                    <a href="javascript:void(0);" class="product-img">
                                        <img src="{{asset($item->foto)}}" alt="product">
                                    </a>
                                </td>
                                <td>{!!$item->deskripsi!!}</td>
                                <td>{{$item->latitude}}</td>
                                <td>{{$item->longitude}}</td>
                                <td>{{$item->link_map}}</td>
                                <td>{!!$item->deskripsi_map!!}</td>
                                <td>

                                    <a class="me-3" href="{{route('Kantor.edit',$item->id)}}">
                                        <img src="tadmin/assets/img/icons/edit.svg" alt="img">
                                    </a>
                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                        <img src="tadmin/assets/img/icons/delete.svg" alt="img">
                                    </a>
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
