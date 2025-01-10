@extends('dashboard.layouts.layouts')
@section('page_title', 'LearnFlow | Lesson Assignments')

@section('content')
    <!-- assignment section -->
    <section>
        <div class="container-fluid-2 py-100px">
            <div class="grid grid-cols-1 xl:grid-cols-12 gap-30px">
                <!-- assignment left -->
                <div class="xl:col-start-1 xl:col-span-4" data-aos="fade-up">
                    <!-- curriculum -->
                    <ul class="accordion-container curriculum">
                        <!-- accordion -->
                        <li class="accordion mb-25px overflow-hidden active">
                            <div
                                class="bg-whiteColor border border-borderColor dark:bg-whiteColor-dark dark:border-borderColor-dark rounded-t-md">
                                <!-- controller -->
                                <div>
                                    <button
                                        class="accordion-controller flex justify-between items-center text-xl text-headingColor font-bold w-full px-5 py-18px dark:text-headingColor-dark font-hind leading-[20px]">
                                        <span>Lesson #01</span>

                                        <svg class="transition-all duration-500 rotate-0" width="20"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#212529">
                                            <path fill-rule="evenodd"
                                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                                <!-- content -->
                                <div class="accordion-content transition-all duration-500">
                                    <div class="content-wrapper p-10px md:px-30px">
                                        <ul>
                                            <li
                                                class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                <div>
                                                    <h4
                                                        class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                        <i class="icofont-video-alt mr-10px"></i>
                                                        <a href="lesson.html"
                                                            class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Course
                                                            Intro
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div
                                                    class="text-blackColor dark:text-blackColor-dark text-sm flex items-center">
                                                    <p class="font-semibold">3.27</p>
                                                    <a href="lesson.html"
                                                        class="bg-primaryColor text-whiteColor text-sm ml-5 rounded py-0.5">
                                                        <p class="px-10px">
                                                            <i class="icofont-eye"></i> Preview
                                                        </p>
                                                    </a>
                                                </div>
                                            </li>

                                            <li
                                                class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                <div>
                                                    <h4
                                                        class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                        <i class="icofont-video-alt mr-10px"></i>
                                                        <a href="lesson-2.html"
                                                            class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Course
                                                            Outline
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div
                                                    class="text-blackColor dark:text-blackColor-dark text-sm flex items-center">
                                                    <p class="font-semibold">5.00</p>
                                                    <a href="lesson.html"
                                                        class="bg-primaryColor text-whiteColor text-sm ml-5 rounded py-0.5">
                                                        <p class="px-10px">
                                                            <i class="icofont-eye"></i> Preview
                                                        </p>
                                                    </a>
                                                </div>
                                            </li>

                                            <li
                                                class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                <div>
                                                    <h4
                                                        class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                        <i class="icofont-file-text mr-10px"></i>
                                                        <a href="lesson-course-materials.html"
                                                            class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Course
                                                            Materials
                                                        </a>
                                                    </h4>
                                                </div>
                                            </li>
                                            <li
                                                class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                <div>
                                                    <h4
                                                        class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                        <i class="icofont-audio mr-10px"></i>
                                                        <a href="lesson-quiz.html"
                                                            class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">
                                                            Summer Quiz
                                                        </a>
                                                    </h4>
                                                </div>
                                            </li>
                                            <li class="py-4 flex items-center justify-between flex-wrap">
                                                <div>
                                                    <h4
                                                        class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                        <i class="icofont-file-text mr-10px"></i>
                                                        <a href="lesson-assignment.html"
                                                            class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Assignment
                                                        </a>
                                                    </h4>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="accordion mb-25px overflow-hidden">
                            <div
                                class="bg-whiteColor border border-borderColor dark:bg-whiteColor-dark dark:border-borderColor-dark">
                                <!-- controller -->
                                <div>
                                    <button
                                        class="accordion-controller flex justify-between items-center text-xl text-headingColor font-bold w-full px-5 py-18px dark:text-headingColor-dark font-hind leading-[20px]">
                                        <span>Lesson #02</span>

                                        <svg class="transition-all duration-500 rotate-0" width="20"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#212529">
                                            <path fill-rule="evenodd"
                                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                                <!-- content -->
                                <div class="accordion-content transition-all duration-500 h-0">
                                    <div class="content-wrapper p-10px md:px-30px">
                                        <ul>
                                            <li
                                                class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                <div>
                                                    <h4
                                                        class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                        <i class="icofont-video-alt mr-10px"></i>
                                                        <a href="lesson.html"
                                                            class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Course
                                                            Intro
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div
                                                    class="text-blackColor dark:text-blackColor-dark text-sm flex items-center">
                                                    <p class="font-semibold">3.27</p>
                                                    <a href="lesson.html"
                                                        class="bg-primaryColor text-whiteColor text-sm ml-5 rounded py-0.5">
                                                        <p class="px-10px">
                                                            <i class="icofont-eye"></i> Preview
                                                        </p>
                                                    </a>
                                                </div>
                                            </li>

                                            <li
                                                class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                <div>
                                                    <h4
                                                        class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                        <i class="icofont-video-alt mr-10px"></i>
                                                        <a href="lesson-2.html"
                                                            class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Course
                                                            Outline
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div
                                                    class="text-blackColor dark:text-blackColor-dark text-sm flex items-center">
                                                    <p class="font-semibold">5.00</p>
                                                    <a href="lesson.html"
                                                        class="bg-primaryColor text-whiteColor text-sm ml-5 rounded py-0.5">
                                                        <p class="px-10px">
                                                            <i class="icofont-eye"></i> Preview
                                                        </p>
                                                    </a>
                                                </div>
                                            </li>

                                            <li
                                                class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                <div>
                                                    <h4
                                                        class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                        <i class="icofont-video-alt mr-10px"></i>
                                                        <a href="lesson-2.html"
                                                            class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Course
                                                            Outline
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div
                                                    class="text-blackColor dark:text-blackColor-dark text-sm flex items-center">
                                                    <p class="font-semibold">7.00</p>
                                                    <a href="lesson.html"
                                                        class="bg-primaryColor text-whiteColor text-sm ml-5 rounded py-0.5">
                                                        <p class="px-10px">
                                                            <i class="icofont-eye"></i> Preview
                                                        </p>
                                                    </a>
                                                </div>
                                            </li>
                                            <li
                                                class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                <div>
                                                    <h4
                                                        class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                        <i class="icofont-file-text mr-10px"></i>
                                                        <a href="lesson-course-materials.html"
                                                            class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Course
                                                            Materials
                                                        </a>
                                                    </h4>
                                                </div>
                                            </li>
                                            <li
                                                class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                <div>
                                                    <h4
                                                        class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                        <i class="icofont-audio mr-10px"></i>
                                                        <a href="lesson-quiz.html"
                                                            class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">
                                                            Summer Quiz
                                                        </a>
                                                    </h4>
                                                </div>
                                            </li>
                                            <li class="py-4 flex items-center justify-between flex-wrap">
                                                <div>
                                                    <h4
                                                        class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                        <i class="icofont-file-text mr-10px"></i>
                                                        <a href="lesson-assignment.html"
                                                            class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Assignment
                                                        </a>
                                                    </h4>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="accordion mb-25px overflow-hidden">
                            <div
                                class="bg-whiteColor border border-borderColor dark:bg-whiteColor-dark dark:border-borderColor-dark">
                                <!-- controller -->
                                <div>
                                    <button
                                        class="accordion-controller flex justify-between items-center text-xl text-headingColor font-bold w-full px-5 py-18px dark:text-headingColor-dark font-hind leading-[20px]">
                                        <span>Lesson #03</span>

                                        <svg class="transition-all duration-500 rotate-0" width="20"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#212529">
                                            <path fill-rule="evenodd"
                                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                                <!-- content -->
                                <div class="accordion-content transition-all duration-500 h-0">
                                    <div class="content-wrapper p-10px md:px-30px">
                                        <ul>
                                            <li
                                                class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                <div>
                                                    <h4
                                                        class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                        <i class="icofont-video-alt mr-10px"></i>
                                                        <a href="lesson.html"
                                                            class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Course
                                                            Intro
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div
                                                    class="text-blackColor dark:text-blackColor-dark text-sm flex items-center">
                                                    <p class="font-semibold">3.27</p>
                                                    <a href="lesson.html"
                                                        class="bg-primaryColor text-whiteColor text-sm ml-5 rounded py-0.5">
                                                        <p class="px-10px">
                                                            <i class="icofont-eye"></i> Preview
                                                        </p>
                                                    </a>
                                                </div>
                                            </li>

                                            <li
                                                class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                <div>
                                                    <h4
                                                        class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                        <i class="icofont-video-alt mr-10px"></i>
                                                        <a href="lesson-2.html"
                                                            class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Course
                                                            Outline
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div
                                                    class="text-blackColor dark:text-blackColor-dark text-sm flex items-center">
                                                    <p class="font-semibold">5.00</p>
                                                    <a href="lesson.html"
                                                        class="bg-primaryColor text-whiteColor text-sm ml-5 rounded py-0.5">
                                                        <p class="px-10px">
                                                            <i class="icofont-eye"></i> Preview
                                                        </p>
                                                    </a>
                                                </div>
                                            </li>

                                            <li
                                                class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                <div>
                                                    <h4
                                                        class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                        <i class="icofont-video-alt mr-10px"></i>
                                                        <a href="lesson-2.html"
                                                            class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Course
                                                            Outline
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div
                                                    class="text-blackColor dark:text-blackColor-dark text-sm flex items-center">
                                                    <p class="font-semibold">7.00</p>
                                                    <a href="lesson.html"
                                                        class="bg-primaryColor text-whiteColor text-sm ml-5 rounded py-0.5">
                                                        <p class="px-10px">
                                                            <i class="icofont-eye"></i> Preview
                                                        </p>
                                                    </a>
                                                </div>
                                            </li>
                                            <li
                                                class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                <div>
                                                    <h4
                                                        class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                        <i class="icofont-file-text mr-10px"></i>
                                                        <a href="lesson-course-materials.html"
                                                            class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Course
                                                            Materials
                                                        </a>
                                                    </h4>
                                                </div>
                                            </li>
                                            <li
                                                class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                <div>
                                                    <h4
                                                        class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                        <i class="icofont-audio mr-10px"></i>
                                                        <a href="lesson-quiz.html"
                                                            class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">
                                                            Summer Quiz
                                                        </a>
                                                    </h4>
                                                </div>
                                            </li>
                                            <li class="py-4 flex items-center justify-between flex-wrap">
                                                <div>
                                                    <h4
                                                        class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                        <i class="icofont-file-text mr-10px"></i>
                                                        <a href="lesson-assignment.html"
                                                            class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Assignment
                                                        </a>
                                                    </h4>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="accordion mb-25px overflow-hidden">
                            <div
                                class="bg-whiteColor border border-borderColor dark:bg-whiteColor-dark dark:border-borderColor-dark rounded-b-md">
                                <!-- controller -->
                                <div>
                                    <button
                                        class="accordion-controller flex justify-between items-center text-xl text-headingColor font-bold w-full px-5 py-18px dark:text-headingColor-dark font-hind leading-[20px]">
                                        <span>Lesson #04</span>

                                        <svg class="transition-all duration-500 rotate-0" width="20"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#212529">
                                            <path fill-rule="evenodd"
                                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                                <!-- content -->
                                <div class="accordion-content transition-all duration-500 h-0">
                                    <div class="content-wrapper p-10px md:px-30px">
                                        <ul>
                                            <li
                                                class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                <div>
                                                    <h4
                                                        class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                        <i class="icofont-video-alt mr-10px"></i>
                                                        <a href="lesson.html"
                                                            class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Course
                                                            Intro
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div
                                                    class="text-blackColor dark:text-blackColor-dark text-sm flex items-center">
                                                    <p class="font-semibold">3.27</p>
                                                    <a href="lesson.html"
                                                        class="bg-primaryColor text-whiteColor text-sm ml-5 rounded py-0.5">
                                                        <p class="px-10px">
                                                            <i class="icofont-eye"></i> Preview
                                                        </p>
                                                    </a>
                                                </div>
                                            </li>

                                            <li
                                                class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                <div>
                                                    <h4
                                                        class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                        <i class="icofont-video-alt mr-10px"></i>
                                                        <a href="lesson-2.html"
                                                            class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Course
                                                            Outline
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div
                                                    class="text-blackColor dark:text-blackColor-dark text-sm flex items-center">
                                                    <p class="font-semibold">5.00</p>
                                                    <a href="lesson.html"
                                                        class="bg-primaryColor text-whiteColor text-sm ml-5 rounded py-0.5">
                                                        <p class="px-10px">
                                                            <i class="icofont-eye"></i> Preview
                                                        </p>
                                                    </a>
                                                </div>
                                            </li>

                                            <li
                                                class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                <div>
                                                    <h4
                                                        class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                        <i class="icofont-video-alt mr-10px"></i>
                                                        <a href="lesson-2.html"
                                                            class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Course
                                                            Outline
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div
                                                    class="text-blackColor dark:text-blackColor-dark text-sm flex items-center">
                                                    <p class="font-semibold">7.00</p>
                                                    <a href="lesson.html"
                                                        class="bg-primaryColor text-whiteColor text-sm ml-5 rounded py-0.5">
                                                        <p class="px-10px">
                                                            <i class="icofont-eye"></i> Preview
                                                        </p>
                                                    </a>
                                                </div>
                                            </li>
                                            <li
                                                class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                <div>
                                                    <h4
                                                        class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                        <i class="icofont-file-text mr-10px"></i>
                                                        <a href="lesson-course-materials.html"
                                                            class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Course
                                                            Materials
                                                        </a>
                                                    </h4>
                                                </div>
                                            </li>
                                            <li
                                                class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                <div>
                                                    <h4
                                                        class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                        <i class="icofont-audio mr-10px"></i>
                                                        <a href="lesson-quiz.html"
                                                            class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">
                                                            Summer Quiz
                                                        </a>
                                                    </h4>
                                                </div>
                                            </li>
                                            <li class="py-4 flex items-center justify-between flex-wrap">
                                                <div>
                                                    <h4
                                                        class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                        <i class="icofont-file-text mr-10px"></i>
                                                        <a href="lesson-assignment.html"
                                                            class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Assignment
                                                        </a>
                                                    </h4>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- assignment right -->
                <div class="xl:col-start-5 xl:col-span-8 relative" data-aos="fade-up">
                    <div>
                        <h4
                            class="text-2xl sm:text-size-28 font-bold leading-1.2 text-blackColor dark:text-blackColor-dark">
                            Latest Assignment lists
                        </h4>
                        <hr class="border-borderColor2 dark:opacity-30 my-4">
                        <div class="overflow-auto">
                            <table class="w-full text-left text-nowrap">
                                <thead
                                    class="text-sm md:text-base text-blackColor dark:text-blackColor-dark bg-lightGrey5 dark:bg-whiteColor-dark leading-1.8 md:leading-1.8">
                                    <tr>
                                        <th class="px-5px py-10px md:px-5">Assignment Name</th>
                                        <th class="px-5px py-10px md:px-5">Total Marks</th>
                                        <th class="px-5px py-10px md:px-5">Total Submit</th>

                                        <th class="px-5px py-10px md:px-5"></th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="text-size-13 md:text-base text-contentColor dark:text-contentColor-dark font-normal">
                                    <tr class="leading-1.8 md:leading-1.8">
                                        <th class="px-5px py-10px md:px-5 font-normal">
                                            <span class="text-blackColor dark:text-blackColor-dark font-bold">Write a the
                                                5</span>
                                            <p>
                                                course:
                                                <a class="text-blackColor dark:text-blackColor-dark"
                                                    href="#">Fundamentals</a>
                                            </p>
                                        </th>
                                        <td class="px-5px py-10px md:px-5">
                                            <p>80</p>
                                        </td>
                                        <td class="px-5px py-10px md:px-5">
                                            <p>2</p>
                                        </td>

                                        <td class="px-5px py-10px md:px-5">
                                            <div class="dashboard__button__group">
                                                <a class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-primaryColor bg-primaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-primaryColor h-30px w-full px-14px leading-30px justify-center rounded-md my-5px"
                                                    href="#">
                                                    <i class="icofont-download"></i>
                                                    Download</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="leading-1.8 md:leading-1.8 bg-lightGrey5 dark:bg-whiteColor-dark">
                                        <th class="px-5px py-10px md:px-5 font-normal">
                                            <span class="text-blackColor dark:text-blackColor-dark font-bold">Write a the
                                                5</span>
                                            <p>
                                                course:
                                                <a class="text-blackColor dark:text-blackColor-dark"
                                                    href="#">Fundamentals</a>
                                            </p>
                                        </th>
                                        <td class="px-5px py-10px md:px-5">
                                            <p>80</p>
                                        </td>
                                        <td class="px-5px py-10px md:px-5">
                                            <p>2</p>
                                        </td>

                                        <td class="px-5px py-10px md:px-5">
                                            <div class="dashboard__button__group">
                                                <a class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-primaryColor bg-primaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-primaryColor h-30px w-full px-14px leading-30px justify-center rounded-md my-5px"
                                                    href="#">
                                                    <i class="icofont-download"></i>
                                                    Download</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="leading-1.8 md:leading-1.8">
                                        <th class="px-5px py-10px md:px-5 font-normal">
                                            <span class="text-blackColor dark:text-blackColor-dark font-bold">Write a the
                                                5</span>
                                            <p>
                                                course:
                                                <a class="text-blackColor dark:text-blackColor-dark"
                                                    href="#">Fundamentals</a>
                                            </p>
                                        </th>
                                        <td class="px-5px py-10px md:px-5">
                                            <p>80</p>
                                        </td>
                                        <td class="px-5px py-10px md:px-5">
                                            <p>2</p>
                                        </td>

                                        <td class="px-5px py-10px md:px-5">
                                            <div class="dashboard__button__group">
                                                <a class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-primaryColor bg-primaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-primaryColor h-30px w-full px-14px leading-30px justify-center rounded-md my-5px"
                                                    href="#">
                                                    <i class="icofont-download"></i>
                                                    Download</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="leading-1.8 md:leading-1.8 bg-lightGrey5 dark:bg-whiteColor-dark">
                                        <th class="px-5px py-10px md:px-5 font-normal">
                                            <span class="text-blackColor dark:text-blackColor-dark font-bold">Write a the
                                                5</span>
                                            <p>
                                                course:
                                                <a class="text-blackColor dark:text-blackColor-dark"
                                                    href="#">Fundamentals</a>
                                            </p>
                                        </th>
                                        <td class="px-5px py-10px md:px-5">
                                            <p>80</p>
                                        </td>
                                        <td class="px-5px py-10px md:px-5">
                                            <p>2</p>
                                        </td>

                                        <td class="px-5px py-10px md:px-5">
                                            <div class="dashboard__button__group">
                                                <a class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-primaryColor bg-primaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-primaryColor h-30px w-full px-14px leading-30px justify-center rounded-md my-5px"
                                                    href="#">
                                                    <i class="icofont-download"></i>
                                                    Download</a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div>
                        <div>
                            <h4
                                class="text-2xl sm:text-size-28 font-bold leading-1.2 text-blackColor dark:text-blackColor-dark">
                                Assignment Submission
                            </h4>
                            <hr class="border-borderColor2 dark:opacity-30 my-4">
                            <form>
                                <div class="mb-4">
                                    <label class="text-darkBlue dark:text-darkBlue-dark mb-2 block" for="email">Email
                                        address</label>
                                    <input type="text" id="email" placeholder="name@example.com"
                                        class="w-full px-3 py-1 bg-transparent focus:outline-none text-darkBlue bg-whiteColor border border-borderColor6 placeholder:opacity-80 focus:shadow-select rounded-md">
                                </div>
                                <div class="mb-4">
                                    <label class="text-darkBlue dark:text-darkBlue-dark mb-2 block"
                                        for="content">Assignment Content</label>
                                    <textarea id="content"
                                        class="w-full px-3 py-1 bg-transparent focus:outline-none text-darkBlue bg-whiteColor border border-borderColor6 placeholder:opacity-80 focus:shadow-select rounded-md"
                                        cols="30" rows="3"></textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="text-darkBlue dark:text-darkBlue-dark mb-2 block" for="file">Drop
                                        file here</label>
                                    <input type="file" id="file"
                                        class="w-full pr-3 pl-40 py-9px text-xl bg-transparent focus:outline-none text-darkBlue bg-whiteColor border border-borderColor6 placeholder:opacity-80 focus:shadow-select cursor-pointer relative rounded-md file:border-0 file:h-full file:absolute file:top-0 file:left-0 file:border-r file:border-borderColor6 file:border-opacity-30 f file:px-4 file:bg-blue-x-light">
                                </div>

                                <div>
                                    <button type="submit"
                                        class="text-size-15 text-whiteColor bg-primaryColor px-25px py-10px border border-primaryColor hover:text-primaryColor hover:bg-whiteColor inline-block rounded group dark:hover:text-whiteColor dark:hover:bg-whiteColor-dark">
                                        Submit Assignment
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
