<!-- I begin to speak only when I am certain what I will say is not better left unsaid. - Cato the Younger -->
<script src="{{ asset('tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#tinyeditor',

        image_class_list: [{
            title: 'img-responsive',
            value: 'img-responsive'
        }, ],
        height: 500,
        setup: function(editor) {
            editor.on('init change', function() {
                editor.save();
            });
        },
        // plugins: [
        //     "advlist autolink lists link image charmap print preview anchor",
        //     "searchreplace visualblocks code fullscreen",
        //     "insertdatetime media table contextmenu paste imagetools"
        // ],
        plugins: 'image autolink link advlist lists charmap fullscreen imagetools searchreplace visualblocks code',
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image |fullscreen",

        // toolbar: 'image',
        image_caption: true,
        a11y_advanced_options: true,
        image_title: true,
        automatic_uploads: true,
        images_upload_url: '/admin/tiny-upload',
        file_picker_types: 'image',
        file_picker_callback: function(cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function() {
                var file = this.files[0];

                var reader = new FileReader();
                reader.readAsDataURL(file);
                var token = '{{ csrf_token() }}';
                render.setRequestHeader("X-CSRF-Token", token);
                reader.onload = function() {
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), {
                        title: file.name
                    });
                };
            };
            input.click();
        }
    });
    // tinymce.init({
    //     selector: 'textarea#tinyeditor', // Replace this CSS selector to match the placeholder element for TinyMCE
    //     plugins: 'code table lists',
    //     toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
    // });
</script>
