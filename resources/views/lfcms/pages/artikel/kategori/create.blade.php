<style>
    /* Ensure modal is centered and responsive */
    #addDataModal {
        display: none;
        /* Hide modal by default */
        justify-content: center;
        align-items: center;
        position: fixed;
        inset: 0;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 500;
    }

    #addDataModal.active {
        display: flex;
        /* Show modal when active */
    }

    .modal-content {
        background: white;
        border-radius: 8px;
        padding: 20px;
        max-width: 500px;
        width: 90%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        animation: fadeIn 0.3s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: scale(0.9);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    /* Ensure buttons and form elements are spaced properly */
    .btn {
        display: inline-block;
        padding: 8px 16px;
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
        text-align: center;
    }

    .btn.b-light {
        background-color: #f4f4f4;
        border: 1px solid #ddd;
        color: #333;
    }

    .btn.b-light:hover {
        background-color: #e4e4e4;
    }

    .btn.btn-primary-light {
        background-color: #007BFF;
        color: white;
        border: none;
    }

    .btn.btn-primary-light:hover {
        background-color: #0056b3;
    }
</style>

<!-- Modal -->
<div id="addDataModal" class="hidden">
    <div class="modal-content bg-white dark:bg-dark-card">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold">Tambah Data</h3>
            <button id="closeModalButton" class="text-gray-500 hover:text-red-500">
                <i class="ri-close-line text-xl"></i>
            </button>
        </div>
        <form id="addDataForm">
            <!-- Name Field -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">Nama</label>
                <input type="text" id="name" name="name" class="form-input text-black mt-1 w-full"
                    placeholder="Masukan nama" required>
            </div>
            <!-- Status Field -->
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium">Status</label>
                <select id="status" name="status" class="form-select mt-1 w-full" required>
                    <option value="1" selected>Publik</option>
                    <option value="0">Draft</option>
                </select>
            </div>
            <!-- Buttons -->
            <div class="flex justify-end gap-3">
                <button type="button" id="cancelButton" class="btn b-light">Cancel</button>
                <button type="submit" class="btn btn-primary-light">Save</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Ensure all elements are correctly selected
    const addDataButton = document.getElementById("addDataButton");
    const addDataModal = document.getElementById("addDataModal");
    const closeModalButton = document.getElementById("closeModalButton");
    const cancelButton = document.getElementById("cancelButton");

    // Open modal
    if (addDataButton && addDataModal) {
        addDataButton.addEventListener("click", () => {
            addDataModal.classList.add("active"); 
        });
    }

    // Close modal
    const closeModal = () => {
        addDataModal.classList.remove("active"); 
    };

    if (closeModalButton) closeModalButton.addEventListener("click", closeModal);
    if (cancelButton) cancelButton.addEventListener("click", closeModal);


    // Handle form submission
    addDataForm.addEventListener("submit", (e) => {
        e.preventDefault();

        // Get form data
        const formData = new FormData(addDataForm);

        // Send data to the server using AJAX
        fetch("/lfcms/kategori-artikel", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                body: formData,
            })
            .then((response) => {
                if (response.redirected) {
                    window.location.href = response
                    .url;
                } else {
                    return response.json();
                }
            })
            .then((data) => {
                alert("Kategori artikel berhasil ditambahkan");
                closeModal();
            })
            .catch((error) => {
                console.error("Error:", error);
                alert("An error occurred. Please try again.");
            });
    });
</script>
