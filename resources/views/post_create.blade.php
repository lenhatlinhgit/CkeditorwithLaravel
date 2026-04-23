<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CKEditor 5 - Create Post</title>

    <style>
        .ck-editor__editable {
            min-height: 300px;
        }
    </style>
</head>
<body>

<h2>Create Post with CKEditor</h2>

<form action="/post-store" method="POST" onsubmit="submitForm()">
    @csrf

    <input type="text" name="title" placeholder="Post Title" required style="width:100%; padding:10px; margin-bottom:10px;">

    <div id="editor">
        <p>Write your content here...</p>
    </div>

    <input type="hidden" name="content" id="content">

    <br><br>

    <button type="submit">Save Post</button>
</form>

<!-- CKEditor 5 CDN -->
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

<script>
let editor;

ClassicEditor.create(document.querySelector('#editor'), {
    toolbar: [
        'heading',
        'bold',
        'italic',
        'link',
        'bulletedList',
        'numberedList',
        'blockQuote',
        'imageUpload',
        'undo',
        'redo'
    ],
    simpleUpload: {
        uploadUrl: '/upload-image',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    }
})
.then(e => {
    editor = e;
})
.catch(error => {
    console.error(error);
});

// Save content to hidden input
function submitForm() {
    document.getElementById('content').value = editor.getData();
}
</script>

</body>
</html>