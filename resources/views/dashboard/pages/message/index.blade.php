@extends('dashboard.layouts.layouts')
@section('page_title', 'LearnFlow | Message')

@section('content')
      <!-- dashboard content -->
      <div class="lg:col-start-4 lg:col-span-9">
        <!-- Messages area -->
        <div>
          <div class="mb-15px">
            <h2
              class="text-2xl font-bold text-blackColor dark:text-blackColor-dark"
            >
              Messages
            </h2>
          </div>
          <!-- message body -->
          <div
            class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-12 gap-30px"
          >
            <!-- participant -->
            <div class="xl:col-start-1 xl:col-span-5">
              <div
                class="bg-whiteColor dark:bg-whiteColor-dark border border-borderColor dark:border-borderColor-dark rounded-lg2 max-h-150 overflow-auto"
              >
                <!-- heading -->
                <div
                  class="text-size-22 px-30px py-15px bg-deepgreen dark:bg-deepgreen-dark text-whiteColor dark:text-whiteColor-dark leading-30px font-semibold"
                >
                  <h5>Chats</h5>
                </div>
                <!-- search participant-->
                <div class="p-30px">
                  <form>
                    <div
                      class="text-darkdeep4 flex items-center pl-5 border border-borderColor dark:border-borderColor-dark rounded-full"
                    >
                      <i
                        class="icofont-search-1 text-lg cursor-pointer"
                      ></i>
                      <input
                        type="text"
                        placeholder="Search"
                        class="w-full px-5 pl-10px py-10px bg-transparent text-sm focus:outline-none placeholder:text-placeholder placeholder:opacity-80 leading-7 font-medium"
                      >
                    </div>
                  </form>
                </div>

                <!-- participant list -->
                <ul>
                  <li
                    class="border-t border-borderColor dark:border-borderColor-dark"
                  >
                   <div
                      class="cursor-pointer flex items-center flex-wrap py-15px px-30px max-w-435px w-full"
                    >
                      <!-- avatar -->
                      <div class="max-w-50px mr-5 relative">
                        <span
                          class="absolute left-[38px] bottom-0 w-15px h-15px bg-primaryColor border-3px border-whiteColor dark:border-whiteColor-dark rounded-full"
                        ></span>
                        <img
                          src="../../assets/images/teacher/teacher__1.png"
                          alt=""
                          class="w-full"
                        >
                      </div>
                      <!-- details -->
                      <div class="flex-grow">
                        <div>
                          <h5
                            class="text-lg font-medium text-blackColor dark:text-blackColor-dark flex items-center justify-between"
                          >
                            <span class="leading-6">Rex Allen</span>

                            <span
                              class="text-sm text-darkdeep4 font-inter leading-6 font-normal"
                              >12 min</span
                            >
                          </h5>
                          <p
                            class="text-sm text-darkdeep4 text-start leading-6"
                          >
                            Hey, How are you?
                          </p>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li
                    class="border-t border-borderColor dark:border-borderColor-dark"
                  >
                   <div
                      class="cursor-pointer flex items-center flex-wrap py-15px px-30px max-w-435px w-full"
                    >
                      <!-- avatar -->
                      <div class="max-w-50px mr-5 relative">
                        <span
                          class="absolute left-[38px] bottom-0 w-15px h-15px bg-primaryColor border-3px border-whiteColor dark:border-whiteColor-dark rounded-full"
                        ></span>
                        <img
                          src="../../assets/images/teacher/teacher__2.png"
                          alt=""
                          class="w-full"
                        >
                      </div>
                      <!-- details -->
                      <div class="flex-grow">
                        <div>
                          <h5
                            class="text-lg font-medium text-blackColor dark:text-blackColor-dark flex items-center justify-between"
                          >
                            <span class="leading-6">Rex Allen</span>

                            <span
                              class="text-sm text-darkdeep4 font-inter leading-6 font-normal"
                              >4:35pm</span
                            >
                          </h5>
                          <p
                            class="text-sm text-darkdeep4 text-start leading-6"
                          >
                            Hey, How are you?
                          </p>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li
                    class="border-t border-borderColor dark:border-borderColor-dark"
                  >
                   <div
                      class="cursor-pointer flex items-center flex-wrap py-15px px-30px max-w-435px w-full"
                    >
                      <!-- avatar -->
                      <div class="max-w-50px mr-5 relative">
                        <span
                          class="absolute left-[38px] bottom-0 w-15px h-15px bg-primaryColor border-3px border-whiteColor dark:border-whiteColor-dark rounded-full"
                        ></span>
                        <img
                          src="../../assets/images/teacher/teacher__3.png"
                          alt=""
                          class="w-full"
                        >
                      </div>
                      <!-- details -->
                      <div class="flex-grow">
                        <div>
                          <h5
                            class="text-lg font-medium text-blackColor dark:text-blackColor-dark flex items-center justify-between"
                          >
                            <span class="leading-6">Julia Jhones</span>

                            <span
                              class="text-sm text-darkdeep4 font-inter leading-6 font-normal"
                              >1:40pm</span
                            >
                          </h5>
                          <p
                            class="text-sm text-darkdeep4 text-start leading-6"
                          >
                            Hey, How are you?
                          </p>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li
                    class="border-t border-borderColor dark:border-borderColor-dark"
                  >
                   <div
                      class="cursor-pointer flex items-center flex-wrap py-15px px-30px max-w-435px w-full"
                    >
                      <!-- avatar -->
                      <div class="max-w-50px mr-5 relative">
                        <span
                          class="absolute left-[38px] bottom-0 w-15px h-15px bg-primaryColor border-3px border-whiteColor dark:border-whiteColor-dark rounded-full"
                        ></span>
                        <img
                          src="../../assets/images/teacher/teacher__4.png"
                          alt=""
                          class="w-full"
                        >
                      </div>
                      <!-- details -->
                      <div class="flex-grow">
                        <div>
                          <h5
                            class="text-lg font-medium text-blackColor dark:text-blackColor-dark flex items-center justify-between"
                          >
                            <span class="leading-6">Anderson</span>

                            <span
                              class="text-sm text-darkdeep4 font-inter leading-6 font-normal"
                              >3:20am</span
                            >
                          </h5>
                          <p
                            class="text-sm text-darkdeep4 text-start leading-6"
                          >
                            Hey, How are you?
                          </p>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li
                    class="border-t border-borderColor dark:border-borderColor-dark"
                  >
                   <div
                      class="cursor-pointer flex items-center flex-wrap py-15px px-30px max-w-435px w-full"
                    >
                      <!-- avatar -->
                      <div class="max-w-50px mr-5 relative">
                        <span
                          class="absolute left-[38px] bottom-0 w-15px h-15px bg-primaryColor border-3px border-whiteColor dark:border-whiteColor-dark rounded-full"
                        ></span>
                        <img
                          src="../../assets/images/teacher/teacher__5.png"
                          alt=""
                          class="w-full"
                        >
                      </div>
                      <!-- details -->
                      <div class="flex-grow">
                        <div>
                          <h5
                            class="text-lg font-medium text-blackColor dark:text-blackColor-dark flex items-center justify-between"
                          >
                            <span class="leading-6">Rex Allen</span>

                            <span
                              class="text-sm text-darkdeep4 font-inter leading-6 font-normal"
                              >12 min</span
                            >
                          </h5>
                          <p
                            class="text-sm text-darkdeep4 text-start leading-6"
                          >
                            Hey, How are you?
                          </p>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li
                    class="border-t border-borderColor dark:border-borderColor-dark"
                  >
                   <div
                      class="cursor-pointer flex items-center flex-wrap py-15px px-30px max-w-435px w-full"
                    >
                      <!-- avatar -->
                      <div class="max-w-50px mr-5 relative">
                        <span
                          class="absolute left-[38px] bottom-0 w-15px h-15px bg-primaryColor border-3px border-whiteColor dark:border-whiteColor-dark rounded-full"
                        ></span>
                        <img
                          src="../../assets/images/teacher/teacher__6.png"
                          alt=""
                          class="w-full"
                        >
                      </div>
                      <!-- details -->
                      <div class="flex-grow">
                        <div>
                          <h5
                            class="text-lg font-medium text-blackColor dark:text-blackColor-dark flex items-center justify-between"
                          >
                            <span class="leading-6">Rex Allen</span>

                            <span
                              class="text-sm text-darkdeep4 font-inter leading-6 font-normal"
                              >12 min</span
                            >
                          </h5>
                          <p
                            class="text-sm text-darkdeep4 text-start leading-6"
                          >
                            Hey, How are you?
                          </p>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li
                    class="border-t border-borderColor dark:border-borderColor-dark"
                  >
                   <div
                      class="cursor-pointer flex items-center flex-wrap py-15px px-30px max-w-435px w-full"
                    >
                      <!-- avatar -->
                      <div class="max-w-50px mr-5 relative">
                        <span
                          class="absolute left-[38px] bottom-0 w-15px h-15px bg-primaryColor border-3px border-whiteColor dark:border-whiteColor-dark rounded-full"
                        ></span>
                        <img
                          src="../../assets/images/teacher/teacher__2.png"
                          alt=""
                          class="w-full"
                        >
                      </div>
                      <!-- details -->
                      <div class="flex-grow">
                        <div>
                          <h5
                            class="text-lg font-medium text-blackColor dark:text-blackColor-dark flex items-center justify-between"
                          >
                            <span class="leading-6">Rex Allen</span>

                            <span
                              class="text-sm text-darkdeep4 font-inter leading-6 font-normal"
                              >4:35pm</span
                            >
                          </h5>
                          <p
                            class="text-sm text-darkdeep4 text-start leading-6"
                          >
                            Hey, How are you?
                          </p>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li
                    class="border-t border-borderColor dark:border-borderColor-dark"
                  >
                   <div
                      class="cursor-pointer flex items-center flex-wrap py-15px px-30px max-w-435px w-full"
                    >
                      <!-- avatar -->
                      <div class="max-w-50px mr-5 relative">
                        <span
                          class="absolute left-[38px] bottom-0 w-15px h-15px bg-primaryColor border-3px border-whiteColor dark:border-whiteColor-dark rounded-full"
                        ></span>
                        <img
                          src="../../assets/images/teacher/teacher__1.png"
                          alt=""
                          class="w-full"
                        >
                      </div>
                      <!-- details -->
                      <div class="flex-grow">
                        <div>
                          <h5
                            class="text-lg font-medium text-blackColor dark:text-blackColor-dark flex items-center justify-between"
                          >
                            <span class="leading-6">Julia Jhones</span>

                            <span
                              class="text-sm text-darkdeep4 font-inter leading-6 font-normal"
                              >1:40pm</span
                            >
                          </h5>
                          <p
                            class="text-sm text-darkdeep4 text-start leading-6"
                          >
                            Hey, How are you?
                          </p>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <!-- conversation -->
            <div class="xl:col-start-6 xl:col-span-7">
              <div
                class="p-10px bg-whiteColor dark:bg-whiteColor-dark rounded-lg2"
              >
                <!-- heading -->
                <div
                  class="flex justify-between items-center pb-10px border-b border-borderColor dark:border-borderColor-dark"
                >
                  <div class="flex items-center">
                    <!-- avatar -->
                    <div class="max-w-50px mr-5">
                      <img
                        src="../../assets/images/teacher/teacher__2.png"
                        alt=""
                        class="w-full"
                      >
                    </div>
                    <!-- details -->
                    <div class="flex-grow">
                      <div>
                        <h5
                          class="text-lg font-medium text-blackColor dark:text-blackColor-dark"
                        >
                          <span class="leading-6">Bradshaw</span>
                        </h5>
                        <p
                          class="text-sm text-darkdeep4 text-start leading-22px"
                        >
                          Stay at home, Stay safe
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="flex items-center gap-10px">
                    <a
                      href="admin-dashboard.html"
                      class="w-10.5 h-10.5 leading-10.5 box-content text-darkdeep4 hover:text-whiteColor hover:bg-primaryColor border border-borderColor dark:border-borderColor-dark rounded-full text-center"
                    >
                      <i class="icofont-phone"></i>
                    </a>
                    <a
                      href="admin-dashboard.html"
                      class="w-10.5 h-10.5 leading-10.5 box-content text-darkdeep4 hover:text-whiteColor hover:bg-primaryColor border border-borderColor dark:border-borderColor-dark rounded-full text-center"
                    >
                      <i class="icofont-ui-video-chat"></i>
                    </a>
                  </div>
                </div>

                <!-- conversation body -->
                <div
                  class="max-h-125 overflow-y-auto mt-10 flex flex-col-reverse"
                >
                  <!-- receiver -->
                  <div class="max-w-415px">
                    <div class="flex">
                      <!-- avatar -->
                      <div class="w-15 h-15 mr-5 flex-shrink">
                        <img
                          src="../../assets/images/teacher/teacher__1.png"
                          alt=""
                          class="w-full"
                        >
                      </div>
                      <!-- details -->
                      <div class="flex-grow">
                        <div>
                          <p
                            class="text-sm text-blackColor dark:text-blackColor-dark px-15px py-10px mb-15px bg-darkdeep3 dark:bg-darkdeep3-dark rounded-5px"
                          >
                            <span class="leading-26px"
                              >Lorem ipsum dolor sit amet consectetur
                              adipisicing sed.</span
                            >
                          </p>
                          <p
                            class="text-sm text-darkdeep4 text-start leading-22px mb-10px"
                          >
                            4:32 PM
                          </p>
                          <p
                            class="text-sm text-blackColor dark:text-blackColor-dark px-15px py-10px mb-15px bg-darkdeep3 dark:bg-darkdeep3-dark rounded-5px"
                          >
                            <span class="leading-26px"
                              >Dolor sit amet consectetur</span
                            >
                          </p>
                          <p
                            class="text-sm text-darkdeep4 text-start leading-22px mb-10px"
                          >
                            4:30 PM
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- sender -->
                  <div class="max-w-415px ml-auto">
                    <div class="flex text-end">
                      <!-- details -->
                      <div class="flex-grow mr-5">
                        <div>
                          <p
                            class="text-sm text-blackColor dark:text-blackColor-dark px-15px py-10px mb-15px bg-darkdeep3 dark:bg-darkdeep3-dark rounded-5px"
                          >
                            <span class="leading-26px"
                              >Lorem ipsum dolor sit amet consectetur
                              adipisicing sed.</span
                            >
                          </p>
                          <p
                            class="text-sm text-darkdeep4 leading-22px mb-10px"
                          >
                            4:40 PM
                          </p>
                          <p
                            class="text-sm text-blackColor dark:text-blackColor-dark px-15px py-10px mb-15px bg-darkdeep3 dark:bg-darkdeep3-dark rounded-5px"
                          >
                            <span class="leading-26px"
                              >Dolor sit amet consectetur</span
                            >
                          </p>
                          <p
                            class="text-sm text-darkdeep4 leading-22px mb-10px"
                          >
                            4:42 PM
                          </p>
                        </div>
                      </div>
                      <!-- avatar -->
                      <div class="w-15 h-15 flex-shrink">
                        <img
                          src="../../assets/images/teacher/teacher__3.png"
                          alt=""
                          class="w-full"
                        >
                      </div>
                    </div>
                  </div>
                  <!-- receiver -->
                  <div class="max-w-415px">
                    <div class="flex">
                      <!-- avatar -->
                      <div class="w-15 h-15 mr-5 flex-shrink">
                        <img
                          src="../../assets/images/teacher/teacher__4.png"
                          alt=""
                          class="w-full"
                        >
                      </div>
                      <!-- details -->
                      <div class="flex-grow">
                        <div>
                          <p
                            class="text-sm text-blackColor dark:text-blackColor-dark px-15px py-10px mb-15px bg-darkdeep3 dark:bg-darkdeep3-dark rounded-5px"
                          >
                            <span class="leading-26px"
                              >Lorem ipsum dolor sit amet consectetur
                              adipisicing sed.</span
                            >
                          </p>
                          <p
                            class="text-sm text-darkdeep4 text-start leading-22px mb-10px"
                          >
                            5:01 PM
                          </p>
                          <p
                            class="text-sm text-blackColor dark:text-blackColor-dark px-15px py-10px mb-15px bg-darkdeep3 dark:bg-darkdeep3-dark rounded-5px"
                          >
                            <span class="leading-26px"
                              >Dolor sit amet consectetur</span
                            >
                          </p>
                          <p
                            class="text-sm text-darkdeep4 text-start leading-22px mb-10px"
                          >
                            5:03 PM
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- conversation input -->
                <div>
                  <form
                    class="flex items-center bg-darkdeep3 dark:bg-darkdeep3-dark pl-30px rounded-full md:mr-30px"
                  >
                    <div class="h-[150%] block">
                      <label
                        for="attachment"
                        class="text-darkdeep4 text-xl pr-5 border-r border-darkdeep4 border-opacity-20 dark:border-blue-light2 h-full block py-9px"
                        ><i
                          class="icofont-attachment attachment"
                          aria-hidden="true"
                        ></i
                      ></label>
                      <input
                        id="attachment"
                        type="file"
                        class="hidden w-full pl-5 py-10px bg-transparent text-sm focus:outline-none placeholder:text-placeholder placeholder:opacity-80 leading-7 font-medium"
                      >
                    </div>
                    <div class="flex-grow">
                      <input
                        type="text"
                        placeholder="Type somthing"
                        class="w-full pl-5 py-10px text-darkdeep4 bg-transparent text-sm focus:outline-none placeholder:text-placeholder placeholder:opacity-80 leading-7 font-medium"
                      >
                    </div>
                    <div class="flex-shrink-0">
                      <button
                        class="w-50px h-50px leading-50px bg-primaryColor text-whiteColor rounded-full"
                      >
                        <i class="icofont-arrow-right text-xl"></i>
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection