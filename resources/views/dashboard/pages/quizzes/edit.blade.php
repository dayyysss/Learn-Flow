@extends('dashboard.layouts.layouts')
@section('page_title', 'LearnFlow | Quiz')

@section('content')
    <div class="container">
        <h1>Edit Quiz</h1>

        <form action="{{ route('quiz.update', $quiz->id) }}" method="POST">
            @csrf
            @method('PATCH') <!-- Specify the HTTP method as PUT for updates -->

            <div class="mb-3">
                <label for="name" class="form-label">Nama Quiz</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $quiz->name) }}"
                    required oninput="updateSlug()" />
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" id="slug" name="slug" class="form-control"
                    value="{{ old('slug', $quiz->slug) }}" readonly />
            </div>

            <div class="mb-3">
                <label for="bab_id" class="form-label">Bab</label>
                <select name="bab_id" class="form-control" required>
                    @foreach ($babs as $bab)
                        <option value="{{ $bab->id }}" {{ $quiz->bab_id == $bab->id ? 'selected' : '' }}>
                            {{ $bab->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="start_time" class="form-label">Waktu Mulai</label>
                <input type="time" id="start_time" name="start_time" class="form-control"
                    value="{{ old('start_time', $quiz->start_time) }}" />
            </div>

            <div class="mb-3">
                <label for="end_time" class="form-label">Waktu Selesai</label>
                <input type="time" id="end_time" name="end_time" class="form-control"
                    value="{{ old('end_time', $quiz->end_time) }}" />
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <input type="text" id="description" name="description" class="form-control"
                    value="{{ old('description', $quiz->description) }}" />
            </div>

            <button type="submit" class="btn btn-primary">Update Quiz</button>
            <a href="{{ route('quiz.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script>
        function updateSlug() {
            const nameInput = document.getElementById('name');
            const slugInput = document.getElementById('slug');

            const slug = nameInput.value
                .toString()
                .toLowerCase()
                .replace(/\s+/g, '-') // Replace spaces with -
                .replace(/[^\w\-]+/g, '') // Remove all non-word characters
                .replace(/\-\-+/g, '-') // Replace multiple - with single -
                .replace(/^-+/, '') // Trim - from start of text
                .replace(/-+$/, ''); // Trim - from end of text

            slugInput.value = slug; // Set the updated slug value
        }
    </script>
@endsection
