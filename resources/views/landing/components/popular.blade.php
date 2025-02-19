<section class="bg-lightGrey10 dark:bg-lightGrey10-dark pt-50px pb-110px">
    <div class="container">
        <!-- about section  -->
        <div class="grid grid-cols-1 lg:grid-cols-2 pt-30px gap-x-30px">
            <!-- about left -->
            <div class="mb-30px lg:mb-0 pb-0 md:pb-30px xl:pb-0" data-aos="fade-up">
                <div class="relative">
                    <div>
                        <img class="absolute bottom-9 lg:bottom-[-50px] right-[50px] animate-move-hor"
                            src="assets/images/service/service__shape__1.png" alt="">
                    </div>
                    <span
                        class="text-sm font-semibold text-primaryColor bg-whitegrey3 px-6 py-5px mb-5 rounded-full inline-block">
                        Kategori Kursus Populer
                    </span>
                    <p
                        class="text-sm md:text-base leading-7 text-contentColor dark:text-contentColor-dark pl-3 border-l-[3px] border-secondaryColor">
                        {!! $categorySection->deskripsi !!}
                    </p>
                    <div>
                        <a class="text-size-15 text-whiteColor bg-secondaryColor px-25px py-10px border border-secondaryColor hover:text-secondaryColor hover:bg-whiteColor inline-block rounded dark:hover:bg-whiteColor-dark dark:hover:text-whiteColor"
                            href="#">Lihat Selengkapnya <i class="icofont-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- sbject right -->
            <div class="relative z-0 overflow-visible">
                <!-- animted area -->
                <div data-aos="fade-up">
                    <img class="absolute sm:block xl:left-1/4 z-[-1] top-6 animate-move-var"
                        src="assets/images/service/service__shape__bg__1.png" alt="">
                </div>
                <!-- subject card -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-30px">
                    @foreach ($kategoriPopu as $category)
                        <div data-aos="fade-up">
                            <div
                                class="p-35px group bg-whiteColor rounded-xl transition-all duration-300 shadow-dropdown-secodary hover:bg-primaryColor hover:-translate-y-5px hover:text-whiteColor dark:bg-whiteColor-dark dark:hover:bg-primaryColor">
                                <!-- card svg -->
                                <div class="-translate-y-2 flex justify-between overflow-hidden mb-10px">
                                    <div class="relative w-20 h-[60px]">
                                        @if ($loop->index % 4 == 0)
                                            <!-- SVG 1 -->
                                            <svg class="absolute inline-block translate-y-3 translate-x-2 w-20 h-[60px]"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    class="group-hover:fill-whiteColor dark:group-hover:fill-whiteColor-dark"
                                                    fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M6.30281 28.9536H8.45394C9.05625 28.9536 9.48648 29.5426 9.48648 30.2495V36.8465C9.48648 37.6711 9.05625 38.2602 8.45394 38.2602H6.30281C5.78654 38.2602 5.27026 37.6711 5.27026 36.8465V30.2495C5.27026 29.5426 5.78654 28.9536 6.30281 28.9536Z"
                                                    fill="#5F2DED"></path>
                                                <path
                                                    class="group-hover:fill-whiteColor dark:group-hover:fill-whiteColor-dark"
                                                    fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M13.7027 23.7833H15.8987C16.4257 23.7833 16.8649 24.4239 16.8649 25.3207V36.7228C16.8649 37.6196 16.4257 38.2602 15.8987 38.2602H13.7027C13.0879 38.2602 12.6487 37.6196 12.6487 36.7228V25.3207C12.6487 24.4239 13.0879 23.7833 13.7027 23.7833Z"
                                                    fill="#5F2DED"></path>
                                                <path
                                                    class="group-hover:fill-whiteColor dark:group-hover:fill-whiteColor-dark"
                                                    fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M21.0596 19.6471H23.2108C23.727 19.6471 24.2433 20.412 24.2433 21.1769V36.7303C24.2433 37.6227 23.727 38.2602 23.2108 38.2602H21.0596C20.4573 38.2602 20.0271 37.6227 20.0271 36.7303V21.1769C20.0271 20.412 20.4573 19.6471 21.0596 19.6471Z"
                                                    fill="#5F2DED"></path>
                                                <path
                                                    class="group-hover:fill-whiteColor dark:group-hover:fill-whiteColor-dark"
                                                    fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M28.4381 15.5109H30.5892C31.1055 15.5109 31.6217 16.1499 31.6217 17.0445V36.7265C31.6217 37.6212 31.1055 38.2602 30.5892 38.2602H28.4381C27.8357 38.2602 27.4055 37.6212 27.4055 36.7265V17.0445C27.4055 16.1499 27.8357 15.5109 28.4381 15.5109Z"
                                                    fill="#5F2DED"></path>
                                                <path
                                                    class="group-hover:fill-whiteColor dark:group-hover:fill-whiteColor-dark"
                                                    fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M26.9989 7.6293L23.05 18.137L20.3744 15.4678C15.622 19.6266 9.96272 22.5976 3.63238 24.2568C1.36694 24.9297 0.353173 21.6176 2.74495 21.0505C8.47735 19.533 13.5443 16.8156 17.8363 13.1279L15.5453 10.8879L26.9989 7.6293Z"
                                                    fill="#FFB31F"></path>
                                            </svg>
                                        @elseif ($loop->index % 4 == 1)
                                            <!-- SVG 2 -->
                                            <svg class="absolute inline-block translate-y-3 translate-x-2 w-20 h-[60px]"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_98_30)">
                                                    <path
                                                        class="group-hover:fill-whiteColor dark:group-hover:fill-whiteColor-dark"
                                                        d="M27.9228 12.1644H34.0478C34.3185 12.1644 34.5782 12.0616 34.7696 11.8788C34.9611 11.6959 35.0686 11.4479 35.0686 11.1894C35.0686 10.9308 34.9611 10.6828 34.7696 10.4999C34.5782 10.3171 34.3185 10.2144 34.0478 10.2144H27.9228C27.6521 10.2144 27.3924 10.3171 27.201 10.4999C27.0095 10.6828 26.902 10.9308 26.902 11.1894C26.902 11.4479 27.0095 11.6959 27.201 11.8788C27.3924 12.0616 27.6521 12.1644 27.9228 12.1644Z"
                                                        fill="#FFB31F"></path>
                                                    <path
                                                        class="group-hover:fill-whiteColor dark:group-hover:fill-whiteColor-dark"
                                                        d="M13.0973 12.1388C12.9476 11.925 12.7156 11.7764 12.4517 11.7253C12.1879 11.6742 11.9136 11.7246 11.6885 11.8658L8.62601 13.8158C8.48705 13.9049 8.37319 14.0254 8.29446 14.1665C8.21574 14.3076 8.17456 14.4651 8.17456 14.625C8.17456 14.7849 8.21574 14.9424 8.29446 15.0835C8.37319 15.2246 8.48705 15.3451 8.62601 15.4343L11.6885 17.3843C11.8529 17.4942 12.0493 17.5522 12.25 17.55C12.4681 17.5484 12.6799 17.4801 12.8544 17.3552C13.0289 17.2302 13.1569 17.0552 13.2197 16.8557C13.2825 16.6562 13.2767 16.4427 13.2033 16.2466C13.1298 16.0504 12.9925 15.8819 12.8114 15.7658L11.025 14.625L12.8114 13.4843C13.0352 13.3413 13.1908 13.1197 13.2443 12.8677C13.2979 12.6157 13.245 12.3537 13.0973 12.1388Z"
                                                        fill="#FFB31F"></path>
                                                    <path
                                                        class="group-hover:fill-whiteColor dark:group-hover:fill-whiteColor-dark"
                                                        d="M16.5783 9.75005C16.3157 9.68819 16.0381 9.7284 15.8065 9.86185C15.5749 9.9953 15.4082 10.2111 15.3431 10.4618L13.3014 18.2618C13.2599 18.3898 13.2465 18.5247 13.262 18.6579C13.2775 18.7911 13.3216 18.9198 13.3915 19.036C13.4615 19.1522 13.5557 19.2534 13.6684 19.3332C13.7811 19.4131 13.9099 19.4699 14.0466 19.5C14.1808 19.5347 14.321 19.5429 14.4586 19.524C14.5962 19.5051 14.7283 19.4596 14.8468 19.3902C14.9653 19.3208 15.0677 19.2291 15.1478 19.1205C15.2279 19.012 15.2839 18.889 15.3124 18.759L17.3541 10.959C17.3904 10.8309 17.399 10.697 17.3792 10.5656C17.3594 10.4342 17.3117 10.308 17.2391 10.1948C17.1665 10.0816 17.0704 9.98375 16.9567 9.90728C16.8431 9.8308 16.7143 9.7773 16.5783 9.75005Z"
                                                        fill="#5F2DED"></path>
                                                    <path
                                                        class="group-hover:fill-whiteColor dark:group-hover:fill-whiteColor-dark"
                                                        d="M21.9989 13.8158L18.9364 11.8658C18.7114 11.7246 18.4371 11.6742 18.1732 11.7253C17.9094 11.7764 17.6774 11.925 17.5277 12.1388C17.3799 12.3537 17.3271 12.6157 17.3806 12.8677C17.4342 13.1197 17.5897 13.3413 17.8135 13.4843L19.6 14.625L17.8135 15.7658C17.6325 15.8819 17.4952 16.0504 17.4217 16.2466C17.3482 16.4427 17.3425 16.6562 17.4052 16.8557C17.468 17.0552 17.596 17.2302 17.7705 17.3552C17.9451 17.4801 18.1569 17.5484 18.375 17.55C18.5757 17.5522 18.772 17.4942 18.9364 17.3843L21.9989 15.4343C22.1379 15.3451 22.2518 15.2246 22.3305 15.0835C22.4092 14.9424 22.4504 14.7849 22.4504 14.625C22.4504 14.4651 22.4092 14.3076 22.3305 14.1665C22.2518 14.0254 22.1379 13.9049 21.9989 13.8158Z"
                                                        fill="#FFB31F"></path>
                                                    <path
                                                        class="group-hover:fill-whiteColor dark:group-hover:fill-whiteColor-dark"
                                                        d="M27.9228 16.8072H40.1728C40.4435 16.8072 40.7032 16.7045 40.8946 16.5216C41.0861 16.3388 41.1936 16.0908 41.1936 15.8322C41.1936 15.5736 41.0861 15.3256 40.8946 15.1427C40.7032 14.9599 40.4435 14.8572 40.1728 14.8572H27.9228C27.6521 14.8572 27.3924 14.9599 27.201 15.1427C27.0095 15.3256 26.902 15.5736 26.902 15.8322C26.902 16.0908 27.0095 16.3388 27.201 16.5216C27.3924 16.7045 27.6521 16.8072 27.9228 16.8072Z"
                                                        fill="#FFB31F"></path>
                                                    <path
                                                        class="group-hover:fill-whiteColor dark:group-hover:fill-whiteColor-dark"
                                                        d="M34.0392 19.5H27.451C27.3054 19.5 27.1657 19.5978 27.0628 19.772C26.9598 19.9461 26.902 20.1823 26.902 20.4286C26.902 20.6748 26.9598 20.911 27.0628 21.0852C27.1657 21.2593 27.3054 21.3571 27.451 21.3571H34.0392C34.1848 21.3571 34.3245 21.2593 34.4275 21.0852C34.5304 20.911 34.5883 20.6748 34.5883 20.4286C34.5883 20.1823 34.5304 19.9461 34.4275 19.772C34.3245 19.5978 34.1848 19.5 34.0392 19.5Z"
                                                        fill="#FFB31F"></path>
                                                    <path
                                                        class="group-hover:fill-whiteColor dark:group-hover:fill-whiteColor-dark"
                                                        d="M43.8958 27.3V3.90005C43.8958 3.64146 43.7882 3.39347 43.5968 3.21062C43.4054 3.02777 43.1457 2.92505 42.875 2.92505H6.12496C5.85422 2.92505 5.59456 3.02777 5.40312 3.21062C5.21168 3.39347 5.10413 3.64146 5.10413 3.90005V27.3C4.2919 27.3 3.51294 27.6082 2.93861 28.1568C2.36428 28.7053 2.04163 29.4493 2.04163 30.225C2.04163 31.2594 2.47183 32.2514 3.23761 32.9828C4.00338 33.7142 5.04199 34.125 6.12496 34.125H42.875C43.9579 34.125 44.9965 33.7142 45.7623 32.9828C46.5281 32.2514 46.9583 31.2594 46.9583 30.225C46.9583 29.4493 46.6356 28.7053 46.0613 28.1568C45.487 27.6082 44.708 27.3 43.8958 27.3ZM41.8541 24.375H25.5208V4.87505H41.8541V24.375ZM7.14579 4.87505H23.4791V24.375H7.14579V4.87505ZM42.875 32.175H6.12496C5.58348 32.175 5.06417 31.9696 4.68128 31.6039C4.2984 31.2382 4.08329 30.7422 4.08329 30.225C4.08329 29.9665 4.19084 29.7185 4.38229 29.5356C4.57373 29.3528 4.83338 29.25 5.10413 29.25H18.7629L19.5081 30.6638C19.5929 30.8246 19.7227 30.9598 19.8831 31.0545C20.0434 31.1491 20.2281 31.1995 20.4166 31.2H28.5833C28.7718 31.1995 28.9565 31.1491 29.1168 31.0545C29.2772 30.9598 29.407 30.8246 29.4918 30.6638L30.237 29.25H43.8958C44.1665 29.25 44.4262 29.3528 44.6176 29.5356C44.8091 29.7185 44.9166 29.9665 44.9166 30.225C44.9166 30.7422 44.7015 31.2382 44.3186 31.6039C43.9357 31.9696 43.4164 32.175 42.875 32.175Z"
                                                        fill="#5F2DED"></path>
                                                </g>
                                            </svg>
                                        @elseif ($loop->index % 4 == 2)
                                            <!-- SVG 3 -->
                                            <svg class="absolute inline-block translate-y-3 translate-x-2 w-20 h-[60px]"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    class="group-hover:fill-whiteColor dark:group-hover:fill-whiteColor-dark"
                                                    d="M28.525 44.0499H20.4753C18.7037 44.0499 17.2625 42.7046 17.2625 41.0509C17.2625 36.723 15.7895 32.4935 13.115 29.1417C11.2743 26.835 10.3045 24.0912 10.3103 21.2067C10.3172 17.7711 11.7888 14.4906 14.4541 11.9697C17.1201 9.44796 20.6146 8.03229 24.2939 7.98346C28.1232 7.9323 31.7312 9.28502 34.4566 11.7915C37.1864 14.302 38.6898 17.6547 38.6898 21.2322C38.6898 24.0423 37.7594 26.7272 35.9993 28.9965C33.2113 32.5912 31.7377 36.7597 31.7377 41.0511C31.7377 42.7046 30.2964 44.0499 28.525 44.0499ZM24.5008 10.6603C24.4454 10.6603 24.3904 10.6607 24.3349 10.6614C18.3004 10.7416 13.1927 15.5731 13.1814 21.2117C13.1767 23.5138 13.9501 25.7029 15.418 27.5424C18.4589 31.3533 20.1335 36.1507 20.1335 41.0509C20.1335 41.2278 20.2869 41.3716 20.4752 41.3716H28.5249C28.7133 41.3716 28.8665 41.2278 28.8665 41.051C28.8665 36.1921 30.5286 31.4809 33.6733 27.4265C35.0768 25.6168 35.8187 23.4749 35.8187 21.2321C35.8187 18.3773 34.6191 15.7019 32.4409 13.6987C30.3067 11.7359 27.4925 10.6603 24.5008 10.6603Z"
                                                    fill="#5F2DED"></path>
                                                <path
                                                    class="group-hover:fill-whiteColor dark:group-hover:fill-whiteColor-dark"
                                                    d="M34.5884 35.3186H14.4117V37.9969H34.5884V35.3186Z"
                                                    fill="#5F2DED"></path>
                                                <path
                                                    class="group-hover:fill-whiteColor dark:group-hover:fill-whiteColor-dark"
                                                    d="M23.8501 30.4466L21.4301 29.0054L24.8268 24.0417H21.5536C21.0311 24.0417 20.5498 23.7768 20.297 23.3501C20.0444 22.9235 20.0602 22.4024 20.3384 21.9897L25.0805 14.9543L27.5109 16.38L24.1519 21.3634H27.4464C27.9708 21.3634 28.4533 21.63 28.7053 22.059C28.9573 22.4879 28.9385 23.0109 28.6564 23.4232L23.8501 30.4466Z"
                                                    fill="#FFB31F"></path>
                                                <path
                                                    class="group-hover:fill-whiteColor dark:group-hover:fill-whiteColor-dark"
                                                    d="M25.9355 2.17908H23.0645V6.19654H25.9355V2.17908Z"
                                                    fill="#5F2DED"></path>
                                                <path
                                                    class="group-hover:fill-whiteColor dark:group-hover:fill-whiteColor-dark"
                                                    d="M10.6816 6.93133L8.65027 8.8241L11.6922 11.6649L13.7235 9.77218L10.6816 6.93133Z"
                                                    fill="#5F2DED"></path>
                                                <path
                                                    class="group-hover:fill-whiteColor dark:group-hover:fill-whiteColor-dark"
                                                    d="M38.3173 6.93027L35.2754 9.77112L37.3067 11.6639L40.3486 8.82304L38.3173 6.93027Z"
                                                    fill="#5F2DED"></path>
                                            </svg>
                                        @elseif ($loop->index % 4 == 3)
                                            <!-- SVG 3 -->
                                            <svg class="absolute inline-block translate-y-3 translate-x-2 w-20 h-[60px]"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    class="group-hover:fill-whiteColor dark:group-hover:fill-whiteColor-dark"
                                                    d="M45.8483 26.6935C45.3965 26.2639 44.7953 26.0262 44.1558 26.0262C43.5164 26.0262 42.9166 26.2639 42.4634 26.6935L33.7409 34.9886C33.7306 34.9886 33.7183 34.9867 33.708 34.9867H25.1438C25.1438 34.9541 25.1458 34.9229 25.1458 34.8898C25.1458 34.2537 25.0301 33.6443 24.8165 33.0772H29.4735C29.7924 33.6951 30.4593 34.1214 31.2316 34.1214C32.314 34.1214 33.193 33.2873 33.193 32.258C33.193 31.2287 32.314 30.3946 31.2316 30.3946C30.4593 30.3946 29.7924 30.821 29.4735 31.4389H23.8321C22.7928 30.2507 21.2243 29.4949 19.4716 29.4949C17.9393 29.4949 16.5502 30.0736 15.53 31.0111L15.5281 31.0092L2.44995 43.5669H15.5486L19.0217 40.2842H33.708C34.1956 40.2842 34.6542 40.1645 35.0526 39.9548C35.325 39.8434 35.5749 39.6827 35.79 39.4776L45.8488 29.9124C46.3015 29.4832 46.5499 28.911 46.5499 28.3029C46.5499 27.6949 46.3015 27.1231 45.8483 26.6935ZM19.4716 37.1422C18.1633 37.1422 17.1034 36.1325 17.1034 34.8902C17.1034 33.6461 18.1633 32.6369 19.4716 32.6369C20.7799 32.6369 21.8397 33.6466 21.8397 34.8902C21.8397 36.1325 20.7799 37.1422 19.4716 37.1422ZM33.6664 38.9106C32.9255 38.9106 32.3253 38.3402 32.3253 37.6352C32.3253 36.9321 32.925 36.3599 33.6664 36.3599C34.4077 36.3599 35.0075 36.9321 35.0075 37.6352C35.0075 38.3402 34.4077 38.9106 33.6664 38.9106ZM36.3001 36.6749C36.133 36.2634 35.8606 35.9028 35.5127 35.6209L42.0537 29.4026C42.2727 29.7814 42.602 30.096 43.0019 30.3024L36.3001 36.6749ZM36.231 9.4762H28.4753V8.49301H36.231V9.4762ZM36.231 12.0986H28.4753V11.1155H36.231V12.0986ZM23.3048 9.4762H15.5486V8.49301H23.3044L23.3048 9.4762ZM23.3048 12.0986H15.5486V11.1155H23.3044L23.3048 12.0986ZM41.057 5.87011H39.3308V4.23132H28.589C27.7295 4.23132 26.9215 4.55004 26.3139 5.1283C26.1517 5.28253 26.0106 5.45121 25.8886 5.63014C25.7666 5.45121 25.6255 5.28253 25.4633 5.1283C24.8557 4.55004 24.0477 4.23132 23.1882 4.23132H12.4464V5.87011H10.7231V23.8991H24.0217C24.2677 24.6582 25.011 25.2103 25.8901 25.2103C26.7691 25.2103 27.5125 24.6586 27.7585 23.8991H41.057V5.87011ZM27.0455 5.82305C27.4576 5.43071 28.0059 5.2145 28.589 5.2145H38.2964L38.2797 20.6211H30.4471C29.0344 20.6211 27.6364 20.9873 26.4237 21.6644L26.407 7.29176C26.4065 6.73727 26.6329 6.21586 27.0455 5.82305ZM13.4803 5.21497H23.1877C23.7708 5.21497 24.3191 5.43118 24.7312 5.82352C25.1433 6.21586 25.3702 6.73773 25.3697 7.29223L25.353 21.6653C24.1388 20.9878 22.7413 20.6215 21.3296 20.6215H13.4803V5.21497Z"
                                                    fill="#5F2DED"></path>
                                                <rect x="15" y="8.54175" width="8" height="0.993317"
                                                    fill="#FFB31F"></rect>
                                                <rect x="28" y="8.54175" width="8" height="0.993317"
                                                    fill="#FFB31F"></rect>
                                                <rect x="15" y="11.5198" width="8" height="0.993319"
                                                    fill="#FFB31F"></rect>
                                                <rect x="28" y="11.5198" width="8" height="0.993319"
                                                    fill="#FFB31F"></rect>
                                            </svg>
                                        @endif
                                        <div class="service__bg__img w-20 h-[60px]">
                                            <svg class="w-20 h-[60px]" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    class="group-hover:fill-whiteColor dark:group-hover:fill-whiteColor-dark"
                                                    fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M63.3775 44.4535C54.8582 58.717 39.1005 53.2202 23.1736 47.5697C7.2467 41.9192 -5.18037 32.7111 3.33895 18.4477C11.8583 4.18418 31.6595 -2.79441 47.5803 2.85105C63.5011 8.49652 71.8609 30.2313 63.3488 44.4865L63.3775 44.4535Z"
                                                    fill="#5F2DED" fill-opacity="0.05"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="service__small__img w-7 h-[60px]">
                                        <svg class="icon__hover__img w-7 h-[60px] opacity-0 group-hover:opacity-100"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16.5961 10.265L19 1.33069L10.0022 3.73285L1 6.1306L7.59393 12.6627L14.1879 19.1992L16.5961 10.265Z"
                                                stroke="#FFB31F" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                </div>
                                <!-- card content -->
                                <div>
                                    <a href="#"
                                        class="text-2xl lg:text-lg 2xl:text-2xl font-semibold mb-15px md:mb-0 2xl:mb-15px hover:text-secondaryColor font-hind  dark:text-whiteColor dark:hover:text-secondaryColor dark:transition-all dark:duration-300">
                                        {{ $category->name }}
                                    </a>
                                    <p
                                        class="text-sm lg:text-xs 2xl:text-sm text-contentColor group-hover:text-whiteColor mb-15px lg:mb-2 2xl:mb-15px transition-all duration-300">
                                        Mengembangkan keterampilan manajerial dan pemahaman bisnis.
                                    </p>
                                    <div>
                                        <div
                                            class="text-sm text-black dark:text-blackColor-darkColor group-hover:text-whiteColor dark:text-blackColor-dark dark:group-hover:text-whiteColor-dark">
                                            <a href="{{ route('course', ['category' => $category->slug]) }}"
                                                class="text-sm font-medium hover:text-secondaryColor transition-none">
                                                Lihat Kursus
                                                <i class="icofont-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
