@extends('landing.layouts.landing-layouts')
@section('page_title', 'LearnFlow | Modul Pembelajaran')

@section('content')
    {{-- @include('landing.components.breadcrumb', ['title' => 'Buat Modul Pembelajaran']) --}}

    <div class="container mx-auto py-10 px-4">
        <!-- Header Section -->
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold text-headingColor dark:text-headingColor-dark">Buat Modul Pembelajaran</h1>
            <p class="text-gray-600 dark:text-gray-400 mt-2">Isi formulir di bawah untuk membuat modul pembelajaran baru</p>
        </div>

        <!-- Main Form Container -->
        <div class="max-w-4xl mx-auto">
            <!-- Chapters Container -->
            <div class="bab-container space-y-6">
                <!-- Initial Chapter Card -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden bab-item" data-bab-index="0">
                    <!-- Chapter Header -->
                    <div class="bg-gray-50 dark:bg-gray-700 px-6 py-4 border-b border-gray-200 dark:border-gray-600">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <span
                                    class="bg-primaryColor text-white rounded-full w-8 h-8 flex items-center justify-center font-semibold">1</span>
                                <h2 class="text-xl font-semibold text-headingColor dark:text-headingColor-dark">Bab 1</h2>
                            </div>
                            <button class="toggle-chapter-btn">
                                <svg class="w-6 h-6 transition-transform" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Chapter Content -->
                    <div class="chapter-content p-6">
                        <!-- Chapter Title Input -->
                        <div class="mb-6">
                            <label for="bab-title-0"
                                class="pl-4 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Judul Bab
                            </label>
                            <input id="bab-title-0" type="text" name="bab[0][name]" placeholder="Masukkan judul bab"
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-primaryColor focus:border-transparent">
                        </div>

                        <!-- Modules Container -->
                        <div class="modul-container space-y-6">
                            <!-- Module Card -->
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 modul-item" data-modul-index="0">
                                <div class="flex items-center gap-3 mb-4 ml-4">
                                    <span
                                        class="bg-blue-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm">M1</span>
                                    <h3 class="text-lg font-medium">Modul 1</h3>
                                </div>

                                <!-- Module Form Fields -->
                                <div class="space-y-4">
                                    <!-- Module Title -->
                                    <div>
                                        <label class="block text-sm font-medium mb-2">Judul Modul</label>
                                        <input type="text" 
                                               name="bab[0][moduls][0][name]" 
                                               placeholder="Masukkan judul modul"
                                               class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600">
                                    </div>

                                    <!-- File Uploads -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <!-- Video Upload -->
                                        <div class="file-upload-container">
                                            <label class="block text-sm font-medium mb-2">Video Pembelajaran</label>
                                            <div class="relative">
                                                <input type="file" 
                                                       name="bab[0][moduls][0][video]" 
                                                       accept="video/*"
                                                       class="hidden"
                                                       id="video-upload-0-0">
                                                <label for="video-upload-0-0" 
                                                       class="flex items-center justify-center px-4 py-2 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer hover:border-primaryColor">
                                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                                    </svg>
                                                    <span>Pilih Video</span>
                                                </label>
                                            </div>
                                        </div>

                                        <!-- Material File Upload -->
                                        <div class="file-upload-container">
                                            <label class="block text-sm font-medium mb-2">Materi Pembelajaran</label>
                                            <div class="relative">
                                                <input type="file" 
                                                       name="bab[0][moduls][0][file]" 
                                                       accept="image/*,application/pdf"
                                                       class="hidden"
                                                       id="file-upload-0-0">
                                                <label for="file-upload-0-0" 
                                                       class="flex items-center justify-center px-4 py-2 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer hover:border-primaryColor">
                                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                                    </svg>
                                                    <span>Pilih File</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Material Content -->
                                    <div>
                                        <label class="block text-sm font-medium mb-2">Materi</label>
                                        <textarea name="bab[0][moduls][0][materi]" 
                                                  placeholder="Tulis materi pembelajaran di sini..."
                                                  class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 min-h-[200px]"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Add Module Button -->
                        <button type="button"
                            class="add-modul-btn mt-4 ml-4 flex items-center text-primaryColor hover:text-primaryColor-dark">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Tambah Modul
                        </button>
                    </div>
                </div>
            </div>

            <!-- Add Chapter Button -->
            <div class="mt-10">
                <button type="button"
                    class="add-bab-btn w-full mt-6 bg-white dark:bg-gray-800 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl py-3 text-gray-600 dark:text-gray-400 hover:border-primaryColor hover:text-primaryColor transition-colors">
                    <div class="flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Tambah Bab Baru
                    </div>
                </button>
            </div>

            <!-- Submit Button -->
            <div class="mt-10">
                <button type="submit"
                    class="w-full bg-primaryColor hover:bg-primaryColor-dark text-white font-medium py-3 rounded-lg shadow-lg transition-colors">
                    Simpan Modul Pembelajaran
                </button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const babContainer = document.querySelector('.bab-container');
            const addBabBtn = document.querySelector('.add-bab-btn');

            // Toggle chapter content
            document.addEventListener('click', (e) => {
                if (e.target.closest('.toggle-chapter-btn')) {
                    const chapter = e.target.closest('.bab-item');
                    const content = chapter.querySelector('.chapter-content');
                    const icon = e.target.closest('.toggle-chapter-btn').querySelector('svg');

                    content.classList.toggle('hidden');
                    icon.classList.toggle('rotate-180');
                }
            });

            // Add new chapter
            addBabBtn.addEventListener('click', () => {
                const babIndex = babContainer.querySelectorAll('.bab-item').length;
                const newBab = createNewChapter(babIndex);
                babContainer.appendChild(newBab);
            });

            // Add new module
            document.addEventListener('click', (e) => {
                if (e.target.closest('.add-modul-btn')) {
                    const chapter = e.target.closest('.bab-item');
                    const modulContainer = chapter.querySelector('.modul-container');
                    const babIndex = chapter.dataset.babIndex;
                    const modulIndex = modulContainer.querySelectorAll('.modul-item').length;

                    const newModul = createNewModule(babIndex, modulIndex);
                    modulContainer.appendChild(newModul);
                }
            });

            // Helper function to create new chapter
            function createNewChapter(index) {
                const div = document.createElement('div');
                div.className = 'bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden bab-item';
                div.setAttribute('data-bab-index', index);

                // Add chapter HTML structure here (similar to the initial chapter)
                div.innerHTML = `/* Similar HTML structure as the initial chapter but with updated indices */`;

                return div;
            }

            // Helper function to create new module
            function createNewModule(babIndex, modulIndex) {
                const div = document.createElement('div');
                div.className = 'bg-gray-50 dark:bg-gray-700 rounded-lg p-6 modul-item';
                div.setAttribute('data-modul-index', modulIndex);

                // Add module HTML structure here (similar to the initial module)
                div.innerHTML = `/* Similar HTML structure as the initial module but with updated indices */`;

                return div;
            }
        });
    </script>
@endsection
