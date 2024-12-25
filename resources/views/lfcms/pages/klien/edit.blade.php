@extends('lfcms.layouts.app')

@section('page_title', 'Edit Klien | Learn Flow CMS')

@section('content')
<div class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
        <form action="#">
            <div class="grid grid-cols-12 gap-x-4">

                 <!-- Start Tambah Klien -->
                <div class="col-span-full lg:col-span-5 card">
                    <div class="p-1.5">
                        <h6 class="card-title">Add media files</h6>
                        <div class="mt-7 pt-0.5 flex flex-col gap-5">
                            <div class="col-span-full sm:col-span-4">
                                <div class="col-span-full xl:col-auto leading-none mb-4">
                                    <label for="courseTitle" class="form-label">Nama Klien</label> 
                                    <input type="text" id="courseTitle" value="Advanced Python Programming" class="form-input">
                                </div>
                                <div class="col-span-full xl:col-auto leading-none mb-4">
                                    <label for="courseTitle" class="form-label">Url Klien</label> 
                                    <input type="text" id="courseTitle" value="Advanced Python Programming" class="form-input">
                                </div>
                                <div class="col-span-full xl:col-auto leading-none mb-4">
                                    <label class="form-label">Status Klien</label>
                                    <select class="singleSelect">
                                        <option disabled>Select category</option>
                                        <option value="val">Science</option>
                                        <option value="val">Mathematics</option>
                                        <option value="val">Engineering</option>
                                        <option value="val">Humanities</option>
                                        <option value="val">Social Sciences</option>
                                        <option value="val">Business</option>
                                        <option selected value="val">Computer Science</option>
                                        <option value="val">Arts</option>
                                        <option value="val">Health Sciences</option>
                                        <option value="val">Law</option>
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
                            <div class="flex-center !justify-end">
                                <button type="submit" class="btn b-solid btn-primary-solid btn-lg dk-theme-card-square">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Course Media File -->
        </div>
    </form>
</div>


@endsection
