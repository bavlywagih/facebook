import './bootstrap';

  tinymce.init({
    selector: '#post-editor',
    plugins: ['link', 'anchor', 'wordcount', 'code', 'insertdatetime', 'table'],
    toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link'
  });


