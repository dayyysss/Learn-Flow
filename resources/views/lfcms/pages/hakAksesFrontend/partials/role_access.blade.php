<table class="table-auto w-full text-left border-collapse">
  <thead>
      <tr>
          <th class="border px-4 py-2">Nama Menu</th>
          <th class="border px-4 py-2">Tambah</th>
          <th class="border px-4 py-2">Baca</th>
          <th class="border px-4 py-2">Perbarui</th>
          <th class="border px-4 py-2">Hapus</th>
      </tr>
  </thead>
  <tbody>
      @foreach($menuLists as $menu)
  <tr>
      <td class="border px-4 py-2">{{ $menu->name }}</td>
      <td class="border px-4 py-2 text-center">
          @if($menu->createPermission)
              <input type="checkbox" name="permissions[]" value="{{ $menu->createPermission->id }}"
                  {{ in_array($menu->createPermission->id, $rolePermissions) ? 'checked' : '' }}
                  class="form-checkbox h-4 w-4 text-blue-600">
          @endif
      </td>
      <td class="border px-4 py-2 text-center">
          @if($menu->indexPermission)
              <input type="checkbox" name="permissions[]" value="{{ $menu->indexPermission->id }}"
                  {{ in_array($menu->indexPermission->id, $rolePermissions) ? 'checked' : '' }}
                  class="form-checkbox h-4 w-4 text-blue-600">
          @endif
      </td>
      <td class="border px-4 py-2 text-center">
          @if($menu->updatePermission)
              <input type="checkbox" name="permissions[]" value="{{ $menu->updatePermission->id }}"
                  {{ in_array($menu->updatePermission->id, $rolePermissions) ? 'checked' : '' }}
                  class="form-checkbox h-4 w-4 text-blue-600">
          @endif
      </td>
      <td class="border px-4 py-2 text-center">
          @if($menu->deletePermission)
              <input type="checkbox" name="permissions[]" value="{{ $menu->deletePermission->id }}"
                  {{ in_array($menu->deletePermission->id, $rolePermissions) ? 'checked' : '' }}
                  class="form-checkbox h-4 w-4 text-blue-600">
          @endif
      </td>
  </tr>

  <!-- Recursive function to render children if they exist -->
  @if($menu->children->isNotEmpty())
      @include('lfcms.pages.hakAkses.partials.menu_children', ['children' => $menu->children, 'rolePermissions' => $rolePermissions, 'level' => 1])
  @endif
@endforeach

  </tbody>
</table>