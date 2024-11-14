<!-- Checkbox kontrol untuk modal -->
<input type="checkbox" id="modalToggle" class="modal-checkbox hidden" />

<!-- Modal -->
<div
    class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 visibility-hidden transition-opacity duration-300 z-[-1]">
    <div
        class="modal-content bg-white rounded-lg p-6 relative w-full max-w-lg transform -translate-y-12 transition-transform duration-300">
        <!-- Judul Modal -->
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Tambah Kategori Kursus</h2>

        <!-- Tombol Close -->
        <label for="modalToggle" class="absolute top-4 right-4 text-black text-2xl cursor-pointer">X</label>

        <!-- Form -->
        <form action="{{ route('kategori-kursus.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
                <input type="text" id="name" name="name"
                    class="mt-1 p-2 border border-gray-300 rounded w-full" required>
            </div>
            <div class="mb-4">
                <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                <input type="text" id="slug" name="slug"
                    class="mt-1 p-2 border border-gray-300 rounded w-full" readonly>
            </div>
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select id="status" name="status" class="mt-1 p-2 border border-gray-300 rounded w-full">
                    <option value="publik">Publik</option>
                    <option value="draft">Draft</option>
                </select>
            </div>
            <button type="submit"
                class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600 transition duration-300 w-full">Tambah</button>
        </form>
    </div>
</div>

<!-- JavaScript untuk Update Otomatis Slug -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const namaKategoriInput = document.getElementById('name');
        const slugInput = document.getElementById('slug');

        function generateSlug(text) {
            return text
                .toLowerCase()
                .trim()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');
        }

        namaKategoriInput.addEventListener('input', function() {
            slugInput.value = generateSlug(namaKategoriInput.value);
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        const modalToggle = document.getElementById('modalToggle');

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(form);

            fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(response => response.text())
                .then(data => {
                    modalToggle.checked = false;
                    window.location.reload();
                })
                .catch(error => {
                    alert('Terjadi kesalahan. Silakan coba lagi.');
                });
        });
    });
</script>



<style>
    .modal-checkbox:checked+.modal {
        opacity: 1;
        visibility: visible;
        z-index: 999;
    }

    .modal-checkbox:checked+.modal .modal-content {
        transform: translateY(0);
    }
</style>
