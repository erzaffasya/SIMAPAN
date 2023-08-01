<x-app-layout>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Frequently Answer Question</h4>
                <h6>Tambah Data Frequently Answer Question</h6>
            </div>
        </div>
        <!-- /add -->
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('faq.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Urut</label>
                                <input class="form-control" name="urut" type="number">
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Question</label>
                                <input name="question" type="text">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Jawaban Menurut Agama</label>
                                <x-forms.tinymce-editor name="answer_religius" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Jawaban Menurut Psikolog</label>
                                <x-forms.tinymce-editor name="answer_psikolog" />
                            </div>
                        </div>



                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <a href="{{ route('faq.index') }}" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /add -->
    </div>


</x-app-layout>
