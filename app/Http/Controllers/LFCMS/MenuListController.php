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
        $menus = collect();

        // Validasi menu_type
        if ($request->has('menu_type') && !empty($request->menu_type)) {
            $menus = MenuList::where('menutype_id', $request->menu_type)
                ->with([
                    'children' => function ($query) {
                        $query->orderBy('order');
                    }
                ])
                ->whereNull('parent_id')
                ->orderBy('order')
                ->get();
        } else {
            $menus = MenuList::where('menutype_id', 1)
                ->with([
                    'children' => function ($query) {
                        $query->orderBy('order');
                    }
                ])
                ->whereNull('parent_id')
                ->orderBy('order')
                ->get();
        }

        // Ambil menu untuk sidebar
        $menuSidebar = MenuList::where('menutype_id', 2)
            ->orderBy('order')
            ->get();

        // Jika permintaan AJAX
        if ($request->ajax()) {
            return response()->json($this->buildNestedMenu($menus));
        }

        // Membangun struktur nested menu
        $nestedMenus = $this->buildNestedMenu($menus);

        return view('lfcms.pages.menu.index', compact('menuTypes', 'menus', 'nestedMenus', 'menuSidebar'));
    }

    // Fungsi untuk membangun struktur nested menu
    private function buildNestedMenu($menus)
    {
        $menuArray = [];
        foreach ($menus as $menu) {
            // Menghindari duplikasi
            if (!in_array($menu->id, array_column($menuArray, 'id'))) {
                // Rekursi untuk anak-anak
                $children = $this->buildNestedMenu($menu->children);

                $menuArray[] = [
                    'id' => $menu->id,
                    'name' => $menu->name,
                    'slug' => $menu->slug,
                    'url' => $menu->url,
                    'menutype_id' => $menu->menutype_id,
                    'ikon' => $menu->ikon,
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
            $count = MenuList::where('menutype_id', $request->menutype_id)->count();

            // Generate satu huruf acak
            $randomLetter = chr(rand(65, 90)); // ASCII A-Z

            // Kombinasi menutype_id, count, dan huruf acak
            $slug = $request->menutype_id . '-' . ($count + 1) . $randomLetter;
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

        // Jika menutype_id bukan 1, otomatis isi permission 'index'
        if ($request->menutype_id != 1) {
            // Buat permission untuk 'index'
            $createdPermission = Permission::create(['name' => $menu->slug . '.index']);
            $permissionIds['index'] = $createdPermission->id; // Simpan ID permission untuk 'index'
        }

        // Jika ada permissions yang dipilih, proses
        if ($request->has('permissions')) {
            foreach ($request->permissions as $permission) {
                $createdPermission = Permission::create(['name' => $menu->slug . '.' . $permission]);
                $permissionIds[$permission] = $createdPermission->id; // Simpan ID permission
            }
        }

        // Update kolom create, index, update, delete dengan ID permission atau null
        $menu->update([
            'create' => $permissionIds['create'] ?? null,
            'index' => $permissionIds['index'] ?? null,
            'update' => $permissionIds['update'] ?? null,
            'delete' => $permissionIds['delete'] ?? null,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Menu berhasil dibuat.',
            'redirect_url' => route('menu.index') // URL tujuan
        ]);
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

        return response()->json([
            'status' => 'success',
            'message' => 'Menu berhasil dihapus!',
            'redirect_url' => route('menu.index') // URL tujuan
        ]);
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
            $parentId = $menu['parent_id'] ?? null;
            if ($this->isDescendant($menuModel, $parentId)) {
                \Log::error("Cannot move menu ID {$menu['id']} under one of its descendants.");
                continue;
            }

            // Proses slug jika slug input berbeda dari slug asli
            $slug = $menu['slug'] ?? $menuModel->slug;
            if ($slug !== $menuModel->slug) {
                $slug = $this->generateUniqueSlug($slug, $menu['id']);
                $menuModel->slug = $slug;
            }

            // Update parent_id dan order
            $menuModel->parent_id = $parentId;
            $menuModel->order = $index + 1;
            $menuModel->save();

            // Update children secara rekursif jika ada
            if (!empty($menu['children'])) {
                $this->updateChildMenuOrder($menu['children'], $menuModel->id);
            }
        }
    }


    // Fungsi untuk memastikan slug unik
    protected function generateUniqueSlug($slug, $menuId)
    {
        $originalSlug = $slug;
        $slugExists = MenuList::where('slug', $slug)
            ->where('id', '!=', $menuId)
            ->exists();
        $counter = 2;

        while ($slugExists) {
            $slug = $originalSlug . '-' . $counter;
            $slugExists = MenuList::where('slug', $slug)
                ->where('id', '!=', $menuId)
                ->exists();
            $counter++;
        }

        return $slug;
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
        \Log::info('Update menu called with id: ' . $id);

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

            // Default untuk kolom permissions di tabel menu
            $permissionIds = [
                'create' => null,
                'index' => null,
                'update' => null,
                'delete' => null,
            ];

            // Ambil permissions yang sudah ada di database untuk slug lama
            $existingPermissions = Permission::where('name', 'like', $oldSlug . '.%')->get();

            foreach ($existingPermissions as $existingPermission) {
                $basePermissionName = str_replace($oldSlug . '.', '', $existingPermission->name);

                if (in_array($basePermissionName, $request->permissions)) {
                    // Update permission dengan slug baru
                    $existingPermission->name = $menu->slug . '.' . $basePermissionName;
                    $existingPermission->save();
                    $permissionIds[$basePermissionName] = $existingPermission->id;
                } else {
                    // Set permission yang tidak dipilih ke null di menu, tetapi jangan hapus dari database
                    $permissionIds[$basePermissionName] = null;
                }
            }

            // Tambah permission baru jika belum ada dalam database
            foreach ($request->permissions as $permission) {
                if (!isset($permissionIds[$permission])) {
                    $createdPermission = Permission::create(['name' => $menu->slug . '.' . $permission]);
                    $permissionIds[$permission] = $createdPermission->id;
                }
            }

            // Update kolom permissions di tabel menu
            $menu->update([
                'create' => $permissionIds['create'],
                'index' => $permissionIds['index'],
                'update' => $permissionIds['update'],
                'delete' => $permissionIds['delete'],
            ]);

            // Commit transaksi
            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Menu berhasil diperbarui.',
                'redirect_url' => route('menu.index') // URL tujuan
            ]);
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollback();

            \Log::error('Error updating menu: ' . $e->getMessage());
            return redirect()->back()->withErrors('Terjadi kesalahan saat memperbarui menu.')->withInput();
        }
    }

    protected function generateSlug($name, $menutype_id, $existingSlug = null)
    {
        $slug = Str::slug($name);

        // Jika menutype_id adalah 1, gunakan logika slug berdasarkan nama
        if ($menutype_id == 1) {
            // Menghindari duplikasi slug
            $count = MenuList::where('slug', 'like', $slug . '%')
                ->where('slug', '!=', $existingSlug)
                ->count();
            $slug = $count > 0 ? $slug . '-' . ($count + 1) : $slug;
        } else {
            // Jika menutype_id bukan 1, tambahkan angka bertambah dan satu huruf acak
            $count = MenuList::count();
            $randomLetter = chr(rand(65, 90)); // Huruf acak dari A-Z
            $slug = ($count + 1) . $randomLetter; // Menambahkan angka dan huruf acak
        }
        return $slug;
    }

    public function getMenu()
    {
        $menus = MenuList::with('children')->get(); // Adjust according to your menu structure
        return response()->json($menus);
    }
}
