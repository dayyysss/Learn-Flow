<?php

namespace App\Http\Controllers\LFCMS;

use App\Http\Controllers\Controller;
use App\Models\LFCMS\MenuList;
use App\Models\LFCMS\MenuType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class MenuListController extends Controller
{

    public function indexbyId(Request $request)
{
    $menuTypes = MenuType::all();
    $menus = collect(); 

    

    // Pastikan view yang digunakan adalah layout yang memanggil komponen sidebar
    return view('layouts.layout', compact('menuList')); // Mengirim data ke view
}





    public function index(Request $request)
    {
        $menuTypes = MenuType::all();
        $menus = collect(); // Inisialisasi $menus sebagai collection kosong
    
        // Cek apakah ada menu_type yang dikirim dari request
        if ($request->has('menu_type') && !empty($request->menu_type)) {
            // Mengambil menu berdasarkan tipe menu yang dipilih
            $menus = MenuList::where('menutype_id', $request->menu_type)
                ->with(['children' => function($query) {
                    $query->orderBy('order'); // Urutkan children berdasarkan order
                }])
                ->whereNull('parent_id')
                ->orderBy('order') // Urutkan menu berdasarkan order
                ->get();
        } else {
            // Ambil semua menu dengan menutype_id = 1 jika tidak ada menu_type yang dikirim
            $menus = MenuList::where('menutype_id', 1)
                ->with(['children' => function($query) {
                    $query->orderBy('order');
                }])
                ->whereNull('parent_id')
                ->orderBy('order')
                ->get();
        }
    
        // Ambil semua menu untuk sidebar
        $menuSidebar = MenuList::where('menutype_id', 2)
        ->orderBy('order')
        ->get();
    
        // Jika permintaan AJAX, kembalikan JSON
        if ($request->ajax()) {
            return response()->json($this->buildNestedMenu($menus));
        }

        
        
        // Mengubah $menus ke format yang sesuai untuk Nestable
        $nestedMenus = $this->buildNestedMenu($menus);
     
        
        return view('lfcms.pages.menu.index', compact('menuTypes', 'menus', 'nestedMenus', 'menuSidebar'));
    }
    
    // Fungsi untuk membangun struktur nested menu
    private function buildNestedMenu($menus)
{
    $menuArray = [];
    foreach ($menus as $menu) {
        // Panggil fungsi ini secara rekursif untuk mengambil anak-anak
        $children = $this->buildNestedMenu($menu->children);
     
        $menuArray[] = [
            'id' => $menu->id,
            'content' => $menu->name,
            'slug' => $menu->slug,
            'link' => $menu->url,
            'menutype_id' => $menu->menutype_id,
            'icon' => $menu->ikon,
            'permissions' => [
                'create' => optional($menu->createPermission)->name ?? false,
                'index' => optional($menu->indexPermission)->name ?? false,
                'update' => optional($menu->updatePermission)->name ?? false,
                'delete' => optional($menu->deletePermission)->name ?? false,
            ],
            'hasChildren' => count($children) > 0,
            'children' => $children,
        ];
        
        
    }
    return $menuArray;
}

    
    // private function buildNestedMenusidebar($menuSidebar)
    // {
    //     $menuArray = [];
    //     foreach ($menuSidebar as $menu) {
    //         $children = $menu->children->map(function($child) {
    //             return [
    //                 'id' => $child->id,
    //                 'content' => $child->name, // Sesuaikan dengan nama kolom yang ada
    //                 'link' => $child->url, // Tambahkan link jika ada
    //                 'icon' => $child->ikon, // Tambahkan icon jika ada
    //             ];
    //         })->toArray();
    
    //         $menuArray[] = [
    //             'id' => $menu->id,
    //             'content' => $menu->name,
    //             'link' => $menu->url, // Tambahkan link jika ada
    //             'icon' => $menu->ikon, // Tambahkan icon jika ada
    //             'hasChildren' => count($children) > 0, // Menandai jika ada children
    //             'children' => $children,
    //         ];
    //     }
    //     return $menuArray;
    // }
    



    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'url' => 'nullable',
            'ikon' => 'nullable',
            'menutype_id' => 'required|exists:menu_types,id',
            'permissions' => 'nullable',
            'permissions.*' => 'in:index,create,update,delete',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Buat slug
        $slug = '';
    if ($request->menutype_id == 1) {
        $slug = Str::slug($request->name);
        $count = MenuList::where('slug', 'like', $slug . '%')->count();
        $slug = $count > 0 ? $slug . '-' . ($count + 1) : $slug;
    } else {
        $count = MenuList::count();
        $slug = $count + 1; // Menggunakan angka bertambah
    }
    
        // Simpan data menu ke tabel MenuList
        $menu = MenuList::create([
            'name' => $request->name,
            'url' => $request->url,
            'ikon' => $request->ikon,
            'menutype_id' => $request->menutype_id,
            'slug' => $slug, // Simpan slug
        ]);
    
        // Cek apakah ada permission yang dipilih
        $permissionIds = [];
    
        if ($request->has('permissions')) {
            foreach ($request->permissions as $permission) {
                $createdPermission = Permission::create(['name' => $menu->slug . '.' . $permission]);
                $permissionIds[$permission] = $createdPermission->id; // Simpan ID permission
            }
        }
    
        // Update kolom create, index, update, delete dengan ID permission atau null
        $menu->update([
            'create' => $permissionIds['create'] ?? null,
            'index'  => $permissionIds['index'] ?? null,
            'update' => $permissionIds['update'] ?? null,
            'delete' => $permissionIds['delete'] ?? null,
        ]);
    
        return redirect()->route('menu.index')->with('success', 'Menu dan permissions berhasil ditambahkan!');
    }
    


    public function getMenusByMenuType($menuTypeId)
    {
        $menus = MenuList::where('menutype_id', $menuTypeId)->get();

        // Pastikan view menampilkan daftar menu yang benar
        $html = view('lfcms.pages.menu.partials.menu_list', compact('menus'))->render();

        return response()->json(['html' => $html]);
    }


    public function destroy($id)
    {
        // Temukan menu berdasarkan ID
        $menu = MenuList::findOrFail($id);

        // Hapus permissions terkait dengan menu
        Permission::where('name', 'like', $menu->name . '.%')->delete();

        // Hapus menu
        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Menu dan permissions berhasil dihapus!');
    }

    public function updateOrder(Request $request)
    {
        $menus = $request->input('menu');
    
        foreach ($menus as $index => $menu) {
            $menuModel = MenuList::find($menu['id']);
    
            if (!$menuModel) {
                \Log::error("Menu ID {$menu['id']} not found.");
                continue;
            }
    
            // Cek apakah parent valid (bukan dirinya sendiri atau descendant-nya)
            $parentId = isset($menu['parent_id']) ? $menu['parent_id'] : null;
            if ($this->isDescendant($menuModel, $parentId)) {
                \Log::error("Cannot move menu ID {$menu['id']} under one of its descendants.");
                continue;
            }
    
            // Proses slug
            $slug = $menu['slug'] ?? $menuModel->slug; // Ambil slug dari input atau gunakan slug asli
            $originalSlug = $slug;
    
            // Cek apakah slug duplikat dan ubah jika diperlukan
            $slugExists = MenuList::where('slug', $slug)
                                  ->where('id', '!=', $menu['id'])
                                  ->exists();
            $counter = 2;
            while ($slugExists) {
                $slug = $originalSlug . '-' . $counter;
                $slugExists = MenuList::where('slug', $slug)
                                      ->where('id', '!=', $menu['id'])
                                      ->exists();
                $counter++;
            }
    
            // Update slug dan field lainnya
            $menuModel->slug = $slug;
            $menuModel->parent_id = $parentId;
            $menuModel->order = $index + 1;
            $menuModel->save();
    
            // Update children secara rekursif jika ada
            if (!empty($menu['children'])) {
                $this->updateChildMenuOrder($menu['children'], $menuModel->id);
            }
        }
    }
    
    // Pastikan child juga di-update dengan urutan baru
    protected function updateChildMenuOrder($children, $parentId)
    {
        foreach ($children as $index => $child) {
            $childModel = MenuList::find($child['id']);
    
            if (!$childModel) {
                \Log::error("Child ID {$child['id']} not found.");
                continue;
            }
    
            // Cek apakah child valid
            if ($this->isDescendant($childModel, $parentId)) {
                \Log::error("Cannot move child ID {$child['id']} under one of its descendants.");
                continue;
            }
    
            // Update child parent dan order
            $childModel->parent_id = $parentId;
            $childModel->order = $index + 1;
            $childModel->save();
    
            if (!empty($child['children'])) {
                $this->updateChildMenuOrder($child['children'], $childModel->id);
            }
        }
    }
    
    // Fungsi untuk memastikan tidak ada loop dalam hirarki menu
    protected function isDescendant($menuModel, $potentialParentId)
    {
        if (is_null($potentialParentId)) {
            return false; // Tidak ada parent, aman
        }
    
        $parent = MenuList::find($potentialParentId);
    
        while ($parent) {
            if ($parent->id == $menuModel->id) {
                return true; // Terjadi loop
            }
            $parent = $parent->parent_id ? MenuList::find($parent->parent_id) : null;
        }
    
        return false;
    }
    

//     public function updateParent(Request $request)
// {
//     $child = MenuList::find($request->child_id);
//     if ($child) {
//         $child->parent_id = $request->parent_id; // Pastikan field parent_id di tabel ada
//         $child->save();
//         return response()->json(['success' => true]);
//     }
//     return response()->json(['success' => false, 'message' => 'Menu not found.']);
// }



// public function removeParent(Request $request)
// {
//     $menuID = $request->input('menu_id');

//     // Set parent_id menjadi null untuk mengeluarkan dari parent
//     MenuList::where('id', $menuID)->update(['parent_id' => null]);

//     return response()->json(['success' => true]);
// }


public function edit($id)
{
    // Ambil menu berdasarkan ID
    $menu = MenuList::findOrFail($id);

    // Ambil semua tipe menu dan permissions
    $menuTypes = MenuType::all();
    $allPermissions = ['index', 'create', 'update', 'delete']; // Semua permission yang mungkin
    $assignedPermissions = Permission::where('name', 'like', $menu->slug . '.%')->pluck('name')->toArray(); // Permissions terkait

    // Mengirimkan data ke view
    return view('lfcms.pages.menu.modal', compact('menu', 'menuTypes', 'allPermissions', 'assignedPermissions'));
}

public function update(Request $request, $id)
{
    // Validasi input
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'url' => 'nullable',
        'ikon' => 'nullable',
        'menutype_id' => 'required|exists:menu_types,id',
        'permissions' => 'nullable|array',
        'permissions.*' => 'in:index,create,update,delete',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Temukan menu berdasarkan ID
    $menu = MenuList::findOrFail($id);
    $oldSlug = $menu->slug; // Simpan slug lama

    // Update slug jika name berubah
    if ($menu->name != $request->name) {
        $menu->slug = $this->generateSlug($request->name, $request->menutype_id, $oldSlug);
    }

    // Mulai transaksi
    DB::beginTransaction();

    try {
        // Update data menu
        $menu->update([
            'name' => $request->name,
            'url' => $request->url,
            'ikon' => $request->ikon,
            'menutype_id' => $request->menutype_id,
        ]);

        // Kelola permissions
        $permissionIds = [];
        $existingPermissions = Permission::where('name', 'like', $oldSlug . '.%')->get();

        foreach ($existingPermissions as $existingPermission) {
            $basePermissionName = str_replace($oldSlug . '.', '', $existingPermission->name);
            
            if (in_array($basePermissionName, $request->permissions)) {
                // Update permission name dengan slug baru
                $existingPermission->name = $menu->slug . '.' . $basePermissionName;
                $existingPermission->save(); // Simpan perubahan
                $permissionIds[$basePermissionName] = $existingPermission->id; // Simpan ID
            } else {
                // Hapus permission yang tidak ada dalam request
                $existingPermission->delete();
            }
        }

        // Buat permissions baru yang tidak ada dalam existingPermissions
        foreach ($request->permissions as $permission) {
            if (!isset($permissionIds[$permission])) {
                $createdPermission = Permission::create(['name' => $menu->slug . '.' . $permission]);
                $permissionIds[$permission] = $createdPermission->id;
            }
        }

        // Hanya update kolom create, index, update, delete jika permissions ada
        $menu->update([
            'create' => $permissionIds['create'] ?? $menu->create,
            'index'  => $permissionIds['index'] ?? $menu->index,
            'update' => $permissionIds['update'] ?? $menu->update,
            'delete' => $permissionIds['delete'] ?? $menu->delete,
        ]);

        // Commit transaksi
        DB::commit();

        return redirect()->route('menu.index')->with('success', 'Menu berhasil diperbarui!');
    } catch (\Exception $e) {
        // Rollback transaksi jika terjadi kesalahan
        DB::rollback();

        // Tambahkan log untuk mengetahui kesalahan
        \Log::error('Error updating menu: ' . $e->getMessage());
        return redirect()->back()->withErrors('Terjadi kesalahan saat memperbarui menu.')->withInput();
    }
}

protected function generateSlug($name, $menutype_id, $existingSlug = null)
{
    $slug = Str::slug($name);
    
    // Jika menutype_id adalah 1, gunakan logika slug berdasarkan hitungan slug yang sudah ada
    if ($menutype_id == 1) {
        // Menghindari duplikasi slug
        $count = MenuList::where('slug', 'like', $slug . '%')->where('slug', '!=', $existingSlug)->count();
        $slug = $count > 0 ? $slug . '-' . ($count + 1) : $slug;
    } else {
        // Jika menutype_id bukan 1, gunakan angka bertambah
        $count = MenuList::count();
        $slug = $count + 1; // Menggunakan angka bertambah
    }

    return $slug;
}

public function getMenu()
{
    $menus = MenuList::with('children')->get(); // Adjust according to your menu structure
    return response()->json($menus);
}


}