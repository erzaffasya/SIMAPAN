<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.partials.head')
</head>

<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>
    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        @include('admin.partials.header')
        <!-- Header -->

        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            @include('admin.partials.sidebar')
        </div>
        <!-- /Sidebar -->

        <div class="page-wrapper cardhead">
            <div class="content container-fluid">
                {{$slot}}
            </div>
        </div>
    </div>

    @include('admin.partials.scripts')
</body>

</html>
