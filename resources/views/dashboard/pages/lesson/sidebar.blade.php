<!-- Sidebar: Daftar Modul -->
            <div class="sidebar-modul pt-5 xl:col-start-1 xl:col-span-3 bg-white" data-aos="fade-up">
                <h3 class="p-5 border-b text-xl font-bold">Daftar Modul</h3>
                <ul class="accordion-container curriculum">
                    @foreach($bab as $index => $bab)
                        <li class="accordion mb-25px overflow-hidden {{ $index == 0 ? 'active' : '' }}">
                            <div class="bg-whiteColor border-borderColor dark:bg-whiteColor-dark dark:border-borderColor-dark">
                                <!-- Judul Bab -->
                                <div>
                                    <button class="accordion-controller flex justify-between items-center text-md text-headingColor font-bold w-full px-5 py-18px dark:text-headingColor-dark font-hind leading-[20px]">
                                        <span>{{ $bab->name }} - Lesson #{{ $index + 1 }}</span>
                                        <svg class="transition-all duration-500 rotate-0" width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#212529">
                                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                                        </svg>
                                    </button>
                                </div>
                                <!-- Daftar Sub-Modul dan Quiz -->
                                <div class="accordion-content transition-all duration-500 h-0">
                                    <div class="content-wrapper p-10px md:px-30px">
                                        <ul>
                                            <!-- Daftar Modul -->
                                            @foreach($bab->moduls as $quiz)
                                                <li class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                    <div>
                                                        <h4 class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                            <i class="icofont-video-alt mr-10px"></i>
                                                            <a href="#" data-id="{{ $modul->id }}" data-slug="{{ $modul->slug }}" class="modul-link font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover:text-primaryColor">
                                                                {{ $modul->name }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div class="text-blackColor dark:text-blackColor-dark text-sm flex items-center">
                                                        <p class="font-semibold">{{ $modul->duration }}</p>
                                                    </div>
                                                </li>
                                            @endforeach
                                            <!-- Daftar Quiz -->
                                            @foreach($bab->quiz as $quiz)
                                                <li class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                    <div>
                                                        <h4 class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                            <i class="icofont-question-circle mr-10px"></i>
                                                            <a href="#" data-id="{{ $quiz->id }}" data-slug="{{ $quiz->slug }}" class="quiz-link font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover:text-primaryColor">
                                                                {{ $quiz->name }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>