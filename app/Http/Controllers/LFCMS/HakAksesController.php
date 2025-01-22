<?php

namespace App\Http\Controllers\LFCMS;

use App\Http\Controllers\Controller;
use App\Models\LFCMS\MenuList;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HakAksesController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua roles untuk ditampilkan
        $roles = Role::all();
    
        // Ambil role yang dipilih (default ke role pertama jika tidak ada yang dipilih)
        $selectedRoleId = $request->input('role_id', $roles->first()->id);
        $selectedRole = Role::findOrFail($selectedRoleId);
    
        // Ambil daftar menu dengan permissions dan children
        $menuLists = MenuList::where('menutype_id', 1)
            ->whereNull('parent_id') // Mengambil menu root saja
            ->with(['children' => function ($query) {
                $query->orderBy('order'); // Urutkan children berdasarkan order
            }, 'createPermission', 'indexPermission', 'updatePermission', 'deletePermission'])
            ->orderBy('order') // Urutkan root menu berdasarkan order
            ->get();
    
        // Ambil permissions yang dimiliki role yang dipilih
        $rolePermissions = $selectedRole->permissions()->pluck('id')->toArray();
    
        // Jika permintaan dari AJAX, kembalikan hanya bagian hak akses
        if ($request->ajax()) {
            return view('lfcms.pages.hakAkses.partials.role_access', compact('menuLists', 'rolePermissions'))->render();
        }
    
        // Jika bukan AJAX, kembalikan tampilan penuh
        return view('lfcms.pages.hakAkses.index', compact('roles', 'selectedRole', 'menuLists', 'rolePermissions'));
    }
    
    
        public function update(Request $request, $roleId)
        {
            $role = Role::findOrFail($roleId);
    
            // Periksa apakah permissions ada dan merupakan array
            if ($request->has('permissions') && is_array($request->permissions)) {
                // Validasi permissions
                $permissions = Permission::whereIn('id', $request->permissions)->pluck('id')->toArray();
    
                // Sinkronisasi permissions ke role
                $role->syncPermissions($permissions);
            } else {
                // Jika tidak ada permission yang dikirim, kosongkan semua permission dari role
                $role->syncPermissions([]);
            }
    
            return response()->json([
                'status' => 'success',
                'message' => 'Hak Akses berhasil diperbarui!',
                'redirect_url' => route('hak-akses.index') // URL tujuan
            ]);
        }
    
    
        public function store(Request $request)
        {
            // Validasi input
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:roles,name',

            ]);
    
            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Validasi gagal!',
                    'errors' => $validator->errors()
                ], 422);
            }
    
            // Buat role baru
            Role::create(['name' => $request->name,
            'akses' => 'backend',]);
    
            // Kembalikan response sukses
            return response()->json([
                'status' => 'success',
                'message' => 'Level berhasil ditambahkan!',
                'redirect_url' => route('hak-akses.index') // URL tujuan
            ]);
        }
    
    
        public function updateRole(Request $request, $id)
        {
            // Validasi input
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:roles,name,' . $id, // Mengizinkan nama yang sama untuk role yang sedang diperbarui
                
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
    
            // Temukan role berdasarkan ID
            $role = Role::findOrFail($id);
    
            // Update nama role
            $role->name = $request->name;
            $role->save();
    
            return response()->json([
                'status' => 'success',
                'message' => 'Level berhasil diperbarui!',
                'redirect_url' => route('hak-akses.index') // URL tujuan
            ]);
        }
    
        public function destroy($id)
        {
            // Temukan role berdasarkan ID
            $role = Role::findOrFail($id);
    
            // Hapus role
            $role->delete();
    
            // Kembalikan respons JSON
            return response()->json([
                'status' => 'success',
                'message' => 'Level berhasil dihapus!',
                'redirect_url' => route('hak-akses.index') // URL tujuan
            ]);
        }
}
