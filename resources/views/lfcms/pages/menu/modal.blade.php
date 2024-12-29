<div id="addMenuTypeModal" class="modal-back" style="display: none">
    <div class="modal-content">
        <span class="close-tambah">&times;</span>
        <h3>Tambah Tipe Menu</h3>
        <form action="{{ route('menu_type.store') }}" method="POST" class="space-y-4">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label text-sm font-medium text-gray-700">Nama</label>
                <input type="text"
                    class="form-control mt-1 block w-full border border-slate-400 rounded-md shadow-sm p-2 sm:text-sm"
                    id="name" name="name" required>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn bg-indigo-700">Simpan</button>
            </div>
        </form>
    </div>
</div>

<div id="addMenuListModal" class="modal-back" style="display: none">
    <div class="modal-content">
        <span class="close-tambahMenu">&times;</span>
        <h3>Tambah Menu</h3>
        <form action="{{ route('menu.store') }}" method="POST" class="space-y-4">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label text-sm font-medium text-gray-700">Nama</label>
                <input type="text"
                    class="form-control mt-1 block w-full border border-slate-400 rounded-md shadow-sm p-2 sm:text-sm"
                    id="name" name="name">
            </div>

            <div class="mb-3">
                <label for="url" class="form-label text-sm font-medium text-gray-700">URL</label>
                <input type="text"
                    class="form-control mt-1 block w-full border border-slate-400 rounded-md shadow-sm p-2 sm:text-sm"
                    id="url" name="url">
            </div>

            <div class="mb-3">
                <label for="ikon" class="text-sm font-medium text-gray-700">Ikon</label>
                <div class="flex items-center">
                    <input type="text"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 sm:text-sm"
                        id="ikon" name="ikon">
                    <button class="ml-2 px-4 py-2 bg-gray-200 rounded-md" type="button">
                        <i class="fas fa-icons"></i>
                    </button>
                </div>
            </div>

            <div class="mb-3">
                <label for="menutype_id" class="form-label text-sm font-medium text-gray-700">Tipe Menu</label>
                <select name="menutype_id" id="menutype_id"
                    class="form-control mt-1 block w-full border border-slate-400 rounded-md shadow-sm p-2 sm:text-sm"
                    required>
                    <option value="" disabled selected>Pilih tipe menu</option>
                    @foreach ($menuTypes as $menuType)
                        <option value="{{ $menuType->id }}">{{ $menuType->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 permissions" id="permissions-container">
                <label class="form-label text-sm font-medium text-gray-700">Permissions</label>
                <div class="flex flex-wrap space-x-2">
                    <label><input type="checkbox" name="permissions[]" value="index"> Index</label>
                    <label id="create-permission"><input type="checkbox" name="permissions[]" value="create">
                        Create</label>
                    <label><input type="checkbox" name="permissions[]" value="update"> Update</label>
                    <label><input type="checkbox" name="permissions[]" value="delete"> Delete</label>
                </div>
            </div>

            <div class="flex justify-end mt-4">
                <button type="submit" class="px-4 py-2 bg-indigo-700 text-white rounded-lg">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal untuk Edit Tipe Menu -->
<div id="editMenuTypeModal" class="modal-back" style="display: none">
    <div class="modal-content">
        <span class="close-edit">&times;</span>
        <h3>Edit Tipe Menu</h3>
        <form action="" method="POST" class="space-y-4" id="editMenuTypeForm">
            @csrf
            @method('PUT') <!-- Gunakan PUT untuk update -->
            <div class="mb-3">
                <label for="edit_name" class="form-label text-sm font-medium text-gray-700">Nama</label>
                <input type="text"
                    class="form-control mt-1 block w-full border border-slate-400 rounded-md shadow-sm p-2 sm:text-sm"
                    id="edit_name" name="name" required>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn bg-indigo-700">Simpan</button>
            </div>
        </form>
    </div>
</div>



<!-- Modal Edit -->
<div id="editMenuListModal" class="modal-back" style="display: none;">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Edit Menu</h3>
        <form action="" method="POST" class="space-y-4" id="editMenuListForm">
            @csrf
            @method('PUT')

            <!-- Nama -->
            <div class="mb-3">
                <label for="edit_nama" class="form-label text-sm font-medium text-gray-700">Nama</label>
                <input type="text"
                    class="form-control mt-1 block w-full border border-slate-400 rounded-md shadow-sm p-2 sm:text-sm"
                    id="edit_nama" name="name" required>
            </div>

            <!-- URL -->
            <div class="mb-3">
                <label for="edit_url" class="form-label text-sm font-medium text-gray-700">URL</label>
                <input type="text"
                    class="form-control mt-1 block w-full border border-slate-400 rounded-md shadow-sm p-2 sm:text-sm"
                    id="edit_url" name="url">
            </div>

            <!-- Ikon -->
            <div class="mb-3">
                <label for="edit_ikon" class="form-label text-sm font-medium text-gray-700">Ikon</label>
                <input type="text"
                    class="form-control mt-1 block w-full border border-slate-400 rounded-md shadow-sm p-2 sm:text-sm"
                    id="edit_ikon" name="ikon">
            </div>

            <!-- Menu Type -->
            <div class="mb-3 hidden">
                <label for="edit_menutype_id" class="form-label text-sm font-medium text-gray-700">Menu Type</label>
                <select id="edit_menutype_id" name="menutype_id"
                    class="form-control mt-1 block w-full border border-slate-400 rounded-md shadow-sm p-2 sm:text-sm">
                    @foreach ($menuTypes as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Permissions -->
            <div class="mb-3 permissions hidden" id="permissions-container-edit">

                <label class="form-label text-sm font-medium text-gray-700">Permissions</label>
                <div id="permissions-list" class="flex gap-1">
                    <!-- Permissions are dynamically added here -->
                </div>
            </div>


            <!-- Save Button -->
            <div class="modal-footer">
                <button type="submit" class="btn bg-indigo-700 text-white">Simpan</button>
            </div>
        </form>
    </div>
</div>



<script>
    // Menambahkan event listener pada perubahan tipe menu
    document.getElementById('edit_menutype_id').addEventListener('change', function() {
        var menutypeId = this.value;
        var permissionsContainer = document.getElementById('permissions-container');

        if (menutypeId != 1) {
            // Sembunyikan semua opsi permissions jika tipe menu bukan ID 1
            permissionsContainer.style.display = 'none';
            // Pastikan semua checkbox tidak dicentang
            var checkboxes = permissionsContainer.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = false;
            });
        } else {
            // Tampilkan kembali opsi permissions jika tipe menu adalah ID 1
            permissionsContainer.style.display = 'block';
        }
    });
</script>



<style>
    .iconpicker-popover {
        top: 300px;
    }

    .modal-back {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        max-width: 500px;
        width: 100%;
    }

    .close {
        float: right;
        cursor: pointer;
        font-size: 24px;
    }

    .modal-footer {
        text-align: right;
    }
</style>

<script>
    $(document).ready(function() {
        // Inisialisasi ikonpicker
        $('#ikon').iconpicker({
            hideOnSelect: true, // Nonaktifkan penutupan otomatis bawaan
            inputSearch: true,  // Tambahkan fitur pencarian (opsional)
        });

        // Hapus teks yang sebelumnya diketik saat ikonpicker dibuka
        $('#ikon').on('iconpickerShown', function(e) {
            $(this).val(''); // Reset input ke kosong setiap kali ikonpicker dibuka
        });

        // Ketika ikon dipilih, tetapkan nilai dan langsung tutup ikonpicker
        $('#ikon').on('iconpickerSelected', function(e) {
            $(this).val(e.iconpickerValue); // Tetapkan ikon yang dipilih ke input
            $(this).iconpicker('hide'); // Tutup ikonpicker tanpa jeda
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Inisialisasi ikonpicker
        $('#edit_ikon').iconpicker({
            hideOnSelect: true, // Nonaktifkan penutupan otomatis bawaan
            inputSearch: true,  // Tambahkan fitur pencarian (opsional)
        });


        // Ketika ikon dipilih, tetapkan nilai dan langsung tutup ikonpicker
        $('#edit_ikon').on('iconpickerSelected', function(e) {
            $(this).val(e.iconpickerValue); // Tetapkan ikon yang dipilih ke input
            $(this).iconpicker('hide'); // Tutup ikonpicker tanpa jeda
        });
    });
</script>


<script>
    document.getElementById('menutype_id').addEventListener('change', function() {
        var menutypeId = parseInt(this.value); // Pastikan nilainya berupa angka
        var permissionsContainer = document.getElementById('permissions-container');

        // Periksa jika menutypeId adalah 1 atau 2
        if (menutypeId === 1 || menutypeId === 2) {
            // Tampilkan opsi permissions
            permissionsContainer.style.display = 'block';
        } else {
            // Sembunyikan semua opsi permissions jika tipe menu bukan ID 1 atau 2
            permissionsContainer.style.display = 'none';
            // Pastikan semua checkbox tidak dicentang
            var checkboxes = permissionsContainer.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = false;
            });
        }
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fungsi untuk menampilkan atau menyembunyikan permissions
        function togglePermissions(menuTypeId) {
            const permissionsContainer = document.getElementById('permissions-container-edit');
            if (menuTypeId !== "1") { // Gantilah "1" sesuai dengan nilai yang Anda inginkan
                permissionsContainer.style.display = 'none'; // Sembunyikan
            } else {
                permissionsContainer.style.display = 'block'; // Tampilkan
            }
        }

        // Event listener ketika modal dibuka
        const modal = document.getElementById('editMenuListModal');
        const menuTypeSelect = document.getElementById('edit_menutype_id');

        // Ketika menu type berubah
        menuTypeSelect.addEventListener('change', function() {
            togglePermissions(this.value);
        });

        // Contoh untuk memanggil togglePermissions saat modal dibuka
        modal.addEventListener('show', function() {
            const selectedMenuTypeId = menuTypeSelect.value;
            togglePermissions(selectedMenuTypeId);
        });
    });
</script>
