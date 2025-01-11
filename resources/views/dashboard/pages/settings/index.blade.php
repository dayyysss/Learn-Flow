@extends('dashboard.layouts.layouts')
@section('page_title', 'LearnFlow | Settings')

@section('content')
    <!-- dashboard content -->
    <div class="lg:col-start-4 lg:col-span-9">
        <!-- setting area -->
        <div
            class="p-10px md:px-10 md:py-50px mb-30px bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5">
            <!-- heading -->
            <div class="mb-6 pb-5 border-b-2 border-borderColor dark:border-borderColor-dark">
                <h2 class="text-2xl font-bold text-blackColor dark:text-blackColor-dark">
                    Profil Saya
                </h2>
            </div>
            <div class="tab">
                <div class="tab-links flex flex-wrap mb-10px lg:mb-50px rounded gap-10px">
                    <button
                        class="is-checked relative py-10px px-5 md:py-15px lg:px-10 font-bold uppercase text-sm lg:text-base text-blackColor bg-whiteColor shadow-overview-button dark:bg-whiteColor-dark dark:text-blackColor-dark before:w-0 before:h-0.5 before:absolute before:-bottom-0.5 lg:before:bottom-0 before:left-0 before:bg-primaryColor hover:before:w-full before:transition-all before:duration-300 whitespace-nowrap active">
                        PROFILE
                    </button>

                    <button
                        class="is-checked relative py-10px px-5 md:py-15px lg:px-10 font-bold uppercase text-sm lg:text-base text-blackColor bg-whiteColor shadow-overview-button dark:bg-whiteColor-dark dark:text-blackColor-dark before:w-0 before:h-0.5 before:absolute before:-bottom-0.5 lg:before:bottom-0 before:left-0 before:bg-primaryColor hover:before:w-full before:transition-all before:duration-300 whitespace-nowrap">
                        PASSWORD
                    </button>

                    <button
                        class="is-checked relative py-10px px-5 md:py-15px lg:px-10 font-bold uppercase text-sm lg:text-base text-blackColor bg-whiteColor shadow-overview-button dark:bg-whiteColor-dark dark:text-blackColor-dark before:w-0 before:h-0.5 before:absolute before:-bottom-0.5 lg:before:bottom-0 before:left-0 before:bg-primaryColor hover:before:w-full before:transition-all before:duration-300 whitespace-nowrap">
                        SOCIAL ICON
                    </button>
                </div>
                <div class="tab-contents">
                    <div class="transition-all duration-300">
                        <form class="text-sm text-blackColor dark:text-blackColor-dark leading-1.8" data-aos="fade-up" action="{{ route('updateProfile') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <!-- Konten form yang ada -->
                            <div class="grid grid-cols-1 xl:grid-cols-2 mb-15px gap-y-15px gap-x-30px">
                                <div>
                                    <label class="mb-3 block font-semibold">Nama Depan</label>
                                    <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $user->first_name) }}"
                                        class="w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md font-no">
                                </div>
                                <div>
                                    <label class="mb-3 block font-semibold">Nama Belakang</label>
                                    <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}"
                                        class="w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md font-no">
                                </div>
                                <div>
                                    <label class="mb-3 block font-semibold">Nama Pengguna</label>
                                    <input type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="Ntaden Mic"
                                        class="w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md font-no">
                                </div>
                                <div>
                                    <label class="mb-3 block font-semibold">Nomor Handphone</label>
                                    <input type="text" name="no_telp" value="{{ old('no_telp', $user->no_telp) }}" placeholder="+62-812-555-0174"
                                        class="w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md font-no">
                                </div>
                                <div>
                                    <label class="mb-3 block font-semibold">Keahlian / Profesi</label>
                                    <input type="text" name="profesi" value="{{ old('profesi', $user->profesi) }}" placeholder="Full Stack Developer"
                                        class="w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md font-no">
                                </div>
                                <div>
                                    <label class="mb-3 block font-semibold">Display Name Publicly As
                                    </label>
                                    <input type="text" name="publik_name" value="{{ old('publik_name', $user->publik_name) }}" placeholder="John"
                                        class="w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md font-no">
                                </div>
                            </div>
                            <div class="mb-15px">
                                <label class="mb-3 block font-semibold">Bio</label>
                                <textarea name="bio"
                                    class="w-full py-10px px-5 text-sm text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md"
                                    cols="30" rows="10">{{ old('bio', $user->bio) }}</textarea>

                            </div>

                            <div class="mt-15px">
                                <button type="submit"
                                    class="text-size-15 text-whiteColor bg-primaryColor px-25px py-10px border border-primaryColor hover:text-primaryColor hover:bg-whiteColor inline-block rounded group dark:hover:text-whiteColor dark:hover:bg-whiteColor-dark">
                                    Update Info
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="hidden transition-all duration-300">
                        <form action="{{ route('settings.update-password') }}" method="POST" class="text-sm text-blackColor dark:text-blackColor-dark leading-1.8" data-aos="fade-up">
                            @csrf
                            <div class="grid grid-cols-1 mb-15px gap-y-15px gap-x-30px">
                                <div>
                                    <label class="mb-3 block font-semibold">Current Password</label>
                                    <input type="password" name="current_password" placeholder="Current password"
                                        class="w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md font-no" required>
                                </div>
                        
                                <div>
                                    <label class="mb-3 block font-semibold">New Password</label>
                                    <input type="password" name="password" placeholder="New Password"
                                        class="w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md font-no" required>
                                </div>
                        
                                <div>
                                    <label class="mb-3 block font-semibold">Re-Type New Password</label>
                                    <input type="password" name="password_confirmation" placeholder="Re-Type New Password"
                                        class="w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md font-no" required>
                                </div>
                            </div>
                        
                            <div class="mt-15px">
                                <button type="submit"
                                    class="text-size-15 text-whiteColor bg-primaryColor px-25px py-10px border border-primaryColor hover:text-primaryColor hover:bg-whiteColor inline-block rounded group dark:hover:text-whiteColor dark:hover:bg-whiteColor-dark">
                                    Update Password
                                </button>
                            </div>
                        </form>
                        
                    </div>

                    <div class="hidden transition-all duration-300">
                        <form action="{{ route('user.update.social_media') }}" method="POST" class="text-sm text-blackColor dark:text-blackColor-dark leading-1.8">
                            @csrf

                            <div class="grid grid-cols-1 mb-15px gap-y-15px gap-x-30px">
                                <div>
                                    <label class="mb-3 block font-semibold">Facebook</label>
                                    <input type="text" name="facebook" placeholder="https://facebook.com/"
                                           class="w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md font-no"
                                           value="{{ old('facebook', json_decode($user->sosial_media)->facebook ?? '') }}">
                                </div>
                                <div>
                                    <label class="mb-3 block font-semibold">Twitter</label>
                                    <input type="text" name="twitter" placeholder="https://twitter.com/"
                                           class="w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md font-no"
                                           value="{{ old('twitter', json_decode($user->sosial_media)->twitter ?? '') }}">
                                </div>
                                <div>
                                    <label class="mb-3 block font-semibold">Linkedin</label>
                                    <input type="text" name="linkedin" placeholder="https://linkedin.com/"
                                           class="w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md font-no"
                                           value="{{ old('linkedin', json_decode($user->sosial_media)->linkedin ?? '') }}">
                                </div>
                                <div>
                                    <label class="mb-3 block font-semibold">Website</label>
                                    <input type="text" name="website" placeholder="https://website.com/"
                                           class="w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md font-no"
                                           value="{{ old('website', json_decode($user->sosial_media)->website ?? '') }}">
                                </div>
                                <div>
                                    <label class="mb-3 block font-semibold">Github</label>
                                    <input type="text" name="github" placeholder="https://github.com/"
                                           class="w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md font-no"
                                           value="{{ old('github', json_decode($user->sosial_media)->github ?? '') }}">
                                </div>
                            </div>
                        
                            <div class="mt-15px">
                                <button type="submit"
                                        class="text-size-15 text-whiteColor bg-primaryColor px-25px py-10px border border-primaryColor hover:text-primaryColor hover:bg-whiteColor inline-block rounded group dark:hover:text-whiteColor dark:hover:bg-whiteColor-dark">
                                    Update Social
                                </button>
                            </div>
                        </form>
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('form').addEventListener('submit', async function (e) {
    e.preventDefault();
    
    const form = e.target;
    const formData = new FormData(form);

    try {
        const response = await fetch(form.action, {
            method: form.method,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            },
            body: formData
        });

        const result = await response.json();

        if (response.ok) {
            alert(result.message); // Tampilkan pesan sukses
            if (result.redirect_url) {
                window.location.href = result.redirect_url;
            }
        } else {
            alert(result.message); // Tampilkan pesan error
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat mengirim data.');
    }
});

    </script>
@endsection
