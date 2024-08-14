
//fungsi preview gambar//
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function () {
        const imgPreview = document.getElementById('img-preview');
        imgPreview.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}

document.querySelector('#file_image').addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            document.querySelector('#img-preview').src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
});
