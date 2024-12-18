@extends('lfcms.layouts.app')
@section('page_title', 'Create Client | Learn Flow CMS')
@section('content')
<div class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
    <div class="grid grid-cols-12">
        <div class="col-span-full">
            <div class="card p-0">
                <div class="flex-center-between p-6 pb-4 border-b border-gray-200 dark:border-dark-border">
                    <h3 class="text-lg card-title leading-none">Create New Client</h3>
                </div>
                <form action="{{ route('klien.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
                    @csrf
                    <div class="grid lg:grid-cols-3 gap-x-6 gap-y-4">
                        <!-- Section 1: Client Information -->
                        <div class="lg:col-span-2">
                            <h4 class="text-md font-semibold mb-4">Client Information</h4>
                            <div class="mb-4">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" name="name"
                                    class="form-input @error('name') border-red-500 @enderror" placeholder="Enter client name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="job_title" class="form-label">Job Title</label>
                                <input type="text" id="job_title" name="job_title"
                                    class="form-input @error('job_title') border-red-500 @enderror" placeholder="Enter job title"
                                    value="{{ old('job_title') }}">
                                @error('job_title')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="image" class="form-label">Client Image</label>
                                <input type="file" id="image" name="image"
                                    class="form-input @error('image') border-red-500 @enderror">
                                @error('image')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="url" class="form-label">Client URL</label>
                                <input type="text" id="url" name="url"
                                    class="form-input @error('url') border-red-500 @enderror" placeholder="Enter client URL"
                                    value="{{ old('url') }}">
                                @error('url')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Section 2: Status Configuration -->
                        <div class="bg-white p-4 rounded-lg shadow">
                            <h4 class="text-md font-semibold mb-4">Status</h4>
                            <div class="mb-4">
                                <label for="status" class="form-label">Status</label>
                                <div class="flex gap-4">
                                    <div class="flex items-center">
                                        <input type="radio" id="draft" name="status" value="draft"
                                            class="form-radio @error('status') border-red-500 @enderror"
                                            {{ old('status') == 'draft' ? 'checked' : '' }}>
                                        <label for="draft" class="ml-2 text-sm">Draft</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="radio" id="publik" name="status" value="publik"
                                            class="form-radio @error('status') border-red-500 @enderror"
                                            {{ old('status') == 'publik' ? 'checked' : '' }}>
                                        <label for="publik" class="ml-2 text-sm">Publik</label>
                                    </div>
                                </div>
                                @error('status')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex justify-between mt-6">
                        <a href="{{ route('klien.index') }}" class="btn btn-secondary-solid px-5 dk-theme-card-square">Kembali</a>
                        <button type="submit" class="btn btn-primary-solid px-5 dk-theme-card-square">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
