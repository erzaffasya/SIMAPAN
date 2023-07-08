<div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
        <ul>
            <li >
                <a href="index.html" ><img src="{{asset('tadmin/assets/img/icons/dashboard.svg')}}" alt="img"><span> Dashboard</span> </a>
            </li>
            <li class="submenu">
                <a href="javascript:void(0);"><img src="{{asset('tadmin/assets/img/icons/product.svg')}}" alt="img"><span> Product</span> <span class="menu-arrow"></span></a>
                <ul>
                    <li><a href="productlist.html">Product List</a></li>
                </ul>
            </li>
            <li  class="submenu">
                <a href="javascript:void(0);"><i data-feather="columns"></i> <span> Kantor  </span> <span class="menu-arrow"></span></a>
                <ul >
                    <li><a href="{{route('Kantor.create')}}" class="active">Tambah </a></li>
                    <li><a href="form-basic-inputs.html" class="">Basic Inputs </a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>