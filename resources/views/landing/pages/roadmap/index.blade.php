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
        <h2>Kursus Tersedia</h2>
        <div class="courses">
            @if ($course->count())
                @foreach ($course as $item)
                    <div class="course-card">
                        <div class="course-image"> <img src="{{ asset('storage/' . $item->thumbnail) }}" alt=""
                                style="
                               height: 214px;"
                                class="w-full transition-all duration-300 group-hover:scale-110"></div>
                        <div class="course-content">
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
                            <span class="course-level {{ $bgClass }}">{{ $item->tingkatan }}</span>
                            <h3> {{ Str::limit($item->name, 80, '...') }}</h3>
                            <div class="course-stats">
                                <span>⭐ 4.8</span>
                                <span>👥 1.2k siswa</span>
                                <span>⏱️ 6 jam</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
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