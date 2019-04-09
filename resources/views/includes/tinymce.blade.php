<script src="https://cloud.tinymce.com/4/tinymce.min.js?apiKey=eii8m07pcbiyl4qni5xhrfkwexqx4x0p4b1qevz0lfwkw9pv"></script>
<script>
    var editor_config = {
        path_absolute : "/",
        selector: "textarea.content",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no"
            });
        }
    };

    tinymce.init(editor_config);
</script>
{{--
<script>
    tinymce.init({
        selector: 'textarea.content',
        height: 500,
        setup: function (editor) {
            editor.on('init change', function () {
                editor.save();
            });
        },
        plugins: 'print preview fullpage powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor insertdatetime advlist lists wordcount tinymcespellchecker a11ychecker imagetools textpattern help',
        toolbar: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css'
        ],
        image_title: true,
        automatic_uploads: false,
        paste_data_images: true,
        //images_upload_url: '/upload',
        relative_urls : false,
        images_upload_handler : (blobInfo,success,failure) => {
            let formData = new FormData();
            formData.append('file',blobInfo.blob(),blobInfo.filename());
            fetch('/upload',{
                method : 'POST',
                body : formData
            })
                .then(response => {
                    return response.json()
                })
                .then((json) => {
                    success(json.location)
                })
                .catch((err) =>  {
                    console.log(err);
                    failure('Error uploading file')
                })
        }
    });
</script>--}}
