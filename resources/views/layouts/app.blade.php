<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.partials.head')
    <x-head.tinymce-config />
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
                {{ $slot }}
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5>Are you sure you want to delete data <span class="text-primary" id="message"></span></h5>
                    </div>
                    @csrf
                    @method('DELETE')
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @include('admin.partials.scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('#deleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var message = button.data('message');
            var action = button.data('action');
            var modal = $(this)
            modal.find('form').attr('action', action);
            modal.find('#message').html(message);
        });
        // $(document).ready(function() {
        //     $('select[multiple="multiple"]').select2();
        // });
    </script>
</body>

</html>
