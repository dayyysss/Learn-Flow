<!-- resources/views/admin/menu/partials/_menu_list.blade.php -->

<div class="bg-white w-7/12 rounded shadow-lg p-4">
  <div class="flex justify-between flex-wrap-reverse mb-5 items-center">
      <h2 class="mb-2">Menu</h2>
      <div class="flex gap-3">
          <button id="saveOrder" class="btn bg-blue-500 btn-primary" style="display: none;">Simpan</button>
          <a href="/sally/hak-akses" class="flex btn btn-primary bg-blue-500">
              <x-heroicon-s-lock-closed class="w-4 mr-1 text-white" />Hak Akses Menu
          </a>
          <button id="openModalMenuList" class="btn bg-indigo-700 btn-primary items-center flex">
              <x-heroicon-o-plus class="w-4 mr-1 text-white" />Tambah
          </button>
      </div>
  </div>
  <div class="dd w-full" id="nestable">
      <ol class="dd-list">
          @foreach($nestedMenus as $menu)
              <li class="dd-item" data-id="{{ $menu['id'] }}">
                  <div class="flex">
                      <div class="dd-handle w-fit dd3-handle"></div>
                      <div class="flex pl-7 flex-1 dd1-content justify-between">
                          {{ $menu['content'] }}
                          <div class="flex">
                              <a href="javascript:void(0)" class="text-blue-600 hover:underline" onclick="openEditModalList({{ json_encode($menu) }})">
                                  <x-heroicon-o-pencil-square class="w-4 text-cyan-800"/>
                              </a>
                              <form action="{{ route('menu.destroy', $menu['id']) }}" method="POST" style="display:inline;">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                      <x-heroicon-o-trash class="w-4 text-cyan-800"/>
                                  </button>
                              </form>
                          </div>
                      </div>
                  </div>
                  @if(!empty($menu['children']))
                      <ol class="dd-list">
                          @foreach($menu['children'] as $child)
                              <li class="dd-item" data-id="{{ $child['id'] }}">
                                  <div class="flex">
                                      <div class="dd-handle dd3-handle"></div>
                                      <div class="flex pl-7 flex-1 dd1-content justify-between">
                                          {{ $child['content'] }}
                                          <div class="flex">
                                              <a href="javascript:void(0)" class="text-blue-600 hover:underline" onclick="openEditModalList({{ json_encode($child) }})">
                                                  <x-heroicon-o-pencil-square class="w-4 text-cyan-800"/>
                                              </a>
                                              <form action="{{ route('menu.destroy', $child['id']) }}" method="POST" style="display:inline;">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button type="submit" class="btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                      <x-heroicon-o-trash class="w-4 text-cyan-800"/>
                                                  </button>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              </li>
                          @endforeach
                      </ol>
                  @endif
              </li>
          @endforeach
      </ol>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fontawesome-iconpicker/3.2.0/js/fontawesome-iconpicker.min.js"></script>
<script src="{{ asset('assets\lfcms\js\pages\menu.js') }}">