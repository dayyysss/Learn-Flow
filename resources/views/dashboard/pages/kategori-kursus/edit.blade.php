<input type="checkbox" id="modalToggleEdit" class="modal-checkbox hidden">
<div
    class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 invisible transition-opacity duration-300 z-[-1]">
    <div
        class="modal-content bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5 p-6 relative w-full max-w-lg transform -translate-y-12 transition-transform duration-300">
        <h2 id="modalTitle" class="text-xl font-semibold text-blackColor dark:text-blackColor-dark mb-4">Edit Kategori
            Kursus</h2>

        <label for="modalToggleEdit"
            class="absolute top-4 right-4 text-blackColor dark:text-whiteColor cursor-pointer text-2xl">&times;</label>

        <form id="categoryForm" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PUT"> 

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-blackColor dark:text-whiteColor">Nama
                    Kategori</label>
                <input type="text" id="name" name="name" required
                    class="mt-1 p-2 border border-borderColor dark:border-borderColor-dark rounded w-full">
            </div>

            <div class="mb-4">
                <label for="slug"
                    class="block text-sm font-medium text-blackColor dark:text-whiteColor">Slug</label>
                <input type="text" id="slug" name="slug" readonly
                    class="mt-1 p-2 border border-borderColor dark:border-borderColor-dark rounded w-full">
            </div>

            <div class="mb-4">
                <label for="status"
                    class="block text-sm font-medium text-blackColor dark:text-whiteColor">Status</label>
                <select id="status" name="status"
                    class="mt-1 p-2 border border-borderColor dark:border-borderColor-dark rounded w-full">
                    <option value="publik">Publik</option>
                    <option value="draft">Draft</option>
                </select>
            </div>

            <button type="submit"
                class="bg-primaryColor text-whiteColor hover:bg-whiteColor hover:text-primaryColor dark:hover:bg-whiteColor-dark border border-primaryColor p-2 rounded-md transition duration-300 w-full">
                Update
            </button>
        </form>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editButtons = document.querySelectorAll('.edit-category');
        const modalToggle = document.getElementById('modalToggle');
        const categoryForm = document.getElementById('categoryForm');
        const nameInput = document.getElementById('name');
        const slugInput = document.getElementById('slug');
        const statusSelect = document.getElementById('status');
        const modalTitle = document.getElementById('modalTitle');

        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');
                const slug = this.getAttribute('data-slug');
                const status = this.getAttribute('data-status');
                const action = this.getAttribute('data-action');

                categoryForm.action =
                    `/kategori-kursus/${id}`; 

                nameInput.value = name;
                slugInput.value = slug;
                statusSelect.value = status;

                if (action === 'edit') {
                    modalTitle.textContent = 'Edit Kategori Kursus'; 
                }

                modalToggle.checked = true;
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

        const closeModal = document.querySelector('label[for="modalToggle"]');
        closeModal.addEventListener('click', function() {
            modalToggle.checked = false;
            categoryForm.reset();
        });
    });
</script>
