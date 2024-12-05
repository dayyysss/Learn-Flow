<!-- resources/views/admin/menu/partials/_sidebar.blade.php -->

<div class="bg-white w-80 h-fit rounded shadow-lg p-4">
  <div class="flex mb-5 justify-between items-center">
      <label>Tipe Menu:</label>
      <div class="w-fit">
          <button id="openModal" class="btn btn-primary bg-indigo-700 items-center flex">
              <x-heroicon-s-plus class="w-4 mr-1 text-white" />Tambah
          </button>
      </div>
  </div>
  <div id="menu_type">
  @foreach($menuTypes as $type)
      <div class="flex items-center justify-between border border-gray-200 p-3">
          <div class="flex items-center">
              <input type="radio" id="menu_type_{{ $type->id }}" name="menu_type" value="{{ $type->id }}" class="mr-2 menu-type-item" 
                     {{ $loop->first ? 'checked' : '' }}>
              <label class="capitalize" for="menu_type_{{ $type->id }}">{{ $type->name }}</label>
          </div>
          <div class="flex">
              <a href="javascript:void(0)" class="text-blue-600 hover:underline" onclick="openEditModal({{ json_encode($type) }})">
                  <x-heroicon-o-pencil-square class="w-4 text-cyan-800"/>
              </a>
              <form action="{{ route('menu_type.destroy', $type->id) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                      <x-heroicon-o-trash class="w-4 text-cyan-800 {{ $type->id == '1' ? 'hidden' : 'block' }}" />
                  </button>
              </form>
          </div>
      </div>
  @endforeach
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fontawesome-iconpicker/3.2.0/js/fontawesome-iconpicker.min.js"></script>
<script src="{{ asset('js/menu.js') }}"></script>