@extends('dashboard.layouts.layouts')
@section('page_title', 'LearnFlow | Quiz')

@section('content')
    <!-- lesson section -->
    <!-- quiz section -->
    <section>
        <div class="container-fluid-2 py-100px">
            <div class="grid grid-cols-1 xl:grid-cols-12 gap-30px">
                <!-- quiz left -->
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
                <!-- quiz right -->
                <div class="xl:col-start-5 xl:col-span-8 relative" data-aos="fade-up">
                    <!-- question 1 -->
                    <div>
                        <ul class="flex flex-wrap items-center gap-x-1">
                            <li class="text-bodyColor dark:text-bodyColor-dark leading-1.8">
                                Question : 1/3 |
                            </li>
                            <li class="text-bodyColor dark:text-bodyColor-dark leading-1.8">
                                Attempts allowed : 1 |
                            </li>
                            <li class="text-bodyColor dark:text-bodyColor-dark leading-1.8">
                                Time: 5.0 Min
                            </li>
                        </ul>
                        <hr class="border-borderColor2 dark:opacity-30 my-4">
                        <h4
                            class="text-2xl sm:text-size-28 font-bold leading-1.2 text-blackColor dark:text-blackColor-dark mb-15px">
                            1. What is your favourite song?
                        </h4>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-y-0.5 gap-x-30px">
                            <li class="flex items-center gap-x-2">
                                <input
                                    class="relative w-4 h-4 z-0 rounded after:absolute after:w-4 after:h-4 after:left-0 after:top-0 block after:-z-1 after:rounded after:focus:shadow-select box-content"
                                    type="checkbox" value="" id="flexCheckDefault">

                                <label for="flexCheckDefault" class="text-bodyColor dark:text-bodyColor-dark leading-1.8">
                                    Example song 1
                                </label>
                            </li>
                            <li class="flex items-center gap-x-2">
                                <input
                                    class="relative w-4 h-4 z-0 rounded after:absolute after:w-4 after:h-4 after:left-0 after:top-0 block after:-z-1 after:rounded after:focus:shadow-select box-content"
                                    type="checkbox" value="" id="flexCheckDefault2">

                                <label for="flexCheckDefault2"
                                    class="text-bodyColor dark:text-bodyColor-dark leading-1.8">
                                    Example song 2
                                </label>
                            </li>
                            <li class="flex items-center gap-x-2">
                                <input
                                    class="relative w-4 h-4 z-0 rounded after:absolute after:w-4 after:h-4 after:left-0 after:top-0 block after:-z-1 after:rounded after:focus:shadow-select box-content"
                                    type="checkbox" value="" id="flexCheckDefault3">

                                <label for="flexCheckDefault3"
                                    class="text-bodyColor dark:text-bodyColor-dark leading-1.8">
                                    Example song 3
                                </label>
                            </li>
                            <li class="flex items-center gap-x-2">
                                <input
                                    class="relative w-4 h-4 z-0 rounded after:absolute after:w-4 after:h-4 after:left-0 after:top-0 block after:-z-1 after:rounded after:focus:shadow-select box-content"
                                    type="checkbox" value="" id="flexCheckDefault4">

                                <label for="flexCheckDefault4"
                                    class="text-bodyColor dark:text-bodyColor-dark leading-1.8">
                                    Example song 4
                                </label>
                            </li>
                        </ul>
                        <br>
                        <br>
                        <br>
                    </div>
                    <!-- question 2 -->
                    <div>
                        <ul class="flex flex-wrap items-center gap-x-1">
                            <li class="text-bodyColor dark:text-bodyColor-dark leading-1.8">
                                Question : 2/3 |
                            </li>
                            <li class="text-bodyColor dark:text-bodyColor-dark leading-1.8">
                                Attempts allowed : 1 |
                            </li>
                            <li class="text-bodyColor dark:text-bodyColor-dark leading-1.8">
                                Time: 4.0 Min
                            </li>
                        </ul>
                        <hr class="border-borderColor2 dark:opacity-30 my-4">
                        <h4
                            class="text-2xl sm:text-size-28 font-bold leading-1.2 text-blackColor dark:text-blackColor-dark mb-15px">
                            1. What is your best Friend?
                        </h4>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-y-0.5 gap-x-30px">
                            <li class="flex items-center gap-x-2">
                                <input
                                    class="relative w-4 h-4 z-0 rounded after:absolute after:w-4 after:h-4 after:left-0 after:top-0 block after:-z-1 after:rounded after:focus:shadow-select box-content"
                                    type="checkbox" value="" id="name">

                                <label for="name" class="text-bodyColor dark:text-bodyColor-dark leading-1.8">
                                    Example name 1
                                </label>
                            </li>
                            <li class="flex items-center gap-x-2">
                                <input
                                    class="relative w-4 h-4 z-0 rounded after:absolute after:w-4 after:h-4 after:left-0 after:top-0 block after:-z-1 after:rounded after:focus:shadow-select box-content"
                                    type="checkbox" value="" id="name2">

                                <label for="name2" class="text-bodyColor dark:text-bodyColor-dark leading-1.8">
                                    Example name 2
                                </label>
                            </li>
                            <li class="flex items-center gap-x-2">
                                <input
                                    class="relative w-4 h-4 z-0 rounded after:absolute after:w-4 after:h-4 after:left-0 after:top-0 block after:-z-1 after:rounded after:focus:shadow-select box-content"
                                    type="checkbox" value="" id="name3">

                                <label for="name3" class="text-bodyColor dark:text-bodyColor-dark leading-1.8">
                                    Example name 3
                                </label>
                            </li>
                            <li class="flex items-center gap-x-2">
                                <input
                                    class="relative w-4 h-4 z-0 rounded after:absolute after:w-4 after:h-4 after:left-0 after:top-0 block after:-z-1 after:rounded after:focus:shadow-select box-content"
                                    type="checkbox" value="" id="name4">

                                <label for="name4" class="text-bodyColor dark:text-bodyColor-dark leading-1.8">
                                    Example name 4
                                </label>
                            </li>
                        </ul>
                        <br>
                        <br>
                        <br>
                    </div>
                    <!-- question 3 -->
                    <div>
                        <ul class="flex flex-wrap items-center gap-x-1">
                            <li class="text-bodyColor dark:text-bodyColor-dark leading-1.8">
                                Question : 3/3 |
                            </li>
                            <li class="text-bodyColor dark:text-bodyColor-dark leading-1.8">
                                Attempts allowed : 1 |
                            </li>
                            <li class="text-bodyColor dark:text-bodyColor-dark leading-1.8">
                                Time: 6.0 Min
                            </li>
                        </ul>
                        <hr class="border-borderColor2 dark:opacity-30 my-4">
                        <h4
                            class="text-2xl sm:text-size-28 font-bold leading-1.2 text-blackColor dark:text-blackColor-dark mb-15px">
                            1. What is your best Mentor Name?
                        </h4>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-y-0.5 gap-x-30px">
                            <li class="flex items-center gap-x-2">
                                <input
                                    class="relative w-4 h-4 z-0 rounded after:absolute after:w-4 after:h-4 after:left-0 after:top-0 block after:-z-1 after:rounded after:focus:shadow-select box-content"
                                    type="checkbox" value="" id="mentor">

                                <label for="mentor" class="text-bodyColor dark:text-bodyColor-dark leading-1.8">
                                    Example name 1
                                </label>
                            </li>
                            <li class="flex items-center gap-x-2">
                                <input
                                    class="relative w-4 h-4 z-0 rounded after:absolute after:w-4 after:h-4 after:left-0 after:top-0 block after:-z-1 after:rounded after:focus:shadow-select box-content"
                                    type="checkbox" value="" id="mentor2">

                                <label for="mentor2" class="text-bodyColor dark:text-bodyColor-dark leading-1.8">
                                    Example name 2
                                </label>
                            </li>
                            <li class="flex items-center gap-x-2">
                                <input
                                    class="relative w-4 h-4 z-0 rounded after:absolute after:w-4 after:h-4 after:left-0 after:top-0 block after:-z-1 after:rounded after:focus:shadow-select box-content"
                                    type="checkbox" value="" id="mentor3">

                                <label for="mentor3" class="text-bodyColor dark:text-bodyColor-dark leading-1.8">
                                    Example name 3
                                </label>
                            </li>
                            <li class="flex items-center gap-x-2">
                                <input
                                    class="relative w-4 h-4 z-0 rounded after:absolute after:w-4 after:h-4 after:left-0 after:top-0 block after:-z-1 after:rounded after:focus:shadow-select box-content"
                                    type="checkbox" value="" id="mentor4">

                                <label for="mentor4" class="text-bodyColor dark:text-bodyColor-dark leading-1.8">
                                    Example name 4
                                </label>
                            </li>
                        </ul>
                        <br>
                        <br>
                        <br>
                    </div>
                    <div>
                        <button type="submit"
                            class="text-size-15 text-whiteColor bg-primaryColor px-25px py-10px border border-primaryColor hover:text-primaryColor hover:bg-whiteColor inline-block rounded group dark:hover:text-whiteColor dark:hover:bg-whiteColor-dark">
                            Quiz Submit <i class="icofont-long-arrow-right"></i>
                        </button>
                    </div>
                    <br><br><br>
                    <div>
                        <h4
                            class="text-2xl sm:text-size-28 font-bold leading-1.2 text-blackColor dark:text-blackColor-dark mb-15px">
                            Quiz Result
                        </h4>
                        <div class="overflow-auto">
                            <table class="w-full text-left text-nowrap">
                                <thead
                                    class="text-sm md:text-base text-blackColor dark:text-blackColor-dark bg-lightGrey5 dark:bg-whiteColor-dark leading-1.8 md:leading-1.8">
                                    <tr>
                                        <th class="px-5px py-10px md:px-5">Quiz</th>
                                        <th class="px-5px py-10px md:px-5">Qus</th>
                                        <th class="px-5px py-10px md:px-5">TM</th>
                                        <th class="px-5px py-10px md:px-5">CA</th>
                                        <th class="px-5px py-10px md:px-5">Result</th>
                                        <th class="px-5px py-10px md:px-5"></th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="text-size-13 md:text-base text-contentColor dark:text-contentColor-dark font-normal">
                                    <tr class="leading-1.8 md:leading-1.8">
                                        <th class="px-5px py-10px md:px-5 font-normal">
                                            <p>December 26, 2024</p>
                                            <span class="text-blackColor dark:text-blackColor-dark font-bold">Write a on
                                                yourself using the 5</span>
                                            <p>
                                                Student:
                                                <a class="text-blackColor dark:text-blackColor-dark" href="#">John
                                                    Due</a>
                                            </p>
                                        </th>
                                        <td class="px-5px py-10px md:px-5">
                                            <p>4</p>
                                        </td>
                                        <td class="px-5px py-10px md:px-5">
                                            <p>8</p>
                                        </td>
                                        <td class="px-5px py-10px md:px-5">
                                            <p>4</p>
                                        </td>
                                        <td class="px-5px py-10px md:px-5">
                                            <p class="text-xs">
                                                <span
                                                    class="h-22px inline-block px-7px bg-greencolor2 leading-22px font-bold text-whiteColor rounded-md">Pass</span>
                                            </p>
                                        </td>
                                        <td class="px-5px py-10px md:px-5">
                                            <div class="dashboard__button__group">
                                                <a class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-primaryColor bg-primaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-primaryColor h-30px w-full px-14px leading-30px justify-center rounded-md my-5px"
                                                    href="#">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-edit">
                                                        <path
                                                            d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                        </path>
                                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                        </path>
                                                    </svg>
                                                    Edit</a>
                                                <a class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-secondaryColor bg-secondaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-secondaryColor h-30px w-full px-14px leading-30px justify-center rounded-md my-5px"
                                                    href="#">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-trash-2">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                        </path>
                                                        <line x1="10" y1="11" x2="10"
                                                            y2="17"></line>
                                                        <line x1="14" y1="11" x2="14"
                                                            y2="17"></line>
                                                    </svg>
                                                    Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="leading-1.8 md:leading-1.8 bg-lightGrey5 dark:bg-whiteColor-dark">
                                        <th class="px-5px py-10px md:px-5 font-normal">
                                            <p class="flex">December 26, 2024</p>
                                            <span class="text-blackColor dark:text-blackColor-dark font-bold">Write a on
                                                yourself using the 5</span>
                                            <p>
                                                Student:
                                                <a class="text-blackColor dark:text-blackColor-dark" href="#">John
                                                    Due</a>
                                            </p>
                                        </th>
                                        <td class="px-5px py-10px md:px-5">
                                            <p>4</p>
                                        </td>
                                        <td class="px-5px py-10px md:px-5">
                                            <p>8</p>
                                        </td>
                                        <td class="px-5px py-10px md:px-5">
                                            <p>4</p>
                                        </td>
                                        <td class="px-5px py-10px md:px-5">
                                            <p class="text-xs">
                                                <span
                                                    class="h-22px inline-block px-7px bg-greencolor2 leading-22px font-bold text-whiteColor rounded-md">Pass</span>
                                            </p>
                                        </td>
                                        <td class="px-5px py-10px md:px-5">
                                            <div class="dashboard__button__group">
                                                <a class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-primaryColor bg-primaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-primaryColor h-30px w-full px-14px leading-30px justify-center rounded-md my-5px"
                                                    href="#">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-edit">
                                                        <path
                                                            d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                        </path>
                                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                        </path>
                                                    </svg>
                                                    Edit</a>
                                                <a class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-secondaryColor bg-secondaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-secondaryColor h-30px w-full px-14px leading-30px justify-center rounded-md my-5px"
                                                    href="#">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-trash-2">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                        </path>
                                                        <line x1="10" y1="11" x2="10"
                                                            y2="17"></line>
                                                        <line x1="14" y1="11" x2="14"
                                                            y2="17"></line>
                                                    </svg>
                                                    Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="leading-1.8 md:leading-1.8">
                                        <th class="px-5px py-10px md:px-5 font-normal">
                                            <p class="flex">December 26, 2024</p>
                                            <span class="text-blackColor dark:text-blackColor-dark font-bold">Write a on
                                                yourself using the 5</span>
                                            <p>
                                                Student:
                                                <a class="text-blackColor dark:text-blackColor-dark" href="#">John
                                                    Due</a>
                                            </p>
                                        </th>
                                        <td class="px-5px py-10px md:px-5">
                                            <p>4</p>
                                        </td>
                                        <td class="px-5px py-10px md:px-5">
                                            <p>8</p>
                                        </td>
                                        <td class="px-5px py-10px md:px-5">
                                            <p>4</p>
                                        </td>
                                        <td class="px-5px py-10px md:px-5">
                                            <p class="text-xs">
                                                <span
                                                    class="h-22px inline-block px-7px bg-greencolor2 leading-22px font-bold text-whiteColor rounded-md">Pass</span>
                                            </p>
                                        </td>
                                        <td class="px-5px py-10px md:px-5">
                                            <div class="dashboard__button__group">
                                                <a class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-primaryColor bg-primaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-primaryColor h-30px w-full px-14px leading-30px justify-center rounded-md my-5px"
                                                    href="#">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-edit">
                                                        <path
                                                            d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                        </path>
                                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                        </path>
                                                    </svg>
                                                    Edit</a>
                                                <a class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-secondaryColor bg-secondaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-secondaryColor h-30px w-full px-14px leading-30px justify-center rounded-md my-5px"
                                                    href="#">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-trash-2">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                        </path>
                                                        <line x1="10" y1="11" x2="10"
                                                            y2="17"></line>
                                                        <line x1="14" y1="11" x2="14"
                                                            y2="17"></line>
                                                    </svg>
                                                    Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="leading-1.8 md:leading-1.8 bg-lightGrey5 dark:bg-whiteColor-dark">
                                        <th class="px-5px py-10px md:px-5 font-normal">
                                            <p class="flex">December 26, 2024</p>
                                            <span class="text-blackColor dark:text-blackColor-dark font-bold">Write a on
                                                yourself using the 5</span>
                                            <p>
                                                Student:
                                                <a class="text-blackColor dark:text-blackColor-dark" href="#">John
                                                    Due</a>
                                            </p>
                                        </th>
                                        <td class="px-5px py-10px md:px-5">
                                            <p>4</p>
                                        </td>
                                        <td class="px-5px py-10px md:px-5">
                                            <p>8</p>
                                        </td>
                                        <td class="px-5px py-10px md:px-5">
                                            <p>4</p>
                                        </td>
                                        <td class="px-5px py-10px md:px-5">
                                            <p class="text-xs">
                                                <span
                                                    class="h-22px inline-block px-7px bg-greencolor2 leading-22px font-bold text-whiteColor rounded-md">Pass</span>
                                            </p>
                                        </td>
                                        <td class="px-5px py-10px md:px-5">
                                            <div class="dashboard__button__group">
                                                <a class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-primaryColor bg-primaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-primaryColor h-30px w-full px-14px leading-30px justify-center rounded-md my-5px"
                                                    href="#">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-edit">
                                                        <path
                                                            d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                        </path>
                                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                        </path>
                                                    </svg>
                                                    Edit</a>
                                                <a class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-secondaryColor bg-secondaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-secondaryColor h-30px w-full px-14px leading-30px justify-center rounded-md my-5px"
                                                    href="#">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-trash-2">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                        </path>
                                                        <line x1="10" y1="11" x2="10"
                                                            y2="17"></line>
                                                        <line x1="14" y1="11" x2="14"
                                                            y2="17"></line>
                                                    </svg>
                                                    Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
