@extends('dashboard.layouts.layouts')
@section('page_title', 'LearnFlow | Kategori Kursus')
@section('content')

    <div class="lg:col-start-4 lg:col-span-9">
        <div
            class="p-10px md:px-10 md:py-50px mb-30px bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5">
            <div
                class="mb-6 pb-5 border-b-2 border-borderColor dark:border-borderColor-dark flex items-center justify-between">
                <h2 class="text-2xl font-bold text-blackColor dark:text-blackColor-dark">Kategori Kursus</h2>
                <label for="modalCreateToggle"
                    class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-primaryColor bg-primaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-primaryColor h-8 px-3 leading-8 justify-center rounded-md transition duration-300 ease-in-out cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-plus">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    Tambah Kategori
                </label>
            </div>
            <form action="{{ route('kategori-kursus.index') }}" method="GET"
                class="grid grid-cols md:grid-cols-3 xl:grid-cols-12 gap-x-30px">
                <div class="xl:col-start-1 xl:col-span-6">
                    <p
                        class="text-xs leading-1.8 tracking-[.5px] uppercase text-bodyColor dark:text-bodyColor-dark mb-6px font-semibold opacity-50">
                        KATEGORI
                    </p>
                    <div class="bg-whiteColor rounded-md relative">
                        <select name="category" onchange="this.form.submit()"
                            class="bg-transparent text-darkBlue w-full p-13px focus:outline-none block appearance-none leading-1.5 relative z-20 focus:shadow-select rounded-md">
                            <option value="All" {{ request('category') == 'All' ? 'selected' : '' }}>All</option>
                            @foreach ($categoryNames as $name)
                                <option value="{{ $name }}" {{ request('category') == $name ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                        <i class="icofont-simple-down absolute top-1/2 right-3 -translate-y-1/2 block text-lg z-10"></i>
                    </div>
                </div>

                <div class="xl:col-start-7 xl:col-span-3">
                    <p
                        class="text-xs leading-1.8 tracking-[.5px] uppercase text-bodyColor dark:text-bodyColor-dark mb-6px font-semibold opacity-50">
                        URUTKAN BERDASARKAN
                    </p>
                    <div class="bg-whiteColor rounded-md relative">
                        <select name="sort" onchange="this.form.submit()"
                            class="bg-transparent text-darkBlue w-full p-13px focus:outline-none block appearance-none leading-1.5 relative z-20 focus:shadow-select rounded-md">
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Terbaru</option>
                            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Terlama</option>
                            <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Nama (A-Z)
                            </option>
                            <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Nama (Z-A)
                            </option>
                        </select>
                        <i class="icofont-simple-down absolute top-1/2 right-3 -translate-y-1/2 block text-lg z-10"></i>
                    </div>
                </div>

                <div class="xl:col-start-10 xl:col-span-3">
                    <p
                        class="text-xs leading-1.8 tracking-[.5px] uppercase text-bodyColor dark:text-bodyColor-dark mb-6px font-semibold opacity-50">
                        STATUS
                    </p>
                    <div class="bg-whiteColor rounded-md relative">
                        <select name="status" onchange="this.form.submit()"
                            class="bg-transparent text-darkBlue w-full p-13px focus:outline-none block appearance-none leading-1.5 relative z-20 focus:shadow-select rounded-md">
                            <option value="All" {{ request('status') == 'All' ? 'selected' : '' }}>Semua</option>
                            <option value="publik" {{ request('status') == 'publik' ? 'selected' : '' }}>Publik</option>
                            <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                        </select>
                        <i class="icofont-simple-down absolute top-1/2 right-3 -translate-y-1/2 block text-lg z-10"></i>
                    </div>
                </div>
            </form>
            <hr class="my-4 border-contentColor opacity-35">
            <div class="overflow-auto">
                <table class="w-full text-left text-nowrap">
                    <thead
                        class="text-sm md:text-base text-blackColor dark:text-blackColor-dark bg-lightGrey5 dark:bg-whiteColor-dark leading-1.8 md:leading-1.8">
                        <tr>
                            <th class="px-5px py-10px md:px-5">No</th>
                            <th class="px-5px py-10px md:px-5">Name</th>
                            <th class="px-5px py-10px md:px-5">Status</th>
                            <th class="px-5px py-10px md:px-5">Tanggal Dibuat</th>
                            <th class="px-5px py-10px md:px-5 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-size-13 md:text-base text-contentColor dark:text-contentColor-dark font-normal">
                        @foreach ($categories as $index => $category)
                            <tr class="leading-1.8 md:leading-1.8">
                                <td class="px-5px py-10px md:px-5">{{ $index + 1 }}</td>
                                <td class="px-5px py-10px md:px-5">{{ $category->name }}</td>
                                <td class="px-5px py-10px md:px-5">
                                    <p class="text-xs">
                                        <span
                                            class="h-22px inline-block px-7px 
                                                bg-{{ $category->status == 'publik' ? 'greencolor2' : ($category->status == 'draft' ? 'skycolor' : 'red') }} 
                                                leading-22px font-bold text-whiteColor rounded-md">
                                            {{ ucfirst($category->status) }}
                                        </span>
                                    </p>
                                </td>
                                <td>{{ $category->created_at->format('d M Y H:i') }}</td>
                                <td class="px-5px py-10px md:px-5">
                                    <div class="dashboard__button__group">
                                        <a class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-primaryColor bg-primaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-primaryColor h-30px w-full px-14px leading-30px justify-center rounded-md my-5px edit-category"
                                            href="javascript:void(0);" data-id="{{ $category->id }}"
                                            data-name="{{ $category->name }}" data-slug="{{ $category->slug }}"
                                            data-status="{{ $category->status }}" data-action="edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg>
                                            Edit
                                        </a>
                                        <a class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-secondaryColor bg-secondaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-secondaryColor h-30px w-full px-14px leading-30px justify-center rounded-md my-5px"
                                            href="{{ route('kategori-kursus.destroy', $category->id) }}"
                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $category->id }}').submit();">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-trash-2">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path
                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                </path>
                                                <line x1="10" y1="11" x2="10" y2="17">
                                                </line>
                                                <line x1="14" y1="11" x2="14" y2="17">
                                                </line>
                                            </svg>
                                            Delete</a>
                                        <form id="delete-form-{{ $category->id }}"
                                            action="{{ route('kategori-kursus.destroy', $category->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $categories->links('dashboard.components.pagination.custom') }}
    </div>

    @include('dashboard.pages.kategori-kursus.edit')
    @include('dashboard.pages.kategori-kursus.create')

@endsection
