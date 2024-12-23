<div id="addMenuTypeModal" class="modal-back" style="display: none">
    <div class="modal-content">
        <div class="flex justify-between">
            <h3>Tambah User</h3>
            <span class="close-tambah" style="cursor: pointer">&times;</span>
        </div>
        <form action="{{ route('administrator.store') }}" method="POST" class="space-y-4">
            @csrf

            <div class="mb-3 w-full">
                <label for="name" class="form-label text-sm font-medium text-gray-700">Username</label>
                <input type="text" class="form-control mt-1 block w-full border border-slate-400 rounded-md shadow-sm p-2 sm:text-sm" id="name" name="name" required>
            </div>

            <div class="flex w-full gap-5">
                <!-- Nama Depan -->
                <div class="mb-3 w-1/2">
                    <label for="first_name" class="form-label text-sm font-medium text-gray-700">Nama Depan</label>
                    <input type="text" class="form-control mt-1 block w-full border border-slate-400 rounded-md shadow-sm p-2 sm:text-sm" id="first_name" name="first_name" required>
                </div>
                
                <!-- Nama Belakang -->
                <div class="mb-3 w-1/2">
                    <label for="last_name" class="form-label text-sm font-medium text-gray-700">Nama Belakang</label>
                    <input type="text" class="form-control mt-1 block w-full border border-slate-400 rounded-md shadow-sm p-2 sm:text-sm" id="last_name" name="last_name" required>
                </div>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label text-sm font-medium text-gray-700">Email</label>
                <input type="email" class="form-control mt-1 block w-full border border-slate-400 rounded-md shadow-sm p-2 sm:text-sm" id="email" name="email" required>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label text-sm font-medium text-gray-700">Password</label>
                <input type="password" class="form-control mt-1 block w-full border border-slate-400 rounded-md shadow-sm p-2 sm:text-sm" id="password" name="password" required>
            </div>

            <!-- Role -->
            <div class="mb-3">
                <label for="role_id" class="form-label text-sm font-medium text-gray-700">Level</label>
                <select class="form-control mt-1 block w-full border border-slate-400 rounded-md shadow-sm p-2 sm:text-sm" id="role_id" name="role_id" required>
                    @foreach ($role as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Footer with Submit Button -->
            <div class="modal-footer flex justify-end">
                <button type="submit" class="btn b-light btn-primary-light dk-theme-card-square bg-indigo-700">Simpan</button>
            </div>
        </form>
    </div>
</div>
