@extends('lfcms.layouts.app')
@section('page_title', 'Tambah Klien | Learn Flow CMS')
@section('content')
<div class="relative bg-white dark:bg-dark-card rounded-lg shadow">
    <button type="button" class="flex-center absolute top-3 end-2.5 hover:bg-gray-200 dark:hover:bg-dark-icon rounded-lg size-8 close-button">
        <i class="ri-close-line text-gray-500 dark:text-dark-text text-xl"></i>
    </button>
    <div class="p-4 md:py-5 flex-center items-start flex-col">
        <h3 class="card-title text-xl mt-3">Delete Account</h3>
        <p class="text-gray-500 dark:text-dark-text font-medium mt-1.5">
            You’re going to delete the account. Are you sure?
        </p>
        <div class="flex-center gap-3 mt-5">
            <button type="button" class="btn b-solid btn-danger-solid">Yes, Delete!</button>
            <button type="button" class="btn b-solid btn-primary-solid dk-theme-card-square">No, Keep It.</button>
        </div>
    </div>
</div>
@endsection