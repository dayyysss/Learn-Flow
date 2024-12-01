@extends('lfcms.layouts.app')
@section('page_title', 'Tambah Artikel | Learn Flow CMS')
@section('content')
<div class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
    <form action="https://template.codexshaper.com/admin/dashkit/all-course.html">
        <div class="grid grid-cols-12 gap-x-4">
            <!-- Start Course Information -->
            <div class="col-span-full lg:col-span-7 card">
                <div class="p-1.5">
                    <h6 class="card-title">Add new course</h6>
                    <div class="mt-7 pt-0.5">
                        <div class="grid grid-cols-2 gap-x-4 gap-y-5">
                            <div class="col-span-full xl:col-auto leading-none">
                                <label for="courseTitle" class="form-label">How about a course title</label> 
                                <input type="text" id="courseTitle" placeholder="Course Title" class="form-input" required>
                            </div>
                            <div class="col-span-full xl:col-auto leading-none">
                                <label for="coursePrice" class="form-label">Course price</label>
                                <input type="number" id="coursePrice" placeholder="$200.00" class="form-input" required>
                            </div>
                            <div class="col-span-full xl:col-auto leading-none">
                                <label class="form-label">Courses category</label>
                                <select class="singleSelect">
                                    <option selected disabled>Select category</option>
                                    <option value="val">Science</option>
                                    <option value="val">Mathematics</option>
                                    <option value="val">Engineering</option>
                                    <option value="val">Humanities</option>
                                    <option value="val">Social Sciences</option>
                                    <option value="val">Business</option>
                                    <option value="val">Computer Science</option>
                                    <option value="val">Arts</option>
                                    <option value="val">Health Sciences</option>
                                    <option value="val">Law</option>
                                </select>
                            </div>
                            <div class="col-span-full xl:col-auto leading-none">
                                <label class="form-label">Courses level</label>
                                <select class="singleSelect">
                                    <option selected disabled>Select Label</option>
                                    <option value="val">Beginner</option>
                                    <option value="val">Intermediate</option>
                                    <option value="val">Advanced</option>
                                    <option value="val">Expert</option>
                                </select>
                            </div>
                            <div class="col-span-full xl:col-auto leading-none">
                                <label for="courseInstructor" class="form-label">Instructor</label>
                                <input type="text" id="courseInstructor" placeholder="Jhone Doe" class="form-input" required>
                            </div>
                            <div class="col-span-full xl:col-auto leading-none">
                                <label class="form-label">Language</label>
                                <select class="singleSelect">
                                    <option selected value="val">English</option>
                                    <option value="val">Spanish</option>
                                    <option value="val">Italian </option>
                                    <option value="val">Arabic</option>
                                </select>
                            </div>
                            <div class="col-span-full xl:col-auto leading-none">
                                <label for="courseDuration" class="form-label">Course duration</label>
                                <input type="text" id="courseDuration" placeholder="2h 30m" class="form-input" required>
                            </div>
                            <div class="col-span-full xl:col-auto leading-none">
                                <label class="form-label">Courses Type</label>
                                <select class="singleSelect">
                                    <option selected disabled>Select Course Type</option>
                                    <option value="workshop">Workshop</option>
                                    <option value="seminar">Seminar</option>
                                    <option value="online">Online</option>
                                    <option value="hybrid">Hybrid</option>
                                    <option value="self-paced">Self-paced</option>
                                    <option value="certification">Certification</option>
                                    <option value="bootcamp">Bootcamp</option>
                                </select>
                            </div>
                            <div class="col-span-full">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" rows="8" class="summernote form-input"></textarea>
                                <div class="flex items-center gap-2 mt-3.5">
                                    <input type="checkbox" name="agreeTermCondition" id="agreeTermCondition" class="accent-primary-500">
                                    <label for="agreeTermCondition" class="text-xs leading-none text-gray-500 dark:text-dark-text select-none">I am totally agree with your term & condition</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Course Information -->

            <!-- Start Course Media File -->
            <div class="col-span-full lg:col-span-5 card">
                <div class="p-1.5">
                    <h6 class="card-title">Add media files</h6>
                    <div class="mt-7 pt-0.5 flex flex-col gap-5">
                        <div class="col-span-full sm:col-span-4">
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
                        <div class="col-span-full sm:col-span-4">
                            <p class="text-xs text-gray-500 dark:text-dark-text leading-none font-semibold mb-3">Main course file</p>
                            <label for="main-file-src" class="file-container text-xs leading-none font-semibold mb-3 cursor-pointer aspect-[4/1.5] flex flex-col items-center justify-center gap-2.5 border border-dashed border-gray-900 dark:border-dark-border rounded-10 dk-theme-card-square">
                                <input type="file" id="main-file-src" hidden class="peer/file file-src">
                                <span class="flex-center flex-col">
                                    <span class="size-10 md:size-15 flex-center bg-primary-200 dark:bg-dark-icon rounded-50 dk-theme-card-square">
                                        <img src="assets/images/icons/upload-file.svg" alt="icon" class="dark:brightness-200 dark:contrast-100 w-1/2 sm:w-auto">
                                    </span>
                                    <span class="file-name text-gray-500 dark:text-dark-text mt-2">Choose file</span>
                                </span>
                            </label>
                        </div>
                        <div class="col-span-full sm:col-span-4">
                            <p class="text-xs text-gray-500 dark:text-dark-text leading-none font-semibold mb-3">Introduction file</p>
                            <label for="intro-file-src" class="file-container text-xs leading-none font-semibold mb-3 cursor-pointer aspect-[4/1.5] flex flex-col items-center justify-center gap-2.5 border border-dashed border-gray-900 dark:border-dark-border rounded-10 dk-theme-card-square">
                                <input type="file" id="intro-file-src" hidden class="peer/file file-src">
                                <span class="flex-center flex-col">
                                    <span class="size-10 md:size-15 flex-center bg-primary-200 dark:bg-dark-icon rounded-50 dk-theme-card-square">
                                        <img src="assets/images/icons/upload-file.svg" alt="icon" class="dark:brightness-200 dark:contrast-100 w-1/2 sm:w-auto">
                                    </span>
                                    <span class="file-name text-gray-500 dark:text-dark-text mt-2">Choose file</span>
                                </span>
                            </label>
                        </div>
                        <div class="flex-center !justify-end">
                            <button type="submit" class="btn b-solid btn-primary-solid btn-lg dk-theme-card-square">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Course Media File -->
        </div>
    </form>
</div>
@endsection