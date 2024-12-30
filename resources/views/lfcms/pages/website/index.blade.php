@extends('lfcms.layouts.app')
@section('page_title', 'Data Pengguna | Learn Flow CMS')
@section('content')


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