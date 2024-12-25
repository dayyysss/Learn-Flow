@extends('lfcms.layouts.app')
@section('page_title', 'Klien | Learn Flow CMS')
@section('content')
    <div
        class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
        <div class="grid grid-cols-12">
            <div class="col-span-full">
                <div class="card p-0">
                    <div class="flex-center-between p-6 pb-4 border-b border-gray-200 dark:border-dark-border">
                        <h3 class="text-lg card-title leading-none">Data Klien</h3>
                        @include('lfcms.components.breadcrumb.custom', ['title' => 'Klien'])
                    </div>
                    <div class="p-6">
                        <div class="flex-center-between">
                            <div class="flex items-center gap-5">
                            <form class="max-w-80 relative">
                                    <span class="absolute top-1/2 -translate-y-[40%] left-2.5">
                                        <i class="ri-search-line text-gray-900 dark:text-dark-text text-[14px]"></i>
                                    </span>
                                    <input 
                                    type="text" 
                                    name="search" 
                                    value="{{ $search ?? '' }}" 
                                    placeholder="Search for..." 
                                    class="form-input pl-[30px]">
                                </form>
                                <button type="button"
                                    class="font-spline_sans text-sm px-1 text-gray-900 dark:text-dark-text flex-center gap-1.5"
                                    onclick="window.location='{{ route('klien.index') }}'">
                                    <i class="ri-loop-right-line text-inherit text-sm"></i>
                                    <span>Refresh</span>
                                </button>
                            </div>
                            <button class="btn b-light btn-primary-light dk-theme-card-square"
                                onclick="window.location.href='{{ route('klien.create') }}'">
                                <i class="ri-add-fill text-inherit"></i>
                                <span>Tambah Klien</span>
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
                                            Nama</th>
                                        <th
                                            class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">
                                            Status</th>
                                        <th
                                            class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">
                                            Gambar</th>
                                        <th
                                            class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-dark-border-three">
                                    @forelse ($clients as $client)
                                        <tr>
                                            <td class="p-6 py-4">
                                                {{ $loop->iteration + ($clients->currentPage() - 1) * $clients->perPage() }}
                                            </td>
                                            <td class="p-6 py-4">
                                                <div class="flex items-center gap-3.5">
                                                    <a href="#">{{ $client->name }}</a>
                                                </div>
                                            </td>
                                            <td class="p-6 py-4">
                                                <span
                                                    class="badge 
                                            {{ $client->status == 'Publik' ? 'badge-success-light' : ($client->status == 'draft' ? 'badge-danger-light' : 'badge-warning-light') }}">
                                                    {{ $client->status }}
                                                </span>
                                            </td>
                                            <td class="p-6 py-4">
                                                <div class="flex flex-col gap-2">
                                                    <a href="#" class="size-12 rounded-50 overflow-hidden">
                                                        <!-- Menggunakan path dinamis dengan direktori public/clients -->
                                                        <img src="{{ asset('public/clients/' . $client->image) }}"
                                                            alt="client">
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="p-6 py-4">
                                                <div class="flex items-center gap-2">
                                                    <a href="javascript:void(0)" 
                                                        class="text-blue-600 hover:underline btn-icon btn-primary-icon-light size-7" 
                                                        onclick="openEditModal({{ json_encode($client) }})">
                                                        <i class="ri-edit-2-line text-inherit text-[13px]"></i>
                                                    </a>

                                                    <form action="{{ route('klien.destroy', $client->id) }}" method="POST" class="inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                class="btn-icon btn-danger-icon-light size-7"
                                                                onclick="return confirm('Apakah Anda yakin ingin menghapus klien ini?')">
                                                            <i class="ri-delete-bin-line text-inherit text-[13px]"></i>
                                                        </button>
                                                    </form>

                                                    <div class="relative ml-5">
                                                        <button data-popover-target="td-3-0" data-popover-trigger="click"
                                                            data-popover-placement="bottom-end"
                                                            class="size-7 rounded-50 flex-center hover:bg-gray-200 dark:hover:bg-dark-icon">
                                                            <i class="ri-more-2-fill text-inherit"></i>
                                                        </button>
                                                        <ul id="td-3-0"
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
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            <div class="alert alert-danger" style="margin: 20px 0;">
                                                Data Tidak Tersedia!
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- START PAGINATION -->
                        <div class="flex-center-between mt-5">
                            <div class="font-spline_sans text-sm text-gray-900 dark:text-dark-text">
                                Showing {{ $clients->firstItem() }} to {{ $clients->lastItem() }} of {{ $clients->total() }} entries
                            </div>
                            <nav>
                                <ul class="flex items-center gap-1">
                                    <!-- Previous Page Link -->
                                    <li>
                                        <a href="{{ $clients->previousPageUrl() }}"
                                            class="font-spline_sans font-medium flex-center size-8 rounded-50 text-gray-900 dark:text-dark-text hover:bg-primary-500 hover:text-white dark:bg-dark-card-two">
                                            <i class="ri-arrow-left-s-line text-inherit"></i>
                                        </a>
                                    </li>
                                    
                                    <!-- Page Links -->
                                    @foreach ($clients->getUrlRange(1, $clients->lastPage()) as $page => $url)
                                        <li>
                                            <a href="{{ $url }}"
                                                class="font-spline_sans font-medium flex-center size-8 rounded-50 text-gray-900 dark:text-dark-text {{ $page == $clients->currentPage() ? 'bg-primary-500 text-white' : '' }}">
                                                {{ $page }}
                                            </a>
                                        </li>
                                    @endforeach
                                    <!-- Next Page Link -->
                                    <li>
                                        <a href="{{ $clients->nextPageUrl() }}"
                                            class="font-spline_sans font-medium flex-center size-8 rounded-50 text-gray-900 dark:text-dark-text hover:bg-primary-500 hover:text-white dark:bg-dark-card-two">
                                            <i class="ri-arrow-right-s-line text-inherit"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <!-- Modal Edit Client -->
<div id="editClientModal" class="modal hidden fixed inset-0 z-50 flex justify-center items-center bg-purple-900 bg-opacity-50">
    <div class="modal-content bg-white rounded-lg p-4 w-full max-w-md" style="max-height: 70vh; overflow-y: auto;">
        <form id="editClientForm">
            <div class="grid grid-cols-12 gap-x-4">

                <!-- Start Edit Klien -->
                <div class="col-span-full card">
                    <div class="p-0.5">
                        <h6 class="card-title">Edit Klien</h6>
                        <div class="mt-7 pt-0.5 flex flex-col gap-5">

                            <div class="col-span-full sm:col-span-4">
                                <div class="col-span-full xl:col-auto leading-none mb-2">
                                    <label for="clientName" class="form-label">Nama Klien</label> 
                                    <input type="text" id="clientName" class="form-input mt-1 block w-full" required />
                                </div>

                                <div class="col-span-full xl:col-auto leading-none mb-2">
                                    <label for="clientUrl" class="form-label">URL Klien</label> 
                                    <input type="text" id="clientUrl" class="form-input mt-1 block w-full" required />
                                </div>

                                <div class="col-span-full xl:col-auto leading-none mb-2">
                                    <label class="form-label">Status Klien</label>
                                    <select id="clientStatus" class="singleSelect" required>
                                        <option value="Publik">Publik</option>
                                        <option value="Draft">Draft</option>
                                        <option value="Archived">Arsip</option>
                                    </select>
                                </div>

                                <p class="text-xs text-gray-500 dark:text-dark-text leading-none font-semibold mb-3">Thumbnail (548x234)</p>
                                <label for="thumbnailsrc" class="file-container ac-bg text-xs leading-none font-semibold mb-3 cursor-pointer aspect-[4/1.5] flex flex-col items-center justify-center gap-2.5 border border-dashed border-gray-900 dark:border-dark-border rounded-10 dk-theme-card-square">
                                    <input type="file" id="thumbnailsrc" hidden class="img-src peer/file">
                                    <span class="flex-center flex-col peer-[.uploaded]/file:hidden">
                                        <span class="size-10 md:size-15 flex-center bg-primary-200 dark:bg-dark-icon rounded-50 dk-theme-card-square">
                                            <img src="assets/images/icons/upload-file.svg" alt="icon" class="dark:brightness-200 dark:contrast-100 w-1/2 sm:w-auto">
                                        </span>
                                        <span class="mt-2 text-gray-500 dark:text-dark-text">Choose file</span>
                                    </span>
                                </label>
                            </div>

                            <!-- Tombol Update -->
                            <div class="flex-center !justify-end">
                                <button type="button" onclick="closeEditModal()" class="btn btn-secondary mr-2">Batal</button>
                                <button type="submit" class="btn b-solid btn-primary-solid btn-lg dk-theme-card-square">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Edit Klien -->
        </form>
    </div>
</div>


<script>
    function openEditModal(client) {
        // Populate modal fields with client data
        document.getElementById('clientName').value = client.name || '';
        document.getElementById('clientUrl').value = client.url || '';
        document.getElementById('clientStatus').value = client.status || '';
        
        // Show modal
        document.getElementById('editClientModal').classList.remove('hidden');
    }

    function closeEditModal() {
        // Hide modal
        document.getElementById('editClientModal').classList.add('hidden');
    }

    // Example form submission handler
    document.getElementById('editClientForm').addEventListener('submit', function(event) {
        event.preventDefault();
        // Process form data
        console.log('Form submitted!');
        closeEditModal();
    });
</script>

    
@endsection
