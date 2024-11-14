
<style>
    /* Modal background */
    #categoryModal {
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    /* Menambah kelas untuk modal fade-in dan fade-out */
    #categoryModal.opacity-100 {
        opacity: 1;
    }
</style>
<!-- resources/views/dashboard/kategori/create.blade.php -->
<div id="categoryModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden transition-opacity">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full relative fade">
        <h3 class="text-xl font-semibold mb-4">Tambah Kategori</h3>
        <form action="#" method="POST">
            <label for="categoryName" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
            <input type="text" id="categoryName" name="categoryName" class="w-full border border-gray-300 rounded-md p-2 mt-1 mb-4" placeholder="Masukkan Nama Kategori">

            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select id="status" name="status" class="w-full border border-gray-300 rounded-md p-2 mt-1 mb-4">
                <option value="draft">Draft</option>
                <option value="public">Publik</option>
            </select>

            <button type="submit" class="bg-primaryColor hover:bg-primaryColor-dark text-white py-2 px-4 rounded">Simpan</button>
            <button type="button" id="closeModalButton" class="ml-2 bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 rounded">Batal</button>
        </form>
    </div>
</div>