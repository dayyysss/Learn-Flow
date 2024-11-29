<script src="{{ asset('tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    tinymce.init({
        selector: 'textarea#materi, textarea#deskripsi',  // pastikan selector sesuai dengan ID yang benar
        height: 500,
        menubar: true,
        plugins: [
            'accordion', 'advlist', 'anchor', 'autolink', 'autoresize', 'autosave',
            'code', 'codesample', 'emoticons', 'lists', 'link', 'image', 'charmap',
            'preview', 'searchreplace', 'visualblocks', 'fullscreen', 'insertdatetime',
            'media', 'table', 'help', 'wordcount', 'pagebreak', 'save', 'directionality',
        ],
        toolbar: 'undo redo | formatselect | bold italic underline strikethrough | \
                  forecolor backcolor | alignleft aligncenter alignright alignjustify | \
                  bullist numlist outdent indent | link image media table | \
                  hr pagebreak | removeformat | fullscreen code | preview save',
        toolbar_mode: 'sliding',
        relative_urls: false,
        promotion: false,   
        branding: false,   
        setup: function (editor) {
            editor.on('change', function () {
                tinymce.triggerSave(); // Simpan setiap kali ada perubahan
            });
        }
    });

    // Inisialisasi kembali TinyMCE setelah menambahkan bab atau modul baru
    function reinitializeTinyMCE() {
        tinymce.init({
            selector: 'textarea#materi, textarea#deskripsi, textarea#deskripsiBio',  // selector untuk textarea baru
            height: 500,
            menubar: true,
            plugins: [
                'accordion', 'advlist', 'anchor', 'autolink', 'autoresize', 'autosave',
                'code', 'codesample', 'emoticons', 'lists', 'link', 'image', 'charmap',
                'preview', 'searchreplace', 'visualblocks', 'fullscreen', 'insertdatetime',
                'media', 'table', 'help', 'wordcount', 'pagebreak', 'save', 'directionality',
            ],
            toolbar: 'undo redo | formatselect | bold italic underline strikethrough | \
                      forecolor backcolor | alignleft aligncenter alignright alignjustify | \
                      bullist numlist outdent indent | link image media table | \
                      hr pagebreak | removeformat | fullscreen code | preview save',
            toolbar_mode: 'sliding',
            relative_urls: false,
            promotion: false,   
            branding: false,   
            setup: function (editor) {
                editor.on('change', function () {
                    tinymce.triggerSave();
                });
            }
        });
    }

    // Panggil reinitializeTinyMCE setelah menambahkan bab atau modul baru
    document.querySelector('.add-bab-btn').addEventListener('click', function () {
        // Tambahkan bab baru ke dalam DOM
        // Setelah menambah bab baru, inisialisasi TinyMCE kembali
        reinitializeTinyMCE();
    });
});





</script>
