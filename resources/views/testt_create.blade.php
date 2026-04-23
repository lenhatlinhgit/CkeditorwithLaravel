<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CKEditor 5</title>

    <style>
        .ck-editor__editable {
            min-height: 300px;
        }

        .ck-content img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>

<h2>TESTT CREATE (CKEditor)</h2>

<form action="/testt-store" method="POST" onsubmit="submitForm()">
    @csrf

    <input type="text" name="testt_title" placeholder="title" style="width:100%; padding:10px;">

    <br><br>

    <div id="editor">
        <p>write here...</p>
    </div>

    <input type="hidden" name="testt_content" id="testt_content">

    <br>

    <button type="submit">SAVE</button>
</form>

<!-- CKEditor 5 CDN -->
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

<script>
let editor;

ClassicEditor.create(document.querySelector('#editor'), {
    toolbar: [
        'bold',
        'italic',
        '|',
        'link',
        '|',
        'bulletedList',
        'numberedList',
        '|',
        'imageUpload',
        '|',
        'undo',
        'redo'
    ],

    ckfinder: {
        uploadUrl: '/upload-image?_token={{ csrf_token() }}'
    }
})
.then(e => {
    editor = e;
})
.catch(error => {
    console.error(error);
});

// 🔥 QUAN TRỌNG: gán dữ liệu vào form
function submitForm() {
    document.getElementById('testt_content').value = editor.getData();
}
</script>

</body>
</html>