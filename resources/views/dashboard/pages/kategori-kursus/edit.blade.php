<input type="checkbox" id="modalToggleEdit" class="modal-checkbox hidden">
<div
    class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 invisible transition-opacity duration-300 z-[-1]">
    <div
        class="modal-content bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5 p-6 relative w-full max-w-lg transform -translate-y-12 transition-transform duration-300">
        <h2 id="modalTitle" class="text-xl font-semibold text-blackColor dark:text-whiteColor mb-4">Edit Kategori Kursus
        </h2>

        <label for="modalToggleEdit" class="modal-close cursor-pointer absolute top-4 right-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-primaryColor dark:text-whiteColor"
                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </label>

        <form id="categoryForm" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PUT">

            <div class="form-group mb-4">
                <label for="name"
                    class="text-base lg:text-sm 2xl:text-base font-semibold block group-hover:text-primaryColor dark:text-whiteColor">Nama
                    Kategori</label>
                <input type="text" id="name" name="name" required
                    class="mt-1 p-2 border border-borderColor dark:border-borderColor-dark rounded w-full">
            </div>

            <div class="form-group mb-4">
                <label for="slug"
                    class="text-base lg:text-sm 2xl:text-base font-semibold block group-hover:text-primaryColor dark:text-whiteColor">Slug</label>
                <input type="text" id="slug" name="slug" readonly
                    class="mt-1 p-2 border border-borderColor dark:border-borderColor-dark rounded w-full">
            </div>

            <div class="form-group mb-4">
                <label for="status"
                    class="text-base lg:text-sm 2xl:text-base font-semibold block group-hover:text-primaryColor dark:text-whiteColor">Status</label>
                <div class="relative w-full">
                    <select id="status" name="status"
                        class="w-full p-13px focus:outline-none block appearance-none leading-1.5 rounded-md">
                        <option value="publik">Publik</option>
                        <option value="draft">Draft</option>
                    </select>
                    <i class="icofont-simple-down absolute top-1/2 right-3 -translate-y-1/2 block text-lg z-10"></i>
                </div>
            </div>
            <button type="submit"
                class="w-full text-size-12 2xl:text-size-15 text-whiteColor bg-primaryColor block border-primaryColor border hover:text-primaryColor hover:bg-white px-15px py-2 rounded-standard dark:hover:bg-whiteColor-dark dark:hover:text-whiteColor">Update</button>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editButtons = document.querySelectorAll('.edit-category');
        const modalToggleEdit = document.getElementById('modalToggleEdit');
        const categoryForm = document.getElementById('categoryForm');
        const nameInput = document.getElementById('name');
        const slugInput = document.getElementById('slug');
        const statusSelect = document.getElementById('status');
        const modal = document.querySelector('.modal');
        const modalContent = document.querySelector('.modal-content');
        const modalTitle = document.getElementById('modalTitle');

        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');
                const slug = this.getAttribute('data-slug');
                const status = this.getAttribute('data-status');

                categoryForm.action = `/kategori-kursus/${id}`;
                nameInput.value = name;
                slugInput.value = slug;
                statusSelect.value = status;
                modalTitle.textContent = 'Edit Kategori Kursus';

                modalToggleEdit.checked = true;
                modal.classList.add('opacity-100', 'visible');
                modal.classList.remove('opacity-0', 'invisible');
                modalContent.classList.add('translate-y-0');
                modalContent.classList.remove('-translate-y-12');
            });
        });

        nameInput.addEventListener('input', function() {
            slugInput.value = this.value
                .toLowerCase()
                .trim()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');
        });

        function closeEditModal() {
        modalToggleEdit.checked = false;
        modalEdit.classList.remove('opacity-100', 'visible');
        modalEdit.classList.add('opacity-0', 'invisible');
        modalContentEdit.classList.remove('translate-y-0');
        modalContentEdit.classList.add('-translate-y-12');

        setTimeout(() => {
            categoryForm.reset();
            modalTitle.textContent = 'Edit Kategori Kursus';
        }, 300);
    }
});
</script>
