@extends('lfcms.layouts.app')
@section('page_title', 'Testimonial | Learn Flow CMS')
@section('content')
    <div
        class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
        <div class="grid grid-cols-12">
            <div class="col-span-full">
                <div class="card p-0">
                    <div class="flex-center-between p-6 pb-4 border-b border-gray-200 dark:border-dark-border">
                        <h3 class="text-lg card-title leading-none">Data Testimonial</h3>
                        @include('lfcms.components.breadcrumb.custom', ['title' => 'Testimonial'])
                    </div>
                    <div class="p-6">
                        <div class="flex-center-between">
                            <div class="flex items-center gap-5">
                                <form class="max-w-80 relative">
                                    <span class="absolute top-1/2 -translate-y-[40%] left-2.5">
                                        <i class="ri-search-line text-gray-900 dark:text-dark-text text-[14px]"></i>
                                    </span>
                                    <input type="text" placeholder="Search for..." class="form-input pl-[30px]">
                                </form>
                                <button type="button"
                                    class="font-spline_sans text-sm px-1 text-gray-900 dark:text-dark-text flex-center gap-1.5">
                                    <i class="ri-loop-right-line text-inherit text-sm"></i>
                                    <span>Refresh</span>
                                </button>
                            </div>
                            <button class="btn b-light btn-primary-light dk-theme-card-square"
                                onclick="openModal('modalTambahTestimonial')">
                                <i class="ri-add-fill text-inherit"></i>
                                <span>Tambah Testimonial</span>
                            </button>

                        </div>
                        <div class="overflow-x-auto mt-5">
                            <table
                                class="table-auto border-collapse w-full whitespace-nowrap text-left text-gray-500 dark:text-dark-text font-medium">
                                <thead>
                                    <tr class="text-primary-500">
                                        <th
                                            class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">
                                            No</th>
                                        <th
                                            class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">
                                            Nama & Profesi</th>
                                        <th
                                            class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">
                                            Status</th>
                                        <th
                                            class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-dark-border-three">
                                    @foreach ($testimonial as $index => $testimonial)
                                        <tr>
                                            <td class="p-6 py-4">{{ $loop->iteration }}</td>
                                            <td class="p-6 py-4">
                                                <div class="flex items-center gap-3.5">
                                                    <div>
                                                        <h6 class="leading-none text-heading font-semibold">
                                                            <a href="#">{{ $testimonial->name }}</a>
                                                        </h6>
                                                        <p class="font-spline_sans text-sm font-light mt-1">
                                                            {{ $testimonial->profession }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="p-6 py-4">
                                                <span
                                                    class="badge {{ $testimonial->status == 'Publik' ? 'badge-success-light' : 'badge-warning-light' }} rounded-full">
                                                    {{ $testimonial->status }}
                                                </span>
                                            </td>
                                            <td class="p-6 py-4">
                                                <div class="flex items-center gap-2">
                                                    <a href="#" class="btn-icon btn-primary-icon-light size-7">
                                                        <i class="ri-edit-2-line text-inherit text-[13px]"></i>
                                                    </a>
                                                    <a href="#" class="btn-icon btn-danger-icon-light size-7">
                                                        <i class="ri-delete-bin-line text-inherit text-[13px]"></i>
                                                    </a>
                                                    <div class="relative ml-5">
                                                        <button data-popover-target="td-3-{{ $index }}"
                                                            data-popover-trigger="click" data-popover-placement="bottom-end"
                                                            class="size-7 rounded-50 flex-center hover:bg-gray-200 dark:hover:bg-dark-icon">
                                                            <i class="ri-more-2-fill text-inherit"></i>
                                                        </button>
                                                        <ul id="td-3-{{ $index }}"
                                                            class="hidden popover-target invisible [&.visible]:!block"
                                                            data-popover>
                                                            <li>
                                                                <a class="popover-item" href="#">More</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                        {{ $testimonial->links('lfcms.components.pagination.pagination') }}
                    </div>
                    <div id="modalTambahTestimonial"
                        class="modal-back ml-auto mr-auto fixed w-[40%] h-auto inset-0 z-50 hidden overflow-y-auto bg-black bg-opacity-50 transition duration-300 transform scale-95">
                        <div class="flex items-center justify-center min-h-screen px-4">
                            <div class="w-full max-w-lg bg-white rounded-lg shadow-lg dark:bg-dark-card p-6">
                                <!-- Header Modal -->
                                <div class="flex justify-between items-center border-b pb-4 mb-4">
                                    <h2 class="text-lg font-semibold text-heading">Tambah Testimonial</h2>
                                    <button onclick="closeModal('modalTambahTestimonial')"
                                        class="text-gray-500 hover:text-gray-700">
                                        <i class="ri-close-fill text-lg"></i>
                                    </button>
                                </div>

                                <!-- Form -->
                                <form action="{{ route('testimonial.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="space-y-4">
                                        <div>
                                            <label for="name" class="form-label">Nama</label>
                                            <input type="text" name="name" id="name" class="form-input" required>
                                        </div>
                                        <div>
                                            <label for="profession" class="form-label">Profesi</label>
                                            <input type="text" name="profession" id="profession" required
                                                class="form-input">
                                        </div>
                                        <div>
                                            <label for="status" class="form-label">Status</label>
                                            <select name="status" id="status" required class="form-input form-select w-full h-11">>
                                                <option value="publik">Publik</option>
                                                <option value="draft">Draft</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="description" class="form-label">Deskripsi</label>
                                            <textarea name="description" id="description" rows="4" required class="form-input"></textarea>
                                        </div>
                                        <div>
                                            <label class="form-label">Gambar</label>
                                            <div class="file-container file-input-label bg-transparent text-[#727175] h-11 dk-theme-card-square">
                                                <span class="px-3 rounded-lg rounded-r-none border-r bg-[#EEEEEE] dark:bg-dark-icon border-input-border dark:border-dark-border-four flex-center dk-theme-card-square">
                                                    Choose File
                                                </span>
                                                <label for="image" class="p-2.5 grow">
                                                    <input type="file" name="image" accept="image/*" id="image" class="hidden file-src">
                                                    <span class="file-name text-sm">No file choose</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Footer Modal -->
                                    <div class="flex justify-end mt-6">
                                        <button type="button" onclick="closeModal('modalTambahTestimonial')"
                                            class="px-4 py-2 text-sm text-gray-600 bg-gray-200 rounded hover:bg-gray-300">
                                            Batal
                                        </button>
                                        <button type="submit"
                                            class="ml-3 px-4 py-2 text-sm text-white bg-primary rounded hover:bg-primary-dark">
                                            Simpan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Tambahkan Modal -->

    <script>
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.remove('hidden', 'scale-95', 'opacity-0');
            modal.classList.add('scale-100', 'opacity-100');
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.remove('scale-100', 'opacity-100');
            modal.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300); // Sesuaikan dengan durasi animasi
        }
    </script>

@endsection
