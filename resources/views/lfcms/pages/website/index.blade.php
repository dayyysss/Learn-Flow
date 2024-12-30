@extends('lfcms.layouts.app')
@section('page_title', 'Data Pengguna | Learn Flow CMS')
@section('content')

<!-- ACCOUNT SETTING -->
<li class="relative group/sm w-full group-data-[sidebar-size=sm]:hover:w-[calc(theme('spacing.app-menu-sm')_*_3.4)] group-data-[sidebar-size=sm]:flex-center">
  <a href="account-setting.html" class="relative text-gray-500 dark:text-dark-text-two font-medium leading-none px-3.5 py-3 h-[42px] flex items-center group/menu-link ac-transition group-data-[sidebar-size=sm]:bg-gray-100 dark:group-data-[sidebar-size=sm]:bg-dark-icon group-data-[sidebar-size=sm]:hover:bg-primary-500/95 group-data-[sidebar-size=sm]:[&.active]:bg-primary-500/95 hover:text-white [&.active]:text-white hover:!bg-primary-500/95 [&.active]:bg-primary-500/95 group-data-[sidebar-size=sm]:rounded-lg group-data-[sidebar-size=sm]:group-hover/sm:!rounded-br-none group-data-[sidebar-size=lg]:rounded-l-full group-data-[sidebar-size=sm]:p-3 group-data-[sidebar-size=sm]:w-full">
      <span class="shrink-0 group-data-[sidebar-size=sm]:w-[calc(theme('spacing.app-menu-sm')_*_0.43)] group-data-[sidebar-size=sm]:flex-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
              <path d="M15.2924 6.12123L13.0175 4.82561C12.9718 4.74275 12.924 4.66205 12.8747 4.58205L12.8661 2.01081C12.1472 1.40407 11.3201 0.93857 10.4284 0.638763L8.14287 1.91653C8.04716 1.91653 7.95074 1.91653 7.85718 1.91653L5.57163 0.638763C4.6802 0.939547 3.85363 1.40603 3.13537 2.01366L3.12395 4.58491C3.07395 4.6649 3.0261 4.74633 2.9811 4.82846L0.706978 6.12123C0.527687 7.0281 0.527687 7.9613 0.706978 8.86817L2.98181 10.1638C3.02753 10.2466 3.07538 10.3274 3.12466 10.4073L3.13323 12.9786C3.85227 13.5859 4.67958 14.0519 5.57163 14.3521L7.85718 13.0757C7.95289 13.0757 8.04931 13.0757 8.14287 13.0757L10.4284 14.3521C11.3191 14.051 12.1449 13.5846 12.8625 12.9772L12.874 10.4059C12.924 10.3259 12.9718 10.2445 13.0168 10.1624L15.2909 8.8696C15.4709 7.96236 15.4714 7.02865 15.2924 6.12123ZM8.00002 10.3524C7.43498 10.3524 6.88262 10.1848 6.4128 9.87087C5.94297 9.55695 5.57679 9.11075 5.36056 8.58872C5.14432 8.06668 5.08775 7.49224 5.19798 6.93805C5.30822 6.38386 5.58032 5.8748 5.97987 5.47525C6.37942 5.0757 6.88847 4.80361 7.44266 4.69337C7.99686 4.58314 8.57129 4.63971 9.09333 4.85595C9.61537 5.07218 10.0616 5.43836 10.3755 5.90818C10.6894 6.378 10.857 6.93036 10.857 7.49541C10.857 8.25312 10.556 8.97979 10.0202 9.51557C9.4844 10.0514 8.75773 10.3524 8.00002 10.3524Z" fill="#EEEEEE" class="group-hover/menu-link:fill-[url(#g_24)] group-[.active]/menu-link:fill-[url(#g_24)] dark:fill-none"/>
              <path d="M7.99994 4.0671C7.32189 4.0671 6.65905 4.26817 6.09527 4.64488C5.53148 5.02159 5.09207 5.55702 4.83258 6.18347C4.5731 6.80991 4.50521 7.49923 4.63749 8.16426C4.76978 8.82929 5.09629 9.44016 5.57575 9.91962C6.05521 10.3991 6.66608 10.7256 7.33111 10.8579C7.99614 10.9902 8.68546 10.9223 9.31191 10.6628C9.93835 10.4033 10.4738 9.96389 10.8505 9.40011C11.2272 8.83632 11.4283 8.17349 11.4283 7.49543C11.4273 6.58647 11.0658 5.71501 10.4231 5.07228C9.78036 4.42955 8.9089 4.06805 7.99994 4.0671ZM7.99994 9.78098C7.5479 9.78098 7.10602 9.64693 6.73016 9.39579C6.3543 9.14466 6.06136 8.7877 5.88837 8.37007C5.71538 7.95244 5.67012 7.49289 5.75831 7.04954C5.8465 6.60619 6.06418 6.19894 6.38382 5.8793C6.70346 5.55966 7.1107 5.34198 7.55406 5.2538C7.99741 5.16561 8.45696 5.21087 8.87459 5.38386C9.29222 5.55684 9.64917 5.84979 9.90031 6.22565C10.1514 6.6015 10.2855 7.04339 10.2855 7.49543C10.2855 8.10159 10.0447 8.68293 9.61607 9.11156C9.18745 9.54018 8.60611 9.78098 7.99994 9.78098ZM15.8522 6.01054C15.8363 5.93007 15.8033 5.85398 15.7553 5.78743C15.7074 5.72088 15.6457 5.66543 15.5744 5.62485L13.4438 4.41065L13.4353 2.0094C13.435 1.9267 13.4168 1.84504 13.3819 1.77007C13.347 1.69509 13.2962 1.62858 13.2331 1.57514C12.4603 0.921401 11.5703 0.420414 10.6105 0.0988186C10.5349 0.0732346 10.4548 0.0637667 10.3753 0.0710246C10.2958 0.0782824 10.2188 0.102105 10.1491 0.140958L7.99994 1.3423L5.84867 0.138816C5.77893 0.0997437 5.70176 0.075741 5.62216 0.0683592C5.54256 0.0609775 5.4623 0.0703809 5.38656 0.0959616C4.42732 0.419622 3.53829 0.922549 2.76675 1.578C2.70373 1.63136 2.65303 1.69775 2.61813 1.7726C2.58324 1.84744 2.56498 1.92896 2.56462 2.01154L2.55391 4.41494L0.423346 5.62914C0.352067 5.66971 0.290359 5.72516 0.242418 5.79172C0.194476 5.85827 0.161424 5.93436 0.145509 6.01482C-0.0494796 6.99467 -0.0494796 8.00333 0.145509 8.98318C0.161424 9.06364 0.194476 9.13973 0.242418 9.20629C0.290359 9.27284 0.352067 9.32829 0.423346 9.36887L2.55391 10.5831L2.56248 12.985C2.56274 13.0677 2.58094 13.1494 2.61584 13.2244C2.65074 13.2993 2.7015 13.3658 2.76461 13.4193C3.53746 14.073 4.42745 14.574 5.38727 14.8956C5.46286 14.9212 5.54297 14.9307 5.62244 14.9234C5.7019 14.9161 5.77897 14.8923 5.84867 14.8535L7.99994 13.6486L10.1512 14.852C10.2364 14.8995 10.3323 14.9241 10.4298 14.9235C10.4922 14.9234 10.5542 14.9133 10.6133 14.8935C11.5723 14.57 12.4613 14.0675 13.2331 13.4129C13.2962 13.3595 13.3469 13.2931 13.3818 13.2183C13.4166 13.1434 13.4349 13.0619 13.4353 12.9793L13.446 10.5759L15.5765 9.36172C15.6478 9.32115 15.7095 9.26569 15.7575 9.19914C15.8054 9.13259 15.8385 9.0565 15.8544 8.97604C16.0483 7.99697 16.0476 6.98932 15.8522 6.01054ZM14.7809 8.50393L12.7403 9.66456C12.6509 9.7154 12.5769 9.78942 12.526 9.87883C12.4846 9.95025 12.4411 10.026 12.3968 10.0974C12.3401 10.1875 12.3099 10.2917 12.3096 10.3981L12.2989 12.7015C11.7504 13.1322 11.1394 13.4766 10.4869 13.7228L8.42848 12.5758C8.34303 12.5285 8.24688 12.5039 8.14922 12.5044H8.13565C8.04923 12.5044 7.96209 12.5044 7.87567 12.5044C7.77346 12.5019 7.67242 12.5265 7.58283 12.5758L5.52298 13.7257C4.86911 13.4814 4.25637 13.1386 3.70597 12.7093L3.69811 10.4095C3.69776 10.3029 3.66758 10.1985 3.61097 10.1081C3.56669 10.0367 3.52312 9.96525 3.48241 9.88954C3.43193 9.79876 3.35791 9.72326 3.26814 9.67099L1.22543 8.5075C1.11972 7.83884 1.11972 7.15773 1.22543 6.48907L3.26243 5.3263C3.35183 5.27546 3.42586 5.20144 3.4767 5.11203C3.51812 5.04061 3.56169 4.9649 3.60597 4.89347C3.66266 4.8034 3.69285 4.6992 3.69311 4.59278L3.70382 2.28938C4.25231 1.85865 4.86336 1.51423 5.51584 1.26802L7.5714 2.41508C7.66086 2.46467 7.76199 2.48934 7.86424 2.4865C7.95066 2.4865 8.0378 2.4865 8.12422 2.4865C8.22647 2.48934 8.3276 2.46467 8.41706 2.41508L10.4769 1.26516C11.1308 1.50948 11.7435 1.85222 12.2939 2.28152L12.3018 4.58135C12.3021 4.68798 12.3323 4.79239 12.3889 4.88276C12.4332 4.95418 12.4768 5.02561 12.5175 5.10132C12.568 5.1921 12.642 5.2676 12.7317 5.31987L14.7745 6.48336C14.8816 7.15253 14.8828 7.83438 14.778 8.50393H14.7809Z" fill="#999999" class="group-hover/menu-link:fill-white group-[.active]/menu-link:fill-white"/>
              <defs>
                  <linearGradient id="g_24" x1="2.18655" y1="3.46529" x2="8.18057" y2="12.9769" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#795DED"/>
                    <stop offset="0.0001" stop-color="#7D5DFE"/>
                    <stop offset="1" stop-color="#76D466"/>
                  </linearGradient>
              </defs>
          </svg>
      </span>
      <span class="group-data-[sidebar-size=sm]:hidden group-data-[sidebar-size=sm]:ml-6 group-data-[sidebar-size=sm]:group-hover/sm:block ml-3 shrink-0">
          Setting
      </span>
  </a>
</li>
</ul>
</div>
</div>
<!-- Logout Link -->
<div class="mt-auto px-7 py-6 group-data-[sidebar-size=sm]:px-2">
<a href="#" class="flex-center-between text-gray-500 dark:text-dark-text font-semibold leading-none bg-gray-200 dark:bg-[#090927] dark:group-data-[sidebar-size=sm]:bg-dark-card-shade rounded-[10px] px-6 py-4 group-data-[sidebar-size=sm]:p-[12px_8px] group-data-[sidebar-size=sm]:justify-center dk-theme-card-square">
<span class="group-data-[sidebar-size=sm]:hidden block">Logout</span>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
<path d="M6.66645 15.3328C6.66645 15.5096 6.59621 15.6792 6.47119 15.8042C6.34617 15.9292 6.17661 15.9995 5.9998 15.9995H1.33329C0.979679 15.9995 0.640552 15.859 0.390511 15.609C0.140471 15.3589 0 15.0198 0 14.6662V1.33329C0 0.979679 0.140471 0.640552 0.390511 0.390511C0.640552 0.140471 0.979679 0 1.33329 0H5.9998C6.17661 0 6.34617 0.0702357 6.47119 0.195256C6.59621 0.320276 6.66645 0.48984 6.66645 0.666645C6.66645 0.84345 6.59621 1.01301 6.47119 1.13803C6.34617 1.26305 6.17661 1.33329 5.9998 1.33329H1.33329V14.6662H5.9998C6.17661 14.6662 6.34617 14.7364 6.47119 14.8614C6.59621 14.9865 6.66645 15.156 6.66645 15.3328ZM15.8045 8.47139L12.4713 11.8046C12.378 11.898 12.2592 11.9615 12.1298 11.9873C12.0004 12.0131 11.8663 11.9999 11.7444 11.9494C11.6225 11.8989 11.5184 11.8133 11.4451 11.7036C11.3719 11.5939 11.3329 11.4649 11.333 11.333V8.66638H5.9998C5.823 8.66638 5.65343 8.59615 5.52841 8.47113C5.40339 8.34611 5.33316 8.17654 5.33316 7.99974C5.33316 7.82293 5.40339 7.65337 5.52841 7.52835C5.65343 7.40333 5.823 7.33309 5.9998 7.33309H11.333V4.66651C11.3329 4.53459 11.3719 4.4056 11.4451 4.29587C11.5184 4.18615 11.6225 4.10062 11.7444 4.05012C11.8663 3.99962 12.0004 3.98642 12.1298 4.01218C12.2592 4.03795 12.378 4.10152 12.4713 4.19486L15.8045 7.52809C15.8665 7.59 15.9156 7.66352 15.9492 7.74445C15.9827 7.82538 16 7.91213 16 7.99974C16 8.08735 15.9827 8.17409 15.9492 8.25502C15.9156 8.33595 15.8665 8.40948 15.8045 8.47139ZM14.3879 7.99974L12.6663 6.27563V9.72385L14.3879 7.99974Z" fill="currentColor"/>
</svg>
</a>
</div>
</div> 
<!-- End App Menu -->

<!-- Start App Settings Sidebar -->
<div id="app-setting-drawer" class="flex flex-col fixed z-modal transition-transform bg-white font-spline_sans dark:bg-dark-card-two right-0 h-screen translate-x-full duration-300 overflow-y-auto w-80 sm:w-96" tabindex="-1">
<button type="button" data-drawer-hide="app-setting-drawer" aria-controls="app-setting-drawer" class="size-8 flex-center hover:bg-gray-200 dark:hover:bg-dark-icon rounded-lg absolute top-2.5 right-2.5 dk-theme-card-square">
<i class="ri-close-line text-gray-500 dark:text-dark-text"></i>
</button>
<div class="p-6 py-3 border-b border-gray-200 dark:border-dark-border-four">
<h6 class="text-lg font-medium text-gray-500 dark:text-dark-text">Adjust Configurations</h6>
<p class="text-sm text-gray-500 dark:text-dark-text mt-1">
Transform your space to reflect your personality!
</p>
</div>
<!-- Customizatin Options -->
<div data-scrollbar class="p-6 pt-3 divide-y divide-input-border/50 dark:divide-dark-border-four space-y-10">
<!-- Theme Mode -->
<div class="mt-8 first:mt-0">
<h6 class="card-title text-base font-medium">Theme Mode</h6>
<div class="grid grid-cols-6 gap-4 mt-2">
<div class="col-span-2">
  <label class="text-xs text-gray-500 dark:text-dark-text-two font-medium mb-1.5 inline-block">Light</label>
  <label for="radioThemeLight" class="text-gray-500 dark:text-dark-text-two border border-gray-200 hover:border-input-border dark:border-dark-border dark:hover:border-dark-border-five has-[:checked]:border-none rounded-md flex-center py-2 select-none cursor-pointer ring-2 ring-transparent has-[:checked]:ring-primary-500 group-data-[card-style=square]:has-[:checked]:rounded-sm leading-none dk-theme-card-square">
      <i class="ri-sun-line text-inherit text-xl"></i>
      <input name="radioThemeMode" type="radio" id="radioThemeLight" hidden checked onchange="toggleThemeMode()">
  </label>
</div>
<div class="col-span-2">
  <label class="text-xs text-gray-500 dark:text-dark-text-two font-medium mb-1.5 inline-block">Dark</label>
  <label for="radioThemeDark" class="text-gray-500 dark:text-dark-text-two border border-gray-200 hover:border-input-border dark:border-dark-border dark:hover:border-dark-border-five has-[:checked]:border-none rounded-md flex-center py-2 select-none cursor-pointer ring-2 ring-transparent has-[:checked]:ring-primary-500 group-data-[card-style=square]:has-[:checked]:rounded-sm leading-none dk-theme-card-square">
      <i class="ri-moon-clear-line text-inherit text-xl"></i>
      <input name="radioThemeMode" type="radio" id="radioThemeDark" hidden onchange="toggleThemeMode()">
  </label>
</div>
</div>
</div>
<!-- Theme Card Style -->
<div class="mt-8 first:mt-0">
<h6 class="card-title text-base font-medium">Theme Card Style</h6>
<div class="grid grid-cols-6 gap-4 mt-2">
<div class="col-span-2">
  <label class="text-xs text-gray-500 dark:text-dark-text-two font-medium mb-1.5 inline-block">Round</label>
  <label for="radioThemeCardRound" class="text-gray-500 dark:text-dark-text-two border border-gray-200 hover:border-input-border dark:border-dark-border dark:hover:border-dark-border-five has-[:checked]:border-none rounded-md flex-center py-2 select-none cursor-pointer ring-2 ring-transparent has-[:checked]:ring-primary-500 group-data-[card-style=square]:has-[:checked]:rounded-sm leading-none dk-theme-card-square">
      <i class="ri-rounded-corner text-inherit text-xl"></i>
      <input name="radioThemeCardStyle" type="radio" id="radioThemeCardRound" hidden checked onchange="toggleCardStyle()">
  </label>
</div>
<div class="col-span-2">
  <label class="text-xs text-gray-500 dark:text-dark-text-two font-medium mb-1.5 inline-block">Square</label>
  <label for="radioThemeCardSquare" class="text-gray-500 dark:text-dark-text-two border border-gray-200 hover:border-input-border dark:border-dark-border dark:hover:border-dark-border-five has-[:checked]:border-none rounded-md flex-center py-2 select-none cursor-pointer ring-2 ring-transparent has-[:checked]:ring-primary-500 group-data-[card-style=square]:has-[:checked]:rounded-sm leading-none dk-theme-card-square">
      <i class="ri-square-line text-inherit text-xl"></i>
      <input name="radioThemeCardStyle" type="radio" id="radioThemeCardSquare" hidden onchange="toggleCardStyle()">
  </label>
</div>
</div>
</div>
<!-- Theme Width -->
<div class="mt-8 first:mt-0">
<h6 class="card-title text-base font-medium">Theme Layout Width</h6>
<div class="grid grid-cols-6 gap-4 mt-2">
<div class="col-span-2">
  <label class="text-xs text-gray-500 dark:text-dark-text-two font-medium mb-1.5 inline-block">Full Width</label>
  <label for="radioThemeWidthFluid" class="text-gray-500 dark:text-dark-text-two border border-gray-200 hover:border-input-border dark:border-dark-border dark:hover:border-dark-border-five has-[:checked]:border-none rounded-md flex-center py-2 select-none cursor-pointer ring-2 ring-transparent has-[:checked]:ring-primary-500 group-data-[card-style=square]:has-[:checked]:rounded-sm leading-none dk-theme-card-square">
      <i class="ri-fullscreen-fill text-inherit text-xl"></i>
      <input name="radioThemeWidth" type="radio" id="radioThemeWidthFluid" hidden checked onchange="settingThemeWidth()">
  </label>
</div>
<div class="col-span-2">
  <label class="text-xs text-gray-500 dark:text-dark-text-two font-medium mb-1.5 inline-block">Container</label>
  <label for="radioThemeWidthBox" class="text-gray-500 dark:text-dark-text-two border border-gray-200 hover:border-input-border dark:border-dark-border dark:hover:border-dark-border-five has-[:checked]:border-none rounded-md flex-center py-2 select-none cursor-pointer ring-2 ring-transparent has-[:checked]:ring-primary-500 group-data-[card-style=square]:has-[:checked]:rounded-sm leading-none dk-theme-card-square">
      <i class="ri-exchange-box-line text-inherit text-xl"></i>
      <input name="radioThemeWidth" type="radio" id="radioThemeWidthBox" hidden onchange="settingThemeWidth()">
  </label>
</div>
</div>
</div>
</div>
<!-- Reset All Customization -->
<div class="flex items-center justify-end p-3 bg-gray-200 dark:bg-dark-icon mt-auto">
<button type="reset" class="btn b-solid btn-danger-solid btn-sm" onclick="resetThemeConfig()">Reset</button>
</div>
</div>
<!-- End App Settings Sidebar -->

<!-- Start Main Content -->
<div class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
<div class="grid grid-cols-12 gap-x-4">
<!-- Start Account Setting Form -->
<div class="col-span-full sm:col-span-6 xl:col-span-8">
<div class="card p-0 overflow-hidden">
<div class="px-4 py-5 sm:p-7 bg-gray-200/30 dark:bg-dark-card-two">
  <h6 class="card-title">Account Settings</h6>
</div>
<div class="p-3 sm:p-7">
  <form action="#" method="post">
      <div class="grid grid-cols-2 gap-x-4 gap-y-5">
          <div class="col-span-full xl:col-auto leading-none">
              <label for="firstName" class="form-label">First Name</label>
              <input type="text" id="firstName" value="Jonathon" class="form-input">
          </div>
          <div class="col-span-full xl:col-auto leading-none">
              <label for="lastName" class="form-label">Last Name</label>
              <input type="text" id="lastName" value="Smith" class="form-input">
          </div>
          <div class="col-span-full xl:col-auto leading-none">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" id="email" value="debra.holt@example.com" class="form-input">
          </div>
          <div class="col-span-full xl:col-auto leading-none">
              <label for="poneNumber" class="form-label">Phone No</label>
              <input type="tel" id="poneNumber" value="(907) 555-0101" class="form-input">
          </div>
          <div class="col-span-full xl:col-auto leading-none">
              <label for="location" class="form-label">Location</label>
              <input type="text" id="location" value="1901 Thornridge" class="form-input">
          </div>
          <div class="col-span-full xl:col-auto leading-none">
              <label class="form-label">Country</label>
              <select class="singleSelect">
                  <option selected disabled>Select Country</option>
                  <option value="us">United States</option>
                  <option value="ca">Canada</option>
                  <option value="uk">United Kingdom</option>
                  <option value="au">Australia</option>
                  <option value="de">Germany</option>
                  <option value="jp">Japan</option>
                  <option value="fr">France</option>
              </select>
          </div>
          <div class="col-span-full">
              <textarea class="summernote"></textarea> 
          </div>
      </div>
      <div class="flex gap-3 mt-5">
          <button type="submit" class="btn b-solid btn-primary-solid dk-theme-card-square">
              <i class="ri-checkbox-circle-line text-inherit hidden sm:block"></i>
              <span>Save Changes</span>
          </button>
          <button type="reset" class="btn b-light btn-danger-light dk-theme-card-square" data-modal-target="cancelAcSettingModal" data-modal-toggle="cancelAcSettingModal">
              <i class="ri-delete-bin-line text-inherit hidden sm:block"></i>
              <span>Cancel</span>
          </button>
      </div>
  </form>        
</div>
</div>
</div>
<!-- End Account Setting Form -->

<!-- Start Student Profile View -->
<div class="col-span-full sm:col-span-6 xl:col-span-4 card p-0">
<div class="bg-white dark:bg-dark-card rounded-15 overflow-hidden dk-theme-card-square">
<div class="relative w-full h-[150px]">
  <img src="assets/images/profile/cover.png" alt="cover-image" class="w-full h-full">
  <label for="thumbnailsrc" class="file-container bg-[url('../../assets/images/profile/profile.html')] bg-no-repeat bg-cover absolute left-1/2 -translate-x-1/2 -bottom-[calc(theme('spacing.ins-pro-img')_/_2)] w-[calc(theme('spacing.ins-pro-img')_+_5px)] h-[theme('spacing.ins-pro-img')] border-2 border-white dark:border-dark-border-two rounded-20 dk-theme-card-square">
      <input type="file" id="thumbnailsrc" hidden="" class="img-src peer/file">
      <span class="absolute bottom-0 right-0 border-2 border-white dark:border-dark-border-two rounded-full dk-theme-card-square">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
              <rect width="20" height="20" rx="10" fill="#F2ECFE"></rect>
              <path d="M14.6154 6.38462H13.0162L12.2298 5.20538C12.1877 5.14224 12.1306 5.09046 12.0637 5.05464C11.9968 5.01881 11.9221 5.00005 11.8462 5H8.15385C8.07794 5.00005 8.00322 5.01881 7.93629 5.05464C7.86937 5.09046 7.81232 5.14224 7.77019 5.20538L6.98327 6.38462H5.38462C5.01739 6.38462 4.66521 6.53049 4.40554 6.79016C4.14588 7.04983 4 7.40201 4 7.76923V14.2308C4 14.598 4.14588 14.9502 4.40554 15.2098C4.66521 15.4695 5.01739 15.6154 5.38462 15.6154H14.6154C14.9826 15.6154 15.3348 15.4695 15.5945 15.2098C15.8541 14.9502 16 14.598 16 14.2308V7.76923C16 7.40201 15.8541 7.04983 15.5945 6.79016C15.3348 6.53049 14.9826 6.38462 14.6154 6.38462ZM15.0769 14.2308C15.0769 14.3532 15.0283 14.4706 14.9417 14.5571C14.8552 14.6437 14.7378 14.6923 14.6154 14.6923H5.38462C5.26221 14.6923 5.14481 14.6437 5.05826 14.5571C4.9717 14.4706 4.92308 14.3532 4.92308 14.2308V7.76923C4.92308 7.64682 4.9717 7.52943 5.05826 7.44287C5.14481 7.35632 5.26221 7.30769 5.38462 7.30769H7.23077C7.30677 7.30774 7.38161 7.28902 7.44864 7.25319C7.51567 7.21736 7.57282 7.16553 7.615 7.10231L8.40077 5.92308H11.5987L12.385 7.10231C12.4272 7.16553 12.4843 7.21736 12.5514 7.25319C12.6184 7.28902 12.6932 7.30774 12.7692 7.30769H14.6154C14.7378 7.30769 14.8552 7.35632 14.9417 7.44287C15.0283 7.52943 15.0769 7.64682 15.0769 7.76923V14.2308ZM10 8.23077C9.49794 8.23077 9.00715 8.37965 8.58971 8.65858C8.17226 8.93751 7.8469 9.33396 7.65477 9.7978C7.46264 10.2616 7.41237 10.772 7.51031 11.2645C7.60826 11.7569 7.85003 12.2092 8.20504 12.5642C8.56005 12.9192 9.01236 13.161 9.50477 13.2589C9.99718 13.3569 10.5076 13.3066 10.9714 13.1145C11.4353 12.9223 11.8317 12.597 12.1107 12.1795C12.3896 11.7621 12.5385 11.2713 12.5385 10.7692C12.5377 10.0962 12.27 9.451 11.7941 8.97511C11.3182 8.49922 10.673 8.23153 10 8.23077ZM10 12.3846C9.68051 12.3846 9.36819 12.2899 9.10254 12.1124C8.83689 11.9349 8.62984 11.6826 8.50758 11.3874C8.38531 11.0922 8.35332 10.7674 8.41565 10.4541C8.47798 10.1407 8.63184 9.8529 8.85775 9.62698C9.08367 9.40107 9.3715 9.24721 9.68485 9.18488C9.99821 9.12255 10.323 9.15454 10.6182 9.27681C10.9134 9.39907 11.1656 9.60612 11.3431 9.87177C11.5206 10.1374 11.6154 10.4497 11.6154 10.7692C11.6154 11.1977 11.4452 11.6085 11.1422 11.9115C10.8393 12.2144 10.4284 12.3846 10 12.3846Z" fill="#795DED"></path>
          </svg>
      </span>
  </label>
</div>
<div class="mt-7 px-6 text-center">
  <div class="py-5">
      <div class="flex-center">
          <h4 class="text-[22px] leading-none text-heading font-semibold relative">
              Jonathon Smith
              <img src="assets/images/icons/verified-icon-green.svg" alt="verified-icon" class="absolute -top-1.5 -right-3.5 hidden [&.verified]:block unverified">
          </h4>
      </div>
      <p class="font-spline_sans leading-[1.62] text-heading dark:text-dark-text mt-2.5">Don’t Care Everybody's Word🔥</p>
      <p class="font-spline_sans text-sm leading-[1.62] text-gray-500 dark:text-dark-text mt-1">UI/IX - Student at Academine👨🏻‍🎓</p>
  </div>
  <div class="py-5 border-t border-gray-200 dark:border-dark-border text-left">
      <div class="flex-center-between">
          <h6 class="text-gray-500 dark:text-dark-text leading-none font-semibold">Skill</h6>
          <button class="size-7 hover:bg-gray-200 dark:hover:bg-dark-icon rounded-md" data-modal-target="addBioModal" data-modal-toggle="addBioModal">
              <i class="ri-edit-2-line"></i>
          </button>
      </div>
      <ul class="flex items-center flex-wrap gap-2.5 *:rounded-full *:px-2.5 *:py-1.5 mt-4">
          <li class="badge badge-primary-light">UI Design</li>
          <li class="badge badge-primary-light">Research</li>
          <li class="badge badge-primary-light">Figma</li>
          <li class="badge badge-primary-light">Creative Idea</li>
          <li class="badge badge-primary-light">Animation</li>
      </ul>
  </div>
  <div class="py-5 border-t border-gray-200 dark:border-dark-border text-left">
      <div class="flex-center-between">
          <h6 class="text-gray-500 dark:text-dark-text leading-none font-semibold">About</h6>
          <button class="size-7 hover:bg-gray-200 dark:hover:bg-dark-icon rounded-md" data-modal-target="addBioModal" data-modal-toggle="addBioModal">
              <i class="ri-edit-2-line"></i>
          </button>
      </div>
      <ul class="flex flex-col gap-y-3 *:flex *:gap-x-2.5 *:leading-none *:text-gray-500 dark:*:text-dark-text *:font-medium mt-4">
          <li>
              <i class="ri-home-2-line text-inherit"></i>
              <div>Lives in <span class="text-heading dark:text-dark-text">1901 Thornridge</span></div>
          </li>
          <li>
              <i class="ri-briefcase-line text-inherit"></i>
              <div>Works at <span class="text-heading dark:text-dark-text">ebay</span></div>
          </li>
      </ul>
  </div>
  <div class="py-5 border-t border-gray-200 dark:border-dark-border text-left">
      <div class="flex-center-between">
          <h6 class="text-gray-500 dark:text-dark-text leading-none font-semibold">Social</h6>
          <button class="size-7 hover:bg-gray-200 dark:hover:bg-dark-icon rounded-md" data-modal-target="addBioModal" data-modal-toggle="addBioModal">
              <i class="ri-edit-2-line"></i>
          </button>
      </div>
      <ul class="flex flex-col gap-y-3 *:flex *:items-center *:gap-x-2.5 *:leading-none *:text-gray-500 dark:*:text-dark-text *:font-medium mt-4">
          <li>
              <i class="ri-global-line text-inherit"></i>
              <a href="#" class="hover:text-heading dark:hover:text-dark-text-two">Website.com</a>
          </li>
          <li>
              <i class="ri-twitter-x-line text-inherit"></i>
              <a href="#" class="hover:text-heading dark:hover:text-dark-text-two">Twitter</a>
          </li>
          <li>
              <i class="ri-facebook-circle-line text-inherit"></i>
              <a href="#" class="hover:text-heading dark:hover:text-dark-text-two">Facebook</a>
          </li>
          <li>
              <i class="ri-instagram-line text-inherit"></i>
              <a href="#" class="hover:text-heading dark:hover:text-dark-text-two">Instagram</a>
          </li>
          <li>
              <i class="ri-linkedin-box-line text-inherit"></i>
              <a href="#" class="hover:text-heading dark:hover:text-dark-text-two">LinkedIn</a>
          </li>
      </ul>
  </div>
</div>
</div>
</div>
<!-- End Student Profile View -->
</div>
</div>
<!-- End Main Content -->

<!-- Start Add Bio Modal -->
<div id="addBioModal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-modal w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
<div class="p-4 w-full max-w-md max-h-full">
<div class="relative bg-white dark:bg-dark-card-shade rounded-lg shadow">
<button type="button" data-modal-hide="addBioModal" class="absolute top-3 end-2.5 hover:bg-gray-200 dark:hover:bg-dark-icon rounded-lg size-8 flex-center">
<i class="ri-close-line text-gray-500 dark:text-dark-text text-xl leading-none"></i>
</button>
<div class="p-4 md:p-5 text-center">
<h2 class="py-20 text-center">Add Bio...</h2>
</div>
</div>
</div>
</div>
<!-- End Add Bio Modal -->

<!-- Start Cancel Account Settng Modal -->
<div id="cancelAcSettingModal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-modal w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
<div class="p-4 w-full max-w-md max-h-full">
<div class="relative bg-white dark:bg-dark-card-shade rounded-lg shadow">
<button type="button" data-modal-hide="cancelAcSettingModal" class="absolute top-3 end-2.5 hover:bg-gray-200 dark:hover:bg-dark-icon rounded-lg size-8 flex-center">
<i class="ri-close-line text-gray-500 dark:text-dark-text text-xl leading-none"></i>
</button>
<div class="p-4 md:p-5 text-center">
<svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
</svg>
<h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-dark-text">
  Are you sure you want to cancel this Changes?
</h3>
<button data-modal-hide="cancelAcSettingModal" type="button" class="btn danger-btn-fill btn-sm hover:bg-red-600 inline-flex">
  Yes, I'm sure
</button>
</div>
</div>
</div>
</div>
<!-- End Cancel Account Settng Modal -->

<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/vendor/jquery.min.js"></script>
<script src="assets/js/vendor/apexcharts.min.js"></script>
<script src="assets/js/vendor/flowbite.min.js"></script>
<script src="assets/js/vendor/summernote.min.js"></script>
<script src="assets/js/vendor/select/select2.min.js"></script>
<script src="assets/js/vendor/smooth-scrollbar/smooth-scrollbar.min.js"></script>
<script src="assets/js/component/app-menu-bar.js"></script>
<script src="assets/js/switcher.js"></script>
<script src="assets/js/layout.js"></script>
<script src="assets/js/main.js"></script>

@endsection