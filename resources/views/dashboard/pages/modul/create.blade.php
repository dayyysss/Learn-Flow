@extends('landing.layouts.landing-layouts')
@section('page_title', 'LearnFlow | Modul Pembelajaran')

@section('content')

    @include('landing.components.breadcrumb', ['title' => 'Modul Pembelajaran'])

    <div class="container mx-auto py-10">
        <h1 class="text-2xl font-bold text-headingColor dark:text-headingColor-dark mb-8">Modul Pembelajaran</h1>
        <button type="button" class="btn bg-primaryColor px-4 py-2 text-white rounded-md add-bab-btn mb-4">Tambah
            Bab</button>
        <div class="bab-container space-y-8">
            <!-- Bab item with improved spacing and background -->
            <div class="bg-whiteColor dark:bg-whiteColor-dark shadow-lg rounded-lg overflow-hidden bab-item"
                data-bab-index="0">
                <!-- Bab header with improved spacing -->
                <div class="px-8 py-6 border-b border-borderColor dark:border-borderColor-dark">
                    <div class="bab-header bg-whiteColor rounded flex justify-between items-center cursor-pointer open">
                        <h2 class="text-xl font-semibold text-headingColor dark:text-headingColor-dark">Bab 1</h2>
                        <span class="toggle-icon">▼</span>
                    </div>
                </div>

                <!-- Bab content with gray background and responsive padding -->
                <div class="bab-form p-4 md:p-10 lg:p-5 2xl:p-10 bg-lightGray dark:bg-darkGray">
                    <div class="mb-6">
                        <label for="bab-title-0"
                            class="block text-sm font-semibold text-headingColor dark:text-headingColor-dark mb-3">
                            Judul Bab
                        </label>
                        <input id="bab-title-0" type="text" name="bab[0][name]" placeholder="Bab Name"
                            class="form-control w-full py-3 px-4 text-sm rounded-md border border-borderColor dark:border-borderColor-dark bg-white dark:bg-whiteColor-dark">
                    </div>

                    <div class="modul-container space-y-5">
                        <div class="bg-white dark:bg-whiteColor-dark rounded-md p-6 modul-item" data-modul-index="0">
                            <h3 class="text-lg font-semibold text-headingColor dark:text-headingColor-dark mb-4">Modul 1
                            </h3>
                            <div class="mb-4">
                                <label for="modul-title-0-0"
                                    class="block text-sm font-semibold text-headingColor dark:text-headingColor-dark mb-2">Judul
                                    Modul</label>
                                <input id="modul-title-0-0" type="text" name="bab[0][moduls][0][name]"
                                    placeholder="Modul Name"
                                    class="form-control w-full py-2 px-4 text-sm rounded-md border border-borderColor dark:border-borderColor-dark">
                            </div>
                            <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label for="video-0-0"
                                        class="block text-sm font-semibold text-headingColor dark:text-headingColor-dark mb-2">Video
                                        Pembelajaran</label>
                                    <input id="video-0-0" type="file" name="bab[0][moduls][0][video]" accept="video/*"
                                        class="form-control w-full py-2 px-4 text-sm rounded-md border border-borderColor dark:border-borderColor-dark">
                                </div>
                                <div>
                                    <label for="file-0-0"
                                        class="block text-sm font-semibold text-headingColor dark:text-headingColor-dark mb-2">File
                                        Materi Pembelajaran</label>
                                    <input id="file-0-0" type="file" name="bab[0][moduls][0][file]"
                                        accept="image/*,application/pdf"
                                        class="form-control w-full py-2 px-4 text-sm rounded-md border border-borderColor dark:border-borderColor-dark">
                                </div>
                            </div>
                            <div>
                                <label for="materi-0-0"
                                    class="block text-sm font-semibold text-headingColor dark:text-headingColor-dark mb-2">Materi</label>
                                <textarea name="bab[0][moduls][0][materi]" placeholder="Materi" id="materi"
                                    class="form-control mt-2 w-full py-10px px-5 text-sm text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md"
                                    cols="30" rows="10"></textarea>
                            </div>
                            <button type="button"
                                class="btn bg-primaryColor px-4 py-2 mt-10 text-white rounded-md add-bab-btn">Tambah
                                Modul</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button type="button"
            class="btn bg-primaryColor px-4 py-2 mt-10 w-full text-white rounded-md add-bab-btn">Submit</button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const babContainer = document.querySelector('.bab-container');
            const addBabBtn = document.querySelector('.add-bab-btn');

            addBabBtn.addEventListener('click', () => {
                const babIndex = babContainer.querySelectorAll('.bab-item').length;
                const newBab = document.createElement('div');
                newBab.classList.add('bg-whiteColor', 'dark:bg-whiteColor-dark', 'shadow-lg', 'rounded-lg',
                    'overflow-hidden', 'bab-item');
                newBab.setAttribute('data-bab-index', babIndex);

                newBab.innerHTML = `
                <div class="px-8 py-6 border-b border-borderColor dark:border-borderColor-dark">
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-semibold text-headingColor dark:text-headingColor-dark">Bab ${babIndex + 1}</h2>
                        <button type="button" class="btn bg-blue px-4 py-2 text-white rounded-md add-modul-btn">Tambah Modul</button>
                    </div>
                </div>
                <div class="bab-form p-4 md:p-10 lg:p-5 2xl:p-10 bg-lightGray dark:bg-darkGray">
                    <div class="mb-6">
                        <label for="bab-title-${babIndex}" class="block text-sm font-semibold text-headingColor dark:text-headingColor-dark mb-3">Judul Bab</label>
                        <input id="bab-title-${babIndex}" type="text" name="bab[${babIndex}][name]" placeholder="Bab Name" class="form-control w-full py-3 px-4 text-sm rounded-md border border-borderColor dark:border-borderColor-dark bg-white dark:bg-whiteColor-dark">
                    </div>
                    <div class="modul-container space-y-5"></div>
                </div>
            `;

                babContainer.appendChild(newBab);
            });
        });
    </script>

@endsection
