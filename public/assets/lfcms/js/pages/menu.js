// Inisialisasi modal dan handler modal
var modal = document.getElementById("addMenuTypeModal");
var openModalBtn = document.getElementById("openModal");
var closeModalBtns = document.querySelectorAll(".close-tambah, .close-modal");

openModalBtn.onclick = function () {
    modal.style.display = "flex";
};

closeModalBtns.forEach(function (btn) {
    btn.onclick = function () {
        modal.style.display = "none";
    };
});

// Tutup modal ketika klik di luar konten modal
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
};

var modalList = document.getElementById("addMenuListModal");
var openModalListBtn = document.getElementById("openModalMenuList");
var closeModalListBtns = document.querySelectorAll(
    ".close-tambahMenu, .close-modal"
);

openModalListBtn.onclick = function () {
    modalList.style.display = "flex";
};

closeModalListBtns.forEach(function (btn) {
    btn.onclick = function () {
        modalList.style.display = "none";
    };
});

// Tutup modal ketika klik di luar konten modal
window.onclick = function (event) {
    if (event.target == modalList) {
        modalList.style.display = "none";
    }
};

var editModal = document.getElementById("editMenuTypeModal");
var editForm = document.getElementById("editMenuTypeForm");

// Fungsi untuk membuka modal edit dan mengisi data tipe menu
function openEditModal(type) {
    // Set nilai input nama berdasarkan data yang diterima
    document.getElementById("edit_name").value = type.name;

    // Ubah action form menjadi route update yang sesuai
    editForm.action = "/lfcms/menu_type/" + type.id; // Sesuaikan dengan route update

    // Tampilkan modal edit
    editModal.style.display = "flex";
}

// Tutup modal ketika tombol close atau area luar modal diklik
var closeEditModalBtns = document.querySelectorAll(".close-edit, .close-modal");

closeEditModalBtns.forEach(function (btn) {
    btn.onclick = function () {
        editModal.style.display = "none";
    };
});

window.onclick = function (event) {
    if (event.target == editModal) {
        editModal.style.display = "none";
    }
};

//edit Menu List
var editModalList = document.getElementById("editMenuListModal");
var editFormList = document.getElementById("editMenuListForm");

// Fungsi untuk membuka modal edit dan mengisi data tipe menu
function openEditModalList(menu) {
    // Log menu untuk memastikan data yang diteruskan
    console.log(menu);

    // Set form action dynamically
    const form = document.getElementById("editMenuListForm");
    form.action = `menu/${menu.id}`;

    // Gunakan 'content' untuk nama, 'link' untuk URL, dan 'icon' untuk ikon
    document.getElementById("edit_nama").value = menu.content || "";
    document.getElementById("edit_url").value = menu.url || "";
    document.getElementById("edit_ikon").value = menu.ikon || "";
    document.getElementById("edit_menutype_id").value = menu.menutype_id || "";

    // Populate permissions
    const permissionsList = document.getElementById("permissions-list");
    permissionsList.innerHTML = ""; // Clear previous permissions

    // Permission options to check
    const permissions = ["create", "index", "update", "delete"];

    permissions.forEach((permission) => {
        // Periksa apakah menu.permissions adalah objek dan memiliki izin
        const isChecked =
            menu.permissions &&
            typeof menu.permissions === "object" &&
            menu.permissions[permission]
                ? "checked"
                : "";

        permissionsList.innerHTML += `
            <label>
                <input type="checkbox" name="permissions[]" value="${permission}" ${isChecked}> ${
            permission.charAt(0).toUpperCase() + permission.slice(1)
        }
            </label><br>
        `;
    });

    // Show the modal
    document.getElementById("editMenuListModal").style.display = "flex";
}

// Function to handle form submission
editFormList.onsubmit = function (event) {
    const permissionsCheckboxes = document.querySelectorAll(
        'input[name="permissions[]"]'
    );
    let selectedPermissions = [];

    // Check which permissions are selected
    permissionsCheckboxes.forEach((checkbox) => {
        if (checkbox.checked) {
            selectedPermissions.push(checkbox.value);
        }
    });

    // If no permissions are selected, set permissions to null
    if (selectedPermissions.length === 0) {
        const permissionsInput = document.createElement("input");
        permissionsInput.type = "hidden";
        permissionsInput.name = "permissions";
        permissionsInput.value = "null"; // Set to null
        editFormList.appendChild(permissionsInput);
    }

    // Allow the form to submit
    return true;
};

// Function to close the modal
document.querySelector(".close").onclick = function () {
    document.getElementById("editMenuListModal").style.display = "none";
};
