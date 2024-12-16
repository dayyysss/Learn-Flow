@foreach($children as $child)
    <tr>
        <!-- Indentasi sesuai level -->
        <td class="border px-4 py-2 pl-{{ $level * 4 }}">{{ $child->name }}</td>
        <td class="border px-4 py-2 text-center">
            @if($child->createPermission)
                <input type="checkbox" name="permissions[]" value="{{ $child->createPermission->id }}"
                    {{ in_array($child->createPermission->id, $rolePermissions) ? 'checked' : '' }}
                    class="form-checkbox h-4 w-4 text-blue-600">
            @endif
        </td>
        <td class="border px-4 py-2 text-center">
            @if($child->indexPermission)
                <input type="checkbox" name="permissions[]" value="{{ $child->indexPermission->id }}"
                    {{ in_array($child->indexPermission->id, $rolePermissions) ? 'checked' : '' }}
                    class="form-checkbox h-4 w-4 text-blue-600">
            @endif
        </td>
        <td class="border px-4 py-2 text-center">
            @if($child->updatePermission)
                <input type="checkbox" name="permissions[]" value="{{ $child->updatePermission->id }}"
                    {{ in_array($child->updatePermission->id, $rolePermissions) ? 'checked' : '' }}
                    class="form-checkbox h-4 w-4 text-blue-600">
            @endif
        </td>
        <td class="border px-4 py-2 text-center">
            @if($child->deletePermission)
                <input type="checkbox" name="permissions[]" value="{{ $child->deletePermission->id }}"
                    {{ in_array($child->deletePermission->id, $rolePermissions) ? 'checked' : '' }}
                    class="form-checkbox h-4 w-4 text-blue-600">
            @endif
        </td>
    </tr>

    <!-- Recursive call if there are more children -->
    @if($child->children->isNotEmpty())
        @include('lfcms.pages.hakAkses.partials.menu_children', ['children' => $child->children, 'rolePermissions' => $rolePermissions, 'level' => $level + 1])
    @endif
@endforeach
