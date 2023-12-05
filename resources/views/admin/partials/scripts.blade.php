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

    <!-- Mask JS -->
    <script src="{{ asset('tadmin/assets/plugins/toastr/toastr.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('tadmin/assets/js/script.js') }}"></script>

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZi50l6nIdg0PwgoDK04LjyDQVCGTDuTo&libraries=places&callback=initMap"
        async defer></script>

    <script>
        @if (session()->has('success'))
            toastr.success(
                "{{ session('success') }}",
                "Success", {
                    closeButton: !0,
                    tapToDismiss: !1,
                    progressBar: !0
                }
            )
        @elseif (session()->has('info'))
            toastr.info(
                "{{ session('info') }}",
                "Info", {
                    closeButton: !0,
                    tapToDismiss: !1,
                    progressBar: !0
                }
            )
        @elseif (session()->has('warning'))
            toastr.warning(
                "{{ session('warning') }}",
                "Warning", {
                    closeButton: !0,
                    tapToDismiss: !1,
                    progressBar: !0
                }
            )
        @elseif (session()->has('error'))
            toastr.error(
                "{{ session('error') }}",
                "Error", {
                    closeButton: !0,
                    tapToDismiss: !1,
                    progressBar: !0
                }
            )
        @elseif ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error(
                    "{{ $error }}",
                    "Error", {
                        showMethod: "slideDown",
                        hideMethod: "slideUp",
                        timeOut: 5e3,
                        closeButton: !0,
                        tapToDismiss: !0,
                        progressBar: !0
                    }
                )
            @endforeach
        @endif
    </script>
    @stack('scripts')
