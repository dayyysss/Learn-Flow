<!-- modal-create.blade.php -->
<input type="checkbox" id="modalCreateToggle" class="modal-checkbox hidden" />
<div class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 invisible transition-opacity duration-300 z-[-1]">
    <div class="modal-content bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5 p-6 relative w-full max-w-lg transform -translate-y-12 transition-transform duration-300">
        <h2 class="text-xl font-semibold text-blackColor dark:text-whiteColor mb-4">Tambah Kategori Kursus</h2>

        <!-- Tombol untuk menutup modal -->
        <label for="modalCreateToggle" id="closeCreateModal" class="modal-close cursor-pointer absolute top-4 right-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-primaryColor dark:text-whiteColor" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </label>

        <!-- Form Create Kategori -->
        <form id="createKategoriForm" action="{{ route('kategori-kursus.store') }}" method="POST">
            @csrf
            <div class="form-group mb-4">
                <label for="createName" class="text-base lg:text-sm 2xl:text-base font-semibold block group-hover:text-primaryColor dark:text-whiteColor">Nama Kategori</label>
                <input type="text" id="createName" name="name" required class="mt-1 p-2 border border-borderColor dark:border-borderColor-dark rounded w-full">
            </div>
            <div class="form-group mb-4">
                <label for="createSlug" class="text-base lg:text-sm 2xl:text-base font-semibold block group-hover:text-primaryColor dark:text-whiteColor">Slug</label>
                <input type="text" id="createSlug" name="slug" readonly class="mt-1 p-2 border border-borderColor dark:border-borderColor-dark rounded w-full">
            </div>

            <div class="form-group mb-4">
                <label for="createStatus" class="text-base lg:text-sm 2xl:text-base font-semibold block group-hover:text-primaryColor dark:text-whiteColor">Status</label>
                <div class="relative w-full">
                    <select id="createStatus" name="status" class="w-full p-13px focus:outline-none block appearance-none leading-1.5 rounded-md">
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
    // Menggunakan ID yang spesifik untuk form create
    const createNameInput = document.getElementById('createName');
    const createSlugInput = document.getElementById('createSlug');
    const modalCreateToggle = document.getElementById('modalCreateToggle');
    const modalCreate = document.querySelector('#modalCreateToggle + .modal');
    const modalContentCreate = modalCreate.querySelector('.modal-content');
    
    // Fungsi untuk membuat slug
    function createSlug(str) {
        return str.toLowerCase()
                 .trim()
                 .replace(/[^\w\s-]/g, '')
                 .replace(/\s+/g, '-')
                 .replace(/-+/g, '-');
    }

    // Event listener untuk nama kategori pada form create
    if (createNameInput && createSlugInput) {
        createNameInput.addEventListener('input', function() {
            createSlugInput.value = createSlug(this.value);
        });
    }

    // Toggle modal create
    const openCreateModalBtn = document.querySelector('[for="modalCreateToggle"]');
    if (openCreateModalBtn) {
        openCreateModalBtn.addEventListener('click', function() {
            modalCreate.classList.remove('opacity-0', 'invisible');
            modalCreate.classList.add('opacity-100', 'visible');
            modalContentCreate.classList.remove('-translate-y-12');
            modalContentCreate.classList.add('translate-y-0');
        });
    }

    // Close modal create
    const closeCreateModalBtn = document.getElementById('closeCreateModal');
    if (closeCreateModalBtn) {
        closeCreateModalBtn.addEventListener('click', function() {
            modalCreate.classList.remove('opacity-100', 'visible');
            modalCreate.classList.add('opacity-0', 'invisible');
            modalContentCreate.classList.remove('translate-y-0');
            modalContentCreate.classList.add('-translate-y-12');
            
            // Reset form setelah modal ditutup
            setTimeout(() => {
                document.getElementById('createKategoriForm').reset();
            }, 300);
        });
    }
});
</script>