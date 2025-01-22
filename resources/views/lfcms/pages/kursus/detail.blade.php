@extends('lfcms.layouts.app')
@section('page_title', 'kursus | Learn Flow CMS')
@section('content')

<div class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
  <div class="grid grid-cols-12 gap-4">
      <!-- Start Course Details -->
      <div class="col-span-full lg:col-span-7 card p-4 sm:p-6">
          <div class="p-0.5">
              <div class="flex-center-between">
                  <h5 class="text-heading sm:text-[22px] leading-none font-semibold">Course details</h5>
                  <a href="edit-course.html" class="btn b-light btn-primary-light dk-theme-card-square">
                      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none" class="hidden sm:block">
                          <path d="M14.6492 3.70261L11.2974 0.351573C11.186 0.240112 11.0537 0.151695 10.908 0.0913719C10.7624 0.0310484 10.6064 0 10.4488 0C10.2911 0 10.1351 0.0310484 9.98947 0.0913719C9.84386 0.151695 9.71156 0.240112 9.60012 0.351573L0.35176 9.59993C0.239844 9.71096 0.151113 9.84313 0.0907265 9.98875C0.03034 10.1344 -0.000497585 10.2905 6.07129e-06 10.4482V13.8C6.07129e-06 14.1182 0.126436 14.4235 0.351482 14.6485C0.576528 14.8736 0.881757 15 1.20002 15H13.8002C13.9593 15 14.1119 14.9368 14.2244 14.8243C14.337 14.7117 14.4002 14.5591 14.4002 14.4C14.4002 14.2409 14.337 14.0882 14.2244 13.9757C14.1119 13.8632 13.9593 13.8 13.8002 13.8H6.24908L14.6492 5.39988C14.7606 5.28845 14.8491 5.15615 14.9094 5.01054C14.9697 4.86493 15.0008 4.70886 15.0008 4.55125C15.0008 4.39364 14.9697 4.23757 14.9094 4.09196C14.8491 3.94635 14.7606 3.81405 14.6492 3.70261ZM4.55181 13.8H1.20002V10.4482L7.8001 3.84811L11.1519 7.19991L4.55181 13.8ZM12.0002 6.35165L8.64911 2.99985L10.4491 1.19983L13.8002 4.55162L12.0002 6.35165Z" fill="currentColor"/>
                      </svg>
                      <span>Edit course</span>
                  </a>
              </div>
              <div class="text-center mt-5">
                  <div class="aspect-video rounded-20 overflow-hidden dk-theme-card-square">
                      <img src="assets/images/course/course-thumb.png" alt="thumb" class="w-full h-full object-contain dark:brightness-50">
                  </div>
                  <div class="max-w-[540px] mx-auto mt-4">
                      <h4 class="text-[25px] leading-[1.4] text-heading font-semibold">
                          Build Responsive Real-World Websites with HTML and CSS
                      </h4>
                      <p class="font-spline_sans leading-[1.62] text-gray-500 dark:text-dark-text mt-2">
                          Learn modern HTML5, CSS3 and web design by building a stunning 
                          website for your portfolio! Includes flexbox and CSS Grid Sed 
                          arcu non odio euismod lacinia at. Porta lorem mollis aliquam ut porttitor.
                      </p>
                  </div>
                  <div class="p-5 border border-dashed border-gray-200 dark:border-dark-border rounded-15 mt-4">
                      <div class="grid grid-cols-12 gap-x-5 sm:gap-x-0 gap-y-5 font-semibold leading-none text-left">
                          <div class="col-span-6 sm:col-span-4 lg:col-span-6 2xl:col-span-4 flex items-center gap-2.5">
                              <img src="assets/images/user/user-1.png" alt="Instructor" class="size-11 rounded-50 hidden sm:block dk-theme-card-square">
                              <div class="flex flex-col gap-1">
                                  <p class="text-xs text-gray-500 dark:text-dark-text">Author</p>
                                  <h6 class="text-heading">Alex Jonsion</h6>
                              </div>
                          </div>
                          <div class="col-span-6 sm:col-span-4 lg:col-span-6 2xl:col-span-4 flex items-center gap-2.5">
                              <div class="size-11 rounded-50 hidden sm:flex-center bg-primary-200 dark:bg-dark-icon dk-theme-card-square">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                      <path opacity="0.5" d="M19.2306 10.0001C19.2306 11.8257 18.6892 13.6104 17.6749 15.1284C16.6606 16.6464 15.219 17.8295 13.5323 18.5282C11.8456 19.2268 9.98958 19.4096 8.19898 19.0535C6.40839 18.6973 4.76362 17.8181 3.47268 16.5272C2.18173 15.2362 1.30258 13.5915 0.946414 11.8009C0.590243 10.0103 0.773043 8.15429 1.4717 6.46759C2.17035 4.78089 3.35348 3.33924 4.87148 2.32495C6.38947 1.31066 8.17414 0.769287 9.99981 0.769287C12.448 0.769287 14.7958 1.74181 16.527 3.47292C18.2581 5.20402 19.2306 7.5519 19.2306 10.0001Z" fill="#B39EF9" class="dark:fill-none"/>
                                      <path d="M10 0C8.02219 0 6.08879 0.58649 4.4443 1.6853C2.79981 2.78412 1.51809 4.3459 0.761209 6.17316C0.00433284 8.00042 -0.1937 10.0111 0.192152 11.9509C0.578004 13.8907 1.53041 15.6725 2.92894 17.0711C4.32746 18.4696 6.10929 19.422 8.0491 19.8078C9.98891 20.1937 11.9996 19.9957 13.8268 19.2388C15.6541 18.4819 17.2159 17.2002 18.3147 15.5557C19.4135 13.9112 20 11.9778 20 10C19.9972 7.34869 18.9427 4.80678 17.068 2.93202C15.1932 1.05727 12.6513 0.00279983 10 0ZM10 18.4615C8.32647 18.4615 6.69052 17.9653 5.29902 17.0355C3.90753 16.1057 2.823 14.7842 2.18256 13.2381C1.54213 11.6919 1.37456 9.99061 1.70105 8.34923C2.02754 6.70786 2.83343 5.20016 4.01679 4.01679C5.20016 2.83342 6.70786 2.02754 8.34924 1.70105C9.99062 1.37456 11.6919 1.54212 13.2381 2.18256C14.7842 2.82299 16.1057 3.90753 17.0355 5.29902C17.9653 6.69051 18.4615 8.32646 18.4615 10C18.459 12.2434 17.5667 14.3941 15.9804 15.9804C14.3941 17.5667 12.2434 18.459 10 18.4615ZM16.1538 10C16.1538 10.204 16.0728 10.3997 15.9285 10.5439C15.7843 10.6882 15.5886 10.7692 15.3846 10.7692H10C9.79599 10.7692 9.60033 10.6882 9.45607 10.5439C9.31182 10.3997 9.23077 10.204 9.23077 10V4.61538C9.23077 4.41137 9.31182 4.21571 9.45607 4.07146C9.60033 3.9272 9.79599 3.84615 10 3.84615C10.204 3.84615 10.3997 3.9272 10.5439 4.07146C10.6882 4.21571 10.7692 4.41137 10.7692 4.61538V9.23077H15.3846C15.5886 9.23077 15.7843 9.31181 15.9285 9.45607C16.0728 9.60033 16.1538 9.79599 16.1538 10Z" fill="#5B43CB"/>
                                  </svg>
                              </div>
                              <div class="flex flex-col gap-1">
                                  <p class="text-xs text-gray-500 dark:text-dark-text">Total hour</p>
                                  <h6 class="text-heading">02h 35m</h6>
                              </div>
                          </div>
                          <div class="col-span-6 sm:col-span-4 lg:col-span-6 2xl:col-span-4 flex items-center gap-2.5">
                              <div class="size-11 rounded-50 hidden sm:flex-center bg-primary-200 dark:bg-dark-icon dk-theme-card-square">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                      <path opacity="0.5" d="M17.6921 3.07685V6.923H0.769043V3.07685C0.769043 2.87284 0.850087 2.67718 0.994346 2.53292C1.1386 2.38866 1.33426 2.30762 1.53827 2.30762H16.9229C17.1269 2.30762 17.3226 2.38866 17.4668 2.53292C17.6111 2.67718 17.6921 2.87284 17.6921 3.07685Z" fill="#B39EF9" class="dark:fill-none"/>
                                      <path d="M16.9231 1.53846H14.6154V0.769231C14.6154 0.565218 14.5343 0.369561 14.3901 0.225302C14.2458 0.0810437 14.0502 0 13.8462 0C13.6421 0 13.4465 0.0810437 13.3022 0.225302C13.158 0.369561 13.0769 0.565218 13.0769 0.769231V1.53846H5.38462V0.769231C5.38462 0.565218 5.30357 0.369561 5.15931 0.225302C5.01505 0.0810437 4.8194 0 4.61538 0C4.41137 0 4.21572 0.0810437 4.07146 0.225302C3.9272 0.369561 3.84615 0.565218 3.84615 0.769231V1.53846H1.53846C1.13044 1.53846 0.739122 1.70055 0.450605 1.98907C0.162087 2.27758 0 2.6689 0 3.07692V18.4615C0 18.8696 0.162087 19.2609 0.450605 19.5494C0.739122 19.8379 1.13044 20 1.53846 20H16.9231C17.3311 20 17.7224 19.8379 18.0109 19.5494C18.2995 19.2609 18.4615 18.8696 18.4615 18.4615V3.07692C18.4615 2.6689 18.2995 2.27758 18.0109 1.98907C17.7224 1.70055 17.3311 1.53846 16.9231 1.53846ZM3.84615 3.07692V3.84615C3.84615 4.05017 3.9272 4.24582 4.07146 4.39008C4.21572 4.53434 4.41137 4.61538 4.61538 4.61538C4.8194 4.61538 5.01505 4.53434 5.15931 4.39008C5.30357 4.24582 5.38462 4.05017 5.38462 3.84615V3.07692H13.0769V3.84615C13.0769 4.05017 13.158 4.24582 13.3022 4.39008C13.4465 4.53434 13.6421 4.61538 13.8462 4.61538C14.0502 4.61538 14.2458 4.53434 14.3901 4.39008C14.5343 4.24582 14.6154 4.05017 14.6154 3.84615V3.07692H16.9231V6.15385H1.53846V3.07692H3.84615ZM16.9231 18.4615H1.53846V7.69231H16.9231V18.4615ZM7.69231 10V16.1538C7.69231 16.3579 7.61126 16.5535 7.46701 16.6978C7.32275 16.842 7.12709 16.9231 6.92308 16.9231C6.71906 16.9231 6.52341 16.842 6.37915 16.6978C6.23489 16.5535 6.15385 16.3579 6.15385 16.1538V11.2442L5.72885 11.4577C5.54626 11.549 5.33488 11.564 5.14121 11.4995C4.94754 11.4349 4.78745 11.2961 4.69615 11.1135C4.60486 10.9309 4.58984 10.7195 4.65439 10.5258C4.71895 10.3322 4.85779 10.1721 5.04038 10.0808L6.57885 9.31154C6.69617 9.25283 6.82655 9.22511 6.95761 9.23099C7.08866 9.23688 7.21603 9.27619 7.32762 9.34518C7.4392 9.41417 7.53128 9.51056 7.59511 9.62517C7.65894 9.73978 7.6924 9.86881 7.69231 10ZM13.3808 12.9279L11.5385 15.3846H13.0769C13.2809 15.3846 13.4766 15.4657 13.6209 15.6099C13.7651 15.7542 13.8462 15.9498 13.8462 16.1538C13.8462 16.3579 13.7651 16.5535 13.6209 16.6978C13.4766 16.842 13.2809 16.9231 13.0769 16.9231H10C9.85715 16.9231 9.71711 16.8833 9.59559 16.8082C9.47407 16.7331 9.37587 16.6256 9.31198 16.4979C9.24809 16.3701 9.22105 16.227 9.23388 16.0848C9.24671 15.9425 9.2989 15.8066 9.38462 15.6923L12.1519 12.0029C12.2149 11.9191 12.26 11.8233 12.2846 11.7214C12.3092 11.6196 12.3127 11.5137 12.295 11.4104C12.2772 11.3072 12.2385 11.2086 12.1813 11.1208C12.124 11.033 12.0495 10.9578 11.9621 10.8999C11.8748 10.842 11.7765 10.8025 11.6734 10.7839C11.5703 10.7653 11.4644 10.7679 11.3623 10.7917C11.2603 10.8155 11.1641 10.8599 11.0798 10.9222C10.9955 10.9844 10.9248 11.0633 10.8721 11.1538C10.8231 11.2441 10.7565 11.3237 10.6762 11.3878C10.596 11.4519 10.5037 11.4993 10.4048 11.5271C10.306 11.555 10.2025 11.5628 10.1006 11.55C9.99866 11.5373 9.90032 11.5042 9.81137 11.4529C9.72242 11.4015 9.64466 11.3328 9.58268 11.2509C9.52071 11.169 9.47576 11.0755 9.4505 10.9759C9.42525 10.8763 9.42019 10.7727 9.43562 10.6712C9.45106 10.5696 9.48668 10.4722 9.54039 10.3846C9.79448 9.94489 10.1865 9.60127 10.6558 9.40702C11.125 9.21276 11.6452 9.17873 12.1358 9.31018C12.6263 9.44164 13.0598 9.73125 13.3691 10.1341C13.6783 10.537 13.846 11.0306 13.8462 11.5385C13.8478 12.0401 13.6842 12.5284 13.3808 12.9279Z" fill="#795DED"/>
                                  </svg>
                              </div>
                              <div class="flex flex-col gap-1">
                                  <p class="text-xs text-gray-500 dark:text-dark-text">Release date</p>
                                  <h6 class="text-heading">01 Jan 2024</h6>
                              </div>
                          </div>
                          <div class="col-span-6 sm:col-span-4 lg:col-span-6 2xl:col-span-4 flex items-center gap-2.5">
                              <div class="size-11 rounded-50 hidden sm:flex-center bg-primary-200 dark:bg-dark-icon dk-theme-card-square">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0 0 20 18" fill="none">
                                      <path opacity="0.6" d="M17.6922 0.769287V16.9231H12.3076V0.769287H17.6922Z" fill="#B39EF9" class="dark:fill-none"/>
                                      <path d="M19.2308 16.1538H18.4615V0.769231C18.4615 0.565218 18.3805 0.369561 18.2362 0.225303C18.092 0.0810439 17.8963 0 17.6923 0H12.3077C12.1037 0 11.908 0.0810439 11.7638 0.225303C11.6195 0.369561 11.5385 0.565218 11.5385 0.769231V4.61538H6.92308C6.71906 4.61538 6.52341 4.69643 6.37915 4.84069C6.23489 4.98495 6.15385 5.1806 6.15385 5.38461V9.23077H2.30769C2.10368 9.23077 1.90802 9.31181 1.76376 9.45607C1.61951 9.60033 1.53846 9.79599 1.53846 10V16.1538H0.769231C0.565218 16.1538 0.369561 16.2349 0.225302 16.3791C0.0810437 16.5234 0 16.7191 0 16.9231C0 17.1271 0.0810437 17.3227 0.225302 17.467C0.369561 17.6113 0.565218 17.6923 0.769231 17.6923H19.2308C19.4348 17.6923 19.6304 17.6113 19.7747 17.467C19.919 17.3227 20 17.1271 20 16.9231C20 16.7191 19.919 16.5234 19.7747 16.3791C19.6304 16.2349 19.4348 16.1538 19.2308 16.1538ZM13.0769 1.53846H16.9231V16.1538H13.0769V1.53846ZM7.69231 6.15385H11.5385V16.1538H7.69231V6.15385ZM3.07692 10.7692H6.15385V16.1538H3.07692V10.7692Z" fill="#795DED"/>
                                  </svg>
                              </div>
                              <div class="flex flex-col gap-1">
                                  <p class="text-xs text-gray-500 dark:text-dark-text">Skills</p>
                                  <h6 class="text-heading">Intermediate</h6>
                              </div>
                          </div>
                          <div class="col-span-6 sm:col-span-4 lg:col-span-6 2xl:col-span-4 flex items-center gap-2.5">
                              <div class="size-11 rounded-50 hidden sm:flex-center bg-primary-200 dark:bg-dark-icon dk-theme-card-square">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" viewBox="0 0 16 18" fill="none">
                                      <path opacity="0.6" d="M14.5385 0.692383V14.5385H2.76931C2.21847 14.5385 1.6902 14.7574 1.3007 15.1469C0.911201 15.5364 0.692383 16.0646 0.692383 16.6155V2.76931C0.692383 2.21847 0.911201 1.6902 1.3007 1.3007C1.6902 0.911201 2.21847 0.692383 2.76931 0.692383H14.5385Z" fill="#B39EF9" class="dark:fill-none"/>
                                      <path d="M14.5385 0H2.76923C2.03479 0 1.33042 0.291757 0.811089 0.811089C0.291757 1.33042 0 2.03479 0 2.76923V17.3077C0 17.4913 0.0729395 17.6674 0.202772 17.7972C0.332605 17.9271 0.508696 18 0.692308 18H13.1538C13.3375 18 13.5135 17.9271 13.6434 17.7972C13.7732 17.6674 13.8462 17.4913 13.8462 17.3077C13.8462 17.1241 13.7732 16.948 13.6434 16.8182C13.5135 16.6883 13.3375 16.6154 13.1538 16.6154H1.38462C1.38462 16.2482 1.53049 15.896 1.79016 15.6363C2.04983 15.3766 2.40201 15.2308 2.76923 15.2308H14.5385C14.7221 15.2308 14.8982 15.1578 15.028 15.028C15.1578 14.8982 15.2308 14.7221 15.2308 14.5385V0.692308C15.2308 0.508696 15.1578 0.332605 15.028 0.202772C14.8982 0.0729393 14.7221 0 14.5385 0ZM13.8462 13.8462H2.76923C2.28301 13.8455 1.80528 13.9736 1.38462 14.2174V2.76923C1.38462 2.40201 1.53049 2.04983 1.79016 1.79016C2.04983 1.53049 2.40201 1.38462 2.76923 1.38462H13.8462V13.8462Z" fill="#795DED"/>
                                  </svg>
                              </div>
                              <div class="flex flex-col gap-1">
                                  <p class="text-xs text-gray-500 dark:text-dark-text">Total lecture</p>
                                  <h6 class="text-heading">39</h6>
                              </div>
                          </div>
                          <div class="col-span-6 sm:col-span-4 lg:col-span-6 2xl:col-span-4 flex items-center gap-2.5">
                              <div class="size-11 rounded-50 hidden sm:flex-center bg-primary-200 dark:bg-dark-icon dk-theme-card-square">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="18" viewBox="0 0 25 18" fill="none">
                                      <path opacity="0.6" d="M16.3379 9.80171C16.3379 10.6095 16.0984 11.3992 15.6496 12.0708C15.2008 12.7425 14.5629 13.266 13.8166 13.5751C13.0703 13.8843 12.2491 13.9652 11.4568 13.8076C10.6645 13.65 9.93673 13.261 9.36552 12.6898C8.79432 12.1186 8.40532 11.3908 8.24773 10.5985C8.09013 9.80624 8.17101 8.98501 8.48015 8.2387C8.78928 7.49238 9.31278 6.8545 9.98445 6.4057C10.6561 5.95691 11.4458 5.71737 12.2536 5.71737C13.3368 5.71737 14.3757 6.14768 15.1416 6.91364C15.9076 7.6796 16.3379 8.71847 16.3379 9.80171ZM5.71864 0.816162C5.0724 0.816162 4.44067 1.0078 3.90333 1.36683C3.366 1.72586 2.9472 2.23617 2.69989 2.83323C2.45259 3.43028 2.38788 4.08726 2.51396 4.72108C2.64003 5.35491 2.95123 5.93712 3.40819 6.39408C3.86516 6.85105 4.44736 7.16224 5.08119 7.28832C5.71502 7.4144 6.372 7.34969 6.96905 7.10238C7.5661 6.85507 8.07641 6.43627 8.43545 5.89894C8.79448 5.36161 8.98611 4.72988 8.98611 4.08363C8.98611 3.21705 8.64186 2.38595 8.02909 1.77318C7.41632 1.16041 6.58523 0.816162 5.71864 0.816162ZM18.7885 0.816162C18.1423 0.816162 17.5105 1.0078 16.9732 1.36683C16.4359 1.72586 16.0171 2.23617 15.7698 2.83323C15.5225 3.43028 15.4578 4.08726 15.5838 4.72108C15.7099 5.35491 16.0211 5.93712 16.4781 6.39408C16.935 6.85105 17.5172 7.16224 18.1511 7.28832C18.7849 7.4144 19.4419 7.34969 20.0389 7.10238C20.636 6.85507 21.1463 6.43627 21.5053 5.89894C21.8644 5.36161 22.056 4.72988 22.056 4.08363C22.056 3.21705 21.7117 2.38595 21.099 1.77318C20.4862 1.16041 19.6551 0.816162 18.7885 0.816162Z" fill="#B39EF9" class="dark:fill-none"/>
                                      <path d="M24.1796 10.455C24.0938 10.5194 23.9961 10.5662 23.8922 10.5928C23.7883 10.6195 23.6801 10.6254 23.5739 10.6102C23.4678 10.595 23.3656 10.5591 23.2733 10.5044C23.181 10.4498 23.1003 10.3775 23.036 10.2916C22.5436 9.62985 21.9028 9.09289 21.165 8.724C20.4272 8.35511 19.6131 8.16459 18.7883 8.16779C18.5716 8.16779 18.3638 8.08173 18.2106 7.92854C18.0575 7.77535 17.9714 7.56757 17.9714 7.35093C17.9714 7.13428 18.0575 6.92651 18.2106 6.77331C18.3638 6.62012 18.5716 6.53406 18.7883 6.53406C19.2466 6.53402 19.6957 6.40544 20.0847 6.16294C20.4736 5.92043 20.7867 5.57372 20.9885 5.16217C21.1902 4.75063 21.2725 4.29075 21.226 3.83478C21.1795 3.37881 21.006 2.94502 20.7254 2.58269C20.4447 2.22036 20.068 1.944 19.6381 1.78501C19.2082 1.62602 18.7424 1.59078 18.2935 1.68328C17.8446 1.77578 17.4306 1.99231 17.0986 2.30829C16.7666 2.62427 16.5298 3.02702 16.4153 3.47081C16.3884 3.57473 16.3414 3.67235 16.2769 3.75809C16.2123 3.84384 16.1315 3.91603 16.0391 3.97055C15.9466 4.02507 15.8444 4.06085 15.7381 4.07584C15.6318 4.09083 15.5236 4.08475 15.4197 4.05793C15.3158 4.03111 15.2182 3.98409 15.1324 3.91954C15.0467 3.855 14.9745 3.77419 14.92 3.68175C14.8654 3.5893 14.8297 3.48702 14.8147 3.38075C14.7997 3.27448 14.8058 3.16629 14.8326 3.06237C14.9916 2.44698 15.2921 1.8772 15.7101 1.39836C16.1281 0.919529 16.6521 0.54486 17.2403 0.304168C17.8286 0.0634754 18.465 -0.0365969 19.0987 0.0119133C19.7325 0.0604235 20.3462 0.256178 20.891 0.583599C21.4357 0.911021 21.8966 1.36107 22.2369 1.89795C22.5771 2.43482 22.7874 3.04369 22.8509 3.67612C22.9144 4.30855 22.8295 4.94708 22.6028 5.5409C22.3761 6.13472 22.014 6.66744 21.5452 7.09668C22.6559 7.5776 23.6215 8.34078 24.346 9.31039C24.4104 9.39642 24.4571 9.49431 24.4836 9.59844C24.5101 9.70258 24.5157 9.81091 24.5003 9.91724C24.4848 10.0236 24.4485 10.1258 24.3935 10.2181C24.3385 10.3104 24.2658 10.3909 24.1796 10.455ZM18.678 16.7449C18.735 16.8379 18.7728 16.9414 18.7892 17.0492C18.8056 17.157 18.8003 17.2671 18.7734 17.3728C18.7466 17.4786 18.6989 17.5778 18.6331 17.6648C18.5673 17.7518 18.4847 17.8247 18.3902 17.8793C18.2958 17.9339 18.1913 17.969 18.0831 17.9825C17.9749 17.9961 17.865 17.9878 17.76 17.9582C17.655 17.9286 17.557 17.8783 17.4718 17.8102C17.3866 17.7421 17.3158 17.6576 17.2638 17.5618C16.7491 16.6907 16.0163 15.9688 15.1376 15.4673C14.2588 14.9659 13.2646 14.7021 12.2528 14.7021C11.2411 14.7021 10.2468 14.9659 9.36805 15.4673C8.48931 15.9688 7.75648 16.6907 7.24184 17.5618C7.19077 17.6594 7.12049 17.7457 7.03521 17.8154C6.94994 17.8852 6.85143 17.937 6.74562 17.9677C6.63982 17.9983 6.52889 18.0073 6.41953 17.994C6.31016 17.9808 6.20461 17.9455 6.10923 17.8904C6.01385 17.8352 5.9306 17.7614 5.86451 17.6732C5.79841 17.5851 5.75083 17.4845 5.72461 17.3775C5.6984 17.2705 5.69411 17.1593 5.71199 17.0506C5.72987 16.9418 5.76956 16.8379 5.82866 16.7449C6.62061 15.3842 7.82814 14.3134 9.2738 13.6898C8.46033 13.067 7.86248 12.2049 7.5643 11.2247C7.26611 10.2446 7.28258 9.19561 7.61139 8.22529C7.94019 7.25496 8.5648 6.41207 9.39742 5.81509C10.23 5.21811 11.2288 4.89705 12.2533 4.89705C13.2778 4.89705 14.2766 5.21811 15.1092 5.81509C15.9418 6.41207 16.5665 7.25496 16.8953 8.22529C17.2241 9.19561 17.2405 10.2446 16.9423 11.2247C16.6442 12.2049 16.0463 13.067 15.2328 13.6898C16.6785 14.3134 17.886 15.3842 18.678 16.7449ZM12.2533 13.069C12.8996 13.069 13.5313 12.8774 14.0686 12.5183C14.606 12.1593 15.0248 11.649 15.2721 11.0519C15.5194 10.4549 15.5841 9.7979 15.458 9.16408C15.3319 8.53025 15.0207 7.94804 14.5638 7.49108C14.1068 7.03411 13.5246 6.72292 12.8908 6.59684C12.2569 6.47077 11.6 6.53547 11.0029 6.78278C10.4059 7.03009 9.89556 7.44889 9.53652 7.98622C9.17749 8.52355 8.98585 9.15528 8.98585 9.80153C8.98585 10.6681 9.3301 11.4992 9.94287 12.112C10.5556 12.7247 11.3867 13.069 12.2533 13.069ZM6.53525 7.35093C6.53525 7.13428 6.44919 6.92651 6.29599 6.77331C6.1428 6.62012 5.93503 6.53406 5.71838 6.53406C5.26005 6.53402 4.81091 6.40544 4.42198 6.16294C4.03306 5.92043 3.71993 5.57372 3.51818 5.16217C3.31643 4.75063 3.23413 4.29075 3.28064 3.83478C3.32715 3.37881 3.5006 2.94502 3.78129 2.58269C4.06198 2.22036 4.43866 1.944 4.86853 1.78501C5.29841 1.62602 5.76426 1.59078 6.21317 1.68328C6.66207 1.77578 7.07604 1.99231 7.40805 2.30829C7.74006 2.62427 7.9768 3.02702 8.09138 3.47081C8.14554 3.68068 8.28086 3.86045 8.46756 3.97055C8.65427 4.08066 8.87706 4.11209 9.08694 4.05793C9.29682 4.00377 9.47658 3.86845 9.58669 3.68175C9.6968 3.49504 9.72823 3.27225 9.67406 3.06237C9.51502 2.44698 9.21455 1.8772 8.79656 1.39836C8.37856 0.919529 7.85458 0.54486 7.2663 0.304168C6.67802 0.0634754 6.04169 -0.0365969 5.40793 0.0119133C4.77417 0.0604235 4.16048 0.256178 3.61569 0.583599C3.0709 0.911021 2.61004 1.36107 2.26979 1.89795C1.92954 2.43482 1.71929 3.04369 1.65576 3.67612C1.59223 4.30855 1.67719 4.94708 1.90386 5.5409C2.13053 6.13472 2.49267 6.66744 2.96145 7.09668C1.85182 7.57806 0.88734 8.3412 0.163683 9.31039C0.0335599 9.48371 -0.0223841 9.70162 0.00815868 9.91618C0.0387014 10.1307 0.153229 10.3244 0.326546 10.4545C0.499864 10.5846 0.717774 10.6406 0.932339 10.61C1.1469 10.5795 1.34055 10.465 1.47067 10.2916C1.96302 9.62985 2.60388 9.09289 3.34166 8.724C4.07944 8.35511 4.89353 8.16459 5.71838 8.16779C5.93503 8.16779 6.1428 8.08173 6.29599 7.92854C6.44919 7.77535 6.53525 7.56757 6.53525 7.35093Z" fill="#795DED"/>
                                  </svg>
                              </div>
                              <div class="flex flex-col gap-1">
                                  <p class="text-xs text-gray-500 dark:text-dark-text">Total enrolled</p>
                                  <h6 class="text-heading">10,995</h6>
                              </div>
                          </div>
                          <div class="col-span-6 sm:col-span-4 lg:col-span-6 2xl:col-span-4 flex items-center gap-2.5">
                              <div class="size-11 rounded-50 hidden sm:flex-center bg-primary-200 dark:bg-dark-icon dk-theme-card-square">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="21" height="18" viewBox="0 0 21 18" fill="none">
                                      <path opacity="0.6" d="M18.0001 14.3998H10.8001L14.4001 7.19987L18.0001 14.3998ZM6.48009 9.32026C7.38721 8.51059 8.11277 7.51817 8.60913 6.4082C9.10549 5.29822 9.36141 4.09579 9.36008 2.87988H3.6001C3.59878 4.09579 3.8547 5.29822 4.35106 6.4082C4.84742 7.51817 5.57298 8.51059 6.48009 9.32026Z" fill="#B39EF9" class="dark:fill-none"/>
                                      <path d="M20.0834 16.9577L15.0435 6.87778C14.9836 6.7582 14.8917 6.65764 14.778 6.58736C14.6643 6.51707 14.5332 6.47985 14.3995 6.47985C14.2658 6.47985 14.1347 6.51707 14.021 6.58736C13.9073 6.65764 13.8154 6.7582 13.7556 6.87778L11.8017 10.7865C10.2701 10.7003 8.79657 10.1713 7.55998 9.26367C9.01085 7.71429 9.88993 5.71643 10.0521 3.59999H12.24C12.4309 3.59999 12.614 3.52413 12.7491 3.38911C12.8841 3.25408 12.96 3.07095 12.96 2.87999C12.96 2.68904 12.8841 2.5059 12.7491 2.37088C12.614 2.23585 12.4309 2.15999 12.24 2.15999H7.19998V0.719998C7.19998 0.529042 7.12412 0.345908 6.98909 0.210882C6.85407 0.0758566 6.67093 0 6.47998 0C6.28902 0 6.10589 0.0758566 5.97086 0.210882C5.83584 0.345908 5.75998 0.529042 5.75998 0.719998V2.15999H0.719998C0.529042 2.15999 0.345908 2.23585 0.210882 2.37088C0.0758566 2.5059 0 2.68904 0 2.87999C0 3.07095 0.0758566 3.25408 0.210882 3.38911C0.345908 3.52413 0.529042 3.59999 0.719998 3.59999H8.60667C8.44672 5.36468 7.69763 7.02421 6.47998 8.31147C5.72143 7.51108 5.13892 6.56068 4.76998 5.52148C4.73965 5.43081 4.69156 5.3471 4.62852 5.27521C4.56548 5.20333 4.48876 5.14472 4.40282 5.10281C4.31689 5.06089 4.22347 5.03652 4.12802 5.0311C4.03256 5.02567 3.93698 5.03932 3.84686 5.07123C3.75673 5.10315 3.67386 5.15269 3.60309 5.21698C3.53232 5.28126 3.47506 5.359 3.43465 5.44565C3.39425 5.5323 3.3715 5.62613 3.36775 5.72166C3.364 5.8172 3.37931 5.91253 3.41279 6.00208C3.84233 7.21696 4.51895 8.32965 5.39998 9.26997C4.04347 10.2668 2.40338 10.803 0.719998 10.8C0.529042 10.8 0.345908 10.8758 0.210882 11.0108C0.0758566 11.1459 0 11.329 0 11.52C0 11.7109 0.0758566 11.8941 0.210882 12.0291C0.345908 12.1641 0.529042 12.24 0.719998 12.24C2.80852 12.2423 4.83718 11.5424 6.47998 10.2528C7.82059 11.3002 9.42095 11.9632 11.1096 12.1707L8.71557 16.9577C8.63012 17.1285 8.61601 17.3263 8.67635 17.5075C8.73669 17.6886 8.86654 17.8384 9.03732 17.9239C9.20811 18.0093 9.40584 18.0235 9.58703 17.9631C9.76822 17.9028 9.91801 17.7729 10.0035 17.6021L11.2446 15.12H17.5544L18.7955 17.6021C18.8554 17.7218 18.9474 17.8223 19.0612 17.8926C19.175 17.9629 19.3062 18 19.4399 17.9999C19.5627 17.9999 19.6833 17.9684 19.7905 17.9086C19.8976 17.8488 19.9877 17.7626 20.0522 17.6582C20.1167 17.5538 20.1534 17.4346 20.1588 17.312C20.1643 17.1894 20.1383 17.0675 20.0834 16.9577ZM11.9646 13.68L14.4 8.81007L16.8344 13.68H11.9646Z" fill="#795DED"/>
                                  </svg>
                              </div>
                              <div class="flex flex-col gap-1">
                                  <p class="text-xs text-gray-500 dark:text-dark-text">Language</p>
                                  <h6 class="text-heading">English, Spanish</h6>
                              </div>
                          </div>
                          <div class="col-span-6 sm:col-span-4 lg:col-span-6 2xl:col-span-4 flex items-center gap-2.5">
                              <div class="size-11 rounded-50 hidden sm:flex-center bg-primary-200 dark:bg-dark-icon dk-theme-card-square">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="21" height="18" viewBox="0 0 21 18" fill="none">
                                      <path opacity="0.6" d="M18.7495 1.49998V4.89644C18.3089 4.50249 17.7951 4.19916 17.2373 4.00379C16.6795 3.80841 16.0887 3.72481 15.4986 3.75776C14.9086 3.79071 14.3307 3.93957 13.7982 4.19582C13.2656 4.45208 12.7888 4.81072 12.3948 5.25127C12.0009 5.69182 11.6975 6.20566 11.5022 6.76343C11.3068 7.32121 11.2232 7.912 11.2561 8.50209C11.2891 9.09217 11.4379 9.66999 11.6942 10.2025C11.9504 10.7351 12.3091 11.212 12.7496 11.6059V14.2496H1.49998C1.30107 14.2496 1.11031 14.1706 0.969663 14.0299C0.829015 13.8893 0.75 13.6985 0.75 13.4996V1.49998C0.75 1.30107 0.829015 1.11031 0.969663 0.969663C1.11031 0.829015 1.30107 0.75 1.49998 0.75H17.9995C18.1984 0.75 18.3892 0.829015 18.5298 0.969663C18.6704 1.11031 18.7495 1.30107 18.7495 1.49998Z" fill="#B39EF9" class="dark:fill-none"/>
                                      <path d="M20.9994 8.24975C21.0002 7.38847 20.7891 6.54022 20.3846 5.7798C19.9802 5.01937 19.3949 4.37012 18.6803 3.8893C17.9658 3.40848 17.1439 3.11085 16.2871 3.02265C15.4304 2.93445 14.5651 3.0584 13.7675 3.38357C12.97 3.70873 12.2647 4.22512 11.7138 4.88721C11.163 5.5493 10.7835 6.33675 10.6088 7.18013C10.4341 8.02351 10.4696 8.89692 10.7122 9.72334C10.9547 10.5498 11.3969 11.3038 11.9996 11.919V17.2495C11.9996 17.3774 12.0322 17.5032 12.0944 17.6149C12.1566 17.7267 12.2464 17.8206 12.3552 17.8879C12.464 17.9552 12.5882 17.9935 12.716 17.9992C12.8437 18.005 12.9709 17.978 13.0852 17.9207L15.7495 16.5876L18.4138 17.9207C18.5282 17.978 18.6553 18.005 18.7831 17.9992C18.9109 17.9935 19.0351 17.9552 19.1439 17.8879C19.2526 17.8206 19.3424 17.7267 19.4047 17.6149C19.4669 17.5032 19.4995 17.3774 19.4994 17.2495V11.919C20.4613 10.94 21 9.62224 20.9994 8.24975ZM15.7495 4.49987C16.4912 4.49987 17.2162 4.71979 17.8329 5.13184C18.4495 5.54388 18.9302 6.12953 19.214 6.81473C19.4978 7.49994 19.5721 8.25391 19.4274 8.98132C19.2827 9.70873 18.9255 10.3769 18.4011 10.9013C17.8767 11.4258 17.2085 11.7829 16.4811 11.9276C15.7537 12.0723 14.9997 11.998 14.3145 11.7142C13.6293 11.4304 13.0437 10.9497 12.6316 10.3331C12.2196 9.71641 11.9996 8.99141 11.9996 8.24975C11.9996 7.25522 12.3947 6.30142 13.098 5.59818C13.8012 4.89494 14.755 4.49987 15.7495 4.49987ZM16.0851 15.0783C15.981 15.0262 15.866 14.999 15.7495 14.999C15.633 14.999 15.5181 15.0262 15.4139 15.0783L13.4996 16.0364V12.9924C14.2026 13.3263 14.9712 13.4996 15.7495 13.4996C16.5279 13.4996 17.2964 13.3263 17.9995 12.9924V16.0364L16.0851 15.0783ZM10.4997 14.2496C10.4997 14.4485 10.4207 14.6392 10.28 14.7799C10.1394 14.9205 9.94862 14.9996 9.74971 14.9996H1.49996C1.10214 14.9996 0.720623 14.8415 0.439327 14.5602C0.15803 14.2789 0 13.8974 0 13.4996V1.49996C0 1.10214 0.15803 0.720623 0.439327 0.439327C0.720623 0.15803 1.10214 0 1.49996 0H17.9995C18.3973 0 18.7788 0.15803 19.0601 0.439327C19.3414 0.720623 19.4994 1.10214 19.4994 1.49996C19.4994 1.69886 19.4204 1.88962 19.2798 2.03027C19.1391 2.17092 18.9483 2.24993 18.7494 2.24993C18.5505 2.24993 18.3598 2.17092 18.2191 2.03027C18.0785 1.88962 17.9995 1.69886 17.9995 1.49996H1.49996V13.4996H9.74971C9.94862 13.4996 10.1394 13.5786 10.28 13.7193C10.4207 13.8599 10.4997 14.0507 10.4997 14.2496ZM8.99973 8.99973C8.99973 9.19864 8.92072 9.3894 8.78007 9.53005C8.63942 9.67069 8.44866 9.74971 8.24975 9.74971H4.49987C4.30096 9.74971 4.1102 9.67069 3.96955 9.53005C3.8289 9.3894 3.74989 9.19864 3.74989 8.99973C3.74989 8.80082 3.8289 8.61006 3.96955 8.46942C4.1102 8.32877 4.30096 8.24975 4.49987 8.24975H8.24975C8.44866 8.24975 8.63942 8.32877 8.78007 8.46942C8.92072 8.61006 8.99973 8.80082 8.99973 8.99973ZM8.99973 5.99982C8.99973 6.19873 8.92072 6.38949 8.78007 6.53013C8.63942 6.67078 8.44866 6.7498 8.24975 6.7498H4.49987C4.30096 6.7498 4.1102 6.67078 3.96955 6.53013C3.8289 6.38949 3.74989 6.19873 3.74989 5.99982C3.74989 5.80091 3.8289 5.61015 3.96955 5.46951C4.1102 5.32886 4.30096 5.24984 4.49987 5.24984H8.24975C8.44866 5.24984 8.63942 5.32886 8.78007 5.46951C8.92072 5.61015 8.99973 5.80091 8.99973 5.99982Z" fill="#795DED"/>
                                  </svg>
                              </div>
                              <div class="flex flex-col gap-1">
                                  <p class="text-xs text-gray-500 dark:text-dark-text">Certificate</p>
                                  <h6 class="text-heading">Yes</h6>
                              </div>
                          </div>
                          <div class="col-span-6 sm:col-span-4 lg:col-span-6 2xl:col-span-4 flex items-center gap-2.5">
                              <div class="size-11 rounded-50 hidden sm:flex-center bg-primary-200 dark:bg-dark-icon dk-theme-card-square">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none">
                                      <path opacity="0.6" d="M14.0167 10.9761C13.9253 11.0564 13.8574 11.1599 13.8201 11.2757C13.7828 11.3914 13.7776 11.5152 13.805 11.6337L14.9318 16.5126C14.9616 16.64 14.9532 16.7734 14.9077 16.8961C14.8622 17.0188 14.7816 17.1254 14.676 17.2026C14.5703 17.2798 14.4443 17.3242 14.3136 17.3303C14.1828 17.3364 14.0532 17.3039 13.9409 17.2368L9.68201 14.6532C9.57853 14.5903 9.45975 14.557 9.33864 14.557C9.21753 14.557 9.09875 14.5903 8.99527 14.6532L4.73642 17.2368C4.62405 17.3039 4.49443 17.3364 4.36371 17.3303C4.23299 17.3242 4.10695 17.2798 4.0013 17.2026C3.89565 17.1254 3.81506 17.0188 3.76956 16.8961C3.72407 16.7734 3.71569 16.64 3.74547 16.5126L4.87227 11.6337C4.89966 11.5152 4.89444 11.3914 4.85717 11.2757C4.8199 11.1599 4.75196 11.0564 4.66058 10.9761L0.900965 7.69652C0.800452 7.61109 0.727539 7.49777 0.691452 7.37089C0.655364 7.24401 0.657723 7.10928 0.698231 6.98374C0.738739 6.8582 0.815574 6.7475 0.919016 6.66564C1.02246 6.58378 1.14786 6.53445 1.27934 6.52388L6.23494 6.0955C6.35584 6.08473 6.47151 6.04116 6.56947 5.96948C6.66744 5.89781 6.74397 5.80075 6.79083 5.68878L8.7269 1.0749C8.77861 0.95561 8.86407 0.854043 8.97276 0.782697C9.08145 0.711352 9.20863 0.67334 9.33864 0.67334C9.46865 0.67334 9.59583 0.711352 9.70452 0.782697C9.81321 0.854043 9.89867 0.95561 9.95038 1.0749L11.8864 5.68878C11.9333 5.80075 12.0098 5.89781 12.1078 5.96948C12.2058 6.04116 12.3214 6.08473 12.4423 6.0955L17.3979 6.52388C17.5294 6.53445 17.6548 6.58378 17.7583 6.66564C17.8617 6.7475 17.9385 6.8582 17.979 6.98374C18.0196 7.10928 18.0219 7.24401 17.9858 7.37089C17.9497 7.49777 17.8768 7.61109 17.7763 7.69652L14.0167 10.9761Z" fill="#B39EF9" class="dark:fill-none"/>
                                      <path d="M18.6064 6.77481C18.5257 6.52593 18.3735 6.30631 18.1688 6.1433C17.9642 5.98028 17.7161 5.88108 17.4554 5.85803L12.5057 5.43132L10.5654 0.817431C10.4644 0.575333 10.294 0.368534 10.0757 0.223075C9.85743 0.077616 9.60096 0 9.33863 0C9.07631 0 8.81984 0.077616 8.60153 0.223075C8.38323 0.368534 8.21284 0.575333 8.11182 0.817431L6.17742 5.43132L1.22183 5.86053C0.960163 5.88252 0.710811 5.98128 0.505044 6.14441C0.299277 6.30755 0.146256 6.52781 0.0651696 6.77757C-0.015917 7.02732 -0.0214593 7.29546 0.0492377 7.54836C0.119935 7.80125 0.263724 8.02765 0.462574 8.19915L4.22219 11.4845L3.09539 16.3635C3.03581 16.6188 3.05281 16.886 3.14427 17.1317C3.23573 17.3774 3.39759 17.5907 3.60961 17.7449C3.82164 17.8991 4.07442 17.9874 4.33635 17.9988C4.59828 18.0101 4.85774 17.944 5.08229 17.8086L9.3328 15.225L13.5925 17.8086C13.817 17.944 14.0765 18.0101 14.3384 17.9988C14.6004 17.9874 14.8531 17.8991 15.0652 17.7449C15.2772 17.5907 15.439 17.3774 15.5305 17.1317C15.622 16.886 15.639 16.6188 15.5794 16.3635L14.4534 11.4795L18.2122 8.19915C18.411 8.02705 18.5545 7.80002 18.6247 7.54659C18.6948 7.29315 18.6885 7.02464 18.6064 6.77481ZM17.3379 7.19153L13.5791 10.4719C13.3962 10.631 13.2601 10.837 13.1855 11.0677C13.1109 11.2985 13.1006 11.5451 13.1558 11.7812L14.2851 16.6685L10.0287 14.0848C9.82106 13.9584 9.5826 13.8915 9.33947 13.8915C9.09633 13.8915 8.85788 13.9584 8.65022 14.0848L4.39971 16.6685L5.52151 11.7846C5.57664 11.5485 5.56636 11.3018 5.49176 11.0711C5.41715 10.8404 5.28107 10.6344 5.09813 10.4753L1.33768 7.19653C1.33737 7.19404 1.33737 7.19152 1.33768 7.18903L6.2916 6.76064C6.53347 6.73932 6.76492 6.65237 6.961 6.50917C7.15707 6.36597 7.31033 6.17195 7.40424 5.94804L9.33863 1.33999L11.2722 5.94804C11.3661 6.17195 11.5194 6.36597 11.7154 6.50917C11.9115 6.65237 12.143 6.73932 12.3848 6.76064L17.3396 7.18903C17.3396 7.18903 17.3396 7.19403 17.3396 7.19486L17.3379 7.19153Z" fill="#795DED"/>
                                  </svg>
                              </div>
                              <div class="flex flex-col gap-1">
                                  <p class="text-xs text-gray-500 dark:text-dark-text">Reviews</p>
                                  <h6 class="text-heading">4.9</h6>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- End Course Details -->

      <!-- Start Course Overview Chart -->
      <div class="col-span-full lg:col-span-5">
          <div class="p-0.5">
              <!-- Course Earning Chart -->
              <div class="card p-5">
                  <div class="flex-center-between">
                      <h6 class="card-title">Earnings</h6>
                      <select class="form-input form-select">
                          <option value="this-month">This Month</option>
                          <option value="last-year">Last Year</option>
                          <option value="last-month">Last Month</option>
                          <option value="last-week">Last Week</option>
                      </select>
                  </div>
                  <div class="card-title text-[42px] mt-3 mb-5">
                      $<span class="counter-value" data-value="1258">0</span>
                  </div>
                  <div id="courseEarning"></div> 
              </div>
              <!-- New Enrollment Chart -->
              <div class="card p-5">
                  <div class="flex-center-between">
                      <h6 class="card-title">New enrollment</h6>
                      <select class="form-input form-select">
                          <option value="this-month">This Month</option>
                          <option value="last-year">Last Year</option>
                          <option value="last-month">Last Month</option>
                          <option value="last-week">Last Week</option>
                      </select>
                  </div>
                  <div class="counter-value card-title text-[42px] mt-3 mb-5" data-value="583">0</div>
                  <div id="newEnroll"></div> 
              </div>
              <!-- New Enrollment Chart -->
              <div class="card p-5">
                  <div class="flex-center-between">
                      <h6 class="card-title">Course impression</h6>
                      <select class="form-input form-select">
                          <option value="this-month">This Month</option>
                          <option value="last-year">Last Year</option>
                          <option value="last-month">Last Month</option>
                          <option value="last-week">Last Week</option>
                      </select>
                  </div>
                  <div class="card-title text-[42px] mt-3 mb-5">
                      <span class="counter-value" data-value="1.5">0</span>k
                  </div>
                  <div id="courseImpression"></div> 
              </div>
          </div>
      </div>
      <!-- End Course Overview Chart -->
  </div>
</div>

    <script data-cfasync="false" src="{{asset('../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}"></script><script src="assets/js/vendor/jquery.min.js"></script>
    <script src="{{asset('assets/lfcms/js/vendor/apexcharts.min.js')}}"></script>
    <script src="assets/js/vendor/flowbite.min.js"></script>
    <script src="assets/js/vendor/smooth-scrollbar/smooth-scrollbar.min.js"></script>
    <script src="assets/js/pages/course-details.js"></script>
    <script src="{{asset('assets/lfcms/js/component/app-menu-bar.js')}}"></script>
    <script src="assets/js/switcher.js"></script>
    <script src="assets/js/layout.js"></script>
    <script src="assets/js/main.js"></script>

@endsection