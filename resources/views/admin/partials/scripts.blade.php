    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('tadmin/assets/js/jquery-3.6.0.min.js') }}"></script>

    <!-- Feather Icon JS -->
    <script src="{{ asset('tadmin/assets/js/feather.min.js') }}"></script>

    <!-- Slimscroll JS -->
    <script src="{{ asset('tadmin/assets/js/jquery.slimscroll.min.js') }}"></script>

    <!-- Datatable JS -->
    <script src="{{ asset('tadmin/assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('tadmin/assets/js/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('tadmin/assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('tadmin/assets/js/script.js') }}"></script>

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3IzKovEv9pbMJ-pLfP9cO7nTSJXIDPDU&libraries=places&callback=initMap"
        async defer></script>
    @stack('scripts')
