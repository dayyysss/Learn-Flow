<!-- Checkbox kontrol untuk modal -->
<input type="checkbox" id="modalToggle" class="modal-checkbox hidden" />
<div
    class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 visibility-hidden transition-opacity duration-300 z-[-1]">
    <div
        class="modal-content bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5 p-6 relative w-full max-w-lg transform -translate-y-12 transition-transform duration-300">
        <h2 class="text-xl font-semibold text-blackColor dark:text-blackColor-dark mb-4">Tambah Kategori Kursus</h2>

        <label for="modalToggle"
            class="absolute top-4 right-4 text-blackColor dark:text-whiteColor cursor-pointer text-2xl">X</label>

        <form action="{{ route('kategori-kursus.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-blackColor dark:text-whiteColor">Nama
                    Kategori</label>
                <input type="text" id="name" name="name"
                    class="mt-1 p-2 border border-borderColor dark:border-borderColor-dark rounded w-full focus:outline-none focus:ring-primaryColor focus:border-primaryColor transition duration-300"
                    value="" required>
            </div>
            <div class="mb-4">
                <label for="slug"
                    class="block text-sm font-medium text-blackColor dark:text-whiteColor">Slug</label>
                <input type="text" id="slug" name="slug"
                    class="mt-1 p-2 border border-borderColor dark:border-borderColor-dark rounded w-full focus:outline-none focus:ring-primaryColor focus:border-primaryColor transition duration-300"
                    readonly>
            </div>
            <div class="mb-4">
                <label for="status"
                    class="block text-sm font-medium text-blackColor dark:text-whiteColor">Status</label>
                <select id="status" name="status"
                    class="mt-1 p-2 border border-borderColor dark:border-borderColor-dark rounded w-full focus:outline-none focus:ring-primaryColor focus:border-primaryColor transition duration-300">
                    <option value="publik">Publik</option>
                    <option value="draft">Draft</option>
                </select>
            </div>
            <button type="submit"
                class="bg-primaryColor text-whiteColor hover:bg-whiteColor hover:text-primaryColor dark:hover:bg-whiteColor-dark border border-primaryColor p-2 rounded-md transition duration-300 w-full">Tambah</button>
        </form>
    </div>
</div>

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
