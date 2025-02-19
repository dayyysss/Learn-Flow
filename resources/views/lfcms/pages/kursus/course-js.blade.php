@include('landing.components.tinymce.tinymce')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let babIndex = 0;

        // Pasang event listener pada tombol "Add Bab"
        document.querySelector('.add-bab-btn').addEventListener('click', function() {
            babIndex++;
            const babSection = document.createElement('div');
            babSection.classList.add('bab-item', 'rounded', 'bg-whiteColor');
            babSection.innerHTML = `
            <div class="bab-header bg-whiteColor rounded flex justify-between items-center cursor-pointer">
                <h3 class="bab-title">Bab ${babIndex + 1}</h3>
                <span class="toggle-icon">▼</span>
            </div>
            <div class="bab-content hidden">
                 <div class="mb-15px" >
                    <label class="mb-3 block font-semibold">Judul Bab</label>
                    <input type="text" name="bab[${babIndex}][name]" placeholder="Bab Name" class="form-control mb-3 w-full py-10px px-5 text-sm text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md" required>
                </div>

                <div class="modul-section">
                    <div class="modul-item border p-5 mb-3">
                        <div class="mb-15px">
                            <label class="mb-3 block font-semibold">Judul Modul</label>
                            <input type="text" name="bab[${babIndex}][moduls][0][name]" placeholder="Modul Name" class="form-control p-2 mb-3 w-full py-10px px-5 text-sm text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md" required>
                        </div>

                        <div class='grid grid-cols-1 xl:grid-cols-2 mb-15px gap-y-15px gap-x-30px'>
                            <div>
                                <label class="text-xs uppercase text-placeholder block font-semibold text-opacity-50 leading-1.8">Video Pembelajaran</label>
                                <input type="file" name="bab[${babIndex}][moduls][0][video]" accept="video/*" class="form-control mb-1 w-full py-5px px-2 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border -2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md" required>
                            </div>

                            <div>
                                <label class="text-xs uppercase text-placeholder block font-semibold text-opacity-50 leading-1.8">File Materi Pembelajaran</label>
                                <input type="file" name="bab[${babIndex}][moduls][0][file]" accept="image/*,application/pdf" class="form-control mb-1 w-full py-5px px-2 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border -2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md" required>
                            </div>
                        </div>

                        <div>
                            <label class="mb-3 block font-semibold">Materi</label>
                            <textarea id="materi" name="bab[${babIndex}][moduls][0][materi]" placeholder="Materi" class="form-control mt-2 w-full py-10px px-5 text-sm text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md" cols="30" rows="10" required></textarea>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary add-modul-btn mt-2">Add Modul</button>
                <button type="button" class="btn btn-danger remove-bab-btn mt-2">Remove Bab</button>
            </div>
        `;

            // Tambahkan bab baru di bagian paling bawah
            document.querySelector('.bab-section').appendChild(babSection);

            // Attach event listener untuk buka/tutup konten
            attachToggleContentHandler(babSection);

            // Attach event listener untuk tombol "Add Modul" pada bab baru
            attachModulHandler(babSection, babIndex);

            // Attach event listener untuk tombol "Remove Bab"
            attachRemoveBabHandler(babSection);
        });

        // Fungsi untuk menghandle buka/tutup konten bab
        function attachToggleContentHandler(babElement) {
            const babHeader = babElement.querySelector('.bab-header');
            const babContent = babElement.querySelector('.bab-content');
            const toggleIcon = babElement.querySelector('.toggle-icon');

            babHeader.addEventListener('click', function() {
                babContent.classList.toggle('hidden');
                babHeader.classList.toggle('open');
            });
        }

        // Fungsi untuk menghandle event tambah modul
        function attachModulHandler(babElement, babIndex) {
            let modulIndex = 0;

            babElement.querySelector('.add-modul-btn').addEventListener('click', function() {
                modulIndex++;
                const modulSection = babElement.querySelector('.modul-section');
                const modulItem = document.createElement('div');
                modulItem.classList.add('modul-item', 'border', 'p-5', 'mb-3');
                modulItem.innerHTML = `
                <div class="mb-15px relative">
    <div>
        <label class="mb-3 block font-semibold">Judul Modul</label>
        <input type="text" 
               name="bab[${babIndex}][moduls][${modulIndex}][name]" 
               placeholder="Modul Name" 
               class="form-control mb-3 w-full py-10px px-5 text-sm text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md" 
               required>
    </div>
    <button type="button" 
            class="btn btn-danger remove-modul-btn absolute top-0 right-0 mt-2 mr-2">&times;</button>
</div>

<div class="grid grid-cols-1 xl:grid-cols-2 mb-15px gap-y-15px gap-x-30px">
    <div>
        <label class="text-xs uppercase text-placeholder block font-semibold text-opacity-50 leading-1.8">Video Pembelajaran</label>
        <input type="file" 
               name="bab[${babIndex}][moduls][${modulIndex}][video]" 
               accept="video/*" 
               class="form-control mb-1 w-full py-5px px-2 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border -2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md" 
               required>
    </div>

    <div>
        <label class="text-xs uppercase text-placeholder block font-semibold text-opacity-50 leading-1.8">File Materi Pembelajaran</label>
        <input type="file" 
               name="bab[${babIndex}][moduls][${modulIndex}][file]" 
               accept="image/*,application/pdf" 
               class="form-control mb-3 w-full py-5px px-2 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border -2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md" 
               required>
    </div>
</div>

<div>
    <label class="mb-3 block font-semibold">Materi</label>
    <textarea name="bab[${babIndex}][moduls][${modulIndex}][materi]" 
              placeholder="Materi" id="materi"
              class="form-control mt-2 w-full py-10px px-5 text-sm text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md" 
              cols="30" rows="10" 
              required></textarea>
</div>

            `;

                modulSection.appendChild(modulItem);

                // Attach event listener untuk tombol "Remove Modul"
                attachRemoveModulHandler(modulItem);
            });
        }

        // Fungsi untuk menghandle event hapus modul
        function attachRemoveModulHandler(modulElement) {
            modulElement.querySelector('.remove-modul-btn').addEventListener('click', function() {
                modulElement.remove();
            });
        }

        // Fungsi untuk menghandle event hapus bab
        function attachRemoveBabHandler(babElement) {
            babElement.querySelector('.remove-bab-btn').addEventListener('click', function() {
                babElement.remove();
            });
        }

        // Attach event listener untuk modul pada form pertama
        attachModulHandler(document.querySelector('.bab-item'), 0);
        attachToggleContentHandler(document.querySelector('.bab-item'));
    });
</script>




<script>
    document.getElementById('name').addEventListener('input', function() {
        // Ambil nilai dari field name
        var name = this.value;

        // Buat slug dengan mengubah nama menjadi format slug
        var slug = name.toLowerCase()
            .replace(/[^\w\s-]/g, '') // Menghapus karakter selain huruf, angka, dan spasi
            .replace(/[\s_-]+/g, '-') // Mengganti spasi dan underscore dengan tanda minus
            .replace(/^-+|-+$/g, ''); // Menghapus tanda minus di awal dan akhir

        // Masukkan nilai slug ke dalam field slug
        document.getElementById('slug').value = slug;
    });
</script>

<script>
    function formatRupiah(angka) {
        var numberString = angka.replace(/[^,\d]/g, '').toString(),
            split = numberString.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] ? rupiah + ',' + split[1] : rupiah;
        return 'Rp ' + rupiah;
    }

    document.getElementById('harga').addEventListener('input', function() {
        this.value = formatRupiah(this.value);
    });
</script>

<script>
    function formatRupiah(angka) {
        var numberString = angka.replace(/[^,\d]/g, '').toString(),
            split = numberString.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] ? rupiah + ',' + split[1] : rupiah;
        return 'Rp ' + rupiah;
    }

    document.getElementById('harga_diskon').addEventListener('input', function() {
        this.value = formatRupiah(this.value);
    });
</script>

<script>
    // Script to add new signature input dynamically
    $(document).ready(function() {
        $('#add-signature-btn').click(function() {
            const newSignature = `
                <div class="signature-item mb-3 w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border -2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md relative">
                <input type="file" name="certificate_ttd[]" class="form-control " accept="image/*">
                <button type="button" class="btn ml-3 right-0 top-0 absolute text-red-500 text-xl remove-signature-btn mt-2">&times;</button>
            </div>

            `;
            $('#signature-section').append(newSignature);
        });

        // Script to remove signature input
        $(document).on('click', '.remove-signature-btn', function() {
            $(this).closest('.signature-item').remove();
        });
    });
</script>

<script>
    const radioButtons = document.querySelectorAll('input[name="berbayar"]');
    const hargaGroup = document.getElementById('harga-group');
    const hargaDiskonGroup = document.getElementById('harga-diskon-group');

    // Function to toggle price fields visibility
    function toggleHargaInput(event) {
        const isPaid = event.target.value === 'true';

        if (isPaid) {
            hargaGroup.style.display = 'block';
            hargaDiskonGroup.style.display = 'block';
        } else {
            hargaGroup.style.display = 'none';
            hargaDiskonGroup.style.display = 'none';
        }
    }

    // Add event listeners to both radio buttons
    radioButtons.forEach(radio => {
        radio.addEventListener('change', toggleHargaInput);
    });

    // Set initial state based on default selected radio
    const initialSelectedRadio = document.querySelector('input[name="berbayar"]:checked');
    if (initialSelectedRadio) {
        const event = {
            target: initialSelectedRadio
        };
        toggleHargaInput(event);
    }
</script>

<script>
    // Function to generate kode seri from course name
    document.getElementById('name').addEventListener('input', function() {
        var courseName = this.value;
        var words = courseName.split(' '); // Split the course name into words
        var kodeSeri = words.map(function(word) {
            return word.charAt(0).toUpperCase(); // Take the first letter of each word
        }).join(''); // Join the first letters to form the kode seri
        document.getElementById('kode_seri').value = kodeSeri; // Set the kode seri input value
    });
</script>

<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('thumbnailPreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block'; // Tampilkan gambar setelah di-load
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<style>
    .signature-item .remove-signature-btn {
        font-size: 20px;
        /* Ukuran font tombol */
        padding: 10px;
        /* Hilangkan padding default tombol */
        width: 30px;
        height: 30px;
        border: none;
        /* Menghilangkan border tombol */
        background-color: transparent;
        /* Tombol tanpa latar belakang */
        cursor: pointer;
        /* Menambahkan cursor pointer */
        margin-left: 20px;
    }

    .signature-item .remove-signature-btn:hover {
        color: #e74c3c;
        /* Warna merah yang lebih terang saat hover */
    }
</style>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const tagContainer = document.getElementById("tag-container");
    const tagInput = document.getElementById("tag-input");
    let tags = [];

    function addTag(tag) {
        tag = tag.trim();
        if (tag && !tags.includes(tag)) {
            tags.push(tag);
            renderTags();
        }
        tagInput.value = "";
    }

    function removeTag(index) {
        tags.splice(index, 1);
        renderTags();
    }

    function renderTags() {
        tagContainer.innerHTML = "";
        tags.forEach((tag, index) => {
            const tagElement = document.createElement("div");
            tagElement.className = "relative flex items-center bg-gray-200 text-black text-sm px-3 py-1 rounded-md";
            tagElement.innerHTML = `
                <button onclick="removeTag(${index})" class="absolute -top-3 -right-3 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs shadow-md">&times;</button>
                <span>${tag}</span>
                <input type="hidden" name="tags[]" value="${tag}">
            `;
            tagContainer.appendChild(tagElement);
        });
        tagContainer.appendChild(tagInput);
        tagInput.focus();
    }

    tagInput.addEventListener("keydown", function (event) {
        if (event.key === "Enter" || event.key === ",") {
            event.preventDefault();
            addTag(tagInput.value);
        } else if (event.key === "Backspace" && tagInput.value === "" && tags.length > 0) {
            event.preventDefault();
            removeTag(tags.length - 1);
        }
    });

    window.removeTag = removeTag;
});

</script>
