<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CKEditor 5</title>

    <style>
        /* 🔥 FONT + SIZE MẶC ĐỊNH */
        .ck-editor__editable {
            min-height: 300px;
            font-family: "Times New Roman", serif;
            font-size: 18px;
            line-height: 1.8;
        }

        .ck-content img {
            max-width: 100%;
            height: auto;
        }

        /* 🔥 style trích dẫn */
        .ck-content blockquote {
            border-left: 4px solid #ccc;
            padding-left: 15px;
            color: #555;
            font-style: italic;
            margin: 15px 0;
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
        'fontFamily',
        'fontSize',
        '|',
        'bold',
        'italic',
        '|',
        'blockQuote',
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

    // 🔥 FONT CHO CHỌN
    fontFamily: {
        options: [
            'default',
            'Arial, sans-serif',
            '"Times New Roman", serif',
            'Courier New, monospace',
            'Tahoma, sans-serif',
            'Verdana, sans-serif'
        ],
        supportAllValues: true
    },

    // 🔥 SIZE CHO CHỌN
    fontSize: {
        options: [
            12, 14, 16, 18, 20, 24, 28
        ],
        supportAllValues: true
    },

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

// 🔥 LƯU DATA
function submitForm() {
    document.getElementById('testt_content').value = editor.getData();
}
</script>

</body>
</html>