@extends('dashboard.layouts.layouts')
@section('page_title', 'LearnFlow | Lesson Assignments')

@section('content')
   <!-- lesson section -->
   <section>
    <div class="container-fluid-2 py-100px">
      <div class="grid grid-cols-1 xl:grid-cols-12 gap-30px">
        <!-- lesson left -->
        <div class="xl:col-start-1 xl:col-span-4" data-aos="fade-up">
          <!-- curriculum -->
          <ul class="accordion-container curriculum">
            <!-- accordion -->
            <li class="accordion mb-25px overflow-hidden active">
              <div
                class="bg-whiteColor border border-borderColor dark:bg-whiteColor-dark dark:border-borderColor-dark rounded-t-md"
              >
                <!-- controller -->
                <div>
                  <button
                    class="accordion-controller flex justify-between items-center text-xl text-headingColor font-bold w-full px-5 py-18px dark:text-headingColor-dark font-hind leading-[20px]"
                  >
                    <span>Lesson #01</span>

                    <svg
                      class="transition-all duration-500 rotate-0"
                      width="20"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 16 16"
                      fill="#212529"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"
                      ></path>
                    </svg>
                  </button>
                </div>
                <!-- content -->
                <div class="accordion-content transition-all duration-500">
                  <div class="content-wrapper p-10px md:px-30px">
                    <ul>
                      <li
                        class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark"
                      >
                        <div>
                          <h4
                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light"
                          >
                            <i class="icofont-video-alt mr-10px"></i>
                            <a
                              href="lesson.html"
                              class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor"
                              >Course Intro
                            </a>
                          </h4>
                        </div>
                        <div
                          class="text-blackColor dark:text-blackColor-dark text-sm flex items-center"
                        >
                          <p class="font-semibold">3.27</p>
                          <a
                            href="lesson.html"
                            class="bg-primaryColor text-whiteColor text-sm ml-5 rounded py-0.5"
                          >
                            <p class="px-10px">
                              <i class="icofont-eye"></i> Preview
                            </p>
                          </a>
                        </div>
                      </li>

                      <li
                        class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark"
                      >
                        <div>
                          <h4
                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light"
                          >
                            <i class="icofont-video-alt mr-10px"></i>
                            <a
                              href="lesson-2.html"
                              class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor"
                              >Course Outline
                            </a>
                          </h4>
                        </div>
                        <div
                          class="text-blackColor dark:text-blackColor-dark text-sm flex items-center"
                        >
                          <p class="font-semibold">5.00</p>
                          <a
                            href="lesson.html"
                            class="bg-primaryColor text-whiteColor text-sm ml-5 rounded py-0.5"
                          >
                            <p class="px-10px">
                              <i class="icofont-eye"></i> Preview
                            </p>
                          </a>
                        </div>
                      </li>

                      <li
                        class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark"
                      >
                        <div>
                          <h4
                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light"
                          >
                            <i class="icofont-file-text mr-10px"></i>
                            <a
                              href="lesson-course-materials.html"
                              class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor"
                              >Course Materials
                            </a>
                          </h4>
                        </div>
                      </li>
                      <li
                        class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark"
                      >
                        <div>
                          <h4
                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light"
                          >
                            <i class="icofont-audio mr-10px"></i>
                            <a
                              href="lesson-quiz.html"
                              class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor"
                            >
                              Summer Quiz
                            </a>
                          </h4>
                        </div>
                      </li>
                      <li
                        class="py-4 flex items-center justify-between flex-wrap"
                      >
                        <div>
                          <h4
                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light"
                          >
                            <i class="icofont-file-text mr-10px"></i>
                            <a
                              href="lesson-assignment.html"
                              class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor"
                              >Assignment
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
                class="bg-whiteColor border border-borderColor dark:bg-whiteColor-dark dark:border-borderColor-dark"
              >
                <!-- controller -->
                <div>
                  <button
                    class="accordion-controller flex justify-between items-center text-xl text-headingColor font-bold w-full px-5 py-18px dark:text-headingColor-dark font-hind leading-[20px]"
                  >
                    <span>Lesson #02</span>

                    <svg
                      class="transition-all duration-500 rotate-0"
                      width="20"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 16 16"
                      fill="#212529"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"
                      ></path>
                    </svg>
                  </button>
                </div>
                <!-- content -->
                <div
                  class="accordion-content transition-all duration-500 h-0"
                >
                  <div class="content-wrapper p-10px md:px-30px">
                    <ul>
                      <li
                        class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark"
                      >
                        <div>
                          <h4
                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light"
                          >
                            <i class="icofont-video-alt mr-10px"></i>
                            <a
                              href="lesson.html"
                              class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor"
                              >Course Intro
                            </a>
                          </h4>
                        </div>
                        <div
                          class="text-blackColor dark:text-blackColor-dark text-sm flex items-center"
                        >
                          <p class="font-semibold">3.27</p>
                          <a
                            href="lesson.html"
                            class="bg-primaryColor text-whiteColor text-sm ml-5 rounded py-0.5"
                          >
                            <p class="px-10px">
                              <i class="icofont-eye"></i> Preview
                            </p>
                          </a>
                        </div>
                      </li>

                      <li
                        class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark"
                      >
                        <div>
                          <h4
                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light"
                          >
                            <i class="icofont-video-alt mr-10px"></i>
                            <a
                              href="lesson-2.html"
                              class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor"
                              >Course Outline
                            </a>
                          </h4>
                        </div>
                        <div
                          class="text-blackColor dark:text-blackColor-dark text-sm flex items-center"
                        >
                          <p class="font-semibold">5.00</p>
                          <a
                            href="lesson.html"
                            class="bg-primaryColor text-whiteColor text-sm ml-5 rounded py-0.5"
                          >
                            <p class="px-10px">
                              <i class="icofont-eye"></i> Preview
                            </p>
                          </a>
                        </div>
                      </li>

                      <li
                        class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark"
                      >
                        <div>
                          <h4
                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light"
                          >
                            <i class="icofont-video-alt mr-10px"></i>
                            <a
                              href="lesson-2.html"
                              class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor"
                              >Course Outline
                            </a>
                          </h4>
                        </div>
                        <div
                          class="text-blackColor dark:text-blackColor-dark text-sm flex items-center"
                        >
                          <p class="font-semibold">7.00</p>
                          <a
                            href="lesson.html"
                            class="bg-primaryColor text-whiteColor text-sm ml-5 rounded py-0.5"
                          >
                            <p class="px-10px">
                              <i class="icofont-eye"></i> Preview
                            </p>
                          </a>
                        </div>
                      </li>
                      <li
                        class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark"
                      >
                        <div>
                          <h4
                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light"
                          >
                            <i class="icofont-file-text mr-10px"></i>
                            <a
                              href="lesson-course-materials.html"
                              class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor"
                              >Course Materials
                            </a>
                          </h4>
                        </div>
                      </li>
                      <li
                        class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark"
                      >
                        <div>
                          <h4
                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light"
                          >
                            <i class="icofont-audio mr-10px"></i>
                            <a
                              href="lesson-quiz.html"
                              class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor"
                            >
                              Summer Quiz
                            </a>
                          </h4>
                        </div>
                      </li>
                      <li
                        class="py-4 flex items-center justify-between flex-wrap"
                      >
                        <div>
                          <h4
                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light"
                          >
                            <i class="icofont-file-text mr-10px"></i>
                            <a
                              href="lesson-assignment.html"
                              class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor"
                              >Assignment
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
                class="bg-whiteColor border border-borderColor dark:bg-whiteColor-dark dark:border-borderColor-dark"
              >
                <!-- controller -->
                <div>
                  <button
                    class="accordion-controller flex justify-between items-center text-xl text-headingColor font-bold w-full px-5 py-18px dark:text-headingColor-dark font-hind leading-[20px]"
                  >
                    <span>Lesson #03</span>

                    <svg
                      class="transition-all duration-500 rotate-0"
                      width="20"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 16 16"
                      fill="#212529"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"
                      ></path>
                    </svg>
                  </button>
                </div>
                <!-- content -->
                <div
                  class="accordion-content transition-all duration-500 h-0"
                >
                  <div class="content-wrapper p-10px md:px-30px">
                    <ul>
                      <li
                        class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark"
                      >
                        <div>
                          <h4
                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light"
                          >
                            <i class="icofont-video-alt mr-10px"></i>
                            <a
                              href="lesson.html"
                              class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor"
                              >Course Intro
                            </a>
                          </h4>
                        </div>
                        <div
                          class="text-blackColor dark:text-blackColor-dark text-sm flex items-center"
                        >
                          <p class="font-semibold">3.27</p>
                          <a
                            href="lesson.html"
                            class="bg-primaryColor text-whiteColor text-sm ml-5 rounded py-0.5"
                          >
                            <p class="px-10px">
                              <i class="icofont-eye"></i> Preview
                            </p>
                          </a>
                        </div>
                      </li>

                      <li
                        class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark"
                      >
                        <div>
                          <h4
                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light"
                          >
                            <i class="icofont-video-alt mr-10px"></i>
                            <a
                              href="lesson-2.html"
                              class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor"
                              >Course Outline
                            </a>
                          </h4>
                        </div>
                        <div
                          class="text-blackColor dark:text-blackColor-dark text-sm flex items-center"
                        >
                          <p class="font-semibold">5.00</p>
                          <a
                            href="lesson.html"
                            class="bg-primaryColor text-whiteColor text-sm ml-5 rounded py-0.5"
                          >
                            <p class="px-10px">
                              <i class="icofont-eye"></i> Preview
                            </p>
                          </a>
                        </div>
                      </li>

                      <li
                        class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark"
                      >
                        <div>
                          <h4
                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light"
                          >
                            <i class="icofont-video-alt mr-10px"></i>
                            <a
                              href="lesson-2.html"
                              class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor"
                              >Course Outline
                            </a>
                          </h4>
                        </div>
                        <div
                          class="text-blackColor dark:text-blackColor-dark text-sm flex items-center"
                        >
                          <p class="font-semibold">7.00</p>
                          <a
                            href="lesson.html"
                            class="bg-primaryColor text-whiteColor text-sm ml-5 rounded py-0.5"
                          >
                            <p class="px-10px">
                              <i class="icofont-eye"></i> Preview
                            </p>
                          </a>
                        </div>
                      </li>
                      <li
                        class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark"
                      >
                        <div>
                          <h4
                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light"
                          >
                            <i class="icofont-file-text mr-10px"></i>
                            <a
                              href="lesson-course-materials.html"
                              class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor"
                              >Course Materials
                            </a>
                          </h4>
                        </div>
                      </li>
                      <li
                        class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark"
                      >
                        <div>
                          <h4
                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light"
                          >
                            <i class="icofont-audio mr-10px"></i>
                            <a
                              href="lesson-quiz.html"
                              class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor"
                            >
                              Summer Quiz
                            </a>
                          </h4>
                        </div>
                      </li>
                      <li
                        class="py-4 flex items-center justify-between flex-wrap"
                      >
                        <div>
                          <h4
                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light"
                          >
                            <i class="icofont-file-text mr-10px"></i>
                            <a
                              href="lesson-assignment.html"
                              class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor"
                              >Assignment
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
                class="bg-whiteColor border border-borderColor dark:bg-whiteColor-dark dark:border-borderColor-dark rounded-b-md"
              >
                <!-- controller -->
                <div>
                  <button
                    class="accordion-controller flex justify-between items-center text-xl text-headingColor font-bold w-full px-5 py-18px dark:text-headingColor-dark font-hind leading-[20px]"
                  >
                    <span>Lesson #04</span>

                    <svg
                      class="transition-all duration-500 rotate-0"
                      width="20"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 16 16"
                      fill="#212529"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"
                      ></path>
                    </svg>
                  </button>
                </div>
                <!-- content -->
                <div
                  class="accordion-content transition-all duration-500 h-0"
                >
                  <div class="content-wrapper p-10px md:px-30px">
                    <ul>
                      <li
                        class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark"
                      >
                        <div>
                          <h4
                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light"
                          >
                            <i class="icofont-video-alt mr-10px"></i>
                            <a
                              href="lesson.html"
                              class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor"
                              >Course Intro
                            </a>
                          </h4>
                        </div>
                        <div
                          class="text-blackColor dark:text-blackColor-dark text-sm flex items-center"
                        >
                          <p class="font-semibold">3.27</p>
                          <a
                            href="lesson.html"
                            class="bg-primaryColor text-whiteColor text-sm ml-5 rounded py-0.5"
                          >
                            <p class="px-10px">
                              <i class="icofont-eye"></i> Preview
                            </p>
                          </a>
                        </div>
                      </li>

                      <li
                        class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark"
                      >
                        <div>
                          <h4
                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light"
                          >
                            <i class="icofont-video-alt mr-10px"></i>
                            <a
                              href="lesson-2.html"
                              class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor"
                              >Course Outline
                            </a>
                          </h4>
                        </div>
                        <div
                          class="text-blackColor dark:text-blackColor-dark text-sm flex items-center"
                        >
                          <p class="font-semibold">5.00</p>
                          <a
                            href="lesson.html"
                            class="bg-primaryColor text-whiteColor text-sm ml-5 rounded py-0.5"
                          >
                            <p class="px-10px">
                              <i class="icofont-eye"></i> Preview
                            </p>
                          </a>
                        </div>
                      </li>

                      <li
                        class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark"
                      >
                        <div>
                          <h4
                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light"
                          >
                            <i class="icofont-video-alt mr-10px"></i>
                            <a
                              href="lesson-2.html"
                              class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor"
                              >Course Outline
                            </a>
                          </h4>
                        </div>
                        <div
                          class="text-blackColor dark:text-blackColor-dark text-sm flex items-center"
                        >
                          <p class="font-semibold">7.00</p>
                          <a
                            href="lesson.html"
                            class="bg-primaryColor text-whiteColor text-sm ml-5 rounded py-0.5"
                          >
                            <p class="px-10px">
                              <i class="icofont-eye"></i> Preview
                            </p>
                          </a>
                        </div>
                      </li>
                      <li
                        class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark"
                      >
                        <div>
                          <h4
                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light"
                          >
                            <i class="icofont-file-text mr-10px"></i>
                            <a
                              href="lesson-course-materials.html"
                              class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor"
                              >Course Materials
                            </a>
                          </h4>
                        </div>
                      </li>
                      <li
                        class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark"
                      >
                        <div>
                          <h4
                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light"
                          >
                            <i class="icofont-audio mr-10px"></i>
                            <a
                              href="lesson-quiz.html"
                              class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor"
                            >
                              Summer Quiz
                            </a>
                          </h4>
                        </div>
                      </li>
                      <li
                        class="py-4 flex items-center justify-between flex-wrap"
                      >
                        <div>
                          <h4
                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light"
                          >
                            <i class="icofont-file-text mr-10px"></i>
                            <a
                              href="lesson-assignment.html"
                              class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor"
                              >Assignment
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
        <!-- lesson right -->
        <div
          class="xl:col-start-5 xl:col-span-8 relative"
          data-aos="fade-up"
        >
          <div data-aos="fade-up" class="2xl:ml-65px">
            <h3
              class="text-3xl md:text-size-45 leading-10 md:leading-2xl font-bold text-blackColor dark:text-blackColor-dark pb-30px md:pb-10px lg:pb-30px"
            >
              Projects you will made.
            </h3>
            <p
              class="text-sm md:text-base leading-7 text-contentColor dark:text-contentColor-dark mb-25px"
            >
              Meet my startup design agency Shape Rex Currently I am working
              at CodeNext as Product Designer. Lorem ipsum dolor sit amet
              consectetur adipisicing elit. A, quaerat excepturi accusantium
              eum, dolorem ipsa deleniti dicta voluptates reiciendis tempore
              aliquid assumenda at labore, unde quibusdam! Tenetur hic enim
              odit.
              <br ><br >
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. In
              illum facilis quaerat expedita. Inventore, commodi. Non
              molestias neque esse ipsam temporibus quia accusantium
              voluptas facilis enim blanditiis, doloribus, facere omnis.
            </p>
            <p
              class="flex items-center gap-x-4 text-lg text-blackColor dark:text-blackColor-dark mb-15px"
            >
              <img
                loading="lazy"
                src="assets/images/about/about_15.png"
                alt="about"
              >
              <span
                ><b>10+ Years ExperienceIn</b> this game, Means Product
                Designing</span
              >
            </p>
            <p
              class="text-sm md:text-base leading-7 text-contentColor dark:text-contentColor-dark mb-15px"
            >
              I love to work in User Experience & User Interface designing.
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Provident quod, maxime dolor beatae repellendus blanditiis
              error molestias accusamus optio suscipit nostrum tempora
              consectetur, vel placeat pariatur aliquid nisi harum sed
              cupiditate repudiandae dolorum facere repellat fugit.
            </p>
            <ul class="space-y-5">
              <li class="flex items-center group">
                <i
                  class="icofont-check px-2 py-2 text-primaryColor bg-whitegrey3 bg-opacity-40 group-hover:bg-primaryColor group-hover:text-white group-hover:opacity-100 mr-15px dark:bg-whitegrey1-dark"
                ></i>
                <p
                  class="text-sm md:text-base font-medium text-blackColor dark:text-blackColor-dark"
                >
                  eCommerce design, Creative.
                </p>
              </li>
              <li class="flex items-center group">
                <i
                  class="icofont-check px-2 py-2 text-primaryColor bg-whitegrey3 bg-opacity-40 group-hover:bg-primaryColor group-hover:text-white group-hover:opacity-100 mr-15px dark:bg-whitegrey1-dark"
                ></i>
                <p
                  class="text-sm md:text-base font-medium text-blackColor dark:text-blackColor-dark"
                >
                  Business, Corporate, Education.
                </p>
              </li>
              <li class="flex items-center group">
                <i
                  class="icofont-check px-2 py-2 text-primaryColor bg-whitegrey3 bg-opacity-40 group-hover:bg-primaryColor group-hover:text-white group-hover:opacity-100 mr-15px dark:bg-whitegrey1-dark"
                ></i>
                <p
                  class="text-sm md:text-base font-medium text-blackColor dark:text-blackColor-dark"
                >
                  Business, Corporate, Education.
                </p>
              </li>
              <li class="flex items-center group">
                <i
                  class="icofont-check px-2 py-2 text-primaryColor bg-whitegrey3 bg-opacity-40 group-hover:bg-primaryColor group-hover:text-white group-hover:opacity-100 mr-15px dark:bg-whitegrey1-dark"
                ></i>
                <p
                  class="text-sm md:text-base font-medium text-blackColor dark:text-blackColor-dark"
                >
                  Non-Profit, It & Tech, Hosting.
                </p>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection