@extends('landing.layouts.landing-layouts')
@section('page_title', 'Instruktur | Learn Flow')
@section('content')

    @include('landing.components.breadcrumb', ['title' => 'Instruktur'])
    <section>
        <div class="container py-50px md:py-70px lg:py-20 2xl:py-100px">
            <!-- heading -->

            <div data-aos="fade-up" class="text-center mb-45px">
                <span class="text-size-15 font-semibold text-secondaryColor inline-block uppercase mb-[13px]">
                    INSTRUKTUR AHLI
                </span>
                <h3
                    class="text-3xl md:text-size-35 lg:text-size-45 leading-10 md:leading-2xl font-bold text-blackColor dark:text-blackColor-dark">
                    Ahli di Bidangnya
                </h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-30px gap-y-15">
                <!-- teacher 1 -->

                @foreach($instrukturs as $instruktur)
                <div data-aos="fade-up" class="group">
                    <div class="mb-30px relative flex flex-col items-center">
                        <div>
                            <img src="assets/images/teacher/teacher__1.png" class="rounded-full" alt="">
                        </div>
                        <!-- social icons -->
                        <div
                            class="absolute transition-all duration-300 left-0 -top-3 opacity-0 group-hover:opacity-100 group-hover:animate-spin-infinit2 w-full">
                            <svg class="w-full" width="337" height="324" viewBox="0 0 337 324" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M80.2428 282.317C50.8714 260.267 30.5089 228.299 22.9428 192.359C19.0395 173.828 18.5231 154.744 21.4188 136.029C24.2336 117.894 30.269 100.408 39.2398 84.3973C42.7898 78.0134 46.748 71.8653 51.0897 65.9913C55.0814 60.5771 59.5135 55.5019 64.3408 50.8173C71.6419 43.7627 79.5378 37.351 87.9408 31.6534C95.5854 26.4696 103.715 22.04 112.216 18.4273C117.979 16.0162 123.891 13.9787 129.916 12.3273C135.717 10.7388 141.597 9.45436 147.533 8.4793C160.473 6.34108 173.631 5.83713 186.697 6.9793C213.842 9.36864 239.851 18.9921 262.014 34.8473C273.295 42.9043 283.45 52.433 292.207 63.1804C302.723 76.0846 311.454 90.3461 318.164 105.58C324.368 119.696 328.812 134.522 331.393 149.724C331.759 149.6 331.73 148.097 332.142 149.663C332.926 155.316 333.574 159.783 334.323 163.263C334.936 162.182 335.381 161.014 335.642 159.798C335.648 157.901 335.56 156.005 335.376 154.116C335.226 152.463 335.062 150.833 334.92 148.564C335.685 150.994 336.175 148.064 335.945 144.964C334.487 133.738 331.81 122.704 327.961 112.057C322.836 97.4414 315.757 83.5865 306.915 70.8703C298.137 58.2416 287.673 46.8723 275.815 37.0783C264.027 27.3379 250.933 19.2967 236.915 13.1893C208.812 0.957732 177.769 -2.87683 147.534 2.14837C132.401 4.65509 117.72 9.37426 103.961 16.1544C90.0619 23.0142 77.2426 31.8725 65.9108 42.4473C45.5267 61.4578 30.4226 85.431 22.0745 112.025C13.7263 138.618 12.4195 166.923 18.2818 194.172C22.3735 213.299 29.9942 231.497 40.7537 247.831C51.5501 264.233 65.3701 278.43 81.4758 289.663C88.8675 294.808 96.7086 299.275 104.904 303.009C113.416 306.887 122.277 309.945 131.369 312.142C150.256 316.68 169.848 317.484 189.044 314.509C198.763 313.002 208.307 310.526 217.534 307.118C226.746 303.714 235.6 299.411 243.968 294.271C260.372 284.17 274.751 271.101 286.368 255.733C289.198 251.988 291.384 249.086 292.723 246.196C291.986 248.163 293.199 245.975 293.788 245.064C296.03 241.634 298.277 237.827 300.368 233.818C302.459 229.809 304.399 225.604 306.086 221.418C309.09 213.98 311.431 206.29 313.081 198.439C314.561 193.704 315.58 188.836 316.122 183.904C316.812 178.41 317.1 172.685 317.273 167.904C316.649 173.838 315.873 181.788 314.423 189.542C313.213 196.518 311.348 203.364 308.853 209.99C308.906 210.95 309.412 209.747 308.718 212.372C307.785 214.336 308.257 211.906 307.418 214.336C304.957 221.882 301.836 228.353 298.431 232.789C300.531 228.511 302.296 224.944 303.917 221.259C305.691 217.292 307.133 213.185 308.227 208.979C308.898 207.694 308.368 210.122 309.243 207.706C309.099 206.306 309.943 203.436 310.712 200.456C311.481 197.476 312.17 194.391 311.988 192.716C312.336 192.608 312.883 190.437 313.188 188.531C313.493 186.625 313.603 184.998 313.276 186.004C314.233 181.207 314.796 176.339 314.961 171.45C315.073 167.865 314.947 165.36 314.936 163.262C314.392 163.748 314.236 165.624 314.136 167.862C314.036 170.1 313.981 172.697 313.777 174.614C313.217 180.077 311.618 185.397 311.645 189.571C311.049 190.676 310.716 191.904 310.672 193.159C310.49 194.521 310.304 195.779 309.755 196.101C309.721 197.424 309.489 198.734 309.067 199.988C308.622 201.369 308.333 202.794 308.204 204.238C307.958 204.238 307.733 203.995 307.362 205.558C305.919 210.641 304.12 215.615 301.977 220.443C299.825 225.424 297.456 230.243 295.448 234.601C295.482 233.721 294.148 236.196 292.848 238.583C292.116 239.781 291.459 241.022 290.88 242.3C288.315 246.254 285.545 250.07 282.58 253.732C281.227 255.508 279.367 257.772 277.501 259.925C275.635 262.078 273.767 264.125 272.501 265.57C269.179 269.209 265.612 272.617 261.826 275.77C243.253 291.779 221.01 302.947 197.078 308.281C190.504 309.075 183.885 309.981 177.385 310.516C171.174 311.109 164.922 311.14 158.706 310.607C155.338 310.257 159.686 311.072 157.232 310.975C155.356 310.431 153.425 310.104 151.475 310C152.251 310.122 153.186 310.433 152.168 310.383C148.854 310.303 151.245 309.675 148.609 309.501C146.694 309.241 146.983 309.775 144.957 309.442L145.025 308.987C131.968 307.18 119.26 303.407 107.332 297.798C95.7036 292.316 84.7807 285.449 74.8008 277.345C76.2348 279.098 79.7398 280.623 80.2428 282.317ZM295.82 237.398C296.43 236.293 297.02 235.185 297.603 234.066C298.04 233.883 297.655 234.966 297.119 235.961C296.583 236.956 295.904 237.874 295.82 237.398Z"
                                    fill="#5F2DED"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M42.5815 240.063C43.9738 241.89 45.2667 243.79 46.4546 245.755C47.4946 247.413 47.7296 248.05 45.7046 245.116C44.5226 243.35 44.6455 243.252 42.5815 240.063Z"
                                    fill="#5F2DED"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M300.416 104.555C311.484 130.105 315.417 158.177 311.796 185.785C308.175 213.392 297.135 239.501 279.853 261.332C268.576 275.576 254.792 287.641 239.181 296.932C232.985 300.645 226.552 303.945 219.922 306.81C213.814 309.459 207.494 311.588 201.029 313.174C191.244 315.551 181.269 317.065 171.22 317.698C162.048 318.277 152.842 317.955 143.733 316.737C137.555 315.874 131.439 314.614 125.424 312.963C119.616 311.369 113.896 309.474 108.286 307.284C96.0031 302.503 84.363 296.213 73.6337 288.557C62.601 280.68 52.6389 271.402 43.9977 260.957C35.1758 250.282 27.79 238.498 22.0288 225.905C16.2006 213.173 12.0655 199.732 9.72875 185.926C4.30908 154.071 7.19004 121.356 18.0937 90.9382C17.7167 90.8582 17.0067 92.1752 17.4157 90.6082C19.4987 85.3082 21.1217 81.1082 22.1767 77.7082C21.116 78.331 20.1591 79.1157 19.3407 80.0341C18.4068 81.6755 17.5564 83.363 16.7927 85.0902C16.1147 86.5982 15.4607 88.0902 14.4737 90.1322C14.9997 87.6322 13.1437 89.9201 11.8277 92.7221C7.59449 103.217 4.51928 114.142 2.65674 125.304C-2.77906 156.048 0.160074 187.688 11.1657 216.904C16.6154 231.373 24.0212 245.028 33.1767 257.487C51.4403 282.38 76.4189 301.554 105.187 312.762C136.223 324.838 170.314 326.645 202.453 317.918C234.592 309.191 263.087 290.389 283.753 264.274C302.149 241.024 313.692 213.101 317.081 183.647C320.471 154.194 315.573 124.379 302.939 97.5572C299.052 89.3202 294.446 81.4425 289.173 74.0162C272.313 50.259 248.967 31.8614 221.927 21.0241C203.67 13.7064 184.134 10.1143 164.469 10.4592C145.378 10.8071 126.526 14.7746 108.914 22.1512C104.633 23.9512 101.322 25.3422 98.7488 27.1602C100.349 25.8342 98.2297 27.1082 97.2717 27.5962C93.6537 29.4202 89.8478 31.5682 86.0718 33.9702C82.2718 36.3906 78.5955 38.9998 75.0567 41.7882C68.814 46.6978 63.0272 52.161 57.7668 58.1112C54.1662 61.46 50.9044 65.1555 48.0288 69.1441C44.7458 73.5441 41.6987 78.3602 39.2127 82.4082C42.6547 77.5892 47.2128 71.0992 52.2578 65.1272C56.7103 59.7105 61.6731 54.7343 67.0777 50.2672C67.5007 49.4082 66.4777 50.1922 68.3587 48.2732C70.1267 47.0492 68.5307 48.9122 70.4487 47.2392C76.2677 41.9632 82.1348 37.9542 87.2488 35.8552C83.3378 38.4852 80.0668 40.6722 76.8618 43.0342C73.3839 45.5642 70.1269 48.3847 67.1257 51.4652C65.9177 52.2352 67.5627 50.4032 65.6257 52.0482C65.0647 53.3372 62.9257 55.3861 60.8107 57.5761C58.6957 59.7661 56.5838 62.0832 55.9218 63.6262C55.5678 63.5422 54.0327 65.1422 52.8317 66.6352C51.6307 68.1282 50.7447 69.4822 51.5197 68.7782C48.3424 72.4488 45.4749 76.3766 42.9468 80.5212C41.0968 83.5692 39.9817 85.8022 38.9657 87.6212C39.6747 87.4782 40.7257 85.9342 41.9097 84.0512C43.0938 82.1682 44.4097 79.9422 45.5207 78.3872C48.6757 73.9422 52.6607 70.1532 54.6777 66.5252C55.7373 65.8714 56.628 64.9772 57.2777 63.9151C58.1007 62.8291 58.8777 61.8342 59.5107 61.8362C60.1842 60.7101 61.0255 59.6933 62.0057 58.8211C63.0671 57.852 64.0149 56.7655 64.8308 55.5822C65.0438 55.7102 65.1208 56.0342 66.2058 54.8702C69.9364 51.2084 73.9264 47.8207 78.1448 44.7332C82.4448 41.5203 86.8507 38.5573 90.7197 35.8113C90.2597 36.5563 92.6197 35.0932 94.9197 33.6942C96.1389 33.0318 97.3149 32.293 98.4407 31.4821C102.596 29.37 106.861 27.4824 111.219 25.8272C113.259 24.9812 115.976 23.9712 118.644 23.0622C121.312 22.1532 123.93 21.3342 125.733 20.7312C130.393 19.2769 135.148 18.1489 139.965 17.3552C152.325 15.1017 164.926 14.456 177.452 15.4342C189.176 16.359 200.749 18.6688 211.93 22.3152C218.011 24.9892 224.188 27.5851 230.077 30.4511C235.755 33.12 241.184 36.291 246.298 39.9262C249.044 41.9512 245.678 39.0262 247.754 40.3612C249.109 41.7903 250.622 43.0615 252.263 44.1502C251.651 43.6502 250.993 42.9002 251.85 43.4642C254.681 45.2272 252.304 44.5492 254.501 46.0482C256.032 47.2532 256.043 46.6421 257.635 47.9671L257.353 48.3272C267.792 56.5873 276.95 66.3489 284.527 77.2942C291.917 87.9886 298.018 99.519 302.702 111.645C302.314 109.394 300.024 106.281 300.416 104.555ZM91.7647 33.2002C90.6967 33.8462 89.6417 34.5002 88.5917 35.1732C88.1237 35.1082 88.9847 34.3732 89.9367 33.7802C90.8887 33.1872 91.9237 32.7452 91.7647 33.2002Z"
                                    fill="#5F2DED"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M312.378 160.412C312.065 158.12 311.874 155.813 311.806 153.501C311.715 151.533 311.824 150.862 312.142 154.438C312.303 156.573 312.149 156.595 312.378 160.412Z"
                                    fill="#5F2DED"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="text-center">
                        <h5>
                            <a href="{{route('showinstructor', $instruktur->id)}}"
                                class="text-size-28 leading-45px font-semibold text-contentColor capitalize dark:text-contentColor-dark hover:text-primaryColor dark:hover:text-primaryColor">
                                {{$instruktur->name}}
                            </a>
                        </h5>
                        <p class="text-xl text-primaryColor font-medium leading-6 mb-10px">
                            {{ $instruktur->profesi ?? '-' }}

                        </p>
                        <ul class="flex gap-10px items-center justify-center">
                            @foreach ($instrukturs as $instruktur)
                                @if (!empty($instruktur->sosial_media))
                                    @foreach ($instruktur->sosial_media as $platform => $url)
                                        @if (!empty($url))
                                            <li>
                                                <a href="{{ $url }}" target="_blank"
                                                    class="text-primaryColor bg-primaryColor hover:bg-primaryColor hover:text-whiteColor hover:bg-opacity-100 bg-opacity-5 w-34px h-34px leading-34px text-center rounded-full">
                                                    @php
                                                        $icons = [
                                                            'facebook' => 'icofont-facebook',
                                                            'twitter' => 'icofont-twitter',
                                                            'linkedin' => 'icofont-linkedin',
                                                            'website' => 'icofont-web',
                                                            'github' => 'icofont-github',
                                                        ];
                                                        $iconClass = $icons[$platform] ?? 'icofont-link';
                                                    @endphp
                                                    <i class="{{ $iconClass }}"></i>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach
                <!-- teacher 2 -->
            </div>
        </div>
    </section>
@endsection
