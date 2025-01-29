@extends('lfcms.layouts.app')
@section('page_title', 'Administrator | Learn Flow CMS')
@section('content')
<div class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
    <div class="grid grid-cols-12">
        <div class="col-span-full">
            <div class="card p-0">
                <div class="flex-center-between p-6 pb-4 border-b border-gray-200 dark:border-dark-border">
                    <h3 class="text-lg card-title leading-none">Data Administrator</h3>
                    @include('lfcms.components.breadcrumb.custom', ['title' => 'Administrator'])
                </div>
                <div class="p-6">
                    <div class="flex-center-between">
                        <div class="flex items-center gap-5">
                            <form class="max-w-80 relative">
                                <span class="absolute top-1/2 -translate-y-[40%] left-2.5">
                                    <i class="ri-search-line text-gray-900 dark:text-dark-text text-[14px]"></i>
                                </span>
                                <input type="text" id="searchInput" placeholder="Search for..." class="form-input pl-[30px]">
                            </form>
                            
                            <button type="button" id="refreshButton" class="font-spline_sans text-sm px-1 text-gray-900 dark:text-dark-text flex-center gap-1.5">
                                <i class="ri-loop-right-line text-inherit text-sm"></i>
                                <span>Refresh</span>
                            </button>
                        </div>
                        <button class="btn b-light btn-primary-light dk-theme-card-square"
                               id="openModal">
                                <i class="btn ri-add-fill text-inherit"></i>
                                <span>Tambah</span>
                            </button>
                    </div>
                    <div class="overflow-x-auto mt-5">
                        <table class="table-auto border-collapse w-full whitespace-nowrap text-left text-gray-500 dark:text-dark-text font-medium">
                            <thead>
                                <tr class="text-primary-500">
                                    <th class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two">No</th>
                                    <th class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two">Nama</th>
                                    <th class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two">Email</th>
                                    <th class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two">Email diverifikasi pada</th>
                                    <th class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="dataContainer" class="divide-y divide-gray-200 dark:divide-dark-border-three">
                                @foreach ($user as $index => $user)
                                    <tr>
                                        <td class="p-6 py-4">{{ $index + 1 }}</td>
                                        <td class="p-6 py-4">{{ $user->first_name . ' ' . $user->last_name }}</td>
                                        <td class="p-6 py-4">{{ $user->email }}</td>
                                        <td class="p-6 py-4">{{ $user->email_verified_at ?? '-' }}</td>
                                        <td class="p-6 py-4">
                                            <div class="flex items-center gap-2">
                                                <a href="#" class="btn-icon btn-primary-icon-light size-7">
                                                    <i class="ri-edit-2-line text-inherit text-[13px]"></i>
                                                </a>
                                                <a href="#" class="btn-icon btn-danger-icon-light size-7">
                                                    <i class="ri-delete-bin-line text-inherit text-[13px]"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                    </div>
                    {{-- @include('lfcms.components.pagination.pagination', ['paginator' => $articles]) --}}
                </div>
            </div>
            
            @include('lfcms.pages.user.create')
        </div>
    </div>
</div>

<script>
    document.getElementById("refreshButton").addEventListener("click", function () {
        const url = "/lfcms/administrator"; // Pastikan endpoint ini mengembalikan JSON

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error("Gagal memuat data");
                }
                return response.json();
            })
            .then(data => {
                const container = document.getElementById("dataContainer");
                container.innerHTML = "";

                if (data.length > 0) {
                    data.forEach((user, index) => {
                        container.innerHTML += `
                            <tr>
                                <td class="p-6 py-4">${index + 1}</td>
                                <td class="p-6 py-4">${user.first_name} ${user.last_name}</td>
                                <td class="p-6 py-4">${user.email}</td>
                                <td class="p-6 py-4">${user.email_verified_at || '-'}</td>
                                <td class="p-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <a href="#" class="btn-icon btn-primary-icon-light size-7">
                                            <i class="ri-edit-2-line text-inherit text-[13px]"></i>
                                        </a>
                                        <a href="#" class="btn-icon btn-danger-icon-light size-7">
                                            <i class="ri-delete-bin-line text-inherit text-[13px]"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>`;
                    });
                } else {
                    container.innerHTML = `<tr><td colspan="5" class="p-6 text-center">Tidak ada data yang tersedia</td></tr>`;
                }
            })
            .catch(error => {
                console.error("Terjadi kesalahan:", error);
            });
    });
</script>

<script>
    document.getElementById("searchInput").addEventListener("keyup", function () {
    const query = this.value.toLowerCase(); // Ambil nilai input pencarian dan ubah ke huruf kecil
    const rows = document.querySelectorAll("#dataContainer tr"); // Ambil semua baris dalam tabel

    rows.forEach(row => {
        const name = row.children[1].textContent.toLowerCase(); // Ambil kolom nama
        const email = row.children[2].textContent.toLowerCase(); // Ambil kolom email

        // Periksa apakah query ada di nama atau email
        if (name.includes(query) || email.includes(query)) {
            row.style.display = ""; // Tampilkan baris
        } else {
            row.style.display = "none"; // Sembunyikan baris
        }
    });
});

</script>

<script>
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

</script>

<style>
    .iconpicker-popover {
        top: 300px;
    }

    .modal-back {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 999999 !important;
    }

    .modal-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        max-width: 500px;
        width: 100%;
    }

    .close {
        float: right;
        cursor: pointer;
        font-size: 24px;
    }

    .modal-footer {
        text-align: right;
    }
</style>
@endsection
		