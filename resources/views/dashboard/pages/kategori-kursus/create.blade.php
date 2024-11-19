<!-- Checkbox kontrol untuk modal -->
<input type="checkbox" id="modalToggle" class="modal-checkbox hidden" />
<div class="modal">
    <div class="modal-content bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark">
        <h2 class="modal-title text-base lg:text-sm 2xl:text-base font-semibold block group-hover:text-primaryColor dark:text-whiteColor">Tambah Kategori Kursus</h2>

        <label for="modalToggle" class="modal-close cursor-pointer absolute top-4 right-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-primaryColor dark:text-whiteColor" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </label>

        <form action="{{ route('kategori-kursus.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name" class="text-base lg:text-sm 2xl:text-base font-semibold block group-hover:text-primaryColor dark:text-whiteColor">Nama Kategori</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="slug" class="text-base lg:text-sm 2xl:text-base font-semibold block group-hover:text-primaryColor dark:text-whiteColor">Slug</label>
                <input type="text" id="slug" name="slug" readonly>
            </div>
            <div class="form-group">
                <label for="status" class="text-base lg:text-sm 2xl:text-base font-semibold block group-hover:text-primaryColor dark:text-whiteColor">Status</label>
                <select id="status" name="status">
                    <option value="publik">Publik</option>
                    <option value="draft">Draft</option>
                </select>
            </div>
            <button type="submit" class="w-full text-size-12 2xl:text-size-15 text-whiteColor bg-primaryColor block border-primaryColor border hover:text-primaryColor hover:bg-white px-15px py-2 rounded-standard dark:hover:bg-whiteColor-dark dark:hover:text-whiteColor">Tambah</button>
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
