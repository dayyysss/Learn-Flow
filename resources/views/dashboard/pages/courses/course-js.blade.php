<script>
    document.addEventListener('DOMContentLoaded', function () {
        let babIndex = 0;

        // Tambah Bab baru
        document.querySelector('.add-bab-btn').addEventListener('click', function () {
            babIndex++;
            const babSection = document.createElement('div');
            babSection.classList.add('bab-item');
            babSection.innerHTML = `
                <h3>Bab ${babIndex + 1}</h3>
                <input type="text" name="bab[${babIndex}][name]" placeholder="Bab Name"  class="form-control mt-3">
                <div class="modul-section">
                    <div class="modul-item">
                        <input type="text" name="bab[${babIndex}][moduls][0][name]" placeholder="Modul Name"  class="form-control mt-2">
                        <input type="file" name="bab[${babIndex}][moduls][0][video]" accept="video/*" class="form-control mt-2">
                        <input type="file" name="bab[${babIndex}][moduls][0][file]" accept="image/*,application/pdf" class="form-control mt-2">
                        <textarea name="bab[${babIndex}][moduls][0][materi]" placeholder="Materi" class="form-control mt-2"></textarea>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary add-modul-btn mt-2">Add Modul</button>
                <button type="button" class="btn btn-danger remove-bab-btn mt-2">Remove Bab</button>
            `;
            
            // Tambahkan bab baru ke dalam form
            document.querySelector('.bab-section').appendChild(babSection);

            // Attach event listener untuk tombol "Add Modul"
            attachModulHandler(babSection, babIndex);
            
            // Attach event listener untuk tombol "Remove Bab"
            attachRemoveBabHandler(babSection);
        });

        // Fungsi untuk menghandle event tambah modul
        function attachModulHandler(babElement, babIndex) {
            let modulIndex = 0;

            babElement.querySelector('.add-modul-btn').addEventListener('click', function () {
                modulIndex++;
                const modulSection = babElement.querySelector('.modul-section');
                const modulItem = document.createElement('div');
                modulItem.classList.add('modul-item');
                modulItem.innerHTML = `
                    <input type="text" name="bab[${babIndex}][moduls][${modulIndex}][name]" placeholder="Modul Name"  class="form-control mt-2">
                    <input type="file" name="bab[${babIndex}][moduls][${modulIndex}][video]" accept="video/*" class="form-control mt-2">
                    <input type="file" name="bab[${babIndex}][moduls][${modulIndex}][file]" accept="image/*,application/pdf" class="form-control mt-2">
                    <textarea name="bab[${babIndex}][moduls][${modulIndex}][materi]" placeholder="Materi" class="form-control mt-2"></textarea>
                    <button type="button" class="btn btn-danger remove-modul-btn mt-2">Remove Modul</button>
                `;
                
                modulSection.appendChild(modulItem);

                // Attach event listener untuk tombol "Remove Modul"
                attachRemoveModulHandler(modulItem);
            });
        }

        // Fungsi untuk menghandle event hapus modul
        function attachRemoveModulHandler(modulElement) {
            modulElement.querySelector('.remove-modul-btn').addEventListener('click', function () {
                modulElement.remove();
            });
        }

        // Fungsi untuk menghandle event hapus bab
        function attachRemoveBabHandler(babElement) {
            babElement.querySelector('.remove-bab-btn').addEventListener('click', function () {
                babElement.remove();
            });
        }
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
                <div class="signature-item mb-2">
                    <input type="file" name="certificate_ttd[]" class="form-control" accept="image/*">
                    <button type="button" class="btn btn-danger btn-sm remove-signature-btn mt-2">Remove</button>
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