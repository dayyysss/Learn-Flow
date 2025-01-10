<div
    class="xl:col-start-5 xl:col-span-8 bg-white p-30px rounded-md mt-50px relative"
    data-aos="fade-up"
>
    <div>
        <h4
            class="text-2xl sm:text-size-28 font-bold leading-1.2 text-blackColor dark:text-blackColor-dark"
        >
            Latest Assignment Lists
        </h4>
        <hr class="border-borderColor2 dark:opacity-30 my-4">
        <div class="overflow-auto">
            <table class="w-full text-left text-nowrap">
                <thead
                    class="text-sm md:text-base text-blackColor dark:text-blackColor-dark bg-lightGrey5 dark:bg-whiteColor-dark leading-1.8 md:leading-1.8"
                >
                    <tr>
                        <th class="px-5px py-10px md:px-5">Assignment Name</th>
                        <th class="px-5px py-10px md:px-5">Total Marks</th>
                        <th class="px-5px py-10px md:px-5">Total Submit</th>
                        <th class="px-5px py-10px md:px-5"></th>
                    </tr>
                </thead>
                <tbody
                    class="text-size-13 md:text-base text-contentColor dark:text-contentColor-dark font-normal"
                >
                    @forelse($assignments as $assignment)
                        <tr class="leading-1.8 md:leading-1.8 {{ $loop->odd ? '' : 'bg-lightGrey5 dark:bg-whiteColor-dark' }}">
                            <th class="px-5px py-10px md:px-5 font-normal">
                                <span
                                    class="text-blackColor dark:text-blackColor-dark font-bold"
                                >
                                    {{ $assignment->title }}
                                </span>
                                <p>
                                    course:
                                    <a
                                        class="text-blackColor dark:text-blackColor-dark"
                                        href="#"
                                    >
                                        {{ $assignment->module->name }}
                                    </a>
                                </p>
                            </th>
                            <td class="px-5px py-10px md:px-5">
                                <p>{{ $assignment->total_marks }}</p>
                            </td>
                            <td class="px-5px py-10px md:px-5">
                                <p>{{ $assignment->total_submit }}</p>
                            </td>
                            <td class="px-5px py-10px md:px-5">
                                <div class="dashboard__button__group">
                                    <a
                                        class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-primaryColor bg-primaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-primaryColor h-30px w-full px-14px leading-30px justify-center rounded-md my-5px"
                                        href="{{ asset('storage/' . $assignment->file) }}"
                                        download
                                    >
                                        <i class="icofont-download"></i>
                                        Download
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-10px">
                                No assignments available for this module.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
