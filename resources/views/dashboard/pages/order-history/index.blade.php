@extends('dashboard.layouts.layouts')

@section('page_title', 'LearnFlow | Order History')

@section('content')
    <div class="lg:col-start-4 lg:col-span-9">
        <div class="p-10px md:px-10 md:py-50px mb-30px bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5">
            <div class="mb-6 pb-5 border-b-2 border-borderColor dark:border-borderColor-dark">
                <h2 class="text-2xl font-bold text-blackColor dark:text-blackColor-dark">Riwayat Pembelian</h2>
            </div>

            <div class="overflow-auto">
                <table class="w-full text-left">
                    <thead class="text-sm md:text-base text-blackColor dark:text-blackColor-dark bg-lightGrey5 dark:bg-whiteColor-dark leading-1.8 md:leading-1.8">
                        <tr>
                            <th class="px-5px py-10px md:px-5">Order ID</th>
                            <th class="px-5px py-10px md:px-5">Nama Kursus</th>
                            <th class="px-5px py-10px md:px-5">Tanggal</th>
                            <th class="px-5px py-10px md:px-5">Harga</th>
                            <th class="px-5px py-10px md:px-5">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-size-13 md:text-base text-contentColor dark:text-contentColor-dark font-normal">
                        @foreach ($registrations as $registration)
                            <tr class="leading-1.8 md:leading-1.8">
                                <th class="px-5px py-10px md:px-5 font-normal text-wrap">
                                    <p class="text-blackColor dark:text-blackColor-dark">#{{ $registration->id }}</p>
                                </th>
                                <td class="px-5px py-10px md:px-5">
                                    <p>{{ $registration->course->name }}</p>
                                </td>
                                <td class="px-5px py-10px md:px-5">
                                    <p>{{ $registration->created_at->format('F j, Y') }}</p>
                                </td>
                                <td class="px-5px py-10px md:px-5">
                                    <p>{{ number_format($registration->harga, 2) }}</p>
                                </td>
                                <td class="px-5px py-10px md:px-5">
                                    <p class="text-xs">
                                        <span class="h-22px inline-block px-7px bg-green-500 leading-22px font-bold rounded-md">
                                            {{ $registration->registration_status }}
                                        </span>
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination Links -->
            <div class="mt-4">
                {{ $registrations->links() }}
            </div>
        </div>
    </div>
@endsection
