<x-app-layout>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Frequently Answer Question</h4>
                <h6>Ubah Data Frequently Answer Question</h6>
            </div>
        </div>
        <!-- /add -->
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('faq.update', $faq->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Urut</label>
                                <input class="form-control" name="urut" type="number" value="{{ $faq->urut }}">
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Question</label>
                                <input name="question" type="text" value="{{ $faq->question }}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Jawaban Menurut Agama</label>
                                <x-forms.tinymce-editor name="answer_religius">{{ $faq->answer_religius }}
                                </x-forms.tinymce-editor>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Jawaban Menurut Psikolog</label>
                                <x-forms.tinymce-editor name="answer_psikolog">{{ $faq->answer_psikolog }}
                                </x-forms.tinymce-editor>
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
    </div>
</x-app-layout>
