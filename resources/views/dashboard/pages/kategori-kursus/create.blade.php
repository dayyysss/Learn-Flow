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
                <div class="relative w-full">
                    <select id="status" name="status" class="w-full p-13px focus:outline-none block appearance-none leading-1.5 rounded-md">
                        <option value="publik">Publik</option>
                        <option value="draft">Draft</option>
                    </select>
                    <i class="icofont-simple-down absolute top-1/2 right-3 -translate-y-1/2 block text-lg z-10"></i>
                </div>
            </div>
            <button type="submit" class="w-full text-size-12 2xl:text-size-15 text-whiteColor bg-primaryColor block border-primaryColor border hover:text-primaryColor hover:bg-white px-15px py-2 rounded-standard dark:hover:bg-whiteColor-dark dark:hover:text-whiteColor">Tambah</button>
        </form>
    </div>
</div>

<script>
 document.addEventListener('DOMContentLoaded', function() {
    const namaInput = document.querySelector('input[name="name"]');
    const slugInput = document.querySelector('input[name="slug"]');

    function createSlug(str) {
        str = str.toLowerCase();
        str = str.replace(/[^\w\s-]/g, '');
        str = str.replace(/\s+/g, '-');
        str = str.replace(/-+/g, '-');
        str = str.trim().replace(/^-+|-+$/g, '');
        return str;
    }

    if(namaInput && slugInput) {
        namaInput.addEventListener('keyup', function() {
            slugInput.value = createSlug(this.value);
        });
        namaInput.addEventListener('change', function() {
            slugInput.value = createSlug(this.value);
        });
    }
});
</script>
