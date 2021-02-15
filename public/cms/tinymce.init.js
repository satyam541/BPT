var options = { selector:'textarea.editable',
height:300,
menubar: true,
plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code',
    'wordcount',
        
],
toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
relative_urls: false,
file_browser_callback: function(field_name, url, type, win) {
    // trigger file upload form
    if (type == 'image') $('#formUpload input').click();
},
file_picker_callback: function(callback, value, meta)
{
    if(meta.filetype == 'image')
    {
        $('#formUpload input').click();
    }
}
/**
 * in order to make similar preview 
 * both css file and class name must be specified
 */
//body_class:'content-style',
//content_css : '/cms/css/style.css',
};

tinymce.init(options);

function create_new_editable()
{
    // var ed = new tinymce.Editor(element, { selector: element }, tinymce.EditorManager);
    //     ed.render();
    
        tinymce.init(options);
}