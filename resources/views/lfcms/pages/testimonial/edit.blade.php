@extends('lfcms.layouts.app')
@section('page_title', 'Edit Testimonial Learn Flow CMS')
@section('content')
<div class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
    <form action="{{ route('testimonial.update', $testimonial->id) }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="grid grid-cols-12 gap-x-4">
            <!-- Start Course Information -->
            <div class="col-span-full lg:col-span-7 card h-fit">
                <div class="p-1.5">
                    <h6 class="card-title">Add testimonial</h6>
                    <div class="mt-7 pt-0.5">
                        <div class="grid  gap-y-5">
                            <div class="col-span-full xl:col-auto leading-none">
                                <label for="name" class="form-label">Nama Artikel</label> 
                                <input type="text" id="name" name="name" placeholder="Nama Artikel" class="form-input" value="{{ old('name', $testimonial->name) }}" required>
                            </div>
                        </div>
                            <div>

                              <div class="grid mt-3 gap-y-5">
                                <div class="col-span-full xl:col-auto leading-none">
                                    <label for="profession" class="form-label">Profesi</label> 
                                    <input type="text" id="profession" name="profession" placeholder="Masukan Profesi" class="form-input" value="{{ old('profession', $testimonial->profession) }}" required>
                                </div>
                            </div>

                            <div class="col-span-full mt-3 xl:col-auto leading-none">
                              <label for="status" class="form-label">Status</label>
                              <select class="singleSelect" name="status" id="status">
                                  <option selected disabled>Pilih Status</option>
                                  <option value="publik" {{ old('status', $testimonial->status) == 'publik' ? 'selected' : '' }}>Publik</option>
                                  <option value="draft" {{ old('status', $testimonial->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                              </select>
                          </div>
                              
                            {{-- <div class="col-span-full xl:col-auto leading-none">
                                <label for="coursePrice" class="form-label">Course price</label>
                                <input type="number" id="coursePrice" placeholder="$200.00" class="form-input" required>
                            </div> --}}
                            {{-- <div class="col-span-full xl:col-auto leading-none">
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
                             --}}
                            {{-- <div class="col-span-full mt-3 xl:col-auto leading-none">
                                <label for="deskripsi-singkat" class="form-label">Deskripsi Singkat</label>
                                <textarea type="text" id="deskripsi-singkat" placeholder="deskripsi singkat" class="form-input h-[100px]" required></textarea>
                            </div> --}}
                            {{-- <div class="col-span-full xl:col-auto leading-none">
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
                            </div>  --}}
                            <div class="col-span-full mt-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" rows="8" class="summernote form-input">{{$testimonial->description}}</textarea>
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
            
            <div class="col-span-full h-fit lg:col-span-5 gap-y-3">
               

                <div class="card">
                <div class="p-1.5">
                        <h6 class="card-title">Add media files</h6>
                    <div class="mt-7 pt-0.5 flex flex-col gap-5">
                        <div class="col-span-full sm:col-span-4">
                                <p class="text-xs text-gray-500 dark:text-dark-text leading-none font-semibold mb-3">Image</p>
                                <label for="image" class="file-container ac-bg text-xs leading-none font-semibold mb-3 cursor-pointer aspect-[4/3] flex flex-col items-center justify-center gap-2.5 border border-dashed border-gray-900 dark:border-dark-border rounded-10 dk-theme-card-square"
                                style="background-image: url('{{ asset('storage/'.$testimonial->image) }}');">

                                    <input type="file" id="image" name="image" hidden class="img-src peer/file">
                                <span class="flex-center flex-col peer-[.uploaded]/file:hidden">
                                    <span class="size-10 md:size-15 flex-center bg-primary-200 dark:bg-dark-icon rounded-50 dk-theme-card-square">
                                        <img src="assets/images/icons/upload-file.svg" alt="icon" class="dark:brightness-200 dark:contrast-100 w-1/2 sm:w-auto">
                                    </span>
                                    <span class="mt-2 text-gray-500 dark:text-dark-text">Choose file</span>
                                </span>
                            </label>
                        </div>
                        
                        <div class="flex-center !justify-end">
                            <button type="submit" class="btn b-solid btn-primary-solid btn-lg dk-theme-card-square">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!-- End Course Media File -->
        </div>
    </form>
</div>
@endsection