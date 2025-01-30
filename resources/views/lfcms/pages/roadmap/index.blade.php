@extends('lfcms.layouts.app')

@section('title', 'Menu | SallyCMS')
@section('title2', 'Menu')

@section('content')

    <div class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
        <div class="flex flex-col md:flex-row gap-5">
            <!-- Sidebar: Tipe Menu -->
            <div class="bg-white md:w-80 w-full h-fit rounded shadow-lg p-4 dark:bg-dark-card-two">
                <div class="tipe-menu flex mb-5 justify-between items-center">
                    <label>Kategori Kursus</label>
                </div>

                <div id="menu_type">
                  @foreach ($categories as $type)
                      <div class="flex items-center justify-between border border-gray-200 p-3">
                          <div class="flex items-center">
                              <input type="radio" id="menu_type_{{ $type->id }}" name="menu_type"
                                  value="{{ $type->id }}" class="mr-2 menu-type-item"
                                  {{ $selectedCategoryId == $type->id ? 'checked' : '' }}
                                  onchange="filterCategory({{ $type->id }})">
                              <label class="menu_type_list capitalize"
                                  for="menu_type_{{ $type->id }}">{{ $type->name }}</label>
                          </div>
                      </div>
                  @endforeach
              </div>
              
              <script>
                  function filterCategory(categoryId) {
                      window.location.href = '?category_id=' + categoryId;
                  }
              </script>
              
            </div>

            <!-- Konten Utama: Menu -->
            <div class="bg-white md:w-7/12 w-full rounded dark:bg-dark-card-two shadow-lg p-4">
              <div class="dd" id="nestable3">
                <ol class='dd-list dd3-list'>
                    @foreach($roadmaps as $roadmap)
                        <li class="dd-item" data-id="{{ $roadmap->id }}">
                            <div class="dd-handle">
                                <span>{{ $roadmap->name }}</span>
                            </div>
                            <span class="category-name">
                                {{ optional($roadmap->course)->name }}
                            </span>
                        </li>
                    @endforeach
                    <div id="dd-empty-placeholder"></div>
                </ol>
            </div>
            
            </div>
        </div>
    </div>

    <!-- Tambahkan jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Tambahkan JS Nestable2 -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.js"></script>
    <!-- Tambahkan FontAwesome Icon Picker jika diperlukan -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fontawesome-iconpicker/3.2.0/js/fontawesome-iconpicker.min.js"></script>
    <!-- Tambahkan Custom JS -->
    <script src="{{ asset('assets/lfcms/js/pages/menu.js') }}"></script>

   

@endsection
