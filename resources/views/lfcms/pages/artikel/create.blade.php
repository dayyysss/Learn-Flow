@extends('lfcms.layouts.app')
@section('page_title', 'Learn Flow CMS | Create Artikel')
@section('content')
<div class="col-span-full">
    <div class="card p-0">
        <div class="flex-center-between p-6 pb-4 border-b border-gray-200 dark:border-dark-border">
            <h3 class="text-lg card-title leading-none">Data From</h3>
            <button type="button"
                class="btn b-light btn-primary-light btn-sm prism-toggle !py-2.5 focus:bg-primary-500 focus:text-white dark:!bg-dark-icon">
                <span class="shrink-0">View Code</span>
                <i class="ri-code-line text-inherit text-[15px]"></i>
            </button>
        </div>
        <form action="#" class="p-6">
            <div class="flex lg:flex-row flex-col gap-x-4">
                <div class="w-full mb-4">
                    <label for="full_name_data"
                        class="form-label">Full
                        Name</label>
                    <input type="text" id="full_name_data" class="form-input" placeholder="Savannah Nguyen"
                        autocomplete="off" required >
                </div>
                <div class="w-full mb-4">
                    <label for="email-6"
                        class="form-label">Email</label>
                    <input type="email" id="email-6" class="form-input"
                        placeholder="martinahernandezc@gmail.com" autocomplete="off" required >
                </div>
                <div class="w-full mb-4">
                    <label for="password-6"
                        class="form-label">Password</label>
                    <input type="password" id="password-6" class="form-input" placeholder="**********"
                        autocomplete="off" required >
                </div>
            </div>
            <div class="flex lg:flex-row flex-col gap-x-4 mb-2">
                <div class="w-full mb-4">
                    <label for="location"
                        class="form-label">Location</label>
                    <input type="text" id="location" class="form-input" >
                </div>
                <div class="w-full mb-4">
                    <label for="phone"
                        class="form-label">Phone</label>
                    <input type="tel" id="phone" class="form-input" placeholder="(+33)7 55 55 33 70"
                        autocomplete="off" required >
                </div>
                <div class="w-full mb-4">
                    <label for="state"
                        class="form-label">State</label>
                    <input type="text" id="state" class="form-input" placeholder="8080 Railroad St."
                        autocomplete="off" required >
                </div>
            </div>
            <div class="mb-6">
                <textarea class="summernote"></textarea>
            </div>
            <div class="flex items-center gap-2 select-none mb-6">
                <input type="checkbox" checked
                    class="check check-primary-solid size-4 before:text-sm before:leading-none">
                <label class="leading-none font-medium text-gray-500 dark:text-dark-text text-sm">Check
                    Out</label>
            </div>
            <button type="submit"
                class="btn b-solid btn-primary-solid px-5 dk-theme-card-square">Save & Continue</button>
        </form>
    </div>
</div>
@endsection