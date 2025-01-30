@extends('lfcms.layouts.app')
@section('page_title', 'Diskon | Learn Flow CMS')
@section('content')
    <div
        class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
        <div class="grid grid-cols-12">
            <div class="col-span-full">
                <div class="card p-0">
                    <div class="flex-center-between p-6 pb-4 border-b border-gray-200 dark:border-dark-border">
                        <h3 class="text-lg card-title leading-none">Daftar Diskon</h3>
                        @include('lfcms.components.breadcrumb.custom', ['title' => 'Diskon'])
                    </div>
                    <div class="p-6">
                        <div class="flex-center-between">
                            <div class="flex items-center gap-5">
                                <form class="max-w-80 relative">
                                    <span class="absolute top-1/2 -translate-y-[40%] left-2.5">
                                        <i class="ri-search-line text-gray-900 dark:text-dark-text text-[14px]"></i>
                                    </span>
                                    <input id="searchInput" type="text" placeholder="Search for..."
                                        class="form-input pl-[30px]">
                                </form>
                                <button type="button"
                                    class="font-spline_sans text-sm px-1 text-gray-900 dark:text-dark-text flex-center gap-1.5">
                                    <i class="ri-loop-right-line text-inherit text-sm"></i>
                                    <span>Refresh</span>
                                </button>
                            </div>
                            <button onclick="openModal()" class="btn b-light btn-primary-light dk-theme-card-square">
                                <i class="ri-add-fill text-inherit"></i>
                                <span>Tambah Diskon</span>
                            </button>
                        </div>

                        <div class="overflow-x-auto mt-5">
                            <table
                                class="table-auto border-collapse w-full whitespace-nowrap text-left text-gray-500 dark:text-dark-text font-medium">
                                <thead>
                                    <tr class="text-primary-500">
                                        <th class="p-6 py-4 bg-gray-100 dark:bg-dark-card-two">No</th>
                                        <th class="p-6 py-4 bg-gray-100 dark:bg-dark-card-two">Kode Diskon</th>
                                        <th class="p-6 py-4 bg-gray-100 dark:bg-dark-card-two">Jenis</th>
                                        <th class="p-6 py-4 bg-gray-100 dark:bg-dark-card-two">Kursus</th>
                                        <th class="p-6 py-4 bg-gray-100 dark:bg-dark-card-two">Nominal</th>
                                        <th class="p-6 py-4 bg-gray-100 dark:bg-dark-card-two">Berlaku</th>
                                        <th class="p-6 py-4 bg-gray-100 dark:bg-dark-card-two">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="dataContainer" class="divide-y divide-gray-200 dark:divide-dark-border-three">
                                    @foreach ($discounts as $index => $discount)
                                        <tr>
                                            <td class="p-6 py-4">{{ $index + 1 }}</td>
                                            <td class="p-6 py-4">{{ $discount->discount_code }}</td>
                                            <td class="p-6 py-4">{{ ucfirst($discount->type) }}</td>
                                            <td class="p-6 py-4">{{ $discount->course?->name ?? 'Semua Kursus' }}</td>
                                            <td class="p-6 py-4">
                                                Rp{{ number_format($discount->discount_amount, 0, ',', '.') }}</td>
                                            <td class="p-6 py-4">
                                                {{ $discount->start_date ? $discount->start_date->format('d M Y H:i') : 'N/A' }}
                                                -
                                                {{ $discount->end_date ? $discount->end_date->format('d M Y H:i') : 'N/A' }}
                                            </td>
                                            <td class="p-6 py-4">
                                                <div class="flex items-center gap-2">
                                                    <button onclick="editDiscount({{ $discount }})"
                                                        class="btn-icon btn-primary-icon-light size-7">
                                                        <i class="ri-edit-2-line text-inherit text-[13px]"></i>
                                                    </button>
                                                    <form action="{{ route('admin.discounts.destroy', $discount->id) }}"
                                                        method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn-icon btn-danger-icon-light size-7"
                                                            onclick="return confirm('Yakin ingin menghapus diskon ini?');">
                                                            <i class="ri-delete-bin-line text-inherit text-[13px]"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Tambah/Edit Diskon --}}
    <div id="discountModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg w-full max-w-md max-h-[90vh] overflow-y-auto">
            <h2 id="modalTitle"
                class="block text-lg font-semibold mb-4 text-gray-900 dark:text-gray-800 dark:bg-gray-800 text-center">
                Tambah Diskon</h2>
            <form id="discountForm" action="{{ route('admin.discounts.store') }}" method="POST"
                onsubmit="return validateForm(event)">
                @csrf
                <input type="hidden" id="discountId" name="id">

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-900">Kode Diskon</label>
                    <div class="flex items-center gap-2">
                        <input type="text" id="discount_code" name="discount_code" class="form-input w-full" required>
                        <button type="button" onclick="generateDiscountCode()"
                            class="btn b-light btn-primary-light">Generate</button>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-900">Tipe</label>
                    <select id="type" name="type" class="form-input w-full" required onchange="toggleCourseField()">
                        <option value="global">Global</option>
                        <option value="course_specific">Spesifik Kursus</option>
                    </select>
                </div>

                <div class="mb-4" id="courseField">
                    <label class="block text-sm font-medium text-gray-900">Kursus</label>
                    <select id="course_id" name="course_id" class="form-input w-full">
                        <option value="">Semua Kursus</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-900">Nominal Diskon</label>
                    <input type="number" id="discount_amount" name="discount_amount" class="form-input w-full" required>
                </div>

                <!-- Start Date and Time -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-900">Tanggal Mulai</label>
                    <input type="datetime-local" id="start_date" name="start_date" class="form-input w-full" required>
                </div>

                <!-- End Date and Time -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-900">Tanggal Berakhir</label>
                    <input type="datetime-local" id="end_date" name="end_date" class="form-input w-full" required>
                </div>

                <div class="flex flex-col sm:flex-row justify-end gap-3 mt-4">
                    <button type="button" onclick="closeModal()"
                        class="btn b-light btn-danger-light w-full sm:w-auto">Batal</button>
                    <button type="submit" class="btn b-light btn-primary-light w-full sm:w-auto">Simpan</button>
                </div>
            </form>
        </div>
    </div>


    <script>
        function openModal() {
            document.getElementById('discountModal').classList.remove('hidden');
            document.getElementById('modalTitle').innerText = "Tambah Diskon";
            document.getElementById('discountForm').reset();
        }

        function closeModal() {
            document.getElementById('discountModal').classList.add('hidden');
        }

        function editDiscount(discount) {
            document.getElementById('discountModal').classList.remove('hidden');
            document.getElementById('modalTitle').innerText = "Edit Diskon";
            document.getElementById('discount_code').value = discount.discount_code;
            document.getElementById('type').value = discount.type;
            document.getElementById('course_id').value = discount.course_id ?? '';
            document.getElementById('discount_amount').value = discount.discount_amount ?? '';

            if (discount.start_date) {
                let startDate = new Date(discount.start_date);
                document.getElementById('start_date').value = startDate.toISOString().slice(0,
                    16);
            } else {
                document.getElementById('start_date').value = '';
            }

            if (discount.end_date) {
                let endDate = new Date(discount.end_date);
                document.getElementById('end_date').value = endDate.toISOString().slice(0,
                    16);
            } else {
                document.getElementById('end_date').value = '';
            }

            toggleCourseField();
        }


        function generateDiscountCode() {
            var randomString = Math.random().toString(36).substring(2, 10).toUpperCase();
            document.getElementById('discount_code').value = 'DISCOUNT-' +
                randomString;
        }

        function toggleCourseField() {
            const type = document.getElementById('type').value;
            const courseField = document.getElementById('courseField');

            if (type === 'global') {

                courseField.style.display = 'none';
            } else {

                courseField.style.display = 'block';
            }
        }

        function validateForm(event) {
            const type = document.getElementById('type').value;
            const course_id = document.getElementById('course_id').value;

            if (type === 'course_specific' && !course_id) {
                alert("Silakan pilih kursus terlebih dahulu.");
                event.preventDefault();
                return false;
            }

            return true;
        }

        document.addEventListener('DOMContentLoaded', function() {
            toggleCourseField();
        });

        function deleteRecord(url) {
            if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                window.location.href = url;
                notify('Data berhasil dihapus!', 'success');
            }
        }
    </script>
@endsection
