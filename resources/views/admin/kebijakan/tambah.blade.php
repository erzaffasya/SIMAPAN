<x-app-layout>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Kebijakan</h4>
                <h6>Tambah Data Kebijakan</h6>
            </div>
        </div>
        <!-- /add -->
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('kebijakan.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Judul</label>
                                <input name="judul" type="text">
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12 col-sm-12 col-12" id="fileInputs">
                            <div class="row file-input">
                                <div class="col-md-8">
                                    <label>Nama File</label>
                                    <input type="text" class="form-control" name="judul_detail[]"
                                        placeholder="File Title" title="File Title">
                                </div>
                                <div class="col-md-3">
                                    <label>File (*.pdf)</label>
                                    <input type="file" class="form-control" name="file_detail[]" accept=".pdf"
                                        title="PDF File">
                                </div>

                                <div class="col-md-1">
                                    <label>#</label>
                                    <button type="button" class="btn btn-success form-control"
                                        id="addFileInput">Add</button>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-12 mt-3">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <a href="{{ route('kebijakan.index') }}" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /add -->
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $("#addFileInput").click(function() {
                    var newFileInput = `
                            <div class="row file-input">
                                <div class="col-md-8">
                                    <label>Nama File</label>
                                    <input type="text" class="form-control" name="judul_detail[]" placeholder="File Title"
                                        title="File Title">
                                </div>
                                <div class="col-md-3">
                                    <label>File (*.pdf)</label>
                                    <input type="file" class="form-control" name="file_detail[]" accept=".pdf"
                                    title="PDF File">
                                </div>
                                <div class="col-md-1">
                                    <label>#</label>
                                    <button type="button" class="btn btn-danger btn-remove form-control">Remove</button>
                                </div>
                            </div>
            `;
                    $("#fileInputs").append(newFileInput);
                });
            });
            $(document).on('click', '.btn-remove', function() {
                $(this).closest('.file-input').remove();
            });
        </script>
    @endpush


</x-app-layout>
