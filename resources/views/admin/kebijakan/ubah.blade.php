<x-app-layout>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Kebijakan</h4>
                <h6>Ubah Data Kebijakan</h6>
            </div>
        </div>
        <!-- /add -->
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('kebijakan.update', $kebijakan->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Judul</label>
                                <input name="judul" type="text" value="{{ $kebijakan->judul }}">
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" rows="3">{{ $kebijakan->deskripsi }}</textarea>
                            </div>
                        </div>
                        @forelse ($kebijakan->detail as $item)
                            <div class="col-lg-12 col-sm-12 col-12" id="fileInputs">
                                <div class="row file-input">
                                    <div class="col-md-8">
                                        <label>Nama File</label>
                                        <input type="hidden" name="id[]" value="{{ $item->id }}">
                                        <input type="text" class="form-control" name="judul_detail[]"
                                            placeholder="File Title" title="File Title" value="{{ $item->judul }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label>File (*.pdf)</label>
                                        <input type="file" class="form-control" name="file_detail[]" accept=".pdf"
                                            title="PDF File">
                                    </div>

                                    <div class="col-md-1">
                                        <label>#</label>
                                        @if ($loop->first)
                                            <button type="button" class="btn btn-success form-control"
                                                id="addFileInput">Add</button>
                                        @else
                                            <button class='btn btn-danger form-control' type="button"
                                                data-bs-toggle='modal' data-bs-target='#deleteModal'
                                                data-id='{{ $item->id }}'
                                                data-action='{{ route('kebijakan-detail.destroy', $item->id) }}'
                                                data-message='{{ $item->judul }}'>Remove
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
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
                        @endforelse

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
