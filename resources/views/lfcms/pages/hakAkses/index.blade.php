@extends('lfcms.layouts.app')

@section('page_title', 'LearnFlow CMS | Hak Akses')

@section('content')
<div
class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif        
        <div class="flex">
            <!-- Sidebar untuk memilih role -->
            <div class="w-80 bg-white h-fit rounded shadow-lg p-4">

                <div class="flex mb-5 justify-between items-center">
                    <label>Level:</label>
                    <div class="w-fit">
                        {{-- @permission('hak-akses.create') --}}
                            <button onclick="document.getElementById('addRoleModal').style.display='flex'"
                                class="btn btn-primary bg-indigo-700 items-center text-white flex p-1 rounded">
                               Tambah
                            </button>
                        {{-- @endpermission --}}
                    </div>
                </div>

                <form id="select_role_form">
                    <ul class="list-none p-0">
                        @foreach ($roles as $index => $role)
                            <li class="flex items-center justify-between border border-gray-200 p-3">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="role_id" value="{{ $role->id }}"
                                        class="form-radio h-4 w-4 text-blue-600 role-radio"
                                        {{ $index === 0 ? 'checked' : '' }}>
                                    <span class="ml-2">{{ $role->name }}</span>
                                </label>
                                <div class="flex">
                                    {{-- @permission('hak-akses.update') --}}
                                        <a href="javascript:void(0)" class="text-blue-600 hover:underline"
                                            onclick="openEditModal({{ json_encode($role) }})">
                                            <i class="ri-edit-2-line text-inherit text-[13px]"></i>
                                        </a>
                                    {{-- @endpermission

                                    @permission('hak-akses.delete') --}}
                                        <form id="deleteForm-{{ $role->id }}"
                                            action="{{ route('role.destroy', $role->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <div id="deleteContainer-{{ $role->id }}" style="display:inline;">
                                                <button type="button" class="btn-sm btn-danger delete-button"
                                                    onclick="confirmDelete({{ $role->id }})">
                                                    <i class="ri-delete-bin-line text-inherit text-[13px] {{ $role->id == '1' ? 'hidden' : 'block' }}"></i>
                                                </button>
                                            </div>
                                        </form>
                                    {{-- @endpermission --}}
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </form>
            </div>

            <!-- Bagian Hak Akses Menu -->
            <div class="w-75 ml-5 bg-white rounded shadow-lg p-4">
                <form id="role_form" action="{{ route('hak-akses.update', $selectedRole->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="flex justify-between">
                        <h4 class="text-lg font-semibold mb-4">Hak Akses Menu</h4>
                        {{-- @permission('hak-akses.update') --}}
                            <button type="submit"
                                class="btn b-solid btn-primary-solid dk-theme-card-square py-2">Simpan Hak
                                Akses</button>
                        {{-- @endpermission --}}
                    </div>


                    <div id="hakAksesMenu">
                        <!-- Konten hak akses akan dimuat di sini melalui AJAX -->
                        @include('lfcms.pages.hakAkses.partials.role_access', [
                            'menuLists' => $menuLists,
                            'rolePermissions' => $rolePermissions,
                        ])
                    </div>


                </form>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Role -->
    <div id="addRoleModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg shadow-lg w-1/3 p-6">
            <h5 class="text-lg font-semibold mb-4">Tambah Role Baru</h5>
            <form id="form-sweet" action="{{ route('hak-akses.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="roleName" class="block text-sm font-medium text-gray-700">Nama Role</label>
                    <input type="text" id="roleName" name="name"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
                    <button type="button" class="ml-2 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded"
                        onclick="document.getElementById('addRoleModal').style.display='none'">Batal</button>
                </div>
            </form>
        </div>

        <!-- Modal Edit Role -->
    </div>
    <div id="editRoleModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg shadow-lg w-1/3 p-6">
            <h5 class="text-lg font-semibold mb-4">Edit Role</h5>
            <form id="editRoleForm" method="POST" action="{{ route('hak-akses.update', 'role_id_placeholder') }}">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="editRoleName" class="block text-sm font-medium text-gray-700">Nama Role</label>
                    <input type="text" id="editRoleName" name="name"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                    <input type="hidden" id="editRoleId" name="role_id">
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
                    <button type="button" class="ml-2 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded"
                        onclick="document.getElementById('editRoleModal').style.display='none'">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const alerts = document.querySelectorAll('.success-message');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 3000); // 5 detik
            });
        });
    </script>
    <script>
        function openEditModal(role) {
            // Set nilai input pada modal
            document.getElementById('editRoleId').value = role.id; // Mengisi ID role
            document.getElementById('editRoleName').value = role.name; // Mengisi nama role

            // Update action form dengan ID role
            document.getElementById('editRoleForm').action = `{{ url('lfcms/role') }}/${role.id}`;

            // Tampilkan modal
            document.getElementById('editRoleModal').style.display = 'flex';
        }
    </script>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tangkap semua radio button role
            const roleRadios = document.querySelectorAll('.role-radio');

            roleRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    // Ambil ID role yang dipilih
                    const roleId = this.value;

                    // Kirim permintaan AJAX
                    fetch(`{{ route('hak-akses.index') }}?role_id=${roleId}`, {
                            method: 'GET',
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                            },
                        })
                        .then(response => response.text())
                        .then(data => {
                            // Update bagian hak akses dengan respons
                            document.getElementById('hakAksesMenu').innerHTML = data;
                            // Update form action untuk role yang dipilih
                            document.getElementById('role_form').action =
                                `{{ route('hak-akses.update', '') }}/${roleId}`;
                        })
                        .catch(error => console.error('Error:', error));
                });
            });

        });
    </script>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data ini akan terhapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`{{ url('/lfcms/role') }}/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.status === "success") {
                            Swal.fire(
                                'Terhapus!',
                                data.message,
                                'success'
                            ).then(() => {
                                window.location.href = data
                                .redirect_url; // Redirect ke halaman indeks
                            });
                        } else {
                            Swal.fire(
                                'Gagal!',
                                'Data tidak berhasil dihapus.',
                                'error'
                            );
                        }
                    })
                    .catch(error => {
                        Swal.fire(
                            'Error!',
                            'Terjadi kesalahan saat menghapus data. ' + error,
                            'error'
                        );
                        console.error('Error:', error);
                    });
            }
        });
    }
</script>

@endsection
