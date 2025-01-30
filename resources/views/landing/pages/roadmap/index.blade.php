@extends('landing.layouts.landing-layouts')
@section('page_title', 'Roadmap | Learn Flow')
@section('content')

    @include('landing.components.breadcrumb', ['title' => 'Roadmap'])
    <div class="container">
        <!-- Categories Section -->
        <h2>Kategori Kursus</h2>
        <div class="categories">
            @php
                $categoryIcons = [
                    'Web Development' => '💻',
                    'Mobile Development' => '📱',
                    'Data Science' => '📊',
                    'UI/UX Design' => '🎨',
                    'Business' => '💼',
                    'Marketing' => '📈',
                    'Default' => '📚',
                ];
            @endphp

            @foreach ($categories as $category)
                @php
                    $icon = $categoryIcons[$category->name] ?? $categoryIcons['Default'];
                @endphp
                <div class="category-card" data-category-id="{{ $category->id }}">
                    <div class="category-icon">{{ $icon }}</div>
                    <h3>{{ $category->name }}</h3>
                    <p>{{ $category->courses_count }} Kursus</p>
                </div>
            @endforeach
        </div>

        <!-- Roadmap Section -->
        <div class="roadmap">
            <h2>Learning Roadmap - Web Development</h2>
            <div class="roadmap-steps">
                <div class="step active">
                    <div class="step-circle">1</div>
                    <h4>Basic</h4>
                    <p>HTML, CSS, JS Dasar</p>
                </div>
                <div class="step">
                    <div class="step-circle">2</div>
                    <h4>Intermediate</h4>
                    <p>Framework & Database</p>
                </div>
                <div class="step">
                    <div class="step-circle">3</div>
                    <h4>Advanced</h4>
                    <p>Backend & API</p>
                </div>
                <div class="step">
                    <div class="step-circle">4</div>
                    <h4>Expert</h4>
                    <p>System Architecture</p>
                </div>
            </div>
        </div>

        <!-- Courses Section -->
     
        <div class="courses grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-30px">
            @if ($course->count())
                @foreach ($course as $item)
                    <div class="group">
                        <div class="tab-content-wrapper" data-aos="fade-up">
                            <div
                                class="p-15px bg-whiteColor shadow-brand dark:bg-darkdeep3-dark dark:shadow-brand-dark course-card">
                                <!-- card image -->
                                <div class="relative mb-4">
                                    <a href="{{ route('course.detail', $item->slug) }}"
                                        class="w-full overflow-hidden rounded">
                                        <img src="{{ asset('storage/' . $item->thumbnail) }}" alt=""
                                            class="w-full transition-all duration-300 group-hover:scale-110"
                                            style="height: 150px">
                                    </a>
                                    <div class="absolute left-0 top-1 flex justify-between w-full items-center px-2">
                                        <div>
                                            @php
                                                $backgrounds = [
                                                    'bg-secondaryColor',
                                                    'bg-blue',
                                                    'bg-secondaryColor2',
                                                    'bg-greencolor2',
                                                    'bg-orange',
                                                    'bg-yellow',
                                                ];
                                                $bgClass = $backgrounds[array_rand($backgrounds)];
                                            @endphp
                                            <p
                                                class="text-xs text-whiteColor px-4 py-[3px] {{ $bgClass }} rounded font-semibold">
                                                {{ $item->categories->name ?? 'No Category' }}
                                            </p>
                                        </div>
                                        <a class="text-white bg-black bg-opacity-15 rounded hover:bg-primaryColor add-to-wishlist"
                                            href="" data-id="{{ $item->id }}">
                                            <i class="icofont-heart-alt text-base py-1 px-2"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- card content -->
                                <div class="course-card-content">
                                    <div class="grid grid-cols-2 mb-15px">
                                        <div class="flex items-center">
                                            <div>
                                                <i class="icofont-book-alt pr-5px text-primaryColor text-lg"></i>
                                            </div>
                                            <div>
                                                <span
                                                    class="text-sm text-black dark:text-blackColor-dark">{{ $item->babs->sum(function ($bab) {
                                                        return $bab->moduls->count();
                                                    }) }}
                                                    Modul</span>
                                            </div>
                                        </div>
                                        <div class="flex items-center">
                                            <div>
                                                <i class="icofont-clock-time pr-5px text-primaryColor text-lg"></i>
                                            </div>
                                            <div>
                                                <span
                                                    class="text-sm text-black dark:text-blackColor-dark">{{ $item->tanggal_mulai }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('course.detail', $item->slug) }}"
                                        class="text-lg font-semibold text-blackColor mb-10px font-hind dark:text-blackColor-dark hover:text-primaryColor dark:hover:text-primaryColor">
                                        {{ Str::limit($item->name, 70, '...') }}
                                    </a>
                                </div>
                                <!-- price -->
                                <div class="text-lg font-semibold text-primaryColor font-inter mb-4 course-card-footer">
                                    @if ($item->harga_diskon)
                                        Rp
                                        {{ number_format($item->harga - $item->harga_diskon, 2, ',', '.') }}
                                        <del class="text-sm text-lightGrey4 font-semibold">/ Rp
                                            {{ number_format($item->harga, 2, ',', '.') }}</del>
                                    @else
                                        Rp {{ number_format($item->harga, 2, ',', '.') }}
                                    @endif
                                    <span class="ml-6">
                                        @if ($item->harga - $item->harga_diskon > 0)
                                            <del class="text-base font-semibold text-deepred">Free</del>
                                        @else
                                            <span class="text-base font-semibold text-greencolor">Free</span>
                                        @endif
                                    </span>
                                </div>
                                <!-- instructor -->
                                <div
                                    class="course-card-instructor flex justify-between border-t pt-15px border-borderColor">
                                    <div>
                                        <a href="instructor-details.html"
                                            class="text-base font-bold font-hind flex items-center hover:text-primaryColor dark:text-blackColor-dark dark:hover:text-primaryColor">
                                            <img class="w-[30px] h-[30px] rounded-full mr-5px"
                                                src="{{ $item->instrukturs->image ? Storage::url($item->instrukturs->image) : asset('assets/images/grid/grid_small_1.jpg') }}"
                                                alt="{{ $item->instrukturs->name }}">
                                            <span class="flex capitalize">{{ $item->instrukturs->name }}</span>
                                        </a>
                                    </div>
                                    <div class="instructor-rating text-xs">
                                        <!-- Menampilkan rating instruktur -->
                                        @php
                                            $instructorRating = $item->instrukturs->average_rating ?? 0; // Pastikan data rating tersedia
                                        @endphp
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i
                                                class="icofont-star {{ $i <= $instructorRating ? 'text-yellow' : 'text-gray' }}"></i>
                                        @endfor
                                        <div>({{ $item->instrukturs->total_feedbacks ?? 0 }} reviews)</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <!-- Pesan jika tidak ada kursus ditemukan -->
                <div
                    class="coll-span-full text-center py-10 bg-lightGrey dark:bg-darkdeep3-dark text-xl font-semibold text-primaryColor">
                    Kursus tidak ditemukan untuk pencarian ini.
                </div>
            @endif
        </div>
    </div>
@endsection

<style>
    :root {
        --primary-color: #3498db;
        --secondary-color: #2c3e50;
        --light-bg: #f8f9fa;
        --shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        font-family: 'Arial', sans-serif;
    }

    /* Category Cards Styling */
    .categories {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 40px;
    }

    .category-card {
        background: white;
        border-radius: 10px;
        padding: 20px;
        box-shadow: var(--shadow);
        cursor: pointer;
        transition: transform 0.3s;
    }

    .category-card:hover {
        transform: translateY(-5px);
    }

    .category-card.active {
        border: 2px solid var(--primary-color);
    }

    .category-icon {
        font-size: 2rem;
        color: var(--primary-color);
        margin-bottom: 10px;
    }

    /* Roadmap Styling */
    .roadmap {
        margin: 40px 0;
        padding: 20px;
        background: white;
        border-radius: 10px;
        box-shadow: var(--shadow);
    }

    .roadmap-steps {
        display: flex;
        justify-content: space-between;
        position: relative;
        margin-top: 30px;
    }

    .roadmap-steps::before {
        content: '';
        position: absolute;
        top: 30px;
        left: 0;
        right: 0;
        height: 2px;
        background: #e0e0e0;
        z-index: 1;
    }

    .step {
        position: relative;
        z-index: 2;
        text-align: center;
        flex: 1;
    }

    .step-circle {
        width: 60px;
        height: 60px;
        background: white;
        border: 2px solid var(--primary-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 10px;
        font-weight: bold;
        color: var(--primary-color);
    }

    .step.active .step-circle {
        background: var(--primary-color);
        color: white;
    }

    /* Course Cards Styling */
    .courses {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin-top: 40px;
    }

    .course-card {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: var(--shadow);
    }

    .course-image {
        height: 200px;
        background: #ddd;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #666;
    }

    .course-content {
        padding: 20px;
    }

    .course-level {
        display: inline-block;
        padding: 4px 8px;
        color: white;
        border-radius: 4px;
        font-size: 0.8rem;
        margin-bottom: 10px;
    }

    .course-stats {
        display: flex;
        justify-content: space-between;
        margin-top: 15px;
        color: #666;
        font-size: 0.9rem;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categoryCards = document.querySelectorAll('.category-card');

        categoryCards.forEach(card => {
            card.addEventListener('click', function() {
                // Hapus class 'active' dari semua card
                categoryCards.forEach(c => c.classList.remove('active'));

                // Tambahkan class 'active' ke card yang diklik
                this.classList.add('active');

                // Ambil ID kategori yang dipilih (opsional)
                const categoryId = this.getAttribute('data-category-id');
                console.log('Kategori yang dipilih:', categoryId);

                // Anda bisa menambahkan logika lain di sini, seperti memfilter kursus berdasarkan kategori
            });
        });
    });
</script>