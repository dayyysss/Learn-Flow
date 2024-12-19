@extends('dashboard.layouts.layouts')
@section('page_title', 'LearnFlow | Quiz')

@section('content')
    <div class="container">
        <h1>Create Quiz</h1>

        <form action="{{ route('quiz.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Quiz</label>
                <input type="text" id="name" name="name" class="form-control" required oninput="updateSlug()" />
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" id="slug" name="slug" class="form-control" readonly />
            </div>

            <div class="mb-3">
                <label for="bab_id" class="form-label">Bab</label>
                <select name="bab_id" class="form-control" required>
                    @foreach ($babs as $bab)
                        <option value="{{ $bab->id }}">{{ $bab->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="start_time" class="form-label">Waktu Mulai</label>
                <input type="time" id="start_time" name="start_time" class="form-control" required />
            </div>
            
            <div class="mb-3">
                <label for="end_time" class="form-label">Waktu Selesai</label>
                <input type="time" id="end_time" name="end_time" class="form-control" required />
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">deskripsi</label>
                <input type="text" id="description" name="description" class="form-control" required />
            </div>

            <button type="submit" class="btn btn-primary">Create Quiz</button>
            <a href="{{ route('quiz.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script>
        function updateSlug() {
            const nameInput = document.getElementById('name');
            const slugInput = document.getElementById('slug');

            // Generate slug from name using slugify
            const slug = nameInput.value
                .toString()
                .toLowerCase()
                .replace(/\s+/g, '-') // Replace spaces with -
                .replace(/[^\w\-]+/g, '') // Remove all non-word characters
                .replace(/\-\-+/g, '-') // Replace multiple - with single -
                .replace(/^-+/, '') // Trim - from start of text
                .replace(/-+$/, ''); // Trim - from end of text

            // Update the slug input field
            slugInput.value = slug;
        }
    </script>
@endsection
