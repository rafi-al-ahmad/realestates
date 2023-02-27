<script src="{{ url('dashboard/assets/js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea.tinymce', // Replace this CSS selector to match the placeholder element for TinyMCE
        a_plugin_option: true,
        promotion: false,
        a_configuration_option: 400,
        plugins: "media image code preview searchreplace importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen  link  codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount  charmap quickbars",
        toolbar: "undo redo | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist table | media image link | forecolor backcolor removeformat charmap | fullscreen preview print searchreplace code | ltr rtl | gallerySelector",
        menubar: "",

        // image_title: true,
        automatic_uploads: true,
        images_upload_url: "{{route('tinymce.upload')}}",
        file_picker_types: 'image',
        file_picker_callback: function(cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function() {
                var file = this.files[0];

                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function() {
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), {
                        title: file.name,
                    });
                };
            };
            input.click();
        },

        toolbar_sticky: true,
        autosave_ask_before_unload: true,

        height: 500,
        quickbars_selection_toolbar: "bold italic | quicklink h2 h3 blockquote",
        toolbar_mode: "fixed",
        contextmenu: "table",
        setup: function(editor) {
            editor.on("keydown", function(e) {
                if ((e.keyCode == 8 || e.keyCode == 46) && tinymce.activeEditor.selection) {
                    var selectedNode = tinymce.activeEditor.selection.getNode();
                    console.log(selectedNode);
                    if (selectedNode && selectedNode.nodeName == 'IMG') {
                        var imageSrc = selectedNode.src;

                        //delete image on server
                        var xhr, formData;
                        xhr = new XMLHttpRequest();
                        xhr.withCredentials = false;
                        xhr.open('POST', "{{route('tinymce.delete')}}");
                        xhr.setRequestHeader("X-CSRF-Token", "{{ csrf_token() }}");
                        formData = new FormData();
                        formData.append('path', imageSrc);
                        xhr.send(formData);
                    }

                }
            });
        }
    });
</script>
