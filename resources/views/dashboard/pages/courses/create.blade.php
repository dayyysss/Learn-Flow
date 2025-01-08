@extends('landing.layouts.landing-layouts')
@section('page_title', 'LearnFlow | Courses')

@section('content')

{{-- @include('landing.components.breadcrumb', ['title' => 'Create Courses']) --}}

<div class="container pt-100px pb-100px aos-init aos-animate" data-aos="fade-up">
    {{-- Display Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-x-30px gap-y-5">
        <!-- create course left -->
        <div data-aos="fade-up" class="lg:col-start-1 lg:col-span-8">
            <form id="courseForm" action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <ul class="accordion-container curriculum create-course">
                    <!-- Course Info Accordion -->
                    <li class="accordion mb-5 active">
                        <div class="bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-t-md">
                            <div class="py-5 px-30px">
                                <div class="cursor-pointer accordion-controller flex justify-between items-center text-lg text-headingColor font-semibold w-full dark:text-headingColor-dark font-hind leading-27px rounded-t-md">
                                    <div>
                                        <span>Course Info</span>
                                    </div>
                                    <svg class="transition-all duration-500 rotate-0" width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#212529">
                                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                                    </svg>
                                </div>
                            </div>

                            <div class="accordion-content transition-all duration-500 overflow-hidden">
                                <div class="content-wrapper py-4 px-5">
                                    <div class="p-10px md:p-10 lg:p-5 2xl:p-10 bg-darkdeep3 dark:bg-transparent text-sm text-blackColor dark:text-blackColor-dark leading-1.8" data-aos="fade-up">
                                        {{-- Course Basic Information --}}
                                        <div class="grid grid-cols-1 mb-15px gap-15px">
                                            <div class="form-group">
                                                <label for="name" class="mb-3 block font-semibold">Nama Kursus</label>
                                                <input type="text" id="name" name="name" placeholder="Course Title" class="form-control w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md font-no" required>
                                            </div>

                                            <div class="grid grid-cols-1 md:grid-cols-3 gap-30px">
                                                <div class="form-group md:col-span-2">
                                                    <label for="slug" class="mb-3 block font-semibold">Slug</label>
                                                    <input type="text" id="slug" name="slug" placeholder="Course Slug" class="form-control w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md font-no" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kode_seri" class="mb-3 block font-semibold">Kode Seri</label>
                                                    <input type="text" id="kode_seri" name="kode_seri" placeholder="-" class="form-control w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md font-no" readonly>
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-30px mb-15px">
                                                <div class="form-group">
                                                    <label for="status" class="text-xs uppercase text-placeholder block font-semibold text-opacity-50 leading-1.8">Status</label>
                                                    <div class="bg-whiteColor relative rounded-md">
                                                        <select id="status" name="status" class="text-base bg-transparent text-blackColor2 w-full p-13px pr-30px focus:outline-none block appearance-none relative z-20 focus:shadow-select rounded-md form-control" required>
                                                            <option value="publik">Publik</option>
                                                            <option value="draft">Draft</option>
                                                            <option value="terjadwal">Terjadwal</option>
                                                        </select>
                                                        <i class="icofont-simple-down absolute top-1/2 right-3 -translate-y-1/2 block text-lg z-10"></i>
                                                    </div>
                                                    
                                                    <!-- Input untuk publish_date, disembunyikan secara default -->
                                                    <div id="publish_date_container" class="hidden">
                                                        <label for="publish_date" class="text-blackColor2">Tanggal Publish</label>
                                                        <input type="date" id="publish_date" name="publish_date" class="text-base bg-transparent text-blackColor2 w-full p-13px pr-30px focus:outline-none block appearance-none relative z-20 focus:shadow-select rounded-md form-control">
                                                    </div>
                                                    

                                                    
                                                </div>
                                            
                                                <div class="form-group">
                                                    <label for="tingkatan" class="text-xs uppercase text-placeholder block font-semibold text-opacity-50 leading-1.8">Tingkatan</label>
                                                    <div class="bg-whiteColor relative rounded-md">
                                                        <select name="tingkatan" id="tingkatan" class="form-control text-base bg-transparent text-blackColor2 w-full p-13px pr-30px focus:outline-none block appearance-none relative z-20 focus:shadow-select rounded-md">
                                                            <option value="Beginner">Beginner</option>
                                                            <option value="Intermediate">Intermediate</option>
                                                            <option value="Advanced">Advanced</option>
                                                            <option value="Specialist">Specialist</option>
                                                            <option value="Expert">Expert</option>
                                                            <option value="Professional">Professional </option>
                                                        </select>
                                                        <i class="icofont-simple-down absolute top-1/2 right-3 -translate-y-1/2 block text-lg z-10"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            

                                            <div class="grid grid-cols-1 xl:grid-cols-2 mb-15px gap-y-15px gap-x-30px">
                                                <div class="form-group">
                                                    <label for="tanggal_mulai" class="mb-3 block font-semibold">Waktu Mulai</label>
                                                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md font-no" >
                                                </div>

                                                <div class="form-group">
                                                    <label for="instruktur_id" class="mb-3 block font-semibold">Instructor</label>
                                                    <select name="instruktur_id" class="form-control w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md font-no" required>
                                                        <option value="">Select Instructor</option>
                                                        @foreach ($instruktur as $ins)
                                                            <option value="{{ $ins->id }}">{{ $ins->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-30px">
                                                <div class="form-group">
                                                    <label for="categories_id" class="text-xs uppercase text-placeholder block font-semibold text-opacity-50 leading-1.8">Category</label>
                                                    <div class="bg-whiteColor relative rounded-md">
                                                        <select name="categories_id" class="text-base bg-transparent text-blackColor2 w-full p-13px pr-30px focus:outline-none block appearance-none relative z-20 focus:shadow-select rounded-md form-control" required>
                                                            <option value="">Select Category</option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <i class="icofont-simple-down absolute top-1/2 right-3 -translate-y-1/2 block text-lg z-10"></i>
                                                    </div>
                                                </div>
                                            
                                                <div class="form-group">
                                                    <label for="berbayar" class="text-xs uppercase text-placeholder block font-semibold text-opacity-50 leading-1.8">Paid Course</label>
                                                    <div class="bg-whiteColor relative rounded-md">
                                                        <select name="berbayar" id="berbayar" class="form-control text-base bg-transparent text-blackColor2 w-full p-13px pr-30px focus:outline-none block appearance-none relative z-20 focus:shadow-select rounded-md">
                                                            <option value="false">Free</option>
                                                            <option value="true">Paid</option>
                                                        </select>
                                                        <i class="icofont-simple-down absolute top-1/2 right-3 -translate-y-1/2 block text-lg z-10"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-1 xl:grid-cols-2 mb-15px gap-y-15px gap-x-30px">
                                                <div class="form-group" id="harga-group">
                                                    <label for="harga" class="mb-3 block font-semibold">Price</label>
                                                    <input type="text" name="harga" id="harga" class="form-control w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md font-no" >
                                                </div>
                                            
                                                <div class="form-group" id="harga-diskon-group">
                                                    <label for="harga_diskon" class="mb-3 block font-semibold">Discount Price</label>
                                                    <input type="text" id="harga_diskon" name="harga_diskon" class="form-control w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md font-no">
                                                </div>
                                            </div>
                                            
                                            

                                        <div class="form-group mb-15px">
                                            <label for="deskripsi" class="mb-3 block font-semibold">Description</label>
                                            <textarea name="deskripsi" id="deskripsi" class="form-control w-full py-10px px-5 text-sm text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md" cols="50" rows="10" ></textarea>
                                        </div>

                                        <div class="form-group mb-15px">
                                            <label for="thumbnail" class="mb-3 block font-semibold">Thumbnail</label>
                                            <input 
                                                type="file" 
                                                name="thumbnail" 
                                                id="thumbnail" 
                                                class="form-control mb-3 w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border -2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md" 
                                                accept="image/*" 
                                                required
                                                onchange="previewImage(event)"
                                            >
                                        
                                            <!-- Gambar Pratinjau -->
                                            <div class="mt-3">
                                                <img id="thumbnailPreview" width="300" height="300" class="w-52 h-52 rounded-md" style="display:none;" />
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="accordion mb-5">
                        <div class="bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark">
                            <div class="py-5 px-30px">
                                <div class="cursor-pointer accordion-controller flex justify-between items-center text-lg text-headingColor font-semibold w-full dark:text-headingColor-dark font-hind leading-27px">
                                    <div>
                                        <span>Intro Video</span>
                                    </div>
                                    <svg class="transition-all duration-500 rotate-0" width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#212529">
                                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                                    </svg>
                                </div>
                            </div>

                            <div class="accordion-content transition-all duration-500 overflow-hidden h-0">
                                <div class="content-wrapper py-4 px-5">
                                    <div class="p-10px md:p-10 lg:p-5 2xl:p-10 bg-darkdeep3 dark:bg-transparent text-sm text-blackColor dark:text-blackColor-dark leading-1.8" data-aos="fade-up" id="video-form">
                                        <div class="grid grid-cols-1 mb-15px gap-15px">
                                            <div class="form-group">
                                                <label for="video_file" class="mb-3 block font-semibold">Video File</label>
                                                <input type="file" name="video_file" id="video_file" class="form-control w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md" accept="video/*">
                                            </div>

                                            <div class="form-group">
                                                <label for="video_url" class="mb-3 block font-semibold">Video URL</label>
                                                <input type="text" name="video_url" id="video_url" class="form-control w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md">
                                            </div>

                                            <div>
                                                <div class="mb-3 block">
                                                    Example:
                                                    <a class="hover:text-primaryColor" href="https://www.youtube.com/watch?v=yourvideoid">https://www.youtube.com/watch?v=yourvideoid</a>
                                                </div>
                                            </div>

                                            <p class="italic">*isi salah satunya</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="accordion mb-5">
                        <div class="bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark">
                            <div class="py-5 px-30px">
                                <div class="cursor-pointer accordion-controller flex justify-between items-center text-lg text-headingColor font-semibold w-full dark:text-headingColor-dark font-hind leading-27px">
                                    <div>
                                        <span>Modul Pembelajaran</span>
                                    </div>
                                    <svg class="transition-all duration-500 rotate-0" width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#212529">
                                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                                    </svg>
                                </div>
                            </div>
                            {{-- Dynamic Bab and Modul Section --}}
                            <div class="accordion-content transition-all duration-500 overflow-hidden h-0">
                                <div class="content-wrapper py-4 px-5">
                                    <div class="bab-form p-10px md:p-10 lg:p-5 2xl:p-10 bg-darkdeep3 dark:bg-transparent text-sm text-blackColor dark:text-blackColor-dark leading-1.8" data-aos="fade-up" id="video-form">
                                        <div class="bab-section">
                                            <button type="button" class="btn bg-blue px-5 py-1 btn-primary add-bab-btn">Add Bab</button>
                                            <div class="bab-item rounded bg-whiteColor">
                                                <div class="bab-header bg-whiteColor rounded flex justify-between items-center cursor-pointer">
                                                    <h3 class="bab-title">Bab 1</h3>
                                                    <span class="toggle-icon">▼</span> <!-- Ikon panah -->
                                                </div>
                                                <div class="bab-content hidden">

                                                    <div class="mb-15px" >
                                                        <label class="mb-3 block font-semibold">Judul Bab</label>
                                                        <input type="text" name="bab[0][name]" placeholder="Bab Name" class="form-control mb-3 w-full py-10px px-5 text-sm text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md" >
                                                    </div>

                                                    <div class="modul-section">
                                                        <div class="modul-item border p-5 mb-3">
                                                            <div class="mb-15px">
                                                                <label class="mb-3 block font-semibold">Judul Modul</label>
                                                                <input type="text"  name="bab[0][moduls][0][name]" placeholder="Modul Name" class="form-control mb-3 w-full py-10px px-5 text-sm text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md" >
                                                            </div>

                                                            <div class="grid grid-cols-1 xl:grid-cols-2 mb-15px gap-y-15px gap-x-30px">
                                                                <div>
                                                                    <label class="text-xs uppercase text-placeholder block font-semibold text-opacity-50 leading-1.8">Video Pembelajaran</label>
                                                                    <input type="file" name="bab[0][moduls][0][video]" accept="video/*" class="form-control mb-1 mt-3 w-full py-5px px-2 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border -2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md" >
                                                            
                                                                </div>

                                                                <div>
                                                                    <label class="text-xs uppercase text-placeholder block font-semibold text-opacity-50 leading-1.8">File Materi Pembelajaran</label>
                                                                <input type="file" name="bab[0][moduls][0][file]" accept="image/*,application/pdf" class="form-control mt-3 mb-3 w-full py-5px px-2 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border -2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md" >
                                                                </div>
                                                            </div>

                                                            <div>
                                                                <label class="mb-3 block font-semibold">Materi</label>
                                                                <textarea name="bab[0][moduls][0][materi]" placeholder="Materi" id="materi" class="form-control mt-2 w-full py-10px px-5 text-sm text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md" cols="30" rows="10" ></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-secondary add-modul-btn mt-2">Add Modul</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            
                        </div>
                    </li>

                    {{-- Certificate Section --}}
                    <li class="accordion mb-5">
                        <div class="bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-b-md">
                            <div class="cursor-pointer py-5 px-30px">
                                <div class="accordion-controller flex justify-between items-center text-lg text-headingColor font-semibold w-full dark:text-headingColor-dark font-hind leading-27px rounded-b-md">
                                    <div>
                                        <span>Certificate Template</span>
                                    </div>
                                    <svg class="transition-all duration-500 rotate-0" width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#212529">
                                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="accordion-content transition-all duration-500 overflow-hidden h-0">
                                <div class="content-wrapper py-4 px-5">
                                    <div class="p-10px md:p-10 lg:p-5 2xl:p-10 bg-darkdeep3 dark:bg-transparent text-sm text-blackColor dark:text-blackColor-dark leading-1.8" data-aos="fade-up">
                                    <div class="form-group">
                                        <label class="mb-3 block font-semibold" for="certificate_file">Certificate Template</label>
                                        <input type="file" name="certificate_file" class="form-control mb-3 w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border -2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md" accept="image/*,application/pdf">
                                    </div>

                                    <div class="form-group">
                                        <label class="mb-3 block font-semibold" for="certificate_ttd">Certificate Signatures</label>
                                        <div id="signature-section">
                                            <div class="signature-item mb-2">
                                                <input type="file" name="certificate_ttd[]" class="form-control mb-3 w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border -2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md" accept="image/*">
                                            </div>
                                        </div>
                                        <button type="button" class="btn bg-white text-sm text-zinc-400 border rounded-full flex items-center justify-center ml-auto  px-2 py-1 btn-secondary mt-2" id="add-signature-btn">
                                            Add Signature &nbsp;<span class="font-bold text-zinc-400 border border-black px-2 rounded-full">+</span>
                                        </button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>

                {{-- Submit Button --}}
                <div class="mt-10 leading-1.8 grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-y-5">
                    <div data-aos="fade-up">
                        <button type="submit" class="btn btn-success text-whiteColor bg-primaryColor w-full p-13px hover:text-whiteColor hover:bg-secondaryColor inline-block rounded group dark:hover:text-whiteColor dark:hover:bg-secondaryColor text-center">
                            Create Course
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- create course right -->
        <div data-aos="fade-up" class="lg:col-start-9 lg:col-span-4">
            <div class="p-30px border-2 border-primaryColor">
                <ul>
                    <li class="my-7px flex gap-10px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-check flex-shrink-0">
                            <polyline points="20 6 9 17 4 12" class="text-greencolor"></polyline>
                        </svg>
                        <p class="text-lg text-contentColor dark:text-contentColor-dark leading-1.45">
                            Set the Course Price option make it free.
                        </p>
                    </li>
                    <li class="my-7px flex gap-10px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-check flex-shrink-0">
                            <polyline points="20 6 9 17 4 12" class="text-greencolor"></polyline>
                        </svg>
                        <p class="text-lg text-contentColor dark:text-contentColor-dark leading-1.45">
                            Standard size for the course thumbnail.
                        </p>
                    </li>
                    <li class="my-7px flex gap-10px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-check flex-shrink-0">
                            <polyline points="20 6 9 17 4 12" class="text-greencolor"></polyline>
                        </svg>
                        <p class="text-lg text-contentColor dark:text-contentColor-dark leading-1.45">
                            Video section controls the course overview video.
                        </p>
                    </li>
                    <li class="my-7px flex gap-10px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-check flex-shrink-0">
                            <polyline points="20 6 9 17 4 12" class="text-greencolor"></polyline>
                        </svg>
                        <p class="text-lg text-contentColor dark:text-contentColor-dark leading-1.45">
                            Course Builder is where you create course.
                        </p>
                    </li>
                    <li class="my-7px flex gap-10px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-check flex-shrink-0">
                            <polyline points="20 6 9 17 4 12" class="text-greencolor"></polyline>
                        </svg>
                        <p class="text-lg text-contentColor dark:text-contentColor-dark leading-1.45">
                            Add Topics in the Course Builder section to create lessons.
                        </p>
                    </li>
                    <li class="my-7px flex gap-10px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-check flex-shrink-0">
                            <polyline points="20 6 9 17 4 12" class="text-greencolor"></polyline>
                        </svg>
                        <p class="text-lg text-contentColor dark:text-contentColor-dark leading-1.45">
                            Prerequisites refers to the fundamental courses.
                        </p>
                    </li>
                    <li class="my-7px flex gap-10px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-check flex-shrink-0">
                            <polyline points="20 6 9 17 4 12" class="text-greencolor"></polyline>
                        </svg>
                        <p class="text-lg text-contentColor dark:text-contentColor-dark leading-1.45">
                            Information from the Additional Data section.
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

{{-- JavaScript --}}
@include('dashboard.pages.courses.course-js')
<style>
    .bab-header {
    padding: 10px;
    border: 1px solid #ddd;
    margin-top: 10px;
}

.bab-title {
    font-size: 1rem;
    font-weight: bold;
}

.toggle-icon {
    font-size: 0.7rem;
    transition: transform 0.3s ease;
}

.bab-content.hidden {
    display: none;
}

.bab-header.open .toggle-icon {
    transform: rotate(-180deg);
}

.bab-content {
    padding: 20px;
}

.modul-item {

}

</style>

<script>
    // Ambil elemen status select dan container publish_date
    const statusSelect = document.getElementById('status');
    const publishDateContainer = document.getElementById('publish_date_container');

    // Event listener untuk mendeteksi perubahan pada select
    statusSelect.addEventListener('change', function() {
        if (this.value === 'terjadwal') {
            // Tampilkan input publish_date ketika "Terjadwal" dipilih
            publishDateContainer.classList.remove('hidden');
        } else {
            // Sembunyikan input publish_date untuk pilihan lain
            publishDateContainer.classList.add('hidden');
        }
    });
</script>

@endsection