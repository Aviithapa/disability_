<link href="{{asset('jquery-file-upload/css/jquery.fileupload-ui.min.css')}}" rel="stylesheet" type="text/css"/>
<script src="{{asset('jquery-file-upload/js/vendor/jquery.ui.widget.js')}}" type="text/javascript"></script>
<script src="{{asset('jquery-file-upload/js/jquery.iframe-transport.js')}}" type="text/javascript"></script>
<script src="{{asset('jquery-file-upload/js/jquery.fileupload.js')}}" type="text/javascript"></script>
<script>
    $('.dropify').dropify();

    function anyFileUploader(id){
        const inputFile = $('input[name$="'+id+'_image"]');
        const imgElement = $('#'+id+'_img');
        const progressBar = $('#'+ id +'_progress');
        const helpTextElement = $('#'+id+'_help_text');

        inputFile.fileupload({
            url: '{{ url('save_image') }}' + '/' + id,
            done: function(e, data) {
                const imageUrl = data.files[0].type === "application/pdf"
                    ? 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/391px-PDF_file_icon.svg.png'
                    : data.result.full_url;

                imgElement.attr('src', imageUrl);
                $('#'+id+'_path').val(data.result.image_name);
                progressBar.parent().removeClass('progress-striped');
                helpTextElement.text(data.files[0].type === "application/pdf" ? "Pdf Upload Successfully" : 'Image Upload Successfully');
            },
            error: function(e, data) {
                helpTextElement.text(eval('e.responseJSON.'+id+'_image')[0]);
                progressBar.css('width','0%');
                console.log(e.responseText);
            },
            progress: function(e, data) {
                const progress = parseInt(data.loaded / data.total * 100, 10);
                progressBar.css('width', progress + '%');
            }
        });
    }

</script>
