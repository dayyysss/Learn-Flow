<!-- modal-create.blade.php -->
<input type="checkbox" id="modalCreateToggle" class="modal-checkbox hidden" />
<div class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm flex items-center justify-center opacity-0 invisible transition-all duration-300 z-50" id="createModal">
    <div class="modal-content bg-white dark:bg-dark-card w-full max-w-lg rounded-lg shadow-lg transform -translate-y-8 transition-all duration-300">
        <!-- Modal Header -->
        <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-dark-border">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-dark-text">
                Tambah Kategori Kursus
            </h3>
            <label for="modalCreateToggle" id="closeCreateModal" class="cursor-pointer text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                <i class="ri-close-line text-2xl"></i>
            </label>
        </div>

        <!-- Modal Body -->
        <div class="p-6">
            <form id="createKategoriForm" action="{{ route('kategori-kursus.store') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <!-- Nama Kategori -->
                    <div class="form-group">
                        <label for="createName" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Nama Kategori
                        </label>
                        <input type="text" 
                               id="createName" 
                               name="name" 
                               required 
                               class="form-input w-full rounded-md border-gray-300 dark:border-dark-border dark:bg-dark-card-two focus:border-primary-500 focus:ring focus:ring-primary-500/20"
                               placeholder="Masukkan nama kategori">
                    </div>

                    <!-- Slug -->
                    <div class="form-group">
                        <label for="createSlug" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Slug
                        </label>
                        <input type="text" 
                               id="createSlug" 
                               name="slug" 
                               readonly 
                               class="form-input w-full rounded-md bg-gray-100 dark:bg-dark-card-two border-gray-300 dark:border-dark-border cursor-not-allowed"
                               placeholder="Generated slug">
                    </div>

                    <!-- Status -->
                    <div class="form-group">
                        <label for="createStatus" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Status
                        </label>
                        <div class="relative">
                            <select id="createStatus" 
                                    name="status" 
                                    class="form-select w-full rounded-md border-gray-300 dark:border-dark-border dark:bg-dark-card-two focus:border-primary-500 focus:ring focus:ring-primary-500/20 appearance-none">
                                <option value="publik">Publik</option>
                                <option value="draft">Draft</option>
                            </select>
                            <i class="ri-arrow-down-s-line absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 pointer-events-none"></i>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex justify-end gap-3 mt-6">
                    <label for="modalCreateToggle" class="btn btn-soft-secondary">
                        Batal
                    </label>
                    <button type="submit" class="btn btn-primary">
                        Tambah Kategori
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const createNameInput = document.getElementById('createName');
    const createSlugInput = document.getElementById('createSlug');
    const modalCreateToggle = document.getElementById('modalCreateToggle');
    const modalCreate = document.getElementById('createModal');
    const modalContentCreate = modalCreate.querySelector('.modal-content');
    
    // Slug generator function
    function createSlug(str) {
        return str.toLowerCase()
                 .trim()
                 .replace(/[^\w\s-]/g, '')
                 .replace(/\s+/g, '-')
                 .replace(/-+/g, '-');
    }

    // Auto-generate slug from name
    if (createNameInput && createSlugInput) {
        createNameInput.addEventListener('input', function() {
            createSlugInput.value = createSlug(this.value);
        });
    }

    // Open modal
    const openCreateModalBtn = document.querySelector('[for="modalCreateToggle"]');
    if (openCreateModalBtn) {
        openCreateModalBtn.addEventListener('click', function() {
            modalCreate.classList.remove('opacity-0', 'invisible');
            modalContentCreate.classList.remove('-translate-y-8');
            modalContentCreate.classList.add('translate-y-0');
            // Add overflow hidden to body
            document.body.style.overflow = 'hidden';
        });
    }

    // Close modal
    const closeCreateModalBtn = document.getElementById('closeCreateModal');
    if (closeCreateModalBtn) {
        closeCreateModalBtn.addEventListener('click', function() {
            closeCreateModal();
        });
    }

    // Close modal when clicking outside
    modalCreate.addEventListener('click', function(e) {
        if (e.target === modalCreate) {
            closeCreateModal();
        }
    });

    function closeCreateModal() {
        modalCreate.classList.add('opacity-0', 'invisible');
        modalContentCreate.classList.remove('translate-y-0');
        modalContentCreate.classList.add('-translate-y-8');
        
        // Remove overflow hidden from body
        document.body.style.overflow = '';
        
        // Reset form after animation
        setTimeout(() => {
            document.getElementById('createKategoriForm').reset();
        }, 300);
    }
});
</script>