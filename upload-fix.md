# Sửa lỗi upload file CKEditor trong Laravel

## Nguyên nhân lỗi

Trong view `resources/views/testt_create.blade.php`, CKEditor được cấu hình bằng:

```js
ckfinder: {
    uploadUrl: '/upload-image?_token={{ csrf_token() }}'
}
```

Nhưng:

- CKEditor 5 build `classic/ckeditor.js` không nhất thiết dùng adapter `ckfinder` để upload file.
- Với Laravel, upload Ajax cần gửi đúng header CSRF hoặc form data hợp lệ.
- Việc truyền token CSRF qua query string (`?_token=...`) thường không đủ với cấu hình upload của CKEditor 5.

Kết quả là file không được gửi đến controller đúng cách hoặc request bị từ chối do CSRF.

## Cách sửa

Thay bằng cấu hình `simpleUpload` và gửi token CSRF qua header:

```js
ClassicEditor.create(document.querySelector('#editor'), {
    toolbar: [ ... ],
    simpleUpload: {
        uploadUrl: '/upload-image',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    }
})
```

## Vì sao sửa như vậy?

- `simpleUpload` là adapter upload phù hợp với CKEditor 5 khi không sử dụng CKFinder.
- Laravel bảo vệ CSRF bằng header `X-CSRF-TOKEN` nên cần gửi token theo header này.
- Endpoint `/upload-image` vẫn giữ nguyên, controller `UploadController::upload()` đã xử lý đúng.

## Kết luận

Sửa cấu hình CKEditor trong `resources/views/testt_create.blade.php` sang `simpleUpload` và dùng header CSRF sẽ giải quyết lỗi upload.
