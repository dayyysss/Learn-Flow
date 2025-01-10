<div
    class="xl:col-start-5 xl:col-span-8 bg-white p-30px rounded-md mt-50px relative"
    data-aos="fade-up"
>
    <div>
        <h4 class="text-2xl sm:text-size-28 font-bold leading-1.2 text-blackColor dark:text-blackColor-dark">
            Latest Assignment Lists
        </h4>
        <hr class="border-borderColor2 dark:opacity-30 my-4">

        <div class="grid grid-cols md:grid-cols-3 xl:grid-cols-12 gap-x-30px">
            <div class="xl:col-start-1 xl:col-span-6">
                <p class="text-xs leading-1.8 tracking-[.5px] uppercase text-bodyColor dark:text-bodyColor-dark mb-6px font-semibold opacity-50">
                    COURSES
                </p>
                <div class="bg-whiteColor rounded-md relative">
                    <select class="bg-transparent text-darkBlue w-full p-13px focus:outline-none block appearance-none leading-1.5 relative z-20 focus:shadow-select rounded-md">
                        <option selected="" value="All">All</option>
                        <option value="Web Design">Web Design</option>
                        <option value="Graphic">Graphic</option>
                        <option value="English">English</option>
                        <option value="Spoken English">Spoken English</option>
                        <option value="Art Painting">Art Painting</option>
                        <option value="App Development">App Development</option>
                        <option value="Web Application">Web Application</option>
                        <option value="PHP Development">PHP Development</option>
                    </select>
                    <i class="icofont-simple-down absolute top-1/2 right-3 -translate-y-1/2 block text-lg z-10"></i>
                </div>
            </div>
            <div class="xl:col-start-7 xl:col-span-3">
                <p class="text-xs leading-1.8 tracking-[.5px] uppercase text-bodyColor dark:text-bodyColor-dark mb-6px font-semibold opacity-50">
                    SHORT BY
                </p>
                <div class="bg-whiteColor rounded-md relative">
                    <select class="bg-transparent text-darkBlue w-full p-13px focus:outline-none block appearance-none leading-1.5 relative z-20 focus:shadow-select rounded-md">
                        <option selected="" value="Default">Default</option>
                        <option value="Trending">Trending</option>
                        <option value="Price: low to high">Price: low to high</option>
                        <option value="Price: high to low">Price: high to low</option>
                    </select>
                    <i class="icofont-simple-down absolute top-1/2 right-3 -translate-y-1/2 block text-lg z-10"></i>
                </div>
            </div>
            <div class="xl:col-start-10 xl:col-span-3">
                <p class="text-xs leading-1.8 tracking-[.5px] uppercase text-bodyColor dark:text-bodyColor-dark mb-6px font-semibold opacity-50">
                    SHORT BY OFFER
                </p>
                <div class="bg-whiteColor rounded-md relative">
                    <select class="bg-transparent text-darkBlue w-full p-13px focus:outline-none block appearance-none leading-1.5 relative z-20 focus:shadow-select rounded-md">
                        <option selected="" value="Free">Free</option>
                        <option value="Paid">Paid</option>
                        <option value="Premium">Premium</option>
                    </select>
                    <i class="icofont-simple-down absolute top-1/2 right-3 -translate-y-1/2 block text-lg z-10"></i>
                </div>
            </div>
        </div>
        <hr class="my-4 border-contentColor opacity-35" >

        <div class="overflow-auto">
            <table class="w-full border text-left text-nowrap">
                <thead class="border p-5 text-sm md:text-base text-blackColor dark:text-blackColor-dark bg-lightGrey5 dark:bg-whiteColor-dark leading-1.8 md:leading-1.8" style="background-color: var(--blueLight1)">
                    <tr>
                        <th class="border px-3 py-1 text-center">No.</th>
                        <th class="border px-3 py-1">Nama</th>
                        <th class="border px-3 py-1">Waktu Pengiriman</th>
                        <th class="border px-3 py-1">Nilai</th>
                        <th class="border px-3 py-1">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($assignments as $index => $assignment)
                        <tr>
                            <td class="border px-3 py-1 text-center">{{ $index + 1 }}</td>
                            <td class="border px-3 py-1">
                                <span class="font-bold">{{ $assignment->title }}</span>
                                <p>
                                    <a href="#">{{ $assignment->user->name ?? 'Tidak Diketahui' }}</a>
                                </p>
                            </td>
                            <td class=" text-gray-700 border px-3 py-1">
                                {{ $assignment->created_at ? $assignment->created_at->format('d M Y, H:i') : '-' }}
                            </td>
                            <td class=" text-gray-700 border italic px-3 py-1">
                                {{ $assignment->nilai ?? '(belum dinilai)'}}
                            </td>
                            <td class="border px-3 py-1">
                                <button 
                                    class="bg-primaryColor text-white px-3 py-1 rounded"
                                    data-modal-target="assignment-modal-{{ $assignment->id }}"
                                    data-modal-toggle="assignment-modal-{{ $assignment->id }}"
                                >
                                    Detail
                                </button>
                            </td>
                        </tr>
                    @endforeach

                    @if($assignments->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center">No assignments available for this module.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@foreach($assignments as $assignment)
<!-- Modal for each assignment -->
<!-- Modal for each assignment -->
<div id="assignment-modal-{{ $assignment->id }}" tabindex="-1" aria-hidden="true" class="hidden assignment_modal fixed top-0 left-0 right-0 z-50 w-full h-full bg-opacity-50">
    <div class="relative w-full h-full flex items-center justify-center">
        <div class="bg-white w-3/4 md:w-1/3 rounded-lg shadow-lg">

            <div class="p-5">
            <div class="flex justify-between">
                <h3 class="text-xl font-semibold mb-4">Assignment Detail</h3>
                <button 
    data-modal-toggle="assignment-modal-{{ $assignment->id }}" 
    class="right-2 text-gray-500"
    title="Close Modal"
>
    <i class="icofont-close"></i>
</button>
            </div>
            
            <!-- Flex container for image and user details -->
            <div class="mb-4 flex gap-5 border-b py-3 items-center">
                <img 
    class="w-15 bg-black border h-15 rounded-full" 
    src="{{ $assignment->user->image ? asset('storage/' . $assignment->user->image) : asset('assets/images/avatar/default-avatar.png') }}" 
    alt="{{ $assignment->user->name }}"
>

                <div class="flex w-full justify-between">
                <div>
                    <p class="font-semibold">{{ $assignment->user->name ?? 'Tidak Diketahui' }}</p>
                    <p class="text-sm text-gray-600">{{ $assignment->user->profesi ?? 'Tidak Diketahui' }}</p>
                </div>

                <div class="mb-2 text-xs">
                    {{ $assignment->created_at ? $assignment->created_at->format('d M Y, H:i') : '-' }}
                </div>

                </div>
            </div>
            
            @if($assignment->task)
                                    @php
                                        // Mendekode data JSON yang disimpan di kolom 'task'
                                        $tasks = json_decode($assignment->task, true)['tasks'] ?? [];
                                    @endphp
                                    @if(count($tasks) > 0)
                                        <ul>
                                            @foreach($tasks as $task)
                                            <li class="flex gap-4 border rounded-md mb-2 p-2 items-center">
                                                <!-- Jika file adalah gambar, tampilkan gambar -->
                                                @if(strpos(mime_content_type(storage_path('app/public/' . $task['file'])), 'image') === 0)
                                                    <img src="{{ asset('storage/' . $task['file']) }}" alt="{{ basename($task['file']) }}" class="w-15 h-15 rounded-l-lg">
                                                @endif
                                            
                                                <!-- Menampilkan nama file dengan pengaturan overflow -->
                                                <p class="truncate mr-5 w-full">{{ basename($task['file']) }}</p>
                                            </li>
                                            
                                            @endforeach
                                        </ul>
                                        
                                    @endif
                                @endif

                                <div class="mt-5">
                                    <label class="text-darkBlue dark:text-darkBlue-dark mb-2 block" for="content">Assignment Content</label>
                                    <textarea id="content" name="content" class="w-full px-3 py-1 bg-transparent text-darkBlue border border-borderColor6 placeholder:opacity-80 focus:outline-none focus:shadow-select rounded-md">{{$assignment->content}}</textarea>
                                </div>
                            
                                </div>
                                
                                <div class="mb-4 border-t">
                                    <form method="POST" class="p-5 flex items-center gap-4" action="{{ route('assignments.grade', $assignment->id) }}">
                                        @csrf
                                        @method('PUT')
                                    
                                        <!-- Bagian Input Nilai -->
                                        <div class="flex-grow">
                                            <label class="text-darkBlue dark:text-darkBlue-dark mb-2 block" for="grade-{{ $assignment->id }}">Nilai</label>
                                            <div class="flex items-center gap-2">
                                                <input 
                                                    type="number" 
                                                    id="grade-{{ $assignment->id }}" 
                                                    name="grade" 
                                                    class="flex-grow px-3 py-1 bg-transparent text-darkBlue border border-borderColor6 placeholder:opacity-80 focus:outline-none focus:shadow-select rounded-md"
                                                    placeholder="Enter grade (0-100)"
                                                    min="0"
                                                    max="100"
                                                    value="{{ $assignment->nilai ?? 'Masukkan Nilai' }}" 
                                                    required
                                                >
                                    
                                                <!-- Tombol Kirim -->
                                                <button 
                                                    type="submit" 
                                                    class="flex items-center justify-center bg-primaryColor text-white p-3 rounded-full"
                                                    title="Submit Grade"
                                                >
                                                    <!-- SVG Icon -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-7 h-7">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l-7-7 7-7m0 0l7 7-7 7z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    
                                </div>
                                
            
        </div>
    </div>


</div>


@endforeach

<script>
    // Modal functionality
    document.querySelectorAll('[data-modal-toggle]').forEach(trigger => {
        trigger.addEventListener('click', function () {
            const modalId = this.getAttribute('data-modal-toggle');
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.toggle('hidden');
            } else {
                console.error(`Modal with ID "${modalId}" not found.`);
            }
        });
    });
</script>


<style>
    .assignment_modal {
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 999999 !important;
    }
</style>
