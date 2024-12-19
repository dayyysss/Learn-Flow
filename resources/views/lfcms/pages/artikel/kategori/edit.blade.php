<div id="editModal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white dark:bg-dark-card p-6 rounded shadow-xl w-1/3">
        <h2 class="text-lg mb-4 text-gray-900 dark:text-white">Edit Kategori</h2>
        <form id="editForm">
            <input type="hidden" id="editCategoryId">
            <div class="mb-4">
                <label for="editCategoryName" class="block mb-2 text-gray-900 dark:text-white">Name</label>
                <input type="text" id="editCategoryName" class="form-input w-full bg-gray-100 dark:bg-dark-input text-gray-900 dark:text-white">
            </div>
            <div class="mb-4">
                <label for="editCategoryStatus" class="block mb-2 text-gray-900 dark:text-white">Status</label>
                <select id="editCategoryStatus" class="form-select w-full bg-gray-100 dark:bg-dark-input text-gray-900 dark:text-white">
                    <option value="1">Publik</option>
                    <option value="0">Draft</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary dark:text-white p-2 text-gray-900 bg-blue-500 dark:bg-blue-700 hover:bg-blue-600 dark:hover:bg-blue-600 p-2 rounded">Simpan Perubahan</button>
            <button type="button" id="closeEditModal" class=" dark:bg-gray-700 text-gray-900 dark:text-white p-2 rounded mt-4">Batal</button>
        </form>
    </div>
</div>

<script>
    document.querySelectorAll('.edit-category').forEach(button => {
        button.addEventListener('click', function() {
            const categoryId = this.getAttribute('data-id');
            if (categoryId) {
                // Fetch data kategori dari server
                fetch(`/lfcms/kategori-artikel/${categoryId}`)
                    .then(response => response.json())
                    .then(data => {
                        // Isi data ke dalam form
                        document.getElementById('editCategoryId').value = data.id;
                        document.getElementById('editCategoryName').value = data.name;
                        document.getElementById('editCategoryStatus').value = data.status;

                        // Tampilkan modal
                        document.getElementById('editModal').classList.remove('hidden');
                    })
                    .catch(error => console.error('Error fetching category data:', error));
            }
        });
    });

    // Event listener untuk form submit
    document.getElementById('editForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const categoryId = document.getElementById('editCategoryId').value;
        const categoryName = document.getElementById('editCategoryName').value;
        const categoryStatus = document.getElementById('editCategoryStatus').value;

        fetch(`/lfcms/kategori-artikel/${categoryId}`, {
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    name: categoryName,
                    status: categoryStatus,
                }),
            })
            .then(response => response.json())
            .then(data => {
                console.log('Response JSON:', data); // Debugging respons server
                if (!data.id || !data.name || !data.user || !data.user.name) {
                    throw new Error('Data tidak valid');
                }

                alert('Kategori berhasil diperbarui');
                document.getElementById('editModal').classList.add('hidden');
                fetchData(); // Memuat ulang data kategori setelah update

                // Update row tabel dengan data yang baru
                const row = document.querySelector(`#category-row-${categoryId}`);
                if (row) {
                    row.innerHTML = `
                        <td class="p-6 py-4">${data.id}</td>
                        <td class="p-6 py-4">${data.name}</td>
                        <td class="p-6 py-4">${data.user.name}</td>
                        <td class="p-6 py-4">
                            ${data.status == 1
                                ? '<span class="badge badge-success-light rounded-full">Publik</span>'
                                : '<span class="badge badge-warning-light rounded-full">Draft</span>'
                            }
                        </td>
                        <td class="p-6 py-4">
                            <div class="flex items-center gap-2">
                                <a href="#" class="btn-icon btn-primary-icon-light size-7 edit-category" data-id="${data.id}">
                                    <i class="ri-edit-fill text-[16px]"></i>
                                </a>
                                <button class="btn-icon btn-danger-icon-light size-7 delete-category" data-id="${data.id}">
                                    <i class="ri-delete-bin-line text-inherit text-[13px]"></i>
                                </button>
                                <div class="relative ml-5">
                                    <button data-popover-target="td-3-0" data-popover-trigger="click" data-popover-placement="bottom-end"
                                        class="size-7 rounded-50 flex-center hover:bg-gray-200 dark:hover:bg-dark-icon">
                                        <i class="ri-more-2-fill text-inherit"></i>
                                    </button>
                                    <ul id="td-3-0" class="hidden popover-target invisible [&.visible]:!block" data-popover>
                                        <li><a class="popover-item" href="#">More</a></li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    `;
                }
            })
            .catch(error => {
                console.error('Error updating category:', error);
                alert('Terjadi kesalahan saat mengupdate kategori.');
            });
    });

    // Fungsi untuk membuka modal
    function openEditModal(id) {
        console.log(`Membuka modal untuk kategori ID: ${id}`);
        document.getElementById('editModal').classList.remove('hidden');
    }

    // Fungsi untuk menutup modal
    document.getElementById('closeEditModal').addEventListener('click', function() {
        document.getElementById('editModal').classList.add('hidden');
    });
</script>
